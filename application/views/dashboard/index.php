<style>

</style>
<div class="panel panel-blue">
 <div class="panel-heading">
	<div class="item-content">
     <div class="item-media">
	 <h3><i class="ti-home"></i></h3>
	 </div>
    <h3><span class="title"> Dashboard </span></h3>
    </div>

   <p>Hai, Selamat datang <b><?php echo $this->session->userdata('username');?></b> di Manajeman <b><?php echo $nama_program;?></b></p>

    </div><br>
    	<div class="col-sm-3">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h4 class="panel-title"><?php echo $hitung_pembiayaan; ?></h4>
													<div class="panel-tools" >
														<a data-original-title="Refresh" data-placement="top" class="btn btn-transparent btn-sm panel-refresh" href="#"><i class="ti-reload"></i></a>
													</div>
												</div>
                                                <div class="panel-body">
                                                <h3>Application Log</h3>
                                                 </div>
											</div>
										</div>
    	<div class="col-sm-3">
											<div class="panel panel-red">
												<div class="panel-heading">
													<h4 class="panel-title">23</h4>
													<div class="panel-tools" >
														<a data-original-title="Refresh" data-placement="top" class="btn btn-transparent btn-sm panel-refresh" href="#"><i class="ti-reload"></i></a>
													</div>
												</div>
                                                <div class="panel-body">
                                                <h3>Approval Rate</h3>
                                                 </div>
											</div>
										</div>
     	<div class="col-sm-3">
											<div class="panel panel-green">
												<div class="panel-heading">
													<h4 class="panel-title"><?php echo $hitung_batal; ?></h4>
													<div class="panel-tools" >
														<a data-original-title="Refresh" data-placement="top" class="btn btn-transparent btn-sm panel-refresh" href="#"><i class="ti-reload"></i></a>
													</div>
												</div>
                                                <div class="panel-body">
                                                <h3>Rejected Rate</h3>
                                                 </div>
											</div>
										</div>

</div>
