
<!DOCTYPE html>


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




      $("#kembali").click(function(){
           var thp = $("#thp").val();
		window.location.assign('<?php echo base_url();?>'+thp);
	});
     $("#lama_bank").keyup(function(){
        return checkInput(this);
	});

	});


</script>
   <script>
   function dataFasilitas(dat,link,form){
      $("#mymodal").modal("show"); 
            	var username = $("#userid").val();
		var string = "username="+username;
   	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>parameter/updatetambahfasilitas/"+dat+"/"+link+"/"+form,
			data	: string,
			cache	: false,
                beforeSend: function(){
            $("#datatampil").html("Loading...");
                                    },
			success	: function(data){
				$("#datatampil").html(data);


			}
		});
        }

        function hapusfas(id){
	var no_aplikasi = $("#no_aplikasi").val();
	var string = "no_aplikasi="+no_aplikasi+"&id_fasilitas="+id;

	var pilih = confirm('Data yang akan dihapus data Fasilitas = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/hapusfasilitas",
			data	: string,
			cache	: false,
			success	: function(data){
		     tampil_data('<?php echo $aplikasi; ?>','updatepembiayaan','verifikasi','formpembiayaan','2');
			}
		});
	}
}
     function hapusfaslain(id){
	var no_aplikasi = $("#no_aplikasi").val();
	var string = "no_aplikasi="+no_aplikasi+"&id_fasilitas="+id;

	var pilih = confirm('Data yang akan dihapus data Fasilitas = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/hapusfasilitaslain",
			data	: string,
			cache	: false,
			success	: function(data){
		     tampil_data('<?php echo $aplikasi; ?>','updatepembiayaan','verifikasi','formpembiayaan','2');
			}
		});
	}
}

 function nad(baru){
 $.ajax({
            type	: 'POST',
            url		: "<?php echo site_url(); ?>parameter/parameterjangkawaktu",
            data	: baru,
            cache	: true,
            dataType : "json",
            success	: function(data){
                	$("#jj").attr('disabled','disabled');
                    $("#margin").val('');
                    $("#jangka_waktu").val('');
                     $("#angsuran").val('');
                       $("#angsuran").attr("disabled","disabled");
                          $("#margin").removeAttr('disabled');
                $("#jj").val(''+data.jangka_waktu);
                kalkulatorTambah();
     		}
    });
    }

        function simpannasabah(nama,inputdata,kolom,field,form,tabel){
    var no_aplikasi = $("#no_aplikasi").val();
var verifikasi = $("#"+nama).val();
var inputan = inputdata;
var kolom = kolom;
var field = field;
var form = form;
	var data = "no_aplikasi="+no_aplikasi+"&verifikasi="+verifikasi+"&inputan="+inputan+"&kolom="+kolom+"&field="+field+"&form="+form;

    	if(verifikasi==0){
			   message('error', 'Data tidak boleh kosong');
			$("#"+nama).focus();
             $("#"+nama).val(''+inputdata);
			return false;
		}

$.ajax({
type: 'POST',
dataType:'html',
url: "<?php echo site_url(); ?>verifikasi/updatebaru/"+nama+"/"+tabel,
data: data,
beforeSend: function(){
//document.getElementById('uploadProcessDetailRincian').style.display= 'block';
//$('#datanasabah').css("opacity",".2");
				},
success: function(htmldataumum) {
   message('success', 'Data berhasil di dirubah');
}
});	//simpan


}

  function simpanadmin(nama,inputdata,kolom,field,form,tabel){
    var no_aplikasi = $("#no_aplikasi").val();
var verifikasi = $("#"+nama).val();
var inputan = inputdata;
var kolom = kolom;
var field = field;
var form = form;
	var data = "no_aplikasi="+no_aplikasi+"&verifikasi="+verifikasi+"&inputan="+inputan+"&kolom="+kolom+"&field="+field+"&form="+form;



$.ajax({
type: 'POST',
dataType:'html',
url: "<?php echo site_url(); ?>verifikasi/updatebaru/"+nama+"/"+tabel,
data: data,
beforeSend: function(){
//document.getElementById('uploadProcessDetailRincian').style.display= 'block';
//$('#datanasabah').css("opacity",".2");
				},
success: function(htmldataumum) {
   message('success', 'Data berhasil di dirubah');
}
});	//simpan


}

  function simpanujrah(nama,inputdata,kolom,field,form,tabel){
    var no_aplikasi = $("#no_aplikasi").val();
var verifikasi = $("#"+nama).val();
var inputan = inputdata;
var kolom = kolom;
var field = field;
var form = form;
	var data = "no_aplikasi="+no_aplikasi+"&verifikasi="+verifikasi+"&inputan="+inputan+"&kolom="+kolom+"&field="+field+"&form="+form;


$.ajax({
type: 'POST',
dataType:'html',
url: "<?php echo site_url(); ?>verifikasi/updatebaru/"+nama+"/"+tabel,
data: data,
beforeSend: function(){
//document.getElementById('uploadProcessDetailRincian').style.display= 'block';
//$('#datanasabah').css("opacity",".2");
				},
success: function(htmldataumum) {
   message('success', 'Data berhasil di dirubah');
}
});	//simpan


}

 function simpanmargin(nama,inputdata,kolom,field,form,tabel){
    var no_aplikasi = $("#no_aplikasi").val();
var verifikasi = $("#"+nama).val();
var inputan = inputdata;
var kolom = kolom;
var field = field;
var form = form;
	var data = "no_aplikasi="+no_aplikasi+"&verifikasi="+verifikasi+"&inputan="+inputan+"&kolom="+kolom+"&field="+field+"&form="+form;



$.ajax({
type: 'POST',
dataType:'html',
url: "<?php echo site_url(); ?>verifikasi/updatebaru/"+nama+"/"+tabel,
data: data,
beforeSend: function(){
//document.getElementById('uploadProcessDetailRincian').style.display= 'block';
//$('#datanasabah').css("opacity",".2");
				},
success: function(htmldataumum) {
   message('success', 'Data berhasil di dirubah');
}
});	//simpan


}
 function simpanangsuran(nama,inputdata,kolom,field,form,tabel){
    var no_aplikasi = $("#no_aplikasi").val();
var verifikasi = $("#"+nama).val();
var inputan = inputdata;
var kolom = kolom;
var field = field;
var form = form;
	var data = "no_aplikasi="+no_aplikasi+"&verifikasi="+verifikasi+"&inputan="+inputan+"&kolom="+kolom+"&field="+field+"&form="+form;



$.ajax({
type: 'POST',
dataType:'html',
url: "<?php echo site_url(); ?>verifikasi/updatebaru/"+nama+"/"+tabel,
data: data,
beforeSend: function(){
//document.getElementById('uploadProcessDetailRincian').style.display= 'block';
//$('#datanasabah').css("opacity",".2");
				},
success: function(htmldataumum) {
   message('success', 'Data berhasil di dirubah');
}
});	//simpan


}
  </script>

   <div class="btn-group-center">
