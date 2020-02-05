<!--code to generate the simple search box.  -->
<?php echo $this->form('search-form', $options['form_attributes']); ?>

    <label for="query" style="">Search all digital collections:</label>
    <?php echo $this->formText('query', $filters['query'], array('title' => __('Search'))); ?>
 <?php echo $this->formButton('submit_search', $options['submit_value'], array('type' => 'submit')); ?>
	<?php //echo link_to_item_search(__('Advanced Search')); ?>
    <div id="advanced-form">




        <?php if (is_admin_theme()): ?>
            <p><a href="<?php echo url('settings/edit-search'); ?>"><?php echo __('Go to search settings to select record types to use.'); ?></a></p>
        <?php endif; ?>

    </div>

        <?php echo $this->form('query_type', $filters['query_type']); ?>


</form>
