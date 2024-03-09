<?php namespace ProcessWire; 

// Template file for pages using the “basic-page” template
// -------------------------------------------------------
// The #content div in this file will replace the #content div in _main.php
// when the Markup Regions feature is enabled, as it is by default. 
// You can also append to (or prepend to) the #content div, and much more. 
// See the Markup Regions documentation:
// https://processwire.com/docs/front-end/output/markup-regions/

?>

<div id="content">
    <div class="mein-inner">
        <article>
            <?php echo "<h3>{$page->title}</h3>";
            echo "<div class='post-date'>{$page->blog_date}</div>";
            echo "<div class='post-excerpt'>{$page->blog_excerpt}</div>";
            echo "<div class='post-main'>{$page->blog_artikel}</div>"; ?>
            <div class="blog-image">
                <?php
            	    $image = $page->blog_image;
                    if($image) {
                      echo "<img src='$image->url' alt='$image->description'>";
                    }
                ?>
            </div>
            <div class="blog-tags">
                <!-- tag links -->
                <?php
                    // Funktion zur Umwandlung von Umlauten und scharfem ß
                    function convertGermanCharacters($string) {
                        $germanCharacters = ['ä', 'ö', 'ü', 'ß', 'Ä', 'Ö', 'Ü'];
                        $replacements = ['ae', 'oe', 'ue', 'ss', 'Ae', 'Oe', 'Ue'];
                        
                        // Ersetze deutsche Umlaute und scharfes ß
                        $string = str_replace($germanCharacters, $replacements, $string);
                    
                        return $string;
                    }
                    
                    echo "<ul class='tags'>";
                    foreach($page->blog_tag_repeater as $tagItem) {
                        // Umlaute umwandeln und für URL vorbereiten
                        $tagNameForUrl = convertGermanCharacters($tagItem->blog_tag); // Umlaute umwandeln
                        $tagUrl = $sanitizer->pageName($tagNameForUrl); // Sanitize für URL
                        
                        // Erzeuge den Link mit dem umgewandelten und sanitisierten Tag-Namen
                        echo "<li><a href='/blog-tag-search/{$tagUrl}'>{$tagItem->blog_tag}</a></li>";
                    }
                    echo "</ul>";
                ?>
            </div>
            <div class="post-navigation">
                <!-- Artikel Navigation -->
                <?php
                    // Vorheriger Artikel
                    $prev = $page->prev("template=blog-post");
                    if($prev->id) {
                        echo "<a href='{$prev->url}'>Vorheriger Artikel: {$prev->title}</a>";
                    }
                    
                    // Nächster Artikel
                    $next = $page->next("template=blog-post");
                    if($next->id) {
                        echo "<a href='{$next->url}'>Nächster Artikel: {$next->title}</a>";
                    }
                ?>
            </div>
            <div id="post-comments">
                <h3>Kommentare</h3>
                <?php
                    // Anzeigen vorhandener Kommentare
                     echo $page->blog_comments->renderAll();
                ?>
            </div>
        </article>
    </div>
</div>	