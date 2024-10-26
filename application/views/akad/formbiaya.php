
<script type="text/javascript">
$("#datepicker10").datepicker({
         dateFormat: "dd-mm-yyyy",
         autoclose: true,format: 'dd-mm-yyyy',todayHighlight:true
    });
$("#datepicker11").datepicker({
         dateFormat: "dd-mm-yyyy",
         autoclose: true,format: 'dd-mm-yyyy',todayHighlight:true
    });
 //Money Euro


</script>


<script type="text/javascript">
function totalbiaya(){
var adm=$("#txtbiayaadministrasi").val();
var adm=adm.replace(',','');
var adm=adm.replace(',','');
var adm=adm.replace(',','');
var adm=adm.replace(',','');
var adm=adm.replace('.','');

var asr=$("#txtbiayaasuransi").val();
var asr=asr.replace(',','');
var asr=asr.replace(',','');
var asr=asr.replace(',','');
var asr=asr.replace(',','');
var asr=asr.replace('.','');

var asrk=$("#txtbiayaasuransikerugian").val();
var asrk=asrk.replace(',','');
var asrk=asrk.replace(',','');
var asrk=asrk.replace(',','');
var asrk=asrk.replace(',','');
var asrk=asrk.replace('.','');

var not=$("#txtbiayanotaris").val();
var not=not.replace(',','');
var not=not.replace(',','');
var not=not.replace(',','');
var not=not.replace(',','');
var not=not.replace('.','');

var app=$("#txtbiayaappraisal").val();
var app=app.replace(',','');
var app=app.replace(',','');
var app=app.replace(',','');
var app=app.replace(',','');
var app=app.replace('.','');

var lain1=$("#txtnominalbiayalain1").val();
var lain1=lain1.replace(',','');
var lain1=lain1.replace(',','');
var lain1=lain1.replace(',','');
var lain1=lain1.replace(',','');
var lain1=lain1.replace('.','');
var lain2=$("#txtnominalbiayalain2").val();
var lain2=lain2.replace(',','');
var lain2=lain2.replace(',','');
var lain2=lain2.replace(',','');
var lain2=lain2.replace(',','');
var lain2=lain2.replace('.','');
var resultnilaipembiayaan=Math.floor(adm)+Math.floor(asr)+Math.floor(asrk)+parseInt(not)+parseInt(app)+parseInt(lain1)+parseInt(lain2);

if(!isNaN(resultnilaipembiayaan)){
document.getElementById("totalbiaya").value=resultnilaipembiayaan;
$('#totalbiaya').priceFormat({ prefix: '', centsSeparator: '.', thousandsSeparator: ',', centsLimit: 2 });


}
}

     function simpannasabah(nama,tabel){
    var no_aplikasi = $("#no_aplikasi").val();
var verifikasi = $("#"+nama).val();

    var data = "no_aplikasi="+no_aplikasi+"&verifikasi="+verifikasi;

     

$.ajax({
type: 'POST',
dataType:'html',
url: "<?php echo site_url(); ?>verifikasi/updatetabel/"+nama+"/"+tabel,
data: data,
beforeSend: function(){
//document.getElementById('uploadProcessDetailRincian').style.display= 'block';
//$('#datanasabah').css("opacity",".2");
                },
success: function(htmldataumum) {
   message('success', 'Data berhasil di dirubah');
}
});	//simpan


}


</script>
<form action="" method="post" id="datanasabah" class="cdatanasabah">
<div class="box box-default box-solid">
  <div class="box-body" style="background-color:#F2F2F2;min-height:400px">
   <div style="color:#666666"><i class="icon fa fa-warning"></i> Gunakan <b style="color:#FF3333">TAB</b> keyboard untuk melakukan perpindahan antara Field</span> </div>
 <table width="750" border="0" style="background-color:#F2F2F2">
   <tr>
     <th colspan="3" style="background-color:#F2F2F2" scope="col"><div align="center">BIAYA BIAYA </div></th>
   </tr>
   <tr>
     <th width="275" style="background-color:#CCCCCC" scope="col">Biaya Administrasi </th>
     <th width="5" style="background-color:#F2F2F2" scope="col">:</th>
     <th width="456" style="background-color:#F2F2F2" scope="col">
     <input name="no_aplikasi"  type="hidden" id="no_aplikasi" value="<?php echo $db['no_aplikasi']; ?>" class="input input-medium form-control"/>
     <input name="biaya_administrasi"  type="text" id="biaya_administrasi" value="<?php echo $akad['biaya_administrasi']; ?>" onchange="javascript:simpannasabah('biaya_administrasi','tb_akad')" class="input input-medium form-control"/> <input name="stadm" id="stadm" type="checkbox" value="Y" <?php if($akad['st_administarsi']=='Y'){echo "checked=\"checked\"";};?>/> Tidak Ada Biaya<input name="st_administarsi" type="hidden" id="st_administarsi" value="<?php echo $akad['st_administarsi']; ?>" /></th>
   </tr>
     <script>
