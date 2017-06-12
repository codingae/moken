<?php 
	session_start();
	include_once "jembatan.php";
	include_once "_partial/header.php";
	$level_sess = base64_decode($_SESSION['level']);
	$nipeg_sess = base64_decode($_SESSION['nipeg']);
	$uname_sess = base64_decode($_SESSION['uname']);
	if (empty($level_sess)) {
		echo "<meta http-equiv='refresh' content='0;url=login.php' />";
	}
?>


		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<?php 
				if ($level_sess=="satker") {
					include_once "_partial/sidebar_satker.php";
				}elseif ($level_sess=="kabag") {
					include_once "_partial/sidebar_kabag.php";
				}elseif ($level_sess=="admin") {
					include_once "_partial/sidebar_admin.php";
				}
			?>
			
			<?php 
				$kendaraan = (!empty($_GET['kendaraan'])) ? $_GET['kendaraan'] : "kosong"; 
				if ($level_sess=="satker") {
					switch ($kendaraan) {
		            case 'home': include "view/satker/home.php"; break;
		            case 'peminjaman': include "view/satker/peminjaman.php"; break;
		            case 'ceklist': include "view/admin/ceklist.php"; break;
		            default:include'view/satker/home.php';
		            }       
				}elseif ($level_sess=="kabag") {
					switch ($kendaraan) {
		            case 'home': include "view/kabag/home.php"; break;
		            case 'perijinan': include "view/kabag/perijinan.php"; break;
		            default:include'view/kabag/home.php';
		            }       
				}elseif ($level_sess=="admin") {
					switch ($kendaraan) {
		            case 'home': include "view/admin/home.php"; break;
		            case 'pengguna': include "view/admin/user.php"; break;
		            case 'supir': include "view/admin/supir.php"; break;
		            case 'kendaraan': include "view/admin/kendaraan.php"; break;
		            case 'perijinan': include "view/admin/perijinan.php"; break;
		            case 'arsip': include "view/admin/arsip.php"; break;
		            case 'pilihceklist': include "view/admin/pilihceklist.php"; break;
		            case 'pilihcekmasuk': include "view/admin/pilihcekmasuk.php"; break;
		            case 'cek-kendaraan-kembali': include "view/admin/ceklist_kendaraan_kembali.php"; break;
		            case 'ceklist': include "view/admin/ceklist.php"; break;
		            case 'proses': include "proses.php"; break;
		            default:include'view/admin/home.php';
		            }       
				}
			?>


		<!-- basic scripts -->
<?php 
	if ($kendaraan=="pengguna" || $kendaraan=="supir" || $kendaraan=="kendaraan" || $kendaraan=="peminjaman" || $kendaraan=="perijinan" || $kendaraan=="ceklist" || $kendaraan=="pilihceklist" || $kendaraan=="pilihcekmasuk") {
		include_once "_partial/footer_custom.php";	
	}else{
		include_once "_partial/footer.php";	
	}
?>