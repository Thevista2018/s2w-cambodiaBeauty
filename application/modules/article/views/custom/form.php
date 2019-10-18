<?PHP
if($type == "news"){
  $Title = "News";
  $t = array(
    1 => 'News',
    // 2 => 'Press Release'
  );
}else if($type == "publicities"){
  $Title = "Publicities";
  $t = array();
}else if($type == "seminars"){
  $Title = "Seminars";
  $t = array(
    4 => 'Seminar',
    5 => 'Special Activity'
  );
}
if(isset($listdata) && count($listdata) != 0){
  foreach ($listdata as $key => $value) {
    $Id = $value['article_id'];
    $Text_type = $value['article_type'];
    $Text_title = $value['article_title'];
    $File_images = $value['article_image'];
    $Text_url = $value['article_url'];
    $Text_detail = $value['article_detail'];
    $Text_date = date('Y-m-d', strtotime($value['article_datecreate']));
    $Text_sort = $value['article_sort'];
    $Text_eye = $value['article_show'];
    $Text_check = $value['article_status'];
    $article_showhomepage = $value['article_showhomepage'];
  }
  $TitlePage = "Update";
  $actionUrl = site_url('article/custom/update/'.$type);
}else{
  $TitlePage = "Create";
  $actionUrl = site_url('article/custom/create/'.$type);
  $Text_eye = 1;
  $Text_check = 1;
  $Text_date = date('Y-m-d');
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
                <a href="<?=site_url('article/custom/index/'.$type);?>"><?=$Title?></a>
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
                            <li class="active"><a data-toggle="tab" href="#tab-2" aria-expanded="false"><?=$Title?></a></li>
                  <div class="mail-tools tooltip-demo">
                        <div class="btn-group pull-right">
                          <button class="btn btn-white btn-sm Btn-reload" data-toggle="tooltip" data-placement="left" title="" data-original-title="Refresh page"><i class="fa fa-refresh"></i> Refresh</button>
                          <!-- <button class="btn btn-white btn-sm Btn-eye" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as show">
                            <?PHP if($Text_eye == 1){?>
                              <i class="fa fa-eye"></i>
                            <?PHP }else{ ?>
                              <i class="fa fa-eye-slash"></i>
                            <?PHP }?>
                          </button> -->
                          <button class="btn btn-white btn-sm Btn-check" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as important">
                            <?PHP if($Text_check == 1){?>
                              <i class="fa fa-check-square-o"></i>
                            <?PHP }else if($Text_check == 2){ ?>
                              <i class="fa fa-check-square"></i>
                            <?PHP }?>
                          </button>
                          <?PHP if(!empty($Id)){ ?>
                          <button class="btn btn-white btn-sm Btn-delete" data-url="<?=site_url('article/custom/delete/'.$type.'/'.$value['article_id']);?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> </button>
                          <?PHP }?>
                          <?PHP if(!empty($Id)){ ?>
                            <?PHP
                              if($type == "news"){
                                $Urlpreviews = site_url('newscontent/'.$Id);
                              }else if($type == "publicities"){
                                $Urlpreviews = site_url('publicitiescontent/'.$Id);
                              }else if($type == "seminars"){
                                $Urlpreviews = site_url('seminarscontent/'.$Id);
                              }
                            ?>
                          <button class="btn btn-warning btn-sm Btn-url" data-url="<?=$Urlpreviews;?>" data-toggle="tooltip" data-placement="left" title="" data-original-title="Preview this pages"><i class="fa fa-search"></i> Preview</button>
                          <?PHP }?>
                        </div>
                    </div>
                        </ul>

                        <div class="tab-content">
                            <div id="tab-2" class="tab-pane active">
                                <div class="panel-body">
                                  <form action="<?=$actionUrl;?>" method="post" enctype="multipart/form-data" name="formCustom_<?=$TitlePage?>" id="formCustom_<?=$TitlePage?>" class="form-horizontal" novalidate>
                                    <input type="hidden" name="crfnews" id="crfnews" value="<?=$crfnews;?>">
                                    <input type="hidden" name="Id" id="Id" value="<?PHP if(isset($Id)){echo $Id;}?>">
                                    <input type="hidden" name="Text_eye" id="Text_eye" class="Text_eye" value="<?PHP if(isset($Text_eye)){echo $Text_eye;}?>">

                                    <?PHP if($type == "seminars"){ ?>
                                      <input type="hidden" name="Text_showhomepage" id="Text_showhomepage" value="0">
                                    <?PHP } ?>

                                    <input type="hidden" name="Text_check" id="Text_check" class="Text_check" value="<?PHP if(isset($Text_check)){echo $Text_check;}?>">
                                    <div class="form-group"><label class="col-sm-2 control-label">Title<span class="text-muted">*</span></label>
                                        <div class="col-sm-10"><input type="text" name="Text_title" id="Text_title" class="form-control" value="<?PHP if(isset($Text_title)){echo $Text_title;}?>"></div>
                                    </div>
                                    <?PHP if(count($t) != 0){?>
                                    <div class="form-group"><label class="col-sm-2 control-label">Type<span class="text-muted">*</span></label>
                                        <div class="col-sm-10">
                                          <select name="Text_type" id="Text_type" tabindex="9" class="form-control">
                                            <?PHP foreach ($t as $key => $value) {?>
                                              <option value="<?=$key?>" <?PHP if(isset($Text_type) and $Text_type == $key){echo 'selected';}?>><?=$value?></option>
                                            <?PHP }?>
                                          </select>
                                        </div>
                                    </div>
                                    <?PHP }else{
                                      echo '<input type="hidden" name="Text_type" id="Text_type" value="3">';
                                    }?>
                                    <div class="form-group"><label class="col-sm-2 control-label">Image</label>
                                        <div class="col-sm-10"><input type="file" name="File_images" id="File_images" accept="image/*" class="form-control">
                                        <input type="hidden" name="File_images_old" id="File_images_old" value="<?PHP if(isset($File_images)){echo $File_images;}?>"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Url Video</label>
                                        <div class="col-sm-10">
                                          <input type="text" name="Text_url" id="Text_url" class="form-control" value="<?PHP if(isset($Text_url)){echo $Text_url;}?>">
                                        </div>
                                    </div>
                                    <?PHP if($type == "news" || $type == "publicities"){ ?>
                                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Show Homepage</label>
                                      <div class="col-sm-4">
                                          <select name="Text_showhomepage" id="Text_showhomepage" tabindex="9" class="form-control">
                                            <option value="1" <?PHP if(isset($article_showhomepage) and $article_showhomepage == 1){echo 'selected';}?>>Not Homepage</option>
                                            <option value="2" <?PHP if(isset($article_showhomepage) and $article_showhomepage == 2){echo 'selected';}?>>Show Homepage</option>
                                          </select>
                                      </div>
                                    </div>
                                    <?PHP } ?>
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
                                    <div class="hr-line-dashed" style="clear: both;"></div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                          <textarea rows="25" cols="150" class="summernote" data-img="<?=site_url('manager/filemanager/summernote');?>" id="Text_detail" name="Text_detail"><?PHP if(isset($Text_detail)){echo $Text_detail;}?></textarea>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                      <div class="col-sm-6 col-sm-offset-5">
                                          <a href="<?=site_url('article/custom/index/'.$type);?>">
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
