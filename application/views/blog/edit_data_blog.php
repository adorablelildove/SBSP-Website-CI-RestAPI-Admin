<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row ml-3">
				<div class="col-md-8">
					<h2 class="mt-2">Edit Blog</h2>
					<form method="post" action="" enctype="multipart/form-data">
						<input type="hidden" name="id_blog" value="<?= $blog['id_blog']; ?>">

						<div class="form-group">
							<label for="judul_blog">Judul</label>
							<input type="text" name="judul_blog" id="judul_blog" class="form-control" value="<?= $blog['judul_blog']; ?>">
							<div class="form-text text-danger"><?= form_error('tulisan') ?></div>
						</div>

						<div class="form-group">
							<label for="link_video">Link Video Youtube</label>
							<input type="text" name="link_video" id="link_video" class="form-control" value="<?= $blog['link_video']; ?>">
						</div>

						<div class="mb-3">
							<label for="foto" class="form-label">Upload Gambar</label>
							<div class="col-sm-3">
								<img src="<?= base_url(); ?>assets/img/<?= $blog['foto'] ?>" alt="" style="width:50px; height:50px;">
							</div>
							<input class="form-control form-control-sm" name="foto" id="foto" type="file">
						</div>

						<div class="form-group">
							<label for="tulisan" class="form-label">Blog</label>
							<textarea class="form-control" name="tulisan" id="tulisan" rows="6"><?= $blog['tulisan']; ?></textarea>
							<div class="form-text text-danger"><?= form_error('tulisan') ?></div>
						</div>
						<a href="<?= base_url(); ?>blog" class="btn btn-primary float-right" style="margin-left: 5px;"> Kembali</a>
						<button type="submit" name="edit" class="btn btn-success float-right">Edit</button>
					</form>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
</div>
<!-- /.content-wrapper -->