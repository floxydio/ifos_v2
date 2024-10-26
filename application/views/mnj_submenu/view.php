<script type="text/javascript">
        
 function hapusData(kode){
	var string = "kode="+kode;

	var pilih = confirm('Data yang akan dihapus username = '+kode+ '?');
	if (pilih==true) {
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>mnj_submenu/hapus",
			data	: string,
			cache	: false,
			success	: function(data){
		   			  window.location.assign('<?php echo base_url();?>mnj_submenu');
			}
		});
	}
}

function setujuData(setuju){
	var string = "setuju="+setuju;

  	var pilih = confirm('Pastikan semua data terisi dengan benar berdasarkan nomor aplikasi  pada pembiayaan warung mikro , Lanjutkan proses input data?');
if (pilih==true) {
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>pembiayaan/setuju",
			data	: string,
			cache	: false,
			success	: function(data){
		   			  window.location.assign('<?php echo base_url();?>pembiayaan');
			}
		});
	}
}

function tampil_data(dat){
		var username = $("#userid").val();
		var string = "username="+username;

		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>mnj_submenu/tambahdata/"+dat,
			data	: string,
			cache	: false,
                beforeSend: function(){
            $("#tampil_data").html("Loading...");
                                    },
			success	: function(data){
				$("#tampil_data").html(data);
                   $("#view").hide();

			}
		});
	}

</script>

<body>
 <div id="tampil_data"></div><br />
<div id="view">


<button type="button" name="tambah" id="tambah" class="btn btn-primary" onclick="tampil_data(0);"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
<a href="<?php echo base_url();?>mnj_submenu"  class="btn btn-primary"> <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
<hr>



    <?php
        $ci =& get_instance();
        $base_url = base_url();
    ?>
    <table id="list"></table><!--Grid table-->
    <div id="pager"></div>  <!--pagination div-->
</div>

</body>
  <script type="text/javascript">

        $(document).ready(function (){
               jQuery("#list").jqGrid({
              	url		: "<?php echo site_url();?>mnj_submenu/loadData",
                		styleUI : 'Bootstrap',
                 mtype : "get",
                datatype: "json",
               colNames:['Menu Utama','Nama Sub Menu','Link','Keterangan','Aksi'],
                 colModel:[
                   {name:'nm_menu',index:'nm_menu',key: true, width:170, align:"left"},
                    {name:'nm_submenu',index:'nm_submenu',key: true, width:150, align:"left"},
                    {name:'linksub',index:'linksub',key: true, width:150, align:"left"},
                    {name:'ket',index:'ket',key: true, width:100, align:"left"},
                    {name:'detail',index:'detail',width:100, align:"left"},
                  ],
                rowNum:700,
                width: 950,
                height: 300,
                rowList:[10,20,30],
                pager: '#pager',
                sortname: 'id_submenu',
                viewrecords: true,
                rownumbers: true,
                gridview: true,
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
        });
    </script>
