<?
    $data = $listbiaya->num_rows();
     if($data > 0){
           $aplikasi = $biayadata->no_aplikasi;
           $program = $biayadata->kd_program;
            $kd_cab = $biayadata->kd_cab;
             $kd_buk = $biayadata->kd_buk;
             $nm_lengkap = $biayadata->nm_lengkap;
              $no_identitas = $biayadata->no_identitas;
               $tempat_lahir = $biayadata->tempat_lahir;
               $tanggal_lahir = $biayadata->tanggal_lahir;
               $ibu_kandung = $biayadata->ibu_kandung;
               $status_nikah = $biayadata->status_nikah;
                $jns_permohonan = $biayadata->jns_permohonan;
                 $jenis = $biayadata->jenis;
                  $tujuan_guna = $biayadata->tujuan_guna;
                  $plafon = $biayadata->plafon;
                  $margin = $biayadata->margin;
                  $jangka_waktu = $biayadata->jangka_waktu;
                  $tipe_margin = $biayadata->tipe_margin;
                  $skim = $biayadata->skim;
                  $jenisp = $biayadata->jenisp;
                  $jns_pekerjaan= $biayadata->jns_pekerjaan;
                   $angsuran= $biayadata->angsuran;
                    $channel= $biayadata->channel;
                    $uang_muka= $biayadata->uang_muka;
                    $p_umuka= $biayadata->p_umuka;
	  }else{

        $aplikasi = $no_aplikasi;
        $program = '';
              $kd_cab = '';
             $kd_buk = '';
             $nm_lengkap ='';
              $no_identitas = '';
                $tempat_lahir = '';
               $tanggal_lahir = '';
               $ibu_kandung = '';
               $status_nikah = '';
               $jns_permohonan = '';
               $jenis = '';
                $tujuan_guna = '';
                  $plafon = '';
                  $margin = '';
                  $jangka_waktu = '';
                  $tipe_margin = '';
                  $skim = '';
                   $jns_pekerjaan='';
                     $angsuran='';
                      $channel='';
                        $uang_muka='';
                    $p_umuka='';

	  }

  ?>

