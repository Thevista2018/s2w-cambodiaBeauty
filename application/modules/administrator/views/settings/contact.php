<?PHP
  if(isset($listdata) && count($listdata) != 0){
    foreach ($listdata as $key => $value) {
      $Id = $value['set_id'];
      $Text_linkfacebook    = $value['set_linkfacebook'];
      $Text_linktwitter     = $value['set_linktwitter'];
      $Text_linkyoutube     = $value['set_linkyoutube'];
      $Text_linkgoogleplus  = $value['set_linkgoogleplus'];
      $Text_linkinstagram   = $value['set_linkinstagram'];

      $Text_Fullname        = $value['set_fullnamecontact'];
      $Text_Position        = $value['set_positioncontact'];
      $Text_Phone           = $value['set_phonecontact'];
      $Text_Phone_ext       = $value['set_phoneextcontact'];
      $Text_Mobile          = $value['set_mobilecontact'];
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
            <li class="active"><strong>Contact</strong></li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>
<!-- End breadcrumb for page -->
<form action="<?=site_url('administrator/settings/updatecontact')?>" method="post" enctype="multipart/form-data" name="formSettings" id="formSettings" class="form-horizontal" novalidate>
<input type="hidden" name="formcrf" id="formcrf" value="<?=$formcrf;?>">
<input type="hidden" name="Id" id="Id" value="<?=$Id?>">

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <b>Social</b>
            </div>
            <div class="ibox-content">
                <div class="form-group">
                    <label class="col-sm-12">Link Facebook</label>
                    <div class="col-sm-12"><input type="text" name="Text_linkfacebook" id="Text_linkfacebook" placeholder="https://www.facebook.com/" value="<?=$Text_linkfacebook;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-12">Link Twitter</label>
                    <div class="col-sm-12"><input type="text" name="Text_linktwitter" id="Text_linktwitter" placeholder="https://twitter.com/" value="<?=$Text_linktwitter;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-12">Link Youtube</label>
                    <div class="col-sm-12"><input type="text" name="Text_linkyoutube" id="Text_linkyoutube" placeholder="Enter https://www.youtube.com/" value="<?=$Text_linkyoutube;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-12">Link Googleplus</label>
                    <div class="col-sm-12"><input type="text" name="Text_MobilepText_linkgoogleplushon" id="Text_linkgoogleplus" placeholder="https://plus.google.com/" value="<?=$Text_linkgoogleplus;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-12">Link Instagram</label>
                    <div class="col-sm-12"><input type="text" name="Text_linkinstagram" id="Text_linkinstagram" placeholder="https://www.instagram.com/" value="<?=$Text_linkinstagram;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-12" style="text-align: right;">
                        <button class="btn btn-w-m btn-danger Btn-reload" type="button">Reset</button>
                        <button class="btn btn-w-m btn-primary" type="submit">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <b>Contact Person</b>
            </div>
            <div class="ibox-content">
                <div class="form-group">
                    <label class="col-sm-12">Fullname</label>
                    <div class="col-sm-12"><input type="text" name="Text_Fullname" id="Text_Fullname" value="<?=$Text_Fullname;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-12">Position</label>
                    <div class="col-sm-12"><input type="text" name="Text_Position" id="Text_Position" value="<?=$Text_Position;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-12">Phone</label>
                    <div class="col-sm-8"><input type="text" name="Text_Phone" id="Text_Phone" value="<?=$Text_Phone;?>" class="form-control"></div>
                    <div class="col-sm-1">ext.</div>
                    <div class="col-sm-3"><input type="text" name="Text_Phone_ext" id="Text_Phone_ext" value="<?=$Text_Phone_ext;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-12">Mobile phone</label>
                    <div class="col-sm-12"><input type="text" name="Text_Mobile" id="Text_Mobile" value="<?=$Text_Mobile;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-12" style="text-align: right;">
                        <button class="btn btn-w-m btn-danger Btn-reload" type="button">Reset</button>
                        <button class="btn btn-w-m btn-primary" type="submit">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
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
</script>
