<script type="text/javascript">
$(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});

 
	$("#konfirmasi").click(function(){

		var no_aplikasi = $("#no_aplikasi").val();
		var pic 	= $("#pic").val();
        var no_identitas 	= $("#no_identitas").val();

		//var string = "kd_cabang="+kd_cabang+"&nm_cabang="+nm_cabang;

		if(pic==0){
		   	$.messager.show({
				title:'Info',
				msg:'Maaf, PIC MIkro Tidak Boleh Kosong',
				timeout:2000,
				showType: 'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#pic").focus();
			return false;
		}
           	if(no_identitas.length==0){
		   	$.messager.show({
				title:'Info',
				msg:'Maaf, Bucket Tidak Boleh Kosong',
				timeout:2000,
				showType: 'fade',
                 style:{
                    right:'',
                    bottom:''
                }
			});

			$("#no_identitas").focus();
			return false;
		}

	 });
  });

</script>
 <?php
 $tahapan="Cheklist Dokumen";
 ?>

<body> <br />
  <form name="form" method="post" action="<?php echo site_url("konfirmasi/update_multiple/konfirmasi/".$tahapan."/1/mikro"); ?>">

<table id="dataTable" width="100%">

 <tr>
	<td width="10%">Pilih PIC Mikro</td>
    <td width="5">:</td>
    <td>
    <select name="pic" id="pic" class="js-example-basic-single js-states" size="200px" >
    <option value="0">-Pilih PIC Mikro-</option>
      <?php
	foreach($list->result() as $t){

	?>
    <option value="<?php echo $t->username;?>"><?php echo "".$t->nama_lengkap."";?></option>
    <?php } ?>
    </select>
    </td>
</tr>
 <tr></tr><tr></tr>

    <tr>
	<td>Bucket PIC MIkro</td>
    <td>:</td>
    <td><textarea name="no_identitas" id="no_identitas" style="width: 250px;" readonly/></textarea> <font color="red">Pilih tombol "Pilih Bucket" terlebih dahulu</font></td>
</tr>
  <tr>

<td><input name='delete' type='submit' id='konfirmasi' class="btn btn-primary btn-sm" value='Konfirmasi'></td>

</tr>
</table>
</form>
<br />
    <center>
     <?php
        $ci =& get_instance();
        $base_url = base_url();
    ?>
   <button type="button" id="getselected" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-shopping-cart"></i> Pilih Bucket</button>
    <br /><br /> 
  
    <table id="list"></table><!--Grid table-->
    <div id="pager"></div><br />  <!--pagination div-->

  </center> 

    
</body>

 <script type="text/javascript">
        $(document).ready(function (){
            jQuery("#list").jqGrid({
               	url		: "<?php echo site_url();?>konfirmasi/loadData",
                mtype : "get",
                datatype: "json",
                colNames:['No Aplikasi','Nama Nasabah','Tempat Lahir','Tanggal Lahir','Ibu kandung','Plafon Pembiayaan','Kode Marketing','Tanggal Kirim','Durasi'],
                colModel:[
                    {name:'no_aplikasi',index:'no_aplikasi',key: true, width:170, align:"left"},
                    {name:'nm_lengkap',index:'nm_lengkap',key: true, width:150, align:"left"},
                    {name:'tempat_lahir',index:'tempat_lahir',key: true, width:100, align:"left"},
                    {name:'tanggal_lahir',index:'tanggal_lahir',key: true, width:100, align:"left"},
                    {name:'ibu_kandung',index:'ibu_kandung',key: true, width:100, align:"left"},
                    {name:'plafon',index:'plafon',key: true, width:100, align:"right"},
                    {name:'no_account',index:'no_account',key: true, width:100, align:"right"},
                    {name:'tgl_approval',index:'tgl_approval',key: true, width:100, align:"left"},
                    {name:'durasi',index:'durasi',key: true, width:100, align:"left"},

                ],
                rowNum:30,
                width: 900,
                height: 300,
                rowList:[10,20,30],
                pager: '#pager',
                sortname: 'id_pembiayaan',
                viewrecords: true,
                multiselect: true,
				scrollPopUp:true,
				scrollLeftOffset: "83%",
			   	gridview: true,
                loadonce:true,
                rownumbers: true,
                caption:" "
            }).navGrid('#pager',{edit:false,add:false,del:false});
          $('#list').jqGrid('filterToolbar');
			$('#list').jqGrid('navGrid',"#pager", {
                search: false, // show search button on the toolbar
                add: false,
                edit: false,
                del: false,
                refresh: true
            });
            $("#getselected").click(function(){
				var sr = $("#list").jqGrid('getGridParam','selarrrow');
				if(sr.length) {
					nn = sr.join();
                    $("#no_identitas").val(nn);
				} else {
					alert("Mohon Data Dipilih Telebih dahulu");
				}
			});
        });
    </script>
