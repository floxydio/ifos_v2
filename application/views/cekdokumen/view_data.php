
<legend><?php echo $title;?></legend>
 <form action="<?php echo site_url('upload/proses_upload');?>" method="POST" enctype="multipart/form-data">
 <input type="hidden" name="no_aplikasi" id="no_aplikasi" size="12" maxlength="12" value="<?php echo $hasil->no_aplikasi; ?>" /></td>
<div class="table-responsive"> 	<table id="dynamic-table" class="table table-striped table-bordered table-hover">
 
<tr>

   <th width="4%">No.</th>
   <th width="4%">Mandatory</th>
   <th width="60%">Nama Dokumen</th>
    <th>Upload</th>
   <th>Keterangan</th>


</tr>

<tr>
<td>
 <input type="hidden" name="jumlah" id="jumlah" value="<?php echo $jumlah; ?>">
</td>
</tr>
<?php
   	$no =1;
		foreach($list->result_array() as $jk){
		  $query[]=$jk;
		}
        $json = json_encode($query);
        $butuh = json_decode($json);
        foreach($butuh as $db){

		?>
        <tr>
 <td>
    <input type="hidden" name="dokumen<?php echo $no; ?>"  size="12" maxlength="12" value="<?php echo $db->id_dokumen; ?>" id=""/></td>
</tr>
    	<tr>
       	<td align="center"><?php echo $no; ?></td>
       		<td class="center">
																		   	<label class="pos-rel">
                                                                           <?php if ($db->mandatory=='true'){ ?>
                                                                          <input type="checkbox" class="ace" name="list" value="<?php echo $no; ?>" checked  disabled/>
                                                                           <?php   }else{ ?>
                                                                               	<input type="checkbox" class="ace" name="list" value="<?php echo $no; ?>" checked:unchecked disabled/>
                                                                          <?php } ?>


															<span class="lbl"></span>
														</label>

																		</td>
            <td><?php echo $db->nm_dokumen; ?></td>

     <td><input type="file" name="userfile<?php echo $no; ?>" id="file" class="multi<?php echo $no; ?>"><font color=red>* format gambar(pdf dan jpg) dengan maksimal size file 300 kb</font></td>
     <td><textarea name="ket<?php echo $no; ?>" width="20" class="ket<?php echo $no; ?>"></textarea></td>



    </tr>


    <?php
		$no++;
		}

   ?>
   <tr>	<td colspan="3" align="center">
   <input type="submit" name="lanjut" id="lanjut" value="Kirim" class="btn btn-primary">


    </td></tr>
  </table></div>
  </form>
  	<div class="wizard-actions">

											   <button type="button" name="submit" id="BtnSubmit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Submit</button>

                                                <button type="button" name="kembali" id="kembali" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-share-alt"></i> Kembali</button>
											</div>
   <script>
   $(document).ready(function() {
  var textbox = '#ThousandSeperator_commas';
  var hidden = '#ThousandSeperator_num';
  $("#plafon").keyup(function () {
  var num = $("#plafon").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#plafon").val(numCommas);
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

       <script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});

    	$("#view").show();

                 $(".js-example-basic-single").select2({
  placeholder: "Select Data"
});

        $("#kembali").click(function(){
    window.location.assign('<?php echo base_url();?>cekdokumen');
	});


});

 </script>
 
  <script>
            $(function () {
                 $("#sid").hide();
                   $('#lanjut').attr('disabled','disabled'); 
              

   $('#BtnSubmit').click(function(){
    var final = 0;
    $('.ace:checked').each(function(){
        var values = $(this).val();
        if($(".ace").is(':checked')){
       	if($(".multi"+values).val().length=='' || $(".ket"+values).val().length=='' ){
       	    alert(" Data wajib diisi karena Mandatory");
       	 
       	}else{
            final++;
        	}
       }
        
    });
    if(final == $('.ace:checked').length){
       $('#BtnSubmit').attr('disabled','disabled');
         $('#lanjut').removeAttr('disabled');
     
     }
     
      if($('.ace:checked').length==0){
       $('#BtnSubmit').attr('disabled','disabled');
         $('#lanjut').removeAttr('disabled');
     }
});


});
            </script>