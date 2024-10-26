<?php
class Program extends CI_Controller{

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




       		     $this->template->display('program/view',$d);
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
    $sidx = isset($_GET['sidx'])?$_GET['sidx']:'id_channel';
    $sord = isset($_GET['sord'])?$_GET['sord']:'';
       $aplikasi = isset($_GET['no_aplikasi'])?$_GET['no_aplikasi']:'';


     $start = $limit*$page - $limit;
    $start = ($start<0)?0:$start;

  $where ="";
   $searchName = isset($_GET['nm_channel']) ? $_GET['nm_channel']: false;
   
    $searchString = isset($_GET['searchString']) ? $_GET['searchString'] : false;

    if ($_GET['_search'] == 'true') {


        if(!empty($searchName)) {

          $searchString.="nm_channel like '%$searchName%'";
          }

       


        $where = "$searchString";
        }

    if(!$sidx)
        $sidx =1;
    $count = $this->db->count_all_results('tb_channel');
    if( $count > 0 ) {
        $total_pages = ceil($count/$limit);
    } else {
        $total_pages = 0;
    }

    if ($page > $total_pages)
        $page=$total_pages;
    $query = $this->app_model->getAllbar($start,$limit,$sidx,$sord,$where,'tb_channel');
    $responce->page = $page;
    $responce->total = $total_pages;
    $responce->records = $count;
    $i=0;
    foreach($query as $row) {
                     $row->detail = " <a href='javascript:tampil_data(\"{$row->id_channel}\")' class='btn btn-xs btn-warning'><i class='glyphicon glyphicon-edit' title='EDIT'></i></a> <a href='javascript:hapusData(\"{$row->id_channel}\")' class='btn btn-xs btn-danger'><i class='glyphicon glyphicon-trash' title='Hapus'></i></a>";

         $responce->rows[$i]['id']=$row->id_channel;
        $responce->rows[$i]['cell']=array($row->nm_channel,$row->detail);
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

          $d['title']="Managemen Program";
           $d['tes']="ok";
           	$ll = "SELECT * FROM tb_channel";
			$d['list'] = $this->app_model->manualQuery($ll);
                        $cabang ="select * from tb_cabang where kd_cabang not like '%S%' and kd_cabang not like '%a%'";
			$d['listcabang'] = $this->app_model->manualQuery($cabang);
              $jns_pembiayaan = "SELECT * FROM tb_jnskegunaan";
		   $d['listjenis'] = $this->app_model->manualQuery($jns_pembiayaan);




               $biaya = "SELECT * FROM tb_channel where id_channel='".$idd."'";
			$d['listbiaya'] = $this->app_model->manualQuery($biaya);

            	$d['biayadata'] = $this->app_model->CariAll($idd,'tb_channel','id_channel');
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
            $qupline = "SELECT * FROM users WHERE level IN ('3','4') ORDER BY username";
			$d['listupline'] = $this->app_model->manualQuery($qupline);

                	$text = "SELECT * FROM users where level IN ('4')";
			$d['listusersss'] = $this->app_model->manualQuery($text);


                $d['no_aplikasi'] = $this->app_model->MaxNoAplikasi();

         $this->load->view('program/view_data',$d);

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
			$this->app_model->manualQuery("DELETE FROM tb_channel WHERE id_channel='$id'");
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

          		$up['nm_channel']=$this->input->post('nm_channel');

                	$id_channel=$this->input->post('id_channel');
                 	$id['id_channel']=$this->input->post('id_channel');

				$data = $this->app_model->CariAll($id_channel,'tb_channel','id_channel');
				if($data==1){
					$this->app_model->updateData("tb_channel",$up,$id);

				}else{
					$this->app_model->insertData("tb_channel",$up);

				}

		}else{
				header('location:'.base_url());
		}

    }
    

}
