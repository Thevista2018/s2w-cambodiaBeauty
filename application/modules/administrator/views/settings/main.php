<?PHP
  if(isset($listdata) && count($listdata) != 0){
    foreach ($listdata as $key => $value) {
      $Id = $value['set_id'];
      $Text_logo            = $value['set_logo'];
      $Text_logo_footer     = $value['set_logo_footer'];

      $Text_nameweb_th      = $value['set_nameweb_th'];
      $Text_address_th      = $value['set_address_th'];

      $Text_Email           = $value['set_emailcompany'];
      $Text_Phon            = $value['set_phoncompany'];
      $Text_Mobilephon      = $value['set_mobilecompany'];
      $Text_Fax             = $value['set_faxcompany'];

    }
  }
?>
<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Settings</h2>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Settings</li>
            <li class="active"><strong>Website</strong></li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>
<!-- End breadcrumb for page -->
<form action="<?=site_url('administrator/settings/updatewebsite')?>" method="post" enctype="multipart/form-data" name="formSettings" id="formSettings" class="form-horizontal" novalidate>
<input type="hidden" name="formcrf" id="formcrf" value="<?=$formcrf;?>">
<input type="hidden" name="Id" id="Id" value="<?=$Id?>">

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <b>Logo website</b>
            </div>
            <div class="ibox-content">
                <center><img style="max-width: 250px; height: auto;" src="<?=base_url('uploads/logo/'.$Text_logo);?>" id="blah"/></center>
                <div style="margin-top: 20px;"></div>
                <p><input type="file" name="Fild_Name" id="Fild_Name" onchange="readURL(this);" class="form-control"/></p>
                <p><input type="hidden" name="Fild_Name_old" id="Fild_Name_old" class="form-control" value="<?=$Text_logo;?>"/></p>
            </div>
        </div>

        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <b>Logo Footer</b>
            </div>
            <div class="ibox-content">
                <center><img style="max-width: 250px; height: auto;" src="<?=base_url('uploads/logo/'.$Text_logo_footer);?>" id="blah2"/></center>
                <div style="margin-top: 20px;"></div>
                <p><input type="file" name="Fild_Name_footer" id="Fild_Name_footer" onchange="readURL2(this);" class="form-control"/></p>
                <p><input type="hidden" name="Fild_Name_footer_old" id="Fild_Name_footer_old" class="form-control" value="<?=$Text_logo_footer;?>"/></p>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
       
        <div class="ibox">
            <div class="ibox-title">
                <b>Website Detail</b>
            </div>
            <div class="ibox-content">

                <div class="form-group">
                    <label class="col-sm-2 control-label">Web name <span class="text-muted">*</span></label>
                    <div class="col-sm-10"><input type="text" name="Text_nameweb_th" id="Text_nameweb_th" value="<?=$Text_nameweb_th;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group"><label class="col-sm-2 control-label">Address <span class="text-muted">*</span></label>
                    <div class="col-sm-10"><textarea type="text" rows="5" name="Text_address_th" id="Text_address_th" class="form-control"><?=$Text_address_th;?></textarea></div>
                </div>    

            </div>
        </div>

        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <b>Contact Company</b>
            </div>
            <div class="ibox-content">
                <div class="form-group">
                    <label class="col-sm-2">Email</label>
                    <div class="col-sm-10"><input type="text" name="Text_Email" id="Text_Email" value="<?=$Text_Email;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2">Phon</label>
                    <div class="col-sm-10"><input type="text" name="Text_Phon" id="Text_Phon" value="<?=$Text_Phon;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2">Mobie phone</label>
                    <div class="col-sm-10"><input type="text" name="Text_Mobilephon" id="Text_Mobilephon" value="<?=$Text_Mobilephon;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2">Fax</label>
                    <div class="col-sm-10"><input type="text" name="Text_Fax" id="Text_Fax" value="<?=$Text_Fax;?>" class="form-control"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12" align="right">
        <button class="btn btn-w-m btn-danger Btn-reload" type="button">Reset</button>
        <button class="btn btn-w-m btn-primary" type="submit">Save changes</button>
       <div style="padding-top: 40px;"></div>
    </div>
</div>
</div>

</form>


<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
