    <!-- //////////////////// Body //////////////////// -->
    <div id="body_box">
        
        <!-- Description -->
        <div id="table_description">
            <h1>หน้าเพิ่มบทความ</h1>
            <p>กรุณากรอกข้อมูลให้ครบทุกช่องที่ทำการ * ไว้</p>
        </div>
        <!-- End : Description -->
        
        <!-- =============== Form Box =============== -->
        <div id="form_box">
            
        <!-- Form -->
        <form method="POST" enctype="multipart/form-data" action="">
            <input type="hidden" name="action" value="save" />

<!-- ==================================================================================== -->                     
            <!-- Title Form -->
            <div class="form_title_box"><p>ข้อมูลบทความ</p></div>
            
            <!-- All Box -->
            <div class="form_all_box">
                
                <!-- TABLE -->
                <table class="tb_form">
                    <tbody>
                        
                        <!-- หมวด -->
                        <tr>
                            <td width="200" class="td_top">
                                <span class="span_topic">หมวด :</span>
                            </td>
                            <td>
                                <select name="article_cat" class="style_1_ajax">
                                    <optgroup label="หมวด">
                                        <?php
                                            unset($status);
                                            if (isset($data['article_cat'])) $status = $data['article_cat'];
                                            else $status = 1;
                                            
                                            $arr = array(1=>'News', 2=>'Press Release');

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
                        <!-- End : หมวด -->
                            
                        <!-- Title -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">Title :</span>
                            </td>
                            <td>
                                <input type="text" name="article_title" value="<?=$data['article_title'];?>" class="style_1" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['article_title'])) { ?>
                                    <p class="input_error">[<?=$error['article_title'];?>]</p>
                                <? } ?>
                            </td>
                        </tr>
                        <!-- End : Title -->
                        
                        <!-- Sub Title -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">Sub Title :</span>
                            </td>
                            <td>
                                <input type="text" name="article_sub_title" value="<?=$data['article_sub_title'];?>" class="style_1" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['article_sub_title'])) { ?>
                                    <p class="input_error">[<?=$error['article_sub_title'];?>]</p>
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
                                <input type="text" name="article_date" id="article_date" value="<?=$data['article_date'];?>" class="style_1" style="width: 180px;" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['article_date'])) { ?>
                                    <p class="input_error">[<?=$error['article_date'];?>]</p>
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
                                <textarea name="article_desc" class="style_1" id="ckeditor_f"><?php echo $data['article_desc']; ?></textarea>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['article_desc'])) { ?>
                                    <p class="input_error">[<?php echo $error['article_desc']; ?>]</p>
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
                        
                        <!-- รูป Thumbnail -->
                        <tr>
                            <td width="200" class="td_top">
                                <span class="span_topic">รูป Thumbnail :</span>
                            </td>
                            <td>
                                <input type="file" size="35" name="article_pic" />
                                <div class="clear-float"></div>

                                <?php if (!empty($error['article_pic'])) { ?>
                                    <p class="input_error">[<?=$error['article_pic'];?>]</p>
                                <? } else { ?>
                                    <p class="input_notice">รูปขนาด 205*150 px (ขนาดไฟล์ < 512 KB)</p>
                                <? } ?>
                            </td>
                        </tr>
                        <!-- End : รูป Thumbnail  -->
                        
                        <!-- Status -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">สถานะ :</span>
                            </td>
                            <td>
                                <select name="article_status" class="style_1_ajax">
                                    <optgroup label="สถานะ">
                                        <?php
                                            if (isset($data['article_status'])) $status = $data['article_status'];
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
                                        <? } ?>
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

    
<?php session_start(); $_SESSION['ckfinder_baseUrl'] = '/uploads/img_ckfinder/article/'; ?>
<link rel="stylesheet" href="<?=BASE_HREF; ?>css/bootstrap-datepicker.css" type="text/css" />
<script type="text/javascript" src="<?=BASE_HREF; ?>js/bootstrap-datepicker.js"></script>
    
<!-- CKEditor -->
<script src="<?=BASE_HREF;?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?=BASE_HREF;?>ckfinder/ckfinder.js" type="text/javascript"></script>
<script type="text/javascript">
    $('#article_date').datepicker({format: 'dd/mm/yyyy'});
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