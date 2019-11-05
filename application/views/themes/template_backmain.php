<?php
// settings
$this->db->select("*");
$query_settings = $this->db->get('tb_settings');
$list_settings = $query_settings->result_array();

if(isset($list_settings) && count($list_settings) != 0){
    foreach ($list_settings as $key => $value) {
        $Id = $value['set_id'];
        $Text_logo              = $value['set_logo'];
    }
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>System Administrator</title>

    <link href="<?=base_url('assets/inspinia/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/inspinia/font-awesome/css/font-awesome.css');?>" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?=base_url('assets/inspinia/css/plugins/toastr/toastr.min.css');?>" rel="stylesheet">

    <!-- dataTables style -->
    <link href="<?=base_url('assets/inspinia/css/plugins/dataTables/datatables.min.css');?>" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="<?=base_url('assets/inspinia/css/plugins/sweetalert/sweetalert.css');?>" rel="stylesheet">

    <link href="<?=base_url('assets/inspinia/css/plugins/colorpicker/bootstrap-colorpicker.min.css');?>" rel="stylesheet">

    <link href="<?=base_url('assets/inspinia/css/plugins/datapicker/datepicker3.css');?>" rel="stylesheet">

    <link href="<?=base_url('assets/inspinia/css/animate.css');?>" rel="stylesheet">
    <?PHP if(!empty($css)){echo $css;}?>
    <link href="<?=base_url('assets/inspinia/css/style.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/inspinia/css/custom.css');?>" rel="stylesheet">

    <script data-main="<?=base_url('assets/inspinia/js/app.js');?>" src="<?=base_url('assets/inspinia/js/require.js');?>"></script>
</head>

<body>

<div id="wrapper">

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?=$this->encryption->decrypt($this->input->cookie('sysn'));?></strong>
                             </span> <span class="text-muted text-xs block"><?=$this->encryption->decrypt($this->input->cookie('sysp'));?> <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="<?=site_url('administrator/form/'.$this->encryption->decrypt($this->input->cookie('sysli')));?>">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="<?=site_url('administrator/logout');?>">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    <img src="<?=base_url('uploads/logo/'.$Text_logo);?>" alt="">
                </div>
            </li>
            <li>
                <a href="<?=site_url('contents/pagecontents/index');?>"><i class="fa fa-list-alt"></i> <span class="nav-label">Contents</span></a>
            </li>
            <li>
                <a href="<?=site_url('article/custom/index/seminars');?>"><i class="fa fa-calendar"></i> <span class="nav-label">Seminars</span></a>
            </li>
            <li>
                <a href="<?=site_url('article/custom/index/news');?>"><i class="fa fa-newspaper-o"></i> <span class="nav-label">News</span></a>
            </li>
            <li>
                <a href="<?=site_url('article/custom/index/publicities');?>"><i class="fa fa-building-o"></i> <span class="nav-label">Publicities</span></a>
            </li>
            <li>
                <a href="<?=site_url('gallery/activity/index');?>"><i class="fa fa-camera-retro"></i> <span class="nav-label">Gallery</span></a>
            </li>
            <li>
                <a href="<?=site_url('manager/download/index');?>"><i class="fa fa-download"></i> <span class="nav-label">Download</span></a>
            </li>
            <!-- <li>
                <a href="<?=site_url('article/industry/index');?>"><i class="fa fa-file-text-o"></i> <span class="nav-label">Industry</span></a>
            </li> -->
            <li>
                <a href="<?=site_url('contents/supporter/index');?>"><i class="fa fa-group"></i> <span class="nav-label">Supporter</span></a>
            </li>
            <li>
                <a href="<?=site_url('contents/salesrepresentative/index');?>"><i class="fa fa-bookmark-o"></i> <span class="nav-label">Sales representative</span></a>
            </li>
            <li>
                <a href="<?=site_url('contents/slider/index');?>"><i class="fa fa-random"></i> <span class="nav-label">Slider</span></a>
            </li>
            <li>
                <a href="<?=site_url('contents/banner/index');?>"><i class="fa fa-picture-o"></i> <span class="nav-label">Banner</span></a>
            </li>
            <li>
                <a href="<?=site_url('preregis/index');?>"><i class="fa fa-list-alt"></i> <span class="nav-label">Pre-registration</span></a>
            </li>
            <li>
                <a href="<?=site_url('manager/filemanager/index');?>"><i class="fa fa-cloud"></i> <span class="nav-label">File manager</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-gears"></i> <span  class="nav-label">Settings</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="<?=site_url('administrator/settings/index');?>">Web site</a></li>
                    <li><a href="<?=site_url('administrator/settings/contact');?>">Contacts</a></li>
                    <li><a href="<?=site_url('administrator/settings/extensions');?>">Extensions</a></li>
                </ul>
            </li>
            <li>
                <a href="<?=site_url('administrator/main');?>"><i class="fa fa-group"></i> <span class="nav-label">Administrators</span></a>
            </li>
            <li>
                <a href="<?=site_url('manual/HOME.html');?>" target="_bank"><i class="fa fa-folder-open-o"></i> <span class="nav-label">Manual</span></a>
            </li>
        </ul>

    </div>
</nav>

<div id="page-wrapper" class="gray-bg">
<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message"><?=$this->encryption->decrypt($this->input->cookie('sysn'));?></span>
            </li>
            <li>
                <a href="<?=site_url('administrator/logout');?>">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
        </ul>

    </nav>
</div>
  <?= $contents ?>
<div class="footer" >
    <div>
        <strong>Copyright</strong> cambodiahealthbeauty.com &copy; 2019
    </div>
</div>

</div>
</div>
<!-- <script src="<?=base_url('assets/inspinia/js/lib/jquery-2.1.1.js');?>"></script>
<script src="<?=base_url('assets/inspinia/js/lib/bootstrap.min.js');?>"></script>
<script src="<?=base_url('assets/inspinia/js/lib/plugins/summernote/summernote.min.js');?>"></script>
<script>
    $(document).ready(function(){

        $('.summernote').summernote();

   });
</script> -->

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showimg').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?PHP if(!empty($js)){echo $js;}?>

</body>

</html>
