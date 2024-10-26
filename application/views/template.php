<!doctype html>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        .card-img-top {
            box-shadow: 0 20px 10px rgba(0, 0, 0, 0.5);
        }

        .card-body {

            box-shadow: -8px 15px 15px -8px rgba(0, 0, 0, 0.5)
        }

        .card-body h6 {
            font-size: 14px;
            text-transform: uppercase;
            color: deeppink;
        }

        .card-title {
            text-transform: uppercase;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .socials a {
            width: 40px;
            height: 40px;
            display: inline-block;
            border-radius: 50%;
            margin: 0 5px;
        }

        .socials a i {
            color: #fff;
            padding: 12px 0;
        }

        .socials a:nth-child(1) {
            background: #3b5998;
        }

        .socials a:nth-child(2) {
            background: #ff0000;
        }

        .socials a:nth-child(3) {
            background: #007bb5;
        }

        .socials a:nth-child(4) {
            background: #ea4c89;
        }

        @media (max-width: 800px) {
            .mx-30 {
                margin-bottom: 30px;
            }
        }
    </style>
    <title><?php echo $title; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/ui.jqgrid-bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/themify-icons.min.css'); ?>">
    <link href="<?php echo base_url('assets/css/blue.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/datepicker.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/ui.jqgrid.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/easyui.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/fancybox.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/alertify.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/select2.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-lightbox.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('assets/css/neon-core.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/fonts/entypo.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/datepicker.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/alertify.min.js'); ?>"></script>
    <link href="<?php echo base_url('assets/css/alertify.css'); ?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/js/jquery-1.8.2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/idle-timer.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/jquery.easyui.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui-1.10.1.custom.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.fancybox-1.3.4.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/function5.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/date_time.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/tinymce/tinymce.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/i18n/grid.locale-en.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.jqGrid.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/perfect-scrollbar.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/select2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert2@10.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-lightbox.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>



    <script type="text/javascript">
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: 'elastic',
                closeEffect: 'elastic',
                width: 500,
                height: 500,
                autoSize: true,
                type: 'iframe',
                iframe: {
                    preload: false // fixes issue with iframe and IE
                }
            });
        });
    </script>


    <script>
        $(function() {
            $('.navbar-toggle').click(function() {
                $('.navbar-nav').toggleClass('slide-in');
                $('.side-body').toggleClass('body-slide-in');
                $('#search').removeClass('in').addClass('collapse').slideUp(200);

                /// uncomment code for absolute positioning tweek see top comment in css
                //$('.absolute-wrapper').toggleClass('slide-in');

            });

            // Remove menu for searching
            $('#search-trigger').click(function() {
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
        $(document).ready(function() {
            $(':input:not([type="submit"])').each(function() {
                $(this).focus(function() {
                    $(this).addClass('hilite');
                }).blur(function() {
                    $(this).removeClass('hilite');
                });
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
                    <?php echo $_sidebar; ?>
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

                    <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
                        <i class="ti-align-justify"></i>
                    </a>
                    <a class="navbar-brand" href="#">
                        <!--<img src="assets/images/logo5.png" width="70px" height="70px">-->
                        <b>Aplikasi Siap Kredit</b>
                    </a>
                    <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
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
            <div class="main-content">

                <div class="wrap-content container" id="container">
                    <div class="item-content">
                        <div class="item-media">
                        </div>
                        <div class="item-inner">
                            <a href="<?php echo site_url('dashboard/Index'); ?>">
                                <i class="ti-headphone-alt"></i><span class="title"> Home </span>
                            </a>
                            <a href="<?php echo site_url('dashboard/logout'); ?>">
                                <span class="glyphicon glyphicon-off"></span>
                                <span class='title'>Log Out</span>
                            </a>
                            <div style="float:right; padding-top:5px;"><?php echo $this->session->userdata('username'); ?>,
                                <span id="date_time"></span>
                                <script type="text/javascript">
                                    WINDOWonload = date_time('date_time');
                                </script>
                            </div>
                        </div>

                    </div>








                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div style="height:auto">
                                <?php echo $_content; ?>
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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Session Expiration Warning</h4>
                </div>
                <div class="modal-body">
                    <p>You've been inactive for a while. For your security, we'll log you out automatically. Click "Stay Online" to continue your session. </p>
                    <p>Your session will expire in <span class="bold" id="sessionSecondsRemaining">120</span> seconds.</p>
                </div>
                <div class="modal-footer">
                    <button id="extendSession" type="button" class="btn btn-default btn-success" data-dismiss="modal">Stay Online</button>
                    <button id="logoutSession" type="button" class="btn btn-default" data-dismiss="modal">Logout</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function($) {
            var
                session = {
                    //Logout Settings
                    inactiveTimeout: 30000, //(ms) The time until we display a warning message
                    warningTimeout: 30000, //(ms) The time until we log them out
                    minWarning: 5000, //(ms) If they come back to page (on mobile), The minumum amount, before we just log them out
                    warningStart: null, //Date time the warning was started
                    warningTimer: null, //Timer running every second to countdown to logout
                    logout: function() { //Logout function once warningTimeout has expired
                        //window.location = settings.autologout.logouturl;
                        $("#mdlLoggedOut").modal("show");
                    },

                    //Keepalive Settings
                    keepaliveTimer: null,
                    keepaliveUrl: "",
                    keepaliveInterval: 5000, //(ms) the interval to call said url
                    keepAlive: function() {
                        $.ajax({
                            url: session.keepaliveUrl
                        });
                    }
                };


            $(document).on("idle.idleTimer", function(event, elem, obj) {
                //Get time when user was last active
                var
                    diff = (+new Date()) - obj.lastActive - obj.timeout,
                    warning = (+new Date()) - diff;

                //On mobile js is paused, so see if this was triggered while we were sleeping
                if (diff >= session.warningTimeout || warning <= session.minWarning) {
                    $("#mdlLoggedOut").modal("show");
                } else {
                    //Show dialog, and note the time
                    $('#sessionSecondsRemaining').html(Math.round((session.warningTimeout - diff) / 1000));
                    $("#myModal").modal("show");
                    session.warningStart = (+new Date()) - diff;

                    //Update counter downer every second
                    session.warningTimer = setInterval(function() {
                        var remaining = Math.round((session.warningTimeout / 1000) - (((+new Date()) - session.warningStart) / 1000));
                        if (remaining >= 0) {
                            $('#sessionSecondsRemaining').html(remaining);
                        } else {
                            session.logout();
                        }
                    }, 1000)
                }
            });

            // create a timer to keep server session alive, independent of idle timer
            session.keepaliveTimer = setInterval(function() {
                session.keepAlive();
            }, session.keepaliveInterval);

            //User clicked ok to extend session
            $("#extendSession").click(function() {
                clearTimeout(session.warningTimer);
            });
            //User clicked logout
            $("#logoutSession").click(function() {

                window.location.assign("<?php echo site_url('dashboard/logout'); ?>");
            });

            //Set up the timer, if inactive for 10 seconds log them out
            $(document).idleTimer(session.inactiveTimeout);
        })(jQuery);
    </script>

    <script type="text/javascript">
	    var url = window.location.href;
	
        // untuk sidebar menu
        $('ul.main-navigation-menu li a').filter(function() {
            return this.href == url;
        }).parent().siblings().removeClass('active').end().addClass('active');
        // untuk treeview sub menu dan multimenu
        $('ul.sub-menu li a').filter(function() {
            return this.href == url;
        }).parentsUntil(".main-navigation-menu > .sub-menu").siblings().removeClass('active').end().addClass('active').css({
            display: "block"
        });
		
    </script>
</body>

</html>