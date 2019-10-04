<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="title" content="" />
    <meta name="description" content="" />
    <title>Build & Decor</title>
    <link rel="shortcut icon" href="<?php echo BASE_HREF; ?>images/favicon.ico" type="image/x-icon" />

    <!-- CSS -->
    <link href="<?php echo BASE_HREF; ?>css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_HREF; ?>css/slider.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_HREF; ?>css/inner.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_HREF; ?>css/colorbox.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_HREF; ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo BASE_HREF; ?>css/prettyPhoto.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo BASE_HREF; ?>css/jquery.bxslider.css" rel="stylesheet" type="text/css" />


    <!-- JS -->
    <script src="<?php echo BASE_HREF; ?>js/jquery-1.8.2.min.js" type="text/javascript" ></script>
    <script src="<?php echo BASE_HREF; ?>js/easySlider1.5.js" type="text/javascript" ></script>
    <script src="<?php echo BASE_HREF; ?>js/cufon-yui.js" type="text/javascript" ></script>
    <script src="<?php echo BASE_HREF; ?>js/Tahoma_400-Tahoma_7002.font.js" type="text/javascript"></script>
    <script src="<?php echo BASE_HREF; ?>js/jquery.colorbox.js" type="text/javascript"></script>
    <script src="<?php echo BASE_HREF; ?>js/jquery.vticker.js" type="text/javascript"></script>
    <script src="<?php echo BASE_HREF; ?>js/jquery.prettyPhoto.js" type="text/javascript"></script>
    <script src="<?php echo BASE_HREF; ?>js/jquery.bxslider.min.js" type="text/javascript"></script>
    <!--[if IE 6]>
    <script src="<?php echo BASE_HREF; ?>js/DD_belatedPNG.js" type="text/javascript"></script>
    <script>DD_belatedPNG.fix('img, #header, #twitter_background, .sidebox h2');</script>
    <![endif]-->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#slider").easySlider({
                auto: true,
                continuous: true,
                pause: 5000
            });

            $(".inline").colorbox({width: "55%", height: "80%"});
        });
        var $ = jQuery.noConflict();
        $(document).ready(function() {
            /* for top navigation */
            $(" #nav ul ").css({display: "none"}); // Opera Fix
            $(" #nav li").hover(function() {
                $(this).find('ul:first').css({visibility: "visible", display: "none"}).slideDown(400);
            }, function() {
                $(this).find('ul:first').css({visibility: "hidden"});
            });
        });
        Cufon.replace('#nav li a', {
            hover: true
        })
    </script>
</head>

