
<?php
include 'components/connect.php';
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:invioce.php');
};
if(isset($_POST['ggg'])){


   $way=$_POST['choice'];
   $sql ="INSERT INTO `orders`(way) VALUES(?)";
   $tmt= $conn->prepare($sql);
   $tmt->execute([$way]);
}

   
?>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
	<h1>choose your</h1> 
	<form method="post">
		<div class="txt_field">
		<select name="choice" class="box" required>
        <option value="" disabled selected>which way yould you like</option>
         <option>delivery</option>
         <option>At Hotel</option>
         
      </select>

<button type="submit" name="ggg">Submit</button>

	</form>
	</div>
</body>
</html>


<?php

	if(isset($_POST['ggg'])){


$x=$_POST['choice'];


if($x=="delivery"){
echo $x;	?>
	<script> window.location.assign("checkout.php")  </script>
<?php 
}

else{

?>

<script> window.location.assign("time.php"); </script>


<?php
}










	}



?>
<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->






<!-- custom js file link  -->
<script src="js/script.js"></script>