<?php
  $no=0;
  foreach($listtabsheader->result_array() as $jk){

   if (($no % 9) == 0){echo "<br>";}
?>
 <a href="javascript:tampil_data('<?php echo $aplikasi;?>','<?php echo $jk['kontrol'];?>','<?php echo $jk['link'];?>','<?php echo $jk['form'];?>','2')" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-<?php echo $jk['icon'];?>"></i> <?php echo $jk['nm_tab'];?> </a>


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
 </div><br />
          <form class="form-horizontal" id="dataTable">
        <table id="dataTable" width="100%">
         <tr></tr><tr></tr>
   <tr>
  <th>
  <b>Data Pembiayaan</b>
  </th>

  </tr>
  <tr></tr><tr></tr><tr></tr><tr></tr>
  <tr>
  </tr>
   <tr>

    <td>
        <input type="hidden" name="thp" id="thp" size="30" maxlength="50" value="<?php echo $tahapantab;?>" /></td>

    <input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $db['no_aplikasi']; ?>" />
 </td>
</tr>
<?php
 $produk = $db['id_tipeproduk'];
  $jj = $this->app_model->NilaiJangkaWaktu($produk);
?>
<tr>
	<td width="20%">Produk</td>
    <td width="5">:</td>
    <td><div class="col-lg-5">
         <input type="hidden" name="jj" id="jj"  value="<?php echo $jj; ?>">
    <select name="id_tipeproduk" id="id_tipeproduk"  class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
       <?php foreach($listtipeproduk->result() as $ff){ ?>
                        <?php if($ff->id_produk == $db['id_tipeproduk']){ ?>
                            <option value="<?php echo $ff->id_produk; ?>" selected><?php echo $ff->nm_produk; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $ff->id_produk; ?>"><?php echo $ff->nm_produk; ?></option>
                        <?php } ?>
                    <?php } ?>
    </select></div></td>
</tr>
   <?php
         $plafon = str_replace(',','',$db['plafon']);
       $biaya_admin = $this->app_model->CariBiayaAdmin($db['id_tipeproduk']);
       $biaya_ujrah = $this->app_model->CariBiayaUjrah($db['id_tipeproduk']);
       	$harga_cicil = $this->app_model->NilaiBiayaEmas($plafon,$db['id_tipeproduk'],'1');
        	$harga_ujrah = $this->app_model->NilaiBiayaEmas($plafon,$db['id_tipeproduk'],'2');
            if($biaya_admin == '1' and $harga_cicil !='0' ){
                $harga = $harga_cicil;
                $disabled = "disabled";
            }else if ($biaya_admin == '0' and $harga_cicil =='0'){
                 $harga = 0;
                $disabled = "disabled";
            } else {
             $harga = $db['biaya_admin'];
                $disabled = "";
            }

              if($biaya_ujrah == '1' and $harga_ujrah !='0' ){
                $hargar = $harga_ujrah;
                $disabledr = "disabled";
            }else if ($biaya_ujrah == '0' and $harga_ujrah =='0'){
                 $hargar = 0;
                $disabledr = "disabled";
            } else {
             $hargar = $db['biaya_ujrah'];
                $disabledr = "";
            }
       ?>
<script>
$(document).ready(function(){
 $("#id_tipeproduk").change(function() {
               var id = $("#id_tipeproduk").val();
               var plafon = $("#plafon").val();
      var string = "id="+id+"&plafon="+plafon;
	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>parameter/parameterbiaya",
			data	: string,
			cache	: true,
			dataType : "json",
			success	: function(data){
                 if(data.biaya_admin=='1' && data.harga_cicil != '0'){
               	$("#biaya_admin").attr('disabled','disabled');
                $("#biaya_admin").val(''+data.harga_cicil);
                  nad(data.produk);
                   simpanadmin('biaya_admin','<?php echo $harga; ?>','Biaya Admin','biaya_admin','Data Pembiayaan','tb_pembiayaan');
                   simpannasabah('id_tipeproduk','<?php echo $db['id_tipeproduk']; ?>','Pembukuan','id_tipeproduk','Data Pembiayaan','tb_pembiayaan');
                }else if(data.biaya_admin=='0' && data.harga_cicil == '0'){
               	$("#biaya_admin").attr('disabled','disabled');
                $("#biaya_admin").val(''+data.harga_cicil);
                  nad(data.produk);
                              simpanadmin('biaya_admin','0','Biaya Admin','biaya_admin','Data Pembiayaan','tb_pembiayaan');
                              simpannasabah('id_tipeproduk','<?php echo $db['id_tipeproduk']; ?>','Pembukuan','id_tipeproduk','Data Pembiayaan','tb_pembiayaan');
               }else{
               $("#biaya_admin").removeAttr('disabled');
                $("#biaya_admin").val('0');
                 nad(data.produk);
                   simpanadmin('biaya_admin','<?php echo $harga; ?>','Biaya Admin','biaya_admin','Data Pembiayaan','tb_pembiayaan');
                   simpannasabah('id_tipeproduk','<?php echo $db['id_tipeproduk']; ?>','Pembukuan','id_tipeproduk','Data Pembiayaan','tb_pembiayaan');

              }
                  if(data.biaya_ujrah=='1' && data.harga_ujrah != '0'){
               	$("#biaya_ujrah").attr('disabled','disabled');
                $("#biaya_ujrah").val(''+data.harga_ujrah);
                   nad(data.produk);
                               simpanujrah('biaya_ujrah','<?php echo $hargar; ?>','Biaya Ujrah','biaya_ujrah','Data Pembiayaan','tb_pembiayaan');
                               simpannasabah('id_tipeproduk','<?php echo $db['id_tipeproduk']; ?>','Pembukuan','id_tipeproduk','Data Pembiayaan','tb_pembiayaan');
                }else if(data.biaya_ujrah=='0' && data.harga_ujrah == '0'){
               	$("#biaya_ujrah").attr('disabled','disabled');
                $("#biaya_ujrah").val(''+data.harga_ujrah);
                   nad(data.produk);
                            simpanujrah('biaya_ujrah','0','Biaya Ujrah','biaya_ujrah','Data Pembiayaan','tb_pembiayaan');
                            simpannasabah('id_tipeproduk','<?php echo $db['id_tipeproduk']; ?>','Pembukuan','id_tipeproduk','Data Pembiayaan','tb_pembiayaan');
               }else{
               $("#biaya_ujrah").removeAttr('disabled');
                $("#biaya_ujrah").val('0');
                 nad(data.produk);
                                 simpanujrah('biaya_ujrah','<?php echo $hargar; ?>','Biaya Ujrah','biaya_ujrah','Data Pembiayaan','tb_pembiayaan');
                                 simpannasabah('id_tipeproduk','<?php echo $db['id_tipeproduk']; ?>','Pembukuan','id_tipeproduk','Data Pembiayaan','tb_pembiayaan');

              }
			}
	});

    });

    $("#plafon").on("keyup change", function(e) {
    var id = $("#id_produk").val();
    var plafon =  $("#plafon").val();
    if(id=="0"){
         message('error', 'Produk diisi dulu');
          $("#plafon").val("");

    }else if(id=="9"){
    $("#angsuran").val(""+plafon);
     $("#angsuran").attr("disabled","disabled");
     $("#margin").attr("disabled","disabled");
    simpannasabah('plafon','<?php echo $db['plafon']; ?>','Plafon','plafon','Data Pembiayaan','tb_pembiayaan');
                        simpanmargin('margin','<?php echo $db['margin']; ?>','Margin','margin','Data Pembiayaan','tb_pembiayaan');
          simpannasabah('angsuran','<?php echo $db['angsuran']; ?>','Angsuran','angsuran','Data Pembiayaan','tb_pembiayaan');

      $("#margin").val("0");
     }else if(id=="8"){
      $("#margin").attr("disabled","disabled");
      $("#margin").val("0");
      $("#angsuran").removeAttr('disabled');
          simpannasabah('plafon','<?php echo $db['plafon']; ?>','Plafon','plafon','Data Pembiayaan','tb_pembiayaan');
                        simpanmargin('margin','<?php echo $db['margin']; ?>','Margin','margin','Data Pembiayaan','tb_pembiayaan');
          simpanangsuran('angsuran','<?php echo $db['angsuran']; ?>','Angsuran','angsuran','Data Pembiayaan','tb_pembiayaan');

    }else{
      kalkulatorTambah();
       $("#margin").removeAttr('disabled');
       $("#angsuran").attr("disabled","disabled");
        simpannasabah('plafon','<?php echo $db['plafon']; ?>','Plafon','plafon','Data Pembiayaan','tb_pembiayaan');
                        simpanmargin('margin','<?php echo $db['margin']; ?>','Margin','margin','Data Pembiayaan','tb_pembiayaan');
          simpannasabah('angsuran','<?php echo $db['angsuran']; ?>','Angsuran','angsuran','Data Pembiayaan','tb_pembiayaan');

    }
})

 $("#jangka_waktu").on("keyup change", function(e) {
    var id = $("#id_produk").val();
    var plafon =  $("#plafon").val();
  if(id=="0"){
         message('error', 'Produk diisi dulu');
          $("#jangka_waktu").val("");

    }else if(id=="9"){
    $("#angsuran").val(""+plafon);
     $("#angsuran").attr("disabled","disabled");
     $("#margin").attr("disabled","disabled");
      $("#margin").val("0");
       simpannasabah('plafon','<?php echo $db['plafon']; ?>','Plafon','plafon','Data Pembiayaan','tb_pembiayaan');
                        simpanmargin('margin','<?php echo $db['margin']; ?>','Margin','margin','Data Pembiayaan','tb_pembiayaan');
          simpannasabah('angsuran','<?php echo $db['angsuran']; ?>','Angsuran','angsuran','Data Pembiayaan','tb_pembiayaan');

     }else if(id=="8"){
         $("#angsuran").val("0");
      $("#margin").attr("disabled","disabled");
      $("#margin").val("0");
      $("#angsuran").removeAttr('disabled');
         simpannasabah('plafon','<?php echo $db['plafon']; ?>','Plafon','plafon','Data Pembiayaan','tb_pembiayaan');
                        simpanmargin('margin','<?php echo $db['margin']; ?>','Margin','margin','Data Pembiayaan','tb_pembiayaan');
          simpanangsuran('angsuran','<?php echo $db['angsuran']; ?>','Angsuran','angsuran','Data Pembiayaan','tb_pembiayaan');

    }else{
      kalkulatorTambah();
       $("#margin").removeAttr('disabled');
       $("#angsuran").attr("disabled","disabled");
         simpannasabah('plafon','<?php echo $db['plafon']; ?>','Plafon','plafon','Data Pembiayaan','tb_pembiayaan');
                        simpanmargin('margin','<?php echo $db['margin']; ?>','Margin','margin','Data Pembiayaan','tb_pembiayaan');
          simpannasabah('angsuran','<?php echo $db['angsuran']; ?>','Angsuran','angsuran','Data Pembiayaan','tb_pembiayaan');

    }
})
})
</script>
  <tr>
	<td width="20%">Skim Pembiayaan</td>
    <td width="5">:</td>
    <td><div class="col-lg-5">
    <select name="skim" id="skim"  class="js-example-basic-single js-states form-control" onchange="javascript:simpannasabah('skim','<?php echo $db['skim']; ?>','Skim','skim','Data Pembiayaan','tb_pembiayaan')">
    <option value="0">-Pilih-</option>
       <?php foreach($listskim->result() as $ff){ ?>
                        <?php if($ff->id_skim == $db['skim']){ ?>
                            <option value="<?php echo $ff->id_skim; ?>" selected><?php echo $ff->nm_skim; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $ff->id_skim; ?>"><?php echo $ff->nm_skim; ?></option>
                        <?php } ?>
                    <?php } ?>
    </select></div></td>
