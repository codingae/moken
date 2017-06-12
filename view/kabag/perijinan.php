<?php 
	$nipeg_s = base64_decode($_SESSION['nipeg']);
	$nipeg = mysqli_query($koneksi,"select nipeg from pengguna where nipeg = '$nipeg_s'");
	$row_nipeg = mysqli_fetch_array($nipeg);
	$nip =  $row_nipeg['nipeg'];
?>
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
					<a href="#">Perijinan</a>
				</li>
			</ul><!-- /.breadcrumb -->
		</div>
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<div class="tabbable"> 
						<ul class="nav nav-tabs" id="myTab">
							<li class="active">
								<a data-toggle="tab" href="#satu">
									<i class="green ace-icon fa fa-book bigger-120"></i>
									Riwayat Perijinan
								</a>
							</li>
							<li>
								<a data-toggle="tab" href="#tiga">
									<i class="red ace-icon fa fa-clock-o bigger-120"></i>
									Permintaan Perijinan
									<?php 
										$query_cek = mysqli_query($koneksi,"select count(status) as jumlah_proses from peminjaman where status='proses'");
										$row_cek   = mysqli_fetch_array($query_cek);
										if (mysqli_num_rows($query_cek)==0) {
										}else{
										?>
											<span class="badge badge-danger"><?php echo $row_cek['jumlah_proses']; ?></span>
										<?php											
										}
									?>
								</a>
							</li>
						</ul>
						<script src="assets/js/jquery.2.1.1.min.js"></script>

						<div class="tab-content">
							<div id="satu" class="tab-pane fade in active">
								<table id="table3" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Keperluan</th>
											<th class="hidden-480">Tujuan</th>
											<th class="hidden-480">Status</th>
											<th>Aksi</th>
										</tr>
									</thead>

									<tbody>
										<?php 
											$no = 1;
											$query_data = mysqli_query($koneksi,"select * from peminjaman where status='terima' || status='proses_admin' ");
											while ($row_data = mysqli_fetch_array($query_data)) {											
										?>
										<tr>
											<td><?= $no++; ?></td>
											<td><?= ucwords($row_data['keperluan']) ?></td>
											<td class="hidden-480"><?= ucwords($row_data['tujuan']) ?></td>
											<td class="hidden-480"><?= ucwords($row_data['status']) ?></td>
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<button class="btn btn-mini btn-success" data-toggle="modal" data-target="#detail_modal<?= $row_data['id_peminjaman'] ?>">
														<i class="ace-icon fa fa-search-plus bigger-130"></i> Detail
													</button>
													<!-- Modal -->
													<div id="detail_modal<?= $row_data['id_peminjaman'] ?>" class="modal fade" role="dialog">
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
																		<div class="col-md-6 ">
																			<label class="block clearfix">
																			Keperluan
																				<span class="block">
																					<input type="hidden" value="<?= $row_data['id_peminjaman'] ?>" name="id_peminjaman" />
																					<input type="text" class="form-control" value="<?= $row_data['keperluan'] ?>" name="keperluan" placeholder="Keperluan"  style="width: 100%" readonly />
																				</span>
																			</label>
																		</div>															
																		<div class="col-md-6 ">
																			<label class="block clearfix">
																			Tujuan
																				<span class="block">
																					<input type="text" class="form-control" value="<?= $row_data['tujuan'] ?>" name="tujuan" placeholder="Tujuan"  style="width: 100%" readonly />
																				</span>
																			</label>
																		</div>															
																		<div class="col-md-6 ">
																			<label class="block clearfix">
																			KM
																				<span class="block">
																					<input type="number" class="form-control" value="<?= $row_data['kilometer'] ?>" name="km" placeholder="KM"  style="width: 100%" readonly />
																				</span>
																			</label>
																		</div>															
																		<div class="col-md-6 ">
																			<label class="block clearfix">
																			Jumlah Penumpang
																				<span class="block">
																					<input type="number" class="form-control" value="<?= $row_data['jml_penumpang'] ?>" name="jumlah_penumpang" placeholder="Jumlah Penumpang"  style="width: 100%" readonly />
																				</span>
																			</label>
																		</div>															
																		<div class="col-md-3">
																			<label class="block clearfix">
																			Berangkat
																				<span class="block">
																					<input class="form-control date-picker" value="<?= $row_data['berangkat'] ?>" name="berangkat" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy"  style="width: 100%" readonly />
																				</span>
																			</label>
																		</div>															
																		<div class="col-md-3 ">
																			<label class="block clearfix">
																			Jam Berangkat
																				<span class="block">
																					<input type="text" id="timepicker1" value="<?= $row_data['jam_berangkat'] ?>" class="form-control" name="jam_berangkat" style="width: 100%" readonly />
																				</span>
																			</label>
																		</div>																
																		<div class="col-md-3">
																			<label class="block clearfix">
																			Kembali
																				<span class="block">
																					<input type="text" class="form-control date-picker2" value="<?= $row_data['kembali'] ?>" id="id-date-picker-2" name="kembali" data-date-format="dd-mm-yyyy" placeholder="Berangkat"  style="width: 100%" readonly />
																				</span>
																			</label>
																		</div>															
																		<div class="col-md-3 ">
																			<label class="block clearfix">
																			Jam Kembali
																				<span class="block">
																					<input type="text" id="timepicker2" value="<?= $row_data['jam_kembali'] ?>" class="form-control" name="jam_kembali" style="width: 100%" readonly />
																				</span>
																			</label>
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
							<div id="tiga" class="tab-pane">
								<table id="table_proses" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Keperluan</th>
											<th class="hidden-480">Tujuan</th>
											<th class="hidden-480">Status</th>
											<th>Aksi</th>
										</tr>
									</thead>

									<tbody>
										<?php 
											$no = 1;
											$query_data = mysqli_query($koneksi,"select * from peminjaman where status='proses'");
											while ($row_data = mysqli_fetch_array($query_data)) {											
										?>
										<tr>
											<td><?= $no++; ?></td>
											<td><?= ucwords($row_data['keperluan']) ?></td>
											<td class="hidden-480"><?= ucwords($row_data['tujuan']) ?></td>
											<td class="hidden-480"><?= ucwords($row_data['status']) ?></td>
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<!-- <a class="blue" href="#">
														<i class="ace-icon fa fa-search-plus bigger-130"></i>
													</a> -->
													<button class="btn btn-mini btn-success" data-toggle="modal" data-target="#detail_modal<?= $row_data['id_peminjaman'] ?>">
														<i class="ace-icon fa fa-search-plus bigger-130"></i> Detail
													</button>
													<form action="" method="post">
														<input type="hidden" name="id_peminjaman" value="<?= base64_encode($row_data['id_peminjaman']) ?>">
														<button type="submit" name="terima" class="btn btn-mini btn-primary" onclick="return confirm('Anda Yakin Akan Mengijinan?')">
															<i class="ace-icon fa fa-pencil bigger-130"></i> Terima
														</button><br>
														<button type="submit" name="tolak" class="btn btn-mini btn-danger" onclick="return confirm('Anda Yakin Akan Menolak?')">
															<i class="ace-icon fa fa-pencil bigger-130"></i> Tolak
														</button>
													</form>													
													<!-- Modal -->
													<div id="detail_modal<?= $row_data['id_peminjaman'] ?>" class="modal fade" role="dialog">
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
																		<div class="col-md-6 ">
																			<label class="block clearfix">
																			Keperluan
																				<span class="block">
																					<input type="hidden" value="<?= $row_data['id_peminjaman'] ?>" name="id_peminjaman" />
																					<input type="text" class="form-control" value="<?= $row_data['keperluan'] ?>" name="keperluan" placeholder="Keperluan"  style="width: 100%" readonly />
																				</span>
																			</label>
																		</div>															
																		<div class="col-md-6 ">
																			<label class="block clearfix">
																			Tujuan
																				<span class="block">
																					<input type="text" class="form-control" value="<?= $row_data['tujuan'] ?>" name="tujuan" placeholder="Tujuan"  style="width: 100%" readonly />
																				</span>
																			</label>
																		</div>															
																		<div class="col-md-6 ">
																			<label class="block clearfix">
																			KM
																				<span class="block">
																					<input type="number" class="form-control" value="<?= $row_data['kilometer'] ?>" name="km" placeholder="KM"  style="width: 100%" readonly />
																				</span>
																			</label>
																		</div>															
																		<div class="col-md-6 ">
																			<label class="block clearfix">
																			Jumlah Penumpang
																				<span class="block">
																					<input type="number" class="form-control" value="<?= $row_data['jml_penumpang'] ?>" name="jumlah_penumpang" placeholder="Jumlah Penumpang"  style="width: 100%" readonly />
																				</span>
																			</label>
																		</div>															
																		<div class="col-md-3">
																			<label class="block clearfix">
																			Berangkat
																				<span class="block">
																					<input class="form-control date-picker" value="<?= $row_data['berangkat'] ?>" name="berangkat" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy"  style="width: 100%" readonly />
																				</span>
																			</label>
																		</div>															
																		<div class="col-md-3 ">
																			<label class="block clearfix">
																			Jam Berangkat
																				<span class="block">
																					<input type="text" id="timepicker1" value="<?= $row_data['jam_berangkat'] ?>" class="form-control" name="jam_berangkat" style="width: 100%" readonly />
																				</span>
																			</label>
																		</div>																
																		<div class="col-md-3">
																			<label class="block clearfix">
																			Kembali
																				<span class="block">
																					<input type="text" class="form-control date-picker2" value="<?= $row_data['kembali'] ?>" id="id-date-picker-2" name="kembali" data-date-format="dd-mm-yyyy" placeholder="Berangkat"  style="width: 100%" readonly />
																				</span>
																			</label>
																		</div>															
																		<div class="col-md-3 ">
																			<label class="block clearfix">
																			Jam Kembali
																				<span class="block">
																					<input type="text" id="timepicker2" value="<?= $row_data['jam_kembali'] ?>" class="form-control" name="jam_kembali" style="width: 100%" readonly />
																				</span>
																			</label>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	if (isset($_POST['editpeminjaman_kendaraan'])) {
		$id_peminjaman    = addslashes(mysqli_real_escape_string($koneksi,$_POST['id_peminjaman']));
		$keperluan        = addslashes(mysqli_real_escape_string($koneksi,$_POST['keperluan']));
		$tujuan           = addslashes(mysqli_real_escape_string($koneksi,$_POST['tujuan']));
		$km               = addslashes(mysqli_real_escape_string($koneksi,$_POST['km']));
		$jumlah_penumpang = addslashes(mysqli_real_escape_string($koneksi,$_POST['jumlah_penumpang']));
		$berangkat        = addslashes(mysqli_real_escape_string($koneksi,$_POST['berangkat']));
		$jam_berangkat    = addslashes(mysqli_real_escape_string($koneksi,$_POST['jam_berangkat']));
		$kembali          = addslashes(mysqli_real_escape_string($koneksi,$_POST['kembali']));
		$jam_kembali      = addslashes(mysqli_real_escape_string($koneksi,$_POST['jam_kembali']));
		$update       = mysqli_query($koneksi,"update peminjaman set keperluan='$keperluan',tujuan='$tujuan',jml_penumpang='$jumlah_penumpang',kilometer='$km',berangkat='$berangkat',jam_berangkat='$jam_berangkat',kembali='$kembali',jam_kembali='$jam_kembali' where id_peminjaman ='$id_peminjaman' ") or die(mysqli_error($koneksi));
		if ($update == TRUE) {
			echo "<script>alert('berhasil update')</script><script>window.location='index.php?kendaraan=peminjaman'</script>";
		}
	}
	if (isset($_POST['peminjaman_kendaraan'])) {
		$keperluan        = addslashes(mysqli_real_escape_string($koneksi,$_POST['keperluan']));
		$tujuan           = addslashes(mysqli_real_escape_string($koneksi,$_POST['tujuan']));
		$km               = addslashes(mysqli_real_escape_string($koneksi,$_POST['km']));
		$jumlah_penumpang = addslashes(mysqli_real_escape_string($koneksi,$_POST['jumlah_penumpang']));
		$berangkat        = addslashes(mysqli_real_escape_string($koneksi,$_POST['berangkat']));
		$jam_berangkat    = addslashes(mysqli_real_escape_string($koneksi,$_POST['jam_berangkat']));
		$kembali          = addslashes(mysqli_real_escape_string($koneksi,$_POST['kembali']));
		$jam_kembali      = addslashes(mysqli_real_escape_string($koneksi,$_POST['jam_kembali']));
		$query_daftar     = mysqli_query($koneksi,"insert into peminjaman values('','$nip','$keperluan','$tujuan','$jumlah_penumpang','$km','$berangkat','$jam_berangkat','$kembali','$jam_kembali','proses')")or die(mysqli_error($koneksi));
		if ($query_daftar==TRUE) {
			echo "<script>alert('berhasil mengirim permohonan peminjaman')</script><script>window.location='index.php?kendaraan=peminjaman'</script>";
		}else{
			echo "<script>alert('gagal memproses, silakan hubungi admin')</script><script>window.location='index.php?kendaraan=peminjaman'</script>";
		}
	}
	if (isset($_POST['terima'])) {
		$id_p = base64_decode($_POST['id_peminjaman']);
		$query_edit = mysqli_query($koneksi,"update peminjaman set status = 'proses_admin' where id_peminjaman='$id_p'");
		if ($query_edit==TRUE) {
			echo "<script>alert('berhasil mengkonfirmasi peminjaman kendaraan')</script><script>window.location='index.php?kendaraan=perijinan'</script>";
		}else{
			echo "<script>alert('gagal memproses, silakan hubungi admin')</script><script>window.location='index.php?kendaraan=perijinan'</script>";
		}
	}
	if (isset($_POST['tolak'])) {
		$id_p = base64_decode($_POST['id_peminjaman']);
		$query_edit = mysqli_query($koneksi,"update peminjaman set status = 'tolak' where id_peminjaman='$id_p'");
		if ($query_edit==TRUE) {
			echo "<script>alert('berhasil mengkonfirmasi peminjaman kendaraan')</script><script>window.location='index.php?kendaraan=perijinan'</script>";
		}else{
			echo "<script>alert('gagal memproses, silakan hubungi admin')</script><script>window.location='index.php?kendaraan=perijinan'</script>";
		}
	}
?>