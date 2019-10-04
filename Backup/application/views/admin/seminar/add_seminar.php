    <!-- //////////////////// Body //////////////////// -->
    <div id="body_box">
        
        <!-- Description -->
        <div id="table_description">
            <h1>หน้าเพิ่ม Seminar</h1>
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
            <div class="form_title_box"><p>ข้อมูล Seminar</p></div>
            
            <!-- All Box -->
            <div class="form_all_box">
                
                <!-- TABLE -->
                <table class="tb_form">
                    <tbody>
                    
                    	<tr>
                            <td class="td_top" width="200">
                                <span class="span_topic">Type :</span>
                            </td>
                            <td>
                         		<select name="seminar_type" class="style_1_ajax">
                                        <?php
                                            unset($seminar_type);
                                            if (isset($data['seminar_type'])) $seminar_type = $data['seminar_type'];
                                            else $seminar_type = 1;
                                            
                                            $arr = array(1=>'Seminar', 2=>'Activity ');

                                            foreach ($arr as $k => $v) {
                                                switch ($seminar_type) {
                                                    case $k :
                                                        $select[$k] = 'SELECTED';
                                                        break;
                                                }
                                        ?>
                                        <option value="<?=$k?>" <?=$select[$k]?>><?=$v?></option>
                                        <?php } ?>
                                </select>
                            </td>
                        </tr>
                            
                        <!-- Title -->
                        <tr>
                            <td class="td_top" width="200">
                                <span class="span_topic">Title :</span>
                            </td>
                            <td>
                                <input type="text" name="seminar_title" value="<?=$data['seminar_title'];?>" class="style_1" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['seminar_title'])) { ?>
                                    <p class="input_error">[<?=$error['seminar_title'];?>]</p>
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
                                <input type="text" name="seminar_sub_title" value="<?=$data['seminar_sub_title'];?>" class="style_1" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['seminar_sub_title'])) { ?>
                                    <p class="input_error">[<?=$error['seminar_sub_title'];?>]</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <!-- End : Sub Title -->
                            
                        <!-- Description -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">Description :</span>
                            </td>
                            <td>
                                <textarea name="seminar_desc" class="style_1" id="ckeditor_f"><?php echo $data['seminar_desc']; ?></textarea>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['seminar_desc'])) { ?>
                                    <p class="input_error">[<?php echo $error['seminar_desc']; ?>]</p>
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
                                <input type="file" size="35" name="seminar_pic" />
                                <div class="clear-float"></div>

                                <?php if (!empty($error['seminar_pic'])) { ?>
                                    <p class="input_error">[<?=$error['seminar_pic'];?>]</p>
                                <? } else { ?>
                                    <p class="input_notice">รูปขนาด 258*118 px (ขนาดไฟล์ < 512 KB)</p>
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
                                <select name="seminar_status" class="style_1_ajax">
                                    <optgroup label="สถานะ">
                                        <?php
                                            if (isset($data['seminar_status'])) $status = $data['seminar_status'];
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

    
<?php session_start(); $_SESSION['ckfinder_baseUrl'] = '/uploads/img_ckfinder/seminar/'; ?>
    
<!-- CKEditor -->
<script src="<?=BASE_HREF;?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?=BASE_HREF;?>ckfinder/ckfinder.js" type="text/javascript"></script>
<script type="text/javascript">
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