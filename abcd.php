<?php
include 'components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
}
 if(isset($_POST['statsub'])){
   $stat='2';
   $ver = $_POST['verno'];
   $update_stat = $conn->prepare("UPDATE `orders` set  status=? WHERE verno = ?");
   $update_stat->execute([$stat, $ver]);
   if($update_stat)
   {
   ?>
   <script>
    alert("status updated");
    window.location.assign("check.php")
    </script>

   <?php
   }
   else{
    ?>
    <script>
     alert("status not updated");
     window.location.assign("check.php")
     </script>
 
    <?php

   }
}
?>