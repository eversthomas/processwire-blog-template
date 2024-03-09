<?php namespace ProcessWire;

// Optional main output file, called after rendering page’s template file. 
// This is defined by $config->appendTemplateFile in /site/config.php, and
// is typically used to define and output markup common among most pages.
// 	
// When the Markup Regions feature is used, template files can prepend, append,
// replace or delete any element defined here that has an "id" attribute. 
// https://processwire.com/docs/front-end/output/markup-regions/
	
/** @var Page $page */
/** @var Pages $pages */
/** @var Config $config */
	
$home = $pages->get('/'); /** @var HomePage $home */

?><!DOCTYPE html>
<html lang="de">
	<head id="html-head">
	    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $page->title; ?></title>
        <meta name="description" content="A simple HTML5 Template for new projects.">
        <meta name="author" content="SitePoint">
        
        <link rel="icon" href="/favicon.ico">
        <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates; ?>styles/main.css" />
	</head>
	<body id="html-body">
	    
	    <header>
	        <h1 id="headline">simple blog template</h1>
	        <nav id="topnav">
			    <?php include("_navigation.php"); ?>
		    </nav>
	    </header>
	    
	    <main id="content">
			Default content
		</main>
	    
	    <aside>
	        <?php include('_sidebar.php'); ?>
	    </aside>
	    
	    <footer>
	        <div class="footer-inner">
	            <p>footer</p>
	        </div>
	        
	    </footer>
	    
	    <!-- Scripts -->
	    
		<script src="<?php echo $config->urls->templates; ?>scripts/main.js"></script>
	    
	</body>
</html>
