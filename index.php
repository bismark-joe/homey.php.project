<!DOCTYPE html>
<?php session_start();
include 'dbconnect.php';
  //this part talks about paging
	$call = "select * from product order by id asc";
    $run_sel = mysqli_query($conn, $call);
    $num_of_rows = mysqli_num_rows($run_sel);
    $max_page = $num_of_rows/12;
    if ($max_page> (int)$max_page) {
    	$max_page = (int)$max_page +1;
    }
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
		   // cast var as int
	   $currentpage = (int)$_GET['page'];
   	}else{
   		$currentpage = 1;
   	}
   	if ($currentpage >$max_page) {
   		$currentpage =$max_page;
   	}
   	$offset = ($currentpage-1) * 12;

   	$pagestart = (($currentpage-1) * 12) +1;
   	$pageend = $currentpage*12;
   	if ($pageend > $num_of_rows) {
   		$pageend = $num_of_rows;
   	}

	if($_SERVER["REQUEST_URI"] === '/newone/index.php/logout') {
		session_destroy();
		header("REFRESH: 0; URL=../index.php");
		exit();
	}
 
?>
<html lang="en">

<!-- Mirrored from 8theme.com/demo/html/xstore/without-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Jun 2017 01:39:05 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="UTF-8">
	<title>Awawa Store</title>
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
<div class="fakeLoader"></div>
<nav id="menu" class="menu slideout-menu">
	<div class="search">
		<a href="#" onclick="$('#test').click()" class="search-btn"><i class="fa fa-search"></i></a>
		<form id="sform" method="post" action="index.php">
			<input onchange="$('#test').click()" type="text" value="" placeholder="Type here..." autocomplete="off" name="m_search">
			<input type="submit" id="test" name="search" style="visibility:hidden;">
		</form>
	</div>
	<ul>
		<li><a href="index.php?item=phone">Phones & Tablet</a></li>
		<li><a href="index.php?item=vehicles">Vehicles</a></li>
		<li><a href="index.php?item=electronics">electronics</a></li>
		<li><a href="index.php?item=fashions">fashions & beauty</a></li>
		<li><a href="index.php?item=lands">lands & houses</a></li>
		<li><a href="index.php?item=animals">pets & animals</a></li>
		<li><a href="index.php?item=jobs">jobs & services</a></li>
		<li><a href="index.php?item=furniture">homes & furniture</a></li>
		<li><a href="index.php?item=others">others</a></li>
	</ul>
	<ul class="link">
		<li><a href="#"><i class="fa fa-envelope-o"></i>Newsletter</a></li>
		<li><a href="my-account.html">sign in</a></li>
	</ul>
	<ul class="social-icon">
		<li><a href="<? echo htmlentities($_SERVER["PHP_SELF"])?>/logout" class="" target="">Logout</a></li>
	</ul>
</nav>

<main id="panel" class="panel">
	<header id="header">
	
		<div class="top-bar">
			<div class="languages-area">
				
				<div class="text-top">
					<p>Call us <a href="tel:+2347031123695" class="active-color">(+234) 7031123695</a></p>
				</div>
			</div><!--languages-area-->
			<div class="top-panel-open">
			<?php
				if (isset($_SESSION['reg'])) {
					$qry = "select * from users where id = {$_SESSION['reg']}";
					$qry_run = mysqli_query($conn, $qry);
					$qry_fetch = mysqli_fetch_assoc($qry_run);
					echo strtoupper($qry_fetch['fullname']);
				}
			?>
			</div><!--top-panel-open-->
			<div class="top-links">
				<div class="login-link">
					<a href="sign_up.php">Sign In <b>or</b> Create an account</a>
				</div><!--login-link-->
				<ul class="social-icon">
					<li><a href="<? echo htmlentities($_SERVER["SCRIPT_NAME"])?>/logout" class="" target="">Logout</a></li>
				</ul><!--social-icon-->
			</div><!--top-links-->
		</div><!--top-bar-->
		<div class="container-fluid">
			<div class="header">
				<div class="header-logo">
					<a href="index.html"><img src="images/logo.png" alt="logo"></a>
				</div><!--header-logo-->
				<div class="menu">
					<ul>
						<li><a href="index.php?item=phone">Phones & Tablet</a></li>
						<li><a href="index.php?item=vehicles">Vehicles</a></li>
						<li><a href="index.php?item=electronics">electronics</a></li>
						<li><a href="index.php?item=fashions">fashions & beauty</a></li>
						<li><a href="index.php?item=lands">lands & houses</a></li>
						<li><a href="index.php?item=animals">pets & animals</a></li>
						<li><a href="index.php?item=jobs">jobs & services</a></li>
						<li><a href="index.php?item=furniture">homes & furniture</a></li>
						<li><a href="index.php?item=others">others</a></li>
					</ul>
				</div><!--menu-->
					<button class="btn-hamburger js-slideout-toggle">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
			</div><!--header-->
		</div>
		<div class="container-fluid fixed-header">
			<div class="header">
				<div class="header-logo">
					<a href="index.html"><img src="images/logo.png" alt=""></a>
				</div><!--header-logo-->
				<div class="menu">
					<ul>
						<li><a href="index.php?item=phone">Phones & Tablet</a></li>
						<li><a href="index.php?item=vehicles">Vehicles</a></li>
						<li><a href="index.php?item=electronics">electronics</a></li>
						<li><a href="index.php?item=fashions">fashions & beauty</a></li>
						<li><a href="index.php?item=lands">lands & houses</a></li>
						<li><a href="index.php?item=animals">pets & animals</a></li>
						<li><a href="index.php?item=jobs">jobs & services</a></li>
						<li><a href="index.php?item=furniture">homes & furniture</a></li>
						<li><a href="index.php?item=others">others</a></li>				
					</ul>
				</div><!--menu-->
				<button class="btn-hamburger toggle-button">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div><!--header-->
		</div>
	</header>
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><a href="#">Shop</a></li>
					</ul>
					<h2>Shop</h2>
					<a href="javascript: history.go(-1)" class="back">Return to Previous Page</a>
				</div>
			</div>
		</div>
	</div><!--breadcrumbs-->
	<div class="container">
