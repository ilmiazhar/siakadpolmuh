<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ilmi.css" />

<ul class="nav nav-list">
					<li>
						<a href="<?php echo base_url();?>index.php/admin">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
					</li>
					<li class="active open">
						<a href="#" class="dropdown-toggle">
							<i class="icon-credit-card"></i>
							<span class="menu-text"> Data Master </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?php echo base_url();?>index.php/admin/mahasiswa">
									<i class="icon-double-angle-right"></i>
									Mahasiswa
								</a>
							</li>

							<li>
								<a href="<?php echo base_url();?>index.php/admin/dosen">
									<i class="icon-double-angle-right"></i>
								    Dosen
								</a>
							</li>

							<li>
								<a href="<?php echo base_url();?>index.php/admin/mk">
									<i class="icon-double-angle-right"></i>
									Matakuliah
								</a>
						</ul>
                    
					<li>
						<a href="<?php echo base_url();?>index.php/admin/tampil_jadwal" class="dropdown-toggle">
							<i class="icon-bell-alt"></i>
<span class="menu-text"> Jadwal Perkuliahan</span></a> </li>

					<li>
						<a href="<?php echo base_url();?>index.php/admin/nilai">
							<i class="icon-edit"></i>
							<span class="menu-text"> Nilai Mahasiswa</span>
						</a>
					</li>

                    
                     	<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-credit-card"></i>
							<span class="menu-text"> Laporan </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?php echo base_url();?>index.php/laporan/mahasiswa" target="_blank">
									<i class="icon-double-angle-right"></i>
									Mahasiswa
								</a>
							</li>

							<li>
								<a href="<?php echo base_url();?>index.php/laporan/dosen" target="_blank">
									<i class="icon-double-angle-right"></i>
									Dosen
								</a>
							</li>

							<li>
								<a href="<?php echo base_url();?>index.php/laporan/mk" target="_blank">
									<i class="icon-double-angle-right"></i>
									Matakuliah
								</a>
							</li>
                            <li>
								<a href="<?php echo base_url();?>index.php/laporan/jadwal" target="_blank">
									<i class="icon-double-angle-right"></i>
									Jadwal Perkuliahan
								</a>
							</li>
							</ul>
                    <li>
						<a href="<?php echo base_url();?>index.php/admin/menubackup">
						<i class="icon-cloud-download"></i>
						<span class="menu-text">Backup & Restore </span>
						</a>
					</li>
					
					<li>
						<a href="<?php echo base_url();?>index.php/admin/akun">
							<i class="icon-cogs"></i>

							<span class="menu-text">
								Pengaturan Akun
								
							</span>
						</a>
					</li>

					<li>
						<a href="<?php echo base_url();?>index.php/web/logout">
							<i class="icon-ban-circle"></i>
							<span class="menu-text"> Keluar </span>
					</a></li>
             
				</ul>