<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Sistem Informasi Akademik Politeknik Muhammadiyah Tegal</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ilmi.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

	<body>
		<?php
			echo $atas;
		?>
        <!--/.navbar-inner-->
		</div>

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
				<img src="<?php echo base_url();?>assets/logo.png">
                <!--#sidebar-shortcuts-->

<?php
	echo $menu;
?>
				<!--/.nav-list-->

				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<?php
							echo $bio;
						?>
					</ul><!--.breadcrumb-->

					<div class="nav-search" id="nav-search">
					
					</div><!--#nav-search-->
				</div>

				<div class="page-content">
					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->

							<!--PAGE CONTENT ENDS-->
					    
                        <div class="widget-box">
										<div class="widget-header header-color-blue">
											<h5 class="bigger lighter">
												<i class="icon-table"></i>
												Data Persetujuan Kartu Rencana Studi Mahasiswa
											</h5>

											<div class="widget-toolbar widget-toolbar-light no-border">
												<select id="simple-colorpicker-1" class="hide">
													<option selected="" data-class="blue" value="#307ECC" />#307ECC
													<option data-class="blue2" value="#5090C1" />#5090C1
													<option data-class="blue3" value="#6379AA" />#6379AA
													<option data-class="green" value="#82AF6F" />#82AF6F
													<option data-class="green2" value="#2E8965" />#2E8965
													<option data-class="green3" value="#5FBC47" />#5FBC47
													<option data-class="red" value="#E2755F" />#E2755F
													<option data-class="red2" value="#E04141" />#E04141
													<option data-class="red3" value="#D15B47" />#D15B47
													<option data-class="orange" value="#FFC657" />#FFC657
													<option data-class="purple" value="#7E6EB0" />#7E6EB0
													<option data-class="pink" value="#CE6F9E" />#CE6F9E
													<option data-class="dark" value="#404040" />#404040
													<option data-class="grey" value="#848484" />#848484
													<option data-class="default" value="#EEE" />#EEE
												</select>
											</div>
										</div>

										<div class="widget-body">
											<div class="widget-main no-padding">
												<table width="100%">
													<thead>
													</thead>

													<tbody>
														<tr>
															<td width="913" class="">
                                                            <?php
																if($status=='1')
																{
																	$cls = "disetujui";	
																	$teks="<b>Sudah Disetujui</b>";
																}
																else if($status=='0')
																{
																	$cls = "";	
																	$teks="<b>Belum Disetujui</b>";
																}
																else if($status==NULL)
																{
																	$cls = "";	
																	$teks="<b>Belum Mengisi KRS</b>";
																}
															?>
                                                           <div id="hasil"></div>
                                                            <form name="datafrs" id="datafrs" method="POST" action="">
															  <table width="121%" border="0" cellspacing="1" cellpadding="1">
															    <tr>
															      <td width="10%" align="right">Nim</td>
															      <td width="2%" align="center">:</td>
															      <td width="17%"><label>
															        <input name="nim" type="text" id="nim" value="<?php echo $nim; ?>" size="20" readonly="readonly">
														          </label></td>
															      <td width="1%">&nbsp;</td>
															      <td width="13%" align="right">Semester, Tahun Ajaran</td>
															      <td width="1%" align="center">:</td>
															      <td width="56%"><label>
															        <input type="text" readonly="readonly" name="smstr_thn_ajaran" id="smstr_thn_ajaran" value="<?php echo $tahun_ajaran; ?>">
														          </label></td>
														        </tr>
															    <tr>
															      <td align="right">Nama Mahasiswa</td>
															      <td align="center">:</td>
															      <td><label>
															        <input type="text" readonly="readonly" name="nama_mhs" id="nama_mhs" value="<?php echo $nama_mhs; ?>">
														          </label></td>
															      <td>&nbsp;</td>
															      <td align="right">IP /Beban Studi Maks</td>
															      <td align="center">:</td>
															      <td><label>
															        <input name="ip" readonly="readonly" type="text" id="ip" size="5" value="<?php echo $ipk; ?>">
														          / 
														          <input name="beban_study" readonly="readonly" type="text" id="beban_study" size="8" value="<?php echo $beban_studi; ?>">
															      </label></td>
														        </tr>
															    <tr>
															      <td align="right">Program Studi</td>
															      <td align="center">:</td>
															      <td><label>
															        <input type="text" readonly="readonly" name="jurusan" id="jurusan" value="<?php echo $jurusan; ?>">
														          </label></td>
															      <td>&nbsp;</td>
															      <td align="right">Kelas Program</td>
															      <td align="center">:</td>
															      <td><label>
															        <input type="text" readonly="readonly" name="program" id="program" value="<?php echo $program; ?>">
														          </label></td>
														        </tr>
															    <tr>
															      <td align="right">Dosen Wali</td>
															      <td align="center">:</td>
															      <td><label>
															        <input type="text" readonly="readonly" name="dosen_wali" id="dosen_wali" value="<?php echo $dosen_wali; ?>">
														          </label></td>
															      <td>&nbsp;</td>
															      <td align="right">Semester yang Akan Ditempuh</td>
															      <td align="center">:</td>
															      <td><label>
															        <input type="text" readonly="readonly" name="semester" id="semester" value="<?php echo $smt_skr; ?>">
														          </label></td>
														        </tr>
														      </table>
															  <table width="100%" border="0" cellspacing="1" cellpadding="1" class="table table-striped table-bordered table-hover">
															    <tr>
															      <td colspan="11"><span class="label label-large label-pink arrowed-right">MATAKULIAH YANG DITEMPUH PADA SEMESTER INI</span></td>
														        </tr>
															    <tr>
															      <td><b>Kode MK</b></td>
															      <td><b>Matakuliah</b></td>
															      <td><b>Semester</b></td>
															      <td><b>SKS</b></td>
															      <td><b>Dosen</b></td>
															      <td><b>Jadwal</b></td>
                                                                  <?php
																  	if($status==NULL)
																	{
																		echo '<td>Batalkan</td>';	
																	}
																  ?>
														        </tr>
															    <?php
																$state_app = 0;
																$no=1;
																$tot_sks = 0;
																foreach ($detailfrs->result_array() as $value) 
																{
																$tot_sks += $value['jum_sks'];
																if($value['kapasitas']==$value['Peserta'])
																{
																	$state_app++;
																	$color ="red";
																}
																else
																{
																	$color ="";
																}
																	
																	echo '<tr bgcolor="'.$color.'" class="content">
																			<td>'.$value['kd_mk'].'</td>
																			<td>'.$value['nama_mk'].'</td>
																			<td>'.$value['semester'].'</td>
																			<td>'.$value['jum_sks'].'</td>';
																			
																	echo '<td>'.$value['nama_dosen'].'</td>
																			<td>'.$value['jadwal'].'</td>';
																		if($status=='0')
																		{
																			echo '<td>
																			<a class="delbutton" id="'.$value['nim'].'|'.$value['kd_jadwal'].'" href="#"><div id="box-link">Batalkan</div></a>
																			</td>';
																		}
																}
																echo '<tr><td colspan=3>Total SKS Yang Akan Ditempuh :</td><td colspan=8 id="jmlcart"><b>'.$tot_sks.' SKS</b></td></tr>';
																echo '<tr><td colspan=3>Status Persetujuan KRS :</td><td colspan=8>'.$teks.'</td></tr>';
															?>
														      </table>
                                                              <?php
																if($status=='0')
																{
																	if($state_app < 1)
																	{
																		echo "<br>(+) Jika Anda menyetujui Kartu Rencana Study Mahasiswa ini silakan klick tombol Setujui di bawah ini
																	 <br><br><input type='submit' value='Setujui Kartu Rencana Studi' class='btn btn-small btn-primary'>";
																	}
																	else if($state_app > 0)
																	{
																		echo "<p class='alert'>Anda tidak diperbolehkan menyetujui Kartu Rencana Studi ini, karena ada <b> ".$state_app." </b>mata kuliah yang telah terpenuhi kuotanya...!!!</p>";
																	}
																}
																else{
																	echo "<br>(+) Jika Anda ingin membatalkan seluruh Kartu Rencana Studi Mahasiswa ini silakan klik tombol Batalkan di bawah ini
																	<br><br><input type='submit' value='Batalkan Kartu Rencana Studi' class='btn btn-small btn-danger'>
																	";
																}
															?>	
															  <p>&nbsp;</p>
                                                            </form></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
                        </div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-mini btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-class="default" value="#438EB9" />#438EB9
									<option data-class="skin-1" value="#222A2D" />#222A2D
									<option data-class="skin-2" value="#C6487E" />#C6487E
									<option data-class="skin-3" value="#D0D0D0" />#D0D0D0
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" />
							<label class="lbl" for="ace-settings-header"> Fixed Header</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div>
							<input type="checkbox" class="ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>
					</div>
				</div><!--/#ace-settings-container-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--ace scripts-->

		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>
        
        <script src="<?php echo base_url();?>assets/js_tambahan/jquery.js"></script>
        <script src="<?php echo base_url();?>assets/js_tambahan/jquery.validate.min.js" type="text/javascript"></script>
        <script type="text/javascript">
	$(document).ready(function(){
		$("#datafrs").validate({
			debug: false,
			rules: {
				carimhs: "required"
			},
			messages: {
				carimhs: "<div style='width:670px; position:absolute; text-align:center; color:#fff; padding:5px; background-color:red;'>Masukkan NIM..!!!</div>",
			},
			submitHandler: function(form) {
				<?php 
					if($status=='0')
					{
						?>
						$.post('<?php echo base_url(); ?>index.php/dosen/setuju_krs', $("#datafrs").serialize(), function(data) {
							$('#hasil').html(data);
						});
						<?php
					}
					else
					{
						?>
						$.post('<?php echo base_url(); ?>index.php/dosen/batal_krs', $("#datafrs").serialize(), function(data) {
							$('#hasil').html(data);
						});
						<?php
					}
				?>
			}
		});
	});
	</script>

		<!--inline scripts related to this page-->
	</body>
</html>
