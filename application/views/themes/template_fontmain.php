<?PHP

    // Main Manu
    $this->db->select("*");
    $this->db->where(array('con_show' => 1, 'con_status' => 1));
    $this->db->order_by('con_sort asc');
    $query = $this->db->get('tb_contents');
    $listmanu = $query->result_array();

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

            $Text_date_event        = $value['set_date_event'];
            $Text_detail_event      = $value['set_detail_event'];
            $Text_time_event        = $value['set_time_event'];
            $Text_place_event       = $value['set_place_event'];

        }
    }

    $this->db->from('tb_slider');
    $this->db->where(array('slider_status' => "1"));
    $slider_qr= $this->db->get();
    $slider = $slider_qr->num_rows();

    $this->db->select("*");
    $this->db->where(array('slider_status' => 1,'slider_show' => 1));
    $this->db->order_by('slider_sort ASC,slider_id DESC');
    $query = $this->db->get('tb_slider');
    $listSlider = $query->result_array();

?>



<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta http-equiv="content-type; X-UA-Compatible" content="text/html; charset=utf-8; IE=edge" />
    <meta name="author" content="HookOn" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" /> -->
        <link rel="stylesheet" href="<?=base_url('assets/fonts/helveticaneue/stylesheet.css');?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/fonts/helveticaneue_bold/stylesheet.css');?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/bootstrap.css');?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/style.css?v=003');?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/swiper.css')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/dark.css')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/font-icons.css')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/animate.css')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/magnific-popup.css')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/responsive.css')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/components/radio-checkbox.css')?>" type="text/css" />
        <link rel="stylesheet" href="<?=base_url('assets/canvas/css/custom.css?v=013')?>" type="text/css" />

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
   
    <div id="wrapper" class="clearfix">

        <div id="show-bg">
            <div id="top-bar">
                <div class=" clearfix">

                    <div class="col_half nobottommargin"> </div>
                    <div class="col_half fright col_last nobottommargin">

                        <!-- Top Social
                        ============================================= -->
                        <div id="top-social">
                            <ul>
                                <?PHP if($Text_linktwitter != ""){?>
                                <li><a href="<?=$Text_linktwitter;?>" target="_bank" class="si-twitter" data-hover-width="95" style="width: 40px;"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>
                                <?PHP } ?>
                                <?PHP if($Text_linkyoutube != ""){?>
                                <li><a href="<?=$Text_linkyoutube;?>" target="_bank" class="si-pinterest" data-hover-width="106" style="width: 40px;"><span class="ts-icon"><i class="icon-youtube"></i></span><span class="ts-text">Youtube</span></a></li>
                                <?PHP } ?>
                                <?PHP if($Text_linkgoogleplus != ""){?>
                                <li><a href="<?=$Text_linkgoogleplus;?>" target="_bank" class="si-dribbble" data-hover-width="92" style="width: 40px;"><span class="ts-icon"><i class="icon-gplus"></i></span><span class="ts-text">G +</span></a></li>
                                <?PHP } ?>
                                <?PHP if($Text_linkinstagram != ""){?>
                                <li><a href="<?=$Text_linkinstagram;?>" target="_bank" class="si-instagram" data-hover-width="111" style="width: 40px;"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
                                <?PHP } ?>
                                <?PHP if($Text_linkfacebook != ""){?>
                                <li><a href="<?=$Text_linkfacebook;?>" target="_bank" class="si-facebook" data-hover-width="109" style="width: 40px;"><span class="ts-icon"><i class="icon-facebook" ></i></span><span class="ts-text">Facebook</span></a></li>
                                <?PHP } ?>
                                <?PHP if($Text_Emailcompany != ""){?>
                                <li><a href="mailto:<?=$Text_Emailcompany;?>" class="si-email3" data-hover-width="153" style="width: 40px;"><span class="ts-icon"><i class="icon-email3"></i></span><span class="ts-text"><?=$Text_Emailcompany;?></span></a></li>
                                <?PHP } ?>
                                <?PHP if($Text_Phoncompany != ""){?>
                                <li><a href="tel:<?=$Text_Phoncompany;?>" class="si-call" data-hover-width="156" style="width: 40px;"><span class="ts-icon"><i class="icon-call" ></i></span><span class="ts-text"><?=$Text_Phoncompany;?></span></a></li>
                                <?PHP } ?>
                            </ul>
                        
                        </div>
                        <!-- #top-social end -->

                    </div>

                </div>

            </div>
            
            <!-- Header
            ============================================= -->
            <header id="header" class="sticky-style-2">

                <div class=" clearfix">

                    <!-- Visitor Registration & Online Exhibitor Manual
                    ============================================= -->
                    <div class="divcenter">
                    <div class="display-grid-three-head-bar border-1px-head">
                        <table style="width: 100%; height: 100%;" >
                            <tr>
                                <td>
                                    <center>
                                        <div id="logo" >
                                            <a href="<?=base_url();?>" class="standard-logo" data-dark-logo="<?=base_url('uploads/logo/'.$Text_logo);?>"><img src="<?=base_url('uploads/logo/'.$Text_logo);?>" alt="Canvas Logo"></a>
                                            <a href="<?=base_url();?>" class="retina-logo" data-dark-logo="<?=base_url('uploads/logo/'.$Text_logo);?>"><img src="<?=base_url('uploads/logo/'.$Text_logo);?>" alt="Canvas Logo"></a>
                                        </div>
                                    </center>
                                </td>
                            </tr>
                        </table>
                        <div class="grid-one-page " style="text-align:center;">
                            <div class="font-size-head-tpb" style="color: #000000;"><?=$Text_date_event;?></div>
                            <center><div class="font-size-subhead-tpb" style="color: #43C5D5;"><?=$Text_detail_event;?></div></center>
                            <div class="font-size-subhead-time" style="color: #606060;"><?=$Text_time_event;?></div>
                            <div class="font-size-subhead-event" style="color: #000000;"><?=$Text_place_event;?></div>
                        </div>
                        <div class="display-grid-two-head-bar border-1px-headLeft">
                            <div class="" style="text-align:center;">
                                <table style="width: 100%; height: 100%; margin-bottom: 0px!important;">
                                    <tr>
                                        <td style="text-align:center;">
                                            <center><img class="divcenter img-size-headbar" src="<?=base_url('assets/canvas/images/icon/Visitor.png');?>"/></center>
                                            <center><div class="font-headber-Visitor widthLogoRegis" ><b>Visitor <p style="font-family: 'HelveticaNeueBold';">Registration</p></b></div></center>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="border-1px-headLeft" style="text-align:center;">
                                <table style="width: 100%; height: 100%; margin-bottom: 0px!important;">
                                    <tr>
                                        <td>
                                            <center><img class="divcenter img-size-headbar" src="<?=base_url('assets/canvas/images/icon/Exhibitor.png');?>"/></center>
                                            <center><div class="font-headber-Exhibitor widthLogoRegis" ><b>Online <p style="font-family: 'HelveticaNeueBold';">Exhibitor Manual</p></b></div></center>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                    </div>
                    <!-- #Visitor Registration & Online Exhibitor Manual end -->

                </div>

                <div id="header-wrap">

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu" class="style-2 center bg-dark">

                        <div class=" clearfix">

                            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
                            <?PHP if(count($listmanu) != 0){?>
                            <ul>
                                <?PHP foreach ($listmanu as $key => $value) {?>
                                    <?php 
                                        $con_title = $value['con_page_th'];
                                        $con_decision = $value['con_decision_th'];
                                        $Detail = $value['con_detail_th'];
                                    ?>
                                    <?PHP
                                        // Sub Manu
                                        $this->db->select("*");
                                        $this->db->where(array('con_id' => $value['con_id'], 'consub_show' => 1, 'consub_status' => 1));
                                        $this->db->order_by('consub_sort asc');
                                        $query = $this->db->get('tb_subcontents');
                                        $listsubmanu = $query->result_array();

                                        if(!empty($value['con_url'])){
                                            $Url = $value['con_url'];
                                        }else{
                                            $Url = site_url(str_replace("&","",str_replace(" ","",strtolower($value['con_page_th']))));
                                        }
                                    ?>
                                        <li>
                                            <a href="<?=$Url;?>"><div><?=$con_title;?></div></a>
                                            <?PHP if(count($listsubmanu) != 0){?>
                                                <ul>
                                                    <?PHP
                                                        foreach ($listsubmanu as $k => $v) {
                                                            if(!empty($v['consub_url'])){
                                                                $Sub_Url = $v['consub_url'];
                                                            }else{
                                                                $Sub_Url = site_url(str_replace("&","",str_replace(" ","",strtolower($v['consub_page_th']))));
                                                            }
                                                    ?>
                                                    <li><a href="<?=$Sub_Url?>"><div><?=$v['consub_page_th']?></div></a></li>
                                                    <?PHP }?>
                                                </ul>
                                            <?PHP }?>
                                        </li>
                                    <?PHP }?>
                            </ul>
                            <?PHP } ?>

                        </div>

                    </nav>
                    <!-- #primary-menu end -->

                </div>

            </header>
            <!-- #header end -->
        </div>
        <!-- Slider ============================================= -->
        <section id="slider" class="clearfix">
            <div class="slider-parallax-inner">
            
                <div class="swiper-container swiper-parent">
                <!-- <div class="swiper-wrapper"> -->
                    <?PHP if(count($listSlider)!= 0) {?>
                    <?PHP foreach ($listSlider as $key => $value) { ?>
                        <?PHP if($value['slider_type'] == 1){?>
                        <div class="swiper-slide dark" >
                        <img style="width: 100%;" src="<?=base_url('uploads/slider/'.$value['slider_name']);?>"/>
                        </div>
                        <?PHP } else{?>
                        <div class="swiper-slide dark">
                        <div class="container clearfix">
                            <div class="slider-caption slider-caption-center">
                            <h2 data-caption-animate="fadeInUp">Beautifully Flexible</h2>
                            <p data-caption-animate="fadeInUp" data-caption-delay="200">Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Powerful Layout with Responsive functionality that can be adapted to any screen size.</p>
                            </div>
                        </div>
                        <div class="video-wrap">
                            <video poster="images/videos/explore.jpg" preload="auto" loop autoplay muted>
                            <source src='images/videos/explore.mp4' type='video/mp4' />
                            <source src='images/videos/explore.webm' type='video/webm' />
                            </video>
                            <div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
                        </div>
                        </div>
                    <?PHP } ?>
                    <?PHP } ?>
                    <?PHP } ?>
                <!-- </div> -->
                <?PHP if($slider == 2) {?>
                <div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
                <div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
                <?PHP } ?>
                </div>

            </div>
        </section>
        <!-- #slider end ============================================= -->

		<!-- Content
		============================================= -->
		<?=$contents; ?>
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
                                <h4>Index Creative Village PCL.</h4>
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
    <!-- <script type="text/javascript" src="<?=base_url('assets/canvas/js/validate/jquery.validate.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/canvas/js/validate/custom-valdate.js?v=0004')?>"></script> -->

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