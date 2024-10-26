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
$tglakad=$rowregakad['tglakad'];
$cabang=$rowregakad['cabangpemohon'];
$tampilkanbiaya=$rowregakad['tampilkan_biaya'];
$tampilkantglakad=$rowregakad['tampilkan_hari'];
$tipepembiayaan=$rowregakad['tipepembiayaan'];
$koderegakadfoleder=$rowregakad['kd_regakad'];
$namanasabah2=strtolower($rowregakad['namapemohon']);
$jns_usaha=$rowregakad['jns_usaha'];
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
$ktp = $rownasabah['noktp'];

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
$ktp = $rownasabah['noktp'];

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
$tglrealisasi=$rowdetail['tglpo'];
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
<title>Purchase Order</title>
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
</footer>';

$dataobjek=mysqli_query($koneksidbi,"SELECT * FROM akad_objek WHERE sha1(kdakaddetailobjek)='$kodedetail' ORDER BY tglinput ASC");
while($rowobjek=mysqli_fetch_array($dataobjek)){
$html.='<!-- purchase order 1-->
<div style="page-break-after:always" class="'.$tampilpilihanpo1.'">
<div align="center" class="class15"><strong>PURCHASE ORDER</strong></div><br /><br />
<div align="justify" class="class14">Bersama ini kami yang bertanda tangan di bawah ini:</div><br/>
<table width="541" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50" ><div align="justify" style="" class="class14">Nama</div></td>
	<td width="25" ><div align="justify" style="" class="class14">:</div></td>
    <td width="506" ><div align="justify" class="class14">'.ucwords(strtolower($rowkuasa['nama_wakil'])).'</div></td>
  </tr>
  <tr>
    <td width="50" ><div align="justify" style="" class="class14">Jabatan</div></td>
	<td width="25" ><div align="justify" style="" class="class14">:</div></td>
    <td width="506" ><div align="justify" class="class14"><em>'.ucwords(strtolower($rowkuasa['jab_wakil'])).'</em></div></td>
  </tr>
</table><br/>
<div align="justify" class="class14">
berdasarkan Surat Kuasa dari '.$rowkuasa['dari'].' Nomor '.$rowkuasa['noskdireksi'].' tanggal '.IndonesiaTgl($rowkuasa['tglskdireksi']).' dan Surat Keputusan/Surat Ketetapan Penempatan dan Penugasan (SKPP) Nomor '.$rowkuasa['nosk'].' tanggal '.IndonesiaTgl($rowkuasa['tglsk']).$tampiljuncto.' dari dan karenanya, bertindak untuk dan atas nama serta mewakili PT. Bank Syariah Mandiri, berkedudukan di Jakarta Pusat dan beralamat di Jl. M.H. Thamrin Nomor 5 Jakarta, bermaksud untuk memesan kepada '.$rowobjek['pemasok'].'. selaku penjual untuk mengadakan Obyek Akad dengan persyaratan sebagai berikut :</div><br/>
<table width="541" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="110" ><div align="justify" style="" class="class14">Nama dan jenis barang</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;'.$rowobjek['namabarang'].' '.$rowobjek['rincian'].'</div></td>
  </tr>
  <tr>
    <td width="110" ><div align="justify" style="" class="class14">Jumlah Satuan</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;'.$rowobjek['satuan'].'</div></td>
  </tr>
   <tr>
    <td width="110" ><div align="justify" style="" class="class14">Lokasi</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;'.$rowobjek['lokasi'].'</div></td>
  </tr>
  <tr>
    <td width="110" ><div align="justify" style="" class="class14">Harga</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;Rp '.format_angka($rowobjek['harga']).'</div></td>
  </tr>
</table>';
$kodeobjek=$rowobjek['kdobjekakad'];
$datauploadrab=mysqli_query($koneksidbi,"SELECT * FROM akad_rab_upload WHERE kdobjekupload='$kodeobjek' ORDER BY hal ASC");
$cekjmluploadrab=mysqli_num_rows($datauploadrab);
while($rowuploadrab=mysqli_fetch_assoc($datauploadrab)){
$html.='
<div align="center">
       <p><img src="../File_Upload/akadrab/'.$rowuploadrab['userid'].'/'.IndonesiaTgl($rowuploadrab['tglinput']).'/'.$rowuploadrab['filename'].'" height="'.$rowuploadrab['height'].'px" width="'.$rowuploadrab['width'].'px"></p>
    </div>';
	}
$html.='
<div align="justify" class="class14">Untuk selanjutnya, agar Obyek Akad tersebut diserahkan langsung kepada :</div><br/>
<table width="541" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="110" ><div align="justify" style="" class="class14">Nama</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;'.$wkl.'</div></td>
  </tr>
  <tr>
    <td width="110" ><div align="justify" style="" class="class14">Alamat</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;'.$alamat.'</div></td>
  </tr>
   <tr>
    <td width="110" ><div align="justify" style="" class="class14">No.KTP</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;'.$ktp.'</div></td>
  </tr>
</table><br/>
<div align="justify" class="class14">Demikian untuk digunakan sebagaimana mestinya.</div><br/>
<div align="justify" class="class14">'.ucwords(strtolower($namakota)).','.$hasiltglakadt2.' '.$hasilbulantglakad2.' '.$hasiltglakadtahun2.'</div> 
<table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="30"><div align="left" class="class15">PT BANK SYARIAH MANDIRI</div></td>
    <td width="5" >&nbsp;</td>
    <td width="300" ><div align="left" class="class15">Diterima Oleh Pemasok</div></td>
  </tr>
  <tr>
    <td height="70">&nbsp;</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td width="255" ><div align="left" class="class14">'.ucwords(strtolower($rowkuasa['nama_wakil'])).'</div></td>
    <td >&nbsp;</td>
    <td ><div align="left" class="class14">'.$rowobjek['pemasok'].'</div></td>
  </tr>
</table>
</div><!--<div style="page-break-after:always">-->';
}

