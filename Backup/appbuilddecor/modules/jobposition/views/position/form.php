<?PHP
if(isset($listdata) && count($listdata) != 0){
  foreach ($listdata as $key => $value) {
    $Id = $value['job_id'];
    $Text_positionEN = $value['job_position_en'];
    $Text_detailEN = $value['job_detail_en'];
    $Text_attributeEN = $value['job_attribute_en'];
    $Text_quantityEN = $value['job_quantity_en'];
    $Text_salaryEN = $value['job_salary_en'];
    $File_fileEN = $value['job_fileapplication_en'];
    // TH
    $Text_positionTH = $value['job_position_th'];
    $Text_detailTH = $value['job_detail_th'];
    $Text_attributeTH = $value['job_attribute_th'];
    $Text_quantityTH = $value['job_quantity_th'];
    $Text_salaryTH = $value['job_salary_th'];
    $File_fileTH = $value['job_fileapplication_th'];

    $Text_eye = $value['job_show'];
    $Text_check = $value['job_status'];
  }
  $TitlePage = "Update";
  $actionUrl = site_url('jobposition/position/update');
}else{
  $TitlePage = "Create";
  $actionUrl = site_url('jobposition/position/create');
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
                <a href="<?=site_url('jobposition/position/index');?>">Position</a>
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
                            <li class="<?PHP if($lg == 'english'){echo 'active';}?>"><a data-toggle="tab" href="#tab-1" aria-expanded="true">English</a></li>
                            <li class="<?PHP if($lg == 'thailand'){echo 'active';}?>"><a data-toggle="tab" href="#tab-2" aria-expanded="false">Thailand</a></li>
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
                          <button class="btn btn-white btn-sm Btn-delete" data-url="<?=site_url('jobposition/position/delete/'.$Id);?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> </button>
                          <?PHP }?>
                          <?PHP if(!empty($Id)){ ?>
                          <button class="btn btn-warning btn-sm Btn-url" data-url="<?=site_url('careers/index');?>" data-toggle="tooltip" data-placement="left" title="" data-original-title="Preview this pages"><i class="fa fa-search"></i> Preview</button>
                          <?PHP }?>
                        </div>
                    </div>
                        </ul>

                        <div class="tab-content">

                            <div id="tab-1" class="tab-pane <?PHP if($lg == 'english'){echo 'active';}?>">
                                <div class="panel-body">
                                    <form action="<?=$actionUrl."/en";?>" method="post" enctype="multipart/form-data" name="formNewsEN_<?=$TitlePage;?>" id="formNewsEN_<?=$TitlePage;?>" class="form-horizontal" novalidate>
                                      <input type="hidden" name="crfposition" id="crfposition" value="<?=$crfposition;?>">
                                      <input type="hidden" name="Id" id="Id" value="<?PHP if(isset($Id)){echo $Id;}?>">
                                      <input type="hidden" name="Text_eye" id="Text_eye" class="Text_eye" value="<?PHP if(isset($Text_eye)){echo $Text_eye;}?>">
                                      <input type="hidden" name="Text_check" id="Text_check" class="Text_check" value="<?PHP if(isset($Text_check)){echo $Text_check;}?>">
                                      <div class="form-group"><label class="col-sm-2 control-label">Position<span class="text-muted">*</span></label>
                                          <div class="col-sm-10"><input type="text" name="Text_positionEN" id="Text_positionEN" class="form-control" value="<?PHP if(isset($Text_positionEN)){echo $Text_positionEN;}?>"></div>
                                      </div>
                                      <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-2 control-label">Quota</label>
                                          <div class="col-sm-10"><input type="text" name="Text_quantityEN" id="Text_quantityEN" class="form-control" value="<?PHP if(isset($Text_quantityEN)){echo $Text_quantityEN;}?>"></div>
                                      </div>
                                      <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-2 control-label">Salary</label>
                                          <div class="col-sm-10"><input type="text" name="Text_salaryEN" id="Text_salaryEN" class="form-control" value="<?PHP if(isset($Text_salaryEN)){echo $Text_salaryEN;}?>"></div>
                                      </div>
                                      <div class="hr-line-dashed"></div>
                                      <div class="form-group"><label class="col-sm-2 control-label">File Apply</label>
                                          <div class="col-sm-10">
                                            <input type="file" name="File_fileEN" id="File_fileEN" class="form-control">
                                            <input type="hidden" name="File_fileEN_old" id="File_fileEN_old" value="<?PHP if(isset($File_fileEN)){echo $File_fileEN;}?>">
                                          </div>
                                      </div>
                                      <div class="hr-line-dashed"></div>
                                      <div class="form-group">
                                          <div class="col-sm-12">
                                            <label class="control-label">Detail</label>
                                          </div>
                                          <div class="col-sm-12">
                                            <textarea rows="25" cols="150" class="summernote" id="Text_detailEN" name="Text_detailEN"><?PHP if(isset($Text_detailEN)){echo $Text_detailEN;}?></textarea>
                                          </div>
                                      </div>
                                      <div class="hr-line-dashed"></div>
                                      <div class="form-group">
                                          <div class="col-sm-12">
                                            <label class="control-label">Requirements</label>
                                          </div>
                                          <div class="col-sm-12">
                                            <textarea rows="25" cols="150" class="summernote" id="Text_attributeEN" name="Text_attributeEN"><?PHP if(isset($Text_attributeEN)){echo $Text_attributeEN;}?></textarea>
                                          </div>
                                      </div>
                                      <div class="hr-line-dashed"></div>
                                      <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-4">
                                            <a href="<?=site_url('jobposition/position/index');?>">
                                            <button class="btn btn-w-m btn-danger" type="button">Cancel</button>
                                            </a>
                                            <button class="btn btn-w-m btn-primary" type="submit">Save changes</button>
                                        </div>
                                      </div>
                                    </form>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane <?PHP if($lg == 'thailand'){echo 'active';}?>">
                                <div class="panel-body">
                                  <form action="<?=$actionUrl."/th";?>" method="post" enctype="multipart/form-data" name="formNewsTH_<?=$TitlePage;?>" id="formNewsTH_<?=$TitlePage;?>" class="form-horizontal" novalidate>
                                    <input type="hidden" name="crfposition" id="crfposition" value="<?=$crfposition;?>">
                                    <input type="hidden" name="Id" id="Id" value="<?PHP if(isset($Id)){echo $Id;}?>">
                                    <input type="hidden" name="Text_eye" id="Text_eye" class="Text_eye" value="<?PHP if(isset($Text_eye)){echo $Text_eye;}?>">
                                    <input type="hidden" name="Text_check" id="Text_check" class="Text_check" value="<?PHP if(isset($Text_check)){echo $Text_check;}?>">
                                    <div class="form-group"><label class="col-sm-2 control-label">Position<span class="text-muted">*</span></label>
                                        <div class="col-sm-10"><input type="text" name="Text_positionTH" id="Text_positionTH" class="form-control" value="<?PHP if(isset($Text_positionTH)){echo $Text_positionTH;}?>"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Quota</label>
                                        <div class="col-sm-10"><input type="text" name="Text_quantityTH" id="Text_quantityTH" class="form-control" value="<?PHP if(isset($Text_quantityTH)){echo $Text_quantityTH;}?>"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Salary</label>
                                        <div class="col-sm-10"><input type="text" name="Text_salaryTH" id="Text_salaryTH" class="form-control" value="<?PHP if(isset($Text_salaryTH)){echo $Text_salaryTH;}?>"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group"><label class="col-sm-2 control-label">File Apply</label>
                                        <div class="col-sm-10">
                                          <input type="file" name="File_fileTH" id="File_fileTH" class="form-control">
                                          <input type="hidden" name="File_fileTH_old" id="File_fileTH_old" value="<?PHP if(isset($File_fileTH)){echo $File_fileTH;}?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                          <label class="control-label">Detail</label>
                                        </div>
                                        <div class="col-sm-12">
                                          <textarea rows="25" cols="150" class="summernote" id="Text_detailTH" name="Text_detailTH"><?PHP if(isset($Text_detailTH)){echo $Text_detailTH;}?></textarea>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                          <label class="control-label">Requirements</label>
                                        </div>
                                        <div class="col-sm-12">
                                          <textarea rows="25" cols="150" class="summernote" id="Text_attributeTH" name="Text_attributeTH"><?PHP if(isset($Text_attributeTH)){echo $Text_attributeTH;}?></textarea>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                      <div class="col-sm-6 col-sm-offset-4">
                                          <a href="<?=site_url('jobposition/position/index');?>">
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
