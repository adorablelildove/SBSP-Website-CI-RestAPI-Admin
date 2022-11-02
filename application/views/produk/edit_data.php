<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row ml-3 justify-content-md-center">
				<div class="col-md-8">
					<div class="card" style="margin-top: 20px">
						<div class="card-header text-center">
							<h4>Form Edit Data</h4>
						</div>
						<div class="card-body ">

							<form method="post" action="" enctype="multipart/form-data">
								<input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
								<div class="form-group">
									<label for="nama_produk">Nama Produk</label>
									<input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?= $produk['nama_produk']; ?>">
									<div class="form-text text-danger"><?= form_error('nama_produk') ?></div>
								</div>

								<div class="form-group">
									<label for="kd_produk">Kode Produk</label>
									<input type="text" name="kd_produk" id="kd_produk" class="form-control" disabled value="<?= $produk['kd_produk']; ?>">
									<div class="form-text text-danger"><?= form_error('kd_produk') ?></div>
								</div>

								<div class="form-group">
									<label for="userfile">Foto</label>
									<div class="col-sm-3">
										<img src="<?= base_url(); ?>assets/img/<?= $produk['foto'] ?>" alt="" style="width:50px; height:50px;">
									</div>
									<input type="file" name="userfile" id="userfile" class="form-control">
									<div class="form-text text-danger"></div>
								</div>

								<div class="form-group">
									<label for="harga">Harga</label>
									<input type="text" name="harga" id="harga" class="form-control" value="<?= $produk['harga']; ?>">
									<div class="form-text text-danger"><?= form_error('harga') ?></div>
								</div>

								<div class="form-group">
									<label for="deskripsi" class="form-label">Deskripsi</label>
									<textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"><?= $produk['deskripsi']; ?></textarea>
									<div class="form-text text-danger"><?= form_error('deskripsi') ?></div>
								</div>

								<a href="<?= base_url(); ?>produk" class="btn btn-primary float-right" style="margin-left: 5px;"> Kembali</a>
								<button type="submit" name="edit" class="btn btn-success float-right">Edit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
</div>
<!-- /.content-wrapper -->