<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
    <?php header("Cache-Control: no-cache, must-revalidate"); ?>
    
<head>
    <title><?=(!empty($title) ? $title : TITLE_ADMIN);?></title>
    
    <!-- Base href -->
    <base href="<?=BASE_HREF?>" />
    
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?=BASE_HREF;?>css/admin/main.css" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="<?=BASE_HREF;?>css/admin/table.css" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="<?=BASE_HREF;?>css/admin/form.css" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="<?=BASE_HREF;?>css/admin/page.css" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="<?=BASE_HREF;?>css/admin/button.css" type="text/css" media="screen" charset="utf-8" />    
    <link rel="stylesheet" href="<?=BASE_HREF;?>css/ui-darkness/jquery-ui-1.8.22.custom.css" type="text/css" media="screen" charset="utf-8" />

    <!-- JS -->
    <!--<script type="text/javascript" src="<?=BASE_HREF;?>js/jquery-core/jquery-1.8.0.min.js"></script>-->
    <script type="text/javascript" src="<?=BASE_HREF;?>js/jquery-core/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?=BASE_HREF;?>js/jquery-plugins/jquery-ui-1.8.22.custom.min.js"></script>
    <script type="text/javascript" src="<?=BASE_HREF;?>js/jquery-plugins/jquery.tooltip.js"></script>
    <script type="text/javascript" src="<?=BASE_HREF;?>js/jquery-plugins/jquery.hoverintent.js"></script>
    <script type="text/javascript" src="<?=BASE_HREF;?>js/admin/general.js"></script>
    <?php
        if (!empty($ar_js)) {
            foreach ($ar_js as $js) {
                echo "<script type=\"text/javascript\" src=\"$js\" charset=\"utf-8\"></script>";
            }
        }
    ?>
    
    <!-- Favicon -->
    <link href="<?=BASE_HREF;?>images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    
</head>
    
<body>
    
    <?php if (!empty($alert_error)) echo $alert_error; ?>
    
    <!-- //////////////////// Wrap //////////////////// -->
    <div id="wrap_box">
    
    <!-- //////////////////// Head //////////////////// -->
    <div id="head_box">
        
        <!-- head_row_1 -->
        <div id="head_row_1">
            <div class="font-11 pad-right">
                Logged in as <span class="font-11 blue"><?=ADMIN_USER?></span>
                
                <!-- Menu : Manage Admin -->
                <?php if (ADMIN_STATUS==2) { ?>
                    <span class="pipe yellow">|</span>
                    <a href="<?=BASE_AM;?>/admin/list_admin">Management</a>
                <? } ?>
                    
                <!-- Menu : Edit -->
                <?php if (ADMIN_STATUS != 0) { ?>
                    <span class="pipe yellow">|</span>
                    <a href="<?=BASE_AM;?>/admin/edit_admin?admin_id=<?=ADMIN_ID?>">Edit</a>
                <? } ?>
                    
                <span class="pipe yellow">|</span>
                <a href="<?=BASE_AM;?>/authen/logout">Logout</a>
            </div>
        </div>
        <!-- End : head_row_1 -->
        
        <!-- head_row_2 -->
        <div id="head_row_2">
            <a href="<?=BASE_AM;?>">
                <img src="<?=BASE_HREF;?>images/admin/head/logo.png" class="img-logo tooltip" title="Admin Control Panel" alt="Admin Control Panel" />
            </a>
            <a href="<?=BASE_AM;?>" class="a-logo">Admin Control Panel - <?=SERV_NAME?></a>
        </div>
        <!-- End : head_row_2 -->
        
        <!-- Menu -->
        <div id="menu">
            <ul class="tabs">
                
                <!-- Condition : Page active -->
                <?php 
                    switch ($this->uri->rsegment(2)) {
                        /* -- Shortnews -- */
                        case 'list_shortnews' :
                        case 'add_shortnews' :
                        case 'edit_shortnews' :
                            $this->list_shortnews_active = 'class="active"';
                            break;
                        
                        /* -- Slide -- */
                        case 'list_slide' :
                        case 'add_slide' :
                        case 'edit_slide' :
                            $this->list_slide_active = 'class="active"';
//                            $this->list_system_active = '_active';
                            break;
                        
                        /* -- Download -- */
                        case 'list_download' :
                        case 'add_download' :
                        case 'edit_download' :
                            $this->list_download_active = 'class="active"';
                            break;
                        
                        /* -- Article -- */
                        case 'list_article' :
                        case 'add_article' :
                        case 'edit_article' :
                            $this->list_article_active = 'class="active"';
                            break;
                        
                        /* -- Gallery -- */
                        case 'list_gallery' :
                        case 'add_gallery' :
                        case 'edit_gallery' :
                            $this->list_gallery_active = 'class="active"';
                            break;
                        
                        /* -- Publicities -- */
                        case 'list_publicities' :
                        case 'add_publicities' :
                        case 'edit_publicities' :
                            $this->list_publicities_active = 'class="active"';
                            break;
							
						 /* -- Seminar -- */
                        case 'list_seminar' :
                        case 'add_seminar' :
                        case 'edit_seminar' :
                            $this->list_seminar_active = 'class="active"';
                            break;
                    }
                ?>
                <!-- End : Condition -->
                
                <li <?=$this->list_shortnews_active;?>>
                    <a href="<?=BASE_AM;?>/shortnews/list_shortnews">Shortnews</a>
                </li>
                
                <li <?=$this->list_slide_active;?>>
                    <a href="<?=BASE_AM;?>/slide/list_slide">Slide</a>
                </li>
                
                <li <?=$this->list_download_active;?>>
                    <a href="<?=BASE_AM;?>/download/list_download">Download</a>
                </li>
                
                <li <?=$this->list_article_active;?>>
                    <a href="<?=BASE_AM;?>/article/list_article">News & Press</a>
                </li>
                
                <li <?=$this->list_gallery_active;?>>
                    <a href="<?=BASE_AM;?>/gallery/list_gallery">Gallery</a>
                </li>
                
                <li <?=$this->list_publicities_active;?>>
                    <a href="<?=BASE_AM;?>/publicities/list_publicities">Publicities</a>
                </li>
  
                <li <?=$this->list_seminar_active;?>>
                    <a href="<?=BASE_AM;?>/seminar/list_seminar">Seminar</a>
                </li>
                
            </ul>
        </div>
        <!-- End : Menu -->
        
    </div>
    <!-- //////////////////// End : Head //////////////////// -->