<?php 
$sql = "SELECT * FROM catalog  ";
$query=mysqli_query($connect,$sql);
$sql1 = "SELECT * FROM brand  ";
$query1=mysqli_query($connect,$sql1);
$arr=array();
while($row1=mysqli_fetch_assoc($query1)){$arr+=array($row1['brand_id']=>$row1['brand_name']);}
?>
<header class="header">
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo"><a href="index.php">Tech Shop</a></div>
							<nav class="main_nav">
								<ul>
									<li class="hassubs">
										<a href="index.php">Home</a>
										
									</li>
									<?php while($row=mysqli_fetch_assoc($query)){?>
										<li class="hassubs">
										<a href="index.php?page_layout=categories&catalog_id=<?php echo $row['cata_id'] ?>"><?php echo $row['cata_name'] ?></a>
										<ul><?php foreach($arr as $key => $value){?>
											<li><a href="index.php?page_layout=categories&catalog_id=<?php echo $row['cata_id'] ?>&brand_id=<?php echo $key ?>"><?php echo $value ?></a></li>
											<?php } ?>
										</ul>
									</li>
										<?php } ?>
									
									<li><a href="index.php?page_layout=contact">Contact</a></li>
								</ul>
							</nav>
							<div class="header_extra ml-auto">
							<?php include_once('cart/cart_noti.php'); ?>
								
								<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
	</header>
