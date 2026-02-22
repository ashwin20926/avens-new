<header id="masthead" class="site-header subscribe-page" role="banner">
  <div class="home-link">
<h2>Subscribe</h2><!-- <h1 class="site-title"></h1>
<h2 class="site-description"></h2> -->
</div>
</header>
<div id="main" class="site-main"><style type="text/css">
  #errorfiled
  {
    color: #CB4444;
  }
  #colophon{margin:0 !important;}
  .disp_msg
  {
    position: absolute;
    display: none;
    width: 80%;
    /* top: 50%; */
    left: 10%;
    text-align: center;
    background-color: #47D55E;
    color: #fff;
    padding: 15px;
    z-index: 99;
  }
  .error {
    color: #ff0000 !important;
    font-weight: normal;
  }
</style>

<div class="disp_msg">
  We will Get Back To You Soon
</div>
<div class="hentry">
  <div class="container">
    <div class="row">
         
      <div class="row">
        <div class="col-sm-8">      
         <div class="container-inner">			
					<div class="page-heading">
						<h1>Subscribe</h1>
					</div>
					<div class="row">
                                        <form action="" method="post" id="subscribe_form" novalidate="novalidate">
					<div class="form-group">
						<label class="col-sm-4">*Name:</label>
						<div class="col-sm-6">
							<input class="form-control" name="person_name" type="text" value="" placeholder="Name">
							<label class="errorfield1" id="errorfiled"></label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4">*E-mail:</label>
						<div class="col-sm-6"><input id="email" class="form-control" name="email" type="text" value="<?php echo isset($_POST['email'])?$_POST['email']:''?>" placeholder="Email">
							<label class="errorfield2" id="errorfiled"></label>
						</div>
						
					</div>
                                          <div class="form-group">                                               
						<!--- <label class="col-sm-4">Send me mails</label> --->
                                                <p class="col-sm-4">Subscribe options</p>
						<div class="col-sm-6">
                                                      <div class="radio"><label><input type="radio" name="time_wise" checked="" id="daily" value="Receive email alerts for all new published articles.">Receive email alerts for all new published articles.</label></div>
                                                     <div class="radio"><label><input type="radio" name="time_wise" id="weekly" value="Receive monthly updates of articles published in the journal.">Receive monthly updates of articles published in the journal.</label></div>   
                                                       <!--- <div class="radio-inline"><label><input type="radio" name="time_wise" id="monthly" value="Monthly" />Monthly</label></div> --->     
						</div>
						
					</div>
                                   <div class="row">
                                   <div class="col-sm-12">
				<div class="col-sm-6"><div class="post-list ">
                                        <div class="check_all"><div class="checkbox"><label><input type="checkbox" name="medi_select_all" rel="medical" id="medi_select_all">Select All</label></div></div>
                                         <h3>Medical</h3>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Advances in Diabetes &amp; Endocrinology" name="medical_cat_name[]" class="medical_cat_name">Advances in Diabetes &amp; Endocrinology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="International Journal of Otorhinolaryngology" name="medical_cat_name[]" class="medical_cat_name">International Journal of Otorhinolaryngology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Addiction &amp; Prevention" name="medical_cat_name[]" class="medical_cat_name">Journal of Addiction &amp; Prevention							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Andrology &amp; Gynaecology" name="medical_cat_name[]" class="medical_cat_name">Journal of Andrology &amp; Gynaecology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Cancer Sciences" name="medical_cat_name[]" class="medical_cat_name">Journal of Cancer Sciences							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Cardiobiology" name="medical_cat_name[]" class="medical_cat_name">Journal of Cardiobiology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Clinical &amp; Medical Case Reports" name="medical_cat_name[]" class="medical_cat_name">Journal of Clinical &amp; Medical Case Reports							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Clinical and Investigative Dermatology" name="medical_cat_name[]" class="medical_cat_name">Journal of Clinical and Investigative Dermatology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Clinical Trials &amp; Patenting" name="medical_cat_name[]" class="medical_cat_name">Journal of Clinical Trials &amp; Patenting							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Emergency Medicine &amp; Critical Care" name="medical_cat_name[]" class="medical_cat_name">Journal of Emergency Medicine &amp; Critical Care							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Epidemiology &amp; Health Care" name="medical_cat_name[]" class="medical_cat_name">Journal of Epidemiology &amp; Health Care							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Forensic Investigation" name="medical_cat_name[]" class="medical_cat_name">Journal of Forensic Investigation							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Gene Therapy" name="medical_cat_name[]" class="medical_cat_name">Journal of Gene Therapy							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Geriatrics and Palliative Care" name="medical_cat_name[]" class="medical_cat_name">Journal of Geriatrics and Palliative Care							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Hematology &amp; Thrombosis" name="medical_cat_name[]" class="medical_cat_name">Journal of Hematology &amp; Thrombosis							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Human Anatomy &amp; Physiology" name="medical_cat_name[]" class="medical_cat_name">Journal of Human Anatomy &amp; Physiology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Integrative Medicine &amp; Therapy" name="medical_cat_name[]" class="medical_cat_name">Journal of Integrative Medicine &amp; Therapy							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Neurology and Psychology" name="medical_cat_name[]" class="medical_cat_name">Journal of Neurology and Psychology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Nutrition &amp; Health" name="medical_cat_name[]" class="medical_cat_name">Journal of Nutrition &amp; Health							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Obesity and Bariatrics" name="medical_cat_name[]" class="medical_cat_name">Journal of Obesity and Bariatrics							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Ocular Biology" name="medical_cat_name[]" class="medical_cat_name">Journal of Ocular Biology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Oral Biology" name="medical_cat_name[]" class="medical_cat_name">Journal of Oral Biology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Orthopedics &amp; Rheumatology" name="medical_cat_name[]" class="medical_cat_name">Journal of Orthopedics &amp; Rheumatology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Parkinson’s disease and Alzheimer's disease" name="medical_cat_name[]" class="medical_cat_name">Journal of Parkinson’s disease and Alzheimer's disease							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Pediatrics &amp; Child Care" name="medical_cat_name[]" class="medical_cat_name">Journal of Pediatrics &amp; Child Care							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Surgery" name="medical_cat_name[]" class="medical_cat_name">Journal of Surgery							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Syndromes" name="medical_cat_name[]" class="medical_cat_name">Journal of Syndromes							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Urology &amp; Nephrology" name="medical_cat_name[]" class="medical_cat_name">Journal of Urology &amp; Nephrology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Veterinary Science &amp; Medicine" name="medical_cat_name[]" class="medical_cat_name">Journal of Veterinary Science &amp; Medicine							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
									</div></div>
                               <div class="col-sm-6"><div class="post-list ">
                                         <div class="check_all"><div class="checkbox"><label><input type="checkbox" name="bio_select_all" id="bio_select_all">Select All</label></div></div>
                                         <h3>Biotechnology</h3>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Bioanalysis &amp; Biostatistics" name="bio_cat_name[]" class="bio_cat_name">Journal of Bioanalysis &amp; Biostatistics							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Bioelectronics and Nanotechnology" name="bio_cat_name[]" class="bio_cat_name">Journal of Bioelectronics and Nanotechnology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Food Processing &amp; Beverages" name="bio_cat_name[]" class="bio_cat_name">Journal of Food Processing &amp; Beverages							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Metabolomics &amp; Systems Biology" name="bio_cat_name[]" class="bio_cat_name">Journal of Metabolomics &amp; Systems Biology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Microbiology &amp; Microbial Technology" name="bio_cat_name[]" class="bio_cat_name">Journal of Microbiology &amp; Microbial Technology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Oncobiomarkers" name="bio_cat_name[]" class="bio_cat_name">Journal of Oncobiomarkers							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Proteomics &amp; Computational Biology" name="bio_cat_name[]" class="bio_cat_name">Journal of Proteomics &amp; Computational Biology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Transplantation &amp; Stem Cell Biology" name="bio_cat_name[]" class="bio_cat_name">Journal of Transplantation &amp; Stem Cell Biology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Vaccine &amp; Immunotechnology" name="bio_cat_name[]" class="bio_cat_name">Journal of Vaccine &amp; Immunotechnology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
									</div></div>
                               <div class="col-sm-6"><div class="post-list ">
                                         <div class="check_all"><div class="checkbox"><label><input type="checkbox" name="biol_select_all" id="biol_select_all">Select All</label></div></div>
                                         <h3>Biology</h3>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Biowar &amp; Biodefence" name="biol_cat_name[]" class="biol_cat_name">Journal of Biowar &amp; Biodefence							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Cytology &amp; Molecular Biology" name="biol_cat_name[]" class="biol_cat_name">Journal of Cytology &amp; Molecular Biology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Environmental Studies" name="biol_cat_name[]" class="biol_cat_name">Journal of Environmental Studies							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Plant Biology &amp; Soil Health" name="biol_cat_name[]" class="biol_cat_name">Journal of Plant Biology &amp; Soil Health							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Toxins" name="biol_cat_name[]" class="biol_cat_name">Journal of Toxins							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
									</div></div>
                               
                                <div class="col-sm-6"><div class="post-list ">
                                         <div class="check_all"><div class="checkbox"><label><input type="checkbox" name="phar_select_all" id="phar_select_all">Select All</label></div></div>
                                         <h3>Pharmaceutical</h3>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Analytical &amp; Molecular Techniques" name="phar_select_all[]" class="phar_cat_name">Journal of Analytical &amp; Molecular Techniques							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Chemistry and Applications" name="phar_select_all[]" class="phar_cat_name">Journal of Chemistry and Applications							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
																	<div class="checkbox">
							<label>
                                                          <input type="checkbox" value="Journal of Pharmaceutics &amp; Pharmacology" name="phar_select_all[]" class="phar_cat_name">Journal of Pharmaceutics &amp; Pharmacology							  <a href=""> </a><span class="pull-right"></span>
                                                        </label>
						</div>
									</div></div></div></div>
					
