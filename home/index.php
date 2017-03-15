<?php ob_start(); ?>
	<?php include 'indexRead.php' ?>
<div id="container">
	<div id="header"></div>
	<div id="header2">
	</div>
	<div id="contenta">
		<div id="left">
			<form action="index.php" method="get">
			<div class="tabs" style="margin:0px;padding:0px;">
				<ul class="tab-links" style="margin:0px;padding:0px;">
					<li <?php echo isset($_REQUEST['submitInsidentil']) ? 'class="active"' : '' ?> ><a href="#tab1"><strong>Insidentil</strong></a></li>
					<li <?php echo isset($_REQUEST['submitRegular']) ? 'class="active"' : '' ?>><a href="#tab2"><strong>Regular</strong></a></li>
					<li ><a href="#tab3"><strong>Daftar Fasilitas</strong></a></li>
				</ul>
					<h6><p>Anda hanya dapat melihat daftar bookingan yang sudah tercantum di daftar,<br>
						Untuk melakukan pembookingan silahkan hubungi bagian Administrator (Bagian Pengimputan : <b>0998<b>).</p></h6>
				<div class="tab-content">
					<div id="tab1" class="tab <?php echo isset($_REQUEST['submitInsidentil']) ? 'active' : '' ?>">
							<p>
								<table width="100%">
									<tr>
										<td  width="15%" style="color:black" ><b>DARI</b></td>
										<td  width="25%" style="color:black" >
											<input style="width:155px; padding:5px" name="dateFrom" readonly id="dateFrom" type="text" value="<?php echo isset($_REQUEST['dateFrom']) ? $_REQUEST['dateFrom'] : '' ?>" />
										</td>
										<td width="15%" style="color:black"	 ><b>SAMPAI</b></td>
										<td>
											<input style="width:90px; width:155px; padding:5px" name="dateTo" readonly id="dateTo" type="text" value="<?php echo isset($_REQUEST['dateTo']) ? $_REQUEST['dateTo'] : '' ?>" />
										</td>
									</tr>
									<tr style="height:70px">
										<td style="color:black"><b>FASILITAS</b></td>
										<td>
											<select name="facilityId" style="width:155px; padding:5px">
												<option value="x">-- Semua --</option>
													<?php while($val = mysql_fetch_array($dataFacility)): ?>
														<option value="<?php echo $val['id'] ?>" <?php echo $val['id'] == (isset($_REQUEST['facilityId']) ? $_REQUEST['facilityId'] : '') ? 'selected' : '' ?>><?php echo $val['name'] ?></option>
													<?php endwhile; ?>
											</select>
										</td>
										<td ><input type="submit" value="FILTER" name="submitInsidentil"  style="padding:5px" /></td>
										<td>&nbsp;</td>
								</tr>
								</table>
							   <?php if(mysql_num_rows($dataInsidentil) < 1) : ?>
								<div class="warning">
								  <h1>Tidak Ada Booking</h1>
								</div>
							   <?php else: ?>
								<div id="tbl">
									<table width="100%" border="1" class="gridtable">
										<thead>
											<tr>
												<th align="center" width="20%">TGL / JAM</th>
												<th align="center" width="18%">FASILITAS</th>
												<th align="center" width="20%">REQUEST</th>
												<th align="center">KETERANGAN</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = isset($_REQUEST['SplitRecord']) ? ($_REQUEST['SplitRecord'] + 1) : 1; ?>
											<?php while($val = mysql_fetch_array($dataInsidentil)): ?>
												<tr>
													<td align="center" style="font-size:12px" valign="top">
													<?php echo $val['date_from_name'] ?> <br /> <?php echo ($val['date_to_name'] != $val['date_from_name']) ? ' sd  <br />'. $val['date_to_name'].' <br />' : '' ?><?php echo $val['time_from_name'] ?> - <?php echo $val['time_to_name'] ?></td>
													<td align="center" style="font-size:12px" valign="top"><?php echo $val['facility_name'] ?></td>
													<td align="center" style="font-size:11px" valign="top"><?php echo $val['name'] ?> <br />(<?php echo $val['departement_name'] ?>)</td>
													<td align="left" style="font-size:11px; " valign="top">
														<?php echo $val['description'] ?>
														<?php if(strlen($val['file_attacment']) > 0): ?>
															<p><a href="../admin/asset/file/<?php echo $val['file_attacment'] ?>" target="_blank">Download File</a></p>
														<?php endif; ?>
													</td>
												</tr>
											<?php $i++; ?>
											<?php endwhile; ?>
										<tbody>
									 </table>
								</div>
							<?php endif; ?>
							</p>
						</div>
					<div id="tab2" class="tab <?php echo isset($_REQUEST['submitRegular']) ? 'active' : '' ?>
						<h3 style="font-size:10px"></h3>
						<p>
							<table width="100%">
								<tr >
									<td style="color:black"  width="15%"><b>FASILITAS</b></td>
									<td width="28%">
										<select name="regularFacilityId" style="width:185px; padding:5px">
											<option value="x">-- Semua --</option>
											<?php while($val = mysql_fetch_array($dataFacilityRegular)): ?>
												<option value="<?php echo $val['id'] ?>" <?php echo $val['id'] == (isset($_REQUEST['regularFacilityId']) ? $_REQUEST['regularFacilityId'] : '') ? 'selected' : '' ?>><?php echo $val['name'] ?></option>
											<?php endwhile; ?>
										</select>
									</td>
									<td>
										<input type="submit" value="Filter" name="submitRegular" style="padding:5px" />
									</td>
								</tr>
							</table>
						<br />
					   <?php if(mysql_num_rows($dataRegular) < 1) : ?>
						<div class="warning">
						   <h1>Tidak Ada Booking</h1>
						</div>
					   <?php else: ?>
						<div id="tbl">
							<table width="100%" class="gridtable">
								<thead>
									<tr>
										<th align="center" width="28%">FASILITAS</th>
										<th align="center" width="25%">JAM</th>
										<th align="center" width="15%">REQ</th>
										<th align="center">KETERANGAN</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = isset($_REQUEST['SplitRecord']) ? ($_REQUEST['SplitRecord'] + 1) : 1; ?>
									<?php while($val = mysql_fetch_array($dataRegular)): ?>
										<tr>
											<td align="center" style="font-size:11px" valign="top"><?php echo $val['facility_name'] ?></td>
											<td align="center" style="font-size:10px" valign="top">
												<b>Setiap<br /></b>
												<?php echo $val['time_from_name'] ?> - <?php echo $val['time_to_name'] ?><br />
												<?php echo glb::getDay($val['day_regular'])  ?>
											</td>
											<td align="center" style="font-size:11px" valign="top"><?php echo $val['name'] ?> <br />(<?php echo $val['departement_name'] ?>)</td>
											<td align="left" style="font-size:11px;" valign="top">
												<span style="margin:0px;padding:0px;"><?php echo $val['description'] ?></span>
												<?php if(strlen($val['file_attacment']) > 0): ?>
													<p><a href="../admin/asset/file/<?php echo $val['file_attacment'] ?>" target="_blank">Download File</a></p>
												<?php endif; ?>
											</td>
										</tr>
									<?php $i++; ?>
									<?php endwhile; ?>
								  <tbody>
							 </table>
						</div>
					<?php endif; ?>
					</p>
				</div>
				<div id="tab3" class="tab">
					<div id="tbl">
						<table width="100%" class="gridtable">
							<thead>
								<tr>
									<th align="left" width="5%">NO</th>
									<th align="center">FASILITAS</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = isset($_REQUEST['SplitRecord']) ? ($_REQUEST['SplitRecord'] + 1) : 1; ?>
								<?php while($val = mysql_fetch_array($dataFacilityList)): ?>
									<tr>
										<td align="center" style="font-size:12px" valign="top"><?php echo $i ?></td>
										<td align="left" style="font-size:12px" valign="top"><?php echo $val['name'] ?></td>
									</tr>
								<?php $i++; ?>
								<?php endwhile; ?>
							  <tbody>
						 </table>
					</div>
			</div>
				</div>
			</div>
		</div>
		</form>
		<div class="clear"></div>
		<div id="footer">
			<p>&copy; Designed by: Administrator.</p>
		</div>
	</div>
