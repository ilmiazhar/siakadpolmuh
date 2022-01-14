<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Kartu Rencana Studi</title></head>

<body>
												<p>
												  <?php
													$temp='';
													$rows=array();
													$totalNH=0;
													$totalSKS=0;
													$no=1;
												?>
												  
</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
												  <tr>
												    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
												      <tr>
												        <td width="16%" align="left" valign="top"><img src="<?php echo base_url();?>assets/logo-laporan.png" /></td>
												        <td width="84%" align="left" valign="top"><h2>POLITEKNIK MUHAMMADIYAH TEGAL</h2>
												          <br />
														  <br />
												          Alamat: Jl. Melati No. 27 - 30, Kota Tegal <br />
												          Telepon: (028) 351-081 Website: http://polmuh-tegal.ac.id</td>
											          </tr>
											        </table></td>
											      </tr>
												  <tr>
												    <td><HR /></td>
											      </tr>
												  <tr>
												    <td align="center"><H3>KARTU RENCANA STUDI</H3></td>
											      </tr>
												  <tr>
												    <td>
                                                 <?php
												$nim = $this->uri->segment(3);
												$query = $this->web_app_model->getSelectedData("tbl_mahasiswa","nim",$nim);

													{
														$row =$query->row();
													}
												 ?>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
												      <tr>
												        <td width="20%">NIM</td>
												        <td width="2%">:</td>
												        <td width="26%"><?php echo $row->nim; ?></td>
												        <td width="6%">&nbsp;</td>
												        <td width="15%">Angkatan</td>
												        <td width="2%">:</td>
												        <td width="29%"><?php echo $row->angkatan; ?></td>
											          </tr>
												      <tr>
												        <td>Nama Mahasiswa</td>
												        <td>:</td>
												        <td><?php echo $row->nama_mahasiswa; ?></td>
												        <td>&nbsp;</td>
												        <td>Program Studi</td>
												        <td>:</td>
												        <td><?php echo $row->jurusan; ?></td>
											          </tr>
												      <tr>
												        <td>&nbsp;</td>
												        <td>&nbsp;</td>
												        <td>&nbsp;</td>
												        <td>&nbsp;</td>
												        <td>&nbsp;</td>
												        <td>&nbsp;</td>
												        <td>&nbsp;</td>
											          </tr>
                                                 
											        </table></td>
  </tr>
												  <tr>
												    <td>&nbsp;</td>
											      </tr>
</table>
												<table width="100%" border="1" cellspacing="1" cellpadding="1" class="table table-striped table-bordered table-hover">
												  <tr>
													<td width="18%" bgcolor="#CCCCCC"><b>Kode Matakuliah</b></td>
													<td width="38%" bgcolor="#CCCCCC"><b>Matakuliah</b></td>
													<td width="7%" bgcolor="#CCCCCC"><b>Semester</b></td>
													<td width="4%" bgcolor="#CCCCCC"><b>SKS</b></td>
													<td width="33%" bgcolor="#CCCCCC"><b>Dosen</b></td>
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
						<td align="center">'.$value['semester'].'</td>
						<td align="center">'.$value['jum_sks'].'</td>';
						
				echo '<td>'.$value['nama_dosen'].'</td>';
					if($status=='0')
					{
						echo '<td>
						<a class="delbutton" id="'.$value['nim'].'|'.$value['kd_jadwal'].'" href="#"><div id="box-link">Batalkan</div></a>
						</td>';
					}
			}
			echo '<tr><td colspan=3>Total SKS yang akan ditempuh :</td><td colspan=8 id="jmlcart"><b>'.$tot_sks.' SKS</b></td></tr>';
			
		?>
</table>
												<?php
												$nim = $this->uri->segment(3);
												$dosenwali = $this->web_app_model->getDosenWali($nim);
												 ?>
                                                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                                  <tr>
                                                    <td width="27%"></td>
                                                    <td width="39%">&nbsp;</td>
                                                    <td width="34%">&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td align="center">&nbsp;</td>
                                                    <td align="center">Tegal,  <?php echo tanggal() ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td align="center">Pengesahan</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  
                                                  <tr>
                                                    <td align="center">Dosen Wali</td>
                                                    <td align="center">Ka. BAAK</td>
                                                    <td align="center">Mahasiswa</td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td align="center"><u><?php echo $dosenwali ?></u></td>
                                                    <td align="center">(.............................................)</td>
                                                    <td align="center">(.............................................)</td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  
                                                  <tr>
                                                    <td colspan="3" align="center"><i></i>
                                                      <p>&nbsp;</p>
                                                      <p>&nbsp;</p>
                                                  <p>&nbsp;</p>                                                  </tr>
                                                </table>
</body>
</html>