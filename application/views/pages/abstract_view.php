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
        echo '<div class="fulltext-wrap row new-ft-format">';
      ?>
      <?php
        $pdfUrl = base_url().'wp-content/uploads/'.$fulltext_info[0]['post_title'].'.pdf';
        $fullTextUrl = base_url().'fulltextarticles/'.$fulltext_info[0]['post_title'].'.html';
      ?>
      <?php
      //print_r($fulltext_info[0]['post_content']);exit;
        echo '<div id="content-right" class="col-sm-10 col-xs-12">';
        echo '<div class="fulltext-main-part">';
        foreach (json_decode($fulltext_info[0]['post_content']) as $key => $value) {
          if($value->label == 'Abstract') {            
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
              echo '<h2 class="sub-heading">'.$v1->value.'</sup></h2>';
            }
            if($value->label === 'Abstract' || $value->label === 'Title') {
              if ($v1->name == 'paragraph_with_inline_heading') {                                            
                echo '<div class="para-text">';
                echo '<strong>'.$v1->child_tag[0]->value.': </strong>';                
                echo $v1->value;
                echo '</div>';                      
              }
              if ($v1->name == 'paragraph_without_heading') {                                            
                echo '<div class="para-text">';                  
                echo $v1->value;
                echo '</div>';                      
              }
              if ($v1->name == 'paragraph_with_block_heading') {                                            
                echo '<div class="para-text">';
                echo '<div><strong>'.$v1->child_tag[0]->value.': </strong></div>';                
                echo $v1->value;
                echo '</div>';        
              }                
            }                 
          }
          echo '</div>';
        }
        echo '</div>';
        echo '</div>';
      ?>
      <?php 
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-sm-10 abstract-button-section" style="margin-bottom: 20px">';
        echo '<div class="col-sm-6"><a href="'.$fullTextUrl.'"><button type="button" class="btn btn-primary btn-lg btn-block">Full Text</button></a></div>';
        echo '<div class="col-sm-6"><a href="'.$pdfUrl.'" download><button type="button" class="btn btn-primary btn-lg btn-block">Download PDF</button></a></div>';
        echo '</div>';
        echo '<br/>';
        echo '</div>';
        echo '</div>';
      ?>
      </div>
      </div><!-- #primary -->
</div><!-- #main -->