$(document).ready(function(){
$("#stadm").click(function(){
if(document.getElementById('stadm').checked==true){
$('#biaya_administrasi').val('');
$('#biaya_administrasi').attr('readonly','readonly');
document.getElementById('st_administarsi').value=$('#stadm').val();
}else{
$('#biaya_administrasi').val('');
document.getElementById('biaya_administrasi').focus();
$('#biaya_administrasi').removeAttr('readonly');
document.getElementById('st_administarsi').value='';
}
simpannasabah('st_administarsi','tb_akad');
});
});
   </script>
   <tr>
     <th scope="col" style="background-color:#CCCCCC">Biaya Asuransi Jiwa/Penjaminan </th>
     <th scope="col" style="background-color:#F2F2F2">:</th>
     <th scope="col" style="background-color:#F2F2F2"><input onchange="javascript:simpannasabah('premijiwa','tb_akad')" name="premijiwa"  type="text" id="premijiwa" value="<?php echo $akad['premijiwa']; ?>" class="input input-medium form-control"/><input name="stasr" id="stasr" type="checkbox" value="Y" <?php if($akad['st_asuransikerugian']=='Y'){echo "checked=\"checked\"";};?>/> Tidak Ada Biaya<input name="st_asuransikerugian" type="hidden" id="st_asuransikerugian" value="<?php echo $akad['st_asuransikerugian']; ?>" /></th>
   </tr>
        <script>
$(document).ready(function(){
$("#stasr").click(function(){
if(document.getElementById('stasr').checked==true){
$('#premijiwa').val('');
$('#premijiwa').attr('readonly','readonly');
document.getElementById('st_asuransikerugian').value=$('#stasr').val();
}else{
$('#premijiwa').val('');
document.getElementById('premijiwa').focus();
$('#premijiwa').removeAttr('readonly');
document.getElementById('st_asuransikerugian').value='';
}
simpannasabah('st_asuransikerugian','tb_akad');
});
});
   </script>

   <tr>
     <th scope="col" style="background-color:#CCCCCC">Biaya Asuransi Kerugian </th>
     <th scope="col" style="background-color:#F2F2F2">:</th>
     <th scope="col" style="background-color:#F2F2F2"><input  onchange="javascript:simpannasabah('premibakar','tb_akad')" name="premibakar"  type="text" id="premibakar" value="<?php echo $akad['premibakar']; ?>" class="input input-medium form-control"/> <input name="sesuaitagihanasuransikerugian" id="sesuaitagihanasuransikerugian" type="checkbox" value="Y" <?php if($akad['st_asuransijamin']=='Y'){echo "checked=\"checked\"";};?>/> Tidak Ada Biaya<input name="st_asuransijamin" type="hidden" id="st_asuransijamin" value="<?php echo $akad['st_asuransijamin']; ?>" /></th>
   </tr>
      <script>