</tr>
<tr>
	<td width="10%">Jenis Pembiayaan</td>
    <td width="5">:</td>
    <td><div class="col-lg-5">
    <select name="jenis" id="jenis" class="js-example-basic-single js-states form-control" onchange="javascript:simpannasabah('jenis','<?php echo $db['jenis']; ?>','Jenis','jenis','Data Pembiayaan','tb_pembiayaan')">
    <option value="0">-Pilih-</option>
      <?php
       $program = $this->app_model->CekKodeProgramPadaPembiayaanAliansi($db->kd_program);
	foreach($listjenis->result() as $hh){

	?>
    <?php
     if($hh->id_jnskegunaan == $db['jenis']){ ?>
                            <option value="<?php echo $hh->id_jnskegunaan; ?>" selected><?php echo $hh->nm_jnskegunaan; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $hh->id_jnskegunaan; ?>"><?php echo $hh->nm_jnskegunaan; ?></option>
                        <?php } ?>

                     <?php } ?>
    </select></div> </td>
</tr>
 <tr>
	<td width="20%">Plafon Pembiayaan (dalam bentuk angka)</td>
    <td width="5">:</td>
    <td><div class="col-lg-5">
          <input type="text" name="plafon" id="plafon" class="form-control" value="<?php echo $db['plafon'];?>">
  </div></td></tr>
  <tr>
	<td width="20%">Biaya Admin</td>
    <td width="5">:</td>
    <td><div class="col-lg-2">

          <input type="text" name="biaya_admin" id="biaya_admin" class="form-control" value="<?php echo $harga;?>" onchange="javascript:simpannasabah('biaya_admin','<?php echo $harga; ?>','Biaya Admin','biaya_admin','Data Pembiayaan','tb_pembiayaan')" <?php echo $disabled;?>>
  </div></td></tr>
 <tr>
	<td width="20%">Biaya Ujrah</td>
    <td width="5">:</td>
    <td><div class="col-lg-2">
          <input type="text" name="biaya_ujrah" id="biaya_ujrah" class="form-control" value="<?php echo $hargar;?>" <?php echo $disabledr;?> onchange="javascript:simpannasabah('biaya_ujrah','<?php echo $hargar; ?>','Biaya Ujrah','biaya_ujrah','Data Pembiayaan','tb_pembiayaan')">
  </div></td></tr>
  <tr>
	<td width=20%>Lama Berhubungan Bank</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="lama_bank" id="lama_bank"  size="8" maxlength="50" value="<?php echo $db['lama_bank']; ?>"  onchange="javascript:simpannasabah('lama_bank','<?php echo $db['lama_bank']; ?>','Lama Bank','lama_bank','Data Pembiayaan','tb_pembiayaan')" /><font color=red>Untuk pengisian lama usaha dibulatkan misalnya 4.5 menjadi 5 </font>(Dalam Tahun)</div></td>
