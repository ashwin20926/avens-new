<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>fav-icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="keywords" content="<?php echo $meta_keywords; ?>" >
    
    <meta name="citation_title" content="<?php echo $title; ?>">
    <?php
    if (!empty($authors) && isset($authors)) {
        foreach ($authors as $value) {
            echo '<meta name="citation_author" content="' .
                trim($value) .
                '">' .
                "\n";
        }
    }
    if (!empty($accepted_date) && isset($accepted_date)) {
        $accepted_date_obj = new DateTime($accepted_date);
        echo '<meta name="citation_online_date" content="' .
            date_format($accepted_date_obj, "Y/m/d") .
            '">' .
            "\n";
    }
    if (!empty($publication_date) && isset($publication_date)) {
        $publication_date_obj = new DateTime($publication_date);
        echo '<meta name="citation_publication_date" content="' .
            date_format($publication_date_obj, "Y/m/d") .
            '">' .
            "\n";
    }

    if (!empty($journal_name) && isset($journal_name)) {
        echo '<meta name="citation_journal_title" content="' .
            $journal_name .
            '">' .
            "\n";
    }

    if (!empty($citation_volume) && isset($citation_volume)) {
        echo '<meta name="citation_volume" content="' .
            $citation_volume .
            '">' .
            "\n";
    }
    if (!empty($citation_issue) && isset($citation_issue)) {
        echo '<meta name="citation_issue" content="' .
            $citation_issue .
            '">' .
            "\n";
    }
    if (!empty($citation_firstpage) && isset($citation_firstpage)) {
        echo '<meta name="citation_firstpage" content="' .
            $citation_firstpage .
            '">' .
            "\n";
    }
    if (!empty($citation_lastpage) && isset($citation_lastpage)) {
        echo '<meta name="citation_lastpage" content="' .
            $citation_lastpage .
            '">' .
            "\n";
    }
    if (!empty($issn_number) && isset($issn_number)) {
        echo '<meta name="citation_issn" content="' .
            $issn_number .
            '">' .
            "\n";
    }
    if (!empty($doi_name) && isset($doi_name)) {
        echo '<meta name="citation_doi" content="' . $doi_name . '">' . "\n";
    }
    ?>
    <meta name="citation_pdf_url" content="https://www.avensonline.org/wp-content/uploads/<?php echo $post_title; ?>.pdf">
    <meta name="citation_fulltext_html_url" content="<?php echo base_url(); ?>fulltextarticles/<?php echo $post_title; ?>.html">
    <meta name="citation_publisher" content="Avens Publishing Group">
    <meta name="citation_language" content="en">
    <meta name="robots" content="index, follow" />
    <title><?php echo isset($title)
        ? "Avens Publishing Group - " . $title
        : "Avens Publishing Group | Open Access Journals | Open Access Publications"; ?></title>    
    <link href='https://fonts.googleapis.com/css?family=Kreon:300,400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' id='genericons-css'  href='<?php echo base_url(); ?>public/css/genericons.css' type='text/css' media='all' >
    <link rel='stylesheet' id='twentythirteen-style-css'  href='<?php echo base_url(); ?>public/css/style.css' type='text/css' media='all' >    
    <link rel='stylesheet' id='avhec-widget-css'  href='<?php echo base_url(); ?>public/css/avh-ec.widget.css' type='text/css' media='all' >
    <link rel="icon" sizes="144x144" href="<?php echo base_url(); ?>fav-icons/apple-icon-144x144.png">
    <link rel="manifest" href="<?php echo base_url(); ?>fav-icons/manifest.json">
    <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/responsive.css">
    <link rel="stylesheet" href="https://www.avensonline.org/fulltextarticles/wp-content/themes/twentytwelve/theme.css">
    <link rel="canonical" href="<?php echo base_url(); ?>fulltextarticles/<?php echo $post_title; ?>.html" />
    <script src='//platform-api.sharethis.com/js/sharethis.js#property=5a9b9d3369eea20013a19701&product=social-ab' async='async'></script>
    <link rel="stylesheet" href="https://www.avensonline.org/fulltextarticles/wp-content/themes/twentytwelve/theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/fulltext.css">

</head>
<body class="blog single-author sidebar">
<div id="page" class="hfeed site">
	<div class="container">
		<div class="row" style="margin:10px 0">
			<div class="col-sm-4" id="logo-box">
				<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>public/images/logo.png" alt="Avens Publishing Group" class="img-responsive"></a>
			</div>
			<div class="col-sm-8 text-right hidden-xs">
			<?php
   if ($this->uri->segment(1) == "fulltextarticles") {
       $img_name = "7and8.gif";
   }
   echo '<img src="' .
       base_url() .
       "public/images/animatedbanners/" .
       $img_name .
       '" alt="Avens Publishing Group" >';
   ?>			
			</div>
		</div>
	</div>
</div>
<div class="site-header">
	<div id="navbar" class="navbar">
		<nav id="site-navigation" class="navigation main-navigation">
			<button class="menu-toggle">Menu</button>
			<a class="screen-reader-text skip-link" href="#content" title="Skip to content">Skip to content</a>
			<div class="menu-main-menu-container">
			<ul id="menu-main-menu" class="nav-menu">			
				<li class="menu-item <?php echo $this->uri->segment(2) == ""
        ? "current_page_item"
        : ""; ?>"><a href="<?php echo base_url(); ?>">Home</a></li>
				<li class="menu-item <?php echo $this->uri->segment(2) == "about_us"
        ? "current_page_item"
        : ""; ?>"><a href="<?php echo base_url(); ?>about-us/">About Us</a></li>
				<li class="menu-item <?php echo $this->uri->segment(2) == "journals"
        ? "current_page_item"
        : ""; ?>"><a href="<?php echo base_url(); ?>journals/">Journals</a></li>
				<li class="menu-item <?php echo $this->uri->segment(2) == "submit_manuscript"
        ? "current_page_item"
        : ""; ?>"><a href="<?php echo base_url(); ?>submit-manuscript/">Submit Manuscript</a></li>
				<li class="menu-item <?php echo $this->uri->segment(2) == "processing_fee"
        ? "current_page_item"
        : ""; ?>"><a href="<?php echo base_url(); ?>processing-fee/">Processing Fee</a></li>
				<li class="menu-item <?php echo $this->uri->segment(2) == "collaborations"
        ? "current_page_item"
        : ""; ?>"><a href="<?php echo base_url(); ?>collaborations/">Collaborations</a></li>
				<li class="menu-item <?php echo $this->uri->segment(2) == "membership"
        ? "current_page_item"
        : ""; ?>"><a href="<?php echo base_url(); ?>membership/">Membership</a></li>
				<li class="menu-item <?php echo $this->uri->segment(2) == "policies"
        ? "current_page_item"
        : ""; ?>"><a href="<?php echo base_url(); ?>policies/">Policies</a></li>
				<li class="menu-item <?php echo $this->uri->segment(2) == "contact"
        ? "current_page_item"
        : ""; ?>"><a href="<?php echo base_url(); ?>contact/">Contact</a></li>

			</ul>
			</div>
			<form role="search" method="get" class="search-form" action="<?php echo base_url(); ?>/page/search">
			<label>
				<span class="screen-reader-text">Search for:</span>
				<input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Search for:">
			</label>
			<input type="submit" class="search-submit" value="Search">
		</form>			</nav><!-- #site-navigation -->
	</div><!-- #navbar -->
</div>