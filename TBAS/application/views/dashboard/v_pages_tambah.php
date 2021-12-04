<!DOCTYPE html>
<html>
<head>
 	<?php $this->load->view("_templateadmin/head_editor.php") ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
 		<?php $this->load->view("_templateadmin/navbar.php") ?>
		<?php $this->load->view("_templateadmin/sidebar.php") ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Halaman 			
					<small class="text-muted mt-3" style="font-size: 15px"> Tulis Halaman Baru</small>
				</h1>
			</section>
			</section>
			<section class="content">
				<div class="container-fluid">
					<a href="<?php echo base_url().'dashboard/pages'; ?>"class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a><br><br/>
					
					<form method="post" action="<?php echo base_url('dashboard/pages_aksi') ?>">
						<div class="row">
							<div class="col-lg-12">
								<div class="card card-primary card-outline">
									<div class="card-body">
										<div class="form-group">
											<label>Halaman Judul</label>
											<input type="text" name="judul" class="form-control" placeholder="masukkan judul halaman.." value="<?php echo set_value('judul'); ?>">
											<?php echo form_error('judul'); ?>
										</div>
										<div class="form-group">
											<label>Konten</label>
											<?php echo form_error('konten'); ?>
											<br>
											<textarea class="form-control" id="summernote" name="konten" ><?php echo set_value('konten'); ?></textarea>
										</div>
									</div>
									<input type="submit" value="Publish" class="btn btn-success btn-block">
								</div>
							</div>
						</div>								
					</form>
				</div>
			</section>
		</div>
	</div>
	<?php $this->load->view("_templateadmin/footer.php") ?>
	<?php $this->load->view("_templateadmin/controlsidebar.php") ?>
	<?php $this->load->view("_templateadmin/js_editor.php") ?>
</body>
</html>