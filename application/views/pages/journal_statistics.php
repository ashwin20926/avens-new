<div class="journal-statistics">
	<h2>Journal Statistics</h2>
	<ul>				
		<li>Articles Published:<a href="<?php echo base_url(); ?>page/get_journal_articles/?journal_id=<?php echo $journal_id; ?> "><?php echo $journal_count[0]['journal_count']; ?></a></li>
		<?php 
			if($citations[0]['total'] > 0) {
				echo '<li>Citations:<a href="'.base_url().'page/get_journal_articles/?journal_id='.$journal_id.'&citations=true">'.$citations[0]['total'].'</a></li>';
			}
		?>
		<?php 
		/*
			if(isset($impact_factor[0]['impact_factor']) && !empty($impact_factor[0]['impact_factor'])) {
				echo '<li>Impact Factor:<a href="'.base_url().'page/get_journal_impact_factor/?journal_id='.$journal_id.'">'.$impact_factor[0]['impact_factor'].'</a></li>';
			}
			*/
		?>		

		<li>Downloads & Views:<a class="anchor-text"><?php echo $view_and_downloads[0]['total']; ?></a></li>
	</ul>
</div>