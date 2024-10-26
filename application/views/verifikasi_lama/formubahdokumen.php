 <?php foreach($listubahdokumen->result_array() as $gg){ ?>
 <script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});

	$("#kembali").click(function(){
		window.location.assign('<?php echo base_url();?>index.php/cekdokumen');
	});
});


   	function submitFile(){


        var no_aplikasi = $("#no_aplikasi").val();

         var ada  = $("#ada").val();
         var ket  = $("#ket").val();
          var userfile  = $("#userfile").val();


	   //	var string = "kd_cabang="+kd_cabang+"&nm_cabang="+nm_cabang;
       	var string = "no_aplikasi="+no_aplikasi+"&userfile="+userfile+"&ada="+ada+"&ket="+ket;

        if(ada.length==0){
		    	$.messager.show({
				title:'Warning',
				msg:'Maaf, Pilihan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#ada").focus();
			return false;
		}

          if(ket.length==0){
		    	$.messager.show({
				title:'Warning',
				msg:'Maaf, Keterangan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#ket").focus();
			return false;
		}

		if(userfile.length==0){
		    	$.messager.show({
				title:'Warning',
				msg:'Maaf, Gambar Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#userfile").focus();
			return false;


    //check whether browser fully supports all File API

        //get the file size and file type from file input field

		} else {
		  var ekstensi = ['jpg','png','gif','jpeg','JPG','pdf','JPEG'];
           var ambilekstensi = userfile.split('.');  //Ambil Ekstensi
       ambilekstensi = ambilekstensi.reverse();
       if ( $.inArray ( ambilekstensi[0].toLowerCase(), ekstensi ) > -1 ){
           //jika cocok return true

    //check whether browser fully supports all File API
           //get the file size and file type from file input field
        var fsize = $('#userfile')[0].files[0].fileSize;

        if(fsize>1) //do something if file size more than 1 mb (1048576)
          {
          	$.messager.show({
				title:'Warning',
				msg:'Maaf, Size Gambar Terlalu Besar',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});
             return false;
          }

        }
   else {
        $.messager.show({
				title:'Warning',
				msg:'Maaf, Gambar harus JPG dan PDF',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});
            	$("#userfile").focus();
			return false; //Alert jika ekstensi tidak cocok
        }
		}

          var formData = new FormData($('.myForm')[0]);

        	$.ajax({
		    url: "<?php echo site_url(); ?>upload/do_uploaddok1",
                type: 'POST',
                data: formData,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
        	success	: function(msg){
                 tampil_data('<?php echo $gg['no_aplikasi']; ?>','updatedokumen','verifikasi','formdokumen','1');
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

      }


 </script>

<form method="POST" class="myForm" enctype="multipart/form-data">
  <input type="hidden" name="no_aplikasi" id="no_aplikasi"  value="<?php echo $gg['id']; ?>" size="12" maxlength="12"/>

      <table id="dataTable" width="80%">
 <tr>
	<td width=20%>Nama Dokumen</td>
    <td>:</td>
    <td><input type="hidden" name="id_dok" id="id_dok" size="30" maxlength="50"><input type="text" name="nm_dok" id="nm_dok" value="<?php echo $gg['nm_dokumen']; ?>" size="30" maxlength="50" disabled/></td>
</tr>
<tr>

	<td>Nama FIle</td>
    <td>:</td>
    <td><input type="text" name="file_gambar" id="file_gambar" value="<?php echo $gg['namaFile']; ?>"   size="20" maxlength="50" disabled/>

</td>
</tr>
<tr>
	<td>Update Gambar</td>
    <td>:</td>
    <td><font color=red>Maksimal Ukuran 300 KB</font><br /><font color=red>Gambar diupload harus pdf dan jpg</font><br /><input type="file" name="userfile" id="userfile" size="20" />

</td>
</tr>
<tr>
	<td width="10%">Pilihan</td>
    <td width="5">:</td>
    <td>
     <select name="ada" id="ada">
      <option value="0">-Pilih-</option>
     <option value="ada">Ada</option>
     <option value="tidak ada">Tidak Ada</option>

    </select>
    </td>
</tr>
<tr>
	<td>Keterangan</td>
    <td>:</td>
    <td><textarea id="ket" name="ket"><?php echo $gg['ket']; ?></textarea>

</td>
</tr>
 <tr>
 <td>  <button type="button" onclick="submitFile();" name="simpan" id="simpan" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button></td>
 </tr>
  </table>
  </form>
    <?php } ?>