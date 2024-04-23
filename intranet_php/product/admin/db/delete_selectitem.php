<?php
    require "connection.php";


   $id=$_POST['id'];
   $kind=$_POST['kind'];
   


    $sql = 'delete from '.$kind.'  where id="'.$id.'"';
    $pdo->query($sql);

  header("Location: ../add_item.php");

?>