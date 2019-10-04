

<!-- BEGIN CONTENT -->
<div id="content">
    
    <div id="content_left">
        <div id="slide_container">
            <div id="slider">
                <ul>	
                    <?php
                        if (count($slide_list['data'])>0) {
                            foreach ($slide_list['data'] as $data) {
                                $data['slide_pic'] = preg_replace('/thumb/', 'large', $data['slide_pic']);

                                if (is_file(PATH_UPLOADS."/slide/{$data['slide_pic']}")) $thumb = BASE_HREF."uploads/slide/{$data['slide_pic']}";
                                else $thumb =  BASE_HREF."uploads/slide/no_pic_220.jpg";
                    ?>
                    <li>
                        <a href="<?=$data['slide_link'];?>" target="_blank">
                            <img src="<?=$thumb;?>" class="img-responsive" title="<?=$data['slide_title'];?>" alt="<?=$data['slide_title'];?>" height="347">
                        </a>
                    </li>
                    <?php }} ?>
                </ul>
            </div><!-- end slider -->
        </div><!-- end slide container -->
        
        <div id="maincontent"><br />
            <h1>NEWS &amp; PUBLICITIES</h1>
            <br />
            <!-- =======Link To BROCHURE ============-->
            <div style="float:left; width:540px; margin-bottom:20px;">
            <!-- <img src="http://myanmarbuilddecor.com/uploads/download/ID_00016/ID_00016.jpg" alt="" class="imgcontent" />
			<h2>Exhibitors&rsquo; Voice of  &nbsp;Confidence 2014</h2> -->
            
              <img src="http://myanmarbuilddecor.com/uploads/home/h-080158.jpg" alt="" class="imgcontent" />
			<h2>Exhibitor’s Voice of Confidence</h2>
			
			 <img src="<?=BASE_HREF;?>images/new.gif" /><br />
			 <strong><a href="<?=BASE_HREF;?>article/view/22">Read More</a></strong><a href="uploads/download/ID_015.pdf">..</a>.<img src="<?=BASE_HREF;?>images/icon_checklist.png" alt=""/>
		  </div>
            <!-- =======Link To BROCHURE ============-->
          <div style="clear:both;"></div>
            <!--
            <?php
                if (count($article_list['data'])>0) {
                    foreach ($article_list['data'] as $data) {
                        if (is_file(PATH_UPLOADS."/article/{$data['article_pic']}")) $thumb = BASE_HREF."uploads/article/{$data['article_pic']}";
                        else $thumb =  BASE_HREF."uploads/article/no_pic_220.jpg";
            ?>
            <div style="float:left; width:540px; margin-bottom:20px;">
                <a href="<?=BASE_HREF;?>article/view/<?=$data['article_id'];?>">
                    <img src="<?=$thumb;?>" style="overflow:hidden;" width="220" height="100" alt="" class="imgleft" />

                    <h3><?=$data['article_title'];?></h3>
                    <?=$data['article_sub_title'];?>
                </a>
                <br />
                <strong><a href="<?=BASE_HREF;?>article/view/<?=$data['article_id'];?>">Read More</a></strong>...
                <img src="<?php echo BASE_HREF; ?>images/icon_checklist.png" alt=""/>
            </div>
            
            <div style="clear:both;"></div>
            
            <?php }} ?> -->
            
            <?php
                if (count($publicities_list['data'])>0) {
                    foreach ($publicities_list['data'] as $data) {
                        $thumb = $this->f_lib->getPath($data['publicities_id'], $data['publicities_pic'], 'uploads/publicities', 'default.jpg');
            ?>
            <div style="float:left; width:540px; margin-bottom:20px;">
                <!--a href="<?=BASE_HREF;?>uploads/publicities/<?=$data['publicities_file'];?>"-->
                   <!-- <img src="<?=$thumb;?>" style="overflow:hidden;" width="220" height="100" alt="" class="imgleft" />

                    <h3><?=$data['publicities_title'];?></h3>
                    <?=$data['publicities_sub_title'];?>-->
            <!--/a--><img src="http://myanmarbuilddecor.com/uploads/publicities/ID_00057.jpg" alt="" class="imgcontent" />
            <h2>Event&rsquo;s PR 2014</h2>
            <img src="<?=BASE_HREF;?>images/new.gif" /><br />
            <strong><a href="<?=BASE_HREF;?>pub/view/57">Read More</a></strong>...<img src="<?=BASE_HREF;?>images/icon_checklist.png" alt=""/> </div>
            
            <div style="clear:both;"></div>
            
            <?php }} ?>
            
            <!-- =======Link To About Venue ============-->
			<img src="<?=BASE_HREF;?>images/Show-home.jpg" alt="" class="imgcontent" />
			<h2>We were succeed on Myanmar Build&amp;Décor 2014</h2>
  <img src="<?=BASE_HREF;?>images/new.gif" /> Show Atmosphere<br /><strong><a href="<?=BASE_HREF;?>gallery/view/12">Read More</a></strong>...<img src="<?=BASE_HREF;?>images/icon_checklist.png" alt=""/>
			<!-- =======End To About Venue ============-->
            
        </div><!-- end maincontent -->
    </div><!-- end content left -->
    
    <div id="sideright">
        <div class="sidebox">
          <h2>Industry at a glance</h2>
            
          <p>
              <style>
                #news-container , #news-container ul { height:320px; overflow:hidden; }
              </style>
          </p>
          <div class="padbox">
            <blockquote>
                <div id="news-container" style="margin-top: 0px; height: 320px; text-align: justify;">
                        <ul>
                            <li><i class="fa-dot-circled"></i> <a href="http://myanmarbuilddecor.com/page/industry_ataglance">
                          <span style="text-align: justify">Myanmar construction industry is growing at an exponential rate with a CAGR of 20%. The residential and infrastructure sectors combined to almost 80% of the entire industry especially residential which has 49% of the market or investment value of about 1.5 Billion US Dollars. </span></a></li> 
                            <li><i class="fa-dot-circled"></i><a href="http://myanmarbuilddecor.com/page/industry_ataglance">
                          <span style="text-align: justify">Myanmar’s construction is still mainly concentrated in the residential sector fuelled by government housing plans and private commercial residential developments such as detached houses, apartments, and high end condominiums driven by urbanization.</span></a></li> 
                            <li><i class="fa-dot-circled"></i><a href="http://myanmarbuilddecor.com/page/industry_ataglance">
                            <span style="text-align: justify">In 2013, the Myanmar Ministry of Construction announced a target to build more   than one million houses across the country. This is slated to take a period of 20 years (50,000 units annually) to meet the demand for residential real estate. According to the Department of Human Settlement (DHSHD), only 7,000 houses are currently being built versus the annual demand of 20,000 units. The government has indicated its willingness to co-operate with private sector construction companies in major cities such as Yangon and Mandalay while wholly carrying out construction in other areas of the country using government loans.</span>
                          </a></li>
              <li><i class="fa-dot-circled"></i><a href="http://myanmarbuilddecor.com/page/industry_ataglance">                           <span style="text-align: justify">The use of construction materials in Myanmar from past to present has been mainly for functional until the third quarter of 2013 when more high rise hotels and building in Yangon have been built with more design, according to SCG Cement Materials Myanmar Executive. This growing development can be seen more commonly in restaurants, hotels and condominiums nowadays In Yangon with more design, more modernized and décor.</span></a></li></ul></div>
                    
