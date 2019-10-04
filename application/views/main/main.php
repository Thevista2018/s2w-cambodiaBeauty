<style type="text/css">
  .entry-image{
    max-height: 250px;
    overflow: hidden;
  }
  .slider-mobile{
    margin-left: 0px;
    margin-right: 0px;
    width: 100% !important;
    padding-left: 0px;
    padding-right: 0px;
  }
  @media (max-width: 767px) {
  	.m-slider{
  		margin: 0px;
      padding: 0px;
      width: 100% !important;
  	}
  }

  /*UPDATE 01/02/2019 */
  .col_three_fourth{margin-bottom: 10px !important; width: 275px;}
  .swiper-slide-ht{
    width: 100%;
    height: 160px;
    margin-bottom: 0px;
  }
  .swiper_wrapper {height: 160px;}
  @media only screen and (min-width: 479px) {
    .col_three_fourth{width: 440px;}
    .swiper-slide-ht{width: 100%; height: 240px;}
    .swiper_wrapper {height: 240px;}
  }
  @media only screen and (min-width: 576px) {
    .swiper-slide-ht{height: 240px;}
  }
  @media only screen and (min-width: 768px) {
    .col_three_fourth{width: 720px;}
    .swiper-slide-ht{height: 390px;}
    .swiper_wrapper {height: 390px;}
  }
  @media only screen and (min-width: 992px) {
    .swiper-slide-ht{
      width: 100%;
      height: 390px;
    }
    .col_three_fourth { width: 74%;}
  }
  @media only screen and (min-width: 1200px) {
    .swiper-slide-ht{
      width: 100%;
      height: auto;
    }
    .swiper_wrapper{height: 420px;}
  }
