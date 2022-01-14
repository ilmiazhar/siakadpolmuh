<div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="#" class="brand">
						<small>
							<i class="icon-leaf"></i>
							Sistem Informasi Akademik Politeknik Muhammadiyah Tegal- Dosen
						</small>
					</a><!--/.brand-->

					<ul class="nav ace-nav pull-right">
					  <li class="grey"></li>

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url();?>assets/dosen.png" />
								<span class="user-info">
									<small>Assalamu'alaikum,</small>
									<?php echo $nama; ?>								</span>

								<i class="icon-caret-down"></i>							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
								<li>
									<a href="<?php echo base_url();?>index.php/dosen/akun/">
										<i class="icon-cog"></i>
								Pengaturan Akun	</a></li>

								<li>
									<a href="<?php echo base_url();?>index.php/web/logout/">
										<i class="icon-off"></i>
										Logout									</a>								</li>
							</ul>
						</li>
				  </ul>
				  <!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div>