    <!-- //////////////////// Body //////////////////// -->
    <div id="body_box">
        
        <!-- Description -->
        <div id="table_description">
            <h1>หน้าแก้ไข Gallery</h1>
            <p>กรุณากรอกข้อมูลให้ครบทุกช่องที่ทำการ * ไว้</p>
        </div>
        <!-- End : Description -->
        
        <!-- =============== Form Box =============== -->
        <div id="form_box">
            
        <!-- Form -->
        <form method="POST" enctype="multipart/form-data" action="">
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="url" value="<?=$url;?>" />
            <input type="hidden" name="gallery_id" value="<?=$data['gallery_id'];?>" />
            <input type="hidden" name="gallery_pic" value="<?=$data['gallery_pic'];?>" />
            <input type="hidden" name="gallery_pic_other" value='<?=$data["gallery_pic_other"];?>' />

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

                         <!-- Date -->
                        <tr>
                            <td width="350" class="td_top">
                                <span class="span_topic">Date :</span>
                            </td>
                            <td>
                                <?php 
                                    if(!empty($data['gallery_date'])){
                                        $d = explode('-', $data['gallery_date']);
                                        $gallery_date = $d[2].'/'.$d[1].'/'.$d[0];
                                        if($gallery_date == '00/00/0000'){
                                            $gallery_date = "";
                                        }
                                    }else{
                                        $gallery_date = date('d/m/Y');
                                    }
                                ?>
                                <input type="text" name="gallery_date" id="gallery_date" value="<?=$gallery_date;?>" class="style_1" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['gallery_date'])) { ?>
                                    <p class="input_error">[<?=$error['gallery_date'];?>]</p>
                                <? } ?>
                            </td>
                        </tr>
                        <!-- End : Date -->
                            
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
                        
                        <!-- รูป Thumbnail ปัจจุบัน -->
                        <tr>
                            <td width="350" class="td_top">
                                <span class="span_topic">รูป Thumbnail ปัจจุบัน :</span>
                            </td>
                            <td>
                                <?php 
                                    $thumb = $this->f_lib->getPathFolder($data['gallery_id'], $data['gallery_pic'], 'uploads/gallery', 5, null, 'default.jpg');
                                ?>
                                
                                <img src="<?php echo $thumb; ?>" onerror="handleImgError(this, 'gallery', 68)" />
                            </td>
                        </tr>
                        <!-- End : รูป Thumbnail ปัจจุบัน -->
                        
                        <!-- เปลี่ยนรูป Thumbnail -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">เปลี่ยนรูป Thumbnail :</span>
                            </td>
                            <td>
                                <input type="file" size="35" name="gallery_pic" />
                                <div class="clear-float"></div>

                                <?php if (!empty($error['gallery_pic'])) { ?>
                                    <p class="input_error">[<?=$error['gallery_pic'];?>]</p>
                                <? } else { ?>
                                    <p class="input_notice">รูปขนาด 205*150 px (ขนาดไฟล์ < 512 KB)</p>
                                <? } ?>
                            </td>
                        </tr>
                        <!-- End : เปลี่ยนรูป Thumbnail  -->
                        
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

            <!-- Title Form -->
            <div class="form_title_box mg_top_10">
                <p>
                    รูปภาพเพิ่มเติมที่ใช้
                    <span style="float:right; color:red; line-height:24px; padding-right:5px;">(ติ๊กเลือกรูปที่ต้องการลบ)</span>
                </p>
            </div>
            
            <!-- All Box -->
            <div class="form_all_box">                
                
                <?php if (!empty($data['gallery_pic_other'])) { ?>
                <div id="photo_box" style="width:950px; margin-top:10px;">
                    <table width="950">
                        <tr>
                            <?php 
                                $array_photo = unserialize($data['gallery_pic_other']);
                                $folder = 'ID_'.$this->f_lib->fill_pad($_GET['gallery_id'], 5, 0); 
                                $path = 'uploads/gallery';

                                foreach ($array_photo as &$new_array_photo) {
                                    if (!preg_match('/http/', $new_array_photo, $matches)) {
                                        $new_array_photo = BASE_HREF.$path.'/'.$folder.'/others/'.$new_array_photo;
                                    } 
                                }

                                $max = count($array_photo);
                                $per_row = 10;
                                $row = $per_row*(ceil($max/10));
                                $z = 1;

                                for ($i=0; $i<$max; $i++) { 
                                    if ($z%10==0) { 
                                        $style = "width:86px; vertical-align:top; text-align:center; padding:0 0 10px 0;";
                                        if ($z<$max) $close_tr = "</tr><tr>";
                                    }
                                    else if ($z%10 !=0 && $z!=$max) {
                                        $style = "width:86px; vertical-align:top; text-align:center; padding:0 10px 10px 0;";
                                        $close_tr = "";
                                    }
                                    else if ($z%10 !=0 && $z==$max) {
                                        $style = "width:86px; vertical-align:top; text-align:center; padding:0 10px 10px 0;";
                                        $close_tr = "";
                                    }

                                    /* -- Set : Path upload -- */
    //                                if (isset($folder)) {
    //                                    $array_photo[$i] = $folder.$array_photo[$i];
    //                                }

                            ?>
                                <td style="<?=$style?>">
                                    <p style="width:86px; margin:0 auto; text-align:center; background:black; color:yellow; line-height:20px;">รูปที่ <?=$z?></p>
                                    <a href="<?=$array_photo[$i]?>" target="_blank">
                                        <img src="<?=$array_photo[$i]?>" width="86" style="padding:0; padding-top:5px; border:none;" title="คลิกที่รูป เพื่อดูขนาดจริง" class="tooltip" />
                                    </a>

                                    <div class="clear-float"></div>
                                    <input type="checkbox" name="array_photo[]" value="<?=$i?>" />
                                </td>

                            <?php 
                                    echo $close_tr;
                                    $z++;
                                }

                                /* เติม td ให้ครบ tr */
                                if ($i<$row) {
                                    for ($i; $i<=$row; $i++) {
                                        /* Last <td> */
                                        if ($i==$row) echo "<td width='86'></td>";
                                        /* <td> */
                                        else echo "<td width='96'></td>";
                                    }
                                }
                            ?>
                        </tr>
                    </table>
                </div>
                <? } else { ?>
                    <p style="width:100px; margin:20px auto 0 auto; background:black; text-align:center; font:bold 14px tahoma; color:yellow; line-height:30px;">ไม่มีรูปที่ใช้</p>
                <? } ?>        
                
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