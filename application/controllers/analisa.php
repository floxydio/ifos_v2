<?php
class Analisa extends CI_Controller{

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




       		     $this->template->display('analisa/view',$d);
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
 $where ="approval=1 and approval_doc =1 and approval_data =1 and approval_verifikasi =1 and approval_persetujuan =0 and konfirmasi=1 and konfirmasi_data=1 and konfirmasi_verifikasi=1 and konfirmasi_persetujuan=1 and pic_persetujuan ='$nm_account'";
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
     $row->detaillink="analisa";
     $row->form="formreview";

     $row->jkl="3";

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
		$resultList = $this->app_model->fetchAllData('no_aplikasi,nm_lengkap,kd_cab,plafon,ibu_kandung','tb_pembiayaan',array(),'1','1','1','1','1','0','0','0','0','0','1','1','1','1','1','0','0','0','pic_persetujuan',$nm_account);

		$result = array();
		$button = '';
		 $row->detaillink="analisa";
     $row->form="formreview";

     $row->jkl="3";
		$i = 1;
		foreach ($resultList as $key => $value) {
              	$button = " <a href='#' onclick ='javascript:tampil_data(\"{$value['no_aplikasi']}\",\"{$row->detaillink}\",\"{$row->form}\",\"{$row->jkl}\")' class='btn btn-xs btn-warning'><i class='glyphicon glyphicon-edit' title='Detail'>Detail</i></a>";
              	 $app=$value['no_aplikasi']; 
                         $cekdata=$this->app_model->CariDataParameter($app,'no_aplikasi','tb_pembiayaan_ver','no_aplikasi');
            if($cekdata=='1'){
                    $db = $this->app_model->CariTabelAplikasi('tb_pembiayaan_ver',$app);
                   	$baru['data'][] = array(
                $db['no_aplikasi'],
               	$db['nm_lengkap'],
                $db['kd_cab'],
                $db['ibu_kandung'],
                $db['plafon'],
				$button
			);
            }else{

			$baru['data'][] = array(

				$value['no_aplikasi'],
               	$value['nm_lengkap'],
                $value['kd_cab'],
                 $value['ibu_kandung'],
                  $value['plafon'],
				$button
			);
           }
		}
		echo json_encode($baru);

        	}else{
			header('location:'.base_url());
		}
	}

      public function updateagunan()
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
                 $up['no_aplikasi']=$this->input->post('no_aplikasi');
				$up['nm_agunan']=$this->input->post('nm_agunan');
				$up['harga_agunan']=$this->input->post('harga_agunan');
                	$up['bobot_agunan']=$this->input->post('bobot_agunan');
                	$up['nilai_agunan']=$this->input->post('nilai_agunan');
                	$id['id_jaminand']=$this->input->post('id_jaminand');
                       $this->app_model->insertData("tb_jaminand",$up);




		}else{
				header('location:'.base_url());
		}

	}


      public function editagunandetail()
	{
	    $cek = $this->session->userdata('logged_in');
         $level = $this->session->userdata('level');
		if(!empty($cek)){
			/*
			$d['prg']= $this->config->item('prg');
			$d['web_prg']= $this->config->item('web_prg');

			$d['nama_program']= $this->config->item('nama_program');
			$d['instansi']= $this->config->item('instansi');
			$d['alamat_instansi']= $this->config->item('alamat_instansi');

			$d['judul'] = "Surat Perintah";
			$d['message'] = '';
			*/

			$id = $this->input->post('id');  //$this->uri->segment(3);
			$text = "SELECT * FROM tb_jaminand WHERE id_jaminand='$id'";
			$data = $this->app_model->manualQuery($text);
			//if($data->num_rows() > 0){
				foreach($data->result() as $db){
				    $d['nm_agunan']	    =$db->nm_agunan;
                    $d['harga_agunan']	    =$db->harga_agunan;

                    $d['kondisi_kendaraan']	    =$db->kondisi_kendaraan;
                    $d['tujuan_kendaraan']	    =$db->tujuan_kendaraan;
                    $d['negara_kendaraan']	    =$db->negara_kendaraan;
                    $d['merk']	    =$db->merk;
                    $d['model']	    =$db->model;
                    $d['tipe']	    =$db->tipe;
                    $d['no_mesin']	    =$db->no_mesin;
                    $d['no_rangka']	    =$db->no_rangka;
                    $d['no_bpkb']	    =$db->no_bpkb;
                    $d['tgl_bpkb']	    =$db->tgl_bpkb;
                    $d['alamat_kendaraan']	    =$db->alamat_kendaraan;
                    $d['kdpos_kendaraan']	    =$db->kdpos_kendaraan;
                    $d['kelurahan_kendaraan']	    =$db->kelurahan_kendaraan;
                    $d['kecamatan_kendaraan']	    =$db->kecamatan_kendaraan;
                    $d['kotamadya_kendaraan']	    =$db->kotamadya_kendaraan;
                    $d['propinsi_kendaraan']	    =$db->propinsi_kendaraan;
                      $d['alamat']	    =$db->alamat;
                    $d['kdpos']	    =$db->kdpos_kendaraan;
                    $d['kelurahan']	    =$db->kelurahan;
                    $d['kecamatan']	    =$db->kecamatan;
                    $d['kotamadya']	    =$db->kotamadya;
                    $d['propinsi']	    =$db->propinsi;
                     $d['jenis_bangunan']	    =$db->jenis_bangunan;
                      $d['pemilik']	    =$db->pemilik;
                       $d['luas_tanah']	    =$db->luas_tanah;
                         $d['luas_bangun']	    =$db->luas_bangun;
                           $d['umur']	    =$db->umur;
                             $d['hubnasabah']	    =$db->hubnasabah;
                    $d['atas_nama']	    =$db->atas_nama;
                    $d['status']	    =$db->status;
                    $d['no_sertifikat']	    =$db->no_sertifikat;
                    $d['tgl_terbit']	    =$db->tgl_terbit;
                    $d['atas_imb']	    =$db->atas_imb;
                    $d['no_imb']	    =$db->no_imb;
                    $d['no_bilyet']	    =$db->no_bilyet;
                    $d['no_seri']	    =$db->no_seri;
                    $d['tgl_cash']	    =$db->tgl_cash;
                    $d['jumlah']	    =$db->jumlah;
                    $d['tgl_valuta']	    =$db->tgl_valuta;
                    $d['tgl_jatuhtempo']	    =$db->tgl_jatuhtempo;
                     $d['nm_sk']	    =$db->nm_sk;
                      $d['no_rekening']	    =$db->no_rekening;
                       $d['nm_bendahara']	    =$db->nm_bendahara;
                        $d['payroll']	    =$db->payroll;
                         $d['no_sk']	    =$db->no_sk;
                          $d['no_pks']	    =$db->no_pks;
                           $d['tgl_sk']	    =$db->tgl_sk;
                           $d['jenis_alat']	    =$db->jenis_alat;
                           $d['negara_mesin']	    =$db->negara_mesin;
                           $d['merk_mesin']	    =$db->merk_mesin;
                           $d['tahun']	    =$db->tahun;
                           $d['no_faktur']	    =$db->no_faktur;
                           $d['bukti_pemilik']	    =$db->bukti_pemilik;
                           $d['no_pemilik']	    =$db->no_pemilik;
                           $d['karat']	    =$db->karat;
                           $d['sertifikat_perusahaan']	    =$db->sertifikat_perusahaan;
                           $d['berat']	    =$db->berat;
                            $d['nm_pihak']	    =$db->nm_pihak;
                             $d['no_kontrak']	    =$db->no_kontrak;
                              $d['tgl_piutang']	    =$db->tgl_piutang;
                               $d['pihak_hutang']	    =$db->pihak_hutang;
                                  $d['bobot_agunan']	    =$db->bobot_agunan;
                    $d['nilai_agunan']	    =$db->nilai_agunan;
                      $d['spec']	    =$db->spec;
                        $d['pemilikmesin']	    =$db->pemilikmesin;
                              $d['kondisi_mesin']	    =$db->kondisi_mesin;
                                    $d['status_pakai']	    =$db->status_pakai;
                          $d['harga_emas']	    =$db->harga_emas;
                                    $d['tgl_harga']	    =$db->tgl_harga;
                                        $d['umur_piutang']	    =$db->umur_piutang;
                                        $d['hub_nasabah']	    =$db->hub_nasabah;
                                                      $d['runtukkosong']	    =$db->runtuk;
                                                         $d['kondisi_tanah']	    =$db->kondisi_tanah;
                           $this->output->set_output(json_encode($d));     
				}
			//}

			//$d['content'] = $this->load->view('rekening/tambah', $d, true);
			//$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
             public function updateforward()
	{

		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

                   $noaplikasi = $this->input->post('no_aplikasi');

                  $up['pic_pemutus']=$this->input->post('pemutus');
                   $up['ket']=$this->input->post('setuju');


                   $id['no_aplikasi']=$this->input->post('no_aplikasi');

                 $this->app_model->updateData("tb_pembiayaan",$up,$id);


		}else{
				header('location:'.base_url());
		}

	}

         public function updatescoring()
	{
        date_default_timezone_set('Asia/Jakarta');
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

                                          	$aplikasi=$this->input->post('no_aplikasi');
        $account=$this->session->userdata('username');
   	$tgldata = $this->app_model->CariTglKirimData($aplikasi,'tgl_approval');
	   $date=date('Y-m-d H:i:s');
       	$hari = $this->app_model->datediff($tgldata,$date);
        $libur = $this->app_model->hitung_minggusabtu($tgldata,$date);
          $listhari= ($hari['days_total']- $libur);
          $listjam = $hari['hours_total'];
           $listmenit = $hari['minutes_total'];
      $datahistory = array (
                     'nm_history' => '9'
                     ,'no_aplikasi' => $aplikasi
                     ,'nm_account' => $account
                     ,'tgl' => $date
                         ,'hari' => $listhari
                     ,'jam' => $listjam
                     ,'menit' => $listmenit
                    );
      $this->db->insert('tb_history', $datahistory);

                   $noaplikasi = $this->input->post('no_aplikasi');
                   $date=date('Y-m-d H:i:s');
                   $up['tgl_approval']=$date;
                  $up['approval_persetujuan']='1';
                  $up['tahapan']='Approval';

                   $id['no_aplikasi']=$this->input->post('no_aplikasi');

                 $this->app_model->updateData("tb_pembiayaan",$up,$id);


		}else{
				header('location:'.base_url());
		}

	}


}
