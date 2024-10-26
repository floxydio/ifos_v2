
      <style>
/*style untuk popup */
	#popupobjek {
		visibility: hidden;
		opacity: 0;
		margin-top: -10px;

	}
	#popupobjek:target {
		visibility:visible;
		opacity: 1;
		position: fixed;
		top:0;
		left:0;
		right:0;
		bottom:0;
		margin:0;
 	 z-index: 1981;



	}

	@media (min-width: 768px){
		.popup-containerobjek {
			width:800px;
		}
	}
	@media (max-width: 767px){
		.popup-containerobjek {
			width:100%;
		}
	}
	.popup-containerobjek {
		position: relative;
		margin:0% auto;
		padding:3px 3px;
		color:#000000;
		border-radius: 1px;
		cursor: auto;
		background-color: #666666;

	}

	a.popup-closeobjek {
		position: absolute;
		top:3px;
		right:3px;
		background-color: #333;
		padding:7px 10px;
		font-size: 20px;
		text-decoration: none;
		line-height: 1;
		color:#fff;
	}

</style>
 <table border="0" class="table table-bordered table-condensed table-striped table-hover">

    <tr>
    <th style="background-color:#CCCCCC;color:#666666"><div align="center">No</div></th>
        <th style="background-color:#CCCCCC;color:#666666"><div align="center">Nama Agunan</div></th>
        <th style="background-color:#CCCCCC;color:#666666"><div align="center">Harga Agunan</div></th>
           <th style="background-color:#CCCCCC;color:#666666"><div align="center">Bobot Agunan</div></th>
            <th style="background-color:#CCCCCC;color:#666666"><div align="center">Nilai Agunan</div></th>
    </tr>
    <?php
   if($listdetailjaminan->num_rows() > 0){
	$no=1;
	foreach($listdetailjaminan->result() as $t){

    ?>
    <tr >
      <td style="background-color:#FFFFFF"><div align="center"><label for="exampleInputEmail1"><?php echo $no; ?></label></div></td>
      <td style="background-color:#FFFFFF"><div align="left"><label for="exampleInputEmail1"><?php echo $t->nm_jaminan; ?></label></div></td>
      <td style="background-color:#FFFFFF"><div align="center"><label for="exampleInputEmail1"><?php echo $t->harga_agunan; ?></label></div></td>
          <td style="background-color:#FFFFFF"><div align="center"><label for="exampleInputEmail1"><?php echo $t->bobot_agunan; ?></label></div></td>
          <td style="background-color:#FFFFFF"><div align="center"><label for="exampleInputEmail1"><?php echo $t->nilai_agunan; ?></label></div></td>

    </tr>
       <?php
		$no++;
		}
	}else{
	?>
    	<tr>
        	<td style="background-color:#FFFFFF"><div align="center"><label for="exampleInputEmail1">Tidak Ada Data</td>
        </tr>
    <?php
	}
?>
    </table>
      <div id="popupobjek">
<div class="popup-containerobjek">
<div id="formjaminan"></div>
</div>
</div>