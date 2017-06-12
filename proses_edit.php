<?php
session_start();
$nipeg_sess = base64_decode($_SESSION['nipeg']);
$uname_sess = base64_decode($_SESSION['uname']);
$kendaraan = (!empty($_GET['kendaraan'])) ? $_GET['kendaraan'] : "kosong"; 
if ($kendaraan == "pengguna") {
}else{
	include_once "jembatan.php";
}
$uname   = mysqli_real_escape_string($koneksi, $_POST['uname']);
$sql1     = "select * from pengguna where uname = '$uname'";
$process1 = mysqli_query($koneksi, $sql1);
$isi1     = mysqli_fetch_array($process1);
$num1     = mysqli_num_rows($process1);
if (isset($_POST['uname'])) {
	if($num1 == 0){
		if ($isi1['uname']==$uname_sess) {
			echo "&#215;<span style='color: red;font-style: italic;'> Username ".$uname." Milik Anda</span>";
		}elseif($isi1['uname']==$uname){
			echo "&#215;<span style='color: green;font-style: italic;'> Username ".$uname." Asli</span>";
		}else{
			echo "&#10004;<span style='color: green;font-style: italic;'> Username ".$uname." masih tersedia</span>";		
		}
	}else{
		if ($isi1['uname']==$uname_sess) {
			echo "&#215;<span style='color: green;font-style: italic;'> Username ".$uname." Milik Anda</span>";
		}elseif($isi1['uname']==$uname){
			echo "&#215;<span style='color: green;font-style: italic;'> Username ".$uname." Asli</span>";
		}else{
			echo "&#215;<span style='color: red;font-style: italic;'> Username ".$uname." tidak tsersedia</span>";			
		}
	}
}

$nipeg   = mysqli_real_escape_string($koneksi, $_POST['nipeg']);
$sql2     = "select * from pengguna where nipeg = '$nipeg'";
$process2 = mysqli_query($koneksi, $sql2);
$isi2     = mysqli_fetch_array($process2);
$num2     = mysqli_num_rows($process2);

if (isset($_POST['nipeg'])) {
	if($num2 == 0){
		if ($isi2['nipeg']==$nipeg_sess) {
			echo "&#215;<span style='color: green;font-style: italic;'> NIPEG ".$nipeg." Milik Anda</span>";
		}elseif($isi2['nipeg']==$nipeg){
			echo "&#215;<span style='color: green;font-style: italic;'> NIPEG ".$nipeg." Asli</span>";
		}else{
			echo "&#10004;<span style='color: green;font-style: italic;'> NIPEG ".$nipeg_sess."-".$isi1['nipeg']." masih tersedia</span>";		
		}
	}else{
		if ($isi2['nipeg']==$nipeg_sess) {
			echo "&#215;<span style='color: green;font-style: italic;'> NIPEG ".$nipeg." Milik Anda</span>";
		}elseif($isi2['nipeg']==$nipeg){
			echo "&#215;<span style='color: green;font-style: italic;'> NIPEG ".$nipeg." Asli</span>";
		}else{
			echo "&#215;<span style='color: red;font-style: italic;'> NIPEG ".$nipeg." tidak tsersedia</span>";			
		}
	}
}
?>