<!--                    <ul id="vertical-ticker">
                        <li>Resulting from economic reform, the market for infrastructure and construction in Myanmar has been boosted actively by foreign investors particularly those from Thailand, China, South Korea and Hong Kong.</li>
                        <li>Foreign investment in construction and infrastructure resulted to fast development of new hotels, residential, commercial and institutional buildings.</li>
                        <li>The growth of construction industry by 25.4% has driven to huge demand of construction materials, interior related, décor, furniture, and accessories.</li>
                        <li>Business opportunities for import of construction materials and interior related product owing to the limited supply at the stage</li>
                    </ul>-->
            </blockquote>
                <strong><a href="<?=BASE_HREF;?>page/industry_ataglance">Read More</a></strong>...
                <img src="<?php echo BASE_HREF; ?>images/icon_checklist.png" alt=""/>
          </div>
        </div><!-- end sidebox -->
        
        <script>
        $(function(){
            $('#news-container').vTicker({
                speed: 500,
                pause: 3000,
                animation: 'fade',
                mousePause: false,
                showItems: 1
            });
        });
        </script>
        
        <div>
            <div class="padbox">
                <p>
                    <a href="<?=BASE_HREF;?>space">
                        <img src="<?php echo BASE_HREF; ?>images/b_booking.png" alt="" class="imgleft" />
                    </a>
                </p>
                <p> <a href="http://www.thevista-oem.com/ICVeX/reg/2015/bd"><img src="<?php echo BASE_HREF; ?>images/b_registion.png" alt="" class="imgleft" /></a><!--http://www.thevista-oem.com/ICVeX/reg/a&d-->
              </p>
                <p> <a href="http://myanmarbuilddecor.com/page/Information_will"><img src="<?php echo BASE_HREF; ?>images/b_active.png" alt="" class="imgleft" /></a><!--<?=BASE_HREF;?>page/special_activity-->
                </p>
            </div>
            
        </div><!-- end sidebox -->
    </div><!-- end sideright -->
