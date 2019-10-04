
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content_full">
        <div id="maincontent_inner">
            <h1>News</h1>
            <br />
        </div><!-- end maincontent inner -->
        
        <div style="width:920px; margin:0 auto;">
            <!-- <?php 
                if (count($list['data'])>0) {
                    foreach ($list['data'] as $data) {

                        if (is_file(PATH_UPLOADS."/article/{$data['article_pic']}")) $thumb = BASE_HREF."uploads/article/{$data['article_pic']}";
                        else $thumb =  BASE_HREF."uploads/article/no_pic_220.jpg";
            ?>
            <div class="boxmenu" style="float:left; height:300px; margin-right:0;">
                <a href="<?=BASE_HREF;?>article/view/<?=$data['article_id'];?>">
                    <img src="<?=$thumb;?>" alt="" class="imgborder" />
                </a>
                
                <h3><?=$data['article_title'];?></h3>
                <p><?=$data['article_sub_title'];?></p>
                
                <p><a href="<?=BASE_HREF;?>article/view/<?=$data['article_id'];?>">readmore...</a></p>
            </div>
            
            <?php }} else { ?>
                Information will be available soon.
            <?php } ?>
                
            <div style="clear:both;"></div> -->
            
            <?
            $grupyear = array();
            if(count($list['data']) != 0){
                $key = 0;
                foreach ($list['data'] as $value) {
                    if(!empty($value['article_date'])){
                        $d = explode('-', $value['article_date']);
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
                            if (is_file(PATH_UPLOADS."/article/{$data['article_pic']}")) $thumb = BASE_HREF."uploads/article/{$data['article_pic']}";
                            else $thumb =  BASE_HREF."uploads/article/no_pic_220.jpg";
                        ?>
                        <?php 
                            $d = explode('-', $data['article_date']);
                        ?>
                        <article class="portfolio-item pf-<?=$d[0];?>">
                            <div class="portfolio-image">
                                <img class="image_fade img-thumbnail" src="<?=$thumb;?>" >
                            </div>
                            <div class="portfolio-desc">
                                <span style="min-height: 70px;"><a><?=$data['article_title'];?></a></span>
                                <span><?=$data['article_sub_title'];?></span>
                                <p><a href="<?=BASE_HREF;?>article/view/<?=$data['article_id'];?>" class="button button-3d button-small button-rounded">Readmore</a></p>
                            </div>
                        </article>
                        <? } ?>
                        <? } ?>
                        </div>
                  
                    
                    </div>
                </div>

        </div>
            
        
    </div><!-- end content left -->
</div>
<!-- END CONTENT -->