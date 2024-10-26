<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function tahapan_teks($teks)
{
  switch ($teks) {
    case "cek Dokumen";
      $hasil = 'pic_mikro';
      break;
    case "SID Duplikasi";
      $hasil = 'pic_sid';
      break;
    case "Data Entry";
      $hasil = 'pic_dataentry';
      break;
    case "Verifikasi Data";
      $hasil = 'pic_verifikasi';
      break;
    case "Analisa Data";
      $hasil = 'pic_analisa';
      break;
    case "Approval";
      $hasil = 'pic_pemutus';
      break;
    case "SP3 Pembiayaan";
      $hasil = 'pic_sp3';
      break;
    case "Akad Pembiayaan";
      $hasil = 'pic_akad';
      break;
    case "Pencairan";
      $hasil = 'pic_cair';
      break;
  }
  return $hasil;
}

function insentif_mitra($kolawalan, $kolakhir, $jmlkelolaan, $nip)
{
  switch ($kolakhir) {
    case "1";
      if ($kolawalan > $kolakhir) {
        $insentifakhir = "Upgrade " . $db['kol_awalan'] . " to " . $kolportal;
        $hasil = count($insentifakhir);
        if ($jmlkelolaan < 40) {
          $insenmitra = $hasil * 30000;
        } else {
          $insenmitra = $hasil * 40000;
        }
      }
      break;
  }
  return $insenmitra;
}

function insentif_kol2b($kolawalan, $kolakhir, $jmlkelolaan, $nip)
{
  switch ($kolakhir) {
    case "0";
      if ($kolawalan == '2B') {
        if ($kolawalan > $kolakhir) {
          $insentifakhirkol2blunas = "Upgrade " . $kolawalan . " to " . $kolakhir;
          $hasilkol2blunas = count($insentifakhirkol2blunas);
          if ($jmlkelolaan < 40) {
            $insenkol2blunas = $hasilkol2blunas * 25000;
          } else {
            $insenkol2blunas = $hasilkol2blunas * 30000;
          }
        }
      }
    case "2A";
      if ($kolawalan == '2B') {
        if ($kolawalan > $kolakhir) {
          $insentifakhirkol2a = "Upgrade " . $kolawalan . " to " . $kolakhir;
          $hasilkol2a = count($insentifakhirkol2a);
          if ($jmlkelolaan < 40) {
            $insenkol2a = $hasilkol2a * 20000;
          } else {
            $insenkol2a = $hasilkol2a * 25000;
          }
        }
      }
      break;
    case "2B";
      if ($kolawalan == '2B') {
        if ($kolawalan == $kolakhir) {
          $insentifakhirkol2b = "Stay " . $kolawalan . " to " . $kolakhir;
          $hasilkol2b = count($insentifakhirkol2b);
          if ($jmlkelolaan < 40) {
            $insenkol2b = $hasilkol2b * 15000;
          } else {
            $insenkol2b = $hasilkol2b * 20000;
          }
        }
      }
      break;
  }
  $jmlkol2 = (($insenkol2a + $insenkol2b) + $insenkol2blunas);
  return $jmlkol2;
}

