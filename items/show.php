<!--Template controlling the individual view for an item or file-->

<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<div id="primary">
    <h1 class="h2"><?php echo metadata('item', array('Dublin Core','Title')); ?></h1>
	<?php
	$format = metadata('item', array('Dublin Core','Format'));
	$collection = metadata('item', 'Collection Name');
	$is_video = False;
	$is_younglords = False;
	
	if (strpos($format, "mp4") or strpos($format, "mp3")) {
		$is_video = True;
	}
	
	if ($collection == "Young Lords in Lincoln Park Collection") {
		$is_younglords = True;
	}
	if ($is_younglords and $is_video) {
		echo "<h3><a href='https://gvsu.co1.qualtrics.com/jfe/form/SV_eQbNl5334xJd8PA'>Please complete this brief survey to help GVSU Libraries improve our digital collections!</a></h3>";
	}
        ?>
        <div class="wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-6 col-sm-12">
                        <div id="item-images">
	
                             <?php echo files_for_item(array('linkAttributes' => array('target'=>'_blank'), 'imgAttributes' => array('alt' => 'Link to full-size'))); ?>

                             <!-- The following prints a citation for this item. -->
                        </div>
                        <div id="item-citation" class="element">
                            <h1 class="h3"><?php echo __('Citation'); ?></h1>
                                <div class="element-text"><?php echo metadata('item','citation',array('no_escape'=>true)); ?></div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-12">
   
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

                    
                    <div id="more-options">
                        <div class="btn btn-primary" style="float:left;"><a href="#">Show More Details</a></div>
                        <div class="btn btn-default" style="float:right;"><?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?></div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper-full-width wrapper-background wrapper-light">
            <div class="background-color: #f7f7f7;">

                <ul class="item-pagination navigation">
                    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
                    <li id="current-collection"><?php echo link_to_collection_for_item(); ?></li>
                    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
                </ul>
            </div>
        </div>

</div> <!-- End of Primary. -->

 <?php echo foot(); ?>
