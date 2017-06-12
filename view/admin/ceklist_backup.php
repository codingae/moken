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
												<span class="title">Pilih Daftar Perijinan</span>
											</li>

											<li data-step="2">
												<span class="step">2</span>
												<span class="title">Pilih Kendaraan</span>
											</li>

											<li data-step="3">
												<span class="step">3</span>
												<span class="title">Ceklist</span>
											</li>

											<li data-step="4">
												<span class="step">4</span>
												<span class="title">Selesai</span>
											</li>
										</ul>
									</div>

									<hr />
									<form id="form_wi" method="post" class="form-horizontal">
										<div class="step-content pos-rel">
											<div class="step-pane active" data-step="1">
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
															$query_data = mysqli_query($koneksi,"select * from peminjaman where status='proses_admin' ");
															while ($row_data = mysqli_fetch_array($query_data)) {											
														?>
														<tr>
															<td><?= $no++; ?></td>
															<td><?= ucwords($row_data['keperluan']) ?></td>
															<td class="hidden-480"><?= ucwords($row_data['tujuan']) ?></td>
															<td class="hidden-480"><?= ucwords($row_data['status']) ?></td>
															<td>
																<div class="radio">
																	<label>
																		<input name="form-field-radio" value="<?= $row_data['id_peminjaman'] ?>" type="radio" class="ace" />
																		<span class="lbl"></span>
																	</label>
																</div>
															</td>
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>

											<div class="step-pane" data-step="2">
												<div class="row">
													<fieldset>
														<div class="col-md-6 ">
															<label class="block clearfix">
															Pilih Kendaraan
																<select name="id_mobil" style="width: 100%">
																	<option value="">Pilih</option>
																	<?php 
																		$query_kendaraan = mysqli_query($koneksi,"select * from mobil where status='ada'");
																		while ($row_kendaraan   = mysqli_fetch_array($query_kendaraan)) {																
																	?>
																	<option value="<?= $row_kendaraan['id_mobil'] ?>"><?= ucfirst($row_kendaraan['jenis_mobil'])." ; ".$row_kendaraan['nopol']." ; ".$row_kendaraan['keterangan'] ?></option>
																	<?php } ?>
																</select>
															</label>
														</div>															
														<div class="col-md-6 ">
															<label class="block clearfix">
															Pilih Sopir
																<select name="id_supir" style="width: 100%">
																	<option value="">Pilih</option>
																	<?php 
																		$query_supir = mysqli_query($koneksi,"select * from sopir where status_sopir='ada'");
																		while ($row_supir = mysqli_fetch_array($query_supir)) {																
																	?>
																	<option value="<?= $row_supir['id_sopir'] ?>"><?= ucfirst($row_supir['nama']) ?></option>
																	<?php } ?>
																</select>
															</label>
														</div>
													</fieldset>
												</div>
											</div>

											<div class="step-pane" data-step="3">
												<div class="row">
													<div class="col-xs-12">
														<table id="simple-table" class="table table-striped table-bordered table-hover" style="font-size: 10px">
															<thead>
																<tr>
																	<th rowspan="2">No</th>
																	<th rowspan="2">Nama Komponen</th>
																	<th colspan="4">Kondisi Keluar</th>
																	<th colspan="4">Kondisi Masuk</th>
																	<th rowspan="2">Keterangan</th>
																</tr>
																<tr>
																	<td>Baik</td>
																	<td>Rusak</td>
																	<td>Kotor</td>
																	<td>A/TA</td>
																	<td>Baik</td>
																	<td>Rusak</td>
																	<td>Kotor</td>
																	<td>A/TA</td>
																</tr>
																<tr>
																	<td>1</td>
																	<td>STNK</td>
																	<td><input type="radio" value="stnk_baik" name="stnk_keluar"></td>
																	<td><input type="radio" value="stnk_rusak" name="stnk_keluar"></td>
																	<td><input type="radio" value="stnk_kotor" name="stnk_keluar"></td>
																	<td><input type="radio" value="stnk_ata" name="stnk_keluar"></td>
																	<td><input type="radio" value="stnk_baik" name="stnk_masuk"></td>
																	<td><input type="radio" value="stnk_rusak" name="stnk_masuk"></td>
																	<td><input type="radio" value="stnk_kotor" name="stnk_masuk"></td>
																	<td><input type="radio" value="stnk_ata" name="stnk_masuk"></td>
																	<td><input type="text" class="form-control" name="stnk" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>2</td>
																	<td>BBM</td>
																	<td><input type="radio" value="bbm_baik" name="bbm_keluar"></td>
																	<td><input type="radio" value="bbm_rusak" name="bbm_keluar"></td>
																	<td><input type="radio" value="bbm_kotor" name="bbm_keluar"></td>
																	<td><input type="radio" value="bbm_ata" name="bbm_keluar"></td>
																	<td><input type="radio" value="bbm_baik" name="bbm_masuk"></td>
																	<td><input type="radio" value="bbm_rusak" name="bbm_masuk"></td>
																	<td><input type="radio" value="bbm_kotor" name="bbm_masuk"></td>
																	<td><input type="radio" value="bbm_ata" name="bbm_masuk"></td>
																	<td><input type="text" class="form-control" name="bbm" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>3</td>
																	<td>AC</td>
																	<td><input type="radio" value="ac_baik" name="ac_keluar"></td>
																	<td><input type="radio" value="ac_rusak" name="ac_keluar"></td>
																	<td><input type="radio" value="ac_kotor" name="ac_keluar"></td>
																	<td><input type="radio" value="ac_ata" name="ac_keluar"></td>
																	<td><input type="radio" value="ac_baik" name="ac_masuk"></td>
																	<td><input type="radio" value="ac_rusak" name="ac_masuk"></td>
																	<td><input type="radio" value="ac_kotor" name="ac_masuk"></td>
																	<td><input type="radio" value="ac_ata" name="ac_masuk"></td>
																	<td><input type="text" class="form-control" name="ac" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>4</td>
																	<td>Spion Luar</td>
																	<td><input type="radio" value="spion_luar_baik" name="spion_luar_keluar"></td>
																	<td><input type="radio" value="spion_luar_rusak" name="spion_luar_keluar"></td>
																	<td><input type="radio" value="spion_luar_kotor" name="spion_luar_keluar"></td>
																	<td><input type="radio" value="spion_luar_ata" name="spion_luar_keluar"></td>
																	<td><input type="radio" value="spion_luar_baik" name="spion_luar_masuk"></td>
																	<td><input type="radio" value="spion_luar_rusak" name="spion_luar_masuk"></td>
																	<td><input type="radio" value="spion_luar_kotor" name="spion_luar_masuk"></td>
																	<td><input type="radio" value="spion_luar_ata" name="spion_luar_masuk"></td>
																	<td><input type="text" class="form-control" name="spion_luar" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>5</td>
																	<td>Spion Dalam</td>
																	<td><input type="radio" value="spion_dalam_baik" name="spion_dalam_keluar"></td>
																	<td><input type="radio" value="spion_dalam_rusak" name="spion_dalam_keluar"></td>
																	<td><input type="radio" value="spion_dalam_kotor" name="spion_dalam_keluar"></td>
																	<td><input type="radio" value="spion_dalam_ata" name="spion_dalam_keluar"></td>
																	<td><input type="radio" value="spion_dalam_baik" name="spion_dalam_masuk"></td>
																	<td><input type="radio" value="spion_dalam_rusak" name="spion_dalam_masuk"></td>
																	<td><input type="radio" value="spion_dalam_kotor" name="spion_dalam_masuk"></td>
																	<td><input type="radio" value="spion_dalam_ata" name="spion_dalam_masuk"></td>
																	<td><input type="text" class="form-control" name="spion_dalam" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>6</td>
																	<td>Ban Serep</td>
																	<td><input type="radio" value="ban_serep_baik" name="ban_serep_keluar"></td>
																	<td><input type="radio" value="ban_serep_rusak" name="ban_serep_keluar"></td>
																	<td><input type="radio" value="ban_serep_kotor" name="ban_serep_keluar"></td>
																	<td><input type="radio" value="ban_serep_ata" name="ban_serep_keluar"></td>
																	<td><input type="radio" value="ban_serep_baik" name="ban_serep_masuk"></td>
																	<td><input type="radio" value="ban_serep_rusak" name="ban_serep_masuk"></td>
																	<td><input type="radio" value="ban_serep_kotor" name="ban_serep_masuk"></td>
																	<td><input type="radio" value="ban_serep_ata" name="ban_serep_masuk"></td>
																	<td><input type="text" class="form-control" name="ban_serep" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>7</td>
																	<td>Lampu Depan</td>
																	<td><input type="radio" value="lampu_depan_baik" name="lampu_depan_keluar"></td>
																	<td><input type="radio" value="lampu_depan_rusak" name="lampu_depan_keluar"></td>
																	<td><input type="radio" value="lampu_depan_kotor" name="lampu_depan_keluar"></td>
																	<td><input type="radio" value="lampu_depan_ata" name="lampu_depan_keluar"></td>
																	<td><input type="radio" value="lampu_depan_baik" name="lampu_depan_masuk"></td>
																	<td><input type="radio" value="lampu_depan_rusak" name="lampu_depan_masuk"></td>
																	<td><input type="radio" value="lampu_depan_kotor" name="lampu_depan_masuk"></td>
																	<td><input type="radio" value="lampu_depan_ata" name="lampu_depan_masuk"></td>
																	<td><input type="text" class="form-control" name="lampu_depan" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>8</td>
																	<td>Lampu Rem & Mundur</td>
																	<td><input type="radio" value="rem_mundur_baik" name="rem_mundur_keluar"></td>
																	<td><input type="radio" value="rem_mundur_rusak" name="rem_mundur_keluar"></td>
																	<td><input type="radio" value="rem_mundur_kotor" name="rem_mundur_keluar"></td>
																	<td><input type="radio" value="rem_mundur_ata" name="rem_mundur_keluar"></td>
																	<td><input type="radio" value="rem_mundur_baik" name="rem_mundur_masuk"></td>
																	<td><input type="radio" value="rem_mundur_rusak" name="rem_mundur_masuk"></td>
																	<td><input type="radio" value="rem_mundur_kotor" name="rem_mundur_masuk"></td>
																	<td><input type="radio" value="rem_mundur_ata" name="rem_mundur_masuk"></td>
																	<td><input type="text" class="form-control" name="rem_mundur" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>9</td>
																	<td>Lampu Sen</td>
																	<td><input type="radio" value="lampu_sen_baik" name="lampu_sen_keluar"></td>
																	<td><input type="radio" value="lampu_sen_rusak" name="lampu_sen_keluar"></td>
																	<td><input type="radio" value="lampu_sen_kotor" name="lampu_sen_keluar"></td>
																	<td><input type="radio" value="lampu_sen_ata" name="lampu_sen_keluar"></td>
																	<td><input type="radio" value="lampu_sen_baik" name="lampu_sen_masuk"></td>
																	<td><input type="radio" value="lampu_sen_rusak" name="lampu_sen_masuk"></td>
																	<td><input type="radio" value="lampu_sen_kotor" name="lampu_sen_masuk"></td>
																	<td><input type="radio" value="lampu_sen_ata" name="lampu_sen_masuk"></td>
																	<td><input type="text" class="form-control" name="lampu_sen" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>10</td>
																	<td>Kunci Roda</td>
																	<td><input type="radio" value="kunci_roda_baik" name="kunci_roda_keluar"></td>
																	<td><input type="radio" value="kunci_roda_rusak" name="kunci_roda_keluar"></td>
																	<td><input type="radio" value="kunci_roda_kotor" name="kunci_roda_keluar"></td>
																	<td><input type="radio" value="kunci_roda_ata" name="kunci_roda_keluar"></td>
																	<td><input type="radio" value="kunci_roda_baik" name="kunci_roda_masuk"></td>
																	<td><input type="radio" value="kunci_roda_rusak" name="kunci_roda_masuk"></td>
																	<td><input type="radio" value="kunci_roda_kotor" name="kunci_roda_masuk"></td>
																	<td><input type="radio" value="kunci_roda_ata" name="kunci_roda_masuk"></td>
																	<td><input type="text" class="form-control" name="kunci_roda" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>11</td>
																	<td>Dongkrak</td>
																	<td><input type="radio" value="dongkrak_baik" name="dongkrak_keluar"></td>
																	<td><input type="radio" value="dongkrak_rusak" name="dongkrak_keluar"></td>
																	<td><input type="radio" value="dongkrak_kotor" name="dongkrak_keluar"></td>
																	<td><input type="radio" value="dongkrak_ata" name="dongkrak_keluar"></td>
																	<td><input type="radio" value="dongkrak_baik" name="dongkrak_masuk"></td>
																	<td><input type="radio" value="dongkrak_rusak" name="dongkrak_masuk"></td>
																	<td><input type="radio" value="dongkrak_kotor" name="dongkrak_masuk"></td>
																	<td><input type="radio" value="dongkrak_ata" name="dongkrak_masuk"></td>
																	<td><input type="text" class="form-control" name="dongkrak" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>12</td>
																	<td>Wiper</td>
																	<td><input type="radio" value="wiper_baik" name="wiper_keluar"></td>
																	<td><input type="radio" value="wiper_rusak" name="wiper_keluar"></td>
																	<td><input type="radio" value="wiper_kotor" name="wiper_keluar"></td>
																	<td><input type="radio" value="wiper_ata" name="wiper_keluar"></td>
																	<td><input type="radio" value="wiper_baik" name="wiper_masuk"></td>
																	<td><input type="radio" value="wiper_rusak" name="wiper_masuk"></td>
																	<td><input type="radio" value="wiper_kotor" name="wiper_masuk"></td>
																	<td><input type="radio" value="wiper_ata" name="wiper_masuk"></td>
																	<td><input type="text" class="form-control" name="wiper" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>13</td>
																	<td>Kondisi Body</td>
																	<td><input type="radio" value="kondisi_body_baik" name="kondisi_body_keluar"></td>
																	<td><input type="radio" value="kondisi_body_rusak" name="kondisi_body_keluar"></td>
																	<td><input type="radio" value="kondisi_body_kotor" name="kondisi_body_keluar"></td>
																	<td><input type="radio" value="kondisi_body_ata" name="kondisi_body_keluar"></td>
																	<td><input type="radio" value="kondisi_body_baik" name="kondisi_body_masuk"></td>
																	<td><input type="radio" value="kondisi_body_rusak" name="kondisi_body_masuk"></td>
																	<td><input type="radio" value="kondisi_body_kotor" name="kondisi_body_masuk"></td>
																	<td><input type="radio" value="kondisi_body_ata" name="kondisi_body_masuk"></td>
																	<td><input type="text" class="form-control" name="kondisi_body" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>14</td>
																	<td>Kondisi Cat Body</td>
																	<td><input type="radio" value="kondisi_cat_body_baik" name="kondisi_cat_body_keluar"></td>
																	<td><input type="radio" value="kondisi_cat_body_rusak" name="kondisi_cat_body_keluar"></td>
																	<td><input type="radio" value="kondisi_cat_body_kotor" name="kondisi_cat_body_keluar"></td>
																	<td><input type="radio" value="kondisi_cat_body_ata" name="kondisi_cat_body_keluar"></td>
																	<td><input type="radio" value="kondisi_cat_body_baik" name="kondisi_cat_body_masuk"></td>
																	<td><input type="radio" value="kondisi_cat_body_rusak" name="kondisi_cat_body_masuk"></td>
																	<td><input type="radio" value="kondisi_cat_body_kotor" name="kondisi_cat_body_masuk"></td>
																	<td><input type="radio" value="kondisi_cat_body_ata" name="kondisi_cat_body_masuk"></td>
																	<td><input type="text" class="form-control" name="kondisi_cat_body" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>15</td>
																	<td>Air Radiator</td>
																	<td><input type="radio" value="air_radiator_baik" name="air_radiator_keluar"></td>
																	<td><input type="radio" value="air_radiator_rusak" name="air_radiator_keluar"></td>
																	<td><input type="radio" value="air_radiator_kotor" name="air_radiator_keluar"></td>
																	<td><input type="radio" value="air_radiator_ata" name="air_radiator_keluar"></td>
																	<td><input type="radio" value="air_radiator_baik" name="air_radiator_masuk"></td>
																	<td><input type="radio" value="air_radiator_rusak" name="air_radiator_masuk"></td>
																	<td><input type="radio" value="air_radiator_kotor" name="air_radiator_masuk"></td>
																	<td><input type="radio" value="air_radiator_ata" name="air_radiator_masuk"></td>
																	<td><input type="text" class="form-control" name="air_radiator" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>16</td>
																	<td>Oli Mesin</td>
																	<td><input type="radio" value="oli_mesin_baik" name="oli_mesin_keluar"></td>
																	<td><input type="radio" value="oli_mesin_rusak" name="oli_mesin_keluar"></td>
																	<td><input type="radio" value="oli_mesin_kotor" name="oli_mesin_keluar"></td>
																	<td><input type="radio" value="oli_mesin_ata" name="oli_mesin_keluar"></td>
																	<td><input type="radio" value="oli_mesin_baik" name="oli_mesin_masuk"></td>
																	<td><input type="radio" value="oli_mesin_rusak" name="oli_mesin_masuk"></td>
																	<td><input type="radio" value="oli_mesin_kotor" name="oli_mesin_masuk"></td>
																	<td><input type="radio" value="oli_mesin_ata" name="oli_mesin_masuk"></td>
																	<td><input type="text" class="form-control" name="oli_mesin" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>17</td>
																	<td>Air Wiper</td>
																	<td><input type="radio" value="air_wiper_baik" name="air_wiper_keluar"></td>
																	<td><input type="radio" value="air_wiper_rusak" name="air_wiper_keluar"></td>
																	<td><input type="radio" value="air_wiper_kotor" name="air_wiper_keluar"></td>
																	<td><input type="radio" value="air_wiper_ata" name="air_wiper_keluar"></td>
																	<td><input type="radio" value="air_wiper_baik" name="air_wiper_masuk"></td>
																	<td><input type="radio" value="air_wiper_rusak" name="air_wiper_masuk"></td>
																	<td><input type="radio" value="air_wiper_kotor" name="air_wiper_masuk"></td>
																	<td><input type="radio" value="air_wiper_ata" name="air_wiper_masuk"></td>
																	<td><input type="text" class="form-control" name="air_wiper" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>18</td>
																	<td>Tape</td>
																	<td><input type="radio" value="tape_baik" name="tape_keluar"></td>
																	<td><input type="radio" value="tape_rusak" name="tape_keluar"></td>
																	<td><input type="radio" value="tape_kotor" name="tape_keluar"></td>
																	<td><input type="radio" value="tape_ata" name="tape_keluar"></td>
																	<td><input type="radio" value="tape_baik" name="tape_masuk"></td>
																	<td><input type="radio" value="tape_rusak" name="tape_masuk"></td>
																	<td><input type="radio" value="tape_kotor" name="tape_masuk"></td>
																	<td><input type="radio" value="tape_ata" name="tape_masuk"></td>
																	<td><input type="text" class="form-control" name="tape" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>19</td>
																	<td>Tutup Velg</td>
																	<td><input type="radio" value="tutup_velg_baik" name="tutup_velg_keluar"></td>
																	<td><input type="radio" value="tutup_velg_rusak" name="tutup_velg_keluar"></td>
																	<td><input type="radio" value="tutup_velg_kotor" name="tutup_velg_keluar"></td>
																	<td><input type="radio" value="tutup_velg_ata" name="tutup_velg_keluar"></td>
																	<td><input type="radio" value="tutup_velg_baik" name="tutup_velg_masuk"></td>
																	<td><input type="radio" value="tutup_velg_rusak" name="tutup_velg_masuk"></td>
																	<td><input type="radio" value="tutup_velg_kotor" name="tutup_velg_masuk"></td>
																	<td><input type="radio" value="tutup_velg_ata" name="tutup_velg_masuk"></td>
																	<td><input type="text" class="form-control" name="tutup_velg" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
																<tr>
																	<td>20</td>
																	<td>Toolkit</td>
																	<td><input type="radio" value="toolkit_baik" name="toolkit_keluar"></td>
																	<td><input type="radio" value="toolkit_rusak" name="toolkit_keluar"></td>
																	<td><input type="radio" value="toolkit_kotor" name="toolkit_keluar"></td>
																	<td><input type="radio" value="toolkit_ata" name="toolkit_keluar"></td>
																	<td><input type="radio" value="toolkit_baik" name="toolkit_masuk"></td>
																	<td><input type="radio" value="toolkit_rusak" name="toolkit_masuk"></td>
																	<td><input type="radio" value="toolkit_kotor" name="toolkit_masuk"></td>
																	<td><input type="radio" value="toolkit_ata" name="toolkit_masuk"></td>
																	<td><input type="text" class="form-control" name="toolkit" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
																</tr>
															</thead>

															<tbody>
																
															</tbody>
														</table>
													</div><!-- /.span -->
												</div><!-- /.row -->
											</div>

											<div class="step-pane" data-step="4">
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
						</form>
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
	if (isset($_POST['simpan'])) {
		$date          = date("Ymd");
		$cek_idceklist = mysqli_query($koneksi,"select id_ceklist from ceklist where id_ceklist like '%$date' order by desc limit 1");
		$row_cekidlist = mysqli_fetch_array($cek_idceklist);
		if (mysqli_num_rows($cek_idceklist)>0) {
			$id_ceklist = $row_cekidlist['id_ceklist']+1;
		}else{
			$id_ceklist = $date."01";
		}
		// step 1
		$id_peminjaman = $_POST['form-field-radio'];
		// step 2
		$id_mobil      = $_POST['id_mobil'];
		$id_sopir      = $_POST['id_supir'];
		// mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman) values ('1','1')");
		$insert 	   .= mysqli_query($koneksi,"insert into kendaraan values ('','$id_peminjaman','$id_mobil','$id_sopir','$id_ceklist')")or die(mysqli_error($koneksi));

		$query_idkendaraan = mysqli_query($koneksi,"select id_kendaraan from kendaraan where ceklist_code='$id_ceklist'")or die(mysqli_error($koneksi));
		$row_idkendaraan   = mysqli_fetch_array($query_idkendaraan);
		$id_kendaraan      = $row_idkendaraan['id_kendaraan'];
		
		$update        .= mysqli_query($koneksi,"update peminjaman set status='terima' where id_peminjaman='$id_peminjaman'");
		$update        .= mysqli_query($koneksi,"update sopir set status_sopir='tidak' where id_sopir='$id_sopir'");
		$update        .= mysqli_query($koneksi,"update mobil set status='tidak' where id_mobil='$id_mobil'");
		// step 3
		/*1 stnk*/
		$stnk_keluar             = $_POST['stnk_keluar'];
		$stnk_masuk              = $_POST['stnk_masuk'];
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
		}elseif ($stnk_keluar == "stnk_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','STNK','y','$stnk','$id_ceklist')");
		}
		/*2 bbm*/
		$bbm_keluar              = $_POST['bbm_keluar'];
		$bbm_masuk               = $_POST['bbm_masuk'];
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
		}elseif ($bbm_keluar == "bbm_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','bbm','y','$bbm','$id_ceklist')");
		}
		/*3 ac*/
		$ac_keluar               = $_POST['ac_keluar'];
		$ac_masuk                = $_POST['ac_masuk'];
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
		}elseif ($ac_keluar == "ac_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','ac','y','$ac','$id_ceklist')");
		}
		/*4 spion_luar*/
		$spion_luar_keluar       = $_POST['spion_luar_keluar'];
		$spion_luar_masuk        = $_POST['spion_luar_masuk'];
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
		}elseif ($spion_luar_keluar == "spion_luar_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','spion_luar','y','$spion_luar','$id_ceklist')");
		}
		/*5 spion_dalam*/
		$spion_dalam_keluar      = $_POST['spion_dalam_keluar'];
		$spion_dalam_masuk       = $_POST['spion_dalam_masuk'];
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
		}elseif ($spion_dalam_keluar == "spion_dalam_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','spion_dalam','y','$spion_dalam','$id_ceklist')");
		}
		/*6 ban_serep*/
		$ban_serep_keluar        = $_POST['ban_serep_keluar'];
		$ban_serep_masuk         = $_POST['ban_serep_masuk'];
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
		}elseif ($ban_serep_keluar == "ban_serep_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','ban_serep','y','$ban_serep','$id_ceklist')");
		}
		/*7 lampu_depan*/
		$lampu_depan_keluar      = $_POST['lampu_depan_keluar'];
		$lampu_depan_masuk       = $_POST['lampu_depan_masuk'];
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
		}elseif ($lampu_depan_keluar == "lampu_depan_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','lampu_depan','y','$lampu_depan','$id_ceklist')");
		}
		/*8 rem_mundur*/
		$rem_mundur_keluar       = $_POST['rem_mundur_keluar'];
		$rem_mundur_masuk        = $_POST['rem_mundur_masuk'];
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
		}elseif ($rem_mundur_keluar == "rem_mundur_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','rem_mundur','y','$rem_mundur','$id_ceklist')");
		}
		/*9 lampu_sen*/
		$lampu_sen_keluar        = $_POST['lampu_sen_keluar'];
		$lampu_sen_masuk         = $_POST['lampu_sen_masuk'];
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
		}elseif ($lampu_sen_keluar == "lampu_sen_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','lampu_sen','y','$lampu_sen','$id_ceklist')");
		}
		/*10 kunci_roda*/
		$kunci_roda_keluar       = $_POST['kunci_roda_keluar'];
		$kunci_roda_masuk        = $_POST['kunci_roda_masuk'];
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
		}elseif ($kunci_roda_keluar == "kunci_roda_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kunci_roda','y','$kunci_roda','$id_ceklist')");
		}
		/*11 dongkrak*/
		$dongkrak_keluar         = $_POST['dongkrak_keluar'];
		$dongkrak_masuk          = $_POST['dongkrak_masuk'];
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
		}elseif ($dongkrak_keluar == "dongkrak_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','dongkrak','y','$dongkrak','$id_ceklist')");
		}
		/*12 wiper*/
		$wiper_keluar            = $_POST['wiper_keluar'];
		$wiper_masuk             = $_POST['wiper_masuk'];
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
		}elseif ($wiper_keluar == "wiper_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','wiper','y','$wiper','$id_ceklist')");
		}
		/*13 kondisi_body*/
		$kondisi_body_keluar     = $_POST['kondisi_body_keluar'];
		$kondisi_body_masuk      = $_POST['kondisi_body_masuk'];
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
		}elseif ($kondisi_body_keluar == "kondisi_body_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kondisi_body','y','$kondisi_body','$id_ceklist')");
		}
		/*14 kondisi_cat_body*/
		$kondisi_cat_body_keluar = $_POST['kondisi_cat_body_keluar'];
		$kondisi_cat_body_masuk  = $_POST['kondisi_cat_body_masuk'];
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
		}elseif ($kondisi_cat_body_keluar == "kondisi_cat_body_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','kondisi_cat_body','y','$kondisi_cat_body','$id_ceklist')");
		}
		/*15 air_radiator*/
		$air_radiator_keluar     = $_POST['air_radiator_keluar'];
		$air_radiator_masuk      = $_POST['air_radiator_masuk'];
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
		}elseif ($air_radiator_keluar == "air_radiator_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','air_radiator','y','$air_radiator','$id_ceklist')");
		}
		/*16 oli_mesin*/
		$oli_mesin_keluar        = $_POST['oli_mesin_keluar'];
		$oli_mesin_masuk         = $_POST['oli_mesin_masuk'];
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
		}elseif ($oli_mesin_keluar == "oli_mesin_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','oli_mesin','y','$oli_mesin','$id_ceklist')");
		}
		/*17 air_wiper*/
		$air_wiper_keluar        = $_POST['air_wiper_keluar'];
		$air_wiper_masuk         = $_POST['air_wiper_masuk'];
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
		}elseif ($air_wiper_keluar == "air_wiper_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','air_wiper','y','$air_wiper','$id_ceklist')");
		}
		/*18 tape*/
		$tape_keluar             = $_POST['tape_keluar'];
		$tape_masuk              = $_POST['tape_masuk'];
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
		}elseif ($tape_keluar == "tape_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','tape','y','$tape','$id_ceklist')");
		}
		/*19 tutup_velg*/
		$tutup_velg_keluar       = $_POST['tutup_velg_keluar'];
		$tutup_velg_masuk        = $_POST['tutup_velg_masuk'];
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
		}elseif ($tutup_velg_keluar == "tutup_velg_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','tutup_velg','y','$tutup_velg','$id_ceklist')");
		}
		/*20 toolkit*/
		$toolkit_keluar          = $_POST['toolkit_keluar'];
		$toolkit_masuk           = $_POST['toolkit_masuk'];
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
		}elseif ($toolkit_keluar == "toolkit_ata") {
			$insert .= mysqli_query($koneksi,"insert into ceklist (id_kendaraan,id_peminjaman,komponen,ata_keluar,keterangan,ceklist_code)
														   values ('$id_kendaraan','$id_peminjaman','toolkit','y','$toolkit','$id_ceklist')");
		}
		
		
		/*echo "id_peminjaman=".$id_peminjaman."<br>";
		echo "id_ceklist=".$id_ceklist."<br>";
		echo "id_mobil=".$id_mobil."<br>";
		echo "id_sopir=".$id_sopir."<br>";
		echo "stnk_masuk=".$stnk_masuk."<br>";*/

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