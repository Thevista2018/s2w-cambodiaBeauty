<?PHP
if(isset($listdata) and count($listdata) != 0){
  foreach ($listdata as $key => $value) {
    $Id = $value['slider_id'];
    $Text_slidertype = $value['slider_type'];
    $File_images = $value['slider_name'];
    $File_videoimages = $value['slider_imagesvideo'];
    $File_video = $value['slider_video'];
    $Text_linkurl = $value['slider_url'];
    $Text_colors = $value['slider_color'];
    $Text_msgTH = $value['slider_msg_th'];
    $Text_link = $value['slider_link'];
    $Text_sort = $value['slider_sort'];
  }
  $title = "Update";
  $actionUrl = site_url('contents/slider/update/');
}else{
  $title = "Create";
  $actionUrl = site_url('contents/slider/create/');
}
?>

<!-- Breadcrumb for page -->
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?=$title;?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="<?=site_url('contents/slider/index');?>">Slider</a>
            </li>
            <li class="active">
                <strong><?=$title;?></strong>
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
      <div class="ibox float-e-margins">
        <div class="ibox-content">
          <form action="<?=$actionUrl?>" method="post" enctype="multipart/form-data" name="formSlider_<?=$title;?>" id="formSlider_<?=$title;?>" class="form-horizontal" novalidate>
            <input type="hidden" name="crfslider" id="crfslider" value="<?=$crfslider;?>">
            <input type="hidden" name="Id" id="Id" value="<?PHP if(isset($Id)){echo $Id;}?>">
            <div class="form-group"><label class="col-sm-2 control-label">Type<span class="text-muted">*</span></label>
                <div class="col-sm-10">
                  <select name="Text_slidertype" id="Text_slidertype" tabindex="9" class="form-control">
                      <option value="1" <?PHP if(isset($Text_slidertype) && $Text_slidertype == 1){echo 'selected';}?>>Images</option>
                      <option value="2" <?PHP if(isset($Text_slidertype) && $Text_slidertype == 2){echo 'selected';}?>>Video</option>
                      <option value="3" <?PHP if(isset($Text_slidertype) && $Text_slidertype == 3){echo 'selected';}?>>Url iframe</option>
                  </select>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div id="sliderImage">
              <div class="form-group"><label class="col-sm-2 control-label">File Slider Images<span class="text-muted">*</span></label>
                  <div class="col-sm-10">
                    <input type="file" name="File_images" id="File_images" accept="image/*" class="form-control">
                    <p class="small">Image (jpg,png,jpeg format) (maximum file size 5MB or 5,000 KB :: Image Size 900 x 456 pixels)</p>
                    <input type="hidden" name="File_images_old" id="File_images_old" value="<?PHP if(isset($File_images)){echo $File_images;}?>">
                  </div>
              </div>
              <div class="hr-line-dashed"></div>
            </div>
            <div id="sliderVideo" style="display: none;">
              <div class="form-group"><label class="col-sm-2 control-label">File Images<span class="text-muted">*</span></label>
                  <div class="col-sm-10">
                    <input type="file" name="File_videoimages" id="File_videoimages" accept="image/*" class="form-control">
                    
                    <input type="hidden" name="File_videoimages_old" id="File_videoimages_old" value="<?PHP if(isset($File_videoimages)){echo $File_videoimages;}?>">
                  </div>
              </div>
              <div class="hr-line-dashed"></div>
              <div class="form-group"><label class="col-sm-2 control-label">File Slider Video</label>
                  <div class="col-sm-10">
                    <input type="file" name="File_video" id="File_video" accept="video/*" class="form-control">
                    <input type="hidden" name="File_video_old" id="File_video_old" value="<?PHP if(isset($File_video)){echo $File_video;}?>">
                  </div>
              </div>
              <div class="hr-line-dashed"></div>
            </div>
            <div id="sliderUrl" style="display: none;">
              <div class="form-group"><label class="col-sm-2 control-label">Link url</label>
                  <div class="col-sm-10">
                    <input type="text" name="Text_linkurl" id="Text_linkurl" class="form-control" value="<?PHP if(isset($Text_linkurl)){echo $Text_linkurl;}?>">
                  </div>
              </div>
              <div class="hr-line-dashed"></div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Msg</label>
                <div class="col-sm-10"><input type="text" name="Text_msgTH" id="Text_msgTH" class="form-control" value="<?PHP if(isset($Text_msgTH)){echo $Text_msgTH;}?>"></div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">Color</label>
                <div class="col-sm-10"><input type="text" name="Text_colors" id="Text_colors" class="form-control colorpicker" value="<?PHP if(isset($Text_colors)){echo $Text_colors;}?>"></div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">Link</label>
                <div class="col-sm-10"><input type="text" name="Text_link" id="Text_link" class="form-control" value="<?PHP if(isset($Text_link)){echo $Text_link;}?>"></div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group"><label class="col-sm-2 control-label">Sort</label>
                <div class="col-sm-10"><input type="text" name="Text_sort" id="Text_sort" class="form-control" value="<?PHP if(isset($Text_sort)){echo $Text_sort;}?>"></div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
              <div class="col-sm-6 col-sm-offset-4">
                  <a href="<?=site_url('contents/slider/index/');?>">
                  <button class="btn btn-w-m btn-danger" type="button">Cancel</button>
                  </a>
                  <button class="btn btn-w-m btn-primary" type="submit">Save changes</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- End contents for page -->
    </div>
</div>
</div>
