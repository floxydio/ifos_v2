  <script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});
     	$("#viewmemo").show();
		$("#list").hide();

	$("#tambah").click(function(){
		$("#viewmemo").show();
		$("#list").show();
        kosong();
	   	});

	function kosong(){
		$("#nm_memo").val('');

	}


	$("#simpan").click(function(){
         var nm_memo  = tinymce.get('nm_memo').getContent();
         var no_aplikasi  = $("#no_aplikasi").val();
	   //	var string = "kd_cabang="+kd_cabang+"&nm_cabang="+nm_cabang;
       	var string = "no_aplikasi="+no_aplikasi+"&nm_memo="+nm_memo;


		if(nm_memo.length==0){
				$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Memo Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#nm_memo").focus();
			return false;
		}

        	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>detail/simpanmemo",
			data	: string,
			cache	: false,
			success	: function(data){
		    tampil_data('<?php echo $aplikasi; ?>','updatememo','sp3','memo','<?php echo $leveltab;?>');
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
			url		: "<?php echo site_url(); ?>/detail/updatesend",
            data	: string,
			cache	: false,
			success	: function(data){
			 	window.location.assign('<?php echo base_url();?>index.php/detail');
			}
		});
	});

	$("#kembali").click(function(){
          	$("#viewmemo").show();
		$("#list").hide();

    	});
});


</script>




<script>
function printContent(el){

var restorepage=document.body.innerHTML;
var printcontent =document.getElementById(el).innerHTML;
document.body.innerHTML = printcontent;
window.print();
document.body.innerHTML = restorepage;

}
</script>

 <script>


function checkInput(obj)
{
    var pola = "^";
    pola += "[0-9]*";
    pola += "$";
    rx = new RegExp(pola);

    if (!obj.value.match(rx))
    {
        if (obj.lastMatched)
        {
            obj.value = obj.lastMatched;
        }
        else
        {
            obj.value = "";
        }
    }
    else
    {
        obj.lastMatched = obj.value;
    }
}</script>

  <script>tinymce.init({ selector:'textarea',width: 600,
  height:400 });</script>

</script >


<body>

<div class="btn-group-center">
<?php
  $no=0;
  foreach($listtabsheader->result_array() as $jk){

   if (($no % 9) == 0){echo "<br>";}
?>
 <a href="javascript:tampil_data('<?php echo $aplikasi;?>','<?php echo $jk['kontrol'];?>','<?php echo $jk['link'];?>','<?php echo $jk['form'];?>','<?php echo $jk['level_tab'];?>')" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-<?php echo $jk['icon'];?>"></i> <?php echo $jk['nm_tab'];?> </a>


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
 </div>

<br />

<?php

		foreach($list->result_array() as $db){
		?>

   <table>
   <tr>
      <td align="center" width="12%">




   </td>
   </tr>
  </table><br />


  <br />

<div style="float:left; padding-bottom:5px;">
  <button type="button" name="tambah" id="tambah" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-save"></i> Tambah Memo</button>



</div>
 <div id="viewmemo">
<div id="printall">

   <h2 align="center">Memo</h2>
 <br>
<table id="dataTable" class="table table-sm">
<tr>
	<th>No</th>
    <th>Nama </th>
    <th>Jabatan</th>
    <th>Tanggal</th>
    <th>Isi</th>
</tr>
<?php
	if($listmemo->num_rows()>0){
		$no =1;
	foreach($listmemo->result_array() as $mm){
			?>
        <tr>
			<td ><?php echo $no; ?></td>
            <td><?php echo $mm['nm_memo']; ?></td>
             <td ><?php echo $mm['jabatan']; ?></td>
            <td ><?php echo $mm['tgl_memo']; ?></td>
            <td ><?php echo $mm['isi_memo']; ?></td>


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
</div>
<br>
<table><tr>
  <td> <button type="button" name="tambah" id="tambah" class="btn btn-primary btn-sm" onclick="printContent('printall')"><i class="glyphicon glyphicon-print"></i> Print</button>

  </td></tr></table>

</div>

<div id="list">
<fieldset class="atas">

 <table id="data" width="100%">
  <tr></tr><tr></tr><tr></tr><tr></tr>
  <tr>
  </tr>
   <tr>

    <td> <input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $db['no_aplikasi']; ?>" /></td>
</tr>
 <tr>
    <td align="center">
<textarea name="nm_memo" id="nm_memo"></textarea>

</td></tr>




<tr></tr><tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr>
         <tr>	<td colspan="3" align="center">
  <button type="button" name="simpan" id="simpan" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-save"></i> Simpan</button>
         <button type="button" name="kembali" id="kembali" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>


    </td></tr>



  </table>

</fieldset>
</div>

 <?php

    }
    ?>

</body>
