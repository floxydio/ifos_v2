<?php
$no = 1;
if ($db['skim'] == '1') {
	$nama_akad = "Akad Pembiayaan Ujrah";
	$nama_skim = "Ijarah";
	$foldername = "print_akad_ijarah";
} else if ($db['skim'] == '2') {
	$nama_akad = "Akad Pembiayaan Murabahah";
	$nama_skim = "Murabahah";
	$foldername = "print_akad_murabahah";
} else {
	$nama_akad = "Akad Pembiayaan Qard";
	$nama_skim = "Qard";
	$foldername = "print_akad_qard";
}
?>
<style>
	/*style untuk popup */
	#popupobjek {
		visibility: hidden;
		opacity: 0;
		margin-top: -10px;

	}

	#popupobjek:target {
		visibility: visible;
		opacity: 1;
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		margin: 0;
		z-index: 1981;



	}

	@media (min-width: 768px) {
		.popup-containerobjek {
			width: 800px;
		}
	}

	@media (max-width: 767px) {
		.popup-containerobjek {
			width: 100%;
		}
	}

	.popup-containerobjek {
		position: relative;
		margin: 0% auto;
		padding: 3px 3px;
		color: #000000;
		border-radius: 1px;
		cursor: auto;
		background-color: #666666;

	}

	a.popup-closeobjek {
		position: absolute;
		top: 3px;
		right: 3px;
		background-color: #333;
		padding: 7px 10px;
		font-size: 20px;
		text-decoration: none;
		line-height: 1;
		color: #fff;
	}
</style>

