<div class="content-wrapper">
	<div class="container">
		<div class="row ml-3 justify-content-md-center">
			<div class="col-md-8">
				<div class="card" style="margin-top: 20px">
					<div class="card-header text-center">
						<h4>Form Edit Contact</h4>
					</div>
					<div class="card-body ">

						<form method="post" action="">
							<input type="hidden" name="id_contact" value="<?= $contact_us['id_contact']; ?>">
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" name="nama" id="nama" class="form-control" value="<?= $contact_us['nama']; ?>">
								<div class="form-text text-danger"><?= form_error('nama') ?></div>
							</div>

							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" id="email" class="form-control" value="<?= $contact_us['email']; ?>">
								<div class="form-text text-danger"><?= form_error('email') ?></div>
							</div>

							<div class="form-group">
								<label for="telp1">Telepon 1</label>
								<input type="text" name="telp1" id="telp1" class="form-control" value="<?= $contact_us['telp1']; ?>">
								<div class="form-text text-danger"><?= form_error('telp1') ?></div>
							</div>

							<div class="form-group">
								<label for="telp2">Telepon 2</label>
								<input type="text" name="telp2" id="telp2" class="form-control" value="<?= $contact_us['telp2']; ?>">
								<div class="form-text text-danger"><?= form_error('telp2') ?></div>
							</div>

							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input type="text" name="alamat" id="alamat" class="form-control" value="<?= $contact_us['alamat']; ?>">
								<div class="form-text text-danger"><?= form_error('alamat') ?></div>
							</div>

							<div class="form-group">
								<label for="medsos_instagram">ID Instagram</label>
								<input type="text" name="medsos_instagram" id="medsos_instagram" class="form-control" value="<?= $contact_us['medsos_instagram']; ?>">
								<div class="form-text text-danger"><?= form_error('medsos_instagram') ?></div>
							</div>

							<div class="form-group">
								<label for="medsos_facebook">Facebook</label>
								<input type="text" name="medsos_facebook" id="medsos_facebook" class="form-control" value="<?= $contact_us['medsos_facebook']; ?>">
								<div class="form-text text-danger"><?= form_error('medsos_facebook') ?></div>
							</div>

							<a href="<?= base_url(); ?>contact" class="btn btn-primary float-right" style="margin-left:5px;"> Kembali</a>
							<button type="submit" name="edit" class="btn btn-success float-right">Edit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>