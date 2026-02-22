<div class="home">
	<div class="site-header">
		<header id="masthead" class="site-header" role="banner">
			<div class="home-link">
<h2>Provisional Study of Kuwait Adult Hematology Reference Range</h2><!-- <h1 class="site-title"></h1>
<h2 class="site-description"></h2> -->
<div class="home-inner hidden-xs">					
	<div class="row">
		<div class="col-sm-6">
			<div class="banner-text">Find the Right Journal to Publish your Work</div>				
		</div>
	</div>
	<div class="row">					
		<div class="col-sm-5">
			<form id="home-form" action="<?php echo base_url(); ?>/page/search">
				<div class="input-group">
					<input placeholder="Search for journals by entering keyword.." type="text" name="s" title="Search for:">
					<span class="input-group-btn">						
						<input type="submit" class="search-submit" value="Search">
					</span>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
</header>
</div>
<div id="primary" class="content-area">
	<!-- <div id="featured-content" class="site-content" role="main">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center"><div class="featured-heading">Featured Journals</div></div>
				<div class="col-sm-4">
					<div class="featured-box">
						<img src="<?php echo base_url() ?>public/images/analytical_sidenav.jpg" alt="" class="img-responsive">
					</div>
					<h2><a href="<?php echo base_url(); ?>pharmaceutical/analytical-molecular-techniques-pharmaceutical/home-25/">Journal of Analytical &amp; Molecular Techniques</a></h2>
					<p class="jour-info">&nbsp;&nbsp;|&nbsp;&nbsp;Pharmaceutical</p>
				</div>
				<div class="col-sm-4">
					<div class="featured-box">
						<img src="<?php echo base_url() ?>public/images/clinicalmedical_sidenav.jpg" alt="" class="img-responsive">
					</div>
					<h2><a href="<?php echo base_url(); ?>medical/clinical-medical-case-reports/home-9/">Journal of Clinical &amp; Medical Case Reports</a></h2>
					<p class="jour-info">[ISSN: 2332-4120]&nbsp;&nbsp;|&nbsp;&nbsp;Medical</p>
				</div>
				<div class="col-sm-4">
					<div class="featured-box">
						<img src="<?php echo base_url() ?>public/images/neurology_sidenav.jpg" alt="" class="img-responsive">
					</div>
					<h2><a href="<?php echo base_url(); ?>medical/journal-of-neurology-and-psychology/home-13/">Journal of Neurology and Psychology</a></h2>
					<p class="jour-info">[ISSN: 2332-3469]&nbsp;&nbsp;|&nbsp;&nbsp;Medical</p>
				</div>		
			</div>
		</div>
	</div> -->
	<div class="testmonial-section-wrap">
	<div class="container">

		<div class="testmonial-section-box">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <div class="strip-bar">
							<h3>Testimonials</h3>
							<div class="nav-controls">
								<p class="view-all-text"><a href="<?php echo base_url() ?>page/testimonials">View All</a></p>
							</div>
						</div>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
      
<?php
	$flag = 'active'; 
	$temp = 'active';
	echo '<ol class="carousel-indicators">';
	foreach ($testi_info as $key => $value) {
		echo '<li data-target="#carousel-example-generic" data-slide-to="'.$key.'" class="'.$temp.'"></li>';
		$temp='';
	}
	echo '</ol>';

	foreach ($testi_info as $key => $value) {
		echo '<div class="item '.$flag.'">
	     <div class="testi-user">
	      <img width="80" height="80" src="'.base_url().'wp-content/uploads/'.$value["user_img"].'" class="attachment-thumbnail wp-post-image" alt="jcb-19">
	      </div>
	      <div class="testimonial-info">
		      <p>'.$value["testimonial_desc"].'</p>
		<p class="testi-user-info"><span class="testi-user-name">'.$value["user_name"].'</span><span class="testi-user-desig">'.$value["user_desig"].'</span><span class="testi-user-university">'.$value["user_university"].'</span></p>
	      </div>
	    </div>';
	    $flag = '';
	}
 ?>
    
   
  </div>

  <!-- Controls -->
  <!-- <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
  	<img src="<?php echo base_url(); ?>/public/images/left-arrow.png" alt="Next">
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
  	<img src="<?php echo base_url(); ?>/public/images/right-arrow.png" alt="Next">
  </a> -->
