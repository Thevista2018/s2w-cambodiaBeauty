<style type="text/css">
  .entry-image{
    max-height: 250px;
    overflow: hidden;
    border:1px solid #ddd;
    padding: 5px;
  }
  .entry {
    position: relative;
    margin: 0 0 20px;
    padding: 0 0 20px;
    border-bottom: 2px solid #F5F5F5;
  }
  @media only screen and (min-width: 576px) {	
    .entry-image {
      height: 148px !important;
    }
  }
  @media only screen and (min-width: 768px) {	
    .entry-image {
      height: 114px !important;
    }
  }
  @media only screen and (min-width: 992px) {	
    .entry-image {
      height: 150px !important;
    }
  }
  @media only screen and (min-width: 1200px) {	
    .entry-image {
      height: 185px !important;
    }
  }
</style>
<!-- Page Title
============================================= -->
<section id="page-title">

  <div class="container clearfix">
    <h1>dowload</h1>
    <!-- <span><?=$Decision;?></span> -->
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="active">Dowload</li>
    </ol>
  </div>

</section><!-- #page-title end -->
<!-- Site Content
============================================= -->
<section id="content">

  <div class="content-wrap notoppadding topmargin-sm">

    <div class="container clearfix nobottommargin">
        <div class="col_one_fourth">
          <?=$this->banner->show();?>
        </div>

        <div class="col_three_fourth col_last">
          <?PHP if(count($listData) != 0){?>
          <div>
          <!-- Portfolio Filter
					============================================= -->
					<ul id="portfolio-filter" class="portfolio-filter clearfix" data-container="#portfolio">

            <li class="activeFilter"><a href="#" data-filter="*">Show All</a></li>
            <li><a href="#" data-filter=".pf-brochure">Brochure</a></li>
            <li><a href="#" data-filter=".pf-others">Others</a></li>

					</ul><!-- #portfolio-filter end -->

					<div id="portfolio-shuffle" class="portfolio-shuffle" data-container="#portfolio">
						<i class="icon-random"></i>
					</div>

					<div class="clear"></div>

          <!-- Portfolio Items
					============================================= -->
					<div id="portfolio" class="portfolio grid-container portfolio-3 portfolio-masonry clearfix">
            <?PHP
              foreach ($listData as $key => $value) {
                if($value['download_type'] == 1){
                  $pf = 'brochure';
                  $folder = 'Brochure';
                }else if($value['download_type'] == 2){
                  $pf = 'others';
                  $folder = 'Others';
                }
            ?>
						<article class="portfolio-item pf-<?=$pf;?>">
              <div class="entry clearfix">
                <div class="entry-image">
                  <?PHP if($value['download_urlvideo'] == ""){ ?>
                  <a href="<?=base_url('uploads/download/file/'.$value['download_file']);?>"><img class="image_fade" src="<?=base_url('uploads/download/img/'.$value['download_image']);?>" alt=""></a>
                  <?PHP }else{?>
                  <iframe src="<?=$value['download_urlvideo'];?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                  <?PHP }?>
                </div>
                <div class="entry-title">
                  <h4><a href="<?=base_url('uploads/download/file/'.$value['download_file']);?>" class="color-blue" target="_blank"> <?=$value['download_title'];?></a></h4>
                </div>
                <ul class="entry-meta clearfix">
                  <li><i class="icon-calendar3"></i> <?=date('d M Y', strtotime($value['download_datecreate']));?></li>
                  <li><i class="icon-folder-open"></i> <?=$folder;?></li>
                </ul>
                <br/>
                <div class="entry-content">
                  <a href="<?=base_url('uploads/download/file/'.$value['download_file']);?>" class="button button-border button-rounded button-aqua" target="_blank" class="color-blue">Dowload File</a>
                </div>
              </div>
						</article>
            <?PHP }?>

					</div><!-- #portfolio end -->
        </div>

        <?PHP }else {
          echo 'Information will be available soon.';
        }?>

        </div>

    </div>

  </div>

</section>
