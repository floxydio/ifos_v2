<?php
$array_bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
$array_hari = array('Sun'=>'Minggu','Mon'=>'Senin','Tue'=>'Selasa','Wed'=>'Rabu','Thu'=>'Kamis','Fri'=>'Jumat','Sat'=>'Sabtu');
include_once "../library/inc.library.php";
include_once "../library/inc.connection.php";
$pecahkode=explode("|",$_GET['token']);
$kodereg = $pecahkode[0];
$kodedetail = $pecahkode[1];
//require_once("../dompdf/dompdf_config.inc.php");
require_once '../dompdf2/lib/html5lib/Parser.php';
//require_once '../dompdf2/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once '../dompdf2/lib/php-svg-lib/src/autoload.php';
require_once '../dompdf2/src/Autoloader.php';
Dompdf\Autoloader::register();


//cari data akad
$dataregisterakad=mysqli_query($koneksidbi,"SELECT * FROM akad_register WHERE sha1(kd_regakad)='$kodereg'");
$rowregakad=mysqli_fetch_assoc($dataregisterakad);
$namanasabah=strtolower($rowregakad['namapemohon']);
$namanasabah=$rowregakad['namapemohon'];
$jns_usaha=$rowregakad['jns_usaha'];
$tglakad=$rowregakad['tglakad'];
$cabang=$rowregakad['cabangpemohon'];
$tampilkanbiaya=$rowregakad['tampilkan_biaya'];
$tampilkantglakad=$rowregakad['tampilkan_hari'];
$tipepembiayaan=$rowregakad['tipepembiayaan'];
$koderegakadfoleder=$rowregakad['kd_regakad'];
$namanasabah2=strtolower($rowregakad['namapemohon']);
$kua=$rowregakad['kua'];
//setting po
$pilpo=$rowregakad['pil_po'];
if($pilpo==1){$tampilpilihanpo1='stylehide';$tampilpilihanpo2='';}else{$tampilpilihanpo1='';$tampilpilihanpo2='stylehide';}


//setting tgl akad



//data kuasa
$datakuasa=mysqli_query($koneksidbi,"SELECT * FROM akad_perwakilan WHERE cabang='$cabang' AND ttd='$kua'");
$rowkuasa=mysqli_fetch_assoc($datakuasa);
$cabangkuasa=$rowkuasa['cabang'];
$sqlShowareacabang = mysqli_query($koneksidbi,"SELECT * FROM cabang WHERE kodecabang='$cabangkuasa'");
	$dataShowareacabang = mysqli_fetch_array($sqlShowareacabang);
	$namacabang=$dataShowareacabang['nama'];
	$dataalamat=$dataShowareacabang['alamat'];
	$datatelpon=$dataShowareacabang['telpon'];
	$datafax=$dataShowareacabang['fax'];
	$namakota=$dataShowareacabang['kd'];
	//cari area
	$sqlShowregion= mysqli_query($koneksidbi,"SELECT * FROM cabanginduk WHERE kodecabang='$cabangkuasa'");
	$dataShowregion= mysqli_fetch_array($sqlShowregion);
	$namaarea=$dataShowregion['nama'];
	//cari region
	$sqlShowregion1= mysqli_query($koneksidbi,"SELECT * FROM kanwil WHERE koderegion='$cabangkuasa'");
		$dataShowregion1= mysqli_fetch_array($sqlShowregion1);
	$namaregion=$dataShowregion1['nama'];
	//cari group
	$sqlShowgroup= mysqli_query($koneksidbi,"SELECT * FROM unitgroup WHERE kodegroup='$cabangkuasa'");
	$dataShowgroup= mysqli_fetch_array($sqlShowgroup);
	$namagroup=$dataShowgroup['namagroup'];


if($namacabang!=""){$namaunitkerja=$namacabang;}elseif($namaarea!=""){$namaunitkerja=$namaarea;}elseif($namaregion!=""){$namaunitkerja=$namaregion;}elseif($namagroup!=""){$namaunitkerja=$namagroup;}elseif($kodeunitkerja!=""){$namaunitkerja=$kodeunitkerja;}else{$namaunitkerja='';}

$pengganti=$rowkuasa['ipengganti'];
$noskpengganti=$rowkuasa['noskpengganti'];
if($pengganti=='Y'){$tampiljuncto=' <em>juncto</em> '.$noskpengganti;}else{$tampiljuncto='';}

