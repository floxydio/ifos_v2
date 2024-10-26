<?php
class Dashboard extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model(array('m_petugas'));
        $this->load->library(array('form_validation','template'));
        $this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    $this->output->set_header('Cache-Control: post-checked=0, pre-check=0',false);
    $this->output->set_header('Pragma: no-cache');
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index(){
                $cabang=$this->session->userdata('cabang');
       $cek = $this->session->userdata('logged_in');
         $level = $this->session->userdata('level');
        if(!empty($cek)){
        $data['title']="Arwics Aplikasi Pembiayaan";
        $data['moduls'] = $this->m_menu->get_moduls();
         $data['menus'] = $this->m_menu->get_menus();
        $data['nama_program']= $this->config->item('nama_program');
         $data['hitung_user'] = $this->app_model->jml_user('users');
        $data['hitung_pembiayaan'] = $this->app_model->jml_user('tb_pembiayaan');
        $data['hitung_batal'] = $this->app_model->jml_rejected('Rejected');
         $this->template->display('dashboard/index',$data);
            }else{
             	header('location:'.base_url());
        }

    }


    function petugas(){
        $data['title']="Data Petugas";
        $data['petugas']=$this->m_petugas->semua()->result();
        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message']='';
        $this->template->display('dashboard/petugas',$data);
    }
    
    function tambahpetugas(){
        $data['title']="Tambah Petugas";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $user=$this->input->post('user');
            $cek=$this->m_petugas->cekKode($user);
            if($cek->num_rows()>0){
                $data['message']="<div class='alert alert-danger'>Username sudah digunakan</div>";
                $this->template->display('dashboard/tambahpetugas',$data);
            }else{
                $info=array(
                    'user'=>$this->input->post('user'),
                    'password'=>md5($this->input->post('password'))
                );
                $this->m_petugas->simpan($info);
                redirect('dashboard/petugas/add_success');
            }
        }else{
            $data['message']="";
            $this->template->display('dashboard/tambahpetugas',$data);
        }
    }
    
    function edit($id){
        $data['title']="Update data Petugas";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $id=$this->input->post('id');
            $info=array(
                'user'=>$this->input->post('user'),
                'password'=>md5($this->input->post('password'))
            );
            $this->m_petugas->update($id,$info);
            $data['petugas']=$this->m_petugas->cekId($id)->row_array();
            $data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $this->template->display('dashboard/editpetugas',$data);
        }else{
            $data['message']="";
            $data['petugas']=$this->m_petugas->cekId($id)->row_array();
            $this->template->display('dashboard/editpetugas',$data);
        }
    }
    
    function hapus(){
        $kode=$this->input->post('kode');
        $this->m_petugas->hapus($kode);
    }
    
    function _set_rules(){
        $this->form_validation->set_rules('user','username','required|trim');
        $this->form_validation->set_rules('password','password','required|trim');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
    
    function logout(){
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        redirect('web','refresh');
    }
}