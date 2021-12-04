	<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
	<div id="preloader"></div>

	<!-- Vendor JS Files -->
	<script src="<?php echo base_url(); ?>assets_frontend/assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets_frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>assets_frontend/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
	<script src="<?php echo base_url(); ?>assets_frontend/assets/vendor/php-email-form/validate.js"></script>
	<script src="<?php echo base_url(); ?>assets_frontend/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url(); ?>assets_frontend/assets/vendor/counterup/jquery.counterup.min.js"></script>
	<script src="<?php echo base_url(); ?>assets_frontend/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
	<script src="<?php echo base_url(); ?>assets_frontend/assets/vendor/typed.js/typed.min.js"></script>
	<script src="<?php echo base_url(); ?>assets_frontend/assets/vendor/venobox/venobox.min.js"></script>

	<!-- Template Main JS File -->
	<script src="<?php echo base_url(); ?>assets_frontend/assets/js/main.js"></script>

	<script>
		$('.multi-level-dropdown .dropdown-submenu > a').on("mouseenter", function(e) {
	    var submenu = $(this);
	    $('.multi-level-dropdown .dropdown-submenu .dropdown-menu').removeClass('show');
	    submenu.next('.dropdown-menu').addClass('show');
	    e.stopPropagation();
	  });

	  $('.multi-level-dropdown .dropdown').on("hidden.bs.dropdown", function() {
	    // hide any open menus when parent closes
	    $('.multi-level-dropdown .dropdown-menu.show').removeClass('show');
	  });
	</script>