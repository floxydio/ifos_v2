<!doctype html>
    <html>
        <head>
        <meta name=”viewport” content=”width=device-width; initial-scale=1.0; maximum-scale=1.0;”>
            <title><?php echo $title;?></title>
             <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css');?>">
       <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins.css');?>">
       <link rel="stylesheet" href="<?php echo base_url('assets/css/ui.jqgrid-bootstrap.css');?>">
             <link rel="stylesheet" href="<?php echo base_url('assets/css/smoothness/jquery-ui.custom.css');?>">
                <link rel="stylesheet" href="<?php echo base_url('assets/css/themify-icons.min.css');?>">
      <link href="<?php echo base_url('assets/css/blue.css');?>" rel="stylesheet">
                  <link href="<?php echo base_url('assets/css/datepicker.css');?>" rel="stylesheet">
             <link href="<?php echo base_url('assets/css/ui.jqgrid.css');?>" rel="stylesheet">
               <link href="<?php echo base_url('assets/css/easyui.css');?>" rel="stylesheet">
              <link href="<?php echo base_url('assets/css/fancybox.css');?>" rel="stylesheet">
              <link href="<?php echo base_url('assets/css/select2.min.css');?>" rel="stylesheet">
               <link href="<?php echo base_url('assets/css/bootstrap-lightbox.min.css');?>" rel="stylesheet">
               	<link href="<?php echo base_url('assets/css/animate.min.css');?>" rel="stylesheet" media="screen">
                    <link href="<?php echo base_url('assets/css/neon-core.css');?>" rel="stylesheet">

             <link href="<?php echo base_url('assets/css/perfect-scrollbar.min.css');?>" rel="stylesheet">
                <link href="<?php echo base_url('assets/css/fonts/entypo.css');?>" rel="stylesheet">
                   <link href="<?php echo base_url('assets/css/datepicker.css');?>" rel="stylesheet">
            <script src="<?php echo base_url('assets/js/jquery-1.8.2.min.js');?>"></script>
                    <script src="<?php echo base_url('assets/js/jquery.easyui.min.js');?>"></script>
             <script src="<?php echo base_url('assets/js/jquery-ui-1.10.1.custom.min.js');?>"></script>
             <script src="<?php echo base_url('assets/js/jquery.fancybox-1.3.4.js');?>"></script>
                <script src="<?php echo base_url('assets/js/function5.js');?>"></script>
            <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
              <script src="<?php echo base_url('assets/js/main.js');?>"></script>
           <script src="<?php echo base_url('assets/js/date_time.js');?>"></script>
            <script src="<?php echo base_url('assets/js/tinymce/tinymce.min.js');?>"></script>
             <script src="<?php echo base_url('assets/js/i18n/grid.locale-en.js');?>"></script>
             <script src="<?php echo base_url('assets/js/jquery.jqGrid.min.js');?>"></script>
                <script src="<?php echo base_url('assets/js/perfect-scrollbar.min.js');?>"></script>
                   <script src="<?php echo base_url('assets/js/select2.min.js');?>"></script>
                             <script src="<?php echo base_url('assets/js/main-gsap.js');?>"></script>
                   <script src="<?php echo base_url('assets/js/joinable.js');?>"></script>
                   <script src="<?php echo base_url('assets/js/resizeable3.js');?>"></script>
                    <script src="<?php echo base_url('assets/js/neon-custom3.js');?>"></script>
                       <script src="<?php echo base_url('assets/js/bootstrap-lightbox.js');?>"></script>
                    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>"></script>



 <script type="text/javascript">
   	$(document).ready(function() {
		$(".fancybox").fancybox({
		    openEffect: 'elastic',
            closeEffect: 'elastic',
            width  : 500,
            height : 500,
            autoSize: true,
            type: 'iframe',
            iframe: {
preload: false // fixes issue with iframe and IE
}
});
	});
