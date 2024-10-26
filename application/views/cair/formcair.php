<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});
                                          $(".js-example-basic-single").select2({
  placeholder: "Select Data"
});
          $("#reason").hide();
        $('#kode').dialog('close');
        $('#kose').dialog('close');
         $('#kote').dialog('close');

      $('#ssb').dialog('close');
     var rek_nasabah = $("#rek_nasabah").val();
       if(rek_nasabah.length==''){
            $("#cetak").attr('disabled','disabled');
       $("#kirim").attr('disabled','disabled');

		}else{
               $("#cetak").removeAttr('enabled','enabled');
       $("#kirim").removeAttr('enabled','enabled');

		}

	$("#view").show();
	$("#form").hide();
    	$("#dataforward").hide();
        	$("#datatolak").hide();
           	$("#datasetuju").hide();


    $("#forward").click(function(){
       	$("#dataforward").show();
        	$("#datatolak").hide();

           $("#approved").attr('disabled','disabled');
           $("#print").attr('disabled','disabled');
            $("#tolak").attr('disabled','disabled');
             $("#analisa").attr('disabled','disabled');
	});
     $("#approved").click(function(){
       	$("#datasetuju").show();
        	$("#datatolak").hide();
            $("#dataforward").hide();

           $("#print").attr('disabled','disabled');
           $("#forward").attr('disabled','disabled');
            $("#tolak").attr('disabled','disabled');
             $("#analisa").attr('disabled','disabled');
	});

    $("#back").click(function(){
             var no_aplikasi = $("#no_aplikasi").val();
      	  window.location.assign('<?php echo base_url();?>index.php/approval/updatereview/'+no_aplikasi);
	});

    $("#backtolak").click(function(){
             var no_aplikasi = $("#no_aplikasi").val();
      	  window.location.assign('<?php echo base_url();?>index.php/approval/updatereview/'+no_aplikasi);
	});

    $("#backsetuju").click(function(){
             var no_aplikasi = $("#no_aplikasi").val();
      	  window.location.assign('<?php echo base_url();?>index.php/approval/updatereview/'+no_aplikasi);
	});
  	$("#simpancair").click(function(){


        var no_aplikasi = $("#no_aplikasi").val();
         var rek_nasabah = $("#rek_nasabah").val();
        var tiperekening = $("#tiperekening").val();
        var tgl_jatuhtempo = $("#tgl_jatuhtempo").val();
         var pejabat = $("#pejabat").val();
          var no_cair = $("#no_cair").val();
          var tgl_cair = $("#tgl_cair").val();
	   //	var string = "kd_cabang="+kd_cabang+"&nm_cabang="+nm_cabang;
       	var string = "&no_aplikasi="+no_aplikasi+"&rek_nasabah="+rek_nasabah+"&tiperekening="+tiperekening+"&tgl_jatuhtempo="+tgl_jatuhtempo+"&pejabat="+pejabat+"&no_cair="+no_cair+"&tgl_cair="+tgl_cair;

          if(rek_nasabah.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Rekening Nasabah Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#rek_nasabah").focus();
			return false;
		}

          if(tiperekening==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tipe Rekening Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#tiperekening").focus();
			return false;
		}

          if(tgl_jatuhtempo.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal Jatuh Tempo Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#tgl_jatuhtempo").focus();
			return false;
		}
        if(pejabat==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Pejabat Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#pejabat").focus();
			return false;
		}
        if(no_cair==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor Cair Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#no_cair").focus();
			return false;
		}
        if(tgl_cair.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal Cair Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#tgl_cair").focus();
			return false;
		}

        	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>cair/updatecair",
			data	: string,
			cache	: false,
			success	: function(data){
				      tampil_data('<?php echo $aplikasi; ?>','updatesp3','cair','formcair','7');
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



    	$("#kirim").click(function(){


        var no_aplikasi = $("#no_aplikasi").val();

	   //	var string = "kd_cabang="+kd_cabang+"&nm_cabang="+nm_cabang;
       	var string = "&no_aplikasi="+no_aplikasi;


        	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>cair/updatesetuju",
			data	: string,
			cache	: false,
			success	: function(data){
				  window.location.assign('<?php echo base_url();?>cair');
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

     	$("#cancelm").click(function(){

	   	var no_aplikasi   = $("#no_aplikasi").val();
        var ket    = $("#ket").val();
        var alasan       = $("#alasan").val();


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
			window.location.assign('<?php echo base_url();?>sp3');
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


 $("#canceln").click(function(){
    	   var no_aplikasi=$('#no_aplikasi').val();
           	var string = "no_aplikasi="+no_aplikasi;

$.messager.confirm('Konfirmasi Pembatalan Nasabah','Anda Yakin No Aplikasi tersebut di hapus pada sistem Fas dikarenakan Nasabah Mengajukan Pembatalan Pembiayaan ?',function(r){
if(r){
         $("#reason").show();
         $('#canceln').attr('disabled','disabled');
         $('#simpan').attr('disabled','disabled');



          $('#rejectm').hide();

         $('#send').attr('disabled','disabled');
	}
});
});

     $("#kembali").click(function(){
           var thp = $("#thp").val();
		window.location.assign('<?php echo base_url();?>'+thp);
	});


});

</script>

<script>
                    $(function(){

                        $(".tgl").datepicker({
                            format:'yyyy-mm-dd'
                        });
                    })

tinymce.init({ selector:'textarea',
                        width: 500,
                        readonly: 1 });</script>
<script>
function printContent(el){

var restorepage=document.body.innerHTML;
var printcontent =document.getElementById(el).innerHTML;
document.body.innerHTML = printcontent;
window.print();
document.body.innerHTML = restorepage;

}
</script>
<script type="text/javascript">
$(document).ready(function() {
  var textbox = '#ThousandSeperator_commas';
  var hidden = '#ThousandSeperator_num';
  $("#biaya_administrasi").keyup(function () {
  var num = $("#biaya_administrasi").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#biaya_administrasi").val(numCommas);
  });
  $("#biaya_notaris").keyup(function () {
  var num = $("#biaya_notaris").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#biaya_notaris").val(numCommas);
  });
   $("#biaya_appraisal").keyup(function () {
  var num = $("#biaya_appraisal").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#biaya_appraisal").val(numCommas);
  });

   $("#biaya_blokir").keyup(function () {
  var num = $("#biaya_blokir").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#biaya_blokir").val(numCommas);
  });

   $("#biaya_materai").keyup(function () {
  var num = $("#biaya_materai").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#biaya_materai").val(numCommas);
  });
    $("#biaya_cadangan").keyup(function () {
  var num = $("#biaya_cadangan").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#biaya_cadangan").val(numCommas);
  });
    $("#nilai_tanggungjiwa").keyup(function () {
  var num = $("#nilai_tanggungjiwa").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#nilai_tanggungjiwa").val(numCommas);
  });
     $("#nilai_tanggungjamin").keyup(function () {
  var num = $("#nilai_tanggungjamin").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#nilai_tanggungjamin").val(numCommas);
  });
  $("#premijiwa").keyup(function () {
  var num = $("#premijiwa").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#premijiwa").val(numCommas);
  });
   $("#premijamin").keyup(function () {
  var num = $("#premijamin").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#premijamin").val(numCommas);
  });
       $("#nilai_tanggungbakar").keyup(function () {
  var num = $("#nilai_tanggungbakar").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#nilai_tanggungbakar").val(numCommas);
  });

     $("#premibakar").keyup(function () {
  var num = $("#premibakar").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#premibakar").val(numCommas);
  });
   $("#peng_tambahanpasangan2").keyup(function () {
  var num = $("#peng_tambahanpasangan2").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#peng_tambahanpasangan2").val(numCommas);
  });

});


function addCommas(nStr) {
  nStr += '';
  var comma = /,/g;
  nStr = nStr.replace(comma,'');
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  return x1 + x2;
}
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
                    $(function(){

                           $('.tgl').datepicker({
    format: 'yyyy-mm-dd',
}).on('changeDate', function(e){
    $(this).datepicker('hide');
});
                    })
            </script>
<div id="dataform">
<table align='center' width="180px"><tr>
<?

  $no=0;
  foreach($listtabs->result_array() as $jk){

   if (($no % 9) == 0){echo "<br><br>";}
?>
 <td> <a href="javascript:tampil_data('<?php echo $aplikasi;?>','<?php echo $jk['kontrol'];?>','<?php echo $jk['link'];?>','<?php echo $jk['form'];?>','<?php echo $jk['level_tab'];?>')" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-<?php echo $jk['icon'];?>"></i> <?php echo $jk['nm_tab'];?> </a> </td>


 <?
  $no++;
   }

?>
</tr></table>
<form class="form-horizontal" id="dataTable">


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
   	<td width=100px>No Cabang  </td><td>:</td><td width=150px ><input type="hidden" name="plafon_biaya" id="plafon_biaya" value="<?php echo $plafon; ?>"/><input type="hidden" name="hasil" id="hasil" value="<?php echo $db['pic_pemutus']; ?>"/><input type="hidden" name="scoring" id="scoring" value="<?php echo $db['scoring']; ?>"/><input type="hidden" name="no_aplikasi" id="no_aplikasi" value="<?php echo $db['no_aplikasi']; ?>"/>     <input type="hidden" name="thp" id="thp" size="30" maxlength="50" value="<?php echo $tahapantab;?>" /></td>

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
      <button type="button" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-usd"></i> Struktur Pembiayaan</button>

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

    <td  width=150px> <?php echo $db['plafon']; ?> </td>

      	<td width=100px>Margin</td><td>:</td><td width=150px >: <?php echo $db['margin']; ?>%</td>	<td width=100px>Tipe Margin</td>
    <td>:</td>
    <?php

		foreach($listmargin->result_array() as $margin){
		?>
    <td  width=150px> <?php echo $margin['nm_tipemargin']; ?> </td>
         	<td width=100px>No Rekening Pencairan</td>
    <td>:</td><td width=150px> <input type="text" name="rek_nasabah" id="rek_nasabah" value="<?php echo $db['rek_nasabah']; ?>" /></td>

     <?php
      }
		?>

        </tr>
        <tr>
      <td width=100px >Tipe Rekening Pencairan </td><td>:</td><td>
     <select name="tiperekening" id="tiperekening">
    <option value="0">-Pilih-</option>
    <?php foreach($listtiperekening->result() as $w){ ?>
                        <?php if($w->id_tiperekening == $cair['tiperekening']){ ?>
                            <option value="<?php echo $w->id_tiperekening; ?>" selected><?php echo $w->nm_tiperekening; ?> </option>
                        <?php }else{ ?>
                            <option value="<?php echo $w->id_tiperekening; ?>"><?php echo $w->nm_tiperekening; ?> </option>
                        <?php } ?>
                    <?php } ?>
    </select></td>
             	<td width=100px>Jatuh Tempo pd tanggal</td>
    <td>:</td><td width=150px>    <input type="text" name="tgl_jatuhtempo" id="tgl_jatuhtempo" class="tgl"  size="20" maxlength="50" value="<?php echo $cair['tgl_jatuhtempo']; ?>"/>(yyyy-mm-dd)
     </td>

        </tr>

    </table>
    <br />

                <table width="100%" align=center class="table table-xs">
         <tr></tr>
  <tr>
  <td align="center" width="60%">
  <button type="button" class="btn btn-primary btn-sm"> Syarat Pencairan</button>
            </td>

  </tr>
  <tr></tr>
  </table>
   <table id="ta">
    <tr>
     <td width=1050px align="center"> <textarea name="syarat_pencairan" id="syarat_pencairan" class="textarea2" autocomplete="off"><?php echo $sp3['syarat_pencairan']; ?></textarea></td><td></td>



        </tr>
    </table>
                  <table width="100%" align=center class="table table-xs">
         <tr></tr>
  <tr>
  <td align="center" width="60%">
   <button type="button" class="btn btn-primary btn-sm"> Syarat Lainnya</button>

            </td>

  </tr>
  <tr></tr>
  </table>
   <table id="ta">
    <tr>
     <td width=1050px align="center"> <textarea name="syarat_lain" id="syarat_lain" class="textarea2" disabled><?php echo $sp3['syarat_lain']; ?></textarea></td><td></td>







        </tr>
    </table> <br />
     <table id="ta">
     <tr>
	<td width="10%">Penanda Tangan:</td>
    <td><div class="col-sm-12">
    <select name="pejabat" id="pejabat" class="js-example-basic-single js-states">
    <option value="0">-Pilih-</option>
    <?php foreach($listll->result() as $w){ ?>
                        <?php if($w->username == $akad['pejabat']){ ?>
                            <option value="<?php echo $w->username; ?>" selected><?php echo $w->nama_lengkap; ?> - <?php echo $w->nmjabatan; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $w->username; ?>"><?php echo $w->nama_lengkap; ?> - <?php echo $w->nmjabatan; ?></option>
                        <?php } ?>
                    <?php } ?>
    </select></div>
    </td>
</tr>
    <tr>
    <td>No. Cair :<input type="text" name="no_cair" id="no_cair" value="<?php echo $cair['no_cair']; ?> " /></td>
	<td>Tanggal Cair:<input  type="text" name="tgl_cair" id="tgl_cair" class="tgl"  size="20" maxlength="50" value="<?php echo $cair['tgl_cair']; ?>"/ readonly>(yyyy-mm-dd)</td>

   <td width='600px'>Hasil Generate :<?php
      	foreach($listemptycair->result_array() as $mm){
      if($mm['tiperekening']!=''){
      $no_aplikasi = $db['no_aplikasi'];

       ?>
       <a href="<?php echo base_url();?>folder/cust.xls">cust_facility_lengkap_terbaru.xlsx</a>
       <?
       }else{
         echo"";
       }
      }
       ?>
       </td>
    </tr>
    </table>

     <br />
     <table id="Data" align="center" >
    <tr>
    <td>
   <button type="button" name="simpancair" id="simpancair" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>

  </td>
    <td>        <button type="button" name="canceln" id="canceln" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Pembatalan aplikasi</button>

  </td>
  <td>
        <button type="button" name="kembali" id="kembali" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>

  </td>
         <td>
        <button type="button" name="kirim" id="kirim" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-envelope"></i> Kirim</button>

  </td>
  </tr></table>
    </form>
     </div>
   <br />
     <div id="reason">
     <table id="data" width="70%">
         <tr></tr><tr></tr>
  <tr>

  </tr>

<tr>
	<td width=20%>Reason</td>
    <td>:</td>
    <td>
       <?	if($listreason->num_rows() > 0){  ?>
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
     <td>  <input type="button" name="cancelm" id="cancelm" value="Kirim">
           <input type="button" name="cancelm" id="rejectm" value="Kembali">


  </td>
  </tr>
  </table>

  </div><br />

  <div style=" height:auto"></div>



