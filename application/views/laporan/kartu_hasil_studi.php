<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Kartu Hasil Studi</title>
</head>

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
												          Telepon: (028) 351-081 website: http://polmuh-tegal.ac.id</td>
											          </tr>
											        </table></td>
											      </tr>
												  <tr>
												    <td><HR /></td>
											      </tr>
												  <tr>
												    <td align="center"><H3>KARTU HASIL STUDI</H3></td>
											      </tr>
												  <tr>
												    <td>
                                                 <?php
												$nim 	= $this->uri->segment(3);

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
												    <td width="3%" bgcolor="#CCCCCC"><b>No</b></td>
												    <td width="18%" bgcolor="#CCCCCC"><b>Kode Matakuliah</b></td>
												    <td width="38%" bgcolor="#CCCCCC"><b>Matakuliah</b></td>
												    <td width="7%" bgcolor="#CCCCCC"><b>Semester</b></td>
												    <td width="5%" bgcolor="#CCCCCC"><b>SKS</b></td>
												    <td width="5%" bgcolor="#CCCCCC"><b>Nilai</b></td>
												    <td width="6%" bgcolor="#CCCCCC"><b>Bobot</b></td>
												    <td width="18%" bgcolor="#CCCCCC"><b>SKS x Bobot</b></td>
											      </tr>
												  <?php
		foreach($khs->result_array() as $value)
		{
			if($temp=='')
			{
				$rows[]='<tr>
				<td colspan="10" bgcolor="#fff"><strong>Semester : '.$value['semester_ditempuh'].'</strong></td>
				</tr>';
				$rows[]='<tr>
				<td>'. $no.'</td>
				<td>'. $value['kd_mk'].'</td>
				<td>&nbsp;'. $value['nama_mk'].'</td>
				<td align="center">'. $value['semester_ditempuh'].'</td>
				<td align="center">'. $value['jum_sks'].'&nbsp;</td>
				<td align="center">'. $value['grade'].'</td>
				<td align="center">'. $value['bobot'].'</td>
				<td align="center">'. $value['NxH'].'</td>';
				$no++;
				$totalNH=0;
				$totalSKS=0;
			}
			else if($value['semester_ditempuh']!=$temp)
			{
				$ip = 0;
				if($totalNH !=0)			
					$ip = round($totalNH/$totalSKS, 2);			
				$rows[]='<tr>
				<td colspan="6"><strong>Jumlah SKS : '.$totalSKS.'</strong></td>
				<td colspan="6"><strong>IP Semester : '.$ip.'</strong></td>';
	
				$rows[]='<tr>
				<td colspan="10" bgcolor="#fff"><strong>Semester : '.$value['semester_ditempuh'].'</strong></td>
				</tr>';
	
				$rows[]='<tr>
				<td>'. $no.'</td>
				<td>'. $value['kd_mk'].'</td>
				<td>&nbsp;'. $value['nama_mk'].'</td>
				<td align="center">'. $value['semester_ditempuh'].'</td>
				<td align="center">'. $value['jum_sks'].'&nbsp;</td>
				<td align="center">'. $value['grade'].'</td>
				<td align="center">'. $value['bobot'].'</td>
				<td align="center">'. $value['NxH'].'</td>
				</a></td>
				
			</tr>';
			$no++;
			
				$totalNH =0;
				$totalSKS=0;
			}		
			else 
			{ 
				$rows[]='<tr>
				<td align="center">'. $no.'</td>
				<td>'. $value['kd_mk'].'</td>
				<td>'. $value['nama_mk'].'</td>
				<td align="center">'. $value['semester_ditempuh'].'</td>
				<td align="center">'. $value['jum_sks'].'</td>
				<td align="center">'. $value['grade'].'</td>
				<td align="center">'. $value['bobot'].'</td>
				<td align="center">'. $value['NxH'].'</td>
				
				
			</tr>';
			$no++;
						
			}
			if($value['grade'] != 'T') {
				$totalNH +=$value['NxH'];
				$totalSKS+=$value['jum_sks'];
			}
			$temp=$value['semester_ditempuh'];	
		}
		$ip = 0;
		if($totalNH !=0)			
			$ip = round($totalNH/$totalSKS, 2);
		$rows[]='
				<tr>
				<td colspan="6"><strong>Jumlah SKS : '.$totalSKS.'</span></strong></td>
				<td colspan="6"><strong>IP Semester : '.$ip.'</span></strong></td>
				</tr>';
	
		foreach($rows as $row)
		{
			echo $row;
		}
		?>

</table>
												  <?php
												$nim = $this->uri->segment(3);
												$dosenwali = $this->web_app_model->getDosenWali($nim);
												 ?>
												<table width="100%" border="1" cellspacing="1" cellpadding="1">
                                                  <tr>
                                                    <td width="79%"><B>IPK : </B></td>
                                                    <td width="21%"><B><?php echo $ipkm; ?></B></td>
                                                  </tr>
                                                </table>
                                                <table width="100%" border="0" cellspacing="1" cellpadding="1">
												  <tr>
                                                    <td width="28%">&nbsp;</td>
                                                    <td width="23%">&nbsp;</td>
                                                    <td width="16%">&nbsp;</td>
                                                    <td width="33%">&nbsp;</td>
                                                  </tr>
												  <tr>
                                                    <td>Keterangan :</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left">A = baik sekali</td>
                                                    <td align="left">B = baik</td>
                                                    <td align="left">C = sedang</td>
                                                    <td align="center">Tegal, <?php echo tanggal() ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left">D = kurang</td>
                                                    <td align="left">E = kurang sekali</td>
                                                    <td align="left">K = kosong</td>
                                                    <td align="center">Dosen Wali</td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left"> BL = belum lengkap</td>
                                                    <td align="left">&nbsp;</td>
                                                    <td align="left">&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr border=1>
                                                    <td align="left">&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr border=1>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td align="center">&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td>Dikirim kepada :</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td align="center"><u><?php echo $dosenwali ?></u></td>
                                                  </tr>
                                                  <tr>
                                                    <td>1. Mahasiswa bersangkutan (putih)</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td>2. Arsip (hijau)</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                  </tr>
                                                  <tr>
                                                    <td>3. BAAK (merah muda)</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td></td>
                                                  </tr>
                                                  <tr>
                                                    <td>&nbsp;</td>
                                                    <td colspan="2"><p>&nbsp;</p>
                                                      <p>&nbsp;</p>
                                                    </td>
                                                    <td align="center">&nbsp;</td>
                                                  </tr>
												</table>
</body>
</html>