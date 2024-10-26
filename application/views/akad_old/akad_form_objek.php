<?php
sleep(1);
include_once "../library/inc.connection.php";
include_once "../library/inc.library.php";
# UNTUK PAGING (PEMBAGIAN HALAMAN)
$pecahkode=explode("-",$_POST['kodeakad']);
$id=$pecahkode[0];
//$id=$_POST['kodecv'];

?>
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

<form action="" method="post" id="datanasabah" class="cdatanasabah">
<div class="box box-default box-solid">
<div class="box-body" style="background-color:#F2F2F2">	
<input name="txtidkodereg" id="txtidkodereg"  type="hidden" value="<?php echo $_POST['kodeakad'];?>" />

<input name="txtjml" id="txtjml"  type="hidden" value="" />
<div id="boxes">
   <div style="color:#666666"><i class="icon fa fa-warning text-red"></i> Maksimal Penginputan Data Obyek Akad 5 Data Per Jenis Akad!</span> </div>
 <table class="table table-condensed table-striped table-hover" style="background-color:#F2F2F2;">
  <tr>
    <th colspan="9" style="background-color:#F2F2F2" scope="col"><div align="left">OBJEK AKAD 
    </div></th>
    </tr>
  <tr>
    <th  style="background-color:#CCCCCC" scope="col"><div align="center">No</div></th>
    <th  style="background-color:#CCCCCC" scope="col"><div align="center">Nama Akad </div></th>
    <th style="background-color:#CCCCCC" scope="col">Nama dan Rincian</th>
    <th style="background-color:#CCCCCC" scope="col"><div align="center">Satuan </div></th>
    <th  style="background-color:#CCCCCC" scope="col"><div align="center">Lokasi </div></th>
    <th style="background-color:#CCCCCC" scope="col"><div align="center">Pemasok </div></th>
    <th style="background-color:#CCCCCC" scope="col"><div align="center">Harga </div></th>
    <th  style="background-color:#CCCCCC" scope="col"><div align="center">Nilai Objek  </div></th>
    <th style="background-color:#CCCCCC" scope="col"><div align="center">#</div></th>
  </tr>
  <?php
  //cair
  $no=0;
	$data = mysqli_query($koneksidbi,"select T1.*,T2.nama,T2.skim,T2.i,T1.kdpilihakad from akad_jenispilihan As T1,akad_master As T2 WHERE T1.kdregakad='$id' AND T1.jenisakad=T2.idpilakad ORDER BY T1.tglinput ASC");
	while($d=mysqli_fetch_array($data)){
	$no++;

	$kodedetail=$d['kdpilihakad'];
	$koderegister=$d['kdregakad'];

	//$kodeub=$d['kdregakad'];

//cari data detail akad
$datadetailakad=mysqli_query($koneksidbi,"SELECT * FROM akad_detail WHERE kdpilakaddetail='$kodedetail' ORDER BY kdpilakaddetail ASC");
$rowdetailakad=mysqli_fetch_assoc($datadetailakad);
$kodeakaddetail=$rowdetailakad['kdakaddetail'];

  ?>
 <script>
$(document).ready(function(){
$("#btntambahobjek<?php echo $no; ?>").click(function(){
var data =$("#btntambahobjek<?php echo $no; ?>").attr('data');
var txtidkodereg =$("#akad_objek").val();
var txtkodeakaddetail=$("#btntambahobjek<?php echo $no; ?>").val();
var userid=$("#useridobjekbangunan").val();
			$.ajax({
			type: "POST",
			dataType:'html',
			url: "akadbawahtangan/akad_form_inputobjek.php",
			data:{data:data,txtkodeakaddetail:txtkodeakaddetail,txtidkodereg:txtidkodereg,userid:userid},
			beforeSend: function(){
			document.getElementById('formobjek').style.display='none';
			$('.cfrmaddmjob').css("opacity",".20");
				document.getElementById('uploadProcess1').style.visibility = 'visible';
				},
			success: function(html) {
			$("#formobjek").html(html);
			document.getElementById('formobjek').style.display='block';
			$('.cfrmaddmjob').css("opacity","");
				document.getElementById('uploadProcess1').style.visibility = 'hidden';
				
			}
			});

});
});
</script>
  <tr>
    <th style="background-color:#EAEAEA" scope="col"><div align="center"><label for="exampleInputEmail1"><?php echo $no; ?></label></div></th>
    <th colspan="7"  style="background-color:#EAEAEA"><div align="left"><label for="exampleInputEmail1"><?php echo $d['nama']; ?></label></div></th>
    <th scope="col" style="background-color:#EAEAEA" ><div align="center">
        <label for="exampleInputEmail1"><a href="#popupobjek"><button class="btn btn-mini" value="<?php echo $kodeakaddetail;?>" type="button" data="<?php echo $d['nama']; ?>" kodereg="<?php echo $koderegister; ?>" id="btntambahobjek<?php echo $no; ?>"><i class="fa fa-plus text-blue"></i></button></a></label>
    </div></th>
  </tr>
  <?php
  $noobjek=0;
  //cari objek
  $dataobjek=mysqli_query($koneksidbi,"SELECT * FROM akad_objek WHERE kdakaddetailobjek='$kodeakaddetail' ORDER BY kdobjekakad ASC");
  $fielddataobjek=mysqli_num_rows($dataobjek);
  while($rowobjek=mysqli_fetch_array($dataobjek)){
  $noobjek++;
  if($noobjek % 2==0)$warna="#EAEAEA";else $warna="#FFFFFF";
  $kodeobjek=$rowobjek['kdobjekakad'];
  
  ?>
  <script>
//tampilkan form edit
$(document).ready(function(){
$("#btneditobjek<?php echo $no.$noobjek;?>").click(function(){
var txtkodeakaddetail=$("#btneditobjek<?php echo $no.$noobjek;?>").attr('kodedetail');
var data = $('#btneditobjek<?php echo $no.$noobjek;?>').attr('data');
var kdobjekakad=$('#btneditobjek<?php echo $no.$noobjek;?>').val();
var kodeakad = '<?php echo $_POST['kodeakad'];?>';
			$.ajax({
			type: "POST",
			dataType:'html',
			url: "akadbawahtangan/akad_form_inputobjek_edit.php",
			data:{kdobjekakad:kdobjekakad,data:data,kodeakad:kodeakad,txtkodeakaddetail:txtkodeakaddetail},
			beforeSend: function(){
			document.getElementById('formobjek').style.display='none';
			$('.cfrmaddmjob').css("opacity",".20");
				document.getElementById('uploadProcess1').style.visibility = 'visible';
				},
			success: function(html) {
			$("#formobjek").html(html);
			document.getElementById('formobjek').style.display='block';
			$('.cfrmaddmjob').css("opacity","");
			document.getElementById('uploadProcess1').style.visibility = 'hidden';
document.getElementById('txtnamaobjek').value='<?php echo $rowobjek['namabarang']; ?>';
document.getElementById('txtrincian').value='<?php echo $rowobjek['rincian']; ?>';
document.getElementById('txtsatuan').value='<?php echo $rowobjek['satuan']; ?>';
document.getElementById('txtlokasi').value='<?php echo $rowobjek['lokasi']; ?>';
document.getElementById('txtpemasok').value='<?php echo $rowobjek['pemasok']; ?>';
document.getElementById('txtharga').value='<?php echo number_format($rowobjek['harga']); ?>';
document.getElementById('txtnilai').value='<?php echo number_format($rowobjek['nilai']); ?>';

			}
			});


});
});
</script>
<script>
$(document).ready(function(){
$("#btndeleteobjek<?php echo $no.$noobjek;?>").click(function(){
var kdobjekakad=$('#btndeleteobjek<?php echo $no.$noobjek;?>').val();
	
		$.ajax({
			type: "POST",
			dataType:'html',
			url: "akadbawahtangan/delete_akad_objek.php",
			data: 'kdobjekakad='+kdobjekakad,	
			success: function() {
			var kodeakad ='<?php echo $_POST['kodeakad'].'-'.$_POST['userid'];?>';	
			$.ajax({
			type: "POST",
			dataType:'html',
			url: "akadbawahtangan/akad_form_objek.php",
			data: 'kodeakad='+kodeakad,
			beforeSend: function(){
			document.getElementById('tampilformdetail').style.display='none';
			//$('#frmaddmjob').css("opacity",".5");
			document.getElementById('uploadProcessDetailRincian').style.visibility = 'visible';
			$("#headerDetail").html("");
				},
			success: function(html) {
			document.getElementById('uploadProcessDetailRincian').style.visibility = 'hidden';
			//$('#frmaddmjob').css("opacity",'');
			document.getElementById('tampilformdetail').style.display='block';
			$(".formdetail").html(html);
		
			} 
		});
			} 
		});

});
});

</script>
  <tr>
    <th style="background-color:#CCCCCC" scope="col"><div align="center"><button type="button" class="btn btn-mini" value="<?php echo $rowobjek['kdobjekakad'];?>" id="btndeleteobjek<?php echo $no.$noobjek;?>"><i class="fa fa-trash text-red"></i></button> <a href="#popupobjek"><button type="button" class="btn btn-mini" kodedetail="<?php echo $kodeakaddetail;?>" value="<?php echo $rowobjek['kdobjekakad'];?>" id="btneditobjek<?php echo $no.$noobjek;?>" data="<?php echo $d['nama'];?>" ><i class="fa fa-edit text-blue"></i></button></a></div></th>
    <th  style="background-color:<?php echo $warna;?>"><div align="left">
      <label for="exampleInputEmail1"><?php echo $rowobjek['namabarang'].' '.$rowobjek['rincian']; ?></label>
    </div></th>
    <th   style="background-color:<?php echo $warna;?>"><div align="center">
      <label for="exampleInputEmail1"><?php echo $rowobjek['satuan']; ?></label>
    </div></th>
    <th  style="background-color:<?php echo $warna;?>"><div align="left">
      <label for="exampleInputEmail1"><?php echo $rowobjek['lokasi']; ?></label>
    </div></th>
    <th   style="background-color:<?php echo $warna;?>"><div align="center">
      <label for="exampleInputEmail1"><?php echo $rowobjek['pemasok']; ?></label>
    </div></th>
    <th   style="background-color:<?php echo $warna;?>"><div align="center">
      <label for="exampleInputEmail1"><?php echo number_format($rowobjek['harga']); ?></label>
    </div></th>
    <th colspan="2"  style="background-color:<?php echo $warna;?>"><div align="center">
      <label for="exampleInputEmail1"><?php echo number_format($rowobjek['nilai']); ?></label>
    </div></th>
    </tr>
  <?php } ?>
    <?php } ?>
  <tr>
    <th colspan="9" style="background-color:#CCCCCC;max-width:1px" scope="col">&nbsp;</th>
    </tr>
</table>
  </div>
<br />
<p></p>
 <div id="popupobjek">
<div class="popup-containerobjek">
<div id="formobjek"></div>
</div>
</div>
<input type="hidden" name="useridobjekbangunan" id="useridobjekbangunan" class="input input-small" value="<?php echo $pecahkode[1]; ?>"/>	
<input name="akad_nasabah" id="akad_nasabah" type="hidden" value="<?php echo $_POST['kodeakad'];?>" />
<input name="akad_objek" id="akad_objek" type="hidden" value="<?php echo $pecahkode[0];?>" />
<input type="hidden" name="hasilganti" id="hasilganti" />
</form>
 <script type="text/javascript"> 
$('#txttelpon').priceFormat({ prefix: '0', centsSeparator: '', thousandsSeparator: '-', centsLimit: 0 });
var unmask =$('#txttelpon'). unmask();
$('#txttelpon').val(debito); 
</script>
 <script type="text/javascript"> 
$('#txtfax').priceFormat({ prefix: '0', centsSeparator: '', thousandsSeparator: '-', centsLimit: 0 });
var unmask =$('#txtfax'). unmask();
$('#txtfax').val(debito); 
</script>