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
								<a data-toggle="tab" href="#kendaraan">
									<i class="green ace-icon fa fa-tachometer bigger-120"></i>
									Kendaraan
								</a>
							</li>
							<li>
								<a data-toggle="tab" href="#tambahkendaraan">
									<i class="blue ace-icon fa fa-plus bigger-120"></i>
									Tambah Kendaraan
								</a>
							</li>
						</ul>
						<script src="assets/js/jquery.2.1.1.min.js"></script>

						<div class="tab-content">
							<div id="kendaraan" class="tab-pane fade in active">
								<table id="table_kendaraan" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Nopol</th>
											<th>Keterangan Mobil</th>
											<th class="hidden-480">Jenis Mobil</th>
											<th class="hidden-480">Status</th>
											<th>Aksi</th>
										</tr>
									</thead>

									<tbody>
										<?php 
											$no = 1;
											$query_data = mysqli_query($koneksi,"select * from mobil");
											while ($row_data = mysqli_fetch_array($query_data)) {											
										?>
										<tr>
											<td><?= $row_data['nopol']; ?></td>
											<td><?= ucwords($row_data['keterangan']) ?></td>
											<td class="hidden-480"><?= ucwords($row_data['jenis_mobil']) ?></td>
											<td class="hidden-480"><?= ucwords($row_data['status']) ?></td>
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<!-- <a class="blue" href="#">
														<i class="ace-icon fa fa-search-plus bigger-130"></i>
													</a> -->
													<button class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit_modal<?= str_replace(" ", "", $row_data['id_mobil']) ?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i> Edit
													</button>
													<!-- Modal -->
													<div id="edit_modal<?= str_replace(" ", "", $row_data['id_mobil']) ?>" class="modal fade" role="dialog">
													  <div class="modal-dialog">
													    <!-- Modal content-->
													    <div class="modal-content">
													      <div class="modal-header">
													        <button type="button" class="close" data-dismiss="modal">&times;</button>
													        <h4 class="modal-title">Edit <?= ucwords($row_data['nopol']); ?></h4>
													      </div>
													      <div class="modal-body">
													        <form method="post" action="">
																<div class="row">
																<fieldset>
																	<div class="col-md-6 ">
																		<label class="block clearfix">
																		Nopol Kendaraan
																			<span class="block">
																				<input type="hidden" name="id_mobil" value="<?= $row_data['id_mobil'] ?>" />
																				<input type="text" class="form-control" name="nopol" placeholder="Keterangan Kendaraan" value="<?= $row_data['nopol'] ?>" style="width: 100%" />
																			</span>
																		</label>
																	</div>	
																	<div class="col-md-6 ">
																		<label class="block clearfix">
																		Keterangan Kendaraan
																			<span class="block">
																				<input type="text" class="form-control" name="keterangan_kendaraan" placeholder="Keterangan Kendaraan" value="<?= $row_data['keterangan'] ?>" style="width: 100%" />
																			</span>
																		</label>
																	</div>															
																	<div class="col-md-6 ">
																		<label class="block clearfix">
																		Jenis Kendaraan
																			<span class="block">
																				<input type="text" class="form-control" name="jenis_kendaraan" placeholder="Jenis Kendaraan" value="<?= $row_data['jenis_mobil'] ?>" style="width: 100%" />
																			</span>
																		</label>
																	</div>																
																	<div class="col-md-6 ">
																		<label class="block clearfix">
																		Status Kendaraan
																			<span class="block">
																				<select name="status_mobil" style="width: 100%" class="form-control">
																					<?php 
																						if ($row_data['status']=="ada") {
																						?>
																						<option value="ada">Ada</option>
																						<option value="tidak">Tidak</option>
																						<?php
																						}elseif ($row_data['status']=="tidak") {
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
																	<div class="col-md-12 ">
																	<div class="clearfix"><br>
																		<button type="submit" name="edit_kendaraan" class="width-100 pull-right btn btn-sm btn-success">
																			<span class="bigger-110">Edit Kendaraan</span>
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
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>

							<div id="tambahkendaraan" class="tab-pane fade">
								<form method="post" action="">
									<div class="row">
									<fieldset>
										<div class="col-md-4 ">
											<label class="block clearfix">
											Nopol Kendaraan
												<span class="block">
													<input type="text" class="form-control" name="nopol" placeholder="Nomer Polisi Kendaraan"  style="width: 100%" />
												</span>
											</label>
										</div>	
										<div class="col-md-4 ">
											<label class="block clearfix">
											Keterangan Kendaraan
												<span class="block">
													<input type="text" class="form-control" name="keterangan_kendaraan" placeholder="Keterangan Kendaraan"  style="width: 100%" />
												</span>
											</label>
										</div>															
										<div class="col-md-4 ">
											<label class="block clearfix">
											Jenis Kendaraan
												<span class="block">
													<input type="text" class="form-control" name="jenis_kendaraan" placeholder="Jenis Kendaraan"  style="width: 100%" />
												</span>
											</label>
										</div>															
										<div class="col-md-12 ">
										<div class="clearfix"><br>
											<button type="submit" name="tambah_kendaraan" class="width-100 pull-right btn btn-sm btn-success">
												<span class="bigger-110">Tambah Kendaraan</span>
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
	if (isset($_POST['edit_kendaraan'])) {
		$keterangan_kendaraan = addslashes(mysqli_real_escape_string($koneksi,$_POST['keterangan_kendaraan']));
		$jenis_kendaraan      = addslashes(mysqli_real_escape_string($koneksi,$_POST['jenis_kendaraan']));
		$id_mobil             = addslashes(mysqli_real_escape_string($koneksi,$_POST['id_mobil']));
		$nopol                = addslashes(mysqli_real_escape_string($koneksi,$_POST['nopol']));
		$status_mobil         = addslashes(mysqli_real_escape_string($koneksi,$_POST['status_mobil']));
		$update       = mysqli_query($koneksi,"update mobil set keterangan='$keterangan_kendaraan',jenis_mobil='$jenis_kendaraan',status='$status_mobil',nopol='$nopol' where id_mobil ='$id_mobil' ")or die(mysqli_error($koneksi));
		if ($update == TRUE) {
			echo "<script>alert('berhasil update')</script><script>window.location='index.php?kendaraan=kendaraan'</script>";
		}
	}
	if (isset($_POST['tambah_kendaraan'])) {
		$nopol                = addslashes(mysqli_real_escape_string($koneksi,$_POST['nopol']));
		$keterangan_kendaraan = addslashes(mysqli_real_escape_string($koneksi,$_POST['keterangan_kendaraan']));
		$jenis_kendaraan      = addslashes(mysqli_real_escape_string($koneksi,$_POST['jenis_kendaraan']));
		$query_kendaraan      = mysqli_query($koneksi,"insert into mobil values('','$nopol','$keterangan_kendaraan','$jenis_kendaraan','ada')")or die(mysqli_error($koneksi));
		if ($query_kendaraan==TRUE) {
			echo "<script>alert('berhasil mendaftarkan kendaraan')</script><script>window.location='index.php?kendaraan=kendaraan'</script>";
		}else{
			echo "<script>alert('gagal memproses, silakan hubungi admin')</script><script>window.location='index.php?kendaraan=kendaraan'</script>";
		}
	}
?>