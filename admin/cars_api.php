<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'car_shop';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Database connection failed'
    ]);
    exit;
}

// Configuration
$uploadDir = '../uploads/cars/';
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
$maxFileSize = 5 * 1024 * 1024; // 5MB

// Create upload directory if it doesn't exist
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$action = $_GET['action'] ?? '';

try {
    switch ($action) {
        case 'get_cars':
            $status = $_GET['status'] ?? '';
            $query = "SELECT * FROM cars" . ($status ? " WHERE status = :status" : "");
            $stmt = $conn->prepare($query);

            if ($status) {
                $stmt->bindParam(':status', $status);
            }

            $stmt->execute();
            $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($cars as &$car) {
                if ($car['image']) {
                    $car['image_url'] = getBaseUrl() . '/carshop/uploads/cars/' . $car['image'];
                }
            }

            echo jsonResponse(true, $cars);
            break;
        case 'mark_sold':
            $id = intval($_GET['id'] ?? 0);

            if ($id <= 0) {
                throw new Exception('Invalid car ID');
            }

            $stmt = $conn->prepare("UPDATE cars SET status = 'sold', updated_at = NOW() WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            echo jsonResponse(true, ['id' => $id]);
            break;

        case 'get_car':
            $id = intval($_GET['id'] ?? 0);
            $stmt = $conn->prepare("SELECT * FROM cars WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $car = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($car) {
                if ($car['image']) {
                    $car['image_url'] = getBaseUrl() . '/carshop/uploads/cars/' . $car['image'];
                }
                echo jsonResponse(true, $car);
            } else {
                echo jsonResponse(false, null, 'Car not found');
            }
            break;

        case 'save_car':
            // Handle file upload
            $image = null;
            if (!empty($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['image'];

                if (!in_array($file['type'], $allowedTypes)) {
                    throw new Exception('Invalid file type. Only JPG, PNG, and GIF are allowed.');
                }

                if ($file['size'] > $maxFileSize) {
                    throw new Exception('File size exceeds maximum limit of 5MB.');
                }

                $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $filename = uniqid('car_') . '.' . $extension;
                $destination = $uploadDir . $filename;

                if (!move_uploaded_file($file['tmp_name'], $destination)) {
                    throw new Exception('Failed to move uploaded file.');
                }

                $image = $filename;
            }

            // Get form data
            $id = intval($_POST['id'] ?? 0);
            $make = trim($_POST['make'] ?? '');
            $model = trim($_POST['model'] ?? '');
            $year = intval($_POST['year'] ?? date('Y'));
            $cost = floatval($_POST['cost'] ?? 0);
            $price = floatval($_POST['price'] ?? 0);
            $mileage = !empty($_POST['mileage']) ? intval($_POST['mileage']) : null;
            $transmission = trim($_POST['transmission'] ?? '');
            $mpg = !empty($_POST['mpg']) ? intval($_POST['mpg']) : null;
            $horsepower = !empty($_POST['horsepower']) ? intval($_POST['horsepower']) : null;
            $type = trim($_POST['type'] ?? '');
            $color = trim($_POST['color'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $status = trim($_POST['status'] ?? 'available');

            if (empty($make) || empty($model) || empty($year) || empty($price)) {
                throw new Exception('Required fields are missing');
            }

            if ($id > 0) {
                // Update existing car
                $query = "UPDATE cars SET
                    make = :make, model = :model, year = :year, cost = :cost, price = :price,
                    mileage = :mileage, transmission = :transmission, mpg = :mpg,
                    horsepower = :horsepower, type = :type, color = :color,
                    description = :description, status = :status, updated_at = NOW()";

                if ($image) {
                    $query .= ", image = :image";
                }

                $query .= " WHERE id = :id";

                $stmt = $conn->prepare($query);
                $stmt->bindParam(':make', $make);
                $stmt->bindParam(':model', $model);
                $stmt->bindParam(':year', $year, PDO::PARAM_INT);
                $stmt->bindParam(':cost', $cost);
                $stmt->bindParam(':price', $price);
                $stmt->bindParam(':mileage', $mileage, PDO::PARAM_INT);
                $stmt->bindParam(':transmission', $transmission);
                $stmt->bindParam(':mpg', $mpg, PDO::PARAM_INT);
                $stmt->bindParam(':horsepower', $horsepower, PDO::PARAM_INT);
                $stmt->bindParam(':type', $type);
                $stmt->bindParam(':color', $color);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':status', $status);
                if ($image) {
                    $stmt->bindParam(':image', $image);
                }
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);

                $stmt->execute();
            } else {
                // Add new car
                $query = "INSERT INTO cars
                    (make, model, year, cost, price, mileage, transmission, mpg, horsepower,
                    type, color, description, image, status, created_at, updated_at)
                    VALUES (:make, :model, :year, :cost, :price, :mileage, :transmission, :mpg,
                    :horsepower, :type, :color, :description, :image, :status, NOW(), NOW())";

                $stmt = $conn->prepare($query);
                $stmt->bindParam(':make', $make);
                $stmt->bindParam(':model', $model);
                $stmt->bindParam(':year', $year, PDO::PARAM_INT);
                $stmt->bindParam(':cost', $cost);
                $stmt->bindParam(':price', $price);
                $stmt->bindParam(':mileage', $mileage, PDO::PARAM_INT);
                $stmt->bindParam(':transmission', $transmission);
                $stmt->bindParam(':mpg', $mpg, PDO::PARAM_INT);
                $stmt->bindParam(':horsepower', $horsepower, PDO::PARAM_INT);
                $stmt->bindParam(':type', $type);
                $stmt->bindParam(':color', $color);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':image', $image);
                $stmt->bindParam(':status', $status);

                $stmt->execute();
                $id = $conn->lastInsertId();
            }

            echo jsonResponse(true, ['id' => $id]);
            break;

        case 'delete_car':
            $id = intval($_GET['id'] ?? 0);

            if ($id <= 0) {
                throw new Exception('Invalid car ID');
            }

            // First get the image filename to delete it
            $stmt = $conn->prepare("SELECT image FROM cars WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $car = $stmt->fetch(PDO::FETCH_ASSOC);
            $image = $car ? $car['image'] : null;

            // Delete the car record
            $stmt = $conn->prepare("DELETE FROM cars WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            // Delete the associated image file if it exists
            if ($image && file_exists($uploadDir . $image)) {
                unlink($uploadDir . $image);
            }

            echo jsonResponse(true);
            break;

        default:
            echo jsonResponse(false, null, 'Invalid action');
    }
} catch (Exception $e) {
    http_response_code(500);
    echo jsonResponse(false, null, $e->getMessage());
}

function jsonResponse($success, $data = null, $message = '') {
    return json_encode([
        'success' => $success,
        'data' => $data,
        'message' => $message
    ]);
}

function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}