 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<div class="content-header">
 		<div class="container-fluid">
 			<?php if ($this->session->flashdata('flash')) : ?>
 				<div class="row mt-3">
 					<div class="col-md-6">
 						<div class="alert alert-success alert-dismissible fade show" role="alert">
 							Data produk <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
 							<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
 						</div>
 					</div>
 				</div>
 			<?php endif; ?>

 			<h3 class="mt-2 ml-3">Daftar Produk</h3>
 			<?php if (empty($produk)) : ?>
 				<div class="alert alert-danger" role="alert">
 					Data produk tidak ditemukan.
 				</div>
 			<?php endif; ?>



 			<div class="row mt-3 ml-3">
 				<div class="col-md-6">
 					<a href="<?= base_url(); ?>produk/tambah" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data Produk</a>
 				</div>
 			</div>
 			<section class="content">
 				<div class="row mt-3 ml-3">
 					<table class="table">
 						<thead>
 							<tr>
 								<th scope="col">NO</th>
 								<!-- <th scope="col">ID</th> -->
 								<th scope="col">Nama Produk</th>
 								<th scope="col">Kode Produk</th>
 								<th scope="col">Gambar</th>
 								<!-- <th scope="col">Harga</th>
			      <th scope="col">Deskripsi</th> -->
 								<th scope="col">Aksi</th>
 							</tr>
 						</thead>
 						<?php
							foreach ($produk as $prd) : ?>
 							<tbody>
 								<tr>
 									<th scope="row"><?= ++$start ?></th>
 									<!-- <th scope="row"><?= $prd['id_produk'] ?></th> -->
 									<td><?= $prd['nama_produk'] ?></td>
 									<td><?= $prd['kd_produk'] ?></td>
 									<td><img src="<?= base_url(); ?>assets/img/<?= $prd['foto'] ?>" alt="" style="width: 90px; height: 90px;"></td>
 									<!-- <td><?= $prd['harga'] ?></td>
	      <td style="width: 300px;"><?= $prd['deskripsi'] ?></td> -->
 									<td><a href="<?= base_url(); ?>produk/detail/<?= $prd['id_produk'] ?>" class="btn btn-primary" style=" padding: 2px 5px; margin: 2px; width:60px; height:30px;">Detail</a>
 										<a href="<?= base_url(); ?>produk/edit_produk/<?= $prd['id_produk'] ?>" class="btn btn-warning" style=" padding: 2px 5px; margin: 2px; width:60px; height:30px;">Edit</a>
 										<a href="<?= base_url(); ?>produk/hapus/<?= $prd['id_produk'] ?>" class="btn btn-danger" style="padding: 2px 5px;width:60px; height:30px; margin: 2px;" onclick="return confirm('yakin');">Hapus</a>
 									</td>
 								</tr>
 							</tbody>
 						<?php endforeach; ?>
 					</table>
 					<?= $this->pagination->create_links(); ?>
 				</div>

 			</section>
 		</div><!-- /.container-fluid -->
 	</div>
 	<!-- /.content-header -->
 </div>
 <!-- /.content-wrapper -->