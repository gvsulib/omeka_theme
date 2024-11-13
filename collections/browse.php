<?php
$pageTitle = __('Browse Collections');
echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>

<h2>Browse <?php echo __('(%s total)', $total_results); ?> Collections</h2>

<div id="filter_bar" class="row">
    <?php
$sortLinks[__('Title')] = 'Dublin Core,Title';
$sortLinks[__('Most Recent')] = 'added';
?>
   
    <div class="col-6" id="sort-links">
 <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
    </div>
    <div class="col-6" style="text-align: right;">
        <?php echo pagination_links(); ?>
    </div>
</div>



 <div class="cms-clear clear"></div>
 <div class="row row-gutter">
<?php foreach (loop('collections') as $collection): ?>

<div class="collection record col-3 col-md-4 col-sm-6">
	<!--formulate text for the alt attributes.  all images that are functonal (I.E. links) must have one for screen readers-->
   <?php if (metadata('collection', array('Dublin Core', 'Title'))) { 
	$altText = 'Browse the ' . metadata('collection', array('Dublin Core', 'Title')) . ' collection';
	} else {
	$altText = 'Browse this collection';
	}
   ?>
	 
 <div class="item-img">
        <span class="helper"></span>
    <?php if ($collectionImage = record_image('collection', 'fullsize', array('alt' => $altText))): ?>
        <?php echo link_to_collection($collectionImage, array('class' => 'image')); ?>
    <?php endif; ?>
     </div>
     <h3><?php echo link_to_collection(); ?></h3>
    <div class="collection-meta">

    <?php if (metadata('collection', array('Dublin Core', 'Description'))): ?>
    <div class="collection-description">
        <?php echo text_to_paragraphs(metadata('collection', array('Dublin Core', 'Description'), array('snippet'=>150))); ?>
    </div>
    <?php endif; ?>

    <?php if ($collection->hasContributor()): ?>
    <div class="collection-contributors">
        <p>
        <strong><?php echo __('Contributors'); ?>:</strong>
        <?php echo metadata('collection', array('Dublin Core', 'Contributor'), array('all'=>true, 'delimiter'=>', ')); ?>
        </p>
    </div>
    <?php endif; ?>

    <p class="view-items-link"><?php echo link_to_items_browse(__('View the items in %s', metadata('collection', array('Dublin Core', 'Title'))), array('collection' => metadata('collection', 'id'))); ?></p>

    <?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>

    </div>

</div><!-- end class="collection" -->

<?php endforeach; ?>
</div>

<div class="row">
    <div class="col-9">
    </div>
<div class="col-3" style="text-align: right;">
<?php echo pagination_links(); ?>
</div>
</div>
<?php fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>

<?php echo foot(); ?>
