<?php
class Parameter extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->output->set_header('Last-Modified:' . gmdate('D,d M Y H:i:s') . 'GMT');
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    $this->output->set_header('Cache-Control: post-checked=0, pre-check=0', false);
    $this->output->set_header('Pragma: no-cache');
  }

  public function updatedata($no_aplikasi, $link, $formdata, $tabe)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');
      $id = $this->input->post('no_aplikasi');
      $d['aplikasi'] = $no_aplikasi;
      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();
      $nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
      $d['listname'] = $this->app_model->manualQuery($nn);
      $ww = "SELECT * FROM tb_cabang ";
      $d['listcabangbsm'] = $this->app_model->manualQuery($ww);
      $rr = "SELECT * FROM tb_jabpegawai ";
      $d['listjabatanbsm'] = $this->app_model->manualQuery($rr);

      $tabs = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=0";
      $d['listtabs'] = $this->app_model->manualQuery($tabs);

      $d['tahapantab'] = $this->app_model->CariPadaTahapan($tabe);
      if ($link == "detail") {
        $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);
      } else {
        $cekdata = $this->app_model->CariDataParameter($no_aplikasi, 'no_aplikasi', 'tb_pembiayaan_ver', 'no_aplikasi');
        if ($cekdata == '1') {
          $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan_ver', $no_aplikasi);

          $dj = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);
          $d['nm_lengkap'] = $this->app_model->CekParameterLike($dj['nm_lengkap'], 'nm_lengkap', 'tb_pembiayaan_ver', 'nm_lengkap', $no_aplikasi, 'cek');
          $d['kd_buk'] = $this->app_model->CekParameterLike($dj['kd_buk'], 'kd_buk', 'tb_pembiayaan_ver', 'kd_buk', $no_aplikasi, 'error');
          $d['ibu_kandung'] = $this->app_model->CekParameterLike($dj['ibu_kandung'], 'ibu_kandung', 'tb_pembiayaan_ver', 'ibu_kandung', $no_aplikasi, 'cek');
          $d['no_identitas'] = $this->app_model->CekParameterLike($dj['no_identitas'], 'no_identitas', 'tb_pembiayaan_ver', 'no_identitas', $no_aplikasi, 'cek');
          $d['jk'] = $this->app_model->CekParameterLike($dj['jk'], 'jk', 'tb_pembiayaan_ver', 'jk', $no_aplikasi, 'error');
          $d['kd_cab'] = $this->app_model->CekParameterLike($dj['kd_cab'], 'kd_cab', 'tb_pembiayaan_ver', 'kd_cab', $no_aplikasi, 'error');
          $d['id_card'] = $this->app_model->CekParameterLike($dj['id_card'], 'id_card', 'tb_pembiayaan_ver', 'id_card', $no_aplikasi, 'error');
          $d['no_npwp'] = $this->app_model->CekParameterLike($dj['no_npwp'], 'no_npwp', 'tb_pembiayaan_ver', 'no_npwp', $no_aplikasi, 'cek');
          $d['tempat_lahir'] = $this->app_model->CekParameterLike($dj['tempat_lahir'], 'tempat_lahir', 'tb_pembiayaan_ver', 'tempat_lahir', $no_aplikasi, 'cek');
          $d['tanggal_lahir'] = $this->app_model->CekParameterLike($dj['tanggal_lahir'], 'tanggal_lahir', 'tb_pembiayaan_ver', 'tanggal_lahir', $no_aplikasi, 'cek');
          $d['tujuan_guna'] = $this->app_model->CekParameterLike($dj['tujuan_guna'], 'tujuan_guna', 'tb_pembiayaan_ver', 'tujuan_guna', $no_aplikasi, 'error');
          $d['alamat'] = $this->app_model->CekParameterLike($dj['alamat'], 'alamat', 'tb_pembiayaan_ver', 'alamat', $no_aplikasi, 'cek');
          $d['jns_permohonan'] = $this->app_model->CekParameterLike($dj['jns_permohonan'], 'jns_permohonan', 'tb_pembiayaan_ver', 'jns_permohonan', $no_aplikasi, 'error');
          $d['kdpos_ktp'] = $this->app_model->CekParameterLike($dj['kdpos_ktp'], 'kdpos_ktp', 'tb_pembiayaan_ver', 'kdpos_ktp', $no_aplikasi, 'cek');
          $d['kelurahan_ktp'] = $this->app_model->CekParameterLike($dj['kelurahan_ktp'], 'kelurahan_ktp', 'tb_pembiayaan_ver', 'kelurahan_ktp', $no_aplikasi, 'cek');
          $d['kecamatan_ktp'] = $this->app_model->CekParameterLike($dj['kecamatan_ktp'], 'kecamatan_ktp', 'tb_pembiayaan_ver', 'kecamatan_ktp', $no_aplikasi, 'cek');
          $d['kotamadya_ktp'] = $this->app_model->CekParameterLike($dj['kotamadya_ktp'], 'kotamadya_ktp', 'tb_pembiayaan_ver', 'kotamadya_ktp', $no_aplikasi, 'cek');
          $d['propinsi_ktp'] = $this->app_model->CekParameterLike($dj['propinsi_ktp'], 'propinsi_ktp', 'tb_pembiayaan_ver', 'propinsi_ktp', $no_aplikasi, 'cek');
          $d['kdpos_tinggal'] = $this->app_model->CekParameterLike($dj['kdpos_tinggal'], 'kdpos_tinggal', 'tb_pembiayaan_ver', 'kdpos_tinggal', $no_aplikasi, 'cek');
          $d['kelurahan_tinggal'] = $this->app_model->CekParameterLike($dj['kelurahan_tinggal'], 'kelurahan_tinggal', 'tb_pembiayaan_ver', 'kelurahan_tinggal', $no_aplikasi, 'cek');
          $d['kecamatan_tinggal'] = $this->app_model->CekParameterLike($dj['kecamatan_tinggal'], 'kecamatan_tinggal', 'tb_pembiayaan_ver', 'kecamatan_tinggal', $no_aplikasi, 'cek');
          $d['kotamadya_tinggal'] = $this->app_model->CekParameterLike($dj['kotamadya_tinggal'], 'kotamadya_tinggal', 'tb_pembiayaan_ver', 'kotamadya_tinggal', $no_aplikasi, 'cek');
          $d['propinsi_tinggal'] = $this->app_model->CekParameterLike($dj['propinsi_tinggal'], 'propinsi_tinggal', 'tb_pembiayaan_ver', 'propinsi_tinggal', $no_aplikasi, 'cek');
          $d['alamat_tinggal'] = $this->app_model->CekParameterLike($dj['alamat_tinggal'], 'alamat_tinggal', 'tb_pembiayaan_ver', 'alamat_tinggal', $no_aplikasi, 'cek');
          $d['no_tlp'] = $this->app_model->CekParameterLike($dj['no_tlp'], 'no_tlp', 'tb_pembiayaan_ver', 'no_tlp', $no_aplikasi, 'cek');
          $d['no_hp1'] = $this->app_model->CekParameterLike($dj['no_hp1'], 'no_hp1', 'tb_pembiayaan_ver', 'no_hp1', $no_aplikasi, 'cek');
          $d['no_hp2'] = $this->app_model->CekParameterLike($dj['no_hp2'], 'no_hp2', 'tb_pembiayaan_ver', 'no_hp2', $no_aplikasi, 'cek');
          $d['agama'] = $this->app_model->CekParameterLike($dj['agama'], 'agama', 'tb_pembiayaan_ver', 'agama', $no_aplikasi, 'error');
          $d['status_nikah'] = $this->app_model->CekParameterLike($dj['status_nikah'], 'status_nikah', 'tb_pembiayaan_ver', 'status_nikah', $no_aplikasi, 'error');
          $d['status_rumah'] = $this->app_model->CekParameterLike($dj['status_rumah'], 'status_rumah', 'tb_pembiayaan_ver', 'status_rumah', $no_aplikasi, 'error');
          $d['radius'] = $this->app_model->CekParameterLike($dj['radius'], 'radius', 'tb_pembiayaan_ver', 'radius', $no_aplikasi, 'cek');
          $d['lama'] = $this->app_model->CekParameterLike($dj['lama'], 'lama', 'tb_pembiayaan_ver', 'lama', $no_aplikasi, 'cek');
          $d['pendidikan'] = $this->app_model->CekParameterLike($dj['pendidikan'], 'pendidikan', 'tb_pembiayaan_ver', 'pendidikan', $no_aplikasi, 'error');
          $d['jt'] = $this->app_model->CekParameterLike($dj['jt'], 'jt', 'tb_pembiayaan_ver', 'jt', $no_aplikasi, 'error');
        } else {
          $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);
        }
      }
      $cabang = "select * from tb_cabang where kd_cabang not like '%S%' and kd_cabang not like '%a%'";
      $d['listcabang'] = $this->app_model->manualQuery($cabang);

      $reason = "SELECT * FROM tb_reason";
      $d['listreason'] = $this->app_model->manualQuery($reason);

      $program = "SELECT * FROM tb_channel";
      $d['listprogram'] = $this->app_model->manualQuery($program);
      $tabsheader = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=1";
      $d['listtabsheader'] = $this->app_model->manualQuery($tabsheader);
      $status_rumah = "SELECT * FROM tb_statusrumah";
      $pendidikan = "SELECT * FROM tb_pendidikan";
      $tanggungan = "SELECT * FROM tb_tanggungan";
      $text = "SELECT * FROM tb_card";
      $agama = "SELECT * FROM tb_agama";
      $jk = "SELECT * FROM tb_jk";
      $nikah = "SELECT * FROM tb_nikah";
      $tanyabsm1 = "SELECT * FROM tb_tanyabsm where tb_tanyabsm.no_aplikasi='$no_aplikasi'";
      $listtanyabsm1 = $this->app_model->manualQuery($tanyabsm1);
      $d['listpendidikan'] = $this->app_model->manualQuery($pendidikan);
      $d['listtanggungan'] = $this->app_model->manualQuery($tanggungan);
      $d['liststatusrumah'] = $this->app_model->manualQuery($status_rumah);
      $d['listagama'] = $this->app_model->manualQuery($agama);
      $d['listjk'] = $this->app_model->manualQuery($jk);
      $d['listdata'] = $this->app_model->manualQuery($text);
      $d['listnikah'] = $this->app_model->manualQuery($nikah);
      $tahapan =  $this->app_model->CariPadaTahapan($tabe);
      if ($tahapan == "verifikasi") {
        $pembiayaan = "SELECT * FROM tb_pembiayaan,tb_pasangan,tb_kontak,tb_keuangan,tb_dpekerjaan,tb_jaminand where tb_pembiayaan.no_aplikasi=tb_pasangan.no_aplikasi and tb_pembiayaan.no_aplikasi=tb_dpekerjaan.no_aplikasi and tb_pembiayaan.no_aplikasi=tb_kontak.no_aplikasi and tb_pembiayaan.no_aplikasi=tb_keuangan.no_aplikasi and tb_pembiayaan.no_aplikasi=tb_jaminand.no_aplikasi and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
        $listbiaya = $this->app_model->manualQuery($pembiayaan);
        foreach ($listbiaya->result_array() as $db) {
          if ($db['status_rumah'] == '' or $db['lama'] == '' or $db['pendidikan'] == '' or $db['jt'] == '' and $db['cek_data'] == '' and $db['sumber'] == '' or $db['pengalaman'] == '' and $db['sektor_ekonomi'] == '' or $db['lama_kerja'] == '' or $db['status_usaha'] == '' or $db['kondisi_usaha'] == '' or $db['lokasi_usaha'] == '' or $db['pembukuan'] == '' or $db['kapasitas'] == '' or $db['bahan_baku'] == '' or $db['kebijakan'] == '' and $db['biaya_hidup'] == '' or $db['angsuran_pemohon'] == '' or $db['angsuran_bsm'] == '' or $db['angsuran_pasangan'] == '' or $db['sisa_penghasilan'] == '' and $db['bobot_agunan'] == '' or $db['nilai_agunan'] == '') {
            $d['button'] = '';
            if ($db['nm_agunan'] == '1') {
              if ($db['alamat'] == '' and $db['kdpos'] == '' and $db['kelurahan'] == '' and $db['kecamatan'] == '' and $db['kotamadya'] == '' and $db['propinsi'] == '') {
                $d['button'] = '';
              }
            }
            if ($db['nm_agunan'] == '2') {
              if ($db['jenis_bangunan'] == '' and $db['pemilik'] == '' and $db['luas_tanah'] == '' and $db['luas_bangun'] == '' and $db['umur'] == '' and $db['hubnasabah'] == '') {
                $d['button'] = '';
              }
            }
            if ($db['nm_agunan'] == '5') {
              if ($db['spec'] == '' and $db['pemilikmesin'] == '' and $db['kondisi_mesin'] == '' and $db['status_pakai'] == '') {
                $d['button'] = '';
              }
            }
            if ($db['nm_agunan'] == '6') {
              if ($db['harga_emas'] == '' and $db['tgl_harga'] == '') {
                $d['button'] = '';
              }
            }

            if ($db['nm_agunan'] == '7') {
              if ($db['umur_piutang'] == '' and $db['umur_piutang'] == '') {
                $d['button'] = '';
              }
            }
          } else {
            $d['button'] = '<button type="button" name="send" id="send" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-envelope"></i> Kirim</button>';
          }
        }
      } else {
        $pembiayaan = "SELECT * FROM tb_pembiayaan,tb_pasangan,tb_kontak,tb_keuangan,tb_dpekerjaan,tb_jaminand where tb_pembiayaan.no_aplikasi=tb_pasangan.no_aplikasi and tb_pembiayaan.no_aplikasi=tb_dpekerjaan.no_aplikasi and tb_pembiayaan.no_aplikasi=tb_kontak.no_aplikasi and tb_pembiayaan.no_aplikasi=tb_keuangan.no_aplikasi and tb_pembiayaan.no_aplikasi=tb_jaminand.no_aplikasi and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
        $listbiaya = $this->app_model->manualQuery($pembiayaan);
        if ($listbiaya->num_rows() > 0) {
          $d['button'] = ' <button type="button" name="send" id="send" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-envelope"></i> Kirim</button>';
        }
      }


      $skim = "SELECT * FROM tb_skim";
      $d['listskim'] = $this->app_model->manualQuery($skim);

      $jnspermohonan = "SELECT * FROM tb_jnspermohonan";
      $d['listjnspermohonan'] = $this->app_model->manualQuery($jnspermohonan);
      $jns_pembiayaan = "SELECT * FROM tb_jnskegunaan";
      $d['listjenis'] = $this->app_model->manualQuery($jns_pembiayaan);

      $guna = "SELECT * FROM tb_penggunaan";
      $d['listguna'] = $this->app_model->manualQuery($guna);


      $text = "SELECT * FROM tb_card";
      $agama = "SELECT * FROM tb_agama";
      $jk = "SELECT * FROM tb_jk";
      $nikah = "SELECT * FROM tb_nikah";

      $d['listagama'] = $this->app_model->manualQuery($agama);
      $d['listjk'] = $this->app_model->manualQuery($jk);
      $d['listdata'] = $this->app_model->manualQuery($text);
      $d['listnikah'] = $this->app_model->manualQuery($nikah);



      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }

  function viewkodepos($no_aplikasi, $link, $formdata)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek) and $level == '3' or $level == '0') {
      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');
      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');

      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();
      $d['judul'] = "Verifikasi Data ";
      $id = $this->input->get('no_aplikasi');

      $title = "SELECT * FROM tb_title";
      $d['listtitle'] = $this->app_model->manualQuery($title);
      $d['aplikasi'] = $no_aplikasi;

      $fasilitas = "SELECT * FROM tb_fasilitas where no_aplikasi='$no_aplikasi'";
      $d['listfasilitas'] = $this->app_model->manualQuery($fasilitas);
      $fasilitaslain = "SELECT * FROM tb_fasilitas1 where no_aplikasi='$no_aplikasi'";
      $d['listfasilitaslain'] = $this->app_model->manualQuery($fasilitaslain);

      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }

  function kirimpembiayaan($no_aplikasi, $link, $formdata)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');
      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');

      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();
      $d['judul'] = "Verifikasi Data ";
      $id = $this->input->get('no_aplikasi');

      $title = "SELECT * FROM tb_title";
      $d['listtitle'] = $this->app_model->manualQuery($title);
      $d['aplikasi'] = $no_aplikasi;

      $fasilitas = "SELECT * FROM tb_fasilitas where no_aplikasi='$no_aplikasi'";
      $d['listfasilitas'] = $this->app_model->manualQuery($fasilitas);
      $fasilitaslain = "SELECT * FROM tb_fasilitas1 where no_aplikasi='$no_aplikasi'";
      $d['listfasilitaslain'] = $this->app_model->manualQuery($fasilitaslain);
      $nn = "SELECT * FROM users where nm_cabang='$cabang' and level in ('3','0') ORDER BY username ASC ";
      $d['listname'] = $this->app_model->manualQuery($nn);
      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }

  function kirimadmin($no_aplikasi, $link, $formdata)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');
      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');

      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();
      $d['judul'] = "Verifikasi Data ";
      $id = $this->input->get('no_aplikasi');

      $title = "SELECT * FROM tb_title";
      $d['listtitle'] = $this->app_model->manualQuery($title);
      $d['aplikasi'] = $no_aplikasi;

      $fasilitas = "SELECT * FROM tb_fasilitas where no_aplikasi='$no_aplikasi'";
      $d['listfasilitas'] = $this->app_model->manualQuery($fasilitas);
      $fasilitaslain = "SELECT * FROM tb_fasilitas1 where no_aplikasi='$no_aplikasi'";
      $d['listfasilitaslain'] = $this->app_model->manualQuery($fasilitaslain);
      $nn = "SELECT * FROM users where nm_cabang='$cabang' and level in ('2','0') ORDER BY username ASC ";
      $d['listname'] = $this->app_model->manualQuery($nn);
      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }

  public function updatepasangan($no_aplikasi, $link, $formdata, $tabe)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {

      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');
      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');

      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();

      $nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
      $d['listname'] = $this->app_model->manualQuery($nn);
      $ww = "SELECT * FROM tb_cabang ";
      $d['listcabangbsm'] = $this->app_model->manualQuery($ww);
      $rr = "SELECT * FROM tb_jabpegawai ";
      $d['listjabatanbsm'] = $this->app_model->manualQuery($rr);
      $d['judul'] = "Verifikasi Data ";
      $d['aplikasi'] = $no_aplikasi;
      $tabs = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=0";
      $d['listtabs'] = $this->app_model->manualQuery($tabs);
      $tabsheader = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=1";
      $d['listtabsheader'] = $this->app_model->manualQuery($tabsheader);
      $d['tahapantab'] = $this->app_model->CariPadaTahapan($tabe);
      $m = "SELECT status_nikah FROM tb_pembiayaan where no_aplikasi ='$no_aplikasi'";
      $pembiayaan = $this->app_model->manualQuery($m);
      $m = "SELECT * FROM tb_pasangan where no_aplikasi ='$no_aplikasi'";
      $d['listpasangan'] = $this->app_model->manualQuery($m);

      $text = "SELECT * FROM tb_card";
      $agama = "SELECT * FROM tb_agama";
      $nikah = "SELECT * FROM tb_nikah";
      $jabatan = "SELECT * FROM tb_jnspekerjaan";
      $cekdata = $this->app_model->CariDataParameter($no_aplikasi, 'no_aplikasi', 'tb_pasangan_ver', 'no_aplikasi');
      if ($cekdata == '1') {

        $d['ww'] = $this->app_model->CariTabelAplikasi('tb_pasangan_ver', $no_aplikasi);
        $d['nm_lengkap'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'nm_lengkap', 'cek');
        $d['id_jabatan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'id_jabatan', 'error');

        $d['id_card'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'id_card', 'error');
        $d['id_cardnikah'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'id_cardnikah', 'cek');
        $d['no_identitas'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'no_identitas', 'cek');

        $d['tempat_lahir'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'tempat_lahir', 'cek');
        $d['tanggal_lahir'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'tanggal_lahir', 'cek');
        $d['alamat'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'alamat', 'cek');
        $d['kdpos_ktp'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'kdpos_ktp', 'cek');
        $d['kelurahan_ktp'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'kelurahan_ktp', 'cek');
        $d['kecamatan_ktp'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'kecamatan_ktp', 'cek');
        $d['kotamadya_ktp'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'kotamadya_ktp', 'cek');
        $d['propinsi_ktp'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'propinsi_ktp', 'cek');
        $d['kdpos_tinggal'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'kdpos_tinggal', 'cek');
        $d['kelurahan_tinggal'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'kelurahan_tinggal', 'cek');
        $d['kecamatan_tinggal'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'kecamatan_tinggal', 'cek');
        $d['kotamadya_tinggal'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'kotamadya_tinggal', 'cek');
        $d['propinsi_tinggal'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'propinsi_tinggal', 'cek');
        $d['alamat_tinggal'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'alamat_tinggal', 'cek');
        $d['no_tlp'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'no_tlp', 'cek');
        $d['no_hp1'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'no_hp1', 'cek');
        $d['no_hp2'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pasangan_ver', 'tb_pasangan', 'no_hp2', 'cek');
      } else {
        $d['ww'] = $this->app_model->CariTabelAplikasi('tb_pasangan', $no_aplikasi);
      }
      $d['db'] = $this->app_model->get_nikah($no_aplikasi);
      $d['listjabatan'] = $this->app_model->manualQuery($jabatan);
      $d['listagama'] = $this->app_model->manualQuery($agama);
      $d['listdata'] = $this->app_model->manualQuery($text);
      $d['listnikah'] = $this->app_model->manualQuery($nikah);
      $d['link'] = $link;
      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }

  public function updatepekerjaan($no_aplikasi, $link, $formdata, $tabe)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');
      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');

      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();

      $nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
      $d['listname'] = $this->app_model->manualQuery($nn);
      $ww = "SELECT * FROM tb_cabang ";
      $d['listcabangbsm'] = $this->app_model->manualQuery($ww);
      $rr = "SELECT * FROM tb_jabpegawai ";
      $d['listjabatanbsm'] = $this->app_model->manualQuery($rr);
      $d['tahapantab'] = $this->app_model->CariPadaTahapan($tabe);

      $d['judul'] = "Verifikasi Data ";

      $id = $this->input->get('no_aplikasi');
      $z = "SELECT * FROM tb_pembiayaan where tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['list'] = $this->app_model->manualQuery($z);

      $p = "SELECT * FROM tb_dpekerjaan where no_aplikasi ='$no_aplikasi'";
      $d['listpekerjaan'] = $this->app_model->manualQuery($p);

      $tabsheader = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=1";
      $d['listtabsheader'] = $this->app_model->manualQuery($tabsheader);

      $text = "SELECT * FROM tb_card";
      $sektor = "SELECT * FROM tb_sektor";
      $statususaha = "SELECT * FROM tb_statususaha";
      $kondisi = "SELECT * FROM tb_kondisi";
      $lokasi = "SELECT * FROM tb_lokasi";
      $bahan_baku = "SELECT * FROM tb_bahanbaku";
      $agama = "SELECT * FROM tb_agama";
      $nikah = "SELECT * FROM tb_nikah";
      $jabatan = "SELECT * FROM tb_jabatan";
      $jnspekerjaan = "SELECT * FROM tb_jnspekerjaan";
      $buku = "SELECT * FROM tb_buku";
      $kapasitas = "SELECT * FROM tb_kapasitas";
      $kebijakan = "SELECT * FROM tb_kebijakan";
      $bentuk = "SELECT * FROM tb_bentuk";

      $unggulan = "SELECT * FROM tb_unggulan";
      $d['aplikasi'] = $no_aplikasi;

      $fasilitas = "SELECT * FROM tb_tambahan where no_aplikasi='$no_aplikasi'";
      $d['listtambahkerja'] = $this->app_model->manualQuery($fasilitas);

      $tabs = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=0";
      $d['listtabs'] = $this->app_model->manualQuery($tabs);

      $cekdata = $this->app_model->CariDataParameter($no_aplikasi, 'no_aplikasi', 'tb_dpekerjaan_ver', 'no_aplikasi');
      if ($cekdata == '1') {
        $d['dd'] = $this->app_model->CariTabelAplikasi('tb_dpekerjaan_ver', $no_aplikasi);
        $d['nm_perusahaan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'nm_perusahaan', 'cek');
        $d['bentuk'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'bentuk', 'error');
        $d['alamat_perusahaan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'alamat_perusahaan', 'cek');
        $d['kdpos_perusahaan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'kdpos_perusahaan', 'cek');
        $d['kelurahan_perusahaan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'kelurahan_perusahaan', 'cek');
        $d['kecamatan_perusahaan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'kecamatan_perusahaan', 'cek');
        $d['kotamadya_perusahaan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'kotamadya_perusahaan', 'cek');
        $d['propinsi_perusahaan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'propinsi_perusahaan', 'cek');
        $d['no_tlpperusahaan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'no_tlpperusahaan', 'cek');
        $d['no_ext'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'no_ext', 'cek');
        $d['jabatan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'jabatan', 'error');
        $d['sektor_ekonomi'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'sektor_ekonomi', 'error');
        $d['sektor_unggulan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'sektor_unggulan', 'error');
        $d['lama_kerja'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'lama_kerja', 'cek');
        $d['jml_karyawan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'jml_karyawan', 'cek');
        $d['status_usaha'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'status_usaha', 'error');
        $d['kondisi_usaha'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'kondisi_usaha', 'error');
        $d['lokasi_usaha'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'lokasi_usaha', 'cek');
        $d['pembukuan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'pembukuan', 'cek');
        $d['kapasitas'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'kapasitas', 'error');
        $d['bahan_baku'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'bahan_baku', 'error');
        $d['kebijakan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_dpekerjaan_ver', 'tb_dpekerjaan', 'kebijakan', 'error');

        $data = $this->app_model->CariTabelAplikasi('tb_pembiayaan_ver', $no_aplikasi);
      } else {
        $d['dd'] = $this->app_model->CariTabelAplikasi('tb_dpekerjaan', $no_aplikasi);
      }
      $cekpembiayaan = $this->app_model->CariDataParameter($no_aplikasi, 'no_aplikasi', 'tb_pembiayaan_ver', 'no_aplikasi');
      if ($cekpembiayaan == '1') {
        $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan_ver', $no_aplikasi);
        $d['jns_pekerjaan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pembiayaan_ver', 'tb_pembiayaan', 'jns_pekerjaan', 'error');
      } else {
        $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);
      }
      //  	$d['jp']=$this->app_model->CekParameterLike('3','jns_pekerjaan','tb_pembiayaan_ver','jns_pekerjaan',$no_aplikasi,'error');
      $d['listagama'] = $this->app_model->manualQuery($agama);
      $d['listbentuk'] = $this->app_model->manualQuery($bentuk);
      $d['listbuku'] = $this->app_model->manualQuery($buku);
      $d['listkebijakan'] = $this->app_model->manualQuery($kebijakan);
      $d['listkapasitas'] = $this->app_model->manualQuery($kapasitas);
      $d['listdata'] = $this->app_model->manualQuery($text);
      $d['listkondisi'] = $this->app_model->manualQuery($kondisi);
      $d['listbahanbaku'] = $this->app_model->manualQuery($bahan_baku);
      $d['listsektor'] = $this->app_model->manualQuery($sektor);
      $d['listunggulan'] = $this->app_model->manualQuery($unggulan);

      $d['listlokasi'] = $this->app_model->manualQuery($lokasi);
      $d['liststatususaha'] = $this->app_model->manualQuery($statususaha);
      $d['listnikah'] = $this->app_model->manualQuery($nikah);
      $d['listjabatan'] = $this->app_model->manualQuery($jabatan);
      $d['listjnspekerjaan'] = $this->app_model->manualQuery($jnspekerjaan);
      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }

  public function updatepembiayaan($no_aplikasi, $link, $formdata, $tabe)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');
      $this->load->model('app_model');
      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();
      $nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
      $d['listname'] = $this->app_model->manualQuery($nn);
      $ww = "SELECT * FROM tb_cabang ";
      $d['listcabangbsm'] = $this->app_model->manualQuery($ww);
      $rr = "SELECT * FROM tb_jabpegawai ";
      $d['listjabatanbsm'] = $this->app_model->manualQuery($rr);

      $d['judul'] = "Verifikasi Data  ";

      $id = $this->input->get('no_aplikasi');
      $z = "SELECT * FROM tb_pembiayaan where tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['list'] = $this->app_model->manualQuery($z);
      $d['aplikasi'] = $no_aplikasi;
      $tabs = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=0";
      $d['listtabs'] = $this->app_model->manualQuery($tabs);
      $d['link'] = $link;
      $d['tahapantab'] = $this->app_model->CariPadaTahapan($tabe);
      if ($link == "detail") {
        $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);
      } else {
        $cekdata = $this->app_model->CariDataParameter($no_aplikasi, 'no_aplikasi', 'tb_pembiayaan_ver', 'no_aplikasi');
        if ($cekdata == '1') {
          $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan_ver', $no_aplikasi);
          $dbsd = $this->app_model->CariTabelAplikasi('tb_pembiayaan_ver', $no_aplikasi);
          $produk = $dbsd['id_tipeproduk'];
          $dbsdproduk = $this->app_model->CariParameterLike($produk, 'id_produk', 'tb_jangkawaktu', 'dalam');
          $d['dalam'] = $dbsdproduk;
          $d['id_tipeproduk'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pembiayaan_ver', 'tb_pembiayaan', 'id_tipeproduk', 'error');
          $d['skim'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pembiayaan_ver', 'tb_pembiayaan', 'skim', 'error');
          $d['jenis'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pembiayaan_ver', 'tb_pembiayaan', 'jenis', 'error');
          $d['plafon'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pembiayaan_ver', 'tb_pembiayaan', 'id_tipeproduk', 'error');
          $d['biaya_admin'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pembiayaan_ver', 'tb_pembiayaan', 'skim', 'error');
          $d['biaya_ujrah'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pembiayaan_ver', 'tb_pembiayaan', 'jenis', 'error');
          $d['lama_bank'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pembiayaan_ver', 'tb_pembiayaan', 'lama_bank', 'cek');
          $d['jangka_waktu'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pembiayaan_ver', 'tb_pembiayaan', 'jangka_waktu', 'cek');
          $d['margin'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pembiayaan_ver', 'tb_pembiayaan', 'margin', 'cek');
          $d['angsuran'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pembiayaan_ver', 'tb_pembiayaan', 'angsuran', 'cek');
          $d['sumber'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pembiayaan_ver', 'tb_pembiayaan', 'sumber', 'error');
          $d['pengalaman'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pembiayaan_ver', 'tb_pembiayaan', 'pengalaman', 'error');
          $d['id_kepemilikan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pembiayaan_ver', 'tb_pembiayaan', 'id_kepemilikan', 'error');
        } else {
          $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);
          $dbsd = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);
          $produk = $dbsd['id_tipeproduk'];
          $dbsdproduk = $this->app_model->CariParameterLike($produk, 'id_produk', 'tb_jangkawaktu', 'dalam');
          $d['dalam'] = $dbsdproduk;
        }
      }
      $tabsheader = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=1";
      $d['listtabsheader'] = $this->app_model->manualQuery($tabsheader);
      $text = "SELECT * FROM tb_card";
      $agama = "SELECT * FROM tb_agama";
      $jk = "SELECT * FROM tb_jk";
      $nikah = "SELECT * FROM tb_nikah";

      $skim = "SELECT * FROM tb_skim";
      $d['listskim'] = $this->app_model->manualQuery($skim);

      $kecuali = "SELECT * FROM tb_kecuali";
      $d['listkecuali'] = $this->app_model->manualQuery($kecuali);

      $sumber = "SELECT * FROM tb_sumber";
      $d['listsumber'] = $this->app_model->manualQuery($sumber);

      $pengalaman = "SELECT * FROM tb_pengalaman";
      $d['listpengalaman'] = $this->app_model->manualQuery($pengalaman);


      $jns_pembiayaan = "SELECT * FROM tb_jnskegunaan";
      $d['listjenis'] = $this->app_model->manualQuery($jns_pembiayaan);
      $d['aplikasi'] = $no_aplikasi;



      $fasilitas = "SELECT * FROM tb_fasilitas where no_aplikasi='$no_aplikasi'";
      $d['listfasilitas'] = $this->app_model->manualQuery($fasilitas);
      $fasilitaslain = "SELECT * FROM tb_fasilitas1 where no_aplikasi='$no_aplikasi'";
      $d['listfasilitaslain'] = $this->app_model->manualQuery($fasilitaslain);
      $d['listagama'] = $this->app_model->manualQuery($agama);
      $d['listjk'] = $this->app_model->manualQuery($jk);
      $d['listdata'] = $this->app_model->manualQuery($text);
      $d['listnikah'] = $this->app_model->manualQuery($nikah);
      $kepemilikanhp = "SELECT * FROM tb_milikhp";
      $tipeproduk = "SELECT * FROM tb_produk";
      $d['listmilikhp'] = $this->app_model->manualQuery($kepemilikanhp);
      $d['listtipeproduk'] = $this->app_model->manualQuery($tipeproduk);
      //$this->load->view('cekdokumen/form',$data);
      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }

  public function parameterbiaya()
  {
    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {


      $id = $this->input->post('id');
      $plafon = $this->input->post('plafon');
      $plafonb = str_replace(',', '', $plafon);
      $harga_cicil = $this->app_model->NilaiBiayaEmas($plafonb, $id, '1');
      $harga = number_format($harga_cicil);
      $harga_ujrah = $this->app_model->NilaiBiayaEmas($plafonb, $id, '2');
      $hargar = number_format($harga_ujrah);
      //$this->uri->segment(3);
      $text = "SELECT * FROM tb_produk WHERE id_produk='$id'";
      $data = $this->app_model->manualQuery($text);
      //if($data->num_rows() > 0){
      foreach ($data->result() as $db) {

        $d['biaya_admin']      = $db->biaya_admin;
        $d['biaya_ujrah']      = $db->biaya_ujrah;
        $d['harga_cicil']      = $harga;
        $d['harga_ujrah']      = $hargar;
        $d['produk']      = $id;

        echo json_encode($d);
      }
      //}

      //$d['content'] = $this->load->view('rekening/tambah', $d, true);
      //$this->load->view('home',$d);
    } else {
      header('location:' . base_url());
    }
  }

  public function parameterjangkawaktu()
  {
    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {


      $id = $this->input->post('id');
      $text = "SELECT jangka_waktu,dalam FROM tb_jangkawaktu WHERE id_produk='$id'";
      $data = $this->app_model->manualQuery($text);
      //if($data->num_rows() > 0){
      foreach ($data->result() as $db) {

        $d['jangka_waktu']      = $db->jangka_waktu;
        $d['dalam']      = $db->dalam;

        echo json_encode($d);
      }
      //}

      //$d['content'] = $this->load->view('rekening/tambah', $d, true);
      //$this->load->view('home',$d);
    } else {
      header('location:' . base_url());
    }
  }

  public function parameterjaminan()
  {
    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {


      $id = $this->input->post('id');
      $text = "SELECT bobot_jaminan FROM tb_parameterjaminan WHERE id_parameterjaminan='$id'";
      $data = $this->app_model->manualQuery($text);
      //if($data->num_rows() > 0){
      foreach ($data->result() as $db) {

        $d['bobot_jaminan']      = $db->bobot_jaminan;


        echo json_encode($d);
      }
      //}

      //$d['content'] = $this->load->view('rekening/tambah', $d, true);
      //$this->load->view('home',$d);
    } else {
      header('location:' . base_url());
    }
  }

  public function parameterProduk()
  {
    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {


      $id = $this->input->post('id_produk');
      $margin = $this->input->post('margin');
      $jk = $this->input->post('jangka_waktu');
      $plafon = $this->input->post('plafon');
      $plafond = str_replace(",", "", $plafon);
      $text = "SELECT id_produk FROM tb_paramplafon WHERE id_produk='$id' and margin_min <='$margin' and margin_max >='$margin' and plafon_min <='$plafond' and plafon_max >='$plafond' and jk  >= '$jk'";
      $data = $this->app_model->manualQuery($text);
      if ($data->num_rows() > 0) {
        $hasil = "1";
      } else {
        $hasil = "0";
      }
      $d['id_produk'] = $hasil;


      echo json_encode($d);

      //}

      //$d['content'] = $this->load->view('rekening/tambah', $d, true);
      //$this->load->view('home',$d);
    } else {
      header('location:' . base_url());
    }
  }

  public function updatekontak($no_aplikasi, $link, $formdata, $tabe)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');
      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');

      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();
      $nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
      $d['listname'] = $this->app_model->manualQuery($nn);
      $ww = "SELECT * FROM tb_cabang ";
      $d['listcabangbsm'] = $this->app_model->manualQuery($ww);
      $rr = "SELECT * FROM tb_jabpegawai ";
      $d['listjabatanbsm'] = $this->app_model->manualQuery($rr);

      $d['judul'] = "Verifikasi Data  ";

      $tabsheader = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=1";
      $d['listtabsheader'] = $this->app_model->manualQuery($tabsheader);
      $id = $this->input->get('no_aplikasi');
      $z = "SELECT * FROM tb_pembiayaan where tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['list'] = $this->app_model->manualQuery($z);
      $d['aplikasi'] = $no_aplikasi;
      $text = "SELECT * FROM tb_card";
      $agama = "SELECT * FROM tb_agama";
      $nikah = "SELECT * FROM tb_nikah";
      $jabatan = "SELECT * FROM tb_jabatan";
      $d['aplikasi'] = $no_aplikasi;
      $tabs = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=0";
      $d['listtabs'] = $this->app_model->manualQuery($tabs);
      $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);
      $cekdata = $this->app_model->CariDataParameter($no_aplikasi, 'no_aplikasi', 'tb_kontak_ver', 'no_aplikasi');
      if ($cekdata == '1') {

        $d['ww'] = $this->app_model->CariTabelAplikasi('tb_kontak_ver', $no_aplikasi);
        $d['nm_lengkap_c'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_kontak_ver', 'tb_kontak', 'nm_lengkap_c', 'cek');
        $d['alamat_c'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_kontak_ver', 'tb_kontak', 'alamat_c', 'cek');
        $d['kdpos_c'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_kontak_ver', 'tb_kontak', 'kdpos_c', 'cek');
        $d['kelurahan_c'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_kontak_ver', 'tb_kontak', 'kelurahan_c', 'cek');
        $d['kecamatan_c'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_kontak_ver', 'tb_kontak', 'kecamatan_c', 'cek');
        $d['kotamadya_c'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_kontak_ver', 'tb_kontak', 'kotamadya_c', 'cek');
        $d['propinsi_c'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_kontak_ver', 'tb_kontak', 'propinsi_c', 'cek');
        $d['no_tlpc'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_kontak_ver', 'tb_kontak', 'no_tlpc', 'cek');
        $d['no_hp1c'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_kontak_ver', 'tb_kontak', 'no_hp1c', 'cek');
        $d['no_hp2c'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_kontak_ver', 'tb_kontak', 'no_hp2c', 'cek');
        $d['cek_data'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_kontak_ver', 'tb_kontak', 'cek_data', 'cek');
      } else {
        $d['ww'] = $this->app_model->CariTabelAplikasi('tb_kontak', $no_aplikasi);
      }
      $d['tahapantab'] = $this->app_model->CariPadaTahapan($tabe);

      $d['listagama'] = $this->app_model->manualQuery($agama);
      $d['listdata'] = $this->app_model->manualQuery($text);
      $d['listnikah'] = $this->app_model->manualQuery($nikah);
      $d['listjabatan'] = $this->app_model->manualQuery($jabatan);
      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }

  public function updatekeuangan($no_aplikasi, $link, $formdata, $tabe)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');
      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');

      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();

      $nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
      $d['listname'] = $this->app_model->manualQuery($nn);
      $ww = "SELECT * FROM tb_cabang ";
      $d['listcabangbsm'] = $this->app_model->manualQuery($ww);
      $rr = "SELECT * FROM tb_jabpegawai ";
      $d['listjabatanbsm'] = $this->app_model->manualQuery($rr);

      $d['judul'] = "Verifikasi Data  ";

      $id = $this->input->get('no_aplikasi');
      $z = "SELECT * FROM tb_pembiayaan where tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['list'] = $this->app_model->manualQuery($z);

      $v = "SELECT * FROM tb_keuangan where no_aplikasi ='$no_aplikasi'";
      $d['listkontak'] = $this->app_model->manualQuery($v);
      $tabsheader = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=1";
      $d['listtabsheader'] = $this->app_model->manualQuery($tabsheader);

      $d['tahapantab'] = $this->app_model->CariPadaTahapan($tabe);

      $text = "SELECT * FROM tb_card";
      $agama = "SELECT * FROM tb_agama";
      $nikah = "SELECT * FROM tb_nikah";
      $jabatan = "SELECT * FROM tb_jabatan";
      $rekening = "SELECT * FROM tb_rekening";

      $d['aplikasi'] = $no_aplikasi;
      $tabs = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=0";
      $d['listtabs'] = $this->app_model->manualQuery($tabs);
      $cekpembiayaan = $this->app_model->CariDataParameter($no_aplikasi, 'no_aplikasi', 'tb_pembiayaan_ver', 'no_aplikasi');
      if ($cekpembiayaan == '1') {
        $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan_ver', $no_aplikasi);
        $d['s_penghasilan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pembiayaan_ver', 'tb_pembiayaan', 's_penghasilan', 'error');
        $d['jenisp'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_pembiayaan_ver', 'tb_pembiayaan', 'jenisp', 'error');
      } else {
        $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);
      }
      $cekdata = $this->app_model->CariDataParameter($no_aplikasi, 'no_aplikasi', 'tb_keuangan_ver', 'no_aplikasi');
      if ($cekdata == '1') {
        $d['ww'] = $this->app_model->CariTabelAplikasi('tb_keuangan_ver', $no_aplikasi);
        $d['nn'] = $this->app_model->CariTabelAplikasi('tb_keuangan_ver', $no_aplikasi);
        $d['gaji_bulan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'gaji_bulan', 'cek');
        $d['peng_tambahan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'peng_tambahan', 'cek');
        $d['peng_utamapasangan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'peng_utamapasangan', 'cek');
        $d['total_penghasilan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'total_penghasilan', 'cek');
        $d['rekening'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'rekening', 'error');
        $d['peng_tambahanpasangan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'peng_tambahanpasangan', 'cek');
        $d['biaya_hidup'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'biaya_hidup', 'cek');
        $d['angsuran_pemohon'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'angsuran_pemohon', 'cek');
        $d['angsuran_bsm'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'angsuran_bsm', 'cek');
        $d['angsuran_pasangan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'angsuran_pasangan', 'cek');
        $d['sisa_penghasilan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'sisa_penghasilan', 'cek');
        $d['penjualan_bulan'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'penjualan_bulan', 'cek');
        $d['hpp'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'hpp', 'cek');
        $d['total_biaya'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'total_biaya', 'cek');
        $d['penghasilan_bersih'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'penghasilan_bersih', 'cek');
        $d['peng_tambahan2'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'peng_tambahan2', 'cek');
        $d['peng_utamapasangan2'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'peng_utamapasangan2', 'cek');
        $d['peng_tambahanpasangan2'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'peng_tambahanpasangan2', 'cek');
        $d['total_penghasilan2'] = $this->app_model->CariParameterField($no_aplikasi, 'tb_keuangan_ver', 'tb_keuangan', 'peng_tambahan2', 'cek');
      } else {
        $d['ww'] = $this->app_model->CariTabelAplikasi('tb_keuangan', $no_aplikasi);
        $d['nn'] = $this->app_model->CariTabelAplikasi('tb_keuangan', $no_aplikasi);
      }
      $d['listrekening'] = $this->app_model->manualQuery($rekening);
      $d['listagama'] = $this->app_model->manualQuery($agama);
      $d['listdata'] = $this->app_model->manualQuery($text);
      $d['listnikah'] = $this->app_model->manualQuery($nikah);
      $d['listjabatan'] = $this->app_model->manualQuery($jabatan);
      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }

  public function updatereview($no_aplikasi, $link, $formdata, $tabe)
  {

    $cek = $this->session->userdata('logged_in');
    $cabang = $this->session->userdata('cabang');
    $nm_account = $this->session->userdata('username');
    if (!empty($cek)) {
      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');


      $d['nama_program'] = $this->config->item('nama_program');
      $d['instansi'] = $this->config->item('instansi');
      $d['usaha'] = $this->config->item('usaha');
      $d['alamat_instansi'] = $this->config->item('alamat_instansi');
      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();

      $nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
      $d['listname'] = $this->app_model->manualQuery($nn);
      $ww = "SELECT * FROM tb_cabang ";
      $d['listcabangbsm'] = $this->app_model->manualQuery($ww);
      $rr = "SELECT * FROM tb_jabpegawai ";
      $d['listjabatanbsm'] = $this->app_model->manualQuery($rr);
      $d['listskoring'] = $this->app_model->ScoringProduktifRrg($no_aplikasi);

      $d['judul'] = "Approval ";
      $d['aplikasi'] = $no_aplikasi;
      $tabs = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=0";
      $d['listtabs'] = $this->app_model->manualQuery($tabs);
      $tabsheader = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=1";
      $d['listtabsheader'] = $this->app_model->manualQuery($tabsheader);
      $cekdata = $this->app_model->CariDataParameter($no_aplikasi, 'no_aplikasi', 'tb_pembiayaan_ver', 'no_aplikasi');
      if ($cekdata == '1') {
        $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan_ver', $no_aplikasi);
      } else {
        $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);
      }
      $d['ds'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);

      $id = $this->input->get('no_aplikasi');
      $z = "SELECT * FROM tb_pembiayaan where tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['list'] = $this->app_model->manualQuery($z);


      $unggulan = "SELECT sektor_unggulan,nm_unggulan,lain FROM tb_dpekerjaan,tb_unggulan where tb_dpekerjaan.sektor_unggulan = tb_unggulan.id_unggulan and tb_dpekerjaan.no_aplikasi='$no_aplikasi'";
      $d['listunggulan'] = $this->app_model->manualQuery($unggulan);
      $pasangan = "SELECT nm_lengkap FROM tb_pasangan where no_aplikasi='$no_aplikasi'";
      $d['listpasangan'] = $this->app_model->manualQuery($pasangan);

      $jk = "SELECT tb_jk.nm_jk FROM tb_pembiayaan, tb_jk where tb_pembiayaan.jk = tb_jk.id_jk and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listjk'] = $this->app_model->manualQuery($jk);
      $nikah = "SELECT tb_nikah.nm_nikah FROM tb_pembiayaan, tb_nikah where tb_pembiayaan.status_nikah = tb_nikah.id_nikah and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listnikah'] = $this->app_model->manualQuery($nikah);
      $perusahaan = "SELECT tb_dpekerjaan.nm_perusahaan,tb_dpekerjaan.alamat_perusahaan,tb_dpekerjaan.no_tlpperusahaan,tb_dpekerjaan.lama_kerja FROM tb_dpekerjaan, tb_pembiayaan where tb_pembiayaan.no_aplikasi = tb_dpekerjaan.no_aplikasi and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listperusahaan'] = $this->app_model->manualQuery($perusahaan);

      $jabatan = "SELECT tb_jabatan.nm_jabatan FROM tb_dpekerjaan, tb_jabatan where tb_jabatan.id_jabatan = tb_dpekerjaan.jabatan and tb_dpekerjaan.no_aplikasi='$no_aplikasi'";
      $d['listjabatan'] = $this->app_model->manualQuery($jabatan);

      $kontak = "SELECT nm_lengkap_c,no_tlpc FROM tb_kontak where no_aplikasi='$no_aplikasi'";
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
      foreach ($mm->result_array() as $ii) {
      }
      $ujian = $ii['kd_cabang'];

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


      $keuangan = "SELECT * FROM tb_keuangan where no_aplikasi='$no_aplikasi'";
      $d['listkeuangan'] = $this->app_model->manualQuery($keuangan);

      $ccr = "SELECT nilai_agunan FROM tb_jaminand,tb_pembiayaan where tb_pembiayaan.no_aplikasi = tb_jaminand.no_aplikasi and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listccr'] = $this->app_model->manualQuery($ccr);
      $d['tahapantab'] = $this->app_model->CariPadaTahapan($tabe);


      $text = "SELECT * FROM tb_card";
      $agama = "SELECT * FROM tb_agama";
      $jk = "SELECT * FROM tb_jk";
      $nikah = "SELECT * FROM tb_nikah";

      $pengusul = "SELECT * FROM tb_pembiayaan,users where tb_pembiayaan.nm_account = users.username and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listpengusul'] = $this->app_model->manualQuery($pengusul);

      $pemeriksa = "SELECT * FROM tb_pembiayaan,users where tb_pembiayaan.pic_persetujuan = users.username and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listpemeriksa'] = $this->app_model->manualQuery($pemeriksa);

      $rekomendasi = "SELECT * FROM tb_pembiayaan,users where tb_pembiayaan.pic_pemutus = users.username and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listrekomendasi'] = $this->app_model->manualQuery($rekomendasi);
      $d['listagama'] = $this->app_model->manualQuery($agama);

      $d['listdata'] = $this->app_model->manualQuery($text);

      $linkdata = $link;
      $form = $formdata;

      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }

  public function updatedokumen($no_aplikasi, $link, $formdata, $tabe)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');
      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');

      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();

      $nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
      $d['listname'] = $this->app_model->manualQuery($nn);
      $ww = "SELECT * FROM tb_cabang ";
      $d['listcabangbsm'] = $this->app_model->manualQuery($ww);
      $rr = "SELECT * FROM tb_jabpegawai ";
      $d['listjabatanbsm'] = $this->app_model->manualQuery($rr);

      $tabsheader = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=1";
      $d['listtabsheader'] = $this->app_model->manualQuery($tabsheader);

      $d['judul'] = "Verifikasi Data ";

      $id = $this->input->get('no_aplikasi');
      $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);


      $jaminan = "SELECT * FROM tb_upload where no_aplikasi='$no_aplikasi'";
      $d['listjaminan'] = $this->app_model->manualQuery($jaminan);

      $title = "SELECT * FROM tb_title";
      $d['listtitle'] = $this->app_model->manualQuery($title);

      $d['tahapantab'] = $this->app_model->CariPadaTahapan($tabe);

      $text = "SELECT * FROM upload, tb_dokumen where upload.id_dokumen = tb_dokumen.id_dokumen and tb_dokumen.grup_doc='0' and upload.no_aplikasi = '$no_aplikasi'";
      $dokumen =  "SELECT * FROM upload, tb_dokumen where upload.id_dokumen = tb_dokumen.id_dokumen and tb_dokumen.grup_doc='1' and upload.no_aplikasi = '$no_aplikasi'";
      $jk = "SELECT * FROM upload, tb_dokumen where upload.id_dokumen = tb_dokumen.id_dokumen and tb_dokumen.grup_doc='2' and upload.no_aplikasi = '$no_aplikasi'";
      $nikah = "SELECT * FROM upload, tb_dokumen where upload.id_dokumen = tb_dokumen.id_dokumen and tb_dokumen.grup_doc='3' and upload.no_aplikasi = '$no_aplikasi'";

      $d['aplikasi'] = $no_aplikasi;
      $tabs = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=0";
      $d['listtabs'] = $this->app_model->manualQuery($tabs);

      $d['listdokumen'] = $this->app_model->manualQuery($dokumen);
      $d['listdata'] = $this->app_model->manualQuery($text);
      $d['listnikah'] = $this->app_model->manualQuery($nikah);
      $d['listjk'] = $this->app_model->manualQuery($jk);
      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }


  function editdokumendetail($idbro)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek) and $level == '3' or $level == '0') {
      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');
      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');

      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();


      $text = "select upload.id_dokumen,namaFile,no_aplikasi,ada,ket,id,nm_dokumen from tb_dokumen,upload where tb_dokumen.id_dokumen = upload.id_dokumen and upload.id=" . $idbro;
      $d['listubahdokumen'] = $this->app_model->manualQuery($text);



      $linkdata = 'detail';
      $form = 'formubahdokumen';
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }

  function editdokumendetailverifikasi($idbro)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek) and $level == '3' or $level == '0') {
      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');
      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');

      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();


      $text = "select upload.id_dokumen,namaFile,no_aplikasi,ada,ket,id,nm_dokumen from tb_dokumen,upload where tb_dokumen.id_dokumen = upload.id_dokumen and upload.id=" . $idbro;
      $d['listubahdokumen'] = $this->app_model->manualQuery($text);



      $linkdata = 'verifikasi';
      $form = 'formubahdokumen';
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }


  public function updatejaminan($no_aplikasi, $link, $formdata, $tabe)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');
      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');

      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();

      $nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
      $d['listname'] = $this->app_model->manualQuery($nn);
      $ww = "SELECT * FROM tb_cabang ";
      $d['listcabangbsm'] = $this->app_model->manualQuery($ww);
      $rr = "SELECT * FROM tb_jabpegawai ";
      $d['listjabatanbsm'] = $this->app_model->manualQuery($rr);

      $d['tahapantab'] = $this->app_model->CariPadaTahapan($tabe);

      $tabsheader = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=1";
      $d['listtabsheader'] = $this->app_model->manualQuery($tabsheader);

      $d['judul'] = "Verifikasi Data ";

      $id = $this->input->get('no_aplikasi');
      $z = "SELECT * FROM tb_pembiayaan where tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['list'] = $this->app_model->manualQuery($z);

      $v = "SELECT * FROM tb_keuangan where no_aplikasi ='$no_aplikasi'";
      $d['listkontak'] = $this->app_model->manualQuery($v);

      $d['aplikasi'] = $no_aplikasi;
      $tabs = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=0";
      $d['listtabs'] = $this->app_model->manualQuery($tabs);
      $d['zz'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);
      $text = "SELECT * FROM tb_jaminan";
      $detailjaminan = "SELECT * FROM tb_jaminand, tb_jaminan where tb_jaminand.nm_agunan = tb_jaminan.id_jaminan and no_aplikasi ='$no_aplikasi' ";
      $nikah = "SELECT * FROM tb_nikah";
      $jabatan = "SELECT * FROM tb_jabatan";
      $pks = "SELECT * FROM tb_pks";
      $d['listpks'] = $this->app_model->manualQuery($pks);
      $nasabah = "SELECT * FROM tb_hubnasabah";
      $d['listnasabah'] = $this->app_model->manualQuery($nasabah);
      $pihak = "SELECT * FROM tb_pihak";
      $d['listpihak'] = $this->app_model->manualQuery($pihak);
      $tipe = "SELECT * FROM tb_tipe";
      $d['listtipe'] = $this->app_model->manualQuery($tipe);
      $doktanah = "SELECT * FROM tb_doktanah";
      $d['listdoktanah'] = $this->app_model->manualQuery($doktanah);
      $merk = "SELECT * FROM tb_merk";
      $d['listmerk'] = $this->app_model->manualQuery($merk);
      $model = "SELECT * FROM tb_model";
      $d['listmodel'] = $this->app_model->manualQuery($model);
      $tipemobil = "SELECT * FROM tb_tipemobil";
      $d['listtipemobil'] = $this->app_model->manualQuery($tipemobil);
      $tujuan = "SELECT * FROM tb_tkendaraan";
      $d['listtujuan'] = $this->app_model->manualQuery($tujuan);
      $negara = "SELECT * FROM tb_negara";
      $d['listnegara'] = $this->app_model->manualQuery($negara);
      $bangunan = "SELECT * FROM tb_jnsbngn";
      $d['listbangunan'] = $this->app_model->manualQuery($bangunan);
      $runtuk = "SELECT * FROM tb_runtuk";
      $d['listruntuk'] = $this->app_model->manualQuery($runtuk);
      $kondisitanah = "SELECT * FROM tb_kondisitanah";
      $d['listkondisitanah'] = $this->app_model->manualQuery($kondisitanah);
      $pemilik = "SELECT * FROM tb_pemilik";
      $d['listpemilik'] = $this->app_model->manualQuery($pemilik);
      $spesifik = "SELECT * FROM tb_spesifik";
      $d['listspesifik'] = $this->app_model->manualQuery($spesifik);
      $umurbangunan = "SELECT * FROM tb_umur";
      $d['listumurbangunan'] = $this->app_model->manualQuery($umurbangunan);
      $kondisimesin = "SELECT * FROM tb_kondisimesin";
      $d['listkondisimesin'] = $this->app_model->manualQuery($kondisimesin);
      $statuspakai = "SELECT * FROM tb_statuspakai";
      $d['liststatuspakai'] = $this->app_model->manualQuery($statuspakai);
      $umurpiutang = "SELECT * FROM tb_umurpiutang";
      $d['listumurpiutang'] = $this->app_model->manualQuery($umurpiutang);
      $d['listdetailjaminan'] = $this->app_model->manualQuery($detailjaminan);

      $d['listjaminan'] = $this->app_model->manualQuery($text);
      $d['listnikah'] = $this->app_model->manualQuery($nikah);
      $d['listjabatan'] = $this->app_model->manualQuery($jabatan);

      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }


  function updatetambahdokumen($no_aplikasi, $link, $formdata)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');
      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');

      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();

      $id = $this->input->get('no_aplikasi');

      $title = "SELECT * FROM tb_title";
      $d['listtitle'] = $this->app_model->manualQuery($title);
      $d['aplikasi'] = $no_aplikasi;


      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }

  function updatetambahfasilitas($no_aplikasi, $link, $formdata)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');
      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');

      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();
      $d['judul'] = "Verifikasi Data ";
      $id = $this->input->get('no_aplikasi');

      $title = "SELECT * FROM tb_title";
      $d['listtitle'] = $this->app_model->manualQuery($title);
      $d['aplikasi'] = $no_aplikasi;

      $fasilitas = "SELECT * FROM tb_fasilitas where no_aplikasi='$no_aplikasi'";
      $d['listfasilitas'] = $this->app_model->manualQuery($fasilitas);
      $fasilitaslain = "SELECT * FROM tb_fasilitas1 where no_aplikasi='$no_aplikasi'";
      $d['listfasilitaslain'] = $this->app_model->manualQuery($fasilitaslain);

      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }

  function updatetambahanpekerjaan($no_aplikasi, $link, $formdata)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');
      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');

      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();
      $d['judul'] = "Verifikasi Data ";
      $id = $this->input->get('no_aplikasi');

      $title = "SELECT * FROM tb_title";
      $d['listtitle'] = $this->app_model->manualQuery($title);
      $d['aplikasi'] = $no_aplikasi;

      $jabatan = "SELECT * FROM tb_jabatan";
      $d['listjabatan'] = $this->app_model->manualQuery($jabatan);

      $fasilitas = "SELECT * FROM tb_tambahan where no_aplikasi='$no_aplikasi'";
      $d['listtambahanpekerjaan'] = $this->app_model->manualQuery($fasilitas);

      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }
  public function updatesp3($no_aplikasi, $link, $formdata, $tabe)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $cabang = $this->session->userdata('cabang');
      $nm_account = $this->session->userdata('username');

      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');


      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();
      $nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
      $d['listname'] = $this->app_model->manualQuery($nn);
      $ww = "SELECT * FROM tb_cabang ";
      $d['listcabangbsm'] = $this->app_model->manualQuery($ww);
      $rr = "SELECT * FROM tb_jabpegawai ";
      $d['listjabatanbsm'] = $this->app_model->manualQuery($rr);

      $d['judul'] = "SP3 Pembiayaan";

      $id = $this->input->get('no_aplikasi');
      $z = "SELECT * FROM tb_pembiayaan where tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['list'] = $this->app_model->manualQuery($z);

      $d['tahapantab'] = $this->app_model->CariPadaTahapan($tabe);
      $pasangan = "SELECT * FROM tb_pasangan where no_aplikasi='$no_aplikasi'";
      $d['listpasangan'] = $this->app_model->manualQuery($pasangan);

      $jk = "SELECT * FROM tb_pembiayaan, tb_jk where tb_pembiayaan.jk = tb_jk.id_jk and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listjk'] = $this->app_model->manualQuery($jk);
      $nikah = "SELECT * FROM tb_pembiayaan, tb_nikah where tb_pembiayaan.status_nikah = tb_nikah.id_nikah and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listnikah'] = $this->app_model->manualQuery($nikah);
      $perusahaan = "SELECT * FROM tb_dpekerjaan, tb_pembiayaan where tb_pembiayaan.no_aplikasi = tb_dpekerjaan.no_aplikasi and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listperusahaan'] = $this->app_model->manualQuery($perusahaan);

      $reason = "SELECT * FROM tb_reason";
      $d['listreason'] = $this->app_model->manualQuery($reason);

      $jabatan = "SELECT * FROM tb_dpekerjaan, tb_jabatan where tb_jabatan.id_jabatan = tb_dpekerjaan.jabatan and tb_dpekerjaan.no_aplikasi='$no_aplikasi'";
      $d['listjabatan'] = $this->app_model->manualQuery($jabatan);

      $kontak = "SELECT * FROM tb_kontak where no_aplikasi='$no_aplikasi'";
      $d['listkontak'] = $this->app_model->manualQuery($kontak);


      $empty = "SELECT * FROM tb_sp3 where no_aplikasi='$no_aplikasi'";
      $d['listempty'] = $this->app_model->manualQuery($empty);
      $emptyakad = "SELECT * FROM tb_akad where no_aplikasi='$no_aplikasi'";
      $d['listemptyakad'] = $this->app_model->manualQuery($emptyakad);
      $emptycair = "SELECT * FROM tb_cair where no_aplikasi='$no_aplikasi'";
      $d['listemptycair'] = $this->app_model->manualQuery($emptycair);
      $sektor = "SELECT * FROM tb_dpekerjaan,tb_sektor where tb_dpekerjaan.sektor_ekonomi = tb_sektor.id_sektor and tb_dpekerjaan.no_aplikasi='$no_aplikasi'";
      $d['listsektor'] = $this->app_model->manualQuery($sektor);

      $pendidikan = "SELECT * FROM tb_pembiayaan,tb_pendidikan where tb_pembiayaan.pendidikan = tb_pendidikan.id_pendidikan and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listpendidikan'] = $this->app_model->manualQuery($pendidikan);

      $skim = "SELECT * FROM tb_pembiayaan,tb_skim where tb_pembiayaan.skim = tb_skim.id_skim and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listskim'] = $this->app_model->manualQuery($skim);
      $tujuan = "SELECT * FROM tb_pembiayaan,tb_penggunaan where tb_pembiayaan.tujuan_guna = tb_penggunaan.id_penggunaan and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listtujuan'] = $this->app_model->manualQuery($tujuan);
      $tuju = "SELECT * FROM tb_pembiayaan,tb_jnskegunaan where tb_pembiayaan.jenis = tb_jnskegunaan.id_jnskegunaan and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listtuju'] = $this->app_model->manualQuery($tuju);
      $margin = "SELECT * FROM tb_pembiayaan,tb_tipemargin where tb_pembiayaan.tipe_margin = tb_tipemargin.id_tipemargin and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listmargin'] = $this->app_model->manualQuery($margin);

      $text = "SELECT * FROM tb_jaminan";
      $detailjaminan = "SELECT * FROM tb_jaminand, tb_jaminan where tb_jaminand.nm_agunan = tb_jaminan.id_jaminan and no_aplikasi ='$no_aplikasi' ";
      $d['listdetailjaminan'] = $this->app_model->manualQuery($detailjaminan);

      $jns_pembiayaan = "SELECT * FROM tb_jnskegunaan";
      $d['listjenis'] = $this->app_model->manualQuery($jns_pembiayaan);

      $tolak = "SELECT * FROM tb_tolak";
      $d['listtolak'] = $this->app_model->manualQuery($tolak);

      $users = "SELECT * FROM users where username = '$nm_account'";
      $d['listusers'] = $this->app_model->manualQuery($users);




      $fasilitas = "SELECT * FROM tb_fasilitas";
      $d['listfasilitas'] = $this->app_model->manualQuery($fasilitas);

      $limit = "SELECT * FROM tb_limit where username = '$nm_account'";
      $d['listlimit'] = $this->app_model->manualQuery($limit);

      $keuanganbiaya = "SELECT * FROM tb_keuangan,tb_pembiayaan where tb_pembiayaan.no_aplikasi = tb_keuangan.no_aplikasi and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listkeuanganbiaya'] = $this->app_model->manualQuery($keuanganbiaya);




      //           $scoring1 = "SELECT * FROM tb_tanggungan,tb_pembiayaan,tb_setting where tb_pembiayaan.jt = tb_tanggungan.id_tanggungan and tb_setting.id_setting = tb_tanggungan.urutan and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      //   $d['listscoring1'] = $this->app_model->manualQuery($scoring1);

      $keuangan = "SELECT * FROM tb_keuangan where no_aplikasi='$no_aplikasi'";
      $d['listkeuangan'] = $this->app_model->manualQuery($keuangan);

      $ccr = "SELECT plafon,sum(nilai_agunan) as agunan FROM tb_jaminand,tb_pembiayaan where tb_pembiayaan.no_aplikasi = tb_jaminand.no_aplikasi and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listccr'] = $this->app_model->manualQuery($ccr);

      $ll = "select * from users,tb_jabpegawai,tb_upliner where users.id_jabatanpeg = tb_jabpegawai.id and users.username=tb_upliner.nm_upliner and tb_upliner.userid='$nm_account'";
      $d['listll'] = $this->app_model->manualQuery($ll);

      $text = "SELECT * FROM tb_card";
      $agama = "SELECT * FROM tb_agama";
      $jk = "SELECT * FROM tb_jk";
      $nikah = "SELECT * FROM tb_nikah";

      $tiperekening = "SELECT * FROM tb_tiperekening";
      $d['listtiperekening'] = $this->app_model->manualQuery($tiperekening);


      $d['listagama'] = $this->app_model->manualQuery($agama);

      $d['listdata'] = $this->app_model->manualQuery($text);
      $d['aplikasi'] = $no_aplikasi;
      $tabs = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=0";
      $d['listtabs'] = $this->app_model->manualQuery($tabs);
      $tabsheader = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=1";
      $d['listtabsheader'] = $this->app_model->manualQuery($tabsheader);
      $cekdata = $this->app_model->CariDataParameter($no_aplikasi, 'no_aplikasi', 'tb_pembiayaan_ver', 'no_aplikasi');
      if ($cekdata == '1') {
        $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan_ver', $no_aplikasi);
      } else {
        $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);
      }
      $d['sp3'] = $this->app_model->CariTabelAplikasi('tb_sp3', $no_aplikasi);
      $d['akad'] = $this->app_model->CariTabelAplikasi('tb_akad', $no_aplikasi);
      $d['cair'] = $this->app_model->CariTabelAplikasi('tb_cair', $no_aplikasi);
      //$this->load->view('cekdokumen/form',$data);

      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }

  public function updatetab($no_aplikasi, $link, $formdata)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $cabang = $this->session->userdata('cabang');
      $nm_account = $this->session->userdata('username');

      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');


      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();
      $nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
      $d['listname'] = $this->app_model->manualQuery($nn);
      $ww = "SELECT * FROM tb_cabang ";
      $d['listcabangbsm'] = $this->app_model->manualQuery($ww);
      $rr = "SELECT * FROM tb_jabpegawai ";
      $d['listjabatanbsm'] = $this->app_model->manualQuery($rr);

      $d['judul'] = "SP3 Pembiayaan";

      $id = $this->input->get('no_aplikasi');

      $syarat = "SELECT * FROM tb_tab_realisasi_subutama WHERE menu_utama='0' and no_aplikasi='$no_aplikasi' ORDER BY id_realisasi_utama ASC";
      $d['listsyarat'] = $this->app_model->manualQuery($syarat);

      $pasangan = "SELECT * FROM tb_pasangan where no_aplikasi='$no_aplikasi'";
      $d['listpasangan'] = $this->app_model->manualQuery($pasangan);

      $jk = "SELECT * FROM tb_pembiayaan, tb_jk where tb_pembiayaan.jk = tb_jk.id_jk and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listjk'] = $this->app_model->manualQuery($jk);
      $nikah = "SELECT * FROM tb_pembiayaan, tb_nikah where tb_pembiayaan.status_nikah = tb_nikah.id_nikah and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listnikah'] = $this->app_model->manualQuery($nikah);
      $perusahaan = "SELECT * FROM tb_dpekerjaan, tb_pembiayaan where tb_pembiayaan.no_aplikasi = tb_dpekerjaan.no_aplikasi and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listperusahaan'] = $this->app_model->manualQuery($perusahaan);

      $reason = "SELECT * FROM tb_reason";
      $d['listreason'] = $this->app_model->manualQuery($reason);

      $jabatan = "SELECT * FROM tb_dpekerjaan, tb_jabatan where tb_jabatan.id_jabatan = tb_dpekerjaan.jabatan and tb_dpekerjaan.no_aplikasi='$no_aplikasi'";
      $d['listjabatan'] = $this->app_model->manualQuery($jabatan);


      $empty = "SELECT * FROM tb_sp3 where no_aplikasi='$no_aplikasi'";
      $d['listempty'] = $this->app_model->manualQuery($empty);
      $surat = "SELECT * FROM tb_surat where no_aplikasi='$no_aplikasi'";
      $d['listsurat'] = $this->app_model->manualQuery($surat);
      $objek = "SELECT * FROM akad_objek where no_aplikasi='$no_aplikasi'";
      $d['listobjek'] = $this->app_model->manualQuery($objek);
      $emptyakad = "SELECT * FROM tb_akad where no_aplikasi='$no_aplikasi'";
      $d['listemptyakad'] = $this->app_model->manualQuery($emptyakad);
      $emptycair = "SELECT * FROM tb_cair where no_aplikasi='$no_aplikasi'";
      $d['listemptycair'] = $this->app_model->manualQuery($emptycair);
      $sektor = "SELECT * FROM tb_dpekerjaan,tb_sektor where tb_dpekerjaan.sektor_ekonomi = tb_sektor.id_sektor and tb_dpekerjaan.no_aplikasi='$no_aplikasi'";
      $d['listsektor'] = $this->app_model->manualQuery($sektor);

      $pendidikan = "SELECT * FROM tb_pembiayaan,tb_pendidikan where tb_pembiayaan.pendidikan = tb_pendidikan.id_pendidikan and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listpendidikan'] = $this->app_model->manualQuery($pendidikan);

      $skim = "SELECT * FROM tb_pembiayaan,tb_skim where tb_pembiayaan.skim = tb_skim.id_skim and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listskim'] = $this->app_model->manualQuery($skim);
      $tujuan = "SELECT * FROM tb_pembiayaan,tb_penggunaan where tb_pembiayaan.tujuan_guna = tb_penggunaan.id_penggunaan and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listtujuan'] = $this->app_model->manualQuery($tujuan);
      $tuju = "SELECT * FROM tb_pembiayaan,tb_jnskegunaan where tb_pembiayaan.jenis = tb_jnskegunaan.id_jnskegunaan and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listtuju'] = $this->app_model->manualQuery($tuju);
      $margin = "SELECT * FROM tb_pembiayaan,tb_tipemargin where tb_pembiayaan.tipe_margin = tb_tipemargin.id_tipemargin and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listmargin'] = $this->app_model->manualQuery($margin);

      $text = "SELECT * FROM tb_jaminan";
      $detailjaminan = "SELECT * FROM tb_jaminand, tb_jaminan where tb_jaminand.nm_agunan = tb_jaminan.id_jaminan and no_aplikasi ='$no_aplikasi' ";
      $d['listdetailjaminan'] = $this->app_model->manualQuery($detailjaminan);

      $jns_pembiayaan = "SELECT * FROM tb_jnskegunaan";
      $d['listjenis'] = $this->app_model->manualQuery($jns_pembiayaan);

      $tolak = "SELECT * FROM tb_tolak";
      $d['listtolak'] = $this->app_model->manualQuery($tolak);

      $users = "SELECT * FROM users where username = '$nm_account'";
      $d['listusers'] = $this->app_model->manualQuery($users);

      $ll = "select * from users,tb_jabpegawai,tb_upliner where users.id_jabatanpeg = tb_jabpegawai.id and users.username=tb_upliner.nm_upliner and tb_upliner.userid='$nm_account'";
      $d['listll'] = $this->app_model->manualQuery($ll);

      $text = "SELECT * FROM tb_card";
      $agama = "SELECT * FROM tb_agama";
      $jk = "SELECT * FROM tb_jk";
      $nikah = "SELECT * FROM tb_nikah";

      $tiperekening = "SELECT * FROM tb_tiperekening";
      $d['listtiperekening'] = $this->app_model->manualQuery($tiperekening);


      $d['listagama'] = $this->app_model->manualQuery($agama);

      $d['listdata'] = $this->app_model->manualQuery($text);
      $d['aplikasi'] = $no_aplikasi;
      $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);
      $d['dbangsuran'] = $this->app_model->CariTabelAplikasi('tbl_data2', $no_aplikasi);
      $d['sp3'] = $this->app_model->CariTabelAplikasi('tb_sp3', $no_aplikasi);
      $d['akad'] = $this->app_model->CariTabelAplikasi('tb_akad', $no_aplikasi);
      $d['cair'] = $this->app_model->CariTabelAplikasi('tb_cair', $no_aplikasi);
      //$this->load->view('cekdokumen/form',$data);

      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }
  public function updatesubtab($no_aplikasi, $menu, $link, $formdata)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $cabang = $this->session->userdata('cabang');
      $nm_account = $this->session->userdata('username');

      $this->load->model('app_model');
      $id = $this->input->post('no_aplikasi');


      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();
      $nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
      $d['listname'] = $this->app_model->manualQuery($nn);
      $ww = "SELECT * FROM tb_cabang ";
      $d['listcabangbsm'] = $this->app_model->manualQuery($ww);
      $rr = "SELECT * FROM tb_jabpegawai ";
      $d['listjabatanbsm'] = $this->app_model->manualQuery($rr);

      $d['judul'] = "SP3 Pembiayaan";

      $id = $this->input->get('no_aplikasi');

      $syarat = "SELECT * FROM tb_tab_realisasi_subutama WHERE menu_utama='$menu' and no_aplikasi='$no_aplikasi' ORDER BY id_realisasi_utama ASC";
      $d['listsyarat'] = $this->app_model->manualQuery($syarat);

      $pasangan = "SELECT * FROM tb_pasangan where no_aplikasi='$no_aplikasi'";
      $d['listpasangan'] = $this->app_model->manualQuery($pasangan);

      $jk = "SELECT * FROM tb_pembiayaan, tb_jk where tb_pembiayaan.jk = tb_jk.id_jk and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listjk'] = $this->app_model->manualQuery($jk);
      $nikah = "SELECT * FROM tb_pembiayaan, tb_nikah where tb_pembiayaan.status_nikah = tb_nikah.id_nikah and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listnikah'] = $this->app_model->manualQuery($nikah);
      $perusahaan = "SELECT * FROM tb_dpekerjaan, tb_pembiayaan where tb_pembiayaan.no_aplikasi = tb_dpekerjaan.no_aplikasi and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listperusahaan'] = $this->app_model->manualQuery($perusahaan);

      $reason = "SELECT * FROM tb_reason";
      $d['listreason'] = $this->app_model->manualQuery($reason);

      $jabatan = "SELECT * FROM tb_dpekerjaan, tb_jabatan where tb_jabatan.id_jabatan = tb_dpekerjaan.jabatan and tb_dpekerjaan.no_aplikasi='$no_aplikasi'";
      $d['listjabatan'] = $this->app_model->manualQuery($jabatan);


      $empty = "SELECT * FROM tb_sp3 where no_aplikasi='$no_aplikasi'";
      $d['listempty'] = $this->app_model->manualQuery($empty);
      $surat = "SELECT * FROM tb_surat where no_aplikasi='$no_aplikasi'";
      $d['listsurat'] = $this->app_model->manualQuery($surat);
      $objek = "SELECT * FROM akad_objek where no_aplikasi='$no_aplikasi'";
      $d['listobjek'] = $this->app_model->manualQuery($objek);
      $emptyakad = "SELECT * FROM tb_akad where no_aplikasi='$no_aplikasi'";
      $d['listemptyakad'] = $this->app_model->manualQuery($emptyakad);
      $emptycair = "SELECT * FROM tb_cair where no_aplikasi='$no_aplikasi'";
      $d['listemptycair'] = $this->app_model->manualQuery($emptycair);
      $sektor = "SELECT * FROM tb_dpekerjaan,tb_sektor where tb_dpekerjaan.sektor_ekonomi = tb_sektor.id_sektor and tb_dpekerjaan.no_aplikasi='$no_aplikasi'";
      $d['listsektor'] = $this->app_model->manualQuery($sektor);

      $pendidikan = "SELECT * FROM tb_pembiayaan,tb_pendidikan where tb_pembiayaan.pendidikan = tb_pendidikan.id_pendidikan and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listpendidikan'] = $this->app_model->manualQuery($pendidikan);

      $skim = "SELECT * FROM tb_pembiayaan,tb_skim where tb_pembiayaan.skim = tb_skim.id_skim and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listskim'] = $this->app_model->manualQuery($skim);
      $tujuan = "SELECT * FROM tb_pembiayaan,tb_penggunaan where tb_pembiayaan.tujuan_guna = tb_penggunaan.id_penggunaan and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listtujuan'] = $this->app_model->manualQuery($tujuan);
      $tuju = "SELECT * FROM tb_pembiayaan,tb_jnskegunaan where tb_pembiayaan.jenis = tb_jnskegunaan.id_jnskegunaan and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listtuju'] = $this->app_model->manualQuery($tuju);
      $margin = "SELECT * FROM tb_pembiayaan,tb_tipemargin where tb_pembiayaan.tipe_margin = tb_tipemargin.id_tipemargin and tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['listmargin'] = $this->app_model->manualQuery($margin);

      $text = "SELECT * FROM tb_jaminan";
      $detailjaminan = "SELECT * FROM tb_jaminand, tb_jaminan where tb_jaminand.nm_agunan = tb_jaminan.id_jaminan and no_aplikasi ='$no_aplikasi' ";
      $d['listdetailjaminan'] = $this->app_model->manualQuery($detailjaminan);

      $jns_pembiayaan = "SELECT * FROM tb_jnskegunaan";
      $d['listjenis'] = $this->app_model->manualQuery($jns_pembiayaan);

      $tolak = "SELECT * FROM tb_tolak";
      $d['listtolak'] = $this->app_model->manualQuery($tolak);

      $users = "SELECT * FROM users where username = '$nm_account'";
      $d['listusers'] = $this->app_model->manualQuery($users);

      $ll = "select * from users,tb_jabpegawai,tb_upliner where users.id_jabatanpeg = tb_jabpegawai.id and users.username=tb_upliner.nm_upliner and tb_upliner.userid='$nm_account'";
      $d['listll'] = $this->app_model->manualQuery($ll);

      $text = "SELECT * FROM tb_card";
      $agama = "SELECT * FROM tb_agama";
      $jk = "SELECT * FROM tb_jk";
      $nikah = "SELECT * FROM tb_nikah";

      $tiperekening = "SELECT * FROM tb_tiperekening";
      $d['listtiperekening'] = $this->app_model->manualQuery($tiperekening);


      $d['listagama'] = $this->app_model->manualQuery($agama);

      $d['listdata'] = $this->app_model->manualQuery($text);
      $d['aplikasi'] = $no_aplikasi;
      $d['menu'] = $menu;
      $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);
      $d['dbangsuran'] = $this->app_model->CariTabelAplikasi('tbl_data2', $no_aplikasi);
      $d['sp3'] = $this->app_model->CariTabelAplikasi('tb_sp3', $no_aplikasi);
      $d['akad'] = $this->app_model->CariTabelAplikasi('tb_akad', $no_aplikasi);
      $d['cair'] = $this->app_model->CariTabelAplikasi('tb_cair', $no_aplikasi);
      //$this->load->view('cekdokumen/form',$data);

      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }


  public function updatememo($no_aplikasi, $link, $formdata, $tabe)
  {

    $cek = $this->session->userdata('logged_in');
    $level = $this->session->userdata('level');
    if (!empty($cek)) {
      $nm_account = $this->session->userdata('username');
      $cabang = $this->session->userdata('cabang');

      $d['prg'] = $this->config->item('prg');

      $d['moduls'] = $this->app_model->get_moduls();
      $d['menus'] = $this->app_model->get_menus();
      $nn = "SELECT * FROM users where username='$nm_account' ORDER BY username ASC ";
      $d['listname'] = $this->app_model->manualQuery($nn);
      $ww = "SELECT * FROM tb_cabang ";
      $d['listcabangbsm'] = $this->app_model->manualQuery($ww);
      $rr = "SELECT * FROM tb_jabpegawai ";
      $d['listjabatanbsm'] = $this->app_model->manualQuery($rr);

      $d['judul'] = "Memo";

      //paging
      $page = $this->uri->segment(3);
      $limit = $this->config->item('limit_data');
      if (!$page) :
        $offset = 0;
      else :
        $offset = $page;
      endif;

      $text = "SELECT * FROM tb_memo";
      $tot_hal = $this->app_model->manualQuery($text);

      $d['tot_hal'] = $tot_hal->num_rows();

      $config['base_url'] = site_url() . '/detail/updatememo/$no_aplikasi';
      $config['total_rows'] = $tot_hal->num_rows();
      $config['per_page'] = $limit;
      $config['uri_segment'] = 3;
      $config['next_link'] = 'Lanjut &raquo;';
      $config['prev_link'] = '&laquo; Kembali';
      $config['last_link'] = '<b>Terakhir &raquo; </b>';
      $config['first_link'] = '<b> &laquo; Pertama</b>';
      $this->pagination->initialize($config);
      $d["paginator"] = $this->pagination->create_links();
      $d['hal'] = $offset;

      $d['tahapantab'] = $this->app_model->CariPadaTahapan($tabe);
      $zz = "SELECT * FROM tb_memo where tb_memo.no_aplikasi='$no_aplikasi' ORDER BY id_memo ASC ";
      $d['listmemo'] = $this->app_model->manualQuery($zz);

      $z = "SELECT * FROM tb_pembiayaan where tb_pembiayaan.no_aplikasi='$no_aplikasi'";
      $d['list'] = $this->app_model->manualQuery($z);
      $d['aplikasi'] = $no_aplikasi;
      $tabs = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=0";
      $d['listtabs'] = $this->app_model->manualQuery($tabs);
      $tabsheader = "SELECT * FROM tb_tab1 where level_tab=" . $tabe . " and header=1";
      $d['listtabsheader'] = $this->app_model->manualQuery($tabsheader);

      $d['leveltab'] = $tabe;

      $linkdata = $link;
      $form = $formdata;
      //$this->load->view('cekdokumen/form',$data);
      $this->load->view('' . $linkdata . '/' . $form, $d);
    } else {
      header('location:' . base_url());
    }
  }
}
