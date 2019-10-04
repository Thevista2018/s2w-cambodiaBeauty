<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<link rel="icon" href="<?=base_url('assets/canvas/images/favicon.png');?>" type="image/png" sizes="16x16">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="myanmartourismexpo" />
	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/canvas/css/bootstrap.css');?>" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/canvas/style.min.css');?>" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/canvas/css/swiper.css');?>" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/canvas/css/dark.css');?>" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/canvas/css/font-icons.css');?>" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/canvas/css/animate.css');?>" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/canvas/css/magnific-popup.css');?>" type="text/css" />

	<link rel="stylesheet" href="<?=base_url('assets/canvas/css/responsive.css');?>" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Myanmartourismexpo</title>

</head>
<body>

	<section id="slider" class="boxed-slider swiper_wrapper full-screen clearfix">
			<div class="swiper-container swiper-parent">
				<div class="swiper-wrapper">
					<div class="swiper-slide dark" style="background-image: url('<?=base_url('assets/canvas/images/bgh1.jpg');?>');">
						<div class="container clearfix">
							<div class="slider-caption slider-caption-center">
								<h2 data-caption-animate="fadeInUp">Welcome to Canvas</h2>
								<p data-caption-animate="fadeInUp" data-caption-delay="200">Create just what you need for your Perfect Website. Choose from a wide range of Elements &amp; simply put them on our Canvas.</p>
							</div>
						</div>
					</div>
					<div class="swiper-slide dark">
						<div class="container clearfix">
							<div class="slider-caption slider-caption-center">
								<h2 data-caption-animate="fadeInUp">Beautifully Flexible</h2>
								<p data-caption-animate="fadeInUp" data-caption-delay="200">Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Powerful Layout with Responsive functionality that can be adapted to any screen size.</p>
							</div>
						</div>
						<div class="video-wrap">
							<video id="slide-video" poster="<?=base_url('assets/canvas/images/explore.jpg');?>" preload="auto" loop autoplay muted>
								<source src='<?=base_url('assets/canvas/images/explore.webm');?>' type='video/webm' />
								<source src='<?=base_url('assets/canvas/images/explore.mp4');?>' type='video/mp4' />
							</video>
							<div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
						</div>
					</div>
					<div class="swiper-slide" style="background-image: url('<?=base_url('assets/canvas/images/bgh1.jpg');?>'); background-position: center top;">
						<div class="container clearfix">
							<div class="slider-caption">
								<h2 data-caption-animate="fadeInUp">Great Performance</h2>
								<p data-caption-animate="fadeInUp" data-caption-delay="200">You'll be surprised to see the Final Results of your Creation &amp; would crave for more.</p>
							</div>
						</div>
					</div>
				</div>
				<div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
				<div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
				<div id="slide-number"><div id="slide-number-current"></div><span>/</span><div id="slide-number-total"></div></div>
				<div class="swiper-pagination"></div>
		</div>
	</section>

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="<?=base_url('assets/canvas/js/lib/jquery.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/canvas/js/lib/plugins.js');?>"></script>
	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="<?=base_url('assets/canvas/js/lib/functions.js');?>"></script>


</body>
</html>
