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
    <!--<meta name="description" content="<?php //echo isset($title) ? 'Avens Publishing Group - '.$title : 'Avens Publishing Group | Open Access Journals | Open Access Publications' ; ?>"/>-->
    <meta name="keywords" content="<?php echo $meta_keywords;?>" >
    
    <meta name="citation_title" content="<?php echo $title; ?>">
    <?php 
        if(!empty($authors) && isset($authors)) {
            foreach ($authors as $value) {
              echo '<meta name="citation_author" content="'.trim($value).'">'."\n";
            }
        }
        if(!empty($accepted_date) && isset($accepted_date)) {
            $accepted_date_obj = new DateTime($accepted_date);
            echo '<meta name="citation_online_date" content="'.date_format($accepted_date_obj, "Y/m/d").'">'."\n";
        }
        if(!empty($publication_date) && isset($publication_date)) {
            $publication_date_obj = new DateTime($publication_date);
            echo '<meta name="citation_publication_date" content="'.date_format($publication_date_obj, "Y/m/d").'">'."\n";
        }

        if(!empty($journal_name) && isset($journal_name)) {
            echo '<meta name="citation_journal_title" content="'.$journal_name.'">'."\n";
        }

        if(!empty($citation_volume) && isset($citation_volume)) {
                echo '<meta name="citation_volume" content="'.$citation_volume.'">'."\n";
        }
        if(!empty($citation_issue) && isset($citation_issue)) {
                echo '<meta name="citation_issue" content="'.$citation_issue.'">'."\n";
        }
        if(!empty($citation_firstpage) && isset($citation_firstpage)) {
                echo '<meta name="citation_firstpage" content="'.$citation_firstpage.'">'."\n";
        }
        if(!empty($citation_lastpage) && isset($citation_lastpage)) {
                echo '<meta name="citation_lastpage" content="'.$citation_lastpage.'">'."\n";
        }
        if(!empty($issn_number) && isset($issn_number)) {
            echo '<meta name="citation_issn" content="'.$issn_number.'">'."\n";
        }
        if(!empty($doi_name) && isset($doi_name)) {
            echo '<meta name="citation_doi" content="'.$doi_name.'">'."\n";
        }
    ?>
    <meta name="citation_pdf_url" content="https://www.avensonline.org/wp-content/uploads/<?php echo $post_title; ?>.pdf">
    <meta name="citation_fulltext_html_url" content="<?php echo base_url(); ?>fulltextarticles/<?php echo $post_title; ?>.html">
    <meta name="citation_publisher" content="Avens Publishing Group">
    <meta name="citation_language" content="en">
    <meta name="robots" content="index, follow" />

    <!--[if lt IE 9]>
    <script src="https://www.avensonline.org/wp-content/themes/twentythirteen/js/html5.js"></script>
    <![endif]-->
    <title><?php echo isset($title) ? 'Avens Publishing Group - '.$title : 'Avens Publishing Group | Open Access Journals | Open Access Publications' ; ?></title>
    
    <link href='https://fonts.googleapis.com/css?family=Kreon:300,400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' id='genericons-css'  href='<?php echo base_url(); ?>public/css/genericons.css' type='text/css' media='all' >
    <link rel='stylesheet' id='twentythirteen-style-css'  href='<?php echo base_url(); ?>public/css/style.css' type='text/css' media='all' >
    <!--[if lt IE 9]>
    <link rel='stylesheet' id='twentythirteen-ie-css'  href='https://www.avensonline.org/wp-content/themes/twentythirteen/css/ie.css?ver=2013-07-18' type='text/css' media='all' />
    <![endif]-->
    <link rel='stylesheet' id='avhec-widget-css'  href='<?php echo base_url(); ?>public/css/avh-ec.widget.css' type='text/css' media='all' >
    
    
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
    
    
    <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/responsive.css">
    <link rel="stylesheet" href="https://www.avensonline.org/fulltextarticles/wp-content/themes/twentytwelve/theme.css">
    <link rel="canonical" href="<?php echo base_url(); ?>fulltextarticles/<?php echo $post_title; ?>.html" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src='//platform-api.sharethis.com/js/sharethis.js#property=5a9b9d3369eea20013a19701&product=social-ab' async='async'></script>
    
    
    <script>
    $(document).ready(function(){
    if($('.sitation-link').length == 0) {
    $('#myScrollspy').find('#myNav').append('<li class="sitation-link"><a href="#" data-toggle="modal" data-target="#myModal">Citation</a></li>');
    }
    $('.modal-header').on('click', function(){
    $('#myModal').modal('hide');
    });
    });
    </script>
        <style>
