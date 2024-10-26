 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/js/dist/tablefilter/style/tablefilter.css">
<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});

       var idleInterval = setInterval("timerIncrement()", 60000);
    $(this).mousemove(function (e) {idleTime = 0;});
    $(this).keypress(function (e) {idleTime = 0;});

   	$("#view").show();
	$("#form").hide();
    $('#dialog').dialog('close');
    $("#reason").hide();


	$("#tambah").click(function(){
		$("#view").hide();
		$("#form").show();
		$("#id_pembiayaan").focus();
	});

	function kosong(){
		$("#rek_induk").val('');
		$("#no_aplikasi").val('');
		$("#nm_lengkap").val('');

	}
	$("#simpan").click(function(){

		var no_aplikasi = $("#no_aplikasi").val();
		var nm_cabang 	= $("#nm_lengkap").val();

		var string = "kd_cabang="+kd_cabang+"&nm_cabang="+nm_cabang;

		if(kd_cabang.length==0){
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kode Cabang Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#kd_cabang").focus();
			return false;
		}
		if(nm_cabang.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Cabang Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_cabang").focus();
			return false;
		}

	  	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>cabang/simpan",
			data	: string,
			cache	: false,
			success	: function(data){
				$.messager.show({
					title:'Info',
					msg:data,
					timeout:2000,
					showType:'slide'
				});
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

   	$("#send").click(function(){
    	   var no_aplikasi=$('#no_aplikasi').val();
           	var string = "no_aplikasi="+no_aplikasi;
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>cekduplikasi/updatesend",
            data	: string,
			cache	: false,
			success	: function(data){
			 	window.location.assign('<?php echo base_url();?>cekduplikasi');
			}
		});
	});

  	$("#rejectm").click(function(){

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
		  		url		: "<?php echo site_url(); ?>cekduplikasi/updatetolak",
			data	: string,
			cache	: false,

           success	: function(data){
			window.location.assign('<?php echo base_url();?>cekduplikasi');
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


 $("#rejectn").click(function(){
    	   var no_aplikasi=$('#no_aplikasi').val();
           	var string = "no_aplikasi="+no_aplikasi;

$.messager.confirm('Konfirmasi Rejected Nasabah','Anda Yakin No Aplikasi tersebut di hapus pada sistem Fas dikarenakan Nasabah tidak direkomendasikan ?',function(r){
if(r){

         $("#reason").show();
         $('#rejectn').attr('disabled','disabled');
         $('#canceln').attr('disabled','disabled');
         $('#cancelm').hide();
         $('#send').attr('disabled','disabled');
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
			window.location.assign('<?php echo base_url();?>cekduplikasi');
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
         $('#rejectn').attr('disabled','disabled');
         $('#canceln').attr('disabled','disabled');
          $('#rejectm').hide();

         $('#send').attr('disabled','disabled');
	}
});
});

	$("#tambah_data").click(function(){
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>cabang/tambah",
			cache	: false,
			success	: function(data){
				kosong();
				$("#kd_cabang").focus();
			}
		});
	});

	$("#kembali").click(function(){
		window.location.assign('<?php echo base_url();?>cekduplikasi');
	});
});

$(".js-example-basic-single").select2({
  placeholder: "Select Data"
});



</script>

  <?php

		foreach($list->result_array() as $db){
		?>
<div style="float:left; padding-bottom:5px;">
</div>
<div style="float:right; padding-bottom:5px;">

</div> <br /><br /><br />


<table id="dataTable" width="100%">

<thead>
<tr><td>
<input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $db['no_aplikasi']; ?>" /></td>
<td align="center"><b>CEK SID APLIKASI FINANCING APPROVAL SYSTEM</b> </td>
</tr>
</thead>
 </table>
  <br>
   <div class="table-responsive"><table id="dataTable"class="table table-striped table-bordered table-hover">
<tr>
	<th>No</th>
    <th>No Aplikasi</th>
    <th>Nama Nasabah</th>
    <th>No KTP</th>
    <th>Tanggal Lahir</th>
     <th>Tahapan</th>
    <th>Nama Cabang</th>
   

</tr>   <?php
	if($datalistktp->num_rows()>0){
		$no =1;
        	$tgllahir=$dtgllahir;
            	$ktp=$dktp;
		foreach($datalistktp->result_array() as $db){

          $namacabang = $this->app_model->CariCabang($db['kd_cabang']);
           $samaktp = $this->app_model->Persamaan($ktp,$db['no_identitas']);
            $samatgllahir = $this->app_model->Persamaan($tgllahir,$db['tanggal_lahir']);
		?>
    	<tr>
			<td align="center" width="20"><?php echo $no; ?></td>
            <td align="center" width="150" ><?php echo $db['no_aplikasi']; ?></td>
            <td align="center"><?php echo $db['nm_lengkap']; ?></td>
            <td width="150"><?php echo $samaktp; ?></td>
            <td align="center" width="100"><?php echo $samatgllahir; ?></td>
             <td align="center"><?php echo $db['tahapan']; ?></td>
            <td align="center" width="100"><?php echo $namacabang; ?></td>
           </tr>

    <?php
		$no++;
		}
	}else{
	?>
    	<tr>
        	<td colspan="9" align="center" >Tidak Ada Data</td>
        </tr>
    <?php
	}
?>
  </table></div>
 <table id="dataTable" width="100%">

<thead>
<tr><td>
<input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="" /></td>

<td>Untuk sementara CEK CIF, CEK Blacklist dan CEK Dedupe masih melakukan manual</td>
<br>
</tr>
</thead>
</table>
<br>

   <button type="submit" name="submit" class="btn btn-danger" id="canceln"><span class="glyphicon glyphicon-remove"></span> Pembatalan Aplikasi</button>
   <button type="submit" name="submit" class="btn btn-danger" id="rejectn"><span class="glyphicon glyphicon-trash"></span> Rejected</button>
   <button type="submit" name="submit" id="send" class="btn btn-success"><span class="glyphicon glyphicon-send"></span> Approved</button>
   <button type="submit" name="print" id="kembali" class="btn btn-info"><span class="glyphicon glyphicon-share-alt"></span> Kembali</button>

<div id="reason">
     <table id="data" width="70%">
         <tr></tr><tr></tr>
  <tr>

  </tr>

<tr>
	<td width=20%>Reason</td>
    <td>:</td>
    <br>
    <td>
       <?php	if($listreason->num_rows() > 0){  ?>
    <div class="col-lg-4">
    <select name="ket" id="ket" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
      <?php foreach($listreason->result() as $w){
       ?>

                            <option value="<?php echo $w->id_reason; ?>" ><?php echo $w->id_reason; ?>-<?php echo $w->nm_reason; ?></option>

                    <?php } ?>

      </select></div>
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
     <td>
       <button type="button" name="cancelm" class="btn btn-danger" id="cancelm"><span class="glyphicon glyphicon-remove"></span> Batal</button>
       <button type="button" name="cancelm" class="btn btn-danger" id="rejectm"><span class="glyphicon glyphicon-trash"></span> Rejected</button>
  </td>
  </tr>
  </table>

  </div>
<br />
<br>
  Keterangan : <br />

   <font color = "red"> INFO UNTUK TOMBOL "PEMBATALAN APLIKASI" DIGUNAKAN UNTUK PEMBATALAN APLIKASI NASABAH</font><br />

   <?php

    }
    ?>
