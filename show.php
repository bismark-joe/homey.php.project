<!DOCTYPE html>
<?php session_start();
	include 'dbconnect.php';
	include 'softwork.php';

	if (isset($_GET['detail'])) {
		$get = htmlentities($_GET['detail']);
	}

	if (number_format($get)){#getting url data using GET method
		$sel = "select * from product where id = {$get}";
		$run_sel = mysqli_query($conn, $sel);
		if (mysqli_num_rows($run_sel) > 0) {
			$output = mysqli_fetch_assoc($run_sel);
		}else(header("location: index.php"));
	}else(header("location: index.php")); 

 # To fetch other products of the registered user
		if ($output['reg_id'] > 0 ) {
			$qry = "select * from product where phone = {$output['phone']} order by id desc limit 4";
			$qry_run = mysqli_query($conn, $qry);
		}
			$qry_odd = "select * from product where mod(id,2)<>0 and cat = 'phones' order by id desc limit 4";
			$qry_run_odd = mysqli_query($conn, $qry_odd);
			$qry_even = "select * from product where mod(id,2)=0 and cat = 'phones' order by id desc limit 4";
			$qry_run_even = mysqli_query($conn, $qry_even);

?>
<html lang="en">

<!-- Mirrored from 8theme.com/demo/html/xstore/default-tabs.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Jun 2017 01:43:35 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="UTF-8">
	<title>Item-show</title>
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
<main id="panel" class="panel">
	
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><a href="#">Item-show</a></li>
					</ul>
					<h2><? echo "{$output['pro_name']}" ?></h2>
					<a href="javascript: history.go(-1)" class="back">Return to Previous Page</a>
				</div>
			</div>
		</div>
	</div><!--breadcrumbs-->
	<div class="container">
		<div class="single-product">
			<div class="row">
				<div class="col-md-9 product-content">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div id="carousel-example-generic" class="carousel carousel-product" data-ride="carousel" data-interval="false">
								<ol class="carousel-indicators">
									<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									<li data-target="#carousel-example-generic" data-slide-to="1"></li>
									<li data-target="#carousel-example-generic" data-slide-to="2"></li>
									<li data-target="#carousel-example-generic" data-slide-to="3"></li>
								</ol>
								<div class="carousel-inner">
								    <div class="item active">
										<a href="<? echo "upload/{$output['pic1']}" ?>"><img src="<? echo "upload/{$output['pic1']}" ?>" alt="product-img" class="img-responsive"></a>
								    </div>

								    <div class="item">
										<a href="<? echo "upload/{$output['pic2']}" ?>"><img src="<? echo "upload/{$output['pic2']}" ?>" alt="product-img" class="img-responsive"></a>
								    </div>

								    <div class="item">
										<a href="<? echo "upload/{$output['pic3']}" ?>"><img src="<? echo "upload/{$output['pic3']}" ?>" class="img-responsive"></a>
								    </div>

								    <div class="item">
										<a href="<? echo "upload/{$output['pic4']}" ?>"><img src="<? echo "upload/{$output['pic4']}" ?>" alt="product-img" class="img-responsive"></a>
								    </div>
								</div><!--carousel-inner-->

								 <!-- Controls -->
								<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
									<i class="fa fa-angle-left" aria-hidden="true"></i>
								</a>
								<a class="right carousel-control" href="#carousel-example-generic" role="button" 	data-slide="next">
									<i class="fa fa-angle-right" aria-hidden="true"></i>
								</a>

								<!-- Thumbnails --> 
								<ul class="thumbnails-carousel clearfix">
									<li><img src="<? echo "upload/{$output['pic1']}" ?>" alt="thumbnails"></li>
									<li><img src="<? echo "upload/{$output['pic2']}" ?>" alt="thumbnails"></li>
									<li><img src="<? echo "upload/{$output['pic3']}" ?>" alt="thumbnails"></li>
									<li><img src="<? echo "upload/{$output['pic4']}" ?>" alt="thumbnails"></li>
								</ul>
							</div><!--carousel-example-generic-->
						</div>
						<div class="col-md-6 col-sm-12">
							<h4 class="title"><? echo "{$output['pro_name']}" ?></h4>
							<a href="#" class="products-cats"><? echo "{$output['cat']}" ?></a>
							<div class="star-rating">
								<img src="images/star.png" alt="star">
								<a href="#">(1 customer review)</a>
							</div>

							<div class="description">
								<p><? echo "{$output['descr']}" ?></p>
								<div class="price">#<? echo "{$output['amount']}" ?></div>
								<p><b>Onwner's Details</b></p>
								<label>Name:</label>
								<p><? echo "{$output['name']}" ?></p>
								<label>Email:</label>
								<p><? echo "{$output['email']}" ?></p>
							</div><!--description-->
							<div style="margin-bottom: 5px;" class="variations">
								<select name="color">
									<option selected="selected">Phone Number</option>
									<option value="Black"><? echo "{$output['phone']}" ?></option>
								</select>
							</div><!--variations-->
							<a href="#" class="wishlist btn">Do you like it?</a>
							<div class="product_meta">
								<span class="sku"><b>Owner's Location </b></span>
								<span class="tags"><? echo "{$output['town']}" ?> in <? echo "{$output['lga']}" ?> Local Government Area </span>
							</div><!--product_meta-->
							<ul class="social-icon">
								<li class="first"><span>Share Social</span></li>
								<li><a href="https://www.facebook.com/8theme/" class="follow-facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/8theme" class="follow-twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.instagram.com/8theme_ltd/" class="follow-instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://plus.google.com/+8theme/posts" class="follow-google" target="_blank"><i class="fa fa-google"></i></a></li>
								<li><a href="https://www.youtube.com/user/8theme/feed" class="follow-youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
							</ul><!--social-icon-->
						</div>
					</div>
				</div><!--product-content-->
				<div class="col-md-3 single-product-sidebar">
					<div class="product-brands">
						<h5>Here are the other products from <br> <? echo "{$output['name']}" ?></h5><br><hr>
						<div class='sidebar-slider'>
						<?
							while (@$qry_fetch = mysqli_fetch_assoc($qry_run)) {

								echo "
									
										<div class='item'>
											<div class='product'>
												<img src='upload/{$qry_fetch['pic1']}' alt='Product Image'>
												<div class='product-details'>
													<h3 class='product-title'><a href='show.php?detail={$qry_fetch['id']}'>{$qry_fetch['pro_name']}</a></h3>
													<div class='price'>#{$qry_fetch['amount']}</div>
												</div>
											</div>
											
										</div>
									
								";
							}#else{echo "$output['name'] HAS NO OTHER UPLOAD";}
						?>
						</div>
					</div><!--product-brands-->
					<div class="slider">
						<h5>our offers</h5>
						<div class='sidebar-slider' style'float: left;'>
						<?
							while (@($qry_fetch_odd = mysqli_fetch_assoc($qry_run_odd)) && @($qry_fetch_even = mysqli_fetch_assoc($qry_run_even))) {
								echo "
									
										<div class='item'>
											<div class='product'>
												<img src='upload/{$qry_fetch_odd['pic1']}' alt='Product Image'>
												<div class='product-details'>
													<h3 class='product-title'><a href='show.php?detail={$qry_fetch_odd['id']}'>{$qry_fetch_odd['pro_name']}</a></h3>
													<div class='price'>#{$qry_fetch_odd['amount']}</div>
												</div>
											</div>
											<div class='product'>
												<img src='upload/{$qry_fetch_even['pic1']}' alt='Product Image'>
												<div class='product-details'>
													<h3 class='product-title'><a href='show.php?detail={$qry_fetch_even['id']}'>{$qry_fetch_even['pro_name']}</a></h3>
													<div class='price'>#{$qry_fetch_even['amount']}</div>
												</div>
											</div>
										</div>
									
								";
							}
						?>
						</div>
					</div><!--slider-->
					<div class="qr-code">
						<h5>qr codes</h5>
						<p>Click on the image to get<br>the QR link to this page.</p>
					</div><!--qr-code-->
				</div><!--single-product-sidebar-->
			</div>

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

<!-- Mirrored from 8theme.com/demo/html/xstore/default-tabs.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Jun 2017 01:43:44 GMT -->
</html>