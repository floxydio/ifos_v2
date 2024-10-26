<?php
class Cekduplikasi extends CI_Controller{

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

             $this->template->display('cekduplikasi/view',$d);
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
          $where ="approval=1 and approval_doc =1 and approval_sid =0 and konfirmasi=1 and konfirmasi_sid=1 and pic_sid ='$nm_account'";
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

           $row->detail = "  <a href='javascript:tampil_data(\"{$row->no_aplikasi}\")' class='btn btn-xs btn-warning'><i class='glyphicon glyphicon-edit' title='Detail'>Detail</i></a>";

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
		$resultList = $this->app_model->fetchAllData('no_aplikasi,nm_lengkap,kd_cab,plafon,ibu_kandung','tb_pembiayaan',array(),'1','1','0','0','0','0','0','0','0','0','1','1','0','0','0','0','0','0','pic_sid',$nm_account);

		$result = array();
		$button = '';
		$i = 1;
		foreach ($resultList as $key => $value) {
              	$button = " <a href='#' onclick='tampil_data(\"{$value['no_aplikasi']}\")' class='btn btn-xs btn-warning'><i class='glyphicon glyphicon-edit' title='Detail'>Detail</i></a>";


			$result['data'][] = array(

				$value['no_aplikasi'],
               	$value['nm_lengkap'],
                $value['kd_cab'],
                 $value['ibu_kandung'],
                  $value['plafon'],
				$button
			);

		}
		echo json_encode($result);

        	}else{
			header('location:'.base_url());
		}
	}

           	function tambahdata($no_aplikasi)
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){

          $z = "SELECT * FROM tb_pembiayaan where tb_pembiayaan.no_aplikasi='$no_aplikasi'";
			$d['list'] = $this->app_model->manualQuery($z);

            	$dm = $this->app_model->CariKTP($no_aplikasi);
                	$d['datalistktp'] = $this->app_model->getduplikasi($dm,$no_aplikasi);
                    		$d['dtgllahir'] = $this->app_model->CariTanggalLahir($no_aplikasi);
                               	$d['dktp']= $this->app_model->CariKTP($no_aplikasi);



               $reason = "SELECT * FROM tb_reason";
			$d['listreason'] = $this->app_model->manualQuery($reason);
               $this->load->view('cekduplikasi/form',$d);

			//echo $text;
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
			$this->app_model->manualQuery("DELETE FROM tb_pembiayaan WHERE id_pembiayaan='$id'");
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

                $no_aplikasi=$this->input->post('no_aplikasi');
                $aplikasi =str_replace(" ","",$no_aplikasi);
                $up['no_aplikasi']=$aplikasi;
                $up['kd_cabang']=$this->session->userdata('cabang');
                $up['kd_program']=$this->input->post('kd_program');
                $up['channel']=$this->input->post('channel');
                $up['kd_cab']=$this->input->post('kd_cab');
               	$up['kd_buk']=$this->input->post('kd_buk');
                $up['nm_lengkap']=$this->input->post('nm_lengkap');
				$up['no_identitas']=$this->input->post('no_identitas');
                $up['tempat_lahir']=$this->input->post('tempat_lahir');
				$up['tanggal_lahir']=$this->app_model->tgl_sql($this->input->post('tanggal_lahir'));
                $up['ibu_kandung']=$this->input->post('ibu_kandung');
                   $up['status_nikah']=$this->input->post('status_nikah');
				$up['jns_pekerjaan']=$this->input->post('jns_pekerjaan');
                $up['skim']=$this->input->post('skim');
                 $up['jns_permohonan']=$this->input->post('jns_permohonan');

                  $up['jenisp']=$this->input->post('jenisp');
                $up['jenis']=$this->input->post('jenis');
                $up['tujuan_guna']=$this->input->post('tujuan_guna');
                $up['plafon']=$this->input->post('plafon');
                $up['tipe_margin']=$this->input->post('tipe_margin');
                $up['jangka_waktu']=$this->input->post('jangka_waktu');
                $up['margin']=$this->input->post('margin');
                $up['angsuran']=$this->input->post('angsuran');
                $up['no_account']=$this->session->userdata('no_account');
                $up['nm_account']=$this->session->userdata('username');
                 $up['tahapan']='Prospek';


			   	$id['no_aplikasi']=$this->input->post('no_aplikasi');

				$data = $this->app_model->getSelectedData("tb_pembiayaan",$id);
				if($data->num_rows()>0){
					$this->app_model->updateData("tb_pembiayaan",$up,$id);

				}else{
					$this->app_model->insertData("tb_pembiayaan",$up);

				}

		}else{
				header('location:'.base_url());
		}

    }
    
    public function updatesend()
	{
         date_default_timezone_set('Asia/Jakarta');
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
                   $noaplikasi = $this->input->post('no_aplikasi');
                    $account=$this->session->userdata('username');
     	$tgldata = $this->app_model->CariTglKirimData($noaplikasi,'tgl_approval');
	   $date=date('Y-m-d H:i:s');
       	$hari = $this->app_model->datediff($tgldata,$date);
        $libur = $this->app_model->hitung_minggusabtu($tgldata,$date);
          $listhari= ($hari['days_total']- $libur);
          $listjam = $hari['hours_total'];
           $listmenit = $hari['minutes_total'];
      $datahistory = array (
                     'nm_history' => '12'
                     ,'no_aplikasi' => $noaplikasi
                     ,'nm_account' => $account
                     ,'tgl' => $date
                       ,'hari' => $listhari
                     ,'jam' => $listjam
                     ,'menit' => $listmenit
                    );
      $this->db->insert('tb_history', $datahistory);

                   $date=date('Y-m-d H:i:s');
                 $data = array (
                     'approval_sid' => '1'
                     ,'tgl_approval' => $date
                     ,'tahapan' => '3'
                    ,'pic_dataentry' => $account
                    ,'konfirmasi_data' => '1'
                    );

                 $this->db->where('no_aplikasi',$noaplikasi);
                 $this->db->update('tb_pembiayaan',$data);


           }else{
				header('location:'.base_url());
		}

	}

     public function updatetolak()
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
                    $up['reason'] = $this->input->post('ket');
                    $up['ket'] = $this->input->post('alasan');

                    $date=date('Y-m-d H:i:s');
                  $up['pic_pemutus']= $nm_account;
                  $up['tgl_approval']=$date;
                  $up['approval_sid']='1';
                  $up['approval_data']='1';
                  $up['approval_verifikasi']='1';
                  $up['approval_persetujuan']='1';
                  $up['approval_setuju']='1';
                  $up['approval_sp3']='1';
                  $up['approval_akad']='1';
                  $up['approval_cair']='1';
                  $up['konfirmasi_sid']='1';
                  $up['konfirmasi_data']='1';
                  $up['konfirmasi_verifikasi']='1';
                  $up['konfirmasi_persetujuan']='1';
                  $up['konfirmasi_sp3']='1';
                  $up['konfirmasi_akad']='1';
                  $up['konfirmasi_cair']='1';
                  $up['hasil_aplikasi']='done';
                  $up['tahapan']='Rejected';
                  $up['hasil']='reject';

                   $id['no_aplikasi']=$this->input->post('no_aplikasi');

                 $this->app_model->updateData("tb_pembiayaan",$up,$id);

               	$aplikasi=$this->input->post('no_aplikasi');
        $account=$this->session->userdata('username');
    $date=date('Y-m-d H:i:s');
      $datahistory = array (
                     'nm_history' => 'Rejected'
                     ,'no_aplikasi' => $aplikasi
                     ,'nm_account' => $account
                     ,'tgl' => $date
                    );
      $this->db->insert('tb_history', $datahistory);

		}else{
				header('location:'.base_url());
		}

	}


    public function updatecancel()
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
                  $up['pic_pemutus']= $nm_account;
                   $up['reason'] = $this->input->post('ket');
                    $up['ket'] = $this->input->post('alasan');

                  $up['tgl_approval']=$date;
                  $up['approval_sid']='1';
                  $up['approval_data']='1';
                  $up['approval_verifikasi']='1';
                  $up['approval_persetujuan']='1';
                  $up['approval_setuju']='1';
                  $up['approval_sp3']='1';
                  $up['approval_akad']='1';
                  $up['approval_cair']='1';
                  $up['konfirmasi_sid']='1';
                  $up['konfirmasi_data']='1';
                  $up['konfirmasi_verifikasi']='1';
                  $up['konfirmasi_persetujuan']='1';
                  $up['konfirmasi_sp3']='1';
                  $up['konfirmasi_akad']='1';
                  $up['konfirmasi_cair']='1';
                  $up['hasil_aplikasi']='done';
                  $up['tahapan']='Cancel';
                  $up['hasil']='cancel';

                   $id['no_aplikasi']=$this->input->post('no_aplikasi');

                 $this->app_model->updateData("tb_pembiayaan",$up,$id);

           	$aplikasi=$this->input->post('no_aplikasi');
        $account=$this->session->userdata('username');
    $date=date('Y-m-d H:i:s');
      $datahistory = array (
                     'nm_history' => 'Cancel'
                     ,'no_aplikasi' => $aplikasi
                     ,'nm_account' => $account
                     ,'tgl' => $date
                    );
      $this->db->insert('tb_history', $datahistory);

		}else{
				header('location:'.base_url());
		}

	}


        public function updatenap($no_aplikasi){

    $cek = $this->session->userdata('logged_in');
         $level = $this->session->userdata('level');
		if(!empty($cek) and $level=='3' or $level=='0'){
      $cabang=$this->session->userdata('cabang');
     $nm_account=$this->session->userdata('username');


            $this->load->model('app_model');
             $id = $this->input->post('no_aplikasi');

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

			$d['judul']="Cek Dedupe Pada Aplikasi FAS MIkro ";

			//paging
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;

             $id = $this->input->get('no_aplikasi');
            $z = "SELECT * FROM tb_pembiayaan where tb_pembiayaan.no_aplikasi='$no_aplikasi'";
			$d['list'] = $this->app_model->manualQuery($z);

             $pasangan = "SELECT nm_lengkap FROM tb_pasangan where no_aplikasi='$no_aplikasi'";
			$d['listpasangan'] = $this->app_model->manualQuery($pasangan);

              $jk = "SELECT tb_jk.nm_jk FROM tb_pembiayaan, tb_jk where tb_pembiayaan.jk = tb_jk.id_jk and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
			$d['listjk'] = $this->app_model->manualQuery($jk);
                 $nikah = "SELECT tb_nikah.nm_nikah FROM tb_pembiayaan, tb_nikah where tb_pembiayaan.status_nikah = tb_nikah.id_nikah and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
			$d['listnikah'] = $this->app_model->manualQuery($nikah);
                    $perusahaan = "SELECT tb_dpekerjaan.nm_perusahaan,tb_dpekerjaan.alamat,tb_dpekerjaan.no_tlp,tb_dpekerjaan.lama_kerja FROM tb_dpekerjaan, tb_pembiayaan where tb_pembiayaan.no_aplikasi = tb_dpekerjaan.no_aplikasi and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
			$d['listperusahaan'] = $this->app_model->manualQuery($perusahaan);

                      $jabatan = "SELECT tb_jabatan.nm_jabatan FROM tb_dpekerjaan, tb_jabatan where tb_jabatan.id_jabatan = tb_dpekerjaan.jabatan and tb_dpekerjaan.no_aplikasi='$no_aplikasi'";
			$d['listjabatan'] = $this->app_model->manualQuery($jabatan);

             $kontak = "SELECT nm_lengkap,no_tlp FROM tb_kontak where no_aplikasi='$no_aplikasi'";
			$d['listkontak'] = $this->app_model->manualQuery($kontak);

              $sektor = "SELECT tb_sektor.nm_sektor FROM tb_dpekerjaan,tb_sektor where tb_dpekerjaan.sektor_ekonomi = tb_sektor.id_sektor and tb_dpekerjaan.no_aplikasi='$no_aplikasi'";
			$d['listsektor'] = $this->app_model->manualQuery($sektor);

                $pendidikan = "SELECT tb_pendidikan.nm_pendidikan FROM tb_pembiayaan,tb_pendidikan where tb_pembiayaan.pendidikan = tb_pendidikan.id_pendidikan and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
			$d['listpendidikan'] = $this->app_model->manualQuery($pendidikan);

               $skim = "SELECT tb_skim.nm_skim FROM tb_pembiayaan,tb_skim where tb_pembiayaan.skim = tb_skim.id_skim and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
			$d['listskim'] = $this->app_model->manualQuery($skim);
                  $tujuan = "SELECT tb_penggunaan.nm_penggunaan FROM tb_pembiayaan,tb_penggunaan where tb_pembiayaan.tujuan_guna = tb_penggunaan.id_penggunaan and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
			$d['listtujuan'] = $this->app_model->manualQuery($tujuan);
                  $tuju = "SELECT tb_jnskegunaan.nm_jnskegunaan FROM tb_pembiayaan,tb_jnskegunaan where tb_pembiayaan.jenis = tb_jnskegunaan.id_jnskegunaan and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
			$d['listtuju'] = $this->app_model->manualQuery($tuju);
            $margin = "SELECT tb_tipemargin.nm_tipemargin FROM tb_pembiayaan,tb_tipemargin where tb_pembiayaan.tipe_margin = tb_tipemargin.id_tipemargin and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
			$d['listmargin'] = $this->app_model->manualQuery($margin);

            $text = "SELECT * FROM tb_jaminan";
            $detailjaminan = "SELECT * FROM tb_jaminand, tb_jaminan where tb_jaminand.nm_agunan = tb_jaminan.id_jaminan and no_aplikasi ='$no_aplikasi' ";
              $d['listdetailjaminan'] = $this->app_model->manualQuery($detailjaminan);

                 $jns_pembiayaan = "SELECT * FROM tb_jnskegunaan";
		   $d['listjenis'] = $this->app_model->manualQuery($jns_pembiayaan);

                   $tolak = "SELECT * FROM tb_tolak";
		   $d['listtolak'] = $this->app_model->manualQuery($tolak);

                $vv = "select * from users,tb_jabpegawai,tb_upliner where users.id_jabatanpeg = tb_jabpegawai.id and users.username=tb_upliner.nm_upliner and tb_upliner.userid='$nm_account'";
		  $d['listusers'] = $this->app_model->manualQuery($vv);
		 //  $d['listusers'] =$this->app_model->upliner($nm_account);

                      $hh = "SELECT * FROM tb_pembiayaan where no_aplikasi='$no_aplikasi'";
		   $mm = $this->app_model->manualQuery($hh);
           foreach($mm->result_array() as $ii){

           }
           $ujian=$ii['kd_cabang'];

            $pp = "SELECT * FROM users,tb_jabpegawai,tb_adminmikro where users.id_jabatanpeg=tb_jabpegawai.id and users.username = tb_adminmikro.nm_adminmikro and tb_adminmikro.username = '$nm_account'";
		  $d['listadmin'] = $this->app_model->manualQuery($pp);

              $gg = "SELECT * FROM users,tb_jabpegawai where users.id_jabatanpeg=tb_jabpegawai.id and users.level='2' and users.nm_cabang ='082'";
		  $d['listadmin2'] = $this->app_model->manualQuery($gg);


                  $fasilitas = "SELECT * FROM tb_fasilitas";
		   $d['listfasilitas'] = $this->app_model->manualQuery($fasilitas);

                    $limit = "SELECT * FROM tb_limit where username = '$nm_account'";
		   $d['listlimit'] = $this->app_model->manualQuery($limit);

             $keuanganbiaya = "SELECT * FROM tb_keuangan,tb_pembiayaan where tb_pembiayaan.no_aplikasi = tb_keuangan.no_aplikasi and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
		   $d['listkeuanganbiaya'] = $this->app_model->manualQuery($keuanganbiaya);

                 $reason = "SELECT * FROM tb_reason";
			$d['listreason'] = $this->app_model->manualQuery($reason);




        //           $scoring1 = "SELECT * FROM tb_tanggungan,tb_pembiayaan,tb_setting where tb_pembiayaan.jt = tb_tanggungan.id_tanggungan and tb_setting.id_setting = tb_tanggungan.urutan and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
		//   $d['listscoring1'] = $this->app_model->manualQuery($scoring1);

              $keuangan = "SELECT * FROM tb_keuangan where no_aplikasi='$no_aplikasi'";
		   $d['listkeuangan'] = $this->app_model->manualQuery($keuangan);

                 $ccr = "SELECT nilai_agunan FROM tb_jaminand,tb_pembiayaan where tb_pembiayaan.no_aplikasi = tb_jaminand.no_aplikasi and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
		   $d['listccr'] = $this->app_model->manualQuery($ccr);

                         	$hasilscore = "SELECT * FROM skoring_syncron_hasil where noaplikasi='$no_aplikasi' ORDER BY tanggalskoring ASC ";
			$d['listscore'] = $this->app_model->manualQuery($hasilscore);

                       	$hasilscoreopsi1 = "SELECT opsi1,limit1,nilaiagunan1,rasioagunan1,hasil_skoring FROM skoring_syncron_hasil where noaplikasi='$no_aplikasi' and hasil_skoring = '2' ORDER BY tanggalskoring ASC ";
			$d['listscoreopsi1'] = $this->app_model->manualQuery($hasilscoreopsi1);

                        	$hasilscoreopsi2 = "SELECT opsi2,limit2,nilaiagunan2,rasioagunan2,hasil_skoring FROM skoring_syncron_hasil where noaplikasi='$no_aplikasi' and hasil_skoring = '2' ORDER BY tanggalskoring ASC ";
			$d['listscoreopsi2'] = $this->app_model->manualQuery($hasilscoreopsi2);

            $text = "SELECT * FROM tb_card";
            $agama = "SELECT * FROM tb_agama";
            $jk = "SELECT * FROM tb_jk";
            $nikah = "SELECT * FROM tb_nikah";

                   $pengusul = "SELECT * FROM tb_pembiayaan,users where tb_pembiayaan.nm_account = users.username and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
             $d['listpengusul'] = $this->app_model->manualQuery($pengusul);

                 $pemeriksa = "SELECT * FROM tb_pembiayaan,users where tb_pembiayaan.pic_analisa = users.username and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
             $d['listpemeriksa'] = $this->app_model->manualQuery($pemeriksa);

                   $rekomendasi = "SELECT * FROM tb_pembiayaan,users where tb_pembiayaan.pic_pemutus = users.username and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
             $d['listrekomendasi'] = $this->app_model->manualQuery($rekomendasi);
             $d['listagama'] = $this->app_model->manualQuery($agama);

             $d['listdata'] = $this->app_model->manualQuery($text);

                       //$this->load->view('cekdokumen/form',$data);
            $this->template->display('cekduplikasi/nap',$d);

		}else{
			header('location:'.base_url());
		}


    }
      	public function viewkdpos()
	{
		$cek = $this->session->userdata('logged_in');

            $this->load->view('detail/kdposin', true);

	}
     function tampil_datacekdokumen($nm_kdpos){
     $cabang=$this->session->userdata('cabang');

        $hal = isset($_POST['page'])?$_POST['page']:1;

        $batas = isset($_POST['rows'])?$_POST['rows']:10;

        $sidx = isset($_POST['sidx'])?$_POST['sidx']:'id_kdpos';



        if(!$sidx) $sidx =1;




        $q = $this->app_model->tampil_kodepos_semua($nm_kdpos);



        $hitung = count($q);



        if( $hitung > 0 ) {

            $total_hal = ceil($hitung/$batas);

        } else {

            $total_hal = 0;

        }



        if ($hal > $total_hal) $hal=$total_hal;



        $start = $batas*$hal - $batas;

        $start = ($start<0)?0:$start;



        $data->page = $hal;

        $data->total = $total_hal;

        $data->records = $hitung;

        $i=0;

        foreach($q->result() as $row) {

         $row->id_kdpostinggal = $row->id_kdpos;
             $row->nm_kdpostinggal = $row->nm_kdpos;
             $row->kelurahantinggal = $row->kelurahan;
             $row->kecamatantinggal = $row->kecamatan;
             $row->kotamadyatinggal = $row->kotamadya;
             $row->propinsitinggal = $row->propinsi;
            $data->rows[$i]['id']=$row->id_kdpos;

            $data->rows[$i]['cell']=array($row->id_kdpos,$row->nm_kdpos,$row->kelurahan,$row->kecamatan,$row->kotamadya,$row->propinsi);

            $i++;

        }

     $this->output->set_output(json_encode($data));

    }
}
