<?php
header('Content-Type: application/json');
session_start();
require_once __DIR__ . '/../db/config.php';


// Validate inputs
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$password = $_POST['password'] ?? '';

if (empty($email) ){
    echo json_encode(['success' => false, 'message' => 'Email is required']);
    exit;
}

if (empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Password is required']);
    exit;
}

try {
    // Check if user exists
    $stmt = $conn->prepare("SELECT user_id, full_name, email, password_hash, role_id, is_active FROM users WHERE email = ?");
    $stmt->execute([$email]);
    
    if ($stmt->rowCount() === 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid email or password']);
        exit;
    }
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Verify password
    if (!password_verify($password, $user['password_hash'])) {
        echo json_encode(['success' => false, 'message' => 'Invalid email or password']);
        exit;
    }
    
    // Check if account is active
    if (!$user['is_active']) {
        echo json_encode(['success' => false, 'message' => 'Your account is inactive. Please contact support.']);
        exit;
    }
    
    // Create session
    $_SESSION['user'] = [
        'id' => $user['user_id'],
        'email' => $user['email'],
        'fullName' => $user['full_name'],
        'role' => $user['role_id'],
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
    
    // Determine redirect URL based on role
    $redirect = './user/index.php';
    if ($user['role_id'] == 1) {
        $redirect = './admin/index.php';
    }
    
    echo json_encode([
        'success' => true,
        'message' => 'Login successful',
        'redirect' => $redirect
    ]);
    
} catch (PDOException $e) {
    error_log('Login error: ' . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Login failed. Please try again.']);
}


?>