</div>

<script>
	jQuery(document).ready(function() {
		jQuery('.tabs .tab-links a').on('click', function(e)  {
			var currentAttrValue = jQuery(this).attr('href');

			// Show/Hide Tabs
			jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

			// Change/remove current tab to active
			jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

			e.preventDefault();
		});
	});
</script>

<script type="text/javascript">
$(document).ready(function() {
	$(function() {
			$( "#dateFrom" ).datepicker({
				dateFormat : 'dd/mm/yy',
				changeMonth : true,
				changeYear : true,
				yearRange: '-5y:+2y'
			});
			<?php $tmp = strlen(trim($_REQUEST['dateFrom'])) == 0 ?  '' : explode('/',$_REQUEST['dateFrom']) ?>
			$("#dateFrom" ).datepicker("setDate", <?php if(is_array($tmp)) : ?> new Date(<?php echo ($tmp[2]) ?>,<?php echo ($tmp[1]-1) ?>,<?php echo $tmp[0] ?>) <?php else: ?> null <?php endif; ?>);
		});
	$(function() {
			$( "#dateTo" ).datepicker({
				dateFormat : 'dd/mm/yy',
				changeMonth : true,
				changeYear : true,
				yearRange: '-5y:+2y'
			});
			<?php $tmp = strlen(trim($_REQUEST['dateTo'])) == 0 ?  '' : explode('/',$_REQUEST['dateTo']) ?>
			$("#dateTo" ).datepicker("setDate", <?php if(is_array($tmp)) : ?> new Date(<?php echo ($tmp[2]) ?>,<?php echo ($tmp[1]-1) ?>,<?php echo $tmp[0] ?>) <?php else: ?> null <?php endif; ?>);
		});
});
</script>

<?php $templateContent = ob_get_contents(); ?>
<?php ob_end_clean(); ?>

<?php include '../template/main.php' ?>
