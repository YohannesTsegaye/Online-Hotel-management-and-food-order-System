<?php

include 'components/connect.php';

session_start();

 if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
 }else{
    $user_id = '';
    header('location:menu.php');
 };

   ?>
<?php
if(isset($_POST['ggg'])){
   
   $time=$_POST['atime'];
   $time = date('h:i a' , strtotime($time))   ;


$sql ="INSERT INTO `orders`(time) VALUES(?)";
$tmt= $conn->prepare($sql);
$tmt->execute([$time]);

// <?php
// $currentDate = date('H:i:s');

// $explode = explode(' ',$currentDate);
// $time = $explode[1];
// list($h,$m,$s) = explode(':',$time);
// for($hours=8; $hours<22; $hours++) // the interval for hours is '1'
//     for($mins=0; $mins<60; $mins+=30) // the interval for mins is '30'

//         echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
//            .str_pad($mins,2,'0',STR_PAD_LEFT).':'
  //         .str_pad($sec=0,2,'0',STR_PAD_LEFT);'</option>';
//

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>what time you arrive </title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
   <link rel="stylesheet" type="text/css" href="but.css">
</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>checkout</h3>
   <p><a href="home.php">home</a> <span> /<a href="time.php"> place your order</a></span></p>
</div>

<section class="checkout">

   <h1 class="title">order summary</h1>

<form method="POST" action="checkouthotel.php" >

   <div class="cart-items"><!--black color-->
      <h3>time of arrival</h3>
      
      <form method="POST" action="checkouthotel.php">
      <input style="font-size: 21px;" name="atime" required width="50px;" type="time" min="1" max="50">

      </form>

      <br><br><button  type="submit" id="fsubmit" style="width:30%; align-items: center; background:var(--yellow); color:var(--white) :center;" name="ggg">Submit</button>
      
</div>
   </form>

</section>



<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>