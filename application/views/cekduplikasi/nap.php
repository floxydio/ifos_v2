
 <script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});

   	$("#kembali").click(function(){
		window.location.assign('<?php echo base_url();?>index.php/cekduplikasi');
	});
});


</script>

 <script>
function printContent(el){

var restorepage=document.body.innerHTML;
var printcontent =document.getElementById(el).innerHTML;
document.body.innerHTML = printcontent;
window.print();
document.body.innerHTML = restorepage;

}
</script>

<body>



<br />

<?php

		foreach($list->result_array() as $db){
		     $cabang = $this->app_model->CariCabang($db['kd_cabang']);
		?>
 <br />

  <form  action="" method="POST" enctype="multipart/form-data">

           <div id="printall">
         <h2 align="center">Nota Analisa Pembiayaan Mikro</h2>
           <h3 align="center"><?php echo $db['no_aplikasi']; ?></h3><br />
         <table width="100%" align=center>
         <tr></tr>
  <tr>
  <td align="center" width="60%">
   <a href="#" class="easyui-linkbutton">Data Diri Pemohon</a>
            </td>

  </tr>
  <tr></tr>
  </table>

    <table id="ta">
    <tr>
   	<td width=100px>Nama Cabang  </td><td>:</td><td width=150px ><input type="hidden" name="hasil" id="hasil" value="<?php echo $db['hasilscoring']; ?>"/><input type="hidden" name="app" id="app" value="<?php echo $db['approve']; ?>"/> <input type="hidden" name="no_aplikasi" id="no_aplikasi" value="<?php echo $db['no_aplikasi']; ?>"/>
<?php echo $cabang; ?></td>	<td width=100px>Alamat Rumah </td>
    <td>:</td><td width=150px> <?php echo $db['alamat_tinggal']; ?> </td>
    <td width=100px >Jenis Kelamin </td><td>:</td>
    <?php

		foreach($listjk->result_array() as $jk){
		?>
    <td  width=150px> <?php echo $jk['nm_jk']; ?> </td>
     <?php
      }
		?>
   <td width=100px >Nama Perusahaan </td><td>:</td>
    <?php

		foreach($listperusahaan->result_array() as $usaha){
		?>
    <td  width=150px> <?php echo $usaha['nm_perusahaan']; ?> </td>
     <?php
      }
		?> </tr>
     <tr>
   	<td width=100px>Nama   </td><td>:</td><td width=150px >: <?php echo $db['nm_lengkap']; ?></td>	<td width=100px>Kelurahan </td>
    <td>:</td><td width=150px><?php echo $db['kelurahan_tinggal']; ?> </td>
    <td width=100px >Status Nikah </td>
    <?php

		foreach($listnikah->result_array() as $nikah){
		?>
    <td>:</td><td  width=150px> <?php echo $nikah['nm_nikah']; ?> </td>
     <?php
      }
		?>
    <td width=100px >Jabatan Pekerjaan </td>
    <?php

		foreach($listjabatan->result_array() as $jabatan){
		?>
    <td>:</td><td  width=150px> <?php echo $jabatan['nm_jabatan']; ?> </td>
     <?php
      }
		?> </tr>
      <tr>
   	<td width=100px>Tanggal Lahir </td><td>:</td><td width=150px > <?php echo $db['tanggal_lahir']; ?></td>	<td width=100px>Kecamatan</td>
    <td>:</td><td width=150px> <?php echo $db['kecamatan_tinggal']; ?> </td>
    <td width=100px >Jumlah Tanggungan </td>

    <td>:</td><td  width=150px> <?php echo $db['jt']; ?> </td>

    <td width=100px >Alamat Kerja/Usaha </td><td>:</td>
    <?php

		foreach($listperusahaan->result_array() as $usaha){
		?>
    <td  width=150px> <?php echo $usaha['alamat']; ?> </td>
     <?php
      }
		?> </tr>
       <tr>
   	<td width=100px>Umur </td><td>:</td><td width=150px > <?php
                 $upload = $this->app_model->get_umur($db['tanggal_lahir']);
 echo $upload; ?> Tahun</td>	<td width=100px></td>
    <td></td><td width=150px></td>
    <td width=100px >Kontak Darurat </td>

    <td></td><td  width=150px></td>

    <td width=100px >No Tlp</td><td>:</td>
    <?php

		foreach($listperusahaan->result_array() as $usaha){
		?>
    <td  width=150px> <?php echo $usaha['no_tlp']; ?> </td>
     <?php
      }
		?> </tr>
         <tr>
   	<td width=100px>No Identitas</td><td>:</td><td width=150px > <?php echo $db['no_identitas']; ?></td><td width=100px>Kota</td>
    <td>:</td><td width=150px><?php echo $db['kotamadya_tinggal']; ?></td>
    <td width=100px >Nama</td>
   <?php

		foreach($listkontak->result_array() as $kontak){
		?>
    <td>:</td><td  width=150px> <?php echo $kontak['nm_lengkap']; ?> </td>
     <?php
      }
      ?>
    <td width=100px >Lama Kerja / Usaha</td><td>:</td>
    <?php

		foreach($listperusahaan->result_array() as $usaha){
		?>
    <td  width=150px> <?php echo $usaha['lama_kerja']; ?> </td>
     <?php
      }
		?> </tr>
             <tr>
   	<td width=100px>Nama Pasangan </td><td>:</td>

     <?php

		foreach($listpasangan->result_array() as $pasangan){
		?>
    <td  width=150px> <?php echo $pasangan['nm_lengkap']; ?> </td>
     <?php
      }
		?> <td width=100px>Propinsi</td>
    <td>:</td><td width=150px><?php echo $db['propinsi_tinggal']; ?></td>
    <td width=100px >No.Tlp </td>
    <?php

		foreach($listkontak->result_array() as $kontak){
		?>
    <td>:</td><td  width=150px> <?php echo $kontak['no_tlp']; ?> </td>
     <?php
      }
      ?>
    <td width=100px >Sektor Ekonomi</td><td>:</td>
    <?php

		foreach($listsektor->result_array() as $sektor){
		?>
    <td  width=150px> <?php echo $sektor['nm_sektor']; ?> </td>
     <?php
      }
		?> </tr>
                <tr>
   	<td width=100px>No Telp rumah </td><td>:</td>

    <td  width=150px> <?php echo $db['no_tlp']; ?> </td>
    <td width=100px>Kodepos</td>
    <td>:</td><td width=150px><?php echo $db['kdpos_tinggal']; ?></td>
    <td width=100px >Hubungan </td>
    <?php

		foreach($listkontak->result_array() as $kontak){
		?>
    <td>:</td><td  width=150px>  </td>
     <?php
      }
      ?>
    <td width=100px >Pendidikan Terakhir</td><td>:</td>
    <?php

		foreach($listpendidikan->result_array() as $pendidikan){
		?>
  <td  width=150px><?php echo $pendidikan['nm_pendidikan']; ?>  </td>
     <?php
      }
      ?>
     </tr>
    </table>
    <br />
         <table width="100%" align=center>
         <tr></tr>
  <tr>
  <td align="center" width="60%">
   <a href="#" class="easyui-linkbutton">Data Agunan</a>
            </td>

  </tr>
  <tr></tr>
  </table>
  <table id="ta" width="98%">
<tr>
	<th>No</th>
    <th>Jenis Agunan</th>
    <th>Harga Pasar</th>
     <th>Bobot Agunan</th>
      <th>Nilai Agunan</th>

</tr>
<?php
   if($listdetailjaminan->num_rows() > 0){
	$no=1;
	foreach($listdetailjaminan->result() as $t){

    ?>
    	<tr>
			<td align="center" width="20"><?php echo $no; ?></td>
             <td width="100" align="center">
       <?php echo $t->nm_jaminan;?></td>
        <td width="100" align="right"><?php echo $t->harga_agunan;?></td>
         <td width="100" align="right"><?php echo $t->bobot_agunan;?></td>
          <td width="100" align="right"><?php echo $t->nilai_agunan;?></td>

    </tr>
    <?php
		$no++;
		}
	}else{
	?>
    	<tr>
        	<td colspan="6" align="center" >Tidak Ada Data</td>
        </tr>
    <?php
	}
?>
</table>
<br />
     <table width="100%" align=center>
         <tr></tr>
  <tr>
  <td align="center" width="60%">
   <a href="#" class="easyui-linkbutton">Data Pembiayaan yang Dimohon</a>
            </td>

  </tr>
  <tr></tr>
  </table>

     <table id="ta">
    <tr>
    <td width=100px >Skim Pembiayaan </td><td>:</td>
    <?php

		foreach($listskim->result_array() as $skim){
		?>
    <td  width=150px> <?php echo $skim['nm_skim']; ?> </td>
     <?php
      }
		?>
   <td width=100px >Tujuan </td><td>:</td>
    <?php

		foreach($listtujuan->result_array() as $tujuan){
		?>
    <td  width=150px> <?php echo $tujuan['nm_penggunaan']; ?> </td>
     <?php
      }
		?>
      	<td width=100px>Uang Muka</td><td>:</td><td width=150px >: <?php echo $db['uang_muka']; ?></td>	<td width=100px>Jangka Waktu</td>
    <td>:</td><td width=150px><?php echo $db['jangka_waktu']; ?> bulan </td>

        </tr>
     <tr>
    <td width=100px >Jenis Pembiayaan </td><td>:</td>
    <?php

		foreach($listtuju->result_array() as $tuju){
		?>
    <td  width=150px> <?php echo $tuju['nm_jnskegunaan']; ?> </td>
     <?php
      }
		?>
   <td width=100px >Plafon yang diajukan
</td><td>:</td>

    <td  width=150px><input type="hidden" name="rpc" id="rpc" value="<?php echo $db['rpc']; ?>"/> <?php echo $db['plafon']; ?> </td>

      	<td width=100px>Margin</td><td>:</td><td width=150px >: <?php echo $db['margin']; ?>%</td>	<td width=100px>Tipe Margin</td>
    <td>:</td>
    <?php

		foreach($listmargin->result_array() as $margin){
		?>
    <td  width=150px> <?php echo $margin['nm_tipemargin']; ?> </td>
     <?php
      }
		?>

        </tr>

    </table>
    <br />
       <table width="100%" align=center>
         <tr></tr>
  <tr>
  <td align="center" width="60%">
   <a href="#" class="easyui-linkbutton">Data Keuangan</a>
            </td>

  </tr>
  <tr></tr>
  </table>
     <?php
        if($db['s_penghasilan']=='single' and $db['jenisp']=='tetap' ){
		?>
    <table id="ta" width=1050px>
    <tr>
    <td width=100px >Sumber Penghasilan </td><td>:</td>

    <td  width=150px> <?php if ($db['s_penghasilan']=='single'){
      echo"Single Income";

    } ?> </td>

   <td width=100px >Total Penghasilan </td><td>:</td>
    <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['total_penghasilan']; ?> </td>
     <?php
      }
		?>
      	<td width=300px>Angsuran Pemohon di BSM(Existing)</td><td>:</td>
      <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['angsuran_bsm']; ?> </td>
     <?php
      }
		?>
        <td width=100px ></td><td></td>

    <td  width=150px></td>

    	<td width=100px>Penghasilan bisa Ditabung</td><td>:</td>
      <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['sisa_penghasilan']; ?> </td>
     <?php
      }
		?>
        </tr>
         <tr>
    <td width=100px >Jenis Penghasilan Pemohon </td><td>:</td>

    <td  width=150px><?php if ($db['jenisp']=='tetap'){
      echo"Penghasilan Tetap";

    } ?> </td>

   <td width=100px >Biaya Hidup </td><td>:</td>
    <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['biaya_hidup']; ?> </td>
     <?php
      }
		?>
      	<td width=100px>Angsuran Pasangan</td><td>:</td>
      <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['angsuran_pasangan']; ?> </td>
     <?php
      }
		?>

        </tr>
         <tr>
    <td width=100px >Total Penghasilan Pemohon </td><td>:</td>
  <?php

		foreach($listkeuangan->result_array() as $keuangan){
		  $gaji_bulan =str_replace(",","",$keuangan['gaji_bulan']);
          $peng_tambahan = str_replace(",","",$keuangan['peng_tambahan']);
		  $jumlah = $gaji_bulan + $peng_tambahan;
		?>
    <td  width=150px> <?php echo  number_format($jumlah); ?> </td>
     <?php
      }
		?>
      <td width=100px >Biaya lainnya</td><td>:</td>
  <?php

		foreach($listkeuangan->result_array() as $keuangan){

		?>
    <td  width=150px> <?php echo $keuangan['biaya_lain']; ?> </td>
     <?php
      }
		?>

     <td width=100px >Angsuran BSM Fas baru</td><td>:</td>

    <td  width=150px> <?php echo $db['angsuran']; ?> </td>

        </tr>
            <tr>
    <td width=100px >Total Penghasilan Pasangan</td><td>:</td>
  <?php

		foreach($listkeuangan->result_array() as $keuangan){
		  $gaji_bulan =str_replace(",","",$keuangan['peng_utamapasangan']);
          $peng_tambahan = str_replace(",","",$keuangan['peng_tambahanpasangan']);
		  $jumlah = $gaji_bulan + $peng_tambahan;
		?>
    <td  width=150px> <?php echo  number_format($jumlah); ?> </td>
     <?php
      }
		?>

          <td width=100px >Angsuran Pemohon di Bank Lain</td><td>:</td>
  <?php

		foreach($listkeuangan->result_array() as $keuangan){

		?>
    <td  width=150px> <?php echo $keuangan['angsuran_pemohon']; ?> </td>
     <?php
      }
		?>

           </tr>
       <?php
      }
		?>
           <?php
        if($db['s_penghasilan']=='join' and $db['jenisp']=='tetap' ){
		?>
    <table id="ta">
    <tr>
    <td width=100px >Sumber Penghasilan </td><td>:</td>

    <td  width=150px> <?php if ($db['s_penghasilan']=='join'){
      echo"Join Income";

    } ?> </td>

   <td width=100px >Total Penghasilan </td><td>:</td>
    <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['total_penghasilan']; ?> </td>
     <?php
      }
		?>
      	<td width=300px>Angsuran Pemohon di BSM(Existing)</td><td>:</td>
      <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['angsuran_bsm']; ?> </td>
     <?php
      }
		?>
        <td width=100px ></td><td></td>

    <td  width=150px></td>

    	<td width=100px>Penghasilan bisa Ditabung</td><td>:</td>
      <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['sisa_penghasilan']; ?> </td>
     <?php
      }
		?>
        </tr>
         <tr>
    <td width=100px >Jenis Penghasilan Pemohon </td><td>:</td>

    <td  width=150px><?php if ($db['jenisp']=='tetap'){
      echo"Penghasilan Tetap";

    } ?> </td>

   <td width=100px >Biaya Hidup </td><td>:</td>
    <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['biaya_hidup']; ?> </td>
     <?php
      }
		?>
      	<td width=100px>Angsuran Pasangan</td><td>:</td>
      <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['angsuran_pasangan']; ?> </td>
     <?php
      }
		?>

        </tr>
         <tr>
    <td width=100px >Total Penghasilan Pemohon </td><td>:</td>
  <?php

		foreach($listkeuangan->result_array() as $keuangan){
		  $gaji_bulan =str_replace(",","",$keuangan['gaji_bulan']);
          $peng_tambahan = str_replace(",","",$keuangan['peng_tambahan']);
		  $jumlah = $gaji_bulan + $peng_tambahan;
		?>
    <td  width=150px> <?php echo  number_format($jumlah); ?> </td>
     <?php
      }
		?>
      <td width=100px >Biaya lainnya</td><td>:</td>
  <?php

		foreach($listkeuangan->result_array() as $keuangan){

		?>
    <td  width=150px> <?php echo $keuangan['biaya_lain']; ?> </td>
     <?php
      }
		?>

     <td width=100px >Angsuran BSM Fas baru</td><td>:</td>

    <td  width=150px> <?php echo $db['angsuran']; ?> </td>

        </tr>
            <tr>
    <td width=100px >Total Penghasilan Pasangan</td><td>:</td>
  <?php

		foreach($listkeuangan->result_array() as $keuangan){
		  $gaji_bulan =str_replace(",","",$keuangan['peng_utamapasangan']);
          $peng_tambahan = str_replace(",","",$keuangan['peng_tambahanpasangan']);
		  $jumlah = $gaji_bulan + $peng_tambahan;
		?>
    <td  width=150px> <?php echo  number_format($jumlah); ?> </td>
     <?php
      }
		?>

          <td width=100px >Angsuran Pemohon di Bank Lain</td><td>:</td>
  <?php

		foreach($listkeuangan->result_array() as $keuangan){

		?>
    <td  width=150px> <?php echo $keuangan['angsuran_pemohon']; ?> </td>
     <?php
      }
		?>

           </tr>
       <?php
      }
		?>

              <?php
        if($db['s_penghasilan']=='join' and $db['jenisp']=='nontetap' ){
		?>
    <table id="ta">
     <tr>
    <td width=100px >Sumber Penghasilan </td><td>:</td>

    <td  width=150px> <?php if ($db['s_penghasilan']=='join'){
      echo"Join Income";

    } ?> </td>

   <td width=100px >Total Penghasilan </td><td>:</td>
    <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['total_penghasilan2']; ?> </td>
     <?php
      }
		?>
      	<td width=300px>Angsuran Pemohon di BSM(Existing)</td><td>:</td>
      <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['angsuran_bsm']; ?> </td>
     <?php
      }
		?>
        <td width=100px ></td><td></td>

    <td  width=150px></td>

    	<td width=100px>Penghasilan bisa Ditabung</td><td>:</td>
      <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['sisa_penghasilan']; ?> </td>
     <?php
      }
		?>
        </tr>
         <tr>
    <td width=100px >Jenis Penghasilan Pemohon </td><td>:</td>

    <td  width=150px><?php if ($db['jenisp']=='nontetap'){
      echo"Penghasilan Tidak Tetap";

    } ?> </td>

   <td width=100px >Biaya Hidup </td><td>:</td>
    <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['biaya_hidup']; ?> </td>
     <?php
      }
		?>
      	<td width=100px>Angsuran Pasangan</td><td>:</td>
      <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['angsuran_pasangan']; ?> </td>
     <?php
      }
		?>

        </tr>
         <tr>
    <td width=100px >Total Penghasilan Pemohon </td><td>:</td>
  <?php

		foreach($listkeuangan->result_array() as $keuangan){
		  $gaji_bulan =str_replace(".","",$keuangan['penghasilan_bersih']);
          $peng_tambahan = str_replace(",","",$keuangan['peng_tambahan2']);
		  $jumlah = $gaji_bulan + $peng_tambahan;
		?>
    <td  width=150px> <?php echo  number_format($jumlah); ?> </td>
     <?php
      }
		?>
      <td width=100px >Biaya lainnya</td><td>:</td>
  <?php

		foreach($listkeuangan->result_array() as $keuangan){

		?>
    <td  width=150px> <?php echo $keuangan['biaya_lain']; ?> </td>
     <?php
      }
		?>

     <td width=100px >Angsuran BSM Fas baru</td><td>:</td>

    <td  width=150px> <?php echo $db['angsuran']; ?> </td>

        </tr>
            <tr>
    <td width=100px >Total Penghasilan Pasangan</td><td>:</td>
  <?php

		foreach($listkeuangan->result_array() as $keuangan){
		  $gaji_bulan =str_replace(",","",$keuangan['peng_utamapasangan2']);
          $peng_tambahan = str_replace(",","",$keuangan['peng_tambahanpasangan2']);
		  $jumlah = $gaji_bulan + $peng_tambahan;
		?>
    <td  width=150px> <?php echo  number_format($jumlah); ?> </td>
     <?php
      }
		?>

          <td width=100px >Angsuran Pemohon di Bank Lain</td><td>:</td>
  <?php

		foreach($listkeuangan->result_array() as $keuangan){

		?>
    <td  width=150px> <?php echo $keuangan['angsuran_pemohon']; ?> </td>
     <?php
      }
		?>

           </tr>
       <?php
      }
		?>
                   <?php
        if($db['s_penghasilan']=='single' and $db['jenisp']=='nontetap' ){
		?>
    <table id="ta">
     <tr>
    <td width=100px >Sumber Penghasilan </td><td>:</td>

    <td  width=150px> <?php if ($db['s_penghasilan']=='join'){
      echo"Join Income";

    } ?> </td>

   <td width=100px >Total Penghasilan </td><td>:</td>
    <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['total_penghasilan2']; ?> </td>
     <?php
      }
		?>
      	<td width=300px>Angsuran Pemohon di BSM(Existing)</td><td>:</td>
      <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['angsuran_bsm']; ?> </td>
     <?php
      }
		?>
        <td width=100px ></td><td></td>

    <td  width=150px></td>

    	<td width=100px>Penghasilan bisa Ditabung</td><td>:</td>
      <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['sisa_penghasilan']; ?> </td>
     <?php
      }
		?>
        </tr>
         <tr>
    <td width=100px >Jenis Penghasilan Pemohon </td><td>:</td>

    <td  width=150px><?php if ($db['jenisp']=='nontetap'){
      echo"Penghasilan Tidak Tetap";

    } ?> </td>

   <td width=100px >Biaya Hidup </td><td>:</td>
    <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['biaya_hidup']; ?> </td>
     <?php
      }
		?>
      	<td width=100px>Angsuran Pasangan</td><td>:</td>
      <?php

		foreach($listkeuangan->result_array() as $keuangan){
		?>
    <td  width=150px> <?php echo $keuangan['angsuran_pasangan']; ?> </td>
     <?php
      }
		?>

        </tr>
         <tr>
    <td width=100px >Total Penghasilan Pemohon </td><td>:</td>
  <?php

		foreach($listkeuangan->result_array() as $keuangan){
		  $gaji_bulan =str_replace(".","",$keuangan['penghasilan_bersih']);
          $peng_tambahan = str_replace(",","",$keuangan['peng_tambahan2']);
		  $jumlah = $gaji_bulan + $peng_tambahan;
		?>
    <td  width=150px> <?php echo  number_format($jumlah); ?> </td>
     <?php
      }
		?>
      <td width=100px >Biaya lainnya</td><td>:</td>
  <?php

		foreach($listkeuangan->result_array() as $keuangan){

		?>
    <td  width=150px> <?php echo $keuangan['biaya_lain']; ?> </td>
     <?php
      }
		?>

     <td width=100px >Angsuran BSM Fas baru</td><td>:</td>

    <td  width=150px> <?php echo $db['angsuran']; ?> </td>

        </tr>
            <tr>
    <td width=100px >Total Penghasilan Pasangan</td><td>:</td>
  <?php

		foreach($listkeuangan->result_array() as $keuangan){
		  $gaji_bulan =str_replace(",","",$keuangan['peng_utamapasangan2']);
          $peng_tambahan = str_replace(",","",$keuangan['peng_tambahanpasangan2']);
		  $jumlah = $gaji_bulan + $peng_tambahan;
		?>
    <td  width=150px> <?php echo  number_format($jumlah); ?> </td>
     <?php
      }
		?>

          <td width=100px >Angsuran Pemohon di Bank Lain</td><td>:</td>
  <?php

		foreach($listkeuangan->result_array() as $keuangan){

		?>
    <td  width=150px> <?php echo $keuangan['angsuran_pemohon']; ?> </td>
     <?php
      }
		?>

           </tr>
       <?php
      }
		?>
    </table>
    <br />
           <table width="100%" align=center>
         <tr></tr>
  <tr>
  <td align="center" width="60%">
   <a href="#" class="easyui-linkbutton">Rekomendasi Sistem</a>
            </td>

  </tr>
  <tr></tr>
  </table>
  </table>
   <table id="ta">
    <tr>
    <td width=100px >Hasil Scoring </td><td>:</td>
     <?php
         	if($listscore->num_rows()>0){
		foreach($listscore->result() as $score){
         }
		?>
    <td  width=150px<input type="hidden" name="opsi" id="opsi" value="<?php echo $score->hasil_skoring; ?>"/> <?php if($score->hasil_skoring=="0"){
      echo "Tidak direkomendasikan";
    }else if($score->hasil_skoring=="1"){
        echo "Direkomendasikan";

    }else{
       echo "Direkomendasikan";
    } ?> </td>
           <?php
      }else{
		?>

      <td  width=150px><font color="red">Scoring Tidak Muncul</font></td>

               <?php
      }
		?>

   <td width=100px >Other Policy </td><td>:</td>

    <td  width=150px> PASSED </td>

     <td width=100px ></td><td></td>

    <td  width=150px></td>

      	<td width=150px>Sistem Decision</td><td>:</td>

    <td  width=80px> <?php
    if($db['scoring']==''){
         	if($listscore->num_rows()>0){
		foreach($listscore->result() as $score){
         }
		?>
    <td  width=150px> <?php if($score->hasil_skoring=="0"){
      echo "Ditolak";
    }else if($score->hasil_skoring=="1"){
        echo "Disetujui";

    }else{
  ?>

    <select name="jk" id="jk">
    <option value="0">-Pilih-</option>
     <?php foreach($listscoreopsi1->result() as $m){ ?>
         <?php } ?>
                            <option value="<?php echo $m->opsi1; ?>"><?php echo "Pemenuhan Agunan"; ?></option>
      <?php foreach($listscoreopsi2->result() as $n){ ?>
         <?php } ?>
                                <option value="<?php echo $n->opsi2; ?>"><?php echo "Penurunan Plafon"; ?></option>

      </select>


  <?
    }
    ?>
   </td>
           <?php
      }else{
		?>

      <td  width=150px><font color="red">Scoring Tidak Muncul</font></td>

               <?php
      }

      }else{
     if($db['scoring']=='1')
     {
       echo "Pemenuhan Agunan";
    }else{
         echo "Penurunan Plafon";
      }

    }
     ?>
		</td>

        </tr>
    </table>

         <table width="100%" align=center>
         <tr></tr>
  <tr>
  <td align="center" width="60%">
   <a href="#" class="easyui-linkbutton">Review Pembiayaan</a>
            </td>

  </tr>
  <tr></tr>
  </table>
  </table>
   <table id="ta">
    <tr>
     <td width=100px >Skim Pembiayaan </td><td>:</td>
    <?php

		foreach($listskim->result_array() as $skim){
		?>
    <td  width=150px> <?php echo $skim['nm_skim']; ?> </td>
     <?php
      }
		?>


   	<td width=100px>Jangka Waktu</td>
    <td>:</td><td width=150px><?php echo $db['jangka_waktu']; ?> bulan </td>
     	<td width=100px></td>
    <td></td><td width=150px></td>

       	<td width=100px>Uang Muka</td>
    <td>:</td><td width=150px><?php echo $db['uang_muka']; ?></td>

        </tr>
        <tr>
   <td width=100px >Jenis Pembiayaan </td><td>:</td>
    <?php

		foreach($listtuju->result_array() as $tuju){
		?>
    <td  width=150px> <?php echo $tuju['nm_jnskegunaan']; ?> </td>
     <?php
      }
		?>
       	<td width=100px>Margin</td>
    <td>:</td><td width=150px><?php echo $db['margin']; ?>%</td>
      <td width=100px ></td><td></td>

      <td  width=150px></td>

      	<td width=100px>CCR</td><td>:</td>
  <?php
        $total=0;
		foreach($listccr->result_array() as $ccr){


         $nilai_agunan=str_replace(".","",$ccr['nilai_agunan']);
         $total = $nilai_agunan + $total ;

        // $plafon=str_replace(",","",$ccr['plafon']);

       //   $dsr = (($ccr['agunan'] /$plafon)*100);
       }
		?>
       <?php
         if($db['scoring']==''){

       $plafon= str_replace(",","",$db['plafon']);
       $dsr = (($total/$plafon)*100);

        ?>

    <td  width=150px><input type="hidden" name="ccr" id="ccr" value="<?php echo round($dsr,2); ?>"/><?php echo round($dsr,2); ?> %</td>
         <?php
         }else{
     if($db['scoring']=='1')
     {
       $plafon= str_replace(",","",$db['plafon']);
       $dsr = (($total/$plafon)*100);
     ?>
     <td  width=150px><input type="hidden" name="ccr" id="ccr" value="<?php echo round($dsr,2); ?>"/><?php echo round($dsr,2); ?> %</td>
   <?
    }else{

         $dsr = (($total/$score->limit2)*100);
       ?>
           <td  width=150px><input type="hidden" name="ccr" id="ccr" value="<?php echo round($dsr,2); ?>"/><?php echo round($dsr,2); ?> %</td>

    <?
      }

    }

        ?>
        </tr>
        <tr>
        <td width=100px >Tujuan </td><td>:</td>
    <?php

		foreach($listtujuan->result_array() as $tujuan){
		?>
    <td  width=150px> <?php echo $tujuan['nm_penggunaan']; ?> </td>
     <?php
      }
		?>
      <td width=100px>Tipe Margin</td>
    <td>:</td>
    <?php

		foreach($listmargin->result_array() as $margin){
		?>
    <td  width=150px> <?php echo $margin['nm_tipemargin']; ?> </td>
     <?php
      }
		?>
           <td width=100px ></td><td></td>

    <td  width=150px></td>

      	<td width=100px>DSR</td><td>:</td>
            <?php
           if($db['scoring']==''){
		foreach($listkeuanganbiaya->result_array() as $keuanganbiaya){
	  if($db['jenisp']=='tetap'){
		      $total_penghasilan =str_replace(".","",$keuanganbiaya['total_penghasilan']);

          $angsuran =str_replace(".","",$keuanganbiaya['angsuran']);
          $angsuran_pemohon =str_replace(",","",$keuanganbiaya['angsuran_pemohon']);
            $angsuran_bsm =str_replace(",","",$keuanganbiaya['angsuran_bsm']);
           $angsuranfix = (($angsuran + $angsuran_pemohon)+$angsuran_bsm);

          $dsr = ($angsuranfix / $total_penghasilan)*100;
          }else{
               $total_penghasilan =str_replace(".","",$keuanganbiaya['total_penghasilan2']);
                $biaya_hidup =str_replace(",","",$keuanganbiaya['biaya_hidup']);
                $biaya_lain =str_replace(",","",$keuanganbiaya['biaya_lain']);

           $penghasilan = (($total_penghasilan - $biaya_hidup)-$biaya_lain);
          $angsuran =str_replace(".","",$keuanganbiaya['angsuran']);
          $angsuran_pemohon =str_replace(",","",$keuanganbiaya['angsuran_pemohon']);
            $angsuran_bsm =str_replace(",","",$keuanganbiaya['angsuran_bsm']);
             $angsuran_pasangan =str_replace(",","",$keuanganbiaya['angsuran_pasangan']);
           $angsuranfix = ((($angsuran + $angsuran_pemohon)+$angsuran_bsm)+$angsuran_pasangan);

          $dsr = ($angsuranfix / $penghasilan)*100;

          }
         }
		?>

    <td  width=150px><input type="hidden" name="dsr" id="dsr" value="<?php echo round($dsr,2); ?>"/><?php echo round($dsr,2); ?> %</td>

    <?
       }else{
         if($db['scoring']=='1')
     {
       	foreach($listkeuanganbiaya->result_array() as $keuanganbiaya){
	  if($db['jenisp']=='tetap'){
		      $total_penghasilan =str_replace(".","",$keuanganbiaya['total_penghasilan']);

          $angsuran =str_replace(".","",$keuanganbiaya['angsuran']);
          $angsuran_pemohon =str_replace(",","",$keuanganbiaya['angsuran_pemohon']);
            $angsuran_bsm =str_replace(",","",$keuanganbiaya['angsuran_bsm']);
           $angsuranfix = (($angsuran + $angsuran_pemohon)+$angsuran_bsm);

          $dsr = ($angsuranfix / $total_penghasilan)*100;
          }else{
               $total_penghasilan =str_replace(".","",$keuanganbiaya['total_penghasilan2']);
                $biaya_hidup =str_replace(",","",$keuanganbiaya['biaya_hidup']);
                $biaya_lain =str_replace(",","",$keuanganbiaya['biaya_lain']);

           $penghasilan = (($total_penghasilan - $biaya_hidup)-$biaya_lain);
          $angsuran =str_replace(".","",$keuanganbiaya['angsuran']);
          $angsuran_pemohon =str_replace(",","",$keuanganbiaya['angsuran_pemohon']);
            $angsuran_bsm =str_replace(",","",$keuanganbiaya['angsuran_bsm']);
             $angsuran_pasangan =str_replace(",","",$keuanganbiaya['angsuran_pasangan']);
           $angsuranfix = ((($angsuran + $angsuran_pemohon)+$angsuran_bsm)+$angsuran_pasangan);

          $dsr = ($angsuranfix / $penghasilan)*100;

          }
         }
    ?>
     <td  width=150px><input type="hidden" name="dsr" id="dsr" value="<?php echo round($dsr,2); ?>"/><?php echo round($dsr,2); ?> %</td>
        <?
        }else{
           foreach($listscore->result() as $scores){
         }
              $angsuran =str_replace(",","",$scores->cicilan2);

            	foreach($listkeuanganbiaya->result_array() as $keuanganbiaya){

        if($db['jenisp']=='tetap'){
		      $total_penghasilan =str_replace(".","",$keuanganbiaya['total_penghasilan']);


          $angsuran_pemohon =str_replace(",","",$keuanganbiaya['angsuran_pemohon']);
            $angsuran_bsm =str_replace(",","",$keuanganbiaya['angsuran_bsm']);
           $angsuranfix = (($angsuran + $angsuran_pemohon)+$angsuran_bsm);

          $dsr = ($angsuranfix / $total_penghasilan)*100;
          }else{
               $total_penghasilan =str_replace(".","",$keuanganbiaya['total_penghasilan2']);
                $biaya_hidup =str_replace(",","",$keuanganbiaya['biaya_hidup']);
                $biaya_lain =str_replace(",","",$keuanganbiaya['biaya_lain']);

           $penghasilan = (($total_penghasilan - $biaya_hidup)-$biaya_lain);

          $angsuran_pemohon =str_replace(",","",$keuanganbiaya['angsuran_pemohon']);
            $angsuran_bsm =str_replace(",","",$keuanganbiaya['angsuran_bsm']);
             $angsuran_pasangan =str_replace(",","",$keuanganbiaya['angsuran_pasangan']);
           $angsuranfix = ((($angsuran + $angsuran_pemohon)+$angsuran_bsm)+$angsuran_pasangan);

          $dsr = ($angsuranfix / $penghasilan)*100;

          }
         }

       ?>
          <td  width=150px><input type="hidden" name="dsr" id="dsr" value="<?php echo round($dsr,2); ?>"/><?php echo $dsr; ?> %</td>
   <?
   }
  }
   ?>
        </tr>
        <tr>
           	<td width=100px>Nilai Pembiayaan disetujui</td><td>:</td>

    <td  width=150px><input type="hidden" name="plafonsetuju" id="plafonsetuju" value="<?php $db['plafon']; ?>"/><?php
    if($db['scoring']==''){
         	if($listscore->num_rows()>0){
		foreach($listscore->result() as $score){
         }
		?>
    <?php if($score->hasil_skoring=="0"){
      echo $score->limit1 = number_format($score->limit1,0);
    }else if($score->hasil_skoring=="1"){
        echo$score->limit1 = number_format($score->limit1,0);

    }else{
  ?>

   <font color=red>data masih kosong</font>


  <?
    }
    ?>
   </td>
           <?php
      }else{
		?>

      <td  width=150px><font color="red">Scoring Tidak Muncul</font></td>

               <?php
      }

      }else{
     if($db['scoring']=='1')
     {
       echo  $score->limit1 = number_format($score->limit1,0);
    }else{
         echo  $score->limit2 = number_format($score->limit2,0);
      }

    }
     ?></td>
         	<td width=100px>Cicilan</td>
    <td>:</td><td width=150px><?php
    if($db['scoring']==''){
         	if($listscore->num_rows()>0){
		foreach($listscore->result() as $score){
         }
		?>
    <?php if($score->hasil_skoring=="0"){
      echo $db['angsuran'];
    }else if($score->hasil_skoring=="1"){
        echo $db['angsuran'];

    }else{
  ?>

   <font color=red>data masih kosong</font>


  <?
    }
    ?>
   </td>
           <?php
      }else{
		?>

      <td  width=150px><font color="red">Scoring Tidak Muncul</font></td>

               <?php
      }

      }else{
     if($db['scoring']=='1')
     {
       echo  $db['angsuran'];
    }else{
         echo  $score->cicilan2 = number_format($score->cicilan2,0);
      }

    }
     ?></td>
          <td width=100px ></td><td></td>

    <td  width=150px></td>

      	<td width=100px>RPC</td><td>:</td>

 <?php
             if($db['scoring']==''){

		foreach($listkeuanganbiaya->result_array() as $keuanganbiaya){
          $angsuran =str_replace(".","",$keuanganbiaya['angsuran']);

          $sisa_penghasilan = str_replace(".","",$keuangan['sisa_penghasilan']);
	      $rfc = ($sisa_penghasilan/ $angsuran)*100;
		?>

    <td  width=150px><input type="hidden" name="rpc" id="rpc" value="<?php echo round($rfc,2); ?>"/><?php echo round($rfc,2); ?> % </td>
         <?php
      }
		?>

           <?php
      }else{
          if($db['scoring']=='1')
     {
       	foreach($listkeuanganbiaya->result_array() as $keuanganbiaya){
          $angsuran =str_replace(".","",$keuanganbiaya['angsuran']);

          $sisa_penghasilan = str_replace(".","",$keuangan['sisa_penghasilan']);
	      $rfc = ($sisa_penghasilan/ $angsuran)*100;
		?>
          <td  width=150px><input type="hidden" name="rpc" id="rpc" value="<?php echo round($rfc,2); ?>"/><?php echo round($rfc,2); ?> % </td>
         <?php
      }
      }else{
     foreach($listscore->result() as $scoreb){
         }
           $angsuran =str_replace(",","",$scoreb->cicilan2);

          $rfc =$angsuran;
          	foreach($listkeuanganbiaya->result_array() as $keuanganbiaya){


          $sisa_penghasilan = str_replace(".","",$keuangan['sisa_penghasilan']);
	      $rfc = ($sisa_penghasilan/ $angsuran)*100;

		?>
             <td  width=150px><input type="hidden" name="rpc" id="rpc" value="<?php echo $rfc; ?>"/><?php echo round($rfc,2); ?> % </td>
         <?php
       }
     }
    }
      ?>

        </tr>
         <tr>
         <?php

		foreach($listlimit->result_array() as $limit){
		?>
        <td>  Jumlah Limit Pemutus :<input type="hidden" name="limit" id="limit" value="<?php echo $limit['jml_limit']; ?>"/> <?php echo $limit['jml_limit']; ?></td>
             <?php
      }
		?>
        </tr>

    </table>
                <table width="100%" align=center>

  <tr>
  <td align="center" width="60%">
   <a href="#" class="easyui-linkbutton">Keputusan Komite Pembiayaan</a>
            </td>

  </tr>

  </table>
   <br />

      </div>
    <br />

    <table id="Data" align="center" >
    <tr>


   <td>

   <button type="button" name="kembali" id="kembali" class="btn btn-info"><span class="glyphicon glyphicon-share-alt"></span> Kembali</button>
  </td>

  </tr></table> <br />

   </form>

       <?php
      }
		?>


</body>
