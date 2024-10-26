<?php
$pejabat = $dbakad['pejabat'] ;
  $namapejabat = $this->app_model-> CariParameterLike($pejabat,'username','users','nama_lengkap');
$id_jab =  $this->app_model-> CariParameterLike($pejabat,'username','users','id_jabatanpeg');
$namajabatan =  $this->app_model-> CariParameterLike($id_jab,'id','tb_jabpegawai','nmjabatan');
$namacabang =  $this->app_model-> CariParameterLike($db['kd_cabang'],'kd_cabang','tb_cabang','nm_cabang');
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

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Akad Wakalah</title>
</head>
<style>
.class14{
font-size:14px;
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
margin-bottom:0.7cm;
}
</style>

<body>
<header>
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


<!-- akad wakalah -->
<div align="center" class="class15"><strong>AKAD WAKALAH</strong></div><br /><br />
<div align="justify" class="class14">
Pada hari ini, <?php echo ucwords(strtolower($hariakad)); ?> tanggal <?php echo $hasiltglakadt; ?>, bulan <?php echo $bulantglakad; ?>, tahun <?php echo $hasiltglakadtahun ;?>, yang bertandatangan di bawah ini:</div><br/>
<table width="541" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50" ><div align="justify" style="" class="class14">Nama</div></td>
	<td width="25" ><div align="justify" style="" class="class14">:</div></td>
    <td width="506" ><div align="justify" class="class14"><?php echo ucwords(strtolower($namapejabat));?></div></td>
  </tr>
  <tr>
    <td width="50" ><div align="justify" style="" class="class14">Jabatan</div></td>
	<td width="25" ><div align="justify" style="" class="class14">:</div></td>
    <td width="506" ><div align="justify" class="class14"><em><?php echo ucwords(strtolower($namajabatan));?></em></div></td>
  </tr>
</table><br/>
<div align="justify" class="class14">
berdasarkan Surat Kuasa dari <?php echo $dbakad['dari'];?> Nomor <?php echo  $dbakad['no_kuasa'];?> tanggal <?php echo  $dbakad['tgl_kuasa'];?> dan Surat Keputusan/Surat Ketetapan Penempatan dan Penugasan (SKPP) Nomor <?php echo  $dbakad['no_sk'];?> tanggal <?php echo  $dbakad['tgl_sk'];?> karenanya sah bertindak untuk dan atas nama PT Koperasi Hasanah, (untuk selanjutnya disebut &quot;KOPERASI&quot;).</div><br/>
<div align="justify" class="class14">Dengan ini memberi kuasa kepada :</div>
<table width="541" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50" ><div align="justify" style="" class="class14">Nama</div></td>
	<td width="25" ><div align="justify" style="" class="class14">:</div></td>
    <td width="506" ><div align="justify" class="class14"><?php echo  $db['nm_lengkap'];?></div></td>
  </tr>
  <tr>
    <td width="50" ><div align="justify" style="" class="class14">Alamat</div></td>
	<td width="25" ><div align="justify" style="" class="class14">:</div></td>
    <td width="506" ><div align="justify" class="class14"><?php echo ucwords(strtolower($db['alamat_tinggal']));?></div></td>
  </tr>
   <tr>
    <td width="50" ><div align="justify" style="" class="class14">No <?php echo  $db['id_card'];?></div></td>
	<td width="25" ><div align="justify" style="" class="class14">:</div></td>
    <td width="506" ><div align="justify" class="class14"><?php echo ucwords(strtolower($db['no_identitas']));?></div></td>
  </tr>
</table><br/>
<div align="justify" class="class14">bertindak untuk diri sendiri, selanjutnya disebut &quot;<strong>PENERIMA KUASA</strong>&quot;. </div><br/>
<div align="center" class="class14"><strong>---------- K H U S U S ----------</strong></div><br/>
<div align="justify" class="class14">untuk dan atas nama PEMBERI KUASA, mencari, membayar dan menerima Obyek Akad dengan spesifikasi sebagai berikut: </div>';