<form action="" method="post" id="datanasabah" class="cdatanasabah">
	<div class="box box-default box-solid">
		<div class="box-body" style="background-color:#F2F2F2">

			<input name="txtjml" id="txtjml" type="hidden" value="" />
			<div id="boxes">
				<table class="table table-condensed table-striped table-hover" style="background-color:#F2F2F2;">
					<tr>
						<th colspan="6" style="background-color:#F2F2F2" scope="col">
							<div align="left">Syarat Realisasi
							</div>
						</th>
					</tr>
					<tr>
						<th style="background-color:#CCCCCC;color:#666666">
							<div align="center">No</div>
						</th>
						<th style="background-color:#CCCCCC" scope="col">
							<div align="center">Nama Akad </div>
						</th>

						<th style="background-color:#CCCCCC;color:#666666">
							<div align="center">Nama Realisasi </div>
						</th>
						<th style="background-color:#CCCCCC;color:#666666">
							<div align="center"></div>
						</th>
						<th style="background-color:#CCCCCC;color:#666666">
							<div align="center">#</div>
						</th>
					</tr>
					<script>
						$(document).ready(function() {
							$("#btntambahobjek<?php echo $no; ?>").click(function() {
								$("#mymodal").modal("show");
								var dat = "<?php echo $db['no_aplikasi']; ?>";
								var link = "akad";
								var form = "akad_form_inputrealisasi";
								var data = $("#btntambahobjek<?php echo $no; ?>").attr('data');
								var txtidkodereg = $("#btntambahobjek<?php echo $no; ?>").attr('kodereg');
								var txtkodeakaddetail = $("#btntambahobjek<?php echo $no; ?>").val();
								var userid = $("#useridobjekbangunan").val();
								$.ajax({
									type: "GET",
									dataType: 'html',
									url: "<?php echo site_url(); ?>parameter/updatetab/" + dat + "/" + link + "/" + form,
									data: {
										data: data,
										txtkodeakaddetail: txtkodeakaddetail,
										txtidkodereg: txtidkodereg,
										userid: userid
									},
									beforeSend: function() {
										document.getElementById('datatampil').style.display = 'none';
										$('.cfrmaddmjob').css("opacity", ".20");
									},
									success: function(html) {
										$("#datatampil").html(html);
										document.getElementById('datatampil').style.display = 'block';
										$('.cfrmaddmjob').css("opacity", "");

									}
								});

							});
						});
					</script>
					<tr>
						<th style="background-color:#EAEAEA" scope="col">
							<div align="center"><label for="exampleInputEmail1"><?php echo $no; ?></label></div>
						</th>
						<th colspan="4" style="background-color:#EAEAEA">
							<div align="left"><label for="exampleInputEmail1"><?php echo $nama_akad; ?></label></div>
						</th>
						<th scope="col" style="background-color:#EAEAEA">
							<div align="center">
								<label for="exampleInputEmail1"><a href="#popupobjek"><button class="btn btn-info btn-sm" value="<?php echo $db['no_apikasi']; ?>" type="button" data="Input Realisasi" kodereg="<?php echo $db['no_apikasi']; ?>" id="btntambahobjek<?php echo $no; ?>"><span class="glyphicon glyphicon-plus-sign"></span></button></a></label>
							</div>
						</th>
					</tr>
					<?php
					$noobjek = 0;
					$fielddataobjek = $listsyarat->num_rows();

					foreach ($listsyarat->result_array() as $rowobjek) {
						$menubaru = $rowobjek['id_realisasi_utama'];
						$noobjek++;
						if ($noobjek % 2 == 0) $warna = "#EAEAEA";
						else $warna = "#FFFFFF";
						$kodeobjek = $rowobjek['kdjaminanakad'];

					?>
						<script>
							//tampilkan form edit
							$(document).ready(function() {

								$("#btneditobjek<?php echo $no . $noobjek; ?>").click(function() {
									$("#mymodal").modal("show");
									var dat = "<?php echo $db['no_aplikasi']; ?>";
									var menu = "<?php echo $menubaru; ?>";

									var link = "akad";
									var form = "akad_form_inputrealisasiedit";
									$.ajax({
										type: "POST",
										dataType: 'html',
										url: "<?php echo site_url(); ?>parameter/updatesubtab/" + dat + "/" + menu + "/" + link + "/" + form,
										beforeSend: function() {
											document.getElementById('datatampil').style.display = 'none';
											$('.cfrmaddmjob').css("opacity", ".20");
										},
										success: function(html) {
											$("#datatampil").html(html);
											document.getElementById('datatampil').style.display = 'block';
											$('.cfrmaddmjob').css("opacity", "");

										}
									});


								});
							});
						</script>
						<script>
							$(document).ready(function() {
								$("#btndeleteobjek<?php echo $no . $noobjek; ?>").click(function() {
									var kdobjekakad = $('#btndeleteobjek<?php echo $no . $noobjek; ?>').val();

									$.ajax({
										type: "POST",
										dataType: 'html',
										url: "<?php echo site_url(); ?>verifikasi/hapussyarat",
										data: 'kdobjekakad=' + kdobjekakad,
										success: function() {
											var dat = '<?php echo $db['no_aplikasi']; ?>';
											var link = 'akad';
											var form = 'formsyarat';
											$.ajax({
												type: "POST",
												dataType: 'html',
												url: "<?php echo site_url(); ?>parameter/updatetab/" + dat + "/" + link + "/" + form,
												beforeSend: function() {
													document.getElementById('headerDetail').style.display = 'block';
												},
												success: function(html) {
													document.getElementById('headerDetail').style.display = 'block';
													$(".formdetail").html(html);

												}
											});
										}
									});

								});
							});
						</script>
						<tr>
							<th colspan="2" style="background-color:#CCCCCC" scope="col">
								<div align="center"><button type="button" class="btn btn-mini" value="<?php echo $rowobjek['id_realisasi_utama']; ?>" id="btndeleteobjek<?php echo $no . $noobjek; ?>"><i class="glyphicon glyphicon-trash text-red"></i></button> <a href="#popupobjek"><button type="button" class="btn btn-mini" kodedetail="<?php echo $kodeakaddetail; ?>" hasil="<?php echo $rowobjek['id_realisasi_subutama']; ?>" value="<?php echo $rowobjek['id_realisasi_subutama']; ?>" id="btneditobjek<?php echo $no . $noobjek; ?>" data="<?php echo $rowobjek['nama']; ?>" kodereg="<?php echo $koderegister; ?>"><i class="glyphicon glyphicon-plus text-yellow"></i></button></a></div>
							</th>
							<th style="background-color:<?php echo $warna; ?>">
								<div align="left">
									<label for="exampleInputEmail1"><?php echo $rowobjek['nama_realisasisub']; ?></label>
								</div>
							</th>
							<th style="background-color:<?php echo $warna; ?>">
								<div align="center">
									<label for="exampleInputEmail1"></label>
								</div>
							</th>
						</tr>
						<?php
						$noobjeksub = 0;
						$no_aplikasi = $db['no_aplikasi'];
						//cari objek
						$subsyarat = $this->app_model->CariSyaratRealisasi($menubaru, $no_aplikasi);
						$fielddataobjeksub = $subsyarat->num_rows();

						foreach ($subsyarat->result_array() as $rowobjeksub) {

							if ($noobjeksub > $fielddataobjeksub) {

								$noobjeksub = 1;
							}

							$menubarusub = $rowobjeksub['id_realisasi_utama'];
							$noobjeksub++;
							if ($noobjek % 2 == 0) $warna = "#EAEAEA";
							else $warna = "#FFFFFF";
							$kodeobjek = $rowobjek['kdjaminanakad'];

						?>
							<script>
								//tampilkan form edit
								$(document).ready(function() {
									$("#btneditobjek<?php echo $no . $noobjek . $noobjeksub; ?>").click(function() {
										$("#mymodal").modal("show");
										var dat = "<?php echo $db['no_aplikasi']; ?>";
										var menu = "<?php echo $menubarusub; ?>";

										var link = "akad";
										var form = "akad_form_inputrealisasiedit";
										$.ajax({
											type: "POST",
											dataType: 'html',
											url: "<?php echo site_url(); ?>parameter/updatesubtab/" + dat + "/" + menu + "/" + link + "/" + form,
											beforeSend: function() {
												document.getElementById('datatampil').style.display = 'none';
												$('.cfrmaddmjob').css("opacity", ".20");
											},
											success: function(html) {
												$("#datatampil").html(html);
												document.getElementById('datatampil').style.display = 'block';
												$('.cfrmaddmjob').css("opacity", "");

											}
										});


									});
								});
							</script>
							<script>
								$(document).ready(function() {
									$("#btndeleteobjek<?php echo $no . $noobjek . $noobjeksub; ?>").click(function() {
										var kdobjekakad = $('#btndeleteobjek<?php echo $no . $noobjek . $noobjeksub; ?>').val();

										$.ajax({
											type: "POST",
											dataType: 'html',
											url: "<?php echo site_url(); ?>verifikasi/hapussyarat",
											data: 'kdobjekakad=' + kdobjekakad,
											success: function() {
												var dat = '<?php echo $db['no_aplikasi']; ?>';
												var link = 'akad';
												var form = 'formsyarat';
												$.ajax({
													type: "POST",
													dataType: 'html',
													url: "<?php echo site_url(); ?>parameter/updatetab/" + dat + "/" + link + "/" + form,
													beforeSend: function() {
														document.getElementById('headerDetail').style.display = 'block';
													},
													success: function(html) {
														document.getElementById('headerDetail').style.display = 'block';
														$(".formdetail").html(html);

													}
												});
											}
										});

									});
								});
							</script>

							<tr>
								<th colspan="2" style="background-color:#CCCCCC" scope="col">
									<div align="center"><button type="button" class="btn btn-mini" value="<?php echo $rowobjeksub['id_realisasi_utama']; ?>" id="btndeleteobjek<?php echo $no . $noobjek . $noobjeksub; ?>"><i class="glyphicon glyphicon-trash text-red"></i></button> <a href="#popupobjek"><button type="button" class="btn btn-mini" kodedetail="<?php echo $kodeakaddetail; ?>" hasil="<?php echo $rowobjeksub['id_realisasi_subutama']; ?>" value="<?php echo $rowobjeksub['id_realisasi_subutama']; ?>" id="btneditobjek<?php echo $no . $noobjek . $noobjeksub; ?>" data="<?php echo $rowobjek['nama']; ?>" kodereg="<?php echo $koderegister; ?>"><i class="glyphicon glyphicon-plus text-green"></i></button></a></div>
								</th>
								<th style="background-color:<?php echo $warna; ?>">
									<div align="left">
										<label for="exampleInputEmail1"><?php echo $rowobjeksub['nama_realisasisub']; ?></label>
									</div>
								</th>
								<th style="background-color:<?php echo $warna; ?>">
									<div align="center">
										<label for="exampleInputEmail1"></label>
									</div>
								</th>
							</tr>
							<?php
							$noobjeksubdet = 0;
							//cari objek
							$no_aplikasi = $db['no_aplikasi'];
							//cari objek
							$subsyaratkedua = $this->app_model->CariSyaratRealisasi($menubarusub, $no_aplikasi);
							$fielddataobjeksubdet = $subsyaratkedua->num_rows();

							foreach ($subsyaratkedua->result_array() as $rowobjeksubdet) {
								$menubarusubdet = $rowobjeksubdet['id_realisasi_utama'];

								$noobjeksubdet++;
								if ($noobjek % 2 == 0) $warna = "#EAEAEA";
								else $warna = "#FFFFFF";
								$kodeobjek = $rowobjek['kdjaminanakad'];

							?>
								<script>
									//tampilkan form edit
									$(document).ready(function() {
										$("#btneditobjek<?php echo $no . $noobjek . $noobjeksub . $noobjeksubdet; ?>").click(function() {
											$("#mymodal").modal("show");
											var dat = "<?php echo $db['no_aplikasi']; ?>";
											var menu = "<?php echo $menubarusubdet; ?>";

											var link = "akad";
											var form = "akad_form_inputrealisasiedit";
											$.ajax({
												type: "POST",
												dataType: 'html',
												url: "<?php echo site_url(); ?>parameter/updatesubtab/" + dat + "/" + menu + "/" + link + "/" + form,
												beforeSend: function() {
													document.getElementById('datatampil').style.display = 'none';
													$('.cfrmaddmjob').css("opacity", ".20");
												},
												success: function(html) {
													$("#datatampil").html(html);
													document.getElementById('datatampil').style.display = 'block';
													$('.cfrmaddmjob').css("opacity", "");

												}
											});

										});
									});
								</script>
								<script>
									$(document).ready(function() {
										$("#btndeleteobjek<?php echo $no . $noobjek . $noobjeksub . $noobjeksubdet; ?>").click(function() {
											var kdobjekakad = $('#btndeleteobjek<?php echo $no . $noobjek . $noobjeksub . $noobjeksubdet; ?>').val();

											$.ajax({
												type: "POST",
												dataType: 'html',
												url: "<?php echo site_url(); ?>verifikasi/hapussyarat",
												data: 'kdobjekakad=' + kdobjekakad,
												success: function() {
													var dat = '<?php echo $db['no_aplikasi']; ?>';
													var link = 'akad';
													var form = 'formsyarat';
													$.ajax({
														type: "POST",
														dataType: 'html',
														url: "<?php echo site_url(); ?>parameter/updatetab/" + dat + "/" + link + "/" + form,
														beforeSend: function() {
															document.getElementById('headerDetail').style.display = 'block';
														},
														success: function(html) {
															document.getElementById('headerDetail').style.display = 'block';
															$(".formdetail").html(html);

														}

													});
												}
											});

										});
									});
								</script>

								<tr>
									<th colspan="2" style="background-color:#CCCCCC" scope="col">
										<div align="center"><button type="button" class="btn btn-mini" value="<?php echo $rowobjeksubdet['id_realisasi_utama']; ?>" id="btndeleteobjek<?php echo $no . $noobjek . $noobjeksub . $noobjeksubdet; ?>"><i class="glyphicon glyphicon-trash text-red"></i></button> <a href="#popupobjek"><button type="button" class="btn btn-mini" kodedetail="<?php echo $kodeakaddetail; ?>" hasil="<?php echo $rowobjeksubdet['id_realisasi_subutama']; ?>" value="<?php echo $rowobjeksubdet['id_realisasi_subutama']; ?>" id="btneditobjek<?php echo $no . $noobjek . $noobjeksub . $noobjeksubdet; ?>" data="<?php echo $rowobjek['nama']; ?>" kodereg="<?php echo $koderegister; ?>"><i class="glyphicon glyphicon-plus text-red"></i></button></a></div>
									</th>
									<th style="background-color:<?php echo $warna; ?>">
										<div align="left">
											<label for="exampleInputEmail1"><?php echo $rowobjeksubdet['nama_realisasisub']; ?></label>
										</div>
									</th>
									<th style="background-color:<?php echo $warna; ?>">
										<div align="center">
											<label for="exampleInputEmail1"></label>
										</div>
									</th>
								</tr>
								<?php
								$noobjeksubdetbar = 0;
								//cari objek
								$subsyaratketiga = $this->app_model->CariSyaratRealisasi($menubarusubdet, $no_aplikasi);
								$fielddataobjeksubdetbar = $subsyaratketiga->num_rows();

								foreach ($subsyaratketiga->result_array() as $rowobjeksubdetbar) {
									$noobjeksubdetbar++;
									if ($noobjek % 2 == 0) $warna = "#EAEAEA";
									else $warna = "#FFFFFF";


								?>


									<script>
										$(document).ready(function() {
											$("#btndeleteobjek<?php echo $no . $noobjek . $noobjeksub . $noobjeksubdet . $noobjeksubdetbar; ?>").click(function() {
												var kdobjekakad = $('#btndeleteobjek<?php echo $no . $noobjek . $noobjeksub . $noobjeksubdet . $noobjeksubdetbar; ?>').val();

												$.ajax({
													type: "POST",
													dataType: 'html',
													url: "<?php echo site_url(); ?>verifikasi/hapussyarat",
													data: 'kdobjekakad=' + kdobjekakad,
													success: function() {
														var dat = '<?php echo $db['no_aplikasi']; ?>';
														var link = 'akad';
														var form = 'formsyarat';
														$.ajax({
															type: "POST",
															dataType: 'html',
															url: "<?php echo site_url(); ?>parameter/updatetab/" + dat + "/" + link + "/" + form,
															beforeSend: function() {
																document.getElementById('headerDetail').style.display = 'block';
															},
															success: function(html) {
																document.getElementById('headerDetail').style.display = 'block';
																$(".formdetail").html(html);

															}

														});
													}
												});

											});
										});
									</script>

									<tr>
										<th colspan="2" style="background-color:#CCCCCC" scope="col">
											<div align="center"><button type="button" class="btn btn-mini" value="<?php echo $rowobjeksubdetbar['id_realisasi_utama']; ?>" id="btndeleteobjek<?php echo $no . $noobjek . $noobjeksub . $noobjeksubdet . $noobjeksubdetbar; ?>"><i class="glyphicon glyphicon-trash text-red"></i></button> </div>
										</th>
										<th style="background-color:<?php echo $warna; ?>">
											<div align="left">
												<label for="exampleInputEmail1"><?php echo $rowobjeksubdetbar['nama_realisasisub']; ?></label>
											</div>
										</th>
										<th style="background-color:<?php echo $warna; ?>">
											<div align="center">
												<label for="exampleInputEmail1"></label>
											</div>
										</th>
									</tr>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					<?php } ?>
				</table>