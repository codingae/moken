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
						<h4 class="widget-title lighter">Cek List Kendaraan Keluar</h4>
					</div>
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
								$query_data = mysqli_query($koneksi,"select * from peminjaman where status='terima' ");
								while ($row_data = mysqli_fetch_array($query_data)) {											
								$id_peminjaman = base64_encode($row_data['id_peminjaman']);
							?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= ucwords($row_data['keperluan']) ?></td>
								<td class="hidden-480"><?= ucwords($row_data['tujuan']) ?></td>
								<td class="hidden-480"><?= ucwords($row_data['status']) ?></td>
								<td><a href="index.php?kendaraan=cek-kendaraan-kembali&kode=<?= $id_peminjaman ?>" class="btn btn-mini btn-primary">Pilih</a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="assets/js/jquery.2.1.1.min.js"></script>