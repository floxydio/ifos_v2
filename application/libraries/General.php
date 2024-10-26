<?php

/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/

/**
* Description of General
*
* @author gieart
*/
class General {

//put your code here
var $ci;

function __construct() {
$this->ci = &get_instance();
}

function isAdmin() {
if ($this->ci->session->userdata('level') == '0') {
return TRUE;
} else {
return FALSE;
}
}

function isInputer() {
if ($this->ci->session->userdata('level') == '1') {
return TRUE;
} else {
return FALSE;
}
}

function isAdminPembiayaan() {
if ($this->ci->session->userdata('level') == '2') {
return TRUE;
} else {
return FALSE;
}
}

function isAnalis() {
if ($this->ci->session->userdata('level') == '3') {
return TRUE;
} else {
return FALSE;
}
}

function isApproval() {
if ($this->ci->session->userdata('level') == '4') {
return TRUE;
} else {
return FALSE;
}
}
function isRfo() {
if ($this->ci->session->userdata('level') == '5') {
return TRUE;
} else {
return FALSE;
}
}

function isRisk() {
if ($this->ci->session->userdata('level') == '6') {
return TRUE;
} else {
return FALSE;
}
}

function isAdminPusat() {
if ($this->ci->session->userdata('level') == '7') {
return TRUE;
} else {
return FALSE;
}
}

function checkAdmin() {
if (($this->isAdmin()) != TRUE) {
$this->ci->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses sebagai admin');
            $this->ci->session->unset_userdata('logged_in');
            $this->ci->session->unset_userdata('username');
		   $this->ci->session->unset_userdata('no_account');
            $this->ci->session->unset_userdata('nama_lengkap');
           $this->ci->session->unset_userdata('level');
           $this->ci->session->unset_userdata('status');
           $this->ci->session->unset_userdata('cabang');
           $this->ci->session->unset_userdata('nama');
  	     	$this->ci->session->sess_destroy();
          header('location:'.base_url().'index.php');
}
}

function checkInputer() {
if (($this->isAdmin() or $this->isInputer()) != TRUE) {
 $this->ci->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses sebagai admin');
            $this->ci->session->unset_userdata('logged_in');
            $this->ci->session->unset_userdata('username');
		   $this->ci->session->unset_userdata('no_account');
            $this->ci->session->unset_userdata('nama_lengkap');
           $this->ci->session->unset_userdata('level');
           $this->ci->session->unset_userdata('status');
           $this->ci->session->unset_userdata('cabang');
           $this->ci->session->unset_userdata('nama');
  	     	$this->ci->session->sess_destroy();
          header('location:'.base_url().'index.php');

}
}

function checkAdminPembiayaan() {
if (($this->isAdmin() && isAdminPembiayaan) != TRUE) {
$this->ci->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses sebagai admin');
            $this->ci->session->unset_userdata('logged_in');
            $this->ci->session->unset_userdata('username');
		   $this->ci->session->unset_userdata('no_account');
            $this->ci->session->unset_userdata('nama_lengkap');
           $this->ci->session->unset_userdata('level');
           $this->ci->session->unset_userdata('status');
           $this->ci->session->unset_userdata('cabang');
           $this->ci->session->unset_userdata('nama');
  	     	$this->ci->session->sess_destroy();
          header('location:'.base_url().'index.php');
}
}

function checkAnalis() {
if (($this->isAdmin() && $this->isAnalis()) != TRUE) {
$this->ci->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses sebagai admin');
            $this->ci->session->unset_userdata('logged_in');
            $this->ci->session->unset_userdata('username');
		   $this->ci->session->unset_userdata('no_account');
            $this->ci->session->unset_userdata('nama_lengkap');
           $this->ci->session->unset_userdata('level');
           $this->ci->session->unset_userdata('status');
           $this->ci->session->unset_userdata('cabang');
           $this->ci->session->unset_userdata('nama');
  	     	$this->ci->session->sess_destroy();
          header('location:'.base_url().'index.php');
}
}

function checkApproval() {
if (($this->isAdmin() && $this->isApproval()) != TRUE) {
$this->ci->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses sebagai admin');
            $this->ci->session->unset_userdata('logged_in');
            $this->ci->session->unset_userdata('username');
		   $this->ci->session->unset_userdata('no_account');
            $this->ci->session->unset_userdata('nama_lengkap');
           $this->ci->session->unset_userdata('level');
           $this->ci->session->unset_userdata('status');
           $this->ci->session->unset_userdata('cabang');
           $this->ci->session->unset_userdata('nama');
  	     	$this->ci->session->sess_destroy();
          header('location:'.base_url().'index.php');
}
}

function checkRfo() {
if (($this->isAdmin() && $this->isRfo()) != TRUE) {
$this->ci->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses sebagai admin');
            $this->ci->session->unset_userdata('logged_in');
            $this->ci->session->unset_userdata('username');
		   $this->ci->session->unset_userdata('no_account');
            $this->ci->session->unset_userdata('nama_lengkap');
           $this->ci->session->unset_userdata('level');
           $this->ci->session->unset_userdata('status');
           $this->ci->session->unset_userdata('cabang');
           $this->ci->session->unset_userdata('nama');
  	     	$this->ci->session->sess_destroy();
          header('location:'.base_url().'index.php');
}
}

function checkAdminPusat() {
if (($this->isAdmin() && $this->isAdminPusat()) != TRUE) {
$this->ci->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses sebagai admin');
            $this->ci->session->unset_userdata('logged_in');
            $this->ci->session->unset_userdata('username');
		   $this->ci->session->unset_userdata('no_account');
            $this->ci->session->unset_userdata('nama_lengkap');
           $this->ci->session->unset_userdata('level');
           $this->ci->session->unset_userdata('status');
           $this->ci->session->unset_userdata('cabang');
           $this->ci->session->unset_userdata('nama');
  	     	$this->ci->session->sess_destroy();
          header('location:'.base_url().'index.php');
}
}

function checkRisk() {
if (($this->isAdmin() && $this->isRisk()) != TRUE) {
$this->ci->session->set_flashdata('error', 'Maaf, Anda tidak memiliki hak akses sebagai admin');
            $this->ci->session->unset_userdata('logged_in');
            $this->ci->session->unset_userdata('username');
		   $this->ci->session->unset_userdata('no_account');
            $this->ci->session->unset_userdata('nama_lengkap');
           $this->ci->session->unset_userdata('level');
           $this->ci->session->unset_userdata('status');
           $this->ci->session->unset_userdata('cabang');
           $this->ci->session->unset_userdata('nama');
  	     	$this->ci->session->sess_destroy();
          header('location:'.base_url().'index.php');
}
}
}

?>