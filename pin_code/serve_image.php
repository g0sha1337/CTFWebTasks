<?php
$imageName = $_GET['image'];

$imagePath = __DIR__ . '/' . $imageName; 
if (file_exists($imagePath)) {
    header('Content-Type: image/jpeg'); 
    readfile($imagePath);
    exit;
} else {
    http_response_code(404);
    echo "Изображение не найдено.";
}
?>