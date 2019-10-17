<?php
    $grupyear = array();
    if(count($listData) != 0){
        $key = 0;
        foreach ($listData as $key => $value) {
            if(!empty($value['gallery_datecreate'])){
                $d = explode('-', $value['gallery_datecreate']);
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
    <h1>Gallery</h1>
    <!-- <span><?=$Decision;?></span> -->
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="active">Gallery1</li>
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
            <?PHP  if(count($grupyear) != 0){
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
					<div id="portfolio" class="portfolio grid-container portfolio-3 clearfix">
            <?PHP
            foreach ($listData as $key => $value) {
              $d = explode('-', $value['gallery_datecreate']);
              $this->db->select('*');
          		$this->db->where(array('gallery_id' => $value['gallery_id'], 'subgallery_status !=' => 0));
          		$this->db->order_by('subgallery_status DESC,subgallery_lastedit ASC');
          		$query = $this->db->get('tb_subgallery');
          		$listsubgallery = $query->result_array();
            ?>
						<article class="portfolio-item pf-<?=$d[0]?>">
              <div class="portfolio-image">
                <a href="<?=site_url('gallerys/gallerydetail/'.$value['gallery_id'])?>">
									<img src="<?=base_url('uploads/gallery/'.$listsubgallery[0]['subgallery_images']);?>" alt="<?=$listsubgallery[0]['subgallery_name']?>">
								</a>
								<div class="portfolio-overlay" data-lightbox="gallery">
                  <?PHP
                  foreach ($listsubgallery as $k => $v) {
                    if($k == 0){
                      $c = 'left-icon';
                      $i = '<i class="icon-line-stack-2"></i>';
                    }else{
                      $c = 'hidden';
                      $i = '';
                    }
                  ?>
                  <a href="<?=base_url('uploads/gallery/'.$v['subgallery_images']);?>" class="<?=$c;?>" data-lightbox="gallery-item"><?=$i?></a>
                  <?PHP }?>
									<a href="<?=site_url('gallerys/gallerydetail/'.$value['gallery_id'])?>" class="right-icon"><i class="icon-line-ellipsis"></i></a>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a href="<?=site_url('gallerys/gallerydetail/'.$value['gallery_id'])?>"><?=$value['gallery_title_th']?></a></h3>
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
