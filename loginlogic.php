<?php
header('Content-Type: application/json');

// Replace with your actual secret key
$recaptchaSecret = '6Lfk0DUrAAAAABvst0rx0FnMQaMlkwhpgOWuQmbe';

// 1. Verify reCAPTCHA
if (!isset($_POST['recaptcha_response'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'reCAPTCHA token missing.']);
    exit;
}

$recaptchaResponse = $_POST['recaptcha_response'];

$verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
$verifyData = [
    'secret' => $recaptchaSecret,
    'response' => $recaptchaResponse
];

$verifyOptions = [
    'http' => [
        'method' => 'POST',
        'header' => 'Content-type: application/x-www-form-urlencoded',
        'content' => http_build_query($verifyData)
    ]
];

$verifyContext = stream_context_create($verifyOptions);
$verifyResult = file_get_contents($verifyUrl, false, $verifyContext);
$responseData = json_decode($verifyResult);

if (!$responseData || !$responseData->success) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'reCAPTCHA verification failed.']);
    exit;
}

// 2. Basic login check (replace with real DB logic)
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Example dummy credentials
$validEmail = 'user@example.com';
$validPassword = 'password123';

if ($email === $validEmail && $password === $validPassword) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid email or password']);
}
?>
