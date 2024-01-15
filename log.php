<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};


if(isset($_POST['submite'])){

   $nameq = $_POST['name'];
   $name = filter_var($nameq, FILTER_SANITIZE_STRING);
   $pass = $_POST['pass'];
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_wait = $conn->prepare("SELECT * FROM `waiter` WHERE name = ? AND passw = ?");
   $select_wait->execute([$name, $pass]);
   $row = $select_wait->fetch(PDO::FETCH_ASSOC);

   if($select_wait->rowCount() > 0 && $row['type'] == 'delivery'){
      $_SESSION['delivey_id'] = $row['id'];
      header('location:select_or.php');
   }

elseif ($select_wait->rowCount() > 0 && $row['type'] == 'waiter') {
   $_SESSION['delivey_id'] = $row['id'];
      header('location:check.php');
}

   else{
      $message[] = 'incorrect name or password!';
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<section class="form-container">

   <form action=" " method="post">
      <h3>login now</h3>
      <input type="text" name="name" required placeholder="enter your name" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="enter your password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      
      <input type="submit" value="submit" name="submite" class="btn">
      
   </form>

</section>


<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
<!-- <?php if(isset($_POST['sumite'])) :
   $x=$_POST['choice']; ?>
<?php if($x=="delivery") :?>
   <script> window.location.assign("checkout.php")  </script>
   <?php else:?>

      <script> window.location.assign("conformation.php"); </script>
   <?php endif;?>
<?php endif;?> -->