
    <!-- //////////////////// Body //////////////////// -->
    <div id="body_box">
        
        <!-- Description - Table -->
        <div id="table_description">
            <h1>รายการ Slide</h1>
            <p>ตารางแสดงรายละเอียด Content : <?=SERV_NAME?></p>
        </div>
        <!-- End : Description - Table -->
        
        <!-- Add -->
        <div id="top_box" style="width:960px; margin:10px auto 10px auto;">
            <!-- Button : เพิ่มรายการ -->
            <input type="button" name="bt_add" id="bt_add" value="เพิ่ม Slide" class="button grey add" onclick="redirect('<?=BASE_AM;?>/slide/add_slide')" />
        </div>
        <!-- End : Add -->
        
        <!-- ///////////////////////////////////////////////////// No Data ///////////////////////////////////////////////////// -->
        <?php if (empty($list['data'])) { ?>
        
            <div id="no_content_area">
                <span>ไม่พบข้อมูลคับ</span>
            </div>
        
        <!-- ///////////////////////////////////////////////////// Data ///////////////////////////////////////////////////// -->
        <? } else { ?>    
        
            <!-- ////////// TABLE ////////// -->
            <table width="960" class="tb_style1" id="strip" style="margin-top:20px;">

                <!-- TABLE - top -->
                <thead>
                    <tr>
                        <th width="60"><span>ลำดับที่</span></th>
                        <th width="170"><span>รูป</span></th>
                        <th width="530"><span>รายละเอียด</span></th>
                        <th width="100"><span>สถานะ</span></th>
                        <th width="100"><span>ดำเนินการ</span></th>
                    </tr>
                </thead>

                <!-- TABLE - middle -->
                <tbody>
                    <?php
                        $run = $this->f_lib->row_runNO($_GET['page'], 10);

                        foreach ($list['data'] as $content) {
                            $id = $content['slide_id'];
                            $slide_title = $content['slide_title'];
                            $slide_link = $content['slide_link'];
                            $status_usage = $content['slide_status'];

                            /* -- Check : Status -- */
                            $img_status = $this->status_lib->pattern_open($status_usage);
                            $img_yes = $img_status['img_yes'];
                            $img_no = $img_status['img_no'];
                            
                            /* -- Set : Admin -- */
                            $add_by = $content['admin_add']['admin_user'];
                            $add_date = $content['add_date'];
                            $edit_by = $content['admin_edit']['admin_user'];
                            $edit_date = $content['edit_date'];

                            /* -- thumb -- */
                            $thumb = $this->f_lib->getPath($id, $content['slide_pic'], 'uploads/slide');
                    ?>
                    <tr>
                        <!-- ///////////////////////////////////////////////////// ลำดับที่ ///////////////////////////////////////////////////// -->
                        <td>
                            <span class="bold"><?=$run;?></span>
                        </td>
                    
                        <!-- ///////////////////////////////////////////////////// รูป ///////////////////////////////////////////////////// -->
                        <td class="pad-top-10" style="padding-bottom:10px;">
                            <img src="<?=$thumb;?>" width="150" class="tooltip" />
                        </td>
                    
                        <!-- ///////////////////////////////////////////////////// รายละเอียด ///////////////////////////////////////////////////// -->
                        <td style="vertical-align:top; padding:15px 0 10px 0;">

                            <!-- Title -->
                            <div class="line-detail">
                                <span class="topic" style="width:100px;">Title</span>
                                <span class="colon">:</span>
                                <span class="user_default"><?=$slide_title;?></span>
                            </div>
                            <div class="clear-float"></div>
                            
                            <!-- Link -->
                            <div class="line-detail">
                                <span class="topic" style="width:100px;">Link</span>
                                <span class="colon">:</span>
                                <span>
                                    <a href="<?=$slide_link;?>" class="link">
                                        <?=$slide_link;?>
                                    </a>
                                </span>
                            </div>
                            <div class="clear-float"></div>

                            <!-- Line -->
                            <div class="line"></div>

                            <div class="line-detail">
                                <p style="float:left; width:200px;">
                                    <span class="topic" style="width:100px;">เพิ่มโดย</span>
                                    <span class="colon">:</span>
                                    <span class="user_default" style="font-weight:bold;">
                                        <?=(!empty($add_by)) ? $add_by : 'System';?>
                                    </span>
                                </p>
                                <p style="float:left;">
                                    <span class="topic" style="width:100px;">เพิ่มเมื่อ</span>
                                    <span class="colon">:</span>
                                    <span class="user_default">
                                        <?=$this->f_lib->convertDate($add_date);?>
                                    </span>
                                </p>
                            </div>
                            <div class="clear-float"></div>

                            <div class="line-detail">
                                <p style="float:left; width:200px;">
                                    <span class="topic" style="width:100px;">แก้ไขโดย</span>
                                    <span class="colon">:</span>
                                    <span class="user_default" style="font-weight:bold;">
                                        <?=(!empty($edit_by)) ? $edit_by : '-';?>
                                    </span>
                                </p>
                                <p style="float:left;">
                                    <span class="topic" style="width:100px;">แก้ไขเมื่อ</span>
                                    <span class="colon">:</span>
                                    <span class="user_default">
                                        <?=$this->f_lib->convertDate($edit_date);?>
                                    </span>
                                </p>
                            </div>
                            <div class="clear-float"></div>

                        </td>
                        
                        <!-- ///////////////////////////////////////////////////// สถานะ ///////////////////////////////////////////////////// -->
                        <td id="result_<?php echo $id; ?>" style="font-size:0;">
                            <img src="<?php echo $img_yes; ?>" class="tooltip cursor status_y" onclick="updateStatus('<?php echo $id; ?>', 1, 'slide')" title="เปิด" />
                            <img src="<?php echo $img_no; ?>" class="tooltip cursor status_n" onclick="updateStatus('<?php echo $id; ?>', 0, 'slide')" title="ปิด" />
                        </td>   

                        <!-- ///////////////////////////////////////////////////// ดำเนินการ ///////////////////////////////////////////////////// -->
                        <td style="vertical-align:middle; padding:12px 0;">
                            <!-- Edit -->
                            <div class="icon_box" style="padding-top:0;">
                                <a href="<?=BASE_AM;?>/slide/edit_slide?slide_id=<?=$content['slide_id']?>" title="แก้ไข" class="cursor tooltip edit">: แก้ไข</a>
                            </div>
                            
                            <!-- Delete -->
                            <div class="icon_box">
                                <span title="ลบ" class="cursor tooltip del" onclick="delete_id(<?php echo $id; ?>, 'slide');">: ลบ</span>
                            </div>
                        </td>

                    </tr>
                    <? $run++; } ?>

                </tbody>
            </table>

            <!-- ///////////////////////////////////////////////////// Page Navigation ///////////////////////////////////////////////////// -->
            <?php echo $this->f_lib->checkNav($list['pg']); ?>

        <? } ?>

        </div>
        <!-- //////////////////// End - Body //////////////////// -->