<?php
$sel= "";
	if (isset($_GET['item'])) {
		if ($_GET['item'] == "phone") {
			$sel = "select * from product where cat = 'phones' order by id desc limit $offset, 12";
		}
		elseif ($_GET['item'] == "vehicles") {
			$sel = "select * from product where cat = 'vehicles' order by id desc limit $offset, 12";
		}
		elseif ($_GET['item'] == "electronics") {
			$sel = "select * from product where cat = 'electronics' order by id desc limit $offset, 12";
		}
		elseif ($_GET['item'] == "fashions") {
			$sel = "select * from product where cat = 'fashions' order by id desc limit $offset, 12";
		} 
		elseif ($_GET['item'] == "lands") {
			$sel = "select * from product where cat = 'lands' order by id desc limit $offset, 12";
		} 
		elseif ($_GET['item'] == "animals") {
			$sel = "select * from product where cat = 'animals' order by id desc limit $offset, 12";
		} 
		elseif ($_GET['item'] == "jobs") {
			$sel = "select * from product where cat = 'jobs' order by id desc limit $offset, 12";
		} 
		elseif ($_GET['item'] == "furniture") {
			$sel = "select * from product where cat = 'furniture' order by id desc limit $offset, 12";
		} else {
			$sel = "select * from product where cat = 'others' order by id desc limit $offset, 12";
		}
		
	}
	elseif (isset($_POST['search'])) {
		$search = mysql_escape_string($_POST['m_search']);
		// echo "<script> alert('just testing $search')</script>";
		$sel = "select * from product where cat like '%{$search}%' order by id desc limit $offset, 12";
	}
	elseif (isset($_POST['locsearch'])) {
		$town = mysql_escape_string($_POST['town']);
		$lga = mysql_escape_string($_POST['lga']);
		if (empty($town)) {
			$sel = "select * from product where lga = '{$lga}' order by id desc limit $offset, 12";
		} else {
			$sel = "select * from product where lga = '{$lga}' and town = '{$town}' order by id desc limit $offset, 12";
		}
	}
	else {
		$sel = "select * from product order by id desc limit $offset, 12";
	}
	$run_sel = mysqli_query($conn, $sel);

