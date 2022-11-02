<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<?php if ($this->session->flashdata('flash')) : ?>
				<div class="row mt-3">
					<div class="col-md-6">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							Contact <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
							<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<h2 class="mt-2">Contact</h2>
			<?php
			foreach ($contact_us as $cnt) : ?>
				<div class="col-12 col-sm-6 col-md- d-flex align-items-stretch ">
					<div class="card bg-light">
						<div class="card-header text-muted border-bottom-0">
							Anggota SBSP
						</div>
						<div class="card-body pt-0">
							<div class="row">
								<div class="col-7">

									<h2 class="lead"><b><?= $cnt['nama']; ?></b></h2>
									<p class="text-muted text-sm"><b>Email: </b> <?= $cnt['email']; ?> </p>
									<ul class="ml-4 mb-0 fa-ul text-muted">
										<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: <?= $cnt['alamat']; ?></li>
										<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Tlp 1: <?= $cnt['telp1']; ?></li>
										<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Tlp 2: <?= $cnt['telp2']; ?></li>
										<li class="small"><span class="fa-li"><i class="fab fa-instagram"></i></span> Instagram: <?= $cnt['medsos_instagram']; ?></li>
										<li class="small"><span class="fa-li"><i class="fab fa-facebook"></i></span> Facebook: <?= $cnt['medsos_facebook']; ?></li>
									</ul>
								</div>
								<div class="col-5 text-center">
									<img src="<?= base_url() ?>assets/img/logo/logosbsp1.png" alt="" class="img-circle img-fluid">
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="text-right">
								<a href="<?= base_url(); ?>contact/edit_data_contact/<?= $cnt['id_contact'] ?>" class="btn btn-sm btn-warning">
									<i class="fas fa-user-edit"></i> Edit
								</a>
								<a href="<?= base_url() . 'produk'; ?>" class="btn btn-sm btn-primary">
									<i class="fas fa-backward"></i> Kembali
								</a>
							</div>
						</div>

						<!-- <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
                  </div>
                </div> -->

					</div>
				</div>
			<?php endforeach; ?>
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
</div>
<!-- /.content-wrapper -->