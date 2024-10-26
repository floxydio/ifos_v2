<?php
$array_bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
$array_hari = array('Sun'=>'Minggu','Mon'=>'Senin','Tue'=>'Selasa','Wed'=>'Rabu','Thu'=>'Kamis','Fri'=>'Jumat','Sat'=>'Sabtu');

 $angsuran = $db['angsuran'];
 $jk = $db['jangka_waktu'];
  $plafon = $db['plafon'];
 $pla = str_replace(',','',$plafon);
 $ang = str_replace('.','',$angsuran);
 $total_angsuran = $ang * $jk;
 $nilaimargin = $total_angsuran - $pla ;
 $nilaijual =  $pla + $nilaimargin ;
$pejabat = $dbakad['pejabat'] ;
 $tglakad=$dbakad['tgl_akad'];
 $tglakadpecah1 = explode("-",$tglakad);
$datetglakad=$tglakadpecah1[2];
$tglakadmonth1=$tglakadpecah1[1];
$yeartglakad=$tglakadpecah1[0];
$anntglakad=strtotime($tglakad);
$tglakadM=date('n',$anntglakad);
$tglakadT=date('j',$anntglakad);
$tglakadNamaHari=date('D',$anntglakad);
$hariakad=$array_hari[$tglakadNamaHari];
$bulantglakad = $array_bulan [$tglakadM];
$tglakadt = $tglakadT;
$tglakadb=$bulantglakad;
$tglakadtahun=$yeartglakad;
$hasiltglakadt=ucwords(str_replace("Rupiah","",terbilang($tglakadt)));
$hasiltglakadtahun=ucwords(str_replace("Rupiah","",terbilang($tglakadtahun)));

$namapejabat = $this->app_model-> CariParameterLike($pejabat,'username','users','nama_lengkap');
$id_jab =  $this->app_model-> CariParameterLike($pejabat,'username','users','id_jabatanpeg');
$namajabatan =  $this->app_model-> CariParameterLike($id_jab,'id','tb_jabpegawai','nmjabatan');
$namacabang =  $this->app_model-> CariParameterLike($db['kd_cabang'],'kd_cabang','tb_cabang','nm_cabang');
if($dbakad['st_administarsi']=='Y'){$tampilbiayaadministrasi='stylehide';}else{$tampilbiayaadministrasi='';}
if($dbakad['st_asuransikerugian']=='Y'){$tampilbiayajaminan='stylehide';}else{$tampilbiayajaminan='';}
if($dbakad['st_asuransijamin']=='Y'){$tampilbiayakerugian='stylehide';}else{$tampilbiayakerugian='';}

if($dbakad['st_biayanotaris']=='Y'){$tampilbiayanotaris='stylehide';}else{$tampilbiayanotaris='';}
if($dbakad['st_biayaappraisal']=='Y'){$tampilbiayaappraisal='stylehide';}else{$tampilbiayaappraisal='';}
if($dbakad['st_biayamaterai']=='Y'){$tampilbiayamaterai='stylehide';}else{$tampilbiayamaterai='';}
if($dbakad['st_biayablokir']=='Y'){$tampilbiayablokir='stylehide';}else{$tampilbiayablokir='';}
if($dbakad['st_biayacadangan']=='Y'){$tampilbiayacadangan='stylehide';}else{$tampilbiayacadangan='';}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Akad Ijarah Objek Akad Barang</title>
</head>
<style>
.class14{
font-size:14px;
font-family:Arial, Helvetica, sans-serif;
font-style:normal;
}
.class19{
font-size:11px;
font-family:Arial, Helvetica, sans-serif;
font-style:normal;
}
.class15{
font-size:15px;
font-family:Arial, Helvetica, sans-serif;
font-style:normal;
}
.class22{
font-size:9px;
font-family:Arial, Helvetica, sans-serif;
font-style:normal;
}
.stylehide {
	display:none;
	position: absolute;
}
.tableborder{
border:medium;
border-style:double;
}
#kiri
{
width:50%;
float:left;
}
#kanan
{
width:50%;
float:right;
}
footer{
position:fixed;
bottom:-1cm;
left:0cm;
right:0cm;
height:2cm;
}
header{
position:fixed;
bottom:28cm;
left:11cm;
right:0cm;
height:0cm;
font: 13px Arial;
color: #999999;

}
body{
margin-bottom:2.5cm;
margin-right:2.5cm;
margin-left:2.5cm;
margin-top:2.5cm;
}
.content{
width: 300px;
      height: 50px;
      padding: 15px;
      border: 5px solid red;
      margin: 20px;
}
</style>

