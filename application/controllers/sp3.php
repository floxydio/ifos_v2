<?php
class Sp3 extends CI_Controller{

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




       		     $this->template->display('sp3/view',$d);
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
    $limit = isset($_GET['rows'])?$_GET['rows']:100;
    $sidx = isset($_GET['sidx'])?$_GET['sidx']:'id_pembiayaan';
    $sord = isset($_GET['sord'])?$_GET['sord']:'ASC';
          $start = $limit*$page - $limit;
    $start = ($start<0)?0:$start;

   $searchNoaplikasi = isset($_GET['no_aplikasi']) ? $_GET['no_aplikasi']: false;
     $searchCabang = isset($_GET['tempat_lahir']) ? $_GET['tempat_lahir']: false;
       $searchNama = isset($_GET['nm_lengkap']) ? $_GET['nm_lengkap']: false;
          $searchLahir = isset($_GET['tanggal_lahir']) ? $_GET['tanggal_lahir']: false;
             $searchPlafon = isset($_GET['plafon']) ? $_GET['plafon']: false;
             $searchProgram = isset($_GET['ibu_kandung']) ? $_GET['ibu_kandung']: false;
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
            $searchString.="tb_pembiayaan.tempat_lahir like '%$searchCabang%'";
            }else{
                 $searchString.="AND tb_pembiayaan.tempat_lahir like '%$searchCabang%'";

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
            $searchString.="tb_pembiayaan.ibu_kandung like '%$searchProgram%'";
            }else{
                 $searchString.="AND tb_pembiayaan.ibu_kandung like '%$searchJw%'";

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
        }else{
  $where ="approval=1 and approval_doc =1 and approval_data =1 and approval_verifikasi =1 and approval_persetujuan =1 and approval_setuju =1 and approval_sp3 =0 and konfirmasi=1 and konfirmasi_data=1 and konfirmasi_verifikasi=1 and konfirmasi_persetujuan=1 and konfirmasi_sp3=1 and pic_sp3 ='$nm_account'";
      }

    if(!$sidx)
        $sidx =1;
  $query = $this->app_model->getAllpembiayaan($start,$limit,$sidx,$sord,$where);
      $count = count($query);
    if( $count > 0 ) {
        $total_pages = ceil($count/$limit);
    } else {
        $total_pages = 0;
    }

    if ($page > $total_pages)
        $page=$total_pages;

    $responce->page = $page;
    $responce->total = $total_pages;
    $responce->records = $count;
    $i=0;
    foreach($query as $row) {
         $tgl1=  $row->tgl_approval;
              $tgl2 = date("Y-m-d h:i:s" );
                  	$hari = $this->app_model->datediff($tgl1,$tgl2);
                      $libur = $this->app_model->hitung_minggusabtu($tgl1,$tgl2);
                      $listhari= ($hari['days_total']-$libur);
     $row->durasi = "".$listhari." hari";
     $row->detaillink="sp3";
     $row->form="formsp3";

     $row->jkl="5";

           $row->detail = "  <a href='javascript:tampil_data(\"{$row->no_aplikasi}\",\"{$row->detaillink}\",\"{$row->form}\",\"{$row->jkl}\")' class='btn btn-xs btn-warning'><i class='glyphicon glyphicon-edit' title='Detail'>Detail</i></a>";


         $responce->rows[$i]['id']=$row->id_pembiayaan;
       $responce->rows[$i]['cell']=array($row->no_aplikasi,$row->nm_lengkap,$row->tempat_lahir,$row->tanggal_lahir,$row->ibu_kandung,$row->plafon,$row->no_account,$row->tgl_approval,$row->durasi,$row->detail);
       $i++;
    }
     $this->output->set_output(json_encode($responce));
    	}else{
			header('location:'.base_url());
		}
}

