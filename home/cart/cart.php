

<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/cart.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
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
		$query = mysqli_query($connect, $sql);
		if(isset($_POST['quantity'])){
			$_SESSION['cart'] = $_POST['quantity'];
			header("location:index.php?page_layout=cart");
		}
	}
	$total=0;
?>
<div class="super_container">

	<!-- Header -->



	<!-- Menu -->

	
	<!-- Home -->

	

	<!-- Cart Info -->

	<div class="cart_info">
		<div class="container">
			<div class="row">
				<div class="col">
					<!-- Column Titles -->
					<div class="cart_info_columns clearfix">
						</br></br>
						<div class="cart_info_col cart_info_col_product">Product</div>
						<div class="cart_info_col cart_info_col_price">Price</div>
						<div class="cart_info_col cart_info_col_quantity">Quantity</div>
						<div class="cart_info_col cart_info_col_total">Total</div>
					</div>
				</div>
			</div>
			<form action="" method="post" id="frm">
			<div class="row cart_items_row">
				<div class="col">

					<!-- Cart Item -->
					<?php while($row = mysqli_fetch_assoc($query)){ ?>
					<div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<!-- Name -->
						
							<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
								<div class="cart_item_image">
									<div><img src="http://localhost/projectdatabase/upload/product/<?php echo $row['image_link'] ?>" alt=""></div>
								</div>
								<div class="cart_item_name_container">
									<div class="cart_item_name"><a href="#"><?php echo $row['name'] ?></a></div>
									<div class="cart_item_edit"><a href="#">Edit Product</a></div>
								</div>
							</div>
							<!-- Price -->
							<div class="cart_item_price"><?php echo $row['price']-$row['discount'] ?></div>
							<!-- Quantity -->
							<div class="cart_item_quantity">
								<div class="product_quantity_container">
									<div class="product_quantity clearfix">
										<span>Qty</span>
										<input id="quantity_input" type="number" pattern="[0-9]*" value="<?php echo $_SESSION['cart'][$row['product_id']]?>" name="quantity[<?php echo $row['product_id']?>]">
										
									</div>
								</div>
							</div>
							<!-- Total -->
							<div class="cart_item_total"><?php echo ($row['price']-$row['discount']) * $_SESSION['cart'][$row['product_id']]?></div><?php  $total+=($row['price']-$row['discount']) * $_SESSION['cart'][$row['product_id']]; ?>
						</div>
						<?php } ?>
						

				</div>
			</div>
			</form>
			<div class="row row_cart_buttons">
				<div class="col">
					<div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
						<div class="button continue_shopping_button"><a href="index.php?page_layout=categories&catalog_id=3">Continue shopping</a></div>
						<div class="cart_buttons_right ml-lg-auto">
							
							<div class="button update_cart_button"><a  onclick="submit_but()" name="sbm">Update cart</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row row_extra">
				<div class="col-lg-4">
					
					<!-- Delivery -->
					
					<!-- Coupon Code -->
					
				</div>

				<div class="col-lg-6 offset-lg-2">
					<div class="cart_total">
						<div class="section_title">Cart total</div>
						<div class="section_subtitle">Final info</div>
						<div class="cart_total_container">
							<ul>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Subtotal</div>
									<div class="cart_total_value ml-auto"><?php echo $total ?></div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Shipping</div>
									<div class="cart_total_value ml-auto">Free</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Total</div>
									<div class="cart_total_value ml-auto"><?php echo $total ?></div>
								</li>
							</ul>
						</div>
						<div class="button checkout_button"><a href="index.php?page_layout=check_out&total=<?php echo $total ?>">Proceed to checkout</a></div>
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
<script src="js/cart.js"></script>
</body>
</html>
<script>
	function submit_but(value){
		document.getElementById('frm').submit();
	}
</script>
