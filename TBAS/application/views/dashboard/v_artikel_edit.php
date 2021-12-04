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
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<a href="<?php echo base_url().'dashboard/artikel'; ?>"class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a><br><br/>
							
							<?php foreach($artikel as $a){ ?>
							<form method="post" action="<?php echo base_url('dashboard/artikel_update') ?>" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-9">
										<div class="card card-primary card-outline">
											<div class="card-body">
												<div class="form-group">
													<label>Judul</label>
													<input type="hidden" name="id" value="<?php echo $a->artikel_id; ?>">
													<input type="text" name="judul" class="form-control" placeholder="masukkan judul artikel.." value="<?php echo $a->artikel_judul; ?>">
													<?php echo form_error('judul'); ?>
												</div>
											</div>
											<div class="card-body">
												<div class="form-group">
													<label>Konten</label>
													<?php echo form_error('konten'); ?>
													
													<textarea class="form-control" id="summernote" name="konten" ><?php echo $a->artikel_konten; ?></textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="card card-primary card-outline">
											<div class="card-body">
												<div class="form-group">
													<label>Kategori</label>
													<select class="form-control" name="kategori">
														<option value="">- Pilih kategori</option>
														<?php foreach ($kategori as $k) {?>
															<option <?php if($a->artikel_kategori==$k->kategori_id){echo "selected='selected'";} ?> value="<?php echo $k->kategori_id ?>"><?php echo $k->kategori_nama; ?></option>
														<?php } ?>
													</select>
													<br>
													<?php echo form_error('kategori') ?>
												</div>
												
												<div class="form-group">
													<input type="hidden" name="foto_old" value="<?php echo $a->artikel_sampul ?>">
													<label>Gambar Sampul</label>
													<input type="file" name="sampul">
													<?php 
													if(isset($gambar_error)){
														echo $gambar_error;
													} ?>
													<?php echo form_error('sampul'); ?>
												</div>
												<br><br>
												<input type="submit" name="status" value="Draft" class="btn btn-warning btn-block">
												<input type="submit" name="status" value="Publish" class="btn btn-success btn-block">
											</div>
										</div>
									</div>
								</div>								
							</form>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<?php $this->load->view("_templateadmin/footer.php") ?>
	<?php $this->load->view("_templateadmin/controlsidebar.php") ?>
	<?php $this->load->view("_templateadmin/js_editor.php") ?>
</body>
</html>