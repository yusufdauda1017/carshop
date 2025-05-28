<?php
header('Content-Type: application/json');
require_once 'db_config.php';

$car_id = $_GET['car_id'] ?? 0;

try {
    $stmt = $conn->prepare("SELECT * FROM cars WHERE id = ?");
    $stmt->execute([$car_id]);
    $car = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($car) {
        // Add full image URL
        $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        $car['image_url'] = $car['image'] ? "$baseUrl/carshop/uploads/cars/{$car['image']}" : "$baseUrl/carshop/uploads/cars/default.jpg";
        
        echo json_encode($car);
    } else {
        echo json_encode(null);
    }
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error']);
}
?>