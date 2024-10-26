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
    }           ?>

 <?php
  if($db['skim']=='3'){
$tenorakhir='7';
 $tglakad=$this->template->IndonesiaTgl($dbakad['tgl_akad']);
if($tenorakhir<=15){$tampiltabel1='';$tampiltabel2='stylehide';$tampiltabel3='stylehide';$tampiltabel4='stylehide';$tampiltabel5='stylehide';$tampiltabel6='stylehide';}
else
if($tenorakhir>16 and $tenorakhir<=30){$tampiltabel1='';$tampiltabel2='';$tampiltabel3='stylehide';$tampiltabel4='stylehide';$tampiltabel5='stylehide';$tampiltabel6='stylehide';}
else
if($tenorakhir>31 and $tenorakhir<=45){$tampiltabel1='';$tampiltabel2='';$tampiltabel3='';$tampiltabel4='stylehide';$tampiltabel5='stylehide';$tampiltabel6='stylehide';}
else
if($tenorakhir>46 and $tenorakhir<=60){$tampiltabel1='';$tampiltabel2='';$tampiltabel3='';$tampiltabel4='';$tampiltabel5='stylehide';$tampiltabel6='stylehide';}
else
if($tenorakhir>61 and $tenorakhir<=75){$tampiltabel1='';$tampiltabel2='';$tampiltabel3='';$tampiltabel4='';$tampiltabel5='stylehide';$tampiltabel6='';}
else
if($tenorakhir>76 and $tenorakhir<=90){$tampiltabel1='';$tampiltabel2='';$tampiltabel3='';$tampiltabel4='';$tampiltabel5='';$tampiltabel6='';}
 ?>
 <div style="page-break-after:always">
<div align="left" class="class15"><strong> JADWAL PEMBAYARAN GADAI EMAS</strong></div><br/>
<div align="justify" class="class14 <?php echo $tampiltabel1 ?>" id="kiri">
<table cellpadding="1" cellspacing="0" border='1' class="table table-bordered table-condensed table-striped">
<tr>
    <th style="background-color:#333333;color:#FFFFFF"><div align="center" class="class14">Periode ke-</div></th>
        <th style="background-color:#333333;color:#FFFFFF"><div align="center" class="class14">Tanggal </div></th>
            <th style="background-color:#333333;color:#FFFFFF"><div align="center" class="class14">Periode</div></th>

        <th style="background-color:#333333;color:#FFFFFF"><div align="center" class="class14">Pembiayaan</div></th>
               <th style="background-color:#333333;color:#FFFFFF"><div align="center" class="class14">Biaya</div></th>
               <th style="background-color:#333333;color:#FFFFFF"><div align="center" class="class14">Jumlah</div></th>

    </tr>
        <?php
//angsuran ke 2
$no2 = 0;
//cari batas jangka
$maxtenor=$db['jangka_waktu'];
if($maxtenor>0 and $maxtenor<=30){$hasiljangka2=$maxtenor;
$jangka2=$hasiljangka2;
$tglangsuran2=$dbakad['tgl_angsuran'];
$pecahTglakad2 = explode("-", $tglakad);
$tglakad2 = $pecahTglakad2[0];
$blnakad2 = $pecahTglakad2[1];
$thnakad2 = $pecahTglakad2[2];

$hasiltglakadke2=date("d-m-Y",mktime(0,0,0,$blnakad2,$tglakad2,$thnakad2));
$pecahTgl2 = explode("-", $hasiltglakadke2);

// membaca bagian-bagian dari $date2
$tgl2 = $pecahTgl2[0];
$bln2 = $pecahTgl2[1];
$thn2 = $pecahTgl2[2];
$no2++;
if($no2 % 2==0)$warna="#FFFFFF";else $warna="#CCCCCC";
   $plafon = str_replace(',','',$db['plafon']);
 $biaya_ujrah = str_replace(',','',$db['biaya_ujrah']);
 $biaya_ujrahsekali= $biaya_ujrah *1;
 $jumlah2 =  $plafon + $biaya_ujrahsekali;
   $total2= number_format($jumlah2);

$hasilangsuran02=number_format($biaya_ujrahsekali);
$hasiltgl2=date("d n Y",mktime(0,0,0,$bln2,$tglangsuran2+15,$thn2));
$pecahTgl22 = explode(" ",$hasiltgl2);
$tahunkabisat=$pecahTgl22[2]%4;
$bln22=$pecahTgl22[1];

if($tahunkabisat==0 and $tglangsuran2>28 and $bln22==2){$hsltgl2=29;}
elseif($tahunkabisat!=0 and $tglangsuran2>28 and $bln22==2){$hsltgl2=28;}
elseif(($tahunkabisat!=0 or $tahunkabisat==0) and $tglangsuran2<=28 and $bln22==2){$hsltgl2=$pecahTgl22[0];}else{$hsltgl2=$pecahTgl22[0];}

$hasiltglakhir2=$hsltgl2.' '.$array_bulan[$pecahTgl22[1]].' '.$pecahTgl22[2];
$periode='1-15hari';

?>
<tr>
<td style=background-color:'.$warna.'><div align="center" class="class24">1.</div></td>
<td style=background-color:'.$warna.'><div align="left" class="class24"><?php echo $hasiltglakhir2; ?></div></td>
<td style=background-color:'.$warna.'><div align="left" class="class24"><?php echo $periode; ?></div></td>

<td style=background-color:'.$warna.'><div align="center" class="class24">&nbsp; Rp. <?php echo $db['plafon']; ?></div></td>
<td style=background-color:'.$warna.'><div align="center" class="class24">&nbsp; Rp. <?php echo $hasilangsuran02; ?></div></td>
 <td style=background-color:'.$warna.'><div align="center" class="class24">&nbsp; Rp. <?php echo $total2; ?></div></td>

</tr>
 <?php
 }
 ?>
     <?php
//angsuran ke 2
//cari batas jangka
$maxtenor1=$db['jangka_waktu'];
if($maxtenor>15){$hasiljangka2=$maxtenor1;
$jangka3=$hasiljangka3;
$tglangsuran3=$dbakad['tgl_angsuran'];

$pecahTglakad3 = explode("-", $tglakad);
$tglakad3 = $pecahTglakad3[0];
$blnakad3 = $pecahTglakad3[1];
$thnakad3 = $pecahTglakad3[2];

$hasiltglakadke3=date("d-m-Y",mktime(0,0,0,$blnakad3,$tglakad3,$thnakad3));
$pecahTgl3 = explode("-", $hasiltglakadke3);

// membaca bagian-bagian dari $date2
$tgl3 = $pecahTgl3[0];
$bln3 = $pecahTgl3[1];
$thn3 = $pecahTgl3[2];
$no2++;
if($no2 % 2==0)$warna="#FFFFFF";else $warna="#CCCCCC";
$plafon = str_replace(',','',$db['plafon']);

$biaya_ujrah2 = str_replace(',','',$db['biaya_ujrah']);
 $biaya_ujrahsekali2= $biaya_ujrah2 *2;
 $jumlah =  $plafon + $biaya_ujrahsekali2;
 $hasilangsuran03=number_format($biaya_ujrahsekali2);
 $total= number_format($jumlah);
$hasiltgl3=date("d n Y",mktime(0,0,0,$bln3,$tglangsuran3+30,$thn2));
$pecahTgl23 = explode(" ",$hasiltgl3);
$tahunkabisat1=$pecahTgl23[2]%4;
$bln23=$pecahTgl23[1];

if($tahunkabisat1==0 and $tglangsuran3>28 and $bln23==2){$hsltgl3=29;}
elseif($tahunkabisat1!=0 and $tglangsuran2>28 and $bln23==2){$hsltgl3=28;}
elseif(($tahunkabisat1!=0 or $tahunkabisat1==0) and $tglangsuran3<=28 and $bln23==2){$hsltgl3=$pecahTgl23[0];}else{$hsltgl3=$pecahTgl23[0];}

$hasiltglakhir3=$hsltgl3.' '.$array_bulan[$pecahTgl23[1]].' '.$pecahTgl23[2];
$periode1='15-30hari';

?>
 <tr>
<td style=background-color:'.$warna.'><div align="center" class="class24">2.</div></td>
<td style=background-color:'.$warna.'><div align="left" class="class24"><?php echo $hasiltglakhir3; ?></div></td>
<td style=background-color:'.$warna.'><div align="left" class="class24"><?php echo $periode1; ?></div></td>

<td style=background-color:'.$warna.'><div align="center" class="class24">&nbsp; Rp. <?php echo $db['plafon']; ?></div></td>
<td style=background-color:'.$warna.'><div align="center" class="class24">&nbsp; Rp. <?php echo $hasilangsuran03; ?></div></td>
<td style=background-color:'.$warna.'><div align="center" class="class24">&nbsp; Rp. <?php echo $total; ?></div></td>

</tr>
  <?php
 }

 ?>
</table>
  <?php
   
 }
 ?>
</div><!--kiri-->