</tr>

<tr>
	<td width="20%">Jangka Waktu</td>
    <td width="5">:</td>
    <td> <div class="col-lg-5">
  <input type="text" name="jangka_waktu" id="jangka_waktu"   size="4" maxlength="50"  value="<?php echo $db['jangka_waktu']; ?>"/></div></td></tr>
<tr>
	<td>Margin</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="margin" id="margin"  size="10" maxlength="50" onKeyUp="kalkulatorTambah();" value="<?php echo $db['margin']; ?>"/> %      </td></div></tr>
<tr>
	<td>Angsuran</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="angsuran" id="angsuran"   size="20" maxlength="50" value="<?php echo $db['angsuran']; ?>"  class="form-control" onchange="javascript:simpannasabah('angsuran','<?php echo $db['angsuran']; ?>','Angsuran','angsuran','Data Pembiayaan','tb_pembiayaan')" /></div>

</td>
</tr>
 <tr>
	<td width="20%">Sumber Pembayaran</td>
    <td width="5">:</td>
    <td><div class="col-lg-5">
    <select name="sumber" id="sumber" class="js-example-basic-single js-states form-control" onchange="javascript:simpannasabah('sumber','<?php echo $db['sumber']; ?>','Sumber','sumber','Data Pembiayaan','tb_pembiayaan')">
       <?php foreach($listsumber->result() as $ff){ ?>
                        <?php if($ff->id_sumber == $db['sumber']){ ?>
                            <option value="<?php echo $ff->id_sumber; ?>" selected><?php echo $ff->nm_sumber; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $ff->id_sumber; ?>"><?php echo $ff->nm_sumber; ?></option>
                        <?php } ?>
                    <?php } ?>
    </select></div></td>
