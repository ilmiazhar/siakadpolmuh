<title>Laporan Data Matakuliah</title>
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
    <p><h3><b> Data Matakuliah</b></h3>
    <div id="container">
    <div id="body">
<table width="100%"  border="1"  cellspacing="1" cellpadding="1">
															  <tr>
															    <td width="4%" bgcolor="#CCCCCC"><b>No</b></td>
															    <td width="18%" bgcolor="#CCCCCC"><b>Kode MK</b></td>
															    <td width="48%" bgcolor="#CCCCCC"><b>Nama Matakuliah</b></td>
															    <td width="5%" bgcolor="#CCCCCC"><b>SKS</b></td>
															    <td width="10%" bgcolor="#CCCCCC"><b>Semester</b></td>
															    <td width="15%" bgcolor="#CCCCCC"><b>Program Studi</b></td>
		    </tr>
                                                              <?php
															  $no=1;
															  foreach ($mk->result_array() as $d)
															  {
															  ?>
															  <tr>
															    <td align="center"><?php echo $no;?></td>
															    <td><?php echo $d['kd_mk']; ?></td>
															    <td><?php echo $d['nama_mk']; ?></td>
															    <td align="center"><?php echo $d['jum_sks']; ?></td>
															    <td align="center"><?php echo $d['semester']; ?></td>
															    <td align="center"><?php echo $d['kode_jur']; ?></td>
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
