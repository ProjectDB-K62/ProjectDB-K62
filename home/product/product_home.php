<?php
	$query=mysqli_query($connect,"SELECT * from product order by product_id DESC limit 8")
?>
<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="product_grid">
					<?php while($row=mysqli_fetch_assoc($query)){?>
						<!-- Product -->
						<div class="product">
							<div class="product_image"><img src="http://localhost/projectdatabase/upload/product/<?php echo $row['image_link']; ?>" alt=""></div>
							<div class="product_extra product_new"><a href="categories.html">New</a></div>
							<div class="product_content">
								<div class="product_title"><a href="index.php?page_layout=product&product_id=<?php echo $row['product_id'] ?>"><?php echo $row['name']; ?></a></div>
								<div class="details_discount" ><strike>$<?php echo $row['price']?></strike></div>
								<div class="product_price" style="color: red">$<?php echo $row['price']-$row['discount']; ?></div>
							</div>
						</div>
					<?php } ?>
					</div>
						
				</div>
			</div>
		</div>
	</div>