<?php
$collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
?>

<?php echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show')); ?>
<div class="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <h1><?php echo $collectionTitle; ?></h1>
            </div>
        </div>
    </div>
</div>

 <div class="wrapper">
    <div class="content">
<div class="row-gutter">
	<?php if (metadata('collection', 'total_items') > 0): ?>
        <?php foreach (loop('items') as $item): ?>
        <?php $itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title'))); ?>
        <div class="item hentry col-3 col-md-4 col-sm-6">

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
</div></div>
</div><!-- end collection-items -->
<div class="clear"></div>
<div class="wrapper">
    <div class="content">
    <div class="row">
        <div class="col-12"><hr />
<span class="btn btn-primary"><?php echo link_to_items_browse(__('Browse All Items in %s', $collectionTitle), array('collection' => metadata('collection', 'id'))); ?></span>

<?php echo all_element_texts('collection'); ?>
</div>
</div>
</div>

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>

<?php echo foot(); ?>
