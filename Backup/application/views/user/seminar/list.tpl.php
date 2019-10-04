

<!-- BEGIN CONTENT -->
				<div id="content">
					<div id="content_full">
						<div id="maincontent_publicities">
							<h1><?=$type?></h1><br />
							
							<?php 
                if (count($list['data'])>0) {
                    foreach ($list['data'] as $data) {
                        $thumb = $this->f_lib->getPath($data['seminar_id'], $data['seminar_pic'], 'uploads/seminar', 'default.jpg');
            ?>
							
							<div class="boxnews">
								<a href="<?=BASE_HREF;?>seminar/view/<?=$data['seminar_id'];?>" target="_blank">
								<img src="<?=$thumb;?>" alt="" class="imgborder" />
								</a>
								<h3><?=$data['seminar_title'];?></h3>
								 <p><?=$data['seminar_sub_title'];?><br /><a href="<?=BASE_HREF;?>seminar/view/<?=$data['seminar_id'];?>" target="_blank">readmore...</a></p>
							</div>
							
							<?php }} else { ?>
                ไม่มีข้อมูล
            <?php } ?>

						</div><!-- end maincontent inner -->
					</div><!-- end content left -->
				</div>
			<!-- END CONTENT -->