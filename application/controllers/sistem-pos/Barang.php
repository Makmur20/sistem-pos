<?php
class Barang extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
	
	}
	public function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$data['data']=$this->m_barang->tampil_barang();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['kat2']=$this->m_kategori->tampil_kategori();
		$this->load->view('sistem-pos/v_barang',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	public function tambah_barang(){
	if($this->session->userdata('akses')=='1'){
		// $kobar=$this->m_barang->get_kobar();
		$idbar=$this->input->post('idbar');
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$tambah = $this->m_barang->simpan_barang($idbar,$nabar,$kat,$satuan,$harpok,$harjul,$stok,$min_stok);

		if($tambah == true){
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data Berhasil Ditambahkan </div>');
		redirect('sistem-pos/barang');
	}else{
		 $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Gagal Di Tambahkan </div>');
		 redirect('sistem-pos/barang');
		}
	}else{
        echo "Halaman tidak ditemukan";
    }
}
	public function edit_barang(){
	if($this->session->userdata('akses')=='1'){
		$idbar=$this->input->post('idbar');
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$ubah = $this->m_barang->update_barang($idbar,$nabar,$kat,$satuan,$harpok,$harjul,$stok,$min_stok);

		if($ubah == true){
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Data Berhasil Diubah </div>');
		redirect('sistem-pos/barang');
	}else{
		$this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           Data Gagal Diubah </div>');
redirect('sistem-pos/barang');
		}
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	public function hapus_barang(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_barang->hapus_barang($kode);
		redirect('sistem-pos/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}