$dataobjek=mysqli_query($koneksidbi,"SELECT * FROM akad_objek WHERE sha1(kdakaddetailobjek)='$kodedetail' ORDER BY tglinput ASC");
while($rowobjek=mysqli_fetch_array($dataobjek)){
$html.='<!-- surat pernyataan purchase order 1-->
<div style="page-break-after:always" class="'.$tampilpilihanpo2.'">
<div align="center" class="class15"><strong>SURAT PERNYATAAN PELAKSANAAN<br/>PURCHASE ORDER/PEMESANAN BARANG</strong></div><br/>
<div align="justify" class="class14">Saya yang bertanda tangan dibawah ini:</div><br/>
<table width="541" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50" ><div align="justify" style="" class="class14">Nama</div></td>
	<td width="25" ><div align="justify" style="" class="class14">:</div></td>
    <td width="506" ><div align="justify" class="class14"> '.$wkl.'</div></td>
  </tr>
  <tr>
    <td width="50" ><div align="justify" style="" class="class14">Alamat</div></td>
	<td width="25" ><div align="justify" style="" class="class14">:</div></td>
    <td width="506" ><div align="justify" class="class14"> '.$alamat.'</div></td>
  </tr>
    <tr>
    <td width="50" ><div align="justify" style="" class="class14">No.KTP</div></td>
	<td width="25" ><div align="justify" style="" class="class14">:</div></td>
    <td width="506" ><div align="justify" class="class14"> '.$ktp.'</div></td>
  </tr>
</table><br/>
<div align="justify" class="class14">
Adalah Nasabah pembiayaan Pensiun di PT. Bank Syariah Mandiri, selanjutnya disebut Nasabah.<br/>dengan ini menyatakan bahwa: </div>
<table width="541" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="20" valign="top"><div align="justify" style="" class="class14">1. </div></td>
	<td width="431" ><div align="justify" style="" class="class14">Berdasarkan Akad Wakalah dari PT. Bank Syariah Mandiri '.ucwords(strtolower($namacabang)).' dengan Nomor Akad '.$rowakadnomormrbh['nomor'].'/MRBH tanggal '.$hasiltglakadt.', bulan '.$hasilbulantglakad.', tahun '.$hasiltglakadtahun.', Nasabah telah melakukan Purchase Order/pemesanan barang yang menjadi Obyek Akad kepada Supplier/Pemasok/Penjual Barang dengan rincian :</div></td>
  </tr>
  </table>
  <table width="541" border="0" cellpadding="0" style="margin-left:15px" cellspacing="0">
  <tr>
  <td width="20" ><div align="justify" style="" class="class14">1.</div></td>
    <td width="110" ><div align="justify" style="" class="class14">Nama dan jenis barang</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;'.$rowobjek['namabarang'].' '.$rowobjek['rincian'].'</div></td>
  </tr>
   <tr>
   <td width="20" ><div align="justify" style="" class="class14">2.</div></td>
    <td width="110" ><div align="justify" style="" class="class14">Jumlah Satuan</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;'.$rowobjek['satuan'].'</div></td>
  </tr>
  <tr>
  <td width="20" ><div align="justify" style="" class="class14">3.</div></td>
    <td width="110" ><div align="justify" style="" class="class14">Lokasi</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;'.$rowobjek['lokasi'].'</div></td>
  </tr>
  <tr>
  <td width="20" ><div align="justify" style="" class="class14">4.</div></td>
    <td width="110" ><div align="justify" style="" class="class14">Pemasok</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;'.$rowobjek['pemasok'].'</div></td>
  </tr>
  <tr>
  <td width="20" ><div align="justify" style="" class="class14">5.</div></td>
    <td width="110" ><div align="justify" style="" class="class14">Harga</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;'.format_angka($rowobjek['harga']).'</div></td>
  </tr>
</table>';
$kodeobjek=$rowobjek['kdobjekakad'];
$datauploadrab=mysqli_query($koneksidbi,"SELECT * FROM akad_rab_upload WHERE kdobjekupload='$kodeobjek' ORDER BY hal ASC");

$cekjmluploadrab=mysqli_num_rows($datauploadrab);
while($rowuploadrab=mysqli_fetch_assoc($datauploadrab)){
$html.='
<div align="center">
       <p><img src="../File_Upload/akadrab/'.$rowuploadrab['userid'].'/'.IndonesiaTgl($rowuploadrab['tglinput']).'/'.$rowuploadrab['filename'].'" height="'.$rowuploadrab['height'].'px" width="'.$rowuploadrab['width'].'px"></p>
    </div>';
	}
$html.='
<div align="justify" class="class14">sebagaimana tercantum dalam lampiran Surat Pernyataan yang menjadi satu kesatuan dan merupakan bagian tak terpisahkan dari Surat Pernyataan ini.</div>
<table width="541" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="20" valign="top"><div align="justify" style="" class="class14">2. </div></td>
	<td width="431" ><div align="justify" style="" class="class14">Nasabah menjamin dan bertanggung jawab sepenuhnya atas kebenaran pelaksanaan Purchase Order/Pemesanan Barang, data barang yang dipesan, serta data dan keberadaan Supplier/Pemasok/Penjual Barang sebagaimana disebutkan pada butir 1 di atas, yang dicantumkan dalam lampiran Surat Pernyataaan ini.</div></td>
  </tr>
</table>
<div align="justify" class="class14">Demikian Surat Pernyataan ini dibuat dengan sebenarnya, dalam keadaan sadar, dan tanpa paksaan maupun tekanan dari pihak manapun untuk digunakan sebagaimana mestinya.</div><br/>
<div align="justify" class="class14">'.ucwords(strtolower($namakota)).','.$hasiltglakadt2.' '.$hasilbulantglakad2.' '.$hasiltglakadtahun2.'</div>
<table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="30"><div align="left" class="class15">Yang Membuat Pernyataan</div></td>
    <td width="5" >&nbsp;</td>
    <td width="300" ><div align="left" class="class15"></div></td>
  </tr>
  <tr>
    <td height="65"><div align="left"><span style="color:#3333333;" class="class14"> Materai Rp. 6000,-</span></div</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td width="255" ><div align="left" class="class14">'.$wkl.'</div></td>
    <td >&nbsp;</td>
    <td ><div align="left" class="class14"></div></td>
  </tr>
</table>
</div><!--<div style="page-break-after:always">-->';
}