<body>
<header>
<div><u><i>Akad Ijarah Retail - Obyek Akad Barang</i></u></div>
</header>
<footer>
<div align="center" class="class14"><span style="color:#CCCCCC;font-size:12px;font-family:Arial, Helvetica, sans-serif;font-style:normal;">Paraf</span>
<table width="124" height="60" border="1" align="center" cellpadding="1" cellspacing="0" style="color:#CCCCCC;border-color:#CCCCCC;min-height:100">
    <tr>
        <th width="58" style="min-height:100px"><br />
    <div align="center"><span style="color:#CCCCCC;font-size:12px;font-family:Arial, Helvetica, sans-serif;font-style:normal;">Bank</span></div></th>
        <th width="60" style="min-height:100px"><br /><div align="center"><span style="color:#CCCCCC;font-size:12px;font-family:Arial, Helvetica, sans-serif;font-style:normal;">Nasabah</span></div></th>
    </tr>
</table>
</div>
</footer>
<div align="center" class="class15"><strong>AKAD PEMBIAYAAN BERDASARKAN PRINSIP IJARAHH<br/>
No.<?php echo $dbnomor['nomor_akad']; ?></strong></div>
<p></p>
<div align="justify" class="class14">
Akad Pembiayaan Berdasarkan Prinsip Ijarah ini (selanjutnya disebut &quot;<strong>Akad</strong>&quot;) dibuat dan ditandatangani pada hari ini, <?php echo ucwords(strtolower($hariakad)); ?> tanggal <?php echo $hasiltglakadt; ?>, bulan <?php echo $bulantglakad; ?>, tahun <?php echo $hasiltglakadtahun ;?>, oleh dan antara:</div><br/>
<table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
   <td width="25" valign="top"><div align="left" class="class14">1.</div></td>
    <td width="330" ><div align="justify" class="class14"><strong>Koperasi Hasanah</strong>, berkedudukan di Jakarta Pusat dan berkantor Pusat di Jl. MH Thamrin No. 5 Jakarta Pusat, dalam hal ini diwakili oleh <?php echo $dbakad['pejabat']; ?> selaku <em> <?php echo $namajabatan ; ?> </em>  berdasarkan Surat Kuasa dari <?php echo $dbakad['dari']; ?> Nomor <?php echo $dbakad['no_kuasa']; ?> tanggal <?php echo $dbakad['tgl_kuasa']; ?> dan Surat Keputusan/Surat Ketetapan Penempatan dan Penugasan (SKPP) Nomor <?php echo $dbakad['no_sk']; ?> tanggal <?php echo $dbakad['tgl_akad']; ?> karenanya sah bertindak untuk dan atas nama Koperasi Hasanah, (untuk selanjutnya disebut &quot;Koperasi&quot;).<br/>
dan<br/>
</div></td>
  </tr>
    <tr>
    <td scope="row" valign="top"><div align="left" class="class14">2.</div></td>
    <td width="330" ><div align="justify" class="class14"><?php echo $db['nm_lengkap']; ?>  bertempat tinggal di <?php echo $db['alamat_tinggal']; ?> , sesuai dengan <?php echo $db['id_card']; ?>  No. <?php echo $db['no_identitas']; ?> dalam hal ini bertindak untuk dan atas nama sendiri. Sebagai NASABAH Penerima fasilitas (untuk selanjutnya disebut &quot;NASABAH&quot;).<br/></div></td>
  </tr>
  <tr>
  <td scope="row" ><div align="justify" class="class14"></div></td>
  <td scope="row"><div align="justify" class="class14"></div></td>
  </tr>
</table>
<br/>
<div align="justify" class="class14">KOPERASI dan NASABAH selanjutnya secara bersama-sama disebut &quot;<strong>Para Pihak</strong>&quot;.</div>
<div align="justify" class="class14">Para Pihak terlebih dahulu menerangkan hal-hal sebagai berikut:</div>
<table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="25" valign="top"><div align="justify" class="class14">1.</div></td>
    <td width="330" ><div align="justify" class="class14">Bahwa NASABAH telah mengajukan permohonan fasilitas Pembiayaan kepada BANK untuk membeli Obyek Akad yang uraiannya akan disebutkan dalam Akad ini.</div></td>
  </tr>
  <tr>
    <td scope="row" valign="top"><div align="justify" class="class14">2.</div></td>
    <td width="330" ><div align="justify" class="class14">BANK dan NASABAH telah menandatangani dan menundukkan diri pada ketentuan-ketentuan Syarat-syarat Umum Pembiayaan tanggal <?php echo $dbakad['tgl_sup']; ?> yang merupakan bagian yang tidak terpisahkan dari Akad ini.</div></td>
  </tr>
  <tr>
    <td scope="row" valign="top"><div align="justify" class="class14">3.</div></td>
    <td width="330" ><div align="justify" class="class14">Bahwa NASABAH telah menandatangani dan menyerahkan kembali Surat Penawaran Pemberian Pembiayaan (SP3) No. <?php echo $dbsp3['no_sp3']; ?> tanggal <?php echo $dbsp3['tgl_sp3']; ?></div></td>
  </tr>
