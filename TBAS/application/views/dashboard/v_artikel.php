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
					Artikel 			
					<small class="text-muted mt-3" style="font-size: 15px"> Manajemen Artikel</small>
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
										<a href="<?php echo base_url().'dashboard/Artikel_tambah'; ?>"class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Buat Artikel baru</a>
									</h3>
								</div>
								<div class="card-body">
									<table class="table table-bordered">
										<thead>
											<tr align="center">
												<th width="1%">NO</th>
												<th>Tanggal</th>
												<th>Artikel</th>
												<th>Author</th>
												<th>Kategori</th>
												<th width="10%">Gambar</th>
												<th>Status</th>
												<th width="15%">OPSI</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach($artikel as $a){
											?>
											<tr>
												<td><?php echo $no++; ?></td>
												<td><?php echo date('d/m/Y H:i', strtotime($a->artikel_tanggal)); ?></td>
												<td><?php echo $a->artikel_judul ?><br><small class="text-muted"><?php echo base_url()."".$a->artikel_slug ?></small></td>
												<td><?php echo $a->user_nama; ?></td>
												<td><?php echo $a->kategori_nama; ?></td>
												<td><img width="100%" class="img-responsive" src="<?php echo base_url('/gambar/artikel/'.$a->artikel_sampul) ?>"></td>
												<td>
													<?php 
													if($a->artikel_status=="publish"){
														echo "<span class='badge badge-success'>Publish</span>";
													}else{
														echo "<span class='badge badge-danger'>Draft</span>";
													} ?>	
												</td>
												<td align="center">
													<a target="_blank" href="<?php echo base_url().$a->artikel_slug; ?>" class="btn btn-success btn-sm">
														<i class="fa fa-eye"></i> 
													</a>

													<?php if($this->session->userdata('level')=="penulis"){

														if($this->session->userdata('id')==$a->artikel_author){ ?>
													<a href="<?php echo base_url().'dashboard/artikel_edit/'.$a->artikel_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i> 
													</a>
													
													<a onclick="deleteConfirm('<?php echo base_url().'dashboard/artikel_hapus/'.$a->artikel_id; ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger">
														<i class="fa fa-trash"></i>
													</a>
													<?php }
												 		}else{ ?>
												 	<a href="<?php echo base_url().'dashboard/artikel_edit/'.$a->artikel_id; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i> 
													</a>
													
													<a onclick="deleteConfirm('<?php echo base_url().'dashboard/artikel_hapus/'.$a->artikel_id; ?>')" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger">
														<i class="fa fa-trash"></i>
													</a>
													<?php } ?>								 	
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