$html.='<!-- surat tanda terima barang-->
<div style="'.$tampildivpage1.'" class="'.$tampilrincianobjek.'">
<div align="left" class="class15"><strong>LAMPIRAN RINCIAN OBJEK</strong></div>
<p></p>
<table width="541" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="110" ><div align="justify" style="" class="class14">Nama Nasabah</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;'.$namanasabah.'</div></td>
  </tr>
</table><br/>
	<table width="500" border="1" cellpadding="0" cellspacing="0">
	<tr>
	<th style="background-color:#333333;color:#FFFFFF" widht="100"><div align="center" class="class14">No</div></th>
		<th style="background-color:#333333;color:#FFFFFF" widht="100"><div align="center" class="class14">Nama Barang</div></th>
		<th style="background-color:#333333;color:#FFFFFF" widht="auto"><div align="center" class="class14">Volume</div></th>
		<th style="background-color:#333333;color:#FFFFFF" widht="auto"><div align="center" class="class14">Harga</div></th>
		<th style="background-color:#333333;color:#FFFFFF" widht="auto"><div align="center" class="class14">Total Harga</div></th>
	</tr>';
	//subobjek
$nosub=0;
$row=40;
$datasubobjek=mysqli_query($koneksidbi,"SELECT * FROM akad_sub_objek WHERE sha1(kdobjekakad)='$kodedetail' ORDER BY tglinput ASC LIMIT 0, $row");
while($rowsubobjek=mysqli_fetch_array($datasubobjek)){
$nosub++;
$harga=$rowsubobjek['hargasub'];
$vol=$rowsubobjek['vol'];
$ttlharga=$harga*$vol;
$ttlsubharga+=$ttlharga;

$html.='
	<tr>
	<td style="background-color:#FFFFFF" widht="100"><div align="center" class="class14" style="margin-left:5px"><label for="exampleInputEmail1">'.$nosub.'</label></div></td>
	<td style="background-color:#FFFFFF" widht="100"><div align="left" class="class14" style="margin-left:5px"><label for="exampleInputEmail1">'.$rowsubobjek['item'].'</label></div></td>
	<td style="background-color:#FFFFFF" widht="350"><div align="center" class="class14" style="margin-left:5px"><label for="exampleInputEmail1">'.$rowsubobjek['vol'].' '.$rowsubobjek['satuansub'].'</label></div></td>
	<td style="background-color:#FFFFFF" widht="50"><div align="left" style="margin-left:10px" class="class14"><label for="exampleInputEmail1">Rp '.format_angka($rowsubobjek['hargasub']).'</label></div></td>
	<td style="background-color:#FFFFFF" widht="50"><div align="left" style="margin-left:10px" class="class14"><label for="exampleInputEmail1">Rp '.format_angka($ttlharga).'</label></div></td>
	</tr>';
	}
	$html.='
	<tr>
		<td style="background-color:#FFFFFF" colspan="4" widht="50"><div align="left" style="margin-left:10px" class="class14"><label for="exampleInputEmail1"></label></div></td>
		<td style="background-color:#FFFFFF" widht="50"><div align="left" style="margin-left:10px" class="class14"><label for="exampleInputEmail1"><b>Rp '.format_angka($ttlsubharga).'</b></label></div></td>
		</tr>
	</table>


