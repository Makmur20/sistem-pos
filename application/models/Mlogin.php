<?php
class Mlogin extends CI_Model{
    public function cekadmin($u,$p){
        $hasil=$this->db->query("select*from tbl_user where user_username='$u'and user_password=md5('$p')");
        return $hasil;
    }
  
}