</div>
    <?php
	if($_GET['s']==0){
	?>
    <br style="clear:both;" />
    <link rel="stylesheet" type="text/css" href="CircularContentCarousel/css/magnific-popup.css" />
        <script type="text/javascript" src="CircularContentCarousel/js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="CircularContentCarousel/js/zepto.js"></script>
        <script type="text/javascript" src="CircularContentCarousel/js/jquery.scrollbox.js"></script>
        <script type="text/javascript">
			$(document).ready(function() {
			$('.image-popup-no-margins a').magnificPopup({
			  type: 'image',
			  closeOnContentClick: true,
			  closeBtnInside: false,
			  fixedContentPos: true,
			  mainClass: 'mfp-with-zoom', // class to remove default margin from left and right side
			  image: {
				verticalFit: true
			  },
			  zoom: {
				enabled: true,
				duration: 300 // don't foget to change the duration also in CSS
			  }
			});
		});
		</script>
        <h1 style="margin-left:15px;">PRODUCT HIGHLIGHT</h1>
			<div id="ca-container" class="ca-container">
            <div class="ca-nav"><span class="ca-nav-prev" id="demo5-backward" style="margin-top:-10px;">Previous</span><span id="demo5-forward" class="ca-nav-next" style="margin-top:-10px;">Next</span></div>
				<div id="demo5" class="ca-wrapper scroll-img image-popup-no-margins">
                <ul>
                	<li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Cover/001.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/001.jpg">
                    <p>335A CO.,LTD</p>
                    </a>
                    </li>
               
                                
                    </ul>
				</div>
			</div>
			</div>
        <link rel="stylesheet" type="text/css" href="CircularContentCarousel/css/style.css" />
		<link rel="stylesheet" type="text/css" href="CircularContentCarousel/css/jquery.jscrollpane.css" media="all" />
       <script type="text/javascript" src="CircularContentCarousel/js/jquery.easing.1.3.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="CircularContentCarousel/js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="CircularContentCarousel/js/jquery.contentcarousel.js"></script>
		<style type="text/css">
		.ca-container img{
			width:230px;
			height:160px;
		}
		.ca-wrapper{
			position:relative;
			margin:0px auto 20px auto;
			width:970px !important;
			height:200px !important;
			padding-left:5px;
			background-color:#FFF;
		}
.scroll-img {
  width: 680px;
  height: 142px;
  color:#333;
  font-size:14px;
  overflow: hidden;
}
.scroll-img ul {
  width: 700px;
  height: 600px;
  margin: 0;
}
.scroll-img ul li {
  display: inline-block;
  margin: 10px 0 10px 10px;
}
#demo5.scroll-img ul {
  width: 1500px;
}
		</style>
		<script type="text/javascript">			  
			$(document).ready(function() {
			$('#demo5').scrollbox({
  direction: 'h',
  distance: 140 
  });
  $('#demo5-backward').click(function () {
  $('#demo5').trigger('backward');
});
$('#demo5-forward').click(function () {
  $('#demo5').trigger('forward');
});
		});
		</script>

        <?	
	}
	?>
<!-- END CONTENT -->