<legend><?php echo $title;?></legend>
<form class="form-horizontal" id="dataTable">

   <div class="form-group">
        <label class="col-lg-2 control-label">No Aplikasi Auto Generate</label>
        <div class="col-lg-5">
            <input type="text" name="no_aplikasi" id="no_aplikasi" value="<?php echo $aplikasi;?>" class="form-control" readonly> <font color="red">sudah auto generate tidak perlu diisi</font>
        </div>
    </div>
   <div class="form-group">
        <label class="col-lg-2 control-label">Nama Program</label>
        <div class="col-lg-5">
        <select name="kd_program" id="kd_program" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
        <option value="0">-Pilih-</option>
       <?php
	foreach($list->result() as $t){
     	?>
      <?php if($t->id_channel == $program){ ?>
                            <option value="<?php echo $t->id_channel; ?>" selected><?php echo $t->nm_channel; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $t->id_channel; ?>"><?php echo $t->nm_channel; ?></option>
                        <?php } ?>
                    <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Channel</label>
        <div class="col-lg-5">
                   <select name="channel" id="channel" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
            <option value="0">-Pilih-</option>
     <?php
	foreach($listoutlet->result() as $t){
     	?>
      <?php if($t->id_outlet == $channel){ ?>
                            <option value="<?php echo $t->id_outlet; ?>" selected><?php echo $t->nm_outlet; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $t->id_outlet; ?>"><?php echo $t->nm_outlet; ?></option>
                        <?php } ?>
                    <?php } ?>
            </select>
        </div>
   </div>
     <div class="form-group">
        <label class="col-lg-2 control-label">Cabang Pemroses</label>
        <div class="col-lg-5">
        <select name="kd_cab" id="kd_cab" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
        <option value="0">-Pilih-</option>
      <?php
	foreach($listcabang->result() as $w){
    ?>
      <?php if($w->kd_cabang == $kd_cab){ ?>
       <option value="<?php echo $w->kd_cabang;?>" selected><?php echo "".$w->kd_cabang." - ".$w->nm_cabang."";?></option>
                        <?php }else{ ?>
                  <option value="<?php echo $w->kd_cabang;?>"><?php echo "".$w->kd_cabang." - ".$w->nm_cabang."";?></option>
                        <?php } ?>
                    <?php } ?>
          </select>
        </div>
    </div>
      <div class="form-group">
        <label class="col-lg-2 control-label">Cabang Pembukuan</label>
        <div class="col-lg-5">
        <select name="kd_buk" id="kd_buk" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
        <option value="0">-Pilih-</option>
      <?php
	foreach($listcabang->result() as $w){

	?>
   <?php if($w->kd_cabang == $kd_buk){ ?>
       <option value="<?php echo $w->kd_cabang;?>" selected><?php echo "".$w->kd_cabang." - ".$w->nm_cabang."";?></option>
                        <?php }else{ ?>
                  <option value="<?php echo $w->kd_cabang;?>"><?php echo "".$w->kd_cabang." - ".$w->nm_cabang."";?></option>
                        <?php } ?>
                    <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Lengkap</label>
        <div class="col-lg-5">
            <input type="nm_lengkap" id="nm_lengkap" name="nm_lengkap" value="<?php echo $nm_lengkap;?>" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">No.KTP</label>
        <div class="col-lg-5">
            <input type="text" name="no_identitas" id="no_identitas" class="form-control" value="<?php echo $no_identitas;?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Tempat Lahir</label>
        <div class="col-lg-5">
        <input type="text" name="tempat_lahir" id="tempat_lahir" value="<?php echo $tempat_lahir;?>" > Tgl Lahir <input type="text" name="tanggal_lahir" value="<?php echo $tanggal_lahir;?>" id="tanggal_lahir" readonly>

        </div>

    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama Gadis Ibu Kandung</label>
        <div class="col-lg-5">
            <input type="text" name="ibu_kandung" id="ibu_kandung" class="form-control" value="<?php echo $ibu_kandung;?>">
        </div>
    </div>
      <div class="form-group">
        <label class="col-lg-2 control-label">Status Pernikahan</label>
        <div class="col-lg-5">
        <select name="status_nikah" id="status_nikah"  class="js-example-basic-single js-states" onselect="chMd()" id="show">
       <option value="0">-Pilih-</option>
    <?php foreach($listnikah->result() as $r){ ?>

     <?php if($r->id_nikah == $status_nikah){ ?>
        <option value="<?php echo $r->id_nikah; ?>" selected><?php echo $r->nm_nikah; ?></option>
                        <?php }else{ ?>
            <option value="<?php echo $r->id_nikah; ?>"><?php echo $r->nm_nikah; ?></option>
                     <?php } ?>
                    <?php } ?>

            </select>
        </div>
    </div>

      <div class="form-group">
        <label class="col-lg-2 control-label">Jenis Permohonan</label>
        <div class="col-lg-5">
        <select name="jns_permohonan" id="jns_permohonan"  class="js-example-basic-single js-states" onselect="chMd()" id="show">
       <option value="0">-Pilih-</option>
       <?php
	foreach($listjnspermohonan->result() as $w){

	?>
     <?php if($w->id_jnspermohonan == $jns_permohonan){ ?>
           <option value="<?php echo $w->id_jnspermohonan;?>" selected><?php echo "".$w->nm_jnspermohonan."";?></option>
                 <?php }else{ ?>
          <option value="<?php echo $w->id_jnspermohonan;?>"><?php echo "".$w->nm_jnspermohonan."";?></option>

                     <?php } ?>
                    <?php } ?>
            </select>
        </div>
    </div>
      <div class="form-group">
        <label class="col-lg-2 control-label">Jenis Penghasilan</label>
        <div class="col-lg-5">
                   <select name="jenisp" id="jenisp" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
   <?php if($jenisp=="tetap"){  $a="selected=selected";
     ?>
     <option value="tetap" <?=$a;?>>Penghasilan Tetap</option>
     <option value="nontetap">Penghasilan Tidak Tetap</option>
     <option value="0">-Pilih-</option>
     <?
     }
     else if($db['jenisp']=="nontetap"){  $b="selected=selected";
     ?>
    <option value="nontetap" <?=$b;?>>Penghasilan Non Tetap</option>
    <option value="tetap">Penghasilan Tetap</option>
    <option value="0">-Pilih-</option>
      <?
      } else {
     ?>
     <option value="0">-Pilih-</option>
     <option value="nontetap">Penghasilan Non Tetap</option>
    <option value="tetap">Penghasilan Tetap</option>
    <option value="0">-Pilih-</option>
     <?
      }
     ?>
            </select>
        </div>
   </div>
     <div class="form-group">
        <label class="col-lg-2 control-label">Jenis Pembiayaan</label>
        <div class="col-lg-5">
        <select name="jenis" id="jenis" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
       <option value="0">-Pilih-</option>

      <?php
	foreach($listjenis->result() as $w){

	?>
       <?php if($w->id_jnskegunaan == $jenis){ ?>
           <option value="<?php echo $w->id_jnskegunaan;?>" selected><?php echo "".$w->nm_jnskegunaan."";?></option>
          <?php }else{ ?>
         <option value="<?php echo $w->id_jnskegunaan;?>"><?php echo "".$w->nm_jnskegunaan."";?></option>

                     <?php } ?>
                    <?php } ?>

            </select>
        </div>
    </div>
     <div class="form-group">
        <label class="col-lg-2 control-label">Tujuan Penggunaan</label>
        <div class="col-lg-5">
        <select name="tujuan_guna" id="tujuan_guna" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
       <option value="0">-Pilih-</option>
    <?php
	foreach($listguna->result() as $w){

	?>
       <?php if($w->id_penggunaan == $tujuan_guna){ ?>
          <option value="<?php echo $w->id_penggunaan;?>" selected><?php echo "".$w->nm_penggunaan."";?></option>
    <?php }else{ ?>
          <option value="<?php echo $w->id_penggunaan;?>"><?php echo "".$w->nm_penggunaan."";?></option>

                     <?php } ?>
                    <?php } ?>

            </select>
        </div>
    </div>

     <div class="form-group">
        <label class="col-lg-2 control-label">Jenis Pekerjaan</label>
        <div class="col-lg-5">
        <select name="jns_pekerjaan" id="jns_pekerjaan" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
       <option value="0">-Pilih-</option>
    <?php
  	foreach($listjns->result() as $w){

	?>
       <?php if($w->id_jnspekerjaan == $jns_pekerjaan){ ?>
     <option value="<?php echo $w->id_jnspekerjaan;?>" selected><?php echo "".$w->nm_jnspekerjaan."";?></option>
   <?php }else{ ?>
     <option value="<?php echo $w->id_jnspekerjaan;?>"><?php echo "".$w->nm_jnspekerjaan."";?></option>

                     <?php } ?>
                    <?php } ?>

            </select>
        </div>
    </div>
     <div class="form-group">
        <label class="col-lg-2 control-label">Plafon</label>
        <div class="col-lg-5">
            <input type="text" name="plafon" id="plafon" class="form-control" value="<?php echo $plafon;?>" onKeyUp="kalkulatorTambah();">
        </div>
    </div>

     <div class="form-group">
        <label class="col-lg-2 control-label">Uang Muka</label>
        <div class="col-lg-5">
            <input type="text" name="uang_muka" id="uang_muka" onKeyUp="kalkulatorTambah();" class="form-control" value="<?php echo $uang_muka;?>">
            <input type="text" name="p_umuka" id="p_umuka" size="10" value="<?php echo $p_umuka;?>"  style=background-color:grey readonly>%
        </div>
    </div>
     <div class="form-group">
        <label class="col-lg-2 control-label">Margin</label>
        <div class="col-lg-5">
            <input type="text" name="margin" id="margin" value="<?php echo $margin;?>" onKeyUp="kalkulatorTambah();">%
        </div>
    </div>
     <div class="form-group">
        <label class="col-lg-2 control-label">Jangka Waktu</label>
        <div class="col-lg-5">
            <input type="text" name="jangka_waktu" id="jangka_waktu" value="<?php echo $jangka_waktu;?>" onKeyUp="kalkulatorTambah();"> bulan
        </div>
    </div>

     <div class="form-group">
        <label class="col-lg-2 control-label">Angsuran</label>
        <div class="col-lg-5">
            <input type="text" name="angsuran" id="angsuran"  class="form-control" readonly> <font color="red">sudah auto generate tidak perlu diisi</font>
        </div>
    </div>
  <div class="form-group">
        <label class="col-lg-2 control-label">Tipe margin</label>
        <div class="col-lg-5">
        <select name="tipe_margin" id="tipe_margin" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
     <option value="0">-Pilih-</option>
      <?php
	foreach($listmargin->result() as $w){

	?>
       <?php if($w->id_tipemargin == $tipe_margin){ ?>
     <option value="<?php echo $w->id_tipemargin;?>" selected><?php echo "".$w->nm_tipemargin."";?></option>
   <?php }else{ ?>
    <option value="<?php echo $w->id_tipemargin;?>"><?php echo "".$w->nm_tipemargin."";?></option>

                     <?php } ?>
                    <?php } ?>

            </select>
        </div>
    </div>

     <div class="form-group">
        <label class="col-lg-2 control-label">Skim Pembiayaan</label>
        <div class="col-lg-5">
        <select name="skim" id="skim" class="js-example-basic-single js-states form-control" onselect="chMd()" id="show">
     <option value="0">-Pilih-</option>
       <?php
	foreach($listskim->result() as $w){

	?>
        <?php if($w->id_skim == $skim){ ?>
   <option value="<?php echo $w->id_skim;?>" selected><?php echo "".$w->nm_skim."";?></option>
    <?php }else{ ?>
     <option value="<?php echo $w->id_skim;?>"><?php echo "".$w->nm_skim."";?></option>

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
  $("#uang_muka").keyup(function () {
  var num = $("#uang_muka").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#uang_muka").val(numCommas);
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
    window.location.assign('<?php echo base_url();?>pembiayaan');
	});



	$("#simpan").click(function(){
          	var no_aplikasi   = $("#no_aplikasi").val();
	    var kd_program    = $("#kd_program").val();
          var channel    = $("#channel").val();
           var nm_lengkap   = $("#nm_lengkap").val();
		var no_identitas  = $("#no_identitas").val();
        	var kd_cab  = $("#kd_cab").val();
            var kd_buk  = $("#kd_buk").val();
        var tanggal_lahir = $('#tanggal_lahir').val();
        var tempat_lahir  = $("#tempat_lahir").val();
	    var ibu_kandung   = $("#ibu_kandung").val();
         var status_nikah   = $("#status_nikah").val();
          var jns_pekerjaan   = $("#jns_pekerjaan").val();
          var skim = $("#skim").val();
         var jns_permohonan = $("#jns_permohonan").val();
          var uang_muka = $("#uang_muka").val();
             var p_umuka = $("#p_umuka").val();
        var s_penghasilan = $("#s_penghasilan").val();
        var jenisp = $("#jenisp").val();
        var jenis = $("#jenis").val();
         var jenisdetail = $("#jenisdetail").val();
        var tujuan_guna = $("#tujuan_guna").val();
        var plafon = $("#plafon").val();
         var tipe_margin = $("#tipe_margin").val();
        var jangka_waktu = $("#jangka_waktu").val();
         var margin = $("#margin").val();
          var angsuran = $("#angsuran").val();
 	var string = "kd_program="+kd_program+"&channel="+channel;

     var string = "no_aplikasi="+no_aplikasi+"&kd_program="+kd_program+"&channel="+channel+"&kd_cab="+kd_cab+"&kd_buk="+kd_buk+"&nm_lengkap="+nm_lengkap+"&no_identitas="+no_identitas+"&tempat_lahir="+tempat_lahir+"&tanggal_lahir="+tanggal_lahir+"&ibu_kandung="+ibu_kandung+"&status_nikah="+status_nikah+"&jns_pekerjaan="+jns_pekerjaan+"&skim="+skim+"&jns_permohonan="+jns_permohonan+"&jenisp="+jenisp+"&jenis="+jenis+"&tujuan_guna="+tujuan_guna+"&plafon="+plafon+"&tipe_margin="+tipe_margin+"&jangka_waktu="+jangka_waktu+"&margin="+margin+"&angsuran="+angsuran+"&uang_muka="+uang_muka+"&p_umuka="+p_umuka;


         if(kd_program==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Field Kode Program Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:'',
                    top:'300px'
                }
			});

			$("#kd_program").focus();
			return false;
		}

          if(channel==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Field channel Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#channel").focus();
			return false;
		}

          if(kd_cab==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Field Kode Cabang Pemroses Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#kd_cab").focus();
			return false;
		}

          if(kd_buk==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Field Kode Cabang Pembukuan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#kd_buk").focus();
			return false;
		}

           if(nm_lengkap.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Untuk Penginputan Nama Depan , Tengah dan Belakang Diketik supaya kebentuk nama lengkap',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#nm_lengkap").focus();
			return false;
		}

        if(no_identitas.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nomor Identitas  Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#no_identitas").focus();
			return false;
		}

        if(tempat_lahir.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tempat Lahir Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#tempat_lahir").focus();
			return false;
		}

        if(tanggal_lahir==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Tanggal Lahir Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#tanggal_lahir").focus();
			return false;
		}
        if(ibu_kandung.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Ibu Kandung Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#ibu_kandung").focus();
			return false;
		}



         if(status_nikah==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Nama Status_nikah Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#status_nikah").focus();
			return false;
		}

         if(jns_pekerjaan==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Jenis Pekerjaan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#jns_pekerjaan").focus();
			return false;
		}
          if(skim==0){

			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Skim Pembiayaan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#skim").focus();
			return false;
		}

           if(jenisp==0){

			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Jenis Penghasilan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#jenisp").focus();
			return false;
		}

             if(jenis==0){

			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Jenis Pembiayaan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#jenis").focus();
			return false;
		}

             if(jns_permohonan==0){

			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Jenis Permohonan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#jns_permohonan").focus();
			return false;
		}

          if(plafon.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Plafon Pembiayaan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#plafon").focus();
			return false;
		}

          if(margin.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Margin Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#margin").focus();
			return false;
		}

            if(jangka_waktu.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
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

			$("#jangka_waktu").focus();
			return false;
		}

           if(uang_muka.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Jenis Pekerjaan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#uang_muka").focus();
			return false;
		}

        if(p_umuka.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Jenis Pekerjaan Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#p_umuka").focus();
			return false;
		}

           if(angsuran.length==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
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

			$("#angsuran").focus();
			return false;
		}

             if(tipe_margin==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Field Tipe Margin Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#tipe_margin").focus();
			return false;
		}

             if(tujuan_guna==0){
			//alert("Maaf, Nama Rekening tidak boleh kosong");
			$.messager.show({
				title:'Info',
				msg:'Maaf, Field Tujuan guna Tidak Boleh Kosong',
				timeout:2000,
				showType:'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#tujuan_guna").focus();
			return false;
		}

        		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>pembiayaan/simpan",
			data	: string,
			cache	: false,
            beforeSend: function(){

            alert("Data berhasil disimpan, Nomor Aplikasi Warung Mikro adalah "+no_aplikasi);
                                    },
           success	: function(data){

		     window.location.assign('<?php echo base_url();?>pembiayaan');
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

                        $("#tanggal_lahir").datepicker({
                            format:'yyyy-mm-dd'
                        });
                    })
            </script>