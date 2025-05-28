<?php
header('Content-Type: application/json');
session_start();
require_once __DIR__ . '/../db/config.php';

// ================== VALIDATION FUNCTIONS ==================
function sanitizeInput($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function formatName($name) {
    $name = trim($name);
    $name = preg_replace('/[^\p{L}\-\'\s]/u', '', $name);
    $name = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
    return $name;
}

function validateName($name, $type = 'Full name') {
    // Blocklist check
    $blocklist = ['admin', 'root', 'system', 'support']; // Can be fetched from DB
    $lowerName = mb_strtolower($name);
    foreach ($blocklist as $word) {
        if (mb_stripos($lowerName, $word) !== false) {
            error_log("Blocked name attempt: $name matched $word");
            return "$type contains inappropriate content";
        }
    }

    if (preg_match('/[0-9]/', $name)) {
        return "$type cannot contain numbers";
    }

    if (!preg_match('/^[\p{L}\-\'\s]{2,50}$/u', $name)) {
        return "$type must be 2-50 letters long (hyphens/apostrophes allowed)";
    }

    return true;
}

function validatePassword($password) {
    if (strlen($password) < 8) {
        return "Password must be at least 8 characters long";
    }

    return true;
}

function validateEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";
    }
    
    // Check disposable emails
    $disposableDomains = ['tempmail.com', 'mailinator.com']; // Can be fetched from DB
    $domain = substr(strrchr($email, "@"), 1);
    if (in_array($domain, $disposableDomains)) {
        return "Disposable email addresses are not allowed";
    }
    
    return true;
}

function validatePhone($phone) {
    if (!preg_match('/^[0-9]{10,15}$/', $phone)) {
        return "Phone number must be 10-15 digits";
    }
    return true;
}

function validateDOB($dob) {
    $minAge = 13;
    $birthDate = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($birthDate)->y;
    
    if ($age < $minAge) {
        return "You must be at least $minAge years old to register";
    }
    
    return true;
}

// ================== MAIN REGISTRATION LOGIC ==================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get and sanitize input data
    $data = json_decode(file_get_contents('php://input'), true);
    
    $fullName = isset($data['fullName']) ? formatName($data['fullName']) : '';
    $email = filter_var($data['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $password = $data['password'] ?? '';
    $phone = isset($data['phone']) ? preg_replace('/[^0-9]/', '', $data['phone']) : '';
    $dob = $data['dob'] ?? '';
    $gender = isset($data['gender']) ? sanitizeInput($data['gender']) : '';
    $street = isset($data['street']) ? sanitizeInput($data['street']) : '';
    $country = isset($data['country']) ? sanitizeInput($data['country']) : '';
    $state = isset($data['state']) ? sanitizeInput($data['state']) : '';
    
    // Validate inputs
    $errors = [];
    
    // Name validation
    if (empty($fullName)) {
        $errors[] = 'Full name is required';
    } else {
        $validationResult = validateName($fullName);
        if ($validationResult !== true) $errors[] = $validationResult;
    }
    
    // Email validation
    if (empty($email)) {
        $errors[] = 'Email is required';
    } else {
        $validationResult = validateEmail($email);
        if ($validationResult !== true) $errors[] = $validationResult;
    }
    
    // Password validation
    if (empty($password)) {
        $errors[] = 'Password is required';
    } else {
        $validationResult = validatePassword($password);
        if ($validationResult !== true) $errors[] = $validationResult;
    }
    
    // Phone validation
    if (!empty($phone)) {
        $validationResult = validatePhone($phone);
        if ($validationResult !== true) $errors[] = $validationResult;
    }
    
    // DOB validation
    if (!empty($dob)) {
        $validationResult = validateDOB($dob);
        if ($validationResult !== true) $errors[] = $validationResult;
    }
    
    if (!empty($errors)) {
        echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
        exit;
    }
    
    try {
        // Check if email exists
        $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => false, 'message' => 'Email already registered']);
            exit;
        }
        
        // Check if phone exists (if provided)
        if (!empty($phone)) {
            $stmt = $conn->prepare("SELECT user_id FROM users WHERE phone_number = ?");
            $stmt->execute([$phone]);
            
            if ($stmt->rowCount() > 0) {
                echo json_encode(['success' => false, 'message' => 'Phone number already registered']);
                exit;
            }
        }
        
        // Hash password
        $passwordHash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        
        // Start transaction
        $conn->beginTransaction();
        
        // Insert user
        $stmt = $conn->prepare("INSERT INTO users 
                              (full_name, email, phone_number, password_hash, date_of_birth, gender, role_id) 
                              VALUES (?, ?, ?, ?, ?, ?, 2)");
        $stmt->execute([
            $fullName, 
            $email, 
            !empty($phone) ? $phone : null,
            $passwordHash,
            !empty($dob) ? $dob : null,
            !empty($gender) ? $gender : null
        ]);
        
        $userId = $conn->lastInsertId();
        
        // Insert address if provided
        if (!empty($street) && !empty($country) && !empty($state)) {
            $stmt = $conn->prepare("INSERT INTO user_addresses 
                                  (user_id, street, country, state) 
                                  VALUES (?, ?, ?, ?)");
            $stmt->execute([$userId, $street, $country, $state]);
        }
        
        // Create notification
        $stmt = $conn->prepare("INSERT INTO notifications 
                              (user_id, type, title, message, reference_id) 
                              VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $userId,
            'registration',
            'New User Registration',
            'New user registered: ' . $fullName,
            $userId
        ]);
        
        // Commit transaction
        $conn->commit();
        
        // Create user session (without sensitive data)
        $_SESSION['user'] = [
            'id' => $userId,
            'email' => $email,
            'fullName' => $fullName,
            'role' => 2, // Default role: user
            'authenticated' => true
        ];
        
        // Secure session cookie
        $sessionParams = session_get_cookie_params();
        setcookie(
            session_name(),
            session_id(),
            [
                'expires' => time() + 86400 * 30,
                'path' => '/',
                'domain' => $sessionParams['domain'],
                'secure' => true,
                'httponly' => true,
                'samesite' => 'Strict'
            ]
        );
        
        echo json_encode([
            'success' => true, 
            'message' => 'Registration successful',
             'redirect' => './user/index.php',
            'user' => [
                'id' => $userId,
                'fullName' => $fullName,
                'email' => $email
            ]
        ]);

    } catch(PDOException $e) {
        $conn->rollBack();
        error_log('Registration error: ' . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Registration failed. Please try again.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>