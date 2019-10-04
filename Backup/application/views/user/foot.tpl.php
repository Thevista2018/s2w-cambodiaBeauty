</div><!-- end centercolumn -->
		</div><!-- end container top -->

		<div id="container_footer">
			<div class="centercolumn">

				<!-- BEGIN FOOTER -->
				<div id="footer">
						<div style="width:300px; color: #FFF; font-weight: bold; margin: 0 0 0 35px; padding: 20px 0px 0px 0px; float: left; display: inline-block;">
							<p>Organized by</p>
						    <p><img src="<?php echo BASE_HREF; ?>images/co-logo_01.png" height="100px" width="auto" alt="" style="vertical-align:middle" />
		                    <img src="<?php echo BASE_HREF; ?>images/logo_index.png" height="60p" alt="" style="vertical-align:middle" />
		                    </p>
						</div>
						<div style="width:300px; color: #FFF; font-weight: bold; margin: 0 0 0 35px; padding: 20px 0px 0px 0px; float: left; display: inline-block;">
							<p>Officially supported by</p>
							<p><img src="<?php echo BASE_HREF; ?>assets/images/MES2017.png" height="100px" width="auto" alt="" style="vertical-align:middle" />
						</div>




				  <!-- end footer left --><!--img src="<?php echo BASE_HREF; ?>images/CAD_-supporting-logo_23.png" alt="" style="vertical-align:middle;margin:25px 0px 0px -280px" height="40px" width="auto"/>
                        <img src="<?php echo BASE_HREF; ?>images/CAD_-supporting-logo_25.png" alt="" style="vertical-align:middle;margin:25px 0px 0px 10px" height="40px" width="auto"/>
                        <img src="<?php echo BASE_HREF; ?>images/CAD_-supporting-logo_27.png" alt="" style="vertical-align:middle;margin:25px 0px 0px 0px"height="40px" width="auto" />
                         <img src="<?php echo BASE_HREF; ?>images/CAD_-supporting-logo_29.png" alt="" style="vertical-align:middle;margin:-110px 0px 0px 140px"height="50px" width="auto" />

                        <img src="<?php echo BASE_HREF; ?>images/CAD_-supporting-logo_35.png" alt="" style="vertical-align:middle;margin:11px 0px 0px -180px" height="40px" width="auto"/>
                        <img src="<?php echo BASE_HREF; ?>images/CAD_-supporting-logo_36.png" alt="" style="vertical-align:middle;margin:-10px 0px 0px -5px" height="40px" width="auto"/>
                        <img src="<?php echo BASE_HREF; ?>images/CAD_-supporting-logo_37.png" alt="" style="vertical-align:middle;margin:-10px 0px 0px 0px"height="40px" width="auto" />
                         <img src="<?php echo BASE_HREF; ?>images/CAD_-supporting-logo_38.png" alt="" style="vertical-align:middle;margin:-75px 0px 0px 220px"height="40px" width="auto" /-->

                         <!--p style="margin:20px -100px 0px -645px">Co Sponsor <span>Bank Sponsor</span></p>
                         <img src="<?php echo BASE_HREF; ?>images/info/Hafele.jpg" alt="" style="vertical-align:middle;margin:20px 0px 0px -510px" height="20px"/>
                         <img src="<?php echo BASE_HREF; ?>images/info/JARKEN.png" alt="" style="vertical-align:middle;margin:0px 0px 0px 0px" height="100px"/>
                         <img src="<?php echo BASE_HREF; ?>images/info/MODERNFORM.jpg" alt="" style="vertical-align:middle;margin:0px 0px 0px 0px" height="40px"/-->









					<!--div id="footer_left">
					<div class="hedtext">Main Sponsor</div>
					<a href="http://www.scgbuildingmaterials.com/" target="_blank">
					<img src="<?php echo BASE_HREF; ?>images/logo_scg.png" alt="" style="vertical-align:middle" />
					</a>

					</div><!-- end footer right -->

				  <div class="clear"></div><!-- clear float -->
					<div id="footer_bottom" style=" margin-left:590px">&copy; Myanmar Build & Decor Copyright 2014 Organized by ICVeX</div><!-- end footer bottom -->
              </div>
				<!-- END FOOTER -->

			</div><!-- end centercolumn -->
		</div><!-- end container footer -->

	</div><!-- end container -->
    <link rel="stylesheet" href="<?=BASE_HREF; ?>css/portfolio.css" type="text/css" />
    <link rel="stylesheet" href="<?=BASE_HREF; ?>assets/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?=BASE_HREF; ?>assets/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?=BASE_HREF; ?>assets/css/magnific-popup.css" type="text/css" />
    <script type="text/javascript" src="<?=BASE_HREF; ?>assets/js/plugins.js"></script>
    <script type="text/javascript" src="<?=BASE_HREF;?>assets/js/functions.js"></script>


    <script type="text/javascript" charset="utf-8">
      $(document).ready(function(){
        $(function(){
            var $container = $('#portfolio');
            $container.isotope({ transitionDuration: '0.65s' });
            $('#portfolio-filter a').click(function(){
                $('#portfolio-filter li').removeClass('activeFilter');
                $(this).parent('li').addClass('activeFilter');
                var selector = $(this).attr('data-filter');
                $container.isotope({ filter: selector });
                return false;
            });

            $('#portfolio-shuffle').click(function(){
                $container.isotope('updateSortData').isotope({
                    sortBy: 'random'
                });
            });

            $(window).resize(function() {
                $container.isotope('layout');
            });
        });
        $("area[rel^='prettyPhoto']").prettyPhoto();

        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
//        $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
//
//        $("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
//          custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
//          changepicturecallback: function(){ initialize(); }
//        });
//
//        $("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
//          custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
//          changepicturecallback: function(){ _bsap.exec(); }
//        });
      });
    </script>
</body>
</html>
