<?php namespace ProcessWire; 

// Template file for pages using the “bblog-tag-search” template
// -------------------------------------------------------
// The #content div in this file will replace the #content div in _main.php
// when the Markup Regions feature is enabled, as it is by default. 
// You can also append to (or prepend to) the #content div, and much more. 
// See the Markup Regions documentation:
// https://processwire.com/docs/front-end/output/markup-regions/

?>

<div id="content">
    <div class="main-inner">
        <article>
            <?php
            	function convertUrlSegmentToTagName($segment) {
                // Ersetze Bindestriche zurück in Leerzeichen
                $name = str_replace('-', ' ', $segment);
                // Hier könntest du weitere Anpassungen vornehmen, z.B. Umlaute korrigieren
                // Das hängt von deiner spezifischen Anwendung ab
                return $name;
                }
            
                // Den Tag aus der URL abrufen und umwandeln
                $tagSegment = $input->urlSegment1; // Annahme: der Tag-Name ist der erste URL-Segment nach /blog-tag-search/
                $tagName = convertUrlSegmentToTagName($tagSegment);
                
                // Suche nach Posts mit diesem umgewandelten Tag-Namen
                $matchingPosts = $pages->find("template=blog-post, blog_tag_repeater.blog_tag%=$tagName");
                
                // Anzeigen der gefundenen Posts
                if(count($matchingPosts)) {
                    echo "<h2>Artikel mit dem Tag: " . $sanitizer->entities($tagName) . "</h2>";
                    foreach($matchingPosts as $post) {
                        echo "<h3><a href='{$post->url}'>{$post->title}</a></h3>";
                        echo "<div class='post-excerpt'>{$post->blog_excerpt}</div>";
                        echo "<div class='readmore'><a href='{$post->url}'>weiter lesen</a></div>";
                    }
                } else {
                    echo "<div class='no-posts'><p>Keine Artikel mit dem Tag: " . $sanitizer->entities($tagName) . " gefunden.</p></div>";
                }
            ?>
        </article>
    </div>
</div>	