$(document).ready(function(){
$("#sesuaitagihanasuransikerugian").click(function(){
if(document.getElementById('sesuaitagihanasuransikerugian').checked==true){
$('#premibakar').val('');
$('#premibakar').attr('readonly','readonly');
document.getElementById('st_asuransijamin').value=$('#sesuaitagihanasuransikerugian').val();
}else{
$('#premibakar').val('');
document.getElementById('premibakar').focus();
$('#premibakar').removeAttr('readonly');
document.getElementById('st_asuransijamin').value='';
}
simpannasabah('st_asuransijamin','tb_akad');
});
});
   </script>
   <tr>
     <th scope="col" style="background-color:#CCCCCC">Biaya Notaris </th>
     <th scope="col" style="background-color:#F2F2F2">:</th>
     <th scope="col" style="background-color:#F2F2F2"><input name="biaya_notaris" onchange="javascript:simpannasabah('biaya_notaris','tb_akad')"   type="text" id="biaya_notaris" value="<?php echo $akad['biaya_notaris']; ?>" class="input input-medium form-control"/> <input name="stnotaris" id="stnotaris" type="checkbox" value="Y" <?php if($akad['st_biayanotaris']=='Y'){echo "checked=\"checked\"";};?>/> Tidak Ada Biaya<input name="st_biayanotaris" type="hidden" id="st_biayanotaris" value="<?php echo $akad['st_biayanotaris']; ?>" /></th>
   </tr>
    <script>
$(document).ready(function(){
$("#stnotaris").click(function(){
if(document.getElementById('stnotaris').checked==true){
$('#biaya_notaris').val('');
$('#biaya_notaris').attr('readonly','readonly');
document.getElementById('st_biayanotaris').value=$('#stnotaris').val();
}else{
$('#biaya_notaris').val('');
document.getElementById('biaya_notaris').focus();
$('#biaya_notaris').removeAttr('readonly');
document.getElementById('st_biayanotaris').value='';
}
simpannasabah('st_biayanotaris','tb_akad');
});
});
   </script>
   <tr>
     <th scope="col" style="background-color:#CCCCCC">Biaya Penilaian Agunan </th>
     <th scope="col" style="background-color:#F2F2F2">:</th>
     <th scope="col" style="background-color:#F2F2F2">
       <input name="txtbiayaappraisal"  type="text" onchange="javascript:simpannasabah('biaya_appraisal','tb_akad')" id="biaya_appraisal" value="<?php echo $akad['biaya_appraisal']; ?>" class="input input-medium form-control"/> <input name="stappraisal" id="stappraisal" type="checkbox" value="Y" <?php if($akad['st_biayaappraisal']=='Y'){echo "checked=\"checked\"";};?>/> Tidak Ada Biaya<input name="st_biayaappraisal" type="hidden" id="st_biayaappraisal" value="<?php echo $akad['st_biayaappraisal']; ?>" />
    </th>
   </tr>
     <script>
$(document).ready(function(){
$("#stappraisal").click(function(){
if(document.getElementById('stappraisal').checked==true){
$('#biaya_appraisal').val('');
$('#biaya_appraisal').attr('readonly','readonly');
document.getElementById('st_biayaappraisal').value=$('#stappraisal').val();
}else{
$('#biaya_appraisal').val('');
document.getElementById('biaya_appraisal').focus();
$('#biaya_appraisal').removeAttr('readonly');
document.getElementById('st_biayaappraisal').value='';
}
simpannasabah('st_biayaappraisal','tb_akad');
});
});
   </script>
  <tr>
     <th scope="col" style="background-color:#CCCCCC">Biaya Materai </th>
     <th scope="col" style="background-color:#F2F2F2">:</th>
     <th scope="col" style="background-color:#F2F2F2">
       <input name="txtbiayaappraisal"  type="text" onchange="javascript:simpannasabah('biaya_materai','tb_akad')" id="biaya_materai" value="<?php echo $akad['biaya_materai']; ?>" class="input input-medium form-control"/> <input name="stmaterai" id="stmaterai" type="checkbox" value="Y" <?php if($akad['st_biayamaterai']=='Y'){echo "checked=\"checked\"";};?>/> Tidak Ada Biaya<input name="st_biayamaterai" type="hidden" id="st_biayamaterai" value="<?php echo $akad['st_biayamaterai']; ?>" />
     </th>
   </tr>
     <script>
