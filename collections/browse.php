<?php
$pageTitle = __('Browse Collections');
echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>

<h2><?php echo $pageTitle; ?> <?php echo __('(%s total)', $total_results); ?></h2>

<?php echo pagination_links(); ?>

<?php
$sortLinks[__('Title')] = 'Dublin Core,Title';
$sortLinks[__('Date Added')] = 'added';
?>
<div id="sort-links">
    <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
</div>
 <div class="cms-clear clear"></div>
 <div class="row row-gutter">
<?php foreach (loop('collections') as $collection): ?>

<div class="collection record col-4 col-sm-12">
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

<?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>

<?php echo foot(); ?>
