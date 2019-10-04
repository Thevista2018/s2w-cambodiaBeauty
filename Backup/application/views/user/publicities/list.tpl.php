

<!-- BEGIN CONTENT -->
				<div id="content">
					<div id="content_full">
						<div id="maincontent_publicities">
							<h1>Publicities</h1><br />
							
							<!-- <?php 
                if (count($list['data'])>0) {
                    foreach ($list['data'] as $data) {
                        $thumb = $this->f_lib->getPath($data['publicities_id'], $data['publicities_pic'], 'uploads/publicities', 'default.jpg');
            ?>
							
							<div class="boxnews">
								<a href="<?=BASE_HREF;?>pub/view/<?=$data['publicities_id'];?>" target="_blank">
								<img src="<?=$thumb;?>" alt="" class="imgborder" />
								</a>
								<h3><?=$data['publicities_title'];?></h3>
								 <p><?=$data['publicities_sub_title'];?><br /><a href="<?=BASE_HREF;?>pub/view/<?=$data['publicities_id'];?>" target="_blank">readmore...</a></p>
							</div>
							
							<?php }} else { ?>
                ไม่มีข้อมูล
            <?php } ?> -->

            <?
            $grupyear = array();
            if(count($list['data']) != 0){
                $key = 0;
                foreach ($list['data'] as $value) {
                    if(!empty($value['publicities_date'])){
                        $d = explode('-', $value['publicities_date']);
                        if($d[0] != '0000'){
                            $grupyear[$key] = $d[0];
                            $key++;
                        }
                    }
                }
                $grupyear = array_unique($grupyear);
                arsort($grupyear);
            }
        ?>
                <div class="container clearfix">
                    <div class="col_full">
                        <ul id="portfolio-filter" class="clearfix">
    
                            <li class="activeFilter"><a href="#" data-filter="*">Show All</a></li>
                            <?  if(count($grupyear) != 0){
                                    foreach ($grupyear as $key => $value) {
                            ?>
                            <li><a href="#" data-filter=".pf-<?=$value;?>">Year : <?=$value;?></a></li>
                            <? }}?>
                        </ul>
    
                        <div id="portfolio-shuffle">
                            <i class="icon-random"></i>
                        </div>
                        
                        <div class="clear"></div>

                        <div id="portfolio" class="portfolio-5 clearfix" data-lightbox="gallery">
                        <? if($list['data'] != 0){ ?>
                        <? foreach($list['data'] as $data){ 
                            $thumb = $this->f_lib->getPath($data['publicities_id'], $data['publicities_pic'], 'uploads/publicities', 'default.jpg');
                        ?>
                        <?php 
                            $d = explode('-', $data['publicities_date']);
                        ?>
                        <article class="portfolio-item pf-<?=$d[0];?>">
                            <div class="portfolio-image">
                                <img class="image_fade img-thumbnail" src="<?=$thumb;?>" >
                            </div>
                            <div class="portfolio-desc">
                                <span style="min-height: 70px;"><a><?=$data['publicities_title'];?></a></span>
                                <!-- <span><?=$data['publicities_desc'];?></span> -->
                                <p><a href="<?=BASE_HREF;?>pub/view/<?=$data['publicities_id'];?>" class="button button-3d button-small button-rounded">Readmore</a></p>
                            </div>
                        </article>
                        <? } ?>
                        <? } ?>
                        </div>
                  
                    
                    </div>
                </div>
                

						</div><!-- end maincontent inner -->
					</div><!-- end content left -->
				</div>
			<!-- END CONTENT -->