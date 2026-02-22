<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US" prefix="og: https://ogp.me/ns#">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US" prefix="og: https://ogp.me/ns#">
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html lang="en-US" prefix="og: https://ogp.me/ns#">
<!--<![endif]-->
<head>
	<!-- <meta charset="UTF-8"> -->
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

<!--[if lt IE 9]>
<script src="https://www.avensonline.org/wp-content/themes/twentythirteen/js/html5.js"></script>
<![endif]-->
<title><?php echo isset($title) ? $title : 'Avens Publishing Group | Open Access Journals | Open Access Publications' ; ?></title>
<?php
if(isset($description) && !empty($description)) {
echo "<meta name='description' content='".$description."'/>";
} else {
echo "<meta name='description' content='".$title."'/>";
}
?>
<?php
if(isset($keywords) && !empty($keywords)) {
echo "<meta name='keywords' content='".$keywords."'/>";
} else {
echo "<meta name='keywords' content='".$title."'/>";
}
?>


<link rel="canonical" href="https://www.avensonline.org" />
<!--<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>public/images/favicon-96x96.png">-->
<meta property="og:title" content="Avens Publishing Group | Open Access Journals | Open Access Publications" />
<meta property="og:description" content="Avens Publishing Group-Home Page-Open Access Journals. Open Access Publications provides all the latest updates and happenings of all the journals of Avens Publishing Group." />
<meta property="og:image" content="https://www.avensonline.org/fav-icons/apple-icon-57x57.png" />
<meta property="og:url" content="https://www.avensonline.org" />
<meta property="og:type" content="avensonline home page" />
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>fav-icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>fav-icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>fav-icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>fav-icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>fav-icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>fav-icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>fav-icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>fav-icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>fav-icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url(); ?>fav-icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>fav-icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>fav-icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>fav-icons/favicon-16x16.png">
<link rel="manifest" href="<?php echo base_url(); ?>fav-icons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo base_url(); ?>fav-icons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<link href='https://fonts.googleapis.com/css?family=Kreon:300,400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
<link rel='stylesheet' id='genericons-css'  href='<?php echo base_url(); ?>public/css/genericons.css' type='text/css' media='all' />
<link rel='stylesheet' id='twentythirteen-style-css'  href='<?php echo base_url(); ?>public/css/style.css' type='text/css' media='all' />
<!--[if lt IE 9]>
<link rel='stylesheet' id='twentythirteen-ie-css'  href='https://www.avensonline.org/wp-content/themes/twentythirteen/css/ie.css?ver=2013-07-18' type='text/css' media='all' />
<![endif]-->
<link rel='stylesheet' id='avhec-widget-css'  href='<?php echo base_url(); ?>public/css/avh-ec.widget.css' type='text/css' media='all' />

<link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/theme.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/responsive.css">
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GDBB14B1EB"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GDBB14B1EB');
</script>

</head>
<body class="blog single-author sidebar">
<div id="page" class="hfeed site">
	<div class="container">
		<div class="row" style="margin:10px 0">
			<div class="col-sm-4" id="logo-box">
				<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url() ?>public//images/logo.png" alt="Avens Publishing Group" class="img-responsive"></a>
			</div>
			<div class="col-sm-8 text-right hidden-xs">
			<?php 
				if($this->uri->segment(1) =='') {
					$img_name = '1and2.gif';
				} else if($this->uri->segment(1) =='about-us') {
					$img_name = '3and4.gif';
				} else if($this->uri->segment(1) =='journals' || $this->uri->segment(1) =='medical' || $this->uri->segment(1) =='biotechnology' || $this->uri->segment(1) =='biology' || $this->uri->segment(1) =='pharmaceutical') {					
					$img_name = '5and6.gif';
				} else if($this->uri->segment(1) =='submit-manuscript') {
					$img_name = '7and8.gif';
				} else if($this->uri->segment(1) =='processing-fee') {
					$img_name = '9and10.gif';
				} else if($this->uri->segment(1) =='collaborations') {
					$img_name = '1and2.gif';
				} else if($this->uri->segment(1) =='membership') {
					$img_name = '3and4.gif';
				} else if($this->uri->segment(1) =='policies') {
					$img_name = '5and6.gif';
				} else if($this->uri->segment(1) =='contact') {
					$img_name = '7and8.gif';
				} else if($this->uri->segment(1) =='subscribe') {
					$img_name = '7and8.gif';
				} else if($this->uri->segment(2) =='search'){
					$img_name = '7and8.gif';
				} else if($this->uri->segment(2) =='testimonials'){
					$img_name = '7and8.gif';
				}else if($this->uri->segment(2) =='get_journal_articles' || $this->uri->segment(2) == 'get_journal_impact_factor'){
					$img_name = '7and8.gif';
				}	
				echo '<img src="'.base_url().'public/images/animatedbanners/'.$img_name.'" alt="Avens Publishing Group" />';

			 ?>			
			</div>
		</div>
	</div>
</div>
<div class="site-header">
	<div id="navbar" class="navbar">
		<nav id="site-navigation" class="navigation main-navigation" role="navigation">
			<button class="menu-toggle">Menu</button>
			<a class="screen-reader-text skip-link" href="#content" title="Skip to content">Skip to content</a>
			<div class="menu-main-menu-container">
			<ul id="menu-main-menu" class="nav-menu">			
				<li class="menu-item <?php echo (($this->uri->segment(1) == '')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>">Home</a></li>
				<li class="menu-item <?php echo (($this->uri->segment(1) == 'about-us')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>about-us/">About Us</a></li>
				<li class="menu-item <?php echo (($this->uri->segment(1) == 'journals')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>journals/">Journals</a></li>
				<li class="menu-item <?php echo (($this->uri->segment(1) == 'submit-manuscript')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>submit-manuscript/">Submit Manuscript</a></li>
				<li class="menu-item <?php echo (($this->uri->segment(1) == 'processing-fee')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>processing-fee/">Processing Fee</a></li>
				<li class="menu-item <?php echo (($this->uri->segment(1) == 'collaborations')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>collaborations/">Collaborations</a></li>
				<li class="menu-item <?php echo (($this->uri->segment(1) == 'membership')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>membership/">Membership</a></li>
				<li class="menu-item <?php echo (($this->uri->segment(1) == 'policies')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>policies/">Policies</a></li>
				<li class="menu-item <?php echo (($this->uri->segment(1) == 'contact')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>contact/">Contact</a></li>

			</ul>
			</div>
			<form role="search" method="get" class="search-form" action="<?php echo base_url(); ?>page/search">
			<label>
				<span class="screen-reader-text">Search for:</span>
				<input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Search for:">
			</label>
			<input type="submit" class="search-submit" value="Search">
		</form>			</nav><!-- #site-navigation -->
	</div><!-- #navbar -->
</div>