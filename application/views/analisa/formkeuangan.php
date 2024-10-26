<style>
 .error + .select2-container,
.error + .select2-container + .select2-container .select2-dropdown {
    border: 3px solid red !important;
}
.cek {
    border: 3px solid red !important;
}
</style>
 <script>
 $(document).ready(function(){

  $(".js-example-basic-single").select2({
  placeholder: "Select Data"
});

 if ($("#jenisp").val() == "tetap") {
       $('#bebasverifikasi').show();
        $('#okverifikasi').hide();
         kalkulatorTambahKeuangan();
         kalkulatorKeuangan();
           } else {
          $('#okverifikasi').show();
        $('#bebasverifikasi').hide();
         kalkulatorTambahKeuangan();
         kalkulatorKeuangan();
         }
          if ($("#s_penghasilan").val() == "join") {

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
         $('#bebasverifikasi').show();
          $("#gaji_bulan").val('');
        $("#peng_tambahan").val('');

        $('#okverifikasi').hide();
        kalkulatorTambahKeuangan();
         kalkulatorKeuangan();
           } else {
          $('#okverifikasi').show();
        $('#bebasverifikasi').hide();
          $("#penjualan_bulan").val('');
        $("#hpp").val('');
        $("#total_biaya").val('');
         $("#penghasilan_bersih").val('');
         $("#peng_tambahan2").val('');
         kalkulatorTambahKeuangan();
         kalkulatorKeuangan();
         }
    });

     $("#s_penghasilan").change(function() {
        if ($("#s_penghasilan").val() == "join") {

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

         $("#simpan").click(function(){var a=$("#no_aplikasi").val(),e=$("#gaji_bulan").val(),n=$("#s_penghasilan").val(),s=$("#jenisp").val(),t=$("#peng_tambahan").val(),o=$("#peng_utamapasangan").val(),i=$("#peng_tambahanpasangan").val(),g=$("#total_penghasilan").val(),h=$("#rekening").val(),l=$("#biaya_hidup").val(),r=$("#angsuran_pemohon").val(),m=$("#angsuran_bsm").val(),u=$("#angsuran_pasangan").val(),f=$("#sisa_penghasilan").val(),p="&gaji_bulan="+e+"&x_AndaMhs="+n+"&jenisp="+s+"&no_aplikasi="+a+"&peng_tambahan="+t+"&peng_utamapasangan="+o+"&peng_tambahanpasangan="+i+"&total_penghasilan="+g+"&rekening="+h+"&biaya_hidup="+l+"&angsuran_pemohon="+r+"&angsuran_bsm="+m+"&angsuran_pasangan="+u+"&sisa_penghasilan="+f;if(0==e.length)return $.messager.show({title:"Info",msg:"Maaf, Nama Gaji Perbulan Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#gaji_bulan").focus(),!1;if(0==t.length)return $.messager.show({title:"Info",msg:"Maaf, Penghasilan Tambahan Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#peng_tambahan").focus(),!1;if(0==l.length)return $.messager.show({title:"Info",msg:"Maaf, Biaya Hidup Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#biaya_hidup").focus(),!1;if(0==h)return $.messager.show({title:"Info",msg:"Maaf, Rekening Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#rekening").focus(),!1;if(0==r.length)return $.messager.show({title:"Info",msg:"Maaf, Angsuran Pemohon Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#angsuran_pemohon").focus(),!1;if(0==m.length)return $.messager.show({title:"Info",msg:"Maaf, Angsuran di BSM Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#angsuran_bsm").focus(),!1;if(0==u.length)return $.messager.show({title:"Info",msg:"Maaf, Angsuran Pasangan Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#angsuran_pasangan").focus(),!1;if(0==f.length)return $.messager.show({title:"Info",msg:"Maaf, Sisa Penghasilan Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#sisa_penghasilan").focus(),!1;if("join"==n){if(0==o.length)return $.messager.show({title:"Info",msg:"Maaf, Penghasilan Utama Pasangan Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#peng_utamapasangan").focus(),!1;if(0==i.length)return $.messager.show({title:"Info",msg:"Maaf, Penghasilan Tambahan Pasangan Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#peng_tambahanpasangan").focus(),!1}$.ajax({type:"POST",url:"<?php echo site_url(); ?>verifikasi/updatekeu_ver",data:p,cache:!1,success:function(e){  message('success', 'Data berhasil di tambah'); tampil_data('<?php echo $aplikasi;?>','updatekeuangan','verifikasi','formkeuangan','2');
},error:function(a,e,n){$.messager.show({title:"Info",msg:"Server tidak merespon :"+n,timeout:2e3,showType:"slide"})}})}),$("#simpannontetap").click(function(){var a=$("#no_aplikasi").val(),e=$("#penjualan_bulan").val(),n=$("#hpp").val(),s=$("#total_biaya").val(),t=$("#penghasilan_bersih").val(),o=$("#s_penghasilan").val(),i=$("#jenisp").val(),g=$("#peng_tambahan2").val(),h=$("#peng_utamapasangan2").val(),l=$("#peng_tambahanpasangan2").val(),r=$("#total_penghasilan2").val(),m=$("#rekening1").val(),u=$("#biaya_hidup1").val(),f=$("#angsuran_pemohon1").val(),p=$("#angsuran_bsm1").val(),_=$("#angsuran_pasangan1").val(),d=$("#sisa_penghasilan1").val(),b="&penjualan_bulan="+e+"&hpp="+n+"&total_biaya="+s+"&penghasilan_bersih="+t+"&x_AndaMhs="+o+"&jenisp="+i+"&no_aplikasi="+a+"&peng_tambahan2="+g+"&peng_utamapasangan2="+h+"&peng_tambahanpasangan2="+l+"&total_penghasilan2="+r+"&rekening1="+m+"&biaya_hidup1="+u+"&angsuran_pemohon1="+f+"&angsuran_bsm1="+p+"&angsuran_pasangan1="+_+"&sisa_penghasilan1="+d;if(0==e.length)return $.messager.show({title:"Info",msg:"Maaf, Nama Penjualan Perbulan Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#penjualan_bulan").focus(),!1;if(0==n.length)return $.messager.show({title:"Info",msg:"Maaf, Nama HPP Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#hpp").focus(),!1;if(0==s.length)return $.messager.show({title:"Info",msg:"Maaf, Nama HPP Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#total_biaya").focus(),!1;if(0==t.length)return $.messager.show({title:"Info",msg:"Maaf, Nama HPP Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#penghasilan_bersih").focus(),!1;if(0==g.length)return $.messager.show({title:"Info",msg:"Maaf, Penghasilan Tambahan Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#peng_tambahan2").focus(),!1;if(0==m)return $.messager.show({title:"Info",msg:"Maaf, Rekening Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#rekening1").focus(),!1;if(0==u.length)return $.messager.show({title:"Info",msg:"Maaf, Biaya Hidup Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#biaya_hidup1").focus(),!1;if(0==f.length)return $.messager.show({title:"Info",msg:"Maaf, Angsuran Pemohon Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#angsuran_pemohon1").focus(),!1;if(0==p.length)return $.messager.show({title:"Info",msg:"Maaf, Angsuran di BSM Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#angsuran_bsm1").focus(),!1;if(0==_.length)return $.messager.show({title:"Info",msg:"Maaf, Angsuran Pasangan Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#angsuran_pasangan1").focus(),!1;if(0==d.length)return $.messager.show({title:"Info",msg:"Maaf, Sisa Penghasilan Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#sisa_penghasilan1").focus(),!1;if("join"==o){if(0==h.length)return $.messager.show({title:"Info",msg:"Maaf, Penghasilan Utama Pasangan Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#peng_utamapasangan2").focus(),!1;if(0==l.length)return $.messager.show({title:"Info",msg:"Maaf, Penghasilan Tambahan Pasangan Tidak Boleh Kosong",timeout:2e3,showType:"fade",style:{right:"",bottom:""}}),$("#peng_tambahanpasangan2").focus(),!1}$.ajax({type:"POST",url:"<?php echo site_url(); ?>verifikasi/updatekeu2_ver",data:b,cache:!1,success:function(e){  message('success', 'Data berhasil di tambah'); tampil_data('<?php echo $aplikasi;?>','updatekeuangan','verifikasi','formkeuangan','2');  },error:function(a,e,n){$.messager.show({title:"Info",msg:"Server tidak merespon :"+n,timeout:2e3,showType:"slide"})}})});

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
 $(document).ready(function(){var a="#ThousandSeperator_num";$("#gaji_bulan").keyup(function(){var n=$("#gaji_bulan").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#gaji_bulan").val(v)}),$("#peng_tambahan").keyup(function(){var n=$("#peng_tambahan").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#peng_tambahan").val(v)}),$("#peng_utamapasangan").keyup(function(){var n=$("#peng_utamapasangan").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#peng_utamapasangan").val(v)}),$("#peng_tambahanpasangan").keyup(function(){var n=$("#peng_tambahanpasangan").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#peng_tambahanpasangan").val(v)}),$("#penjualan_bulan").keyup(function(){var n=$("#penjualan_bulan").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#penjualan_bulan").val(v)}),$("#hpp").keyup(function(){var n=$("#hpp").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#hpp").val(v)}),$("#total_biaya").keyup(function(){var n=$("#total_biaya").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#total_biaya").val(v)}),$("#penghasilan_bersih").keyup(function(){var n=$("#penghasilan_bersih").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#penghasilan_bersih").val(v)}),$("#peng_tambahan2").keyup(function(){var n=$("#peng_tambahan2").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#peng_tambahan2").val(v)}),$("#peng_utamapasangan2").keyup(function(){var n=$("#peng_utamapasangan2").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#peng_utamapasangan2").val(v)}),$("#peng_tambahanpasangan2").keyup(function(){var n=$("#peng_tambahanpasangan2").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#peng_tambahanpasangan2").val(v)}),$("#biaya_hidup").keyup(function(){var n=$("#biaya_hidup").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#biaya_hidup").val(v)}),$("#biaya_lain").keyup(function(){var n=$("#biaya_lain").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#biaya_lain").val(v)}),$("#angsuran_pemohon").keyup(function(){var n=$("#angsuran_pemohon").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#angsuran_pemohon").val(v)}),$("#angsuran_bsm").keyup(function(){var n=$("#angsuran_bsm").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#angsuran_bsm").val(v)}),$("#angsuran_pasangan").keyup(function(){var n=$("#angsuran_pasangan").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#angsuran_pasangan").val(v)}),$("#sisa_penghasilan").keyup(function(){var n=$("#sisa_penghasilan").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#sisa_penghasilan").val(v)}),$("#biaya_hidup1").keyup(function(){var n=$("#biaya_hidup1").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#biaya_hidup1").val(v)}),$("#biaya_lain1").keyup(function(){var n=$("#biaya_lain1").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#biaya_lain1").val(v)}),$("#angsuran_pemohon1").keyup(function(){var n=$("#angsuran_pemohon1").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#angsuran_pemohon1").val(v)}),$("#angsuran_bsm1").keyup(function(){var n=$("#angsuran_bsm1").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#angsuran_bsm1").val(v)}),$("#angsuran_pasangan1").keyup(function(){var n=$("#angsuran_pasangan1").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#angsuran_pasangan1").val(v)}),$("#sisa_penghasilan1").keyup(function(){var n=$("#sisa_penghasilan1").val(),l=/,/g;n=n.replace(l,""),$(a).val(n);var v=addCommas(n);$("#sisa_penghasilan1").val(v)})});




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

   <div class="btn-group-center">
<?php
  $no=0;
  foreach($listtabsheader->result_array() as $jk){

   if (($no % 9) == 0){echo "<br>";}
?>
 <a href="javascript:tampil_data('<?php echo $aplikasi;?>','<?php echo $jk['kontrol'];?>','<?php echo $jk['link'];?>','<?php echo $jk['form'];?>','2')" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-<?php echo $jk['icon'];?>"></i> <?php echo $jk['nm_tab'];?> </a>


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
?><br />
         <table id="data" width="100%">
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
    <select name="s_penghasilan" id="s_penghasilan" class="js-example-basic-single js-states form-control <?php echo $s_penghasilan; ?>" disabled>
     <?php if($db['s_penghasilan']=="single"){  $a="selected=selected";
     ?>
     <option value="single" <?php echo $a;?>>Single Income</option>
     <option value="join">Join Income</option>
     <?php
     }
     if($db['s_penghasilan']=="join"){  $b="selected=selected";
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
     <select name="jenisp" id="jenisp" class="js-example-basic-single js-states form-control <?php echo $jenisp; ?>" disabled>
     <?php if($db['jenisp']=="tetap"){  $a="selected=selected";
     ?>
     <option value="tetap" <?php echo $a;?>>Penghasilan Tetap</option>
     <option value="nontetap">Penghasilan Tidak Tetap</option>
     <?php
     }
     if($db['jenisp']=="nontetap"){  $b="selected=selected";
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
    <div id="bebasverifikasi"> <table id="data" width="100%">
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
<input type="text" name="gaji_bulan" id="gaji_bulan" onKeyUp="kalkulatorTambahKeuangan();"  value="<?php echo $ww['gaji_bulan']; ?>" class="<?php echo $gaji_bulan; ?>" readonly/></div></td></tr>
<tr>
    <td width="10%">Penghasilan Tambahan Pemohon</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="peng_tambahan" id="peng_tambahan" onKeyUp="kalkulatorTambahKeuangan();" value="<?php echo $ww['peng_tambahan']; ?>" class="<?php echo $peng_tambahan; ?>" readonly />

</div></td></tr>

<tr>
    <td width="10%">Penghasilan Utama Pasangan</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="peng_utamapasangan" id="peng_utamapasangan" onKeyUp="kalkulatorTambahKeuangan();"  value="<?php echo $ww['peng_utamapasangan']; ?>" class="<?php echo $peng_utamapasangan; ?>" readonly/>

</div></td></tr>
<tr>
    <td width="10%">Penghasilan Tambahan Pasangan</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="peng_tambahanpasangan" id="peng_tambahanpasangan" onKeyUp="kalkulatorTambahKeuangan();" value="<?php echo $ww['peng_tambahanpasangan']; ?>" class="<?php echo $peng_tambahanpasangan; ?>" readonly/>

</div></td></tr>

<tr>
    <td width="10%">Total Penghasilan</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">

<input type="text" name="total_penghasilan" id="total_penghasilan" size="20" onKeyUp="kalkulatorTambahKeuangan();" style=background-color:grey value="<?php echo $ww['total_penghasilan']; ?>" class="<?php echo $total_penghasilan; ?>" readonly></div></td></tr>
 <tr>
    <td width=20%>Rekening Kepemilikan</td>
    <td>:</td>
    <td><div class="col-lg-5"> <select name="rekening" id="rekening" class="js-example-basic-single js-states form-control <?php echo $rekening; ?>" disabled>
    <option value="0">-Pilih-</option>
     <?php foreach($listrekening->result() as $w){ ?>
                        <?php if($w->id_rekening == $ww['rekening']){ ?>
                            <option value="<?php echo $w->id_rekening; ?>" selected><?php echo $w->nm_rekening; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $w->id_rekening; ?>"><?php echo $w->nm_rekening; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>
<tr>
    <td width="20%">Biaya Hidup</td>
    <td width="20">:</td>
    <td><div class="col-lg-5">
<input type="text" name="biaya_hidup" id="biaya_hidup" onKeyUp="kalkulatorTambahKeuangan();"  value="<?php echo $ww['biaya_hidup']; ?>" class="<?php echo $biaya_hidup; ?>" readonly/></div></td></tr>
<!--tr>
    <td width="20%">Biaya Lain</td>
    <td width="20">:</td>
    <td>
<input type="text" name="biaya_lain" id="biaya_lain" onKeyUp="kalkulatorTambah();"  value="<?php echo $ww['biaya_lain']; ?>" /></td></tr>
<tr-->
    <td width="20%">Angsuran Pemohon di Bank Lain</td>
    <td width="20">:</td>
    <td><div class="col-lg-5">
<input type="text" name="angsuran_pemohon" id="angsuran_pemohon" onKeyUp="kalkulatorTambahKeuangan();"  value="<?php echo $ww['angsuran_pemohon']; ?>" class="<?php echo $angsuran_pemohon; ?>" readonly/></div></td></tr>
<tr>
    <td width="20%">Angsuran Pemohon di Bank BSM (Existing)</td>
    <td width="20">:</td>
    <td><div class="col-lg-5">
<input type="text" name="angsuran_bsm" id="angsuran_bsm" onKeyUp="kalkulatorTambahKeuangan();"  value="<?php echo $ww['angsuran_bsm']; ?>" class="<?php echo $angsuran_bsm; ?>" readonly/></div></td></tr>
<tr>
    <td width="20%">Angsuran Pasangan</td>
    <td width="20">:</td>
    <td><div class="col-lg-5">
<input type="text" name="angsuran_pasangan" id="angsuran_pasangan" onKeyUp="kalkulatorTambahKeuangan();"  value="<?php echo $ww['angsuran_pasangan']; ?>" class="<?php echo $angsuran_pasangan; ?>" readonly/></div></td></tr>
<tr>
    <td width="20%">Sisa Penghasilan</td>
    <td width="20">:</td>
    <td><div class="col-lg-5">
<input type="text" name="sisa_penghasilan" id="sisa_penghasilan" size="20" style=background-color:grey value="<?php echo $ww['sisa_penghasilan']; ?>" class="<?php echo $sisa_penghasilan; ?>"  readonly></div></td></tr>



<tr></tr><tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr>




  </table>
</div>
      <div id="okverifikasi">    <table id="data" width="100%">
         <tr></tr><tr></tr>
  <tr>

    <td>   <input type="hidden" name="thp" id="thp" size="30" maxlength="50" value="<?php echo $tahapantab;?>" />
    <input type="hidden" name="no_aplikasi" id="no_aplikasi" size="30" maxlength="50" value="<?php echo $db['no_aplikasi']; ?>" /></td>
</tr>
<tr>
    <td width="20%">Penjualan setiap Bulan</td>
    <td width="5">:</td>
    <td> <div class="col-lg-5">
<input type="text" name="penjualan_bulan" id="penjualan_bulan" onKeyUp="kalkulatorKeuangan();" value="<?php echo $nn['penjualan_bulan']; ?>" class="<?php echo $penjualan_bulan; ?>" readonly/></div></td></tr>
<tr>
    <td width="10%">HPP</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="hpp" id="hpp" onKeyUp="kalkulatorKeuangan();" value="<?php echo $nn['hpp']; ?>" class="<?php echo $hpp; ?>" readonly/>

</div></td></tr>
 <tr>
    <td width="10%">Total Biaya Operasional Usaha Perbulan</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="total_biaya" id="total_biaya" onKeyUp="kalkulatorKeuangan();" value="<?php echo $nn['total_biaya']; ?>" class="<?php echo $total_biaya; ?>" readonly/>

</div></td></tr>
<tr>
    <td width="10%">Penghasilan Bersih Usaha Pemohon</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="penghasilan_bersih" id="penghasilan_bersih" onKeyUp="kalkulatorKeuangan();" style=background-color:grey value="<?php echo $nn['penghasilan_bersih']; ?>" class="<?php echo $penghsilan_bersih; ?>" readonly />

</div></td></tr>
<tr>
    <td width="10%">Penghasilan Tambahan Pemohon</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="peng_tambahan2" id="peng_tambahan2" onKeyUp="kalkulatorKeuangan();" value="<?php echo $nn['peng_tambahan2']; ?>" class="<?php echo $peng_tamabahan2; ?>" readonly/>

</div></td></tr>
<tr>
    <td width="10%">Penghasilan Utama Pasangan</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="peng_utamapasangan2" id="peng_utamapasangan2" onKeyUp="kalkulatorKeuangan();" value="<?php echo $nn['peng_utamapasangan2']; ?>" class="<?php echo $peng_utamapasangan2; ?>" readonly />

</div></td></tr>
<tr>
    <td width="10%">Penghasilan Tambahan Pasangan</td>

    <td width="5">:</td>
    <td><div class="col-lg-5">
<input type="text" name="peng_tambahanpasangan2" id="peng_tambahanpasangan2" onKeyUp="kalkulatorKeuangan();" value="<?php echo $nn['peng_tambahanpasangan2']; ?>" class="<?php echo $peng_tambahanpasangan2; ?>" readonly/>

</div></td></tr>
<tr>
    <td width="10%">Total Penghasilan Bersih</td>

    <td width="5">:</td>
    <td> <div class="col-lg-5">

<input type="text" name="total_penghasilan2" id="total_penghasilan2" onKeyUp="kalkulatorKeuangan();" size="20" style=background-color:grey value="<?php echo $nn['total_penghasilan2']; ?>" class="<?php echo $total_penghasilan2; ?>" readonly></div></td></tr>
<tr>
    <td width=20%>Rekening Kepemilikan</td>
    <td>:</td>
    <td><div class="col-lg-5"><select name="rekening1" id="rekening1" class="js-example-basic-single js-states form-control <?php echo $rekening; ?>" disabled>
    <option value="0">-Pilih-</option>
     <?php foreach($listrekening->result() as $w){ ?>
                        <?php if($w->id_rekening == $ww['rekening']){ ?>
                            <option value="<?php echo $w->id_rekening; ?>" selected><?php echo $w->nm_rekening; ?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $w->id_rekening; ?>"><?php echo $w->nm_rekening; ?></option>
                        <?php } ?>
                    <?php } ?>
      </select></div></td>

</tr>
<tr>
    <td width="20%">Biaya Hidup</td>
    <td width="20">:</td>
    <td><div class="col-lg-5">
<input type="text" name="biaya_hidup1" id="biaya_hidup1" onKeyUp="kalkulatorKeuangan();"  value="<?php echo $ww['biaya_hidup']; ?>" class="<?php echo $biaya_hidup; ?>" readonly/></div></td></tr>
<!--tr>
<td width="20%">Biaya Lain</td>
   <td width="20">:</td>
    <td>
<input type="text" name="biaya_lain1" id="biaya_lain1" onKeyUp="kalkulator();"  value="<?php echo $ww['biaya_lain']; ?>" /></td></tr>
<tr-->
<tr>
    <td width="20%">Angsuran Pemohon di Bank Lain</td>
    <td width="20">:</td>
    <td><div class="col-lg-5">
<input type="text" name="angsuran_pemohon1" id="angsuran_pemohon1"  onKeyUp="kalkulatorKeuangan();" value="<?php echo $ww['angsuran_pemohon']; ?>" class="<?php echo $angsuran_pemohon; ?>" readonly/></div></td></tr>
<tr>
    <td width="20%">Angsuran Pemohon di Bank BSM (Existing)</td>
    <td width="20">:</td>
    <td><div class="col-lg-5">
<input type="text" name="angsuran_bsm1" id="angsuran_bsm1" onKeyUp="kalkulatorKeuangan();"  value="<?php echo $ww['angsuran_bsm']; ?>" class="<?php echo $angsuran_bsm; ?>" readonly /></div></td></tr>
<tr>
    <td width="20%">Angsuran Pasangan</td>
    <td width="20">:</td>
    <td><div class="col-lg-5">
<input type="text" name="angsuran_pasangan1" id="angsuran_pasangan1"  onKeyUp="kalkulatorKeuangan();" value="<?php echo $ww['angsuran_pasangan']; ?>" class="<?php echo $angsuran_pasangan; ?>" readonly/></div></td></tr>
<tr>
    <td width="20%">Sisa Penghasilan</td>
    <td width="20">:</td>
    <td><div class="col-lg-5">
<input type="text" name="sisa_penghasilan1" id="sisa_penghasilan1" style=background-color:grey value="<?php echo $ww['sisa_penghasilan']; ?>" class="<?php echo $sisa_penghasilan; ?>" readonly/></div></td></tr>

<script>

</script>

<tr></tr><tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr>



  </table></div>
