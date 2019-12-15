<!DOCTYPE html>
<html lang="en">
<head>
<title>Checkout</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/checkout.css">
<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
</head>
<body>
<?php $total=$_GET['total'];
if(isset($_SESSION['cart'])){
	$cart = $_SESSION['cart'];
	foreach($cart as $product_id=>$num){
		$arr_cart[] = $product_id;
	}
	$arr_str = implode(',', $arr_cart);
	$sql = "SELECT * FROM product WHERE product_id IN ($arr_str)";
	$query = mysqli_query($connect, $sql);}
?>
<?php 
								$firstname="";$phone='';$address='';$email="";
								if ($_SERVER["REQUEST_METHOD"] == "POST") {
    								if(isset($_POST["fn"])) { $firstname = $_POST['fn']; }
									if(isset($_POST["phone"])) { $phone = $_POST['phone']; }
									if(isset($_POST["address"])) { $address = $_POST['address']; }
									if(isset($_POST["email"])) { $email = $_POST['email']; }
									$sql1 = "INSERT INTO `order`( `customer_name`, `customer_phone`, `customer_address`,`customer_email`) VALUES ('$firstname','$phone','$address','$email')";
								}
								mysqli_query($connect, $sql1);
								
									 ?>
<?php
if (isset($_POST['fn'])){
  header("Location: index.php?page_layout=complete");
}
?>
<div class="super_container">

	<!-- Header -->

	

	<!-- Menu -->

	
	
	<!-- Home -->


	<!-- Checkout -->
	
	<div class="checkout">
		<div class="container">
			<div class="row">

				<!-- Billing Info -->
				<div class="col-lg-6">
					<div class="billing checkout_section">
						<div class="section_title">Billing Address</div>
						<div class="section_subtitle">Enter your  info</div>
						<div class="checkout_form_container">
							<form action="" id="checkout_form" class="checkout_form" method="POST">
								
										<!-- Name -->
										<div>
										<label for="checkout_name">Name*</label>
										<input type="text" id="checkout_name" class="checkout_input" required="required" name="fn">
										</div>
									
								
										<div>
									<!-- Address -->
									<label for="checkout_address">Email*</label>
									<input type="text" id="checkout_address" class="checkout_input" required="required" name='email'>
									
								</div>
								
								<div>
									<!-- Address -->
									<label for="checkout_address">Address*</label>
									<input type="text" id="checkout_address" class="checkout_input" required="required" name='address'>
									
								</div>
								
							
								
								<div>
									<!-- Phone no -->
									<label for="checkout_phone">Phone no*</label>
									<input type="phone" id="checkout_phone" class="checkout_input" required="required" name="phone">
								</div>
								
								<button  type="submit" ><span>Place Order</span></button>
								
							</form>
						</div>
					</div>
				</div>

				<!-- Order Info -->

				<div class="col-lg-6">
					<div class="order checkout_section">
						<div class="section_title">Your order</div>
						<div class="section_subtitle">Order details</div>

						<!-- Order details -->
						<div class="order_list_container">
							<div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
								<div class="order_list_title">Product</div>
								<div class="order_list_value ml-auto">Quatity</div>
							</div>
							<ul class="order_list">
							<?php while($row = mysqli_fetch_assoc($query)){ ?>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title"><?php echo $row['name'] ?></div>
									<div class="order_list_value ml-auto"><?php echo $_SESSION['cart'][$row['product_id']]?></div>
							</li><?php } ?>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Subtotal</div>
									<div class="order_list_value ml-auto"><?php  echo $total; ?></div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Shipping</div>
									<div class="order_list_value ml-auto">Free</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Total</div>
									<div class="order_list_value ml-auto"> <?php  echo $total; ?></div>
								</li>
							</ul>
						</div>

						<!-- Payment Options -->
						<div class="payment">
							<div class="payment_options">
								<label class="payment_option clearfix">Paypal
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label class="payment_option clearfix">Cach on delivery
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label class="payment_option clearfix">Credit card
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label class="payment_option clearfix">Direct bank transfer
									<input type="radio" checked="checked" name="radio">
									<span class="checkmark"></span>
								</label>
							</div>
						</div>

						<!-- Order Text -->
						<div class="order_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra temp or so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</div>
						
					</div>
				</div>
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
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/checkout.js"></script>
</body>
</html>
