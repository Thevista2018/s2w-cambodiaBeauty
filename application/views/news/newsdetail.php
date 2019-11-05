<?PHP
  foreach ($listnews as $key => $value) {
    $Image = $value['article_image'];
    $Videourl = $value['article_url'];
    $Type = $value['article_type'];
    $Title = $value['article_title'];
    $Detail = $value['article_detail'];
    $Createby = $value['article_createby'];
    $Date = $value['article_datecreate'];
  }
?>
<!-- Page Title
============================================= -->
<section id="page-title">

  <div class="container clearfix">
    <h1><?=$Pages;?></h1>
    <!-- <span><?=$Decision;?></span> -->
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="active"><?=$Pages;?></li>
    </ol>
  </div>

</section><!-- #page-title end -->
<!-- Site Content
============================================= -->
<section id="content">

  <div class="content-wrap notoppadding topmargin-sm">

    <div class="container clearfix nobottommargin">
        

        <div class="col_full">

          <!-- Post Content
					============================================= -->
					<div class=" nobottommargin clearfix">

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
									<li><i class="icon-folder-open"></i> <?PHP if($Type == 1){echo 'News';}else if($Type == 2){echo 'Press Release';}else if($Type == 3){echo 'Publicities';}?></li>
								</ul><!-- .entry-meta end -->
                <?PHP if($typepage != 'seminar'){ ?>
								<!-- Entry Image
								============================================= -->
								<div class="entry-image">
                  <?PHP if(empty($Videourl)){ ?>
									<!-- <a href="#"><img src="<?=base_url('uploads/custom/'.$Image);?>" alt=""></a> -->
                  <?PHP }else {?>
                  <iframe src="<?=$Videourl;?>" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                  <?PHP }?>

								</div><!-- .entry-image end -->
                <?PHP }?>
								<!-- Entry Content
								============================================= -->
								<div class="entry-content notopmargin">
									<?=$Detail;?>
									<!-- Post Single - Content End -->
                </div>
              </div>
            </div>
        </div>

    </div>

  </div>

</section>
