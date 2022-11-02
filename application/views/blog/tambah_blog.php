<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row ml-3">
				<div class="col-md-8">
					<h2 class="mt-2">Buat Blog</h2>
					<form method="post" action="<?= base_url() . 'blog/tambah'; ?>" enctype="multipart/form-data">
						<div class="form-group">
							<label for="judul_blog">Judul</label>
							<input type="text" name="judul_blog" id="judul_blog" class="form-control">
							<div class="form-text text-danger"><?= form_error('judul_blog') ?></div>
						</div>
						<div class="form-group">
							<label for="link_video">Link Video Youtube</label>
							<input type="text" name="link_video" id="link_video" class="form-control">
						</div>
						<div class="mb-3">
							<label for="foto" class="form-label">Upload Gambar</label>
							<input class="form-control form-control-sm" name="foto" id="foto" type="file">
						</div>

						<div class="form-group">
							<label for="tulisan" class="form-label">Blog</label>
							<textarea class="form-control" name="tulisan" id="tulisan" rows="6"></textarea>
							<div class="form-text text-danger"><?= form_error('tulisan') ?></div>
						</div>
						<a href="<?= base_url(); ?>blog" class="btn btn-primary float-right" style="margin-left:5px;"> Kembali</a>
						<button type="submit" name="tambah" class="btn btn-success float-right">Tambah</button>
					</form>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
</div>
<!-- /.content-wrapper -->