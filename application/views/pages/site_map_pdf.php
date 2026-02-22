<?php 
foreach ($site_map_pdf as $key => $value) {	
    echo '<url>';
    echo '<loc>https://www.avensonline.org/wp-content/uploads/'.$value['post_title'].'.pdf</loc>';
    if ($value['publication_date']) {
        echo '<lastmod>'.$value['publication_date'].'</lastmod>';
    } else {
        echo '<lastmod>'.$value['post_modified'].'</lastmod>';
    }
    echo '<priority>0.53</priority>';
    echo '</url>';
}
?>