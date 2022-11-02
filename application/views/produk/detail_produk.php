<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row ml-3">
				<div class="col-md-8">
					<h2 class="mt-2">Detail Produk</h2>
					<div class="card md-3" style="max-width: 540px;">
						<div class="row g-0">
							<div class="col-md-4">
								<img src="<?= base_url(); ?>assets/img/<?= $produk['foto'] ?>" class="img-fluid rounded-start" alt="">
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<h5 class="card-title"><?= $produk['nama_produk']; ?></h5>
									<p class="card-text"><?= $produk['kd_produk']; ?></p>
									<p class="card-text" style="color:red;">Rp. <?= $produk['harga']; ?></p>
									<p class="card-text"><small class="text-muted"><?= $produk['deskripsi']; ?></small></p>
									<a href="<?= base_url() . 'produk'; ?>" class="btn btn-primary float-right">Kembali</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
</div>
<!-- /.content-wrapper -->