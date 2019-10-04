<?PHP
	// About The Show
	$this->db->select('*');
	$this->db->where(array('con_status' => 1, 'con_id' => 1));
	$query = $this->db->get('tb_contents');
	$result_about = $query->result_array();
	foreach ($result_about as $key => $value) {
		$manuAbout = $value['con_page_th'];
	}

	// Sub About The Show
	$this->db->select('*');
	$this->db->where(array('consub_status' => 1, 'con_id' => 1));
	$this->db->order_by('consub_id asc');
	$query = $this->db->get('tb_subcontents');
	$resultSub_about = $query->result_array();

	// For Vistors
	$this->db->select('*');
	$this->db->where(array('con_status' => 1, 'con_id' => 2));
	$query = $this->db->get('tb_contents');
	$result_vistors = $query->result_array();
	foreach ($result_vistors as $key => $value) {
		$manuVistors = $value['con_page_th'];
	}

	// Sub For Vistors
	$this->db->select('*');
	$this->db->where(array('consub_status' => 1, 'con_id' => 2));
	$this->db->order_by('consub_id asc');
	$query = $this->db->get('tb_subcontents');
	$resultSub_vistors = $query->result_array();

	// For Exhibitors
	$this->db->select('*');
	$this->db->where(array('con_status' => 1, 'con_id' => 3));
	$query = $this->db->get('tb_contents');
	$result_exhibitors = $query->result_array();
	foreach ($result_exhibitors as $key => $value) {
		$manuExhibitors = $value['con_page_th'];
	}

	// Sub For Exhibitors
	$this->db->select('*');
	$this->db->where(array('consub_status' => 1, 'con_id' => 3));
	$this->db->order_by('consub_id asc');
	$query = $this->db->get('tb_subcontents');
	$resultSub_exhibitors = $query->result_array();

	// Footer
	$this->db->select('*');
	$this->db->where(array('con_status' => 1, 'con_id' => 5));
	$query = $this->db->get('tb_contents');
	$result_footer = $query->result_array();
	foreach ($result_footer as $key => $value) {
		$content_footer = $value['con_detail_th'];
	}
	// Sub setings
	$this->db->select('*');
	$this->db->order_by('set_id asc');
	$query = $this->db->get('tb_settings');
	$result_settings = $query->result_array();
	if(count($result_settings) != 0){
		foreach ($result_settings as $key => $value) {
			$Text_Urllanguage = $value['set_urllanguage'];
			$Text_Keywords = $value['set_keywords'];
			$Text_Description = $value['set_description'];
			$Text_Webmaster = $value['set_googletool'];
			$Text_Analytics = $value['set_googleanalytics'];
			$Text_Linkfacebook = $value['set_linkfacebook'];
			$Text_Linktwitter = $value['set_linktwitter'];
			$Text_Linkyoutube = $value['set_linkyoutube'];
			$Text_Linkgoogle = $value['set_linkgoogleplus'];
			$Text_Linkinstagram = $value['set_linkinstagram'];
			$Text_Emailcontact = $value['set_emailcontact'];
		}
	}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<link rel="shortcut icon" href="<?=base_url('assets/canvas/images/favicon.ico');?>" type="image/x-icon" />

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="myanmartourismexpo" />
	<?PHP if($Text_Webmaster != ""){?>
		<!-- Google Webmasters Tool -->
	<meta name="google-site-verification" content="<?=$Text_Webmaster;?>" />
	<?PHP }?>

	<?PHP if($Text_Analytics != ""){?>
	<!-- Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?=$Text_Analytics;?>"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '<?=$Text_Analytics;?>');
	</script>
	<?PHP }?>

	<meta name="keywords" content="<?=$Text_Keywords;?>">
	<meta name="description" content="<?=$Text_Description;?>">
	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/canvas/css/bootstrap.css');?>" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/canvas/style.min.css');?>" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/canvas/css/swiper.css');?>" type="text/css" />
	<!-- <link rel="stylesheet" href="<?=base_url('assets/canvas/css/dark.css');?>" type="text/css" /> -->
	<link rel="stylesheet" href="<?=base_url('assets/canvas/css/font-icons.css');?>" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/canvas/css/animate.css');?>" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/canvas/css/magnific-popup.css');?>" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/canvas/css/hover.css');?>" type="text/css" />

	<link rel="stylesheet" href="<?=base_url('assets/canvas/css/responsive.css?v=3');?>" type="text/css" />
	<link rel="stylesheet" href="<?=base_url('assets/canvas/css/custom.css');?>" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Build & Decor</title>

