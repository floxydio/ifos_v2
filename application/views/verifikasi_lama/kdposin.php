  <script src="<?php echo base_url('assets/js/i18n/grid.locale-en.js');?>"></script>
             <script src="<?php echo base_url('assets/js/jquery.jqGrid.min.js');?>"></script>
        <link href="<?php echo base_url('assets/css/ui.jqgrid.css');?>" rel="stylesheet">


<?php

?>

<head>
</head>
<table id="listdata"></table><!--Grid table-->
    <div id="pagerdata"></div>  <!--pagination div-->

<script type="text/javascript">
        $(document).ready(function (){
           	var nm_kdpos		= $("#kdpos_ktp").val();
             jQuery("#listdata").jqGrid({
              	url		: "<?php echo site_url();?>cekduplikasi/tampil_datacekdokumen/"+nm_kdpos,
                mtype : "post",
                datatype: "json",
                colNames:['ID','Kode POS','Kelurahan','Kecamatan','Kotamadya','Propinsi'],
                colModel:[
                 {name:'id_kdpos',index:'id_kdpos', width:20, align:"center"},
               {name:'nm_kdpos',index:'nm_kdpos', width:20, align:"center"},
                {name:'kelurahan',index:'kelurahan', width:40, align:"center"},
                {name:'kecamatan',index:'kecamatan', width:40, align:"center"},
                {name:'kotamadya',index:'kotamadya', width:40, align:"center"},
                {name:'propinsi',index:'propinsi', width:50, align:"center"},

                ],
               rowNum:10,
               width:500,
                height: 120,
                rowList:[10,20,30],
                loadonce:true,
                pager: '#pagerdata',
                sortname: 'id_kdpos',
                viewrecords: true,

                rownumbers: true,
                        onSelectRow:	function getSelectedRow() {
            var grid = $("#listdata");

            var rowKey = grid.jqGrid('getGridParam',"selrow");
           var kodepos = grid.jqGrid('getCell', rowKey, 'nm_kdpos');
           var kelurahan = grid.jqGrid('getCell', rowKey, 'kelurahan');
            var kecamatan = grid.jqGrid('getCell', rowKey, 'kecamatan');
             var kotamadya = grid.jqGrid('getCell', rowKey, 'kotamadya');
              var propinsi = grid.jqGrid('getCell', rowKey, 'propinsi');




            if (rowKey){
                 $('#kdpos_ktp').val(kodepos);
                 $('#kelurahan_ktp').val(kelurahan);
                 $('#kecamatan_ktp').val(kecamatan);
                 $('#kotamadya_ktp').val(kotamadya);
                 $('#propinsi_ktp').val(propinsi);
                 $('#datatambahan').dialog('close');


            }else{
                alert("No rows are selected");
            }
        },
                caption:" "
            }).navGrid('#pagerdata',{edit:false,add:false,del:false});
             jQuery("#listdata").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});


        });
    </script>