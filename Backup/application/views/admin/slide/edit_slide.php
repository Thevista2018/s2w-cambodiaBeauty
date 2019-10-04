
    <!-- //////////////////// Body //////////////////// -->
    <div id="body_box">
        
        <!-- Description -->
        <div id="table_description">
            <h1>หน้าแก้ไข Slide</h1>
            <p>กรุณากรอกข้อมูลให้ครบทุกช่องที่ทำการ * ไว้</p>
        </div>
        
        <!-- =============== Form Box =============== -->
        <div id="form_box">
            
        <!-- Form -->
        <form method="POST" enctype="multipart/form-data" action="">
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="url" value="<?=$url;?>" />
            <input type="hidden" name="slide_pic" value="<?=$data['slide_pic'];?>" />
                
<!-- ==================================================================================== -->                 
            <!-- Title Form -->
            <div class="form_title_box"><p>รายละเอียด Slide</p></div>
            
            <!-- All Box -->
            <div class="form_all_box">
                
                <!-- TABLE -->
                <table width="900" class="tb_form" style="margin-top:20px;">
                    <tbody>
                            
                        <!-- รูป -->
                        <tr>
                            <td class="td_top" width="350">
                                &nbsp;
                            </td>
                            <td>
                                <?php $thumb = $this->f_lib->getPath($id, $data['slide_pic'], 'uploads/slide'); ?>
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
                                <input type="file" size="35" name="slide_pic" id="slide_pic" />
                                <div class="clear-float"></div>

                                <?php if (!empty($error['slide_pic'])) { ?>
                                    <p class="input_error">[<?=$error['slide_pic']?>]</p>
                                <? } else { ?>
                                    <p class="input_notice">รูปขนาด 620*349 px (ขนาดไฟล์ < 1024 KB)</p>
                                <? } ?>
                            </td>
                        </tr>
                        <!-- End : เปลี่ยนรูป --> 
                        
                        <!-- Title -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">Title :</span>
                            </td>
                            <td>
                                <input type="text" name="slide_title" id="slide_link" value="<?=$data['slide_title'];?>" class="style_1" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['slide_title'])) { ?>
                                    <p class="input_error">[<?=$error['slide_title'];?>]</p>
                                <? } ?>
                            </td>
                        </tr>
                        <!-- End : Title -->
                            
                        <!-- Link -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">Link :</span>
                            </td>
                            <td>
                                <input type="text" name="slide_link" id="slide_link" value="<?=$data['slide_link'];?>" class="style_1" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['slide_link'])) { ?>
                                    <p class="input_error">[<?=$error['slide_link'];?>]</p>
                                <? } ?>
                            </td>
                        </tr>
                        <!-- End : Link -->
                        
                        <!-- Status -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">สถานะ :</span>
                            </td>
                            <td>
                                <select name="slide_status" class="style_1_ajax">
                                    <optgroup label="สถานะ">
                                        <?php
                                            if (isset($data['slide_status'])) $status = $data['slide_status'];
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