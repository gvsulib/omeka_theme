<?php
if (!empty($formActionUri)):
    $formAttributes['action'] = $formActionUri;
else:
    $formAttributes['action'] = url(array('controller'=>'items',
                                          'action'=>'browse'));
endif;
$formAttributes['method'] = 'GET';
?>
<div class="lib-form">
<form <?php echo tag_attributes($formAttributes); ?>>
<div class="row">
    <div id="search-keywords" class="field span3">
        <?php echo $this->formLabel('keyword-search', __('Search for Keywords')); ?>
        <div class="inputs">
        <?php
            echo $this->formText(
                'search',
                @$_REQUEST['search'],
                array('id' => 'keyword-search')
            );
        ?>
        </div>
    </div>
</div>

<div id="more-toggle"></div>

<div id="more-search-options">
    <div id="search-narrow-by-fields" class="field">
        <div class="row">
            <div style="margin:2em 0;padding:.75em 0;border-top:1px solid #ddd;border-bottom:1px solid #ddd;" class="span3"><?php echo __('Narrow by Specific Fields'); ?>
            </div>
        </div>
        <?php
        // If the form has been submitted, retain the number of search
        // fields used and rebuild the form
        if (!empty($_GET['advanced'])) {
            $search = $_GET['advanced'];
        } else {
            $search = array(array('field'=>'','type'=>'','value'=>''));
        }

        //Here is where we actually build the search form
        foreach ($search as $i => $rows): ?>
                <?php
                //The POST looks like =>
                // advanced[0] =>
                //[field] = 'description'
                //[type] = 'contains'
                //[terms] = 'foobar'
                //etc
                echo '<div class="row">
                        <div class="span4">';
                echo $this->formSelect(
                    "advanced[$i][element_id]",
                    @$rows['element_id'],
                    array(
                        'title' => __("Search Field"),
                        'id' => null,
                        'class' => 'advanced-search-element'
                    ),
                    get_table_options('Element', null, array(
                        'record_types' => array('Item', 'All'),
                        'sort' => 'orderBySet')
                    )
                );
                echo  '</div>
                        <div class="span4">';
                echo $this->formSelect(
                    "advanced[$i][type]",
                    @$rows['type'],
                    array(
                        'title' => __("Search Type"),
                        'id' => null,
                        'class' => 'advanced-search-type'
                    ),
                    label_table_options(array(
                        'contains' => __('contains'),
                        'does not contain' => __('does not contain'),
                        'is exactly' => __('is exactly'),
                        'is empty' => __('is empty'),
                        'is not empty' => __('is not empty'))
                    )
                );
                echo '</div>
                        <div class="span8">';
                echo $this->formText(
                    "advanced[$i][terms]",
                    @$rows['terms'],
                    array(
                        'title' => __("Search Terms"),
                        'id' => null,
                        'class' => 'advanced-search-terms'
                    )
                );
                ?>

                <button type="button" class="btn btn-default" disabled="disabled" style="display: none;"><?php echo __('Remove field'); ?></button>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="cms-clear"></div>
        <button type="button" class="btn btn-primary" style="font-size:.75em;"><?php echo __('Add a Field'); ?></button>
    </div>
 <div class="cms-clear"></div>
   
 <div class="row" style="margin-top:1.5em;padding-top:.75em;border-top: 1px solid #ddd;">
    <div class="field span8">
        <?php echo $this->formLabel('collection-search', __('Search By Collection')); ?>
        <div class="inputs">
        <?php
            echo $this->formSelect(
                'collection',
                @$_REQUEST['collection'],
                array('id' => 'collection-search'),
                get_table_options('Collection')
            );
        ?>
        </div>
    </div>

    <div class="field span4">
        <?php echo $this->formLabel('item-type-search', __('Search By Type')); ?>
        <div class="inputs">
        <?php
            echo $this->formSelect(
                'type',
                @$_REQUEST['type'],
                array('id' => 'item-type-search'),
                get_table_options('ItemType')
            );
        ?>
        </div>
    </div>

    <div class="field span4">
        <?php echo $this->formLabel('tag-search', __('Search By Tags')); ?>
        <div class="inputs">
        <?php
            echo $this->formText('tags', @$_REQUEST['tags'],
                array('size' => '40', 'id' => 'tag-search')
            );
        ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="field span4">
        <?php echo $this->formLabel('featured', __('Featured/Non-Featured')); ?>
        <div class="inputs">
        <?php
            echo $this->formSelect(
                'featured',
                @$_REQUEST['featured'],
                array(),
                label_table_options(array(
                    '1' => __('Only Featured Items'),
                    '0' => __('Only Non-Featured Items')
                ))
            );
        ?>
        </div>
    </div>
    <div class="span4">
      <?php fire_plugin_hook('public_items_search', array('view' => $this)); ?>
    </div>

     <div id="search-by-range" class="field span8" >
        <?php echo $this->formLabel('range', __('Search by a range of ID#s (example: 1-4, 156, 79)')); ?>
        <div class="inputs">
        <?php
            echo $this->formText('range', @$_GET['range'],
                array('size' => '40')
            );
        ?>
        </div>
    </div>
</div>

</div>

<div class="row">
    <div class="span1">
        <?php if (!isset($buttonText)) $buttonText = __('Search for Items'); ?>
        <input type="submit" class="submit" name="submit_search" id="submit_search_advanced" value="<?php echo $buttonText ?>">
    </div>
</div>
</form>
<div class="row" style="margin:2em 0;padding:1em 0;border-bottom:1px solid #ddd;">

<form id="search-form" name="search-form" action="/omeka/search" method="get">
                  <label for="query">Full-Text Search</label>
                  <input name="query" id="query" title="Search" type="text">
                <fieldset>  
                <label><input type="radio" name="query_type" id="query_type-keyword" value="keyword" checked="checked"> Keyword</label><br>
		<label><input type="radio" name="query_type" id="query_type-boolean" value="boolean"> Boolean</label><br>
		<label><input type="radio" name="query_type" id="query_type-exact_match" value="exact_match"> Exact match</label>        </fieldset>
               <br> <input name="submit_search" class="submit" type="submit" value="Search" label="Full-Text Search">
        </form>
	</div>
</div>

<?php echo js_tag('items-search'); ?>
<style>
#gvsu-cf_header-search { display: none !important; }
</style>
<!--script type="text/javascript">
    jQuery(document).ready(function () {
        Omeka.Search.activateSearchButtons();

        
        jQuery('#more-search-options').hide();
        jQuery('#more-toggle').text('Show More Options').click(function() {
            jQuery('#more-search-options').slideToggle(400);

            if(jQuery('#more-toggle').text() == 'Show More Options') {
                 jQuery('#more-toggle').text('Hide Additional Options');
            } else {
                jQuery('#more-toggle').text('Show More Options');
            }
        });

    });
</script-->
