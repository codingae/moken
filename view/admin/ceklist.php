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
					<a href="#">Ceklist</a>
				</li>
			</ul><!-- /.breadcrumb -->
		</div>
		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
					<div class="widget-box">
						<div class="widget-header widget-header-blue widget-header-flat">
							<h4 class="widget-title lighter">Cek List Kendaraan</h4>
						</div>
						<div class="widget-body">
							<div class="widget-main">
								<div id="fuelux-wizard-container">
									<div>
										<ul class="steps">
											<li data-step="1" class="active">
												<span class="step">1</span>
												<span class="title">Pilih Kendaraan</span>
											</li>

											<li data-step="2">
												<span class="step">2</span>
												<span class="title">Ceklist</span>
											</li>

											<li data-step="3">
												<span class="step">3</span>
												<span class="title">Selesai</span>
											</li>
										</ul>
									</div>

									<hr />
									<?php 
										$id_peminjaman  = base64_decode($_GET['kode']);
										$cek_peminjaman = mysqli_query($koneksi,"select berangkat,kembali from peminjaman where id_peminjaman='$id_peminjaman'");
										$row_cs         = mysqli_fetch_array($cek_peminjaman);
										$berangkat      = $row_cs['berangkat'];
										$kembali        = $row_cs['kembali'];
									?>
									<form id="form_wi" method="post" class="form-horizontal">
										<div class="step-content pos-rel">
											<div class="step-pane active" data-step="1">
												<div class="row">
													<fieldset>
														<div class="col-md-6 ">
															<label class="block clearfix">
															Pilih Kendaraan
																<select name="id_mobil" style="width: 100%" required>
																	<option value="">Pilih</option>
																	<?php 
																		$query_kendaraan = mysqli_query($koneksi,"select * from mobil where status='ada'");
																		while ($row_kendaraan   = mysqli_fetch_array($query_kendaraan)) {	
																		$id_mobil = $row_kendaraan['id_mobil'];
																		$cek_view_ceksopken = mysqli_query($koneksi,"select id_mobil from view_ceksopken where id_mobil='$id_mobil' && (berangkat='$berangkat' || kembali='$kembali')");															
																		if (mysqli_num_rows($cek_view_ceksopken)>0) {
																			
																		}else{
																	?>
																		<option value="<?= $row_kendaraan['id_mobil'] ?>"><?= ucfirst($row_kendaraan['jenis_mobil'])." ; ".$row_kendaraan['nopol']." ; ".$row_kendaraan['keterangan'] ?></option>
																	<?php }} ?>
																</select>
															</label>
														</div>															
														<div class="col-md-6 ">
															<label class="block clearfix">
															Pilih Sopir
																<select name="id_supir" style="width: 100%" required>
																	<option value="">Pilih</option>
																	<?php 
																		$query_supir = mysqli_query($koneksi,"select * from sopir where status_sopir='ada'");
																		while ($row_supir = mysqli_fetch_array($query_supir)) {								
																		$id_sopir = $row_supir['id_sopir'];	
																		$cek_view_ceksopken = mysqli_query($koneksi,"select id_sopir from view_ceksopken where id_sopir='$id_sopir' && (berangkat='$berangkat' || kembali='$kembali')");															
																		if (mysqli_num_rows($cek_view_ceksopken)>0) {
																			
																		}else{
																	?>
																		<option value="<?= $row_supir['id_sopir'] ?>"><?= ucfirst($row_supir['nama']) ?></option>
																	<?php }} ?>
																</select>
															</label>
														</div>
													</fieldset>
												</div>
											</div>

											<div class="step-pane" data-step="2">
												<div class="row">
													<div class="col-xs-12">
														<table id="simple-table" class="table table-striped table-bordered table-hover" style="font-size: 10px">
															<thead>
																<tr>
																	<th rowspan="2">No</th>
																	<th rowspan="2">Nama Komponen</th>
																	<th colspan="4">Kondisi Keluar</th>
																	<th rowspan="2">Keterangan</th>
																</tr>
																<tr>
																	<td>Baik</td>
																	<td>Rusak</td>
																	<td>Kotor</td>
																	<td>A/TA</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>STNK</td>
																	<td><input type="radio" value="stnk_baik" name="stnk_keluar" required></td>
																	<td><input type="radio" value="stnk_rusak" name="stnk_keluar"></td>
																	<td><input type="radio" value="stnk_kotor" name="stnk_keluar"></td>
																	<td><input type="radio" value="stnk_ada" name="stnk_keluar" checked>Ada ; <input type="radio" value="stnk_tidak_ada" name="stnk_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="stnk" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>2</td>
																	<td>BBM</td>
																	<td><input type="radio" value="bbm_baik" name="bbm_keluar" required></td>
																	<td><input type="radio" value="bbm_rusak" name="bbm_keluar"></td>
																	<td><input type="radio" value="bbm_kotor" name="bbm_keluar"></td>
																	<td><input type="radio" value="bbm_ada" name="bbm_keluar" checked>Ada ; <input type="radio" value="bbm_tidak_ada" name="bbm_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="bbm" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>3</td>
																	<td>AC</td>
																	<td><input type="radio" value="ac_baik" name="ac_keluar" checked required></td>
																	<td><input type="radio" value="ac_rusak" name="ac_keluar"></td>
																	<td><input type="radio" value="ac_kotor" name="ac_keluar"></td>
																	<td><input type="radio" value="ac_ada" name="ac_keluar">Ada ;<input type="radio" value="ac_tidak_ada" name="ac_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="ac" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>4</td>
																	<td>Spion Luar</td>
																	<td><input type="radio" value="spion_luar_baik" name="spion_luar_keluar" checked required></td>
																	<td><input type="radio" value="spion_luar_rusak" name="spion_luar_keluar"></td>
																	<td><input type="radio" value="spion_luar_kotor" name="spion_luar_keluar"></td>
																	<td><input type="radio" value="spion_luar_ada" name="spion_luar_keluar">Ada ; <input type="radio" value="spion_luar_tidak_ada" name="spion_luar_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="spion_luar" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>5</td>
																	<td>Spion Dalam</td>
																	<td><input type="radio" value="spion_dalam_baik" name="spion_dalam_keluar" checked required></td>
																	<td><input type="radio" value="spion_dalam_rusak" name="spion_dalam_keluar"></td>
																	<td><input type="radio" value="spion_dalam_kotor" name="spion_dalam_keluar"></td>
																	<td><input type="radio" value="spion_dalam_ada" name="spion_dalam_keluar">Ada ; <input type="radio" value="spion_dalam_tidak_ada" name="spion_dalam_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="spion_dalam" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>6</td>
																	<td>Ban Serep</td>
																	<td><input type="radio" value="ban_serep_baik" name="ban_serep_keluar" checked required></td>
																	<td><input type="radio" value="ban_serep_rusak" name="ban_serep_keluar"></td>
																	<td><input type="radio" value="ban_serep_kotor" name="ban_serep_keluar"></td>
																	<td><input type="radio" value="ban_serep_ada" name="ban_serep_keluar">Ada ; <input type="radio" value="ban_serep_tidak_ada" name="ban_serep_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="ban_serep" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>7</td>
																	<td>Lampu Depan</td>
																	<td><input type="radio" value="lampu_depan_baik" name="lampu_depan_keluar" checked required></td>
																	<td><input type="radio" value="lampu_depan_rusak" name="lampu_depan_keluar"></td>
																	<td><input type="radio" value="lampu_depan_kotor" name="lampu_depan_keluar"></td>
																	<td><input type="radio" value="lampu_depan_ada" name="lampu_depan_keluar">Ada ; <input type="radio" value="lampu_depan_tidak_ada" name="lampu_depan_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="lampu_depan" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>8</td>
																	<td>Lampu Rem & Mundur</td>
																	<td><input type="radio" value="rem_mundur_baik" name="rem_mundur_keluar" checked required></td>
																	<td><input type="radio" value="rem_mundur_rusak" name="rem_mundur_keluar"></td>
																	<td><input type="radio" value="rem_mundur_kotor" name="rem_mundur_keluar"></td>
																	<td><input type="radio" value="rem_mundur_ada" name="rem_mundur_keluar">Ada ; <input type="radio" value="rem_mundur_tidak_ada" name="rem_mundur_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="rem_mundur" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>9</td>
																	<td>Lampu Sen</td>
																	<td><input type="radio" value="lampu_sen_baik" name="lampu_sen_keluar" checked required></td>
																	<td><input type="radio" value="lampu_sen_rusak" name="lampu_sen_keluar"></td>
																	<td><input type="radio" value="lampu_sen_kotor" name="lampu_sen_keluar"></td>
																	<td><input type="radio" value="lampu_sen_ada" name="lampu_sen_keluar">Ada ; <input type="radio" value="lampu_sen_tidak_ada" name="lampu_sen_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="lampu_sen" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>10</td>
																	<td>Kunci Roda</td>
																	<td><input type="radio" value="kunci_roda_baik" name="kunci_roda_keluar" required></td>
																	<td><input type="radio" value="kunci_roda_rusak" name="kunci_roda_keluar"></td>
																	<td><input type="radio" value="kunci_roda_kotor" name="kunci_roda_keluar"></td>
																	<td><input type="radio" value="kunci_roda_ada" name="kunci_roda_keluar" checked>Ada ; <input type="radio" value="kunci_roda_tidak_ada" name="kunci_roda_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="kunci_roda" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>11</td>
																	<td>Dongkrak</td>
																	<td><input type="radio" value="dongkrak_baik" name="dongkrak_keluar" required></td>
																	<td><input type="radio" value="dongkrak_rusak" name="dongkrak_keluar"></td>
																	<td><input type="radio" value="dongkrak_kotor" name="dongkrak_keluar"></td>
																	<td><input type="radio" value="dongkrak_ada" name="dongkrak_keluar" checked>Ada ; <input type="radio" value="dongkrak_tidak_ada" name="dongkrak_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="dongkrak" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>12</td>
																	<td>Wiper</td>
																	<td><input type="radio" value="wiper_baik" name="wiper_keluar" checked required></td>
																	<td><input type="radio" value="wiper_rusak" name="wiper_keluar"></td>
																	<td><input type="radio" value="wiper_kotor" name="wiper_keluar"></td>
																	<td><input type="radio" value="wiper_ada" name="wiper_keluar">Ada ;<input type="radio" value="wiper_tidak_ada" name="wiper_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="wiper" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>13</td>
																	<td>Kondisi Body</td>
																	<td><input type="radio" value="kondisi_body_baik" name="kondisi_body_keluar" checked required></td>
																	<td><input type="radio" value="kondisi_body_rusak" name="kondisi_body_keluar"></td>
																	<td><input type="radio" value="kondisi_body_kotor" name="kondisi_body_keluar"></td>
																	<td><input type="radio" value="kondisi_body_ada" name="kondisi_body_keluar">Ada ; <input type="radio" value="kondisi_body_tidak_ada" name="kondisi_body_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="kondisi_body" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>14</td>
																	<td>Kondisi Cat Body</td>
																	<td><input type="radio" value="kondisi_cat_body_baik" name="kondisi_cat_body_keluar" checked required></td>
																	<td><input type="radio" value="kondisi_cat_body_rusak" name="kondisi_cat_body_keluar"></td>
																	<td><input type="radio" value="kondisi_cat_body_kotor" name="kondisi_cat_body_keluar"></td>
																	<td><input type="radio" value="kondisi_cat_body_ada" name="kondisi_cat_body_keluar">Ada ; <input type="radio" value="kondisi_cat_body_tidak_ada" name="kondisi_cat_body_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="kondisi_cat_body" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>15</td>
																	<td>Air Radiator</td>
																	<td><input type="radio" value="air_radiator_baik" name="air_radiator_keluar" checked required></td>
																	<td><input type="radio" value="air_radiator_rusak" name="air_radiator_keluar"></td>
																	<td><input type="radio" value="air_radiator_kotor" name="air_radiator_keluar"></td>
																	<td><input type="radio" value="air_radiator_ada" name="air_radiator_keluar" >Ada ; <input type="radio" value="air_radiator_tidak_ada" name="air_radiator_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="air_radiator" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>16</td>
																	<td>Oli Mesin</td>
																	<td><input type="radio" value="oli_mesin_baik" name="oli_mesin_keluar" checked required></td>
																	<td><input type="radio" value="oli_mesin_rusak" name="oli_mesin_keluar"></td>
																	<td><input type="radio" value="oli_mesin_kotor" name="oli_mesin_keluar"></td>
																	<td><input type="radio" value="oli_mesin_ada" name="oli_mesin_keluar">Ada ; <input type="radio" value="oli_mesin_tidak_ada" name="oli_mesin_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="oli_mesin" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>17</td>
																	<td>Air Wiper</td>
																	<td><input type="radio" value="air_wiper_baik" name="air_wiper_keluar" checked required></td>
																	<td><input type="radio" value="air_wiper_rusak" name="air_wiper_keluar"></td>
																	<td><input type="radio" value="air_wiper_kotor" name="air_wiper_keluar"></td>
																	<td><input type="radio" value="air_wiper_ada" name="air_wiper_keluar">Ada ; <input type="radio" value="air_wiper_tidak_ada" name="air_wiper_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="air_wiper" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>18</td>
																	<td>Tape</td>
																	<td><input type="radio" value="tape_baik" name="tape_keluar" checked required></td>
																	<td><input type="radio" value="tape_rusak" name="tape_keluar"></td>
																	<td><input type="radio" value="tape_kotor" name="tape_keluar"></td>
																	<td><input type="radio" value="tape_ada" name="tape_keluar">Ada ; <input type="radio" value="tape_tidak_ada" name="tape_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="tape" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>19</td>
																	<td>Tutup Velg</td>
																	<td><input type="radio" value="tutup_velg_baik" name="tutup_velg_keluar" checked required></td>
																	<td><input type="radio" value="tutup_velg_rusak" name="tutup_velg_keluar"></td>
																	<td><input type="radio" value="tutup_velg_kotor" name="tutup_velg_keluar"></td>
																	<td><input type="radio" value="tutup_velg_ada" name="tutup_velg_keluar">Ada ; <input type="radio" value="tutup_velg_tidak_ada" name="tutup_velg_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="tutup_velg" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>20</td>
																	<td>Toolkit</td>
																	<td><input type="radio" value="toolkit_baik" name="toolkit_keluar" required></td>
																	<td><input type="radio" value="toolkit_rusak" name="toolkit_keluar"></td>
																	<td><input type="radio" value="toolkit_kotor" name="toolkit_keluar"></td>
																	<td><input type="radio" value="toolkit_ada" name="toolkit_keluar" checked>Ada ; <input type="radio" value="toolkit_tidak_ada" name="toolkit_keluar"> Tidak Ada</td>
																	<td><input type="text" class="form-control" name="toolkit" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
															</thead>

															<tbody>
																
															</tbody>
														</table>
													</div><!-- /.span -->
												</div><!-- /.row -->
											</div>
											<div class="step-pane" data-step="3">
												<div class="center">
													<h3 class="blue lighter">Selesai, Periksa Kembali Sebelum Submit Ceklist</h3>
												</div>
											</div>
										</div>
										<div class="modal fade" id="selesai" tabindex="-1" role="dialog">
										    <div class="modal-dialog modal-sm">
										        <div class="modal-content">
										            <div class="modal-header">
										                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										                <h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
										            </div>
										            <div class="modal-body">
										                <p class="text-center">Anda Yakin Data Yang Anda Inputkan Sudah Benar</p>
										            </div>
										            <div class="modal-footer">
										            	<center>
											                <button class="btn btn-primary btn-mini" name="simpan" type="submit">Simpan</button>
										            	</center>
										            </div>
										        </div>
										    </div>
										</div>
									</form>
								</div>

								<hr />
								<div class="wizard-actions">
									<button class="btn btn-prev">
										<i class="ace-icon fa fa-arrow-left"></i>
										Prev
									</button>

									<button class="btn btn-success btn-next" data-last="Finish" name="akhir">
										Next
										<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
									</button>
								</div>
							</div><!-- /.widget-main -->
						</div><!-- /.widget-body -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	if (isset($_POST['simpan'])) {
		$date          = date("Ymd");
		$cek_idceklist = mysqli_query($koneksi,"select id_ceklist from ceklist where id_ceklist like '%$date' order by desc limit 1");
		$row_cekidlist = mysqli_fetch_array($cek_idceklist);
		if (mysqli_num_rows($cek_idceklist)>0) {
			$id_ceklist = $row_cekidlist['id_ceklist']+1;
		}else{
			$id_ceklist = $date."01";
		}
		// step 2
		$id_mobil      = $_POST['id_mobil'];
		$id_sopir      = $_POST['id_supir'];
		// mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman) values ('1','1')");
		$insert 	   .= mysqli_query($koneksi,"insert into kendaraan values ('','$id_peminjaman','$id_mobil','$id_sopir','$id_ceklist')")or die(mysqli_error($koneksi));

		$query_idkendaraan = mysqli_query($koneksi,"select id_kendaraan from kendaraan where ceklist_code='$id_ceklist'")or die(mysqli_error($koneksi));
		$row_idkendaraan   = mysqli_fetch_array($query_idkendaraan);
		$id_kendaraan      = $row_idkendaraan['id_kendaraan'];
		
		$update        .= mysqli_query($koneksi,"update peminjaman set status='terima' where id_peminjaman='$id_peminjaman'");
		/*$update        .= mysqli_query($koneksi,"update sopir set status_sopir='tidak' where id_sopir='$id_sopir'");
		$update        .= mysqli_query($koneksi,"update mobil set status='tidak' where id_mobil='$id_mobil'");*/
		// step 3
		/*1 stnk*/
		$stnk_keluar             = $_POST['stnk_keluar'];
		$stnk                    = $_POST['stnk'];
		if ($stnk_keluar == "stnk_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','STNK','y','$stnk','$id_ceklist')");
		}elseif ($stnk_keluar == "stnk_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','STNK','y','$stnk','$id_ceklist')");
		}elseif ($stnk_keluar == "stnk_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','STNK','y','$stnk','$id_ceklist')");
		}elseif ($stnk_keluar == "stnk_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','STNK','y','$stnk','$id_ceklist')");
		}elseif ($stnk_keluar == "stnk_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','STNK','n','$stnk','$id_ceklist')");
		}
		/*2 bbm*/
		$bbm_keluar              = $_POST['bbm_keluar'];
		$bbm                     = $_POST['bbm'];
		if ($bbm_keluar == "bbm_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','bbm','y','$bbm','$id_ceklist')");
		}elseif ($bbm_keluar == "bbm_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','bbm','y','$bbm','$id_ceklist')");
		}elseif ($bbm_keluar == "bbm_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','bbm','y','$bbm','$id_ceklist')");
		}elseif ($bbm_keluar == "bbm_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','bbm','y','$bbm','$id_ceklist')");
		}elseif ($bbm_keluar == "bbm_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','bbm','n','$bbm','$id_ceklist')");
		}
		/*3 ac*/
		$ac_keluar               = $_POST['ac_keluar'];
		$ac                      = $_POST['ac'];
		if ($ac_keluar == "ac_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','ac','y','$ac','$id_ceklist')");
		}elseif ($ac_keluar == "ac_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','ac','y','$ac','$id_ceklist')");
		}elseif ($ac_keluar == "ac_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','ac','y','$ac','$id_ceklist')");
		}elseif ($ac_keluar == "ac_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','ac','y','$ac','$id_ceklist')");
		}elseif ($ac_keluar == "ac_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','ac','n','$ac','$id_ceklist')");
		}
		/*4 spion_luar*/
		$spion_luar_keluar       = $_POST['spion_luar_keluar'];
		$spion_luar              = $_POST['spion_luar'];
		if ($spion_luar_keluar == "spion_luar_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','spion_luar','y','$spion_luar','$id_ceklist')");
		}elseif ($spion_luar_keluar == "spion_luar_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','spion_luar','y','$spion_luar','$id_ceklist')");
		}elseif ($spion_luar_keluar == "spion_luar_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','spion_luar','y','$spion_luar','$id_ceklist')");
		}elseif ($spion_luar_keluar == "spion_luar_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','spion_luar','y','$spion_luar','$id_ceklist')");
		}elseif ($spion_luar_keluar == "spion_luar_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','spion_luar','n','$spion_luar','$id_ceklist')");
		}
		/*5 spion_dalam*/
		$spion_dalam_keluar      = $_POST['spion_dalam_keluar'];
		$spion_dalam             = $_POST['spion_dalam'];
		if ($spion_dalam_keluar == "spion_dalam_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','spion_dalam','y','$spion_dalam','$id_ceklist')");
		}elseif ($spion_dalam_keluar == "spion_dalam_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','spion_dalam','y','$spion_dalam','$id_ceklist')");
		}elseif ($spion_dalam_keluar == "spion_dalam_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','spion_dalam','y','$spion_dalam','$id_ceklist')");
		}elseif ($spion_dalam_keluar == "spion_dalam_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','spion_dalam','y','$spion_dalam','$id_ceklist')");
		}elseif ($spion_dalam_keluar == "spion_dalam_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','spion_dalam','n','$spion_dalam','$id_ceklist')");
		}
		/*6 ban_serep*/
		$ban_serep_keluar        = $_POST['ban_serep_keluar'];
		$ban_serep               = $_POST['ban_serep'];
		if ($ban_serep_keluar == "ban_serep_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','ban_serep','y','$ban_serep','$id_ceklist')");
		}elseif ($ban_serep_keluar == "ban_serep_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','ban_serep','y','$ban_serep','$id_ceklist')");
		}elseif ($ban_serep_keluar == "ban_serep_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','ban_serep','y','$ban_serep','$id_ceklist')");
		}elseif ($ban_serep_keluar == "ban_serep_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','ban_serep','y','$ban_serep','$id_ceklist')");
		}elseif ($ban_serep_keluar == "ban_serep_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','ban_serep','n','$ban_serep','$id_ceklist')");
		}
		/*7 lampu_depan*/
		$lampu_depan_keluar      = $_POST['lampu_depan_keluar'];
		$lampu_depan             = $_POST['lampu_depan'];
		if ($lampu_depan_keluar == "lampu_depan_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','lampu_depan','y','$lampu_depan','$id_ceklist')");
		}elseif ($lampu_depan_keluar == "lampu_depan_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','lampu_depan','y','$lampu_depan','$id_ceklist')");
		}elseif ($lampu_depan_keluar == "lampu_depan_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','lampu_depan','y','$lampu_depan','$id_ceklist')");
		}elseif ($lampu_depan_keluar == "lampu_depan_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','lampu_depan','y','$lampu_depan','$id_ceklist')");
		}elseif ($lampu_depan_keluar == "lampu_depan_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','lampu_depan','n','$lampu_depan','$id_ceklist')");
		}
		/*8 rem_mundur*/
		$rem_mundur_keluar       = $_POST['rem_mundur_keluar'];
		$rem_mundur              = $_POST['rem_mundur'];
		if ($rem_mundur_keluar == "rem_mundur_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','rem_mundur','y','$rem_mundur','$id_ceklist')");
		}elseif ($rem_mundur_keluar == "rem_mundur_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','rem_mundur','y','$rem_mundur','$id_ceklist')");
		}elseif ($rem_mundur_keluar == "rem_mundur_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','rem_mundur','y','$rem_mundur','$id_ceklist')");
		}elseif ($rem_mundur_keluar == "rem_mundur_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','rem_mundur','y','$rem_mundur','$id_ceklist')");
		}elseif ($rem_mundur_keluar == "rem_mundur_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','rem_mundur','n','$rem_mundur','$id_ceklist')");
		}
		/*9 lampu_sen*/
		$lampu_sen_keluar        = $_POST['lampu_sen_keluar'];
		$lampu_sen               = $_POST['lampu_sen'];
		if ($lampu_sen_keluar == "lampu_sen_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','lampu_sen','y','$lampu_sen','$id_ceklist')");
		}elseif ($lampu_sen_keluar == "lampu_sen_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','lampu_sen','y','$lampu_sen','$id_ceklist')");
		}elseif ($lampu_sen_keluar == "lampu_sen_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','lampu_sen','y','$lampu_sen','$id_ceklist')");
		}elseif ($lampu_sen_keluar == "lampu_sen_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','lampu_sen','y','$lampu_sen','$id_ceklist')");
		}elseif ($lampu_sen_keluar == "lampu_sen_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','lampu_sen','n','$lampu_sen','$id_ceklist')");
		}
		/*10 kunci_roda*/
		$kunci_roda_keluar       = $_POST['kunci_roda_keluar'];
		$kunci_roda              = $_POST['kunci_roda'];
		if ($kunci_roda_keluar == "kunci_roda_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kunci_roda','y','$kunci_roda','$id_ceklist')");
		}elseif ($kunci_roda_keluar == "kunci_roda_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kunci_roda','y','$kunci_roda','$id_ceklist')");
		}elseif ($kunci_roda_keluar == "kunci_roda_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kunci_roda','y','$kunci_roda','$id_ceklist')");
		}elseif ($kunci_roda_keluar == "kunci_roda_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kunci_roda','y','$kunci_roda','$id_ceklist')");
		}elseif ($kunci_roda_keluar == "kunci_roda_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kunci_roda','n','$kunci_roda','$id_ceklist')");
		}
		/*11 dongkrak*/
		$dongkrak_keluar         = $_POST['dongkrak_keluar'];
		$dongkrak                = $_POST['dongkrak'];
		if ($dongkrak_keluar == "dongkrak_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','dongkrak','y','$dongkrak','$id_ceklist')");
		}elseif ($dongkrak_keluar == "dongkrak_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','dongkrak','y','$dongkrak','$id_ceklist')");
		}elseif ($dongkrak_keluar == "dongkrak_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','dongkrak','y','$dongkrak','$id_ceklist')");
		}elseif ($dongkrak_keluar == "dongkrak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','dongkrak','y','$dongkrak','$id_ceklist')");
		}elseif ($dongkrak_keluar == "dongkrak_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','dongkrak','n','$dongkrak','$id_ceklist')");
		}
		/*12 wiper*/
		$wiper_keluar            = $_POST['wiper_keluar'];
		$wiper                   = $_POST['wiper'];
		if ($wiper_keluar == "wiper_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','wiper','y','$wiper','$id_ceklist')");
		}elseif ($wiper_keluar == "wiper_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','wiper','y','$wiper','$id_ceklist')");
		}elseif ($wiper_keluar == "wiper_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','wiper','y','$wiper','$id_ceklist')");
		}elseif ($wiper_keluar == "wiper_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','wiper','y','$wiper','$id_ceklist')");
		}elseif ($wiper_keluar == "wiper_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','wiper','n','$wiper','$id_ceklist')");
		}
		/*13 kondisi_body*/
		$kondisi_body_keluar     = $_POST['kondisi_body_keluar'];
		$kondisi_body            = $_POST['kondisi_body'];
		if ($kondisi_body_keluar == "kondisi_body_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kondisi_body','y','$kondisi_body','$id_ceklist')");
		}elseif ($kondisi_body_keluar == "kondisi_body_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kondisi_body','y','$kondisi_body','$id_ceklist')");
		}elseif ($kondisi_body_keluar == "kondisi_body_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kondisi_body','y','$kondisi_body','$id_ceklist')");
		}elseif ($kondisi_body_keluar == "kondisi_body_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kondisi_body','y','$kondisi_body','$id_ceklist')");
		}elseif ($kondisi_body_keluar == "kondisi_body_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kondisi_body','n','$kondisi_body','$id_ceklist')");
		}
		/*14 kondisi_cat_body*/
		$kondisi_cat_body_keluar = $_POST['kondisi_cat_body_keluar'];
		$kondisi_cat_body        = $_POST['kondisi_cat_body'];
		if ($kondisi_cat_body_keluar == "kondisi_cat_body_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kondisi_cat_body','y','$kondisi_cat_body','$id_ceklist')");
		}elseif ($kondisi_cat_body_keluar == "kondisi_cat_body_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kondisi_cat_body','y','$kondisi_cat_body','$id_ceklist')");
		}elseif ($kondisi_cat_body_keluar == "kondisi_cat_body_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kondisi_cat_body','y','$kondisi_cat_body','$id_ceklist')");
		}elseif ($kondisi_cat_body_keluar == "kondisi_cat_body_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kondisi_cat_body','y','$kondisi_cat_body','$id_ceklist')");
		}elseif ($kondisi_cat_body_keluar == "kondisi_cat_body_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kondisi_cat_body','n','$kondisi_cat_body','$id_ceklist')");
		}
		/*15 air_radiator*/
		$air_radiator_keluar     = $_POST['air_radiator_keluar'];
		$air_radiator            = $_POST['air_radiator'];
		if ($air_radiator_keluar == "air_radiator_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','air_radiator','y','$air_radiator','$id_ceklist')");
		}elseif ($air_radiator_keluar == "air_radiator_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','air_radiator','y','$air_radiator','$id_ceklist')");
		}elseif ($air_radiator_keluar == "air_radiator_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','air_radiator','y','$air_radiator','$id_ceklist')");
		}elseif ($air_radiator_keluar == "air_radiator_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','air_radiator','y','$air_radiator','$id_ceklist')");
		}elseif ($air_radiator_keluar == "air_radiator_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','air_radiator','n','$air_radiator','$id_ceklist')");
		}
		/*16 oli_mesin*/
		$oli_mesin_keluar        = $_POST['oli_mesin_keluar'];
		$oli_mesin               = $_POST['oli_mesin'];
		if ($oli_mesin_keluar == "oli_mesin_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','oli_mesin','y','$oli_mesin','$id_ceklist')");
		}elseif ($oli_mesin_keluar == "oli_mesin_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','oli_mesin','y','$oli_mesin','$id_ceklist')");
		}elseif ($oli_mesin_keluar == "oli_mesin_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','oli_mesin','y','$oli_mesin','$id_ceklist')");
		}elseif ($oli_mesin_keluar == "oli_mesin_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','oli_mesin','y','$oli_mesin','$id_ceklist')");
		}elseif ($oli_mesin_keluar == "oli_mesin_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','oli_mesin','n','$oli_mesin','$id_ceklist')");
		}
		/*17 air_wiper*/
		$air_wiper_keluar        = $_POST['air_wiper_keluar'];
		$air_wiper               = $_POST['air_wiper'];
		if ($air_wiper_keluar == "air_wiper_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','air_wiper','y','$air_wiper','$id_ceklist')");
		}elseif ($air_wiper_keluar == "air_wiper_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','air_wiper','y','$air_wiper','$id_ceklist')");
		}elseif ($air_wiper_keluar == "air_wiper_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','air_wiper','y','$air_wiper','$id_ceklist')");
		}elseif ($air_wiper_keluar == "air_wiper_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','air_wiper','y','$air_wiper','$id_ceklist')");
		}elseif ($air_wiper_keluar == "air_wiper_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','air_wiper','n','$air_wiper','$id_ceklist')");
		}
		/*18 tape*/
		$tape_keluar             = $_POST['tape_keluar'];
		$tape                    = $_POST['tape'];
		if ($tape_keluar == "tape_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','tape','y','$tape','$id_ceklist')");
		}elseif ($tape_keluar == "tape_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','tape','y','$tape','$id_ceklist')");
		}elseif ($tape_keluar == "tape_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','tape','y','$tape','$id_ceklist')");
		}elseif ($tape_keluar == "tape_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','tape','y','$tape','$id_ceklist')");
		}elseif ($tape_keluar == "tape_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','tape','n','$tape','$id_ceklist')");
		}
		/*19 tutup_velg*/
		$tutup_velg_keluar       = $_POST['tutup_velg_keluar'];
		$tutup_velg              = $_POST['tutup_velg'];
		if ($tutup_velg_keluar == "tutup_velg_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','tutup_velg','y','$tutup_velg','$id_ceklist')");
		}elseif ($tutup_velg_keluar == "tutup_velg_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','tutup_velg','y','$tutup_velg','$id_ceklist')");
		}elseif ($tutup_velg_keluar == "tutup_velg_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','tutup_velg','y','$tutup_velg','$id_ceklist')");
		}elseif ($tutup_velg_keluar == "tutup_velg_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','tutup_velg','y','$tutup_velg','$id_ceklist')");
		}elseif ($tutup_velg_keluar == "tutup_velg_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','tutup_velg','n','$tutup_velg','$id_ceklist')");
		}
		/*20 toolkit*/
		$toolkit_keluar          = $_POST['toolkit_keluar'];
		$toolkit                 = $_POST['toolkit'];
		if ($toolkit_keluar == "toolkit_baik") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,baik_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','toolkit','y','$toolkit','$id_ceklist')");
		}elseif ($toolkit_keluar == "toolkit_rusak") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,rusak_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','toolkit','y','$toolkit','$id_ceklist')");
		}elseif ($toolkit_keluar == "toolkit_kotor") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,kotor_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','toolkit','y','$toolkit','$id_ceklist')");
		}elseif ($toolkit_keluar == "toolkit_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','toolkit','y','$toolkit','$id_ceklist')");
		}elseif ($toolkit_keluar == "toolkit_tidak_ada") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','toolkit','n','$toolkit','$id_ceklist')");
		}
		

		/*echo "id_peminjaman=".$id_peminjaman."<br>";
		echo "id_ceklist=".$id_ceklist."<br>";
		echo "id_mobil=".$id_mobil."<br>";
		echo "id_sopir=".$id_sopir."<br>";
		echo "stnk_masuk=".$stnk_masuk."<br>";*/
		if ($insert == TRUE) {
			echo "<script>alert('berhasil')</script><script>window.location='index.php?kendaraan=pilihceklist'</script>";
		}
	}
