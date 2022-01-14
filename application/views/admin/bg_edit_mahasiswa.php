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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

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
												Form Edit Mahasiswa
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
                                           
                                           <?php echo $this->session->flashdata('save_mahasiswa'); ?>
                                            <form action="<?php echo base_url();?>index.php/admin/simpan_mahasiswa" method="post">
                                              <table width="60%" border="0" cellspacing="0" cellpadding="0">
                                              <?php
											  foreach ($mahasiswa->result_array() as $m)
											  {
											  ?>
                                                <tr>
												<br/>
                                                  <td width="21%" align="right">Nama Mahasiswa</td>
                                                  <td width="4%" align="center">:</td>
                                                  <td width="75%"><label>
                                                    <input name="nama_mahasiswa" type="text" id="nama_mahasiswa" size="50" value="<?php echo $m['nama_mahasiswa']; ?>">
                                                  </label></td>
                                                </tr>
                                                <tr>
                                                  <td align="right">Angkatan</td>
                                                  <td align="center">:</td>
                                                  <td><label>
                                                    <input name="angkatan" type="text" id="angkatan" size="50" value="<?php echo $m['angkatan']; ?>">
                                                  </label></td>
                                                </tr>
                                                <tr>
                                                  <td align="right">Program Studi</td>
                                                  <td align="center">:</td>
                                                  <td><label>
                                                    <input name="jurusan" type="text" id="jurusan" size="50" value="<?php echo $m['jurusan']; ?>">
                                                  </label></td>
                                                </tr>
                                                <tr>
                                                  <td align="right">Kelas Program</td>
                                                  <td align="center">:</td>
                                                  <td><label>
                                                    <select name="kelas_program" id="kelas_program">
                                                     <?php
													 	$pagi = '';
														$sore = '';
														if($m['kelas_program']=="reguler")
														{
															$pagi = 'selected="selected"';
															$sore = '';
														}
														else if($m['kelas_program'] =="ekstensi")
														{
															$pagi = '';	
															$sore = 'selected="selected"';
												     	}
													 ?>
                                                      <option value="Reguler" <?php echo $pagi; ?>>Reguler</option>
                                                      <option value="Ekstensi" <?php echo $sore; ?>>Ekstensi</option>
                                                    </select>
                                                  </label></td>
                                                </tr>
                                                <tr>
                                                  <td align="right">Dosen Wali</td>
                                                  <td align="center">:</td>
                                                  <td><label>
                                                    <select name="kd_dosen" id="kd_dosen">
                                                    <?php
													foreach($dosen->result_array() as $d)
													{
														$selected = '';
														if($d['kd_dosen']==$m['kd_dosen'])
															{
																$selected = 'selected="selected"';				  
															}
													?>
                                                    	<option value="<?php echo $d['kd_dosen']; ?>"><?php echo $d['kd_dosen'].'-'.$d['nama_dosen']; ?></option>
                                                        <?php
													}
													?>
                                                    </select>
                                                  </label></td>
                                                </tr>
                                                <tr>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><button class="btn btn-small btn-primary"><i class="icon-download-alt"></i> Simpan Data</button> <a href="<?php echo base_url();?>index.php/admin/mahasiswa" class="btn btn-danger btn-small"> <i class="icon-external-link"></i>Kembali</a>
                                                  <input type="hidden" name="nim" value="<?php echo $m['nim']; ?>">
                                                  <input type="hidden" name="stts" value="edit"></td>
                                                </tr>
                                                <?php
											  		}
												?>
												 <tr>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                </tr>
                                              </table>
                                            </form>
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

		<!--inline scripts related to this page-->
	</body>
</html>