function insentif_kol2c($kolawalan, $kolakhir, $jmlkelolaan, $nip)
{
  switch ($kolakhir) {
    case "0";
      if ($kolawalan == '2C') {
        if ($kolawalan > $kolakhir) {
          $insentifakhirkol2clunas = "Upgrade " . $kolawalan . " to " . $kolakhir;
          $hasilkol2clunas = count($insentifakhirkol2clunas);
          if ($jmlkelolaan < 40) {
            $insenkol2clunas = $hasilkol2clunas * 25000;
          } else {
            $insenkol2clunas = $hasilkol2clunas * 30000;
          }
        }
      }
      break;
    case "2A";
      if ($kolawalan == '2C') {
        if ($kolawalan > $kolakhir) {
          $insentifakhirkol2a2c = "Upgrade " . $kolawalan . " to " . $kolakhir;
          $hasilkol2a = count($insentifakhirkol2a2c);
          if ($jmlkelolaan < 40) {
            $insenkol2a2c = $hasilkol2a2c * 20000;
          } else {
            $insenkol2a2c = $hasilkol2a2c * 25000;
          }
        }
      }
      break;
    case "2B";
      if ($kolawalan == '2C') {
        if ($kolawalan > $kolakhir) {
          $insentifakhirkol2b2c = "Upgrade " . $kolawalan . " to " . $kolakhir;
          $hasilkol2b2c = count($insentifakhirkol2b2c);
          if ($jmlkelolaan < 40) {
            $insenkol2b2c = $hasilkol2b2c * 15000;
          } else {
            $insenkol2b2c = $hasilkol2b2c * 20000;
          }
        }
      }
      break;

    case "2C";
      if ($kolawalan == '2C') {
        if ($kolawalan == $kolakhir) {
          $insentifakhirkol2c2c = "Stay " . $kolawalan . " to " . $kolakhir;
          $hasilkol2c = count($insentifakhirkol2c2c);
          if ($jmlkelolaan < 40) {
            $insenkol2c2c = $hasilkol2c2c * 10000;
          } else {
            $insenkol2c2c = $hasilkol2c2c * 15000;
          }
        }
      }
      break;
  }
  $jmlkol2c = ((($insenkol2a2c + $insenkol2b2c) + $insenkol2c2c) + $insenkol2clunas);
  return $jmlkol2c;
}
function insentif_kolnpf($kolawalan, $kolakhir, $jmlkelolaan, $nip)
{
  switch ($kolakhir) {
    case "0";
      if ($kolawalan > '2C') {
        if ($kolawalan > $kolakhir) {
          $insentifakhirnpflunas = "Upgrade " . $db['kol_awalan'] . " to " . $kolportal;
          $hasilnpflunas = count($insentifakhirnpflunas);
          if ($jmlkelolaan < 40) {
            $insennpflunas = $hasilnpflunas * 25000;
          } else {
            $insennpflunas = $hasilnpflunas * 30000;
          }
        }
      }
      break;
    case "2A";
      if ($kolawalan > '2C') {
        if ($kolawalan > $kolakhir) {
          $insentifakhirnpf2a = "Upgrade " . $db['kol_awalan'] . " to " . $kolportal;
          $hasilnpf2a = count($insentifakhirnpf2a);
          if ($jmlkelolaan < 40) {
            $insennpf2a = $hasilnpf2a * 15000;
          } else {
            $insennpf2a = $hasilnpf2a * 20000;
          }
        }
      }
      break;
    case "2B";
      if ($kolawalan > '2C') {
        if ($kolawalan > $kolakhir) {
          $insentifakhirnpf2b = "Upgrade " . $db['kol_awalan'] . " to " . $kolportal;
          $hasilnpf2b = count($insentifakhirnpf2b);
          if ($jmlkelolaan < 40) {
            $insennpf2b = $hasilnpf2b * 15000;
          } else {
            $insennpf2b = $hasilnpf2b * 20000;
          }
        }
      }
      break;

    case "2C";
      if ($kolawalan > '2C') {
        if ($kolawalan > $kolakhir) {
          $insentifakhirnpf2c = "Upgrade " . $db['kol_awalan'] . " to " . $kolportal;
          $hasilnpf2c = count($insentifakhirnpf2c);
          if ($jmlkelolaan < 40) {
            $insennpf2c = $hasilnpf2c * 15000;
          } else {
            $insennpf2c = $hasilnpf2c * 20000;
          }
        }
      }
      break;

    case $kolakhir > '2C';
      if ($kolawalan > '2C') {
        if ($kolawalan == $kolakhir) {
          $insentifakhirnpf1 = "Stay " . $db['kol_awalan'] . " to " . $kolportal;
          $hasilnpf1 = count($insentifakhirnpf1);
          if ($jmlkelolaan < 40) {
            $insennpf1 = $hasilnpf1 * 0;
          } else {
            $insennpf1 = $hasilnpf1 * 0;
          }
        }
      }
      break;
  }
  $jmlkol2 = (((($insennpf2a + $insennpf2b) + $insennpf2c) + $insennpf1) + $insennpflunas);
  return $jmlnpf2c;
}

