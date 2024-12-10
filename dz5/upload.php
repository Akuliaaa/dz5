<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filename = $_POST['filename']; 
    $height = (int)$_POST['height']; 
    $uploadedFile = $_FILES['image']; 

    if ($uploadedFile['error'] != 0) {
        echo "Ошибка при загрузке файла.";
        exit;
    }

    $fileType = strtolower(pathinfo($uploadedFile['name'], PATHINFO_EXTENSION));
    if (!in_array($fileType, ['jpg', 'jpeg', 'JPG', 'JPEG'])) {
        echo "Можно загружать только изображения в формате JPG.";
        exit;
    }

    $imagePath = $uploadedFile['tmp_name'];
    $originalImage = imagecreatefromjpeg($imagePath);
    if (!$originalImage) {
        echo "Не удалось создать изображение из файла.";
        exit;
    }

    list($originalWidth, $originalHeight) = getimagesize($imagePath);

    $newHeight = $height;
    $newWidth = ($newHeight / $originalHeight) * $originalWidth;

    $newImage = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($newImage, $originalImage, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

    $savePath = 'uploads/' . $filename;
    if (!imagejpeg($newImage, $savePath)) {
        echo "Не удалось сохранить изображение.";
        exit;
    }

    imagedestroy($originalImage);
    imagedestroy($newImage);

    echo "Изображение успешно загружено и изменено! <a href='$savePath'>Скачать новое изображение</a>";
}
?>
