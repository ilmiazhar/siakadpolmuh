<?php if(! defined('BASEPATH')) exit ('no direct access allowed');
 
class Backup extends CI_controller{
 
 
        public  function backupdb(){
        // Load Clas Utilitas Database
        $this->load->dbutil();
 
        // nyiapin aturan untuk file backup
        $aturan = array(    
                'format'      => 'zip',            
                'filename'    => 'my_db_backup.sql'
              );
 
 
        $backup =& $this->dbutil->backup($aturan);
 
        $nama_database = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
        $simpan = '/backup'.$nama_database;
 
        $this->load->helper('file');
        write_file($simpan, $backup);
 
 
        $this->load->helper('download');
        force_download($nama_database, $backup);
        }

		public function menubackuprestore()
    {
        $this->load->model('nama_model');
        $data['tabel'] = $this->nama_model->tampiltabel(); //AMBIL DATA TABEL-TABEL
        $this->load->view('nama_view',$data);
    }

		public function restore()    
    {

        $this->load->helper('file');
        $this->load->model('web_app_model');
        $config['upload_path']="./assets/database/";
        $config['allowed_types']="jpg|png|gif|jpeg|bmp|sql|x-sql";
        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if(!$this->upload->do_upload("datafile")){
         $error = array('error' => $this->upload->display_errors());
         echo "GAGAL UPLOAD";
         var_dump($error);
         exit();
        }

        $file = $this->upload->data();  //DIUPLOAD DULU KE DIREKTORI assets/database/
        $fotoupload=$file['file_name'];
                    
          $isi_file = file_get_contents('./assets/database/' . $fotoupload); //PANGGIL FILE YANG TERUPLOAD
          $string_query = rtrim( $isi_file, "\n;" );
          $array_query = explode(";", $string_query);   //JALANKAN QUERY MERESTORE KEDATABASE
              foreach($array_query as $query)
              {
                    $this->db->query($query);
              }

          $path_to_file = './assets/database/' . $fotoupload;
            if(unlink($path_to_file)) {   // HAPUS FILE YANG TERUPLOAD
                 redirect('admin/restore');
				 
            }
			
            else {
                 echo 'errors occured';
            }
        
    }
		
}