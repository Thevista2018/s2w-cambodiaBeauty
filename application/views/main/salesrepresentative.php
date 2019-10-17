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

            <?=$Detail; ?>

            <div class="clearfix">
                <?PHP if(count($listsalesrepresentative) != 0){ ?>
                    <?PHP foreach ($listsalesrepresentative as $key => $value) { ?>

                        <div class="entry-grid border-bottom-black">
                            <div>
                                <h4 style="margin-bottom: 10px;"><?=$value['salerep_name'];?></h4>
                                <label><?=$value['salerep_company'];?></label>
                                <div><label>Contact : &nbsp;</label><?=$value['salerep_contact'];?></div>
                                <div><label>Email : &nbsp;</label><?=$value['salerep_email'];?></div>
                                <div><label>Tel : &nbsp;</label><?=$value['salerep_tel'];?></div>
                                <div><label>Address : &nbsp;</label><?=$value['salerep_address'];?></div>
                                <br/>
                            </div> 
                            <img src="<?=base_url('uploads/salesrepresentative/'.$value['salerep_image']);?>" width="<?=$value['salerep_width'];?>px !important" height="<?=$value['salerep_height'];?>px !important" alt="salesrepresentative">
                        </div>

                    <?PHP } ?>
                <?PHP } ?>
            </div>
        </div>

    </div>

  </div>

</section>
