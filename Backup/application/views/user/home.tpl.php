

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
            <?php
                if (count($article_list['data'])>0) {
                    foreach ($article_list['data'] as $data) {
                        if (is_file(PATH_UPLOADS."/article/{$data['article_pic']}")) $thumb = BASE_HREF."uploads/article/{$data['article_pic']}";
                        else $thumb =  BASE_HREF."uploads/article/no_pic_220.jpg";
            ?>
                <div style="float:left; width:540px; margin-bottom:20px;">
                
               	<img src="<?=$thumb?>" alt="" class="imgcontent" />
                <h2><?=$data['article_title']?></h2>
                <img src="<?=BASE_HREF;?>images/new.gif" /><?=$data['article_sub_title']?><br /><strong><a href="<?=BASE_HREF;?>article/view/<?=$data['article_id'];?>">Read More</a></strong> ..  
                </div>            
      			<div style="clear:both;"></div>
            
            <?php }} ?>
            
            <?php
                if (count($publicities_list['data'])>0) {
                    foreach ($publicities_list['data'] as $data) {
                        $thumb = $this->f_lib->getPath($data['publicities_id'], $data['publicities_pic'], 'uploads/publicities', 'default.jpg');
            ?>
                <div style="float:left; width:540px; margin-bottom:20px;">
                
               	<img src="<?=$thumb?>" alt="" class="imgcontent" />
                <h2><?=$data['publicities_title']?></h2>
                <img src="<?=BASE_HREF;?>images/new.gif" /><?=$data['publicities_sub_title']?><br /><strong><a href="<?=BASE_HREF;?>pub/view/<?=$data['publicities_id'];?>">Read More</a></strong> ..  
                </div>            
      			<div style="clear:both;"></div>
            
            <?php }} ?>
            
             <?php
                    if (count($download_list['data'])>0) {
                        foreach ($download_list['data'] as $data) {
                        	//$thumb = $this->f_lib->getPath($data['download_id'], $data['download_pic'], 'uploads/download', 'default.jpg');
							$thumb = $this->f_lib->getPathFolder($data['download_id'], $data['download_pic'], 'uploads/download');
                ?>
            
                <div style="float:left; width:540px; margin-bottom:20px;">
                
               	<img src="<?=$thumb?>" alt="" class="imgcontent" />
                <h2><?=$data['download_title']?></h2>
                <img src="<?=BASE_HREF;?>images/new.gif" /><?=$data['publicities_sub_title']?><br /><strong><a href="<?=BASE_HREF;?>uploads/download/<?=$data['download_file'];?>">Read More</a></strong> ..  
                </div>            
      			<div style="clear:both;"></div>
            
            <?php }} ?>

            
        </div><!-- end maincontent -->
    </div><!-- end content left -->
    
    <div id="sideright">
        <div class="sidebox">
          <h2>Industry at a glance</h2>
            
          <p>
              <style>
                #news-container , #news-container ul { height:200px !important; overflow:hidden; }
              </style>
          </p>
          <div class="padbox">
            <blockquote>
                <div id="news-container" style="margin-top: 0px; width:260px; height: 200px !important;  ">
                       <ul id="news-containe">
                            <li><i class="fa-dot-circled"></i>According to Asian Development...</li>
                            <li><i class="fa-dot-circled"></i>McKinsey estimates that Myanmar...</li>
                             <li><i class="fa-dot-circled"></i>Myanmar construction sector...</li>
                             <li><i class="fa-dot-circled"></i>The industry value stood at USD...</li>
                             <li><i class="fa-dot-circled"></i>The new Myanmar Investment...</li>
                             <li><i class="fa-dot-circled"></i>Increased synergies between real...</li>
                             <li><i class="fa-dot-circled"></i>Domestic investment in Myanmar&rsquo;s...</li>
                             <li><i class="fa-dot-circled"></i>150 foreign companies are expected...</li>
                             <li><i class="fa-dot-circled"></i>Myanmar is estimated to require...</li>
                            
                 </ul>
                 </div>
                    
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
            	<!--<p>
            	  <iframe width="220" height="130" src="https://www.youtube.com/embed/z0k0aE6Gs4U?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
           	  </p>-->
              <!--  <p>
                    <a href="http://www.cambodiaarchitectdecor.com" target="_blank">
                        <img src="<?php echo BASE_HREF; ?>images/Left-icon-01.png" alt="" class="imgleft" /
                    </a>
                </p>  -->
                <!--<p>
                    <a href="http://www.cambodiaarchitectdecor.com/home">
                        <img src="<?php echo BASE_HREF; ?>images/Lefticon_CAD-01.png" alt="" class="imgleft" />
                    </a>
                </p>-->
                <p>
                    <a href="<?=BASE_HREF;?>space">
                        <img src="<?php echo BASE_HREF; ?>images/Left-icon-02.png" alt="" class="imgleft" />
                    </a>
                </p>
                <p> <a href="http://myanmarbuilddecor.com/VisitorRegistrationClosed.html" target="_blank"><img src="<?php echo BASE_HREF; ?>images/Left-icon-03.png" alt="" class="imgleft" /></a><!--http://www.thevista-oem.com/ICVeX/reg/a&d-->
              </p>
                <p> <a href="#"><img src="<?php echo BASE_HREF; ?>images/Left-icon-04.png" alt="" class="imgleft" /></a><!--<?=BASE_HREF;?>page/special_activity-->
                </p>
            </div>
           <!--  <div style="clear:both;"></div>
         <div style="padding:0;z-index:-99;">
               <h1 align="center" style="margin-top:20px;"><strong>Alliance Partners</strong></h1>
                <ul id="bxslider" style="padding:0;margin:0;">
                  <li ><a href="http://service.ciec-expo.com/jiancai2007/index_e.htm" target="_blank"><img src="<?php echo BASE_HREF; ?>images/China-left.jpg" /></a></li>
                  <li><a href="http://www.jma.or.jp/jhbs/en/index.html" target="_blank"><img src="<?php echo BASE_HREF; ?>images/Japan-left.jpg" /></a></li>
                </ul> 	  
		  </div><!-- end clear:both -->	 
                    <script>
                    $(function(){
					  $('#bxslider').bxSlider({
					  	controls : false
					  });
					});
					</script>
            
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
        <style type="text/css">
		.setcenter{
			text-align:center;
		}
		.setcenter li{
			-webkit-box-shadow: 1px 1px 4px 4px rgba(50, 50, 50, 0.18);
			-moz-box-shadow:    1px 1px 4px 4px rgba(50, 50, 50, 0.18);
			box-shadow:         1px 1px 4px 4px rgba(50, 50, 50, 0.18);
		}
		</style>
        <!-- ปิดไว้ชั่วคราว h1 style="margin-left:15px;">PRODUCT HIGHLIGHT</h1>
			<div id="ca-container" class="ca-container">
            <div class="ca-nav"><span class="ca-nav-prev" id="demo5-backward" style="margin-top:-10px;">Previous</span><span id="demo5-forward" class="ca-nav-next" style="margin-top:-10px;">Next</span></div>
				<div id="demo5" class="ca-wrapper scroll-img image-popup-no-margins">
                <ul class="setcenter">
                	
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/002.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/002.jpg">
                    <p>AMERICANTOOL (THAILAND) CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/003.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/003.jpg">
                    <p>BAANTHAIHOME CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/004.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/004.jpg">
                    <p>BOONPRAPA GROUP CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/005.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/005.jpg">
                    <p>CARPETS INTERNATIONAL THAILAND CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/006.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/006.jpg">
                    <p>CHANINTR LIVING</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/007.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/007.jpg">
                    <p>CHAROEN SOMPRASONG CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/008.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/008.jpg">
                    <p>CORNER 43 DÉCOR</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/009.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/009.jpg">
                    <p>DD POLYURETHANE CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/010.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/010.jpg">
                    <p>FAT CAT DECOR CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/011.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/011.jpg">
                    <p>FUTURE SIGN CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/012.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/012.jpg">
                    <p>HAFELE(THAILAND)CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/013.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/013.jpg">
                    <p>IMEX INTERNATIONAL CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/014.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/014.jpg">
                    <p>JARTON & SONS CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/015.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/015.jpg">
                    <p>K.BRIGHT CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/016.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/016.jpg">
                    <p>KENKOON EX CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/017.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/017.jpg">
                    <p>KINGBANGKOK INTERTRADE CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/018.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/018.jpg">
                    <p>LEOWOOD INTERTRADE CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/019.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/019.jpg">
                    <p>MINDSCAPE ARCHITECTS CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/020.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/020.jpg">
                    <p>MODERN AVENUE (THAILAND)</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/021.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/021.jpg">
                    <p>MODERNFORM  GROUP PUBLIC CO.,LTD</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/022.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/022.jpg">
                    <p>MOTOYUKI (THAILAND) CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/023.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/023.jpg">
                    <p>MP SYNERGY Co.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/024.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/024.jpg">
                    <p>MYANMAR CMB SERVICES CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/025.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/025.jpg">
                    <p>N.R.ENGINEERING CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/026.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/026.jpg">
                    <p>NAMSANG ENGINEERING CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/027.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/027.jpg">
                    <p>PAIBOONKIJTHANA CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/028.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/028.jpg">
                    <p>PERFECT OFFICE FURNITURE CO.LTD.</p>
                    </a>
                    </li>                   
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/030.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/030.jpg">
                    <p>QUICKFRAME SYSTEMS CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/031.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/031.jpg">
                    <p>REETECH CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/033.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/033.jpg">
                    <p>TOA PAINT(MYANMAR)CO..LTD</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/034.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/034.jpg">
                    <p>TOTAL JACQUARD CO..LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/035.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/035.jpg">
                    <p>VISTA INNO CO.,LTD.</p>
                    </a>
                    </li>                    
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/037.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/037.jpg">
                    <p>WORLD EXCELLENT INTERTRADE CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/038.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/038.jpg">
                    <p>XL HOLDING GROUP CO.,LTD.</p>
                    </a>
                    </li>
                     <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/039.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/039.jpg">
                    <p>BVZ ASIA</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/039.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/040.jpg">
                    <p>D 335 STUDIO</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/041.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/041.jpg">
                    <p>ICON MANUFACTURING CO., LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/042.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/042.jpg">
                    <p>JANSIRIWOODTECH CO.,LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/043.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/043.jpg">
                    <p>JARKEN GROUP OF COMPANIES</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/044.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/044.jpg">
                    <p>PERFORMAX INTERTRADE CO., LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/045.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/045.jpg">
                    <p>QUATTRO DESIGN CO., LTD.</p>
                    </a>
                    </li>
                    <li>
                    <a href="http://myanmarbuilddecor.com/ProductHighlight/Full_page/046.jpg">
                    <img src="http://myanmarbuilddecor.com/ProductHighlight/Cover/046.jpg">
                    <p>WESTERN DECOR CORPORATION CO., LTD.</p>
                    </a>
                    </li>    
                    </ul>
				</div>
			</div>
			</div> ปิดไว้ชั่วคราว-->
        <link rel="stylesheet" type="text/css" href="CircularContentCarousel/css/style.css" />
		<link rel="stylesheet" type="text/css" href="CircularContentCarousel/css/jquery.jscrollpane.css" media="all" />
       <script type="text/javascript" src="CircularContentCarousel/js/jquery.easing.1.3.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="CircularContentCarousel/js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="CircularContentCarousel/js/jquery.contentcarousel.js"></script>
		<style type="text/css">
		.ca-container img{
			width:200px;
			height:140px;
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
  //distance: 140 
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