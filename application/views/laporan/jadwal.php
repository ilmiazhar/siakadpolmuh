<title>Laporan Data Jadwal</title>
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
    <p>
    <h3><b>Data Jadwal Perkuliahan</b></h3>
    <div id="container">
    <div id="body">
      <table width="100%" border="1" cellspacing="1" cellpadding="1">
        <tr>
          <td width="17%" valign="top" bgcolor="#CCCCCC"><b>Kode MK</b></td>
          <td width="22%" valign="top" bgcolor="#CCCCCC"><b>Matakuliah</b></td>
          <td width="5%" valign="top" bgcolor="#CCCCCC"><b>Semester</b></td>
          <td width="3%" valign="top" bgcolor="#CCCCCC"><b>SKS</b></td>
          <td width="23%" valign="top" bgcolor="#CCCCCC"><b>Dosen</b></td>
          <td width="30%" valign="top" bgcolor="#CCCCCC"><strong>Hari/Jam/Ruang</strong></td>
          
          <?php Tampilkan_Mata_Kuliah($jadwal) ;?>
        </tr>
      </table>
      <p><span class="main-container container-fluid">
        <?php
function Tampilkan_Mata_Kuliah($jdwl)
{
	$rows=array();
	$index=0;
	$temp='';
	$acuan=0;
	$rowspan=1;
	foreach ($jdwl->result_array() as $value) 
	{
		if(($temp=='') || ($value['kd_mk']!=$temp)) {			
			$rows[$index] = '<tr>
				<td valign="top" rowspan="1">'.$value['kd_mk'].'</td>
				<td rowspan="1" valign="top" id="'.'nama_'.$value['kd_mk'].'">'.$value['nama_mk'].'</td>
				<td align="center" valign="top" rowspan="1">'.$value['semester'].'</td>
				<td align="center" valign="top" rowspan="1" id="id'.$value['kd_mk'].'">'.$value['jum_sks'].'</td>';
				
				$rowspan=1;				
				$acuan=$index;
			}else if($value['kd_mk']==$temp) {
				$rows[$index] = '<tr>';
				$rowspan++;
			}

			$rows[$acuan]=str_replace('rowspan="'.($rowspan-1).'"', 'rowspan="'.$rowspan.'"', $rows[$acuan]);
			$peserta = isset($value['Peserta']) ? $value['Peserta']:'0';
			$calonpeserta = isset($value['CalonPeserta']) ? $value['CalonPeserta']:'0';
		
			$disabled ='';
			if($peserta >= $value['kapasitas'])
				$disabled ='disabled="disabled"';
			
			$linkpeserta = $peserta;
			if($peserta >0)
			$linkpeserta = '<a href="'.base_url().'index.php/admin/peserta/'.$value['kd_jadwal'].'_1
			/" title="Daftar Peserta Mata Kuliah '.$value['nama_mk'].'  -  Dosen '.$value['nama_dosen'].'" rel="example_group" class="link2">'
				.$peserta.'</a>';
				
			$linkcalonpeserta = $calonpeserta;
			if($calonpeserta >0)
			$linkcalonpeserta = '<a href="'.base_url().'index.php/admin/peserta/'.$value['kd_jadwal'].'_0
			/" title="Daftar Calon Peserta Mata Kuliah '.$value['nama_mk'].'  -  Dosen '.$value['nama_dosen'].'" rel="example_group" class="link2">	
			'.$calonpeserta.'</a>';
						
			$rows[$index] .='<td valign="top">'.$value['nama_dosen'].'</td>
				<td valign="top" id="jdwl_'.$value['kd_jadwal'].'">'.$value['jadwal'].'</td>
				
				</tr>';
			$index++;
			$temp=$value['kd_mk'];
	}		
	foreach($rows as $row)
	{
		echo str_replace('rowspan="1"', '', $row);
	}
}
?>
      </span></p>
</div>

</div>
</p></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
