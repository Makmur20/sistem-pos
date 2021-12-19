<?php
class M_barang extends CI_Model{

	public function hapus_barang($kode){
		$hsl=$this->db->query("DELETE FROM tbl_barang where id_barang='$kode'");
		return $hsl;
	}

	public function update_barang($idbar,$nabar,$kat,$satuan,$harpok,$harjul,$stok,$min_stok){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_barang SET nama_barang='$nabar',satuan_barang='$satuan',harga_pokok_barang='$harpok',harga_jual_barang='$harjul',stok_barang='$stok',stok_min_barang='$min_stok',barang_kategori_id='$kat' WHERE id_barang='$idbar'");
		return $hsl;
	}

	public function tampil_barang(){
		$hsl=$this->db->query("SELECT id_barang,nama_barang,satuan_barang,harga_pokok_barang,harga_jual_barang,stok_barang,stok_min_barang,barang_kategori_id,nama_kategori FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id");
		return $hsl;
	}

	public function simpan_barang($idbar,$nabar,$kat,$satuan,$harpok,$harjul,$stok,$min_stok){
		$hsl=$this->db->query("INSERT INTO tbl_barang (id_barang,nama_barang,satuan_barang,harga_pokok_barang,harga_jual_barang,stok_barang,stok_min_barang,barang_kategori_id) VALUES ('$idbar','$nabar','$satuan','$harpok','$harjul','$stok','$min_stok','$kat')");
		return $hsl;
	}


	public function get_barang($kobar){
		$hsl=$this->db->query("SELECT * FROM tbl_barang where id_barang='$kobar'");
		return $hsl;
	}



}