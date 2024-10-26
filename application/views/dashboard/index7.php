<style>
    .glyphicons {
        padding-left: 0;
        padding-bottom: 1px;
        margin-bottom: 20px;
        list-style: none;
        overflow: hidden;
      }

      .glyphicons li {
        float: left;
        width: 11.5%;
        height: 115px;
        padding: 10px;
        margin: 0 -1px -1px 0;
        font-size: 12px;
        line-height: 1.4;
        text-align: center;
        border: 1px solid #ddd;
      }

      .glyphicons .glyphicon {
              margin-top: 5px;
              margin-bottom: 10px;
              font-size: 24px;
          display: block;
              text-align: center;
      }
</style>
<div class="panel panel-default">
    <div class="panel-heading">
   <p>Hai, Selamat datang <b><?php echo $this->session->userdata('username');?></b> di Manajeman <b><?php echo $nama_program;?></b></p>

    </div>
    <div class="panel-body">
        <div class="container">
            <div class="row">
    <div class="col-sm-3">
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-users"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $hitung_user; ?>" data-postfix="" data-duration="1500" data-delay="0">0</div>
			<h3>Registered users</h3>
		</div>
	</div>
    <div class="col-sm-3">
		<div class="tile-stats tile-green">
			<div class="icon"><i class="entypo-chart-bar"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $hitung_pembiayaan; ?>" data-postfix="" data-duration="1500" data-delay="600">0</div>
			<h3>Application Log</h3>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="entypo-mail"></i></div>
			<div class="num" data-start="0" data-end="23" data-postfix="" data-duration="1500" data-delay="1200">0</div>
			<h3>Approvel Rate</h3>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="tile-stats tile-blue">
			<div class="icon"><i class="entypo-rss"></i></div>
			<div class="num" data-start="0" data-end="<?php echo $hitung_batal; ?>" data-postfix="" data-duration="1500" data-delay="1800">0</div>
			<h3>Rejected Rate</h3>
		</div>
	</div>
</div>
        </div>
    </div>
</div>