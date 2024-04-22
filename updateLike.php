<?php 
require_once('database/conn.php');
session_start();
$id_user = $_SESSION['id_user'];

 
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['idImage'])){
    $id_img = $_POST['idImage'];

    $sql_get_like = "SELECT * FROM liked WHERE id_user='$id_user' AND id_image='$id_img'";
    $result = $connection->query($sql_get_like);
    
    // comprobar si el like existe
      if($result->num_rows == 0){

          $insert_like = "INSERT INTO liked (id_user, id_image) VALUES('$id_user', '$id_img')";
          $connection->query($insert_like);
          
      }else{
          
          $delete_like = "DELETE FROM liked WHERE id_user='$id_user' AND id_image='$id_img'";
          $connection->query($delete_like);
      }

      // devolver cantidad actualizada de likes
      $get_num_likes = "SELECT COUNT(*) AS cantidad FROM liked WHERE id_image = '$id_img'";
      $result = $connection->query($get_num_likes);
      
      $row = $result->fetch_assoc();

      echo json_encode(array('id_image'=>$id_img, 'likes' =>$row['cantidad']));
      
    }  
    

 
 
?>