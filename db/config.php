<?php
// db/config.php

$host = 'localhost';
$dbname = 'car_shop';
$username = 'root';  // Use actual DB username
$password = '';      // Set password accordingly

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Send more detailed errors only in development
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Database connection failed',
        //'error' => $e->getMessage() // Uncomment for debugging only (not in production)
    ]);
    exit;
}
