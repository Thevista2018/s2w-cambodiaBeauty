<?PHP
if(isset($listdata) && count($listdata) != 0){
  foreach ($listdata as $key => $value) {
    $Id = $value['con_id'];
    $Text_namePageEN = $value['con_page_en'];
    $Text_namePageTH = $value['con_page_th'];
    $Text_decisionEN = $value['con_decision_en'];
    $Text_decisionTH = $value['con_decision_th'];
    $Text_detailPageEN = $value['con_detail_en'];
    $Text_detailPageTH = $value['con_detail_th'];
    $Text_url = $value['con_url'];
  }
  $TitlePage = "Update";
  $actionUrl = site_url('contents/pagecontents/update');
}else{
  $TitlePage = "Create";
  $actionUrl = site_url('contents/pagecontents/create');
  $Text_eye = 1;
  $Text_check = 1;
}
?>

<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?=$TitlePage;?></h2>
        <ol class="breadcrumb">
            <li> <a href="#">Home</a> </li>
            <li> <a href="<?=site_url('contents/pagecontents/index');?>">Contents</a> </li>
            <li class="active"> <strong><?=$TitlePage;?></strong> </li>
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
                    <button class="btn btn-w-m btn-white btn-sm Btn-reload" data-toggle="tooltip" data-placement="left" title="" data-original-title="Refresh page"><i class="fa fa-refresh"></i> Refresh</button>
                    <?PHP if(!empty($Id)){ ?>
                    <button class="btn btn-warning btn-sm Btn-url" data-url="<?=site_url('main/pageDetail/'.$Id);?>" data-toggle="tooltip" data-placement="left" title="" data-original-title="Preview this pages"><i class="fa fa-search"></i> Preview</button>
                    <?PHP }?>
                    </div>
                </div>
            </ul>
            <div class="tab-content">
                <div id="tab-2" class="tab-pane active">
                    <div class="panel-body">
                        <form action="<?=$actionUrl."/th";?>" method="post" enctype="multipart/form-data" name="formPagedetailTH" id="formPagedetailTH" class="form-horizontal" novalidate>
                        <input type="hidden" name="crfcontents" id="crfcontents" value="<?=$crfcontents;?>">
                        <input type="hidden" name="Id" id="Id" value="<?PHP if(isset($Id)){echo $Id;}?>">
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
                                <a href="<?=site_url('contents/pagecontents/index');?>">
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
