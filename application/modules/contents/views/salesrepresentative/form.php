<?PHP
if(isset($listdata) && count($listdata) != 0){
  foreach ($listdata as $key => $value) {
    $Id = $value['salerep_id'];
    $Text_file = $value['salerep_image'];
    $Text_Title = $value['salerep_name'];
    $Text_Company = $value['salerep_company'];
    $Text_Contact = $value['salerep_contact'];
    $Text_Email = $value['salerep_email'];
    $Text_Tel = $value['salerep_tel'];
    $Text_Address = $value['salerep_address'];
    $Text_sort = $value['salerep_sort'];
    $Text_eye = $value['salerep_show'];
    $Text_width = $value['salerep_width'];
    $Text_height = $value['salerep_height'];
  }
  $TitlePage = "Update";
  $actionUrl = site_url('contents/salesrepresentative/update');
}else{
  $TitlePage = "Create";
  $actionUrl = site_url('contents/salesrepresentative/create');
  $Text_eye = 1;
}
?>

<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?=$TitlePage;?></h2>
        <ol class="breadcrumb">
            <li> <a href="#">Home</a> </li>
            <li> <a href="<?=site_url('contents/salesrepresentative/index');?>">Salesrepresentative</a> </li>
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
                    <button class="btn btn-warning btn-sm Btn-url" data-url="<?=site_url('main/salesrepresentative');?>" data-toggle="tooltip" data-placement="left" title="" data-original-title="Preview this pages"><i class="fa fa-search"></i> Preview</button>
                    <?PHP }?>
                    </div>
                </div>
            </ul>
            <div class="tab-content">
                <div id="tab-2" class="tab-pane active">
                    <div class="panel-body">
                        <form action="<?=$actionUrl;?>" method="post" enctype="multipart/form-data" name="formSalesrepresentative_<?=$TitlePage;?>" id="formSalesrepresentative_<?=$TitlePage;?>" class="form-horizontal" novalidate>
                        <input type="hidden" name="crfsalesrepresentative" id="crfsalesrepresentative" value="<?=$crfsalesrepresentative;?>">
                        <input type="hidden" name="Id" id="Id" value="<?PHP if(isset($Id)){echo $Id;}?>">
                        <input type="hidden" name="Text_eye" id="Text_eye" class="Text_eye" value="<?PHP if(isset($Text_eye)){echo $Text_eye;}?>">

                            <div class="col-md-4">

                                <div class="form-group">
                                    <center>
                                    <?PHP if(!empty($Text_file)){ ?>
                                        <img id="showimg" src="<?=base_url('uploads/salesrepresentative/'.$Text_file);?>" width="100%" style="max-height: 450px; border: 1px solid #000;"/>
                                    <?PHP }else{?>
                                        <img id="showimg" src="<?=base_url('assets/inspinia/images/no-image-icon-6.png');?>" width="100%" style="max-height: 450px; border: 1px solid #000;"/>
                                    <?PHP } ?>
                                    </center>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-12">Logo Company <span class="text-muted">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="file" name="Text_file" id="Text_file" class="form-control" onchange="readURL(this);" accept="image/*">
                                        <input type="hidden" name="Text_file_old" id="Text_file_old" class="form-control" value="<?PHP if(isset($Text_file)){echo $Text_file;}?>">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 ">Width </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="Text_width" id="Text_width" class="form-control" value="<?PHP if(isset($Text_width)){echo $Text_width;}?>">
                                    </div>
                                    <div class="col-sm-1">PX</div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 ">Height</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="Text_height" id="Text_height" class="form-control" value="<?PHP if(isset($Text_height)){echo $Text_height;}?>">
                                    </div>
                                    <div class="col-sm-1">PX</div>
                                </div>
                            </div>
                            <div class="col-md-8">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name Title <span class="text-muted">*</span></label>
                                    <div class="col-sm-10"><input type="text" name="Text_Title" id="Text_Title" class="form-control" value="<?PHP if(isset($Text_Title)){echo $Text_Title;}?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name Company </label>
                                    <div class="col-sm-10"><input type="text" name="Text_Company" id="Text_Company" class="form-control" value="<?PHP if(isset($Text_Company)){echo $Text_Company;}?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Contact</label>
                                    <div class="col-sm-10"><input type="text" name="Text_Contact" id="Text_Contact" class="form-control" value="<?PHP if(isset($Text_Contact)){echo $Text_Contact;}?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10"><input type="text" name="Text_Email" id="Text_Email" class="form-control" value="<?PHP if(isset($Text_Email)){echo $Text_Email;}?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tel</label>
                                    <div class="col-sm-10"><input type="text" name="Text_Tel" id="Text_Tel" class="form-control" value="<?PHP if(isset($Text_Tel)){echo $Text_Tel;}?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Sort</label>
                                    <div class="col-sm-10"><input type="text" name="Text_sort" id="Text_sort" class="form-control" value="<?PHP if(isset($Text_sort)){echo $Text_sort;}?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10">
                                        <textarea rows="5" type="text" name="Text_Address" id="Text_Address" class="form-control" ><?PHP if(isset($Text_Address)){echo $Text_Address;}?></textarea>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-12" align="right">
                                        <a href="<?=site_url('contents/salesrepresentative/index');?>">
                                        <button class="btn btn-w-m btn-danger" type="button">Cancel</button>
                                        </a>
                                        <button class="btn btn-w-m btn-primary" type="submit">Save changes</button>
                                    </div>
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