$penggantiarea=$rowkuasa['penggantiarea'];
$kdarea=$rowkuasa['namaarea'];
$sqlShowregiona= mysqli_query($koneksidbi,"SELECT kodecabang,nama FROM cabanginduk WHERE kodecabang='$kdarea'");
$dataShowregiona= mysqli_fetch_array($sqlShowregiona);
$namaarea=$dataShowregiona['nama'];
if($penggantiarea=='Y'){$hasilnamaunitkerja=$namaarea;}else{$hasilnamaunitkerja=$namaunitkerja;}

if($jns_usaha=='badan_usaha'){

//data nasabah
$datanasabah=mysqli_query($koneksidbi,"SELECT * FROM akad_nasabah_sale WHERE sha1(kd_reg_nasabah)='$kodereg'");
$rownasabah=mysqli_fetch_assoc($datanasabah);
$wkl = $rownasabah['wakil_perusahaan'];
$alamat = $rownasabah['alamat_perusahaan'];
    $bar = $rownasabah['kd_reg_nasabah'];
if($rownasabah['cekseumurnasabah']=='Y'){
    $ber='seumur hidup';
}else{
   $ber=$rownasabah['berlakuktpusaha'];
}
if ($rownasabah['no_negara']==''){
    $negara= '';
    }else{
$negara= 'dan telah diumumkan dalam Berita Negara RI No.'.$rownasabah['no_negara'].' tanggal '.$rownasabah['tgl_negara'].' dan Tambahan Berita Negara No.'.$rownasabah['no_tbnegara'];
}
if ($rownasabah['komparasi']==''){
$komparasi = '<strong>'.$namanasabah.'</strong> berkedudukan di '.$rownasabah['alamat_perusahaan'].', dalam hal ini diwakili oleh '.$rownasabah['wakil_perusahaan'].', KTP No. '.$rownasabah['noktp'].' tanggal '.$rownasabah['tgl_ktpusaha'].' berlaku sampai dengan tanggal '.$ber.', dalam jabatannya sebagai '.$rownasabah['jabatan_wakil'].' dalam hal ini bertindak dalam jabatannya tersebut diatas dan telah mendapat persetujuan tertulis dari Dewan Komisaris sesuai dengan surat persetujuan nomor '.$rownasabah['no_persetujuan'].' tanggal '.IndonesiaTgl($rownasabah['tgl_persetujuan']).' dari dan demikian untuk dan atas nama serta sah mewakili Perseroan Terbatas '.$namanasabah.', sesuai dengan ketentuan Pasal '.$rownasabah['pasal_wenang'].' dari Anggaran Dasar yang dimuat dalam Akta nomor '.$rownasabah['no_akta_ad'].'  tanggal '.IndonesiaTgl($rownasabah['tgl_akta_ad']).' yang dibuat oleh dan dihadapan '.IndonesiaTgl($rownasabah['nama_notaris']).' Notaris di '.$rownasabah['lokasi_wilayah'].' '.$negara.'(untuk selanjutnya disebut  &quot;NASABAH&quot;).';
}else{
$komparasi = $rownasabah['komparasi'];
}
$tglpersetujuan=$rownasabah['tglsuratkuasa'];
$suratkuasaspouse=$rownasabah['suratkuasapersetujuan'];
if($suratkuasaspouse=='Y' or $tipepembiayaan=="Unsecured"){
$suratpersetujuan='';$hasilnamaspouse='';}else{
$suratpersetujuan='stylehide';$hasilnamaspouse=$rownasabah['namaspouse'];}

//setting tgl persetujuan
$tglpersetujuanpecah1 = explode("-",$tglpersetujuan);
$datetglpersetujuan=$tglpersetujuanpecah1[2];
$tglpersetujuanmonth1=$tglpersetujuanpecah1[1];
$yeartglpersetujuan=$tglpersetujuanpecah1[0];
$anntglpersetujuan=strtotime($tglpersetujuan);
$tglpersetujuanM=date('n',$anntglpersetujuan);
$tglpersetujuanT=date('j',$anntglpersetujuan);
$tglpersetujuanNamaHari=date('D',$anntglpersetujuan);
$haripersetujuan=$array_hari[$tglpersetujuanNamaHari];
$bulantglpersetujuan = $array_bulan [$tglpersetujuanM];
$tglpersetujuant = $tglpersetujuanT;
$tglpersetujuanb=$bulantglpersetujuan;
$tglpersetujuantahun=$yeartglpersetujuan;
$hasiltglpersetujuan=$tglpersetujuant.' '.$tglpersetujuanb.' '.$tglpersetujuantahun;
}else{
 $datanasabah=mysqli_query($koneksidbi,"SELECT * FROM akad_nasabah WHERE sha1(kdregnasabah)='$kodereg'");
$rownasabah=mysqli_fetch_assoc($datanasabah);
$wkl =$namanasabah;
$alamat = $rownasabah['alamat'];

$dataexpnasabah=$rownasabah['seumurhidup'];
if($dataexpnasabah=='Y'){$hasiltglexpnasabah='Seumur Hidup';}else{$hasiltglexpnasabah='tanggal '.IndonesiaTgl($rownasabah['berlakuktp']);}
$dataexpspouse=$rownasabah['seumurhidupspouse'];
if($dataexpspouse=='Y'){$hasiltglexpspouse='Seumur Hidup';}else{$hasiltglexpspouse='tanggal '.IndonesiaTgl($rownasabah['berlakuktpspouse']);}

$dataidentitas=$rownasabah['jenisindentitas'];
$dataidentitasspouse=$rownasabah['indentitasspouse'];

if($dataidentitas=='Resi'){$hasiltampilnomor='No. '.$rownasabah['noresi'].' yang dikeluarkan oleh '.$rownasabah['penerbit'].' dengan ';$hasilnomor2='NIK';}else{$hasiltampilnomor='';$hasilnomor2='';}
if($dataidentitasspouse=='Resi'){$hasiltampilnomorspouse='No. '.$rownasabah['noresispouse'].' yang dikeluarkan oleh '.$rownasabah['penerbitspouse'].' dengan ';$hasilnomor2spouse='NIK';}else{$hasiltampilnomorspouse='';$hasilnomor2spouse='';}


$statusnasabah=$rownasabah['statuskawin'];
if($statusnasabah=='Menikah'){$hasilstatuskawin='';$hasilstatuskawin2='stylehide';$hasilpasal3hal1='stylehide';$hasilpasal3hal2='';}else{$hasilpasal3hal1='';$hasilpasal3hal2='stylehide';$hasilstatuskawin='stylehide';$hasilstatuskawin2='';}
$jeniskelamin=$rownasabah['jeniskelamin'];
if($jeniskelamin=='L'){$hasiljk='Istri';}else{$hasiljk='Suami';}
$tglpersetujuan=$rownasabah['tglsuratkuasa'];
$suratkuasaspouse=$rownasabah['suratkuasapersetujuan'];
if($suratkuasaspouse=='Y' or $tipepembiayaan=="Unsecured"){
$suratpersetujuan='';$hasilnamaspouse='';}else{
$suratpersetujuan='stylehide';$hasilnamaspouse=$rownasabah['namaspouse'];}

//setting tgl persetujuan
$tglpersetujuanpecah1 = explode("-",$tglpersetujuan);
$datetglpersetujuan=$tglpersetujuanpecah1[2];
$tglpersetujuanmonth1=$tglpersetujuanpecah1[1];
$yeartglpersetujuan=$tglpersetujuanpecah1[0];
$anntglpersetujuan=strtotime($tglpersetujuan);
$tglpersetujuanM=date('n',$anntglpersetujuan);
$tglpersetujuanT=date('j',$anntglpersetujuan);
$tglpersetujuanNamaHari=date('D',$anntglpersetujuan);
$haripersetujuan=$array_hari[$tglpersetujuanNamaHari];
$bulantglpersetujuan = $array_bulan [$tglpersetujuanM];
$tglpersetujuant = $tglpersetujuanT;
$tglpersetujuanb=$bulantglpersetujuan;
$tglpersetujuantahun=$yeartglpersetujuan;
$hasiltglpersetujuan=$tglpersetujuant.' '.$tglpersetujuanb.' '.$tglpersetujuantahun;

}
//data detail
$datadetail=mysqli_query($koneksidbi,"SELECT * FROM akad_detail WHERE sha1(kdakaddetail)='$kodedetail'");
$rowdetail=mysqli_fetch_assoc($datadetail);
$statussp3=$rowdetail['pilsp3'];
$tglrealisasi=$rowdetail['tglrealisasi'];
 if($tglrealisasi==''){
   $tglbaru = $tglakad;
 }else{
   $tglbaru = $tglrealisasi;
 }
