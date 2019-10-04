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
            
<!-- ==================================================================================== -->                     
            <!-- Title Form -->
            <div class="form_title_box"><p>ข้อมูล Publicities</p></div>
            
            <!-- All Box -->
            <div class="form_all_box">

                <!-- TABLE -->
                <table class="tb_form">
                    <tbody>
                        
                        <!-- รูป -->
                        <tr>
                            <td class="td_top" width="350">
                                &nbsp;
                            </td>
                            <td>
                                <?php $thumb = $this->f_lib->getPathFolder($id, $data['publicities_pic'], 'uploads/publicities'); ?>
                                <img src="<?=$thumb;?>" />
                            </td>
                        </tr>
                        <!-- End : รูป -->
                        
                        <!-- เปลี่ยนรูป -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">เปลี่ยนรูป :</span>
                            </td>
                            <td>
                                <input type="file" size="35" name="publicities_pic" id="publicities_pic" />
                                <div class="clear-float"></div>

                                <?php if (!empty($error['publicities_pic'])) { ?>
                                    <p class="input_error">[<?=$error['publicities_pic']?>]</p>
                                <?php } else { ?>
                                    <p class="input_notice">รูปขนาด 220*194 px (ขนาดไฟล์ < 1024 KB)</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <!-- End : เปลี่ยนรูป -->

                        <!-- Title -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">Title :</span>
                            </td>
                            <td>
                                <input type="text" name="publicities_title" id="publicities_link" value="<?=$data['publicities_title'];?>" class="style_1" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['publicities_title'])) { ?>
                                    <p class="input_error">[<?=$error['publicities_title'];?>]</p>
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
                                <textarea name="publicities_desc" class="style_1"><?=preg_replace('/<br \/>/', '', $data['publicities_desc']);?></textarea>
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['publicities_desc'])) { ?>
                                    <p class="input_error">[<?=$error['publicities_desc']?>]</p>
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
                        
                        <!-- อัพโหลดไฟล์ -->
                        <tr>
                            <td width="350" class="td_top">
                                <span class="span_topic">อัพโหลดไฟล์ :</span>
                            </td>
                            <td>
                                <input type="file" size="35" name="publicities_file" />
                                <div class="clear-float"></div>

                                <?php if (!empty($error['publicities_file'])) { ?>
                                    <p class="input_error">[<?=$error['publicities_file'];?>]</p>
                                <? } else { ?>
                                    <p class="input_notice">ไฟล์ต้องมีนามสกุล .jpg หรือ .pdf เท่านั้น และขนาดไม่เกิน 1 MB</p>
                                <? } ?>
                            </td>
                        </tr>
                        <!-- End : อัพโหลดไฟล์  -->
                        
                        <!-- Status -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">สถานะ :</span>
                            </td>
                            <td>
                                <select name="publicities_status" class="style_1_ajax">
                                    <optgroup label="สถานะ">
                                        <?php
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