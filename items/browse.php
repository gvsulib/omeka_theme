<!--This template controls the screens used for browsing items, as well as the results screen for advanced search-->

<!--Header code-->
<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>


<h2><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h2>

<!-- Code that displays the query string and filters applied -->
<?php echo item_search_filters(); ?>

<!--pagination box that appears in the top and bottom corners-->

<?php echo pagination_links(); ?>


<!--If the search produced results, show them, along with options to sort them.  Browsing is basically identical to executing a very specific search-->
<?php if ($total_results > 0): ?>


<!--code that produces the sorting options on the upper left.  You can sort on any metadata you like by adding $sortLinks options-->
<?php
$sortLinks[__('Title')] = 'Dublin Core,Title';
$sortLinks[__('Creator')] = 'Dublin Core,Creator';
//$sortLinks[__('Date Added')] = 'added';
?>
<div id="sort-links">
    <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
</div>




<?php endif; ?>
 <div class="cms-clear clear"></div>

 <div class="row row-gutter">

<!--Code to display the actual items-->
<?php foreach (loop('items') as $item): ?>
<div class="item record col-4 col-md-6 col-sm-12">
    
    <div class="item-meta">
    <?php if (metadata('item', 'has files')): ?>

	<?php if (metadata('item', array('Dublin Core', 'Title'))) {
		$altText = 'Go to ' . metadata('item', array('Dublin Core', 'Title')) . ' item page';
	} else {
		$altText = 'Go to the page for this item';
	}
	?> 


    <div class="item-img">
    	<span class="helper"></span>
        <?php echo link_to_item(item_image('fullsize', array('alt' => $altText))); ?>
    </div>
    <?php endif; ?>
<h3><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h3>
    <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
    <div class="item-description">
        <?php echo $description; ?>
    </div>
    <?php endif; ?>

    <?php if (metadata('item', 'has tags')): ?>
    <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
        <?php echo tag_string('items'); ?></p>
    </div>
    <?php endif; ?>

    <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>

    </div><!-- end class="item-meta" -->
</div><!-- end class="item hentry" -->
<?php endforeach; ?>
</div>
<div class="cms-clear clear"></div>

<?php echo pagination_links(); ?>
<!--code that produces the links to the atom and other sorts of feeds at the bottom of the page-->
<div id="outputs">
    <span class="outputs-label"><?php echo __('Output Formats'); ?></span>
    <?php echo output_format_list(false); ?>
</div>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

<!--Page footer-->
<?php echo foot(); ?>
