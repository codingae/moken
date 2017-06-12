				<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							&copy; 4113124@unipdu.ac.id
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		<!--[if !IE]> -->
		<?php 
			$kendaraan = (!empty($_GET['kendaraan'])) ? $_GET['kendaraan'] : "kosong"; 
			if ($kendaraan == "pengguna" || $kendaraan == "supir" || $kendaraan == "kendaraan" || $kendaraan=="peminjaman" || $kendaraan=="perijinan" || $kendaraan=="ceklist") {
			}else{
			?>
				<script src="assets/js/jquery.2.1.1.min.js"></script>
			<?php	
			}
		?>
		<?php 
			if ($kendaraan == "peminjaman") {
			?>
			<link rel="stylesheet" href="assets/css/datepicker.min.css" />
			<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
			<script src="assets/js/bootstrap-datepicker.min.js"></script>
			<script src="assets/js/moment.min.js"></script>
			<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
			<script src="assets/js/bootstrap-timepicker.min.js"></script>
			<script>
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				$('.date-picker2').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				$('#timepicker2').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				$('#timepicker21').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				$('#timepicker11').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			</script>
			<?php
			}
		?>
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
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.tableTools.min.js"></script>
		<script src="assets/js/dataTables.colVis.min.js"></script>
		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var oTable1 = 
				$('#table1')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  null,null,null, null,null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			    } );
			})
			jQuery(function($) {
				var oTable1 = 
				$('#table2')
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  null, null, null,null,null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
			
			    } );
			})
			jQuery(function($) {
				var oTable1 = 
				$('#table3')
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  null,null,null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
			
			    } );
			})
			jQuery(function($) {
				var oTable1 = 
				$('#table_kendaraan')
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  null,null,null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
			
			    } );
			})
			jQuery(function($) {
				var oTable1 = 
				$('#table_proses')
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  null,null,null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
			
			    } );
			})
		</script>
	</body>
</html>