</style>
<!-- Site Content
============================================= -->
<section id="content">

  <div class="content-wrap notoppadding topmargin-sm">
    <div class="container clearfix m-slider">
      <div class="col_one_fourth nobottommargin hidden-xs hidden-sm">
          <h3>Industry at a glance</h3>
          <div>
            <div class="swiper_wrapper swiper-post clearfix">
                  <div class="swiper-container swiperText">
                      <?PHP if(count($listIndustry)){?>
                      <div class="swiper-wrapper">
                          <?PHP foreach ($listIndustry as $key => $value) {?>
                          <div class="swiper-slide swiperText-slide">
                              <i class="icon-line-disc"></i>
                              <?PHP if(!empty($value['industry_link'])){ ?>
                              <a href="<?=$value['industry_link']?>" target="_blank">
                                <?=$value['industry_title']?>
                              </a>
                              <?PHP }else{?>
                                <?=$value['industry_title']?>
                              <?PHP }?>
                          </div>
                          <?PHP }?>
                      </div>
                      <?PHP }?>
                  </div>
              </div>

          </div>

      </div>
      <center>
      <div class="col_three_fourth col_last nobottommargin">
        <!-- <section id="slider" class="boxed-slider swiper_wrapper wiper-slide-ht clearfix notoppadding"> -->
        <section id="slider" class="boxed-slider swiper_wrapper wiper-slide-ht clearfix notoppadding" data-autoplay="7000" data-speed="650" data-loop="true">
          <div class="swiper-container swiper-parent">
    				<div class="swiper-wrapper">
              <?PHP
                if(count($listSlider) != 0){
                  foreach ($listSlider as $key => $value) {
                      if($value['slider_color'] != ""){
                        $color = 'style="color:'.$value['slider_color'].'"';
                      }else{
                        $color = "";
                      }
                    if($value['slider_type'] == 1){
              ?>
              <?PHP if($value['slider_msg_th'] != ""){?>
              <div class="swiper-slide" style="background-image: url('<?=base_url('uploads/slider/'.$value['slider_name']);?>');">
                <a href="<?PHP if(!empty($value['slider_link'])){echo $value['slider_link'];}else{echo '';}?>">
                  <?PHP if(!empty($value['slider_msg_th'])){?>
    							<div class="slider-caption slider-caption-center">
    								<h2 data-caption-animate="fadeInUp" <?=$color;?>><?=$value['slider_msg_th']?></h2>
    								<!-- <p data-caption-animate="fadeInUp" data-caption-delay="200">Create just what you need for your Perfect Website. Choose from a wide range of Elements &amp; simply put them on our Canvas.</p> -->
    							</div>
                  <?PHP }?>
                </a>
    					</div>
              <?PHP }else{ ?>
                <div class="swiper-slide">
                  <a href="<?PHP if(!empty($value['slider_link'])){echo $value['slider_link'];}else{echo '';}?>">
                    <img src="<?=base_url('uploads/slider/'.$value['slider_name']);?>" class="swiper-slide-ht" alt="">
                  </a>
      					</div>
              <?PHP }?>
                  <?PHP }else if($value['slider_type'] == 2){?>
                    <div class="swiper-slide dark">
                      <a href="<?PHP if(!empty($value['slider_link'])){echo $value['slider_link'];}else{echo '';}?>">
                      <?PHP if(!empty($value['slider_msg_th'])){?>
          							<div class="slider-caption slider-caption-center">
          								<h2 data-caption-animate="fadeInUp" <?=$color;?>><?=$value['slider_msg_th'];?></h2>
          								<!-- <p data-caption-animate="fadeInUp" data-caption-delay="200">Looks beautiful &amp; ultra-sharp on Retina Screen Displays. Powerful Layout with Responsive functionality that can be adapted to any screen size.</p> -->
          							</div>
                      <?PHP }?>
          						<div class="video-wrap">
          							<video id="slide-video" poster="<?=base_url('uploads/slider/'.$value['slider_imagesvideo']);?>" preload="auto" loop autoplay muted>
                          <?PHP
                            $ex = explode(".",$value['slider_video']);
                            $type = $ex[1];
                            if($type == "webm"){
                          ?>
          								<source src='<?=base_url('uploads/slider/'.$value['slider_video']);?>' type='video/webm' />
                          <?PHP }else if($type == "mp4"){?>
          								<source src='<?=base_url('uploads/slider/'.$value['slider_video']);?>' type='video/mp4' />
                          <?PHP }?>
          							</video>
          							<div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
          						</div>
                      </a>
          					</div>
                  <?PHP }else if($value['slider_type'] == 3){?>
                    <div class="swiper-slide dark">
                      <a href="<?PHP if(!empty($value['slider_link'])){echo $value['slider_link'];}else{echo '';}?>">
                      <div class="videoWrapper">
                        <iframe width="560" height="250" src="<?=$value['slider_url']?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                      </div>
                      </a>
                    </div>
                  <?PHP }?>
              <?PHP
                  }
                }
              ?>

    				</div>
    				<div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
    				<div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
    				<div id="slide-number"><div id="slide-number-current"></div><span>/</span><div id="slide-number-total"></div></div>
    				<div class="swiper-pagination"></div>
    		</div>
        </section>

      </div>
      </center>
    </div>

    <div class="container clearfix nobottommargin">
        <div class="col_one_fourth">
          <?=$this->banner->show();?>
        </div>

        <div class="col_three_fourth col_last">
          <div class="fancy-title title-bottom-border">
            <h3>News & Publicities</h3>
          </div>
          <!-- Posts
          ============================================= -->
          <div id="posts" class="post-grid grid-container post-masonry grid-3 clearfix">
            <?PHP
              if(count($listArticle) != ''){
                foreach ($listArticle as $key => $value) {
                  if($value['article_type'] == 1){
                    $folder = 'News';
                    $Linkurl = site_url('newscontent/'.$value['article_id']);
                  }else if($value['article_type'] == 2){
                    $folder = 'Press Release';
                    $Linkurl = site_url('newscontent/'.$value['article_id']);
                  }else if($value['article_type'] == 3){
                    $folder = 'Publicities';
                    $Linkurl = site_url('publicitiescontent/'.$value['article_id']);
                  }
            ?>
            <div class="entry clearfix">
              <div class="entry-image">
                <?PHP if($value['article_url'] == ""){ ?>
                <a href="<?=$Linkurl;?>"><img class="image_fade" src="<?=base_url('uploads/custom/'.$value['article_image']);?>" alt=""></a>
                <?PHP }else{?>
                <iframe src="<?=$value['article_url']?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                <?PHP }?>
              </div>
              <div class="entry-title">
                <h2><a href="<?=$Linkurl;?>"> <?=$value['article_title'];?></a></h2>
              </div>
              <ul class="entry-meta clearfix">
                <li><i class="icon-calendar3"></i> <?=date('d M Y', strtotime($value['article_datecreate']));?></li>
                <li><i class="icon-folder-open"></i> <?=$folder;?></li>
              </ul>
              <!-- <div class="entry-content">
                <p><?=character_limiter(strip_tags($value['article_detail']),50);?></p>
                <a href="<?=$Linkurl;?>"class="more-link">Read More</a>
              </div> -->
            </div>
            <?PHP
                }
              }
            ?>

            <?PHP if(count($listDowload) != 0){?>
              <?PHP
                foreach ($listDowload as $key => $value) {
                  if($value['download_type'] == 1){
                    $pf = 'brochure';
                    $folder = 'Brochure';
                  }else if($value['download_type'] == 2){
                    $pf = 'others';
                    $folder = 'Others';
                  }
              ?>
                <div class="entry clearfix">
                  <div class="entry-image">
                    <?PHP if($value['download_urlvideo'] == ""){ ?>
                    <a href="<?=base_url('uploads/download/file/'.$value['download_file']);?>"><img class="image_fade" src="<?=base_url('uploads/download/img/'.$value['download_image']);?>" alt=""></a>
                    <?PHP }else{?>
                    <iframe src="<?=$value['download_urlvideo'];?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    <?PHP }?>
                  </div>
                  <div class="entry-title">
                    <h2><a href="<?=base_url('uploads/download/file/'.$value['download_file']);?>" target="_blank"> <?=$value['download_title'];?></a></h2>
                  </div>
                  <ul class="entry-meta clearfix">
                    <li><i class="icon-calendar3"></i> <?=date('d M Y', strtotime($value['download_datecreate']));?></li>
                    <li><i class="icon-folder-open"></i> <?=$folder;?></li>
                  </ul>
                  <div class="entry-content">
                    <a href="<?=base_url('uploads/download/file/'.$value['download_file']);?>" target="_blank" class="more-link">Dowload File</a>
                  </div>
                </div>
              <?PHP }?>
            <?PHP }?>

          </div><!-- #posts end -->

            <!-- Pagination
            ============================================= -->
            <ul class="pager nomargin">
              <li class="next"><a href="<?=site_url('news');?>">Read all</a></li>
            </ul><!-- .pager end -->
        </div>

    </div>

  </div>

</section>