?>
		<div class="content-products"> 
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="filter-wrap">
							<div class="col-lg-7">
								<form method="post" action="index.php">
									<div class="sort-local col-lg-4"><label>Town: </label> <input type="text" value="" placeholder="Type here..." name="town"><br> 
									</div>
									<div class="sort-local col-lg-4"><label>LGA: </label> <br>
										<select name="lga" id="lga">
											<option value="okitipupa">Okitipupa L.Govrt</option>
											<option value="irele">Irele L.Govrt</option>
											<option value="odigbo">Odigbo L.Govrt</option>
											<option value="eseodo">Eseodo L.Govrt</option>
											<option value="ilaje">Ilaje L.Govrt</option>
											<option value="igbokoda">Igbokoda L.Govrt</option>
										</select> 
									</div>
								    <div onclick="$('#locsearch').click()" class="sort-local col-lg-4 sort-btn"><a href="#" class="search-btn"><i class="fa fa-search"></i>Search</a>
								    </div>
								    <input type="submit" id="locsearch" name="locsearch" style="visibility:hidden;">
								</form>
							</div>
							<div class="navig col-xs-5"><a class="active-color" href="add-product.php">ADD PRODUCT</a></div>
							
					</div><!--filter-wrap-->
				</div>

				<div class="col-md-12 pro-ads">
				<div class="pro col-lg-9 col-md-9 col-xs-12">
					<div class="products-loop products-grid row">

					<?php 
						while ($output = mysqli_fetch_assoc($run_sel)) {
		
							echo "
								<div class='col-lg-3 col-md-3 col-sm-3 col-xs-6'>
									<div class='product'>
										<div class='mask-product'>
											<a href='show.php?detail={$output['id']}'><img src='upload/{$output['pic1']}' alt='ITEM IMAGE'>
											</a>
											<a href='show.php?detail={$output['id']}'><img class='image-swap' src='upload/{$output['pic2']}' alt='swiper-slide'>
											</a>
										</div><!--mask-product-->
										<div class='product-details'>
											<h3 class='product-title'><a href='#''>{$output['pro_name']}</a></h3>
											<div class='price'>#{$output['amount']}</div>
											<p>{$output['date']}</p>
										</div><!--product-details-->
									</div>
								</div>

								";
						}
					
					?>
						
					</div><!--products-loop products-grid-->

					<div class="pagination bottom">
						<p class="pull-left"><? echo "Showing $pagestart – $pageend of $num_of_rows results"; ?></p>
						<ul class="pull-right">
							<a href="<? echo htmlentities($_SERVER["PHP_SELF"])?>?page=<?if($currentpage>=$max_page){ echo $max_page;}else echo 1;?>"><li class="active">1</li></a>
							<a href="<? echo htmlentities($_SERVER["PHP_SELF"])?>?page=<?if($currentpage>=$max_page){ echo $max_page;}else echo 2;?>"><li>2</li></a>
							<li><span class="page-numbers dots">…</span></li>
							<a href="<? echo htmlentities($_SERVER["PHP_SELF"])?> ?page=<?if($currentpage>=$max_page){ echo $max_page;}else echo 3;?>"><li>3</li></a>
							<a href="<? echo htmlentities($_SERVER["PHP_SELF"])?>?page=<?if($currentpage>=$max_page){ echo $max_page;}else echo $currentpage+1;?>" class="next"><li><i class="fa fa-angle-double-right"></i></li></a>
						</ul>
					</div>
					<!--pagination bottom-->

				</div>

				<div class="col-lg-3 col-md-3 col-xs-12">
					<div class="product">
						<div class="mask-prduct">
							<img src="images/ads.jpg" width="80%" alt="Owl Image">
						</div><!--mask-product-->
					</div>
				</div>
				</div>
			</div>
		</div><!--content-products-->
		<div class="col-md-12 col-sm-12">
			<div class="row icon-text type-3">
				<div class="col-md-6 col-sm-6">
					<div class="inside">
						<figure>
							<i class="fa fa-globe"></i>
						</figure>
						<div class="text">
							<h3>About Us</h3>
							<p>We are team AWAWA, representing Ikale, Ilaje, and Apoi. We aim to make life stressfree for our people.</p>
						</div><!--text-->
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="inside">
						<figure>
							<i class="fa fa-truck"></i>
						</figure>
						<div class="text">
							<h3>Our Services</h3>
							<p>We chearfully connect the buyers with the sellers and makes the world an easy place. You can search for any product with its name and you can also check for the town plus the local goverment area it is located.</p>
						</div><!--text-->
					</div>
				</div>
			</div>
		</div>
	</div>
			
	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<img src="images/logo-footer.png" class="logo-footer" alt="logo-footer">
					<p>All we care about are our customers.</p>
					<address>
					<ul>
						<li>No 20 Ojokodo str,</li>
						<li>Ode-Aye, Ktp,</li>
						<li>OND, Nigeria.</li>
						<li>Email: <a href="#" class="active-color">skyjoebismark@gmail.com</a></li>
						<li>Phone: <a href="#" class="active-color">+234 703 112 3695</a></li>
					</ul>
					</address>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="widget-links">
						<h3 class="title-widget">Useful Links</h3>
						<ul class="first">
							<li><a href="#">Home Page</a></li>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Delivery Info</a></li>
							<li><a href="#">Conditions</a></li>
							<li><a href="#">Order Tracking</a></li>
							<li><a href="#">My Account</a></li>
							<li><a href="#">My Wishlist</a></li>
						</ul>
						<ul>
							<li><a href="#">San Fransisco</a></li>
							<li><a href="#">New Orlean</a></li>
							<li><a href="#">Seatle</a></li>
							<li><a href="#">Portland</a></li>
							<li><a href="#">Stockholm</a></li>
							<li><a href="#">Hoffenheim</a></li>
						</ul>
					</div><!--widget-links-->
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="widget-latest-posts">
						<h3 class="title-widget">Latest posts</h3>
						<ul>
							<li>
								<a href="#" class="pull-left"><img src="images/latest-footer.png" alt="latest-footer"></a>
								<div class="blog-details">
									<h2><a href="#">Corsectetur alequet</a></h2>
									<div class="meta-post">
										<div class="post-data"><i class="fa fa-calendar" aria-hidden="true"></i>November 29, 2016</div>
										<a href="#" class="post-comments"><i class="fa fa-comment" aria-hidden="true"></i>5 comments</a>
									</div>
								</div>
							</li>
							<li>
								<a href="#" class="pull-left"><img src="images/latest-footer2.png" alt="latest-footer"></a>
								<div class="blog-details">
									<h2><a href="#">Corsectetur alequet</a></h2>
									<div class="meta-post">
										<div class="post-data"><i class="fa fa-calendar" aria-hidden="true"></i>November 29, 2016</div>
										<a href="#" class="post-comments"><i class="fa fa-comment" aria-hidden="true"></i>0 comments</a>
									</div>
								</div>
							</li>
							<li>
								<a href="#" class="pull-left"><img src="images/latest-footer.png" alt="latest-footer"></a>
								<div class="blog-details">
									<h2><a href="#">Corsectetur alequet</a></h2>
									<div class="meta-post">
										<div class="post-data"><i class="fa fa-calendar" aria-hidden="true"></i>November 29, 2016</div>
										<a href="#" class="post-comments"><i class="fa fa-comment" aria-hidden="true"></i>5 comments</a>
									</div>
								</div>
							</li>
						</ul>
					</div><!--widget-latest-posts-->
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="widget-tags">
						<h3 class="title-widget">Product Tags</h3>
						<a href="#">Illegal</a>
						<a href="#">Accessories</a>
						<a href="#">Sale</a>
						<a href="#">Jeans</a>
						<a href="#">Fashion</a>
						<a href="#">Illegal</a>
						<a href="#">Accessories</a>
						<a href="#">Sale</a>
						<a href="#">Jeans</a>
						<a href="#">Fashion</a>
						<a href="#">Accessories</a>
					</div><!--widget-tags-->
				</div>
			</div>
		</div>
	</footer>
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<p class="pull-left">© Created by <a href="#">Adebisi Joe</a> - theme Awawa. </p>
				</div>
				<div class="col-md-6">
				</div>
			</div>
		</div>
	</div>
