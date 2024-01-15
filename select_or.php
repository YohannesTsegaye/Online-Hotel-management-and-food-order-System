<?php

include 'components/connect.php';

session_start();

   if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   }else{
      $user_id = '';
      //header('location:select_or.php');
      include 'components/connect.php';
};
if(isset($_POST['submite'])){
   $choice = $_POST['choice'];
   $order_id = $_POST['order_id'];
   $stat='';
   if(!empty($choice)){

      if($choice == 'complete'){
         $stat=1;
        
      }
      elseif($choice == 'pending'){
         $stat=2;
         

      }
      else{
         $stat=3;


      }
      $update_address = $conn->prepare("UPDATE `orders` set choices = ? , status=? WHERE verno = ?");
      $update_address->execute([$choice,$stat, $order_id]);
   

      }
      $x = $choice; 
      // echo $x;
      if($x=='complete'){
         
       header('location:check.php');
       }
       elseif($x=='pending'){

        header('location: ');
         
         echo ' <script> window.location("#"); </script>';
         }
       else{


         header('location:order reject.php');
         echo '  <script> window.location("order reject.php"); </script>';
            
       }
      }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>placed orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>



<!-- placed orders section starts  -->

<section class="placed-orders">

   <h1 class="heading">placed orders</h1>

   <div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders` ");
      $select_orders->execute([]);
      if( $select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
      
         
      
   ?>
   <div class="box">
      
      <!-- <p> user id : <span><?= $fetch_orders['user_id']; ?></span> </p> -->
      <p> placed on : <span><?= $fetch_orders['placed_on']; ?></span> </p>
      <p> name : <span><?= $fetch_orders['name']; ?></span> </p>
      <p> email : <span><?= $fetch_orders['email']; ?></span> </p>
      <p> number : <span><?= $fetch_orders['number']; ?></span> </p>
      <p> status :<span>
          <?php
         if($fetch_orders['status']==0){
            echo 'No Action Processing';
            
            
         }elseif($fetch_orders['status']==1){
            echo'Complete'; 
            
         }elseif($fetch_orders['status']==2){
            
            echo'on the way';
           

         }else{
            echo 'Reject';
         }

         ?>
         </span></p>

      
         <?php
      if($fetch_orders['address'] != ''){

          ?>

<p> address : <span><?= $fetch_orders['address']; ?></span> </p>
          <?php
      }else{?>
         <p> method : <span><?= $fetch_orders['way']; ?></span> </p>
      <?php
      }

      ?>
      
      <p> total products : <span><?= $fetch_orders['total_products']; ?></span> </p>
      <p> total price : <span><?= $fetch_orders['total_price']; ?> Birr</span> </p>
      
      
      <form action="#" method="POST">
      <input type="hidden" name="order_id" value="<?= $fetch_orders['verno']; ?>">
      <select name="choice" class="drop-down">
             <option value="" disabled selected ></option>
       
            <option value="pending">pending</option>
            <option value="complete">complete</option>
            <option value="reject">Reject</option> 
      </select> 
      
      <div class="flex-btn">
            <input type="submit" value="submit" class="btn" name ="submite">
            
         </div>
         </div>
      </form>
      

      <?php
         }            
      }


?>
   </div>
   </div>

</section>
</body>
</html>