<body>

    <div class=" " style="padding:0; margin:0 auto; width:980px; height:25px; text-align:right;">
        <ul style="list-style:none;padding:0; margin:0; ">
        <li style="font-size:13px;float: right;padding: 0px 10px 5px 10px;"><a href="#" style="color:#333;text-decoration:none;"><i class="fa-mail"></i> info@icvex.com</a></li>
        <li style="font-size:13px;float: right;padding: 0px 10px 5px 10px;"><a href="#" style="color:#333;text-decoration:none;"><i class="fa-phone"></i> +662-713-3033</a></li>
        <li style="font-size:13px;float: right;padding: 0px 10px 5px 10px;"><a href="https://www.facebook.com/myanmarbuilddecor/" target="_blank" style="color:#333;text-decoration:none;"><i class="fa-facebook"></i></a></li>
        </ul>
    </div>
    <!-- <div class="ribbon"></div> -->
    <div id="container">
        <div id="container_top">

            <div class="centercolumn">

                <div id="header">
                    <div id="topheader">
						<div id="logo"><a href="<?php echo BASE_HREF; ?>"><img src="<?php echo BASE_HREF; ?>images/logo.png" alt="" /></a></div><!-- end logo -->

						<div id="logo2"><a href="http://www.thevista-oem.com/ICVeX/OEM/2018/MBD/index.asp"><img src="<?php echo BASE_HREF; ?>images/online.png" alt="" class="imgright2"/></a></div>
                        <div id="logo2"><a href="http://myanmarbuilddecor.com/VisitorRegistrationClosed.html" target="_blank"><img src="<?php echo BASE_HREF; ?>images/regis.png" alt="" class="imgright2"/></a></div><!-- end header right -->
					</div><!-- end topheader -->

                    <div id="topmenu">
                        <div id="navigation">
                            <ul id="nav">

                                <li class="noborder">
                                    <a href="<?php echo BASE_HREF; ?>">Home</a>
                                </li>

                                <li>
                                    <a href="#">About the Show</a>
                                    <ul>
                                        <li><a href="<?=BASE_HREF;?>page/about_myanmar">About Myanmar</a></li>
                                        <li><a href="<?=BASE_HREF;?>page/industry_ataglance">Industry at A Glance</a></li>
                                        <li><a href="<?=BASE_HREF;?>page/about_venue">About Venue</a></li>
                                        <li><a href="<?=BASE_HREF;?>page/about_organizer">About Organizer</a></li>
                                    	<li><a href="<?=BASE_HREF;?>page/supporting_organization">Supporting Organization</a></li>
                            			<li><a href="<?=BASE_HREF;?>page/post_show_report">Post Show Report</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#">For Visitors</a>
                                    <ul>
                                        <li><a href="<?=BASE_HREF;?>page/visitor_profile">Visitors Profile</a></li>
                                        <li><a href="http://myanmarbuilddecor.com/VisitorRegistrationClosed.html" target="_blank">Visitor Registration</a></li>
                                        <li><a href="<?=BASE_HREF;?>page/admission_policy">Admission Policy</a></li>
                                        <li><a href="<?=BASE_HREF;?>page/travel_accommodation">Travel & Accommodation</a></li>
                                        <li><a href="<?=BASE_HREF;?>page/visa_information">Visa Information</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#">For Exhibitors</a>
                                    <ul>
                                        <li><a href="<?=BASE_HREF;?>page/exhibitors_profile">Exhibitors Profile</a></li>
                                        <li><a href="<?=BASE_HREF;?>page/participation_fee">Participation Fee</a></li>
                                        <li><a href="<?=BASE_HREF;?>space">Space Booking</a></li>
                                        <li><a href="http://myanmarbuilddecor.com/systemclosed.html">Online Exhibitor Manual</a></li><!--http://www.thevista-oem.com/ICVeX/A&D/index.asp-->
                                        <!--<li><a href="<?=BASE_HREF;?>page/sponsorship_opportunity">Sponsorship Opportunity</a></li>-->
                                    </ul>
                                </li>

                                <li>
                                    <a href="#">Seminar & Special Activity</a>
                                    <ul>
                                    	<li><a href="<?=BASE_HREF;?>seminar">Seminar / Conference</a></li>
                            			<li><a href="<?=BASE_HREF;?>seminar/index/2">Special Activity</a></li>
                                       <!-- <li><a href="http://myanmarbuilddecor.com/systemclosed.html">Seminar / Conference</a></li>
                            			<li><a href="http://myanmarbuilddecor.com/systemclosed.html">Special Activity</a></li>-->
                                    </ul>
                                </li>

                                <li>
                                    <a href="#">News & Publicities</a>
                                    <ul>
                                        <li><a href="<?=BASE_HREF;?>article/news">News</a></li>
                                        <li><a href="<?=BASE_HREF;?>pub">Publicities</a></li>
                                        <li><a href="<?=BASE_HREF;?>gallery">Gallery</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#">Download</a>
                                    <ul>
                                        <li><a href="<?=BASE_HREF;?>download/brochure">Brochure</a></li>
                                        <li><a href="<?=BASE_HREF;?>download/others">Others</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="#">Contact</a>
                                    <ul>
                                        <li><a href="<?=BASE_HREF;?>contact/organizer">Organizer</a></li>
                                        <li><a href="<?=BASE_HREF;?>contact/sales_agent">Sales Agents</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </div><!-- end of navigation -->
                    </div><!-- end topmenu -->

                </div>
                <!-- END HEADER -->
</body>
