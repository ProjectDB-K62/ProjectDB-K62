<?php
	
		$catalog_id = $_GET['catalog_id'];
		
		if(isset($_GET['brand_id'])){
		$brand_id= $_GET['brand_id'];
		$sql = "SELECT * FROM product WHERE catalog_id=$catalog_id AND brand_id=$brand_id";}
		else{$sql = "SELECT * FROM product WHERE catalog_id=$catalog_id";}
	
	$query=mysqli_query($connect,$sql);
	$dem = mysqli_num_rows($query);
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Categories</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/categories.css">
<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
</head>
<body>


	
	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<!-- Product Sorting -->
					<div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
						<div class="results">Showing <span><?php echo $dem ?></span> results</div>
						<div class="sorting_container ml-md-auto">
							<div class="sorting">
								<ul class="item_sorting">
									<li>
										<span class="sorting_text">Sort by</span>
										<i class="fa fa-chevron-down" aria-hidden="true"></i>
										<ul>
											<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default</span></li>
											<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
											
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<div class="product_grid">
					<?php while($row=mysqli_fetch_assoc($query)){?>
						<!-- Product -->
						<div class="product">
							<div class="product_image"><img src="http://localhost/projectdatabase/upload/product/<?php echo $row['image_link']; ?>" alt=""></div>
							<div class="product_content">
								<div class="product_title"><a href="index.php?page_layout=product&product_id=<?php echo $row['product_id'] ?>"><?php echo $row['name']; ?></a></div>
								<div class="details_discount" style="color: red"><strike>$<?php echo $row['price']?></strike></div>
								<div class="product_price">$<?php echo $row['price']-$row['discount']; ?></div>
							</div>
						</div>
					<?php } ?>

					</div>
						
				</div>
			</div>
		</div>
	</div>

	<!-- Icon Boxes -->

	<!-- Newsletter -->

	<!-- Footer -->
	
	

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
<script src="js/categories.js"></script>
</body>
</html>