<!DOCTYPE html>
<?php
	include 'dbconnect.php';
	include 'softwork.php';

	if (isset($_GET['detail'])) {
		$get = htmlentities($_GET['detail']);
	}

	if (number_format($get)){
		$sel = "select * from product where id = {$get}";
		$run_sel = mysqli_query($conn, $sel);
		if (mysqli_num_rows($run_sel) > 0) {
			$output = mysqli_fetch_assoc($run_sel);
		}else(header("location: without-sidebar.php"));
	}else(header("location: without-sidebar.php"));

	
		
?>
<html lang="en">

<!-- Mirrored from 8theme.com/demo/html/xstore/without-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Jun 2017 01:39:05 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="UTF-8">
	<title>XStore</title>
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
<div class="fakeLader"></div>
<nav id="menu" class="menu slideout-menu">
	<div class="search">
		<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
		<form>
			<input type="text" value="" placeholder="Type here..." autocomplete="off" name="s">
		</form>
	</div>
	<ul>
		<li><a href="#">Phones & Tablet</a></li>
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
						<li><a href="#">item-show</a></li>
					</ul>
					<h2>Product Detail</h2>
					<a href="javascript: history.go(-1)" class="back">Return to Previous Page</a>
				</div>
			</div>
		</div>
	</div><!--breadcrumbs-->
<main>
	<div class="container cover">
		<div class="row">
			<div class="col-md-3 col-sm-12">
				<div class="side-pics col-md-12 col-sm-6 col-lg-12"><a href="<? echo "upload/{$output['pic1']}" ?>"><img src="<? echo "upload/{$output['pic1']}" ?>""></a></div>
				<div class="side-pics col-md-12 col-sm-6 col-lg-12"><a href="<? echo "upload/{$output['pic2']}" ?>"><img src="<? echo "upload/{$output['pic2']}" ?>""></a></div>
			</div>
			<div class="marginal col-md-6 col-sm-12">
				<table cellspacing="0" cellpadding="10">
					<thead >
						<tr>
							<th colspan="2" style="padding: 10px;"><h1><? echo "{$output['pro_name']}" ?></h1></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="lb">Price:</td><td><? echo "{$output['amount']}" ?> Negotiable</td>
						</tr>
						<tr>
							<td class="lb">Description:</td><td><? echo "{$output['descr']}" ?></td>
						</tr>
						<tr>
							<td colspan="2" style="font-size: 18px; color: #8B7355; font-weight: bold; padding-bottom: 0; height: 40px;">Owner's Details</td>
						</tr>
						<tr>
							<td class="lb">Name:</td><td><? echo "{$output['name']}" ?></td>
						</tr>
						<tr>
							<td class="lb">Mobile No:</td><td><? echo "{$output['phone']}" ?></td>
						</tr>
						<tr>
							<td class="lb">E-Mail:</td><td><? echo "{$output['email']}" ?></td>
						</tr>
						<tr>
							<td class="lb">Town: </td><td><? echo "{$output['town']}, " . "{$output['lga']}" ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-3 col-sm-12">
				<div class="side-pics col-md-12 col-sm-6 col-lg-12"><a href="<? echo "upload/{$output['pic3']}" ?>"><img src="<? echo "upload/{$output['pic3']}" ?>"></a></div>
				<div class="side-pics col-md-12 col-sm-6 col-lg-12"><a href="<? echo "upload/{$output['pic4']}" ?>"><img src="<? echo "upload/{$output['pic4']}" ?>"></a></div>
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