$tglakadpecah1 = explode("-",$tglbaru);
$datetglakad=$tglakadpecah1[2];
$tglakadmonth1=$tglakadpecah1[1];
$yeartglakad=$tglakadpecah1[0];
$anntglakad=strtotime($tglbaru);
$tglakadM=date('n',$anntglakad);
$tglakadT=date('j',$anntglakad);
$tglakadNamaHari=date('D',$anntglakad);
$hariakad=$array_hari[$tglakadNamaHari];
$bulantglakad = $array_bulan [$tglakadM];
$tglakadt = $tglakadT;
$tglakadb=$bulantglakad;
$tglakadtahun=$yeartglakad;

if($tampilkantglakad=="T"){$hasilhariakad="&nbsp;..................................&nbsp;";$hasiltglakadt="&nbsp;..............................................&nbsp;";$hasilbulantglakad="&nbsp;..............................................&nbsp;";$hasiltglakadtahun="&nbsp;....................................................................&nbsp;";$hasiltglakad="&nbsp;...................................&nbsp;";$hasiltglakadt2="&nbsp;..............................................&nbsp;";$hasilbulantglakad2="";$hasiltglakadtahun2="";}else{$hasilhariakad=ucwords(strtolower($hariakad));$hasiltglakadt=ucwords(str_replace("Rupiah","",terbilang($tglakadt)));$hasilbulantglakad=$bulantglakad;$hasiltglakadtahun=ucwords(str_replace("Rupiah","",terbilang($tglakadtahun)));$hasiltglakad=IndonesiaTgl($tglakad);$hasiltglakadt2=$tglakadt;$hasilbulantglakad2=$bulantglakad;$hasiltglakadtahun2=$tglakadtahun;}