</tr>

<tr>
	<td width="20%">Pengalaman Pembiayaan</td>
    <td width="5">:</td>
    <td><div class="col-lg-5">
    <select name="pengalaman" id="pengalaman" class="js-example-basic-single js-states form-control" onchange="javascript:simpannasabah('pengalaman','<?php echo $db['pengalaman']; ?>','Pengalaman','pengalaman','Data Pembiayaan','tb_pembiayaan')">
       <?php foreach($listpengalaman->result() as $ff){ ?>
                        <?php if($ff->id_pengalaman == $db['pengalaman']){ ?>
                            <option value="<?php echo $ff->id_pengalaman; ?>" selected><?php echo $ff->nm_pengalaman; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $ff->id_pengalaman; ?>"><?php echo $ff->nm_pengalaman; ?></option>
                        <?php } ?>
                    <?php } ?>
    </select></div></td>
</tr>
 <tr>
	<td width=20%>Kepemilikan HP</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="id_kepemilikan" id="id_kepemilikan" class="js-example-basic-single js-states form-control" onchange="javascript:simpannasabah('id_kepemilikan','<?php echo $db['id_kepemilikan']; ?>','Kepemilikan HP','id_kepemilikan','Data Pembiayaan','tb_pembiayaan')">
    <option value="0">-Pilih-</option>
     <?php foreach($listmilikhp->result() as $cc){ ?>
                        <?php if($cc->id_milikhp == $db['id_kepemilikan']){ ?>
                            <option value="<?php echo $cc->id_milikhp; ?>" selected><?php echo $cc->nm_milikhp; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $cc->id_milikhp; ?>"><?php echo $cc->nm_milikhp; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>

</table></form><br />

<tr></tr><tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr>
         <tr>	<td colspan="3" align="center"><br />
         <button type="button" name="kembali" id="kembali" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>
   </td></tr>

 <script>
    $(document).ready(function() {
  var textbox = '#ThousandSeperator_commas';
  var hidden = '#ThousandSeperator_num';
  $("#plafon").keyup(function () {
  var num = $("#plafon").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#plafon").val(numCommas);
  });
  $("#angsuran").keyup(function () {
  var num = $("#angsuran").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#angsuran").val(numCommas);
  });
   $("#biaya_admin").keyup(function () {
  var num = $("#biaya_admin").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#biaya_admin").val(numCommas);
  });
   $("#biaya_ujrah").keyup(function () {
  var num = $("#biaya_ujrah").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#biaya_ujrah").val(numCommas);
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

     <br /><br />
	<th>Pembiayaan Bank Lain </th><br /><br />



   <button type="button" name="simpan" id="simpan" class="btn btn-info btn-sm" onclick="dataFasilitas('<?php echo $aplikasi;?>','verifikasi','tambahfasilitaslain')"><i class="glyphicon glyphicon-plus"></i>Tambah Fasilitas Bank Lain</button>

<table class="table table bordered" width="100%">

<tr>
	<th>Fasilitas</th>
    <th>Nilai Pembiayaan</th>
    <th>Margin (%p.a)</th>
    <th>Angsuran per bulan</th>
    <th>Jangka Waktu </th>
    <th>Sisa OS</th>
    <th>Aksi</th>
</tr>
<?php
if($listfasilitaslain->num_rows() > 0){
	$no=1;
	foreach($listfasilitaslain->result() as $nn){

    ?>
    	<tr>
			<td align="center" width="150"><?php echo 'Fasilitas '.$no; ?></td>
             <td align="center" width="150" ><?php echo $nn->nm_pembiayaan; ?></td>
             <td align="center" width="150" ><?php echo $nn->margin_pa; ?></td>
             <td align="center" width="150" ><?php echo $nn->angsuran_bulan; ?></td>
             <td align="center" width="150" ><?php echo $nn->jw_bulan; ?></td>
             <td align="center" width="150" ><?php echo $nn->sisa_os; ?></td>

                             <td width="2" align="center">

             <?php echo "<a href='javascript:hapusfaslain(\"{$nn->id_fasilitas1}\")'>";?>
			   Hapus
			</a>
		</td>
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
 <br /><br />
	<th>Pembiayaan Existing</th><br /><br />



   <button type="button" name="simpan" id="simpan" class="btn btn-info btn-sm" onclick="dataFasilitas('<?php echo $aplikasi;?>','verifikasi','tambahfasilitas')"><i class="glyphicon glyphicon-plus"></i>Tambah Fasilitas Existing</button>

<table class="table table bordered" width="100%">

<tr>
	<th>Fasilitas</th>
    <th>Nilai Pembiayaan</th>
    <th>Margin (%p.a)</th>
    <th>Angsuran per bulan</th>
    <th>Jangka Waktu </th>
    <th>Sisa OS</th>
    <th>Aksi</th>
</tr>
<?php
if($listfasilitas->num_rows() > 0){
	$no=1;
	foreach($listfasilitas->result() as $tt){

    ?>
    	<tr>
			<td align="center" width="150"><?php echo 'Fasilitas '.$no; ?></td>
             <td align="center" width="150" ><?php echo $tt->nm_pembiayaan; ?></td>
             <td align="center" width="150" ><?php echo $tt->margin_pa; ?></td>
             <td align="center" width="150" ><?php echo $tt->angsuran_bulan; ?></td>
             <td align="center" width="150" ><?php echo $tt->jw_bulan; ?></td>
             <td align="center" width="150" ><?php echo $tt->sisa_os; ?></td>

                             <td width="2" align="center">

             <?php echo "<a href='javascript:hapusfas(\"{$tt->id_fasilitas}\")'>";?>
			   hapus
			</a>
		</td>
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
