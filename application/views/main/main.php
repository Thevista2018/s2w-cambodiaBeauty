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

              <h4 style="margin-bottom: 10px !important;">NEWS <span class="color-blue">& PUBLICITIES</span></h4>
              <div class="border-color-blue"></div>

							<div class="entry clearfix margin-Top-wedget">
                <a href="images/blog/full/17.jpg">
                  <div class="entry-image">
                    <img class="image_fade color-black" src="<?=base_url('uploads/news/ID_00009.png');?>" alt="NEWS & PUBLICITIES">
                  </div>
                  <div class="entry-c">
                    <div class="entry-title">
                      <h2 class="color-blue">This is a Standard post with a Preview Image</h2>
                    </div>
                    <div class="entry-content color-black">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod est tenetur in. Eligendi, deserunt, blanditiis est quisquam doloribus voluptate id aperiam ea ipsum magni aut perspiciatis rem voluptatibus officia eos rerum deleniti quae nihil facilis repellat atque vitae voluptatem libero at eveniet veritatis ab facere.</p>
                    </div>
                    <div class="color-blue text-right">
                      01/01/2019
                    </div>
                  </div>
                </a>
							</div>

            </div>
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
