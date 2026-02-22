<header class="search-header">    
	<h1 class="entry-title"><?php echo $journal_articles[0]['journal_name']; ?></h1>
</header>
<div class="container">
	<div class="row custom-search-form">
		<div class="col-sm-8">
			<div class="post-text-box">
				<div id="post-content">                    
					<?php 
						foreach ($journal_articles as $key => $v) {
                            if(!empty($v['article_title']) && isset($v['article_title'])) {
    							echo '<div class="archive-box">';
                                echo '<div>';
                                if(isset($v['article_title']) && !empty($v['article_title'])) {
                                    echo '<ul><li><a href="'.$v['article_link'].'" target="_blank">'.$v['article_title'].'</a><br></li></ul>';
                                }
                                if(!empty($v['article_authors']) && isset($v['article_authors'])) {
                                    echo '<p><strong>Authors: </strong>'.$v['article_authors'].'</p>';
                                }
                                if(!empty($v['doi_name']) && isset($v['doi_name'])) {
                                    echo '<p>';
                                    echo '<strong>DOI:</strong> <a href="'.$v['doi_link'].'" target="_blank">'.$v['doi_name'].'</a>&nbsp;&nbsp;';
                                    if($v['citated_count'] > 0) {
                                        echo '<strong>Citations:</strong> <a href="'.$v['citation_link'].'" target="_blank"><strong>'.$v['citated_count'].'</strong> (Details)</a>';
                                    }
                                    echo '</p>';
                                }
                                echo '</div>';
                                echo '<div class="btn-wrapper">';
                                if(!empty($v['archive_fulltext']) && !empty($v['archive_pdf'])) {
                                    echo '<p class="full_text_para"><a archive_id="'.$v['id'].'" archive_type="full_text" href="'.$v['archive_fulltext'].'" target="_blank" class="icon-fulltext">Full Text</a></p><p class="pdf_para"><a archive_id="'.$v['id'].'" archive_type="pdf" href="'.base_url().'wp-content/uploads/'.$v['archive_pdf'].'" target="_blank" class="icon-pdf"> PDF</a></p>';
                                }
                                if(!empty($v['supli_pdf'])) {
                                    echo '<p class="supli_para"><a archive_id="'.$v['id'].'" archive_type="supli" href="'.base_url().'wp-content/uploads/'.$v['supli_pdf'].'" target="_blank"                                   class="icon-fulltext">s Pdf</a></p>';   
                                }
                                if(!empty($v['archive_fulltext']) && !empty($v['archive_pdf'])) {
                                    echo '( Downloads <span class="stat-count pdf">'.$v['archive_pdf_views'].'</span>&nbsp;&nbsp; Views <span class="stat-count pdf">'.$v['archive_pdf_views'].'</span>)';
                                }
                                echo '</div>'; 
                                echo '</div>';
    						}
                        }
					?>
				</div>
			</div>
		</div>
        <div class="col-sm-4">
            <?php echo '<div class="home_post"><div class="journal-statistics-wrapper" journal-id="'.$journal_articles[0]['journal_id'].'"></div></div>'; ?>
        </div>
	</div>
</div>