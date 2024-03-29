<?php
$collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
?>

<?php echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show')); ?>

<h1><?php echo $collectionTitle; ?></h1>

        <div class="clear"></div>
<div class="row row-gutter" style="margin-top: 1em;">
	<?php if (metadata('collection', 'total_items') > 0): ?>
        <?php foreach (loop('items') as $item): ?>
        <?php $itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title'))); ?>
        <div class="item hentry col-4 col-sm-12">

            <?php if (metadata('item', 'has thumbnail')): ?>
            <div class="item-img">
                  <span class="helper"></span>
                <?php echo link_to_item(item_image('fullsize', array('alt' => $itemTitle))); ?>
            </div>
            <?php endif; ?>
            <h3><?php echo link_to_item($itemTitle, array('class'=>'permalink')); ?></h3>


            <?php if ($text = metadata('item', array('Item Type Metadata', 'Text'), array('snippet'=>250))): ?>
            <div class="item-description">
                <p><?php echo $text; ?></p>
            </div>
            <?php elseif ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
            <div class="item-description">
                <?php echo $description; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p><?php echo __("There are currently no items within this collection."); ?></p>
    <?php endif; ?>
</div>

</div><!-- end collection-items -->
<div class="clear"></div>

    <div class="row"><div class="col-12"><hr />
<span class="btn btn-default"><?php echo link_to_items_browse(__('Browse All Items in %s', $collectionTitle), array('collection' => metadata('collection', 'id'))); ?></span>

<?php echo all_element_texts('collection'); ?>
</div>


<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>

<?php echo foot(); ?>