.fulltext-wrap a{color:#428bca !important;}
    body{text-align: left;
                     font-family: Roboto, Helvetica, Arial, sans-serif;
font-size: 15px;
line-height: 26px;
                     }
.fulltext-wrap #References ol li,.fulltext-wrap #references ol li {margin:10px 0;}
.fulltext-wrap p {font-size:14px;}
#references ol {margin-left:20px;}
#references ol li {list-style-type:decimal;}
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

    <style>
      .journal-name{background: url("<?php echo base_url(); ?>public/images/journal-banners/<?php echo $fulltext_info[0]['banner_image'] ?>") no-repeat scroll center top / 1600px auto;text-align: center;padding: 90px;position:relative;
      background-repeat:no-repeat;
      -webkit-background-size:cover;
      -moz-background-size:cover;
      -o-background-size:cover;
      background-size:cover;
      background-position:center;
    }
    #journal-sidebar-wrapper {margin: -40px 0 0;}
    #content {width: 100% !important;}
  }
.site-main{position:relative;}
    .nav-tabs{
        width: 220px;        
        border-radius: 0;
        border: 1px solid #ddd;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.067);
    }
    .nav-tabs li{
        margin: 0;
        border-top: 1px solid #ddd;
    }
    .nav-tabs li:first-child{
        border-top: none;
    }
    .nav-tabs li a{
        margin: 0;
        padding: 8px 6px;
        border-radius: 0;
        text-align: center;
        color: #000000 !important;
    }    
    .nav-tabs li.active a, .nav-tabs li.active a:hover{
        color: #000000;
        background: #ebebeb;
        border: none;
    }
    .nav-stacked>li+li{margin-top:0; }
    .nav-tabs li:first-child a{
        border-radius: 4px 4px 0 0;
    }
    .nav-tabs li:last-child a{
        border-radius: 0 0 4px 4px;
    }
    .nav-tabs.affix{
        top: 0; /* Set the top position of pinned element */
    }
    .entry-content table,.entry-content table td{border: 1px solid #cccccc;}
    #myScrollspy {
      float: left;
      width: 140px;
  }
  .nav-tabs{background: #ffffff;}
  #social-box{padding: 10px;background: #ffffff;border-radius: 5px;}
  .side-bar-box{   
     width: 220px;
    position: absolute;
    top: 470px;
    border: 1px solid #ddd;
    text-align: center;
}
  footer[role="contentinfo"]{border-top: none;}
  #myModal h4{font-size: 18px;margin: 0;}
  .modal-dialog{width: 270px;}
  .entry-content h2.ref{font-size: 16px;font-weight: bold;}
  ul.nav-box li:last-child{border-right: 0 none;}
  .btn{font-size: 15px;}
  .site-content article{border: none;margin: 0 0 0 0;}
  .form-group{overflow: hidden;}
  #reprints_order_form label{font-weight: normal;}
  #reprints_order_form sup,.error{color: #ff0000;font-weight: normal;}  
  /* 
  .site-content article{border-bottom: none;}
  .entry-content table{font-size: 1.2em;}
  #myModal h4{font-size: 1.5em;}
  .modal-header{height: 50px;} */
.side-bar-box.fix-pos{position:fixed;}
#content-right{width: 820px !important;}
h1,h2,h3 {margin: 1.714285714rem 0;line-height: 1.5;}
.fulltext-wrap {margin: 30px 0;text-align: justify !important;position:relative;}
.fulltext-wrap ol, ul {list-style: none;margin: 0;padding: 0;}
#References ol,#References ul{list-style-type: decimal !important;margin-left: 20px;}
h2.ref {
    font-size: 16px;
    font-weight: bold;
}
#figure {
    margin: 15px 0;
}
#myModal .modal-header {cursor:pointer;}
#myModal .modal-header h4 {
    float: left;
    margin-right: 132px;
}
#myModal .modal-body {text-align:left;}
.fulltext-main-part {line-height:28px;}
   .fulltext-main-part .small-title {margin-bottom:20px;}
   .fulltext-main-part h1,.fulltext-main-part h2,.fulltext-main-part h3{margin: 0;padding: 0 0 20px 0;}
   .fulltext-main-part .para-text{padding-bottom: 20px;}
   .fulltext-main-part .info-main-heading {font-size: 20px;margin:0 0 10px 0;padding:0;font-weight:bold;}
   .fulltext-main-part .info-sub-heading {
    font-size: 18px;
    margin: 0;
    padding: 0 0 10px 0;
   }
   .fulltext-main-part .para-text ul {margin-left:20px;}
   .fulltext-main-part .para-text ul li {list-style-type: disc !important;}
   .fulltext-main-part .f-info-box {border-bottom: 1px solid #ccc;margin-bottom:20px;}
   .fulltext-main-part .f-info-box:last-child {border-bottom:0 none;}
   .fulltext-main-part .figure-info-box {
    background-color: #cccccc;
    padding: 15px;
    margin: 0 0 20px 0;
    overflow:hidden;
    }
   .fulltext-main-part .figure-info-box img {
    float: left;
    margin: 7px 10px 5px 0;
    display: inline-block;
    }
   .fulltext-main-part .article-main-part ul li {margin-bottom:10px;}
   .fulltext-main-part hr {padding:0;margin:20px 0;}
   .fulltext-main-part #references-info ol {list-style-type:decimal;margin:0 0 10px 15px;}
   .fulltext-main-part #references-info ol li {margin-bottom:5px;}
   ul.new-ul-with-bullets {margin-left:20px;}
   ul.new-ul-with-bullets li {list-style-type: disc !important;}
   .foot-note-border {
            border-top: 1px solid #ccc;
    width: 15%;
    margin-top: 0;
    margin-bottom: 0px;
   }
   .footnote-info-box {font-size:12px;}
a.download-pdf-btn {
    position: absolute;
    right: 15px;
    top: 8px;
    background: url(https://www.avensonline.org/public/images/download.png) no-repeat;
    background-size: 18%;
    display: inline-block;
    background-position: 0px 5px;
    background-color: #e6e0e0;
    padding: 2px 5px 0 40px;
    background-position: 5px center;
    border: 1px solid #ccc;
    border-radius: 3px;
    font-size: 13px;
    display: inline-block;
    vertical-align: middle;
    z-index:99;
}
@media screen and (max-width: 1200px) {
  #myScrollspy,#myScrollspy1 {
      width: 100%;
  }
  #myScrollspy .nav-tabs, #myScrollspy1 .nav-tabs {
      width:100%;
      margin-top: 10px;
      margin-bottom: 10px;
  }
  #content-right {
      width: 100% !important;
  }
  #colophon .container {
      width: 100% !important;
  }
  #colophon #footer-top {
      height: auto;
  }
  a.download-pdf-btn {
      top: -25px;
      right:0;
  }
}