if($statussp3=='Y'){$hasilstatussp3='';}else{$hasilstatussp3='stylehide';}
$tipeangsuran=$rowdetail['jenisangsuran'];
if($tipeangsuran=='Single'){
$hasilangsuran=format_angka($rowdetail['angsuran3']).'';
}else{
$hasilangsuran=format_angka($rowdetail['angsuran2']).'<br/>Rp '.format_angka($rowdetail['angsuran']).'<br/>Rp '.format_angka($rowdetail['angsuran3']).'';
}
if($tampilkanbiaya=='Y'){
$hasilbiayalain1=format_angka($rowdetail['biayalain1']);$hasilbiayalain2=
format_angka($rowdetail['biayalain2']);$hasilbiayaadministrasi=format_angka($rowdetail['biayaadministrasi']);$hasilbiayaasuransi1=$rowdetail['biayaasuransi'];$hasilbiayanotaris=format_angka($rowdetail['biayanotaris']);$hasilbiayaappraisal=format_angka($rowdetail['biayaappraisal']);$hasilbiayaasuransikerugian=format_angka($rowdetail['biayaasuransikerugian']);}else{$hasilbiayalain1='';$hasilbiayalain2=
'';$hasilbiayaadministrasi='';$hasilbiayaasuransi1='';$hasilbiayanotaris='';$hasilbiayaappraisal='';$hasilbiayaasuransikerugian='';}
if($tipepembiayaan=='Secured'){
$tampilpasal51secured="";$tampilpasal52secured="stylehide";$tampilpasal3unsecured="";$tampilpasal3secured="stylehide";$tampilket1unsecured='';$tampilket2unsecured='';}else{$tampilpasal51secured="stylehide";$tampilpasal52secured="";$tampilpasal3unsecured="";$tampilpasal3secured="stylehide";$tampilket1unsecured='Sumber pembayaran gaji berdasarkan:<br/>';$tampilket2unsecured='Atas nama '.$rowregakad['namapemohon'].' Yang diserahkan kepada Bank dan disimpan di Bank sampai dengan pembiayaan nasabah dinyatakan lunas.';}

