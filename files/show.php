<!--pages that displays file records-->

<?php


$fileTitle = metadata('file', 'display_title');

$Item = $file->getItem();

$itemTitle = metadata($Item, array('Dublin Core', 'Title'), array('no_escape' => true, 'no_filter' => true));


?>
<?php echo head(array('title' => $fileTitle, 'bodyclass'=>'files show primary-secondary')); ?>

<h1><?php echo  "File from: " . $itemTitle; ?></h1>

<div id="primary">
    <?php echo file_markup($file, array('imageSize'=>'fullsize')); ?>
    <div class="itemLink" style="margin-top: 20px"><a href="/document/<?php echo metadata('file', 'item_id')?>">Go to <?php echo $itemTitle; ?></a></div>
	
    <h2>About <?php echo $itemTitle; ?></h2>
    <?php $displayFunctionOptions = array('show_element_sets' => 'Dublin Core')  ?>
	<?php echo all_element_texts($Item, $displayFunctionOptions); ?>
</div>
<P>

</P>

 <div id="item-citation" class="element">
        <h3><?php echo __('Citation'); ?></h3>
        <div class="element-text"><?php echo metadata($Item,'citation',array('no_escape'=>true)); ?></div>
    </div>

<aside id="sidebar">
    <div id="format-metadata">
        <h2>About This File</h2>
    
        <div id="file-size" class="element">
            <h3><?php echo __('File Size'); ?></h3>
            <div class="element-text"><?php echo __('%s bytes', metadata('file', 'Size')); ?></div>
        </div>

        <div id="authentication" class="element">
            <h3><?php echo __('Authentication'); ?></h3>
            <div class="element-text"><?php echo metadata('file', 'Authentication'); ?></div>
        </div>
    </div><!-- end format-metadata -->
    
    <div id="type-metadata" class="section">
        <h2><?php echo __('Type Metadata'); ?></h2>
        <div id="mime-type-browser" class="element">
            <h3><?php echo __('Mime Type'); ?></h3>
            <div class="element-text"><?php echo metadata('file', 'MIME Type'); ?></div>
        </div>
        <div id="file-type-os" class="element">
            <h3><?php echo __('File Type / OS'); ?></h3>
            <div class="element-text"><?php echo metadata('file', 'Type OS'); ?></div>
        </div>
    </div><!-- end type-metadata -->
</aside>
<?php echo foot();?>
