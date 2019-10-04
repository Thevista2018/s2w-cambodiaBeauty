<?PHP
if(isset($listdata) && count($listdata) != 0){
  foreach ($listdata as $key => $value) {
    $Id = $value['gallery_id'];
    $Text_titleEN = $value['gallery_title_en'];
    $Text_detailEN = $value['gallery_detail_en'];
    $Text_titleTH = $value['gallery_title_th'];
    $Text_detailTH = $value['gallery_detail_th'];
    $Text_sort = $value['gallery_sort'];
    $Text_date = date('Y-m-d', strtotime($value['gallery_datecreate']));
    $Text_eye = $value['gallery_show'];
    $Text_check = $value['gallery_status'];
  }
  $TitlePage = "Update";
  $actionUrl = site_url('gallery/activity/update');
}else{
  $TitlePage = "Create";
  $actionUrl = site_url('gallery/activity/create');
  $Text_eye = 1;
  $Text_check = 1;
  $Text_date = date('Y-m-d');
}

// Tab active
if($this->input->get('tab') != ""){
  $tab = $this->input->get('tab');
}else{
  $tab = "tab-2";
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
                <a href="<?=site_url('gallery/activity/index');?>">Gallery</a>
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
                            <!-- <li <?PHP if($tab == "tab-1"){echo 'class="active"';}?>><a data-toggle="tab" href="#tab-1" aria-expanded="true">English</a></li> -->
                            <li <?PHP if($tab == "tab-2"){echo 'class="active"';}?>><a data-toggle="tab" href="#tab-2" aria-expanded="false">Gallery</a></li>
                            <?PHP if(!empty($Id)){ ?>
                              <li <?PHP if($tab == "tab-3"){echo 'class="active"';}?>><a data-toggle="tab" href="#tab-3" aria-expanded="false">Images</a></li>
                            <?PHP }?>
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
                          <button class="btn btn-white btn-sm Btn-delete" data-url="<?=site_url('gallery/activity/delete/'.$Id);?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> </button>
                          <?PHP }?>
                          <?PHP if(!empty($Id)){ ?>
                          <button class="btn btn-warning btn-sm Btn-url" data-url="<?=site_url('gallerys/gallerydetail/'.$Id);?>" data-toggle="tooltip" data-placement="left" title="" data-original-title="Preview this pages"><i class="fa fa-search"></i> Preview</button>
                          <?PHP }?>
                        </div>
                    </div>
                        </ul>

                        <div class="tab-content">

                            <!-- <div id="tab-1" class="tab-pane <?PHP if($tab == "tab-1"){echo 'active';}?>">
                                <div class="panel-body">
                                    <form action="<?=$actionUrl."/en";?>" method="post" enctype="multipart/form-data" name="formNewsEN_<?=$TitlePage;?>" id="formNewsEN_<?=$TitlePage;?>" class="form-horizontal" novalidate>
                                      <input type="hidden" name="crfactivity" id="crfactivity" value="<?=$crfactivity;?>">
                                      <input type="hidden" name="Id" id="Id" value="<?PHP if(isset($Id)){echo $Id;}?>">
                                      <input type="hidden" name="Text_eye" id="Text_eye" class="Text_eye" value="<?PHP if(isset($Text_eye)){echo $Text_eye;}?>">
                                      <input type="hidden" name="Text_check" id="Text_check" class="Text_check" value="<?PHP if(isset($Text_check)){echo $Text_check;}?>">
                                      <div class="form-group"><label class="col-sm-2 control-label">Title<span class="text-muted">*</span></label>
                                          <div class="col-sm-10"><input type="text" name="Text_titleEN" id="Text_titleEN" class="form-control" value="<?PHP if(isset($Text_titleEN)){echo $Text_titleEN;}?>"></div>
                                      </div>
                                      <div class="hr-line-dashed"></div>
                                      <div class="form-group">
                                          <div class="col-sm-12">
                                            <textarea rows="25" cols="150" class="summernote" id="Text_detailEN" name="Text_detailEN"><?PHP if(isset($Text_detailEN)){echo $Text_detailEN;}?></textarea>
                                          </div>
                                      </div>
                                      <div class="hr-line-dashed"></div>
                                      <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-4">
                                            <a href="<?=site_url('gallery/activity/index');?>">
                                            <button class="btn btn-w-m btn-danger" type="button">Cancel</button>
                                            </a>
                                            <button class="btn btn-w-m btn-primary" type="submit">Save changes</button>
                                        </div>
                                      </div>
                                    </form>
                                </div>
                            </div> -->
                            <div id="tab-2" class="tab-pane <?PHP if($tab == "tab-2"){echo 'active';}?>">
                                <div class="panel-body">
                                  <form action="<?=$actionUrl."/th";?>" method="post" enctype="multipart/form-data" name="formNewsTH_<?=$TitlePage;?>" id="formNewsTH_<?=$TitlePage;?>" class="form-horizontal" novalidate>
                                    <input type="hidden" name="crfactivity" id="crfactivity" value="<?=$crfactivity;?>">
                                    <input type="hidden" name="Id" id="Id" value="<?PHP if(isset($Id)){echo $Id;}?>">
                                    <input type="hidden" name="Text_eye" id="Text_eye" class="Text_eye" value="<?PHP if(isset($Text_eye)){echo $Text_eye;}?>">
                                    <input type="hidden" name="Text_check" id="Text_check" class="Text_check" value="<?PHP if(isset($Text_check)){echo $Text_check;}?>">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Title<span class="text-muted">*</span></label>
                                        <div class="col-sm-10">
                                          <input type="text" name="Text_titleTH" id="Text_titleTH" class="form-control" value="<?PHP if(isset($Text_titleTH)){echo $Text_titleTH;}?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Date<span class="text-muted">*</span></label>
                                      <div class="col-sm-4">
                                        <div class="input-group date">
                                          <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" id="Text_date" name="Text_date" value="<?PHP if(isset($Text_date)){echo $Text_date;}?>">
                                        </div>
                                      </div>
                                      <label class="col-sm-2 control-label">Sort</label>
                                      <div class="col-sm-4">
                                        <input type="text" name="Text_sort" id="Text_sort" class="form-control" value="<?PHP if(isset($Text_sort)){echo $Text_sort;}?>">
                                      </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                          <textarea rows="25" cols="150" class="summernote" data-img="<?=site_url('manager/filemanager/summernote');?>" id="Text_detailTH" name="Text_detailTH"><?PHP if(isset($Text_detailTH)){echo $Text_detailTH;}?></textarea>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                      <div class="col-sm-6 col-sm-offset-4">
                                          <a href="<?=site_url('gallery/activity/index');?>">
                                          <button class="btn btn-w-m btn-danger" type="button">Cancel</button>
                                          </a>
                                          <button class="btn btn-w-m btn-primary" type="submit">Save changes</button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                            </div>
                            <?PHP if(!empty($Id)){ ?>
                            <div id="tab-3" class="tab-pane <?PHP if($tab == "tab-3"){echo 'active';}?>">
                                <div class="panel-body">
                                  <form action="<?=site_url('gallery/activity/images');?>" method="post" enctype="multipart/form-data" name="formImages" id="formImages" class="form-horizontal" novalidate>
                                    <input type="hidden" name="crfactivity" id="crfactivity" value="<?=$crfactivity;?>">
                                    <input type="hidden" name="Id" id="Id" value="<?PHP if(isset($Id)){echo $Id;}?>">
                                    <div class="row">
                                    <div class="col-sm-5">
                                    <div class="form-group"><label class="col-sm-4 control-label">Image Name<span class="text-muted">*</span></label>
                                        <div class="col-sm-8"><input type="text" name="Text_title" id="Text_title" class="form-control" value=""></div>
                                    </div>
                                    </div>
                                    <div class="col-sm-5">
                                      <div class="form-group"><label class="col-sm-2 control-label">Image<span class="text-muted">*</span></label>
                                          <div class="col-sm-10">
                                            <input type="file" name="File_images" id="File_images" accept="image/*" class="form-control">
                                          </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-2">
                                      <button class="btn btn-primary" type="submit"><i class="fa fa-upload"></i> Upload</button>
                                    </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                  </form>

                                  <div class="row">
                                    <div class="col-lg-12">
                                      <?PHP if(count($listimages) != 0){ ?>
                                        <?PHP foreach ($listimages as $key => $value) { ?>

                  <div class="file-box">
                        <div class="file">
                            <a href="#">
                                <span class="corner"></span>
                                <div class="image">
                                    <img alt="image" class="img-responsive" src="<?=base_url('uploads/gallery/'.$value['subgallery_images']);?>">
                                </div>
                                <div class="file-name">
                                    <?=$value['subgallery_name'];?><br>
                                    <small>Added: <?=$value['subgallery_lastedit'];?></small><br>
                                    <small class="tooltip-demo">
                                      <button class="btn btn-white Btn-delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash" data-url="<?=site_url('gallery/activity/deleteimg/'.$Id."/".$value['subgallery_id']);?>">
                                      <i class="fa fa-trash"></i>
                                      </button>
                                      <a href="<?=site_url('gallery/activity/favoriteimg/'.$Id."/".$value['subgallery_id']."/".$value['subgallery_status']);?>">
                                        <button class="btn btn-white pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as favorite">
                                          <?PHP if($value['subgallery_status'] == 1){?>
                                            <i class="fa fa-bookmark-o"></i>
                                          <?PHP }else if($value['subgallery_status'] == 2){ ?>
                                            <i class="fa fa-bookmark"></i>
                                          <?PHP }?>
                                        </button>
                                      </a>
                                    </small>
                                </div>
                            </a>
                        </div>
                    </div>
                                        <?PHP }?>
                                      <?PHP }?>
                                    </div>
                                  </div>

                                </div>
                            </div>
                            <?PHP }?>

                        </div>


                    </div>
              <!-- End contents for page -->
    </div>
</div>
</div>
