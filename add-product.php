<!DOCTYPE html>
<?php session_start();
	include 'dbconnect.php';
	include 'softwork.php';

	function imageType($type)
	{
		if($type != "jpg" && $type != "png" && $type != "jpeg" && $type != "gif" ) {
			return TRUE;	
		}
	}
	if (isset($_SESSION['reg'])) {//fetching the data of the registered member
		$qry = "select * from users where id = {$_SESSION['reg']}";
		$qry_run = mysqli_query($conn, $qry);
		$qry_fetch = mysqli_fetch_assoc($qry_run);
		
	}

	if(isset($_POST['submit'])) {
		$pro_name = mysql_real_escape_string($_POST['pro_name']);
		$descr = mysql_real_escape_string($_POST['descr']);
		$amount = mysql_real_escape_string($_POST['amount']);
		$town = mysql_real_escape_string($_POST['town']);
		$lga = mysql_real_escape_string($_POST['lga']);
		$name = mysql_real_escape_string($_POST['name']);
		$phone = mysql_real_escape_string($_POST['phone']);
		$email = mysql_real_escape_string($_POST['email']);
		$cat = mysql_real_escape_string($_POST['cat']);
		$date = date('M d Y @ H:i', time());
// var_dump($phone);
// die();
		$nego = "";
		if (isset($_POST['nego'])) {
			$nego = "1";
		}else{ $nego= "0"; }
		$reg_id = "";
		if (isset($_SESSION['reg'])) {
			$reg_id = $_SESSION['reg'];
		}else{$reg_id = 0;}

		//image upload.. 
		$target_dir = "upload/";
		$pic1 = basename($_FILES['pic1']['name']);
		$pic2 = basename($_FILES['pic2']['name']);
		$pic3 = basename($_FILES['pic3']['name']);
		$pic4 = basename($_FILES['pic4']['name']);

		$target_file1 = $target_dir . $pic1;
		$target_file2 = $target_dir . $pic2;
		$target_file3 = $target_dir . $pic3;
		$target_file4 = $target_dir . $pic4;

		$imageFileType = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
		$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
		$imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
		$imageFileType4 = strtolower(pathinfo($target_file4,PATHINFO_EXTENSION));




		$result = "";

		if(empty($cat)||empty($pro_name)||empty($descr)||empty($amount)||empty($pic1)||empty($pic2)||empty($pic3)||empty($pic4)||empty($town)||empty($lga)||empty($name)||empty($phone)||empty($email)||empty($pic1)||empty($pic2)||empty($pic2)||empty($pic4))
		{
			$result = "<script>alert('All field must be filled')</script>";
		}else
		{ 
			$type1 = imageType($imageFileType);
			$type2 = imageType($imageFileType2);
			$type3 = imageType($imageFileType3);
			$type4 = imageType($imageFileType4);


			if (($type1 == TRUE) || ($type2 == TRUE) || ($type3 == TRUE) || ($type4 == TRUE)){
				echo "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
			}else
			{
				$save_pro = "INSERT INTO `product` VALUES ('','$cat','$pro_name','$descr','$amount','$nego','$pic1','$pic2','$pic3','$pic4','$town','$lga','$name','$phone','$email','$date','$reg_id')";

				if($que_run = mysqli_query($conn, $save_pro)){
					// MOVE IMAGE FILES TO THERE DESTINATION
					move_uploaded_file($_FILES['pic1']['tmp_name'], $target_file1);
					move_uploaded_file($_FILES['pic2']['tmp_name'], $target_file2);
					move_uploaded_file($_FILES['pic3']['tmp_name'], $target_file3);
					move_uploaded_file($_FILES['pic4']['tmp_name'], $target_file4);

					$result = "<script> alert('Hello ".$name.", your product has been posted to the home page.')</script>";
				}else 
				{
					$damn = "Oops! An error occur. Unable to save";
					$result =  "<script> alert('$damn')</script>";
				}
			}
		}

		echo $result;
	}

?>
<html lang="en">

<!-- Mirrored from 8theme.com/demo/html/xstore/without-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Jun 2017 01:39:05 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="UTF-8">
	<title>Add-up Product</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5">
	<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/layerslider.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900|Open+Sans:300,400,600,700|Montserrat:400,700|Roboto+Condensed:300i,400,400i,700|Palanquin:300,400,500,700|Roboto:300,400,500,700" rel="stylesheet">
</head>
<body>
<div class="fakeLaoder"></div>
<nav id="menu" class="menu slideout-menu">
	<div class="search">
		<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
		<form>
			<input type="text" value="" placeholder="Type here..." autocomplete="off" name="s">
		</form>
	</div>
	<ul>
		<li><a href="">Phones & Tablet</a></li>
		<li><a href="#">Vehicles</a></li>
		<li><a href="#">electronics</a></li>
		<li><a href="#">fashions & beauty</a></li>
		<li><a href="#">lands & houses</a></li>
		<li><a href="#">pets & animal</a></li>
		<li><a href="#">jobs & services</a></li>
		<li><a href="#">homes & furniture</a></li>
		<li><a href="#">others</a></li>
	</ul>
	<ul class="link">
		<li><a href="#"><i class="fa fa-envelope-o"></i>Newsletter</a></li>
		<li><a href="my-account.html">sign in</a></li>
	</ul>
	<ul class="social-icon">
		<li><a href="https://www.facebook.com/8theme/" class="follow-facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<li><a href="https://twitter.com/8theme" class="follow-twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<li><a href="https://www.instagram.com/8theme_ltd/" class="follow-instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
		<li><a href="https://plus.google.com/+8theme/posts" class="follow-google" target="_blank"><i class="fa fa-google"></i></a></li>
		<li><a href="https://www.youtube.com/user/8theme/feed" class="follow-youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
	</ul>
