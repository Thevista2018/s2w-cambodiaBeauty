<?PHP
  if(isset($listdata) && count($listdata) != 0){
    foreach ($listdata as $key => $value) {
      $Id = $value['set_id'];
      $Select_Language = $value['set_language'];
      $Text_Keywords = $value['set_keywords'];
      $Text_Description = $value['set_description'];
      $Text_Webmaster = $value['set_googletool'];
      $Text_Analytics = $value['set_googleanalytics'];
      $Text_Emailhr = $value['set_emailhr'];
      $Text_Emailcontact = $value['set_emailcontact'];
      $Text_Linkfacebook = $value['set_linkfacebook'];
      $Text_Linktwitter = $value['set_linktwitter'];
      $Text_Linkyoutube = $value['set_linkyoutube'];
      $Text_Linkgoogle = $value['set_linkgoogleplus'];
      $Text_Linkinstagram = $value['set_linkinstagram'];
      $Num_Perpagenews = $value['set_perpage_news'];
      $Num_Perpagegallery = $value['set_perpage_gallery'];
      $Num_Perpageknowledge = $value['set_perpage_knowledge'];
      $Select_Apply = $value['set_apply_online'];
      $Text_UrlLanguage = $value['set_urllanguage'];
    }
  }
?>
<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Settings</h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li class="active">
                <strong>Settings</strong>
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
      <div class="ibox float-e-margins">
          <div class="ibox-content">
              <!-- Contents for page -->
              <form action="<?=site_url('administrator/settings/update')?>" method="post" enctype="multipart/form-data" name="formSettings" id="formSettings" class="form-horizontal" novalidate>
                <input type="hidden" name="formcrf" id="formcrf" value="<?=$formcrf;?>">
                <input type="hidden" name="Id" id="Id" value="<?=$Id?>">
                <div class="form-group"><label class="col-sm-2 control-label">Language<span class="text-muted">*</span></label>
                    <div class="col-sm-10"><input type="text" name="Text_UrlLanguage" id="Text_UrlLanguage" value="<?=$Text_UrlLanguage;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group"><label class="col-sm-2 control-label">Keywords<span class="text-muted">*</span></label>
                    <div class="col-sm-10"><input type="text" name="Text_Keywords" id="Text_Keywords" value="<?=$Text_Keywords;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group"><label class="col-sm-2 control-label">Description<span class="text-muted">*</span></label>
                    <div class="col-sm-10"><input type="text" name="Text_Description" id="Text_Description" value="<?=$Text_Description;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group"><label class="col-sm-2 control-label">Google Webmaster tools</label>
                    <div class="col-sm-10"><input type="text" name="Text_Webmaster" id="Text_Webmaster" value="<?=$Text_Webmaster;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group"><label class="col-sm-2 control-label">Google Analytics</label>
                    <div class="col-sm-10"><input type="text" name="Text_Analytics" id="Text_Analytics" value="<?=$Text_Analytics;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group"><label class="col-sm-2 control-label">Email Contact<span class="text-muted">*</span></label>
                    <div class="col-sm-10"><input type="text" name="Text_Emailcontact" id="Text_Emailcontact" value="<?=$Text_Emailcontact;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <!-- <div class="form-group"><label class="col-sm-2 control-label">Apply online<span class="text-muted">*</span></label>
                    <div class="col-sm-10">
                      <select class="form-control m-b" name="Select_Apply" id="Select_Apply">
                          <option value="1" <?PHP if($Select_Apply == 1){echo 'selected';} ?>>On</option>
                          <option value="2" <?PHP if($Select_Apply == 2){echo 'selected';} ?>>Off</option>
                      </select>
                    </div>
                </div>
                <div class="hr-line-dashed"></div> -->
                <!-- <div class="form-group"><label class="col-sm-2 control-label">Email HR<span class="text-muted">*</span></label>
                    <div class="col-sm-10"><input type="text" name="Text_Emailhr" id="Text_Emailhr" value="<?=$Text_Emailhr;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div> -->
                <div class="form-group"><label class="col-sm-2 control-label">Link Facebook</label>
                    <div class="col-sm-10"><input type="text" name="Text_Linkfacebook" id="Text_Linkfacebook" placeholder="https://www.facebook.com/yourpage" value="<?=$Text_Linkfacebook;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group"><label class="col-sm-2 control-label">Link Twitter</label>
                    <div class="col-sm-10"><input type="text" name="Text_Linktwitter" id="Text_Linktwitter" placeholder="https://twitter.com/yourpage" value="<?=$Text_Linktwitter;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group"><label class="col-sm-2 control-label">Link Youtube</label>
                    <div class="col-sm-10"><input type="text" name="Text_Linkyoutube" id="Text_Linkyoutube" placeholder="https://www.youtube.com/channel/yourchanel" value="<?=$Text_Linkyoutube;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group"><label class="col-sm-2 control-label">Link Google+</label>
                    <div class="col-sm-10"><input type="text" name="Text_Linkgoogle" id="Text_Linkgoogle" placeholder="https://plus.google.com/yourpage" value="<?=$Text_Linkgoogle;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group"><label class="col-sm-2 control-label">Link Instagram</label>
                    <div class="col-sm-10"><input type="text" name="Text_Linkinstagram" id="Text_Linkinstagram" placeholder="https://www.instagram.com/yourpage" value="<?=$Text_Linkinstagram;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <!-- <div class="form-group"><label class="col-sm-2 control-label">News/page<span class="text-muted">*</span></label>
                    <div class="col-sm-10"><input type="text" name="Num_Perpagenews" id="Num_Perpagenews" value="<?=$Num_Perpagenews;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group"><label class="col-sm-2 control-label">Activity/page<span class="text-muted">*</span></label>
                    <div class="col-sm-10"><input type="text" name="Num_Perpagegallery" id="Num_Perpagegallery" value="<?=$Num_Perpagegallery;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group"><label class="col-sm-2 control-label">Knowledge/page<span class="text-muted">*</span></label>
                    <div class="col-sm-10"><input type="text" name="Num_Perpageknowledge" id="Num_Perpageknowledge" value="<?=$Num_Perpageknowledge;?>" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div> -->

                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-5">
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </div>
                </div>
              </form>
              <!-- End contents for page -->
          </div>
      </div>
    </div>
</div>
</div>
