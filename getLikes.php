<?php 
require_once('database/conn.php'); 
  
$sql = "SELECT id FROM images";
$result = $connection->query($sql);

$likes = array();
while ($row = $result->fetch_assoc()) { 
  $id_img = $row['id'];

  $get_num_likes = "SELECT COUNT(*) AS cantidad FROM liked WHERE id_image = '$id_img'";
  $result_likes = $connection->query($get_num_likes);

  $row_like = $result_likes->fetch_assoc();

  $likes[] = array('id_image'=>$id_img, 'likes'=>$row_like['cantidad']);

}

 echo json_encode($likes);
 
?>