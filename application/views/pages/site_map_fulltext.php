<?php 
  foreach ($site_map as $key => $value) {	
    echo '<url>';
    echo '<loc>https://www.avensonline.org/fulltextarticles/'.$value['post_title'].'.html</loc>';
    if ($value['publication_date']) {
        echo '<lastmod>'.$value['publication_date'].'</lastmod>';
    } else {
        echo '<lastmod>'.$value['post_modified'].'</lastmod>';
    }
    echo '<priority>0.52</priority>';
    echo '</url>';
  }
?>