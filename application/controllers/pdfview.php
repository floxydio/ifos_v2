<?php
class Pdfview extends CI_Controller
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
    $file_pdf = 'laporan_penjualan_toko_kita';
    // setting paper
    $paper = 'A4';
    //orientasi paper potrait / landscape
    $orientation = "portrait";
    $rr = "SELECT * FROM tbl_data2 where no_aplikasi='001dmin2022052000001'";
    $d['listangsuran'] = $this->app_model->manualQuery($rr);
    $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan', '001dmin2022052000001');

    $d['dbsp3'] = $this->app_model->CariTabelAplikasi('tb_sp3', '001dmin2022052000001');
    $d['dbakad'] = $this->app_model->CariTabelAplikasi('tb_akad', '001dmin2022052000001');
    $d['dbnomor'] = $this->app_model->CariTabelAplikasi('tb_akad_nomor', '001dmin2022052000001');
    $detailjaminan = "SELECT * FROM tb_jaminand, tb_jaminan where tb_jaminand.nm_agunan = tb_jaminan.id_jaminan and no_aplikasi ='001dmin2022052000001' ";
    $d['listdetailjaminan'] = $this->app_model->manualQuery($detailjaminan);
    $this->load->view('laporan_pdf', $d);
    $html = $this->output->get_output();
    $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
  }

  function Buatakad($no_aplikasi, $form)
  {
    $file_pdf = 'Akad' . $no_aplikasi;
    // setting paper
    $paper = 'A4';
    //orientasi paper potrait / landscape
    $orientation = "portrait";
    $rr = "SELECT * FROM tbl_data2 where no_aplikasi='$no_aplikasi'";
    $d['listangsuran'] = $this->app_model->manualQuery($rr);
    $objek = "SELECT * FROM akad_objek where no_aplikasi='$no_aplikasi'";
    $d['listobjek'] = $this->app_model->manualQuery($objek);
    $cekdata = $this->app_model->CariDataParameter($no_aplikasi, 'no_aplikasi', 'tb_pembiayaan_ver', 'no_aplikasi');

    if ($cekdata == '1') {
      $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan_ver', $no_aplikasi);
      $dbaser = $this->app_model->CariTabelAplikasi('tb_pembiayaan_ver', $no_aplikasi);
    } else {
      $d['db'] = $this->app_model->CariTabelAplikasi('tb_pembiayaan', $no_aplikasi);
      $dbaser = $this->app_model->CariTabelAplikasi('tb_pembiayaan_ver', $no_aplikasi);
    }
    if ($dbaser['skim'] == '1') {
      $nama_akad = "Akad Pembiayaan Ujrah";
    } else if ($dbaser['skim'] == '2') {
      $nama_akad = "Akad Pembiayaan Murabahah";
    } else {
      $nama_akad = "Akad Pembiayaan Qard";
    }
    $file_pdf = '' . $nama_akad . ' No. ' . $no_aplikasi;
    $d['dbsp3'] = $this->app_model->CariTabelAplikasi('tb_sp3', $no_aplikasi);
    $d['dbakad'] = $this->app_model->CariTabelAplikasi('tb_akad', $no_aplikasi);
    $d['dbnomor'] = $this->app_model->CariTabelAplikasi('tb_akad_nomor', $no_aplikasi);
    $detailjaminan = "SELECT * FROM tb_jaminand, tb_jaminan where tb_jaminand.nm_agunan = tb_jaminan.id_jaminan and no_aplikasi ='$no_aplikasi'";
    $d['listdetailjaminan'] = $this->app_model->manualQuery($detailjaminan);
    $this->load->view('akad/' . $form, $d);
    $html = $this->output->get_output();
    $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
  }

  public function loadData()
  {
    $nm_account = $this->session->userdata('username');
    $cabang = $this->session->userdata('cabang');

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {


      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      $limit = isset($_GET['rows']) ? $_GET['rows'] : 100;
      $sidx = isset($_GET['sidx']) ? $_GET['sidx'] : 'id_pembiayaan';
      $sord = isset($_GET['sord']) ? $_GET['sord'] : 'ASC';
      $start = $limit * $page - $limit;
      $start = ($start < 0) ? 0 : $start;

      $searchNoaplikasi = isset($_GET['no_aplikasi']) ? $_GET['no_aplikasi'] : false;
      $searchCabang = isset($_GET['tempat_lahir']) ? $_GET['tempat_lahir'] : false;
      $searchNama = isset($_GET['nm_lengkap']) ? $_GET['nm_lengkap'] : false;
      $searchLahir = isset($_GET['tanggal_lahir']) ? $_GET['tanggal_lahir'] : false;
      $searchPlafon = isset($_GET['plafon']) ? $_GET['plafon'] : false;
      $searchProgram = isset($_GET['ibu_kandung']) ? $_GET['ibu_kandung'] : false;
      $searchJw = isset($_GET['jangka_waktu']) ? $_GET['jangka_waktu'] : false;
      $searchMargin = isset($_GET['margin']) ? $_GET['margin'] : false;
      $searchTahapan = isset($_GET['tahapan']) ? $_GET['tahapan'] : false;




      $searchString = isset($_GET['searchString']) ? $_GET['searchString'] : false;

      if ($_GET['_search'] == 'true') {


        if (!empty($searchNoaplikasi)) {

          $searchString .= "tb_pembiayaan.no_aplikasi like '%$searchNoaplikasi%'";
        }
        if (!empty($searchCabang)) {
          if (empty($searchString)) {
            $searchString .= "tb_pembiayaan.tempat_lahir like '%$searchCabang%'";
          } else {
            $searchString .= "AND tb_pembiayaan.tempat_lahir like '%$searchCabang%'";
          }
        }
        if (!empty($searchNama)) {
          if (empty($searchString)) {
            $searchString .= "tb_pembiayaan.nm_lengkap like '%$searchNama%'";
          } else {
            $searchString .= "AND tb_pembiayaan.nm_lengkap like '%$searchNama%'";
          }
        }
        if (!empty($searchLahir)) {
          if (empty($searchString)) {
            $searchString .= "tb_pembiayaan.tanggal_lahir like '%$searchLahir%'";
          } else {
            $searchString .= "AND tb_pembiayaan.tanggal_lahir like '%$searchLahir%'";
          }
        }

        if (!empty($searchPlafon)) {
          if (empty($searchString)) {
            $searchString .= "tb_pembiayaan.plafon like '%$searchPlafon%'";
          } else {
            $searchString .= "AND tb_pembiayaan.plafon like '%$searchPlafon%'";
          }
        }


        if (!empty($searchProgram)) {
          if (empty($searchString)) {
            $searchString .= "tb_pembiayaan.ibu_kandung like '%$searchProgram%'";
          } else {
            $searchString .= "AND tb_pembiayaan.ibu_kandung like '%$searchJw%'";
          }
        }

        if (!empty($searchMargin)) {
          if (empty($searchString)) {
            $searchString .= "tb_pembiayaan.margin like '%$searchMargin%'";
          } else {
            $searchString .= "AND tb_pembiayaan.margin like '%$searchMargin%'";
          }
        }

        if (!empty($searchTahapan)) {
          if (empty($searchString)) {
            $searchString .= "tb_pembiayaan.tahapan like '%$searchTahapan%'";
          } else {
            $searchString .= "AND tb_pembiayaan.tahapan like '%$searchTahapan%'";
          }
        }

        $where = "$searchString";
      } else {
        $where = "approval='1' and konfirmasi='1' and approval_doc='0' and pic_mikro ='$nm_account'";
      }

      if (!$sidx)
        $sidx = 1;
      $query = $this->app_model->getAllpembiayaan($start, $limit, $sidx, $sord, $where);
      $count = count($query);
      if ($count > 0) {
        $total_pages = ceil($count / $limit);
      } else {
        $total_pages = 0;
      }

      if ($page > $total_pages)
        $page = $total_pages;

      $responce->page = $page;
      $responce->total = $total_pages;
      $responce->records = $count;
      $i = 0;
      foreach ($query as $row) {
        $tgl1 =  $row->tgl_approval;
        $tgl2 = date("Y-m-d h:i:s");
        $hari = $this->app_model->datediff($tgl1, $tgl2);
        $libur = $this->app_model->hitung_minggusabtu($tgl1, $tgl2);
        $listhari = ($hari['days_total'] - $libur);

        $row->durasi = "" . $listhari . " hari";

        $row->detail = "  <a href='javascript:tampil_data(\"{$row->no_aplikasi}\")' class='btn btn-xs btn-warning'><i class='glyphicon glyphicon-edit' title='Detail'>Detail</i></a>";

        $responce->rows[$i]['id'] = $row->id_pembiayaan;
        $responce->rows[$i]['cell'] = array($row->no_aplikasi, $row->nm_lengkap, $row->tempat_lahir, $row->tanggal_lahir, $row->ibu_kandung, $row->plafon, $row->no_account, $row->tgl_approval, $row->durasi, $row->detail);
        $i++;
      }
      $this->output->set_output(json_encode($responce));
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
      $resultList = $this->app_model->fetchAllData('no_aplikasi,nm_lengkap,kd_cab,plafon,ibu_kandung', 'tb_pembiayaan', array(), '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', 'pic_mikro', $nm_account);

      $result = array();
      $button = '';
      $row->detaillink = "detail";
      $row->form = "form";

      $row->jkl = "1";
      $i = 1;
      foreach ($resultList as $key => $value) {
        $button = " <a href='#' onclick='tampil_data(\"{$value['no_aplikasi']}\")' class='btn btn-xs btn-warning'><i class='glyphicon glyphicon-edit' title='Detail'>Detail</i></a>";


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
    } else {
      header('location:' . base_url());
    }
  }



  function tambahdata($idd)
  {

    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {

      $d['title'] = "Ceklist Dokumen";
      $biaya = "SELECT * FROM tb_pembiayaan, tb_jnspekerjaan, tb_gruppekerjaan where tb_pembiayaan.jns_pekerjaan = tb_jnspekerjaan.id_jnspekerjaan and  tb_jnspekerjaan.id_jnspekerjaan = tb_gruppekerjaan.id_kerjaan and tb_pembiayaan.no_aplikasi='$idd'";
      $deb = $this->app_model->manualQuery($biaya);
      foreach ($deb->result() as $db) {
        $jnspekerjaan = $db->grup;
        if ($jnspekerjaan == '1') {

          $text = "SELECT * FROM tb_dokumen where grup_peg='1' order by id_dokumen";
        } else if ($jnspekerjaan == '2') {

          $text = "SELECT * FROM tb_dokumen where  grup_peg='2' order by id_dokumen";
        } else if ($jnspekerjaan == '3') {

          $text = "SELECT * FROM tb_dokumen where  grup_peg='3' order by id_dokumen";
        }
      }
      $data = $this->app_model->manualQuery($text);
      $d['jumlah'] = $data->num_rows();
      $d['list'] = $this->app_model->manualQuery($text);
      $d['hasil'] = $this->app_model->filterdata($idd);
      $this->load->view('cekdokumen/view_data', $d);

      //echo $text;
    } else {
      header('location:' . base_url());
    }
  }



  function setuju()
  {
    $cek = $this->session->userdata('logged_in');
    if (!empty($cek)) {
      $id = $this->input->post('setuju');
      $date = date('Y-m-d H:i:s');
      $this->app_model->manualQuery("Update tb_pembiayaan set approval='1', tgl_approval = NOW(), tgl_pemohon='$date',tahapan = 'Cheklist Dokumen Assignment' WHERE id_pembiayaan='$id'");
    } else {
      header('location:' . base_url());
    }
  }
}
