<?php
class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_user');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_user->get_user();
		$this->load->view('sistem-pos/v_user',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	public function tambah_user(){
	if($this->session->userdata('akses')=='1'){
		$nama=$this->input->post('nama');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$password2=$this->input->post('password2');
		$level=$this->input->post('level');
		if ($password2 <> $password) {
			$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               Password Anda Tidak Sama </div>');
			redirect('sistem-pos/user');
		}else{
		$this->m_user->simpan_user($nama,$username,$password,$level);
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data Berhasil Ditambahkan </div>');
		redirect('sistem-pos/user');
		}

	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	public function edit_user(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$password2=$this->input->post('password2');
		$level=$this->input->post('level');
		if (empty($password) && empty($password2)) {
			$this->m_user->update_user_nopass($kode,$nama,$username,$level);
			echo $this->session->set_flashdata('massage','<label class="label label-success">user Berhasil diupdate</label>');
			redirect('sistem-pos/user');
		}elseif ($password2 <> $password) {
			echo $this->session->set_flashdata('massage','<label class="label label-danger">Password yang Anda Masukan Tidak Sama</label>');
			redirect('sistem-pos/user');
		}else{
			$this->m_user->update_user($kode,$nama,$username,$password,$level);
			echo $this->session->set_flashdata('massage','<label class="label label-success">user Berhasil diupdate</label>');
			redirect('sistem-pos/user');
		}
	}else{
        echo "Halaman tidak ditemukan";
    }
}


public function hapus_user(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$hapus = $this->m_user->hapus_user($kode);
		
	if($hapus == true){
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data Berhasil Dihapus </div>');
		redirect('sistem-pos/user');
	}else{
		 $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Sedang Digunakan </div>');
		 redirect('sistem-pos/user');
		}
	}else{
        echo "Halaman tidak ditemukan";
    	}
	}

}