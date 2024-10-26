<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class viewstatus extends CI_Controller {

   	public function __construct()
	{
		parent::__construct();
		$this->load->model('customers_model','customers');
	}

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
		      $nm_account=$this->session->userdata('username');
               $cabang=$this->session->userdata('cabang');
			/*
			$cari = $this->input->post('no_rek');
			if(empty($cari)){
				$where = " WHERE no_rek='xxx' ";
				$d['judul']="Buku Besar";
			}else{
				$where = " WHERE no_rek='$cari'";
				$nama_rek = $this->app_model->CariNamaRek($cari);
				$d['judul']="Buku Besar No.Rek ".$cari." - ".$nama_rek;
			}
			*/
			$d['judul']="Status Aplikasi";
			
			$d['prg']= $this->config->item('prg');
			$d['web_prg']= $this->config->item('web_prg');
			
			$d['nama_program']= $this->config->item('nama_program');
			$d['instansi']= $this->config->item('instansi');
			$d['usaha']= $this->config->item('usaha');
			$d['alamat_instansi']= $this->config->item('alamat_instansi');

               $d['moduls'] = $this->app_model->get_moduls();
             $d['menus'] = $this->app_model->get_menus();
             	$nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
			$d['listname'] = $this->app_model->manualQuery($nn);
                 	$ww = "SELECT * FROM tb_cabang ";
			$d['listcabangbsm'] = $this->app_model->manualQuery($ww);
                 	$rr = "SELECT * FROM tb_jabpegawai ";
			$d['listjabatanbsm'] = $this->app_model->manualQuery($rr);


              $cabang = "SELECT * FROM tb_cabang";
			$d['listcabang'] = $this->app_model->manualQuery($cabang);


		 $this->template->display('viewstatus/view',$d);
		}else{
			header('location:'.base_url());
		}
	}

    	public function ajax_list()
	{
	    	$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
		      $nm_account=$this->session->userdata('username');
               $cabang=$this->session->userdata('cabang');
		$list = $this->customers->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $customers) {
		     $customers->detail = " <a href='javascript:tampil_data(\"{$customers->no_aplikasi}\")' class='btn btn-xs btn-warning'><i class='glyphicon glyphicon-edit' title='Detail'></i></a>";
            
            $tahapan=str_replace('%20',' ',$customers->tahapan);
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $customers->no_aplikasi;
			$row[] = $customers->nm_lengkap;
            $row[] = $customers->kd_cabang;
            $row[] = $customers->plafon;
              $row[] = $tahapan;  
            $row[] = $customers->detail;

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->customers->count_all(),
						"recordsFiltered" => $this->customers->count_filtered(),
						"data" => $data,
				);
		//output to json format
    	echo json_encode($output);
        	}else{
			header('location:'.base_url());
		}
	}

      public function loadData(){
               $nm_account=$this->session->userdata('username');
               $cabang=$this->session->userdata('cabang');

               	$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){


    $page = isset($_GET['page'])?$_GET['page']:1;
    $limit = isset($_GET['rows'])?$_GET['rows']:10;
    $sidx = isset($_GET['sidx'])?$_GET['sidx']:'id_pembiayaan';
    $sord = isset($_GET['sord'])?$_GET['sord']:'ASC';
       $aplikasi = isset($_GET['noaplikasi'])?$_GET['noaplikasi']:false;
        $nmnasabah = isset($_GET['nmnasabah'])?$_GET['nmnasabah']:false;


     $start = $limit*$page - $limit;
    $start = ($start<0)?0:$start;

  $where ="tb_pembiayaan.no_aplikasi like '%$aplikasi%' and tb_pembiayaan.nm_lengkap like '%$nmnasabah%'";
   $searchNoaplikasi = isset($_GET['no_aplikasi']) ? $_GET['no_aplikasi']: false;
     $searchCabang = isset($_GET['nm_cabang']) ? $_GET['nm_cabang']: false;
       $searchNama = isset($_GET['nm_lengkap']) ? $_GET['nm_lengkap']: false;
          $searchLahir = isset($_GET['tanggal_lahir']) ? $_GET['tanggal_lahir']: false;
             $searchPlafon = isset($_GET['plafon']) ? $_GET['plafon']: false;
             $searchProgram = isset($_GET['kd_program']) ? $_GET['kd_program']: false;
             $searchJw = isset($_GET['jangka_waktu']) ? $_GET['jangka_waktu']: false;
             $searchMargin = isset($_GET['margin']) ? $_GET['margin']: false;
             $searchTahapan = isset($_GET['tahapan']) ? $_GET['tahapan']: false;




    $searchString = isset($_GET['searchString']) ? $_GET['searchString'] : false;

    if ($_GET['_search'] == 'true') {


        if(!empty($searchNoaplikasi)) {

          $searchString.="tb_pembiayaan.no_aplikasi like '%$searchNoaplikasi%'";
          }
       if(!empty($searchCabang)) {
          if(empty($searchString)){
            $searchString.="tb_cabang.nm_cabang like '%$searchCabang%'";
            }else{
                 $searchString.="AND tb_cabang.nm_cabang like '%$searchCabang%'";

            }
          }
          if(!empty($searchNama)) {
          if(empty($searchString)){
            $searchString.="tb_pembiayaan.nm_lengkap like '%$searchNama%'";
            }else{
                 $searchString.="AND tb_pembiayaan.nm_lengkap like '%$searchNama%'";

            }
           }
            if(!empty($searchLahir)) {
          if(empty($searchString)){
            $searchString.="tb_pembiayaan.tanggal_lahir like '%$searchLahir%'";
            }else{
                 $searchString.="AND tb_pembiayaan.tanggal_lahir like '%$searchLahir%'";

            }
           }

           if(!empty($searchPlafon)) {
          if(empty($searchString)){
            $searchString.="tb_pembiayaan.plafon like '%$searchPlafon%'";
            }else{
                 $searchString.="AND tb_pembiayaan.plafon like '%$searchPlafon%'";

            }
           }

             if(!empty($searchProgram)) {
          if(empty($searchString)){
            $searchString.="tb_pembiayaan.kd_program like '%$searchProgram%'";
            }else{
                 $searchString.="AND tb_pembiayaan.kd_program like '%$searchProgram%'";

            }
           }

             if(!empty($searchJw)) {
          if(empty($searchString)){
            $searchString.="tb_pembiayaan.jangka_waktu like '%$searchJw%'";
            }else{
                 $searchString.="AND tb_pembiayaan.jangka_waktu like '%$searchJw%'";

            }
           }

             if(!empty($searchMargin)) {
          if(empty($searchString)){
            $searchString.="tb_pembiayaan.margin like '%$searchMargin%'";
            }else{
                 $searchString.="AND tb_pembiayaan.margin like '%$searchMargin%'";

            }
           }

             if(!empty($searchTahapan)) {
          if(empty($searchString)){
            $searchString.="tb_pembiayaan.tahapan like '%$searchTahapan%'";
            }else{
                 $searchString.="AND tb_pembiayaan.tahapan like '%$searchTahapan%'";

            }
           }

        $where = "$searchString";
        }

    if(!$sidx)
        $sidx =1;
    $count = $this->db->count_all_results('tb_pembiayaan');
    if( $count > 0 ) {
        $total_pages = ceil($count/$limit);
    } else {
        $total_pages = 0;
    }

    if ($page > $total_pages)
        $page=$total_pages;
    $query = $this->app_model->getAllpembiayaanmikro($start,$limit,$sidx,$sord,$where);
    $responce->page = $page;
    $responce->total = $total_pages;
    $responce->records = $count;
    $i=0;
    foreach($query as $row) {
           $pic=$row->tahapan;
           	switch ($pic){
			case "Cek Dokumen":
              $row->pic_m = $this->app_model->CariNama($row->pic_mikro);
			break;
            case "Cek SID Duplikasi":
              $row->pic_m = $this->app_model->CariNama($row->pic_sid);
			break;
            case "Data Entry":
              $row->pic_m = $this->app_model->CariNama($row->pic_dataentry);
			break;
            case "Verifikasi Data":
              $row->pic_m = $this->app_model->CariNama($row->pic_verifikasi);
			break;
            case "Analisa Data":
              $row->pic_m = $this->app_model->CariNama($row->pic_persetujuan);
			break;
            case "Approval":
              $row->pic_m = $this->app_model->CariNama($row->pic_pemutus);
			break;
             case "SP3 Pembiayaan":
              $row->pic_m = $this->app_model->CariNama($row->pic_sp3);
			break;
             case "Akad Pembiayaan":
              $row->pic_m = $this->app_model->CariNama($row->pic_akad);
			break;
             case "Pencairan":
              $row->pic_m = $this->app_model->CariNama($row->pic_cair);
			break;
            }

         $responce->rows[$i]['id']=$row->id_pembiayaan;
          $responce->rows[$i]['cell']=array($row->no_aplikasi,$row->nm_cabang,$row->nm_lengkap,$row->tanggal_lahir,$row->plafon,$row->kd_program,$row->jangka_waktu,$row->margin,$row->tahapan,$row->pic_m,$row->ket,$row->ket_tolak);
      $i++;
    }
        echo json_encode($responce);
    	}else{
			header('location:'.base_url());
		}
}

        	function tambahdata($idd)
	{

		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

          $d['title']="Pembiayaan";
           $d['tes']="ok";
           	$ll = "SELECT * FROM tb_channel";
			$d['list'] = $this->app_model->manualQuery($ll);
                        $cabang ="select * from tb_cabang where kd_cabang not like '%S%' and kd_cabang not like '%a%'";
			$d['listcabang'] = $this->app_model->manualQuery($cabang);
              $jns_pembiayaan = "SELECT * FROM tb_jnskegunaan";
		   $d['listjenis'] = $this->app_model->manualQuery($jns_pembiayaan);



               $guna = "SELECT * FROM tb_penggunaan";
			$d['listguna'] = $this->app_model->manualQuery($guna);

               $biaya = "SELECT * FROM tb_pembiayaan where no_aplikasi='$idd'";
			$d['listbiaya'] = $this->app_model->manualQuery($biaya);

                  		$d['biayadata'] = $this->app_model->CariAll($idd,'tb_pembiayaan','no_aplikasi');


               $tipemargin = "SELECT * FROM tb_tipemargin";
			$d['listmargin'] = $this->app_model->manualQuery($tipemargin);
               $outlet = "SELECT * FROM tb_outlet1";
			$d['listoutlet'] = $this->app_model->manualQuery($outlet);

            $nikah = "SELECT * FROM tb_nikah";
              $d['listnikah'] = $this->app_model->manualQuery($nikah);

               $jns = "SELECT * FROM tb_jnspekerjaan where id_jnspekerjaan !='11'";
			$d['listjns'] = $this->app_model->manualQuery($jns);

              $skim = "SELECT * FROM tb_skim";
			$d['listskim'] = $this->app_model->manualQuery($skim);
            $d['no_aplikasi'] = $this->app_model->MaxNoAplikasi();
             $d['cekktp'] = $this->app_model->serviceaplikasiektp('3173080312860003','admin');

                $jnspermohonan = "SELECT * FROM tb_jnspermohonan";
			$d['listjnspermohonan'] = $this->app_model->manualQuery($jnspermohonan);
		 $this->load->view('viewstatus/view_data',$d);

			//echo $text;
		}else{
			header('location:'.base_url());
		}
	}


	public function view_data()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

			$no_aplikasi = $this->input->post('no_aplikasi');
           	$nm_nasabah = $this->input->post('nm_nasabah');
             	$kd_buk = $this->input->post('kd_buk');

              	$where="";
             	if(!empty($no_aplikasi)){
			$where= " AND tb_pembiayaan.no_aplikasi like '%$no_aplikasi%'";
           }

			else if(!empty($nm_nasabah)){
		  	$where=" AND nm_lengkap like '%$nm_nasabah%'";
		  }

          	else if(!empty($kd_buk)){
		  	$where=" AND kd_cabang ='$kd_buk'";
		  }


			$text = "SELECT * FROM tb_pembiayaan,tb_cabang where tb_pembiayaan.kd_cab = tb_cabang.kd_cabang $where";
			$d['data'] = $this->app_model->manualQuery($text);

			$this->load->view('viewstatus/view_data',$d);

		}else{
			header('location:'.base_url());
		}
	}



}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */