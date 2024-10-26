<body>
    <div id="tampil_data"></div><br />
<div id="view">
        <div class="container">

                <h3>Data Pembiayaan</h3>
                <br>
                <div class="panel panel-default">
                        <div class="panel-heading">
                                <h3 class="panel-title" >Custom Filter :</h3>
                        </div>
                        <div class="panel-body">
                                <form id="form-filter" class="form-horizontal">

                                        <div class="form-group">
                                                <label for="FirstName" class="col-sm-2 control-label">No Aplikasi</label>
                                                <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="no_aplikasi">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="LastName" class="col-sm-2 control-label">Nama Lengkap</label>
                                                <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="nm_lengkap">
                                                </div>
                                        </div>

                                        <div class="form-group">
                                                <label for="LastName" class="col-sm-2 control-label"></label>
                                                <div class="col-sm-4">
                                                        <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                                                        <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                                                </div>
                                        </div>
                                </form>
                        </div>
                </div>
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                                <tr>
                                        <th>No</th>
                                        <th>No Aplikasi</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kode Cabang</th>
                                        <th>Plafon</th>
                                         <th>Tahapan</th>
                                        <th>Detail</th>

                                </tr>
                        </thead>
                        <tbody>
                        </tbody>


                </table>
        </div>
       </div>



<script type="text/javascript">

var table;

$(document).ready(function() {

        //datatables
        table = $('#table').DataTable({
                "searching": false,
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                        "url": "<?php echo site_url('viewstatus/ajax_list')?>",
                        "type": "POST",
                        "data": function ( data ) {
                                data.no_aplikasi = $('#no_aplikasi').val();
                                data.nm_lengkap = $('#nm_lengkap').val();

                        }
                },

                //Set column definition initialisation properties.
                "columnDefs": [
                {
                        "targets": [ 0 ], //first column / numbering column
                        "orderable": false, //set not orderable
                },
                ],

        });

        $('#btn-filter').click(function(){ //button filter event click
                table.ajax.reload();  //just reload table
        });
        $('#btn-reset').click(function(){ //button reset event click
                $('#form-filter')[0].reset();
                table.ajax.reload();  //just reload table
        });

});

function tampil_data(dat){
        var username = $("#userid").val();
        var string = "username="+username;

        $.ajax({
            type	: 'POST',
            url		: "<?php echo site_url(); ?>viewstatus/tambahdata/"+dat,
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

</body>
