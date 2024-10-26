<?php
class Detail extends CI_Controller{

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




       		     $this->template->display('detail/view',$d);
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
     $where ="approval=1 and approval_doc =1 and approval_data =0 and konfirmasi=1 and konfirmasi_data=1 and pic_dataentry ='$nm_account'";
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
     $row->detaillink="detail";
     $row->form="form";

     $row->jkl="1";

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
		$resultList = $this->app_model->fetchAllData('no_aplikasi,nm_lengkap,kd_cab,plafon,ibu_kandung','tb_pembiayaan',array(),'1','1','1','0','0','0','0','0','0','0','1','1','1','0','0','0','0','0','pic_dataentry',$nm_account);

		$result = array();
		$button = '';
		 $row->detaillink="detail";
     $row->form="form";

     $row->jkl="1";
		$i = 1;
		foreach ($resultList as $key => $value) {
              	$button = " <a href='#' onclick='tampil_data(\"{$value['no_aplikasi']}\",\"{$row->detaillink}\",\"{$row->form}\",\"{$row->jkl}\")' class='btn btn-xs btn-warning'><i class='glyphicon glyphicon-edit' title='Detail'>Detail</i></a>";


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

		public function fetchDataKodepos()
	{
		$resultList = $this->app_model->fetchAllKodepos('id_kdpos,nm_kdpos,kelurahan,kecamatan,kotamadya,propinsi','tb_kdpos',array());

		$result = array();
		$button = '';
		$i = 1;
		foreach ($resultList as $key => $value) {

		  $check='<input type="checkbox" value="'.$value['id_kdpos'].'" />';  

			$result['data'][] = array(
				$value['nm_kdpos'],
			    $value['kelurahan'],
			     $value['kecamatan'],
			      $value['kotamadya'],
			       $value['propinsi'],
				$check
			);
		}
		echo json_encode($result);
	}

 public function updateujian()
	{

		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

                   $noaplikasi = $this->input->post('no_aplikasi');
                 $up['no_aplikasi']=$this->input->post('no_aplikasi');
                $up['nm_lengkap']=$this->input->post('nm_lengkap');
                $up['jk']=$this->input->post('jk');
				$up['no_identitas']=$this->input->post('no_identitas');
                $up['no_npwp']=$this->input->post('no_npwp');
                $up['id_card']=$this->input->post('id_card');
                $up['tempat_lahir']=$this->input->post('tempat_lahir');
				$up['tanggal_lahir']=$this->app_model->tgl_sql($this->input->post('tanggal_lahir'));
                $up['ibu_kandung']=$this->input->post('ibu_kandung');
                 $up['alamat']=trim($this->input->post('alamat'));
                     $up['jns_permohonan']=$this->input->post('jns_permohonan');

                  $up['kdpos_ktp']=$this->input->post('kdpos_ktp');
                  $up['kelurahan_ktp']=$this->input->post('kelurahan_ktp');
                 $up['kecamatan_ktp']=$this->input->post('kecamatan_ktp');
                  $up['kotamadya_ktp']=$this->input->post('kotamadya_ktp');
                  $up['propinsi_ktp']=$this->input->post('propinsi_ktp');
                   $up['alamat_tinggal']=trim($this->input->post('alamat_tinggal'));
                  $up['kdpos_tinggal']=$this->input->post('kdpos_tinggal');
                  $up['kelurahan_tinggal']=$this->input->post('kelurahan_tinggal');
                 $up['kecamatan_tinggal']=$this->input->post('kecamatan_tinggal');
                  $up['kotamadya_tinggal']=$this->input->post('kotamadya_tinggal');
                  $up['propinsi_tinggal']=$this->input->post('propinsi_tinggal');
                  $up['no_tlp']=$this->input->post('no_tlp');
                   $up['no_hp1']=$this->input->post('no_hp1');
                    $up['no_hp2']=$this->input->post('no_hp2');
                    $up['agama']=$this->input->post('agama');
                       $up['status_nikah']=$this->input->post('status_nikah');

                       $json=json_encode($up);
                       $buk = json_decode($json);


			  	$id['no_aplikasi']=$this->input->post('no_aplikasi');

			  	$this->app_model->updateData("tb_pembiayaan",$up,$id);
			    $this->app_model->insertData("tb_pembiayaan_ver",$up);


		}else{
				header('location:'.base_url());
		}

	}
     public function updatepas()
	{

		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

                   $noaplikasi = $this->input->post('no_aplikasi');
                  	$up['no_aplikasi']=$this->input->post('no_aplikasi');
				$up['nm_lengkap']=$this->input->post('nm_lengkap');

                 $up['id_cardnikah']=$this->input->post('id_cardnikah');
                $up['no_identitas']=$this->input->post('no_identitas');
                $up['id_card']=$this->input->post('id_card');
                $up['id_jabatan']=$this->input->post('id_jabatan');
                $up['tempat_lahir']=$this->input->post('tempat_lahir');
                 $up['tanggal_lahir']=$this->input->post('tanggal_lahir');
                 $up['alamat']=trim($this->input->post('alamat'));
                  $up['kdpos_ktp']=$this->input->post('kdpos_ktp');
                  $up['kelurahan_ktp']=$this->input->post('kelurahan_ktp');
                 $up['kecamatan_ktp']=$this->input->post('kecamatan_ktp');
                   $up['kotamadya_ktp']=$this->input->post('kotamadya_ktp');
                  $up['propinsi_ktp']=$this->input->post('propinsi_ktp');
                   $up['alamat_tinggal']=trim($this->input->post('alamat_tinggal'));
                  $up['kdpos_tinggal']=$this->input->post('kdpos_tinggal');
                  $up['kelurahan_tinggal']=$this->input->post('kelurahan_tinggal');
                 $up['kecamatan_tinggal']=$this->input->post('kecamatan_tinggal');
                   $up['kotamadya_tinggal']=$this->input->post('kotamadya_tinggal');
                  $up['propinsi_tinggal']=$this->input->post('propinsi_tinggal');
                     $up['no_tlp']=$this->input->post('no_tlp');
                   $up['no_hp1']=$this->input->post('no_hp1');
                    $up['no_hp2']=$this->input->post('no_hp2');

                      $json=json_encode($up);
                       $buk = json_decode($json);

			   	$id['no_aplikasi']=$this->input->post('no_aplikasi');
                	$data = $this->app_model->getSelectedData("tb_pasangan",$id);
				if($data->num_rows()<=0)
                 {
                $this->app_model->insertData("tb_pasangan",$buk);

                }else{
                    $this->app_model->updateData("tb_pasangan",$buk,$id);

                }

		}else{
				header('location:'.base_url());
		}

	}
       public function updatepas1()
	{

		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){


                   $noaplikasi = $this->input->post('no_aplikasi');

                  	$up['no_aplikasi']=$this->input->post('no_aplikasi');


			   	$id['no_aplikasi']=$this->input->post('no_aplikasi');
                        $json=json_encode($up);
                       $buk = json_decode($json);

                	$data = $this->app_model->getSelectedData("tb_pasangan",$id);
				if($data->num_rows()<=0)
                 {

				 $this->app_model->insertData("tb_pasangan",$buk);
                }else{

                 $this->app_model->updateData("tb_pasangan",$buk,$id);

                }


		}else{
				header('location:'.base_url());
		}

	}
     public function updatekeu()
	{

		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

               	$ud['s_penghasilan']=$this->input->post('x_AndaMhs');
				$ud['jenisp']=$this->input->post('x_Jenis');

                   $noaplikasi = $this->input->post('no_aplikasi');
                       	$up['no_aplikasi']=$this->input->post('no_aplikasi');
				$up['gaji_bulan']=$this->input->post('gaji_bulan');
            	$up['peng_tambahan']=$this->input->post('peng_tambahan');
                $up['peng_utamapasangan']=$this->input->post('peng_utamapasangan');
                $up['peng_tambahanpasangan']=$this->input->post('peng_tambahanpasangan');
                $up['total_penghasilan']=$this->input->post('total_penghasilan');

                              $json=json_encode($up);
                       $buk = json_decode($json);
			   	$id['no_aplikasi']=$this->input->post('no_aplikasi');
                 	$data = $this->app_model->getSelectedData("tb_keuangan",$id);
				if($data->num_rows()<=0)
                 {
               $this->app_model->updateData("tb_pembiayaan",$ud,$id);
                 $this->app_model->insertData("tb_keuangan",$buk);
              // $this->app_model->insertData("tb_jaminand",$id);
               }else{
                  $this->app_model->updateData("tb_pembiayaan",$ud,$id);
                    $this->app_model->updateData("tb_keuangan",$buk,$id);

                }


		}else{
				header('location:'.base_url());
		}

	}

      public function updatekeu2()
	{

		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

                   $noaplikasi = $this->input->post('no_aplikasi');

                   	$ud['s_penghasilan']=$this->input->post('x_AndaMhs');
				$ud['jenisp']=$this->input->post('x_Jenis');
                    	$up['no_aplikasi']=$this->input->post('no_aplikasi');
				$up['penjualan_bulan']=$this->input->post('penjualan_bulan');
				$up['hpp']=$this->input->post('hpp');
                $up['total_biaya']=$this->input->post('total_biaya');
                $up['penghasilan_bersih']=$this->input->post('penghasilan_bersih');
				$up['peng_tambahan2']=$this->input->post('peng_tambahan2');
                $up['peng_utamapasangan2']=$this->input->post('peng_utamapasangan2');
                $up['peng_tambahanpasangan2']=$this->input->post('peng_tambahanpasangan2');
                  $up['total_penghasilan2']=$this->input->post('total_penghasilan2');

                                $json=json_encode($up);
                       $buk = json_decode($json);
			   	$id['no_aplikasi']=$this->input->post('no_aplikasi');
                 	$data = $this->app_model->getSelectedData("tb_keuangan",$id);
				if($data->num_rows()<=0)
                 {
               $this->app_model->updateData("tb_pembiayaan",$ud,$id);
              $this->app_model->insertData("tb_keuangan",$buk); 
              // $this->app_model->insertData("tb_jaminand",$id);
				  
                }else{
                  $this->app_model->updateData("tb_pembiayaan",$ud,$id);
                    $this->app_model->updateData("tb_keuangan",$buk,$id);


                }


		}else{
				header('location:'.base_url());
		}

	}
      public function updatekerjaan()
	{

		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

                   $noaplikasi = $this->input->post('no_aplikasi');

                $dd['jns_pekerjaan']=$this->input->post('jns');
                  	$up['no_aplikasi']=$this->input->post('no_aplikasi');
				$up['nm_perusahaan']=$this->input->post('nm_perusahaan');
				$up['alamat_perusahaan']=trim($this->input->post('alamat'));
                $up['kdpos_perusahaan']=$this->input->post('kdpos_perusahaan');
                  $up['kelurahan_perusahaan']=$this->input->post('kelurahan_perusahaan');
                 $up['kecamatan_perusahaan']=$this->input->post('kecamatan_perusahaan');
                 $up['kotamadya_perusahaan']=$this->input->post('kotamadya_perusahaan');
                  $up['propinsi_perusahaan']=$this->input->post('propinsi_perusahaan');
                   $up['jabatan']=$this->input->post('jabatan');
                
                   $up['no_tlpperusahaan']=$this->input->post('no_tlp');
                    $up['no_ext']=$this->input->post('no_ext');
                  
                                       $json=json_encode($up);
                       $buk = json_decode($json);
			   	$id['no_aplikasi']=$this->input->post('no_aplikasi');
                 	$data = $this->app_model->getSelectedData("tb_dpekerjaan",$id);
				if($data->num_rows()<=0)
                 {
               $this->app_model->updateData("tb_pembiayaan",$dd,$id);
                $this->app_model->insertData("tb_dpekerjaan",$buk);
	            }else{
                   $this->app_model->updateData("tb_pembiayaan",$dd,$id);
                    $this->app_model->updateData("tb_dpekerjaan",$buk,$id);

                }

		}else{
				header('location:'.base_url());
		}

	}

     public function updatedarurat()
	{
      $cek = $this->session->userdata('logged_in');
         $level = $this->session->userdata('level');
		if(!empty($cek)){
                           	$up['no_aplikasi']=$this->input->post('no_aplikasi');
				$up['nm_lengkap_c']=$this->input->post('nm_lengkap');
              $alamatktp=trim($this->input->post('alamat'));
                $up['alamat_c']=$alamatktp;
                $up['kdpos_c']=$this->input->post('kdpos_ktp');
                $up['kelurahan_c']=$this->input->post('kelurahan_ktp');

                $up['kecamatan_c']=$this->input->post('kecamatan_ktp');
                 $up['kotamadya_c']=$this->input->post('kotamadya_ktp');
                $up['no_tlpc']=$this->input->post('no_tlp');
                $up['propinsi_c']=$this->input->post('propinsi_ktp');
                $up['no_hp1c']=$this->input->post('no_hp1');
                $up['no_hp2c']=$this->input->post('no_hp2');
              

			   	$id['no_aplikasi']=$this->input->post('no_aplikasi');
                 	$data = $this->app_model->getSelectedData("tb_kontak",$id);
				if($data->num_rows()<=0)
                 {
               $this->app_model->insertData("tb_kontak",$up);

                }else{
                    $this->app_model->updateData("tb_kontak",$up,$id);
             

                }


		}else{
				header('location:'.base_url());
		}

	}
        public function updatefasilitas($table,$fasilitas)
	{

	  $cek = $this->session->userdata('logged_in');
         $level = $this->session->userdata('level');
		if(!empty($cek)){
               $up['nm_pembiayaan']=$this->input->post('nm_pembiayaan');

				$up['margin_pa']=$this->input->post('margin_pa');
                $up['angsuran_bulan']=$this->input->post('angsuran_bulan');
				$up['jw_bulan']=$this->input->post('jw_bulan');
                 $up['sisa_os']=$this->input->post('sisa_os');

			   	$up['no_aplikasi']=$this->input->post('no_aplikasi');

                  	$id[''.$fasilitas.'']=$this->input->get(''.$fasilitas.'');


           $data = $this->app_model->getSelectedData($table,$id);
		 if($data->num_rows()>0){
		 		$this->app_model->updateData($table,$up,$id);

    	 	}else{
		  	   	$this->app_model->insertData($table,$up);

          	}

		}else{
				header('location:'.base_url());
		}

	}
	
	     public function updatetambahan($table,$fasilitas)
	{

	  $cek = $this->session->userdata('logged_in');
         $level = $this->session->userdata('level');
		if(!empty($cek)){
               $up['nm_tambahan']=$this->input->post('nm_tambahan');

				$up['alamat_tambahan']=$this->input->post('alamat_tambahan');
                $up['no_tlptambahan']=$this->input->post('no_tlptambahan');
				$up['no_exttambahan']=$this->input->post('no_exttambahan');
                 $up['jabatan_tambahan']=$this->input->post('jabatan_tambahan');

			   	$up['no_aplikasi']=$this->input->post('no_aplikasi');

                  	$id[''.$fasilitas.'']=$this->input->get(''.$fasilitas.'');


           $data = $this->app_model->getSelectedData($table,$id);
		 if($data->num_rows()>0){
		 		$this->app_model->updateData($table,$up,$id);

    	 	}else{
		  	   	$this->app_model->insertData($table,$up);

          	}

		}else{
				header('location:'.base_url());
		}

	}
       public function hapusfasilitas()
	{
	  $cek = $this->session->userdata('logged_in');
         $level = $this->session->userdata('level');
		if(!empty($cek)){
        	$id_fasilitas = $this->input->post('id_fasilitas');

			$text = "DELETE FROM tb_fasilitas WHERE id_fasilitas='$id_fasilitas'";
			$d['data'] = $this->app_model->manualQuery($text);
            	$this->load->view('verifikasi/formjaminan',$d);
		}else{
			header('location:'.base_url());
		}

	}
	
	    public function hapustambahan()
	{
	  $cek = $this->session->userdata('logged_in');
         $level = $this->session->userdata('level');
		if(!empty($cek)){
        	$id_fasilitas = $this->input->post('id_tambahan');

			$text = "DELETE FROM tb_tambahan WHERE id_tambahan='$id_fasilitas'";
			$d['data'] = $this->app_model->manualQuery($text);
            	$this->load->view('verifikasi/formjaminan',$d);
		}else{
			header('location:'.base_url());
		}

	}
         public function hapusfasilitaslain()
	{
	  $cek = $this->session->userdata('logged_in');
         $level = $this->session->userdata('level');
		if(!empty($cek) and $level=='3' or $level=='0'){
        	$id_fasilitas = $this->input->post('id_fasilitas');

			$text = "DELETE FROM tb_fasilitas1 WHERE id_fasilitas1='$id_fasilitas'";
			$d['data'] = $this->app_model->manualQuery($text);
            	$this->load->view('verifikasi/formjaminan',$d);
		}else{
			header('location:'.base_url());
		}
	}

       public function updateagunan()
	{

		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

                 $up['no_aplikasi']=$this->input->post('no_aplikasi');
				$up['nm_agunan']=$this->input->post('nm_agunan');
				$up['harga_agunan']=$this->input->post('harga_agunan');
                $up['status_jaminan']='belum diinput';
                 	$id['no_aplikasi']=$this->input->post('no_aplikasi');
               	$data = $this->app_model->getSelectedData("tb_jaminand",$id);
				if($data->num_rows()< 5){
                     	$this->app_model->insertData("tb_jaminand",$up);

				}else{
                  echo" Data Melebihi 5 Jaminan" ;

				}

		}else{
				header('location:'.base_url());
		}

	}
    public function hapusDetail()
	{
	    $cek = $this->session->userdata('logged_in');
         $level = $this->session->userdata('level');
		if(!empty($cek) and $level=='3' or $level=='0'){

			$id_jaminand = $this->input->post('id_jaminand');

			$text = "DELETE FROM tb_jaminand WHERE id_jaminand='$id_jaminand'";
			$d['data'] = $this->app_model->manualQuery($text);


		}else{
			header('location:'.base_url());
		}
	}

     public function hapus()
	{
	    	$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$id = $this->input->post('id_jaminand');
             $table=	$this->app_model->manualQuery("Select * FROM tb_upload WHERE id='$id'");
            $row=$table->row();
            unlink("./uploads/$row->file");
			$this->app_model->manualQuery("DELETE FROM tb_upload WHERE id='$id'");
 	}else{
			header('location:'.base_url());
		}
	}

      public function updatebiaya()
	{

		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

                   $noaplikasi = $this->input->post('no_aplikasi');
                   $mm=$this->input->post('margin');
                   $byadmin = $this->input->post('biaya_admin');
                   $ba = str_replace(',','',$byadmin);
                   $angsuran=str_replace(",",".",$this->input->post('angsuran'));
                    $byujrah = $this->input->post('biaya_ujrah');
                   $bu = str_replace(',','',$byujrah);

                $up['skim']=$this->input->post('skim');
                $up['jenis']=$this->input->post('jenis');
                 $up['id_tipeproduk']=$this->input->post('produk');
                $up['uang_muka']='0';
                $up['p_umuka']='0';
                $up['jangka_waktu']=$this->input->post('jangka_waktu');
                $up['margin']=$this->input->post('margin');
                $up['angsuran']=$angsuran;
				$up['programbuk']=$this->input->post('nm_perusahaan');
             $up['biaya_admin']=$ba;
	   	 $up['biaya_ujrah']=$bu;



                  $json=json_encode($up);
                       $buk = json_decode($json);

			   	$id['no_aplikasi']=$this->input->post('no_aplikasi');
               	$data = $this->app_model->getSelectedData("tb_pembiayaan_ver",$id);
				if($data->num_rows()>0){
			   $this->app_model->updateData("tb_pembiayaan_ver",$buk,$id);
                $this->app_model->updateData("tb_pembiayaan",$buk,$id);
                }else{
                  	 $this->app_model->insertData("tb_pembiayaan_ver",$buk);
                     $this->app_model->updateData("tb_pembiayaan",$buk,$id);
                }


		}else{
				header('location:'.base_url());
		}

	}
      public function editagunandetail()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){


			$id = $this->input->post('id');  //$this->uri->segment(3);
			$text = "SELECT * FROM tb_jaminand WHERE id_jaminand='$id'";
			$data = $this->app_model->manualQuery($text);
			//if($data->num_rows() > 0){
				foreach($data->result() as $db){
				     $d['id_jaminand']	    =$id;
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
                                 $d['hub_nasabah']	    =$db->hub_nasabah;

				    $this->output->set_output(json_encode($d));
				}
			//}

			//$d['content'] = $this->load->view('rekening/tambah', $d, true);
			//$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}
     public function get_state_by_country() {
         $merk = $this->input->post('merk');
   	$text = "SELECT * FROM tb_model where id_merk='$merk'";
			$data = $this->app_model->manualQuery($text);
    echo'<select name="model" id="model">';
    echo'<option value=" ">-Pilihan-</option>';
    	foreach($data->result() as $a){
      echo'<option value="'.$a->id_model.'">'.$a->nm_model.'</option>';
      }
      echo'</select>';
    }

    function get_state_by_state() {
         $model = $this->input->post('model');
   	$text = "SELECT * FROM tb_tipemobil where id_model='$model'";
			$data = $this->app_model->manualQuery($text);
    echo'<select name="tipe" id="tipe">';
    echo'<option value=" ">-Pilihan-</option>';
    	foreach($data->result() as $a){
      echo'<option value="'.$a->id_tipemobil.'">'.$a->nm_tipemobil.'</option>';
      }
      echo'</select>';
    }

      public function simpanjaminandetail()
	{

		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

                   $noaplikasi = $this->input->post('no_aplikasi');
                   $nm_agunan = $this->input->post('nm_agunan');
                   if($nm_agunan=='1'){
				$up['kondisi_kendaraan']=$this->input->post('kondisi_kendaraan');
				$up['tujuan_kendaraan']=$this->input->post('tujuan_kendaraan');
                $up['negara_kendaraan']=$this->input->post('negara_kendaraan');
                $up['merk']=$this->input->post('merk');
                $up['model']=$this->input->post('model');
                $up['tipe']=$this->input->post('tipe');
                $up['no_mesin']=$this->input->post('no_mesin');
                 $up['no_rangka']=$this->input->post('no_rangka');
                  $up['no_bpkb']=$this->input->post('no_bpkb');
                   $up['tgl_bpkb']=$this->input->post('tgl_bpkb');
                   $up['alamat_kendaraan']=$this->input->post('alamat_kendaraan');
                   $up['kdpos_kendaraan']=$this->input->post('kdpos_kendaraan');
                  $up['kelurahan_kendaraan']=$this->input->post('kelurahan_kendaraan');
                 $up['kecamatan_kendaraan']=$this->input->post('kecamatan_kendaraan');
                 $up['kotamadya_kendaraan']=$this->input->post('kotamadya_kendaraan');

                  $up['propinsi_kendaraan']=$this->input->post('propinsi_kendaraan');
                   $up['status_jaminan']='sudah diinput';

			   	$id['id_jaminand']=$this->input->post('id_jaminand');
                      $this->app_model->updateData("tb_jaminand",$up,$id);
                }
                else if ($nm_agunan =="2"){
                $up['atas_nama']=$this->input->post('atas_nama');
				   $up['alamat_kendaraan']=$this->input->post('alamat_kendaraan');
                   $up['kdpos_kendaraan']=$this->input->post('kdpos_kendaraan');
                  $up['kelurahan_kendaraan']=$this->input->post('kelurahan_kendaraan');
                 $up['kecamatan_kendaraan']=$this->input->post('kecamatan_kendaraan');
                 $up['kotamadya_kendaraan']=$this->input->post('kotamadya_kendaraan');

                  $up['propinsi_kendaraan']=$this->input->post('propinsi_kendaraan');
                $up['status']=$this->input->post('status');
                $up['no_sertifikat']=$this->input->post('no_sertifikat');
                $up['tgl_terbit']=$this->input->post('tgl_terbit');
                $up['atas_imb']=$this->input->post('atas_imb');
                $up['no_imb']=$this->input->post('no_imb');
                     $up['status_jaminan']='sudah diinput';
			   	$id['id_jaminand']=$this->input->post('id_jaminand');
                      $this->app_model->updateData("tb_jaminand",$up,$id);

                }
                else if ($nm_agunan =="3"){
                $up['atas_nama']=$this->input->post('atas_nama');
				   $up['no_bilyet']=$this->input->post('no_bilyet');
                   $up['no_seri']=$this->input->post('no_seri');
                  $up['tgl_cash']=$this->input->post('tgl_cash');
                 $up['jumlah']=$this->input->post('jumlah');
                 $up['tgl_valuta']=$this->input->post('tgl_valuta');
                      $up['status_jaminan']='sudah diinput';
                  $up['tgl_jatuhtempo']=$this->input->post('tgl_jatuhtempo');

			   	$id['id_jaminand']=$this->input->post('id_jaminand');
                      $this->app_model->updateData("tb_jaminand",$up,$id);

                }
                 else if ($nm_agunan =="4"){
                $up['nm_sk']=$this->input->post('nm_sk');
				   $up['no_rekening']=$this->input->post('no_rekening');
                   $up['nm_bendahara']=$this->input->post('nm_bendahara');
                  $up['payroll']=$this->input->post('payroll');
                 $up['no_sk']=$this->input->post('no_sk');
                 $up['no_pks']=$this->input->post('no_pks');

                  $up['tgl_sk']=$this->input->post('tgl_sk');
                      $up['status_jaminan']='sudah diinput';
			   	$id['id_jaminand']=$this->input->post('id_jaminand');
                      $this->app_model->updateData("tb_jaminand",$up,$id);

                }
                 else if ($nm_agunan =="5"){
                $up['jenis_alat']=$this->input->post('jenis_alat');
				   $up['atas_nama']=$this->input->post('atas_nama');
                   $up['negara_mesin']=$this->input->post('negara_mesin');
                  $up['merk_mesin']=$this->input->post('merk_mesin');
                 $up['tahun']=$this->input->post('tahun');
                 $up['no_faktur']=$this->input->post('no_faktur');
                       $up['status_jaminan']='sudah diinput';
                  $up['bukti_pemilik']=$this->input->post('bukti_pemilik');
                  $up['no_pemilik']=$this->input->post('no_pemilik');
			   	$id['id_jaminand']=$this->input->post('id_jaminand');
                      $this->app_model->updateData("tb_jaminand",$up,$id);

                }
                 else if ($nm_agunan =="6"){
                $up['karat']=$this->input->post('karat');
				   $up['sertifikat_perusahaan']=$this->input->post('sertifikat_perusahaan');
                   $up['berat']=$this->input->post('berat');
                  $up['no_sertifikat']=$this->input->post('no_sertifikat');
                   $up['status_jaminan']='sudah diinput';
                 $up['no_faktur']=$this->input->post('no_faktur');
               	$id['id_jaminand']=$this->input->post('id_jaminand');
                      $this->app_model->updateData("tb_jaminand",$up,$id);

                }
                 else if ($nm_agunan =="7"){
                $up['nm_pihak']=$this->input->post('nm_pihak');
				   $up['no_kontrak']=$this->input->post('no_kontrak');
                   $up['tgl_piutang']=$this->input->post('tgl_piutang');
                  $up['pihak_hutang']=$this->input->post('pihak_hutang');
                       $up['status_jaminan']='sudah diinput';
                  	$id['id_jaminand']=$this->input->post('id_jaminand');
                      $this->app_model->updateData("tb_jaminand",$up,$id);

                }
                  else if ($nm_agunan =="8"){
                $up['atas_nama']=$this->input->post('atas_nama');
				   $up['alamat_kendaraan']=$this->input->post('alamat_kendaraan');
                   $up['kdpos_kendaraan']=$this->input->post('kdpos_kendaraan');
                  $up['kelurahan_kendaraan']=$this->input->post('kelurahan_kendaraan');
                 $up['kecamatan_kendaraan']=$this->input->post('kecamatan_kendaraan');
                 $up['kotamadya_kendaraan']=$this->input->post('kotamadya_kendaraan');

                  $up['propinsi_kendaraan']=$this->input->post('propinsi_kendaraan');
                $up['status']=$this->input->post('status');
                $up['no_sertifikat']=$this->input->post('no_sertifikat');
                $up['tgl_terbit']=$this->input->post('tgl_terbit');
                 $up['hub_nasabah']=$this->input->post('hubnasabah');
                     $up['status_jaminan']='sudah diinput';
			   	$id['id_jaminand']=$this->input->post('id_jaminand');
                      $this->app_model->updateData("tb_jaminand",$up,$id);

                }

		}else{
				header('location:'.base_url());
		}

	}

      	public function editdokumendetail()
	{
	    $cek = $this->session->userdata('logged_in');
         $level = $this->session->userdata('level');
		if(!empty($cek) and $level=='3' or $level=='0'){
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
			$text = "select * from tb_dokumen,upload where tb_dokumen.id_dokumen = upload.id_dokumen and upload.id='$id'";
			$data = $this->app_model->manualQuery($text);
			//if($data->num_rows() > 0){
				foreach($data->result() as $db){
				    $d['id']	            =$db->id;
                    $d['nm_dokumen']	    =$db->nm_dokumen;
				    $d['namaFile']		    =$db->namaFile;
                    $d['ket']		        =$db->ket;
                     $d['ada']		        =$db->ada;

					echo json_encode($d);
				}
			//}

			//$d['content'] = $this->load->view('rekening/tambah', $d, true);
			//$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
	}

       public function simpanmemo()
	{

		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
	 $jabatan=$this->session->userdata('nama');
                   $up['no_aplikasi'] = $this->input->post('no_aplikasi');
                  $up['nm_memo']=$this->session->userdata('nama_lengkap');
                  $up['jabatan'] = $this->app_model->CariJabatan($jabatan);
                  $up['tgl_memo']=date('Y-m-d');

			    $up['isi_memo']=$this->input->post('nm_memo');

               $this->app_model->insertData("tb_memo",$up);


		}else{
				header('location:'.base_url());
		}

	}

       public function updatesend()
	{

		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

                     $noaplikasi = $this->input->post('no_aplikasi');
                   $account = $this->input->post('user');
                    $this->app_model->cariHistori($noaplikasi,"13",$account);
                     $this->app_model->cariTahapan($noaplikasi,"3","approval_data","pic_verifikasi",$account,"konfirmasi_verifikasi","1");

           }else{
				header('location:'.base_url());
		}

	}

}
