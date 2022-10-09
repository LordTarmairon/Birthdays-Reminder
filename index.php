<?php
//require_once 'libs/google-api-php-client-2.4.1/src/contrib/Google_TasksService.php';
/*Clave de Api:
AIzaSyCSZVNgLCxGYW3FWBeE0JRvbytDwv0FvrA

Tu ID de cliente
114634199422-08iddpm7j9fudfur1ij2eositp8vcnfs.apps.googleusercontent.com

Tu secreto de cliente
401XI36GczT3wv6SLH69WIKJ
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Página para insertar en Google Calendar cumpleaños">
    <meta name="author" content="Jose Luis Calleja García">
    <meta name="google-signin-client_id" content="114634199422-08iddpm7j9fudfur1ij2eositp8vcnfs.apps.googleusercontent.com">
    <meta http-equiv="Cache-control" content="no-cache">

    <title>Cumpleañeitors Jose</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/estilos.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Favicon de la web-->
    <link rel="shortcut icon" type="image/png" href="assets/img/rha.png"/>

</head>

<body id="page-top">
    <!-- Esto es el contenido del inicio de sesion -->
    <div id="loggin" class="container ocultar">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <button id="authorize_button" class="btn btn-lg btn-primary btn-block btn-signin" >Iniciar Sesion</button>
        </div>
    </div>

    <div class="col-md-5 centrarInfo ocultar">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-5">
                        <div class="h6 text-xs font-weight-bold text-danger text-uppercase ">
                            Iniciar sesión con tú Gmail</div>
                        <div class="mb-0 text-justify">Es necesario iniciar sesión con tu cuenta de Gmail y otorgar permisos de acceso para poder cargar tu calendario y añadir los cumpleaños.</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Wrapper -->
    <div id="wrapper" style="display: none">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="https://www.birthday.es">
                <div class="sidebar-brand-icon">
                <i class="fas fa-fw  fa-birthday-cake"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Cumpleañeitor</div>
            </a>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                 aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                               placeholder="Search for..." aria-label="Search"
                                               aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        

                        
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a id="userInfo" class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span id="userName" class='mr-2 d-none d-lg-inline text-gray-600 small'></span>
                                <div id="userEmail" style="display:none"></div>
                                <img id="imgUser" class='img-profile rounded-circle' src=''>
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                 aria-labelledby="userDropdown">
                                <button class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Desconectar
                                </button>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Panel de Inicio</h1>
                    </div>
                    <!-- Content Row -->

                    <div class="row">
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Acciones Disponibles</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                             aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Menu Acciones:</div>
                                            <a class="dropdown-item" href="#">Añadir Fecha</a>
                                            <a class="dropdown-item" href="#">Modificar Fecha</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Borrar Fecha</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2 text-center">
                                        <button  class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#crearCumple">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-birthday-cake"></i>
                                                </span>
                                            <span class="text">Añadir Fecha de Cumpleaños</span>
                                        </button>
                                        <br/> <br/>
                                        <button class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-birthday-cake"></i>
                                                </span>
                                            <span class="text"> Modificar Fecha Cumpleaños&nbsp</span>
                                        </button>
                                        <br/> <br/>
                                        <button class="btn btn-google btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-beer"></i>
                                                </span>
                                            <span class="text">Eliminar Fecha Cumpleaños &nbsp;</span>
                                        </button>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Objetivo
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Cumpleaños
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Social
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Vista Previa Google Calendar</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                             aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Desplegable:</div>
                                            <a class="dropdown-item" href="#">Acciones</a>
                                            <a class="dropdown-item" href="#">Otras Acciones</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Imprimir</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div id="iframeCalendar" class="card-body">
                                    <iframe id="calendarioGoogle" class="col-xl-12 col-lg-12" src="" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                    </div>

                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
                <div id="task-data"></div>

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Derechos de Jose, Por Jose y Para Jose <i class="fas fa-grin-wink"></i></span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seguro que quieres Salir</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona "Desconectar" a continuación si estas listo para finalizar tu sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button id="signout_button" class="btn btn-danger" type="button">Desconectar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Incidencia -->
    <div class="modal fade" id="crearCumple" tabindex="-1" role="dialog" arial-labelledby="tituloVentana" arial-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 id="tituloVentana">Añadir Fecha de Cumpleaños</h2>
                    <button class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Inicio -->
                    <form id="crear-incidencia" name="formenvio" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
                        <fieldset>
                            <div class="form-group text-center" id="datosDireccion">
                                <label for='fecha' >Introduce la fecha del Cumpleaños:</label>
                                <input class="form-control" type='date' name='fecha' id='fecha'  value="<?php echo date('Y-m-d');  ?>" required/>
                            </div>
                            <div class="form-group" id="datosDireccion">
                                <label for='nuevotitulo' >Título:</label>
                                <input class="form-control" type='text' size="50" name='nuevotitulo' id='titulo' required />
                            </div>
                            <div class="form-group" id="datosDireccion">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" rows="3"></textarea>
                                <br/>
                                <div  id="alert1" class="alet" style="display: none">
                                    <span class="alert-danger text-center">  Es necesario completar Todos los campos. </span>
                                    <br/><br/>
                                </div>
                            </div>
                            <div class=" col-md-12 text-center">
                                <button class="btn btn-success" type='submit' id='nuevoBirthday'>
                                    Añadir Cumpleaños
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script async defer src="https://apis.google.com/js/api.js"
            onload="this.onload=function(){};handleClientLoad()"
            onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>

        <script type="text/javascript" src="assets/js/codigo.js"></script>
</body>
</html>
