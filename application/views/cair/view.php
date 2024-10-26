<script type="text/javascript">




function tampil_data(dat,link,form,num){
		var username = $("#userid").val();
		var string = "username="+username;

		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>parameter/updatesp3/"+dat+"/"+link+"/"+form+"/"+num,
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
              	url		: "<?php echo site_url();?>cair/loadData",
                		styleUI : 'Bootstrap',
                 mtype : "get",
                datatype: "json",
                 colNames:['No Aplikasi','Nama Nasabah','Tempat Lahir','Tanggal Lahir','Ibu kandung','Plafon Pembiayaan','Kode Marketing','Tanggal Kirim','Durasi','Aksi'],
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
                    {name:'detail',index:'detail',width:100, align:"left"},
                ],
                rowNum:700,
                width: 950,
                height: 300,
                rowList:[10,20,30],
                pager: '#pager',
                sortname: 'id_pembiayaan',
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

   <div id="datatambahan" class="easyui-dialog" title="Basic Dialog" data-options="iconCls:'icon-save'" style="width:400px;height:200px;padding:10px">
   <div id="datatampil"> </div>
    </div>
