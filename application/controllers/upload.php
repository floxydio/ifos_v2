<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Upload extends CI_Controller{

 private $pemisah = '*'; //pemisah antara nama file
 public function __construct(){
   parent::__construct();
    $this->load->library('upload');
    $this->load->helper(array('form', 'url'));
   $this->load->model('m_upload');
    $this->load->library('form_validation');
    $this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    $this->output->set_header('Cache-Control: post-checked=0, pre-check=0',false);
    $this->output->set_header('Pragma: no-cache');

 }

 public function index(){
   $this->load->view('cekdokumen/form');
 }


 public function proses_upload(){
        $folder = $this->config->item('folderdata');
        $config = array(
            'upload_path'   => $folder,
            'allowed_types' => 'jpg|jpeg|png|pdf|JPG|JPEG',
            'max_size'      => '307200'


        );
          $account=$this->session->userdata('username');
          $noaplikasi = $this->input->post('no_aplikasi');
            $jumlah = $this->input->post('jumlah');
       $this->upload->initialize($config);
       for($i=1;$i<=$jumlah;$i++){
         if((isset($_FILES['userfile'.$i]))){

        if (!$this->upload->do_upload('userfile'.$i)) {
            $error = array('error' => $this->upload->display_errors());
       $data_ary = array(
                "no_aplikasi"      => $_POST['no_aplikasi']
                ,"id_dokumen"       => $_POST['dokumen'.$i]
                ,"ket"              => $_POST['ket'.$i]

            );

            $this->db->insert('upload', $data_ary);
        } else {
            $data = array('upload_data' => $this->upload->data());
         //   $data_ary = array(
         //       'no_aplikasi' => $this->input->post('no_aplikasi'),
          //      'title'     => $this->input->post('title'),
          //      'file'      => $upload_data['file_name'],
          //      'size'      => $upload_data['file_size'],

          //  );
               $data_ary = array(
                'namaFile'           => $data['upload_data']['file_name']
                ,"no_aplikasi"      => $_POST['no_aplikasi']
                ,"id_dokumen"       => $_POST['dokumen'.$i]
                ,"ket"              => $_POST['ket'.$i]

            );

            $this->db->insert('upload', $data_ary);

     //       $this->db->insert('tb_upload', $data_ary);
    //        redirect('detail/updatedokumen/'.$this->input->post('no_aplikasi'));
        }
       }

      }
          	$aplikasi=$this->input->post('no_aplikasi');
             $this->app_model->cariHistori($aplikasi,"11",$account);
     $this->app_model->cariTahapan($aplikasi,"2","approval_doc","pic_sid",$account,"konfirmasi_sid","1");
    
       redirect('cekdokumen/');

 }

  public function do_upload() {
         $folderjaminan = $this->config->item('folderjaminan');
        $config = array(
            'upload_path'   => $folderjaminan,
            'allowed_types' => 'jpg|jpeg|png|pdf|JPG|JPEG',
            'max_size'      => '307200'


        );

          $noaplikasi = $this->input->post('no_aplikasi');
       $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {

            $error = array('error' => $this->upload->display_errors());


        } else {
            $upload_data = $this->upload->data();
            $data_ary = array(
                'no_aplikasi' => $this->input->post('no_aplikasi'),
                'title'     => $this->input->post('title'),
                'file'      => $upload_data['file_name'],
                'size'      => $upload_data['file_size'],

            );

            $this->db->insert('tb_upload', $data_ary);
      
        }
    }

     public function do_uploadtextfile() {
          $folderjaminan = $this->config->item('folderjaminan');
          $nmfile = "file";
        $config = array(
             'upload_path'   =>  $folderjaminan,
            'allowed_types' => 'jpg|jpeg|pdf|JPG|JPEG|txt',
            'max_size'      => '30720',
            'file_name'     =>  $nmfile


        );

          $noaplikasi = $this->input->post('no_aplikasi');
       $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
             redirect('verifikasi/updatedokumen/'.$this->input->post('no_aplikasi'));
        } else {
            $upload_data = $this->upload->data();
            $data_ary = array(
                'no_aplikasi' => $this->input->post('no_aplikasi'),
                'title'     => '1',
                'file'      => $upload_data['file_name'],
                'size'      => $upload_data['file_size'],

            );

            $this->db->insert('tb_upload', $data_ary);

                   $string = file_get_contents($upload_data['full_path']);
        $rows  = explode("\n", $string);

          foreach($rows as $data){
           $row_data = explode('|', $data);
           $json[]=array("id"=>$row_data[0],"nip"=>$row_data[1],"ket"=>$row_data[2]);
        }
        $dat = json_encode($json);
        $js = json_decode($dat);
        foreach($js as $dll){
        $d['nip']=$dll->nip;
        $d['ket']=$dll->ket;
             $this->db->insert('tb_lulus',$d);

        }
                   $this->session->set_flashdata("pesan", "<font color=\"blue\">Upload gambar berhasil !!</font>");
          redirect('textfile');
        }
    }

      public function do_uploadprofil() {
         $pass=$this->input->post('ubah_password');

        $config = array(
            'upload_path'   => './foto/',
            'allowed_types' => 'jpg|jpeg|png|pdf|JPG|JPEG',
            'max_size'      => '2048',
            'max_width'     => '1024',
            'max_height'    => '1000'

        );

                    $mm['username'] = $this->input->post('username');
 $this->upload->initialize($config);
        if (!$this->upload->do_upload()) {

          } else {
            $upload_data = $this->upload->data();

                  $data_ary = array(
                  'foto'      => $upload_data['file_name']


            );

                  		$this->app_model->updateData("users",$data_ary,$mm);
                      redirect('home');
         }

    }

     public function do_uploaddok() {
        $folder = $this->config->item('folderdata');
        $config = array(
            'upload_path'   => $folder,
            'allowed_types' => 'jpg|jpeg|png|pdf|JPG|JPEG',
            'max_size'      => '307200'


        );

          $noaplikasi = $this->input->post('no_aplikasi');
            $d['id'] = $this->input->post('id_dok');
       $this->upload->initialize($config);

        if (!$this->upload->do_upload('namafile')) {
            $error = array('error' => $this->upload->display_errors());
             $data_ary = array(
                'no_aplikasi' => $this->input->post('no_aplikasi'),
                  'ada'      => $this->input->post('ada'),
                 'ket'     => $this->input->post('ket'),
              );

          	$this->app_model->updateData("upload",$data_ary,$d);
             redirect('detail/updatedokumen/'.$this->input->post('no_aplikasi'));
        } else {
            $upload_data = $this->upload->data();
            $d['id'] = $this->input->post('id_dok');
            $data_ary = array(
                'no_aplikasi' => $this->input->post('no_aplikasi'),
                'namaFile'      => $upload_data['file_name'],
                  'ada'      => $this->input->post('ada'),
                 'ket'     => $this->input->post('ket'),


            );

          	$this->app_model->updateData("upload",$data_ary,$d);
			   redirect('detail/updatedokumen/'.$this->input->post('no_aplikasi'));
        }
    }

      public function do_uploaddok1() {
         $folderjaminan = $this->config->item('folderdata');
        $config = array(
            'upload_path'   => $folderjaminan,
            'allowed_types' => 'jpg|jpeg|png|pdf|JPG|JPEG',
            'max_size'      => '307200'


        );

          $noaplikasi = $this->input->post('no_aplikasi');
       $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {

            $error = array('error' => $this->upload->display_errors());


        } else {
             $d['id'] = $this->input->post('no_aplikasi');
            $upload_data = $this->upload->data();
            $data_ary = array(
                 'namaFile'      => $upload_data['file_name'],
                 'ada'      => $this->input->post('ada'),
                 'ket'     => $this->input->post('ket'),

            );

         	$this->app_model->updateData("upload",$data_ary,$d);

        }
    }
     public function do_uploadverifikasi() {
          $folderjaminan = $this->config->item('folderjaminan');
        $config = array(
            'upload_path'   =>  $folderjaminan,
            'allowed_types' => 'jpg|jpeg|pdf|JPG|JPEG',
            'max_size'      => '30720'


        );

          $noaplikasi = $this->input->post('no_aplikasi');
       $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
             redirect('verifikasi/updatedokumen/'.$this->input->post('no_aplikasi'));
        } else {
            $upload_data = $this->upload->data();
            $data_ary = array(
                'no_aplikasi' => $this->input->post('no_aplikasi'),
                'title'     => $this->input->post('title'),
                'file'      => $upload_data['file_name'],
                'size'      => $upload_data['file_size'],

            );

            $this->db->insert('tb_upload', $data_ary);
            redirect('verifikasi/updatedokumen/'.$this->input->post('no_aplikasi'));
        }
    }

}