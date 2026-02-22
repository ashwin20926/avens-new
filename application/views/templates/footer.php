<footer id="colophon" class="site-footer">

	<!-- .site-info -->
	<div class="container">
		<div class="row" id="footer-top">
			<div class="col-sm-3 col-md-2">
				<h4>Company</h4>
				<ul>
					<li><a href="<?php echo base_url(); ?>about-us">About Us</a></li>
					<li><a href="<?php echo base_url(); ?>policies">Policies</a></li>
					<li><a href="<?php echo base_url(); ?>membership">Membership</a></li>
				</ul>
			</div>
			<div class="col-sm-3 col-md-2">
				<h4>Journals</h4>
				<ul>
					<li><a href="<?php echo base_url(); ?>journals/?sort_type=medical">Medical</a></li>
					<li><a href="<?php echo base_url(); ?>journals/?sort_type=biology">Biology</a></li>
					<li><a href="<?php echo base_url(); ?>journals/?sort_type=pharmaceutical">Pharmacy</a></li>				
					<li><a href="<?php echo base_url(); ?>journals/?sort_type=biotechnology">Biotechnology</a></li>				
				</ul>
			</div>
			<div class="col-sm-4 col-md-3 address-section">
				<p class="addressline">Avens Publishing Group LLC</p>
				<ul>

					<li>6201 Walter Way, Ellicott City</li>
					<li>MD 21043, USA</li>
					<li>Tel: +1 (443)-727-7717</li>
					<li>Email: contact@avensonline.org</li>
				</ul>
			</div>
			<div class="col-sm-4 col-md-4 address-section">
			    <div class="row">
			        <div class="col-sm-6">
			            <p class="addressline">Indexed In</p>
        				<ul>
        					<li>CrossRef</li>   
                            <li>Google Scholar</li>
                            <li>J Gate</li>
                            <li>ICJME</li>
        				</ul>
			        </div>
			        <div class="col-sm-6">
			            <p class="addressline">&nbsp;</p>
			            <ul>
                            <li>Index Copernicus</li>
                            <li>CAS</li>
        					<li>Journal TOCS</li>
        					<li>Sherpa Romeo</li>
        				</ul>
			        </div>
			    </div>
				
			</div>
			<div class="col-sm-4 col-md-3" id="contact-section">
				<h4>Avens</h4>						
				<div class="social-links">
					<ul class="list-inline footer-social">
						<li>
							<a target="_blank" href="https://www.facebook.com/www.avensonline.org?fref=ts">
								<img src="<?php echo base_url(); ?>public/images/fb-icon.png" alt="Facebook">
							</a>
						</li>
						<li>
							<a target="_blank" href="https://twitter.com/avensonline">
								<img src="<?php echo base_url(); ?>public/images/tweet.png" alt="Twitter">
							</a>
						</li>
						<li>
							<a target="_blank" href="https://www.linkedin.com/in/avens-publishing-group-479a2b58/">
								<img src="<?php echo base_url(); ?>public/images/linked.png" alt="Linked In">
							</a>
						</li>
						<li>
							<a target="_blank" href="https://feeds.feedburner.com/Avens">
								<img src="<?php echo base_url(); ?>public/images/rssfeed.png" alt="Rss Feed">
							</a>
						</li>
						<li>
							<a target="_blank" href="<?php echo base_url(); ?>blog">
								<img src="<?php echo base_url(); ?>public/images/blog-icon.png" alt="Avens Blog">
							</a>
						</li>


					</ul>
				</div>													
			</div>
		</div>
	</div>
	<div id="footer-bottom">
		<div class="col-sm-12">
			<div class="container">
				<p><a rel="license" href="https://creativecommons.org/licenses/by/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png"></a><br>This work is licensed under a <a rel="license" href="https://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>.<br/>AVENS Publishing Group is an Open Access Publisher & all published content, except where otherwise noted, is licensed under a Creative Commons License.</p>
			</div>
		</div>
	</div>
</footer>
<!-- <script type='text/javascript' src='<?php echo base_url(); ?>public/js/swfobject.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>public/js/jquery.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>public/js/jquery-migrate.min.js'></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/bootstrap.min1.js"></script>
 -->