if($hasilbiayaasuransi1==0){$hasilbiayaasuransi='Sesuai Tagihan';$hasilrpasuransi='';}else{$hasilbiayaasuransi=format_angka($rowdetail['biayaasuransi']);$hasilrpasuransi='Rp';}
if($hasilbiayaasuransikerugian==0){$hasilbiayaasuransikerugian='Sesuai Tagihan';$hasilrpasuransikerugian='';}else{$hasilbiayaasuransikerugian=format_angka($rowdetail['biayaasuransikerugian']);$hasilrpasuransikerugian='Rp';}
//tampil biaya adm
if($rowdetail['st_administarsi']=='Y'){$tampilbiayaadministrasi='stylehide';}else{$tampilbiayaadministrasi='';}
if($rowdetail['st_asuransikerugian']=='Y'){$tampilbiayakerugian='stylehide';}else{$tampilbiayakerugian='';}
if($rowdetail['st_notaris']=='Y'){$tampilbiayanotaris='stylehide';}else{$tampilbiayanotaris='';}
if($rowdetail['st_appraisal']=='Y'){$tampilbiayaappraisal='stylehide';}else{$tampilbiayaappraisal='';}
if($rowdetail['st_biayalain1']=='Y'){$tampilbiayalain1='stylehide';}else{$tampilbiayalain1='';}
if($rowdetail['st_biayalain2']=='Y'){$tampilbiayalain2='stylehide';}else{$tampilbiayalain2='';}

//syaratlain
$isisyaratlain1=$rowdetail['syaratlain1'];
$isisyaratlain2=$rowdetail['syaratlain2'];
$isisyaratlain3=$rowdetail['syaratlain3'];
$isisyaratlain4=$rowdetail['syaratlain4'];
$isisyaratlain5=$rowdetail['syaratlain5'];
$isisyaratlain6=$rowdetail['syaratlain6'];
$isisyaratlain7=$rowdetail['syaratlain7'];
$isisyaratlain8=$rowdetail['syaratlain8'];
$isisyaratlain9=$rowdetail['syaratlain9'];
$isisyaratlain10=$rowdetail['syaratlain10'];
if($isisyaratlain1!=''){$syaratlain1='';}else{$syaratlain1='stylehide';}
if($isisyaratlain2!=''){$syaratlain2='';}else{$syaratlain2='stylehide';}
if($isisyaratlain3!=''){$syaratlain3='';}else{$syaratlain3='stylehide';}
if($isisyaratlain4!=''){$syaratlain4='';}else{$syaratlain4='stylehide';}
if($isisyaratlain5!=''){$syaratlain5='';}else{$syaratlain5='stylehide';}
if($isisyaratlain6!=''){$syaratlain6='';}else{$syaratlain6='stylehide';}
if($isisyaratlain7!=''){$syaratlain7='';}else{$syaratlain7='stylehide';}
if($isisyaratlain8!=''){$syaratlain8='';}else{$syaratlain8='stylehide';}
if($isisyaratlain9!=''){$syaratlain9='';}else{$syaratlain9='stylehide';}
if($isisyaratlain10!=''){$syaratlain10='';}else{$syaratlain10='stylehide';}


//data objek
$dataobjek=mysqli_query($koneksidbi,"SELECT * FROM akad_objek WHERE sha1(kdakaddetailobjek)='$kodedetail' ORDER BY tglinput ASC");
$jmlobjek=mysqli_num_rows($dataobjek);

///menampilkan data objek
$rownamaobjek=mysqli_fetch_row($dataobjek);
$tampildatanamaobjek=$rownamaobjek[4];
$rownamaobjek=mysqli_fetch_row($dataobjek);
$tampildatanamaobjek1=$rownamaobjek[4];
$rownamaobjek=mysqli_fetch_row($dataobjek);
$tampildatanamaobjek2=$rownamaobjek[4];
$rownamaobjek=mysqli_fetch_row($dataobjek);
$tampildatanamaobjek3=$rownamaobjek[4];
$rownamaobjek=mysqli_fetch_row($dataobjek);
$tampildatanamaobjek4=$rownamaobjek[4];
if($jmlobjek==1){
$hasiltampilnamaobjek=$tampildatanamaobjek;
}elseif($jmlobjek==2){
$hasiltampilnamaobjek=$tampildatanamaobjek.' dan '.$tampildatanamaobjek1;
}elseif($jmlobjek==3){
$hasiltampilnamaobjek=$tampildatanamaobjek.' dan '.$tampildatanamaobjek1.' dan '.$tampildatanamaobjek2;
}elseif($jmlobjek==4){
$hasiltampilnamaobjek=$tampildatanamaobjek.' dan '.$tampildatanamaobjek1.' dan '.$tampildatanamaobjek2.' dan '.$tampildatanamaobjek3;
}elseif($jmlobjek==5){
$hasiltampilnamaobjek=$tampildatanamaobjek.' dan '.$tampildatanamaobjek1.' dan '.$tampildatanamaobjek2.' dan '.$tampildatanamaobjek3.' dan '.$tampildatanamaobjek4;
}
//objek diakad wakalah
//cek upload rab

