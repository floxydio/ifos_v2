    <link href="<?php echo base_url('assets/css/select2.min.css');?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/select2.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js')?>"></script>


   	<div class="table-responsive"><table id="example3" class="table table-striped table-bordered table-hover">
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
        </table></div>

  	<script type="text/javascript">

    $(document).ready(function(){

            loadDatatableAjax();
        });

            function loadDatatableAjax(){


           var oTable= $('#example3').DataTable({
                "bDestroy" : true,
                "bAutoWidth": true,
             

         "ajax": {
        "url": "<?php echo base_url('detail/fetchDataKodepos'); ?>",
        "type": "GET"
        },

       

            });

              $('#example3 tbody').on('click', 'input[type="checkbox"]', function(e){

            var row = $(this).closest('tr');
            var data = oTable.row(row).data();
            var rowData = data[1];
             var kdpos = data[0];
             var kecamatan = data[2];
             var kotamadya = data[3];
             var propinsi = data[4];


            var user_id = $(this).val();
             $('#kdpos_ktp').val(kdpos);
              $('#kelurahan_ktp').val(rowData);
              $('#kecamatan_ktp').val(kecamatan);
              $('#kotamadya_ktp').val(kotamadya);
              $('#propinsi_ktp').val(propinsi);
                  $("#mymodal").modal("hide"); 


        });
        }


 </script>

