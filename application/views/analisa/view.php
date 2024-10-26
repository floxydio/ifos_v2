    <link href="<?php echo base_url('assets/css/select2.min.css');?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/select2.min.js');?>"></script>

<script type="text/javascript">




function tampil_data(dat,link,form,num){
        var username = $("#userid").val();
        var string = "username="+username;

        $.ajax({
            type	: 'POST',
            url		: "<?php echo site_url(); ?>parameter/updatereview/"+dat+"/"+link+"/"+form+"/"+num,
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

     function message(icon, text) {
                Swal.fire({
                        icon: icon,
                        title: 'Data tabel menu',
                        text: text,
                        showConfirmButton: false,
                        showCancelButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                })
        }

</script>

<body>
 <div id="tampil_data"></div><br />
<div id="view">


<a href="<?php echo base_url();?>detail"  class="btn btn-primary"> <i class="glyphicon glyphicon-refresh"></i> Refresh</a>
<hr>




   	<div class="table-responsive"><table id="example1" class="table table-striped table-bordered table-hover">
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
        </table></div>
</div>

</body>
  	<script type="text/javascript">

    $(document).ready(function(){

            loadDatatableAjax();
        });

            function loadDatatableAjax(){


            $('#example1').DataTable({
               	"bDestroy" : true,
                "bAutoWidth": true,



         "ajax": {
        "url": "<?php echo base_url('analisa/fetchDatafromDatabase'); ?>",
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

  <div id="mymodal" class="modal fade" role='dialog' data-backdrop="false">
        <div class="modal-dialog">
                <div class="modal-content">

                        <div class="modal-body">
                               <div id="datatampil"> </div>
                        </div>
                        <div class="modal-footer">
                                <button type="button" data-backdrop="false" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                </div>
            </div>
    </div>

