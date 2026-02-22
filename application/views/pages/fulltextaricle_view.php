
<div id="main" class="site-main">
  <div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
      <div class="journal-name">    
        <div class="container">
        <h1 class="entry-title"><?php echo $fulltext_info[0]['journal_name']; ?></h1>                 
        </div>
      </div>
      <div class="container">
      <?php 
        if($fulltext_info[0]['json_format'] == 0) {
            echo '<div class="fulltext-wrap row old-ft-format">';
        } else {
            echo '<div class="fulltext-wrap row new-ft-format">';
        }
      ?>
      
      <a href="https://www.avensonline.org/wp-content/uploads/<?php echo $fulltext_info[0]['post_title']; ?>.pdf" download class="download-pdf-btn">Download PDF</a>
      <?php
          if($fulltext_info[0]['json_format'] == 0) {
              echo stripslashes($fulltext_info[0]['post_content']);
          } else {
                 
        echo '<div id="myScrollspy" class="col-sm-2">';
        echo '<ul id="myNav" class="nav nav-tabs nav-stacked affix-top">';
          foreach (json_decode($fulltext_info[0]['post_content']) as $key => $value) {
            //print_r($value);
            if(strtolower($value->label) !== 'citation') {
            echo '<li><a href="#'.str_replace(" ", "-", $value->label).'-info">'.$value->label.'</a></li>';
            }
          } 
        echo '</ul>';
        echo '</div>';
        echo '<div id="content-right" class="col-sm-10">';
        echo '<div class="fulltext-main-part">';
        foreach (json_decode($fulltext_info[0]['post_content']) as $key => $value) {          
            
          
          //print_r($value->tags);
          
          //print_r($value);
          if(strtolower($value->label) !== 'citation') {
          echo '<div id="'.str_replace(" ", "-", $value->label).'-info" class="f-info-box">';
          if($value->name !== 'title') {            
            echo '<h2 class="info-main-heading">'.$value->label.'</h2>';
          }
          $li = true;
          foreach ($value->tags as $k1 => $v1) {                        
              if($v1->name == 'article_type') {
            echo '<div class="small-title"><strong>'.$v1->value.'</strong></div>';            
          }
            if($v1->name == 'main_heading') {
                echo '<h1 class="heading"><strong>'.$v1->value.'</strong></h1>';
            }
            if($v1->name == 'author') {              
              echo '<h2 class="sub-heading">'.$v1->value.'<sup></h2>';
            }
            if($v1->name == 'paragraph_with_inline_heading') {                                            
                  echo '<div class="para-text">';
                  echo '<strong>'.$v1->child_tag[0]->value.': </strong>';                
                  echo $v1->value;
                  echo '</div>';                      
            }
            if($v1->name == 'paragraph_without_heading') {                                            
                  echo '<div class="para-text">';                  
                  echo $v1->value;
                  echo '</div>';                      
            }
            if($v1->name == 'paragraph_with_block_heading') {                                            
                  echo '<div class="para-text">';
                  echo '<div><strong>'.$v1->child_tag[0]->value.': </strong></div>';                
                  echo $v1->value;
                  echo '</div>';        
            }
            if($v1->name == 'figure_info_box') {
            echo '<div class="figure-info-box para-text"><div>';            
            echo '<a target="_blank" href="'.$v1->child_tag[0]->value.'"><img class="figure-img" src="'.$v1->child_tag[0]->value.'" alt="" height="100"></a></div>
              '.$v1->value.'
            </div>';
            }
            
            if($v1->name == 'figure_box') {
            echo '<div class="figure-box"><div>';            
            echo '<a target="_blank" href="'.$v1->value.'"><img class="figure-img" src="'.$v1->value.'" alt=""></a></div>
            </div>';
            }
            
            if($v1->name == 'reference_links') {                
                
                echo '<div id="ref'.($k1 + 1).'">';
                if($value->label == 'References') {
                    echo ($k1 + 1).'.  ';
                }
                echo '<a href="'.$v1->child_tag[0]->value.'">'.$v1->value.'</a>';
                echo '</div>';
                
                
            }
            
          }
          echo '</div>';
               }     
        }
        if(strtolower($value->label) == 'citation') {
            
            //print_r($value->tags->value);
            echo '<div id="myModal" class="modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-header">×<span class="sr-only">Close</span><h4 id="myModalLabel" class="modal-title">Get Citation</h4></div><div class="modal-body">'.$value->tags[0]->value.'</div></div></div></div>';
        }
        echo '</div>';
        echo '</div>';
    
          }
      ?>
      </div>
      </div><!-- #primary -->
</div><!-- #main -->
</div>