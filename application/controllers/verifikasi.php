<?php
class Verifikasi extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->output->set_header('Last-Modified:' . gmdate('D,d M Y H:i:s') . 'GMT');
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    $this->output->set_header('Cache-Control: post-checked=0, pre-check=0', false);
    $this->output->set_header('Pragma: no-cache');
  }

  function index()
  {
    $cabang = $this->session->userdata('cabang');
    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');

      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();
      $nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
      $d['listname'] = $this->app_model->manualQuery($nn);
      $ww = "SELECT * FROM tb_cabang ";
      $d['listcabangbsm'] = $this->app_model->manualQuery($ww);
      $rr = "SELECT * FROM tb_jabpegawai ";
      $d['listjabatanbsm'] = $this->app_model->manualQuery($rr);

      $d['title'] = $this->config->item('title');

      $detail = "SELECT * FROM tb_jns_detail";
      $d['listdetail'] = $this->app_model->manualQuery($detail);

      $jnspermohonan = "SELECT * FROM tb_jnspermohonan";
      $d['listjnspermohonan'] = $this->app_model->manualQuery($jnspermohonan);
      $jns = "SELECT * FROM tb_jnspekerjaan where id_jnspekerjaan !='11'";
      $d['listjns'] = $this->app_model->manualQuery($jns);




      $this->template->display('verifikasi/view', $d);
    } else {
      header('location:' . base_url());
    }
  }



  public function fetchDatafromDatabase()
  {
    $nm_account = $this->session->userdata('username');
    $cabang = $this->session->userdata('cabang');

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {
      $resultList = $this->app_model->fetchAllData('no_aplikasi,nm_lengkap,kd_cab,plafon,ibu_kandung', 'tb_pembiayaan', array(), '1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1', '1', '1', '1', '0', '0', '0', '0', 'pic_verifikasi', $nm_account);

      $result = array();
      $button = '';
      $row->detaillink = "verifikasi";
      $row->form = "form";

      $row->jkl = "2";
      $i = 1;
      foreach ($resultList as $key => $value) {
        $button = " <a href='#' onclick='javascript:tampil_data(\"{$value['no_aplikasi']}\",\"{$row->detaillink}\",\"{$row->form}\",\"{$row->jkl}\")'  class='btn btn-xs btn-warning'><i class='glyphicon glyphicon-edit' title='Detail'>Detail</i></a>";
        $app = $value['no_aplikasi'];
        $cekdata = $this->app_model->CariDataParameter($app, 'no_aplikasi', 'tb_pembiayaan_ver', 'no_aplikasi');
        if ($cekdata == '1') {
          $db = $this->app_model->CariTabelAplikasi('tb_pembiayaan_ver', $app);
          $baru['data'][] = array(
            $db['no_aplikasi'],
            $db['nm_lengkap'],
            $db['kd_cab'],
            $db['ibu_kandung'],
            $db['plafon'],
            $button
          );
        } else {

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
    } else {
      header('location:' . base_url());
    }
  }


  public function updateujian()
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {

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
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['kd_cab'] = $this->input->post('kd_cab');
      $up['kd_buk'] = $this->input->post('kd_buk');

      $up['nm_lengkap'] = $this->input->post('nm_lengkap');
      $up['jk'] = $this->input->post('jk');
      $up['no_identitas'] = $this->input->post('no_identitas');
      $up['no_npwp'] = $this->input->post('no_npwp');
      $up['id_card'] = $this->input->post('id_card');
      $up['tempat_lahir'] = $this->input->post('tempat_lahir');
      $up['tanggal_lahir'] = $this->app_model->tgl_sql($this->input->post('tanggal_lahir'));
      $up['ibu_kandung'] = $this->input->post('ibu_kandung');
      $up['tujuan_guna'] = $this->input->post('guna');
      $alamatktp = trim($this->input->post('alamat'));
      $up['alamat'] = $alamatktp;
      $up['jns_permohonan'] = $this->input->post('jns_permohonan');

      $up['kdpos_ktp'] = $this->input->post('kdpos_ktp');
      $up['kelurahan_ktp'] = $this->input->post('kelurahan_ktp');
      $up['kecamatan_ktp'] = $this->input->post('kecamatan_ktp');
      $up['kotamadya_ktp'] = $this->input->post('kotamadya_ktp');
      $up['propinsi_ktp'] = $this->input->post('propinsi_ktp');
      $alamattinggal = trim($this->input->post('alamat_tinggal'));
      $up['alamat_tinggal'] = $alamattinggal;
      $up['kdpos_tinggal'] = $this->input->post('kdpos_tinggal');
      $up['kelurahan_tinggal'] = $this->input->post('kelurahan_tinggal');
      $up['kecamatan_tinggal'] = $this->input->post('kecamatan_tinggal');
      $up['kotamadya_tinggal'] = $this->input->post('kotamadya_tinggal');
      $up['propinsi_tinggal'] = $this->input->post('propinsi_tinggal');
      $up['no_tlp'] = $this->input->post('no_tlp');
      $up['no_hp1'] = $this->input->post('no_hp1');
      $up['no_hp2'] = $this->input->post('no_hp2');
      $up['agama'] = $this->input->post('agama');
      $up['status_nikah'] = $this->input->post('status_nikah');
      $up['status_rumah'] = $this->input->post('status_rumah');
      $up['lama'] = $this->input->post('lama');
      $up['pendidikan'] = $this->input->post('pendidikan');
      $up['jt'] = $this->input->post('jt');
      $up['radius'] = $this->input->post('radius');
      $id['no_aplikasi'] = $this->input->post('no_aplikasi');

      $data = $this->app_model->getSelectedData("tb_pasangan", $id);
      if ($data->num_rows() <= 0) {
        $this->app_model->updateData("tb_pembiayaan", $up, $id);
        $this->app_model->insertData("tb_pasangan", $id);
      } else {
        $this->app_model->updateData("tb_pembiayaan", $up, $id);
      }

      $datapem = $this->app_model->getSelectedData("tb_pembiayaan_ver", $id);
      if ($datapem->num_rows() <= 0) {
        $this->app_model->insertData("tb_pembiayaan_ver", $up);
      } else {
        $this->app_model->updateData("tb_pembiayaan_ver", $up, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }
  public function updateujian_ver()
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {

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

      $up['kd_cab'] = $this->input->post('kd_cab');
      $up['kd_buk'] = $this->input->post('kd_buk');
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['nm_lengkap'] = $this->input->post('nm_lengkap');
      $up['jk'] = $this->input->post('jk');
      $up['no_identitas'] = $this->input->post('no_identitas');
      $up['no_npwp'] = $this->input->post('no_npwp');
      $up['id_card'] = $this->input->post('id_card');
      $up['tempat_lahir'] = $this->input->post('tempat_lahir');
      $up['tanggal_lahir'] = $this->app_model->tgl_sql($this->input->post('tanggal_lahir'));
      $up['ibu_kandung'] = $this->input->post('ibu_kandung');
      $up['tujuan_guna'] = $this->input->post('guna');
      $alamatktp = trim($this->input->post('alamat'));
      $up['alamat'] = $alamatktp;
      $up['jns_permohonan'] = $this->input->post('jns_permohonan');

      $up['kdpos_ktp'] = $this->input->post('kdpos_ktp');
      $up['kelurahan_ktp'] = $this->input->post('kelurahan_ktp');
      $up['kecamatan_ktp'] = $this->input->post('kecamatan_ktp');
      $up['kotamadya_ktp'] = $this->input->post('kotamadya_ktp');
      $up['propinsi_ktp'] = $this->input->post('propinsi_ktp');
      $alamattinggal = trim($this->input->post('alamat_tinggal'));
      $up['alamat_tinggal'] = $alamattinggal;
      $up['kdpos_tinggal'] = $this->input->post('kdpos_tinggal');
      $up['kelurahan_tinggal'] = $this->input->post('kelurahan_tinggal');
      $up['kecamatan_tinggal'] = $this->input->post('kecamatan_tinggal');
      $up['kotamadya_tinggal'] = $this->input->post('kotamadya_tinggal');
      $up['propinsi_tinggal'] = $this->input->post('propinsi_tinggal');
      $up['no_tlp'] = $this->input->post('no_tlp');
      $up['no_hp1'] = $this->input->post('no_hp1');
      $up['no_hp2'] = $this->input->post('no_hp2');
      $up['agama'] = $this->input->post('agama');
      $up['status_nikah'] = $this->input->post('status_nikah');
      $up['status_rumah'] = $this->input->post('status_rumah');
      $up['lama'] = $this->input->post('lama');
      $up['pendidikan'] = $this->input->post('pendidikan');
      $up['jt'] = $this->input->post('jt');
      $up['radius'] = $this->input->post('radius');
      $id['no_aplikasi'] = $this->input->post('no_aplikasi');

      $data = $this->app_model->getSelectedData("tb_pembiayaan_ver", $id);
      if ($data->num_rows() <= 0) {
        $this->app_model->insertData("tb_pembiayaan_ver", $up);
      } else {
        $this->app_model->updateData("tb_pembiayaan_ver", $up, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }

  public function updatebaru($kata, $tabel)
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {

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

      //     $up['kd_cab']=$this->input->post('kd_cab');
      //        $up['kd_buk']=$this->input->post('kd_buk');

      $up['' . $kata] = $this->input->post('verifikasi');

      $id['no_aplikasi'] = $this->input->post('no_aplikasi');
      $ss['no_aplikasi'] = $this->input->post('no_aplikasi');
      $id['field'] = $this->input->post('field');
      $uv['no_aplikasi'] = $this->input->post('no_aplikasi');
      $uv['kolom'] = $this->input->post('kolom');
      $uv['form'] = $this->input->post('form');
      $uv['field'] = $this->input->post('field');
      $uv['inputan'] = $this->input->post('inputan');
      $uv['verifikasi'] = $this->input->post('verifikasi');
      $ud['kolom'] = $this->input->post('kolom');
      $ud['form'] = $this->input->post('form');
      $ud['field'] = $this->input->post('field');
      $ud['verifikasi'] = $this->input->post('verifikasi');;

      $data = $this->app_model->getSelectedData("tb_verifikasi", $id);
      if ($data->num_rows() <= 0) {
        $this->app_model->updateData("" . $tabel, $up, $ss);
        $this->app_model->insertData("tb_verifikasi", $uv);
      } else {
        $this->app_model->updateData("" . $tabel, $up, $ss);
        $this->app_model->updateData("tb_verifikasi", $ud, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }

  public function updatetabel($kata, $tabel)
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {

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

      //     $up['kd_cab']=$this->input->post('kd_cab');
      //        $up['kd_buk']=$this->input->post('kd_buk');

      $up['' . $kata] = $this->input->post('verifikasi');

      $id['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');

      $data = $this->app_model->getSelectedData("" . $tabel, $id);
      if ($data->num_rows() <= 0) {
        $this->app_model->insertData("" . $tabel, $up);
      } else {
        $this->app_model->updateData("" . $tabel, $up, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }

  public function import_excel($no_aplikasi)
  {
    if (isset($_FILES["file"]["name"])) {
      $cekdata = $this->app_model->CariDataParameter($no_aplikasi, 'no_aplikasi', 'tb_pembiayaan_ver', 'no_aplikasi');
      if ($cekdata == '1') {
        $db = $this->app_model->CariTabelAplikasi('tb_pembiayaan_ver', $no_aplikasi);
      } else {
        $db = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);
      }
      $angsuran  = str_replace('.', '', $db['angsuran']);
      $jmlangsuran = $angsuran * $db['jangka_waktu'];
      $path = $_FILES["file"]["tmp_name"];
      $object = PHPExcel_IOFactory::load($path);
      foreach ($object->getWorksheetIterator() as $worksheet) {
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        for ($row = 2; $row <= $highestRow; $row++) {
          $tanggal_angsuran = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
          $angsuran_pokok = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
          $angsuran_margin = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
          $angsuran = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
          $temp_data[] = array(
            'no_aplikasi'  => $no_aplikasi,
            'tanggal_angsuran'  => $tanggal_angsuran,
            'angsuran_pokok'  => $angsuran_pokok,
            'angsuran_margin'  => $angsuran_margin,
            'angsuran'  => $angsuran
          );
          $total = $total + $angsuran;
        }
      }
      $jumlahrow = $highestRow - 1;
      if ($jumlahrow == $db['jangka_waktu'] and $total == $jmlangsuran) {
        $insert = $this->app_model->insert($temp_data);
        $d['msg'] = 'Data Imported successfully';
        $d['tanda'] = "success";
      } else {
        $d['msg'] = "Data Tidak Sesuai dengan jangka waktu dan jumlah angsuran" . $jmlangsuran;
        $d['tanda'] = 'error';
      }
    } else {
      $d['msg'] = "Tidak ada file yang masuk";
      $d['tanda'] = 'error';
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($d));
  }

  public function hapusangsuran()
  {
    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {
      $id = $this->input->post('kode');
      $this->app_model->manualQuery("DELETE FROM tbl_data2 WHERE no_aplikasi='$id'");
    } else {
      header('location:' . base_url());
    }
  }
  public function hapusreview()
  {
    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {
      $id = $this->input->post('kdobjekakad');
      $this->app_model->manualQuery("DELETE FROM tb_surat WHERE id_surat='$id'");
    } else {
      header('location:' . base_url());
    }
  }
  public function hapussyarat()
  {
    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {
      $id = $this->input->post('kdobjekakad');
      $this->app_model->manualQuery("DELETE FROM  tb_tab_realisasi_subutama WHERE id_realisasi_utama='$id'");
    } else {
      header('location:' . base_url());
    }
  }
  public function hapusobjek()
  {
    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {
      $id = $this->input->post('kdobjekakad');
      $this->app_model->manualQuery("DELETE FROM akad_objek WHERE id_objek='$id'");
    } else {
      header('location:' . base_url());
    }
  }
  public function fetch($no_aplikasi)
  {

    $v = "SELECT * FROM tbl_data2 where no_aplikasi ='$no_aplikasi'";
    $data = $this->app_model->manualQuery($v);

    $output = '
       <h3 align="center">Upload Jadwal Angsuran</h3>
     <table class="table table-striped table-bordered">
     <tr>
      <th>Tanggal Angsuran</th>
       <th>Angsuran Pokok</th>
       <th>Angsuran Margin</th>
       <th>Angsuran</th>
     </tr>

    ';

    foreach ($data->result() as $row) {

      $output .= '

      <tr>

      <td>' . $row->tanggal_angsuran . '</td>
       <td>' . number_format($row->angsuran_pokok) . '</td>
       <td>' . number_format($row->angsuran_margin) . '</td>
        <td>' . number_format($row->angsuran) . '</td>
      </tr>

      ';
    }

    $output .= '</table>';

    echo $output;
  }

  public function updatesyarat()
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['nama_realisasisub'] = $this->input->post('txtreal');
      $up['menu_utama'] = $this->input->post('menu');
      $this->app_model->insertData("tb_tab_realisasi_subutama", $up);
    } else {
      header('location:' . base_url());
    }
  }
  public function updatesurat()
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['nm_surat'] = $this->input->post('nm_surat');
      $this->app_model->insertData("tb_surat", $up);
    } else {
      header('location:' . base_url());
    }
  }

  public function updateobjek()
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['namabarang'] = $this->input->post('nm_objek');
      $up['rincian'] = $this->input->post('txtrincian');
      $up['satuan'] = $this->input->post('satuan');
      $up['lokasi'] = $this->input->post('txtlokasi');
      $up['pemasok'] = $this->input->post('txtpemasok');
      $up['harga'] = $this->input->post('txtharga');
      $up['nilai'] = $this->input->post('txtnilai');


      $this->app_model->insertData("akad_objek", $up);
    } else {
      header('location:' . base_url());
    }
  }

  public function updatebarudetail($kata, $tabel)
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {

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

      //     $up['kd_cab']=$this->input->post('kd_cab');
      //        $up['kd_buk']=$this->input->post('kd_buk');

      $up['' . $kata] = $this->input->post('verifikasi');

      $id['no_aplikasi'] = $this->input->post('no_aplikasi');
      $ss['no_aplikasi'] = $this->input->post('no_aplikasi');
      $id['field'] = $this->input->post('field');
      $uv['no_aplikasi'] = $this->input->post('no_aplikasi');
      $uv['master_input'] = $this->input->post('master_input');
      $uv['master_verifikasi'] = $this->input->post('master_verifikasi');
      $uv['kolom'] = $this->input->post('kolom');
      $uv['form'] = $this->input->post('form');
      $uv['field'] = $this->input->post('field');
      $uv['inputan'] = $this->input->post('inputan');
      $uv['verifikasi'] = $this->input->post('verifikasi');
      $ud['master_verifikasi'] = $this->input->post('master_verifikasi');
      $ud['kolom'] = $this->input->post('kolom');
      $ud['form'] = $this->input->post('form');
      $ud['field'] = $this->input->post('field');
      $ud['verifikasi'] = $this->input->post('verifikasi');;

      $data = $this->app_model->getSelectedData("tb_verifikasi_detail", $id);
      if ($data->num_rows() <= 0) {
        $this->app_model->updateData("" . $tabel, $up, $ss);
        $this->app_model->insertData("tb_verifikasi_detail", $uv);
      } else {
        $this->app_model->updateData("" . $tabel, $up, $ss);
        $this->app_model->updateData("tb_verifikasi_detail", $ud, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }


  public function updatepas()
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {

      $noaplikasi = $this->input->post('no_aplikasi');
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['nm_lengkap'] = $this->input->post('nm_lengkap');
      $up['id_cardnikah'] = $this->input->post('id_cardnikah');
      $up['no_identitas'] = $this->input->post('no_identitas');
      $up['id_card'] = $this->input->post('id_card');
      $up['id_jabatan'] = $this->input->post('id_jabatan');
      $up['tempat_lahir'] = $this->input->post('tempat_lahir');
      $up['tanggal_lahir'] = $this->input->post('tanggal_lahir');
      $up['alamat'] = trim($this->input->post('alamat'));
      $up['kdpos_ktp'] = $this->input->post('kdpos_ktp');
      $up['kelurahan_ktp'] = $this->input->post('kelurahan_ktp');
      $up['kecamatan_ktp'] = $this->input->post('kecamatan_ktp');
      $up['kotamadya_ktp'] = $this->input->post('kotamadya_ktp');
      $up['propinsi_ktp'] = $this->input->post('propinsi_ktp');
      $up['alamat_tinggal'] = trim($this->input->post('alamat_tinggal'));
      $up['kdpos_tinggal'] = $this->input->post('kdpos_tinggal');
      $up['kelurahan_tinggal'] = $this->input->post('kelurahan_tinggal');
      $up['kecamatan_tinggal'] = $this->input->post('kecamatan_tinggal');
      $up['kotamadya_tinggal'] = $this->input->post('kotamadya_tinggal');
      $up['propinsi_tinggal'] = $this->input->post('propinsi_tinggal');
      $up['no_tlp'] = $this->input->post('no_tlp');
      $up['no_hp1'] = $this->input->post('no_hp1');
      $up['no_hp2'] = $this->input->post('no_hp2');

      $json = json_encode($up);
      $buk = json_decode($json);

      $id['no_aplikasi'] = $this->input->post('no_aplikasi');
      $data = $this->app_model->getSelectedData("tb_pasangan", $id);
      if ($data->num_rows() <= 0) {
        $this->app_model->insertData("tb_pasangan", $buk);
      } else {
        $this->app_model->updateData("tb_pasangan", $buk, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }

  public function updatepas_ver()
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {

      $noaplikasi = $this->input->post('no_aplikasi');
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['nm_lengkap'] = $this->input->post('nm_lengkap');
      $up['id_cardnikah'] = $this->input->post('id_cardnikah');
      $up['no_identitas'] = $this->input->post('no_identitas');
      $up['id_card'] = $this->input->post('id_card');
      $up['id_jabatan'] = $this->input->post('id_jabatan');
      $up['tempat_lahir'] = $this->input->post('tempat_lahir');
      $up['tanggal_lahir'] = $this->input->post('tanggal_lahir');
      $up['alamat'] = trim($this->input->post('alamat'));
      $up['kdpos_ktp'] = $this->input->post('kdpos_ktp');
      $up['kelurahan_ktp'] = $this->input->post('kelurahan_ktp');
      $up['kecamatan_ktp'] = $this->input->post('kecamatan_ktp');
      $up['kotamadya_ktp'] = $this->input->post('kotamadya_ktp');
      $up['propinsi_ktp'] = $this->input->post('propinsi_ktp');
      $up['alamat_tinggal'] = trim($this->input->post('alamat_tinggal'));
      $up['kdpos_tinggal'] = $this->input->post('kdpos_tinggal');
      $up['kelurahan_tinggal'] = $this->input->post('kelurahan_tinggal');
      $up['kecamatan_tinggal'] = $this->input->post('kecamatan_tinggal');
      $up['kotamadya_tinggal'] = $this->input->post('kotamadya_tinggal');
      $up['propinsi_tinggal'] = $this->input->post('propinsi_tinggal');
      $up['no_tlp'] = $this->input->post('no_tlp');
      $up['no_hp1'] = $this->input->post('no_hp1');
      $up['no_hp2'] = $this->input->post('no_hp2');

      $json = json_encode($up);
      $buk = json_decode($json);

      $id['no_aplikasi'] = $this->input->post('no_aplikasi');
      $data = $this->app_model->getSelectedData("tb_pasangan_ver", $id);
      if ($data->num_rows() <= 0) {
        $this->app_model->insertData("tb_pasangan_ver", $buk);
      } else {
        $this->app_model->updateData("tb_pasangan_ver", $buk, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }
  public function updatepas1()
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {


      $noaplikasi = $this->input->post('no_aplikasi');
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['nm_lengkap'] = $this->input->post('nm_lengkap');
      $up['id_cardnikah'] = $this->input->post('id_cardnikah');
      $up['no_identitas'] = $this->input->post('no_identitas');
      $up['id_card'] = $this->input->post('id_card');
      $up['id_jabatan'] = $this->input->post('id_jabatan');
      $up['tempat_lahir'] = $this->input->post('tempat_lahir');
      $up['tanggal_lahir'] = $this->input->post('tanggal_lahir');
      $up['alamat'] = trim($this->input->post('alamat'));
      $up['kdpos_ktp'] = $this->input->post('kdpos_ktp');
      $up['kelurahan_ktp'] = $this->input->post('kelurahan_ktp');
      $up['kecamatan_ktp'] = $this->input->post('kecamatan_ktp');
      $up['kotamadya_ktp'] = $this->input->post('kotamadya_ktp');
      $up['propinsi_ktp'] = $this->input->post('propinsi_ktp');
      $up['alamat_tinggal'] = trim($this->input->post('alamat_tinggal'));
      $up['kdpos_tinggal'] = $this->input->post('kdpos_tinggal');
      $up['kelurahan_tinggal'] = $this->input->post('kelurahan_tinggal');
      $up['kecamatan_tinggal'] = $this->input->post('kecamatan_tinggal');
      $up['kotamadya_tinggal'] = $this->input->post('kotamadya_tinggal');
      $up['propinsi_tinggal'] = $this->input->post('propinsi_tinggal');
      $up['no_tlp'] = $this->input->post('no_tlp');
      $up['no_hp1'] = $this->input->post('no_hp1');
      $up['no_hp2'] = $this->input->post('no_hp2');

      $id['no_aplikasi'] = $this->input->post('no_aplikasi');
      $json = json_encode($up);
      $buk = json_decode($json);

      $data = $this->app_model->getSelectedData("tb_dpekerjaan", $id);
      if ($data->num_rows() <= 0) {

        $this->app_model->insertData("tb_pasangan", $buk);
      } else {

        $this->app_model->updateData("tb_pasangan", $buk, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }
  public function updatekeu()
  {
    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek) and $level == '3' or $level == '0') {
      $ud['no_aplikasi'] = $this->input->post('no_aplikasi');
      $ud['s_penghasilan'] = $this->input->post('x_AndaMhs');
      $ud['jenisp'] = $this->input->post('jenisp');

      $noaplikasi = $this->input->post('no_aplikasi');
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['gaji_bulan'] = trim($this->input->post('gaji_bulan'));
      $up['peng_tambahan'] = trim($this->input->post('peng_tambahan'));
      $up['peng_utamapasangan'] = trim($this->input->post('peng_utamapasangan'));
      $up['peng_tambahanpasangan'] = trim($this->input->post('peng_tambahanpasangan'));
      $up['total_penghasilan'] = trim($this->input->post('total_penghasilan'));
      $up['rekening'] = $this->input->post('rekening');
      $up['biaya_hidup'] = trim($this->input->post('biaya_hidup'));
      /*   $up['biaya_lain']=$this->input->post('biaya_lain');          */
      $up['angsuran_pemohon'] = trim($this->input->post('angsuran_pemohon'));
      $up['angsuran_bsm'] = trim($this->input->post('angsuran_bsm'));
      $up['angsuran_pasangan'] = trim($this->input->post('angsuran_pasangan'));
      $sisa_penghasilan = $this->input->post('sisa_penghasilan');
      $sisa2 = str_replace(',', '.', $sisa_penghasilan);
      $up['sisa_penghasilan'] = $sisa2;




      $id['no_aplikasi'] = $this->input->post('no_aplikasi');
      $data = $this->app_model->getSelectedData("tb_keuangan", $id);
      if ($data->num_rows() <= 0) {
        $this->app_model->updateData("tb_pembiayaan", $ud, $id);
        $this->app_model->insertData("tb_keuangan", $up);
      } else {
        $this->app_model->updateData("tb_pembiayaan", $ud, $id);
        $this->app_model->updateData("tb_keuangan", $up, $id);
      }
      $datapem = $this->app_model->getSelectedData("tb_pembiayaan_ver", $id);
      if ($datapem->num_rows() <= 0) {
        $this->app_model->insertData("tb_pembiayaan_ver", $ud);
      } else {
        $this->app_model->updateData("tb_pembiayaan_ver", $ud, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }

  public function updatekeu_ver()
  {
    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek) and $level == '3' or $level == '0') {
      $ud['no_aplikasi'] = $this->input->post('no_aplikasi');
      $ud['s_penghasilan'] = $this->input->post('x_AndaMhs');
      $ud['jenisp'] = $this->input->post('jenisp');

      $noaplikasi = $this->input->post('no_aplikasi');
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['gaji_bulan'] = trim($this->input->post('gaji_bulan'));
      $up['peng_tambahan'] = trim($this->input->post('peng_tambahan'));
      $up['peng_utamapasangan'] = trim($this->input->post('peng_utamapasangan'));
      $up['peng_tambahanpasangan'] = trim($this->input->post('peng_tambahanpasangan'));
      $up['total_penghasilan'] = trim($this->input->post('total_penghasilan'));
      $up['rekening'] = $this->input->post('rekening');
      $up['biaya_hidup'] = trim($this->input->post('biaya_hidup'));
      /*   $up['biaya_lain']=$this->input->post('biaya_lain');          */
      $up['angsuran_pemohon'] = trim($this->input->post('angsuran_pemohon'));
      $up['angsuran_bsm'] = trim($this->input->post('angsuran_bsm'));
      $up['angsuran_pasangan'] = trim($this->input->post('angsuran_pasangan'));
      $sisa_penghasilan = $this->input->post('sisa_penghasilan');
      $sisa2 = str_replace(',', '.', $sisa_penghasilan);
      $up['sisa_penghasilan'] = $sisa2;




      $id['no_aplikasi'] = $this->input->post('no_aplikasi');
      $data = $this->app_model->getSelectedData("tb_keuangan_ver", $id);
      if ($data->num_rows() <= 0) {
        $this->app_model->updateData("tb_pembiayaan_ver", $ud, $id);
        $this->app_model->insertData("tb_keuangan_ver", $up);
      } else {
        $this->app_model->updateData("tb_pembiayaan_ver", $ud, $id);
        $this->app_model->updateData("tb_keuangan_ver", $up, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }

  public function updatekeu2()
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {

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
      $ud['s_penghasilan'] = $this->input->post('x_AndaMhs');
      $ud['jenisp'] = $this->input->post('jenisp');
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['penjualan_bulan'] = trim($this->input->post('penjualan_bulan'));
      $up['hpp'] = trim($this->input->post('hpp'));
      $up['total_biaya'] = trim($this->input->post('total_biaya'));
      $up['penghasilan_bersih'] = trim($this->input->post('penghasilan_bersih'));
      $up['peng_tambahan2'] = trim($this->input->post('peng_tambahan2'));
      $up['peng_utamapasangan2'] = trim($this->input->post('peng_utamapasangan2'));
      $up['peng_tambahanpasangan2'] = trim($this->input->post('peng_tambahanpasangan2'));
      $up['total_penghasilan2'] = trim($this->input->post('total_penghasilan2'));
      $up['rekening'] = $this->input->post('rekening1');
      $up['biaya_hidup'] = trim($this->input->post('biaya_hidup1'));
      /*  $up['biaya_lain']=$this->input->post('biaya_lain1');     */
      $up['angsuran_pemohon'] = trim($this->input->post('angsuran_pemohon1'));
      $up['angsuran_bsm'] = trim($this->input->post('angsuran_bsm1'));
      $up['angsuran_pasangan'] = trim($this->input->post('angsuran_pasangan1'));
      $sisa_penghasilan1 = $this->input->post('sisa_penghasilan1');
      $sisa21 = str_replace(',', '.', $sisa_penghasilan1);
      $up['sisa_penghasilan'] = $sisa21;

      $id['no_aplikasi'] = $this->input->post('no_aplikasi');
      $data = $this->app_model->getSelectedData("tb_keuangan", $id);
      if ($data->num_rows() <= 0) {
        $this->app_model->updateData("tb_pembiayaan", $ud, $id);
        $this->app_model->insertData("tb_keuangan", $up);
      } else {
        $this->app_model->updateData("tb_pembiayaan", $ud, $id);
        $this->app_model->updateData("tb_keuangan", $up, $id);
      }

      $datapem = $this->app_model->getSelectedData("tb_pembiayaan_ver", $id);
      if ($datapem->num_rows() <= 0) {
        $this->app_model->insertData("tb_pembiayaan_ver", $ud);
      } else {
        $this->app_model->updateData("tb_pembiayaan_ver", $ud, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }

  public function updatekeu2_ver()
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {

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
      $ud['s_penghasilan'] = $this->input->post('x_AndaMhs');
      $ud['jenisp'] = $this->input->post('jenisp');
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['penjualan_bulan'] = trim($this->input->post('penjualan_bulan'));
      $up['hpp'] = trim($this->input->post('hpp'));
      $up['total_biaya'] = trim($this->input->post('total_biaya'));
      $up['penghasilan_bersih'] = trim($this->input->post('penghasilan_bersih'));
      $up['peng_tambahan2'] = trim($this->input->post('peng_tambahan2'));
      $up['peng_utamapasangan2'] = trim($this->input->post('peng_utamapasangan2'));
      $up['peng_tambahanpasangan2'] = trim($this->input->post('peng_tambahanpasangan2'));
      $up['total_penghasilan2'] = trim($this->input->post('total_penghasilan2'));
      $up['rekening'] = $this->input->post('rekening1');
      $up['biaya_hidup'] = trim($this->input->post('biaya_hidup1'));
      /*  $up['biaya_lain']=$this->input->post('biaya_lain1');     */
      $up['angsuran_pemohon'] = trim($this->input->post('angsuran_pemohon1'));
      $up['angsuran_bsm'] = trim($this->input->post('angsuran_bsm1'));
      $up['angsuran_pasangan'] = trim($this->input->post('angsuran_pasangan1'));
      $sisa_penghasilan1 = $this->input->post('sisa_penghasilan1');
      $sisa21 = str_replace(',', '.', $sisa_penghasilan1);
      $up['sisa_penghasilan'] = $sisa21;

      $id['no_aplikasi'] = $this->input->post('no_aplikasi');
      $data = $this->app_model->getSelectedData("tb_keuangan_ver", $id);
      if ($data->num_rows() <= 0) {
        $this->app_model->updateData("tb_pembiayaan_ver", $ud, $id);
        $this->app_model->insertData("tb_keuangan_ver", $up);
      } else {
        $this->app_model->updateData("tb_pembiayaan_ver", $ud, $id);
        $this->app_model->updateData("tb_keuangan_ver", $up, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }

  public function updatekerjaan()
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {

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
      $dd['jns_pekerjaan'] = $this->input->post('jns');
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');

      $up['nm_perusahaan'] = $this->input->post('nm_perusahaan');
      $up['bentuk'] = $this->input->post('bentuk');
      $alamatktp = trim($this->input->post('alamat'));
      $up['alamat_perusahaan'] = $alamatktp;
      $up['kdpos_perusahaan'] = $this->input->post('kdpos_perusahaan');
      $up['kelurahan_perusahaan'] = $this->input->post('kelurahan_perusahaan');
      $up['kecamatan_perusahaan'] = $this->input->post('kecamatan_perusahaan');
      $up['kotamadya_perusahaan'] = $this->input->post('kotamadya_perusahaan');
      $up['propinsi_perusahaan'] = $this->input->post('propinsi_perusahaan');
      $up['no_tlpperusahaan'] = $this->input->post('no_tlpperusahaan');
      $up['no_ext'] = $this->input->post('no_ext');
      $up['jabatan'] = $this->input->post('jabatan');
      $up['sektor_ekonomi'] = $this->input->post('sektor_ekonomi');
      $up['sektor_unggulan'] = $this->input->post('sektor_unggulan');
      $up['lama_kerja'] = $this->input->post('lama_kerja');
      $up['status_usaha'] = $this->input->post('status_usaha');
      $up['jml_karyawan'] = $this->input->post('jml_karyawan');
      $up['kondisi_usaha'] = $this->input->post('kondisi_usaha');
      $up['lokasi_usaha'] = $this->input->post('lokasi_usaha');
      $up['pembukuan'] = $this->input->post('pembukuan');
      $up['kapasitas'] = $this->input->post('kapasitas');
      $up['bahan_baku'] = $this->input->post('bahan_baku');
      $up['kebijakan'] = $this->input->post('kebijakan');



      $id['no_aplikasi'] = $this->input->post('no_aplikasi');
      $data = $this->app_model->getSelectedData("tb_dpekerjaan", $id);
      if ($data->num_rows() <= 0) {
        $this->app_model->updateData("tb_pembiayaan", $dd, $id);
        $this->app_model->insertData("tb_dpekerjaan", $up);
      } else {
        $this->app_model->updateData("tb_pembiayaan", $dd, $id);
        $this->app_model->updateData("tb_dpekerjaan", $up, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }

  public function updatekerjaan_ver()
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {

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
      $dd['jns_pekerjaan'] = $this->input->post('jns');
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');

      $up['nm_perusahaan'] = $this->input->post('nm_perusahaan');
      $up['bentuk'] = $this->input->post('bentuk');
      $alamatktp = trim($this->input->post('alamat'));
      $up['alamat_perusahaan'] = $alamatktp;
      $up['kdpos_perusahaan'] = $this->input->post('kdpos_perusahaan');
      $up['kelurahan_perusahaan'] = $this->input->post('kelurahan_perusahaan');
      $up['kecamatan_perusahaan'] = $this->input->post('kecamatan_perusahaan');
      $up['kotamadya_perusahaan'] = $this->input->post('kotamadya_perusahaan');
      $up['propinsi_perusahaan'] = $this->input->post('propinsi_perusahaan');
      $up['no_tlpperusahaan'] = $this->input->post('no_tlpperusahaan');
      $up['no_ext'] = $this->input->post('no_ext');
      $up['jabatan'] = $this->input->post('jabatan');
      $up['sektor_ekonomi'] = $this->input->post('sektor_ekonomi');
      $up['sektor_unggulan'] = $this->input->post('sektor_unggulan');
      $up['lama_kerja'] = $this->input->post('lama_kerja');
      $up['status_usaha'] = $this->input->post('status_usaha');
      $up['jml_karyawan'] = $this->input->post('jml_karyawan');
      $up['kondisi_usaha'] = $this->input->post('kondisi_usaha');
      $up['lokasi_usaha'] = $this->input->post('lokasi_usaha');
      $up['pembukuan'] = $this->input->post('pembukuan');
      $up['kapasitas'] = $this->input->post('kapasitas');
      $up['bahan_baku'] = $this->input->post('bahan_baku');
      $up['kebijakan'] = $this->input->post('kebijakan');



      $id['no_aplikasi'] = $this->input->post('no_aplikasi');
      $data = $this->app_model->getSelectedData("tb_dpekerjaan_ver", $id);
      if ($data->num_rows() <= 0) {
        $this->app_model->updateData("tb_pembiayaan_ver", $dd, $id);
        $this->app_model->insertData("tb_dpekerjaan_ver", $up);
      } else {
        $this->app_model->updateData("tb_pembiayaan_ver", $dd, $id);
        $this->app_model->updateData("tb_dpekerjaan_ver", $up, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }


  public function updatebiaya()
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $noaplikasi = $this->input->post('no_aplikasi');
      $angsuran = str_replace(",", ".", $this->input->post('angsuran'));
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['skim'] = $this->input->post('skim');
      $up['jenis'] = $this->input->post('jenis');
      $up['plafon'] = $this->input->post('plafon');
      $up['uang_muka'] = '0';
      $up['p_umuka'] = '0';
      $up['jangka_waktu'] = $this->input->post('jangka_waktu');

      $biaya_admin = $this->input->post('biaya_admin');
      $admin = str_replace(',', '', $biaya_admin);
      $biaya_ujrah = $this->input->post('biaya_ujrah');
      $ujrah = str_replace(',', '', $biaya_ujrah);
      $up['biaya_admin'] = $admin;
      $up['biaya_ujrah'] = $ujrah;
      $up['margin'] = $this->input->post('margin');
      $up['angsuran'] = $angsuran;
      $up['programbuk'] = $this->input->post('nm_perusahaan');
      $up['sumber'] = $this->input->post('sumber');
      $up['pengalaman'] = $this->input->post('pengalaman');
      $up['lama_bank'] = $this->input->post('lama_bank');
      $up['id_kepemilikan'] = $this->input->post('id_kepemilikan');
      $up['id_tipeproduk'] = $this->input->post('id_tipeproduk');
      $id['no_aplikasi'] = $this->input->post('no_aplikasi');
      $data = $this->app_model->getSelectedData("tb_pembiayaan_ver", $id);
      if ($data->num_rows() <= 0) {
        $this->app_model->insertData("tb_pembiayaan_ver", $up);
        $this->app_model->updateData("tb_pembiayaan", $up, $id);
      } else {
        $this->app_model->updateData("tb_pembiayaan", $up, $id);
        $this->app_model->updateData("tb_pembiayaan_ver", $up, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }
  public function updatebiaya_ver()
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $noaplikasi = $this->input->post('no_aplikasi');
      $angsuran = str_replace(",", ".", $this->input->post('angsuran'));
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['skim'] = $this->input->post('skim');
      $up['jenis'] = $this->input->post('jenis');
      $up['plafon'] = $this->input->post('plafon');
      $up['uang_muka'] = '0';
      $up['p_umuka'] = '0';
      $up['jangka_waktu'] = $this->input->post('jangka_waktu');
      $up['margin'] = $this->input->post('margin');
      $biaya_admin = $this->input->post('biaya_admin');
      $admin = str_replace(',', '', $biaya_admin);
      $biaya_ujrah = $this->input->post('biaya_ujrah');
      $ujrah = str_replace(',', '', $biaya_ujrah);
      $up['biaya_admin'] = $admin;
      $up['biaya_ujrah'] = $ujrah;
      $up['angsuran'] = $angsuran;
      $up['programbuk'] = $this->input->post('nm_perusahaan');
      $up['sumber'] = $this->input->post('sumber');
      $up['pengalaman'] = $this->input->post('pengalaman');
      $up['lama_bank'] = $this->input->post('lama_bank');
      $up['id_kepemilikan'] = $this->input->post('id_kepemilikan');
      $up['id_tipeproduk'] = $this->input->post('id_tipeproduk');
      $id['no_aplikasi'] = $this->input->post('no_aplikasi');

      $this->app_model->updateData("tb_pembiayaan_ver", $up, $id);
    } else {
      header('location:' . base_url());
    }
  }
  public function updatedarurat()
  {
    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['nm_lengkap_c'] = $this->input->post('nm_lengkap');
      $alamatktp = trim($this->input->post('alamat'));
      $up['alamat_c'] = $alamatktp;
      $up['kdpos_c'] = $this->input->post('kdpos_ktp');
      $up['kelurahan_c'] = $this->input->post('kelurahan_ktp');

      $up['kecamatan_c'] = $this->input->post('kecamatan_ktp');
      $up['kotamadya_c'] = $this->input->post('kotamadya_ktp');
      $up['no_tlpc'] = $this->input->post('no_tlp');
      $up['propinsi_c'] = $this->input->post('propinsi_ktp');
      $up['no_hp1c'] = $this->input->post('no_hp1');
      $up['no_hp2c'] = $this->input->post('no_hp2');
      $up['cek_data'] = $this->input->post('cek_data');

      $id['no_aplikasi'] = $this->input->post('no_aplikasi');
      $data = $this->app_model->getSelectedData("tb_kontak", $id);
      if ($data->num_rows() <= 0) {
        $this->app_model->insertData("tb_kontak", $up);
      } else {
        $this->app_model->updateData("tb_kontak", $up, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }
  public function updatedarurat_ver()
  {
    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['nm_lengkap_c'] = $this->input->post('nm_lengkap');
      $alamatktp = trim($this->input->post('alamat'));
      $up['alamat_c'] = $alamatktp;
      $up['kdpos_c'] = $this->input->post('kdpos_ktp');
      $up['kelurahan_c'] = $this->input->post('kelurahan_ktp');

      $up['kecamatan_c'] = $this->input->post('kecamatan_ktp');
      $up['kotamadya_c'] = $this->input->post('kotamadya_ktp');
      $up['no_tlpc'] = $this->input->post('no_tlp');
      $up['propinsi_c'] = $this->input->post('propinsi_ktp');
      $up['no_hp1c'] = $this->input->post('no_hp1');
      $up['no_hp2c'] = $this->input->post('no_hp2');
      $up['cek_data'] = $this->input->post('cek_data');

      $id['no_aplikasi'] = $this->input->post('no_aplikasi');
      $data = $this->app_model->getSelectedData("tb_kontak_ver", $id);
      if ($data->num_rows() <= 0) {
        $this->app_model->insertData("tb_kontak_ver", $up);
      } else {
        $this->app_model->updateData("tb_kontak_ver", $up, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }
  public function updateagunan()
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {

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
      $up['no_aplikasi'] = $this->input->post('no_aplikasi');
      $up['nm_agunan'] = $this->input->post('nm_agunan');
      $up['harga_agunan'] = $this->input->post('harga_agunan');
      $up['bobot_agunan'] = $this->input->post('bobot_agunan');
      $up['nilai_agunan'] = $this->input->post('nilai_agunan');
      $id['id_jaminand'] = $this->input->post('id_jaminand');
      $data = $this->app_model->getSelectedData("tb_jaminand", $id);
      if ($data->num_rows() <= 0) {
        $this->app_model->insertData("tb_jaminand", $up);
      } else {
        $this->app_model->updateData("tb_jaminand", $up, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }

  public function simpanjaminandetail()
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {

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
      $nm_agunan = $this->input->post('nm_agunan');
      if ($nm_agunan == '1') {
        $up['kondisi_kendaraan'] = $this->input->post('kondisi_kendaraan');
        $up['tujuan_kendaraan'] = $this->input->post('tujuan_kendaraan');
        $up['negara_kendaraan'] = $this->input->post('negara_kendaraan');
        $up['merk'] = $this->input->post('merk');
        $up['model'] = $this->input->post('model');
        $up['tipe'] = $this->input->post('tipe');
        $up['no_mesin'] = $this->input->post('no_mesin');
        $up['no_rangka'] = $this->input->post('no_rangka');
        $up['no_bpkb'] = $this->input->post('no_bpkb');
        $up['tgl_bpkb'] = $this->input->post('tgl_bpkb');
        $up['alamat_kendaraan'] = $this->input->post('alamat_kendaraan');
        $up['kdpos_kendaraan'] = $this->input->post('kdpos_kendaraan');
        $up['kelurahan_kendaraan'] = $this->input->post('kelurahan_kendaraan');
        $up['kecamatan_kendaraan'] = $this->input->post('kecamatan_kendaraan');
        $up['kotamadya_kendaraan'] = $this->input->post('kotamadya_kendaraan');

        $up['propinsi_kendaraan'] = $this->input->post('propinsi_kendaraan');
        $up['alamat'] = $this->input->post('alamat');
        $up['kdpos'] = $this->input->post('kdpos');
        $up['kelurahan'] = $this->input->post('kelurahan');
        $up['kecamatan'] = $this->input->post('kecamatan');
        $up['kotamadya'] = $this->input->post('kotamadya');

        $up['propinsi'] = $this->input->post('propinsi');
        $id['id_jaminand'] = $this->input->post('id_jaminand');
        $this->app_model->updateData("tb_jaminand", $up, $id);
      } else if ($nm_agunan == "2") {
        $up['atas_nama'] = $this->input->post('atas_nama');
        $up['jenis_bangunan'] = $this->input->post('jenis_bangunan');
        $up['pemilik'] = $this->input->post('pemilik');
        $up['luas_tanah'] = $this->input->post('luas_tanah');
        $up['luas_bangun'] = $this->input->post('luas_bangun');
        $up['umur'] = $this->input->post('umur');
        $up['hub_nasabah'] = $this->input->post('hub');


        $up['alamat_kendaraan'] = $this->input->post('alamat_kendaraan');
        $up['kdpos_kendaraan'] = $this->input->post('kdpos_kendaraan');
        $up['kelurahan_kendaraan'] = $this->input->post('kelurahan_kendaraan');
        $up['kecamatan_kendaraan'] = $this->input->post('kecamatan_kendaraan');
        $up['kotamadya_kendaraan'] = $this->input->post('kotamadya_kendaraan');

        $up['propinsi_kendaraan'] = $this->input->post('propinsi_kendaraan');
        $up['status'] = $this->input->post('status');
        $up['no_sertifikat'] = $this->input->post('no_sertifikat');
        $up['tgl_terbit'] = $this->input->post('tgl_terbit');
        $up['atas_imb'] = $this->input->post('atas_imb');
        $up['no_imb'] = $this->input->post('no_imb');

        $id['id_jaminand'] = $this->input->post('id_jaminand');
        $this->app_model->updateData("tb_jaminand", $up, $id);
      } else if ($nm_agunan == "3") {
        $up['atas_nama'] = $this->input->post('atas_nama');
        $up['no_bilyet'] = $this->input->post('no_bilyet');
        $up['no_seri'] = $this->input->post('no_seri');
        $up['tgl_cash'] = $this->input->post('tgl_cash');
        $up['jumlah'] = $this->input->post('jumlah');
        $up['tgl_valuta'] = $this->input->post('tgl_valuta');

        $up['tgl_jatuhtempo'] = $this->input->post('tgl_jatuhtempo');

        $id['id_jaminand'] = $this->input->post('id_jaminand');
        $this->app_model->updateData("tb_jaminand", $up, $id);
      } else if ($nm_agunan == "4") {
        $up['nm_sk'] = $this->input->post('nm_sk');
        $up['no_rekening'] = $this->input->post('no_rekening');
        $up['nm_bendahara'] = $this->input->post('nm_bendahara');
        $up['payroll'] = $this->input->post('payroll');
        $up['no_sk'] = $this->input->post('no_sk');
        $up['no_pks'] = $this->input->post('no_pks');

        $up['tgl_sk'] = $this->input->post('tgl_sk');

        $id['id_jaminand'] = $this->input->post('id_jaminand');
        $this->app_model->updateData("tb_jaminand", $up, $id);
      } else if ($nm_agunan == "5") {
        $up['jenis_alat'] = $this->input->post('jenis_alat');
        $up['atas_nama'] = $this->input->post('atas_nama');
        $up['negara_mesin'] = $this->input->post('negara_mesin');
        $up['merk_mesin'] = $this->input->post('merk_mesin');
        $up['tahun'] = $this->input->post('tahun');
        $up['no_faktur'] = $this->input->post('no_faktur');
        $up['spec'] = $this->input->post('spec');
        $up['pemilikmesin'] = $this->input->post('pemilikmesin');
        $up['kondisi_mesin'] = $this->input->post('kondisi_mesin');
        $up['status_pakai'] = $this->input->post('status_pakai');

        $up['bukti_pemilik'] = $this->input->post('bukti_pemilik');
        $up['no_pemilik'] = $this->input->post('no_pemilik');
        $id['id_jaminand'] = $this->input->post('id_jaminand');
        $this->app_model->updateData("tb_jaminand", $up, $id);
      } else if ($nm_agunan == "6") {
        $up['karat'] = $this->input->post('karat');
        $up['sertifikat_perusahaan'] = $this->input->post('sertifikat_perusahaan');
        $up['berat'] = $this->input->post('berat');
        $up['no_sertifikat'] = $this->input->post('no_sertifikat');
        $up['no_faktur'] = $this->input->post('no_faktur');
        $up['harga_emas'] = $this->input->post('harga_emas');
        $up['tgl_harga'] = $this->input->post('tgl_harga');
        $id['id_jaminand'] = $this->input->post('id_jaminand');
        $this->app_model->updateData("tb_jaminand", $up, $id);
      } else if ($nm_agunan == "7") {
        $up['nm_pihak'] = $this->input->post('nm_pihak');
        $up['no_kontrak'] = $this->input->post('no_kontrak');
        $up['tgl_piutang'] = $this->input->post('tgl_piutang');
        $up['umur_piutang'] = $this->input->post('umur_piutang');
        $up['pihak_hutang'] = $this->input->post('pihak_hutang');
        $id['id_jaminand'] = $this->input->post('id_jaminand');
        $this->app_model->updateData("tb_jaminand", $up, $id);
      } else if ($nm_agunan == "8") {
        $up['atas_nama'] = $this->input->post('atas_nama');
        $up['alamat_kendaraan'] = $this->input->post('alamat_kendaraan');
        $up['kdpos_kendaraan'] = $this->input->post('kdpos_kendaraan');
        $up['kelurahan_kendaraan'] = $this->input->post('kelurahan_kendaraan');
        $up['kecamatan_kendaraan'] = $this->input->post('kecamatan_kendaraan');
        $up['kotamadya_kendaraan'] = $this->input->post('kotamadya_kendaraan');

        $up['propinsi_kendaraan'] = $this->input->post('propinsi_kendaraan');
        $up['status'] = $this->input->post('status');
        $up['no_sertifikat'] = $this->input->post('no_sertifikat');
        $up['tgl_terbit'] = $this->input->post('tgl_terbit');
        $up['hub_nasabah'] = $this->input->post('hubnasabah');
        $up['runtuk'] = $this->input->post('runtuk');
        $up['kondisi_tanah'] = $this->input->post('kondisi_tanah');
        $up['pemilik'] = $this->input->post('pemilik');
        $up['status_jaminan'] = 'sudah diinput';
        $id['id_jaminand'] = $this->input->post('id_jaminand');
        $this->app_model->updateData("tb_jaminand", $up, $id);
      }
    } else {
      header('location:' . base_url());
    }
  }
  public function editagunandetail()
  {
    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
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
      foreach ($data->result() as $db) {
        $d['nm_agunan']      = $db->nm_agunan;
        $d['harga_agunan']      = $db->harga_agunan;

        $d['kondisi_kendaraan']      = $db->kondisi_kendaraan;
        $d['tujuan_kendaraan']      = $db->tujuan_kendaraan;
        $d['negara_kendaraan']      = $db->negara_kendaraan;
        $d['merk']      = $db->merk;
        $d['model']      = $db->model;
        $d['tipe']      = $db->tipe;
        $d['no_mesin']      = $db->no_mesin;
        $d['no_rangka']      = $db->no_rangka;
        $d['no_bpkb']      = $db->no_bpkb;
        $d['tgl_bpkb']      = $db->tgl_bpkb;
        $d['alamat_kendaraan']      = $db->alamat_kendaraan;
        $d['kdpos_kendaraan']      = $db->kdpos_kendaraan;
        $d['kelurahan_kendaraan']      = $db->kelurahan_kendaraan;
        $d['kecamatan_kendaraan']      = $db->kecamatan_kendaraan;
        $d['kotamadya_kendaraan']      = $db->kotamadya_kendaraan;
        $d['propinsi_kendaraan']      = $db->propinsi_kendaraan;
        $d['alamat']      = $db->alamat;
        $d['kdpos']      = $db->kdpos_kendaraan;
        $d['kelurahan']      = $db->kelurahan;
        $d['kecamatan']      = $db->kecamatan;
        $d['kotamadya']      = $db->kotamadya;
        $d['propinsi']      = $db->propinsi;
        $d['jenis_bangunan']      = $db->jenis_bangunan;
        $d['pemilik']      = $db->pemilik;
        $d['luas_tanah']      = $db->luas_tanah;
        $d['luas_bangun']      = $db->luas_bangun;
        $d['umur']      = $db->umur;
        $d['hubnasabah']      = $db->hubnasabah;
        $d['atas_nama']      = $db->atas_nama;
        $d['status']      = $db->status;
        $d['no_sertifikat']      = $db->no_sertifikat;
        $d['tgl_terbit']      = $db->tgl_terbit;
        $d['atas_imb']      = $db->atas_imb;
        $d['no_imb']      = $db->no_imb;
        $d['no_bilyet']      = $db->no_bilyet;
        $d['no_seri']      = $db->no_seri;
        $d['tgl_cash']      = $db->tgl_cash;
        $d['jumlah']      = $db->jumlah;
        $d['tgl_valuta']      = $db->tgl_valuta;
        $d['tgl_jatuhtempo']      = $db->tgl_jatuhtempo;
        $d['nm_sk']      = $db->nm_sk;
        $d['no_rekening']      = $db->no_rekening;
        $d['nm_bendahara']      = $db->nm_bendahara;
        $d['payroll']      = $db->payroll;
        $d['no_sk']      = $db->no_sk;
        $d['no_pks']      = $db->no_pks;
        $d['tgl_sk']      = $db->tgl_sk;
        $d['jenis_alat']      = $db->jenis_alat;
        $d['negara_mesin']      = $db->negara_mesin;
        $d['merk_mesin']      = $db->merk_mesin;
        $d['tahun']      = $db->tahun;
        $d['no_faktur']      = $db->no_faktur;
        $d['bukti_pemilik']      = $db->bukti_pemilik;
        $d['no_pemilik']      = $db->no_pemilik;
        $d['karat']      = $db->karat;
        $d['sertifikat_perusahaan']      = $db->sertifikat_perusahaan;
        $d['berat']      = $db->berat;
        $d['nm_pihak']      = $db->nm_pihak;
        $d['no_kontrak']      = $db->no_kontrak;
        $d['tgl_piutang']      = $db->tgl_piutang;
        $d['pihak_hutang']      = $db->pihak_hutang;
        $d['bobot_agunan']      = $db->bobot_agunan;
        $d['nilai_agunan']      = $db->nilai_agunan;
        $d['spec']      = $db->spec;
        $d['pemilikmesin']      = $db->pemilikmesin;
        $d['kondisi_mesin']      = $db->kondisi_mesin;
        $d['status_pakai']      = $db->status_pakai;
        $d['harga_emas']      = $db->harga_emas;
        $d['tgl_harga']      = $db->tgl_harga;
        $d['umur_piutang']      = $db->umur_piutang;
        $d['hub_nasabah']      = $db->hub_nasabah;
        $d['runtukkosong']      = $db->runtuk;
        $d['kondisi_tanah']      = $db->kondisi_tanah;
        $this->output->set_output(json_encode($d));
      }
      //}

      //$d['content'] = $this->load->view('rekening/tambah', $d, true);
      //$this->load->view('home',$d);
    } else {
      header('location:' . base_url());
    }
  }

  public function updatesend()
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $account = $this->session->userdata('username');

      $no_aplikasi = $this->input->post('no_aplikasi');

      $this->app_model->cariHistori($no_aplikasi, "14", $account);
      $this->app_model->cariTahapan($no_aplikasi, "4", "approval_verifikasi", "pic_persetujuan", $account, "konfirmasi_persetujuan", "1");
    } else {
      header('location:' . base_url());
    }
  }
}
