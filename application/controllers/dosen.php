<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen extends CI_Controller {

	
	public function index()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			
			$bc['atas'] = $this->load->view('dosen/atas',$bc,true);
			$bc['menu'] = $this->load->view('dosen/menu','',true);
			$bc['bio'] = $this->load->view('dosen/bio',$bc,true);
			
			$this->load->view('dosen/bg_home',$bc);			
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}
	
	public function persetujuan()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['kd_dosen'] = $this->session->userdata('kd_dosen');
			
			$bc['atas'] = $this->load->view('dosen/atas',$bc,true);
			$bc['menu'] = $this->load->view('dosen/menu','',true);
			$bc['bio'] = $this->load->view('dosen/bio',$bc,true);
			
			$bc['mhs'] = $this->web_app_model->getMahasiswaBimbingan($bc['kd_dosen']);
			
			$this->load->view('dosen/bg_persetujuan',$bc);			
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}
	
	public function detail_krs()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['kd_dosen'] = $this->session->userdata('kd_dosen');
			
			$bc['atas'] = $this->load->view('dosen/atas',$bc,true);
			$bc['menu'] = $this->load->view('dosen/menu','',true);
			$bc['bio'] = $this->load->view('dosen/bio',$bc,true);
			
			$bc['nim'] = $this->uri->segment(3);
			$bc['status'] = $this->uri->segment(4);
			
			$bc['smt_skr'] 		= $this->web_app_model->getSemesterMax($bc['nim']);
			$bc['ipk']	   		= $this->web_app_model->getIpk($bc['nim'],$bc['smt_skr']-1);
			$bc['dosen_wali']	= $this->web_app_model->getDosenWali($bc['nim']);
			$bc['tahun_ajaran']	= $this->web_app_model->getTahunAjaran();
			
			$bc['beban_studi'] = beban_studi($bc['ipk']);
			
			$dt_mhs = $this->web_app_model->getSelectedData("tbl_mahasiswa","nim",$bc['nim']);
			foreach($dt_mhs->result() as $dm)
			{
				$bc['nama_mhs']		 = 	$dm->nama_mahasiswa;
				$bc['program'] 		 = 	$dm->kelas_program;
				$bc['jurusan'] 		 = 	$dm->jurusan;
				$bc['kelas_program'] = 	$dm->kelas_program;
				
			}
			$bc['detailfrs'] = $this->web_app_model->getDetailKrsPersetujuan($bc['nim'],$bc['kelas_program']);
			$this->load->view('dosen/bg_detail_krs',$bc);			
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}
	
	public function setuju_krs()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$data_update['nim'] = $this->input->post('nim');
			$data_update['status'] = '1';
			$data_update['tgl_persetujuan'] = date("y-m-d");
			$this->web_app_model->updateData('tbl_perwalian_header',$data_update,$data_update['nim'],'nim');
			echo "<div class='alert alert-info'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>
										<strong>Selamat!</strong>

										Kartu Rencana Studi Berhasil Disetujui
										<br />
									</div>";
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}
	
	
	public function batal_krs()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$data_update['nim'] = $this->input->post('nim');
			$data_update['status'] = '0';
			$data_update['tgl_persetujuan'] = date("y-m-d");
			$this->web_app_model->updateData('tbl_perwalian_header',$data_update,$data_update['nim'],'nim');
			echo "<div class='alert alert-info'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>
										<strong>Selamat!</strong>

										Kartu Rencana Studi Berhasil Dibatalkan
										<br />
									</div>";
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}
	
	public function hapus_krs()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$dt_mentah = $this->input->post('id');
			$dt = explode("|",$dt_mentah);
			$data['nim'] = $dt[0];
			$data['kd_jadwal'] = $dt[1];
			$this->web_app_model->deleteData("tbl_krs",$data);
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}
	
	public function nilai()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			$bc['kd_dosen'] = $this->session->userdata('kd_dosen');

			$bc['atas'] = $this->load->view('dosen/atas',$bc,true);
			$bc['menu'] = $this->load->view('dosen/menu','',true);
			$bc['bio'] = $this->load->view('dosen/bio',$bc,true);
			$bc['mhs'] = $this->web_app_model->getDaftarMahasiswaNilai($bc['kd_dosen']);
			
			$this->load->view('dosen/bg_daftar_mahasiswa',$bc);			
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}
	
	
	public function input_nilai()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			
			$bc['atas'] = $this->load->view('dosen/atas',$bc,true);
			$bc['menu'] = $this->load->view('dosen/menu','',true);
			$bc['bio'] = $this->load->view('dosen/bio',$bc,true);
			
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
			
			$this->load->view('dosen/bg_input_nilai',$bc);			
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}
	
	public function hapus_nilai()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$dl['nim'] = $this->uri->segment(3);
			$dl['kd_mk'] = $this->uri->segment(4);
			$this->web_app_model->deleteData('tbl_nilai',$dl);
			header('location:'.base_url().'index.php/dosen/input_nilai/'.$dl['nim']);
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}
	
	
	public function form_input_nilai()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$nim = $this->uri->segment(3);
			$kd_jdw = $this->uri->segment(4);
			$cek_smt = $this->web_app_model->getSelectedData('tbl_perwalian_header','nim',$nim);
			$bc['smt'] = "";
			foreach($cek_smt->result() as $c)
			{
				$bc['smt'] = $c->semester;
			}
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			
			$bc['atas'] = $this->load->view('dosen/atas', $bc, true);
			$bc['menu'] = $this->load->view('dosen/menu', '', true);
			$bc['bio'] = $this->load->view('dosen/bio', $bc, true);
			$bc['input'] = $this->web_app_model->getInputDetailNilai($nim,$kd_jdw);
			
			$this->load->view('dosen/bg_form_input_nilai',$bc);
		}
		else
		{
			header('location:'.base_url().'index.php/web');
		}
	}
	
	public function simpan_nilai()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$st = $this->input->post("stts");
			
			if($st=="edit")
			{
				$nim = $this->input->post('nim');
				$kd_mk = $this->input->post('kd_mk');
				
				$di['kd_dosen'] = $this->input->post('kd_dosen');
				$di['kd_tahun'] = $this->input->post('kd_tahun');
				$di['semester_ditempuh'] = $this->input->post('semester_ditempuh');
				$di['grade'] = $this->input->post('grade');

				
				$this->web_app_model->updateDataMultiField("tbl_nilai",$di,array('nim'=>$nim, 'kd_mk'=>$kd_mk));
				?>
					<?php 
					{
			header('location:'.base_url().'index.php/dosen/form_input_nilai');
			$this->session->set_flashdata("save_nilai","<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>

										<p>
											<strong>
												<i class='icon-ok'></i>
												Selamat!
											</strong>
											Data berhasil diupdate...!
										</p>
									</div>");
				}
				?>
				<?php
			}
			else if($st=="tambah")
			{
				
				$di['nim'] = $this->input->post('nim');
				$di['kd_mk'] = $this->input->post('kd_mk');
				$di['kd_dosen'] = $this->input->post('kd_dosen');
				$di['kd_tahun'] = $this->input->post('kd_tahun');
				$di['semester_ditempuh'] = $this->input->post('semester_ditempuh');
				$di['grade'] = $this->input->post('grade');				
				
				$this->web_app_model->insertData('tbl_nilai',$di);
					
				?>
					<?php 
					{
			header('location:'.base_url().'index.php/dosen/form_input_nilai');
			$this->session->set_flashdata("save_nilai","<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>

										<p>
											<strong>
												<i class='icon-ok'></i>
												Selamat!
											</strong>
											Data berhasil diupdate...!
										</p>
									</div>");
				}
				?>
				<?php
				}
		}
		else
		{
			header('location:'.base_url().'index.php/web');
		}
	}
	
	
	public function akun()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');
			
			$bc['atas'] = $this->load->view('dosen/atas',$bc,true);
			$bc['menu'] = $this->load->view('dosen/menu','',true);
			$bc['bio'] = $this->load->view('dosen/bio',$bc,true);
			
			$this->load->view('dosen/bg_akun',$bc);			
		}
		else
		{
			header('location:'.base_url().'index.php/web');	
		}
	}
	
	
	public function simpan_akun()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$username = $this->session->userdata('username');
			
			$pass_lama = $this->input->post('pass_lama');
			$pass_baru = $this->input->post('pass_baru');
			$ulangi_pass = $this->input->post('ulangi_pass');
			
			$data['username'] = $username;
			$data['password'] = md5($pass_lama);
			$cek = $this->web_app_model->getSelectedDataMultiple('tbl_login',$data);
			if($cek->num_rows()>0)
			{
				if($pass_baru==$ulangi_pass)
				{
					$simpan['password'] = md5($pass_baru);
					$where = array('username'=>$username);
					$this->web_app_model->updateDataMultiField("tbl_login",$simpan,$where);
					$this->session->set_flashdata("save_akun","
					<div class='alert alert-info'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>
										<strong>Selamat!</strong>

										Anda berhasil mengubah password
										<br />
									</div>");
					header('location:'.base_url().'index.php/dosen/akun');
				}
				else
				{
					$this->session->set_flashdata("save_akun","
						<div class='alert alert-error'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>

										<strong>
											<i class='icon-remove'></i>
											Terjadi Kesalahan!
										</strong>

										Password yang Anda input tidak sama
										<br />
									</div>");
					header('location:'.base_url().'index.php/dosen/akun');
				}
			}
			else
			{
				$this->session->set_flashdata("save_akun","
				<div class='alert alert-error'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>

										<strong>
											<i class='icon-remove'></i>
											Terjadi Kesalahan!
										</strong>

										Password lama Anda salah, mohon periksa kembali password lama Anda
										<br />
									</div>");
				header('location:'.base_url().'index.php/dosen/akun');
			}
		}
		else
		{
			header('location:'.base_url().'index.php/web');
		}
	}
	
	
	
	
	
	
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */