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
			<div class="content-header">
				<h1>
					Pages 			
					<small class="text-muted mt-3" style="font-size: 15px"> Manajemen Halaman Website</small>
				</h1>
			</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h3 class="card-title">
										<a href="<?php echo base_url().'dashboard/pages_tambah'; ?>"class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Buat Halaman baru</a>
									</h3>
								</div>
								<div class="card-body">
									<table class="table table-bordered">
										<thead>
											<tr align="center">
												<th width="1%">NO</th>
												<th>Judul Halaman</th>
												<th>URL Slug</th>
												<th width="15%">OPSI</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach($halaman as $h){
											?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo $h->halaman_judul; ?></td>
												<td><?php echo base_url()."page/".$h->halaman_slug; ?></td>
												<td align="center">
													<a target="_blank" href="<?php echo base_url()."page/".$h->halaman_slug; ?>" class="btn btn-success btn-sm">
														<i class="fa fa-eye"></i> 
													</a>
													<a
														href="<?php echo base_url().'dashboard/pages_edit/'.$h->halaman_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i> 
													</a>
													<a onclick="deleteConfirm('<?php echo base_url().'dashboard/pages_hapus/'.$h->halaman_id; ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger">
														<i class="fa fa-trash"></i>
													</a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $this->load->view("_templateadmin/modal.php") ?>
			</section>
		</div>
	</div>
	<?php $this->load->view("_templateadmin/footer.php") ?>
	<?php $this->load->view("_templateadmin/controlsidebar.php") ?>
	<?php $this->load->view("_templateadmin/js.php") ?>
</body>
</html>