 <script type="text/javascript">
$(document).ready(function(){



                     $(".js-example-basic-single").select2({
  placeholder: "Select Data"
});

	$("#simpan").click(function(){
		//var rek_induk	= $("#rek_induk").val();
        var no_aplikasi = $("#no_aplikasi").val();
	     var nm_lengkap = $("#nm_lengkap").val();
         var id_cardnikah  = $("#id_cardnikah").val();
        var no_identitas = $("#no_identitas").val();
        var id_card = $("#id_card").val();
          var id_jabatan = $("#id_jabatan").val();
        var tanggal_lahir = $('#tanggal_lahir').val();
        var tempat_lahir  = $("#tempat_lahir").val();
	    var ibu_kandung   = $("#ibu_kandung").val();
        var alamat = $("#alamat").val();
        var kdpos_ktp = $('#kdpos_ktp').val();
        var kelurahan_ktp  = $("#kelurahan_ktp").val();
	    var kecamatan_ktp   = $("#kecamatan_ktp").val();
        var kotamadya_ktp   = $("#kotamadya_ktp").val();
        var propinsi_ktp   = $("#propinsi_ktp").val();
        var alamat_tinggal = $("#alamat_tinggal").val();
        var kdpos_tinggal = $('#kdpos_tinggal').val();
        var kelurahan_tinggal  = $("#kelurahan_tinggal").val();
	    var kecamatan_tinggal   = $("#kecamatan_tinggal").val();
        var kotamadya_tinggal   = $("#kotamadya_tinggal").val();
        var propinsi_tinggal   = $("#propinsi_tinggal").val();
         var no_tlp   = $("#no_tlp").val();
        var no_hp1   = $("#no_hp1").val();
         var no_hp2   = $("#no_hp2").val();


	  //	var string = "rek_induk="+rek_induk+"&no_rek="+no_rek+"&nama_rek="+nama_rek;
       	var string = "&no_aplikasi="+no_aplikasi+"&nm_lengkap="+nm_lengkap+"&id_cardnikah="+id_cardnikah+"&no_identitas="+no_identitas+"&id_card="+id_card+"&tempat_lahir="+tempat_lahir+"&tanggal_lahir="+tanggal_lahir+"&alamat="+alamat+"&kdpos_ktp="+kdpos_ktp+"&kelurahan_ktp="+kelurahan_ktp+"&kecamatan_ktp="+kecamatan_ktp+"&kotamadya_ktp="+kotamadya_ktp+"&propinsi_ktp="+propinsi_ktp+"&alamat_tinggal="+alamat_tinggal+"&kdpos_tinggal="+kdpos_tinggal+"&kelurahan_tinggal="+kelurahan_tinggal+"&kecamatan_tinggal="+kecamatan_tinggal+"&kotamadya_tinggal="+kotamadya_tinggal+"&propinsi_tinggal="+propinsi_tinggal+"&no_tlp="+no_tlp+"&no_hp1="+no_hp1+"&no_hp2="+no_hp2+"&id_jabatan="+id_jabatan;

       	if(nm_lengkap.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Lengkap Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#nm_lengkap").focus();
			return false;
		}

        	if(nm_lengkap.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Depan, Nama Tengah dan Belakang Wajib diketik',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#nm_lengkap").focus();
			return false;
		}
        	if(id_cardnikah.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, No Akad Nikah Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#id_cardnikah").focus();
			return false;
		}
        	if(no_identitas.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, No Identitas Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#no_identitas").focus();
			return false;
		}

        	if(id_card==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Jenis Card Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#id_card").focus();
			return false;
		}

        	if(id_jabatan==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Jenis Pekerjaan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#id_jabatan").focus();
			return false;
		}

        if(tempat_lahir.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tempat Lahir Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#tempat_lahir").focus();
			return false;
		}

        if(tanggal_lahir==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal Lahir Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#tanggal_lahir").focus();
			return false;
		}
        if(alamat.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Alamat Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#alamat").focus();
			return false;
		}
       if(kdpos_ktp.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kode Pos Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#kdpos_ktp").focus();
			return false;
		}
        if(kelurahan_ktp.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kelurahan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#kelurahan_ktp").focus();
			return false;
		}
         if(kecamatan_ktp.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kecamatan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#kecamatan_ktp").focus();
			return false;
		}

          if(kotamadya_ktp.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kotamadya Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#kotamadya_ktp").focus();
			return false;
		}
         if(propinsi_ktp.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Propinsi Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#propinsi_ktp").focus();
			return false;
		}

         if(alamat_tinggal.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Alamat Tinggal Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#alamat_tinggal").focus();
			return false;
		}

        if(kdpos_tinggal.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kode Pos Tinggal Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#kdpos_tinggal").focus();
			return false;
		}
        if(kelurahan_tinggal.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kelurahan Tinggal Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#kelurahan_tinggal").focus();
			return false;
		}
         if(kecamatan_tinggal.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kecamatan Tinggal Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#kecamatan_tinggal").focus();
			return false;
		}

           if(kotamadya_tinggal.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kotamadya Tinggal Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#kotamadya_tinggal").focus();
			return false;
		}
         if(propinsi_tinggal.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Propinsi Tinggal Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#propinsi_tinggal").focus();
			return false;
		}

         if(no_tlp.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, No Telepon tidak dihubungi Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#no_tlp").focus();
			return false;
		}
      $.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/updatepas",
			data	: string,
			cache	: false,
			success	: function(data){
				  		   message('success', 'Data berhasil di tambah');
		
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

    	$("#lanjut").click(function(){
		//var rek_induk	= $("#rek_induk").val();
        var no_aplikasi = $("#no_aplikasi").val();

	  //	var string = "rek_induk="+rek_induk+"&no_rek="+no_rek+"&nama_rek="+nama_rek;
       	var string = "&no_aplikasi="+no_aplikasi;


      $.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/updatepas1",
			data	: string,
			cache	: false,
			success	: function(data){
				   message('success', 'Data berhasil di tambah');  
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

   $("#kembali").click(function(){
           var thp = $("#thp").val();
		window.location.assign('<?php echo base_url();?>'+thp);
	});

});

</script>
<script>
 $(document).ready(function() {

    // Kondisi saat CheckBox diklik
    $('input:checkbox[name="x_AndaMhs"]').click(function() {
        if (!$(this).is(':checked')) {

              $('#alamat_tinggal').removeAttr('disabled','disabled');
                $('#kdpos_tinggal').removeAttr('disabled','disabled');
                 $('#kelurahan_tinggal').removeAttr('disabled','disabled');
                $('#kecamatan_tinggal').removeAttr('disabled','disabled');
                   $('#propinsi_tinggal').removeAttr('disabled','disabled');
                      $('#kotamadya_tinggal').removeAttr('disabled','disabled');
              $('#alamat_tinggal').focus();
             $('#kdpos_tinggal').focus();
              $('#kelurahan_tinggal').focus();
              $('#kecamatan_tinggal').focus();
             $('#propinsi_tinggal').focus();
              $('#kotamadya_tinggal').focus();
          } else {
            var alamat=$('#alamat').val();
            var alamat_tinggal=$('#alamat_tinggal').val(alamat);
            var kdpos_ktp=$('#kdpos_ktp').val();
            var kdpos_tinggal =$('#kdpos_tinggal').val(kdpos_ktp);
             var kelurahan=$('#kelurahan_ktp').val();
            var kelurahan_tinggal = $('#kelurahan_tinggal').val(kelurahan);
            var kecamatan=$('#kecamatan_ktp').val();
            var kecamatan_tinggal=$('#kecamatan_tinggal').val(kecamatan);
             var kotamadya=$('#kotamadya_ktp').val();
            var kotamadya_tinggal=$('#kotamadya_tinggal').val(kotamadya);
             var propinsi=$('#propinsi_ktp').val();
            var propinsi_tinggal = $('#propinsi_tinggal').val(propinsi);
            alamat_tinggal.attr('disabled','disabled');
            kdpos_tinggal.attr('disabled','disabled');
            kelurahan_tinggal.attr('disabled','disabled');
            kecamatan_tinggal.attr('disabled','disabled');
            kotamadya_tinggal.attr('disabled','disabled');
            propinsi_tinggal.attr('disabled','disabled');
               $('#alamat_tinggal').focus();
             $('#kdpos_tinggal').focus();
              $('#kelurahan_tinggal').focus();
              $('#kecamatan_tinggal').focus();
                $('#kotamadya_tinggal').focus();
             $('#propinsi_tinggal').focus();



        }
    });
});

</script>

<script>
                    $(function(){

                      $('#tanggal_lahir').datepicker({
    format: 'yyyy-mm-dd',
}).on('changeDate', function(e){
    $(this).datepicker('hide');
});
                    })
            </script>



    <table class="table table-bordered">
 <tr><td>
     <div class="btn-group-center">
         <?php
  foreach($listtabs->result_array() as $jk){

?>
    <a class="btn-sm btn-info" aria-current="page" href="javascript:tampil_data('<?php echo $aplikasi;?>','<?php echo $jk['kontrol'];?>','<?php echo $jk['link'];?>','<?php echo $jk['form'];?>','1')"><i class="glyphicon glyphicon-<?php echo $jk['icon'];?>"></i> <?php echo $jk['nm_tab'];?></a>
  <?php
   }

?>
</div></td></tr></table>
<br />
               <?php
           if($db['grup_nikah']=='1'){
		?>
   <form class="form-horizontal" id="dataTable">


        <table id="dataTable" class="table table-bordered table-hover table-responsive">
         <tr></tr><tr></tr>
  <tr>
  <th>
  <b>Data pasangan</b>
  </th>

  </tr>
  <tr></tr><tr></tr><tr></tr><tr></tr>
  <tr>
  </tr>
  <tr>

    <td><input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $db['no_aplikasi']; ?>" />
       <input type="hidden" name="thp" id="thp" size="30" maxlength="50" value="<?php echo $tahapantab;?>" /></td>
</tr>
<tr>
	<td width=20%>Nama Lengkap</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="nm_lengkap" id="nm_lengkap" size="30" maxlength="50" value="<?php echo $ww['nm_lengkap']; ?>"/></div></td>
</tr>
<tr>
	<td width=20%>Jenis Pekerjaan</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="id_jabatan" id="id_jabatan" class="js-example-basic-single js-states form-control">
     <option value="0">-Pilih-</option>
     <?php foreach($listjabatan->result() as $m){ ?>
                        <?php if($m->id_jnspekerjaan == $ww['id_jabatan']){ ?>
                            <option value="<?php echo $m->id_jnspekerjaan; ?>" selected><?php echo $m->nm_jnspekerjaan; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $m->id_jnspekerjaan; ?>"><?php echo $m->nm_jnspekerjaan; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>
<tr>
	<td width=20%>No.Akte Nikah</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="id_cardnikah" id="id_cardnikah"  size="50" maxlength="50" value="<?php echo $ww['id_cardnikah']; ?>" /></div></td>
</tr>
<tr>
	<td width=20%>No.KTP/SIM</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="no_identitas" id="no_identitas"  size="50" maxlength="50" value="<?php echo $ww['no_identitas']; ?>"  onKeyUp="return checkInput(this);" /></div></td>
</tr>

<tr>
	<td width=20%>Jenis ID Card</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="id_card" id="id_card" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
        <?php
	foreach($listdata->result() as $w){

	?>
             <?php if($w->id_card == $ww['id_card']){ ?>
                            <option value="<?php echo $w->id_card; ?>" selected><?php echo $w->nm_card; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $w->id_card; ?>"><?php echo $w->nm_card; ?></option>
                        <?php } ?>
                    <?php } ?>
     </select></div></td>

</tr>

<tr>
	<td width=20%>Tempat Lahir</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="tempat_lahir" id="tempat_lahir"  size="30" value="<?php echo $ww['tempat_lahir']; ?>" maxlength="50" /></div> Tanggal Lahir (yyyy-mm-dd)
    : <input type="text" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $ww['tanggal_lahir']; ?>" size="20" maxlength="50" readonly/>
</tr>

 <tr>
	<td width=20%>Alamat Rumah (Sesuai KTP)</td>
    <td>:</td>
    <td><div class="col-lg-5"><textarea name="alamat" id="alamat" class="form-control" onkeyup="displayText1()">
    <?php echo $ww['alamat']; ?></textarea></div><br /> </td>
</tr>
<tr>
 	<td width=20%>Kodepos</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="search" class='autocomplete nama' id="kdpos_ktp" name="kdpos_ktp" maxlength="50" size="20" value="<?php echo $ww['kdpos_ktp']; ?>" /></div</td>
</tr>
<tr>
	<td width=20%>Kelurahan</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete' name="kelurahan_ktp"   id="kelurahan_ktp" size="20" maxlength="50"  value="<?php echo $ww['kelurahan_ktp']; ?>"/></div></td>
</tr>
<tr>
	<td width=20%>Kecamatan</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete'  name="kecamatan_ktp" id="kecamatan_ktp" size="20" maxlength="50"  value="<?php echo $ww['kecamatan_ktp']; ?>"/></div></td>
</tr>
<tr>
	<td width=20%>Kotamadya / Kabupaten</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete'  name="kotamadya_ktp" id="kotamadya_ktp" size="20" maxlength="50"  value="<?php echo $ww['kotamadya_ktp']; ?>"/></div></td>
</tr>
<tr>
	<td width=20%>Propinsi</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete' name="propinsi_ktp" id="propinsi_ktp"  size="20" maxlength="50"  value="<?php echo $ww['propinsi_ktp']; ?>"/></div></td>
</tr>

<tr>
	<td width=20%>Alamat Rumah Tinggal</td>
    <td>:</td>
    <td><div class="col-lg-5"><textarea name="alamat_tinggal" id="alamat_tinggal" class="form-control">
    <?php echo $ww['alamat_tinggal']; ?></textarea><input type="checkbox" name="x_AndaMhs" id="x_AndaMhs" >Sesuai KTP  (tidak bisa diinput manual) </div></td>
</tr>
<tr>
	<td width=20%>Kodepos</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="search" class='autocomplete1 nama' id="kdpos_tinggal" name="kdpos_tinggal" maxlength="50" size="20" value="<?php echo $ww['kdpos_tinggal']; ?>" /></div</td>
</tr>
<tr>
	<td width=20%>Kelurahan</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete1' name="kelurahan_tinggal"   id="kelurahan_tinggal" size="20" maxlength="50"  value="<?php echo $ww['kelurahan_tinggal']; ?>"/></div></td>
</tr>
<tr>
	<td width=20%>Kecamatan</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete1'  name="kecamatan_tinggal" id="kecamatan_tinggal" size="20" maxlength="50"  value="<?php echo $ww['kecamatan_tinggal']; ?>"/></div></td>
</tr>
<tr>
	<td width=20%>Kotamadya / Kabupaten</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete1'  name="kotamadya_tinggal" id="kotamadya_tinggal" size="20" maxlength="50"  value="<?php echo $ww['kotamadya_tinggal']; ?>"/></div></td>
</tr>
<tr>
	<td width=20%>Propinsi</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete1' name="propinsi_tinggal" id="propinsi_tinggal"  size="20" maxlength="50"  value="<?php echo $ww['propinsi_tinggal']; ?>"/></div></td>
</tr>
<tr>
	<td width=20%>No Telepon Yang Bisa Dihubungi</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="no_tlp" id="no_tlp"  size="20" maxlength="50" value="<?php echo $ww['no_tlp']; ?>" onKeyUp="return checkInput(this);" /></div></td>
</tr>
<tr>
	<td width=20%>No Handphone 1</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="no_hp1" id="no_hp1"  size="20" maxlength="50" value="<?php echo $ww['no_hp1']; ?>" onKeyUp="return checkInput(this);" /></div> No Handphone 2
    : <input type="text" name="no_hp2" id="no_hp2"  size="20" maxlength="50" value="<?php echo $ww['no_hp2']; ?>" onKeyUp="return checkInput(this);" />
</tr>
  </table>
   </form>
<tr></tr><tr></tr> <tr></tr> <tr></tr>
         <tr>	<td colspan="3" align="center">
   <button type="button" name="simpan" id="simpan" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>
         <button type="button" name="kembali" id="kembali" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>
    </td></tr>




       <script>
 	$("#kodem").click(function(){

 	    $('#kode').window('open');
       	$.ajax({
			  	url		: "<?php echo site_url(); ?>/cekduplikasi/viewkdpos",
				cache	: false,
            	success	: function(data){
					$("#kdpos").html(data);
                     $('#kdpos').trigger('reloadGrid');

				}
			});


        	});
  </script>

  <script>
 	$("#kodep").click(function(){

 	    $('#kodes').window('open');
       	$.ajax({
			  	url		: "<?php echo site_url(); ?>/cekduplikasi/viewkdpostinggal",
				cache	: false,
            	success	: function(data){
					$("#kdposm").html(data);
                     $('#kdposm').trigger('reloadGrid');

				}
			});


        	});
  </script>

    <div id="kode" class="easyui-window" title="Basic Dialog" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:600px;height:300px;padding:10px">

     <div id="kdpos"></div>  <!--pagination div-->
</div>
   <div id="kodes" class="easyui-window" title="Basic Dialog" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:600px;height:300px;padding:10px">

     <div id="kdposm"></div>  <!--pagination div-->
</div>

    <?php

    }else{

     ?>
         <table id="dataTable" width="100%">
         <tr></tr><tr></tr>
         <tr>

    <td>
           <input type="hidden" name="thp" id="thp" size="30" maxlength="50" value="<?php echo $tahapantab;?>" /></td>

    <input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $db['no_aplikasi']; ?>" /></td>
</tr>
         <tr>
	<td width=50%><b>Data Pssangan Tidak Muncul karena Status Tidak Nikah silakan pilih Selanjutnya</b></td>


</tr>

<tr><td colspan="3" align="center">
  <br />
  <button type="button" name="lanjut" id="lanjut" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>
        <button type="button" name="kembali" id="kembali" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>
     </td></tr>
  </table>



    <?php
      }

    ?>
