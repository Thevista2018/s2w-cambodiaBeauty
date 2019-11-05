<?PHP
if(isset($listdata) && count($listdata) != 0){
  foreach ($listdata as $key => $value) {
    $Id = $value['supporter_id'];
    $Text_Title = $value['supporter_title'];
    $Text_Title2 = $value['supporter_title2'];
    $Text_sort = $value['supporter_sort'];
  }
  $TitlePage = "Update";
  $actionUrl = site_url('contents/supporter/update');
}else{
  $TitlePage = "Create";
  $actionUrl = site_url('contents/supporter/create');
  $Text_eye = 1;
  $Text_check = 1;
}
?>

<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?=$TitlePage;?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="<?=site_url('contents/supporter/index');?>">Supporter</a>
            </li>
            <li class="active">
                <strong><?=$TitlePage;?></strong>
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
                            <li class="<?PHP if($lg_set == 'thailand'){echo 'active';}?>"><a data-toggle="tab" href="#tab-2" aria-expanded="false">Contents</a></li>
                            <?PHP }?> -->
                            <div class="mail-tools tooltip-demo">
                                <div class="btn-group pull-right">
                                <button class="btn btn-w-m btn-white btn-sm Btn-reload" data-toggle="tooltip" data-placement="left" title="" data-original-title="Refresh page"><i class="fa fa-refresh"></i> Refresh</button>
                                <?PHP
                                if(!empty($Id)){
                                ?>
                                <button class="btn btn-warning btn-sm Btn-url" data-url="<?=site_url('main/pageDetail/'.$Id);?>" data-toggle="tooltip" data-placement="left" title="" data-original-title="Preview this pages"><i class="fa fa-search"></i> Preview</button>
                                <?PHP }?>
                                </div>
                            </div>
                        </ul>
                        <div class="tab-content">
                            <?PHP if (in_array("thailand", $lg_get)) {?>
                            <div id="tab-2" class="tab-pane <?PHP if($lg_set == 'thailand'){echo 'active';}?>">
                                <div class="panel-body">
                                  <form action="<?=$actionUrl."/th";?>" method="post" enctype="multipart/form-data" name="formPagedetailTH" id="formPagedetailTH" class="form-horizontal" novalidate>
                                    <input type="hidden" name="crfcontents" id="crfcontents" value="<?=$crfcontents;?>">
                                    <input type="hidden" name="Id" id="Id" value="<?PHP if(isset($Id)){echo $Id;}?>">

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Name supporter <br/><small>(color black)</small><span class="text-muted">*</span></label>
                                        <div class="col-sm-4"><input type="text" name="Text_Title" id="Text_Title" class="form-control" value="<?PHP if(isset($Text_Title)){echo $Text_Title;}?>"></div>
                                        <label class="col-sm-2 control-label">Name supporter <br/><small>(color blue)</small><span class="text-muted">*</span></label>
                                        <div class="col-sm-4"><input type="text" name="Text_Title2" id="Text_Title2" class="form-control" value="<?PHP if(isset($Text_Title2)){echo $Text_Title2;}?>"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Sort</label>
                                        <div class="col-sm-4"><input type="text" name="Text_sort" id="Text_sort" class="form-control" value="<?PHP if(isset($Text_sort)){echo $Text_sort;}?>"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                      <div class="col-sm-6 col-sm-offset-5">
                                          <a href="<?=site_url('contents/supporter/index');?>">
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
