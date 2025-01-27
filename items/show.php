<!--Template controlling the individual view for an item or file-->

<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'items show')); ?>
<div id="primary">
      <div class="wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-12">
                        <h1 class="h2"><?php echo metadata('item', array('Dublin Core','Title')); ?></h1>
                    </div>
                </div>
            
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
     
                <div class="row-gutter">
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

                     <!-- The following prints a list of all tags associated with the item -->
                    <?php if (metadata('item','has tags')): ?>
                    <div id="item-tags" class="element">
                        <h3><?php echo __('Tags'); ?></h3>
                        <div class="element-text"><?php echo tag_string('item'); ?></div>
                    </div>
                    <?php endif;?>

                    
                    <div id="more-options" style="margin-top: 2em;">
                        <div class="btn btn-default" style="float:right;"><?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?></div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper-full-width wrapper-background wrapper-light">
            <div style="background-color: #f7f7f7;" class="row content">

                <ul class="item-pagination">
                    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
                     <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
                    <li id="current-collection" style="text-align: center;"> All items in <?php echo link_to_collection_for_item(); ?></li>
                   
                </ul>
            </div>
        </div>

</div> <!-- End of Primary. -->

<style>
.gvsu_media h4,
 { display: none; }


</style>
<script>
jQuery('#more-options').prepend('<div class="btn btn-primary" style="float:left;"><a href="#" id="showmore">Show More Details</a></div>');
jQuery('#dublin-core-format').addClass('moreinfo');
jQuery('#dublin-core-identifier').addClass('moreinfo');
jQuery('#dublin-core-type').addClass('moreinfo');
jQuery('#dublin-core-language').addClass('moreinfo');

jQuery('.moreinfo').hide();

jQuery('#showmore').on('click', function() {
    jQuery('.moreinfo').toggle();
});

</script>

 <?php echo foot(); ?>
