    <!-- //////////////////// Body //////////////////// -->
    <div id="body_box">
        
        <!-- Description -->
        <div id="table_description">
            <h1>หน้าแก้ไข Publicities</h1>
            <p>กรุณากรอกข้อมูลให้ครบทุกช่องที่ทำการ * ไว้</p>
        </div>
        <!-- End : Description -->
        
        <!-- =============== Form Box =============== -->
        <div id="form_box">
            
        <!-- Form -->
        <form method="POST" enctype="multipart/form-data" action="">
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="url" value="<?=$url;?>" />
            <input type="hidden" name="publicities_pic" value="<?=$data['publicities_pic'];?>" />

<!-- ==================================================================================== -->                     
            <!-- Title Form -->
            <div class="form_title_box"><p>ข้อมูล Publicities</p></div>
            
            <!-- All Box -->
            <div class="form_all_box">
                
                <!-- TABLE -->
                <table class="tb_form">
                    <tbody>
                            
                        <!-- Title -->
                        <tr>
                            <td class="td_top" width="200">
                                <span class="span_topic">Title :</span>
                            </td>
                            <td>
                                <input type="text" name="publicities_title" value="<?=$data['publicities_title'];?>" class="style_1" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['publicities_title'])) { ?>
                                    <p class="input_error">[<?=$error['publicities_title'];?>]</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <!-- End : Title -->
                        
                        <!-- Sub Title -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">Sub Title :</span>
                            </td>
                            <td>
                                <input type="text" name="publicities_sub_title" value="<?=$data['publicities_sub_title'];?>" class="style_1" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['publicities_sub_title'])) { ?>
                                    <p class="input_error">[<?=$error['publicities_sub_title'];?>]</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <!-- End : Sub Title -->

                        <!-- Date -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">Date :</span>
                            </td>
                            <td>
                                <?php 
                                    if(!empty($data['publicities_date'])){
                                        $d = explode('-', $data['publicities_date']);
                                        $publicities_date = $d[2].'/'.$d[1].'/'.$d[0];
                                        if($publicities_date == '00/00/0000'){
                                            $publicities_date = "";
                                        }
                                    }else{
                                        $publicities_date = date('d/m/Y');
                                    }
                                ?>
                                <input type="text" name="publicities_date" id="publicities_date" value="<?=$publicities_date;?>" class="style_1" style="width: 180px;" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['publicities_date'])) { ?>
                                    <p class="input_error">[<?=$error['publicities_date'];?>]</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <!-- End : Date -->
                            
                        <!-- Description -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">Description :</span>
                            </td>
                            <td>
                                <textarea name="publicities_desc" class="style_1" id="ckeditor_f"><?php echo $data['publicities_desc']; ?></textarea>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['publicities_desc'])) { ?>
                                    <p class="input_error">[<?php echo $error['publicities_desc']; ?>]</p>
                                <? } ?>
                            </td>
                        </tr>
                        <!-- End : Description -->
                            
                    </tbody>
                </table>
                <!-- End : TABLE -->

            </div>
            <!-- End : All Box -->
            
            <div class="clear-float"></div>
<!-- ==================================================================================== --> 

            <!-- Title Form -->
            <div class="form_title_box mg_top_10"><p>ข้อมูลระบบ</p></div>
            
            <!-- All Box -->
            <div class="form_all_box">

                <!-- TABLE -->
                <table class="tb_form">
                    <tbody>
                        
                        <!-- รูป Thumbnail ปัจจุบัน -->
                        <tr>
                            <td width="200" class="td_top">
                                <span class="span_topic">รูป Thumbnail ปัจจุบัน :</span>
                            </td>
                            <td>
                                <?php 
                                    $thumb = $this->f_lib->getPath($data['publicities_id'], $data['publicities_pic'], 'uploads/publicities', 'default.jpg');
                                ?>
                                
                                <img src="<?php echo $thumb; ?>" onerror="handleImgError(this, 'publicities', 68)" />
                            </td>
                        </tr>
                        <!-- End : รูป Thumbnail ปัจจุบัน -->
                        
                        <!-- เปลี่ยนรูป Thumbnail -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">เปลี่ยนรูป Thumbnail :</span>
                            </td>
                            <td>
                                <input type="file" size="35" name="publicities_pic" />
                                <div class="clear-float"></div>

                                <?php if (!empty($error['publicities_pic'])) { ?>
                                    <p class="input_error">[<?=$error['publicities_pic'];?>]</p>
                                <?php } else { ?>
                                    <p class="input_notice">รูปขนาด 258*118 px (ขนาดไฟล์ < 512 KB)</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <!-- End : เปลี่ยนรูป Thumbnail  -->
                        
                        <!-- Status -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">สถานะ :</span>
                            </td>
                            <td>
                                <select name="publicities_status" class="style_1_ajax">
                                    <optgroup label="สถานะ">
                                        <?php
                                            unset($status);
                                            if (isset($data['publicities_status'])) $status = $data['publicities_status'];
                                            else $status = 1;
                                            
                                            $arr = array(1=>'เปิด', 0=>'ปิด');

                                            foreach ($arr as $k => $v) {
                                                switch ($status) {
                                                    case $k :
                                                        $select[$k] = 'SELECTED';
                                                        break;
                                                }
                                        ?>
                                        <option value="<?=$k?>" <?=$select[$k]?>>- <?=$v?></option>
                                        <?php } ?>
                                    </optgroup>
                                </select>
                            </td>
                        </tr>
                        <!-- End : Status -->        

                    </tbody>
                </table>
                <!-- End : TABLE -->

            </div>
            <!-- End : All Box -->
            
            <div class="clear-float"></div>
<!-- ==================================================================================== --> 
            
            <!-- Submit -->
            <div id="submit_box"><input type="submit" value="ตกลง" class="button grey add" /></div>
            
        </form>
        <!-- End : Form -->
            
        </div>
        <!-- =============== End : Form Box =============== -->
        
    </div>
    <!-- //////////////////// End - Body //////////////////// -->            

    
<?php session_start(); $_SESSION['ckfinder_baseUrl'] = BASE_HREF.'/uploads/img_ckfinder/publicities/'; ?>
<link rel="stylesheet" href="<?=BASE_HREF; ?>css/bootstrap-datepicker.css" type="text/css" />
<script type="text/javascript" src="<?=BASE_HREF; ?>js/bootstrap-datepicker.js"></script>
    
<!-- CKEditor -->
<script src="<?=BASE_HREF;?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?=BASE_HREF;?>ckfinder/ckfinder.js" type="text/javascript"></script>
<script type="text/javascript">
    $('#publicities_date').datepicker({format: 'dd/mm/yyyy'});
    $(document).ready(function() {
        CKFinder.setupCKEditor(null, {
            basePath : '<?=BASE_HREF;?>ckfinder/'
        });
        CKEDITOR.replace('ckeditor_f', {
            width: 800,
            resize_minWidth: 800,
            resize_maxWidth: 800,
            height: 200,
            enterMode : CKEDITOR.ENTER_BR,
            filebrowserUploadUrl : '',
            filebrowserImageUploadUrl : ''
        });
    });
</script>