</head>
<body class="stretched">

	<div id="wrapper" class="clearfix">
		<!-- Top Bar
		============================================= -->
		<div id="top-bar">

			<div class="container clearfix">


				<div class="col_full col_last nobottommargin nobottommargin">

					<?PHP
						if(count($result_settings) != 0){
							foreach ($result_settings as $key => $value) {
					?>
					<!-- Top Social
					============================================= -->
					<div id="top-social">
						<ul class="fright">
							<?PHP if(!empty($Text_Linkfacebook)){?>
							<li><a href="<?=$Text_Linkfacebook;?>" target="_blank" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
							<?PHP }?>
							<?PHP if(!empty($Text_Linktwitter)){?>
							<li><a href="<?=$Text_Linktwitter;?>" target="_blank" class="si-twitter"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>
							<?PHP }?>
							<?PHP if(!empty($Text_Linkyoutube)){?>
							<li><a href="<?=$Text_Linkyoutube;?>" target="_blank" class="si-youtube"><span class="ts-icon"><i class="icon-youtube"></i></span><span class="ts-text">Youtube</span></a></li>
							<?PHP }?>
							<?PHP if(!empty($Text_Linkgoogle)){?>
							<li><a href="<?=$Text_Linkgoogle;?>" target="_blank" class="si-gplus"><span class="ts-icon"><i class="icon-gplus"></i></span><span class="ts-text">Google+</span></a></li>
							<?PHP }?>
							<?PHP if(!empty($Text_Linkinstagram)){?>
							<li><a href="<?=$Text_Linkinstagram;?>" target="_blank" class="si-instagram"><span class="ts-icon"><i class="icon-instagram"></i></span><span class="ts-text">Instagram</span></a></li>
							<?PHP }?>
							<?PHP if(!empty($Text_Emailcontact)){?>
							<li><a href="mailto:<?=$Text_Emailcontact?>" class="si-email3"><span class="ts-icon"><i class="icon-email3"></i></span><span class="ts-text"><?=$Text_Emailcontact?></span></a></li>
							<?PHP }?>
							<!-- <li><a href="#" class="si-pinterest"><span class="ts-icon"><i class="icon-pinterest"></i></span><span class="ts-text">Pinterest</span></a></li>
							<li><a href="#" class="si-instagram"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
							<li><a href="tel:+91.11.85412542" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text">+91.11.85412542</span></a></li>
							<li><a href="mailto:info@canvas.com" class="si-email3"><span class="ts-icon"><i class="icon-email3"></i></span><span class="ts-text">info@canvas.com</span></a></li> -->
						</ul>
					</div><!-- #top-social end -->
					<?PHP
							}
						}
					?>
					<?PHP if($Text_Urllanguage != ""){?>
					<div class="top-links fright">
						<ul>
							<li><a href="<?=$Text_Urllanguage;?>" target="_blank"><img src="<?=base_url('assets/canvas/images/Myanmar.png');?>" alt="MY"></a></li>
						</ul>
					</div><!-- .top-links end -->
					<?PHP } ?>

				</div>

			</div>

		</div><!-- #top-bar end -->

		<!-- Header
		============================================= -->
		<header id="header" class="sticky-style-2">

			<div class="container clearfix">
				<div class="col_one_third nobottommargin">
					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="<?=site_url('main');?>" class="hvr-bounce-in" data-dark-logo="<?=base_url('assets/canvas/images/logo.png');?>"><img style="max-width: 150px; height: auto;" src="<?=base_url('assets/canvas/images/logo.png');?>" alt="Logo"></a>
						<!-- <a href="<?=site_url('main');?>" class="retina-logo hvr-bounce-in" data-dark-logo="<?=base_url('assets/canvas/images/logo.png');?>"><img src="<?=base_url('assets/canvas/images/logo.png');?>" alt="Canvas Logo"></a> -->

					</div><!-- #logo end -->
				</div>
				<div class="col_two_third nobottommargin col_last hidden-xs hidden-sm">
					<div class="hbanner">
							<img src="<?=base_url('assets/canvas/images/3-5.png');?>" class="img1" alt="h1">
							<a href="<?=site_url('visitoregis/index');?>" target="_blank" class="hvr-grow">
							<!-- <a href="#" class="hvr-grow"> -->
							<img src="<?=base_url('assets/canvas/images/vis.png');?>" class="img2" alt="h1" style="max-height: 155px; width: auto;">
							</a>
							<a href="http://www.thevista-oem.com/ICVeX/OEM/2019/MBD/index.asp" target="_blank" class="hvr-grow">
							<img src="<?=base_url('assets/canvas/images/online.png');?>" class="img2" alt="h1" style="max-height: 155px; width: auto;">
							</a>
					</div>
				</div>
					<div class="clear"></div>
			</div>


			<div id="header-wrap">

				<!-- Primary Navigation
				============================================= -->
				<nav id="primary-menu" class="style-2 center">

					<div class="container-fluid  clearfix">

						<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

						<ul>

								<li class="noborder">
										<a href="<?=site_url('home');?>">Home</a>
								</li>

								<li>
										<a href="<?=site_url('main/pageDetail/1');?>"><?=$manuAbout;?></a>
										<i class="icon-caret-down hidden-md hidden-lg"></i>
										<ul>
											<?PHP
												foreach ($resultSub_about as $key => $value) {
													echo '<li><a href="'.site_url('main/pagesubDetail/'.$value['consub_id']).'">'.$value['consub_page_th'].'</a></li>';
												}
											?>
										</ul>
								</li>

								<li>
										<a href="#"><?=$manuVistors;?></a>
										<i class="icon-caret-down hidden-md hidden-lg"></i>
										<ul>
											<?PHP
												foreach ($resultSub_vistors as $key => $value) {
													if($value['consub_id'] == 15){
														echo '<li><a href="http://www.myanmarbuilddecor.com/visitoregis/index" target="_blank">'.$value['consub_page_th'].'</a></li>';
													}else{
														echo '<li><a href="'.site_url('main/pagesubDetail/'.$value['consub_id']).'">'.$value['consub_page_th'].'</a></li>';
													}
												}
											?>
										</ul>
								</li>

								<li>
										<a href="#"><?=$manuExhibitors;?></a>
										<i class="icon-caret-down hidden-md hidden-lg"></i>
										<ul>
											<?PHP
												foreach ($resultSub_exhibitors as $key => $value) {
													if($value['consub_id'] == 22){
														echo '<li><a href="http://www.thevista-oem.com/ICVeX/OEM/2019/MBD/index.asp" target="_blank">'.$value['consub_page_th'].'</a></li>';
													}else{
														echo '<li><a href="'.site_url('main/pagesubDetail/'.$value['consub_id']).'">'.$value['consub_page_th'].'</a></li>';
													}
												}
											?>
										</ul>
								</li>

								<li>
										<a href="<?=site_url('seminar');?>">Seminar & Special Activity</a>
										<i class="icon-caret-down hidden-md hidden-lg"></i>
										<ul>
											<li><a href="<?=site_url('seminar_conference');?>">Seminar / Conference</a></li>
									<li><a href="<?=site_url('special_activity');?>">Special Activity</a></li>
										</ul>
								</li>

								<li>
										<a href="<?=site_url('news');?>">News & Publicities</a>
										<i class="icon-caret-down hidden-md hidden-lg"></i>
										<ul>
												<li><a href="<?=site_url('news_press');?>">News</a></li>
												<li><a href="<?=site_url('publicitie');?>">Publicities</a></li>
												<li><a href="<?=site_url('gallerys/index');?>">Gallery</a></li>
										</ul>
								</li>

								<li>
										<a href="<?=site_url('dowload/index');?>">Download</a>
										<i class="icon-caret-down hidden-md hidden-lg"></i>
										<ul>
												<li><a href="<?=site_url('dowload/brochure');?>">Brochure</a></li>
												<li><a href="<?=site_url('dowload/others');?>">Others</a></li>
										</ul>
								</li>

								<li>
										<a href="<?=site_url('main/contactus');?>">Contact</a>
										<i class="icon-caret-down hidden-md hidden-lg"></i>
										<ul>
												<li><a href="<?=site_url('main/contactus');?>">Organizer</a></li>
												<li><a href="<?=site_url('main/pagesubDetail/28');?>">Sales Agents</a></li>
										</ul>
								</li>

						</ul>
					</div>

				</nav><!-- #primary-menu end -->

			</div>

		</header>
		<div class="si-sticky visible-md visible-lg iconsi">

			<?PHP if(!empty($Text_Linkfacebook)){?>
			<a href="<?=$Text_Linkfacebook;?>" class="social-icon si-facebook si-facebook-ac" data-animate="bounceInLeft">
				<i class="icon-facebook"></i>
				<i class="icon-facebook"></i>
			</a>
			<?PHP }?>
			<?PHP if(!empty($Text_Linktwitter)){?>
			<a href="<?=$Text_Linktwitter;?>" class="social-icon si-twitter si-twitter-ac" data-animate="bounceInLeft">
				<i class="icon-twitter"></i>
				<i class="icon-twitter"></i>
			</a>
			<?PHP }?>
			<?PHP if(!empty($Text_Linkyoutube)){?>
			<a href="<?=$Text_Linkyoutube;?>" class="social-icon si-youtube si-youtube-ac" data-animate="bounceInLeft">
				<i class="icon-youtube"></i>
				<i class="icon-youtube"></i>
			</a>
			<?PHP }?>
			<?PHP if(!empty($Text_Linkgoogle)){?>
			<a href="<?=$Text_Linkgoogle;?>" class="social-icon si-gplus si-gplus-ac" data-animate="bounceInLeft">
				<i class="icon-gplus"></i>
				<i class="icon-gplus"></i>
			</a>
			<?PHP }?>
			<?PHP if(!empty($Text_Linkinstagram)){?>
			<a href="<?=$Text_Linkinstagram;?>" class="social-icon si-instagram si-instagram-ac" data-animate="bounceInLeft">
				<i class="icon-instagram"></i>
				<i class="icon-instagram"></i>
			</a>
			<?PHP }?>
			<?PHP if(!empty($Text_Emailcontact)){?>
			<a href="<?=$Text_Emailcontact;?>" class="social-icon si-email3 si-email3-ac" data-animate="bounceInLeft">
				<i class="icon-email3"></i>
				<i class="icon-email3"></i>
			</a>
			<?PHP }?>
		</div>

		<?= $contents ?>

		<!-- Footer
		============================================= -->
		<footer id="footer">

			<div class="container clearfix">
				<?=$content_footer;?>

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

                <div class="container clearfix">

                    <div class="col_half">
                        © Myanmar Build & Decor. Copyright 2018 - <?PHP echo date('Y')?> Organized by ICVeX
                    </div>

                    <div class="col_half col_last tright">
                        <div class="copyrights-menu copyright-links fright clearfix">
                            <a href="#">Home</a>/<a href="#">About The Show</a>/<a href="#">Contact Us</a>
                        </div>
                    </div>

               	</div>

            </div>

		</footer>

	</div>
	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="<?=base_url('assets/canvas/js/lib/jquery.js');?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/canvas/js/lib/plugins.min.js');?>"></script>
	<script>
		var swiper = new Swiper('.swiperText', {
			direction: 'vertical',
			loop: false,
			autoplay: 100000,
			autoplayDisableOnInteraction: true,
			slidesPerView:'auto'
		});
		 jQuery(document).ready(function($) {
			 if($('#captcha').length){
	 				getcaptcha();
	 				$('#refresh').click(function() {
	 					 getcaptcha();
	 				});
 		 		}
		 });
		 function getcaptcha(){
	 			var src = $("#captcha").attr('src');
	 			$.ajax({url: "<?=base_url('main.php/captcha/index');?>",dataType:'json',type:'POST',data:{src:src}, success: function(result){
	 				$("#captcha").attr('src','<?=base_url('assets/canvas/captcha/');?>'+result.filename);
	 				$("#Inputcaptcha").val(result.word);
	 			}});
 			}
	</script>
	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="<?=base_url('assets/canvas/js/lib/functions.js');?>"></script>


</body>
</html>
