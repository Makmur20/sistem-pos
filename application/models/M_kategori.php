<?php
class M_kategori extends CI_Model{

	public function hapus_kategori($kode){
		$hsl=$this->db->query("DELETE FROM tbl_kategori where kategori_id='$kode'");
		return $hsl;
	}

	public function update_kategori($kode,$kat){
		$hsl=$this->db->query("UPDATE tbl_kategori set nama_kategori='$kat' where kategori_id='$kode'");
		return $hsl;
	}

	public function tampil_kategori(){
		$hsl=$this->db->query("select * from tbl_kategori order by kategori_id desc");
		return $hsl;
	}

	public function simpan_kategori($kat){
		$hsl=$this->db->query("INSERT INTO tbl_kategori(nama_kategori) VALUES ('$kat')");
		return $hsl;
	}

}