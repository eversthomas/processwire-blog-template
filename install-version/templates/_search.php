<?php namespace ProcessWire; 

// Template file for pages using the “search” template
// -------------------------------------------------------
// The #content div in this file will replace the #content div in _main.php
// when the Markup Regions feature is enabled, as it is by default. 
// You can also append to (or prepend to) the #content div, and much more. 
// See the Markup Regions documentation:
// https://processwire.com/docs/front-end/output/markup-regions/

?>

<div id="content">
	<?php
	   // Die Suchanfrage aus dem GET-Parameter "q" holen und sanitizen
        $query = $sanitizer->text($input->get->q);
        
        // Stelle sicher, dass eine Suchanfrage vorhanden ist
        if($query) {
            // Führe eine Volltextsuche durch, die die Felder 'title', 'blog_excerpt', und 'blog_artikel' umfasst
            $selector = "template=blog-post, sort=-blog_date";
            $results = $pages->find($selector);
        
            // Anzeigen der Suchergebnisse
            if($results->count) {
                echo "<h2>Suchergebnisse für: " . $sanitizer->entities($query) . "</h2>";
                foreach($results as $result) {
                    echo "<h3><a href='{$result->url}'>{$result->title}</a></h3>";
                    echo "{$result->blog_excerpt}";
                }
            } else {
                echo "<p>Keine Ergebnisse für: " . $sanitizer->entities($query) . "</p>";
            }
        } else {
            echo "<p>Bitte geben Sie einen Suchbegriff ein.</p>";
        }
	?>
</div>	