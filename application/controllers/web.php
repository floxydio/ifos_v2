<?php
class Web extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model(array('m_buku','m_anggota','m_petugas'));
        if($this->session->userdata('username')){
            redirect('dashboard');
        }
        $this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    $this->output->set_header('Cache-Control: post-checked=0, pre-check=0',false);
    $this->output->set_header('Pragma: no-cache');
    }
    
    function index(){
        $d['nama_program']= $this->config->item('nama_program');
        $this->load->view('web/login',$d);
    }
    
    function cari_buku(){
        $cari=$this->input->post('cari');
        $data['hasil']=$this->m_buku->cari($cari)->result();
        $data['title']="Pencarian Buku";
        $this->load->view('web/cari_buku',$data);
    }
    
    function anggota(){
        $data['title']="Data Anggota";
        $data['anggota']=$this->m_anggota->semua()->result();
        $this->load->view('web/anggota',$data);
    }
    
    function cari_anggota(){
        $cari=$this->input->post('cari');
        $data['title']="Data Anggota";
        $data['anggota']=$this->m_anggota->cari($cari)->result();
        $this->load->view('web/anggota',$data);
    }
    
    function login3(){
        $this->load->view('web/login');
    }

    function proses(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required|trim|xss_clean');
        $this->form_validation->set_rules('password','password','required|trim|xss_clean');

        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','<font color="red">Username atau password Harus diisi</font>');
            redirect('web');
        }else{
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $cek=$this->m_petugas->cek($username,md5($password));
            if($cek->num_rows()>0){
                //login berhasil, buat session
              foreach($cek->result() as $qck)
			{

						$sess_data['logged_in'] = 'aingLoginAkuntansiYeuh';
						$sess_data['username'] = $qck->username;
                        $sess_data['no_account'] = $qck->no_account;
						$sess_data['nama_lengkap'] = $qck->nama_lengkap;
                        $sess_data['level'] = $qck->level;
                        $sess_data['foto'] = $qck->foto;
                        $sess_data['status'] = $qck->status;
                        $sess_data['cabang'] = $qck->nm_cabang;
                        $sess_data['nama'] = $qck->id_jabatanpeg;

						$this->session->set_userdata($sess_data);


			}
                redirect('dashboard');
                
            }else{
                //login gagal
                $this->session->set_flashdata('message','<font color="red">Username atau password salah</font>');
                redirect('web');
            }
        }
    }
}