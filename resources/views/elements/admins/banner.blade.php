   <style>
  .gallery { float: left; width: 60%; min-height: 12em; }
  .gallery.custom-state-active { background: #eee; }
  .gallery li { float: left; width: 96px; padding: 0.4em; margin: 0 0.4em 0.4em 0; text-align: center; }
  .gallery li h5 { margin: 0 0 0.4em; cursor: move; }
  .gallery li a { float: right; }
  .gallery li a.ui-icon-zoomin { float: left; }
  .gallery li img { width: 100%; cursor: move; }
 
  .trash { float: right; width: 32%; min-height: 18em; padding: 1%; }
  .trash h4 { line-height: 16px; margin: 0 0 0.4em; }
  .trash h4 .ui-icon { float: left; }
  .trash .gallery h5 { display: none; }
  </style>
<div class="ui-widget ui-helper-clearfix">
<ul id="gallery_<?php echo $slug; ?>" class="gallery ui-helper-reset ui-helper-clearfix">
  <?php foreach($data['selected_list'] as $banner) { ?>  
    <li id="<?php echo $banner[$head_type]['id']; ?>" class="ui-widget-content ui-corner-tr">
      <h5 class="ui-widget-header"><?php echo $banner[$head_type]['name']; ?></h5>
	 <?php 
		$imgPath =  SITE_LINK . "/img/".$img_type."/thumb_".$banner[$head_type]['image'];
		$flag = true;
		if(!file_exists($imgPath)){
			$imgPath = SITE_LINK . "/img/small-default.jpg";
			$flag = false;
		}
	 ?>	
      <img src="<?php echo $imgPath; ?>" alt="<?php echo $banner[$head_type]['name']; ?>" width="96" height="72">
      <a href="<?php echo ($flag) ? SITE_LINK . "/img/".$img_type."/".$banner[$head_type]['image'] : 'javascript:void(0);' ; ?>" title="View larger image" class="ui-icon ui-icon-zoomin">View larger</a>
     
    <a href="javascript:void(0);" title="Delete this image" class="ui-icon ui-icon-trash">Delete image</a>
    </li>
  <?php 
       }
  ?>
</ul>
 
<div id="trash_<?php echo $slug; ?>" class="trash ui-widget-content ui-state-default">
  <h4 class="ui-widget-header"><span class="ui-icon ui-icon-trash">Trash</span> Trash</h4>
  <ul class="gallery ui-helper-reset">
    <?php foreach($data['unselected_list'] as $banner) { ?>
        <li class="ui-widget-content ui-corner-tr ui-sortable-handle" id="<?php echo $banner[$head_type]['id']; ?>" style="display: list-item; width: 48px;">
          <h5 class="ui-widget-header">test</h5>
         <img width="96" height="72" alt="<?php echo $banner[$head_type]['name']; ?>" src="<?php echo SITE_LINK . "/img/".$img_type."/thumb_".$banner[$head_type]['image']; ?>" style="display: inline-block; height: 36px;">
         <a class="ui-icon ui-icon-zoomin" title="View larger image" href="<?php echo SITE_LINK . "/img/".$img_type."/".$banner[$head_type]['image']; ?>">View larger</a>    
         <a class="ui-icon ui-icon-refresh" title="Recycle this image" href="link/to/recycle/script/when/we/have/js/off">Recycle image</a>
        </li>
     <?php } ?>
  </ul>
</div>
 
</div>