</div>
		</div> 
		</div>
	</div>
	<div id="content" class="site-content" role="main">
		<div class="container">
			<div class="row" style="padding:20px 0;">
				<div class="col-sm-8">
					<div id="latest-articles">
						<div class="strip-bar">
							<h3>Latest Articles</h3>
							<div class="nav-controls">
								<a href="#" class="custom-prev">
									<img src="<?php echo base_url(); ?>public/images/left-arrow.png" alt="Prev">
								</a>
								<a href="#" class="custom-next">
									<img src="<?php echo base_url(); ?>public/images/right-arrow.png" alt="Next">
								</a>
							</div>
						</div>
						<div id="latest-articles-inner">						
					<div id="latest-article-results"></div>		
					<div class="paginatio-custom"><div class="pagination"></div></div>
					</div>
				</div>
				<div id="collab-section">					
					<div class="strip-bar"><h3>Collaborations and Indexing</h3>
						<div class="nav-controls">
							<a href="#myCarousel" data-slide="prev" class="prev">
								<img src="<?php echo base_url(); ?>public/images/left-arrow.png" alt="Prev">
							</a>
							<a href="#myCarousel" data-slide="next" class="next">
								<img src="<?php echo base_url(); ?>public/images/right-arrow.png" alt="Next">
							</a>
						</div>
					</div>							
					<div class="carousel slide" id="myCarousel">
						<div class="carousel-inner"> 
							<div class="item">
								<div class="row">
									<div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
										<a href="https://www.crossref.org/01company/06publishers.html" target="_blank"><img src="<?php echo base_url() ?>public/images/crossref.png" alt="crossref"></a>

									</div>
									<div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
										<a href="https://scholar.google.co.in/scholar?hl=en&amp;q=avensonline.org&amp;btnG=" target="_blank"><img src="<?php echo base_url() ?>public/images/googles.png" alt="google"></a>

									</div>								
									<div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
										<a href="https://www.icmje.org/journals-following-the-icmje-recommendations/" target="_blank"><img src="<?php echo base_url() ?>public/images/icje.png" alt="icje"></a>

									</div>
									<div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
										<a href="https://jgateplus.com/search/footer-html/PublisherPartners.jsp" target="_blank"><img src="<?php echo base_url() ?>public/images/jgate.png" alt="jgate"></a>

									</div>
								</div>
							</div>
							<div class="item">
								<div class="row">

									<div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">

										<!--<a href="#"><img src="<?php echo base_url() ?>public/images/slapcap.png" alt="Slapcap"></a>-->
										<a href="https://en.indexcopernicus.com/" target="_blank"><img src="<?php echo base_url() ?>public/images/copernicus.png" alt="Copernicus"></a>

									</div>								
									<div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
										<a href="https://www.worldcat.org/search?qt=worldcat_org_all&amp;q=avensonline.org" target="_blank"><img src="<?php echo base_url() ?>public/images/worldcat.png" alt="Worldcat"></a>

									</div>
									<div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
										<a href="https://www.crossref.org/crosscheck/index.html" target="_blank"><img src="<?php echo base_url() ?>public/images/crosscheck.png" alt="Crosscheck"></a>

									</div>
									<div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
										<a href="https://www.academickeys.com/" target="_blank"><img src="<?php echo base_url() ?>wp-content/uploads/academic-keys.png" alt="Academic Keys"></a>

									</div>
								</div>
							</div>	
							<div class="item active">
								<div class="row">

									<div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
										<a href="https://cse.google.com/cse?cx=partner-pub-4404998886222708%3A2259546848&amp;ie=UTF-8&amp;q=avensonline.org&amp;sa=Google&amp;siteurl=www.researchbib.com%2F&amp;ref=www.google.co.in%2F&amp;ss=1014j276500j5#gsc.tab=0&amp;gsc.q=avensonline.org&amp;gsc.page=1" target="_blank"><img src="<?php echo base_url() ?>public/images/rb.png" alt="rb"></a>

									</div>								
									<div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
										<a href="https://sciforum.net/statistics/publisher/journals/2366" target="_blank"><img src="<?php echo base_url() ?>public/images/scforum.png" alt="scforum"></a>

									</div>
									<div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
										<a href="https://www.drji.org/" target="_blank"><img src="<?php echo base_url() ?>public/images/drji.png" alt="drji"></a>

									</div>
									<div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
										<a href="https://www.sherpa.ac.uk/romeo/search.php?id=2458&amp;fIDnum=|&amp;mode=simple&amp;la=en" target="_blank"><img src="<?php echo base_url() ?>public/images/sherp-romeo.jpg" alt="Sherp Romeo"></a>

									</div>



								</div>
							</div>
							<div class="item">
								<div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
								<a href="https://miar.ub.edu/" target="_blank"><img src="<?php echo base_url() ?>wp-content/uploads/mair.jpg" alt="mair"></a>

							</div>	<div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
							<a href="https://journalseek.net/" target="_blank"><img src="<?php echo base_url() ?>/wp-content/uploads/logo-journalseek.gif" alt="Journalseek" width="125px" style="margin-top:60px;"></a>

						</div>
