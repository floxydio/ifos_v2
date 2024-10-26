<?php
class Mnj_user extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    $this->output->set_header('Cache-Control: post-checked=0, pre-check=0',false);
    $this->output->set_header('Pragma: no-cache');

    }

   	function index()
	{
               $cabang=$this->session->userdata('cabang');
	   $cek = $this->session->userdata('logged_in');
         $level = $this->session->userdata('level');
		if(!empty($cek)){
                 $nm_account=$this->session->userdata('username');
               $cabang=$this->session->userdata('cabang');

            $d['moduls'] = $this->app_model->get_moduls();
                $d['menus'] = $this->app_model->get_menus();
                        	$nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
			$d['listname'] = $this->app_model->manualQuery($nn);
                 	$ww = "SELECT * FROM tb_cabang ";
			$d['listcabangbsm'] = $this->app_model->manualQuery($ww);
                 	$rr = "SELECT * FROM tb_jabpegawai ";
			$d['listjabatanbsm'] = $this->app_model->manualQuery($rr);

		     $d['title']=$this->config->item('title');

               $detail = "SELECT * FROM tb_jns_detail";
			$d['listdetail'] = $this->app_model->manualQuery($detail);

              $jnspermohonan = "SELECT * FROM tb_jnspermohonan";
			$d['listjnspermohonan'] = $this->app_model->manualQuery($jnspermohonan);
            $jns = "SELECT * FROM tb_jnspekerjaan where id_jnspekerjaan !='11'";
			$d['listjns'] = $this->app_model->manualQuery($jns);




       		     $this->template->display('mnj_user/view',$d);
		}else{
		     	header('location:'.base_url());
		}
	}

   public function loadData(){
               $nm_account=$this->session->userdata('username');
               $cabang=$this->session->userdata('cabang');

               	$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

         $d['moduls'] = $this->app_model->get_moduls();
            $d['menus'] = $this->app_model->get_menus();

			$d['prg']= $this->config->item('prg');
			$d['web_prg']= $this->config->item('web_prg');

			$d['nama_program']= $this->config->item('nama_program');
			$d['instansi']= $this->config->item('instansi');
			$d['usaha']= $this->config->item('usaha');
			$d['alamat_instansi']= $this->config->item('alamat_instansi');
                            	$nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
			$d['listname'] = $this->app_model->manualQuery($nn);
                 	$ww = "SELECT * FROM tb_cabang ";
			$d['listcabangbsm'] = $this->app_model->manualQuery($ww);
                 	$rr = "SELECT * FROM tb_jabpegawai ";
			$d['listjabatanbsm'] = $this->app_model->manualQuery($rr);

    $page = isset($_GET['page'])?$_GET['page']:1;
    $limit = isset($_GET['rows'])?$_GET['rows']:10;
    $sidx = isset($_GET['sidx'])?$_GET['sidx']:'username';
    $sord = isset($_GET['sord'])?$_GET['sord']:'';
       $aplikasi = isset($_GET['no_aplikasi'])?$_GET['no_aplikasi']:'';


     $start = $limit*$page - $limit;
    $start = ($start<0)?0:$start;

  $where ="";
   $searchName = isset($_GET['username']) ? $_GET['username']: false;
     $searchLengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap']: false;
       $searchCabang = isset($_GET['nm_cabang']) ? $_GET['nm_cabang']: false;
          $searchNIP = isset($_GET['no_account']) ? $_GET['no_account']: false;
             $searchlevel = isset($_GET['level']) ? $_GET['level']: false;
             $searchJabatan = isset($_GET['jabatan']) ? $_GET['jabatan']: false;


    $searchString = isset($_GET['searchString']) ? $_GET['searchString'] : false;

    if ($_GET['_search'] == 'true') {


        if(!empty($searchName)) {

          $searchString.="username like '%$searchName%'";
          }
       if(!empty($searchNIP)) {
          if(empty($searchString)){
            $searchString.="no_account like '%$searchNIP%'";
            }else{
                 $searchString.="AND no_account like '%$searchNIP%'";

            }
          }
          if(!empty($searchLengkap)) {
          if(empty($searchString)){
            $searchString.="nama_lengkap like '%$searchLengkap%'";
            }else{
                 $searchString.="AND nama_lengkap like '%$searchLengkap%'";

            }
           }
            if(!empty($searchCabang)) {
          if(empty($searchString)){
            $searchString.="nm_cabang like '%$searchCabang%'";
            }else{
                 $searchString.="AND nm_cabang like '%$searchCabang%'";

            }
           }


        $where = "$searchString";
        }

    if(!$sidx)
        $sidx =1;
    $count = $this->db->count_all_results('users');
    if( $count > 0 ) {
        $total_pages = ceil($count/$limit);
    } else {
        $total_pages = 0;
    }

    if ($page > $total_pages)
        $page=$total_pages;
    $query = $this->app_model->getAllUser($start,$limit,$sidx,$sord,$where);
    $responce->page = $page;
    $responce->total = $total_pages;
    $responce->records = $count;
    $i=0;
    foreach($query as $row) {
           $row->level = $this->app_model->CariLevelUser($row->level);
            $row->status = $this->app_model->CariStatus($row->status);
          $row->jabatan = $this->app_model->CariJabatan($row->id_jabatanpeg);
                   $row->detail = " <a href='javascript:tampil_data(\"{$row->username}\")' class='btn btn-xs btn-warning'><i class='glyphicon glyphicon-edit' title='EDIT'></i></a> <a href='javascript:hapusData(\"{$row->username}\")' class='btn btn-xs btn-danger'><i class='glyphicon glyphicon-trash' title='Hapus'></i></a>";

         $responce->rows[$i]['id']=$row->username;
        $responce->rows[$i]['cell']=array($row->username,$row->nama_lengkap,$row->nm_cabang,$row->level,$row->jabatan,$row->status,$row->detail);
        $i++;
    }
        echo json_encode($responce);
		$this->app_model->Myclose();
    	}else{
			header('location:'.base_url());
		}
}

           	function tambahdata($idd)
	{

		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

          $d['title']="Managemen User";
           $d['tes']="ok";
           	$ll = "SELECT * FROM tb_channel";
			$d['list'] = $this->app_model->manualQuery($ll);
                        $cabang ="select * from tb_cabang where kd_cabang not like '%S%' and kd_cabang not like '%a%'";
			$d['listcabang'] = $this->app_model->manualQuery($cabang);
              $jns_pembiayaan = "SELECT * FROM tb_jnskegunaan";
		   $d['listjenis'] = $this->app_model->manualQuery($jns_pembiayaan);




               $biaya = "SELECT * FROM users where username='".$idd."'";
			$d['listbiaya'] = $this->app_model->manualQuery($biaya);

            	$d['biayadata'] = $this->app_model->CariUser($idd);
                                	$nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
			$d['listname'] = $this->app_model->manualQuery($nn);
                 	$ww = "SELECT * FROM tb_cabang ";
			$d['listcabangbsm'] = $this->app_model->manualQuery($ww);
                 	$rr = "SELECT * FROM tb_jabpegawai ";
			$d['listjabatanbsm'] = $this->app_model->manualQuery($rr);
            	$text = "SELECT * FROM tb_upliner WHERE userid='$id'";
			$d['data'] = $this->app_model->manualQuery($text);

             $qcabang = "SELECT * FROM tb_cabang order by kd_cabang";
			$d['listcabang'] = $this->app_model->manualQuery($qcabang);

            //QUERY MENCARI LIMIT
            $qlevel = "SELECT * FROM tb_level";
			$d['listlevel'] = $this->app_model->manualQuery($qlevel);

             $qstatus = "SELECT * FROM tb_status order by id_status";
			$d['liststatus'] = $this->app_model->manualQuery($qstatus);

            //query mencari data jabatan pegawai
            $qjabatan = "SELECT * FROM tb_jabpegawai";
			$d['listjabatan'] = $this->app_model->manualQuery($qjabatan);

			//query mencari data Upliner
            $qupline = "SELECT * FROM users WHERE nama_lengkap!='' ORDER BY username";
			$d['listupline'] = $this->app_model->manualQuery($qupline);

                	$text = "SELECT * FROM users";
			$d['listusersss'] = $this->app_model->manualQuery($text);


                $d['no_aplikasi'] = $this->app_model->MaxNoAplikasi();

         $this->load->view('mnj_user/view_data',$d);

			//echo $text;
		}else{
			header('location:'.base_url());
		}
	}

       	public function Dulcapil($ktp,$idcsdulcapil)
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

            if($idcsdulcapil!=''){
		          $ket = $this->app_model->serviceaplikasiektp($ktp,$idcsdulcapil);
                  $nama = explode(' ',$ket['nm_lengkap']);

                  $jumlah=count($nama);
                   Switch($jumlah){
	               case  $jumlah == '1';
                   $d['nm_depan']=$nama[0];
                  break;
                  case  $jumlah == '2';
                   $d['nm_depan']=$nama[0];
                    $d['nm_belakang']=$nama[1];
                  break;
                   case  $jumlah == '3';
                   $d['nm_depan']=$nama[0];
                    $d['nm_tengah']=$nama[1];
                    $d['nm_belakang']=$nama[2];
                  break;
                 }

                 $d['ibu_kandung']=$ket['ibu_kandung'];
                $d['nm_lengkap']=$ket['nm_lengkap'];

                       }else{
                         $d['error']='Anda Belum Pegawai Tetap';
                       }
				 	echo json_encode($d);

		}else{
			header('location:'.base_url());
		}
	}

    	function setuju()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
		  	     	 $id = $this->input->post('setuju');
             $date=date('Y-m-d H:i:s');
			$this->app_model->manualQuery("Update tb_pembiayaan set approval='1', tgl_approval = NOW(), tgl_pemohon='$date',tahapan = 'Cheklist Dokumen Assignment' WHERE id_pembiayaan='$id'");
		}else{
			header('location:'.base_url());
		}
	}

    	function hapus()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
		  		   	 $id = $this->input->post('kode');
			$this->app_model->manualQuery("DELETE FROM users WHERE username='$id'");
  	}else{
			header('location:'.base_url());
		}
	}

    function cek_margin(){
        # ambil username dari form
       	$margin = $this->input->post('margin');
        	$kd_program = $this->input->post('kd_program');
        	$plafon = $this->input->post('plafon');
            $ubahplafon = str_replace(',','',$plafon);
             $prog2 = $kd_program;
                # select ke model member username yang diinput user
        $main = $this->app_model->RangeMargin($ubahplafon,$prog2,$margin);
        if($plafon=='NaN' or $plafon==''){
           echo "4";
         }else{
        if($ubahplafon>200000000){
            echo "3";
          }else{
             if(count($main)!=0){
       	foreach($main as $t){
			if($t->parameter_margin1 <= $margin or $t->parameter_margin2 <= $margin ){
            echo "1";
			}else{
             echo "2";
			}
			}
           }else{
            echo "0";
           }
         }
        }
      }

      	public function simpan()
	{

		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
           $this->output->cache(1);

               	$up['no_account']=$this->input->post('no_account');
				$up['nama_lengkap']=$this->input->post('nama_lengkap');
			    	$up['nm_cabang']=$this->input->post('nm_cabang');
                	$up['username']=$this->input->post('username');
					$up['level']=$this->input->post('level');
                    $up['id_jabatanpeg']=$this->input->post('id_jabatanpeg');
                	$up['status']=$this->input->post('status');
              $up['password'] = md5("tes");
                	$username=$this->input->post('username');
                    	$id['username']=$this->input->post('username'); 
				$data = $this->app_model->CariJumlahUser($username);
				if($data==1){
					$this->app_model->updateData("users",$up,$id);

				}else{
					$this->app_model->insertData("users",$up);

				}

		}else{
				header('location:'.base_url());
		}

    }
    

}
