<?PHP
  $this->db->from('tb_slider');
  $this->db->where(array('slider_status' => "1"));
  $slider_qr= $this->db->get();
  $slider = $slider_qr->num_rows();

?>
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
		<section id="content">

			<div class="content-wrap" style="padding: 50px 0;">

				<div class="container clearfix">

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin col_last clearfix">

						<!-- Posts
						============================================= -->
						<div id="posts" class="small-thumbs">

              <?PHP if(count($listArticle)!= 0) {?>
                <h4 style="margin-bottom: 10px !important;">NEWS <span class="color-blue">& PUBLICITIES</span></h4>
                <div class="border-color-blue"></div>
                <?PHP foreach ($listArticle as $key => $value) { 
            
                  $Linkurl = site_url('news/newscontent/'.$value['article_id']);
                  if($value['article_type'] == 1){
                    $ps = 'news';
                    $folder = 'News';
                  }else if($value['article_type'] == 2){
                    $ps = 'release';
                    $folder = 'Press Release';
                  }else if($value['article_type'] == 3){
                    $ps = 'publicities';
                    $folder = 'Publicities';
                    $Linkurl = site_url('news/publicitiescontent/'.$value['article_id']);
                  }else if($value['article_type'] == 4){
                    $ps = 'seminar';
                    $folder = 'Seminar';
                    $Linkurl = site_url('seminarscontent/'.$value['article_id']);
                  }else if($value['article_type'] == 5){
                    $ps = 'activity';
                    $folder = 'Special Activity';
                    $Linkurl = site_url('activitycontent/'.$value['article_id']);
                  }
                
                ?>
                  <div class="entry clearfix margin-Top-wedget">
                    <a href="<?=$Linkurl;?>">
                      <div class="entry-image">
                        <?PHP if($value['article_url'] == ""){?>
                          <a href="<?=$Linkurl;?>"><img class="image_fade" src="<?=base_url('uploads/custom/'.$value['article_image']);?>" alt=""></a>
                        <?PHP }else{?>
                          <iframe src="<?=$value['article_url'];?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        <?PHP }?>
                      </div>
                      <div class="entry-c">
                        <div class="entry-title">
                          <h2 class="color-blue"><?=$value['article_title'];?></h2>
                        </div>
                        <div class="entry-content color-black">
                          <p><?=character_limiter(strip_tags($value['article_detail']),50);?></p>
                        </div>
                        <div class="color-blue text-right">
                        <?=date('d/m/Y', strtotime($value['article_lastedit']));?>
                        </div>
                      </div>
                    </a>
                  </div>
                <?PHP } ?>
              <?PHP } ?>

            </div>

            <?PHP if(count($listSupporter)!= 0) {?>
              <?PHP foreach ($listSupporter as $key => $value) { ?>
                <div class="col_full nobottommargin">
                  <h4 style="margin-bottom: 10px !important;"><?=$value['supporter_title'];?> <span class="color-blue"><?=$value['supporter_title2'];?></span></h4>
                  <div class="border-color-blue"></div>

                  <?PHP
                    $this->db->select("*");
                    $this->db->where(array('supportertype_show' => 1, 'supportertype_status' => 1, 'supporter_id' => $value['supporter_id']));
                    $this->db->order_by('supportertype_sort asc');
                    $query_supporterdetail = $this->db->get('tb_supporterdetail');
                    $listsupporterdetail = $query_supporterdetail->result_array();
                  ?>
                  <div class="clearfix" style="margin-top: 20px; margin-bottom: 20px;">
                    <?PHP if(count($listsupporterdetail)!= 6) {?>     
                    <div id="oc-clients" class="owl-carousel image-carousel carousel-widget" data-margin="20" data-nav="false" >
                    <?PHP }else{ ?>      
                      <div id="oc-clients" class="owl-carousel image-carousel carousel-widget" data-margin="20" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false" data-items-xxs="2" data-items-xs="3" data-items-sm="4" data-items-md="5"  >
                    <?PHP } ?>
                        <?PHP if(count($listsupporterdetail)!= 0) {?>
                          <?PHP foreach ($listsupporterdetail as $key => $values) { ?>
                              <div class="oc-item">
                                <a href="<?=$values['supportertype_url'];?>" target="_bank">
                                  <img width="<?=$values['supportertype_wigth'];?>" height="<?=$values['supportertype_height'];?>" src="<?=base_url('uploads/supporter/'.$values['supportertype_images']);?>" alt="Clients">
                                </a>
                              </div>
                          <?PHP } ?>
                        <?PHP } ?>
                      </div>
                  </div>
        
                </div>
              <?PHP } ?>
            <?PHP } ?>
            
            <!-- #posts end -->

					</div>
					<!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<div class="sidebar nobottommargin clearfix">
						<!-- <div class="sidebar-widgets-wrap"> -->

              <div class="widget  clearfix">
                <h4>BROCHURE</h4>
                <div class="border-color-blue"></div>
              </div>

							<div class="widget margin-Top-wedget clearfix">
								<img class="border-color-menuLeft" src="<?=base_url('assets/canvas/images/menu-left/menu_01.png');?>"/>
              </div>

              <div class="widget margin-Top-wedget clearfix">
								<img class="border-color-menuLeft" src="<?=base_url('assets/canvas/images/menu-left/menu_02.png');?>"/>
              </div>

              <div class="widget margin-Top-wedget clearfix">
								<img class="border-color-menuLeft" src="<?=base_url('assets/canvas/images/menu-left/menu_03.png');?>"/>
              </div>

              <div class="widget margin-Top-wedget clearfix">
								<img class="border-color-menuLeft" src="<?=base_url('assets/canvas/images/menu-left/menu_04.png');?>"/>
              </div>
              
						<!-- </div> -->

					</div>
					<!-- .sidebar end -->

				</div>

			</div>

		</section>
		<!-- #content end -->