<div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
							<a href="https://cassi.cas.org/publication.jsp?P=LglBQf5Q2NQyz133K_ll3zLPXfcr-WXfMR1zrc-l1RNPxOTvACeoFzLPXfcr-WXfimSBIkq8XcUjhmk0WtYxmzLPXfcr-WXfVEAR9Bd-3Lj4n1xYPn0Www" target="_blank"><img src="<?php echo base_url() ?>wp-content/uploads/caslogotagline.jpg" alt="Caslogotagline" width="190px" style="margin-top:60px;"></a>

						</div>
<div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
										<a href="https://www.journaltocs.hw.ac.uk/" target="_blank"><img src="<?php echo base_url() ?>wp-content/uploads/journaltoc.jpg" height="91px" alt="journal Tocs"></a>

									</div>

</div>												            
					</div>
					<div class="view-all"></div>
				</div>
			</div>						
		</div>			
		<div class="col-sm-4">
			<div class="journal-cats">
				<div class="medical-bg cat-bar"><a href="<?php echo base_url(); ?>journals/?sort_type=medical">Medical</a></div>
				<div class="biotech-bg cat-bar"><a href="<?php echo base_url(); ?>journals/?sort_type=biotechnology">Biotechnology</a></div>
				<div class="biology-bg cat-bar"><a href="<?php echo base_url(); ?>journals/?sort_type=biology">Biology</a></div>
				<div class="pharmaceutical-bg cat-bar"><a href="<?php echo base_url(); ?>journals/?sort_type=pharmaceutical">Pharmaceutical</a></div>
			</div>
			<div id="subscription-wrapper">
				<div class="feedburner-email-subscription">
					<div class="fes-default">
						<p>Subscribe for updates</p>
						<form action="<?php echo base_url(); ?>subscribe/" method="post" id="home_subscribe_form" novalidate="novalidate">
							<div class="form-group">
								<label class="sr-only"><span class="screen-reader-text">Email Subscription</span></label>
								<input class="form-control search-field" type="text" value="Your email here" onfocus="if(this.value=='Your email here')this.value='';" onblur="if(this.value=='')this.value='Your email here'" name="email">
							</div>
							<button type="submit" class="btn btn-default btn-submit">Subscribe</button>			
							<input type="hidden" value="zourbuth" name="uri">
							<input type="hidden" name="loc" value="en_US">
						</form>
					</div></div>
				</div> 
<div id="join-with-us-widget" class="side-bar-spl-widget">
						<h3>Join with us as</h3>
							<div class="side-bar-spl-widget-inner">								
								<ul>
									<li><a onclick="$.generateModal('author')">Author</a></li>
									<li><a onclick="$.generateModal('editor')">Editor</a></li>
									<li><a onclick="$.generateModal('reviewer')">Reviewer</a></li>
								</ul>								
							</div>
					</div>
