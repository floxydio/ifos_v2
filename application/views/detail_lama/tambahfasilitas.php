<script>
	$("#simpanfasilitas").click(function(){
		//var rek_induk	= $("#rek_induk").val();
         var no_aplikasi = $("#no_aplikasi").val();
          var id_fasilitas = $("#id_fasilitas").val();
           var table = "tb_fasilitas";

	   var nm_pembiayaan = $("#nm_pembiayaan").val();

        var margin_pa = $("#margin_pa").val();
        var angsuran_bulan = $("#angsuran_bulan").val();
        var jw_bulan = $("#jw_bulan").val();
        var sisa_os = $('#sisa_os').val();


	  	var string = "no_aplikasi="+no_aplikasi+"&nm_pembiayaan="+nm_pembiayaan+"&margin_pa="+margin_pa+"&angsuran_bulan="+angsuran_bulan+"&jw_bulan="+jw_bulan+"&sisa_os="+sisa_os;

	   	if(nm_pembiayaan.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Pembiayaan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#nm_pembiayaan").focus();
			return false;
		}


       	if(margin_pa.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, margin Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#margin_pa").focus();
			return false;
		}
       	if(angsuran_bulan.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Angsuran Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#angsuran_bulan").focus();
			return false;
		}

        	if(jw_bulan.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Jangka Waktu Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#jw_bulan").focus();
			return false;
		}

       	if(sisa_os.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Sisa OS Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#sisa_os").focus();
			return false;
		}

        $.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/updatefasilitas/tb_fasilitas/id_fasilitas",
			data	: string,
			cache	: false,
             beforeSend: function(){
                                  },
			success	: function(data){
             tampil_data('<?php echo $aplikasi; ?>','updatepembiayaan','detail','formpembiayaan','1');
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
 <table  width="80%">
   <tr>
   <th> Tambah Fasilitas
   </th>
   </tr>
    <tr>

    <td><input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $aplikasi; ?>" /></td></tr>
      <tr>

    <td><input type="hidden" name="id_fasilitas" id="id_fasilitas" size="30" maxlength="50" /></td></tr>
<tr>
	<td width=20%>Nilai Pembiayaan</td>
    <td>:</td>
    <td><input type="text" name="nm_pembiayaan" id="nm_pembiayaan" size="30" maxlength="50" onKeyUp="return checkInput(this);"/></td>
</tr>

<tr>
	<td>Margin (%p.a)</td>
    <td>:</td>
    <td><input type="text" name="margin_pa" id="margin_pa"   size="20" maxlength="50" onKeyUp="return checkInput(this);"/>

</td>
</tr>
<tr>
	<td>Angsuran Per Bulan</td>
    <td>:</td>
    <td><input type="text" name="angsuran_bulan" id="angsuran_bulan" onKeyUp="price();"   size="20" maxlength="50"  />

</td>
</tr>
<tr>
	<td>Jangka Waktu</td>
    <td>:</td>
    <td><input type="text" name="jw_bulan" id="jw_bulan"   size="6" maxlength="50"  onKeyUp="return checkInput(this);"/>bulan

</td>
</tr>
<tr>
	<td>Sisa OS</td>
    <td>:</td>
    <td><input type="text" name="sisa_os" id="sisa_os"   size="20" maxlength="50"  />

</td>
</tr>
         <tr>	<td colspan="3" align="center">
  <input type="submit" name="submit" id="simpanfasilitas" value="save">
   </td></tr>
</table>

 <script>
    $(document).ready(function() {
  var textbox = '#ThousandSeperator_commas';
  var hidden = '#ThousandSeperator_num';
  $("#angsuran_bulan").keyup(function () {
  var num = $("#angsuran_bulan").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#angsuran_bulan").val(numCommas);
  });
   $("#nm_pembiayaan").keyup(function () {
  var num = $("#nm_pembiayaan").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#nm_pembiayaan").val(numCommas);
  });
  $("#sisa_os").keyup(function () {
  var num = $("#sisa_os").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#sisa_os").val(numCommas);
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