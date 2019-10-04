<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Script-Type" content="text/javascript" /> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="index, follow" />
<meta name="keywords" content="" />
<meta name="title" content="" />
<meta name="description" content="" />
<title>Coffee Cafe</title>
<!-- ////////////////////////////////// -->
<!-- //      Start Stylesheets       // -->
<!-- ////////////////////////////////// -->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/inner.css" rel="stylesheet" type="text/css" />
<link href="css/colorbox.css" rel="stylesheet" type="text/css" />
<!-- ////////////////////////////////// -->
<!-- //      Javascript Files        // -->
<!-- ////////////////////////////////// -->
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
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
					<div id="topmenu">
						<div id="navigation">
							<ul id="nav">
								<li class="noborder"><a href="index.html">Home</a></li>
								<li><a href="about.html">About</a>
									<ul>
										<li><a href="index.html">Home</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="portfolio.html">Portfolio</a></li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="full-width.html">Full Width Page</a></li>
									</ul>
								</li>
								<li><a class="active" href="portfolio.html">Menu</a></li>
								<li><a href="full-width.html">Promotion</a></li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</div><!-- end of navigation -->
					</div><!-- end topmenu -->
					<div id="topheader">
						<div id="logo"><a href="index.html"><img src="images/logo.png" alt="" /></a></div><!-- end logo -->
						<div id="header_right">
							<div id="header_text">
							<p class="bolditalic">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							<p><strong><a href="portfolio.html#">Read More</a></strong>...<img src="images/icon_checklist.png" alt=""/></p>
							</div><!-- end header text -->
						</div><!-- end header right -->
					</div><!-- end topheader -->
				</div>
			<!-- END HEADER -->
			
			<!-- BEGIN CONTENT -->
				<div id="content">
					<div id="content_full">
						<div id="maincontent_inner">
							<h1>Specials Menu</h1>
							<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p><br />
							<div class="boxmenu">
								<a class='inline' href="portfolio/images/special1.jpg"><img src="portfolio/images/special1.jpg" alt="" class="imgborder" /></a>
								<h3>Dark Chocolate Cake</h3>
								 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus sapien quis sem semper convallis.<br /><a class='inline' href="portfolio/portfolio1.html">readmore...</a></p>
							</div>
							<div class="boxmenu">
								<a class='inline' href="portfolio/portfolio2.html"><img src="portfolio/images/special2.jpg" alt="" class="imgborder" /></a>
								<h3>Strawberry Angels' Cake </h3>
								 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus sapien quis sem semper convallis.<br /><a class='inline' href="portfolio/portfolio2.html">readmore...</a></p>
							</div>
							<div class="boxmenunomargin">
								<a class='inline' href="portfolio/portfolio3.html"><img src="portfolio/images/special3.jpg" alt="" class="imgborder" /></a>
								<h3>Carrot Cake</h3>
								 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus sapien quis sem semper convallis.<br /><a class='inline' href="portfolio/portfolio3.html">readmore...</a></p>
							</div>
							<div class="clr"></div>
							<div class="boxmenu">
								<a class='inline' href="portfolio/portfolio4.html"><img src="portfolio/images/special4.jpg" alt="" class="imgborder" /></a>
								<h3>Poppy Seed Cake</h3>
								 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus sapien quis sem semper convallis.<br /><a class='inline' href="portfolio/portfolio4.html">readmore...</a></p>
							</div>
							<div class="boxmenu">
								<a class='inline' href="portfolio/portfolio5.html"><img src="portfolio/images/special5.jpg" alt="" class="imgborder" /></a>
								<h3>Lemon Cake</h3>
								 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus sapien quis sem semper convallis.<br /><a class='inline' href="portfolio/portfolio5.html">readmore...</a></p>
							</div>
							<div class="boxmenunomargin">
								<a class='inline' href="portfolio/portfolio6.html"><img src="portfolio/images/special6.jpg" alt="" class="imgborder" /></a>
								<h3>Banana Cake</h3>
								 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed faucibus sapien quis sem semper convallis.<br /><a class='inline' href="portfolio/portfolio6.html">readmore...</a></p>
							</div>
							
						</div><!-- end maincontent inner -->
					</div><!-- end content left -->
				</div>
			<!-- END CONTENT -->
			</div><!-- end centercolumn -->
		</div><!-- end container top -->
		
		
		<div id="container_footer">
			<div class="centercolumn">
				<!-- BEGIN FOOTER -->
				<div id="footer">
					<div id="footer_left">
						<div id="twitter_background">
							<div id="twitter">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.</div><!-- end twitter -->
						</div>
					</div><!-- end footer left -->
					<div id="footer_right">
						<div id="subscribe">
							<h2><img src="images/icon_feed.png" alt="" style="vertical-align:middle" />&nbsp;<em>Subscribe to our cafe</em></h2>
							<form action="">
								<p><input type="text" class="inputbox" value="Enter you email address" onblur="if (this.value == ''){this.value = 'Enter you email address'; }" onfocus="if (this.value == 'Enter you email address') {this.value = ''; }" /></p>
							</form>
						</div><!-- end subscribe -->
					</div><!-- end footer right -->
					<div class="clr"></div><!-- clear float -->
					<div id="footer_bottom">Copyright &copy;2009 Coffee cafe. All rights reserved</div><!-- end footer bottom -->
				</div>
				<!-- END FOOTER -->
			</div><!-- end centercolumn -->
		</div><!-- end container footer -->
		
	</div><!-- end container -->
	
</body>
</html>
