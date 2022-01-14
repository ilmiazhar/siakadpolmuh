<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {

	public function _construct()
	{
		session_start();	
	}
	
	
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			$this->load->view('tampilan_login');	
		}
		else
		{
			$st = $this->session->userdata('stts');
			if($st=='mahasiswa')
			{
				header('location:'.base_url().'index.php/mahasiswa');	
			}
			else if($st=='dosen')
			{
				header('location:'.base_url().'index.php/dosen');	
			}
			else if($st=='admin')
			{
				header('location:'.base_url().'index.php/admin');	
			}
		}
	}
	
	
	public function login()
	{
		$u = $this->input->post('username');
		$p = $this->input->post('password');
		$this->web_app_model->getLoginData($u,$p);
	}
	
	public function logout()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			header('location:'.base_url().'index.php/web');	
		}
		else
		{
			$this->session->sess_destroy();
			header('location:'.base_url().'index.php/web');	
		}
	}
	
	
	
	
	
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */