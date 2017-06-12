<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
				try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>

			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Supir</a>
				</li>
			</ul><!-- /.breadcrumb -->
		</div>
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<div class="tabbable"> 
						<ul class="nav nav-tabs" id="myTab">
							<li class="active">
								<a data-toggle="tab" href="#supir">
									<i class="green ace-icon fa fa-user bigger-120"></i>
									Supir
								</a>
							</li>
							<li>
								<a data-toggle="tab" href="#tambahsupir">
									<i class="blue ace-icon fa fa-plus bigger-120"></i>
									Tambah Supir
								</a>
							</li>
						</ul>
						<script src="assets/js/jquery.2.1.1.min.js"></script>

						<div class="tab-content">
							<div id="supir" class="tab-pane fade in active">
								<table id="table3" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama</th>
											<th class="hidden-480">Status Sopir</th>
											<th class="hidden-480">Status</th>
											<th>Aksi</th>
										</tr>
									</thead>

									<tbody>
										<?php 
											$no = 1;
											$query_data = mysqli_query($koneksi,"select * from sopir");
											while ($row_data = mysqli_fetch_array($query_data)) {											
										?>
										<tr>
											<td><?= $no++; ?></td>
											<td><?= ucwords($row_data['nama']) ?></td>
											<td class="hidden-480"><?= ucwords($row_data['status_sopir']) ?></td>
											<td class="hidden-480"><?= ucwords($row_data['status']) ?></td>
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<!-- <a class="blue" href="#">
														<i class="ace-icon fa fa-search-plus bigger-130"></i>
													</a> -->
													<button class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit_modal<?= $row_data['id_sopir'] ?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i> Edit
													</button>
													<!-- Modal -->
													<div id="edit_modal<?= $row_data['id_sopir'] ?>" class="modal fade" role="dialog">
													  <div class="modal-dialog">
													    <!-- Modal content-->
													    <div class="modal-content">
													      <div class="modal-header">
													        <button type="button" class="close" data-dismiss="modal">&times;</button>
													        <h4 class="modal-title">Edit <?= ucwords($row_data['nama']); ?></h4>
													      </div>
													      <div class="modal-body">
													        <form method="post" action="">
																<div class="row">
																<fieldset>
																	<div class="col-md-4 ">
																		<label class="block clearfix">
																		Nama Lengkap Supir
																			<span class="block">
																				<input type="hidden" class="form-control" name="id_sopir" value="<?= $row_data['id_sopir'] ?>" placeholder="Nama Lengkap Supir"  style="width: 100%" />
																				<input type="text" class="form-control" name="nama" value="<?= $row_data['nama'] ?>" placeholder="Nama Lengkap Supir"  style="width: 100%" />
																			</span>
																		</label>
																	</div>
																	<div class="col-md-4 ">
																		<label class="block clearfix">
																		Status Supir
																			<span class="block">
																				<select name="status_sopir" id="status_sopir" class="form-control" style="width: 100%">
																					<?php 
																						if ($row_data['status_sopir'] == 'ada') {
																						?>
																							<option value="ada">Ada</option>
																							<option value="tidak">Tidak</option>
																						<?php
																						}elseif ($row_data['status_sopir'] == 'tidak') {
																						?>
																							<option value="tidak">Tidak</option>
																							<option value="ada">Ada</option>
																						<?php
																						}
																					?>
																				</select>
																			</span>
																		</label>
																	</div>
																	<div class="col-md-4 ">
																		<label class="block clearfix">
																		Status
																			<span class="block">
																				<select name="status" id="status" class="form-control" style="width: 100%">
																					<?php 
																						if ($row_data['status'] == 'aktif') {
																						?>
																							<option value="aktif">Aktif</option>
																							<option value="keluar">Keluar</option>
																						<?php
																						}elseif ($row_data['status'] == 'keluar') {
																						?>
																							<option value="keluar">Keluar</option>
																							<option value="aktif">Aktif</option>
																						<?php
																						}
																					?>
																				</select>
																			</span>
																		</label>
																	</div>															
																	<div class="col-md-12 ">
																	<div class="clearfix"><br>
																		<button type="submit" name="edit_supir" class="width-100 pull-right btn btn-sm btn-success">
																			<span class="bigger-110">Edit</span>
																		</button>
																	</div>
																	</div>
																</fieldset>
																</div>														
															</form>
													      </div>
													    </div>

													  </div>
													</div>
												</div>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>

							<div id="tambahsupir" class="tab-pane fade">
								<form method="post" action="">
									<div class="row">
									<fieldset>
										<div class="col-md-9 ">
											<label class="block clearfix">
											Nama Lengkap Supir
												<span class="block">
													<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap Supir"  style="width: 100%" />
												</span>
											</label>
										</div>															
										<div class="col-md-3 ">
										<div class="clearfix"><br>
											<button type="submit" name="tambah_supir" class="width-100 pull-right btn btn-sm btn-success">
												<span class="bigger-110">Tambah Supir</span>
												<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
											</button>
										</div>
										</div>
									</fieldset>
									</div>														
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	if (isset($_POST['edit_supir'])) {
		$nama         = addslashes(mysqli_real_escape_string($koneksi,$_POST['nama']));
		$status_sopir = addslashes(mysqli_real_escape_string($koneksi,$_POST['status_sopir']));
		$status       = addslashes(mysqli_real_escape_string($koneksi,$_POST['status']));
		$id_sopir     = addslashes(mysqli_real_escape_string($koneksi,$_POST['id_sopir']));
		$update       = mysqli_query($koneksi,"update sopir set nama='$nama',status='$status',status_sopir='$status_sopir' where id_sopir ='$id_sopir' ");
		if ($update == TRUE) {
			echo "<script>alert('berhasil update')</script><script>window.location='index.php?kendaraan=supir'</script>";
		}
	}
	if (isset($_POST['tambah_supir'])) {
		$nama = addslashes(mysqli_real_escape_string($koneksi,$_POST['nama']));
		$query_daftar = mysqli_query($koneksi,"insert into sopir values('','$nama','aktif','ada')")or die(mysqli_error($koneksi));
		if ($query_daftar==TRUE) {
			echo "<script>alert('berhasil mendaftarkan supir')</script><script>window.location='index.php?kendaraan=supir'</script>";
		}else{
			echo "<script>alert('gagal memproses, silakan hubungi admin')</script><script>window.location='index.php?kendaraan=supir'</script>";
		}
	}
?>