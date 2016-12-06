<?php
$pageTitle = __('Search') . ' ' . __('(%s total)', $total_results);
echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
$searchRecordTypes = get_search_record_types();
?>
<h1><?php echo $pageTitle; ?></h1>

<?php echo search_filters(); ?>
<?php if ($total_results): ?>
<?php echo pagination_links(); ?>
<div id="search-results" class="row">

<?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
<?php foreach (loop('search_texts') as $searchText): ?>
<?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
<?php $recordType = $searchText['record_type']; ?>
<?php set_current_record($recordType, $record); ?>
        <div class="span4 <?php echo strtolower($filter->filter($recordType)); ?>">
            <?php if ($recordImage = record_image($recordType, 'square_thumbnail')): ?>
                    <?php echo link_to($record, 'show', $recordImage, array('class' => 'image')); ?>
            <?php endif; ?>
            <a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a><br />
             <?php echo '<span class="item-type">' . $searchRecordTypes[$recordType] .'</span>'; ?>
        </div>
        <?php endforeach; ?>
   </div>
   <div class="cms-clear">
<?php echo pagination_links(); ?>
<?php else: ?>
<div id="no-results">
    <p><?php echo __('Your search returned no results.');?></p>
</div>
<?php endif; ?>
<script>
jQuery(document).ready(function() {

jQuery('#search-results').find('div.file').each(function() {
    var searchTitle = jQuery(this).find('a:nth-child(2)').text();
    if(searchTitle.indexOf('http') >= 0) {
        // Parse the URL
        var linkParts = searchTitle.split('/');

        // Replace the string
        jQuery(this).find('a:nth-child(2)').text(linkParts[linkParts.length-1].slice(9));
    }
});

});
</script>
<?php echo foot(); ?>
