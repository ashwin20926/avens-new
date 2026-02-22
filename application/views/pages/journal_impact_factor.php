<header class="search-header">    
	<h1 class="entry-title"><?php echo $journal_articles[0]['journal_name']; ?></h1>
</header>
<div class="container">
	<div class="row custom-search-form">
		<div class="col-sm-8">			
            <div class="journal-article-info-title"><h2>Impact Factor</h2></div>
			<div id="post-content">                    
				<?php 
					echo $journal_impact_factor_markup[0]['impact_factor_info'];
                                        echo $journal_impact_equation[0]['impact_factor_equation'];
				?>
			</div>			
		</div>
        <div class="col-sm-4">
            <?php echo '<div class="home_post"><div class="journal-statistics-wrapper" journal-id="'.$journal_articles[0]['journal_id'].'"></div></div>'; ?>
        </div>
	</div>
</div>