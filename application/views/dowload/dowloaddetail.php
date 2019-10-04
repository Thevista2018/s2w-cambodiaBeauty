<?PHP
  foreach ($listData as $key => $value) {
    $Title = $value['gallery_title_th'];
    $Createby = $value['gallery_createby'];
    $Date = $value['gallery_datecreate'];
  }
?>
<!-- Page Title
============================================= -->
<section id="page-title">

  <div class="container clearfix">
    <h1>gallery</h1>
    <!-- <span><?=$Decision;?></span> -->
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="active">Gallery</li>
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

          <!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin clearfix">

						<div class="single-post nobottommargin">

							<!-- Single Post
							============================================= -->
							<div class="entry clearfix">

								<!-- Entry Title
								============================================= -->
								<div class="entry-title">
									<h2><?=$Title?></h2>
								</div><!-- .entry-title end -->

								<!-- Entry Meta
								============================================= -->
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> <?=date('d M Y', strtotime($Date));?></li>
									<li><a href="#"><i class="icon-user"></i> <?=$Createby?></a></li>
								</ul><!-- .entry-meta end -->
								<!-- Entry Content
								============================================= -->
								<div class="entry-content notopmargin">
                  <?PHP
                    $this->db->select('*');
                    $this->db->where(array('gallery_id' => $value['gallery_id'], 'subgallery_status !=' => 0));
                    $this->db->order_by('subgallery_status DESC');
                    $query = $this->db->get('tb_subgallery');
                    $listsubgallery = $query->result_array();
                  ?>
                  <div data-lightbox="gallery">
                    <?PHP foreach ($listsubgallery as $key => $value) {?>
                    <a href="<?=base_url('uploads/gallery/'.$value['subgallery_images'])?>" data-lightbox="gallery-item"><img class="image_fade boximggallery" src="<?=base_url('uploads/gallery/'.$value['subgallery_images'])?>" alt="<?=base_url('uploads/gallery/'.$value['subgallery_name'])?>"></a>
                    <?PHP }?>
                  </div>

                </div>
              </div>
            </div>
        </div>

    </div>

  </div>

</section>
