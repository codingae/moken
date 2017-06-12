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
					<a href="#">Pengguna</a>
				</li>
			</ul><!-- /.breadcrumb -->
		</div>
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<div class="tabbable"> 
						<ul class="nav nav-tabs" id="myTab">
							<li class="active">
								<a data-toggle="tab" href="#pengguna">
									<i class="green ace-icon fa fa-user bigger-120"></i>
									Pengguna
								</a>
							</li>
							<li>
								<a data-toggle="tab" href="#tambahpengguna">
									<i class="blue ace-icon fa fa-plus bigger-120"></i>
									Tambah Pengguna
								</a>
							</li>
							<li>
								<a data-toggle="tab" href="#pemberitahuan">
									Pemberitahuan
									<?php 
										$query_cek = mysqli_query($koneksi,"select count(verifikasi) as jumlah from pengguna where verifikasi='tolak'");
										$row_cek   = mysqli_fetch_array($query_cek);
										if (mysqli_num_rows($query_cek)==0) {
										}else{
										?>
											<span class="badge badge-danger"><?php echo $row_cek['jumlah']; ?></span>
										<?php											
										}
									?>
								</a>
							</li>
						</ul>
						<script src="assets/js/jquery.2.1.1.min.js"></script>

						<div class="tab-content">
							<div id="pengguna" class="tab-pane fade in active">
								<table id="table1" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>NIPEG</th>
											<th>Nama Lengkap</th>
											<th class="hidden-480">Username</th>
											<th>
												Posisi
											</th>
											<th>
												Jabatan
											</th>
											<th class="hidden-480">Level</th>
											<th>Aksi</th>
										</tr>
									</thead>

									<tbody>
										<?php 
											$query_data = mysqli_query($koneksi,"select * from pengguna where verifikasi='terima'");
											while ($row_data = mysqli_fetch_array($query_data)) {											
										?>
										<tr>
											<td><?= $row_data['nipeg'] ?></td>
											<td><?= ucwords($row_data['nama_lengkap']) ?></td>
											<td class="hidden-480"><?= ucwords($row_data['uname']) ?></td>
											<td class="hidden-480"><?= $row_data['posisi'] ?></td>
											<td class="hidden-480"><?= $row_data['jabatan'] ?></td>
											<td class="hidden-480"><?= $row_data['level'] ?></td>
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<!-- <a class="blue" href="#">
														<i class="ace-icon fa fa-search-plus bigger-130"></i>
													</a> -->
													<button class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit_modal<?= $row_data['nipeg'] ?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i> Edit
													</button>
													<!-- Modal -->
													<div id="edit_modal<?= $row_data['nipeg'] ?>" class="modal fade" role="dialog">
													  <div class="modal-dialog">
													    <!-- Modal content-->
													    <div class="modal-content">
													      <div class="modal-header">
													        <button type="button" class="close" data-dismiss="modal">&times;</button>
													        <h4 class="modal-title">Edit <?= ucfirst($row_data['uname']); ?></h4>
													      </div>
													      <div class="modal-body">
													        <form method="post" action="">
																<div class="row">
																<fieldset>
																	<div class="col-md-12 ">
																		<label class="block clearfix">
																		Nama Lengkap
																			<span class="block">
																				<input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap"  value="<?= $row_data['nama_lengkap'] ?>" style="width: 100%" />
																			</span>
																		</label>
																	</div>
																	<div class="col-md-12 ">
																	<label class="block clearfix">
																		NIPEG
																		<span class="block">
																			<input type="text" class="form-control" name="nipeg" id="nipeg<?= $row_data['uname'] ?>" placeholder="NIPEG" value="<?= $row_data['nipeg'] ?>" style="width: 100%" />
																		</span>
																		<span id="cek_nipeg<?= $row_data['uname'] ?>"></span>
																	</label>
																	</div>
																	<div class="col-md-12 ">
																	<label class="block clearfix">
																	Username
																		<span class="block">
																			<input type="text" class="form-control" name="uname" id="uname<?= $row_data['uname'] ?>" placeholder="Username"  value="<?= $row_data['uname'] ?>" style="width: 100%" />
																		</span>
																		<span id="cek_uname<?= $row_data['uname'] ?>"></span>
																	</label>
																	</div>
																	<div class="col-md-12 ">
																	<label class="block clearfix">
																	Password
																		<span class="block">
																			<input type="hidden" name="pass_lama"  value="<?= $row_data['pass'] ?>"/>
																			<input type="password" class="form-control" name="pass" placeholder="Password" style="width: 100%" />
																		</span>
																	</label>
																	</div>
																	<div class="col-md-12 ">
																	<label class="block clearfix">
																	Posisi
																		<span class="block">
																			<input type="text" class="form-control" name="posisi" placeholder="Posisi"  value="<?= $row_data['posisi'] ?>" style="width: 100%" />
																		</span>
																	</label>
																	</div>
																	<div class="col-md-12 ">
																	<label class="block clearfix">
																	Jabatan
																		<span class="block">
																			<input type="text" class="form-control" name="jabatan" placeholder="Jabatan"  value="<?= $row_data['jabatan'] ?>" style="width: 100%" />
																		</span>
																	</label>
																	</div>																	
																	<div class="clearfix">
																		<br>
																		<br>
																		<button type="submit" name="edit_pengguna" class="width-100 pull-right btn btn-sm btn-success">
																			<span class="bigger-110">Edit</span>
																			<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																		</button>
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
										<script>
										/*cek uname & pass*/
										$(document).ready(function(){
										    $("#uname<?= $row_data['uname'] ?>").blur(function(){
										        $("#cek_uname<?= $row_data['uname'] ?>").html('<img style="margin-left:10px; width:10px" src="assets/images/loading.gif">');
										        var uname = $(this).val();
										        $.ajax({
										            type    : 'POST',
										            url     : 'proses_edit.php',
										            data    : 'uname='+uname,
										            success : function(data){
										                $("#cek_uname<?= $row_data['uname'] ?>").html(data);
										            }
										        })

										    });
										    $("#nipeg<?= $row_data['uname'] ?>").blur(function(){
										        $("#cek_nipeg<?= $row_data['uname'] ?>").html('<img style="margin-left:10px; width:10px" src="assets/images/loading.gif">');
										        var nipeg = $(this).val();
										        $.ajax({
										            type    : 'POST',
										            url     : 'proses_edit.php',
										            data    : 'nipeg='+nipeg,
										            success : function(data){
										                $("#cek_nipeg<?= $row_data['uname'] ?>").html(data);
										            }
										        })
										    });
										});	
										</script>
										<?php } ?>
									</tbody>
								</table>
							</div>

							<div id="pemberitahuan" class="tab-pane fade">
								<table id="table2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>NIPEG</th>
											<th>Nama Lengkap</th>
											<th class="hidden-480">Username</th>
											<th>
												Posisi
											</th>
											<th>
												Jabatan
											</th>
											<th class="hidden-480">Level</th>
											<th>Aksi</th>
										</tr>
									</thead>

									<tbody>
										<?php 
											$query_data = mysqli_query($koneksi,"select * from pengguna where verifikasi='tolak'");
											while ($row_data = mysqli_fetch_array($query_data)) {											
										?>
										<tr>
											<td><?= $row_data['nipeg'] ?></td>
											<td><?= $row_data['nama_lengkap'] ?></td>
											<td class="hidden-480"><?= $row_data['uname'] ?></td>
											<td class="hidden-480"><?= $row_data['posisi'] ?></td>
											<td class="hidden-480"><?= $row_data['jabatan'] ?></td>
											<td class="hidden-480"><?= $row_data['level'] ?></td>
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<!-- <a class="blue" href="#">
														<i class="ace-icon fa fa-search-plus bigger-130"></i>
													</a> -->
													<form action="" method="post">
														<button class="btn btn-mini btn-success" type="submit" value="<?= $row_data['nipeg'] ?>" name="diterima" onclick="return confirm('Anda Yakin Akan Menerima')">
															<i class="ace-icon fa fa-check bigger-130"></i> Terima
														</button>
														<button class="btn btn-mini btn-danger" type="submit" value="<?= $row_data['nipeg'] ?>" name="ditolak" onclick="return confirm('Anda Yakin Akan Menolak')">
															<i class="ace-icon fa fa-remove bigger-130"></i> Tolak
														</button>
													</form>
												</div>

												<div class="hidden-md hidden-lg">
													<div class="inline pos-rel">
														<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
															<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
														</button>

														<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
															<li>
																<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																	<span class="blue">
																		<i class="ace-icon fa fa-search-plus bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																	<span class="green">
																		<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																	<span class="red">
																		<i class="ace-icon fa fa-trash-o bigger-120"></i>
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>

							<div id="tambahpengguna" class="tab-pane fade">
								<form method="post" action="">
									<div class="row">
									<fieldset>
										<div class="col-md-4 ">
											<label class="block clearfix">
											Nama Lengkap
												<span class="block">
													<input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap"  style="width: 100%" />
												</span>
											</label>
										</div>
										<div class="col-md-4 ">
										<label class="block clearfix">
											NIPEG
											<span id="cek_nipeg"></span>
											<span class="block">
												<input type="text" class="form-control" name="nipeg" id="nipeg" placeholder="NIPEG" style="width: 100%" />
											</span>
										</label>
										</div>
										<div class="col-md-4 ">
										<label class="block clearfix">
											Level
											<span class="block">
												<select name="level" id="level" class="form-control">
													<option value="">Pilih</option>
													<option value="satker">Satuan Kerja</option>
													<option value="kabag">Kepala Bagian</option>
													<option value="admin">Administrator</option>
												</select>
											</span>
										</label>
										</div>
										<div class="col-md-6 ">
										<label class="block clearfix">
										Username
											<span id="cek_uname"></span>
											<span class="block">
												<input type="text" class="form-control" name="uname" id="uname" placeholder="Username" style="width: 100%" />
											</span>
										</label>
										</div>
										<div class="col-md-6 ">
										<label class="block clearfix">
										Password
											<span class="block">
												<input type="password" class="form-control" name="pass" placeholder="Password" style="width: 100%" />
											</span>
										</label>
										</div>
										<div class="col-md-6 ">
										<label class="block clearfix">
										Posisi
											<span class="block">
												<input type="text" class="form-control" name="posisi" placeholder="Posisi" style="width: 100%" />
											</span>
										</label>
										</div>
										<div class="col-md-6 ">
										<label class="block clearfix">
										Jabatan
											<span class="block">
												<input type="text" class="form-control" name="jabatan" placeholder="Jabatan" style="width: 100%" />
											</span>
										</label>
										</div>																	
										<div class="clearfix">
											<br>
											<br>
											<button type="submit" name="tambah_pengguna" class="width-100 pull-right btn btn-sm btn-success">
												<span class="bigger-110">Tambah</span>
												<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
											</button>
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
<script>
/*cek uname & pass*/
$(document).ready(function(){
    $('#uname').blur(function(){
        $('#cek_uname').html('<img style="margin-left:10px; width:10px" src="assets/images/loading.gif">');
        var uname = $(this).val();
        $.ajax({
            type    : 'POST',
            url     : './proses.php',
            data    : 'uname='+uname,
            success : function(data){
                $('#cek_uname').html(data);
            }
        })

    });
    $('#nipeg').blur(function(){
        $('#cek_nipeg').html('<img style="margin-left:10px; width:10px" src="assets/images/loading.gif">');
        var nipeg = $(this).val();
        $.ajax({
            type    : 'POST',
            url     : './proses.php',
            data    : 'nipeg='+nipeg,
            success : function(data){
                $('#cek_nipeg').html(data);
            }
        })
    });
});	
</script>
<?php 
	if (isset($_POST['diterima'])) {
		$diterima = $_POST['diterima'];
		$query_validasi = mysqli_query($koneksi,"update pengguna set verifikasi='terima' where nipeg='$diterima'");
		echo "<script>alert('berhasil menerima akun')</script><script>window.location='index.php?kendaraan=pengguna'</script>";
	}
	if (isset($_POST['ditolak'])) {
		$ditolak = $_POST['ditolak'];
		$query_validasi = mysqli_query($koneksi,"update pengguna set verifikasi='tidak_diterima' where nipeg='$ditolak'");
		echo "<script>alert('berhasil menolak akun')</script><script>window.location='index.php?kendaraan=pengguna'</script>";
	}
	if (isset($_POST['edit_pengguna'])) {
		$nama_lengkap = addslashes(mysqli_real_escape_string($koneksi,$_POST['nama_lengkap']));
		$nipeg        = addslashes(mysqli_real_escape_string($koneksi,$_POST['nipeg']));
		$uname        = addslashes(mysqli_real_escape_string($koneksi,$_POST['uname']));
		$pass         = md5(addslashes(mysqli_real_escape_string($koneksi,$_POST['pass'])));
		$pass_lama    = addslashes(mysqli_real_escape_string($koneksi,$_POST['pass_lama']));
		$posisi       = addslashes(mysqli_real_escape_string($koneksi,$_POST['posisi']));
		$jabatan      = addslashes(mysqli_real_escape_string($koneksi,$_POST['jabatan']));
		if ($pass=="d41d8cd98f00b204e9800998ecf8427e") {
			$update = mysqli_query($koneksi,"update pengguna set uname='$uname',pass='$pass_lama',nama_lengkap='$nama_lengkap',posisi='$posisi',jabatan='$jabatan' where nipeg ='$nipeg' ");
			if ($update == TRUE) {
				echo "<script>alert('berhasil update')</script><script>window.location='index.php?kendaraan=pengguna'</script>";
			}
		}else{
			$update = mysqli_query($koneksi,"update pengguna set uname='$uname',pass='$pass',nama_lengkap='$nama_lengkap',posisi='$posisi',jabatan='$jabatan' where nipeg ='$nipeg' ");
			if ($update == TRUE) {
				echo "<script>alert('berhasil update')</script><script>window.location='index.php?kendaraan=pengguna'</script>";
			}
		}
	}
	if (isset($_POST['tambah_pengguna'])) {
		$nama_lengkap = addslashes(mysqli_real_escape_string($koneksi,$_POST['nama_lengkap']));
		$nipeg        = addslashes(mysqli_real_escape_string($koneksi,$_POST['nipeg']));
		$uname        = addslashes(mysqli_real_escape_string($koneksi,$_POST['uname']));
		$level        = addslashes(mysqli_real_escape_string($koneksi,$_POST['level']));
		$pass         = md5(addslashes(mysqli_real_escape_string($koneksi,$_POST['pass'])));
		$pass_repeat  = md5(addslashes(mysqli_real_escape_string($koneksi,$_POST['pass_repeat'])));
		$posisi       = addslashes(mysqli_real_escape_string($koneksi,$_POST['posisi']));
		$jabatan      = addslashes(mysqli_real_escape_string($koneksi,$_POST['jabatan']));
		$query_daftar = mysqli_query($koneksi,"insert into pengguna values('$nipeg','$uname','$pass','$nama_lengkap','$posisi','$jabatan','$level','terima')")or die(mysqli_error($koneksi));
		if ($query_daftar==TRUE) {
			echo "<script>alert('berhasil mendaftarkan akun')</script><script>window.location='index.php?kendaraan=pengguna'</script>";
		}else{
			echo "<script>alert('gagal memproses, silakan hubungi admin')</script><script>window.location='index.php?kendaraan=pengguna'</script>";
		}
	}
?>