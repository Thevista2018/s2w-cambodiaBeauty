<?PHP
if(isset($listdata) and count($listdata) != 0){
  foreach ($listdata as $key => $value) {
    $Id = $value['consub_id'];
    $con_id = $value['con_id'];
    $Text_namePageEN = $value['consub_page_en'];
    $Text_namePageTH = $value['consub_page_th'];
    $Text_decisionEN = $value['consub_decision_en'];
    $Text_decisionTH = $value['consub_decision_th'];
    $Text_detailPageEN = $value['consub_detail_en'];
    $Text_detailPageTH = $value['consub_detail_th'];
    $Text_url = $value['consub_url'];
    $Text_eye = $value['consub_show'];
  }
  $title = "Update";
  $actionUrl = site_url('contents/subcontents/update/');
}else{
  $title = "Create";
  $Text_eye = 1;
  $actionUrl = site_url('contents/subcontents/create/');
}
?>

<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
      <h2><?=$title;?></h2>
      <ol class="breadcrumb">
          <li> <a href="#">Home</a> </li>
          <li> <a href="<?=site_url('contents/pagecontents/index');?>">Contents</a> </li>
          <li><a href="<?=site_url('contents/subcontents/index/'.$con_id);?>">Sub Contents</a> </li>
          <li class="active"> <strong><?=$title;?></strong> </li>
      </ol>
  </div>
  <div class="col-lg-2"> </div>
</div>
<!-- End breadcrumb for page -->

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
      <!-- Contents for page -->
      <div class="tabs-container">
          <ul class="nav nav-tabs">
            <div class="mail-tools tooltip-demo">
              <div class="btn-group pull-right">
                <button class="btn btn-w-m btn-default btn-sm Btn-reload" data-toggle="tooltip" data-placement="left" title="" data-original-title="Refresh page"><i class="fa fa-refresh"></i> Refresh</button>
                <?PHP if(!empty($Id)){ ?>
                <button class="btn btn-white btn-sm Btn-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as show">
                  <?PHP if($Text_eye == 1){?>
                    <i class="fa fa-eye"></i>
                  <?PHP }else{ ?>
                    <i class="fa fa-eye-slash"></i>
                  <?PHP }?>
                </button>
                <a href="<?=site_url('main/pagesubDetail/'.$Id);?>" target="_blank">
                <button class="btn btn-w-m btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Preview this pages"><i class="fa fa-search"></i> Preview</button>
                </a>
                <?PHP }?>
              </div>
            </div>
          </ul>
          <div class="tab-content">
            <div id="tab-2" class="tab-pane active">
                <div class="panel-body">
                  <form action="<?=$actionUrl?>/th" method="post" enctype="multipart/form-data" name="formSubdetailTH" id="formSubdetailTH" class="form-horizontal" novalidate>
                    <input type="hidden" name="crfsubcontent" id="crfsubcontent" value="<?=$crfsubcontent;?>">
                    <input type="hidden" name="Id" id="Id" value="<?PHP if(isset($Id)){echo $Id;}?>">
                    <input type="hidden" name="Text_eye" id="Text_eye" class="Text_eye" value="<?PHP if(isset($Text_eye)){echo $Text_eye;}?>">
                    <input type="hidden" name="con_id" id="con_id" value="<?PHP if(isset($con_id)){echo $con_id;}?>">
                    <div class="form-group"><label class="col-sm-2 control-label">Name<span class="text-muted">*</span></label>
                        <div class="col-sm-10"><input type="text" name="Text_namePageTH" id="Text_namePageTH" class="form-control" value="<?PHP if(isset($Text_namePageTH)){echo $Text_namePageTH;}?>"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Decision</label>
                        <div class="col-sm-10"><input type="text" name="Text_decisionTH" id="Text_decisionTH" class="form-control" value="<?PHP if(isset($Text_decisionTH)){echo $Text_decisionTH;}?>"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Link url</label>
                        <div class="col-sm-10"><input type="text" name="Text_url" id="Text_url" class="form-control" value="<?PHP if(isset($Text_url)){echo $Text_url;}?>"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                          <textarea rows="25" cols="150" class="summernote" data-img="<?=site_url('manager/filemanager/summernote');?>" id="Text_detailPageTH" name="Text_detailPageTH"><?PHP if(isset($Text_detailPageTH)){echo $Text_detailPageTH;}?></textarea>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                      <div class="col-sm-6 col-sm-offset-5">
                          <a href="<?=site_url('contents/subcontents/index/'.$con_id);?>">
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