if($jmlobjek==1){
$hasiltampilnamaobjekwakalah2='stylehide';$hasiltampilnamaobjekwakalah3='stylehide';$hasiltampilnamaobjekwakalah4='stylehide';$hasiltampilnamaobjekwakalah5='stylehide';$tampilpagepisahwakalah='stylehide';}else
if($jmlobjek==2){
$hasiltampilnamaobjekwakalah2='';$hasiltampilnamaobjekwakalah3='stylehide';$hasiltampilnamaobjekwakalah4='stylehide';$hasiltampilnamaobjekwakalah5='stylehide';$tampilpagepisahwakalah='stylehide';}else
if($jmlobjek==3){
$hasiltampilnamaobjekwakalah2='';$hasiltampilnamaobjekwakalah3='';$hasiltampilnamaobjekwakalah4='stylehide';$hasiltampilnamaobjekwakalah5='stylehide';$tampilpagepisahwakalah='';}else
if($jmlobjek==4){
$hasiltampilnamaobjekwakalah2='';$hasiltampilnamaobjekwakalah3='';$hasiltampilnamaobjekwakalah4='';$hasiltampilnamaobjekwakalah5='stylehide';$tampilpagepisahwakalah='';}else
if($jmlobjek==5){
$hasiltampilnamaobjekwakalah2='';$hasiltampilnamaobjekwakalah3='';$hasiltampilnamaobjekwakalah4='';$hasiltampilnamaobjekwakalah5='';$tampilpagepisahwakalah='';}

//cari upload file fpp
$dataupload=mysqli_query($koneksidbi,"SELECT * FROM akad_fpp_upload WHERE sha1(kdregupload)='$kodereg' AND hal='1'");
$rowupload=mysqli_fetch_assoc($dataupload);

//cari upload file fpp
$dataupload2=mysqli_query($koneksidbi,"SELECT * FROM akad_fpp_upload WHERE sha1(kdregupload)='$kodereg' AND hal='2'");
$jmldataupload2=mysqli_num_rows($dataupload2);
$rowupload2=mysqli_fetch_assoc($dataupload2);
if($jmldataupload2>=1){$tampiluploadhal2='';}else{$tampiluploadhal2='stylehide';}

//data detail
$datadetail=mysqli_query($koneksidbi,"SELECT * FROM akad_detail WHERE sha1(kdakaddetail)='$kodedetail'");
$rowdetail=mysqli_fetch_assoc($datadetail);
$tipeangsuran=$rowdetail['jenisangsuran'];
$hasilangsuran1=format_angka($rowdetail['angsuran2']);$hasilangsuran2=format_angka($rowdetail['angsuran']);$hasilangsuran3=format_angka($rowdetail['angsuran3']);$hasiltenor1=$rowdetail['tenor2'];$hasiltenor2=$rowdetail['tenor1']-$rowdetail['tenor2'];$hasiltenor3=$rowdetail['tenor3']-$rowdetail['tenor1'];
$kodepilakad=$rowdetail['kdpilakaddetail'];
$kodeakaddet=$rowdetail['kdakaddetail'];

//[ilakad
$datapilakad=mysqli_query($koneksidbi,"SELECT * FROM akad_jenispilihan WHERE kdpilihakad='$kodepilakad'");
$rowpilakad=mysqli_fetch_assoc($datapilakad);
$skim=$rowpilakad['skim'];
$kodeunik=$rowpilakad['nourut'];
//setting page setup
$tenorakhir=$rowdetail['tenor3'];
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

