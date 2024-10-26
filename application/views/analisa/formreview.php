<script type="text/javascript">
$(document).ready(function(){
     var hasil = $("#hasil").val();
        var scoring = $("#scoring").val();
       if(hasil.length==''){
       $("#print").attr('disabled','disabled');
       $("#lanjut").attr('disabled','disabled');
        $("#simpan").attr('disabled','disabled');
      }else{

       $("#print").removeAttr('enabled','enabled');
       $("#lanjut").removeAttr('enabled','enabled');
       $("#simpan").attr('disabled','disabled');

		}
       	$("#view").show();
	$("#form").hide();
    	$("#dataforward").hide();
        	$("#reason").hide();
      $("#forward").click(function(){
       	$("#dataforward").show();

           $("#print").attr('disabled','disabled');
           $("#lanjut").attr('disabled','disabled');
            $("#simpan").attr('disabled','disabled');
             $("#canceln").attr('disabled','disabled');
	});
    	$("#forwardke").click(function(){


        var no_aplikasi = $("#no_aplikasi").val();
         var pemutus = $("#pemutus").val();
         var setuju = tinymce.get('setuju').getContent();

	   //	var string = "kd_cabang="+kd_cabang+"&nm_cabang="+nm_cabang;
       	var string = "&no_aplikasi="+no_aplikasi+"&pemutus="+pemutus+"&setuju="+setuju;
             if(pemutus==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Approval Tidak Boleh Kosong',
				timeout:2000,
				showType: 'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#pemutus").focus();
			return false;
		}

        if(setuju.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Keterangan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#setuju").focus();
			return false;
		}

              	var pilih = confirm('Anda Yakin Aplikasi akan di forward');
	if (pilih==true) {
        	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>analisa/updateforward",
			data	: string,
			cache	: false,
			success	: function(data){
			      tampil_data('<?php echo $aplikasi; ?>','updatereview','analisa','formreview','3');
			},
			error : function(xhr, teksStatus, kesalahan) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon :'+kesalahan,
					timeout:2000,
					showType:'slide'
				});
			}
		});

        }

	});

    $("#canceln").click(function(){
    	   var no_aplikasi=$('#no_aplikasi').val();
           	var string = "no_aplikasi="+no_aplikasi;

$.messager.confirm('Konfirmasi Pembatalan Nasabah','Anda Yakin No Aplikasi tersebut di hapus pada sistem Fas dikarenakan Nasabah Mengajukan Pembatalan Pembiayaan ?',function(r){
if(r){
         $("#reason").show();
         $('#forward').attr('disabled','disabled');
         $('#canceln').attr('disabled','disabled');
         $('#simpan').attr('disabled','disabled');
         $('#lanjut').attr('disabled','disabled');
          $('#reject').attr('disabled','disabled');
           $('#lanjut').attr('disabled','disabled');
            $('#canceln').attr('disabled','disabled');


          $('#rejectm').hide();

         $('#send').attr('disabled','disabled');
	}
});
});

	$("#lanjut").click(function(){


    var no_aplikasi = $("#no_aplikasi").val();
   //      var rpc = $("#rpc").val();
   //     var ccr = $("#ccr").val();
   //     var dsr = $("#dsr").val();
   //     var scoring = $("#scoring").val();
   //      var plafonsetuju = $("#plafonsetuju").val();
   //      var hasilscoring = $("#hasilscoring").val();
	   //	var string = "kd_cabang="+kd_cabang+"&nm_cabang="+nm_cabang;
       	var string = "&no_aplikasi="+no_aplikasi;


                       	var pilih = confirm('Anda Yakin Aplikasi akan di forward');
	if (pilih==true) {
        	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>analisa/updatescoring",
			data	: string,
			cache	: false,
			success	: function(data){
				  window.location.assign('<?php echo base_url();?>analisa');
			},
			error : function(xhr, teksStatus, kesalahan) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon :'+kesalahan,
					timeout:2000,
					showType:'slide'
				});
			}
		});
       }
	});

 	$("#cancelm").click(function(){

	   	var no_aplikasi   = $("#no_aplikasi").val();
        var ket    = $("#ket").val();
        var alasan       =  tinymce.get('alasan').getContent();


		var string = "&no_aplikasi="+no_aplikasi+"&ket="+ket+"&alasan="+alasan;



         if(ket==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Reason Tidak Boleh Kosong',
				timeout:2000,
				showType: 'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#ket").focus();
			return false;
		}

        if(alasan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Keterangan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#alasan").focus();
			return false;
		}




	  	$.ajax({
			type	: 'POST',
		  		url		: "<?php echo site_url(); ?>cekduplikasi/updatecancel",
			data	: string,
			cache	: false,

           success	: function(data){
			window.location.assign('<?php echo base_url();?>analisa');
			},
			error : function(xhr, teksStatus, kesalahan) {
				$.messager.show({
					title:'Info',
					msg: 'Server tidak merespon :'+kesalahan,
					timeout:2000,
					showType:'slide'
				});
			}
		});

	});


       $("#back").click(function(){
  	      tampil_data('<?php echo $aplikasi; ?>','updatereview','analisa','formreview','3');
		});

        $("#backtop").click(function(){
  	      tampil_data('<?php echo $aplikasi; ?>','updatereview','analisa','formreview','3');
		});
     $("#kembali").click(function(){
           var thp = $("#thp").val();
		window.location.assign('<?php echo base_url();?>'+thp);
	});


});

