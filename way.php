<?php

include 'components/connect.php';

session_start();

   if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   }else{
      $user_id = '';
      header('location:order.php');
      include 'components/connect.php';
};
if(isset($_POST['submite'])){


   $way=$_POST['wayss'];
   $sql ="INSERT INTO `orders`(way) VALUES(?)";
   $tmt= $conn->prepare($sql);
   $tmt->execute([$way]);


};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>


   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   

</head>
<body>
   
<!-- header section starts it uses for automatic generator  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->


<section class="checkout">
   

   <h1 class="title">conformation</h1>

<form action="" method="post">

   <div class="cart-items"style="text-align: center;">
    
      
        

<h3>cart items</h3>
      <h3>which way woud you like</h3>
      
      
   
      <form style="font-size: 35px;" action="#" method="POST">
      <select style="font-size: 21px;" name="wayss" required>
         <option value="" disabled selected>which way yould you like--</option>
         <option value="delivery">Delivery</option>
         <option value="hotel">At Hotel</option>
      </select>
      <div class="more-btn">
     <!--<button  type="submit" id="fsubmit" name="ggg">Submit</button>-->
      <br><br><input type="submit" value="submit" class="btn " id="fsubmit" 
      style="width:50%;align-items: center; background:var(--yellow); color:var(--white) :center;" name="submite">
</div>
      </form>

      
</div>
   


<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
<?php if(isset($_POST['submite'])) :
   $x=$_POST['wayss']; ?>
<?php if($x=="delivery") :?>
   <script> window.location.assign("checkout.php")  </script>
   <?php else:?>

      <script> window.location.assign("time.php"); </script>
   <?php endif;?>
<?php endif;?>


   
