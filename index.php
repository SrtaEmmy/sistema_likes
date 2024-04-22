<?php 
require_once('database/conn.php'); 
session_start();
$_SESSION['id_user'] = 1; //simulación del id de un usuario
$id_user = $_SESSION['id_user'];

$sql = "SELECT * FROM images";
$result = $connection->query($sql);

$images = array();
while ($row = $result->fetch_assoc()) { 
  $images[] = $row;

}

 
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>


<body>
    <div class="container ">
        <h1>Sistema de Likes</h1>
        <?php foreach($images as $image): ?>

            <img class=" m-4" src="img/<?php echo $image['url_image'] ?>" alt="imagen" width="300">
            <button onclick="send_like(<?php echo $image['id'] ?>)" >Like</button>
             <span id="likes<?php echo $image['id']?>"></span>
        <?php endforeach ?>
    </div>

    <script src="ajax.js"></script>
</body>
</html>