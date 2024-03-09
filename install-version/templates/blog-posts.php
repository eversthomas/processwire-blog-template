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
    <div class="main-inner">
        <article>
            <h2>latest blog posts</h2>
            <?php
                // Holen aller Seiten, die das Template 'blog-post' verwenden, sortiert nach 'blog_date' absteigend
                // Berechne den Startpunkt basierend auf der aktuellen Seitennummer
                $start = ($input->pageNum - 1) * 10; // 10 ist die Anzahl der Artikel pro Seite
                
                // Füge den Startparameter zu deiner Abfrage hinzu
                $posts = $pages->find("template=blog-post, sort=-blog_date, limit=10, start=$start");
                
                foreach ($posts as $post) {
                  echo "<h3><a href='{$post->url}'>{$post->title}</a></h3>";
                  echo "<p>Veröffentlicht am: " . date("d.m.Y, H:i") . " Uhr</p>";
                  echo "<div class='post-excerpt'>{$post->blog_excerpt}</div>";
                  echo "<div class='readmore'><a href='{$post->url}'>weiter lesen</a></div>";
                  if($post->blog_image) {
                    // Skaliere das Bild auf 300 Pixel Breite
                    $resizedImage = $post->blog_image->width(100);
                    // Verwende die Bildbeschreibung als alt-Text
                    $altText = $resizedImage->description ? $resizedImage->description : 'Standard-Alt-Text';
                    echo "<img src='{$resizedImage->url}' alt='{$altText}'>";
                    }
                }
            ?>
            <!-- seiten navigation -->
            <div class="posts-navigation">
                <?php
                    // Pagination-Links generieren
                    echo $posts->renderPager([
                        'nextItemLabel' => "Nächste",
                        'previousItemLabel' => "Vorherige",
                        // Du kannst hier weitere Optionen für die Gestaltung deiner Pagination einfügen
                    ]);
                ?>
            </div>
        </article>
    </div>
</div>	