?>
<script src="assets/js/jquery.2.1.1.min.js"></script>
<script src="assets/js/fuelux.wizard.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/additional-methods.min.js"></script>
<script src="assets/js/bootbox.min.js"></script>
<script src="assets/js/jquery.maskedinput.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script>
	jQuery(function($) {

		$('[data-rel=tooltip]').tooltip();
	
		$(".select2").css('width','200px').select2({allowClear:true})
		.on('change', function(){
			$(this).closest('form').validate().element($(this));
		}); 
	
	
		var $validation = false;
		$('#fuelux-wizard-container')
		.ace_wizard({
			//step: 2 //optional argument. wizard will jump to step "2" at first
			//buttons: '.wizard-actions:eq(0)'
		})
		.on('actionclicked.fu.wizard' , function(e, info){
			if(info.step == 1 && $validation) {
				if(!$('#validation-form').valid()) e.preventDefault();
			}
		})
		.on('finished.fu.wizard', function(e) {
			/*bootbox.dialog({
				message: "Thank you! Your information was successfully saved!", 
				buttons: {
					"success" : {
						"label" : "OK",
						"className" : "btn-sm btn-primary"
					}
				}
			});*/
			$('#selesai').modal();
		}).on('stepclick.fu.wizard', function(e){
			//e.preventDefault();//this will prevent clicking and selecting steps
		});
	
		//jump to a step
		/**
		var wizard = $('#fuelux-wizard-container').data('fu.wizard')
		wizard.currentStep = 3;
		wizard.setState();
		*/
	
		//determine selected step
		//wizard.selectedItem().step
	
	
	
		//hide or show the other form which requires validation
		//this is for demo only, you usullay want just one form in your application
		$('#skip-validation').removeAttr('checked').on('click', function(){
			$validation = this.checked;
			if(this.checked) {
				$('#sample-form').hide();
				$('#validation-form').removeClass('hide');
			}
			else {
				$('#validation-form').addClass('hide');
				$('#sample-form').show();
			}
		})
		
		$(document).one('ajaxloadstart.page', function(e) {
			//in ajax mode, remove remaining elements before leaving page
			$('[class*=select2]').remove();
		});
	})
</script>