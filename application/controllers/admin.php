<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Admin extends CI_Controller {

	public function index() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$this->load->view('admin/bg_home', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function menubackup() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$this->load->view('admin/bg_backup', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function restore() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$this->load->view('admin/bg_sukses', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function mahasiswa() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$page = $this->uri->segment(3);
			$limit = 10;
			if (!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;

			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$tot_hal = $this->web_app_model->getAllData('tbl_mahasiswa');

			$config['base_url'] = base_url() . 'index.php/admin/mahasiswa/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;

			$config['full_tag_open'] = "<ul class='pagination pull-right no-margin'>";
			$config['full_tag_close'] = "</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disable'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tag_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tag_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tag_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tag_close'] = "</li>";

			$this->pagination->initialize($config);
			$bc['paginator'] = $this->pagination->create_links();

			$bc['mahasiswa'] = $this->web_app_model->getAllDataLimited('tbl_mahasiswa', $offset, $limit);

			$this->load->view('admin/bg_mahasiswa', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function tambah_mahasiswa() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$bc['matakuliah'] = $this->web_app_model->getAllData('tbl_mk');
			$bc['dosen'] = $this->web_app_model->getAllData('tbl_dosen');
			$bc['tahun_ajaran'] = $this->web_app_model->getSelectedData('tbl_thn_ajaran', 'stts', 1);

			$this->load->view('admin/bg_tambah_mahasiswa', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function simpan_mahasiswa() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$st = $this->input->post("stts");

			$simpan["nama_mahasiswa"] = $this->input->post("nama_mahasiswa");
			$simpan["angkatan"] = $this->input->post("angkatan");
			$simpan["jurusan"] = $this->input->post("jurusan");
			$simpan["kelas_program"] = $this->input->post("kelas_program");
			$simpan2["kd_dosen"] = $this->input->post("kd_dosen");

			if ($st == "edit") {
				$nim = $this->input->post('nim');
				$where = array('nim' => $nim);
				$this->web_app_model->updateDataMultiField("tbl_mahasiswa", $simpan, $where);
				$this->web_app_model->updateDataMultiField("tbl_dosen_wali", $simpan2, $where);
				?>
					<?php
{
					header('location:' . base_url() . 'index.php/admin/tambah_mahasiswa');
					$this->session->set_flashdata("save_mahasiswa", "<div class='alert alert-block alert-success'>
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
} else if ($st == "tambah") {
				$simpan["nim"] = $this->input->post("nim");
				$simpan2["nim"] = $this->input->post("nim");
				$simpan2["kd_dosen"] = $this->input->post("kd_dosen");
				$simpan3["username"] = $this->input->post("nim");
				$simpan3["password"] = md5($this->input->post("nim"));
				$simpan3["stts"] = "mahasiswa";
				if ($this->web_app_model->cekNimMax($simpan["nim"]) == 0) {
					$this->web_app_model->insertData('tbl_mahasiswa', $simpan);
					$this->web_app_model->insertData('tbl_dosen_wali', $simpan2);
					$this->web_app_model->insertData('tbl_login', $simpan3);
					?>
					<?php
{
						header('location:' . base_url() . 'index.php/admin/tambah_mahasiswa');
						$this->session->set_flashdata("save_mahasiswa", "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>

										<p>
											<strong>
												<i class='icon-ok'></i>
												Selamat!
											</strong>
											Data berhasil ditambah..!
											</p>
									</div>");
					}
					?>
				<?php
} else {
					$this->session->set_flashdata("save_mahasiswa", "NIM telah digunakan");
					{
						header('location:' . base_url() . 'index.php/admin/mahasiswa');
					}

				}
			}
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function hapus_mahasiswa() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$id = $this->uri->segment(3);
			$hapus = array('nim' => $id);
			$hapus2 = array('username' => $id);
			$this->web_app_model->deleteData('tbl_mahasiswa', $hapus);
			$this->web_app_model->deleteData('tbl_login', $hapus2);
			$this->web_app_model->deleteData('tbl_dosen_wali', $hapus);
			header('location:' . base_url() . 'index.php/admin/mahasiswa');
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function edit_mahasiswa() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$bc['dosen'] = $this->web_app_model->getAllData('tbl_dosen');
			$bc['mahasiswa'] = $this->web_app_model->getEditMahasiswa($this->uri->segment(3));

			$this->load->view('admin/bg_edit_mahasiswa', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function dosen() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$page = $this->uri->segment(3);
			$limit = 10;
			if (!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;

			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$tot_hal = $this->web_app_model->getAllData('tbl_dosen');

			$config['base_url'] = base_url() . 'index.php/admin/dosen/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;

			$config['full_tag_open'] = "<ul class='pagination pull-right no-margin'>";
			$config['full_tag_close'] = "</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disable'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tag_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tag_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tag_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tag_close'] = "</li>";

			$this->pagination->initialize($config);
			$bc['paginator'] = $this->pagination->create_links();

			$bc['dosen'] = $this->web_app_model->getAllDataLimited('tbl_dosen', $offset, $limit);

			$this->load->view('admin/bg_dosen', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function tambah_dosen() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$this->load->view('admin/bg_tambah_dosen', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function simpan_dosen() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$st = $this->input->post("stts");

			$simpan["nidn"] = $this->input->post("nidn");
			$simpan["nama_dosen"] = $this->input->post("nama_dosen");

			if ($st == "edit") {
				$kd_dosen = $this->input->post('kd_dosen');
				$where = array('kd_dosen' => $kd_dosen);
				$this->web_app_model->updateDataMultiField("tbl_dosen", $simpan, $where);
				?>
					<?php
{
					header('location:' . base_url() . 'index.php/admin/tambah_dosen');
					$this->session->set_flashdata("save_dosen", "<div class='alert alert-block alert-success'>
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
} else if ($st == "tambah") {
				$simpan["kd_dosen"] = $this->input->post("kd_dosen");
				if ($this->web_app_model->cekKodeDosenMax($simpan["kd_dosen"]) == 0) {
					$this->web_app_model->insertData('tbl_dosen', $simpan);
					$lg['username'] = $this->input->post("kd_dosen");
					$lg['password'] = md5($lg['username']);
					$lg['stts'] = "dosen";
					$this->web_app_model->insertData('tbl_login', $lg);
					?>
					<?php
{
						header('location:' . base_url() . 'index.php/admin/tambah_dosen');
						$this->session->set_flashdata("save_dosen", "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>

										<p>
											<strong>
												<i class='icon-ok'></i>
												Selamat!
											</strong>
											Data berhasil ditambah...!
										</p>
									</div>");
					}
					?>
				<?php
} else {
					$this->session->set_flashdata("save_dosen", "Kode dosen telah digunakan");
					{
						header('location:' . base_url() . 'index.php/admin/dosen');
					}

				}
			}
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function edit_dosen() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$bc['dosen'] = $this->web_app_model->getSelectedData('tbl_dosen', 'kd_dosen', $this->uri->segment(3));

			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$this->load->view('admin/bg_edit_dosen', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function hapus_dosen() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$id = $this->uri->segment(3);
			$hapus = array('kd_dosen' => $id);
			$hapus2 = array('username' => $id);
			$this->web_app_model->deleteData('tbl_dosen', $hapus);
			$this->web_app_model->deleteData('tbl_login', $hapus2);
			$this->web_app_model->deleteData('tbl_dosen_wali', $hapus);
			header('location:' . base_url() . 'index.php/admin/dosen');
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function dosen_mk() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$bc['dosen_mk'] = $this->web_app_model->getDosenMK($this->uri->segment(3));

			$this->load->view('admin/bg_dosen_mk', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function mk() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$bc['mk'] = $this->web_app_model->getAllData('tbl_mk');

			$this->load->view('admin/bg_mk', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function tambah_mk() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$this->load->view('admin/bg_tambah_mk', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function simpan_mk() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$st = $this->input->post("stts");

			$simpan["nama_mk"] = $this->input->post("nama_mk");
			$simpan["jum_sks"] = $this->input->post("jum_sks");
			$simpan["semester"] = $this->input->post("semester");
			$simpan["prasyarat_mk"] = $this->input->post("prasyarat_mk");
			$simpan["kode_jur"] = $this->input->post("kode_jur");

			if ($st == "edit") {
				$kd_mk = $this->input->post('kd_mk');
				$where = array('kd_mk' => $kd_mk);
				$this->web_app_model->updateDataMultiField("tbl_mk", $simpan, $where);
				?>
					<?php
{
					header('location:' . base_url() . 'index.php/admin/tambah_mk');
					$this->session->set_flashdata("save_mk", "<div class='alert alert-block alert-success'>
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
} else if ($st == "tambah") {
				$simpan["kd_mk"] = $this->input->post("kd_mk");
				if ($this->web_app_model->cekKodeMkMax($simpan["kd_mk"]) == 0) {
					$this->web_app_model->insertData('tbl_mk', $simpan);

					?>
					<?php
{
						header('location:' . base_url() . 'index.php/admin/tambah_mk');
						$this->session->set_flashdata("save_mk", "<div class='alert alert-block alert-success'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>

										<p>
											<strong>
												<i class='icon-ok'></i>
												Selamat!
											</strong>
											Data berhasil ditambah...!
										</p>
									</div>");
					}
					?>
				<?php
} else {
					$this->session->set_flashdata("save_mk", "Kode Matakuliah telah digunakan");
					{
						header('location:' . base_url() . 'index.php/admin/tambah_mk');
					}

				}
			}
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function edit_mk() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$bc['mk'] = $this->web_app_model->getSelectedData('tbl_mk', 'kd_mk', $this->uri->segment(3));

			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$this->load->view('admin/bg_edit_mk', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function hapus_mk() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$id = $this->uri->segment(3);
			$hapus = array('kd_mk' => $id);
			$this->web_app_model->deleteData('tbl_mk', $hapus);
			$this->web_app_model->deleteData('tbl_jadwal', $hapus);
			header('location:' . base_url() . 'index.php/admin/mk');
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function mk_dosen() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$bc['mk_dosen'] = $this->web_app_model->getMkDosen($this->uri->segment(3));

			$this->load->view('admin/bg_mk_dosen', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function tampil_jadwal() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$bc['jadwal'] = $this->web_app_model->getSemuaJadwal();

			$this->load->view('admin/bg_jadwal', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function tambah_jadwal() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$bc['mata_kuliah'] = $this->web_app_model->getAllData('tbl_mk');
			$bc['dosen'] = $this->web_app_model->getAllData('tbl_dosen');
			$bc['tahun_ajaran'] = $this->web_app_model->getSelectedData('tbl_thn_ajaran', 'stts', 1);

			$this->load->view('admin/bg_tambah_jadwal', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function simpan_jadwal() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$st = $this->input->post("stts");

			$hari = $this->input->post('hari');
			$mulai = ($this->input->post('jam_mulai'));
			$akhir = ($this->input->post('jam_akhir'));
			$ruangan = ($this->input->post('ruang'));
			$jadwal = $hari . ' / ' . $mulai . '-' . $akhir . ' / ' . $ruangan;

			$simpan["kd_mk"] = $this->input->post("kd_mk");
			$simpan["kd_dosen"] = $this->input->post("kd_dosen");
			$simpan["kd_tahun"] = $this->input->post("kd_tahun");
			$simpan["jadwal"] = $jadwal;
			$simpan["kapasitas"] = $this->input->post("kapasitas");
			$simpan["kelas_program"] = $this->input->post("kelas_program");
			$simpan["kelas"] = $this->input->post("kelas");

			if ($st == "edit") {
				$kd_jadwal = $this->input->post('kd_jadwal');
				$where = array('kd_jadwal' => $kd_jadwal);
				$this->web_app_model->updateDataMultiField("tbl_jadwal", $simpan, $where);
				?>
			<?php
{
					header('location:' . base_url() . 'index.php/admin/tampil_jadwal');
				}
				?>
				<?php
} else if ($st == "tambah") {
				$this->web_app_model->insertData('tbl_jadwal', $simpan);
				?>
					<?php
{
					header('location:' . base_url() . 'index.php/admin/tampil_jadwal');
				}
				?>
				<?php
}
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function hapus_jadwal() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$id = $this->uri->segment(3);
			$hapus = array('kd_jadwal' => $id);
			$this->web_app_model->deleteData('tbl_jadwal', $hapus);
			header('location:' . base_url() . 'index.php/admin/tampil_jadwal');
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function peserta() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$d = explode("_", $this->uri->segment(3));
			$bc['peserta'] = $this->web_app_model->getPeserta($d[0], $d[1]);

			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$this->load->view('admin/bg_peserta', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function nilai() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$page = $this->uri->segment(3);
			$limit = 10;
			if (!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;

			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$tot_hal = $this->web_app_model->getAllData('tbl_mahasiswa');

			$config['base_url'] = base_url() . 'index.php/admin/nilai/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;

			$config['full_tag_open'] = "<ul class='pagination pull-right no-margin'>";
			$config['full_tag_close'] = "</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disable'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tag_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tag_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tag_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tag_close'] = "</li>";

			$this->pagination->initialize($config);
			$bc['paginator'] = $this->pagination->create_links();

			$bc['mhs'] = $this->web_app_model->getDaftarMahasiswa($offset, $limit);

			$this->load->view('admin/bg_daftar_mahasiswa', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function input_nilai() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$nim = $this->uri->segment(3);

			$dt_mhs = $this->web_app_model->getSelectedData("tbl_mahasiswa", "nim", $nim);
			foreach ($dt_mhs->result() as $dm) {
				$bc['nama_mhs'] = $dm->nama_mahasiswa;
				$bc['program'] = $dm->kelas_program;
				$bc['jurusan'] = $dm->jurusan;
				$bc['kelas_program'] = $dm->kelas_program;

			}
			$bc['detailfrs'] = $this->web_app_model->getDetailKrsPersetujuan($nim, $bc['kelas_program']);
			$bc['khs'] = $this->web_app_model->getNilai($nim);

			$this->load->view('admin/bg_input_nilai', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function hapus_nilai() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$dl['nim'] = $this->uri->segment(3);
			$dl['kd_mk'] = $this->uri->segment(4);
			$this->web_app_model->deleteData('tbl_nilai', $dl);
			header('location:' . base_url() . 'index.php/admin/input_nilai/' . $dl['nim']);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function form_input_nilai() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$nim = $this->uri->segment(3);
			$kd_jdw = $this->uri->segment(4);
			$cek_smt = $this->web_app_model->getSelectedData('tbl_perwalian_header', 'nim', $nim);
			$bc['smt'] = "";
			foreach ($cek_smt->result() as $c) {
				$bc['smt'] = $c->semester;
			}
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);
			$bc['input'] = $this->web_app_model->getInputDetailNilai($nim, $kd_jdw);

			$this->load->view('admin/bg_form_input_nilai', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function simpan_nilai() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$st = $this->input->post("stts");

			if ($st == "edit") {
				$nim = $this->input->post('nim');
				$kd_mk = $this->input->post('kd_mk');

				$di['kd_dosen'] = $this->input->post('kd_dosen');
				$di['kd_tahun'] = $this->input->post('kd_tahun');
				$di['semester_ditempuh'] = $this->input->post('semester_ditempuh');
				$di['grade'] = $this->input->post('grade');

				$this->web_app_model->updateDataMultiField("tbl_nilai", $di, array('nim' => $nim, 'kd_mk' => $kd_mk));
				?>
					<?php
{
					header('location:' . base_url() . 'index.php/admin/form_input_nilai');
					$this->session->set_flashdata("save_nilai", "<div class='alert alert-block alert-success'>
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
} else if ($st == "tambah") {

				$di['nim'] = $this->input->post('nim');
				$di['kd_mk'] = $this->input->post('kd_mk');
				$di['kd_dosen'] = $this->input->post('kd_dosen');
				$di['kd_tahun'] = $this->input->post('kd_tahun');
				$di['semester_ditempuh'] = $this->input->post('semester_ditempuh');
				$di['grade'] = $this->input->post('grade');

				$this->web_app_model->insertData('tbl_nilai', $di);

				?>
					<?php
{
					header('location:' . base_url() . 'index.php/admin/form_input_nilai');
					$this->session->set_flashdata("save_nilai", "<div class='alert alert-block alert-success'>
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
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function akun() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$bc['nama'] = $this->session->userdata('nama');
			$bc['status'] = $this->session->userdata('stts');
			$bc['username'] = $this->session->userdata('username');

			$bc['atas'] = $this->load->view('admin/atas', $bc, true);
			$bc['menu'] = $this->load->view('admin/menu', '', true);
			$bc['bio'] = $this->load->view('admin/bio', $bc, true);

			$this->load->view('admin/bg_akun', $bc);
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

	public function simpan_akun() {
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if (!empty($cek) && $stts == 'admin') {
			$username = $this->session->userdata('username');

			$pass_lama = $this->input->post('pass_lama');
			$pass_baru = $this->input->post('pass_baru');
			$ulangi_pass = $this->input->post('ulangi_pass');

			$data['username'] = $username;
			$data['password'] = md5($pass_lama);
			$cek = $this->web_app_model->getSelectedDataMultiple('tbl_login', $data);
			if ($cek->num_rows() > 0) {
				if ($pass_baru == $ulangi_pass) {
					$simpan['password'] = md5($pass_baru);
					$where = array('username' => $username);
					$this->web_app_model->updateDataMultiField("tbl_login", $simpan, $where);
					$this->session->set_flashdata("save_akun", "
					<div class='alert alert-info'>
										<button type='button' class='close' data-dismiss='alert'>
											<i class='icon-remove'></i>
										</button>
										<strong>Selamat!</strong>

										Anda berhasil mengubah password
										<br />
									</div>");
					header('location:' . base_url() . 'index.php/admin/akun');
				} else {
					$this->session->set_flashdata("save_akun", "
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
					header('location:' . base_url() . 'index.php/admin/akun');
				}
			} else {
				$this->session->set_flashdata("save_akun", "
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
				header('location:' . base_url() . 'index.php/admin/akun');
			}
		} else {
			header('location:' . base_url() . 'index.php/web');
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */