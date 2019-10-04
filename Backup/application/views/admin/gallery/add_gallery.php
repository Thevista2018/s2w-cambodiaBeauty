    <!-- //////////////////// Body //////////////////// -->
    <div id="body_box">
        
        <!-- Description -->
        <div id="table_description">
            <h1>หน้าเพิ่ม Gallery</h1>
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
            <div class="form_title_box"><p>ข้อมูล Gallery</p></div>
            
            <!-- All Box -->
            <div class="form_all_box">
                
                <!-- TABLE -->
                <table class="tb_form">
                    <tbody>
                            
                        <!-- Title -->
                        <tr>
                            <td width="350" class="td_top">
                                <span class="span_topic">Title :</span>
                            </td>
                            <td>
                                <input type="text" name="gallery_title" value="<?=$data['gallery_title'];?>" class="style_1" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['gallery_title'])) { ?>
                                    <p class="input_error">[<?=$error['gallery_title'];?>]</p>
                                <? } ?>
                            </td>
                        </tr>
                        <!-- End : Title -->

                        <!-- Title -->
                        <tr>
                            <td width="350" class="td_top">
                                <span class="span_topic">Date :</span>
                            </td>
                            <td>
                                <input type="text" name="gallery_date" id="gallery_date" value="<?=$data['gallery_date'];?>" class="style_1" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['gallery_date'])) { ?>
                                    <p class="input_error">[<?=$error['gallery_date'];?>]</p>
                                <? } ?>
                            </td>
                        </tr>
                        <!-- End : Title -->
                            
                        <!-- Description -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">Description :</span>
                            </td>
                            <td>
                                <textarea name="gallery_desc" class="style_1 ckeditor"><?php echo $data['gallery_desc']; ?></textarea>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['gallery_desc'])) { ?>
                                    <p class="input_error">[<?php echo $error['gallery_desc']; ?>]</p>
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
                            <td width="350" class="td_top">
                                <span class="span_topic">รูป Thumbnail :</span>
                            </td>
                            <td>
                                <input type="file" size="35" name="gallery_pic" />
                                <div class="clear-float"></div>

                                <?php if (!empty($error['gallery_pic'])) { ?>
                                    <p class="input_error">[<?=$error['gallery_pic'];?>]</p>
                                <? } else { ?>
                                    <p class="input_notice">รูปขนาด 220*194 px (ขนาดไฟล์ < 512 KB)</p>
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
                                <select name="gallery_status" class="style_1_ajax">
                                    <optgroup label="สถานะ">
                                        <?php
                                            if (isset($data['gallery_status'])) $status = $data['gallery_status'];
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
                
            <!-- Title Form -->
            <div class="form_title_box mg_top_10"><p>อัพโหลดรูปภาพเพิ่มเติม</p></div>
            
            <!-- All Box -->
            <div class="form_all_box">

                <!-- TABLE -->
                <table class="tb_form" id="tb_addrow">
                    <tbody>
                        
                        <!-- รูปแบบการ Add ข้อมูล -->
                        <tr>
                            <td class="td_top" width="350">
                                <span class="span_topic_yellow">รูปแบบการ Add รูป :</span>
                            </td>
                            <td>
                                <select id="add_type" name="add_type" class="style_1_ajax">
                                    <optgroup label="กรุณาเลือกรูปแบบ">
                                        <?php
                                            switch ($_POST['add_type']) {
                                                case 1 :
                                                    $sel_type_1 = "SELECTED";
                                                    break;
                                                case 2 :
                                                    $sel_type_2 = "SELECTED";
                                                    break;

                                                default :
                                                    $sel_type_2 = "SELECTED";
                                                    break;
                                            }
                                        ?>
                                        <option value="1" <?=$sel_type_1?>>- แบบใส่ URL</option>
                                        <option value="2" <?=$sel_type_2?>>- แบบแนบไฟล์ Browse</option>
                                    </optgroup>
                                </select>
                            </td>
                        </tr>
                        <!-- End : รูปแบบการ Add ข้อมูล -->

                        <!-- Browse -->
                        <? for ($i=1; $i<=5; $i++) { ?>
                        <tr class="photo_browse">
                            <td class="td_top">
                                <span class="span_topic">Upload #<?=$i?> :</span>
                            </td>
                            <td>
                                <input type="file" size="35" name="inputBrowse[]" id="inputBrowse_<?=$i?>" />
                            </td>
                        </tr>
                        <? } ?>

                        <?php if (!empty($error_inputBrowse)) { ?>
                            <tr class="alert_photo">
                                <td>&nbsp;</td>
                                <td>
                                    <p class="input_error">[<?=$error_inputBrowse?>]</p>
                                </td>
                            </tr>
                        <? } ?>
                        <!-- End : Browse -->

                        <!-- URL -->
                        <?php for ($i=1; $i<=5; $i++) { ?>
                        <tr class="photo_url" style="display:none;">
                            <td class="td_top">
                                <span class="span_topic">URL รูปภาพ #<?=$i?> :</span>
                            </td>
                            <td>
                                <input type="text" name="inputURL[]" id="inputURL_<?=$i?>" value="" class="style_1" />
                            </td>
                        </tr>
                        <? } ?>

                        <?php if (!empty($error_inputURL)) { ?>
                            <tr class="alert_photo">
                                <td>&nbsp;</td>
                                <td>
                                    <p class="input_error">[<?=$error_inputURL?>]</p>
                                </td>
                            </tr>
                        <? } ?>
                        <!-- End : URL -->
                    </tbody>

                    <!-- More -->
                    <tfoot>
                        <tr>
                            <td>&nbsp;</td>
                            <td style="vertical-align:middle">
                                <input type="button" id="bt_more" value="เพิ่มเติม" onclick="addRow($('#add_type').val(), 6);" />
                            </td>
                        </tr>
                    </tfoot>

                </table>
                <!-- End : TABLE -->

            </div>
            <!-- End : Left Box -->
            
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


<script src="<?=BASE_HREF;?>js/switch_upload.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?=BASE_HREF; ?>css/bootstrap-datepicker.css" type="text/css" />
<script type="text/javascript" src="<?=BASE_HREF; ?>js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $('#gallery_date').datepicker({format: 'dd/mm/yyyy'});
</script>