<?PHP
if(isset($listdata) and count($listdata) != 0){
  foreach ($listdata as $key => $value) {
    $Id = $value['banner_id'];
    $File_name = $value['banner_image'];
    $Text_link = $value['banner_link'];
    $Text_sort = $value['banner_sort'];
    $Text_eye = $value['banner_show'];
    $Text_check = $value['banner_status'];
  }
  $title = "Update";
  $actionUrl = site_url('contents/banner/update/');
}else{
  $title = "Create";
  $actionUrl = site_url('contents/banner/create/');
  $Text_eye = 1;
  $Text_check = 1;
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
                <a href="<?=site_url('contents/banner/index');?>">Banner</a>
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
                    <li class="active"><a data-toggle="tab" href="#tab-2" aria-expanded="false">Banner</a></li>
          <div class="mail-tools tooltip-demo">
                <div class="btn-group pull-right">
                  <button class="btn btn-white btn-sm Btn-reload" data-toggle="tooltip" data-placement="left" title="" data-original-title="Refresh page"><i class="fa fa-refresh"></i> Refresh</button>
                  <button class="btn btn-white btn-sm Btn-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as show">
                    <?PHP if($Text_eye == 1){?>
                      <i class="fa fa-eye"></i>
                    <?PHP }else{ ?>
                      <i class="fa fa-eye-slash"></i>
                    <?PHP }?>
                  </button>
                  <button class="btn btn-white btn-sm Btn-check" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as important">
                    <?PHP if($Text_check == 1){?>
                      <i class="fa fa-check-square-o"></i>
                    <?PHP }else if($Text_check == 2){ ?>
                      <i class="fa fa-check-square"></i>
                    <?PHP }?>
                  </button>
                  <?PHP if(!empty($Id)){ ?>
                  <button class="btn btn-white btn-sm Btn-delete" data-url="<?=site_url('contents/banner/delete/'.$Id);?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> </button>
                  <?PHP }?>
                  <?PHP if(!empty($Id)){ ?>
                  <button class="btn btn-warning btn-sm Btn-url" data-url="<?=site_url('banner/detail/'.$Id);?>" data-toggle="tooltip" data-placement="left" title="" data-original-title="Preview this pages"><i class="fa fa-search"></i> Preview</button>
                  <?PHP }?>
                </div>
            </div>
                </ul>

                <div class="tab-content">
                    <div id="tab-2" class="tab-pane active">
                        <div class="panel-body">
          <form action="<?=$actionUrl?>" method="post" enctype="multipart/form-data" name="formBanner_<?=$title;?>" id="formBanner_<?=$title;?>" class="form-horizontal" novalidate>
            <input type="hidden" name="crfbanner" id="crfbanner" value="<?=$crfbanner;?>">
            <input type="hidden" name="Id" id="Id" value="<?PHP if(isset($Id)){echo $Id;}?>">
            <input type="hidden" name="Text_eye" id="Text_eye" class="Text_eye" value="<?PHP if(isset($Text_eye)){echo $Text_eye;}?>">
            <input type="hidden" name="Text_check" id="Text_check" class="Text_check" value="<?PHP if(isset($Text_check)){echo $Text_check;}?>">
            <div class="form-group"><label class="col-sm-2 control-label">File Banner<span class="text-muted">*</span></label>
                <div class="col-sm-10">
                  <input type="file" name="File_images" id="File_images" class="form-control">
                  <input type="hidden" name="File_images_old" id="File_images_old" value="<?PHP if(isset($File_name)){echo $File_name;}?>">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">Link<span class="text-muted">*</span></label>
                <div class="col-sm-4"><input type="text" name="Text_link" id="Text_link" class="form-control" value="<?PHP if(isset($Text_link)){echo $Text_link;}?>"></div>
                <label class="col-sm-2 control-label">Sort</label>
                <div class="col-sm-4">
                <input type="text" name="Text_sort" id="Text_sort" class="form-control" value="<?PHP if(isset($Text_sort)){echo $Text_sort;}?>">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
              <div class="col-sm-6 col-sm-offset-4">
                  <a href="<?=site_url('contents/banner/index/');?>">
                  <button class="btn btn-w-m btn-danger" type="button">Cancel</button>
                  </a>
                  <button class="btn btn-w-m btn-primary" type="submit">Save changes</button>
              </div>
            </div>
          </form>
        </div>
    </div>

</div>


</div>
      <!-- End contents for page -->
    </div>
</div>
</div>