<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
<script src="<?php echo base_url(); ?>public/js/jquery.validator.js"></script>
<script src="<?php echo base_url(); ?>public/js/jquery.bootpag.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/jquery.bootpag.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/functions.js"></script>
<script src="<?php echo base_url(); ?>public/js/user-enquiries-modal.js"></script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=562268420549512&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>
	$(document).ready(function(){
if(window.location.host == 'avensonline.org') {
    window.location = 'https://www.avensonline.org';
}
		$("#form_collab").validate({
			rules: {
				institute_name: "required",
				email: {
					required: true,
					email: true
				},
				mailing_address: "required",
				country:"required",
				website_rrl:"required"
			},
			messages: {
				institute_name: "Please enter your Institute Name",
				email: "Please enter a valid email address",
				mailing_address: "Please enter your mailing address",
				country: "Please enter your country",
				website_rrl: "Please enter your website url"

			},
			submitHandler: function(){
				var data = new FormData($('#form_collab')[0]);
			    $.ajax({
			      type:"POST",
			      url:"<?php echo base_url('page/save_collab_info');?>",
			      data:data,
			      mimeType: "multipart/form-data",
			      contentType: false,
			      cache: false,
			      processData: false,
			      success:function(temp)
			      {        
			        var ser_obj = JSON.parse(temp);
			        if(temp.status) {
			          $('.server-msg').find('.alert').addClass('alert-'+ser_obj.status).html(ser_obj.message).show();
			        } else {
			          $('.server-msg').find('.alert').addClass('alert-'+ser_obj.status).html(ser_obj.message).show();
			        }
			        setTimeout(function(){
			         $('.server-msg').find('.alert').fadeOut(2000); 
			          $('#form_collab').trigger('reset');         
			        },2000);
			      }
			    });
			}
		});
		$("#contact-form").validate({
			rules: {
				name: "required",
				email: {
					required: true,
					email: true
				}
			},
			messages: {
				first_name: "Please enter your name",
				email_id: "Please enter a valid email address"

			},
			submitHandler: function(){
				var data = new FormData($('#contact-form')[0]);
			    $.ajax({
			      type:"POST",
			      url:"<?php echo base_url('page/save_contact_enquiry');?>",
			      data:data,			      
			      contentType: false,
			      cache: false,
			      processData: false,
			      success:function(temp)
			      {        
			        var ser_obj = JSON.parse(temp);
			        if(temp.status) {
			          $('.server-msg').find('.alert').addClass('alert-'+ser_obj.status).html(ser_obj.message).show();
			        } else {
			          $('.server-msg').find('.alert').addClass('alert-'+ser_obj.status).html(ser_obj.message).show();
			        }
			        setTimeout(function(){
			         $('.server-msg').find('.alert').fadeOut(2000); 
			          $('#contact-form').trigger('reset');         
			        },2000);
			      }
			    });
			}
		});					
 
		$('.sort_journals').on('click',function(){
			$('.sort_journals').attr('checked',false);
			$(this).attr('checked',true);
			var sort_type = $(this).val();
			$('#journal-ajax').html('<div class="text-center" style="padding:10px;margin-top:20px;"><strong>Loading..</strong></div>');
			jQuery.get("<?php echo base_url(); ?>page/get_journals",
			{
				sort_type: sort_type			        
			},
			function(data, status){				
				$('#journal-ajax').html(data);					    			      
			});
		});

		$('#myTabs a').click(function (e) {
			e.preventDefault()
			$(this).tab('show')
		});


		$("p.month").on('click', function () {
			if($(this).hasClass("active")){
				$(this).removeClass("active");
			}else{
				$('.month').removeClass("active");
				$(this).toggleClass("active");
			}

			$(".post-archive-box-inner").not($(this).next(".post-archive-box-inner")).slideUp();
			$(this).next(".post-archive-box-inner").slideToggle();
		});
var journal_id = $(".home_post .journal-statistics-wrapper").attr('journal-id');
		if(journal_id) {
			$(".home_post .journal-statistics-wrapper").load("<?php echo base_url(); ?>page/journal_statistics/?journal_id="+journal_id+""); 		
		}

		$("#latest-article-results").load("<?php echo base_url(); ?>page/get_latest_journals/"); 
		$(".pagination").bootpag({
			total: 16,
			page: 1,
			maxVisible: 5,
			leaps: false,
			next: 'Next'       
		}).on("page", function(e, num){
			e.preventDefault();
			$("#latest-article-results").prepend('<div class="loading-indication"></div>');		
			$("#latest-article-results").load("<?php echo base_url(); ?>page/get_latest_journals/", {'page':num});
		});

		$('.nav-controls .custom-prev').on('click',function(e){
			e.preventDefault();
			$('ul.pagination .prev a').trigger('click');
		});
		$('.nav-controls .custom-next').on('click',function(e){
			e.preventDefault();
			$('ul.pagination .next a').trigger('click');
		});

		var logo_box_height = $('#logo-box').height();

		var admin_bar_height = ($('#wpadminbar').height())?$('#wpadminbar').height():'0';
		var temp_height = admin_bar_height+logo_box_height;

		$(window).scroll(function(){
			if ($(this).scrollTop() > temp_height)
				$('#navbar').addClass('fixed_top').css('top',admin_bar_height);		
			else 
				$('#navbar').removeClass('fixed_top').css('top','0');			
		});	
		$('.goto-top').hide();

		$(window).scroll(function(){
			if ($(this).scrollTop() > 200)
				$('.goto-top').show(300);		
			else 
				$('.goto-top').hide(300);	

		});	

		$('.scroll-top').on('click',function(e){
			e.preventDefault();
			$("html,body").animate({scrollTop:0}, 600);
		});
		$('#mobile-post-navbtn').on('click',function(e){
			e.stopPropagation();
			$('.mobile-post-nav').toggle(500);
		});
		
		$('#manuscript_form').find("input[type=file]").on('change',function(){
	      var file_id =$(this).attr('id');
	      var rel_id = $(this).attr('rel');                       ;
	      var data = new FormData($('#manuscript_form')[0]);     
	      $.ajax({
	         type:"POST",
	         url:"<?php echo base_url('page/upload_files');?>",
	         data:data,
	         mimeType: "multipart/form-data",
	          contentType: false,
	          cache: false,
	          processData: false,
	          dataType:"json",
                   beforeSend: function (){
$('.postbtn').addClass('disabled');
$('.file-upload-group').addClass('uploading');
                   },
	         success:function(temp) {
$('.postbtn').removeClass('disabled');
$('.file-upload-group').removeClass('uploading');
	         	$('#manuscript_form').find('.upload-box').find('.temp_file_upload').remove();
	            $('#manuscript_form').find('.upload-box').append('<input class="temp_file_upload" type="hidden" name="temp_file_upload" value="'+temp[0].upload_data.file_name+'">');	          
	         }
	      });     
	    });
	   $('.file-type-box').find('input[type="radio"]').click(function() {
			$('.file-upload-box').show();
		});

		$("#manuscript_form").validate({
			rules: {
				firstname: "required",
				email: {
					required: true,
					email: true
				},
				phoneno:{
					number: true,
					required: true,
				},
				country:"required",
				journal:"required",
				userfile: "required",
			},
			messages: {
				first_name: "Please enter your Firstname",
				email_id: "Please enter a valid Email Address",
				phoneno: "Please enter a valid Phone Number"

			},
			submitHandler: function(form){
if(!$('.postbtn').hasClass('disabled')) {
				var data = new FormData($('#manuscript_form')[0]);
			    $.ajax({
			      type:"POST",
			      url:"<?php echo base_url('page/save_submit_manuscript_info');?>",
			      data:data,
			      mimeType: "multipart/form-data",
			      contentType: false,
			      cache: false,
			      processData: false,
beforeSend: function (){
$('.file-upload-btn-group').addClass('sending-reg');
},
			      success:function(temp)
			      {        
$('.file-upload-btn-group').removeClass('sending-reg');
			        var ser_obj = JSON.parse(temp);
			        if(temp.status) {
			          $('.server-msg').find('.alert').addClass('alert-'+ser_obj.status).html(ser_obj.message).show();
			        } else {
			          $('.server-msg').find('.alert').addClass('alert-'+ser_obj.status).html(ser_obj.message).show();
			        }
			        setTimeout(function(){
			         $('.server-msg').find('.alert').fadeOut(2000); 
			          $('#manuscript_form').trigger('reset');         
			        },2000);
			      }
			    });
}
			}
		});
		$('.btn-wrapper').find('a').click(function(e) {									
			var ME = $(this), archive_id = ME.attr('archive_id'),
				archive_type = ME.attr('archive_type'),
				archive_url = ME.attr('rel');

				$.ajax({
			      type:"POST",
			      url:"<?php echo base_url('page/save_statistics_info');?>",
			      data:{"id":archive_id,"archive_type":archive_type},
			      dataType:"json",
			      success:function(data)
			      { 
			      	console.log();
			      	ME.closest('.btn-wrapper').find('p.'+archive_type+'_para').find('.stat-count').html(parseInt(ME.closest('.btn-wrapper').find('p.'+archive_type+'_para').find('.stat-count').html())+1);			      				        
			      }
			    });

		});
$('#medi_select_all').on('click',function(){
     //var dyn_cat = $(this).attr('rel');
     //var dyn_id = "."+dyn_cat+'_cat_name';
    if($('#medi_select_all').is(':checked')){
   $('.medical_cat_name').prop('checked', true);
}
else
    $('.medical_cat_name').prop('checked', false);
});

 $('#bio_select_all').on('click',function(){
     //var dyn_cat = $(this).attr('rel');
     //var dyn_id = "."+dyn_cat+'_cat_name';
    if($('#bio_select_all').is(':checked')){
   $('.bio_cat_name').prop('checked', true);
}
else
    $('.bio_cat_name').prop('checked', false);
});
$('#biol_select_all').on('click',function(){
     //var dyn_cat = $(this).attr('rel');
     //var dyn_id = "."+dyn_cat+'_cat_name';
    if($('#biol_select_all').is(':checked')){
   $('.biol_cat_name').prop('checked', true);
}
else
    $('.biol_cat_name').prop('checked', false);
});

$('#phar_select_all').on('click',function(){
     //var dyn_cat = $(this).attr('rel');
     //var dyn_id = "."+dyn_cat+'_cat_name';
    if($('#phar_select_all').is(':checked')){
   $('.phar_cat_name').prop('checked', true);
}
else
    $('.phar_cat_name').prop('checked', false);
});
	});

<!--Start of Zendesk Chat Script-->
/*window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5WlvT33YEBGqGVxVtQjA4fb5g3PlxAFg";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");*/
<!--End of Zendesk Chat Script-->

<!--Start of Tawk.to Script-->
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/688daa07d4fb73192607aff1/1j1km0bl5';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
<!--End of Tawk.to Script-->
</script>

</body>
</html>