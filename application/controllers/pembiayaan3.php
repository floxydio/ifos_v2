<?php
class Pembiayaan extends CI_Controller{

    function __construct(){
        parent::__construct();

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




       		     $this->template->display('pembiayaan/view',$d);
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
           $where ="approval='0' and nm_account ='$nm_account'";
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
              $row->kd_cabang = $this->app_model->CariCabang($row->kd_cabang);

           $row->detail = "<a href='javascript:setujuData(\"{$row->id_pembiayaan}\")' class='btn btn-xs btn-info'> <i class='glyphicon glyphicon-envelope' title='kirim'></i></a> <a href='javascript:tampil_data(\"{$row->id_pembiayaan}\")' class='btn btn-xs btn-warning'><i class='glyphicon glyphicon-edit' title='Edit'></i></a> <a href='javascript:hapusData(\"{$row->id_pembiayaan}\")' class='btn btn-xs btn-danger'><i class='glyphicon glyphicon-trash' title='Hapus'></i></a>";
    $row->nama = $row->nm_lengkap;
          $row->pemohon = $row->plafon;

         $responce->rows[$i]['id']=$row->id_pembiayaan;
        $responce->rows[$i]['cell']=array($row->no_aplikasi,$row->nama,$row->tempat_lahir,$row->tanggal_lahir,$row->ibu_kandung,$row->pemohon,$row->nm_account,$row->detail);
      $i++;
    }
     $this->output->set_output(json_encode($responce));
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

               $biaya = "SELECT * FROM tb_pembiayaan where id_pembiayaan=".$idd;
			$d['listbiaya'] = $this->app_model->manualQuery($biaya);

            	$d['biayadata'] = $this->app_model->CariPem($idd);

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
		 $this->load->view('pembiayaan/view_data',$d);

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
                   $up['uang_muka']=$this->input->post('uang_muka');
                $up['p_umuka']=$this->input->post('p_umuka');
                   $up['s_penghasilan']=$this->input->post('s_penghasilan');
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
    

}
