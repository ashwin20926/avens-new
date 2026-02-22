<header id="masthead" class="site-header membership" role="banner">
	<div class="home-link">
<h2>Testimonials</h2><!-- <h1 class="site-title"></h1>
<h2 class="site-description"></h2> -->
</div>
</header>
<div class="testmonial-section-wrap testimonials-page">	
	<div class="testmonial-section-box container">							
			<?php 
			foreach ($testimonials as $key => $value) {
				echo '<div class="item">
				<div class="testi-user">
					<img width="80" height="80" src="'.base_url().'wp-content/uploads/'.$value["user_img"].'" class="attachment-thumbnail wp-post-image" alt="'.$value["user_img"].'">
				</div>
				<div class="testimonial-info">
					<p>'.$value["testimonial_desc"].'</p>
					<p class="testi-user-info"><span class="testi-user-name">'.$value["user_name"].'</span><span class="testi-user-desig">'.$value["user_desig"].'</span><span class="testi-user-university">'.$value["user_university"].'</span></p>
				</div>
			</div>';			    
		}
		?>				
</div>					
</div>