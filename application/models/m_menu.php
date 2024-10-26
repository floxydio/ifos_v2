<?php
class M_menu extends CI_Model{
  public function get_moduls()
 {

 	$this->db->where('level', $this->session->userdata('level'));
 $this->db->order_by('id_muser');
 $this->db->from('tb_menu_user');
$this->db->join('tb_menu', 'tb_menu_user.id_menu = tb_menu.id_menu');
 $query = $this->db->get();

 return $query->result();
 }

 public function get_umur($umur)
 {
 list($tahun,$bulan,$hari)=explode('-',$umur);
 $thn=date('Y')-$tahun;
 $bln=date('m')-$bulan;
 $hri=date('d')-$hari;
 if($hri<0 || $bln<0){
   $thn;
 }
 return $thn;
 }
 function get_menus()
 {
 $this->db->order_by('id_menuutama');
 $this->db->from('tb_submenu','ASC');
$this->db->join('tb_menu', 'tb_submenu.id_menuutama = tb_menu.id_menu');
 $query = $this->db->get();

 return $query->result();
 }
        function getAllPembiayaan($where){
    $this->db->select('*');
    if($where != NULL)
        $this->db->where($where,NULL,FALSE);
       $query = $this->db->get('tb_pembiayaan');

    return $query->result();

}
}