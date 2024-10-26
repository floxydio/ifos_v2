<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
 <meta charset="utf-8" />
</head>
<?php
header("Content-Type:application/vnd.ms-word");
header("Expires:0");
header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
header("Content-disposition:attachment;filename=\"Surat SP3 Pembiayaan MIkro.doc\"");

 ?>

   <?php

		foreach($data->result_array() as $usaha){
		?>

 <body>
 Tanggal : <?php
                 $upload = $this->app_model->tgl_indo($usaha['tgl_sp3']);
 echo $upload; ?><br />
 Nomor   : <?php echo $usaha['no_sp3']; ?><br /><br />
   <?php

		foreach($biaya->result_array() as $b){
		?>
                <?php
      }
		?>
 Kepada Yth.
 Bapak/Ibu/Sdr. <?php echo $b['nm_lengkap']; ?><br />
<?php echo $b['alamat_tinggal']; ?><br />
 <?php echo $b['propinsi_tinggal']; ?> ,<?php echo $b['kdpos_tinggal']; ?><br /><br />

 Perihal: <b>Surat Penawaran Pemberian Pembiayaan Mikro</b><br /><br />
 Ref.: Surat Permohonan nasabah <?php echo $b['no_aplikasi']; ?> Tanggal pertama kali input sistem ,<br /><br />

 Menunjuk referensi diatas, dengan ini kami beritahukan bahwa Komite Pembiayaan PT. ................. dapat menyetujui permohonan Bapak/Ibu/Saudara dengan syarat dan ketentuan sebagai berikut:an  <?php echo $b['nm_lengkap']; ?><br>
<b> I.	Struktur Pembiayaan </b><br />
    1.	Jenis Pembiayaan:		<?php echo $b['nm_skim']; ?><br />
    2.	Tujuan Pembiayaan:	<?php echo $b['nm_penggunaan']; ?> <br />
    3.	Limit Pembiayaan Diajukan:		Rp <?php
      $plafonb = str_replace(',','.',$b['plafon']);
    echo $plafonb; ?><br />
    4.	Margin Pembiayaan Diajukan:	Rp. 	Rp <?php
                                    $angsuranbulan = str_replace('.','',$b['angsuran']);
                                    $plafon = str_replace(',','',$b['plafon']);

                                    $jumlah = $angsuranbulan*$b['jangka_waktu'];
                                    $margin = $jumlah - $plafon;
                                    $marginb = number_format($margin);
                                     $marginm = str_replace(',','.',$marginb);
                                    echo $marginm;
                                    ?>
    <br />
    5.	Pembiayaan Diangsur Diajukan:	Rp <?php
                                    $angsuranbulan = str_replace('.','',$b['angsuran']);
                                    $jumlah = $angsuranbulan*$b['jangka_waktu'];
                                    $jumlahb = number_format($jumlah);
                                     $jumlahm = str_replace(',','.',$jumlahb);
                                    echo $jumlahm;
                                    ?><br />
    6.	Jangka Waktu:		<?php echo $b['jangka_waktu']; ?> (bulan) terhitung sejak tanggal penandatanganan Akad Pembiayaan<br />
    7.	Angsuran per bulan:	Rp 	<?php echo $b['angsuran']; ?> <br />
    8.	Biaya Administrasi:		Rp <?php  $plafonb = str_replace(',','.',$usaha['biaya_administrasi']);
                                     echo $plafonb; ?><br />
    9.	Cara Pembayaran:		angsuran per bulan sebelum tanggal ...........<br />
    10.	Biaya Keterlambatan:	0.00069 x jumlah tunggakan per hari ..........<br />
    11.	Biaya Asuransi:		Jiwa Rp  <?php  $plafonb = str_replace(',','.',$usaha['premijiwa']);
                                     echo $plafonb; ?>
        Penjaminan Rp <?php  $plafonx = str_replace(',','.',$usaha['premijamin']);
                                     echo $plafonx; ?> <br />
    12.	Lain-lain:			sesuai ketentuan yang berlaku di PT....<br /><br />
     <b>II.	Jaminan:</b><br /><br />
      <table width="60%" border=1>
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
         <td width="100" align="right"><?php echo $t->bobot_agunan;?>%</td>
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
</table> <br /><br />

     <b>III.	Asuransi: </b><br />
1.	Diwajibkan untuk menutup asuransi jiwa nasabah dengan syarat Banker’s Clause PT. .............., pada perusahaan asuransi yang menjadi rekanan PT..................<br />
2.	Diwajibkan untuk menutup asuransi kerugian untuk agunan yang dapat diasuransikan dengan syarat Banker’s Clause PT................, pada perusahaan asuransi yang menjadi rekanan Bank..........<br />
3.	Hubungan hukum antara perusahaan asuransi dengan NASABAH adalah hubungan hukum tersendiri, apabila NASABAH tidak menutup asuransi dengan sebab apapun maka segala kerugian yang timbul menjadi beban NASABAH<br /><br />
    <b>IV.	Syarat Akad:</b><br />
   	<?php echo $usaha['syarat_akad']; ?> <br /><br />
    <b>V.	Syarat Pencairan: </b><br />
     	<?php echo $usaha['syarat_pencairan']; ?> <br /><br />
    <b>VI.	Syarat Lainnya: </b> <br />
    	<?php echo $usaha['syarat_lain']; ?> <br /><br />

       <p>Demikian agar maklum dan sebagai tanda persetujuan atas syarat dan ketentuan diatas, harap Surat Penawaran Pemberian Pembiayaan .... ini ditandatangani diatas materai Rp6000,00 serta memberi paraf pada setiap lembarnya yang merupakan bagian yang tidak terpisahkan dari Surat Penawaran Pemberian Pembiayaan ..... ini dan dikembalikan kepada kami paling lambat 14 (empat belas) hari kerja sejak tanggal surat ini.

Apabila melewati batas waktu yang telah ditentukan, belum memberikan tanggapan tertulis atas Surat Penawaran Pemberian Pembiayaan .... ini, maka Surat Penawaran Pemberian Pembiayaan .... ini batal dengan sendirinya.

Surat Penawaran Pemberian Pembiayaan Mikro ini akan mengikat kedua belah pihak setelah Akad Pembiayaan ditandatangani oleh Nasabah dan PT...........

Demikian  agar maklum, terima kasih atas perhatian dan kerjasama Saudara</p><br />

<table align="center">
<tr><td><h4>PT ...................</h4></td></tr>
<tr><td><h4><?php echo $b['nm_cabang']; ?></h4></td></tr>
</table><br /><br /><br /><br /> <br /><br />
<table align=center width='80%'>
<tr><td width=200px><?php echo $usaha['nama_lengkap']; ?></td><td width=20%>........</td></tr>
<tr><td width=200px><?php echo $usaha['nmjabatan']; ?></td><td width=20%>Pejabat Berwenang</td></tr>
 <?php

		foreach($pasangan->result_array() as $n){
		?>
                <?php
      }
		?>
</table><br /><br /><br /><br /> <br /><br />
<table align=center width='80%'>
<tr><td width=200px><?php echo $b['nm_lengkap']; ?></td><td width=20%><?php echo $n['nm_lengkap']; ?></td></tr>
<tr><td width=200px>Nasabah</td><td width=20%>Suami/Istri</td></tr>

</table>

              <?php
      }
		?>
</body>
</html>



