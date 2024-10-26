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

	$("#simpan").click(function(){
		//var rek_induk	= $("#rek_induk").val();
        var no_aplikasi = $("#no_aplikasi").val();
          var jns = $("#jns").val();
        var nm_perusahaan = $("#nm_perusahaan").val();
        var alamat = $("#alamat").val();
        var kdpos_perusahaan = $('#kdpos_perusahaan').val();
        var kelurahan_perusahaan  = $("#kelurahan_perusahaan").val();
	    var kecamatan_perusahaan   = $("#kecamatan_perusahaan").val();
        var kotamadya_perusahaan   = $("#kotamadya_perusahaan").val();
        var propinsi_perusahaan   = $("#propinsi_perusahaan").val();
        var no_tlp   = $("#no_tlp").val();
        var no_ext  = $("#no_ext").val();
        var jabatan  = $("#jabatan").val();
       

	  var string = "no_aplikasi="+no_aplikasi+"&jns="+jns+"&nm_perusahaan="+nm_perusahaan+"&alamat="+alamat+"&kdpos_perusahaan="+kdpos_perusahaan+"&kelurahan_perusahaan="+kelurahan_perusahaan+"&kecamatan_perusahaan="+kecamatan_perusahaan+"&kotamadya_perusahaan="+kotamadya_perusahaan+"&propinsi_perusahaan="+propinsi_perusahaan+"&no_tlp="+no_tlp+"&no_ext="+no_ext+"&jabatan="+jabatan;
         	if(jns==0){
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

			$("#jns").focus();
			return false;
		}
	   	if(nm_perusahaan.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Perusahaan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#nm_perusahaan").focus();
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

        if(kdpos_perusahaan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kode Pos Perusahaan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#kdpos_perusahaan").focus();
			return false;
		}
        if(kelurahan_perusahaan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kelurahan Perusahaan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#kelurahan_perusahaan").focus();
			return false;
		}
         if(kecamatan_perusahaan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kecamatan Perusahaan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#kecamatan_perusahaan").focus();
			return false;
		}
          if(kotamadya_perusahaan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Kotamadya Perusahaan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#kotamadya_perusahaan").focus();
			return false;
		}
         if(propinsi_perusahaan.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Propinsi Perusahaan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#propinsi_perusahaan").focus();
			return false;
		}
          if(no_tlp.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, No Telepon Tidak Boleh Kosong',
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

        if(no_ext.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, No Extension Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#no_ext").focus();
			return false;
		}

        if(jabatan==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Jabatan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#jabatan").focus();
			return false;
		}

        $.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/updatekerjaan",
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

              $('#alamat_tinggal').removeAttr('disabled');
                $('#kdpos_tinggal').removeAttr('disabled');
                 $('#kelurahan_tinggal').removeAttr('disabled');
                $('#kecamatan_tinggal').removeAttr('disabled');
                   $('#propinsi_tinggal').removeAttr('disabled');
              $('#alamat_tinggal').focus();
             $('#kdpos_tinggal').focus();
              $('#kelurahan_tinggal').focus();
              $('#kecamatan_tinggal').focus();
             $('#propinsi_tinggal').focus();
          } else {
            var alamat=$('#alamat').val();
            var alamat_tinggal=$('#alamat_tinggal').val(alamat);
            var kdpos_ktp=$('#kdpos_ktp').val();
            var kdpos_tinggal =$('#kdpos_tinggal').val(kdpos_ktp);
             var kelurahan=$('#kelurahan_ktp').val();
            var kelurahan_tinggal = $('#kelurahan_tinggal').val(kelurahan);
            var kecamatan=$('#kecamatan_ktp').val();
            var kecamatan_tinggal=$('#kecamatan_tinggal').val(kecamatan);
             var propinsi=$('#propinsi_ktp').val();
            var propinsi_tinggal = $('#propinsi_tinggal').val(propinsi);
            alamat_tinggal.attr('readonly','readonly');
            kdpos_tinggal.attr('readonly','readonly');
            kelurahan_tinggal.attr('readonly','readonly');
            kecamatan_tinggal.attr('readonly','readonly');
            propinsi_tinggal.attr('readonly','readonly');


        }
    });
});


</script>

  <script>
   function datatambahanpekerjaan(dat,link,form){
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

        function hapustambahan(id){
	var no_aplikasi = $("#no_aplikasi").val();
	var string = "no_aplikasi="+no_aplikasi+"&id_tambahan="+id;

	var pilih = confirm('Data yang akan dihapus data tambahan = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/hapustambahan",
			data	: string,
			cache	: false,
			success	: function(data){
		     tampil_data('<?php echo $aplikasi; ?>','updatepekerjaan','detail','formpekerjaan','1');
			}
		});
	}
}
    
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
</div></td></tr></table><br>
    <table id="dataTable" class="table table-bordered table-hover table-responsive">
         <tr></tr><tr></tr>
   <tr>
  <th>
  <b>Data Pekerjaan</b>
  </th>

  </tr>
  <tr></tr><tr></tr><tr></tr><tr></tr>
  <tr>
  </tr>
   <tr>

    <td>
       <input type="hidden" name="thp" id="thp" size="30" maxlength="50" value="<?php echo $tahapantab;?>" />
    <input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $db['no_aplikasi']; ?>" /></td>
</tr>

