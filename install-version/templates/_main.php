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
		<title><?= $page->seo_title ? $page->seo_title : $page->title; ?></title>
		<meta name="description" content="<?= $page->seo_description ? $page->seo_description : 'Demokratie verstehen mit Witz und Verstand: Auf demokratiefoerderung.info lernst du, antidemokratische Tricks zu entlarven und mit Humor zu kontern. Satirisch, provokativ und direkt anwendbar!'; ?>">
		<meta name="author" content="Thomas Evers">
		
		<link rel="icon" href="/favicon.ico">
		<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates; ?>styles/main.css" />

		<!-- Open Graph Tags -->
        	<meta property="og:title" content="<?= $page->seo_title ? $page->seo_title : $page->title; ?>">
        	<meta property="og:description" content="<?= $page->seo_description ? $page->seo_description : 'Demokratie verstehen mit Witz und Verstand: Auf demokratiefoerderung.info lernst du, antidemokratische Tricks zu entlarven und mit Humor zu kontern. Satirisch, provokativ und direkt anwendbar!'; ?>">
        	<meta property="og:image" content="<?= $page->card_image ? $page->card_image->httpUrl : '/site/templates/images/default-image.jpg'; ?>">
        	<meta property="og:url" content="<?= $page->httpUrl; ?>">
        	<meta property="og:type" content="website">
        	<meta property="og:locale" content="de_DE">
        
        	<!-- Twitter Cards -->
        	<meta name="twitter:card" content="summary_large_image">
        	<meta name="twitter:title" content="<?= $page->seo_title ? $page->seo_title : $page->title; ?>">
        	<meta name="twitter:description" content="<?= $page->seo_description ? $page->seo_description : 'Demokratie verstehen mit Witz und Verstand: Auf demokratiefoerderung.info lernst du, antidemokratische Tricks zu entlarven und mit Humor zu kontern. Satirisch, provokativ und direkt anwendbar!'; ?>">
        	<meta name="twitter:image" content="<?= $page->card_image ? $page->card_image->httpUrl : '/site/templates/images/default-image.jpg'; ?>">

        	<link rel="canonical" href="<?= preg_replace('/^https?:\/\/www\./', 'https://', $page->httpUrl); ?>">
    
        	<script type="application/ld+json">
            	{
              		"@context": "https://schema.org",
              		"@type": "WebPage",
              		"name": "<?= $page->seo_title ? $page->seo_title : $page->title; ?>",
              		"description": "<?= $page->seo_description ? $page->seo_description : 'Standardbeschreibung der Seite.'; ?>",
              		"url": "<?= $page->httpUrl; ?>",
              		"publisher": {
                		"@type": "Organization",
                		"name": "<?= $page->title; ?>",
                		"logo": {
                  			"@type": "ImageObject",
                  			"url": "<?= $pages->get('/')->logo ? $pages->get('/')->logo->httpUrl : '/site/templates/images/default-logo.png'; ?>",
                  			"width": 200,
                  			"height": 50
                		}
              		},
              		"image": "<?= $page->card_image ? $page->ocard_image->httpUrl : '/site/templates/images/default-image.jpg'; ?>",
              		"mainEntityOfPage": {
                	"@type": "WebPage",
                	"@id": "<?= $page->httpUrl; ?>"
              		}
            	}
            	</script>
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
