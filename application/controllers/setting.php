<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

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

            	$text = "SELECT * FROM tb_setting where parameter NOT IN ('dbr')";
			$d['data'] = $this->app_model->manualQuery($text);
			
			  	$textdbr = "SELECT * FROM tb_setting where parameter IN ('dbr')";
			$d['datadbr'] = $this->app_model->manualQuery($textdbr);


            $pendidikan = "SELECT * FROM tb_pendidikan";
			$d['listpendidikan'] = $this->app_model->manualQuery($pendidikan);

              $tanggungan = "SELECT * FROM tb_tanggungan";
			$d['listtanggungan'] = $this->app_model->manualQuery($tanggungan);

              $statusrumah = "SELECT * FROM tb_statusrumah";
			$d['liststatusrumah'] = $this->app_model->manualQuery($statusrumah);
                $sumber = "SELECT * FROM tb_sumber";
			$d['listsumber'] = $this->app_model->manualQuery($sumber);
               $pengalaman = "SELECT * FROM tb_pengalaman";
			$d['listpengalaman'] = $this->app_model->manualQuery($pengalaman);

                 $statususaha = "SELECT * FROM tb_statususaha";
			$d['liststatususaha'] = $this->app_model->manualQuery($statususaha);
                  $sektor = "SELECT * FROM tb_sektor";
            	$d['listsektor'] = $this->app_model->manualQuery($sektor);
                  $lokasi = "SELECT * FROM tb_lokasi";
			$d['listlokasi'] = $this->app_model->manualQuery($lokasi);
                    $buku = "SELECT * FROM tb_buku";
			$d['listbuku'] = $this->app_model->manualQuery($buku);
                      $kapasitas = "SELECT * FROM tb_kapasitas";
			$d['listkapasitas'] = $this->app_model->manualQuery($kapasitas);
                          $bahanbaku = "SELECT * FROM tb_bahanbaku";
			$d['listbahanbaku'] = $this->app_model->manualQuery($bahanbaku);
                             $kebijakan = "SELECT * FROM tb_kebijakan";
			$d['listkebijakan'] = $this->app_model->manualQuery($kebijakan);
                                 $jabatan = "SELECT * FROM tb_jabatan";
			$d['listjabatan'] = $this->app_model->manualQuery($jabatan);
                                  $rekening = "SELECT * FROM tb_rekening";
			$d['listrekening'] = $this->app_model->manualQuery($rekening);
            $bentuk = "SELECT * FROM tb_bentuk";
			$d['listbentuk'] = $this->app_model->manualQuery($bentuk);
              $agama = "SELECT * FROM tb_agama";
			$d['listagama'] = $this->app_model->manualQuery($agama);
                 $skim = "SELECT * FROM tb_skim";
			$d['listskim'] = $this->app_model->manualQuery($skim);
                    $penggunaan = "SELECT * FROM tb_penggunaan";
			$d['listpenggunaan'] = $this->app_model->manualQuery($penggunaan);
                      $jnskegunaan = "SELECT * FROM tb_jnskegunaan";
			$d['listjnskegunaan'] = $this->app_model->manualQuery($jnskegunaan);
                      $jnspekerjaan = "SELECT * FROM tb_jnspekerjaan";
			$d['listjnspekerjaan'] = $this->app_model->manualQuery($jnspekerjaan);
                        $jaminan = "SELECT * FROM tb_jaminan";
			$d['listjaminan'] = $this->app_model->manualQuery($jaminan);
                            $nikah = "SELECT * FROM tb_nikah";
			$d['listnikah'] = $this->app_model->manualQuery($nikah);
                              $lama= "SELECT * FROM tb_lama";
			$d['listlama'] = $this->app_model->manualQuery($lama);
                               $lamakerja= "SELECT * FROM tb_lamakerja";
             $d['listlama'] = $this->app_model->manualQuery($lama);
                               $lamakerja= "SELECT * FROM tb_lamakerja";
			$d['listlamakerja'] = $this->app_model->manualQuery($lamakerja);
                                  $kondisi= "SELECT * FROM tb_kondisi";
			$d['listkondisi'] = $this->app_model->manualQuery($kondisi);
                                    $konstanta= "SELECT * FROM tb_konstanta";
			$d['listkonstanta'] = $this->app_model->manualQuery($konstanta);
                                     $scoring= "SELECT * FROM tb_scoring";
			$d['listscoring'] = $this->app_model->manualQuery($scoring);

       		     $this->template->display('setting/view',$d);
		}else{
		     	header('location:'.base_url());
		}
	}

    public function GetJenisDetail(){
     $jenis = $this->input->post('jenis');
   	$text = "SELECT * FROM tb_jns_detail where jenis='$jenis'";
			$data = $this->app_model->manualQuery($text);
    echo'<select name="jenisdetail" id="jenisdetail">';
    echo'<option value=" ">-Pilihan-</option>';
    	foreach($data->result() as $a){
      echo'<option value="'.$a->id_jnsd.'">'.$a->nm_jnsd.'</option>';
      }
      echo'</select>';
	  $this->app_model->Myclose();

    }
    public function GetCombo()
    {
     $text = "SELECT * FROM tb_cabang";
		   	$cabang = $this->app_model->manualQuery($text);

            	foreach($cabang->result() as $cab){
                   	$cab[] = array(
                    'KodeCabang' => $cab->kd_cabang,
                    'NamaCabang' =>$cab->nm_cabang
                    );
                   	echo json_encode($cab);
            	}
				$this->app_model->Myclose();

    }
	public function tambah()
	{
	     $cek = $this->session->userdata('logged_in');
         $level = $this->session->userdata('level');
		if(!empty($cek) and $level=='6' or $level=='0'){
			$d['prg']= $this->config->item('prg');
			$d['web_prg']= $this->config->item('web_prg');

			$d['nama_program']= $this->config->item('nama_program');
			$d['instansi']= $this->config->item('instansi');
			$d['usaha']= $this->config->item('usaha');
			$d['alamat_instansi']= $this->config->item('alamat_instansi');

			$d['judul']="Data Pembiayaan";

			$text = "SELECT * FROM tb_pembiayaan";
			$d['list'] = $this->app_model->manualQuery($text);



             $d['moduls'] = $this->app_model->get_moduls();
			$d['content'] = $this->load->view('pembiayaan/form', $d, true);
			$this->load->view('home',$d);
		}else{
			header('location:'.base_url());
		}
		$this->app_model->Myclose();
	}
    public function getCabang()
    {
    $q = isset($_POST['q']) ? strval($_POST['q']) : '';
    $rs = mysql_query("Select* from tb_cabang where nm_cabang like '%$q%' order by kd_cabang asc");
    $rows = array();
    while($row = mysql_fetch_assoc($rs)){
    $rows[] = $row;
    }
    echo json_encode($rows);
	$this->app_model->Myclose();
    }
	public function edit()
	{
		$cek = $this->session->userdata('logged_in');
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
			$text = "SELECT * FROM tb_pembiayaan WHERE id_pembiayaan='$id'";
			$data = $this->app_model->manualQuery($text);
			//if($data->num_rows() > 0){
				foreach($data->result() as $db){
				    $d['no_aplikasi']	    =$db->no_aplikasi;
                    $d['kd_program']	    =$db->kd_program;
				    $d['channel']		    =$db->channel;
                    $d['kd_cab']		    =$db->kd_cab;
					$d['kd_buk']		    =$db->kd_buk;
                    $d['nm_depan']		    =$db->nm_depan;
					$d['nm_tengah']		    =$db->nm_tengah;
                    $d['nm_belakang']		=$db->nm_belakang;
                    $d['nm_lengkap']		=$db->nm_lengkap;
					$d['no_identitas']		=$db->no_identitas;
                    $d['tempat_lahir']		=$db->tempat_lahir;
                    $d['tanggal_lahir']		=$this->app_model->tgl_str($db->tanggal_lahir);
					$d['tanggal_lahir']		=$db->tanggal_lahir;
                    $d['ibu_kandung']		=$db->ibu_kandung;
                     $d['status_nikah']		=$db->status_nikah;
					$d['jns_pekerjaan']		=$db->jns_pekerjaan;
                    $d['skim']		        =$db->skim;
                    $d['s_penghasilan']	=$db->s_penghasilan;
                     $d['jenisp']		        =$db->jenisp;
                    $d['jenis']		        =$db->jenis;
                    $d['jenisdetail']		=$db->jenisdetail;
                    $d['tujuan_guna']		=$db->tujuan_guna;
                    $d['plafon']		    =$db->plafon;
                    $d['uang_muka']	     	=$db->uang_muka;
                    $d['plafon']		    =$db->plafon;
                    $d['p_umuka']	     	=$db->p_umuka;
                    $d['tipe_margin']	    =$db->tipe_margin;
                    $d['jangka_waktu']		=$db->jangka_waktu;
                    $d['margin']		=$db->margin;
                    $d['angsuran']		=$db->angsuran;
					echo json_encode($d);
				}
			//}

			//$d['content'] = $this->load->view('rekening/tambah', $d, true);
			//$this->load->view('home',$d);
			$this->app_model->Myclose();
		}else{
			header('location:'.base_url());
		}
	}

	public function hapus($parameter,$id)
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
       	$delete=$this->app_model->hapusdata($parameter,$id);
          	echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/setting'>";
			$this->app_model->Myclose();
		}else{
			header('location:'.base_url());
		}
	}

   	public function hapustanggungan()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$id = $this->uri->segment(3);
			$this->app_model->manualQuery("DELETE FROM tb_tanggungan WHERE id_tanggungan='$id'");
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/setting'>";
			$this->app_model->Myclose();
		}else{
			header('location:'.base_url());
		}
	}
    public function hapusstatusrumah()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$id = $this->uri->segment(3);
			$this->app_model->manualQuery("DELETE FROM tb_statusrumah WHERE id_statusrumah='$id'");
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/setting'>";
			$this->app_model->Myclose();
		}else{
			header('location:'.base_url());
		}
	}
     public function hapussumber()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$id = $this->uri->segment(3);
			$this->app_model->manualQuery("DELETE FROM tb_sumber WHERE id_sumber='$id'");
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/setting'>";
			$this->app_model->Myclose();
		}else{
			header('location:'.base_url());
		}
	}

      public function hapuspengalaman()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$id = $this->uri->segment(3);
			$this->app_model->manualQuery("DELETE FROM tb_pengalaman WHERE id_pengalaman='$id'");
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/setting'>";
			$this->app_model->Myclose();
		}else{
			header('location:'.base_url());
		}
	}

       public function hapusstatususaha()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$id = $this->uri->segment(3);
			$this->app_model->manualQuery("DELETE FROM tb_statususaha WHERE id_statususaha='$id'");
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/setting'>";
			$this->app_model->Myclose();
		}else{
			header('location:'.base_url());
		}
	}
 	public function simpan($id)
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
                $parameter=$this->input->post('parameter');
                $up['id_'.$parameter]=$this->input->post('range1');
                $up['nm_'.$parameter]=$this->input->post('range');
                 $up['nilai']=$this->input->post('range2');  
                $up['urutan']=$id;
                $this->app_model->insertData("tb_".$parameter,$up);
			   redirect('setting');
			   $this->app_model->Myclose();


		}else{
				header('location:'.base_url());
		}

    }

    	public function simpansetting()
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
                $parameter=$this->input->post('parameter');
                $up['nm_setting']=$this->input->post('nm_setting');
                   $up['bobot']=$this->input->post('bobot');
                $id['id_setting']=$this->input->post('id_setting');


                $this->app_model->updateData("tb_setting",$up,$id);
			   redirect('setting');
			   $this->app_model->Myclose();


		}else{
				header('location:'.base_url());
		}

    }


     public function update(){

      $parameter=$this->input->post('parameter');

   foreach($_POST['nama'] as $row => $val){

   $data=array(
    "id_".$parameter =>$_POST['nama'][$row]
    ,"nm_".$parameter."1" =>$_POST['nama1'][$row]

   );

 $id=array(
    "id_".$parameter =>$_POST['id'][$row]
    );


   $this->app_model->updateData("tb_".$parameter,$data,$id);
   }

  redirect('setting/');
  $this->app_model->Myclose();

 }



}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */