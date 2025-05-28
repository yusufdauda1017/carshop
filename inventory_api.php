<?php
header('Content-Type: application/json');

// Database configuration
$host = 'localhost';
$dbname = 'car_shop';
$username = 'root';
$password = '';

try {
    // Database connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Handle single car detail request
    if (isset($_GET['action']) && $_GET['action'] === 'get_car' && isset($_GET['id'])) {
        $carId = (int)$_GET['id'];

        $stmt = $conn->prepare("SELECT
                id, make, model, year, price, mileage, transmission,
                mpg, horsepower, type, color, description, image, status
            FROM cars
            WHERE id = :id");
        $stmt->bindParam(':id', $carId, PDO::PARAM_INT);
        $stmt->execute();

        $car = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($car) {
            // Add image URL
            $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
            $car['image_url'] = $car['image'] ? "$baseUrl/carshop/uploads/cars/{$car['image']}" : "$baseUrl/carshop/uploads/cars/default.jpg";

            echo json_encode([
                'success' => true,
                'data' => $car
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Car not found'
            ]);
        }

        exit;
    }

    // Handle inventory listing request
    $params = [
        'search' => trim($_GET['search'] ?? ''),
        'sort' => $_GET['sort'] ?? 'featured',
        'min_price' => (float)($_GET['min_price'] ?? 0),
        'max_price' => (float)($_GET['max_price'] ?? 10000000),
        'types' => isset($_GET['types']) ? explode(',', $_GET['types']) : [],
        'min_year' => (int)($_GET['min_year'] ?? 0),
        'mileage' => $_GET['mileage'] ?? '',
        'debug' => isset($_GET['debug']) ? true : false
    ];

    // Base query
    $query = "SELECT
                id, make, model, year, price, mileage, transmission,
                mpg, horsepower, type, color, description, image, status
              FROM cars
              WHERE status = 'available'";
    $bindParams = [];

    // Price filter
    $query .= " AND price BETWEEN :min_price AND :max_price";
    $bindParams[':min_price'] = $params['min_price'];
    $bindParams[':max_price'] = $params['max_price'];

    // Search filter
    if (!empty($params['search'])) {
        $query .= " AND (make LIKE :search OR model LIKE :search)";
        $bindParams[':search'] = '%' . $params['search'] . '%';
    }

    // Type filter
    if (!empty($params['types'])) {
        $typeConditions = [];
        foreach ($params['types'] as $i => $type) {
            $param = ":type_$i";
            $typeConditions[] = "type = $param";
            $bindParams[$param] = $type;
        }
        $query .= " AND (" . implode(' OR ', $typeConditions) . ")";
    }

    // Year filter
    if ($params['min_year'] > 0) {
        $query .= " AND year >= :min_year";
        $bindParams[':min_year'] = $params['min_year'];
    }

    // Mileage filter
    if (!empty($params['mileage'])) {
        switch ($params['mileage']) {
            case 'under-10k':
                $query .= " AND mileage < 10000";
                break;
            case '10k-30k':
                $query .= " AND mileage BETWEEN 10000 AND 30000";
                break;
            case '30k-50k':
                $query .= " AND mileage BETWEEN 30000 AND 50000";
                break;
            case 'over-50k':
                $query .= " AND mileage > 50000";
                break;
        }
    }

    // Sorting
    switch ($params['sort']) {
        case 'price-low':
            $query .= " ORDER BY price ASC";
            break;
        case 'price-high':
            $query .= " ORDER BY price DESC";
            break;
        case 'year-new':
            $query .= " ORDER BY year DESC";
            break;
        case 'year-old':
            $query .= " ORDER BY year ASC";
            break;
        case 'mileage-low':
            $query .= " ORDER BY mileage ASC";
            break;
        default:
            $query .= " ORDER BY created_at DESC";
    }

    // Execute query
    $stmt = $conn->prepare($query);
    $stmt->execute($bindParams);
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Add image URLs
    $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    foreach ($cars as &$car) {
        $car['image_url'] = $car['image'] ? "$baseUrl/carshop/uploads/cars/{$car['image']}" : "$baseUrl/carshop/uploads/cars/default.jpg";
    }

    // Get total count
    $totalCount = $conn->query("SELECT COUNT(*) FROM cars WHERE status = 'available'")->fetchColumn();

    // Get all unique types
    $uniqueTypes = $conn->query("SELECT DISTINCT type FROM cars WHERE status = 'available' AND type IS NOT NULL")->fetchAll(PDO::FETCH_COLUMN);

    // Prepare response
    $response = [
        'success' => true,
        'data' => $cars,
        'total' => $totalCount,
        'available_types' => $uniqueTypes
    ];

    // Add debug info if requested
    if ($params['debug']) {
        $response['debug'] = [
            'query' => $query,
            'params' => $bindParams,
            'received_params' => $params,
            'base_url' => $baseUrl
        ];
    }

    echo json_encode($response);

} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Database error',
        'error' => $e->getMessage(),
        'trace' => $e->getTrace()
    ]);
}