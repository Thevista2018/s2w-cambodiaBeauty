<?PHP
    $grupyear = array();
    if(count($listnews) != 0){
        $key = 0;
        foreach ($listnews as $key => $value) {
            if(!empty($value['article_datecreate'])){
                $d = explode('-', $value['article_datecreate']);
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
<style type="text/css">
  .entry-image{
    max-height: 250px;
    overflow: hidden;
  }
</style>
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
          <?PHP if(count($listnews) != 0){?>
          <div>
          <!-- Portfolio Filter
					============================================= -->
					<ul id="portfolio-filter" class="portfolio-filter clearfix" data-container="#portfolio">

            <li class="activeFilter"><a href="#" data-filter="*">Show All</a></li>
            <?PHP if(count($grupyear) != 0){
                    foreach ($grupyear as $key => $value) {
            ?>
            <li><a href="#" data-filter=".pf-<?=$value;?>">Year : <?=$value;?></a></li>
            <?PHP }}?>

					</ul><!-- #portfolio-filter end -->

					<div id="portfolio-shuffle" class="portfolio-shuffle" data-container="#portfolio">
						<i class="icon-random"></i>
					</div>

					<div class="clear"></div>

          <!-- Portfolio Items
					============================================= -->
					<div id="portfolio" class="portfolio grid-container portfolio-3 portfolio-masonry clearfix">
            <?PHP foreach ($listnews as $key => $value) {
              if($value['article_type'] == 1){
                $folder = 'News';
                $Linkurl = site_url('newscontent/'.$value['article_id']);
              }else if($value['article_type'] == 2){
                $folder = 'Press Release';
                $Linkurl = site_url('newscontent/'.$value['article_id']);
              }else if($value['article_type'] == 3){
                $folder = 'Publicities';
                $Linkurl = site_url('publicitiescontent/'.$value['article_id']);
              }else if($value['article_type'] == 4){
                $folder = 'Seminar';
                $Linkurl = site_url('seminarscontent/'.$value['article_id']);
              }else if($value['article_type'] == 5){
                $folder = 'Special Activity';
                $Linkurl = site_url('activitycontent/'.$value['article_id']);
              }
            ?>
            <?PHP $d = explode('-', $value['article_datecreate']);?>
						<article class="portfolio-item pf-<?=$d[0]?>">
              <div class="entry clearfix">
                <div class="entry-image">
                  <?PHP if($value['article_url'] == ""){ ?>
                  <a href="<?=$Linkurl;?>"><img class="image_fade" src="<?=base_url('uploads/custom/'.$value['article_image']);?>" alt=""></a>
                  <?PHP }else{?>
                  <iframe src="<?=$value['article_url'];?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                  <?PHP }?>
                </div>
                <div class="entry-title">
                  <h2><a href="<?=$Linkurl;?>"> <?=$value['article_title'];?></a></h2>
                </div>
                <ul class="entry-meta clearfix">
                  <li><i class="icon-calendar3"></i> <?=date('d M Y', strtotime($value['article_datecreate']));?></li>
                  <li><i class="icon-folder-open"></i> <?=$folder;?></li>
                </ul>
                <div class="entry-content">
                  <!-- <p><?=character_limiter(strip_tags($value['article_detail']),50);?></p> -->
                  <p></p>
                  <a href="<?=$Linkurl;?>"class="more-link">Read More</a>
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
