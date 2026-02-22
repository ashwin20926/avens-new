<header class="search-header">
	<h1 class="page-title">Search Results for: <?php echo $_GET['s']; ?></h1>
</header>
<div class="container">
<div class="row custom-search-form">
<div class="col-sm-12">
<form method="get" action="<?php echo base_url() ?>page/search">	
 <div class="input-group">
  <input type="text" 
  class="form-control" name="s" placeholder="Search for journals by entering keyword.." value="<?php echo $_GET['s']?$_GET['s']:""; ?>">
  <span class="input-group-btn">
    <button class="btn btn-default" type="submit">Search</button>
  </span>
</div><!-- /input-group -->
</form>
</div>
</div>
<?php
	echo '<div class="search-wrap">';
	if(isset($search_results) && count($search_results)) {
		echo '<div class="no-results-found">';
		echo '<p class="search-text">Total search results:  <b>'.count($search_results).'</b></p><div class="search-border-bottom"></div>';
		echo '</div>';
		foreach ($search_results as $key => $value) {
			echo '<div class="search-item">';
			//echo $value['archive_desc'];
                        echo html_entity_decode($value['archive_desc'], ENT_QUOTES, "UTF-8");
			echo '<p><b>Journal: </b> '.$value['journal_name'].'</p>';
			echo '<div class="btn-wrapper">
			<p><a href="'.$value['archive_fulltext'].'" target="_blank" class="icon-fulltext">Full Text</a><a href="'.base_url().'wp-content/uploads/'.$value['archive_pdf'].'" target="_blank" class="icon-pdf">PDF</a></p></div>';
			echo '</div>';
		}
	} else {
		echo '<div class="search-item">No search results found. Try with some proper keywords.</div>';		
	}
	echo '</div>';
?>
</div>