<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>
<?php 
								$ct_name="";$ct_email='';$ct_message='';$subject="";
								if ($_SERVER["REQUEST_METHOD"] == "POST") {
    								if(isset($_POST["ct_name"])) { $ct_name = $_POST['ct_name']; }
									if(isset($_POST["ct_email"])) { $ct_email = $_POST['ct_email']; }
									if(isset($_POST["ct_message"])) { $ct_message = $_POST['ct_message']; }
									if(isset($_POST["subject"])) { $subject = $_POST['subject']; }
									$sql1 = "INSERT INTO feedback (customer_name, customer_email,feedback,message) VALUES ('$ct_name','$ct_email','$subject','$ct_message')";
								}
								mysqli_query($connect, $sql1);
								if (isset($_POST['ct_message'])){
									header("Location: index.php?page_layout=sendct");
								  }
									 ?>
<body>

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
						<div class="section_title">Get in Touch</div>
						<div class="section_subtitle">Say hello</div>
						<div class="contact_form_container">
							<form action="#" id="contact_form" class="contact_form" method="POST">
								
								<div>
										<label for="contact_name"> Name*</label>
										<input type="text" id="contact_name" class="contact_input" required="required" name="ct_name">
									</div>
									<div>
										<label for="contact_name"> Email*</label>
										<input type="text" id="contact_name" class="contact_input" required="required" name="ct_email" >
									</div>
								
								<div>
									<!-- Subject -->
									<label for="contact_company">Subject</label>
									<input type="text" id="contact_company" class="contact_input" name="subject">
								</div>
								<div>
									<label for="contact_textarea">Message*</label>
									<textarea id="contact_textarea" class="contact_input contact_textarea" required="required" name="ct_message"></textarea>
								</div>
								<button class="button contact_button" type="submit" ><span>Send Message</span></button>
							</form>
						</div>
					</div>
				</div>

				<!-- Contact Info -->
				<div class="col-lg-3 offset-xl-1 contact_col">
					<div class="contact_info">
						<div class="contact_info_section">
						</br> </br>
							<div class="contact_info_title">Marketing</div>
							<ul>
								<li>Name: <span>Nguyen Cong</span></li>
								<li>Phone: <span>0904547863</span></li>
								<li>Email: <span>NguyenCong@gmail.com</span></li>
							</ul>
						</div>
						<div class="contact_info_section">
							<div class="contact_info_title">Shippiing & Returns</div>
							<ul>
								<li>Name: <span>Ninh Bich</span></li>
								<li>Phone: <span>0585246877</span></li>
								<li>Email: <span>NinhBich@gmail.com</span></li>
							</ul>
						</div>
						<div class="contact_info_section">
							<div class="contact_info_title">Information</div>
							<ul>
								<li>Name: <span>Tran Cong</span></li>
								<li>Phone: <span>0384190602</span></li>
								<li>Email: <span>TranCong@gmail.com</span></li>
							</br>
								<li>Name: <span>Duong Duc</span></li>
								<li>Phone: <span>0384190604</span></li>
								<li>Email: <span>DuongDuc@gmail.com</span></li>

							
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row map_row">
				<div class="col">

					<!-- Google Map -->
					<div class="map">
						<div id="google_map" class="google_map">
							<div class="map_container">
								<div id="map"></div>
							</div>
						</div>
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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="js/contact.js"></script>
</body>
</html>