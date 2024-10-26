 <script type="text/javascript">
$(document).ready(function(){



                     $(".js-example-basic-single").select2({
  placeholder: "Select Data"
});



    $("#kembali").click(function(){
           var thp = $("#thp").val();
		window.location.assign('<?php echo base_url();?>'+thp);
	});

});

</script>


<div class="btn-group-center">
<?
  $no=0;
  foreach($listtabsheader->result_array() as $jk){

   if (($no % 9) == 0){echo "<br>";}
?>
 <a href="javascript:tampil_data('<?php echo $aplikasi;?>','<?php echo $jk['kontrol'];?>','<?php echo $jk['link'];?>','<?php echo $jk['form'];?>','<?php echo $jk['level_tab'];?>')" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-<?php echo $jk['icon'];?>"></i> <?php echo $jk['nm_tab'];?> </a>


 <?
  $no++;
   }


?>

<?
  $no=0;
  foreach($listtabs->result_array() as $jk){

   if (($no % 9) == 0){echo "<br>";}
?>
 <a href="javascript:tampil_data('<?php echo $aplikasi;?>','<?php echo $jk['kontrol'];?>','<?php echo $jk['link'];?>','<?php echo $jk['form'];?>','<?php echo $jk['level_tab'];?>')" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-<?php echo $jk['icon'];?>"></i> <?php echo $jk['nm_tab'];?> </a>


 <?
  $no++;
   }

    $cabang = $this->app_model->CariCabang($db['kd_cabang']);
?>
 </div>
<br /><br />
<table class="table table-bordered">
 <tr><td>
<?php

		foreach($list->result_array() as $db){
		?>

   </td></tr></table>

  <form action="<?php echo site_url('upload/proses_upload');?>" method="POST" enctype="multipart/form-data">
  <table class="table table-responsive">
  <tr>
  <th>
  <b>Data Dokumen</b>
  </th>

  </tr>
<tr>
 <td>
    <input type="hidden" name="no_aplikasi" id="no_aplikasi"  value="<?php echo $db['no_aplikasi']; ?>" size="12" maxlength="12"  /></td>
</tr>

<tr>

   <th width="4%">No.</th>
   <th width="25%">Dokumen</th>
   <th width="5%">Pilihan</th>
   <th  width="25%">Upload</th>
   <th width="25%">Keterangan</th>
   <th width="25%">Aksi</th>


</tr>
<tr>
  <th></th><th>Data Pribadi</th> <th></th> <th></th> <th></th> <th></th>
</tr>
<?php
   	$no =1;
		foreach($listdata->result_array() as $ww){
		?>
        <tr>
 <td>
    <input type="hidden" name="dokumen[]"  size="12" maxlength="12" value="<?php echo $ww['id_dokumen']; ?>" /></td>
</tr>
    	<tr>
       	<td align="center"><?php echo $no; ?></td>
            <td><?php echo $ww['nm_dokumen']; ?></td>
            <td><?php echo $ww['ada']; ?></td> </td>
     <td><font color=red>Klik Gambar Dokumen untuk download</font><br /><a href="<?php echo base_url();?>upload/<?php echo $ww['namaFile']; ?>" title="<?php echo $ww['nm_dokumen']; ?>" data-toggle="lightbox"><?php echo $ww['namaFile']; ?></a></td> </td>
     <td><?php echo $ww['ket']; ?></td> </td>
     
    </tr>


    <?php
		$no++;
		}

   ?>

<tr>
  <th></th><th>Legalitas USaha</th> <th></th> <th></th> <th></th><th></th>
</tr>
<?php
   	$no =1;
		foreach($listdokumen->result_array() as $ss){
		?>
        <tr>
 <td>
    <input type="hidden" name="dokumen[]"  size="12" maxlength="12" value="<?php echo $ss['id_dokumen']; ?>" /></td>
</tr>
    	<tr>
       	<td align="center"><?php echo $no; ?></td>
            <td><?php echo $ss['nm_dokumen']; ?></td>
            <td><?php echo $ss['ada']; ?></td> </td>
     <td><font color=red>Klik Gambar Dokumen untuk download</font><br /><a href="<?php echo base_url();?>upload/<?php echo $ss['namaFile']; ?>" title="<?php echo $ss['nm_dokumen']; ?>" data-toggle="lightbox"><?php echo $ss['namaFile']; ?></a></td> </td>

     <td><?php echo $ss['ket']; ?></td> </td>
    

    </tr>


    <?php
		$no++;
		}

   ?>

<tr>
  <th></th><th>Informasi Pendukung Usaha </th> <th></th> <th></th> <th></th><th></th>
</tr>
<?php
   	$no =1;
		foreach($listjk->result_array() as $mm){
		?>
        <tr>
 <td>
    <input type="hidden" name="dokumen[]"  size="12" maxlength="12" value="<?php echo $mm['id_dokumen']; ?>" /></td>
</tr>
    	<tr>
       	<td align="center"><?php echo $no; ?></td>
            <td><?php echo $mm['nm_dokumen']; ?></td>
            <td><?php echo $mm['ada']; ?></td> </td>
     <td><font color=red>Klik Gambar Dokumen untuk download</font><br /><a href="<?php echo base_url();?>upload/<?php echo $mm['namaFile']; ?>" title="<?php echo $mm['nm_dokumen']; ?>" data-toggle="lightbox"><?php echo $mm['namaFile']; ?></a></td> </td>

     <td><?php echo $mm['ket']; ?></td> </td>
     

    </tr>


    <?php
		$no++;
		}

   ?>

   <tr>
  <th></th><th>Data Jaminan</th><th></th> <th></th> <th></th><th></th>
</tr>
<?php
   	$no =1;
		foreach($listnikah->result_array() as $xx){
		?>
        <tr>
 <td>
    <input type="hidden" name="dokumen[]"  size="12" maxlength="12" value="<?php echo $xx['id_dokumen']; ?>" /></td>
</tr>
    	<tr>
       	<td align="center"><?php echo $no; ?></td>
            <td><?php echo $xx['nm_dokumen']; ?></td>
            <td><?php echo $xx['ada']; ?></td> </td>
     <td><font color=red>Klik Gambar Dokumen untuk download</font><br /><a data-toggle="lightbox" href="<?php echo base_url();?>upload/<?php echo $xx['namaFile']; ?>" title="<?php echo $xx['nm_dokumen']; ?>"><?php echo $xx['namaFile']; ?></a></td> </td>

     <td><?php echo $xx['ket']; ?></td> </td>
     
    </tr>


    <?php
		$no++;
		}

   ?>
  </table>
  <br />  <br />  <br />
 <font color="red">Max Ukuran FIle 300kb dan Gambar harus PDF dan JPG</font>
 <div id="tabledokumen">
  <table width="40%">
<tr>
	<th>No</th>

    <th>Title</th>
    <th>Nama File</th>
    <th>Aksi</th>

</tr>
<?php
	if($listjaminan->num_rows()>0){
	  foreach($listjaminan->result_array() as $vv){
		?>
    	<tr>
			<td align="center" width="20"><?php echo $no; ?></td>
            <td align="center" width="150" ><?php echo $vv['title']; ?></td>
            <td ><font color=red>Klik Gambar Dokumen untuk download</font><br /><a href="<?php echo base_url();?>uploads/<?php echo $vv['file']; ?>" data-toggle="lightbox" title="data jaminan"><?php echo $vv['file']; ?></a></td>


             <td width="20%" align="center">
            
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
</div>
 </form>

   <?

    }
    ?>
