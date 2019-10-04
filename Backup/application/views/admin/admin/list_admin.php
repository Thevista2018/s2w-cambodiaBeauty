
    <!-- //////////////////// Body //////////////////// -->
    <div id="body_box">
        
        <!-- Description - Table -->
        <div id="table_description">
            <h1>รายการ Admin</h1>
            <p>ตารางแสดงรายละเอียด Content : <?=SERV_NAME?></p>
        </div>
        <!-- End : Description - Table -->
        
        <!-- Add -->
        <div id="top_box" style="width:960px; margin:10px auto;">
            <!-- Button : เพิ่มรายการ -->
            <input type="button" name="bt_add" id="bt_add" value="เพิ่ม Admin" class="button grey add" onclick="redirect('<?=BASE_AM;?>/admin/add_admin')" />
        </div>
        <!-- End : Add -->
        
        <!-- ///////////////////////////////////////////////////// No Data ///////////////////////////////////////////////////// -->
        <?php
            if (empty($list['data'])) { ?>
        
                <div id="no_content_area">
                    <span>ไม่พบข้อมูลคับ</span>
                </div>
        
        <!-- ///////////////////////////////////////////////////// Data ///////////////////////////////////////////////////// -->
        <?php } else { ?>    
        
            <!-- ////////// TABLE ////////// -->
            <table width="960" class="tb_style1" id="strip">

                <!-- TABLE - top -->
                <thead>
                    <tr>
                        <th width="60"><span>ลำดับที่</span></th>
                        <th width="120"><span>รูปประจำตัว</span></th>
                        <th width="580"><span>รายชื่อ Admin</span></th>
                        <th width="100"><span>เปลี่ยนสถานะ</span></th>
                        <th width="100"><span>ดำเนินการ</span></th>
                    </tr>
                </thead>
            
                <!-- TABLE - middle -->
                <tbody>
                    <?php
                        $run = $this->f_lib->row_runNO($_GET['page'], 10);

                        foreach ($list['data'] as $content) {
                            $id = $content['admin_id'];
                            $admin_user = $content['admin_user'];
                            $status_usage = $content['admin_status'];

                            /* -- Check : Status -- */
                            if ($status_usage == 2) {
                                $img_admin = BASE_HREF.'/images/admin/icons/admin.png';
                                $img_mod = BASE_HREF.'/images/admin/icons/moderator_grey.png';
                                $img_no = BASE_HREF.'/images/admin/icons/status_close_grey.png';
                            } elseif ($status_usage == 1) {
                                $img_admin = BASE_HREF.'/images/admin/icons/admin_grey.png';
                                $img_mod = BASE_HREF.'/images/admin/icons/moderator.png';
                                $img_no = BASE_HREF.'/images/admin/icons/status_close_grey.png';
                            } else {
                                $img_admin = BASE_HREF.'/images/admin/icons/admin_grey.png';
                                $img_mod = BASE_HREF.'/images/admin/icons/moderator_grey.png';
                                $img_no = BASE_HREF.'/images/admin/icons/status_close.png';
                            }

                            /* -- Set : Admin -- */
                            $add_by = $content['admin_add']['admin_user'];
                            $add_date = $content['add_date'];
                            $edit_by = $content['admin_edit']['admin_user'];
                            $edit_date = $content['edit_date'];
                    ?>
                    <tr>
                        <!-- ///////////////////////////////////////////////////// ลำดับที่ ///////////////////////////////////////////////////// -->
                        <td>
                            <span class="bold"><?=$run?></span>
                        </td>

                        <!-- ///////////////////////////////////////////////////// รูปประจำตัว ///////////////////////////////////////////////////// -->
                        <td class="pad-top-10" style="padding-bottom:10px;">
                            <a href="<?php echo BASE_AM; ?>admin/edit_admin?id=<?php echo $id; ?>" style="display:block;">
                                <img src="<?php echo $thumb; ?>" title="<?php echo $admin_user; ?>" class="tooltip" onerror="handleImgError(this, 'admin', 68)" />
                            </a>
                        </td>
                            
                        <!-- ///////////////////////////////////////////////////// รายชื่อ Admin ///////////////////////////////////////////////////// -->
                        <td class="pad-top-10" style="padding-bottom:10px;">

                            <div class="line-detail">
                                <span class="topic">Admin</span>
                                <span class="colon">:</span>
                                <span class="user_code"><?php echo $admin_user; ?></span>
                            </div>
                            <div class="clear-float"></div>

                            <!-- Line -->
                            <div class="line"></div>

                            <div class="line-detail">
                                <p style="float:left; width:160px;">
                                    <span class="topic">เพิ่มโดย</span>
                                    <span class="colon">:</span>
                                    <span class="user_default" style="font-weight:bold;">
                                        <?=(!empty($add_by)) ? $add_by : 'System';?>
                                    </span>
                                </p>
                                <p style="float:left;">
                                    <span class="topic">เพิ่มเมื่อ</span>
                                    <span class="colon">:</span>
                                    <span class="user_default">
                                        <?=$this->f_lib->convertDate($add_date);?>
                                    </span>
                                </p>
                            </div>
                            <div class="clear-float"></div>

                            <div class="line-detail">
                                <p style="float:left; width:160px;">
                                    <span class="topic">แก้ไขโดย</span>
                                    <span class="colon">:</span>
                                    <span class="user_default" style="font-weight:bold;">
                                        <?=(!empty($edit_by)) ? $edit_by : '-';?>
                                    </span>
                                </p>
                                <p style="float:left;">
                                    <span class="topic">แก้ไขเมื่อ</span>
                                    <span class="colon">:</span>
                                    <span class="user_default">
                                        <?=$this->f_lib->convertDate($edit_date);?>
                                    </span>
                                </p>
                            </div>
                            <div class="clear-float"></div>

                        </td>

                        <!-- ///////////////////////////////////////////////////// สถานะ ///////////////////////////////////////////////////// -->
                        <td id="result_<?=$id;?>" style="font-size:0;">
                            <?php if (ADMIN_STATUS==2 && ADMIN_ID==$id) { ?>
                                <img src="<?=$img_admin;?>" class="tooltip cursor status_a" title="Admin" style="cursor:default; display:block; margin:0 auto 5px auto;" />
                            <?php } elseif (ADMIN_STATUS==2) { ?>
                                <img src="<?=$img_admin;?>" class="tooltip cursor status_a" onclick="updateStatus('<?=$id;?>', 2, 'admin')" title="Admin" style="display:block; margin:0 auto 5px auto;" />
                                <img src="<?=$img_mod;?>" class="tooltip cursor status_m" onclick="updateStatus('<?=$id;?>', 1, 'admin')" title="Mod" style="display:block; margin:0 auto 5px auto;" />
                                <img src="<?=$img_no;?>" class="tooltip cursor status_n" onclick="updateStatus('<?=$id;?>', 0, 'admin')" title="ปิดใช้งาน" style="display:block; margin:0 auto;" />
                            <?php } ?>
                        </td>
                    
                        <!-- ///////////////////////////////////////////////////// ทำการ ///////////////////////////////////////////////////// -->
                        <td style="vertical-align:middle; padding:12px 0;">
                            <!-- Edit -->
                            <div class="icon_box" style="padding-top:0;">
                                <a href="<?php echo BASE_AM; ?>/admin/edit_admin?admin_id=<?=$id;?>" title="แก้ไข" class="cursor tooltip edit">: แก้ไข</a>
                            </div>

                            <!-- Delete -->
                            <div class="icon_box">
                                <span title="ลบ" class="cursor tooltip del" onclick="delete_id(<?=$id;?>, 'admin');">: ลบ</span>
                            </div>
                        </td>
                    
                    </tr>
                    <? $run++; } ?>

                </tbody>
            </table>
        
            <!-- ///////////////////////////////////////////////////// Page Navigation ///////////////////////////////////////////////////// -->
            <?php echo $this->f_lib->checkNav($list['pg']); ?>
            
        <?php } ?>

    </div>
    <!-- //////////////////// End - Body //////////////////// -->