</nav>

<main id="panel" class="panel">

	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><a href="#">Add-Product</a></li>
					</ul>
					<h2>Add Product</h2>
					<a href="javascript: history.go(-1)" class="back">Return to Previous Page</a>
				</div>
			</div>
		</div>
	</div><!--breadcrumbs-->
<main>

	<div class="container">
		<div class="row">
			<div class="add-product">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<form action="<?php echo htmlentities($_SERVER["PHP_SELF"])?>" method="POST" enctype="multipart/form-data">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<p>
								<label for="cat">Select Category: </label>
								<select required="required" name="cat" id="cat">
									<option value="phones" class="pro-cat">Phones & Tablets</option>
									<option value="vehicles" class="pro-cat">Vehicles</option>
									<option value="electronics" class="pro-cat">Electronics</option>
									<option value="fashions" class="pro-cat">Fashions & Beauty</option>
									<option value="lands" class="pro-cat">Lands & Houses</option>
									<option value="animals" class="pro-cat">Pets & Animals</option>
									<option value="jobs" class="pro-cat">Jobs & Services</option>
									<option value="furniture" class="pro-cat">Homes & Furniture</option>
									<option value="others" class="pro-cat">Others</option>
								</select>
							</p><br>
							<p>
								<label for="pro_name">Product Name: </label> <input required="required" title="Put the item name not more than 32 characters" type="text" name="pro_name" id="Product"> <br>
								<label class="amount" for="amount">Amount: </label> <input required="required" title="Amount in Naira" placeholder="#" type="text" name="amount" id="Product">
								<p><label style="font-size: 12px; color: #9a9a9a" title="tick if the price is negotiatable" for="nego">negotiatable? </label> <input type="checkbox" name="nego">
								</p><br>
								<label for="descr">Product Description: </label> <textarea required="required" type="text" name="descr" id="descr" rows="6" cols="10"></textarea> <br><br><br>
							
								<label>Product Photos: </label><br>
								<label class="pro-pics" onchange="alert('Photo 1 added')">Add Photo +<input required="required" type="file" name="pic1"></label>
								<label class="pro-pics" onchange="alert('Photo 2 added')">Add Photo +<input required="required" type="file" name="pic2"></label>
								<label class="pro-pics" onchange="alert('Photo 3 added')">Add Photo +<input required="required" type="file" name="pic3"></label>
								<label class="pro-pics" onchange="alert('Photo 4 added')">Add Photo +<input required="required" type="file" name="pic4"></label>

 
							</p><br>
							
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							 <p>
								<label>Town: </label><input required="required" type="text" name="town" title="Where to locate your product"> <br>
								<label>L.G.A: </label><br>
									<select required="required" name="lga" id="lga">
										<option value="okitipupa">Okitipupa L.Govrt</option>
										<option value="irele">Irele L.Govrt</option>
										<option value="odigbo">Odigbo L.Govrt</option>
										<option value="eseodo">Eseodo L.Govrt</option>
										<option value="ilaje">Ilaje L.Govrt</option>
										<option value="igbokoda">Igbokoda L.Govrt</option>
									</select> <br>
							</p>
							<br><br>
							<p>
								<h3>Your Contacts</h3><br><br>

								<label>Your Name: </label><input value="<? if (isset($qry_fetch)) echo $qry_fetch['fullname'];?>" required="required" type="text" name="name" title="Product's Owners' name"> <br>
								<label>Mobile No: </label><input value="<? if (isset($qry_fetch)) echo $qry_fetch['phone'];?>" required="required" type="text" name="phone" title="Product's Owners' Phone number" number> <br>
								<label>E-mail: </label><input value="<? if (isset($qry_fetch)) echo $qry_fetch['email'];?>" required="required" type="email" name="email" title="Product's Owners' e-mail if available">
							</p>
							<p><input class="submit" type="submit" name="submit" value="POST PRODUCT"></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>

<script type="text/javascript" src="js/lib/jquery.js"></script>
<script type="text/javascript" src="js/lib/fakeLoader.min.js"></script>
<script type="text/javascript">
$(".fakeLoader").fakeLoader({
	timeToHide: 2000, 
	zIndex: "9999999",
	spinner: "spinner7",
	bgColor: "#f5f5f5",
});
</script>
<script type="text/javascript">
	function changeImg1(source){
    	$('.menu_img').attr('src', source + '.jpg');
	};
</script>
<script type="text/javascript" src="js/lib/bootstrap.min.js"></script>
<script type="text/javascript" src="js/lib/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/lib/slideout-min.js"></script>
<script type="text/javascript" src="js/lib/greensock.js"></script>
<script type="text/javascript" src="js/lib/layerslider.transitions.js"></script>
<script type="text/javascript" src="js/lib/layerslider.kreaturamedia.jquery.js"></script>
<script type="text/javascript" src="js/lib/paraxify.js"></script>
<script type="text/javascript" src="js/lib/jquery.infinitescroll.min.js"></script>
<script type="text/javascript" src="js/lib/jquery.filterizr-min.js"></script>
<script type="text/javascript" src="js/lib/swiper.min.js"></script>
<script type="text/javascript" src="js/lib/TimeCircles-min.js"></script>
<script type="text/javascript" src="js/lib/jquery-ui-min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVO9SNQMQTcnMb_rntzxHYacRyn84FvVc"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>

<!-- Mirrored from 8theme.com/demo/html/xstore/without-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Jun 2017 01:39:05 GMT -->
</html>