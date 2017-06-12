<?php include_once "jembatan.php"; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Halaman Daftar</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
			<br><br>
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="space-6"></div>
	
							<div class="position-relative">
								<div id="signup-box" class="signup-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<center>
													<img src="assets/images/jombang.png" width="30%" alt=""><br>
													<b>PEMKAB JOMBANG</b>
												</center>
											</h4>

											<form method="post" action="">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="nipeg" id="nipeg" placeholder="NIPEG" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
														<span id="cek_nipeg"></span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="uname" id="uname" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
														<span id="cek_uname"></span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="pass" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="pass_repeat" placeholder="Repeat password" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="posisi" placeholder="Posisi" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="jabatan" placeholder="Jabatan" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm">
															<i class="ace-icon fa fa-refresh"></i>
															<span class="bigger-110">Reset</span>
														</button>

														<button type="submit" name="daftar" class="width-65 pull-right btn btn-sm btn-success">
															<span class="bigger-110">Daftar</span>
															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>

										<div class="toolbar center">
											<a href="login.php" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Kembali ke Login
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		</script>
	</body>
</html>
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
	if (isset($_POST['daftar'])) {
		$nama_lengkap = addslashes(mysqli_real_escape_string($koneksi,$_POST['nama_lengkap']));
		$nipeg        = addslashes(mysqli_real_escape_string($koneksi,$_POST['nipeg']));
		$uname        = addslashes(mysqli_real_escape_string($koneksi,$_POST['uname']));
		$pass         = md5(addslashes(mysqli_real_escape_string($koneksi,$_POST['pass'])));
		$pass_repeat  = md5(addslashes(mysqli_real_escape_string($koneksi,$_POST['pass_repeat'])));
		$posisi       = addslashes(mysqli_real_escape_string($koneksi,$_POST['posisi']));
		$jabatan      = addslashes(mysqli_real_escape_string($koneksi,$_POST['jabatan']));
		$query_daftar = mysqli_query($koneksi,"insert into pengguna values('$nipeg','$uname','$pass','$nama_lengkap','$posisi','$jabatan','satker','tolak')")or die(mysqli_error($koneksi));
		if ($pass == $pass_repeat) {
			if ($query_daftar==TRUE) {
				echo "<script>alert('berhasil daftar, silakan tunggu 1x24 jam untuk proses aktifasi akun anda')</script>";
			}else{
				echo "<script>alert('gagal memproses, silakan hubungi admin')</script>";
			}
		}else{
			echo "<script>alert('password anda tidak cocok')</script>";
		}
	}
?>