.fulltext-main-part .figure-box {
          text-align: center;
    background: #ccc;
    margin: 20px 0;
    padding: 20px;
  }
  
</style>

</head>
<body class="blog single-author sidebar">
<div id="page" class="hfeed site">
	<div class="container">
		<div class="row" style="margin:10px 0">
			<div class="col-sm-4" id="logo-box">
				<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url() ?>public/images/logo.png" alt="Avens Publishing Group" class="img-responsive"></a>
			</div>
			<div class="col-sm-8 text-right hidden-xs">
			<?php 				
				if($this->uri->segment(1) =='fulltextarticles'){
					$img_name = '7and8.gif';
				}	
				echo '<img src="'.base_url().'public/images/animatedbanners/'.$img_name.'" alt="Avens Publishing Group" >';

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
				<li class="menu-item <?php echo (($this->uri->segment(2) == '')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>">Home</a></li>
				<li class="menu-item <?php echo (($this->uri->segment(2) == 'about_us')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>about-us/">About Us</a></li>
				<li class="menu-item <?php echo (($this->uri->segment(2) == 'journals')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>journals/">Journals</a></li>
				<li class="menu-item <?php echo (($this->uri->segment(2) == 'submit_manuscript')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>submit-manuscript/">Submit Manuscript</a></li>
				<li class="menu-item <?php echo (($this->uri->segment(2) == 'processing_fee')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>processing-fee/">Processing Fee</a></li>
				<li class="menu-item <?php echo (($this->uri->segment(2) == 'collaborations')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>collaborations/">Collaborations</a></li>
				<li class="menu-item <?php echo (($this->uri->segment(2) == 'membership')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>membership/">Membership</a></li>
				<li class="menu-item <?php echo (($this->uri->segment(2) == 'policies')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>policies/">Policies</a></li>
				<li class="menu-item <?php echo (($this->uri->segment(2) == 'contact')?'current_page_item':''); ?>"><a href="<?php echo base_url(); ?>contact/">Contact</a></li>

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