
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content_full">
        <div id="maincontent_inner" style="width:100%;">
            <h1>GALLERY : <?=$data['gallery_title'];?></h1>
            <!--<p>epudiandae sint et molestiae non recusandae.</p>-->
            <br />
        </div><!-- end maincontent inner -->
        
	<?
		/* -- Pic -- */
		$thumb = $this->f_lib->getPathFolder($data['gallery_id'], $data['gallery_pic'], 'uploads/gallery', 5, null, 'default.jpg');
		$large = preg_replace('/thumb/', 'large', $thumb);
		
		/* -- Pic (Other) -- */
		$arr_pic_other = unserialize($data['gallery_pic_other']);
    ?>
            
	<?
		unset($large, $thumb);
		$folder = 'ID_'.$this->f_lib->fill_pad($data['gallery_id'], 5, 0); 
		$path = 'uploads/gallery';
	?>
                
    <ul class="gallery clearfix" id="gthumb">
	<?
     if (is_array($arr_pic_other)) {
		foreach ($arr_pic_other as &$thumb) {
			if (!preg_match('/http/', $thumb, $matches)) {
				$thumb = BASE_HREF.$path.'/'.$folder.'/others/'.$thumb;
			}
			$large = preg_replace('/thumb/', 'large', $thumb);
	?>
      		<li><a href="<?=$large;?>" rel="prettyPhoto[gallery1]"><img src="<?=$thumb;?>" alt="" /></a></li>
	<? 
		}
	}
	 ?>
    </ul>
    
    
    
                
                

            
        
    </div><!-- end content left -->
</div>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$("area[rel^='prettyPhoto']").prettyPhoto();
		
		$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
		$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});

//		$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
//			custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
//			changepicturecallback: function(){ initialize(); }
//		});
//
//		$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
//			custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
//			changepicturecallback: function(){ _bsap.exec(); }
//		});
	});
</script>
<!-- END CONTENT -->