$(document).ready(function(){
$("#stmaterai").click(function(){
if(document.getElementById('stmaterai').checked==true){
$('#biaya_materai').val('');
$('#biaya_materai').attr('readonly','readonly');
document.getElementById('st_biayamaterai').value=$('#stmaterai').val();
}else{
$('#biaya_materai').val('');
document.getElementById('biaya_materai').focus();
$('#biaya_appraisal').removeAttr('readonly');
document.getElementById('st_biayamaterai').value='';
}
simpannasabah('st_biayamaterai','tb_akad');
});
});
   </script>
    <tr>
     <th scope="col" style="background-color:#CCCCCC">Biaya Blokir </th>
     <th scope="col" style="background-color:#F2F2F2">:</th>
     <th scope="col" style="background-color:#F2F2F2">
       <input name="txtbiayaappraisal"  type="text" onchange="javascript:simpannasabah('biaya_blokir','tb_akad')" id="biaya_blokir" value="<?php echo $akad['biaya_blokir']; ?>" class="input input-medium form-control"/> <input name="stblokir" id="stblokir" type="checkbox" value="Y" <?php if($akad['st_biayablokir']=='Y'){echo "checked=\"checked\"";};?>/> Tidak Ada Biaya<input name="st_biayablokir" type="hidden" id="st_biayablokir" value="<?php echo $akad['st_biayablokir']; ?>" />
   </th>
   </tr>
     <script>
$(document).ready(function(){
$("#stblokir").click(function(){
if(document.getElementById('stblokir').checked==true){
$('#biaya_blokir').val('');
$('#biaya_blokir').attr('readonly','readonly');
document.getElementById('st_biayablokir').value=$('#stblokir').val();
}else{
$('#biaya_blokir').val('');
document.getElementById('biaya_blokir').focus();
$('#biaya_blokir').removeAttr('readonly');
document.getElementById('st_biayablokir').value='';
}
simpannasabah('st_biayablokir','tb_akad');
});
});
   </script>
    <tr>
     <th scope="col" style="background-color:#CCCCCC">Biaya Cadangan</th>
     <th scope="col" style="background-color:#F2F2F2">:</th>
     <th scope="col" style="background-color:#F2F2F2">
       <input name="biaya_cadangan"  type="text" onchange="javascript:simpannasabah('biaya_cadangan','tb_akad')" id="biaya_cadangan" value="<?php echo $akad['biaya_cadangan']; ?>" class="input input-medium form-control"/> <input name="stcadangan" id="stcadangan" type="checkbox" value="Y" <?php if($akad['st_biayacadangan']=='Y'){echo "checked=\"checked\"";};?>/> Tidak Ada Biaya<input name="st_biayacadangan" type="hidden" id="st_biayacadangan" value="<?php echo $akad['st_biayacadangan']; ?>" />
    </th>
   </tr>
     <script>
$(document).ready(function(){
$("#stcadangan").click(function(){
if(document.getElementById('stcadangan').checked==true){
$('#biaya_cadangan').val('');
$('#biaya_cadangan').attr('readonly','readonly');
document.getElementById('st_biayacadangan').value=$('#stcadangan').val();
}else{
$('#biaya_cadangan').val('');
document.getElementById('biaya_cadangan').focus();
$('#biaya_cadangan').removeAttr('readonly');
document.getElementById('st_biayacadangan').value='';
}
simpannasabah('st_biayacadangan','tb_akad');
});
});
   </script>
 </table><br />

<br />
  </div>
 </div>


</form>
         <script>
    $(document).ready(function() {
  var textbox = '#ThousandSeperator_commas';
  var hidden = '#ThousandSeperator_num';
  $("#biaya_administrasi").keyup(function () {
  var num = $("#biaya_administrasi").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#biaya_administrasi").val(numCommas);
  });
  $("#premijiwa").keyup(function () {
  var num = $("#premijiwa").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#premijiwa").val(numCommas);
  });

   $("#premibakar").keyup(function () {
  var num = $("#premibakar").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#premibakar").val(numCommas);
  });
    $("#biaya_notaris").keyup(function () {
  var num = $("#biaya_notaris").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#biaya_notaris").val(numCommas);
  });
   $("#biaya_appraisal").keyup(function () {
  var num = $("#biaya_appraisal").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#biaya_appraisal").val(numCommas);
  });
    $("#biaya_materai").keyup(function () {
  var num = $("#biaya_materai").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#biaya_materai").val(numCommas);
  });
     $("#biaya_blokir").keyup(function () {
  var num = $("#biaya_blokir").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#biaya_blokir").val(numCommas);
  });
    $("#biaya_cadangan").keyup(function () {
  var num = $("#biaya_cadangan").val();
    var comma = /,/g;
    num = num.replace(comma,'');
    $(hidden).val(num);
    var numCommas = addCommas(num);
    $("#biaya_cadangan").val(numCommas);
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