</script>



   <script>
               $(function () {
    $('.navbar-toggle').click(function () {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
        $('#search').removeClass('in').addClass('collapse').slideUp(200);

        /// uncomment code for absolute positioning tweek see top comment in css
        //$('.absolute-wrapper').toggleClass('slide-in');

    });

   // Remove menu for searching
   $('#search-trigger').click(function () {
        $('.navbar-nav').removeClass('slide-in');
        $('.side-body').removeClass('body-slide-in');

        /// uncomment code for absolute positioning tweek see top comment in css
        //$('.absolute-wrapper').removeClass('slide-in');

    });
});
            </script>
   <script>
			jQuery(document).ready(function() {
				Main.init();

			});
		</script>


 <script>
   $(document).ready(function(){
	$(':input:not([type="submit"])').each(function() {
		$(this).focus(function() {
			$(this).addClass('hilite');
		}).blur(function() {
			$(this).removeClass('hilite');});
	});
              $(".js-example-basic-single").select2({
  placeholder: "Select Data"
});

$('#datatambahan').dialog('close');
   });
  </script>
        </head>
        <body>
          	<div id="app">
			<!-- sidebar -->
        	<div class="sidebar app-aside" id="sidebar">
				<div class="sidebar-container perfect-scrollbar">
					<nav>
						<!-- start: SEARCH FORM -->
						<div class="search-form">
							<a class="s-open" href="#">
								<i class="ti-search"></i>
							</a>
							<form class="navbar-form" role="search">
								<a class="s-remove" href="#" target=".navbar-form">
									<i class="ti-close"></i>
								</a>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Search...">
									<button class="btn search-button" type="submit">
										<i class="ti-search"></i>
									</button>
								</div>
							</form>
						</div>
						<!-- end: SEARCH FORM -->
						<!-- start: MAIN NAVIGATION MENU -->


						<!-- end: MAIN NAVIGATION MENU -->
						<!-- start: CORE FEATURES -->


						<!-- end: CORE FEATURES -->
						<!-- start: DOCUMENTATION BUTTON -->
    <?php echo $_sidebar;?>
						<!-- end: DOCUMENTATION BUTTON -->

					</nav>
				</div>
			</div>
			<!-- / sidebar -->
			<div class="app-content">
				<!-- start: TOP NAVBAR -->
				<header class="navbar navbar-default navbar-static-top">
					<!-- start: NAVBAR HEADER -->
					<div class="navbar-header">

                    	<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle"  data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
							<i class="ti-align-justify"></i>
						</a>
						<a class="navbar-brand" href="#">
							<!--<img src="assets/images/logo5.png" width="70px" height="70px">-->
                             <b>Arwics Aplikasi Pembiayaan</b>
						</a>
                        <a href="#" class="sidebar-toggler pull-right visible-md visible-lg"  data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
							<i class="ti-align-justify"></i>
						</a>
                       
					</div>

					<!-- end: NAVBAR HEADER -->
					<!-- start: NAVBAR COLLAPSE -->
					<div class="navbar-collapse collapse">

						<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
						<div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">


						</div>
						<!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
					</div>


					<!-- end: NAVBAR COLLAPSE -->
				</header>
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >

					<div class="wrap-content container" id="container">
                    	<div class="item-content">
                        	<div class="item-media">
					  		</div>
                            	<div class="item-inner">
                    	  <a href="<?php echo site_url('dashboard/Index');?>">
                            	<i class="ti-headphone-alt"></i><span class="title"> Home </span>
                         </a>
                    <a href="<?php echo site_url('dashboard/logout');?>">
 <span class="glyphicon glyphicon-off"></span>
<span class='title'>Log Out</span>
</a>
<div style="float:right; padding-top:5px;"><?php echo $this->session->userdata('username');?>,
                       <span id="date_time"></span>
            <script type="text/javascript"> WINDOWonload = date_time('date_time');</script>
					 </div>
</div>

</div>








						<div class="container-fluid container-fullw bg-white">
							<div class="row">
                              <div style="height:auto">
                               <?php echo $_content;?>
                                </div>
							</div>
						</div>
						<!-- end: MEDIA OBJECT -->
						<!-- start: IMAGES AND THUMBNAILS -->

						<!-- end: IMAGES AND THUMBNAILS -->
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
			<footer>
				<div class="footer-inner">
					<div class="pull-left">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase">&nbsp;Rommy Design</span>
					</div>
					<div class="pull-right">
						<span class="go-top"><i class="ti-angle-up"></i></span>
					</div>
				</div>
			</footer>
			<!-- end: FOOTER -->
			<!-- start: OFF-SIDEBAR -->
			<div id="off-sidebar" class="sidebar">
				<div class="sidebar-wrapper">
					<ul class="nav nav-tabs nav-justified">
						<li class="active">
							<a href="#off-users" aria-controls="off-users" role="tab" data-toggle="tab">
								<i class="ti-comments"></i>
							</a>
						</li>
						<li>
							<a href="#off-favorites" aria-controls="off-favorites" role="tab" data-toggle="tab">
								<i class="ti-heart"></i>
							</a>
						</li>
						<li>
							<a href="#off-settings" aria-controls="off-settings" role="tab" data-toggle="tab">
								<i class="ti-settings"></i>
							</a>
						</li>
					</ul>

				</div>
			</div>
			<!-- end: OFF-SIDEBAR -->
			<!-- start: SETTINGS -->

			<!-- end: SETTINGS -->
		</div>

        <!-- Core Scripts - Include with every page -->

        </body>
    </html>