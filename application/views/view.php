    <link href="<?php echo base_url('assets/css/select2.min.css');?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/select2.min.js');?>"></script>

<script type="text/javascript">



 function hapusData(kode){
	var string = "kode="+kode;

	var pilih = confirm('Data yang akan dihapus username = '+kode+ '?');
	if (pilih==true) {
		$.ajax({
			type	: 'POST',
			url		: "<?php echo site_url(); ?>pembiayaan/hapus",
			data	: string,
			cache	: false,
			success	: function(data){
		   			  window.location.assign('<?php echo base_url();?>pembiayaan');
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
			url		: "<?php echo site_url(); ?>pembiayaan/tambahdata/"+dat,
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
<a href="<?php echo base_url();?>pembiayaan"  class="btn btn-primary"> <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
<hr>




   	<table id="example1" class="table table-striped table-bordered table-hover">
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
</div>

</body>
  	<script type="text/javascript">

    $(document).ready(function(){

			loadDatatableAjax();
		});

			function loadDatatableAjax(){


			$('#example1').DataTable({
               	"bDestroy" : true,
                "bAutoWidth": false,
				"sScrollX": true,
                    "sScrollY": 200,


	     "ajax": {
        "url": "<?php echo base_url('pembiayaan/fetchDatafromDatabase'); ?>",
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

