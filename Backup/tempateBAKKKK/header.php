<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Script-Type" content="text/javascript" /> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="index, follow" />
<meta name="keywords" content="" />
<meta name="title" content="" />
<meta name="description" content="" />
<title>Architect & Decor</title>
<!-- ////////////////////////////////// -->
<!-- //      Start Stylesheets       // -->
<!-- ////////////////////////////////// -->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/slider.css" rel="stylesheet" type="text/css" />
<link href="css/inner.css" rel="stylesheet" type="text/css" />
<link href="css/colorbox.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- ////////////////////////////////// -->
<!-- //      Javascript Files        // -->
<!-- ////////////////////////////////// -->
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/easySlider1.5.js"></script>
<script type="text/javascript">
	$(document).ready(function(){	
		$("#slider").easySlider({
			auto: true,
			continuous: true,
			pause:5000
		});
	});	
</script>
<script type="text/javascript">
var $ = jQuery.noConflict();
$(document).ready(function() {
		/* for top navigation */
		$(" #nav ul ").css({display: "none"}); // Opera Fix
		$(" #nav li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown(400);
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		});
		
});	
</script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script src="js/Tahoma_400-Tahoma_7002.font.js" type="text/javascript"></script>
<script type="text/javascript">
	 Cufon.replace('#nav li a', {
	 hover: true
})
</script>
<script type="text/javascript" src="js/jquery.colorbox.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".inline").colorbox({width:"55%", height:"80%"});
});
</script>
<!--[if IE 6]>
<script src="js/DD_belatedPNG.js"></script>
<script>
  DD_belatedPNG.fix('img, #header, #twitter_background, .sidebox h2');
</script>
<![endif]-->
</head>

<body>
	<div id="container">
		<div id="container_top">
			<div class="centercolumn">
			<!-- BEGIN HEADER -->
				<div id="header">
					<div id="topheader">
						<div id="logo"><a href="index.php"><img src="images/logo.png" alt="" /></a></div><!-- end logo -->
						<div id="header_right">
							<div id="header_text">

							</div><!-- end header text -->
						</div><!-- end header right -->
					</div><!-- end topheader -->
					<div id="topmenu">
						<div id="navigation">
							<ul id="nav">
								<li class="noborder"><a class="active" href="index.php">Home</a></li>
								<li><a href="#">About the Show</a>
									<ul>
										<li><a href="About_Myanmar.php">About Myanmar</a></li>
										<li><a href="About_Venue.php">Industry at a glance</a></li>
										<li><a href="About_Venue.php">About Venue</a></li>
										<li><a href="About_the_Organizer.php">About the Organizer </a></li>
									</ul>
								</li>
								<li><a href="#">For Visitor</a>
									<ul>
										<li><a href="Visitors_Profile.php">Visitors Profile</a></li>
										<li><a href="#">Visitor Registration</a></li>
										<li><a href="Admission_Policy.php">Admission Policy</a></li>
										<li><a href="Travel_Accommodation.php">Travel & Accommodation</a></li>
										<li><a href="Visa_Information.php">Visa Information </a></li>
									</ul>
								</li>
								<li><a href="#">For Exhibitor</a>
									<ul>
										<li><a href="Exhibitors_Profile.php">Exhibitors Profile</a></li>
										<li><a href="Participation_fee.php">Participation fee</a></li>
										<li><a href="Space_Booking.php">Space Booking</a></li>
										<li><a href="#l">Online Exhibitor Manual</a></li>
									</ul>
								</li>
								<li><a href="#">Seminar & Special Activity</a>
									<ul>
										<li><a href="Seminar_Conference.php">Seminar / Conference</a></li>
										<li><a href="Special_Activity.php">Special Activity</a></li>
									</ul>
								</li>
								<li><a href="#">News & Publicities</a>
									<ul>
										<li><a href="News.php">News</a></li>
										<li><a href="Publicities.php">Publicities</a></li>
										<li><a href="Gallery.php">Gallery</a></li>
									</ul>
								</li>
								<li><a href="full-width.html">Download</a>
									<ul>
										<li><a href="Brochure.php">Brochure</a></li>
										<li><a href="#">Other</a></li>
									</ul>
								</li>
								<li><a href="contact.html">Contact</a>
									<ul>
										<li><a href="Organizer.php">Organizer</a></li>
										<li><a href="Sales_Agents.php">Sales Agents</a></li>
									</ul>
								</li>
							</ul>
						</div><!-- end of navigation -->
					</div><!-- end topmenu -->
				</div>
			<!-- END HEADER -->
			