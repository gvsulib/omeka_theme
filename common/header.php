
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

<div role="banner">
  <a href="#main" class="focus-inverted">Skip to main content</a>
  
  
  <div class="header">
    <div class="row content">
      <div class="col-5 col-sm-12 logo">
        <div class="col-12 col-sm-9">
          <h1>
            <a href="/">
              <!--[if lte IE 8|!IE]>
                <img src="/cms4/skeleton/2/files/img/gvsu_logo_white[0].png" alt="Grand Valley State University Logo" width="600" height="53" />
              <![endif]-->
              <!--[if gte IE 9|!IE]><!-->
                <img src="https://www.gvsu.edu/cms4/skeleton/2/files/img/gvsu_logo_white[0].svg" alt="Grand Valley State University Logo" onerror="this.onerror=null;this.src='https://www.gvsu.edu/cms4/skeleton/2/files/img/gvsu_logo_white.png'" width="600" height="53">
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
      <div class="col-7 col-sm-12 quick hide-print" style="">
      </div>
    </div>
  <div id="cms-navigation-mobile" class="navigation navigation-mobile hide-print"><div class="content">
        <div role="navigation" aria-label="Mobile Navigation">
  <ul>
    
          <li class="navigation-sub">
            <a href="https://www.gvsu.edu/library/specialcollections/cms-siteindex-index.htm#0F864938-0BC5-7D2D-5FF164D4329FAC1B" target="_self" aria-label="Collections sub navigation" aria-expanded="false" aria-haspopup="true" aria-controls="cms-navigation-mobile-sub-1" id="cms-navigation-mobile-label-1">
              Collections
              <span class="icon icon-caret-down" aria-hidden="true"></span>
            </a>
            <ul id="cms-navigation-mobile-sub-1">
              
                  <li>
                    <a href="https://www.gvsu.edu/library/specialcollections/search-our-collections-103.htm" target="_self" id="cms-navigation-mobile-label-1-1" aria-labelledby="cms-navigation-mobile-label-1 cms-navigation-mobile-label-1-1">
                      Search the Collections
                    </a>
                  </li>
                
                  <li>
                    <a href="https://www.gvsu.edu/library/specialcollections/rare-books-44.htm" target="_self" id="cms-navigation-mobile-label-1-2" aria-labelledby="cms-navigation-mobile-label-1 cms-navigation-mobile-label-1-2">
                      Rare Books
                    </a>
                  </li>
                
                  <li>
                    <a href="https://www.gvsu.edu/library/specialcollections/special-collections-3.htm" target="_self" id="cms-navigation-mobile-label-1-3" aria-labelledby="cms-navigation-mobile-label-1 cms-navigation-mobile-label-1-3">
                      Special Collections
                    </a>
                  </li>
                
                  <li>
                    <a href="https://www.gvsu.edu/library/specialcollections/university-archives-26.htm" target="_self" id="cms-navigation-mobile-label-1-4" aria-labelledby="cms-navigation-mobile-label-1 cms-navigation-mobile-label-1-4">
                      University Archives
                    </a>
                  </li>
                
                  <li>
                    <a href="https://digitalcollections.library.gvsu.edu/" target="_self" id="cms-navigation-mobile-label-1-5" aria-labelledby="cms-navigation-mobile-label-1 cms-navigation-mobile-label-1-5">
                      Digital Collections
                    </a>
                  </li>
                
            </ul>
          </li>
        
          <li class="navigation-sub">
            <a href="https://www.gvsu.edu/library/specialcollections/cms-siteindex-index.htm#290D8758-F18E-662F-23679AE14EEC2E5F" target="_self" aria-label="Research sub navigation" aria-expanded="false" aria-haspopup="true" aria-controls="cms-navigation-mobile-sub-2" id="cms-navigation-mobile-label-2">
              Research
              <span class="icon icon-caret-down" aria-hidden="true"></span>
            </a>
            <ul id="cms-navigation-mobile-sub-2">
              
                  <li>
                    <a href="https://www.gvsu.edu/library/specialcollections/research-support-105.htm" target="_self" id="cms-navigation-mobile-label-2-1" aria-labelledby="cms-navigation-mobile-label-2 cms-navigation-mobile-label-2-1">
                      Research Guide
                    </a>
                  </li>
                
                  <li>
                    <a href="https://www.gvsu.edu/library/specialcollections/policies-102.htm" target="_self" id="cms-navigation-mobile-label-2-2" aria-labelledby="cms-navigation-mobile-label-2 cms-navigation-mobile-label-2-2">
                      Policies
                    </a>
                  </li>
                
                  <li>
                    <a href="https://www.gvsu.edu/library/specialcollections/visiting-48.htm" target="_self" id="cms-navigation-mobile-label-2-3" aria-labelledby="cms-navigation-mobile-label-2 cms-navigation-mobile-label-2-3">
                      Plan a Visit
                    </a>
                  </li>
                
                  <li>
                    <a href="https://www.gvsu.edu/library/specialcollections/citations-and-copyright-46.htm" target="_self" id="cms-navigation-mobile-label-2-4" aria-labelledby="cms-navigation-mobile-label-2 cms-navigation-mobile-label-2-4">
                      Citations and Copyright
                    </a>
                  </li>
                
                  <li>
                    <a href="https://www.gvsu.edu/library/specialcollections/copies-and-scans-54.htm" target="_self" id="cms-navigation-mobile-label-2-5" aria-labelledby="cms-navigation-mobile-label-2 cms-navigation-mobile-label-2-5">
                      Copies and Scans
                    </a>
                  </li>
                
            </ul>
          </li>
        
          <li>
            <a href="https://www.gvsu.edu/library/specialcollections/instruction-47.htm" target="_self">
              Instruction
            </a>
          </li>
        
          <li class="navigation-sub">
            <a href="https://www.gvsu.edu/library/specialcollections/cms-siteindex-index.htm#DD1AC402-9B2C-EB58-F2C7515112CFF925" target="_self" aria-label="Services sub navigation" aria-expanded="false" aria-haspopup="true" aria-controls="cms-navigation-mobile-sub-3" id="cms-navigation-mobile-label-3">
              Services
              <span class="icon icon-caret-down" aria-hidden="true"></span>
            </a>
            <ul id="cms-navigation-mobile-sub-3">
              
                  <li>
                    <a href="https://www.gvsu.edu/library/specialcollections/university-records-consultations-49.htm" target="_self" id="cms-navigation-mobile-label-3-1" aria-labelledby="cms-navigation-mobile-label-3 cms-navigation-mobile-label-3-1">
                      University Records Consultations
                    </a>
                  </li>
                
                  <li>
                    <a href="https://www.gvsu.edu/library/specialcollections/digital-projects-63.htm" target="_self" id="cms-navigation-mobile-label-3-2" aria-labelledby="cms-navigation-mobile-label-3 cms-navigation-mobile-label-3-2">
                      Digital Project Partnerships
                    </a>
                  </li>
                
                  <li>
                    <a href="https://www.gvsu.edu/library/specialcollections/student-jobs-94.htm" target="_self" id="cms-navigation-mobile-label-3-3" aria-labelledby="cms-navigation-mobile-label-3 cms-navigation-mobile-label-3-3">
                      Student Jobs
                    </a>
                  </li>
                
                  <li>
                    <a href="https://www.gvsu.edu/library/specialcollections/donations-115.htm" target="_self" id="cms-navigation-mobile-label-3-4" aria-labelledby="cms-navigation-mobile-label-3 cms-navigation-mobile-label-3-4">
                      Donations
                    </a>
                  </li>
                
            </ul>
          </li>
        
          <li>
            <a href="https://gvsuspecialcollections.wordpress.com/" target="_self">
              Exhibits
            </a>
          </li>
        
          <li>
            <a href="https://www.gvsu.edu/library/specialcollections/about-us-109.htm" target="_self">
              About Us
            </a>
          </li>
        
  </ul>
</div>
      </div></div></div>
  <div class="site">
    <div class="row content">
      <div class="col-12">
      <h1 class="h2 serif color-black padding-none margin-none">
        <a href="https://www.gvsu.edu/library/specialcollections" class="color-black">
          Special Collections &amp; University Archives
        </a>
      </h1>
    </div>
  </div>
  </div>
  <div class="wrapper-full-width wrapper-background">
  <div style="background-color: #002855;">
    <div class="content" style="padding: 3em 0 3em 0 !important;">
        <div class="row-gutter">    
          <div class="col-4 col-md-6 col-sm-12">
            <h1 class="h3 dc_title"><a href="https://digitalcollections.library.gvsu.edu">Digital Collections</a></h1>
          </div>
          <div class="col-4 col-md-6 col-sm-12">
           <?php echo public_nav_main(); ?>
        </div>
          <div class="col-4 col-md-12 col-sm-12">
           <?php $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
              if (strstr($link, "solr-search" ) === false) {
              echo search_form();
            } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--Begin page body-->
<div id="main" role="main">
    <div id="cms-content"><!--
<script src="https://prod.library.gvsu.edu/labs/alert/alert.js"></script>-->
