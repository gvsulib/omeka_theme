
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

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
  
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=EB+Garamond|Lato:400,700">
<link type="text/css" rel="stylesheet" href="https://gvsu.edu/cms4/skeleton/2/files/css/styles.css">

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

  <!--[if lte IE 8]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
<![endif]-->
<script src="https://gvsu.edu/cms4/skeleton/2/files/js/cms4.2.min.js"></script>


</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>

<a href="#page-content" class="sr-only">Skip to main content</a>

 
<div role="banner">
  <a href="#main" class="focus-inverted">Skip to main content</a>
  
  
  <div class="header">
    <div class="row content">
      <div class="col-5 col-sm-12 logo">
        <div class="col-12 col-sm-9">
          <h1>
            <a href="/">
              <!--[if lte IE 8|!IE]>
                <img src="https://gvsu.edu/homepage/files/img/gvsu_logo_white.png" alt="Grand Valley State University Logo" />
              <![endif]-->
              <!--[if gte IE 9|!IE]><!-->
                <img src="https://www.gvsu.edu/homepage/files/img/gvsu_logo_white.svg" alt="Grand Valley State University Logo" onerror="this.onerror=null;this.src='https://www.gvsu.edu/homepage/files/img/gvsu_logo_white.png'">
              <!--<![endif]-->
              <span id="gv-logo-label" class="sr-only" aria-hidden="true">Grand Valley State University</span>
            </a>
          </h1>
        </div>
        <div class="hide-lg hide-md col-sm-3">
          <a id="gv-hamburger" role="button" tabindex="0" aria-label="Menu" aria-controls="cms-navigation-mobile">
            <span class="icon icon-bars" aria-hidden="true"></span>
          </a>
        </div>
      </div>

<!--Topmost navigation items-->
</div>
  <div id="cms-navigation-mobile" class="navigation navigation-mobile hide-print">
    <div class="content">
        <div role="navigation" aria-label="<?php echo __('Mobile Navigation'); ?>">
          <?php echo public_nav_main(); ?>
        </div>
      </div>
    </div>

  </div>
  <div class="site">
    <div class="content">
      <h1 class="h2 serif color-black padding-none margin-none">
        <a class="color-black" href="/">Digital Collections</a>
      </h1>
    </div>
  </div>
  
    <div id="cms-navigation" class="navigation hide-sm hide-print">
      <div class="content">
        <div role="navigation">
          <?php echo public_nav_main(); ?>
        </div>
      </div>
    </div>

    <div class="row row-gutter">
      <div class="col-1 col-sm-12">
        
      </div>
      <div class="col-10 col-sm-12">
        <div id="gvsu-cf_header-search" role="search">
	<!--the solr search form. -->
           <?php $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              if (strstr($link, "solr-search" ) === false) {
              echo search_form();
            } ?>



        </div>
      </div>
    </div>
</div>

<!--Begin page body-->
<div id="main" role="main">
  <div class="content">
    <div id="cms-content">
<script src="https://prod.library.gvsu.edu/labs/alert/alert.js"></script>
