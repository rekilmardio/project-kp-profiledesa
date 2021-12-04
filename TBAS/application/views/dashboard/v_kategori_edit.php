<!DOCTYPE html>
<html>
<head>
 	<?php $this->load->view("_templateadmin/head.php") ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
 		<?php $this->load->view("_templateadmin/navbar.php") ?>
		<?php $this->load->view("_templateadmin/sidebar.php") ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Kategori 			
					<small class="text-muted mt-3" style="font-size: 15px"> Kategori Artikel</small>
				</h1>
			</section>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<a href="<?php echo base_url().'dashboard/kategori'; ?>"class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a><br><br/>
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h3 class="card-title">
										Kategori
									</h3>
								</div>
								<div class="card-body">
									<?php foreach ($kategori as $k){ ?>
									<form method="post" action="<?php echo base_url('dashboard/kategori_update') ?>">
										<div class="card-body">
											<div class="form-group">
												<label>Nama Kategori</label>
												<input type="hidden" name="id" value="<?php echo $k->kategori_id; ?>">
												<input type="text" name="kategori" class="form-control" placeholder="Masukkan nama kategori.." value="<?php echo $k->kategori_nama; ?>">
												<?php echo form_error('kategori'); ?>
											</div>
										</div>
										<div class="card-footer">
											<input type="submit" class="btn btn-success" value="Perbaharui">
										</div>									
									</form>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<?php $this->load->view("_templateadmin/footer.php") ?>
	<?php $this->load->view("_templateadmin/controlsidebar.php") ?>
	<?php $this->load->view("_templateadmin/js.php") ?>
</body>
</html>