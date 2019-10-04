<?PHP
if(isset($listdata) && count($listdata) != 0){
  foreach ($listdata as $key => $value) {
    $Id = $value['news_id'];
    $Text_titleEN = $value['news_title_en'];
    $File_imagesEN = $value['news_images_en'];
    $Text_detailEN = $value['news_detail_en'];
    $Text_titleTH = $value['news_title_th'];
    $File_imagesTH = $value['news_images_th'];
    $Text_detailTH = $value['news_detail_th'];
    $Text_eye = $value['news_show'];
    $Text_check = $value['news_status'];
  }
  $TitlePage = "Update";
  $actionUrl = site_url('article/news/update');
}else{
  $TitlePage = "Create";
  $actionUrl = site_url('article/news/create');
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
                <a href="<?=site_url('article/news/index');?>">News</a>
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
                          <button class="btn btn-white btn-sm Btn-delete" data-url="<?=site_url('article/news/delete/'.$Id);?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> </button>
                          <?PHP }?>
                          <?PHP if(!empty($Id)){ ?>
                          <button class="btn btn-warning btn-sm Btn-url" data-url="<?=site_url('news/detail/'.$Id);?>" data-toggle="tooltip" data-placement="left" title="" data-original-title="Preview this pages"><i class="fa fa-search"></i> Preview</button>
                          <?PHP }?>
                        </div>
                    </div>
                        </ul>

                        <div class="tab-content">

                            <div id="tab-1" class="tab-pane <?PHP if($lg == 'english'){echo 'active';}?>">
                                <div class="panel-body">
                                    <form action="<?=$actionUrl."/en";?>" method="post" enctype="multipart/form-data" name="formNewsEN_<?=$TitlePage;?>" id="formNewsEN_<?=$TitlePage;?>" class="form-horizontal" novalidate>
                                      <input type="hidden" name="crfnews" id="crfnews" value="<?=$crfnews;?>">
                                      <input type="hidden" name="Id" id="Id" value="<?PHP if(isset($Id)){echo $Id;}?>">
                                      <input type="hidden" name="Text_eye" id="Text_eye" class="Text_eye" value="<?PHP if(isset($Text_eye)){echo $Text_eye;}?>">
                                      <input type="hidden" name="Text_check" id="Text_check" class="Text_check" value="<?PHP if(isset($Text_check)){echo $Text_check;}?>">
                                      <div class="form-group"><label class="col-sm-2 control-label">Title<span class="text-muted">*</span></label>
                                          <div class="col-sm-10"><input type="text" name="Text_titleEN" id="Text_titleEN" class="form-control" value="<?PHP if(isset($Text_titleEN)){echo $Text_titleEN;}?>"></div>
                                      </div>
                                      <div class="form-group"><label class="col-sm-2 control-label">Image</label>
                                          <div class="col-sm-10">
                                            <input type="file" name="File_imagesEN" id="File_imagesEN" class="form-control">
                                            <input type="hidden" name="File_imagesEN_old" id="File_imagesEN_old" value="<?PHP if(isset($File_imagesEN)){echo $File_imagesEN;}?>">
                                          </div>
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
                                            <a href="<?=site_url('article/news/index');?>">
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
                                    <input type="hidden" name="crfnews" id="crfnews" value="<?=$crfnews;?>">
                                    <input type="hidden" name="Id" id="Id" value="<?PHP if(isset($Id)){echo $Id;}?>">
                                    <input type="hidden" name="Text_eye" id="Text_eye" class="Text_eye" value="<?PHP if(isset($Text_eye)){echo $Text_eye;}?>">
                                    <input type="hidden" name="Text_check" id="Text_check" class="Text_check" value="<?PHP if(isset($Text_check)){echo $Text_check;}?>">
                                    <div class="form-group"><label class="col-sm-2 control-label">Title<span class="text-muted">*</span></label>
                                        <div class="col-sm-10"><input type="text" name="Text_titleTH" id="Text_titleTH" class="form-control" value="<?PHP if(isset($Text_titleTH)){echo $Text_titleTH;}?>"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Image</label>
                                        <div class="col-sm-10">
                                          <input type="file" name="File_imagesTH" id="File_imagesTH" class="form-control">
                                          <input type="hidden" name="File_imagesTH_old" id="File_imagesTH_old" value="<?PHP if(isset($File_imagesTH)){echo $File_imagesTH;}?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                          <textarea rows="25" cols="150" class="summernote" id="Text_detailTH" name="Text_detailTH"><?PHP if(isset($Text_detailTH)){echo $Text_detailTH;}?></textarea>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                      <div class="col-sm-6 col-sm-offset-4">
                                          <a href="<?=site_url('article/news/index');?>">
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
