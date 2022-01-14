<title>Laporan Data Dosen</title>
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
    <p><h3><b> Data Dosen</b></h3>
    <div id="container">
    <div id="body">
<table width="100%"  border="1"  cellspacing="1" cellpadding="1">
															  <tr>
															    <td bgcolor="#CCCCCC"><b>No</b></td>
															    <td bgcolor="#CCCCCC"><b>Kode Dosen</b></td>
															    <td bgcolor="#CCCCCC"><b>NIDN</b></td>
															    <td bgcolor="#CCCCCC"><b>Nama Dosen</b></td>
															  </tr>
                                                              <?php
															  $no=1;
															  foreach ($dosen->result_array() as $d)
															  {
															  ?>
															  <tr>
															    <td><?php echo $no;?></td>
															    <td><?php echo $d['kd_dosen']; ?></td>
															    <td><?php echo $d['nidn']; ?></td>
															    <td><?php echo $d['nama_dosen']; ?></td>
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
