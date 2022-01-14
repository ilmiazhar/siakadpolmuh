<title>Laporan Data Mahasiswa</title>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%" align="left" valign="top"><img src="<?php echo base_url();?>assets/logo-laporan.png"></td>
        <td width="84%" align="left" valign="top"><H1>POLITEKNIK MUHAMMADIYAH TEGAL</H1>
          <br>
Alamat: Jl. Melati No. 27 - 30, Kota Tegal <br>
Telepon: (028) 351-081 website: http://polmuh-tegal.ac.id</td>
      </tr>
    </table><hr></td>
  </tr>
  <tr>
    <td align="center" valign="top"><p>&nbsp;</p>
    <p><h3><b> Data Mahasiswa</b></h3>
    <div id="container">
    <div id="body">
<table width="100%"  border="1"  cellspacing="1" cellpadding="1">
															  <tr>
															    <td width="3%" bgcolor="#CCCCCC"><b>No</b></td>
															    <td width="14%" bgcolor="#CCCCCC"><b>NIM</b></td>
															    <td width="32%" bgcolor="#CCCCCC"><b>Nama Mahasiswa</b></td>
															    <td width="15%" bgcolor="#CCCCCC"><b>Angkatan</b></td>
															    <td width="19%" bgcolor="#CCCCCC"><b>Program Studi</b></td>
															    <td width="17%" bgcolor="#CCCCCC"><b>Kelas Program</b></td>
		    </tr>
                                                              <?php
															  $no=1;
															  foreach ($mahasiswa->result_array() as $d)
															  {
															  ?>
															  <tr>
															    <td align="center"><?php echo $no;?></td>
															    <td><?php echo $d['nim']; ?></td>
															    <td><?php echo $d['nama_mahasiswa']; ?></td>
															    <td><?php echo $d['angkatan']; ?></td>
															    <td><?php echo $d['jurusan']; ?></td>
															    <td><?php echo $d['kelas_program']; ?></td>
														     </tr>
															  <?php
															  $no++;
															  }
															  
															  ?>
														    </table>
		<p>&nbsp;</p>
</div>

</div>
</p></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
