<?PHP

    // settings
	$this->db->select("*");
	$query_settings = $this->db->get('tb_settings');
	$list_settings = $query_settings->result_array();

    if(isset($list_settings) && count($list_settings) != 0){
        foreach ($list_settings as $key => $value) {
            $Id = $value['set_id'];

            $Text_logo              = $value['set_logo'];
            $Text_logo_footer       = $value['set_logo_footer'];

            $Text_nameweb_th        = $value['set_nameweb_th'];
            $Text_address_th        = $value['set_address_th'];

            $Text_Emailcompany      = $value['set_emailcompany'];
            $Text_Phoncompany       = $value['set_phoncompany'];
            $Text_Mobilephoncompany = $value['set_mobilecompany'];
            $Text_Faxcompany        = $value['set_faxcompany'];
      
            $Text_Keywords          = $value['set_keywords'];
            $Text_Description       = $value['set_description'];
            $Text_Webmaster         = $value['set_googletool'];
            $Text_Analytics         = $value['set_googleanalytics'];

            $Text_linkfacebook      = $value['set_linkfacebook'];
            $Text_linktwitter       = $value['set_linktwitter'];
            $Text_linkyoutube       = $value['set_linkyoutube'];
            $Text_linkgoogleplus    = $value['set_linkgoogleplus'];
            $Text_linkinstagram     = $value['set_linkinstagram'];

            $Text_Fullnamecontact   = $value['set_fullnamecontact'];
            $Text_Positioncontact   = $value['set_positioncontact'];
            $Text_Phonecontact      = $value['set_phonecontact'];
            $Text_Phone_extcontact  = $value['set_phoneextcontact'];
            $Text_Mobilecontact     = $value['set_mobilecontact'];

        }
    }

?>



<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta http-equiv="content-type; X-UA-Compatible" content="text/html; charset=utf-8; IE=edge" />
    <meta name="author" content="HookOn" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link
        href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
        rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/bootstrap.css');?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/style.css?v=003');?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/dark.css')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/font-icons.css')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/animate.css')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/magnific-popup.css')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/responsive.css')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/components/radio-checkbox.css')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/custom.css?v=00137')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/tabs-cart.css?v=001')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/custom-productdetail.css?v=0012')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/custom-shoppingcart.css?v=007')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/custom-font-page-head.css?v=001')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/custom-showlist-product.css?v=006')?>" type="text/css" />


        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title><?=$Text_nameweb_th;?></title>
        <link rel="icon" href="<?=base_url('assets/canvas/images/main/temp/logo.png')?>" />

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
</head>

