</body>
<script src="<?php echo base_url(); ?>public/js/jquery.min.js"></script>
<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/angular.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/angular-route.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/app/app.js"></script>
<script src="<?php echo base_url(); ?>public/js/textAngular-rangy.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/textAngular-sanitize.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>public/js/textAngular.min.js" type="text/javascript"></script>  
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#page-selection').bootpag();
		jQuery("footer#colophon").removeAttr("style");
	});
	jQuery(".nav-controls a.next").click(function(e){ 
		e.preventDefault();
		jQuery('#myCarousel').carousel('next');
	}); 
	jQuery(".nav-controls a.prev").click(function(e){ 
		e.preventDefault();
		jQuery('#myCarousel').carousel('prev');
	}); 
	jQuery('#myTabs a').click(function (e) {
		e.preventDefault()
		jQuery(this).tab('show')
	});
</script>
</html>
