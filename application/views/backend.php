<!DOCTYPE html>
<html>
  <head>
    <title>Application - <?php echo $title; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url() ?>assets/dist/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/dist/css/font-awesome-3.2.1.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/dist/css/fonts.googleapis.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- DATA TABLES -->
    <link href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/plugins/datatables/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" /> -->
    <!-- datepicker -->
    <link href="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <!-- clockpicker -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/clockpicker/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/custom/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    
    <style>
      .form-control{
        display:inline;
      }
      .help-block{
        margin-bottom: 0px;
      }
      .title2{
        display: inline-block;
        font-size: 18px;
        margin: 0;
        line-height: 1;
        margin-left: 10px;
      }
    </style>

  </head>
  <body class="fixed sidebar-mini skin-black">
     <?php
      $id_pengguna = $this->session->userdata('id_pengguna');
      $grup = get_profil_by_array($id_pengguna, 'grup');
    ?>

    <!-- Site wrapper -->
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url() ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Vania Skin Care</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <?php
                // $foto = get_profil_by_array($id_pengguna, 'foto');
                $foto = "";
                if($foto == ""){
                  $foto = 'noimg.png';
                }
              ?>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url() ?>assets/pictures/<?php echo ($id_pengguna == 'Pegawai') ? "root.jpg" : $foto; ?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo get_profil_by_array($id_pengguna, 'nama_lengkap').' - '.ucfirst($grup); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header" style="padding: 20px;">
                    <img src="<?php echo base_url() ?>assets/pictures/<?php echo ($id_pengguna == 'Pegawai') ? "root.jpg" : $foto; ?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo get_profil_by_array($id_pengguna, 'nama_lengkap').' - '.ucfirst($grup); ?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <?php if($id_pengguna == 0) { ?>
                        <a href="<?php echo base_url() ?>admin/profile_root" class="btn btn-default btn-flat">Ubah Akun</a>
                      <?php }else{ ?>
                        <a href="<?php echo base_url().strtolower($grup).'/profile/'; ?>" class="btn btn-default btn-flat">Ubah Akun</a>
                      <?php } ?>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url() ?>admin/logout" class="btn btn-default btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!-- <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img style="height: 45px;" src="<?php echo base_url() ?>assets/pictures/<?php echo ($id_pengguna == 'Pegawai') ? "root.jpg" : $foto; ?>" class="img-circle" alt="User Image" width="160" />
            </div>
            <div class="pull-left info">
              <p><?php echo get_profil_by_array($id_pengguna, 'nama_lengkap'); ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li <?php echo ($page == 'fa-dashboard') ? 'class="active"' : ''; ?>>
              <a href="<?php echo base_url() ?>admin">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>

            <!-- Menu untuk Admin -->
            <?php if($grup == 'pegawai') { ?>
              <li <?php echo ($page == 'Konsumen') ? 'class="active"' : ''; ?>>
                <a href="<?php echo base_url() ?>pengguna/index/konsumen">
                  <i class="fa fa-user"></i> <span>Kelola Data Konsumen</span>
                </a>
              </li>
              <li class="treeview <?php if( $page == 'Produk' || $page == 'Jenis Produk'){echo 'active'; } ?>">
                <a href="#">
                  <i class="fa fa-cubes"></i>
                  <span>Kelola Katalog Produk</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li <?php echo ($page == 'Produk') ? 'class="active"' : ''; ?>><a href="<?php echo base_url() ?>produk"><i class="fa fa-chevron-circle-right"></i> Produk</a></li>
                  <li <?php echo ($page == 'Jenis Produk') ? 'class="active"' : ''; ?>><a href="<?php echo base_url() ?>jenis_produk"><i class="fa fa-chevron-circle-right"></i> Jenis Produk</a></li>
                </ul>
              </li>
              <li class="treeview <?php if( $page == 'Jasa Pengiriman' || $page == 'Paket Pengiriman'){echo 'active'; } ?>">
                <a href="#">
                  <i class="fa fa-truck"></i>
                  <span>Kelola Jasa Pengiriman</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li <?php echo ($page == 'Jasa Pengiriman') ? 'class="active"' : ''; ?>><a href="<?php echo base_url() ?>jasa_pengiriman"><i class="fa fa-chevron-circle-right"></i> Jasa Pengiriman</a></li>
                  <li <?php echo ($page == 'Paket Pengiriman') ? 'class="active"' : ''; ?>><a href="<?php echo base_url() ?>paket_pengiriman"><i class="fa fa-chevron-circle-right"></i> Paket Pengiriman</a></li>
                </ul>
              </li>
              <li class="treeview  <?php echo ($page == 'Pembayaran') ? 'active' : ''; ?>">
                <a href="<?php echo base_url() ?>pembayaran">
                  <i class="fa fa-credit-card"></i> <span>Kelola Data Pembayaran</span>
                </a>
              </li>
              <li class="treeview  <?php echo ($page == 'Pengiriman') ? 'active' : ''; ?>">
                <a href="<?php echo base_url() ?>pengiriman">
                  <i class="fa fa-truck"></i> <span>Kelola Status Pengiriman</span>
                </a>
              </li>
              <li class="treeview  <?php echo ($page == 'Laporan') ? 'active' : ''; ?>">
                <a href="<?php echo base_url() ?>users/index">
                  <i class="fa fa-bar-chart"></i> <span>Laporan Penjualan</span>
                </a>
              </li>
            <?php } ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $page; ?>
            <small><?php echo $description; ?></small>
          </h1>

          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol> -->
          <?php echo $this->breadcrumbs->show(); ?>
        </section>

        <!-- Main content -->
        <section class="content">
          <?php $this->load->view('notice'); ?>
          <?= $contents ?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; <?php date('Y-m-d') ?> <a href="<?php echo base_url() ?>">Vania Skin Care Application</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url() ?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>assets/dist/js/app.min.js" type="text/javascript"></script>
    
    <!-- Demo -->
    <script src="<?php echo base_url() ?>assets/dist/js/demo.js" type="text/javascript"></script>

    <!-- datatable -->
    <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>

    <!-- datepicker -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
     <!-- clockpicker -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/clockpicker/bootstrap-clockpicker.min.js"></script>
    <!-- bootbox -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/bootbox/bootbox.js"></script>

    <script type="text/javascript">
      $(function(){
        $('.datepicker').datepicker({
          format: 'yyyy-mm-dd',
          //startDate: '-3d',
          autoclose: true,
        });

        $(".confirm").on("click", function(event) {
          event.preventDefault();
          var link = $(this).attr('href');;
          bootbox.confirm("Anda yakin akan menjalankan aksi ini? Aksi ini tidak dapat dikembalikan.", function(result) {
            if(result) {
              window.location.href = link;
            }
          });
        });

        $('.clockpicker').clockpicker();
        $('#datatable').DataTable({
          "bSort" : false
        });
      });

      // $(".alert").fadeTo(2000, 500).slideUp(500, function(){
      //     $(".alert").alert('close');
      // });
       
      function isNumberKey(evt)
      {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
        return true;
      }

      function isCharKey(evt)
      {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode != 32 && charCode < 65 && charCode > 46)
          return false;
        return true;
      }
    </script>
  </body>
</html>