</div>
';

//halaman 2
$html.='<span class="'.$tampilhal2.'" class="'.$tampilrincianobjek.'">
<div align="left" class="class15"><strong>LAMPIRAN RINCIAN OBJEK</strong></div>
<p></p>
<table width="541" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="110" ><div align="justify" style="" class="class14">Nama Nasabah</div></td>
	<td width="331" ><div align="justify" style="" class="class14">:&nbsp;'.$namanasabah.'</div></td>
  </tr>
</table><br/>
	<table width="500" border="1" cellpadding="0" cellspacing="0">
	<tr>
	<th style="background-color:#333333;color:#FFFFFF" widht="100"><div align="center" class="class14">No</div></th>
		<th style="background-color:#333333;color:#FFFFFF" widht="100"><div align="center" class="class14">Nama Barang</div></th>
		<th style="background-color:#333333;color:#FFFFFF" widht="auto"><div align="center" class="class14">Volume</div></th>
		<th style="background-color:#333333;color:#FFFFFF" widht="auto"><div align="center" class="class14">Harga</div></th>
		<th style="background-color:#333333;color:#FFFFFF" widht="auto"><div align="center" class="class14">Total Harga</div></th>
	</tr>';
	//subobjek
$nosub=40;
$row=200;
$datasubobjek=mysqli_query($koneksidbi,"SELECT * FROM akad_sub_objek WHERE sha1(kdobjekakad)='$kodedetail' ORDER BY tglinput ASC LIMIT 40, $row");
while($rowsubobjek=mysqli_fetch_array($datasubobjek)){
$nosub++;
$harga=$rowsubobjek['hargasub'];
$vol=$rowsubobjek['vol'];
$ttlharga=$harga*$vol;
$ttlsubharga+=$ttlharga;
$html.='
	<tr>
	<td style="background-color:#FFFFFF" widht="100"><div align="center" class="class14" style="margin-left:5px"><label for="exampleInputEmail1">'.$nosub.'</label></div></td>
	<td style="background-color:#FFFFFF" widht="100"><div align="left" class="class14" style="margin-left:5px"><label for="exampleInputEmail1">'.$rowsubobjek['item'].'</label></div></td>
	<td style="background-color:#FFFFFF" widht="350"><div align="center" class="class14" style="margin-left:5px"><label for="exampleInputEmail1">'.$rowsubobjek['vol'].' '.$rowsubobjek['satuansub'].'</label></div></td>
	<td style="background-color:#FFFFFF" widht="50"><div align="left" style="margin-left:10px" class="class14"><label for="exampleInputEmail1">Rp '.format_angka($rowsubobjek['hargasub']).'</label></div></td>
	<td style="background-color:#FFFFFF" widht="50"><div align="left" style="margin-left:10px" class="class14"><label for="exampleInputEmail1">Rp '.format_angka($ttlharga).'</label></div></td>
	</tr>';
	}
	$html.='
	<tr>
		<td style="background-color:#FFFFFF" colspan="4" widht="50"><div align="left" style="margin-left:10px" class="class14"><label for="exampleInputEmail1"></label></div></td>
		<td style="background-color:#FFFFFF" widht="50"><div align="left" style="margin-left:10px" class="class14"><label for="exampleInputEmail1"><b>Rp '.format_angka($ttlsubharga).'</b></label></div></td>
		</tr>
	</table>
</span>



</body>
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
$filename=$hasilnamanasabah.'_'.$date.'_purchase_order'.'.pdf';
$dompdf->stream('"'.$filename.'"', array("Attachment" => 0));
$output=$dompdf->output();


mysqli_close($koneksidbi);
mysqli_close($koneksidb);
//file_put_contents("../akadbawahtangan/filepdf/".$filename,$output);
?>