$datasubobjek0=mysqli_query($koneksidbi,"SELECT * FROM akad_sub_objek WHERE sha1(kdobjekakad)='$kodedetail'");
$jmldatasubobjek=mysqli_num_rows($datasubobjek0);
if($jmldatasubobjek>=1){$tampilrincianobjek='';$tampilpagesttb='page-break-after:always';}else{$tampilrincianobjek='stylehide';$tampilpagesttb='';}

if($jmldatasubobjek>40){$tampilhal2='';$tampildivpage1='page-break-after:always';}else{$tampilhal2='stylehide';$tampildivpage1='';}
//data objek
$dataobjeksub=mysqli_query($koneksidbi,"SELECT * FROM akad_objek WHERE sha1(kdobjekakad)='$kodedetail' ORDER BY tglinput ASC");
$rowobjek=mysqli_fetch_assoc($dataobjeksub);

///carinomorakadmrbh
$dataakadnomormrbh=mysqli_query($koneksidbi,"SELECT nomor FROM akad_nomor WHERE sha1(kdregnomor)='$kodereg' AND kdpilakadnomor='$kodepilakad' AND skim='Murabahah'");
$rowakadnomormrbh=mysqli_fetch_assoc($dataakadnomormrbh);

$html='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Surat Realisasi Murabahah</title>
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
<div align="center" class="class15"><strong>SURAT PERMOHONAN REALISASI</strong><br/>
<div align="center" class="class15"><br/>
</strong></div>
<table width="541" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50" ><div align="justify" style="" class="class14"><strong>Kepada</strong></div></td>
	 </tr>
  <tr>
    <td width="50" ><div align="justify" style="" class="class14"><strong>PT BANK SYARIAH MANDIRI</strong></td>
  </tr>
  <tr>
    <td width="50" ><div align="justify" style="" class="class14"><strong> '.$namaunitkerja.'</strong></td>
  </tr>
</table><br/>
<div align="justify" class="class14">
Bersama ini kami yang bertanda tangan di bawah ini:</div>

<table width="541" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50" ><div align="justify" style="" class="class14">Nama</div></td>
	<td width="25" ><div align="justify" style="" class="class14">:</div></td>
    <td width="506" ><div align="justify" class="class14">'.$wkl.'</div></td>
  </tr>
  <tr>
    <td width="50" ><div align="justify" style="" class="class14">Alamat</div></td>
	<td width="25" ><div align="justify" style="" class="class14">:</div></td>
    <td width="506" ><div align="justify" class="class14">'.ucwords(strtolower($alamat)).'</div></td>
  </tr>
</table><br/>
 <div align="justify" class="class14">
bertindak untuk diri sendiri/dalam kedudukannya selaku '.$rownasabah['jabatan_wakil'].' dari, dan karenanya berdasarkan surat persetujuan nomor '.$rownasabah['no_persetujuan'].' bertindak untuk dan atas nama '.$namanasabah.' dengan mengacu pada Surat Penawaran Pemberian Pembiayaan (SP3) '.$rowdetail['nosp3'].' tanggal '.IndonesiaTgl($rowdetail['tglsp3']).', dengan ini mengajukan realisasi fasilitas Pembiayaan Murabahah, dengan rincian:</div><br/>
<table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15" >1.</td>
    <td width="225" ><div align="justify" class="class14">Tujuan Fasilitas Pembiayaan Murabahah :</div></td><td width="300" ><div align="justify" style="" class="class14"> Pembelian Obyek Akad berupa '.$hasiltampilnamaobjek.' </div></td>
  </tr>
</table>
<table width="541" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td width="20">2.</td>
    <td width="194" ><div align="justify" class="class14">Jangka Waktu : </div></td>
    <td width="100" ><div align="justify" style="" class="class14"><strong>'.$rowdetail['tenor3'].' ('.str_replace(" Rupiah","",terbilang($rowdetail['tenor3'])).') bulan</strong><br> sejak realiasi Fasilitas Pembiayaan Murabahah.</div></td>
  </tr>
