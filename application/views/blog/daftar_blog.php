<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<?php if ($this->session->flashdata('flash')) : ?>
				<div class="row mt-3">
					<div class="col-md-6">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							Data blog <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
							<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<h3 class="mt-2 ml-3">Daftar Blog</h3>
			<?php if (empty($blog)) : ?>
				<div class="alert alert-danger" role="alert">
					Data blog tidak ditemukan.
				</div>
			<?php endif; ?>

			<div class="row mt-3 ml-3">
				<div class="col-md-6">
					<a href="<?= base_url(); ?>blog/tambah" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Blog</a>
				</div>
			</div>
			<section class="content">
				<div class="row mt-3 ml-3">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">NO</th>
								<th scope="col">Judul</th>
								<th scope="col">Foto</th>
								<th scope="col">Link Video</th>
								<th scope="col">Tulisan</th>
								<th scope="col">Tanggal</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<?php foreach ($blog as $blg) : ?>
							<tbody>
								<tr>
									<th scope="row"><?= ++$start ?></th>
									<!-- <th scope="row"><?= $blg['id_blog'] ?></th> -->
									<td style="width:50px;"><?= $blg['judul_blog'] ?></td>
									<td><img src="<?= base_url(); ?>assets/img/<?= $blg['foto'] ?>" alt="" style="width: 90px; height: 90px;"></td>
									<td><?= $blg['link_video'] ?></td>
									<td style="width:200px;"><?= $blg['tulisan'] ?></td>
									<td><?= $blg['tgl'] ?></td>
									<td>
										<a href="<?= base_url(); ?>blog/edit_blog/<?= $blg['id_blog'] ?>" class="btn btn-warning" style=" padding: 2px 5px;">Edit</a>
										<a href="<?= base_url(); ?>blog/hapus/<?= $blg['id_blog'] ?>" class="btn btn-danger" style="padding: 2px 5px;" onclick="return confirm('yakin');">Hapus</a>
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