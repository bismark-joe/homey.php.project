 <!DOCTYPE html>
<?php session_start();
	include 'dbconnect.php';
	include 'softwork.php';

	if (isset($_POST['signup'])) {
		$adname = strtoupper(mysql_real_escape_string($_POST['adname']));
		$admail = mysql_real_escape_string($_POST['admail']);
		$adpass = md5(mysql_real_escape_string($_POST['adpass']));
		$adphone = mysql_real_escape_string($_POST['adphone']);
		$adtown = mysql_real_escape_string($_POST['adtown']);
		$adlga = mysql_real_escape_string($_POST['adlga']);

		if(empty($adname)||empty($admail)||empty($adpass)||empty($adphone)||empty($adtown)||empty($adlga)){
			echo "<script>alert('All field must be filled');</script>";
		}else{
			$ins = "INSERT INTO `users` VALUES ('', '$adname', '$admail', '$adpass', '$adphone', '$adtown', '$adlga')";
			if ($que_run = mysqli_query($conn, $ins)) {
				echo "<script>alert('Welcome $adname ! you have successfully Registered');</script>";
				echo "<script>alert('Now we keep track of all your items posted using the phone number you registered with.');</script>";
			}else{echo "<script>alert('Sorry! error in saving your data');</script>";}
		}

	} 

?>
<html>
	<head>
		<title>register</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5">
		<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
		<link rel="stylesheet" type="text/css" href="css/responsive.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/layerslider.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="mainbox">
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
				<li><a href="sign_up.php">sign in</a></li>
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
			<header id="header">
				<div class="top-bar">
					<div class="languages-area">
						<div class="text-top">
							<p>Call us <a href="tel:+2347031123695" class="active-color">(+234) 7031123695</a></p>
						</div>
					</div><!--languages-area-->
					<div class="top-panel-open">
						<span>Open panel</span>
					</div><!--top-panel-open-->
					<div class="top-links">
						<div class="login-link">
							<a href="sign_up.php">Sign In </a><b>or</b><span onclick="signUp()"> Create an account</span>
						</div><!--login-link-->
						<ul class="social-icon">
							<li><a href="https://www.facebook.com/skyjoebismark/" class="follow-facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://twitter.com/skyjoebismark" class="follow-twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://www.instagram.com/8theme_ltd/" class="follow-instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
							<li><a href="https://plus.google.com/+8theme/posts" class="follow-google" target="_blank"><i class="fa fa-google"></i></a></li>
							<li><a href="https://www.youtube.com/user/8theme/feed" class="follow-youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
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
							<button class="btn-hamburger js-slideout-toggle">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
					</div><!--header-->
				</div>
						</div><!--menu-->
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
		</main>

			<main class="wrapper">
				<div class="deal">
					<form action="<?php echo htmlentities($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data">
				 		<fieldset>
				            <legend><h2 style="color: goldenrod; margin-left: 50px; padding-top: 0; margin-top: -20px;">Users Login Form</h2> <br></legend><br> <br>
				            <label for="uname">Phone Number:
				              <input type="text" name="uname" id="uname" value="" required="required">
				            </label> <br><br>
				            <label for="upass">Password:
				              <input type="password" name="upass" id="upass" value="" required="required">
				            </label><br> <br>
				            <label for="rem">
				              <input class="checkbox" type="checkbox" name="rem" id="rem" checked="checked">
				              Remember me
				            </label> <div class="clear"></div>
				           
				              <input type="submit" name="ulogin" id="ulogin" value="Login">
				              <p>Don't have an account yet? <i id="signupp" onclick="signUp()"> SignUp here </i></p>
				            
			          	</fieldset>
		          	</form>
		        </div>
		        <?php  
		        	if (isset($_POST['ulogin'])) {
		        		$uname = mysql_real_escape_string($_POST['uname']);
		        		$upass = md5(mysql_real_escape_string($_POST['upass']));
		        		$sql = "SELECT * FROM users WHERE phone = '{$uname}' AND password = '{$upass}'";
						$result = mysqli_query($conn, $sql);

						if(mysqli_num_rows($result) > 0){  
							$fetch = mysqli_fetch_assoc($result);
							$_SESSION['reg'] = $fetch['id'];
							header("location: index.php");

						}else{
							$msg = "Invalid username or password";
							echo "<script> alert('$msg')</script>";
						}
		        	}
		        ?>
		        <div class="sign">
					<form action="<?php echo htmlentities($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data">
				 		<fieldset>
					            <legend><h2 style="color: goldenrod; margin-left: 50px; ">Users SignUp Form</h2> <br></legend><br> 
					            <label for="adname">Full Name:
					              <input type="text" name="adname" id="adname" value="" required="required">
					            </label> <br><br>
					            <label for="email">E-mail:
					              <input type="email" name="admail" id="email" value="" required="required">
					            </label> <br><br>
					            <label for="adpass">Password:
					              <input type="password" name="adpass" id="adpass" value="" required="required">
					            </label><br> <br>
					            <label for="adphone">Phone No:
					              <input type="text" name="adphone" numbers id="adphone" value="" required="required">
					            </label> <br><br>
					            <label for="adtown">Town:
					              <input type="text" name="adtown" id="adtown" value="" required="required">
					            </label> <br><br>
					            <label for="adlga">Lga:
					              <input type="text" name="adlga" id="adlga" value="" required="required">
					            </label> <br><br>

					            <marquee>Please ensure that you input your correct details</marquee>
					            <div class="clear"></div>
					           
					            <input type="submit" name="signup" id="signup" value="Submit">
					            
				          	</fieldset>
		          	</form>
				</div>
			</main>
			
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
			function signUp() {
				$('.deal').slideUp('slow');
				$('.sign').slideDown('slow');
			}
			

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
</html>