function insentif_diterima($id, $bulan, $tahun, $tglawal, $tglakhir)
{
  $this->load->database('default', TRUE);
  $this->load->model('app_model');
  $this->db->select('*');
  $this->db->where('no_account', $id);
  $this->db->where('bulan', $bulan);
  $this->db->where('tahun', $tahun);
  $this->db->from('tb_insentifmitra');
  $data = $this->db->get();

  foreach ($data->result_array() as $t) {
    $kolportal = $this->app_model->CariKolakhir($t['no_loan'], $t['bulan'], $t['tahun']);
    $jmlkelolaan = $this->app_model->JumlahKelolaan($t['no_account'], $t['bulan'], $t['tahun'], $tglawal, $tglakhir);
    $insentifok = insentif_mitra($t->kol_awalan, $kolportal, $jmlkelolaan, $id);
    $total = $total + $insentifok;
  }
  $jumlah = $total;
  return $jumlah;
}

function konversi($x)
{
  $x = abs($x);
  $angka = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
  $temp = "";
  if ($x < 12) {
    $temp = " " . $angka[$x];
  } elseif ($x < 20) {
    $temp = konversi($x - 10) . " belas";
  } elseif ($x < 100) {
    $temp = konversi($x / 10) . " puluh" . konversi($x % 10);
  } elseif ($x < 200) {
    $temp = " seratus" . konversi($x - 100);
  } elseif ($x < 1000) {
    $temp = konversi($x / 100) . " ratus" . konversi($x % 100);
  } elseif ($x < 2000) {
    $temp = " seribu" . konversi($x - 1000);
  } elseif ($x < 1000000) {
    $temp = konversi($x / 1000) . " ribu" . konversi($x % 1000);
  } elseif ($x < 1000000000) {
    $temp = konversi($x / 1000000) . " juta" . konversi($x % 1000000);
  } elseif ($x < 1000000000000) {
    $temp = konversi($x / 1000000000) . " milyar" . konversi(fmod($x, 1000000000));
  } elseif ($x < 1000000000000000) {
    $temp = konversi($x / 1000000000000) . " triliun" . konversi(fmod($x, 1000000000000));
  }
  return $temp;
}

function tkoma($x)
{
  $x = stristr($x, '.');
  $angka = array("nol", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan");
  $temp = " ";
  $pjg = strlen($x);
  $pos = 1;
  while ($pos < $pjg) {
    $char = substr($x, $pos, 1);
    $pos++;
    $temp .= " " . $angka[$char];
  }
  return $temp;
}


function terbilang($x)
{
  if ($x < 0) {
    $hasil = "minus " . trim(konversi(x));
  } else {
    $poin = trim(tkoma($x));
    $hasil = trim(konversi($x));
  }
  if ($poin) {
    $hasil = $hasil . " koma " . $poin;
  } else {
    $hasil = $hasil;
  }
  return $hasil . " Rupiah";
}

function upgrade_data($kolawalan, $kolakhir)
{
  if ($kolawalan > $kolakhir) {
    $insentifakhirnpf2c = "Upgrade " . $kolawalan . " to " . $kolakhir;
    $hasilupgrade = count($insentifakhirnpf2c);
  } else {
    $hasilupgrade = 0;
  }
  return $hasilupgrade;
}

function downgrade_data($kolawalan, $kolakhir)
{
  if ($kolawalan < $kolakhir) {
    $down = "Downgrade " . $kolawalan . " to " . $kolakhir;
    $hasildown = count($down);
  } else {
    $hasildown = 0;
  }
  return $hasildown;
}



function lunas_data($kolawalan, $kolakhir, $os)
{
  switch ($kolakhir) {
    case "0";
      if ($kolawalan > $kolakhir) {
        $hasillunas = $os;
      } else {
        $hasillunas = 0;
      }
      break;
  }
  return $hasillunas;
}
