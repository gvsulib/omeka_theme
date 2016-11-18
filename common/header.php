
<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  if (isset($title)) {
      $titleParts[] = strip_formatting($title);
  }
  $titleParts[] = option('site_title');
  ?>
  <title><?php echo implode(' &middot; ', $titleParts); ?></title>
	<meta charset="utf-8">
  <?php if ($description = option('description')): ?>
  <meta name="description" content="<?php echo $description; ?>" />
  <?php endif; ?>		<meta name="keywords" content="archives,digital collections,gvsu,grand valley,library, libraries,research tools">

	<!-- Custom CSS -->
  <?php echo auto_discovery_link_tags(); ?>

  <?php fire_plugin_hook('public_head',array('view'=>$this)); ?>
  
  <link rel="stylesheet" type="text/css" href="//gvsuliblabs.com/libs/fonts/fonts.css" />
  <link rel="stylesheet" type="text/css" href=" //www.gvsu.edu/cms4/skeleton/0/files/css/cms4.0.min[1476194149000].css" />
<!-- Stylesheets -->
  <?php
  queue_css_file(array('iconfonts','style'));

  echo head_css();
  ?>


  <!-- JavaScripts -->
  <?php queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)')); ?>
  <?php queue_js_file('vendor/respond'); ?>
  <?php queue_js_file('vendor/jquery-accessibleMegaMenu'); ?>
  <?php queue_js_file('berlin'); ?>
  <?php queue_js_file('globals'); ?>
  <?php echo head_js(); ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
<!--body class="cms-navigation-horizontal cms-javascript"-->
 <a href="#page-content" class="sr-only">Skip to main content</a>
 <link href="//www.gvsu.edu/includes/topbanner/3/header.min%5B0%5D.css" rel="stylesheet" type="text/css">
 <div id="gvsu-cf_header" class="responsive">
     <div id="gvsu-cf_header-inner">
       <div id="gvsu-cf_header-logo">

           <a href="/"><img src="//www.gvsu.edu/includes/topbanner/3/gvsu_logo.png" alt="Grand Valley State University"></a>

       </div>
       
     </div>
   </div>

   <div id="cms-header-wrapper">
   	<div id="cms-header">
   		<div id="cms-header-inner">



   				<a id="cms-navigation-toggle" href="cms-siteindex-index.htm" onclick="return cmsToggleMenu(document.getElementById('cms-navigation'))">
   					<img src="//www.gvsu.edu/cms4/skeleton/0/files/img/transparent.png" alt="Menu">
   				</a>

   			<h1>
   				<?php echo link_to_home_page(theme_logo()); ?>

   			</h1>
         <div id="cms-navigation" class="cms-navigation" role="navigation">
             <?php
                  echo public_nav_main();
             ?>
         </div>

         <div id="mobile-nav" role="navigation" aria-label="<?php echo __('Mobile Navigation'); ?>">
             <?php
                  echo public_nav_main();
             ?>
         </div>

        <div id="gvsu-cf_header-search">
          
                  <form id="search-form" name="search-form" action="/omeka/search" method="get">
                  <label for="query">Search Digitial Collections</label>  
                  <input name="query" id="query" title="Search" type="text">
                  <a class="advanced-button" href="/omeka/items/search">Advanced Search</a>
                <button name="submit_search" id="submit_search" type="submit" value="Search">Search</button>
        </form>
         
       </div>
   			
   		</div>
   	</div>
   </div>

<a name="page-content"></a>
	<div id="cms-body-wrapper">
		<div id="cms-body">
			<div id="cms-body-inner">
				<div id="cms-body-table">
					<div id="cms-content">

          
         <div class="cms-clear"></div>
