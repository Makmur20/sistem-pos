<?php
class M_user extends CI_Model{
	public function get_user(){
		$hsl=$this->db->query("SELECT * FROM tbl_user");
		return $hsl;
	}
	public function simpan_user($nama,$username,$password,$level){
		$hsl=$this->db->query("INSERT INTO tbl_user(user_nama,user_username,user_password,user_level,user_status) VALUES ('$nama','$username',md5('$password'),'$level','1')");
		return $hsl;
	}
	public function update_user_nopass($kode,$nama,$username,$level){
		$hsl=$this->db->query("UPDATE tbl_user SET user_nama='$nama',user_username='$username',user_level='$level' WHERE user_id='$kode'");
		return $hsl;
	}
	public function update_user($kode,$nama,$username,$password,$level){
		$hsl=$this->db->query("UPDATE tbl_user SET user_nama='$nama',user_username='$username',user_password=md5('$password'),user_level='$level' WHERE user_id='$kode'");
		return $hsl;
	}
	public function update_status($kode){
		$hsl=$this->db->query("UPDATE tbl_user SET user_status='0' WHERE user_id='$kode'");
		return $hsl;
	}

	public function hapus_user($kode){
		$hsl=$this->db->query("DELETE FROM tbl_user where user_id='$kode'");
		return $hsl;
	}
}