<?php 
	$id  = base64_decode($_SESSION['nipeg']);
	$query_edit_profil = mysqli_query($koneksi,"select * from pengguna where nipeg='$id'");
	$row_edit_profil   = mysqli_fetch_array($query_edit_profil);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Aplikasi MKD</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							Monitoring Kendaraan Dinas
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									8 Notifications
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														New Comments
													</span>
													<span class="pull-right badge badge-info">+12</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="btn btn-xs btn-primary fa fa-user"></i>
												Bob just signed up as an editor ...
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														New Orders
													</span>
													<span class="pull-right badge badge-success">+8</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
														Followers
													</span>
													<span class="pull-right badge badge-info">+11</span>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<span class="user-info">
									<small>Selamat Datang</small>
									<?php 
										echo ucfirst($row_edit_profil['uname']);
									?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#!" data-toggle="modal" data-target="#edit_profil<?= base64_decode($_SESSION['nipeg']) ?>">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="./logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>
		<!-- Modal -->
		<div id="edit_profil<?= base64_decode($_SESSION['nipeg']) ?>" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Edit <?= ucfirst($row_edit_profil['uname']); ?></h4>
		      </div>
		      <div class="modal-body">
		        <form method="post" action="">
					<div class="row">
					<fieldset>
						<div class="col-md-12 ">
							<label class="block clearfix">
							Nama Lengkap
								<span class="block">
									<input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap"  value="<?= $row_edit_profil['nama_lengkap'] ?>" style="width: 100%" />
								</span>
							</label>
						</div>
						<div class="col-md-12 ">
						<label class="block clearfix">
							NIPEG
							<span class="block">
								<input type="text" class="form-control" name="nipeg" id="nipegawai" placeholder="NIPEG" value="<?= $row_edit_profil['nipeg'] ?>" style="width: 100%" />
							</span>
							<span id="cek_nipegawai"></span>
						</label>
						</div>
						<div class="col-md-12 ">
						<label class="block clearfix">
						Username
							<span class="block">
								<input type="text" class="form-control" name="uname" id="username" placeholder="Username"  value="<?= $row_edit_profil['uname'] ?>" style="width: 100%" />
							</span>
							<span id="cek_username"></span>
						</label>
						</div>
						<div class="col-md-12 ">
						<label class="block clearfix">
						Password
							<span class="block">
								<input type="hidden" name="pass_lama"  value="<?= $row_edit_profil['pass'] ?>"/>
								<input type="password" class="form-control" name="pass" placeholder="Password" style="width: 100%" />
							</span>
						</label>
						</div>
						<div class="col-md-12 ">
						<label class="block clearfix">
						Posisi
							<span class="block">
								<input type="text" class="form-control" name="posisi" placeholder="Posisi"  value="<?= $row_edit_profil['posisi'] ?>" style="width: 100%" />
							</span>
						</label>
						</div>
						<div class="col-md-12 ">
						<label class="block clearfix">
						Jabatan
							<span class="block">
								<input type="text" class="form-control" name="jabatan" placeholder="Jabatan"  value="<?= $row_edit_profil['jabatan'] ?>" style="width: 100%" />
							</span>
						</label>
						</div>																	
						<div class="clearfix">
							<br>
							<br>
							<button type="submit" name="edit_profil_pengguna" class="width-100 pull-right btn btn-sm btn-success">
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
		<?php 
			if (isset($_POST['edit_profil_pengguna'])) {
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
						echo "<script>alert('berhasil update')</script><script>window.location='index.php'</script>";
					}
				}else{
					$update = mysqli_query($koneksi,"update pengguna set uname='$uname',pass='$pass',nama_lengkap='$nama_lengkap',posisi='$posisi',jabatan='$jabatan' where nipeg ='$nipeg' ");
					if ($update == TRUE) {
						echo "<script>alert('berhasil update')</script><script>window.location='index.php'</script>";
					}
				}
			}
		?>