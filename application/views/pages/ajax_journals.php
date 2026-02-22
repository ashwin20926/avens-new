<?php 
echo '<div class="journal-text-box"><ul><li>';
if($sort_type == 'atoz') {
	echo '<h3>A to Z Journal</h3><div class="post-list">';
	foreach ($j_info as $key => $value) {
//print_r($value);			
		echo '<ul class="cat-ul">';
		echo '<li><a title='.$value['journal_name'].' href="'.base_url().''.strtolower($value['category_name']).'/'.$value['journal_url_slug'].'/'.$value['post_slug'].'">'.$value['journal_name'].'</a>';
		if($value['issn_number']) {
			echo '<span class="pull-right"><p></p></span>';
		}
		echo '</li>';
		echo '</ul>';	
	}
	echo '</div>';
} else if($sort_type == 'category-wise' || $sort_type == 'atozincat') {
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
			echo '</li>';
			echo '</ul>';
		}
	}
} else if($sort_type == 'medical') {
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
			echo '</li>';
			echo '</ul>';
		}
	}
}else if($sort_type =='biotechnology') {
	foreach ($j_info as $key => $value) {		
		if($value['category_name'] == 'Biotechnology') {
			if($key == '0'){
				echo '<h3>Biotechnology</h3>';
			}
			echo '<ul class="cat-ul">';
			echo '<li><a title='.$value['journal_name'].' href="'.base_url().''.strtolower($value['category_name']).'/'.$value['journal_url_slug'].'/'.$value['post_slug'].'">'.$value['journal_name'].'</a>';
			if($value['issn_number']) {
				echo '<span class="pull-right"><p></p></span>';
			}
			echo '</li>';
			echo '</ul>';
		}
	}
}else if($sort_type =='biology') {
	foreach ($j_info as $key => $value) {		
		if($value['category_name'] == 'Biology') {
			if($key == '0'){
				echo '<h3>Biology</h3>';
			}
			echo '<ul class="cat-ul">';
			echo '<li><a title='.$value['journal_name'].' href="'.base_url().''.strtolower($value['category_name']).'/'.$value['journal_url_slug'].'/'.$value['post_slug'].'">'.$value['journal_name'].'</a>';
			if($value['issn_number']) {
				echo '<span class="pull-right"><p></p></span>';
			}
			echo '</li>';
			echo '</ul>';
		}
	}
}
else if($sort_type =='pharmaceutical') {
	foreach ($j_info as $key => $value) {

		if($value['category_name'] == 'Pharmaceutical') {
			if($key == '0'){
				echo '<h3>Pharmaceutical</h3>';
			}
			echo '<ul class="cat-ul">';
			echo '<li><a title='.$value['journal_name'].' href="'.base_url().''.strtolower($value['category_name']).'/'.$value['journal_url_slug'].'/'.$value['post_slug'].'">'.$value['journal_name'].'</a>';
			if($value['issn_number']) {
				echo '<span class="pull-right"><p></p></span>';
			}
			echo '</li>';
			echo '</ul>';
		}
	}
}
echo '</li></ul></div>';
?>