</main>
<div class="footer-instagram">
	<div class="instagram-slider">
		<div class="item">
			<img src="images/imsta1.png" alt="imsta">
		</div>
		<div class="item">
			<img src="images/imsta2.png" alt="imsta2">
		</div>
		<div class="item">
			<img src="images/imsta3.png" alt="imsta2">
		</div>
		<div class="item">
			<img src="images/imsta4.png" alt="imsta2">
		</div>
		<div class="item">
			<img src="images/imsta5.png" alt="imsta2">
		</div>
		<div class="item">
			<img src="images/imsta6.png" alt="imsta2">
		</div>
		<div class="item">
			<img src="images/imsta1.png" alt="imsta">
		</div>
		<div class="item">
			<img src="images/imsta2.png" alt="imsta2">
		</div>
		<div class="item">
			<img src="images/imsta3.png" alt="imsta2">
		</div>
		<div class="item">
			<img src="images/imsta4.png" alt="imsta2">
		</div>
		<div class="item">
			<img src="images/imsta5.png" alt="imsta2">
		</div>
		<div class="item">
			<img src="images/imsta6.png" alt="imsta2">
		</div>
	</div>
	<a href="#" class="btn">Follow <span>teamAwawa</span></a>
</div>
<div class="popup">
	<div class="inside">
		<h5>sign up today for a</h5>
		<h3>60% off coupon</h3>
		<p>Get <a href="#" class="active-color">5% reward</a> on future orders</p>
		<input type="email" name="EMAIL" placeholder="Your email address" required="">
		<p class="last">*Don’t worry, we won’t spam our <a href="#" class="active-color">customers mailboxes</a></p>
	</div>
	<i class="close">x</i>
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

<!-- Mirrored from 8theme.com/demo/html/xstore/without-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Jun 2017 01:39:05 GMT -->
</html>