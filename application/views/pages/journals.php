<header id="masthead" class="site-header submit-manuscript" role="banner">
  <div class="home-link">
    <h2>Journals</h2>
  </div>
</header>
<div id="main" class="site-main"><style type="text/css">
  #errorfiled
  {
    color: #CB4444;
  }
  #colophon{margin:0 !important;}
  .disp_msg
  {
    position: absolute;
    display: none;
    width: 80%;
    /* top: 50%; */
    left: 10%;
    text-align: center;
    background-color: #47D55E;
    color: #fff;
    padding: 15px;
    z-index: 99;
  }
  .error {
    color: #ff0000 !important;
    font-weight: normal;
  }
</style>

<div class="disp_msg">
  We will Get Back To You Soon
</div>
<div class="hentry">
  <div class="container">
    <div class="row"> 
      <div class="col-sm-4">  
        <div>       
          <div id="journal-sidebar" style="padding:25px 30px 30px 0;">
            <h2>Sort Journals</h2>          
            <div class="radio">
              <label>A to Z&nbsp;<input type="radio" class="sort_journals" name="atoz" id="atoz" value="atoz"></label>
            </div>          
            <div class="radio">
              <label>Category Wise<input type="radio" class="sort_journals" name="category-wise" id="category-wise" value="category-wise" checked="checked"></label>
            </div>
            <div class="radio">
              <label>A to Z in Category<input type="radio" class="sort_journals" name="atozincat" id="atozincat" value="atozincat"></label>
            </div><br>
            <h2>Filter Journals</h2>
            <div class="radio">
              <label>All Categories<input type="radio" name="all-categories" class="sort_journals" id="all-categories" value="atoz"></label>
            </div>
            <div class="radio">
              <label>Medical<input type="radio" name="medical" class="sort_journals" id="medical" value="medical"></label>
            </div>
            <div class="radio">
              <label>Biotechnology<input type="radio" name="biotechnology" class="sort_journals" id="biotechnology" value="biotechnology"></label>
            </div>
            <div class="radio">
              <label>Biology<input type="radio" name="biology" class="sort_journals" id="biology" value="biology"></label>
            </div>
            <div class="radio">
              <label>Pharmaceutical<input type="radio" name="pharmaceutical" class="sort_journals" id="pharmaceutical" value="pharmaceutical"></label>
            </div>
          </div>
          <!-- <img src="http://www.avensonline.org/wp-content/uploads/2015/03/Rectangle-18-copy.png" class="img-responsive"> -->
        </div>
      </div>    
      <div class="col-sm-8" id="journal-ajax">  <div class="journal-text-box">
        <?php
        echo '<div class="journal-text-box"><ul><li>';

        foreach ($j_info as $key => $value) {   
          if($value['category_name'] == 'Medical') {
            if($key == '0'){
              echo '<h3>Medical</h3>';
            }
            echo '<ul class="cat-ul">';
            echo '<li><a title='.$value['journal_name'].' href="'.base_url().''.strtolower($value['category_name']).'/'.$value['journal_url_slug'].'/'.$value['post_slug'].'">'.$value['journal_name'].'</a>';
            if($value['issn_number']) {
              echo '<span class="pull-right"><p></p></span>';
            }
            if($value['issn_number']) {
                echo '<span class="pull-right"><p>[ISSN: '.$value['issn_number'].']</p></span>';
            }
            echo '</li>';
            echo '</ul>';
          }
        }
        foreach ($j_info as $key => $value) {
          if($key == '0'){
            echo '<h3>Biotechnology</h3>';
          }
          if($value['category_name'] == 'Biotechnology') {
            echo '<ul class="cat-ul">';
            echo '<li><a title='.$value['journal_name'].' href="'.base_url().''.strtolower($value['category_name']).'/'.$value['journal_url_slug'].'/'.$value['post_slug'].'">'.$value['journal_name'].'</a>';
            if($value['issn_number']) {
              echo '<span class="pull-right"><p></p></span>';
            }
            if($value['issn_number']) {
                echo '<span class="pull-right"><p>[ISSN: '.$value['issn_number'].']</p></span>';
            }
            echo '</li>';
            echo '</ul>';
          }
        }
        foreach ($j_info as $key => $value) {   
          if($key == '0'){
            echo '<h3>Biology</h3>';
          }
          if($value['category_name'] == 'Biology') {
            echo '<ul class="cat-ul">';
            echo '<li><a title='.$value['journal_name'].' href="'.base_url().''.strtolower($value['category_name']).'/'.$value['journal_url_slug'].'/'.$value['post_slug'].'">'.$value['journal_name'].'</a>';
            if($value['issn_number']) {
              echo '<span class="pull-right"><p></p></span>';
            }
            if($value['issn_number']) {
                echo '<span class="pull-right"><p>[ISSN: '.$value['issn_number'].']</p></span>';
            }
            echo '</li>';
            echo '</ul>';
          } 
        }
        foreach ($j_info as $key => $value) {
          if($key == '0'){
            echo '<h3>Pharmaceutical</h3>';
          }
          if($value['category_name'] == 'Pharmaceutical') {
            echo '<ul class="cat-ul">';
            echo '<li><a title='.$value['journal_name'].' href="'.base_url().''.strtolower($value['category_name']).'/'.$value['journal_url_slug'].'/'.$value['post_slug'].'">'.$value['journal_name'].'</a>';
            if($value['issn_number']) {
              echo '<span class="pull-right"><p></p></span>';
            }
            if($value['issn_number']) {
                echo '<span class="pull-right"><p>[ISSN: '.$value['issn_number'].']</p></span>';
            }
            echo '</li>';
            echo '</ul>';
          }
        }
        echo '</li></ul></div>';
        ?>
      </div>          
    </div>
  </div>
</div>
</div>
</div>

