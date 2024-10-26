<?php


    $data = $listbiaya->num_rows();
     if($data > 0){

           $username = $biayadata->username;
            $id_limit = $biayadata->id_limit;
           $jml_limit = $biayadata->jml_limit;


	  }else{

       $username = '';
            $id_limit = '';
           $jml_limit = '';

	  }



  ?>
  <legend><?php echo $title;?></legend>
<form class="form-horizontal" id="dataTable">

        <input type="hidden" name="id_limit" id="id_limit" class="form-control" value="<?php echo $id_limit;?>" >

    <div class="form-group">
        <label class="col-lg-2 control-label">Username</label>
        <div class="col-lg-5">
        <select name="username" id="username" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
        <option value="0">:: Pilih username ::</option>
      <?php
	foreach($listusersss->result() as $w){

	?>
   <?php if($w->username == $username){ ?>
       <option value="<?php echo $w->username;?>" selected><?php echo $w->nama_lengkap;?></option>
                        <?php }else{ ?>
                  <option value="<?php echo $w->username;?>"><?php echo $w->nama_lengkap;?></option>
                        <?php } ?>
                    <?php } ?>
            </select>
        </div>
    </div>

     <div class="form-group">
        <label class="col-lg-2 control-label">Jumlah Limit</label>
        <div class="col-lg-5">
            <input type="text" name="jml_limit" id="jml_limit" class="form-control" value="<?php echo $jml_limit;?>" onKeyUp="kalkulatorTambah();">

        </div>
    </div>

    </form>
    <div class="form-group well">
        <button id="simpan" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <button id="kembali" class="btn btn-warning"><i class="glyphicon glyphicon-ok"></i> Kembali</button>
    </div>

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
    window.location.assign('<?php echo base_url();?>limit');
	});



	$("#simpan").click(function(){
     	var username 	= $("#username").val();
		var jml_limit = $("#jml_limit").val();
       	var id_limit = $("#id_limit").val();

		var string = "username="+username+"&jml_limit="+jml_limit+"&id_limit="+id_limit;




         if(username==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, User Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#userid").focus();
			return false;
		}



         if(jml_limit==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, LImit Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#jml_limit").focus();
			return false;
		}


        		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>limit/simpan",
			data	: string,
			cache	: false,
            beforeSend: function(){

            alert("Data berhasil disimpan");
                                    },
           success	: function(data){
             window.location.assign('<?php echo base_url();?>limit');
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

});

 </script>
    <script>
                    $(function(){

                      $('#tanggal_lahir').datepicker({
    format: 'yyyy-mm-dd',
}).on('changeDate', function(e){
    $(this).datepicker('hide');
});
                    })
            </script>
  <script>
   $(document).ready(function() {
  var textbox = '#ThousandSeperator_commas';
  var hidden = '#ThousandSeperator_num';
  $("#jml_limit").keyup(function () {
  var num = $("#jml_limit").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#jml_limit").val(numCommas);
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