<?PHP
  if(count($listdata) != 0){
    foreach ($listdata as $key => $value) {
      $Id = $value['consub_id'];
      $Title = $value['consub_page_th'];
      $Decision = $value['consub_decision_th'];
      $Detail = $value['consub_detail_th'];
    }
  }
?>
<!-- Page Title
============================================= -->
<section id="page-title">

  <div class="container clearfix">
    <h1><?=$Title;?></h1>
    <span><?=$Decision;?></span>
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="active"><?=$Title;?></li>
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
          <!-- <?PHP if($Id == 9){?>
            <?PHP if(count($listIndustry) != 0){?>
            <ul class="list-group">
              <?PHP foreach ($listIndustry as $key => $value) {?>
              <?PHP if(!empty($value['industry_link'])){ ?>
							<li class="list-group-item"><a href="<?=$value['industry_link']?>" target="_blank"><b><?=$value['industry_title']?></b></a></li>
              <?PHP }else{?>
              <li class="list-group-item"><b><?=$value['industry_title']?></b></li>
              <?PHP }?>
              <?PHP }?>
						</ul>
            <?PHP }?>
          <?PHP }else{ echo $Detail;}?> -->

          <?=$Detail; ?>
        </div>

    </div>

  </div>

</section>