<tr>
	<td width=20%>Jenis Pekerjaan</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="jns" id="jns" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
     <?php foreach($listjnspekerjaan->result() as $m){ ?>
                        <?php if($m->id_jnspekerjaan == $db['jns_pekerjaan']){ ?>
                            <option value="<?php echo $m->id_jnspekerjaan; ?>" selected><?php echo $m->nm_jnspekerjaan; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $m->id_jnspekerjaan; ?>"><?php echo $m->nm_jnspekerjaan; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>
<tr>
	<td width=20%>Nama Perusahaan</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="nm_perusahaan" id="nm_perusahaan" size="30" maxlength="50" onkeyup="displayText()" value="<?php echo $dd['nm_perusahaan']; ?>" /></div></td>
</tr>

<tr>
	<td width=20%>Alamat Perusahaan</td>
    <td>:</td>
    <td><div class="col-lg-5"><textarea name="alamat" id="alamat"  onkeyup="displayText1()">
    <?php echo $dd['alamat_perusahaan']; ?></textarea></div><br /> </td>
</tr>
<tr>

 	<td width=20%>Kodepos</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="search" class='autocomplete nama' id="kdpos_perusahaan" name="kdpos_perusahaan" maxlength="50" size="20" value="<?php echo $dd['kdpos_perusahaan']; ?>" /><button type="button"  class="btn btn-info btn-sm" onclick="datakodepos('<?php echo $db['no_aplikasi'];?>','detail','kdposinperusahaan')"><i class="glyphicon glyphicon-plus"></i>Pilih Kodepos</button></div></td>
</tr>
<tr>
	<td width=20%>Kelurahan</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete' name="kelurahan_perusahaan"   id="kelurahan_perusahaan" size="20" maxlength="50"  value="<?php echo $dd['kelurahan_perusahaan']; ?>"/></div></td>
</tr>
<tr>
	<td width=20%>Kecamatan</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete'  name="kecamatan_perusahaan" id="kecamatan_perusahaan" size="20" maxlength="50"  value="<?php echo $dd['kecamatan_perusahaan']; ?>"/></div></td>
</tr>
<tr>
	<td width=20%>Kotamadya / Kabupaten</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete'  name="kotamadya_perusahaan" id="kotamadya_perusahaan" size="20" maxlength="50"  value="<?php echo $dd['kotamadya_perusahaan']; ?>"/></div></td>
</tr>
<tr>
	<td width=20%>Propinsi</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" class='autocomplete' name="propinsi_perusahaan" id="propinsi_perusahaan"  size="20" maxlength="50"  value="<?php echo $dd['propinsi_perusahaan']; ?>"/></div></td>
</tr>
<tr>
	<td width=20%>Nomor Telepon</td>
    <td>:</td>
    <td><div class="col-lg-5"><input type="text" name="no_tlp" id="no_tlp"  size="20" maxlength="50" value="<?php echo $dd['no_tlpperusahaan']; ?>" onKeyUp="return checkInput(this);" /></div> Ext
    : <input type="text" name="no_ext" id="no_ext"  size="20" maxlength="50" value="<?php echo $dd['no_ext']; ?>" onKeyUp="return checkInput(this);" /></td>
</tr>
<tr>
	<td width=20%>Jabatan</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="jabatan" id="jabatan" class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
     <?php foreach($listjabatan->result() as $w){ ?>
                        <?php if($w->id_jabatan == $dd['jabatan']){ ?>
                            <option value="<?php echo $w->id_jabatan; ?>" selected><?php echo $w->nm_jabatan; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $w->id_jabatan; ?>"><?php echo $w->nm_jabatan; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</table>
       <tr>	<td colspan="3" align="center"><br />
   <button type="button" name="simpan" id="simpan" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>
         <button type="button" name="kembali" id="kembali" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>
   </td></tr>
   
     <br /><br />
	<th>Data Pekerjaan Pemohon (Tambahan)</th><br /><br />



   <button type="button" name="simpan" id="simpan" class="btn btn-info btn-sm" onclick="datatambahanpekerjaan('<?php echo $aplikasi;?>','detail','tambahpekerjaan')"><i class="glyphicon glyphicon-plus"></i>Tambah Data Pekerjaan Tambahan</button>

   <table id="dynamic-table" class="table table-striped table-bordered table-hover table-responsive">
<tr>
	<th>Nama Perusahaan / Nama Usaha</th>
    <th>Alamat Perusahaan / Usaha</th>
    <th>No. Tlp</th>
    <th>No. Ext</th>
    <th>Jabatan</th>
     <th>Aksi</th>
</tr>
<?php
if($listtambahkerja->num_rows() > 0){
	$no=1;
	foreach($listtambahkerja->result() as $nn){

    ?>
    	<tr>
	         <td align="center" width="150" ><?php echo $nn->nm_tambahan; ?></td>
             <td align="center" width="150" ><?php echo $nn->alamat_tambahan; ?></td>
             <td align="center" width="150" ><?php echo $nn->no_tlptambahan; ?></td>
             <td align="center" width="150" ><?php echo $nn->no_exttambahan; ?></td>
               <td align="center" width="150" ><?php echo $nn->jabatan_tambahan; ?></td>
           
           

                             <td width="2" align="center">

             <?php echo "<a href='javascript:hapustambahan(\"{$nn->id_tambahan}\")'>";?>
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


</table> </div>
