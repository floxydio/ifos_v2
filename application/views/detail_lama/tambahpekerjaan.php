<script>
	$("#simpantambahan").click(function(){
		//var rek_induk	= $("#rek_induk").val();
         var no_aplikasi = $("#no_aplikasi").val();
          var id_tambahan = $("#id_tambahan").val();
           var table = "tb_tambahan";

	   var nm_tambahan = $("#nm_tambahan").val();

        var alamat_tambahan = $("#alamat_tambahan").val();
        var no_tlptambahan = $("#no_tlptambahan").val();
        var no_exttambahan = $("#no_exttambahan").val();
        var jabatan_tambahan = $('#jabatan_tambahan').val();


	  	var string = "no_aplikasi="+no_aplikasi+"&nm_tambahan="+nm_tambahan+"&alamat_tambahan="+alamat_tambahan+"&no_tlptambahan="+no_tlptambahan+"&no_exttambahan="+no_exttambahan+"&jabatan_tambahan="+jabatan_tambahan;

	   	if(nm_tambahan.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Nama  Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#nm_tambahan").focus();
			return false;
		}


       	if(alamat_tambahan.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, alamat Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#alamat_tambahan").focus();
			return false;
		}
       	if(no_tlptambahan.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Telepon Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#no_tlptambahan").focus();
			return false;
		}

        	if(no_exttambahan.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Extension Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#no_exttambahan").focus();
			return false;
		}

       	if(jabatan_tambahan.length==0){
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

			$("#jabatan_tambahan").focus();
			return false;
		}

        $.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/updatetambahan/tb_tambahan/id_tambahan",
			data	: string,
			cache	: false,
             beforeSend: function(){
                                  },
			success	: function(data){
             tampil_data('<?php echo $aplikasi; ?>','updatepekerjaan','detail','formpekerjaan','1');
              $('#datatambahan').dialog('close');
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



	$("#kembalifasilitas").click(function(){
      $("#ssb").hide();
	});
</script>
 <table  width="80%">
   <tr>
   <th> Tambah Data Tambahan Pekerjaan
   </th>
   </tr>
    <tr>

    <td><input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $aplikasi; ?>" /></td></tr>
      <tr>

    <td><input type="hidden" name="id_tambahan" id="id_tambahan" size="30" maxlength="50" /></td></tr>
<tr>
	<td width=20%>Nama Perusahaan / Usaha</td>
    <td>:</td>
    <td><input type="text" name="nm_tambahan" id="nm_tambahan" size="30" maxlength="50"/></td>
</tr>

<tr>
	<td>Alamat Perusahaan / Usaha</td>
    <td>:</td>
    <td><textarea name="alamat_tambahan" id="alamat_tambahan" >
   </textarea>

</td>
</tr>
<tr>
	<td>No telepon</td>
    <td>:</td>
    <td><input type="text" name="no_tlptambahan" id="no_tlptambahan"   size="20" maxlength="50" />

</td>
</tr>
<tr>
	<td>No ext</td>
    <td>:</td>
    <td><input type="text" name="no_exttambahan" id="no_exttambahan"   size="20" maxlength="50" />

</td>
</tr>
<tr>
	<td width=20%>Jabatan</td>
    <td>:</td>
    <td><input type="text" name="jabatan_tambahan" id="jabatan_tambahan"   size="20" maxlength="50" /></td>

</tr>

         <tr>	<td colspan="3" align="center">
  <input type="submit" name="submit" id="simpantambahan" value="save">
   </td></tr>
</table>

