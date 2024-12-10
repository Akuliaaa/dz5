<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка изображения</title>
</head>
<body>

<h2>Загрузите изображение и измените его размер</h2>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="filename">Новое имя файла (с расширением .jpg):</label><br>
    <input type="text" id="filename" name="filename" required><br><br>
    
    <label for="height">Необходимая высота (в пикселях):</label><br>
    <input type="number" id="height" name="height" required><br><br>
    
    <label for="image">Выберите изображение (только JPG):</label><br>
    <input type="file" id="image" name="image" accept=".jpg,.jpeg,.JPG,.JPEG" required><br><br>
    
    <input type="submit" value="Загрузить изображение" name="submit">
</form>

</body>
</html>
