
<!DOCTYPE html>

<!--the header code that's loaded into every page-->
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>" xmlns="http://www.w3.org/1999/xhtml">
<head>

<!--Google analytics tracking script-->	
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-2700108-22', 'auto');
  ga('send', 'pageview');

</script>

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
  
  <link rel="stylesheet" type="text/css" href="https://prod.library.gvsu.edu/libs/fonts/fonts.css" />
  <link rel="stylesheet" type="text/css" href="https://www.gvsu.edu/cms4/skeleton/0/files/css/cms4.0.min[1476194149000].css" />

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

<a href="#page-content" class="sr-only">Skip to main content</a>

<link href="https://www.gvsu.edu/includes/topbanner/3/header.min%5B0%5D.css" rel="stylesheet" type="text/css">
 
<div id="gvsu-cf_header" class="responsive" role="banner">
	<div id="gvsu-cf_header-inner">
       		<div id="gvsu-cf_header-logo">

           	<a href="https://www.gvsu.edu"><img src="https://www.gvsu.edu/includes/topbanner/3/gvsu_logo.png" alt="Grand Valley State University"></a>

       		</div>
       
     	</div>
</div>
<!--Topmost navigation items-->
<div id="cms-header-wrapper" role="header">
<div id="cms-header">
		<div id="cms-header-inner">

		<a id="cms-navigation-toggle" href="cms-siteindex-index.htm" onclick="return cmsToggleMenu(document.getElementById('cms-navigation'))">
   		<img src="https://www.gvsu.edu/cms4/skeleton/0/files/img/transparent.png" alt="Menu"></a>

   		<h1><?php echo link_to_home_page(theme_logo()); ?></h1>
         	<div id="cms-navigation" class="cms-navigation" role="navigation">
             	<?php echo public_nav_main(); ?>
         	</div>

         	<div id="mobile-nav" role="navigation" aria-label="<?php echo __('Mobile Navigation'); ?>">
             	<?php echo public_nav_main(); ?>
         	</div>

        	<div id="gvsu-cf_header-search" role="search">
         	<!--the simple search form.  Usually this is generated automatically by a snippet of PHP code (simple_search()) but we wanted to customize it, so we have actually pasted the search form code itself into the header.  simple_search is, thus, not being used in this theme.-->
		<form id="search-form" name="search-form" action="/search" method="get">
                
		<fieldset>
		<legend>
		Search Digital Collections</legend>
		<a href="/items/search" ID="advanced-search-link">Advanced Search</a>
                <input name="query" id="query" title="Search" type="text">
        	     <button name="submit_search" id="submit_search" type="submit" value="Search">Search</button> 
		<span role="radiogroup"><span style="font-size: .8em">Choose type of search:</span>
		
                <label for="query_type-keyword"><input type="radio" name="query_type" id="query_type-keyword" value="keyword" checked="checked"> Keyword</label>
                <label for="query_type-boolean"><input type="radio" name="query_type" id="query_type-boolean" value="boolean"> Boolean</label>
                <label for="query_type-exact_match"><input type="radio" name="query_type" id="query_type-exact_match" value="exact_match"> Exact match</label>       
		</span>
		</fieldset>
        	</form>

 
       		</div>
   			
   	</div>
   </div>
</div>
<!--Begin page body-->
<a name="page-content"></a>
	<div id="cms-body-wrapper">
		<div id="cms-body" role="main">
			<div id="cms-body-inner">
				<div id="cms-body-table">
					<div id="cms-content">

          
         <div class="cms-clear"></div>
