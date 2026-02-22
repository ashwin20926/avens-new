<?php include('static_values.php'); ?>

<div id="main" class="site-main">	<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">


		<style type="text/css">
			.journal-name h1{
				text-align: center;
				text-shadow: 0px 0px 9px rgba(0, 0, 0, 1);
				font-size: 2em;
				color: #ffffff;
			}
			.issn-num{background-color: #fe6d01;padding: 8px;color: #ffffff;border-top:1px solid #ffffff;font-size: 1.1em;text-align: right;}	
			.issn-num p{margin: 0;}
			.site-header{background: none;height: auto;}
			.site-header .home-link{display: none;}
			.journal-info-box{position: relative;color: #ffffff;}
			.journal-info-box h1.entry-title{  position: absolute;top: 0;font-size: 2em;padding: 20px;text-shadow: 0 0 6px #222;}
			.journal-info-box .issn-number{font-size: 0.5em;overflow: hidden;top: 10px;position: relative;}
			.affix{position: fixed;top: 0;}
		</style>

		<style type="text/css">
			.journal-name{background: url("<?php echo base_url(); ?>public/images/journal-banners/<?php echo $archive_page_info[0]['banner_image'] ?>") no-repeat scroll center top / 1600px auto;text-align: center;padding: 90px;position:relative;
			background-repeat:no-repeat;
			-webkit-background-size:cover;
			-moz-background-size:cover;
			-o-background-size:cover;
			background-size:cover;
			background-position:center;
		}
		#journal-sidebar-wrapper {margin: -40px 0 0;}
	}
</style>

<div class="journal-name">		
	<div class="container">
		<h1 class="entry-title"><?php echo $get_sidebar_links[0]['journal_name']; ?></h1>									
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<!-- <div class=" affix-top" data-spy="affix" data-offset-top="300" > -->
			<div class="mobile-category-nav visible-xs">
				<a href="#" id="mobile-post-navbtn">Menu</a>
				<ul class="mobile-post-nav">
					<?php

foreach ($links_info as $key => $value) {
									echo '<li><a class="" href="'.base_url().''.strtolower($value['category_name']).'/'.$value['journal_url_slug'].'/'.$value['post_slug'].'/">'.$value['post_name'].'</a></li>';
								}
					?>
				</ul>
			</div>
			<div>
				<div id="journal-sidebar-wrapper">

					<?php 

					if($archive_page_info[0]['issn_number']) {
							echo "<div class='issn-num'><p>[ISSN:".$archive_page_info[0]['issn_number']."]</p></div>";
						}
					?>
					<div id="journal-sidebar">
						<div id="nav-post">
							<ul class="post-nav">
								<?php

								/*foreach ($static_page as $key => $value) {
									echo '<li><a class="" href="'.base_url().''.strtolower($this->uri->segment(1)).'/'.$this->uri->segment(2).'/'.$value.'/">'.$key.'</a></li>';
								}*/
								foreach ($links_info as $key => $value) {
									echo '<li><a class="" href="'.base_url().''.strtolower($value['category_name']).'/'.$value['journal_url_slug'].'/'.$value['post_slug'].'/">'.$value['post_name'].'</a></li>';
								}
								?>
							</ul>
						</div>
					</div>
				</div>
				<div class="journal-info-box">

					<?php if(isset($archive_page_info) && !empty($archive_page_info)){ ?>
					<img src="<?php echo base_url(); ?>public/images/journal-sidebar-images/<?php echo $archive_page_info[0]['sidebar_image'] ?>" class="img-responsive">					
					<?php } ?>
				</div>
			</div>
		</div>		
		<div class="col-sm-8">		
			<div class="post-text-box">				
				<div id="post-content">
					<?php
					if(strpos($this->uri->segment(3), 'current-issue') !== false) {
						echo '<h1>Current Issue</h1>';
					}else if(strpos($this->uri->segment(3), 'articles-in-press') !== false) {
						echo '<h1>Article In Press</h1>';	
					}
					else if(strpos($this->uri->segment(3), 'archive') !== false) {
						echo '<h1>Archive</h1>';	
					}else if(strpos($this->uri->segment(3), 'special-issues') !== false) {
						echo '<h1>Special Issues</h1>';	
					}
					?>
<?php if(!empty($archive_info[0]) && isset($archive_info[0])) { ?>
<span class="rss-button"><a target="_blank" href="https://www.avensonline.org/feed/?cat=<?php echo strtolower($archive_info[0]['category_name']); ?>&journal=<?php echo $archive_info[0]['journal_url_slug']; ?>&type= <?php echo $archive_info[0]['archive_in']; ?>">Rss Feed&nbsp;<img src="https://www.avensonline.org/wp-content/themes/twentythirteen/images/rss.png" alt="Rss Feed"></a></span>
<?php } ?>
					<?php 

					if(strpos($this->uri->segment(3), 'archive') !== false) {

						$year_arr = array();
						foreach ($archive_info as $key => $value) {						
							array_push($year_arr, $value['archive_year']);							
						}


						$temp_arr = array();
						foreach ($archive_info as $key => $value) {
							$temp_arr[$value['archive_year']][$value['archive_volume']][] = $value;
						}
						$f_flag = true;
						echo '<ul id="myTabs" class="nav nav-tabs" role="tablist">';
						foreach ($temp_arr as $key => $value) {
							//print_r($key);
							//echo $key;
							if($f_flag) {
								echo '<li class="active"><a href="#'.$key.'" id="'.$key.'-tab" role="tab" data-toggle="tab" aria-controls="'.$key.'" aria-expanded="false">'.$key.'</a></li>';
							} else {
								echo '<li><a href="#'.$key.'" id="'.$key.'-tab" role="tab" data-toggle="tab" aria-controls="'.$key.'" aria-expanded="false">'.$key.'</a></li>';
							}
							$f_flag = false;							
						}
						echo '</ul>';
						$s_flag = true;
						echo '<div id="myTabContent" class="tab-content">';
						foreach ($temp_arr as $key => $value) {							
							/*foreach ($value as $k => $v) {
								echo '<div class="post-archive-box"><p class="month"><strong>'.$k.'</strong></p>';
							}*/
							
							if($s_flag) {
								echo '<div class="tab-pane fade active in" id="'.$key.'" aria-labelledby="'.$key.'-tab">';		
							} else {
								echo '<div class="tab-pane fade active " id="'.$key.'" aria-labelledby="'.$key.'-tab">';		
							}
							//echo '</div>';
							$i = 0;
							foreach ($value as $k => $v) {
							if(isset($v[0]['volume_name']) && !empty($v[0]['volume_name'])) {																
								echo '<div class="post-archive-box"><p class="month"><strong> '.$v[0]['volume_name'].' </strong></p>';
								}
								else {
								echo '<div class="post-archive-box"><p class="month"><strong> </strong></p>';}
								echo '<div class="post-archive-box-inner" style="display:none">';
								foreach ($v as $a => $b) {
									echo '<div class="archive-info">';
									//if($v == $value['archive_year']) {
									//echo $b['archive_desc'];
//echo html_entity_decode($b['archive_desc'], ENT_QUOTES, "UTF-8"); 
if(isset($b['article_title']) && !empty($b['article_title'])) {
												echo '<ul><li><a href="'.$b['article_link'].'" target="_blank">'.$b['article_title'].'</a><br></li></ul>';
						if(!empty($b['article_authors']) && isset($b['article_authors'])) {
							echo '<p><strong>Authors: </strong>'.$b['article_authors'].'</p>';
						}
						if(!empty($b['doi_name']) && isset($b['doi_name'])) {
							echo '<p><strong>DOI:</strong> <a href="'.$b['doi_link'].'" target="_blank">'.$b['doi_name'].'</a></p>';
						}

						} else {
							echo html_entity_decode($b['archive_desc'], ENT_QUOTES, "UTF-8"); 
						}
									echo '<div class="btn-wrapper">';
if ($b['json_format'] == 1) {
	$title = str_replace(" ", "-", $b['article_title']);
	echo '<p class="full_text_para"><a archive_id="'.$b['id'].'" archive_type="full_text" href="'.base_url().'abstract/'.$b['post_browser_title_slug'].'" target="_blank" class="icon-fulltext">Abstract</a></p>';
}
echo '<p><a href="'.$b['archive_fulltext'].'" target="_blank" class="icon-fulltext">Full Text</a></p><p class="pdf_para"><a href="'.base_url().'wp-content/uploads/'.$b['archive_pdf'].'" target="_blank" class="icon-pdf" archive_id="'.$b['id'].'" archive_type="pdf">PDF</a></p>';
if(!empty($b['supli_pdf'])) {
   echo '<p class="supli_para"><a archive_id="'.$b['id'].'" archive_type="supli" href="'.base_url().'wp-content/uploads/'.$b['supli_pdf'].'" target="_blank" class="icon-fulltext">s Pdf</a></p>';	
}

echo '( Downloads <span class="stat-count pdf">'.$b['archive_pdf_views'].'</span>&nbsp;&nbsp; Views <span class="stat-count pdf">'.$b['archive_pdf_views'].'</span>)';
echo '</div>';
								//}
									echo '</div>';
								}
								echo '</div></div>';
								$i++;
							}
							echo '</div>';
							$s_flag = false;
						}
						echo '</div>';
					}
					 else {
					 	$temp_arr = array();						
						foreach ($archive_info as $key => $value) {
							$temp_arr[$value['volume_name']][] = $value;
						}
						//print_r($temp_arr);
						foreach ($temp_arr as $key => $value) {
							//print_r($value);
							echo '<p style="text-transform:capitalize"><b>'.$key.'</b></p>';															
							foreach ($value as $k => $v) {													
																						
//print_r($v);
						//echo '<div class="archive-box"><div>'.html_entity_decode($v['archive_desc'],ENT_QUOTES, "UTF-8").'</div>';
						echo '<div class="archive-box article_'.$v['id'].'"><div>';
						if(isset($v['article_title']) && !empty($v['article_title'])) {
												echo '<ul><li><a href="'.$v['article_link'].'" target="_blank">'.$v['article_title'].'</a><br></li></ul>';
						if(!empty($v['article_authors']) && isset($v['article_authors'])) {
							echo '<p><strong>Authors: </strong>'.$v['article_authors'].'</p>';
						}
						if(!empty($v['doi_name']) && isset($v['doi_name'])) {
							echo '<p><strong>DOI:</strong> <a href="'.$v['doi_link'].'" target="_blank">'.$v['doi_name'].'</a></p>';
						}
						echo '</div>';

						} else {
							echo ''.html_entity_decode($v['archive_desc'],ENT_QUOTES, "UTF-8").'</div>';
						}

							echo '<div class="btn-wrapper">';
							if(!empty($v['archive_fulltext']) && !empty($v['archive_pdf'])) {
							    $title = str_replace(" ", "-", $v['article_title']);
								if ($v['json_format'] == 1) {
									echo '<p class="full_text_para"><a archive_id="'.$v['id'].'" archive_type="full_text" href="'.base_url().'abstract/'.$v['post_browser_title_slug'].'" target="_blank" class="icon-fulltext">Abstract</a></p>';
								}
								echo '
<p class="full_text_para"><a archive_id="'.$v['id'].'" archive_type="full_text" href="'.$v['archive_fulltext'].'" target="_blank" class="icon-fulltext">Full Text</a></p><p class="pdf_para"><a archive_id="'.$v['id'].'" archive_type="pdf" href="'.base_url().'wp-content/uploads/'.$v['archive_pdf'].'" target="_blank" class="icon-pdf"> PDF</a></p>';
							}
                                                        if(!empty($v['supli_pdf'])) {
								echo '<p class="supli_para"><a archive_id="'.$v['id'].'" archive_type="supli" href="'.base_url().'wp-content/uploads/'.$v['supli_pdf'].'" target="_blank"                                   class="icon-fulltext">s Pdf</a></p>';	
							}
if(!empty($v['archive_fulltext']) && !empty($v['archive_pdf'])) {
echo '( Downloads <span class="stat-count pdf">'.$v['archive_pdf_views'].'</span>&nbsp;&nbsp; Views <span class="stat-count pdf">'.$v['archive_pdf_views'].'</span>)';
}
echo '</div>';
if($v['id'] == '955') {
echo '<p style="font-size:20px;margin-bottom:20px;color:#428bca"><b>Supplementary Video</b></p>';
echo '<video height="200" controls>
  <source src="https://www.avensonline.org/wp-content/uploads/JPA-2376-922X-04-0024-Videonote.mp4" type="video/mp4">
  <source src="https://www.avensonline.org/wp-content/uploads/JPA-2376-922X-04-0024-Videonote.ogg" type="video/ogg">
</video>';
}
if(!empty($v['videos']) && !empty($v['videos'])) {
    $videos = explode(',', $v['videos']);
foreach ($videos as $video) {
    echo '<video class="archive-video" height="200" controls>
  <source src="'.$video.'" type="video/mp4">
</video>';
}
}
echo '</div>';

						}							
						}					

					}

					?>
									</div>
				</div>  	
			</div>
		</div>
	</div>
</div><!-- #primary -->


</div><!-- #main -->
