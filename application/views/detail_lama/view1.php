<script type="text/javascript">




function tampil_data(dat,link,form,num){
		var username = $("#userid").val();
		var string = "username="+username;

		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>parameter/updatedata/"+dat+"/"+link+"/"+form+"/"+num,
			data	: string,
			cache	: false,
                beforeSend: function(){
            $("#tampil_data").html("<img style='position:fixed; top:40%;right:40%;' src='<?php echo base_url('assets/img/loader1.gif');?>");
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





<a href="<?php echo base_url();?>detail"  class="btn btn-primary"> <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
<hr>




   	<table id="example1" class="display table">
		    <thead>
		        <tr>
		             <th>No Aplikasi</th>
                    <th>Nama Lengkap</th>
                     <th>Kode Cabang</th>
                      <th>Ibu Kandung</th>
                       <th>plafon</th>
                    <th>Action</th>
		        </tr>
		    </thead>
		</table>

</body>
 	<script type="text/javascript">

    $(document).ready(function(){

			loadDatatableAjax();
		});

			function loadDatatableAjax(){


			$('#example1').DataTable({
			    "processing": true,
				"bDestroy" : true,

	     "ajax": {
        "url": "<?php echo base_url('detail/fetchDatafromDatabase'); ?>",
        "type": "GET"
        },

				"initComplete" : function(){

					var notApplyFilterOnColumn = [5];
					var inputFilterOnColumn = [1];
					var showFilterBox = 'beforeHeading'; //beforeHeading, afterHeading
					$('.gtp-dt-filter-row').remove();

					var theadSecondRow = '<tr class="gtp-dt-filter-row">';
					$(this).find('thead tr th').each(function(index){
						theadSecondRow += '<td class="gtp-dt-select-filter-' + index + '"></td>';
					});
					theadSecondRow += '</tr>';

					if(showFilterBox === 'beforeHeading'){
						$(this).find('thead').prepend(theadSecondRow);
					}else if(showFilterBox === 'afterHeading'){
						$(theadSecondRow).insertAfter($(this).find('thead tr'));
					}

					this.api().columns().every( function (index) {
						var column = this;

						if(inputFilterOnColumn.indexOf(index) >= 0 && notApplyFilterOnColumn.indexOf(index) < 0){
                         	$('td.gtp-dt-select-filter-' + index).html('<input type="text" class="gtp-dt-input-filter">');
			                $( 'td input.gtp-dt-input-filter').on( 'keyup change clear', function () {
			                    if ( column.search() !== this.value ) {
			                        column
			                            .search( this.value )
			                            .draw();
			                    }
			                } );
						}else if(notApplyFilterOnColumn.indexOf(index) < 0){

                        	var select = $('<select class="js-example-basic-single js-states form-control" size="400px"><option value="">Pilih</option></select>')
			                    .on( 'change', function () {
			                        var val = $.fn.dataTable.util.escapeRegex(
			                            $(this).val()
			                        );

			                        column
			                            .search( val ? '^'+val+'$' : '', true, false )
			                            .draw();
			                    } );
			                $('td.gtp-dt-select-filter-' + index).html(select);
			                column.data().unique().sort().each( function ( d, j ) {
			                 select.append( '<option value="'+d+'">'+d+'</option>' )
			                } );
                                $(".js-example-basic-single").select2({
    placeholder: "Select Data"
});
						}
					});
				}

			});
		}


 </script>



   <div id="datatambahan" class="easyui-dialog" title="Basic Dialog" data-options="iconCls:'icon-save'" style="width:400px;height:200px;padding:10px">
   <div id="datatampil"> </div>
    </div>
