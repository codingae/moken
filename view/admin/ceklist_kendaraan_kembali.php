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
					<div class="widget-header widget-header-blue widget-header-flat">
						<h4 class="widget-title lighter">Cek List Kendaraan Masuk</h4>
					</div>
					<form action="" method="post">
						<table id="simple-table" class="table table-striped table-bordered table-hover" style="font-size: 10px">
							<thead>
								<tr>
									<th rowspan="2">No</th>
									<th rowspan="2">Nama Komponen</th>
									<th colspan="4">Kondisi Masuk</th>
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
									<td><input type="radio" value="stnk_baik" name="stnk_masuk" required></td>
									<td><input type="radio" value="stnk_rusak" name="stnk_masuk"></td>
									<td><input type="radio" value="stnk_kotor" name="stnk_masuk"></td>
									<td><input type="radio" value="stnk_ada" name="stnk_masuk" checked>Ada ; <input type="radio" value="stnk_tidak_ada" name="stnk_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="stnk" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>2</td>
									<td>BBM</td>
									<td><input type="radio" value="bbm_baik" name="bbm_masuk" required></td>
									<td><input type="radio" value="bbm_rusak" name="bbm_masuk"></td>
									<td><input type="radio" value="bbm_kotor" name="bbm_masuk"></td>
									<td><input type="radio" value="bbm_ada" name="bbm_masuk" checked>Ada ; <input type="radio" value="bbm_tidak_ada" name="bbm_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="bbm" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>3</td>
									<td>AC</td>
									<td><input type="radio" value="ac_baik" name="ac_masuk" checked required></td>
									<td><input type="radio" value="ac_rusak" name="ac_masuk"></td>
									<td><input type="radio" value="ac_kotor" name="ac_masuk"></td>
									<td><input type="radio" value="ac_ada" name="ac_masuk">Ada ;<input type="radio" value="ac_tidak_ada" name="ac_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="ac" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>4</td>
									<td>Spion Luar</td>
									<td><input type="radio" value="spion_luar_baik" name="spion_luar_masuk" checked required></td>
									<td><input type="radio" value="spion_luar_rusak" name="spion_luar_masuk"></td>
									<td><input type="radio" value="spion_luar_kotor" name="spion_luar_masuk"></td>
									<td><input type="radio" value="spion_luar_ada" name="spion_luar_masuk">Ada ; <input type="radio" value="spion_luar_tidak_ada" name="spion_luar_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="spion_luar" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>5</td>
									<td>Spion Dalam</td>
									<td><input type="radio" value="spion_dalam_baik" name="spion_dalam_masuk" checked required></td>
									<td><input type="radio" value="spion_dalam_rusak" name="spion_dalam_masuk"></td>
									<td><input type="radio" value="spion_dalam_kotor" name="spion_dalam_masuk"></td>
									<td><input type="radio" value="spion_dalam_ada" name="spion_dalam_masuk">Ada ; <input type="radio" value="spion_dalam_tidak_ada" name="spion_dalam_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="spion_dalam" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>6</td>
									<td>Ban Serep</td>
									<td><input type="radio" value="ban_serep_baik" name="ban_serep_masuk" checked required></td>
									<td><input type="radio" value="ban_serep_rusak" name="ban_serep_masuk"></td>
									<td><input type="radio" value="ban_serep_kotor" name="ban_serep_masuk"></td>
									<td><input type="radio" value="ban_serep_ada" name="ban_serep_masuk">Ada ; <input type="radio" value="ban_serep_tidak_ada" name="ban_serep_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="ban_serep" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>7</td>
									<td>Lampu Depan</td>
									<td><input type="radio" value="lampu_depan_baik" name="lampu_depan_masuk" checked required></td>
									<td><input type="radio" value="lampu_depan_rusak" name="lampu_depan_masuk"></td>
									<td><input type="radio" value="lampu_depan_kotor" name="lampu_depan_masuk"></td>
									<td><input type="radio" value="lampu_depan_ada" name="lampu_depan_masuk">Ada ; <input type="radio" value="lampu_depan_tidak_ada" name="lampu_depan_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="lampu_depan" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>8</td>
									<td>Lampu Rem & Mundur</td>
									<td><input type="radio" value="rem_mundur_baik" name="rem_mundur_masuk" checked required></td>
									<td><input type="radio" value="rem_mundur_rusak" name="rem_mundur_masuk"></td>
									<td><input type="radio" value="rem_mundur_kotor" name="rem_mundur_masuk"></td>
									<td><input type="radio" value="rem_mundur_ada" name="rem_mundur_masuk">Ada ; <input type="radio" value="rem_mundur_tidak_ada" name="rem_mundur_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="rem_mundur" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>9</td>
									<td>Lampu Sen</td>
									<td><input type="radio" value="lampu_sen_baik" name="lampu_sen_masuk" checked required></td>
									<td><input type="radio" value="lampu_sen_rusak" name="lampu_sen_masuk"></td>
									<td><input type="radio" value="lampu_sen_kotor" name="lampu_sen_masuk"></td>
									<td><input type="radio" value="lampu_sen_ada" name="lampu_sen_masuk">Ada ; <input type="radio" value="lampu_sen_tidak_ada" name="lampu_sen_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="lampu_sen" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>10</td>
									<td>Kunci Roda</td>
									<td><input type="radio" value="kunci_roda_baik" name="kunci_roda_masuk" required></td>
									<td><input type="radio" value="kunci_roda_rusak" name="kunci_roda_masuk"></td>
									<td><input type="radio" value="kunci_roda_kotor" name="kunci_roda_masuk"></td>
									<td><input type="radio" value="kunci_roda_ada" name="kunci_roda_masuk" checked>Ada ; <input type="radio" value="kunci_roda_tidak_ada" name="kunci_roda_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="kunci_roda" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>11</td>
									<td>Dongkrak</td>
									<td><input type="radio" value="dongkrak_baik" name="dongkrak_masuk" required></td>
									<td><input type="radio" value="dongkrak_rusak" name="dongkrak_masuk"></td>
									<td><input type="radio" value="dongkrak_kotor" name="dongkrak_masuk"></td>
									<td><input type="radio" value="dongkrak_ada" name="dongkrak_masuk" checked>Ada ; <input type="radio" value="dongkrak_tidak_ada" name="dongkrak_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="dongkrak" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>12</td>
									<td>Wiper</td>
									<td><input type="radio" value="wiper_baik" name="wiper_masuk" checked required></td>
									<td><input type="radio" value="wiper_rusak" name="wiper_masuk"></td>
									<td><input type="radio" value="wiper_kotor" name="wiper_masuk"></td>
									<td><input type="radio" value="wiper_ada" name="wiper_masuk">Ada ;<input type="radio" value="wiper_tidak_ada" name="wiper_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="wiper" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>13</td>
									<td>Kondisi Body</td>
									<td><input type="radio" value="kondisi_body_baik" name="kondisi_body_masuk" checked required></td>
									<td><input type="radio" value="kondisi_body_rusak" name="kondisi_body_masuk"></td>
									<td><input type="radio" value="kondisi_body_kotor" name="kondisi_body_masuk"></td>
									<td><input type="radio" value="kondisi_body_ada" name="kondisi_body_masuk">Ada ; <input type="radio" value="kondisi_body_tidak_ada" name="kondisi_body_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="kondisi_body" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>14</td>
									<td>Kondisi Cat Body</td>
									<td><input type="radio" value="kondisi_cat_body_baik" name="kondisi_cat_body_masuk" checked required></td>
									<td><input type="radio" value="kondisi_cat_body_rusak" name="kondisi_cat_body_masuk"></td>
									<td><input type="radio" value="kondisi_cat_body_kotor" name="kondisi_cat_body_masuk"></td>
									<td><input type="radio" value="kondisi_cat_body_ada" name="kondisi_cat_body_masuk">Ada ; <input type="radio" value="kondisi_cat_body_tidak_ada" name="kondisi_cat_body_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="kondisi_cat_body" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>15</td>
									<td>Air Radiator</td>
									<td><input type="radio" value="air_radiator_baik" name="air_radiator_masuk" checked required></td>
									<td><input type="radio" value="air_radiator_rusak" name="air_radiator_masuk"></td>
									<td><input type="radio" value="air_radiator_kotor" name="air_radiator_masuk"></td>
									<td><input type="radio" value="air_radiator_ada" name="air_radiator_masuk" >Ada ; <input type="radio" value="air_radiator_tidak_ada" name="air_radiator_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="air_radiator" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>16</td>
									<td>Oli Mesin</td>
									<td><input type="radio" value="oli_mesin_baik" name="oli_mesin_masuk" checked required></td>
									<td><input type="radio" value="oli_mesin_rusak" name="oli_mesin_masuk"></td>
									<td><input type="radio" value="oli_mesin_kotor" name="oli_mesin_masuk"></td>
									<td><input type="radio" value="oli_mesin_ada" name="oli_mesin_masuk">Ada ; <input type="radio" value="oli_mesin_tidak_ada" name="oli_mesin_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="oli_mesin" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>17</td>
									<td>Air Wiper</td>
									<td><input type="radio" value="air_wiper_baik" name="air_wiper_masuk" checked required></td>
									<td><input type="radio" value="air_wiper_rusak" name="air_wiper_masuk"></td>
									<td><input type="radio" value="air_wiper_kotor" name="air_wiper_masuk"></td>
									<td><input type="radio" value="air_wiper_ada" name="air_wiper_masuk">Ada ; <input type="radio" value="air_wiper_tidak_ada" name="air_wiper_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="air_wiper" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>18</td>
									<td>Tape</td>
									<td><input type="radio" value="tape_baik" name="tape_masuk" checked required></td>
									<td><input type="radio" value="tape_rusak" name="tape_masuk"></td>
									<td><input type="radio" value="tape_kotor" name="tape_masuk"></td>
									<td><input type="radio" value="tape_ada" name="tape_masuk">Ada ; <input type="radio" value="tape_tidak_ada" name="tape_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="tape" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>19</td>
									<td>Tutup Velg</td>
									<td><input type="radio" value="tutup_velg_baik" name="tutup_velg_masuk" checked required></td>
									<td><input type="radio" value="tutup_velg_rusak" name="tutup_velg_masuk"></td>
									<td><input type="radio" value="tutup_velg_kotor" name="tutup_velg_masuk"></td>
									<td><input type="radio" value="tutup_velg_ada" name="tutup_velg_masuk">Ada ; <input type="radio" value="tutup_velg_tidak_ada" name="tutup_velg_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="tutup_velg" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
								<tr>
									<td>20</td>
									<td>Toolkit</td>
									<td><input type="radio" value="toolkit_baik" name="toolkit_masuk" required></td>
									<td><input type="radio" value="toolkit_rusak" name="toolkit_masuk"></td>
									<td><input type="radio" value="toolkit_kotor" name="toolkit_masuk"></td>
									<td><input type="radio" value="toolkit_ada" name="toolkit_masuk" checked>Ada ; <input type="radio" value="toolkit_tidak_ada" name="toolkit_masuk"> Tidak Ada</td>
									<td><input type="text" class="form-control" name="toolkit" style="width:100%;height:30px;margin-top:-5px;margin-left:-5px;margin-right:-20px;margin-bottom:-5px"></td>
								</tr>
							</thead>

							<tbody>
								
							</tbody>
						</table>
						<center>
							<button type="submit" name="kirim" class="btn btn-primary">Submit</button>							
						</center>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="assets/js/jquery.2.1.1.min.js"></script>