<body class="stretched">
   
    <div id="wrapper" class="clearfix" style="animation-duration: 1.5s; opacity: 1;">
        <!-- top-bar
        ============================================= -->
        
        <div id="top-bar">
			<div class="container clearfix">
				<div class="col_half nobottommargin">
					<!-- Top Links
					============================================= -->
					<div class="top-links">
                    </div>
                    <!-- .top-links end -->

				</div>
				<div class="col_half fright col_last nobottommargin">
					<!-- Top Social
                    ============================================= -->
					<div id="top-social">
						<ul>
                            <?PHP if(!empty($Text_linkfacebook)){?>
							<li><a href="<?=$Text_linkfacebook?>" target="_bank" class="si-facebook" data-hover-width="109" style="width: 40px;"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
                            <?PHP } ?>
                            <?PHP if(!empty($Text_linktwitter)){?>
                            <li><a href="<?=$Text_linktwitter?>" class="si-twitter" target="_bank"  data-hover-width="95" style="width: 40px;"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>
							<?PHP } ?>
                            <?PHP if(!empty($Text_linkgoogleplus)){?><li><a href="<?=$Text_linkinstagram?>" class="si-github" target="_bank"  data-hover-width="92" style="width: 40px;"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
							<li><a href="<?=$Text_linkgoogleplus?>" class="si-pinterest" target="_bank"  data-hover-width="106" style="width: 40px;"><span class="ts-icon"><i class="icon-gplus"></i></span><span class="ts-text">Googleplus</span></a></li>
							<?PHP } ?>
                            <?PHP if(!empty($Text_linkyoutube)){?>
                            <li><a href="<?=$Text_linkyoutube?>" class="si-instagram" target="_bank"  data-hover-width="111" style="width: 40px;"><span class="ts-icon"><i class="icon-youtube"></i></span><span class="ts-text">Youtube</span></a></li>
                            <?PHP } ?>
                        </ul>
                    </div>
                    <!-- #top-social end -->
				</div>
            </div>
        </div>
        <!-- #top-bar end -->
		<!-- Header
		============================================= -->
		<header id="header" class="sticky-style-2">

			<div class="container clearfix">

				<!-- Logo
				============================================= -->
				<div id="logo" class="divcenter">
					<a href="<?=base_url();?>" class="standard-logo" data-dark-logo="images/logo-dark.png"><img class="divcenter" src="images/logo.png" alt="Canvas Logo"></a>
					<a href="<?=base_url();?>" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img class="divcenter" src="images/logo@2x.png" alt="Canvas Logo"></a>
                </div>
                <!-- #logo end -->

			</div>

			<div id="header-wrap">

				<!-- Primary Navigation
				============================================= -->
				<nav id="primary-menu" class="style-2 center">

					<div class="container clearfix">

						<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

						<ul class="sf-js-enabled" style="touch-action: pan-y;">
							<li class="current"><a href="#"><div>Home</div></a></li>
							<li><a href="#"><div>Features</div></a></li>
							<li><a href="#"><div>Categories</div></a></li>
							<li><a href="#"><div>Authors</div></a></li>
							<li><a href="#"><div>Portfolio</div></a></li>
							<li><a href="#"><div>Blog</div></a></li>
							<li><a href="#"><div>Contribute</div></a></li>
							<li><a href="#"><div>Contact</div></a></li>
						</ul>

						<!-- Top Search
						============================================= -->
						<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.html" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
						</div><!-- #top-search end -->

					</div>

				</nav><!-- #primary-menu end -->

			</div>

        </header>
        <!-- #header end -->

		<!-- Content
		============================================= -->
		
        <!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">
					<div class="grid-footer-two">
						<div class="margin-top-footer-img"><img class="max-width-footer" src="<?=base_url('uploads/logo/'.$Text_logo_footer);?>"/></div>
                        <div class="grid-footer-two-detail">
                            <div class="widget clearfix" style="margin-top: 0px;">
                                <h4>Index Creative Village PLC.</h4>
                                <div id="post-list-footer">
                                    <div class="spost clearfix">
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4>
                                                    <?=$Text_address_th; ?><br/>
                                                    <?PHP if(!empty($Text_Phoncompany)){?>
                                                    Tel : <a href="tel:<?=$Text_Phoncompany;?>" style="color: #DDD;" target="_bank" ><?=$Text_Phoncompany; ?></a><br/>
                                                    <?PHP } ?>
                                                    <?PHP if(!empty($Text_Mobilephoncompany)){?>
                                                    Phon : <a href="tel:<?=$Text_Mobilephoncompany;?>" style="color: #DDD;" target="_bank" ><?=$Text_Mobilephoncompany; ?></a><br/>
                                                    <?PHP } ?>
                                                    <?PHP if(!empty($Text_Faxcompany)){?>
                                                    Fax : <?=$Text_Faxcompany; ?><br/>
                                                    <?PHP } ?>
                                                    <a href="http://icvex.com/" style="color: #DDD;" target="_bank" >www.icvex.com</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget clearfix" style="margin-top: 0px;">
                                <h4>Contact person</h4>
                                <div id="post-list-footer">
                                    <div class="spost clearfix">
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4>
                                                    <?PHP if(!empty($Text_Fullnamecontact)){?>
                                                    <?=$Text_Fullnamecontact;?><br/>
                                                    <?PHP } ?>
                                                    <?PHP if(!empty($Text_Positioncontact)){?>
                                                        <?=$Text_Positioncontact;?><br/>
                                                    <?PHP } ?>
                                                    <?PHP if(!empty($Text_Phonecontact)){?>
                                                    Tel : <a href="tel:<?=$Text_Phonecontact;?>" style="color: #DDD;" target="_bank" ><?=$Text_Phonecontact;?></a> ext. <?=$Text_Phone_extcontact;?> <br/>
                                                    <?PHP } ?>
                                                    <?PHP if(!empty($Text_Mobilecontact)){?>
                                                    Mobile : <a href="tel:<?=$Text_Mobilecontact;?>" style="color: #DDD;" target="_bank" ><?=$Text_Mobilecontact;?></a>
                                                    <?PHP } ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
					</div>
                </div>
                <!-- .footer-widgets-wrap end -->

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">
					<div class="center"> 
                        Copyright © 2019 <?PHP if( date('Y') != '2019'){?> - <?PHP echo date('Y');?> <?PHP } ?>. All rights reserved.
					</div>
				</div>
            </div>
            <!-- #copyrights end -->

        </footer>
        <!-- #footer end -->

	</div>

    <script type="text/javascript" src="<?=base_url('assets/canvas/js/jquery.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/canvas/js/plugins.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/canvas/js/functions.js?v=00128')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/canvas/js/validate/jquery.validate.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/canvas/js/validate/custom-valdate.js?v=0004')?>"></script>
	
	<!-- <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=YOUR_API_KEY"></script>
	<script type="text/javascript" src="<?=base_url('assets/canvas/js/jquery.gmap.js')?>"></script> -->

	<script type="text/javascript" src="<?=base_url('assets/canvas/js/jquery-lazyload/lazyload.min.js');?>"></script>
 
	<script type="text/javascript">

        if($('#captcha').length){
			getcaptcha();
			$('#refresh').click(function() {
				getcaptcha();
			});
        }

		function getcaptcha(){
			var src = $("#captcha").attr('src');
			$.ajax({url: "<?=base_url('captcha/index');?>",dataType:'json',type:'POST',data:{src:src}, success: function(result){
				$("#captcha").attr('src','<?=base_url('assets/canvas/captcha/');?>'+result.filename);
				$("#Inputcaptcha").val(result.word);
			}});
        }

    </script>
    
</body>

</html>