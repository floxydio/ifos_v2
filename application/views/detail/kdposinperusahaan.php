    <link href="<?php echo base_url('assets/css/select2.min.css');?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/select2.min.js');?>"></script>


   	<table id="example" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                     <th>Kode Pos</th>
                     <th>Kelurahan</th>
                     <th>Kecamatan</th>
                     <th>Kotamadya</th>
                     <th>Propinsi</th>
                     <th>check</th>

                </tr>
            </thead>
        </table>

  	<script type="text/javascript">

    $(document).ready(function(){

            loadDatatableAjax();
        });

            function loadDatatableAjax(){


           var oTable= $('#example').DataTable({
                 "bDestroy" : true,
                "bAutoWidth": false,
                "sScrollX": true,
                    "sScrollY": 200,

         "ajax": {
        "url": "<?php echo base_url('detail/fetchDataKodepos'); ?>",
        "type": "GET"
        },

          

            });

              $('#example tbody').on('click', 'input[type="checkbox"]', function(e){

            var row = $(this).closest('tr');
            var data = oTable.row(row).data();
            var rowData = data[1];
             var kdpos = data[0];
             var kecamatan = data[2];
             var kotamadya = data[3];
             var propinsi = data[4];


            var user_id = $(this).val();
             $('#kdpos_perusahaan').val(kdpos);
              $('#kelurahan_perusahaan').val(rowData);
              $('#kecamatan_perusahaan').val(kecamatan);
              $('#kotamadya_perusahaan').val(kotamadya);
              $('#propinsi_perusahaan').val(propinsi);
                         $("#mymodal").modal("hide");



        });
        }


 </script>