</script>
  <script type="text/javascript">

function tampil_data(dat,kontrol,link,form,num){
		var username = $("#userid").val();
		var string = "username="+username;

		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>parameter/"+kontrol+"/"+dat+"/"+link+"/"+form+"/"+num,
			data	: string,
			cache	: false,
                beforeSend: function(){
            $("#dataform").show(1000).html("<img style='position:fixed; top:40%;right:40%;' src='<?php echo base_url('assets/img/loader1.gif');?>' height='70'>");
                                    },
			success	: function(data){
				$("#dataform").html(data);
                   $("#view").hide();


			}
		});
	}

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
   <script>tinymce.init({ selector:'textarea',width: 600,
  height:200 });</script>
 <center><div id="dataform">
<div class="btn-group-center">
<?php
  $no=0;
  foreach($listtabsheader->result_array() as $jk){

   if (($no % 9) == 0){echo "<br>";}
?>
 <a href="javascript:tampil_data('<?php echo $aplikasi;?>','<?php echo $jk['kontrol'];?>','<?php echo $jk['link'];?>','<?php echo $jk['form'];?>','<?php echo $jk['level_tab'];?>')" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-<?php echo $jk['icon'];?>"></i> <?php echo $jk['nm_tab'];?> </a>


 <?php
  $no++;
   }


?>

<?php
  $no=0;
  foreach($listtabs->result_array() as $jk){

   if (($no % 9) == 0){echo "<br>";}
?>
 <a href="javascript:tampil_data('<?php echo $aplikasi;?>','<?php echo $jk['kontrol'];?>','<?php echo $jk['link'];?>','<?php echo $jk['form'];?>','<?php echo $jk['level_tab'];?>')" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-<?php echo $jk['icon'];?>"></i> <?php echo $jk['nm_tab'];?> </a>


 <?php
  $no++;
   }

    $cabang = $this->app_model->CariCabang($db['kd_cabang']);
?>
 </div>

