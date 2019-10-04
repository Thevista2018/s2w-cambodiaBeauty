<!-- BEGIN CONTENT -->
				<div id="content">
					<div id="content_full">
						<div id="maincontent_publicities">
							<h1>Downloads</h1><br />
							<?php
                if (count($list['data'])>0) {
                    foreach ($list['data'] as $data) {
                        $thumb = $this->f_lib->getPathFolder($data['download_id'], $data['download_pic'], 'uploads/download');
            ?>
							<div class="boxmenu">
								 <a href="<?=BASE_HREF;?>uploads/download/<?=$data['download_file'];?>" target="_blank">
								<img src="<?=$thumb;?>" alt="" class="imgborder" />
								</a>
								<h3><?=$data['download_title'];?></h3>
								 <p><?=$data['download_desc'];?><br />
								 <a href="<?=BASE_HREF;?>uploads/download/<?=$data['download_file'];?>" target="_blank">Download Now...</a></p>
							</div>
							<?php }} else { ?>
               Information will be available soon.
            <?php } ?>
            <div style="clear:both;"></div>
						</div><!-- end maincontent inner -->
					</div><!-- end content left -->
				</div>
			<!-- END CONTENT -->

