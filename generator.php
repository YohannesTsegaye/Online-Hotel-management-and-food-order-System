<?php

include 'components/connect.php';

session_start();
	  
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:invioce.php');
};
$rand = $_GET['q'] ?? null;
$_SESSION['ABCD']=$rand;
?>

<?php
         $grand_total = 0;
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
			}
		 }
				
?>
<?php
if(isset($_POST['submi'])){

   $sq = "INSERT INTO `orders`(verno) VALUES(?)";
   $tmt= $conn->prepare($sq);
   $tmt->execute([$verno]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>conform code </title>

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
   <p><a href="home.php">home</a> <span> /<a href="generator.php"> code condformation</a></span></p>
</div>

<section class="checkout">

   

    

<form method="POST" action="invoice.php">

   <div class="cart-items"><!--black color-->
      <h3>conformation Code</h3>
       

      
	  <input type="text"  name="rando" disabled required  value="<?php echo $rand; ?>"style="color:red;width:80%; height: 35px; font-size:20px; text-align: center;">
	  <button type="submit" class="btn"  style="width:50%;align-items: center; background:var(--yellow); color:var(--white) :center;" name="submi">get-invioce</button>
	  	 


      
</div>
<div style="font-size: 20px;">
<p style="color: red;"><u><b>Note</b></u></p>
<p>Please don't share the conformation code with any one!</p>
</form>
</div>

</section>
<!-- footer section starts  -->


<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>