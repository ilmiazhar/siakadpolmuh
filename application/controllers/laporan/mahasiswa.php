<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	/**
	 * Example: DOMPDF 
	 *
	 * Documentation: 
	 * http://code.google.com/p/dompdf/wiki/Usage
	 *
	 */
	public function index() {	
		// load view yang akan digenerate atau diconvert
		// contoh kita akan membuat pdf dari halaman welcome codeigniter
		$bc['mahasiswa'] 	= $this->web_app_model->getAllData('tbl_mahasiswa');
	
		$this->load->view('laporan/mahasiswa',$bc);
		// dapatkan output html
		
		$html = $this->output->get_output();
		
		// Load/panggil library dompdfnya
		$this->load->library('dompdf_gen');
		
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->set_paper("A4");
		//utk menampilkan preview pdf
		$this->dompdf->stream("Mahasiswa.pdf",array('Attachment'=>0));
		//atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
		//$this->dompdf->stream("welcome.pdf");
		
	}
}

/* End of file welcome_pdf.php */
/* Location: ./application/controllers/welcome_pdf.php */