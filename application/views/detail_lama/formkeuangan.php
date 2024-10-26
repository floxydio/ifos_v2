 <script>
 $(document).ready(function(){

  $(".js-example-basic-single").select2({
  placeholder: "Select Data"
});

 if ($("#jenisp").val() == "tetap") {
       $('#bebas').show();
        $('#ok').hide();
         kalkulatorTambahData();
         kalkulator();
           } else {
          $('#ok').show();
        $('#bebas').hide();
         kalkulatorTambahData();
         kalkulator();
         }
          if ($("#x_AndaMhs").val() == "join") {

    } else {

        var peng_utamapasangan = $('#peng_utamapasangan').val('0');
        peng_utamapasangan.attr('disabled','disabled');
         var peng_tambahanpasangan = $('#peng_tambahanpasangan').val('0');
        peng_tambahanpasangan.attr('disabled','disabled');
         var peng_utamapasangan2 = $('#peng_utamapasangan2').val('0');
        peng_utamapasangan2.attr('disabled','disabled');
         var peng_tambahanpasangan2 = $('#peng_tambahanpasangan2').val('0');
        peng_tambahanpasangan2.attr('disabled','disabled');
    }

  $("#jenisp").change(function(){
       if ($("#jenisp").val() =="tetap") {
         $('#bebas').show();
          $("#gaji_bulan").val('');
        $("#peng_tambahan").val('');

        $('#ok').hide();
         kalkulatorTambahData();
         kalkulator();
           } else {
          $('#ok').show();
        $('#bebas').hide();
          $("#penjualan_bulan").val('');
        $("#hpp").val('');
        $("#total_biaya").val('');
         $("#penghasilan_bersih").val('');
         $("#peng_tambahan2").val('');
         kalkulatorTambahData();
         kalkulator();
         }
    });

     $("#x_AndaMhs").change(function() {
        if ($("#x_AndaMhs").val() == "join") {

         $("#gaji_bulan").val('');
        $("#peng_tambahan").val('');
          $("#penjualan_bulan").val('');
        $("#hpp").val('');
        $("#total_biaya").val('');
         $("#penghasilan_bersih").val('');
         $("#peng_tambahan2").val('');
       var peng_utamapasangan= $('#peng_utamapasangan').val('');
       peng_utamapasangan.removeAttr('disabled');
       var peng_tambahanpasangan= $('#peng_tambahanpasangan').val('');
       peng_tambahanpasangan.removeAttr('disabled');
        var peng_tambahanpasangan2= $('#peng_tambahanpasangan2').val('');
       peng_tambahanpasangan2.removeAttr('disabled');
       var peng_utamapasangan2= $('#peng_utamapasangan2').val('');
       peng_utamapasangan2.removeAttr('disabled');

        $('#peng_tambahanpasangan2').val('');
    } else {
          $("#penjualan_bulan").val('');
        $("#hpp").val('');
        $("#total_biaya").val('');
         $("#penghasilan_bersih").val('');
         $("#peng_tambahan2").val('');
        var peng_utamapasangan = $('#peng_utamapasangan').val('0');
        peng_utamapasangan.attr('disabled','disabled');
         var peng_tambahanpasangan = $('#peng_tambahanpasangan').val('0');
        peng_tambahanpasangan.attr('disabled','disabled');
         var peng_utamapasangan2 = $('#peng_utamapasangan2').val('0');
        peng_utamapasangan2.attr('disabled','disabled');
         var peng_tambahanpasangan2 = $('#peng_tambahanpasangan2').val('0');
        peng_tambahanpasangan2.attr('disabled','disabled');
    }
    });
    	$("#simpannontetap").click(function(){
    	//var rek_induk	= $("#rek_induk").val();

        var no_aplikasi = $("#no_aplikasi").val();
        var penjualan_bulan = $("#penjualan_bulan").val();
         var hpp = $("#hpp").val();
          var total_biaya = $("#total_biaya").val();

              var penghasilan_bersih = $("#penghasilan_bersih").val();
        var x_AndaMhs = $("#x_AndaMhs").val();
         var x_Jenis = $("#jenisp").val();

        var peng_tambahan2 = $("#peng_tambahan2").val();
        var peng_utamapasangan2 = $("#peng_utamapasangan2").val();
        var peng_tambahanpasangan2 = $("#peng_tambahanpasangan2").val();
        var total_penghasilan2 = $('#total_penghasilan2').val();


	  var string = "&penjualan_bulan="+penjualan_bulan+"&hpp="+hpp+"&total_biaya="+total_biaya+"&penghasilan_bersih="+penghasilan_bersih+"&x_AndaMhs="+x_AndaMhs+"&x_Jenis="+x_Jenis+"&no_aplikasi="+no_aplikasi+"&peng_tambahan2="+peng_tambahan2+"&peng_utamapasangan2="+peng_utamapasangan2+"&peng_tambahanpasangan2="+peng_tambahanpasangan2+"&total_penghasilan2="+total_penghasilan2;

	   	if(penjualan_bulan.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Penjualan Perbulan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#penjualan_bulan").focus();
			return false;
		}

        	if(hpp.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Nama HPP Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#hpp").focus();
			return false;
		}

        	if(total_biaya.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Nama HPP Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#total_biaya").focus();
			return false;
		}
        	if(penghasilan_bersih.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Nama HPP Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#penghasilan_bersih").focus();
			return false;
		}
       	if(peng_tambahan2.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Penghasilan Tambahan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#peng_tambahan2").focus();
			return false;
		}

        	if(x_AndaMhs=="join"){
         	  	if(peng_utamapasangan2.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Penghasilan Utama Pasangan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#peng_utamapasangan2").focus();
			return false;
	     	}

            	if(peng_tambahanpasangan2.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Penghasilan Tambahan Pasangan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#peng_tambahanpasangan2").focus();
			return false;
	     	}

		}

       	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/updatekeu2",
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
    	$("#simpan").click(function(){
		//var rek_induk	= $("#rek_induk").val();

        var no_aplikasi = $("#no_aplikasi").val();
        var gaji_bulan = $("#gaji_bulan").val();
        var x_AndaMhs = $("#x_AndaMhs").val();
         var x_Jenis = $("#jenisp").val();

        var peng_tambahan = $("#peng_tambahan").val();
        var peng_utamapasangan = $("#peng_utamapasangan").val();
        var peng_tambahanpasangan = $("#peng_tambahanpasangan").val();
        var total_penghasilan = $('#total_penghasilan').val();


	  var string = "&gaji_bulan="+gaji_bulan+"&x_AndaMhs="+x_AndaMhs+"&x_Jenis="+x_Jenis+"&no_aplikasi="+no_aplikasi+"&peng_tambahan="+peng_tambahan+"&peng_utamapasangan="+peng_utamapasangan+"&peng_tambahanpasangan="+peng_tambahanpasangan+"&total_penghasilan="+total_penghasilan;

	   	if(gaji_bulan.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Gaji Perbulan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#gaji_bulan").focus();
			return false;
		}
       	if(peng_tambahan.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Penghasilan Tambahan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#peng_tambahan").focus();
			return false;
		}

         	if(x_AndaMhs=="join"){
         	  	if(peng_utamapasangan.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Penghasilan Utama Pasangan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#peng_utamapasangan").focus();
			return false;
	     	}

            	if(peng_tambahanpasangan.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Penghasilan Tambahan Pasangan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#peng_tambahanpasangan").focus();
			return false;
	     	}

		}

       	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/updatekeu",
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
      $("#kembalinontetap").click(function(){
           var thp = $("#thp").val();
		window.location.assign('<?php echo base_url();?>'+thp);
	});
  });
 </script>

 <script>
   $(document).ready(function() {
  var textbox = '#ThousandSeperator_commas';
  var hidden = '#ThousandSeperator_num';
  $("#gaji_bulan").keyup(function () {
  var num = $("#gaji_bulan").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#gaji_bulan").val(numCommas);
  });
  $("#peng_tambahan").keyup(function () {
  var num = $("#peng_tambahan").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#peng_tambahan").val(numCommas);
  });

  $("#peng_utamapasangan").keyup(function () {
  var num = $("#peng_utamapasangan").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#peng_utamapasangan").val(numCommas);
  });

  $("#peng_tambahanpasangan").keyup(function () {
  var num = $("#peng_tambahanpasangan").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#peng_tambahanpasangan").val(numCommas);
  });

   $("#penjualan_bulan").keyup(function () {
  var num = $("#penjualan_bulan").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#penjualan_bulan").val(numCommas);
  });

    $("#hpp").keyup(function () {
  var num = $("#hpp").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#hpp").val(numCommas);
  });
    $("#total_biaya").keyup(function () {
  var num = $("#total_biaya").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#total_biaya").val(numCommas);
  });
     $("#penghasilan_bersih").keyup(function () {
  var num = $("#penghasilan_bersih").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#penghasilan_bersih").val(numCommas);
  });
  $("#peng_tambahan2").keyup(function () {
  var num = $("#peng_tambahan2").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#peng_tambahan2").val(numCommas);
  });

  $("#peng_utamapasangan2").keyup(function () {
  var num = $("#peng_utamapasangan2").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#peng_utamapasangan2").val(numCommas);
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
</div></td></tr></table><br />
          <table id="data" class="table table-bordered table-hover table-responsive">
         <tr></tr><tr></tr>
  <tr>
  <th>
 <b>Data Keuangan</b>
  </th>

  </tr>
  <tr></tr><tr></tr><tr></tr><tr></tr>
  <tr>
  </tr>
  <tr>
	<td width="10%">Sumber Penghasilan</td>
    <td width="5">:</td>
    <td><div class="col-lg-5">
    <select name="x_AndaMhs" id="x_AndaMhs" class="js-example-basic-single js-states form-control">
     <?php if($db['s_penghasilan']=="single"){  
         $a="selected=selected";
     ?>
     <option value="single" <?php echo $a;?>>Single Income</option>
     <option value="join">Join Income</option>
     <?php
     }
     if($db['s_penghasilan']=="join"){  
         $b="selected=selected";
     ?>
      <option value="single">Single Income</option>
     <option value="join" <?php echo $b;?>>Join Income</option>
     <?php
      }
     ?>
    </select></div>
    </td>
</tr>
     <tr>
	<td width="10%">Jenis Penghasilan</td>
    <td width="5">:</td>
    <td><div class="col-lg-5">
     <select name="jenisp" id="jenisp" class="js-example-basic-single js-states form-control">
     <?php if($db['jenisp']=="tetap"){  
         $a="selected=selected";
     ?>
     <option value="tetap" <?php echo $a;?>>Penghasilan Tetap</option>
     <option value="nontetap">Penghasilan Tidak Tetap</option>
     <?php
     }
     if($db['jenisp']=="nontetap"){  
         $b="selected=selected";
     ?>
    <option value="nontetap" <?php echo $b;?>>Penghasilan Non Tetap</option>
    <option value="tetap">Penghasilan Tetap</option>
      <?php
      }
     ?>
    </select>
    </div></td>
</tr>
  </table><br />
    <div id="bebas"> <table id="data" width="100%">
         <tr></tr>

  <tr>

    <td>
       <input type="hidden" name="thp" id="thp" size="30" maxlength="50" value="<?php echo $tahapantab;?>" />
    <input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $db['no_aplikasi']; ?>" /></td>
</tr>
<script>




</script>
<tr>
	<td width="20%">Gaji setiap Bulan</td>
    <td width="20">:</td>
    <td> <div class="col-lg-5">
<input type="text" name="gaji_bulan" id="gaji_bulan" onKeyUp="kalkulatorTambahData();"  value="<?php echo $ww['gaji_bulan']; ?>" /></div></td></tr>
<tr>
	<td width="10%">Penghasilan Tambahan Pemohon</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="peng_tambahan" id="peng_tambahan" onKeyUp="kalkulatorTambahData();" value="<?php echo $ww['peng_tambahan']; ?>" />

</div></td></tr>

<tr>
	<td width="10%">Penghasilan Utama Pasangan</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="peng_utamapasangan" id="peng_utamapasangan" onKeyUp="kalkulatorTambahData();"  value="<?php echo $ww['peng_utamapasangan']; ?>" />

</div></td></tr>
<tr>
	<td width="10%">Penghasilan Tambahan Pasangan</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="peng_tambahanpasangan" id="peng_tambahanpasangan" onKeyUp="kalkulatorTambahData();" value="<?php echo $ww['peng_tambahanpasangan']; ?>"/>

</div></td></tr>

<tr>
	<td width="10%">Total Penghasilan</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">

<input type="text" name="total_penghasilan" id="total_penghasilan" size="20" style=background-color:grey value="<?php echo $ww['total_penghasilan']; ?>" readonly></div></td></tr>


<tr></tr><tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr>
         <tr>	<td colspan="3" align="center">
   <button type="button" name="simpan" id="simpan" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>
         <button type="button" name="kembali" id="kembali" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>
   </td></tr>




  </table>
</div>
      <div id="ok">    <table id="data" width="100%">
         <tr></tr><tr></tr>
  <tr>

    <td>   <input type="hidden" name="thp" id="thp" size="30" maxlength="50" value="<?php echo $tahapantab;?>" />
    <input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $db['no_aplikasi']; ?>" /></td>
</tr>
<tr>
	<td width="20%">Penjualan setiap Bulan</td>
    <td width="5">:</td>
    <td> <div class="col-lg-5">
<input type="text" name="penjualan_bulan" id="penjualan_bulan" onKeyUp="kalkulator();" value="<?php echo $nn['penjualan_bulan']; ?>" /></div></td></tr>
<tr>
	<td width="10%">HPP</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="hpp" id="hpp" onKeyUp="kalkulator();" value="<?php echo $nn['hpp']; ?>" />

</div></td></tr>
 <tr>
	<td width="10%">Total Biaya Operasional Usaha Perbulan</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="total_biaya" id="total_biaya" onKeyUp="kalkulator();" value="<?php echo $nn['total_biaya']; ?>" />

</div></td></tr>
<tr>
	<td width="10%">Penghasilan Bersih Usaha Pemohon</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="penghasilan_bersih" id="penghasilan_bersih" onKeyUp="kalkulator();" style=background-color:grey value="<?php echo $nn['penghasilan_bersih']; ?>"  />

</div></td></tr>
<tr>
	<td width="10%">Penghasilan Tambahan Pemohon</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="peng_tambahan2" id="peng_tambahan2" onKeyUp="kalkulator();" value="<?php echo $nn['peng_tambahan2']; ?>" />

</div></td></tr>
<tr>
	<td width="10%">Penghasilan Utama Pasangan</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="peng_utamapasangan2" id="peng_utamapasangan2" onKeyUp="kalkulator();" value="<?php echo $nn['peng_utamapasangan2']; ?>" />

</div></td></tr>
<tr>
	<td width="10%">Penghasilan Tambahan Pasangan</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="peng_tambahanpasangan2" id="peng_tambahanpasangan2" onKeyUp="kalkulator();" value="<?php echo $nn['peng_tambahanpasangan2']; ?>" />

</div></td></tr>
<tr>
	<td width="10%">Total Penghasilan Bersih</td>

    <td width="5">:</td>
    <td> <div class="col-lg-5">

<input type="text" name="total_penghasilan2" id="total_penghasilan2" size="20" style=background-color:grey value="<?php echo $nn['total_penghasilan2']; ?>" readonly></div></td></tr>

<script>

</script>

<tr></tr><tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr>
         <tr>	<td colspan="3" align="center">
   <button type="button" name="simpannontetap" id="simpannontetap" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>
         <button type="button" name="kembalinontetap" id="kembalinontetap" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>
   </td></tr>



  </table></div>