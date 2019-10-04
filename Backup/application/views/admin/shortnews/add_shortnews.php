    <!-- //////////////////// Body //////////////////// -->
    <div id="body_box">
        
        <!-- Description -->
        <div id="table_description">
            <h1>หน้าเพิ่ม Shortnews</h1>
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
            <div class="form_title_box"><p>ข้อมูล</p></div>
            
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
                                <input type="text" name="short_title" value="<?=$data['short_title']?>" class="style_1" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['short_title'])) { ?>
                                    <p class="input_error">[<?=$error['short_title']?>]</p>
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
                                <input type="text" name="short_link" value="<?=$data['short_link']?>" class="style_1" />
                                <p class="star">*</p>

                                <div class="clear-float"></div>

                                <?php if (!empty($error['short_link'])) { ?>
                                    <p class="input_error">[<?=$error['short_link']?>]</p>
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
                                <select name="short_status" class="style_1_ajax">
                                    <optgroup label="สถานะ">
                                        <?php
                                            if (isset($data['short_status'])) $status = $data['short_status'];
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