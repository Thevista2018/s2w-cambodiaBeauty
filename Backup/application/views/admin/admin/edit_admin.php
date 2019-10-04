
    <!-- //////////////////// Body //////////////////// -->
    <div id="body_box">
        
        <!-- Description -->
        <div id="table_description">
            <h1>หน้าแก้ไข Admin</h1>
            <p>กรุณากรอกข้อมูลให้ครบทุกช่องที่ทำการ * ไว้</p>
        </div>
        <!-- End : Description -->
        
        <!-- =============== Form Box =============== -->
        <div id="form_box">
            
        <!-- Form -->
        <form method="POST" enctype="multipart/form-data" action="">
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="url" value="<?=$url;?>" />
            <input type="hidden" name="admin_avatar" value="<?=$data['admin_avatar'];?>" />
            
<!-- ==================================================================================== -->   
            <!-- Title Form -->
            <div class="form_title_box"><p>ฟอร์มแก้ไขข้อมูล Admin</p></div>
            
            <!-- All Box -->
            <div class="form_all_box">

                <!-- TABLE -->
                <table class="tb_form">
                    <tbody>
                            
                        <!-- Username -->
                        <tr>
                            <td width="350" class="td_top">
                                <span class="span_topic">Username :</span>
                            </td>
                            <td>
                                <input type="text" name="admin_user" id="admin_user" value="<?=$data['admin_user']?>" class="style_1" maxlength="10" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['admin_user'])) { ?>
                                    <p class="input_error">[<?=$error['admin_user']?>]</p>
                                <? } else { ?>
                                    <p class="input_notice">Username ความยาวมากสุด 10 ตัวอักษร</p>
                                <? } ?>
                            </td>
                        </tr>
                        <!-- End : Username -->
                            
                        <!-- Password -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">Password :</span>
                            </td>
                            <td>
                                <input type="password" name="admin_pass" id="admin_pass" value="<?=$data['admin_pass']?>" class="style_1" maxlength="12" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['admin_pass'])) { ?>
                                    <p class="input_error">[<?=$error['admin_pass']?>]</p>
                                <? } else { ?>
                                    <p class="input_notice">Password ความยาว 8-12 ตัวอักษร</p>
                                <? } ?>
                            </td>
                        </tr>
                        <!-- End : Password -->
                            
                        <!-- สถานะ -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">สถานะ :</span>
                            </td>
                            <td>
                                <select name="admin_status" class="style_1_ajax">
                                    <optgroup label="สถานะ">
                                        <?php
                                            if (isset($data['admin_status'])) $status = $data['admin_status'];
                                            else $status = 1;

                                            $arr = array(2=>'Administrator', 1=>'Moderator', 0=>'ปิดใช้งาน');
                                            
                                            foreach ($arr as $k => $v) {
                                                switch ($status) {
                                                    case $k :
                                                        $select[$k] = 'SELECTED';
                                                        break;
                                                }
                                        ?>
                                        <option value="<?=$k?>" <?=$select[$k]?>>- <?=$v?></option>
                                        <? } unset($arr, $select); ?>
                                    </optgroup>
                                </select>
                            </td>
                        </tr>
                        <!-- End : สถานะ -->                            
                            
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