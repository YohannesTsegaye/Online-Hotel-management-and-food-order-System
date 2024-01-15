<?php

include 'components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
}
if(isset($_POST['submi'])){

      $select_orders = $conn->prepare("SELECT * FROM `orders` ");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
      $fetch_orderss = $select_orders->fetchAll(PDO::FETCH_ASSOC)
	  



  <?php foreach($fetch_orderss as $fetch_orders): ?>
      <p> user id : <span><?= $fetch_orders['user_id']; ?></span> </p>
      <p> placed on : <span><?= $fetch_orders['placed_on']; ?></span> </p>
      <p> number : <span><?= $fetch_orders['number']; ?></span> </p>
      <p> address : <span><?= $fetch_orders['address']; ?></span> </p>
      <p> total products : <span><?= $fetch_orders['total_products']; ?></span> </p>
      <p> total price : <span>$<?= $fetch_orders['total_price']; ?>/-</span> </p>
      <p> payment method : <span><?= $fetch_orders['method']; ?></span> </p>

<?php endforeach;?>
	<?php }?>
	<?php }?>  
<?php include 'components/user_header.php'; ?>









<!DOCTYPE html>
<html>
<head>
	<title>Invoice Template Design</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="wrapper">
	<div class="invoice_wrapper">
		<div class="header">
			<div class="logo_invoice_wrap">
				<div class="logo_sec">
					
					
				</div>
				<div class="invoice_sec">
					<p class="invoice bold" style="text-align: center;">RasDejen Hotel</p>
					<p class="invoice_no">
						<span class="bold">Invoice</span>
						<span>#3488</span>
					</p>
									</div>
			</div>
			<div class="bill_total_wrap">
				<div class="bill_sec">
					<p>Bill To</p> 
	          		<p class="bold name">Alex Deo</p>
			        <span>
			        	<p class="date">
						<span class="bold">Date</span>
						<span>08/Jan/2022</span>
					</p>

			           near to debark hospital, Debark<br/>
			           0912128122
			        </span>
				</div>
				
			</div>
		</div>
		<div class="body">
			<div class="main_table">
				<div class="table_header">
					<div class="row">
						
						<div class="col col_des">ITEM DESCRIPTION</div>
						<div class="col col_price">PRICE</div>
						
						<div class="col col_total">TOTAL</div>
					</div>
				</div>
				<div class="table_body">


					<div class="row">
						<div class="col col_no">
							<p>01</p>
						</div>
						<div class="col col_des">
							<p class="bold"> total products : <span><?= $fetch_orders['total_products']; ?></span> </p>
							
						</div>
						<div class="col col_total">
							<p>$700.00</p>
						</div>
					</div>
					
		

					

				</div>
			</div>
			<div class="paymethod_grandtotal_wrap">
				<div class="paymethod_sec">
					<p class="bold">Payment Method</p>
					<p>Visa, master Card and We accept Cheque</p>
				</div>
				<div class="grandtotal_sec">
			        <p class="bold">
			            <span>SUB TOTAL</span>
			            <span>$7500</span>
			        </p>
			        <p>
			            <span>Tax Vat 15%</span>
			            <span>$200</span>
			        </p>
			        <p>
			            <span>Discount 10%</span>
			            <span>-$700</span>
			        </p>
			       	<p class="bold">
			            <span>Grand Total</span>
			            <span>$7000.0</span>
			        </p>
				</div>
			</div>
		</div>
	
		
	
		     
		       
		    </div>
		</div>
	</div>
</div>


</body>
</html>