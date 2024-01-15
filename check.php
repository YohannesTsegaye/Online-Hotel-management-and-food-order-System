<?php

include 'components/connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home_order_check</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css?v=<?php echo time();?>">
   <link rel="stylesheet" type="text/css" href="but.css">
</head>
<body>
   
<!-- header section starts  -->
<!-- header section ends -->

<div class="heading">
   <h3>checkout</h3>
   <p><a href="home.php">home</a> <span> /<a href="generator.php"> code condformation</a></span></p>
</div>

<section class="checkout">



<form  action="table.php" method="post">
   <h1 class="title">order check</h1>

   <div class="cart-items"><!--black color-->
      <h3>conformation Code</h3>
       

      <input name="rando" type="text"style="width:80%; height: 35px; font-size:20px; text-align: center;">
     <button  type="submit" class="btn" style="width:50%;align-items: center; background:var(--yellow); color:var(--white) :center;" name="check">check</button>
	
	  >

      
</div>
</form>
</div>

</section>
<!-- footer section starts  -->


<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>