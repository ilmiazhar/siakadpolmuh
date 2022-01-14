<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Khs extends CI_Controller {

	/**
	 * Example: DOMPDF 
	 *
	 * Documentation: 
	 * http://code.google.com/p/dompdf/wiki/Usage
	 *
	 */
	public function cetak()
	{
			$nim = $this->uri->segment(3);
			
			$dt_mhs = $this->web_app_model->getSelectedData("tbl_mahasiswa","nim",$nim);
			foreach ($dt_mhs->result() as $dm)
			{
				$bc['nama_mhs'] = $dm->nama_mahasiswa;
				$bc['program'] = $dm->kelas_program;
				$bc['jurusan'] = $dm->jurusan;
				$bc['kelas_program'] = $dm->kelas_program;

			}
			$bc['detailfrs'] = $this->web_app_model->getDetailKrsPersetujuan($nim,$bc['kelas_program']);
			$bc['khs'] = $this->web_app_model->getNilai($nim);
			$bc['mhs'] = $this->web_app_model->getNilai($nim);
			$bc['ipkm']= $this->web_app_model->getIpkmhs($nim);
			
		    $this->load->view('laporan/kartu_hasil_studi',$bc);	
		
		// dapatkan output html
		
		$html = $this->output->get_output();
		
		// Load/panggil library dompdfnya
		$this->load->library('dompdf_gen');
		
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->set_paper("A4");
		//utk menampilkan preview pdf
		$this->dompdf->stream("Kartu Hasil Studi.pdf",array('Attachment'=>0));
		//atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
		//$this->dompdf->stream("welcome.pdf");
		
	}
}

/* End of file welcome_pdf.php */
/* Location: ./application/controllers/welcome_pdf.php */