<form class="form-horizontal" id="dataTable">
  <div id="printall">
           <h3 align="center"><b>Nota Analisa Pembiayaan Mikro</b></h3>
            <h5 align="center"><b><?php echo $db['no_aplikasi']; ?></b></h5>
         <table align=center class="table table-sm">
         <tr></tr>
  <tr>
  <td align="center" width="60%">
      <button type="button" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-user"></i> Data Diri Pemohon</button>

            </td>

  </tr>

  </table>
     <table class="table table-xs">
    <tr>
   	<td width=100px>No Cabang  </td><td>:</td><td width=150px >  <input type="hidden" name="thp" id="thp" size="30" maxlength="50" value="<?php echo $tahapantab;?>" /><input type="hidden" name="plafon_biaya" id="plafon_biaya" value="<?php echo $plafon; ?>"/><input type="hidden" name="hasil" id="hasil" value="<?php echo $ds['pic_pemutus']; ?>"/><input type="hidden" name="scoring" id="scoring" value="<?php echo $ds['scoring']; ?>"/><input type="hidden" name="no_aplikasi" id="no_aplikasi" value="<?php echo $db['no_aplikasi']; ?>"/>
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


         <table  class="table table-sm" align=center>

  <tr>
  <td align="center" width="60%">
       <button type="button" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plane"></i> Data Agunan</button>

            </td>

  </tr>


  </table>
  <table class="table table-xs" width="98%" >
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
			<td width="20"><?php echo $no; ?></td>
             <td width="100" >
       <?php echo $t->nm_jaminan;?></td>
        <td width="100" ><?php echo $t->harga_agunan;?></td>
         <td width="100" ><?php echo $t->bobot_agunan;?></td>
          <td width="100"><?php echo $t->nilai_agunan;?></td>

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
     <table  class="table table-sm" align=center>

  <tr>
  <td align="center" width="60%">
      <button type="button" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-usd"></i> Data Pembiayaan yang dimohon</button>

            </td>

  </tr>

  </table>

     <table  class="table table-xs">
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
   <td width=100px>Jangka Waktu</td>
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

    <td  width=150px> <?php echo $db['plafon']; ?> </td>

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
       <table  class="table table-sm" align=center>

  <tr>
  <td align="center" width="60%">
       <button type="button" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-usd"></i> Data Keuangan</button>

            </td>

  </tr>

  </table>
     <?php
        if($db['s_penghasilan']=='single' and $db['jenisp']=='tetap' ){
		?>
    <table  class="table table-xs">
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
           </table>
       <?php
      }
		?>
           <?php
        if($db['s_penghasilan']=='join' and $db['jenisp']=='tetap' ){
		?>
    <table  class="table table-xs">
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
     </table>
              <?php
        if($db['s_penghasilan']=='join' and $db['jenisp']=='nontetap' ){
		?>
    <table  class="table table-xs">
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
           </table>
       <?php
      }
		?>
                   <?php
        if($db['s_penghasilan']=='single' and $db['jenisp']=='nontetap' ){
		?>
    <table  class="table table-xs">
     <tr>
    <td width=100px >Sumber Penghasilan </td><td>:</td>

    <td  width=150px> <?php if ($db['s_penghasilan']=='single'){
      echo"Single Income";

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

             <table class="table table-sm" align=center>

  <tr>
  <td align="center" width="60%">
   <button type="button" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-user"></i> Review Pembiayaan</button>

            </td>

  </tr>

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
     	<td width=100px>Sektor Unggulan</td>
    <td>:</td>
        <?php

		foreach($listunggulan->result_array() as $unggulan){
		?>
    <td width=150px><?php echo $unggulan['nm_unggulan']; ?>
         <?php
      if($unggulan['nm_unggulan']=='lainnya'){
		?>
    : <?php echo $unggulan['lain']; ?></td>

         <?php
         }
      }
		?>
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

        if($db['plafon_jumlah']>0 and $db['top_up']=='on'){
           $plafon= str_replace(",","",$db['plafon_jumlah']);
        }else{
       $plafon= str_replace(",","",$db['plafon']);
       }
       $dsr = (($total/$plafon)*100);

        ?>

    <td  width=150px><input type="hidden" name="ccr" id="ccr" value="<?php echo round($dsr,2); ?>"/><?php echo round($dsr,2); ?> %</td>

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


      	<td width=100px></td><td>:</td>

 <?php

		foreach($listkeuanganbiaya->result_array() as $keuanganbiaya){
          $angsuran =str_replace(".","",$keuanganbiaya['angsuran']);

          $sisa_penghasilan = str_replace(".","",$keuangan['sisa_penghasilan']);
	      $rfc = ($sisa_penghasilan/ $angsuran)*100;
		?>

    <td  width=150px><input type="hidden" name="rpc" id="rpc" value="<?php echo round($rfc,2); ?>"/></td>
         <?php
      }
		?>

      	<td width=100px>DSR</td><td>:</td>
         <?php

		foreach($listkeuanganbiaya->result_array() as $keuanganbiaya){
	  if($db['jenisp']=='tetap'){
		      $total_penghasilan =str_replace(".","",$keuanganbiaya['total_penghasilan']);

          $angsuran =str_replace(".","",$keuanganbiaya['angsuran']);
          $angsuran_pemohon =str_replace(",","",$keuanganbiaya['angsuran_pemohon']);
            $angsuran_bsm =str_replace(",","",$keuanganbiaya['angsuran_bsm']);
              $angsuran_pasangan =str_replace(",","",$keuanganbiaya['angsuran_pasangan']);
           $angsuranfix = ((($angsuran + $angsuran_pemohon)+$angsuran_bsm)+$angsuran_pasangan);

          $dsr = ($angsuranfix / $total_penghasilan)*100;
          }else{
               $total_penghasilan =str_replace(".","",$keuanganbiaya['total_penghasilan2']);
                $biaya_hidup =str_replace(",","",$keuanganbiaya['biaya_hidup']);
                //$biaya_lain =str_replace(",","",$keuanganbiaya['biaya_lain']);

           $penghasilan = ($total_penghasilan - $biaya_hidup);
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

   </tr>
   <tr>
     <td width=100px >Skoring </td><td>:</td>

    <td  width=150px> <?php echo $listskoring; ?> </td>
    </tr>
    </table><br />
     <br />
             <table class="table table-sm" align=center>

  <tr>
  <td align="center" width="60%">
  <button type="button" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-user"></i>Keputusan Komite Pembiayaan</button>

            </td>

  </tr>

  </table>

     <table id="ta">
    <tr>
     <td width=100px >Direkomendasikan</td><td>:</td>

    <td  width=100px><textarea name="nm_memo" id="nm_memo" class="textarea1" readonly><?php echo $ds['ket']; ?></textarea></td>


        </tr>



    </table>  <br />
     <table>
    <tr>
    <td width=400px align="center" >Pengusul Oleh</td><td></td>


    <td  width=150px><input type="hidden" name="scoring" id="scoring" value="<?php //echo $dsr;  ?>"/><input type="hidden" name="hasilscoring" id="hasilscoring" value="<?php //echo $dsr; ?>"/><?php //echo $dsr; ?></td>


   <td width=100px align="center" >Pemerika Oleh </td><td></td>

    <td  width=150px> </td>

     <td width=100px ></td><td></td>

    <td  width=150px></td>

      	<td width=90px align="center">Disetujui Oleh</td><td></td>

    <td  width=150px><?php

   //  IF($dsr=='Direkomendasikan'){
   //     $hasil="Lanjutan";
   //  }else{

  //    $hasil="Ditolak";

      ?>

     <?php //echo $hasil; ?></td>
     <?php
  //   }
     ?>
        </tr>
         <tr>
    <td width=100px > </td><td></td>


    <td  width=150px><input type="hidden" name="scoring" id="scoring" value="<?php //echo $dsr;  ?>"/><input type="hidden" name="hasilscoring" id="hasilscoring" value="<?php //echo $dsr; ?>"/><?php //echo $dsr; ?></td>


   <td width=100px ></td><td></td>

    <td  width=150px> </td>

     <td width=100px ></td><td></td>

    <td  width=150px></td>

      	<td width=100px></td><td></td>

    <td  width=150px><?php

   //  IF($dsr=='Direkomendasikan'){
   //     $hasil="Lanjutan";
   //  }else{

  //    $hasil="Ditolak";

      ?>

     <?php //echo $hasil; ?></td>
     <?php
  //   }
     ?>
        </tr>
         <tr>
    <td width=100px > </td><td></td>


    <td  width=150px><input type="hidden" name="scoring" id="scoring" value="<?php //echo $dsr;  ?>"/><input type="hidden" name="hasilscoring" id="hasilscoring" value="<?php //echo $dsr; ?>"/><?php //echo $dsr; ?></td>


   <td width=100px ></td><td></td>

    <td  width=150px> </td>

     <td width=100px ></td><td></td>

    <td  width=150px></td>

      	<td width=100px></td><td></td>

    <td  width=150px><?php

   //  IF($dsr=='Direkomendasikan'){
   //     $hasil="Lanjutan";
   //  }else{

  //    $hasil="Ditolak";

      ?>

     <?php //echo $hasil; ?></td>
     <?php
  //   }
     ?>
        </tr>
         <tr>
    <td width=100px ></td><td></td>


    <td  width=150px><input type="hidden" name="scoring" id="scoring" value="<?php //echo $dsr;  ?>"/><input type="hidden" name="hasilscoring" id="hasilscoring" value="<?php //echo $dsr; ?>"/><?php //echo $dsr; ?></td>


   <td width=100px > </td><td></td>

    <td  width=150px> </td>

     <td width=100px ></td><td></td>

    <td  width=150px></td>

      	<td width=100px></td><td></td>

    <td  width=150px><?php

   //  IF($dsr=='Direkomendasikan'){
   //     $hasil="Lanjutan";
   //  }else{

  //    $hasil="Ditolak";

      ?>

     <?php //echo $hasil; ?></td>
     <?php
  //   }
     ?>
        </tr>
         <tr>
   <td width=400px align="center" >
      <?php

		foreach($listpengusul->result_array() as $nn){           ?>
   <?php echo $nn['nama_lengkap']; ?>  </td><td></td>
     <?php
        }
      ?>

    <td  width=150px><input type="hidden" name="scoring" id="scoring" value="<?php //echo $dsr;  ?>"/><input type="hidden" name="hasilscoring" id="hasilscoring" value="<?php //echo $dsr; ?>"/><?php //echo $dsr; ?></td>


   <td width=90px align="center" >
     <?php

		foreach($listpemeriksa->result_array() as $bb){           ?>
   <?php echo $bb['nama_lengkap']; ?>
     <?php
        }
      ?>
   </td><td></td>

    <td  width=150px></td>

     <td width=100px ></td><td></td>

    <td  width=150px></td>

      	<td width=100px align="center">
          <?php

		foreach($listrekomendasi->result_array() as $cc){           ?>
   <?php echo $cc['nama_lengkap'];
   echo"<br>";
    $nama_jabatan = $this->app_model->Carijabatan($cc['id_jabatanpeg']);
   echo $nama_jabatan;

   ?>
     <?php
        }
      ?>

        </td><td></td>

    <td  width=150px><?php

   //  IF($dsr=='Direkomendasikan'){
   //     $hasil="Lanjutan";
   //  }else{

  //    $hasil="Ditolak";

      ?>

     <?php //echo $hasil; ?></td>
     <?php
  //   }
     ?>
        </tr>

    </table><br />


             <table width="100%" align=center>

  <tr>
  <td align="center" width="60%">
   <a href="#" class="easyui-linkbutton">Keputusan Komite Pembiayaan</a>
            </td>

  </tr>

  </table>
    <font size=2px color="grey">*Dokumen ini dicetak melalui sistem dan tidak memerlukan tanda tangan
 </font><br /><br />
    <table id="Data" align="center" >
    <tr>
     <td>   <button type="button" name="lanjut" id="lanjut" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-send"></i> Lanjut</button>
  </td>
      <td>    <button type="button" name="simpan" id="simpan" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>

  </td>
    <td>        <button type="button" name="kembali" id="kembali" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>


  </td>
   <td>     <button type="button" name="forward" id="forward" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-circle-arrow-left"></i> forward</button>

  </td>
   <td>     <button type="button" name="canceln" id="canceln" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Pembatalan aplikasi</button>

  </td>
    <td>        <button type="button" name="reject" id="reject" class="btn btn-danger btn-sm" disabled><i class="glyphicon glyphicon-share-alt"></i>Reject</button>

  </td>
   <td>   <button type="button" name="print" id="print" class="btn btn-success btn-sm" onclick="printContent('printall')"><i class="glyphicon glyphicon-print"></i> Print</button>

  </td>
  <td>
  </td>
  </tr></table>
  </div>
  </form>
  
   <br />
   <div id="dataforward">
     <table id="data" width="70%">
         <tr></tr><tr></tr>
  <tr>

  </tr>
  <tr></tr><tr></tr>
  <tr>
	<td width=20%>Data Pemutus</td>
    <td>:</td>
    <td>
       <?php	if($listusers->num_rows() > 0){  ?>
    <select name="pemutus" id="pemutus">
    <option value="0">-Pilih-</option>
      <?php foreach($listusers->result() as $w){
       ?>

                            <option value="<?php echo $w->username; ?>" ><?php echo $w->nama_lengkap; ?>-<?php echo $w->nmjabatan; ?></option>

                    <?php } ?>

      </select>
         <?php }else{ ?>
    <select name="pemutus" id="pemutus">
    <option value="0">Belum ada Upliner</option></select>
     <?php } ?>
      </td>

</tr>
<tr>
	<td width=20%></td>
    <td>:</td>
    <td><textarea name="setuju" id="setuju"></textarea></td>
    </tr>
 <tr>
     <td>     <button type="button" name="forwardke" id="forwardke" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>

    <button type="button" name="back" id="back" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-back"></i> Back</button>
  </td>
  </tr>
  </table>

  </div>
    <div id="reason">
     <table id="data" width="70%">
         <tr></tr><tr></tr>
  <tr>

  </tr>

<tr>
	<td width=20%>Reason</td>
    <td>:</td>
    <td>
       <?php	if($listreason->num_rows() > 0){  ?>
    <select name="ket" id="ket">
    <option value="0">-Pilih-</option>
      <?php foreach($listreason->result() as $w){
       ?>

                            <option value="<?php echo $w->id_reason; ?>" ><?php echo $w->id_reason; ?>-<?php echo $w->nm_reason; ?></option>

                    <?php } ?>

      </select>
         <?php }else{ ?>
     <font color=red>  Data Upliner Belum ada </font>
     <?php } ?>
      </td>

</tr>
<tr>
	<td width=20%></td>
    <td>:</td>
    <td><textarea name="alasan" id="alasan"></textarea></td>
    </tr>
 <tr>
     <td>   <button type="button" name="cancelm" id="cancelm" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-send"></i> Lanjut</button>
        <button type="button" name="backtop" id="backtop" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-back"></i> Back</button>


  </td>
  </tr>
  </table>

  </div>
 </div>
   </center>
