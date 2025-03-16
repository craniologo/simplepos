<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>SIMPLEPOS | GRATIS</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link href="dist/css/skins/skin-blue-light.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="plugins/jquery/jquery-2.1.4.min.js"></script>
    <script src="plugins/morris/raphael-min.js"></script>
    <script src="plugins/morris/morris.js"></script>
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <link rel="stylesheet" href="plugins/morris/example.css">

  </head>

  <body class="<?php if(isset($_SESSION["user_id"])):?>  skin-blue-light sidebar-collapse sidebar-mini <?php else:?>login-page<?php endif; ?>" style="background: url(storage/configuration/background.jpg) no-repeat center center fixed;">
    <div class="wrapper">
      <!-- Main Header -->
      <?php if(isset($_SESSION["user_id"])):?>
      <header class="main-header">
        <!-- Logo -->
        <a href="./" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">S<b>P</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SIMPLE</b>POS</span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <?php $u=null;
          if(isset($_SESSION["user_id"]) &&$_SESSION["user_id"]!=""):
          $u = UserData::getById($_SESSION["user_id"]); ?>
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu"> <!-- Navbar Right Menu -->
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="">¡Bienvenid@ <?php if(isset($_SESSION["user_id"])){ echo UserData::getById($_SESSION["user_id"])->name; }?>!</span>
                </a>
                <ul class="dropdown-menu"><!-- The user image in the menu -->
                  <li class="user-header">
                    <?php if($u->image!=""){
                    $url = "storage/profiles/".$u->image;
                    if(file_exists($url)){
                      echo "<img src='$url' class='img-circle'>";
                    } }else{
                      echo "<img src='storage/profiles/default.jpg' class='img-circle'>";
                    } ?>
                    <p><?php echo $u->name." ".$u->lastname; ?></p>
                    <p><?php if($u->is_admin==1){ echo " (Administrador)"; }else if($u->is_admin==2){ echo " (Vendedor)"; } ?></p>
                  </li>                  <!-- The user image in the menu -->
                  <!--<li><a href="">Cambiar de usuario</a></li>-->
                  <!-- Menu Footer-->
                  <li class="user-footer"><!-- Menu Footer-->
                    <div class="pull-right">
                      <a href="./?view=profile" class="btn btn-default btn-flat">Mi Perfil</a>
                      <a href="./logout.php" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li><!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <section class="sidebar">
          <ul class="sidebar-menu"> <!-- Sidebar Menu -->
            <li class="header">ADMINISTRACION</li>
            <li><a href="./index.php?view=home"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
            <li><a href="index.php?view=alerts"><i class="fa fa-warning"></i> <span>Alertas</span></a></li>
            <li><a href="./index.php?view=sell"><i class='fa fa-shopping-cart'></i> <span>Vender</span></a></li>
            <?php if($u->is_admin==0):?>
            <li><a href="./index.php?view=products"><i class='fa fa-apple'></i> <span>Productos</span></a></li>
            <li><a href="./index.php?view=sells"><i class='fa fa-dollar'></i> <span>Ventas</span></a></li>
            <li><a href="index.php?view=spends"><i class="fa fa-coffee"></i> <span>Gastos</span></a></li>
          <?php endif;?>
          <?php if($u->is_admin==1):?>
            <li class="treeview">
              <a href="#"><i class='fa fa-th-list'></i> <span>Catálogos</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="./index.php?view=categories"><i class="fa fa-th-list"></i> Categorias</a></li>
                <li><a href="./index.php?view=products"><i class='fa fa-apple'></i> <span>Productos</span></a></li>
                <li><a href="index.php?view=clients"><i class="fa fa-users"></i> <span>Clientes</span></a></li>
                <li><a href="index.php?view=providers"><i class="fa fa-truck"></i> <span>Proveedores</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-money'></i> <span>Finanzas</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="./index.php?view=sells"><i class='fa fa-dollar'></i> <span>Ventas</span></a></li>
                <li><a href="index.php?view=box"><i class="fa fa-archive"></i> <span>Caja</span></a></li>
                <li><a href="index.php?view=box_history"><i class="fa fa-archive"></i> <span>Cortes/Caja</span></a></li>
                <li><a href="index.php?view=spends"><i class="fa fa-coffee"></i> <span>Gastos</span></a></li>
                <li><a href="index.php?view=balance"><i class="fa fa-area-chart"></i> <span>Balance</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-bar-chart-o'></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="./index.php?view=analytic"><i class='fa fa-dashboard'></i> <span>Analytics</span></a></li>
                <!-- <li><a href="./index.php?view=sellreports"><i class="fa fa-list-ol"></i> <span>Ventas</span></a></li>
                <li><a href="./index.php?view=sell_user"><i class="fa fa-users"></i> <span>Usuarios</span></a></li> -->
                <li><a href="index.php?view=gencodebar"><i class="fa fa-barcode"></i> <span>Código de barras</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-cubes'></i> <span>Inventario</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="index.php?view=inventary"><i class="fa fa-area-chart"></i> <span>Stock</span></a></li>
                <li><a href="index.php?view=res"><i class="fa fa-th-list"></i> <span>Reabastecimientos</span></a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class='fa fa-cog'></i><span>Administracion</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="index.php?view=configuration"><i class="fa fa-wrench"></i> Configuración</a></li>
                <li><a href="./?view=users"><i class='fa fa-users'></i>Usuarios</a></li>
              </ul>
            </li>
          <?php endif;?>
          </ul> <!-- /.sidebar-menu -->
        </section> <!-- /.sidebar -->
      </aside>
      <?php endif;?>
    <?php endif;?>

      <!-- Content Wrapper. Contains page content -->
      <?php if(isset($_SESSION["user_id"])):?>
      <div class="content-wrapper">
        <?php View::load("index");?>
      </div><!-- /.content-wrapper -->
        <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 7.4
        </div>
        <strong>Copyright &copy; <?php echo Date("Y"); ?> <a href="https://www.sergestec.com" target="_blank">Sergestec</a></strong>
      </footer>
      <?php else:?>
      <div class="content">
        <div class="login-box">
          <div class="login-box-body">
            <center><img src="storage/configuration/logo.jpg" width="300"></center>
            <h1 style="text-align: center;">SISTEMA DE VENTAS SIMPLEPOS</h1><br>
            <form action="./?action=processlogin" method="post">
              <div class="form-group has-feedback">
                <!-- <input type="text" name="username" required class="form-control" placeholder="Usuario" value="admin"/> -->
                <select name="username" class="form-control">
                  <option value="admin">Administrador</option>
                  <option value="mtalavera">Vendedor 1</option>
                  <option value="tpuente">Vendedor 2</option>
                </select>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" name="password" required class="form-control" placeholder="Password" value="admin"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
                </div><!-- /.col -->
              </div>
            </form>
          </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
      </div>
      <?php endif;?>
    </div><!-- ./wrapper -->
    <script src="plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".datatable").DataTable({
          "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
        });
      });
    </script>
  </body>
</html>