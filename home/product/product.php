<?php 
	$product_id=$_GET['product_id'];
	$sql_detail="SELECT * FROM product WHERE product_id = $product_id";
	$query_product=mysqli_query($connect,$sql_detail);
	$row1=mysqli_fetch_assoc($query_product);
	
	$pieces=json_decode($row1['image_list'],1);
	
	$query=mysqli_query($connect,"SELECT * from product order by product_id DESC limit 4");
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Product</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/product.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	

	<!-- Menu -->

	
	
	<!-- Home -->

	

	<!-- Product Details -->
	
	<div class="product_details">
		<div class="container">
			<div class="row details_row">
			
				<!-- Product Image -->
				<div class="col-lg-6">
					<div class="details_image"></br></br>
						<div class="details_image_large"><img src="http://localhost/projectdatabase/upload/product/<?php echo $row1['image_link'] ?>" alt=""></div>
						<div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
							<div class="details_image_thumbnail active" data-image="http://localhost/projectdatabase/upload/product/<?php echo $row1['image_link'] ?>"><img src="http://localhost/projectdatabase/upload/product/<?php echo $row1['image_link'] ?>" alt=""></div>
							<?php foreach($pieces as $value){ ?>
							<div class="details_image_thumbnail" data-image="http://localhost/projectdatabase/upload/product/<?php echo $value ?>"><img src="http://localhost/projectdatabase/upload/product/<?php echo $value ?>" alt=""></div>
							<?php } ?>
						</div>
					</div>
				</div>

				<!-- Product Content -->
				<div class="col-lg-6">
					<div class="details_content">
						</br></br>
						<div class="details_name"><?php echo $row1['name']; ?></div>
						<div class="details_discount"style="color: black">$<?php echo $row1['price']?></div>
						<div class="details_price" style="color: red">$<?php echo ($row1['price']-$row1['discount']); ?></div>

						<!-- In Stock -->
						<div class="in_stock_container">
							<div class="availability">Availability:</div>
							<span><?php echo $row1['amount'] ?></span>
						</div>
						<div class="details_text">
							<p><?php echo $row1['description'] ?></p>
						</div>

						<!-- Product Quantity -->
						<div class="product_quantity_container">
						
						</div>
						<div class="button cart_button"><a href="index.php?page_layout=add_cart&product_id=<?php echo $row1['product_id'];?>">Add to cart</a></div>
					</div>

						<!-- Share -->
						<div class="details_share">
							<span>Share:</span>
							<ul>
								<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="products_title">Related Products</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<div class="product_grid">
					<?php while($row=mysqli_fetch_assoc($query)){?>
						<!-- Product -->
						<div class="product">
							<div class="product_image"><img src="http://localhost/projectdatabase/upload/product/<?php echo $row['image_link'] ?>" alt=""></div>
							<div class="product_extra product_new"><a href="categories.html">New</a></div>
							<div class="product_content">
								<div class="product_title"><a href="index.php?page_layout=product&product_id=<?php echo $row['product_id'] ?>">
								<?php echo $row['name'] ?></a></div>
								<div class="details_discount"style="color: black">$<?php echo $row['price']?></div>
						<div class="details_price" style="color: red">$<?php echo ($row['price']-$row1['discount']); ?></div>

								
							</div>
					
						</div>
						<?php } ?>
						

						

						

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	

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
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/product.js"></script>
</body>
</html>