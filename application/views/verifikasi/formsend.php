<script>

	$("#simpantambahan").click(function(){
		//var rek_induk	= $("#rek_induk").val();
         var no_aplikasi = $("#no_aplikasi").val();
          var user = $("#user").val();
      	var string = "no_aplikasi="+no_aplikasi+"&user="+user;

	   	if(user==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, PIC Verifikasi  Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#user").focus();
			return false;
		}
        $.ajax({
			type	: 'POST',
		  	url		: "<?php echo site_url(); ?>detail/updatesend",

			data	: string,
			cache	: false,
             beforeSend: function(){
                                  },
			success	: function(data){
            	window.location.assign('<?php echo base_url();?>detail');
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
	});



	$("#kembalifasilitas").click(function(){
      $("#ssb").hide();
	});
</script>
 <table  width="80%" class="table table-striped table-bordered table-hover">
   <tr>
   <th> Tambah Data Tambahan Pekerjaan
   </th>
   </tr>

    <tr>
	<td width=20%>PIC Verifikasi</td>
    <td>:</td>
    <td><select name="user" id="user"  class="js-example-basic-single js-states form-control">
    <option value="0">-Pilih-</option>
       <?php foreach($listname->result() as $ff){ ?>
                           <option value="<?php echo $ff->username; ?>" ><?php echo $ff->username; ?></option>

                    <?php } ?>
    </select><input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $aplikasi; ?>" /></td>
</tr>



         <tr>	<td colspan="3" align="center">
  <input type="submit" name="submit" id="simpantambahan" value="save">
   </td></tr>
</table>