</table>
 <div style="page-break-after:always"></div>
  <div align="justify" class="class14">Selanjutnya Para Pihak dalam kedudukannya tersebut diatas sepakat dan setuju untuk membuat Akad ini dengan syarat-syarat serta ketentuan-ketentuan sebagai berikut:</div><br />

<div align="center" class="class15"><strong>PASAL 1</strong><br />
<strong>DEFINISI DAN INTERPRETASI</strong></div><br>
<table width="405" border="0" cellpadding="0" cellspacing="0">
<tr><td width="405" >
<div align="justify" class="class14">Jika tidak secara tegas dinyatakan lain dalam Akad ini, maka kata-kata yang dimulai dengan huruf besar atau definisi-definisi dan istilah-istilah yang dipergunakan dalam Akad ini, mengacu kepada Syarat-syarat Umum.</div></td></tr>
</table><br>
<div align="center" class="class15"><strong>PASAL 2</strong><br />
<strong>PELAKSANAAN PEMBIAYAAN IJARAH</strong></div><br>
<div align="justify" class="class14">Pembiayaan berdasarkan Prinsip Ijarah antara BANK dengan NASABAH dilaksanakan sebagai berikut :</div>
<table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15" valign="top"><div align="justify" class="class14">a.</div></td>
    <td width="330" ><div align="justify" class="class14">BANK memberikan persetujuan dan kuasa secara penuh kepada NASABAH untuk mencari, membeli/menyewa dan menerima Obyek Akad dari Pemasok.</div></td>
  </tr>
  <tr>
    <td scope="row" valign="top"><div align="justify" class="class14">b.</div></td>
    <td width="330" ><div align="justify" class="class14">NASABAH atas beban dan tanggung jawabnya, berdasarkan Akad Wakalah, berkewajiban melakukan pemeriksaan, baik terhadap kondisi Pemasok, keadaan fisik Obyek Akad maupun sahnya bukti-bukti, surat-surat dan atau dokumen-dokumen yang berkaitan dengan kepemilikan atau hak-hak lainnya atas Obyek Akad.</div></td>
  </tr>
  <tr>
    <td scope="row" valign="top"><div align="justify" class="class14">c.</div></td>
    <td width="330" ><div align="justify" class="class14">Setelah Pemasok diperoleh, BANK atau NASABAH akan menerbitkan <em>purchase order</em> atau dokumen sejenisnya untuk perolehan Obyek Akad.</div></td>
  </tr>
    <tr>
    <td scope="row" valign="top"><div align="justify" class="class14">d.</div></td>
    <td width="330" ><div align="justify" class="class14">Segera setelah BANK memperoleh Obyek Akad, berdasarkan purchase order atau dokumen sejenisnya, NASABAH menyewa Obyek Akad dari BANK dengan kewajiban pembayaran Ujrah oleh NASABAH.</div></td>
  </tr>
  </table><br />
<div align="center" class="class15"><strong>PASAL 3</strong><br>
<strong>SYARAT REALISASI PEMBIAYAAN</strong></div><br>
<table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15" valign="top"><div align="justify" class="class14">1.</div></td>
    <td width="330" ><div align="justify" class="class14">Pemberian Pembiayaan sebagaimana disebutkan dalam Akad ini hanya akan diberikan oleh BANK jika NASABAH telah memenuhi persyaratan dan menyerahkan seluruh dokumen yang dipersyaratkan dalam Akad ini, Syarat-syarat Umum dan SP3 (jika ada) serta lampiran-lampirannya dan dokumen lainnya sebagaimana disebutkan dalam Akad ini.</div></td>
  </tr>
  <tr>
    <td  width="15" valign="top"><div align="justify" class="class14">2.</div></td>
    <td width="330" ><div align="justify" class="class14">Selain syarat sebagaimana ditentukan dalam butir 1, NASABAH wajib memenuhi syarat-syarat sebagai berikut:</DIV></td></tr>
</table>
 <?php

  $subsyarat=$this->app_model->CariSyaratRealisasi('0',$db['no_aplikasi']);
  $b=0;
