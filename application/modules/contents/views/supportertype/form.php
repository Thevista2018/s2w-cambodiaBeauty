<?PHP
if(isset($listdata) and count($listdata) != 0){
  foreach ($listdata as $key => $value) {
    $Id = $value['supportertype_id'];
    $Text_images = $value['supportertype_images'];
    $Text_url = $value['supportertype_url'];
    $Text_wight = $value['supportertype_wigth'];
    $Text_height = $value['supportertype_height'];
    $Text_Sort = $value['supportertype_sort'];
  }
  $title = "Update";
  $actionUrl = site_url('contents/supportertype/update/');
}else{
  $title = "Create";
  $actionUrl = site_url('contents/supportertype/create/');
}
?>

<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?=$title;?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="<?=site_url('contents/supporter/index');?>">Supporter</a>
            </li>
            <li>
                <a href="<?=site_url('contents/supportertype/index/'.$supporter_id);?>">Supporter Detail</a>
            </li>
            <li class="active">
                <strong><?=$title;?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<!-- End breadcrumb for page -->

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
              <!-- Contents for page -->
              <div class="tabs-container">
                        <ul class="nav nav-tabs">
                          <!-- <?PHP if (in_array("thailand", $lg_get)) {?>
                          <li class="<?PHP if($lg_set == 'thailand'){echo 'active';}?>"><a data-toggle="tab" href="#tab-2" aria-expanded="false">Thailand</a></li>
                          <?PHP }?> -->
                            <div class="mail-tools tooltip-demo">
                                  <div class="btn-group pull-right">
                                    <button class="btn btn-w-m btn-default btn-sm Btn-reload" data-toggle="tooltip" data-placement="left" title="" data-original-title="Refresh page"><i class="fa fa-refresh"></i> Refresh</button>
                                    <?PHP
                                    if(!empty($Id)){
                                    ?>
                                    <a href="<?=site_url('main/pagesubDetail/'.$Id);?>" target="_blank">
                                    <button class="btn btn-w-m btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Preview this pages"><i class="fa fa-search"></i> Preview</button>
                                    </a>
                                    <?PHP }?>
                                  </div>
                              </div>
                        </ul>
                        <div class="tab-content">
                            <?PHP if (in_array("thailand", $lg_get)) {?>
                            <div id="tab-2" class="tab-pane <?PHP if($lg_set == 'thailand'){echo 'active';}?>">
                                <div class="panel-body">
                                  <form action="<?=$actionUrl?>/th" method="post" enctype="multipart/form-data" name="formSubdetailTH_<?=$title;?>" id="formSubdetailTH_<?=$title;?>" class="form-horizontal" novalidate>
                                    <input type="hidden" name="crfsubcontent" id="crfsubcontent" value="<?=$crfsubcontent;?>">
                                    <input type="hidden" name="Id" id="Id" value="<?PHP if(isset($Id)){echo $Id;}?>">
                                    <input type="hidden" name="supporter_id" id="supporter_id" value="<?PHP if(isset($supporter_id)){echo $supporter_id;}?>">

                                    
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Logo images</label>
                                        <div class="col-sm-10">
                                          <input type="file" name="Text_logo" id="Text_logo" class="form-control" accept="image/*">
                                          <input type="hidden" name="Text_logo_old" id="Text_logo_old" class="form-control" value="<?PHP if(isset($Text_images)){echo $Text_images;}?>">
                                          <br/>
                                          <?PHP if(!empty($Text_images) != ""){ ?>
                                          <a href="<?=base_url('uploads/supporter/'.$Text_images);?>" target="_bank"><label>แสดงไฟล์</label></a>
                                          <?PHP } ?>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">URL</label>
                                      <div class="col-sm-10">
                                        <input type="text" name="Text_url" id="Text_url" class="form-control" value="<?PHP if(isset($Text_url)){echo $Text_url;}?>">
                                      </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">sort</label>
                                      <div class="col-sm-4"><input type="text" name="Text_sort" id="Text_sort" class="form-control" value="<?PHP if(isset($Text_Sort)){echo $Text_Sort;}?>"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Wigth</label>
                                      <div class="col-sm-4"><input type="text" name="Text_Wigth" id="Text_Wigth" class="form-control" value="<?PHP if(isset($Text_wight)){echo $Text_wight;}?>"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Height</label>
                                      <div class="col-sm-4"><input type="text" name="Text_Height" id="Text_Height" class="form-control" value="<?PHP if(isset($Text_height)){echo $Text_height;}?>"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                      <div class="col-sm-6 col-sm-offset-5">
                                          <a href="<?=site_url('contents/supportertype/index/'.$supporter_id);?>">
                                          <button class="btn btn-w-m btn-danger" type="button">Cancel</button>
                                          </a>
                                          <button class="btn btn-w-m btn-primary" type="submit">Save changes</button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                            </div>
                            <?PHP }?>
                        </div>


                    </div>
              <!-- End contents for page -->
    </div>
</div>
</div>