<table width="541" border="0" cellpadding="0" cellspacing="0">
       <?php
  $noobjek=0;

 // $fielddataobjek=mysqli_num_rows($dataobjek);
 	foreach($listobjek->result_array() as $rowobjek){

  $noobjek++;
  if($noobjek % 2==0)$warna="#EAEAEA";else $warna="#FFFFFF";
 if($surat=='Surat_Permohonan_Realisasi'){$hasilpagesurat="print_surat_realisasi";}elseif($surat=='Surat_Permohonan_Realisasi_Musyarakah'){$hasilpagesurat="print_surat_realisasi_musyarakah";}elseif($surat=='Surat_Permohonan_Realisasi_Mudharabah'){$hasilpagesurat="print_surat_realisasi_mudharabah";}elseif($surat=='Purchase_Order'){$hasilpagesurat="print_purchase_order";}elseif($surat=='Surat_Penerimaan_barang'){$hasilpagesurat="print_surat_penerimaan_barang";}elseif($surat=='Akad_Wakalah'){$hasilpagesurat="print_akad_wakalah";}elseif($surat=='Jadwal_Angsuran'){$hasilpagesurat="print_jadwal_angsuran";}



  ?>
  <tr>
    <td width="110" ><div align="justify" style="" class="class14">Nama dan jenis barang</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;<?php echo $rowobjek['namabarang']; ?> <?php echo $rowobjek['rincian'];?></div></td>
  </tr>
  <tr>
    <td width="110" ><div align="justify" style="" class="class14">Jumlah Satuan</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;<?php echo $rowobjek['satuan']; ?></div></td>
  </tr>
   <tr>
    <td width="110" ><div align="justify" style="" class="class14">Lokasi</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;<?php echo $rowobjek['lokasi']; ?></div></td>
  </tr>
   <tr>
    <td width="110" ><div align="justify" style="" class="class14">Pemasok</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;<?php echo $rowobjek['pemasok']; ?></div></td>
  </tr>
  <tr>
    <td width="110" ><div align="justify" style="" class="class14">Harga</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;Rp <?php echo number_format($rowobjek['harga']); ?></div></td>
  </tr>
    <?php } ?>
</table>

<table class="'.$tampilpagepisahwakalah.'">
</div>
<div style="page-break-after:always">
</table>
<div align="justify" class="class14">PENERIMA KUASA atas beban dan tanggung jawabnya, berkewajiban melakukan pemeriksaan, baik terhadap keadaan fisik Obyek Akad maupun sahnya bukti-bukti, surat-surat dan atau dokumen-dokumen yang berkaitan dengan kepemilikan atau hak-hak lainnya atas Obyek Akad, sehingga karena itu PENERIMA KUASA berjanji dan dengan ini bersedia menanggung risiko cacat maupun ketidaksesuaian Obyek Akad yang telah dipilih/ditentukan oleh PENERIMA KUASA.</div><br/>
<div align="justify" class="class14">PENERIMA KUASA dengan ini berjanji untuk membeli Obyek Akad dari PEMBERI KUASA. Bila PENERIMA KUASA membatalkan Pembiayaan Murabahah dengan alasan apapun , termasuk namun tidak terbatas pada cacatnya Obyek Akad maupun ketidaksesuaian Obyek Akad maupun dokumen yang terkait dengannya, maka PENERIMA KUASA bersedia dan sepakat untuk mengganti PEMBERI KUASA segala kerugian yang diderita PEMBERI KUASA sebagai akibat pembatalan tersebut.</div><br/><br/><br/>
<div align="justify" class="class14">Surat Kuasa ini diberikan tanpa hak substitusi.</div><br/>
<div align="justify" class="class14">'.ucwords(strtolower($namakota)).',</div>';
<table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="30"><div align="left" class="class15"><strong>PEMBERI KUASA</strong></div></td>
    <td width="5" >&nbsp;</td>
    <td width="300" ><div align="left" class="class15"><strong>PENERIMA KUASA</strong></div></td>
  </tr>
  <tr>
    <td height="80"><div align="left"><span style="color:#333333;" class="class14"> Materai Rp. 6000,-</span></div></td>
    <td >&nbsp;</td>
    <td ></td>
  </tr>

  <tr>
    <td width="255" ><div align="left" class="class14"><?php echo ucwords(strtolower($namapejabat));?></div></td>
    <td >&nbsp;</td>

    <td ><div align="left" class="class14"><?php echo ucwords(strtolower($db['nm_lengkap']));?></div></td>
  </tr>
</table>



</body>
</html>

