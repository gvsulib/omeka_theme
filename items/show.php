<!--Template controlling the individual view for an item or file-->

<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<div id="primary">
    <h2><?php echo metadata('item', array('Dublin Core','Title')); ?></h2>
	<?php
	$format = metadata('item', array('Dublin Core','Format'));
	$collection = metadata('item', 'Collection Name');
	$is_video = False;
	$is_younglords = False;
	if (str_contains($format, "mp4") or  str_contains($format, "mp3")) {
		$is_video = True;
	}
	if (str_contains($collection, "Young Lords in Lincoln Park")) {
		$is_younglords = True;
	}
	if ($is_younglords and $is_video) {
		echo "<h3><a href='https://gvsu.co1.qualtrics.com/jfe/form/SV_eQbNl5334xJd8PA'>Please complete this brief survey to help GVSU Libraries improve our digital collections!</a></h3>";
	}
        ?>
    <h3><?php echo __('Files'); ?></h3>
    <div id="item-images" class="row row-gutter">
	
         <?php echo files_for_item(array('linkAttributes' => array('target'=>'_blank'), 'imgAttributes' => array('alt' => 'Link to full-size'))); ?>
    </div>
    <div class="cms-clear clear"></div>

    <!-- Items metadata -->
    <div id="item-metadata">
        <?php echo all_element_texts('item'); ?>
    </div>

    

   <?php if(metadata('item','Collection Name')): ?>
      <div id="collection" class="element">
        <h3><?php echo __('Collection'); ?></h3>
        <div class="element-text"><?php echo link_to_collection_for_item(); ?></div>
      </div>
   <?php endif; ?>

     <!-- The following prints a list of all tags associated with the item -->
    <?php if (metadata('item','has tags')): ?>
    <div id="item-tags" class="element">
        <h3><?php echo __('Tags'); ?></h3>
        <div class="element-text"><?php echo tag_string('item'); ?></div>
    </div>
    <?php endif;?>

    <!-- The following prints a citation for this item. -->
    <div id="item-citation" class="element">
        <h3><?php echo __('Citation'); ?></h3>
        <div class="element-text"><?php echo metadata('item','citation',array('no_escape'=>true)); ?></div>
    </div>
       <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>


    <ul class="item-pagination navigation">
        <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
        <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
    </ul>

</div> <!-- End of Primary. -->

 <?php echo foot(); ?>