$romawi = array ('i','ii','iii','iv','v','vi','vii','viii','ix','x');
$char = array('0','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
$charbut = range('a','z');
$a=1;
$e=0;
$f=1;
$hk=1;

$fielddataobjeksubdetbar=$subsyarat->num_rows();

  	foreach($subsyarat->result_array() as $rowsyarat){

  	     $der =  $rowsyarat['id_realisasi_utama'];
  	    ?>
  	      <div style="margin-left:
	24px"><table width="370" border="0" cellpadding="0" cellspacing="0"><tr><td width="15" valign="top"><div align="justify" class="class14"><?php echo $charbut[$b]; ?></div></td><td width="370" ><div align="justify" class="class14"> <?php echo $rowsyarat['nama_realisasisub']; ?></div></td></tr>
</table></div>
        <?php
        $subsyarat2=$this->app_model->CariSyaratRealisasi($der,$db['no_aplikasi']);
        $fielddataobjeksub=$subsyarat2->num_rows();
     if ($a>=$fielddataobjeksub)
  {

     $a=1;
  }
  	foreach($subsyarat2->result_array() as $rowsyaratsub){

        $dersub =  $rowsyaratsub['id_realisasi_utama'];
?>
<div style="margin-left:
	42px"><table width="353" border="0" cellpadding="0" cellspacing="0"><tr><td width="15" valign="top"><div align="justify" class="class14"><?php echo $a; ?>).</div></td><td width="353" ><div align="justify" class="class14"> <?php echo $rowsyaratsub['nama_realisasisub']; ?></div></td></tr>
</table></div>
<?php

$subsyarat3=$this->app_model->CariSyaratRealisasi($dersub,$db['no_aplikasi']);
$fielddataobjeksubdet=$subsyarat3->num_rows();
          if ($hk>=$fielddataobjeksubdet)
  {

     $hk=1;
  }

	foreach($subsyarat3->result_array() as $rowsyaratsubdet){
        $dersubdet =  $rowsyaratsubdet['id_realisasi_utama'];
?>
<div style="margin-left:
	60px"><table width="353" border="0" cellpadding="0" cellspacing="0"><tr><td width="15" valign="top"><div align="justify" class="class14"><?php echo $charbut[$hk]; ?>).</div></td><td width="340" ><div align="justify" class="class14"> <?php echo $rowsyaratsubdet['nama_realisasisub']; ?></div></td></tr>';
 </table></div>

 <?php
$subsyarat4=$this->app_model->CariSyaratRealisasi($dersubdet,$db['no_aplikasi']);
$fielddataobjeksubdetbar=$subsyarat3->num_rows();
          if ($e>$fielddataobjeksubdetbar)
  {

     $e=0;
  }
	foreach($subsyarat3->result_array() as $rowsyaratsubdetbar){
        $dersubdetbar =  $rowsyaratsubdetbar['id_realisasi_utama'];
?>
<div style="margin-left:
	70px"><table width="350" border="0" cellpadding="0" cellspacing="0"><tr><td width="15" valign="top"><td width="15" valign="top"><div align="justify" class="class14"><?php echo $romawi[$e]; ?>).</div></td><td width="330" ><div align="justify" class="class14"> <?php echo $rowsyaratsubdetbar['nama_realisasisub']; ?></div>';
    </table></div>
    <?php
      $e++;
}



 $hk++;
}


 $a++;
    }
$b++;
}

?>
    <br></div>
    <table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr><td>
  <div align="center" class="class15"><strong>PASAL 4</strong><br>
<strong>POKOK AKAD, BIAYA, OBYEK AKAD, DAN JANGKA WAKTU PEMBIAYAAN</strong></div><br>
<table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15" valign="top"><div align="justify" class="class14">1.</div></td>
    <td width="330" ><div align="justify" class="class14">BANK dengan ini memberikan Pembiayaan berdasarkan Prinsip Ijarah kepada NASABAH dan NASABAH setuju menerima Pembiayaan tersebut untuk sewa manfaat Obyek Akad berupa : <strong>'.$hasiltampilnamaobjek.'</strong>, sesuai dengan syarat-syarat dan ketentuan-ketentuan yang disebutkan dalam Akad ini.</div></td>
  </tr>
  </table></td></tr></table>

  <table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15" valign="top"><div align="justify" class="class14">2.</div></td>
    <td colspan="2" width="330" ><div align="justify" class="class14">BANK dengan ini menyerahkan Obyek Akad kepada NASABAH; dan NASABAH menerima Obyek Akad tersebut dengan jangka waktu dan kewajiban membayar Imbalan Jasa (Ujrah) sebagaimana disebutkan dalam Lampiran Akad ini.</div></td>
  </tr>

   <tr>
    <td scope="row" valign="top"><div align="justify" class="class14">3.</div></td>
    <td colspan="2" ><div align="justify" class="class14">NASABAH setuju untuk membayar Biaya yang terkait dengan pemberian fasilitas Pembiayaan ini, yaitu:</div></td>
  </tr>
    </table>
  <table width="280" border="0" cellpadding="0" cellspacing="0">
    <tr class="<?php echo $tampilbiayaadministrasi; ?>">
    <td width="18" >&nbsp;</td>
    <td width="150"><li style="margin-left:
	12px">

       <div align="justify" class="class14">Biaya Administrasi</div>
     </li></td>
     <td ><div align="justify" class="class14">Rp <?php echo $dbakad['biaya_administrasi']; ?></div></td>
   </tr>
   <tr class="<?php echo $tampilbiayajaminan; ?>">
     <td scope="row">&nbsp;</td>
     <td ><li style="margin-left:
	12px">
         <div align="left" class="class14">Biaya Asuransi Jiwa/Penjaminan</div>
     </li></td>
     <td ><div align="justify" class="class14">Rp <?php echo $dbakad['premijiwa']; ?></div></td>
   </tr>
   <tr class="<?php echo $tampilbiayakerugian; ?>">
     <td scope="row">&nbsp;</td>
     <td ><li style="margin-left:
	12px">
	   <div align="justify" class="class14">Biaya Asuransi Kerugian</div>
     </li></td>
     <td ><div align="justify" class="class14">Rp <?php echo $dbakad['premibakar']; ?></div></td>
   </tr>
   <tr class="<?php echo $tampilbiayanotaris; ?>">
     <td scope="row">&nbsp;</td>
     <td ><li style="margin-left:
	12px">
         <div align="justify" class="class14">Biaya Notaris/PPAT</div>
     </li></td>
     <td ><div align="justify" class="class14">Rp <?php echo $dbakad['biaya_notaris']; ?></div></td>
   </tr>
   <tr class="<?php echo $tampilbiayaappraisal; ?>">
     <td scope="row">&nbsp;</td>
     <td ><li style="margin-left:
	12px">
         <div align="justify" class="class14">Biaya Penilaian Agunan</div>
     </li></td>
     <td ><div align="justify" class="class14">Rp <?php echo $dbakad['biaya_appraisal']; ?></div></td>
   </tr>
   <tr class="<?php echo $tampilbiayamaterai; ?>">
     <td scope="row">&nbsp;</td>
     <td ><li style="margin-left:
	12px">
         <div align="justify" class="class14">Biaya Materai</div>
     </li></td>
     <td ><div align="justify" class="class14">Rp <?php echo $dbakad['biaya_materai']; ?></div></td>
   </tr>
   <tr class="<?php echo $tampilbiayablokir; ?>">
     <td scope="row">&nbsp;</td>
     <td ><li style="margin-left:
	12px">
         <div align="justify" class="class14">Biaya Blokir</div>
     </li></td>
     <td ><div align="justify" class="class14">Rp <?php echo $dbakad['biaya_blokir']; ?></div></td>
   </tr>
    <tr class="<?php echo $tampilbiayacadangan; ?>">
     <td scope="row">&nbsp;</td>
     <td ><li style="margin-left:
	12px">
         <div align="justify" class="class14">Biaya Cadangan</div>
     </li></td>
     <td ><div align="justify" class="class14">Rp <?php echo $dbakad['biaya_cadangan']; ?></div></td>
   </tr>
     </table>
  <table width="400" border="0" cellpadding="0" cellspacing="0">
   <tr>
    <td width="15" valign="top"><div align="justify" class="class14">4.</div></td>
     <td colspan="2" ><div align="justify" class="class14">Nasabah melakukan pembayaran Angsuran pada setiap tanggal <?php echo $dbakad['tgl_angsuran']; ?> dalam jangka waktu <?php echo $db['jangka_waktu']; ?> ('.str_replace(" Rupiah","",terbilang($rowdetail['tenor3'])).') bulan terhitung dari tanggal pencairan Pembiayaan, sampai dengan seluruh Jumlah Kewajiban lunas, sesuai dengan jadwal Angsuran yang menjadi Lampiran Akad ini</div></td>
  </tr>
     <tr>
    <td width="15" valign="top"><div align="justify" class="class14">5.</div></td>
     <td colspan="2" ><div align="justify" class="class14">Selama Jumlah Kewajiban belum dilunasi oleh NASABAH, NASABAH dengan ini mengaku berhutang kepada Koperasi sebesar Jumlah Kewajiban yang wajib dibayar oleh NASABAH kepada Koperasi berdasarkan Akad ini.</div></td>
  </tr>
     <tr>
       <td scope="row" valign="top"><div align="justify" class="class14">6.</div></td>
       <td colspan="2" ><div align="justify" class="class14">Setiap pembayaran oleh NASABAH kepada BANK lebih dahulu digunakan untuk melunasi Biaya dan sisanya baru dihitung sebagai pembayaran Angsuran atas Jumlah Kewajiban.</div></td>
     </tr>

</table>
<br />
<table width="403" border="0" cellpadding="0" cellspacing="0">
<tr><td><div align="center" class="class15"><strong>PASAL 5</strong><br />
<strong>JAMINAN</strong></div><br>
<table width="403" border="0" cellpadding="0" cellspacing="0">
<tr><td width="403" >
<div align="justify" class="class14">Untuk menjamin tertibnya pembayaran kembali/pelunasan Jumlah Kewajiban tepat pada waktu dan jumlah yang telah disepakati oleh Para Pihak serta jumlah-jumlah uang lain sehubungan dengan Akad ini, NASABAH harus menyerahkan Jaminan kepada BANK dan membuat pengikatan Jaminan sesuai dengan peraturan perundang-undangan yang berlaku, yang merupakan bagian yang tidak terpisahkan dari Akad ini. Jenis Jaminan yang diserahkan adalah berupa:</td></tr>
</table></td></tr></table>

<table width="400" border="0" cellpadding="0" cellspacing="0">
<?php
	$no=1;
  	foreach($listdetailjaminan->result() as $t){

       ?>
<tr>
    <td width="15" valign="top"><div align="justify" class="class14"><?php echo $no;?></div></td>
    <td width="330" ><div align="justify" class="class14"><strong><?php echo $t->nm_jaminan;?> Harga Agunan : <?php echo $t->harga_agunan;?> </strong></div></td>
  </tr>
  <?php
   $no++;
}
?>
</table><br>
<table width="403" border="0" cellpadding="0" cellspacing="0">
<tr><td>
<div align="center" class="class15"><strong>PASAL 6</strong><br />
<strong>KUASA</strong></div><br>
<table width="403" border="0" cellpadding="0" cellspacing="0">
<tr><td width="403" >
<div align="justify" class="class14">NASABAH bersama ini memberi kuasa penuh kepada BANK khusus untuk memblokir, mencairkan dan atau mendebet rekening NASABAH pada BANK No. <?php echo $dbakad['rekening']; ?> dan rekening lainnya, untuk melunasi hutang/kewajiban NASABAH kepada BANK. NASABAH menerima dan menyetujui segala tindakan BANK atas rekening NASABAH tersebut di atas. Kuasa ini akan terus berlaku dan tidak akan dicabut oleh NASABAH hingga Jumlah Kewajiban NASABAH lunas.</div></td></tr>
</table></td></tr></table><br />


<table width="403" border="0" cellpadding="0" cellspacing="0"><tr><td><div align="center" class="class15"><strong>PASAL 7</strong><br />
<strong>PENUNJUKAN NASABAH SEBAGAI PEMELIHARA OBYEK AKAD</strong></div><br>
<table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15" valign="top"><div align="justify" class="class14">1.</div></td>
    <td colspan="2" ><div align="justify" class="class14">BANK dengan ini menunjuk NASABAH dan NASABAH setuju menerima penunjukan BANK sebagai pihak yang bertanggung jawab atas Pemeliharaan terhadap Obyek Akad. Dengan demikian NASABAH bertanggung jawab atas Pemeliharaan Obyek Akad.</div></td>
  </tr></table></td></tr></table>
  <table width="400" border="0" cellpadding="0" cellspacing="0">

  <tr>
    <td width="15" valign="top"><div align="justify" class="class14">2.</div></td>
    <td colspan="2" ><div align="justify" class="class14">Jika terjadi Kerugian Total atas Obyek Akad dalam Jangka Waktu Akad atau Obyek Akad hilang, dicuri, disita atau dirampas, maka dalam jangka waktu tidak lebih dan 2 (dua) hari kalender sejak terjadinya peristiwa tersebut, NASABAH harus menyampaikan pemberitahuan kepada BANK atas peristiwa tersebut dan Jangka Waktu Akad menjadi berakhir. Jika BANK telah menerima pembayaran dari perusahaan asuransi atas kerugian, maka NASABAH berhak memperoleh kembali Ujrah yang telah dibayarkan kepada BANK sejumlah hari dimana NASABAH tidak dapat menggunakan Obyek Akad (jika Ujrah/Harga Sewa telah dibayar di muka). Selain jaminan memperoleh Ujrah/Harga Sewa, BANK juga berhak memperoleh pembayaran dari asuransi sehubungan dengan bagian kepemilikannya pada Obyek Akad.</div></td>
  </tr>
   <tr>
    <td scope="row" valign="top"><div align="justify" class="class14">3.</div></td>
    <td colspan="2" ><div align="justify" class="class14">Jika terjadi Kerugian Sebagian, NASABAH akan segera menyampaikan pemberitahuan kepada BANK dan mengidentifikasikan kerusakan yang terjadi dalam suatu laporan teknis yang komprehensif dan memperkirakan jumlah kerugian atau nilai kerusakan yang telah timbul serta biaya penggantian atas Obyek Akad yang rusak tersebut dalam jangka waktu tidak lebih lama dari 2 (dua) hari kalender.</div></td>
  </tr>
   <tr>
    <td scope="row" valign="top"><div align="justify" class="class14">4.</div></td>
    <td colspan="2" ><div align="justify" class="class14">Jika terjadi Kerugian Total atas Obyek Akad dalam Jangka Waktu Akad atau Obyek Akad hilang yang disebabkan oleh kelalaian atau kesalahan atau tindakan buruk atau pelanggaran kewajiban menurut Akad ini dan/atau Dokumen Pembiayaan lainnya oleh NASABAH, maka NASABAH harus mengganti kerugian (ta&quot;widh) kepada BANK sebesar seluruh Jumlah Kewajiban NASABAH kepada BANK berdasarkan Akad ini, dikurangi jumlah yang telah diterima oleh BANK dari perusahaan asuransi, jika ada.</div></td>
  </tr>
     <tr>
    <td scope="row" valign="top"><div align="justify" class="class14">5.</div></td>
    <td colspan="2" ><div align="justify" class="class14">Apabila dalam situasi sebagaimana dinyatakan dalam ayat (2), ayat (3) dan ayat (4) Pasal ini, kerugian yang timbul tidak disebabkan oleh kelalaian atau tindakan buruk atau pelanggaran kewajiban menurut Akad ini oleh NASABAH, maka BANK akan menyerahkan hasil pembayaran asuransi yang terkait kepada NASABAH dalam kapasitasnya sebagai penanggungjawab pemeliharaan berdasarkan Pasal ini, untuk dapat melakukan perbaikan/penggantian atas Obyek Akad yang rusak tersebut, dengan ketentuan bahwa NASABAH akan tetap bertanggung jawab atas, dan akan melakukan pembayaran Ujrah/Harga Sewa atas Obyek Akad yang rusak tersebut pada waktu jatuh tempo pembayarannya.</div></td>
  </tr>
</table><br>

<table width="400" border="0" cellpadding="0" cellspacing="0">
<tr><td><div align="center" class="class15"><strong>PASAL 8</strong><br />
<strong>PEMBERITAHUAN</strong></div><br>
<table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15" valign="top"><div align="justify" class="class14">1.</div></td>
    <td width="330" ><div align="justify" class="class14">Alamat Pemberitahuan<br />Semua surat menyurat atau pemberitahuan yang dikirim oleh masing-masing pihak kepada pihak yang lain harus dilakukan dengan surat tercatat, melalui kurir (ekspedisi), atau faksimili ke alamat-alamat sebagai berikut:</div></td>
  </tr>
</table></td></tr></table><div style="margin-left:27px">
  <table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="180" ><div align="left" class="class15"><strong>Untuk KOPERASI:</strong></div></td>
    <td width="200" ><div align="left" class="class15"><strong>Untuk NASABAH:</strong></div></td>
  </tr>
  <tr>
    <td ><div align="justify" class="class14">Unit Kerja: <?php echo $namacabang; ?></div></td>
    <td ><div align="justify" class="class14">Alamat: <?php echo $db['alamat_tinggal']; ?></div></td>
  </tr>
  <tr>
    <td ><div align="justify" class="class14">Alamat: <?php echo $db['alamat_tinggal']; ?></div></td>
    <td ><div align="justify" class="class14">Telepon: <?php echo $db['no_tlp']; ?></div></td>
  </tr>
  <tr>
    <td ><div align="justify" class="class14">Telepon: '.$datatelpon.'</div></td>
    <td ><div align="justify" class="class14">Faksimili: - </div></td>
  </tr>
  <tr>
    <td ><div align="justify" class="class14">Faksimili: - </div></td>
    <td >&nbsp;</td>
  </tr>
  </table></div>
 <table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15" valign="top"><div align="justify" class="class14">2.</div></td>
    <td width="330" ><div align="justify" class="class14">Pemberitahuan dari salah satu pihak kepada pihak lainnya dianggap diterima:</div></td>
  </tr>
    </table>
   <table width="400" border="0" cellpadding="0" cellspacing="0">
     <tr>
  <td width="16">&nbsp;</td>
    <td width="15" valign="top"><div align="justify" class="class14">a.</div></td>
    <td colspan="3" width="330"><div align="justify" class="class14">Jika dikirim melalui kurir (ekspedisi) pada tanggal penerimaan;
</div></td></tr>
   <tr>
  <td width="16">&nbsp;</td>
    <td width="15" valign="top"><div align="justify" class="class14">b.</div></td>
    <td colspan="3" width="330"><div align="justify" class="class14">Jika dikirim melalui pos tercatat,7 (tujuh) hari setelah tanggal pengirimannya, dan/atau;

</div></td></tr>
 <tr>
  <td width="16">&nbsp;</td>
    <td width="15" valign="top"><div align="justify" class="class14">c.</div></td>
    <td colspan="3" width="330"><div align="justify" class="class14">Jika dikirim melalui kurir (ekspedisi) pada tanggal penerimaan;

</div></td></tr>
</table>
  <table width="400" border="0" cellpadding="0" cellspacing="0">
   <tr>
     <td scope="row" valign="top"><div align="justify" class="class14">3.</div></td>
     <td scope="row"><div align="justify" class="class14">Salah satu pihak dapat mengganti alamatnya dengan memberitahukan secara tertulis kepada pihak lainnya.</div></td>
   </tr>
</table>
 <br />
'<div align="center" class="class15"><strong>PASAL 9</strong><br />
<strong>PENUTUP</strong></div><br>
<table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15" valign="top"><div align="justify" class="class14">1.</div></td>
    <td width="330"><div align="justify" class="class14">Apabila ada hal-hal yang belum diatur atau belum cukup diatur dalam Akad, Para Pihak akan mengaturnya bersama secara musyawarah untuk mufakat untuk suatu addendum atau dokumen tertulis lainnya yang merupakan satu kesatuan yang tidak terpisahkan dalam Akad.</div></td>
  </tr>
   <tr>
     <td scope="row" valign="top"><div align="justify" class="class14">2.</div></td>
     <td scope="row"><div align="justify" class="class14">Sebelum Akad ini ditandatangani oleh NASABAH, NASABAH mengakui dengan sebenarnya bahwa NASABAH telah membaca dengan cermat atau dibacakan kepadanya seluruh isi Akad ini berikut Syarat-syarat Umum serta semua surat dan/atau dokumen yang menjadi lampiran Akad ini, sehingga  NASABAH memahami sepenuhnya segala yang akan menjadi akibat hukum setelah NASABAH menandatangani Akad ini.</div></td>
   </tr>
    <tr>
     <td scope="row" valign="top"><div align="justify" class="class14">3.</div></td>
     <td scope="row"><div align="justify" class="class14">Jika salah satu atau sebagian ketentuan-ketentuan dalam Akad ini menjadi batal atau tidak berlaku, maka tidak mengakibatkan seluruh Akad ini menjadi batal atau tidak berlaku seluruhnya.</div></td>
   </tr>
    <tr>
     <td scope="row" valign="top"><div align="justify" class="class14">4.</div></td>
     <td scope="row"><div align="justify" class="class14">Akad ini dibuat dan ditandatangani oleh Para Pihak dalam rangkap 2 (dua) yang masing-masing berlaku sebagai asli.</div></td>
   </tr>

</table>
 <table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr><td>
<table width="400" border="0" cellpadding="0" cellspacing="0">
 <tr>
     <td scope="row" valign="top"><div align="justify" class="class14">5.</div></td>
     <td scope="row"><div align="justify" class="class14">Akad ini dibuat dan ditandatangani oleh Para Pihak dalam rangkap 2 (dua) yang masing-masing berlaku sebagai asli.</div></td>
   </tr>
   </table><br><br>
   <div style="margin-left:
	-100px">
 <table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
     <td width="50"><div style="margin-left:50px" class="class15"><strong>PT Koperasi Hasanah<br/><?php echo strtoupper($namacabang); ?></strong></div></td>
   <td width="10" >&nbsp;</td>
    <td width="300" ><div align="left" class="class15"><strong>NASABAH</strong></div></td>
  </tr>
  <tr>
    <td width="30"><div align="left" class="class15"></td>
    <td width="5" >&nbsp;</td>
    <td width="300" ><div align="left" class="class15"></div></td>
  </tr>
  <tr>
    <td height="50">&nbsp;</td>
    <td >&nbsp;</td>
    <td ><div align="left"><span style="color:#333333;" class="class22"> Materai Rp. 6000,-</span></div></td>
  </tr>
  <tr>
    <td width="255" ><div style="margin-left:50px" class="class15"><strong><?php echo ucwords(strtolower($namapejabat)); ?></strong><br/><?php echo ucwords(strtolower($namajabatan)) ; ?></div></td>
    <td >&nbsp;</td>
   <td ><div align="left" class="class14"><?php echo ucwords(strtolower($db['nm_lengkap'])); ?>&nbsp;&nbsp;&nbsp; </div></td>
  </tr>
</table></td></tr></table></div>
</div>
</body>
</html>

