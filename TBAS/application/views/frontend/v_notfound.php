
<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("_templatewelcome/head.php") ?>
</head>
<body id="page-top">
  <?php $this->load->view("_templatewelcome/navbar.php") ?>
    
    <div class="intro intro-single route bg-image" style="background-image: url(<?php echo base_url();?>assets_frontend/img/overlay-bg.jpg)">
		<div class="overlay-mf"></div>
		<div class="intro-content display-table">
			<div class="table-cell">
				<div class="container">
					<h2 class="intro-title mb-4">404 Error!</h2>
					<h5 class="text-light mb-4">Halaman Tidak Ditemukan!</h5>
				</div>
			</div>
		</div>
	</div>
</body>
</html>