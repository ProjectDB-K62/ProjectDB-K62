<!DOCTYPE html>
<html lang="en">
<head>
<title>Complete</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>
<body>

<?php 
if(isset($_SESSION['cart'])){
	$cart = $_SESSION['cart'];
	foreach($cart as $product_id=>$num){
		$arr_cart[] = $product_id;
	}
	$arr_str = implode(',', $arr_cart);
	$sql = "SELECT * FROM product WHERE product_id IN ($arr_str)";
	$query = mysqli_query($connect, $sql);}?>
	
	<?php
	$query1=mysqli_query($connect,"SELECT * FROM `order` ORDER BY order_id DESC LIMIT 1");
	$row1=mysqli_fetch_assoc($query1);
	while($row = mysqli_fetch_assoc($query)){ 
	$qty=$_SESSION['cart'][$row['product_id']];
	$oid=$row1['order_id'];
	$pid=$row['product_id'];
	$sql1="INSERT INTO order_detail (order_id,product_id,qty) VALUES ('$oid','$pid','$qty')";
	mysqli_query($connect,$sql1);
	$sql2="SELECT * FROM product WHERE product_id=$pid";
	$query2=mysqli_query($connect,$sql2);
	$row2=mysqli_fetch_assoc($query2);
	$upcount=$row2['count_buy']+$qty;
	$upam=$row2['amount']-$qty;
	$sql3="UPDATE product SET count_buy=$upcount,amount=$upam WHERE product_id=$pid";
	mysqli_query($connect,$sql3);
	}
	session_destroy();
?>
<div class="super_container">

	<!-- Header -->


	<!-- Menu -->

	
	
	<!-- Home -->

	

	<!-- Contact -->
	
	<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Get in touch -->
				<div class="col-lg-8 contact_col">
					<div class="get_in_touch">
					</br> </br>
						<div class="section_title">Order Success !!</div>
						<div class="section_subtitle" style="">Your oder code is <?php echo $oid ?> </div>
						<div class="section_subtitle" style="">Order details will be sent to your email soon</div>
						
					</div>
				</div>

				<!-- Contact Info -->
				
			</div>
			
		</div>
	</div>

	<!-- Footer -->
	
	
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="js/contact.js"></script>
</body>
</html>