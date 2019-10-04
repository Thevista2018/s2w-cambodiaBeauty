<?php
    $grupyear = array();
    if(count($listData) != 0){
        $key = 0;
        foreach ($listData as $key => $value) {
            if(!empty($value['download_datecreate'])){
                $d = explode('-', $value['download_datecreate']);
                if($d[0] != '0000'){
                    $grupyear[$key] = $d[0];
                    $key++;
                }
            }
        }
        $grupyear = array_unique($grupyear);
        arsort($grupyear);
    }
?>
<!-- Page Title
============================================= -->
<section id="page-title">

  <div class="container clearfix">
    <h1><?=$Pages?></h1>
    <!-- <span><?=$Decision;?></span> -->
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="active"><?=$Pages?></li>
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
            <?  if(count($grupyear) != 0){
                    foreach ($grupyear as $key => $value) {
            ?>
            <li><a href="#" data-filter=".pf-<?=$value;?>">Year : <?=$value;?></a></li>
            <? }}?>

					</ul><!-- #portfolio-filter end -->

					<div id="portfolio-shuffle" class="portfolio-shuffle" data-container="#portfolio">
						<i class="icon-random"></i>
					</div>

					<div class="clear"></div>

          <!-- Portfolio Items
					============================================= -->
					<div id="portfolio" class="portfolio grid-container portfolio-3 portfolio-masonry clearfix">
            <?PHP foreach ($listData as $key => $value) {
              if($value['download_type'] == 1){
                $folder = 'Brochure';
              }else if($value['download_type'] == 2){
                $folder = 'Others';
              }
            ?>
            <?PHP $d = explode('-', $value['download_datecreate']);?>
						<article class="portfolio-item pf-<?=$d[0]?>">
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
                  <li><i class="icon-folder-open"></i> <?=$folder?></li>
                </ul>
                <div class="entry-content">
                  <a href="<?=base_url('uploads/download/file/'.$value['download_file']);?>" target="_blank" class="more-link">Dowload File</a>
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