<tr>
    <td width="20">3.</td>
    <td width="220" ><div align="justify" class="class14">Harga Perolehan / harga pokok Obyek Akad : </div></td>
    <td width="308" ><div align="justify" class="class14"><strong>Rp '.format_angka($rowdetail['hargaperolehan']).' ('.terbilang($rowdetail['hargaperolehan']).')</strong></div></td>
  </tr>
  <tr>
    <td width="20">4.</td>
    <td >
      <div align="justify" class="class14">Margin Keuntungan Bank:</div>
    </li></td>
    <td ><div align="justify" class="class14"><strong>Rp '.format_angka($rowdetail['nilaimargin']).'</div></td>
  </tr>
  <tr>
    <td width="20">5.</td>
    <td >
      <div align="justify" class="class14">Harga Jual Kepada Nasabah:</div>
    </li></td>
    <td ><div align="justify" class="class14"><strong>Rp '.format_angka($rowdetail['hargajual']).'</strong></div></td>
  </tr>
  <tr>
    <td width="20">6.</td>
    <td >
      <div align="justify" class="class14">Uang Muka yang telah dibayarkan nasabah:</div>
    </li></td>
    <td ><div align="justify" class="class14"><strong>Rp '.format_angka($rowdetail['uangmuka']).'</strong></div></td>
  </tr>

  <tr>
    <td width="20">7.</td>
    <td >
      <div align="justify" class="class14">Jumlah Kewajiban Nasabah terhadap Bank</div>
    </li></td>
    <td ><div align="justify" class="class14"><strong>Rp '.format_angka($rowdetail['jmlkewajiban']).'</strong> </div></td>
  </tr>
  </table><br>
  <div align="justify" class="class14">
Demikian permohonan ini kami ajukan, atas kesediannya kami ucapkan terima Kasih.</div><br/>
  <div align="justify" class="class14">'
.ucwords(strtolower($namakota)).','.$hasiltglakadt2.' '.$hasilbulantglakad2.' '.$hasiltglakadtahun2.'.</div><br/>';
if($jns_usaha=='badan_usaha'){
$html.='<table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="30"><div align="left" class="class15"><strong>NASABAH</strong></div></td>
  </tr>
  <tr>
    <td width="30"><div align="left" class="class14">'.$namanasabah.'&nbsp;&nbsp;&nbsp;</div></td>
    <td >&nbsp;</td>
    <td ></div></td>
  </tr>
  <tr>
    <td height="90"><div align="left" class="class14">&nbsp;&nbsp;&nbsp;</div></td>
    <td >&nbsp;</td>
    <td ></div></td>
  </tr>
  <tr>
    <td width="255" ><div align="left" class="class14">'.$rownasabah['wakil_perusahaan'].'&nbsp;&nbsp;&nbsp;</div></td>
    <td >&nbsp;</td>
  </tr>
</table>';
}else{
$html.='<table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="30"><div align="left" class="class15"><strong>NASABAH</strong></div></td>
    <td width="5" >&nbsp;</td>
  </tr>
  <tr>
    <td height="90">&nbsp;</td>
    <td >&nbsp;</td>
    <td ></div></td>
  </tr>
  <tr>
    <td width="255" ><div align="left" class="class14">'.$namanasabah.'&nbsp;&nbsp;&nbsp; '.$hasilnamaspouse.'</div></td>
    <td >&nbsp;</td>
  </tr>
</table>';
}

$html.='</body>
</html>';


use Dompdf\Dompdf;
use Dompdf\Options;

//$file=file_get_contents('../akadbawahtangan/print_akad_murabahah_dengan_agunan.html');
//$file=file_get_contents('../akadbawahtangan/akad_murabahah_retail_dengan_agunan.html');
$date=date('Ymd');
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper("A4", "portrait");
$dompdf->set_option("defaultFont", "Arial");
$dompdf->render();
$canvas=$dompdf->get_canvas();
//$font=Font_Metrics::get_font("helvetica","bold");
$canvas->page_text(500,800,"Halaman: {PAGE_NUM} dari {PAGE_COUNT}","Arial",9,array(0,0,0));
//$canvas->page_text(10,800,"******** Maker: Ling Sudirgo | Greather: Andi Baraya ********","Arial",9,array(0,0,0));
//$dompdf = str_replace("%%NM%%", $namana	sabah, $dompdf);
$hasilnamanasabah=str_replace(" ","_",$namanasabah2);
$filename=$hasilnamanasabah.'_'.$date.'_surat_realisasi_murabahah'.'.pdf';
$dompdf->stream('"'.$filename.'"', array("Attachment" => 0));
$output=$dompdf->output();


mysqli_close($koneksidbi);
mysqli_close($koneksidb);
//file_put_contents("../akadbawahtangan/filepdf/".$filename,$output);
?>
