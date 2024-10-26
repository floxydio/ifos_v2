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

         var userfile  = $("#userfile").val();
         var title  = $("#title").val();


	   //	var string = "kd_cabang="+kd_cabang+"&nm_cabang="+nm_cabang;
       	var string = "no_aplikasi="+no_aplikasi+"&userfile="+userfile+"&title="+title;

        if(title==0){
		    	$.messager.show({
				title:'Warning',
				msg:'Maaf, Title Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#title").focus();
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
		    url: "<?php echo site_url(); ?>upload/do_upload",
                type: 'POST',
                data: formData,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
        	success	: function(msg){
                 tampil_data('<?php echo $aplikasi; ?>','updatedokumen','verifikasi','formdokumen','2');
                  $("#mymodal").modal("hide"); 
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

    <input type="hidden" name="no_aplikasi" id="no_aplikasi"  value="<?php echo $aplikasi; ?>" size="12" maxlength="12"  />
          <tr>
	<td width=20%>Nama Agunan</td>
    <td>:</td>
    <td><select name="title" id="title">
    <option value="0">-Pilih-</option>
     <?php foreach($listtitle->result() as $gg){ ?>

                            <option value="<?php echo $gg->nm_title; ?>"><?php echo $gg->nm_title; ?></option>

                    <?php } ?>
      </select></td>

</tr>
<br />

        <input type="file" name="userfile" id="userfile" size="20" />
        <br />
              <button type="button" onclick="submitFile();" name="simpan" id="simpan" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>

  </form>


