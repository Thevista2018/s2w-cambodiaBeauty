    <!-- //////////////////// Body //////////////////// -->
    <div id="body_box">
        
        <!-- Description -->
        <div id="table_description">
            <h1>หน้าแก้ไขบทความ</h1>
            <p>กรุณากรอกข้อมูลให้ครบทุกช่องที่ทำการ * ไว้</p>
        </div>
        <!-- End : Description -->
        
        <!-- =============== Form Box =============== -->
        <div id="form_box">
            
        <!-- Form -->
        <form method="POST" enctype="multipart/form-data" action="">
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="url" value="<?=$url;?>" />
            <input type="hidden" name="article_pic" value="<?=$data['article_pic'];?>" />

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
                                <?php 
                                    if(!empty($data['article_date'])){
                                        $d = explode('-', $data['article_date']);
                                        $article_date = $d[2].'/'.$d[1].'/'.$d[0];
                                        if($article_date == '00/00/0000'){
                                            $article_date = "";
                                        }
                                    }else{
                                        $article_date = date('d/m/Y');
                                    }
                                ?>
                                <input type="text" name="article_date" id="article_date" value="<?=$article_date;?>" class="style_1" style="width: 180px;" />
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
                        
                        <!-- รูป Thumbnail ปัจจุบัน -->
                        <tr>
                            <td width="200" class="td_top">
                                <span class="span_topic">รูป Thumbnail ปัจจุบัน :</span>
                            </td>
                            <td>
                                <?php 
                                    $thumb = $this->f_lib->getPath($data['article_id'], $data['article_pic'], 'uploads/article', 'default.jpg');
                                ?>
                                
                                <img src="<?php echo $thumb; ?>" onerror="handleImgError(this, 'article', 68)" />
                            </td>
                        </tr>
                        <!-- End : รูป Thumbnail ปัจจุบัน -->
                        
                        <!-- เปลี่ยนรูป Thumbnail -->
                        <tr>
                            <td class="td_top">
                                <span class="span_topic">เปลี่ยนรูป Thumbnail :</span>
                            </td>
                            <td>
                                <input type="file" size="35" name="article_pic" />
                                <div class="clear-float"></div>

                                <?php if (!empty($error['article_pic'])) { ?>
                                    <p class="input_error">[<?=$error['article_pic'];?>]</p>
                                <?php } else { ?>
                                    <p class="input_notice">รูปขนาด 205*150 px (ขนาดไฟล์ < 512 KB)</p>
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
                                <select name="article_status" class="style_1_ajax">
                                    <optgroup label="สถานะ">
                                        <?php
                                            unset($status);
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