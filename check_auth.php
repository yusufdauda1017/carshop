<?php
session_start();
header('Content-Type: application/json');

$response = [
    'authenticated' => isset($_SESSION['user_id']),
    'user' => isset($_SESSION['user_id']) ? $_SESSION['user'] : null
];

echo json_encode($response);
?>