<?php /*				<div id="latest-updates">
					<div class="strip-bar">
						<h3>Latest Journal Updates</h3>
					</div>
					<div class="latest-updates-inner">
<div class="latest-update">
							<h4>Journal of Plant Biology &amp; Soil Health</h4>
							<p>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>biology/plant-biology-soil-health/home-23/">Papers Invited: Submission Deadline: 31-JULY-2017</a></p>
							<h4>Journal of Cardiobiology</h4>
							<p>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>medical/journal-of-cardiobiology-medical/home-50/">Submit articles: Submission Deadline: 31-JULY-2017</a></p>				</div> 
<?php echo $latest_updates_info[0]['latest_update_description']; ?>
						</div>
					</div> */?>
					<div id="social-links-widget" class="side-bar-spl-widget">
						<h3>Follow us on LinkedIn</h3>
						<div class="side-bar-spl-widget-inner">
						<div class="social-links">
	<ul class="list-inline footer-social">
		<li>
			<a target="_blank" href="https://www.facebook.com/www.avensonline.org?fref=ts">
				<img src="<?php echo base_url(); ?>public/images/ic-fb.png" alt="Facebook">
			</a>
		</li>
		<li>
			<a target="_blank" href="https://twitter.com/avensonline">
				<img src="<?php echo base_url(); ?>public/images/ic-tw.png" alt="Twitter">
			</a>
		</li>
<!---		<li>
			<a target="_blank" href="https://www.mendeley.com/profiles/avens-publishers/">
				<img src="<?php echo base_url(); ?>public/images/ic-gplus.png" alt="Google">
			</a>
		</li> --->
		<li>
			<a target="_blank" href="https://www.linkedin.com/in/avens-publishing-group-479a2b58/">
				<img src="<?php echo base_url(); ?>public/images/ic-in.png" alt="Linked In">
			</a>
		</li>
		<li>
			<a target="_blank" href="https://feeds.feedburner.com/Avens">
				<img src="<?php echo base_url(); ?>public/images/ic-rss.png" alt="Rss Feed">
			</a>
		</li>
		<li>
			<a target="_blank" href="https://avensonline.org/blog">
				<img src="<?php echo base_url(); ?>public/images/ic-blogger.png" alt="Avens Blog">
			</a>
		</li>
		<li>
			<a target="_blank" href="https://www.mendeley.com/profiles/avens-publishers/">
				<img src="<?php echo base_url(); ?>public/images/ic-mend.png" alt="Mendeley">
			</a>
		</li>


	</ul>
</div>	
</div>				
</div>

<div id="facebook-box">
<aside id="text-4" class="widget widget_text">			<div class="textwidget"><div class="fb-like-box fb_iframe_widget" data-href="https://www.facebook.com/www.avensonline.org" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true" data-width="260" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=562268420549512&amp;color_scheme=light&amp;container_width=257&amp;header=true&amp;href=https%3A%2F%2Fwww.facebook.com%2Fwww.avensonline.org&amp;locale=en_US&amp;sdk=joey&amp;show_border=true&amp;show_faces=true&amp;stream=false&amp;width=260"><span style="vertical-align: bottom; width: 260px; height: 213px;"><iframe name="f1ca319c07b9c2" width="260px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like_box Facebook Social Plugin" src="https://www.facebook.com/v2.0/plugins/like_box.php?app_id=562268420549512&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D42%23cb%3Df14a1087f1284bc%26domain%3Dwww.avensonline.org%26origin%3Dhttp%253A%252F%252Fwww.avensonline.org%252Ff6c33a7850a9bc%26relation%3Dparent.parent&amp;color_scheme=light&amp;container_width=257&amp;header=true&amp;href=https%3A%2F%2Fwww.facebook.com%2Fwww.avensonline.org&amp;locale=en_US&amp;sdk=joey&amp;show_border=true&amp;show_faces=true&amp;stream=false&amp;width=260" style="border: none; visibility: visible; width: 260px; height: 213px;" class=""></iframe></span></div></div>
		</aside>
</div>
</div>
</div>				
</div>			
</div><!-- #content -->
</div>
</div>