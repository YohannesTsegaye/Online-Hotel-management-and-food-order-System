<?php
include 'components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
}


if(isset($_POST['check']))
{
	
	   $abx = $_POST['rando'];
   $abxz = filter_var($abx, FILTER_SANITIZE_STRING);
  
	//$abx = trim ($_SESSION['ABCD']);
	$select_cart = $conn->prepare("SELECT * FROM `orders` WHERE verno = ?");
    $select_cart->execute([$abxz]);
    if($select_cart->rowCount() > 0){
     while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
         $nameo = $fetch_cart['name'];
         $ver = $fetch_cart['verno'];
         $total_pro = $fetch_cart['total_products'];
         $num = $fetch_cart['number'];
         $mail = $fetch_cart['email'];
         $ken = $fetch_cart['placed_on'];
         $waay = $fetch_cart['way'];
         $tot_p = $fetch_cart['total_price'];
		  // $method = $fecth_cart['way'];

?>
<?php
 if(isset($_POST['statsub'])){
   $stat='2';
   $ver = $_POST['verno'];
   $update_stat = $conn->prepare("UPDATE `orders` set  status=? WHERE verno = ?");
   $update_stat->execute([$stat, $ver]);


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>check orders</title>


   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">


</head>
<body>

<!-- placed orders section starts  -->


<section class="placed-orders">

  

   <div class="box-container">

   <div class="box">
      <p> verfication number : <span> <?php echo $ver;?></span> </p>     
      <p> name : <span><?php echo $nameo;?></span> </p>
      <p> number : <span><?php echo $num;?></span> </p>
      <p> E-Mail  : <span><?php echo $mail;?></span></p>
	  <p> Total price  : <span><?php echo $tot_p;?> Birr</span></p>
	  <p> Total products  : <span><?php echo $total_pro;?></span></p>
	  <p> way of service: <span><?php echo $waay;?></span></p>          
	  
  
         <div class="flex-btn">
            <form action="abcd.php" method="POST">
               <input type="hidden" name="verno" value="<?= $ver;?>">
           <!--<a href="#" class="btn" style="width:50%;align-items: center; background:var(--yellow); color:var(--white) :center;" name="check"></a>-->
           <button type="submit" name="statsub" class="btn"> submit</button>
</form>

         </div>
      </form>
   </div>

   </div>

<?php             }
       

      }
      else
      {
         ?>
         <script>
          alert("there is no order register by this verfication no");
          window.location.assign("check.php")
          </script>
      
         <?php
      }
      }?>
          

<!-- placed orders section ends -->

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>