<div class="form-group">
	<div class="col-sm-6"><input type="submit" name="submit" class="btn btn-success"> </div>
</div>
</form>
</div>
</div>
          </div>
          <div class="col-sm-4">	<div id="tertiary" class="sidebar-container" role="complementary">
            <div class="sidebar-inner">
              <div class="widget-area">
                <aside id="text-4" class="widget widget_text">			<div class="textwidget"><div class="fb-like-box fb_iframe_widget" data-href="https://www.facebook.com/www.avensonline.org" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true" data-width="260" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=562268420549512&amp;color_scheme=light&amp;container_width=257&amp;header=true&amp;href=https%3A%2F%2Fwww.facebook.com%2Fwww.avensonline.org&amp;locale=en_US&amp;sdk=joey&amp;show_border=true&amp;show_faces=true&amp;stream=false&amp;width=260"><span style="vertical-align: bottom; width: 260px; height: 213px;"><iframe name="f1ca319c07b9c2" width="260px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like_box Facebook Social Plugin" src="https://www.facebook.com/v2.0/plugins/like_box.php?app_id=562268420549512&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D42%23cb%3Df14a1087f1284bc%26domain%3Dwww.avensonline.org%26origin%3Dhttp%253A%252F%252Fwww.avensonline.org%252Ff6c33a7850a9bc%26relation%3Dparent.parent&amp;color_scheme=light&amp;container_width=257&amp;header=true&amp;href=https%3A%2F%2Fwww.facebook.com%2Fwww.avensonline.org&amp;locale=en_US&amp;sdk=joey&amp;show_border=true&amp;show_faces=true&amp;stream=false&amp;width=260" style="border: none; visibility: visible; width: 260px; height: 213px;" class=""></iframe></span></div></div>
                </aside>			</div><!-- .widget-area -->
              </div><!-- .sidebar-inner -->
            </div><!-- #tertiary -->
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<style type="text/css">
#errorfiled
{
	color: #CB4444;
	display: block;
	margin: 0;
}
#colophon{margin: 0px !important}
.post-list {
   background: rgb(252, 252, 252);
  padding: 16px;
  margin: 10px 0px;
  border: 1px solid #ddd;
}
.check_all {
  position: absolute;
  top: 20px;
  right: 28px;
}
</style>