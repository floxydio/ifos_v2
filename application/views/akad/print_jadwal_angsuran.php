<style>
.stylehide {
	display:none;
	position: absolute;
}
</style>
<?php
$array_bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
$array_hari = array('Sun'=>'Minggu','Mon'=>'Senin','Tue'=>'Selasa','Wed'=>'Rabu','Thu'=>'Kamis','Fri'=>'Jumat','Sat'=>'Sabtu');
 if($db['skim']=='1'){
    $nama_akad="Akad Pembiayaan Ujrah";
    $nama_skim = "Ijarah";
    }else if ($db['skim']=='2'){
      $nama_akad="Akad Pembiayaan Murabahah";
      $nama_skim = "Murabahah";
    } else {
         $nama_akad="Akad Pembiayaan Qard";
         $nama_skim = "Qard";
    }
    if($db['skim']=='1' or $db['skim']=='2'){
        	if($listangsuran->num_rows() > 0 ){
?>
  <div style="page-break-after:always">
<div align="left" class="class15"><strong>ANGSURAN <?php echo strtoupper($nama_skim) ?> DAN JADWAL PEMBAYARAN</strong></div><br/>
<div align="justify" class="class14" id="kiri">
<table cellpadding="1" cellspacing="0" border='1' class="table table-bordered table-condensed table-striped">
<tr>
    <th style="background-color:#333333;color:#FFFFFF"><div align="center" class="class14">Angsuran ke-</div></th>
        <th style="background-color:#333333;color:#FFFFFF"><div align="center" class="class14">Tanggal </div></th>
        <th style="background-color:#333333;color:#FFFFFF"><div align="center" class="class14">Nominal</div></th>
    </tr>
    <?php
    $no=1;
     	foreach($listangsuran->result_array() as $t){
     	     $angsuran = str_replace(',','',$t['angsuran']);
             $tglangsuran=$this->template->IndonesiaTgl($t['tanggal_angsuran']);

$hasilangsuran=number_format($angsuran);
    ?>
   <tr>
<td style=background-color:'.$warna.'><div align="center" class="class24"><?php echo $no; ?></div></td>
<td style=background-color:'.$warna.'><div align="left" class="class24">&nbsp;<?php echo $tglangsuran; ?> &nbsp;</div></td>
<td style=background-color:'.$warna.'><div align="center" class="class24">&nbsp; Rp. <?php echo $hasilangsuran; ?>&nbsp;</div></td>
</tr>
<?php
$no++;
}
?>
<?php
             }else{
$tenorakhir=$db['jangka_waktu'];
 $tglakad=$this->template->IndonesiaTgl($dbakad['tgl_akad']);
if($tenorakhir<=90){$hasilpage2='stylehide';$hasilpage3='stylehide';$hasilstyle2='';$hasilstyle1='';}elseif($tenorakhir>90 and $tenorakhir<=180){$hasilpage2='';$hasilpage3='stylehide';$hasilstyle2='';$hasilstyle1='page-break-after:always';}elseif($tenorakhir>180 and $tenorakhir<=240){$hasilpage2='';$hasilpage3='';$hasilstyle2='page-break-after:always';$hasilstyle1='page-break-after:always';}

//setting tabel
if($tenorakhir<=45){$tampiltabel1='';$tampiltabel2='stylehide';$tampiltabel3='stylehide';$tampiltabel4='stylehide';$tampiltabel5='stylehide';$tampiltabel6='stylehide';}
else
if($tenorakhir>45 and $tenorakhir<=90){$tampiltabel1='';$tampiltabel2='';$tampiltabel3='stylehide';$tampiltabel4='stylehide';$tampiltabel5='stylehide';$tampiltabel6='stylehide';}
else
if($tenorakhir>90 and $tenorakhir<=135){$tampiltabel1='';$tampiltabel2='';$tampiltabel3='';$tampiltabel4='stylehide';$tampiltabel5='stylehide';$tampiltabel6='stylehide';}
else
if($tenorakhir>135 and $tenorakhir<=180){$tampiltabel1='';$tampiltabel2='';$tampiltabel3='';$tampiltabel4='';$tampiltabel5='stylehide';$tampiltabel6='stylehide';}
else
if($tenorakhir>180 and $tenorakhir<=225){$tampiltabel1='';$tampiltabel2='';$tampiltabel3='';$tampiltabel4='';$tampiltabel5='stylehide';$tampiltabel6='';}
else
if($tenorakhir>225 and $tenorakhir<=240){$tampiltabel1='';$tampiltabel2='';$tampiltabel3='';$tampiltabel4='';$tampiltabel5='';$tampiltabel6='';}
 ?>
 <div style="page-break-after:always">
<div align="left" class="class15"><strong>ANGSURAN <?php echo strtoupper($nama_skim) ?> DAN JADWAL PEMBAYARAN</strong></div><br/>
<div align="justify" class="class14 <?php echo $tampiltabel1 ?>" id="kiri">
<table cellpadding="1" cellspacing="0" border='1' class="table table-bordered table-condensed table-striped">
<tr>
    <th style="background-color:#333333;color:#FFFFFF"><div align="center" class="class14">Angsuran ke-</div></th>
        <th style="background-color:#333333;color:#FFFFFF"><div align="center" class="class14">Tanggal </div></th>
        <th style="background-color:#333333;color:#FFFFFF"><div align="center" class="class14">Nominal</div></th>
    </tr>
     <?php
//angsuran ke 2
$no2 = 0;
//cari batas jangka
$maxtenor=$db['jangka_waktu'];
if($maxtenor<=1000){$hasiljangka2=$maxtenor;}else{$hasiljangka2=1000;}
$jangka2=$hasiljangka2;
$tglangsuran2=$dbakad['tgl_angsuran'];
$pecahTglakad2 = explode("-", $tglakad);
$tglakad2 = $pecahTglakad2[0];
$blnakad2 = $pecahTglakad2[1];
$thnakad2 = $pecahTglakad2[2];

$hasiltglakadke2=date("d-m-Y",mktime(0,0,0,$blnakad2+$no2,$tglakad2,$thnakad2));
$pecahTgl2 = explode("-", $hasiltglakadke2);

// membaca bagian-bagian dari $date2
$tgl2 = $pecahTgl2[0];
$bln2 = $pecahTgl2[1];
$thn2 = $pecahTgl2[2];
do {
$no2++;
if($no2 % 2==0)$warna="#FFFFFF";else $warna="#CCCCCC";

$bln2++;
 $angsuran = str_replace(array('.',','),array('',','),$db['angsuran']);
$hasilangsuran02=number_format($angsuran);
$hasiltgl2=date("d n Y",mktime(0,0,0,$bln2,$tgl2,$thn2));
$pecahTgl22 = explode(" ",$hasiltgl2);
$tahunkabisat=$pecahTgl22[2]%4;
$bln22=$pecahTgl22[1];

if($tahunkabisat==0 and $tglangsuran2>28 and $bln22==2){$hsltgl2=29;}
elseif($tahunkabisat!=0 and $tglangsuran2>28 and $bln22==2){$hsltgl2=28;}
elseif(($tahunkabisat!=0 or $tahunkabisat==0) and $tglangsuran2<=28 and $bln22==2){$hsltgl2=$tglangsuran2;}else{$hsltgl2=$tglangsuran2;}

$hasiltglakhir2=$hsltgl2.' '.$array_bulan[$pecahTgl22[1]].' '.$pecahTgl22[2];

?>
<tr>
<td style=background-color:'.$warna.'><div align="center" class="class24"><?php echo $no2; ?></div></td>
<td style=background-color:'.$warna.'><div align="left" class="class24">&nbsp;<?php echo $hasiltglakhir2; ?> &nbsp;</div></td>
<td style=background-color:'.$warna.'><div align="center" class="class24">&nbsp; Rp. <?php echo $hasilangsuran02; ?>&nbsp;</div></td>
</tr>
<?php
} while ($no2 < $jangka2);
}
}
?>
</table>
</div><!--kiri-->


