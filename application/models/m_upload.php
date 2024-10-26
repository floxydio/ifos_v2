<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class M_upload extends CI_Model {

   public function insert($table,$data){
     $this->db->insert($table,$data);
     return TRUE;
   }

   public function getData($table){
     return $this->db->get($table);
   }

}