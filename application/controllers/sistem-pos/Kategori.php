<?php
class Kategori extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
	}
	public function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_kategori->tampil_kategori();
		$this->load->view('sistem-pos/v_kategori',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	public function tambah_kategori(){
	if($this->session->userdata('akses')=='1'){
		$kat=$this->input->post('kategori');
		$tambah = $this->m_kategori->simpan_kategori($kat);

	if($tambah == true){
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data Berhasil Ditambahkan </div>');
		redirect('sistem-pos/kategori');
	}else{
		 $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Gagal Di Tambahkan </div>');
		 redirect('sistem-pos/kategori');
		}
	}else{
        echo "Halaman tidak ditemukan";
    }
}
	public function edit_kategori(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$kat=$this->input->post('kategori');
		$ubah = $this->m_kategori->update_kategori($kode,$kat);
		
		if($ubah == true){
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data Berhasil Diubah </div>');
		redirect('sistem-pos/kategori');
	}else{
		 $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Gagal Diubah </div>');
		 redirect('sistem-pos/kategori');
		}
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	public function hapus_kategori(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$hapus = $this->m_kategori->hapus_kategori($kode);
		
	if($hapus == true){
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data Berhasil Dihapus </div>');
		redirect('sistem-pos/kategori');
	}else{
		 $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Sedang Digunakan </div>');
		 redirect('sistem-pos/kategori');
		}
	}else{
        echo "Halaman tidak ditemukan";
    	}
	}
}