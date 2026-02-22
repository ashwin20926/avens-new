<?php 
foreach ($site_map_pdf as $key => $value) {	
    $temp = explode(".", $value['post_browser_title']);	
    $title = str_replace(" ","-", $temp[0]);
    echo '<url>';
    echo '<loc>https://www.avensonline.org/abstract/'.$title.'</loc>';
    echo '<lastmod>'.$value['publication_date'].'</lastmod>';
    echo '<priority>0.53</priority>';
    echo '</url>';
}
?>