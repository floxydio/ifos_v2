<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
     <link href="<?php echo base_url('assets/css/AdminLTE.min.css');?>" rel="stylesheet">
     <link href="<?php echo base_url('assets/css/blue.css');?>" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>IFOS</b><br>APLIKASI PEMBIAYAAN</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="panel-heading">
                                <span class="glyphicon glyphicon-lock"></span> Silahkan Login
                            </div>

        <form  role="form" action="<?php echo site_url('web/proses');?>" method="post">
                                    <?php echo $this->session->flashdata('message');?>

      <div class="form-group has-feedback">
              <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username" required>
                                   </div>
      <div class="form-group has-feedback">
               <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                                   </div>
      <div class="row">
        <div class="col-xs-8">

              <input type="checkbox"> Remember Me

        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
  <!-- Core Scripts - Include with every page -->
            <script src="<?php echo base_url('assets/js/holder.js');?>"></script>

            <script src="<?php echo base_url('assets/js/jquery-1.10.2.js');?>"></script>
            <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
           

</body>
</html>
