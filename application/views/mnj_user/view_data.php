<?php


    $data = $listbiaya->num_rows();
     if($data > 0){
           $username = $biayadata->username;

           $nama_lengkap = $biayadata->nama_lengkap;
            $no_account = $biayadata->no_account;
             $nm_cabang = $biayadata->nm_cabang;
             $level = $biayadata->level;
              $id_jabatanpeg = $biayadata->id_jabatanpeg;
                $status = $biayadata->status;

	  }else{

      $username = '';
           $nama_lengkap = '';
            $no_account = '';
             $nm_cabang = '';
             $level ='';
              $id_jabatanpeg = '';
               $status = '';

	  }



  ?>
  <legend><?php echo $title;?></legend>
<form class="form-horizontal" id="dataTable">






    <div class="form-group">
        <label class="col-lg-2 control-label">Username</label>
        <div class="col-lg-5">
            <input type="username" id="username" name="username" value="<?php echo $username;?>" class="form-control">
        </div>
    </div>


    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Lengkap</label>
        <div class="col-lg-5">
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?php echo $nama_lengkap;?>">
        </div>
    </div>
      <div class="form-group">
        <label class="col-lg-2 control-label">NIP</label>
        <div class="col-lg-5">
            <input type="text" name="no_account" id="no_account" class="form-control" value="<?php echo $no_account;?>">
        </div>
    </div>
     <div class="form-group">
        <label class="col-lg-2 control-label">Unit Kerja</label>
        <div class="col-lg-5">
        <select name="nm_cabang" id="nm_cabang" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
        <option value="0">:: Pilih KC/KCP ::</option>
      <?php
	foreach($listcabang->result() as $w){

	?>
   <?php if($w->kd_cabang == $nm_cabang){ ?>
       <option value="<?php echo $w->kd_cabang;?>" selected><?php echo "".$w->kd_cabang." - ".$w->nm_cabang."";?></option>
                        <?php }else{ ?>
                  <option value="<?php echo $w->kd_cabang;?>"><?php echo "".$w->kd_cabang." - ".$w->nm_cabang."";?></option>
                        <?php } ?>
                    <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Level</label>
        <div class="col-lg-5">
        <select name="level" id="level" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
        <option value="">:: Pilih Level ::</option>
      <?php
	foreach($listlevel->result() as $w){

	?>
   <?php if($w->id_level == $level){ ?>
       <option value="<?php echo $w->id_level;?>" selected><?php echo $w->nm_level;?></option>
                        <?php }else{ ?>
                  <option value="<?php echo $w->id_level;?>"><?php echo $w->nm_level;?></option>
                        <?php } ?>
                    <?php } ?>
            </select>
        </div>
    </div>
     <div class="form-group">
        <label class="col-lg-2 control-label">Jabatan</label>
        <div class="col-lg-5">
        <select name="id_jabatanpeg" id="id_jabatanpeg" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
        <option value="0">:: Pilih Jabatan ::</option>
      <?php
	foreach($listjabatan->result() as $w){

	?>
   <?php if($w->id == $id_jabatanpeg){ ?>
       <option value="<?php echo $w->id;?>" selected><?php echo $w->nmjabatan;?></option>
                        <?php }else{ ?>
                  <option value="<?php echo $w->id;?>"><?php echo $w->nmjabatan;?></option>
                        <?php } ?>
                    <?php } ?>
            </select>
        </div>
    </div>
      <div class="form-group">
        <label class="col-lg-2 control-label">Status</label>
        <div class="col-lg-5">
        <select name="status" id="status" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
        <option value="0">:: Pilih Level ::</option>
      <?php
	foreach($liststatus->result() as $w){

	?>
   <?php if($w->id_status == $status){ ?>
       <option value="<?php echo $w->id_status;?>" selected><?php echo $w->nm_status;?></option>
                        <?php }else{ ?>
                  <option value="<?php echo $w->id_status;?>"><?php echo $w->nm_status;?></option>
                        <?php } ?>
                    <?php } ?>
            </select>
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
    window.location.assign('<?php echo base_url();?>mnj_user');
	});



	$("#simpan").click(function(){
     	var username 	= $("#username").val();
		var nama_lengkap = $("#nama_lengkap").val();
		var no_account 	= $("#no_account").val();
		var level      	= $("#level").val();
		var nm_cabang   = $("#nm_cabang").val();
		var id_jabatanpeg   = $("#id_jabatanpeg").val();
		var status   = $("#status").val();

		var string = "username="+username+"&no_account="+no_account+"&nama_lengkap="+nama_lengkap+"&level="+level+"&nm_cabang="+nm_cabang+"&id_jabatanpeg="+id_jabatanpeg+"&status="+status;


		if(username.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Username Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#username").focus();
			return false;
		}

        if(nama_lengkap.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Lengkap Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#nama_lengkap").focus();
			return false;
		}

        if(no_account.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor Account Tidak Boleh Kosong',
				timeout:2000,
				showType:'slide'
			});

			$("#no_account").focus();
			return false;
		}

         if(nm_cabang==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Cabang Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#nm_cabang").focus();
			return false;
		}

        if(level==''){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Level Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#level").focus();
			return false;
		}

         if(id_jabatanpeg==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Jabatan Belum Dipilih',
				timeout:2000,
				showType:'slide'
			});

			$("#id_jabatanpeg").focus();
			return false;
		}


        		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>mnj_user/simpan",
			data	: string,
			cache	: false,
            beforeSend: function(){

            alert("Data berhasil disimpan");
                                    },
           success	: function(data){
             window.location.assign('<?php echo base_url();?>mnj_user');
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
                         function CekDulcapil() {
           var no_identitas = $("#no_identitas").val();
        var idcs   = $("#idcs").val();
             	var stringloan = "no_identitas="+no_identitas+"&idcs="+idcs;

        if(no_identitas != ""){
           	$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>pembiayaan/Dulcapil/"+no_identitas+"/"+idcs,
		     data: stringloan,
			cache	: true,
			dataType : "json",
           success	: function(data){
            $("#no_identitas").focus();
         //   $("#ibu_kandung").val(data.ibu_kandung);
            $("#nm_lengkap").val(data.nm_lengkap);
            $("#error").val(data.error);

            }
         	});
        }

   	}
                         </script>
