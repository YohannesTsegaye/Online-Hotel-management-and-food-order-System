
<script type="text/javascript">     
          function PrintDiv() {    
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', 'width=900,height=600');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
           popupWin.document.close();
           
         }
       </script>
       
<?php
include 'components/connect.php';
//include 'components/dbcon.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
}


if(isset($_POST['submi']))
{

	
    $abx = trim ($_SESSION['ABCD']);
	
	// $query="SELECT name FROM orders WHERE verno='$abx'";
	// $query_run=mysqli_query($con,$query);
    // $a=mysqli_fetch_array($query_run);
    
    // foreach($a as $aa){
    //     echo $aa['name'];
    // }
    $select_cart = $conn->prepare("SELECT * FROM `orders` WHERE verno = ?");
    $select_cart->execute([$abx]);
    if($select_cart->rowCount() > 0){
       while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
         $nameo = $fetch_cart['name'];
         $ver = $fetch_cart['verno'];
         $total_pro = $fetch_cart['total_products'];
         $num = $fetch_cart['number'];
         $mail = $fetch_cart['email'];
         $car = $fetch_cart['address'];
         $ken = $fetch_cart['placed_on'];
         $tot_p = $fetch_cart['total_price'];
         $tax = $fetch_cart['total_price'] * 0.15; 
        $total_pri= $fetch_cart['total_price'] + $tax;
     

        //name:echo $nameo. '<br>' .'<br>';
        //total product:echo $total_pro. '<br>' .'<br>';
         //name: echo $num. '<br>' .'<br>';
          //total price:echo $total_pri. '<br>' .'<br>';
          //tax:echo $tax; 
         // echo '<p> name : <span>'.$nameo .'</span> </p><br> <br>';
        // echo'<p> total price : <span>'.  $tot_p .'</span> </p><br> <br>';
          //echo'<p> total price : <span> '. $ver .'</span> </p><br> <br>';
        // echo' <p> date : <span>' .$ken .'</span> </p><br> <br>';
         // echo' <p> tax : <span>  '.$tax.' </span> </p><br> <br>';
   


// $pstmt = $conn->prepare("SELECT * 
// FROM orders 

// WHERE verno = :assigned_by 
    

// ");
//   $pstmt->bindValue(':assigned_by', $abx);
  

//   $pstmt->execute();
//   $presults = $pstmt->fetch(PDO::FETCH_ASSOC);
//   echo count($presults);
//   echo $presults['name'];

//
?>
<!DOCTYPE html>
<html>
<head>
    <title>Invoice Template Design</title>
    <link rel="stylesheet" type="text/css" href="css/styles1.css">
    <link rel="stylesheet" type="text/css" href="css/print.css">
    <link href="css/fontawesome.css" rel="stylesheet" type="text/css">
    <link href="css/font/a/all.css"  rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="css/style.css">
    </head>

<body>

    <div class="wrapper">
        <div class="invoice_wrapper">
            <div class="header">
                <div class="logo_invoice_wrap">
                    <div class="logo_sec">
                    </div>
                    
                    <div class="invoice_sec">
                        <button onclick="window.print()"><h2><i class="fa fa-solid fa-print fa-beat"></i></h2></button><br>
                        <p class="invoice bold" style="text-align: center;">RasDejen Hotel</p>
                        <p class="invoice_no">
                            
                        
                        <span>Invoice:<b><?php echo $ver?></b></span>
                            
                        </p>
                    </div>
                </div>
                <div class="bill_total_wrap">
                    <div class="bill_sec">
                        <p>Bill To:<b><?php echo $nameo?></b></p>
                        <p class="bold name"></p>
                        <span>
			        	<p class="date">
						<p class="bold">Date:<?php echo $ken?></p>
                        
                        </p>
                        <address>near to debark hospital, Debark</address>
                        </span>
                    </div>

                </div>
            </div>
            <div class="body">
                <div class="main_table">
                    <div class="table_header">
                        <div class="row">
                       
                            <div class="col col_des">ITEM DESCRIPTION</div>
                            <div class="col col_total">TOTAL</div>
                        </div>
                    </div>
                    <div class="table_body">
                        <div class="row">
                            <div class="col col_no">
                                <p></p>
                            </div>
                            <div class="col col_des">
                                <p class="bold">
                                    <?php echo $total_pro ;?>
                                </p>
                            </div>
                            <div class="col col_qty">
                                <p class="bold">
                                    <?php "&nbsp";"&nbsp";"&nbsp";"&nbsp"; echo $tot_p;?></p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="paymethod_grandtotal_wrap">
                    <div class="paymethod_sec">
                        
                    </div>
                    <div class="grandtotal_sec">
                        <p class="bold">
                            <span>SUB TOTAL</span>
                            <span><?php echo $tot_p;?></span>
                        </p>
                        <p>
                            <span>Tax Vat 15%</span>
                            <span> <?php echo $tax;?></span>
                        </p>
                        <p class="bold">
                            <span>Grand Total</span>
                            <span><?php echo $total_pri; ?> </span>
                        </p>
                        
 
      
                    </div>
                </div>
            </div>





        </div>
		 <a href="home.php" class="btn">Back</a>
    </div>
    </div>
    </div>

<?php             }
       

      }
      }?>
          
    

      
         
       
</body>

</html> 