public function fetchDatafromDatabase()
	{
	              $nm_account=$this->session->userdata('username');
               $cabang=$this->session->userdata('cabang');

               	$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
		$resultList = $this->app_model->fetchAllData('no_aplikasi,nm_lengkap,kd_cab,plafon,ibu_kandung','tb_pembiayaan',array(),'1','1','1','1','1','1','1','0','0','0','1','1','1','1','1','1','0','0','pic_sp3',$nm_account);

		$result = array();
		$button = '';
		 $row->detaillink="sp3";
     $row->form="formsp3";

     $row->jkl="5";
		$i = 1;
		foreach ($resultList as $key => $value) {
              	$button = " <a href='javascript:tampil_data(\"{$value['no_aplikasi']}\",\"{$row->detaillink}\",\"{$row->form}\",\"{$row->jkl}\")' class='btn btn-xs btn-warning'><i class='glyphicon glyphicon-edit' title='Detail'>Detail</i></a>";


			$baru['data'][] = array(

				$value['no_aplikasi'],
               	$value['nm_lengkap'],
                $value['kd_cab'],
                 $value['ibu_kandung'],
                  $value['plafon'],
				$button
			);

		}
		echo json_encode($baru);

        	}else{
			header('location:'.base_url());
		}
	}

   public function updatesp3()
	{

		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

		//	   $induk = $this->input->post('rek_induk');

		//	if($induk!=0){
		//	 		$level = $this->app_model->CariLevel($induk);
		//	  		$up['induk']=$this->input->post('rek_induk');
		//	  		$up['level']=$level+1;
		//	 	}else{
		//	 		$up['induk']=0;
		 //	 		$up['level']=0;
		 //	 	}
                   $noaplikasi = $this->input->post('no_aplikasi');
                  $up['biaya_administrasi']=$this->input->post('biaya_administrasi');
                  $up['biaya_notaris']=$this->input->post('biaya_notaris');
                  $up['biaya_appraisal']=$this->input->post('biaya_appraisal');
                  $up['biaya_blokir']=$this->input->post('biaya_blokir');
                  $up['biaya_materai']=$this->input->post('biaya_materai');
                  $up['biaya_cadangan']=$this->input->post('biaya_cadangan');
                   $up['asuransi_jiwa']=$this->input->post('asuransi_jiwa');
                    $up['nilai_tanggungjiwa']=$this->input->post('nilai_tanggungjiwa');
                    $up['masa_tanggungjiwa']=$this->input->post('masa_tanggungjiwa');
                    $up['premijiwa']=$this->input->post('premijiwa');
                    $up['asuransi_jamin']=$this->input->post('asuransi_jamin');
                    $up['nilai_tanggungjamin']=$this->input->post('nilai_tanggungjamin');
                    $up['masa_tanggungjamin']=$this->input->post('masa_tanggungjamin');
                    $up['premijamin']=$this->input->post('premijamin');
                       $up['asuransi_bakar']=$this->input->post('asuransi_bakar');
                    $up['nilai_tanggungbakar']=$this->input->post('nilai_tanggungbakar');
                    $up['masa_tanggungbakar']=$this->input->post('masa_tanggungbakar');
                    $up['premibakar']=$this->input->post('premibakar');
                     $up['syarat_akad']=$this->input->post('syarat_akad');
                    $up['syarat_pencairan']=$this->input->post('syarat_pencairan');
                    $up['syarat_lain']=$this->input->post('syarat_lain');
                    $up['pejabat']=$this->input->post('pejabat');
                    $up['no_sp3']=$this->input->post('no_sp3');
                    $up['tgl_sp3']=$this->input->post('tgl_sp3');

                   $id['no_aplikasi']=$this->input->post('no_aplikasi');

                 $this->app_model->updateData("tb_sp3",$up,$id);


		}else{
				header('location:'.base_url());
		}

	}

               public function updatesetuju()
	{
            date_default_timezone_set('Asia/Jakarta');
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

		//	   $induk = $this->input->post('rek_induk');

		//	if($induk!=0){
		//	 		$level = $this->app_model->CariLevel($induk);
		//	  		$up['induk']=$this->input->post('rek_induk');
		//	  		$up['level']=$level+1;
		//	 	}else{
		//	 		$up['induk']=0;
		 //	 		$up['level']=0;
		 //	 	}
                      $nm_account=$this->session->userdata('username');

                   $noaplikasi = $this->input->post('no_aplikasi');


                    $date=date('Y-m-d H:i:s');
                  $up['pic_akad']= $nm_account;
                  $up['tgl_approval']=$date;
                  $up['approval_sp3']='1';
                   $up['konfirmasi_akad']='1';
                  $up['tahapan']='7';


                   $id['no_aplikasi']=$this->input->post('no_aplikasi');
                   $this->app_model->cariHistori($noaplikasi,"16",$nm_account);
                 $this->app_model->updateData("tb_pembiayaan",$up,$id);

                     $this->app_model->CariAdminBiaya("tb_akad",$noaplikasi);
      //$datasp3 = array ('no_aplikasi' => $aplikasi);
      //  $this->db->insert('tb_sp3', $datasp3);

		}else{
				header('location:'.base_url());
		}

	}
         public function cetaksp3($no_aplikasi)
	{

	     $cek = $this->session->userdata('logged_in');
         $level = $this->session->userdata('level');
		if(!empty($cek) and $level=='2' or $level=='0'){

        	$text = "SELECT * FROM tb_sp3,users,tb_jabpegawai where tb_sp3.pejabat = users.username and users.id_jabatanpeg = tb_jabpegawai.id and tb_sp3.no_aplikasi='$no_aplikasi'";
			$d['data'] = $this->app_model->manualQuery($text);

        	$text2 = "SELECT * FROM tb_pembiayaan,tb_skim,tb_penggunaan,tb_cabang where tb_pembiayaan.kd_buk = tb_cabang.kd_cabang and tb_penggunaan.id_penggunaan=tb_pembiayaan.tujuan_guna and tb_pembiayaan.skim and tb_skim.id_skim and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
			$d['biaya'] = $this->app_model->manualQuery($text2);
              $detailjaminan = "SELECT * FROM tb_jaminand, tb_jaminan where tb_jaminand.nm_agunan = tb_jaminan.id_jaminan and no_aplikasi ='$no_aplikasi' ";
              $d['listdetailjaminan'] = $this->app_model->manualQuery($detailjaminan);

            	$text3 = "SELECT * FROM tb_pasangan where tb_pasangan.no_aplikasi='$no_aplikasi'";
			$d['pasangan'] = $this->app_model->manualQuery($text3);

               	$this->load->view('sp3/cetak',$d);



		}else{
				header('location:'.base_url());
		}

	}

}
