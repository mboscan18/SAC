<!DOCTYPE html>
<!--
Copyright © 2015 - Todos los derechos reservados
Diseño y Desrrollo por Miguel A. Boscan S.
"Los valores son importantes fuerzas impulsoras del como hacemos nuestro trabajo"
-->
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="{!!URL::asset('img/favicon.png')!!}">

    <title>@yield('page-title')</title>

    <!-- Bootstrap CSS -->    
    {!!Html::style('css/bootstrap.min.css')!!}
    <!-- bootstrap theme -->
    {!!Html::style('css/bootstrap-theme.css')!!}
    <!--external css-->
    <!-- font icon -->
    {!!Html::style('css/elegant-icons-style.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    <!-- Custom styles -->
    {!!Html::style('css/style.css')!!}
    {!!Html::style('css/estilos.css')!!}
    {!!Html::style('css/style-responsive.css')!!}

    <!-- DataTables -->
    {!!Html::style('DataTables/css/dataTables.bootstrap.min.css')!!}
    {!!Html::style('DataTables/css/buttons.bootstrap.css')!!}


    


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">

      @section('navbar')
      <!--header start-->
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Menu de Opciones" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            @if(Auth::user()->rol_Usuario == 'administrador')
                <a href="{!!URL::to('/Administrador')!!}" class="logo tam-13 color-crema">Sistema<span class=" lite color-light-blue"> Administracion Contratos</span></a>
            @elseif(Auth::user()->rol_Usuario == 'supervisor')    
                <a href="{!!URL::to('/Supervisor')!!}" class="logo tam-13 color-crema">S<span class=" lite color-light-blue">AC</span></a>
            @elseif(Auth::user()->rol_Usuario == 'residente')  
                <a href="{!!URL::to('/Residente')!!}" class="logo tam-13 color-crema">S<span class=" lite color-light-blue">AC</span></a>
            @elseif(Auth::user()->rol_Usuario == 'contador')  
                <a href="{!!URL::to('/Contador')!!}" class="logo tam-13 color-crema">S<span class=" lite color-light-blue">AC</span></a>
            @endif
            <!--logo end-->
                           

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span >
                                <img alt="" src="{!!URL::asset('/img/logo.PNG')!!}" style="height: 35px;">
                            </span>
                            <span class="username">
                                                             
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <p >Nombre Completo de la Empresa</p>
                            </li>
                            <li>
                                <a href="#"><i class="icon_key_alt"></i>Elejir Empresa Preferida</a>
                            </li>
                            <li>
                                <a ></a>
                            </li>
                        </ul>
                    </li>
                    
                        
                    <!-- inbox notificatoin start-->
                    <li id="mail_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
                            <span class="badge bg-important">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">Tienes 5 mensajes nuevos</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="{!!URL::asset('/img/avatar-mini.jpg')!!}"></span>
                                    <span class="subject">
                                        <span class="from">Greg  Martin</span>
                                        <span class="time">1 min</span>
                                    </span>
                                    <span class="message">
                                        I really like this admin panel.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="{!!URL::asset('/img/avatar-mini2.jpg')!!}"></span>
                                    <span class="subject">
                                    <span class="from">Bob   Mckenzie</span>
                                    <span class="time">5 mins</span>
                                    </span>
                                    <span class="message">
                                     Hi, What is next project plan?
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="{!!URL::asset('/img/avatar-mini3.jpg')!!}"></span>
                                    <span class="subject">
                                    <span class="from">Phillip   Park</span>
                                    <span class="time">2 hrs</span>
                                    </span>
                                    <span class="message">
                                        I am like to buy this Admin Template.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="{!!URL::asset('/img/avatar-mini4.jpg')!!}"></span>
                                    <span class="subject">
                                    <span class="from">Ray   Munoz</span>
                                    <span class="time">1 day</span>
                                    </span>
                                    <span class="message">
                                        Icon fonts are great.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">Ver todos los Mensajes</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox notificatoin end -->
                    <!-- alert notification start-->
                    <li id="alert_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-l"></i>
                            <span class="badge bg-important">4</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">Tienes 4 notificaciones nuevas</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-primary"><i class="icon_profile"></i></span> 
                                    Friend Request
                                    <span class="small italic pull-right">5 mins</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-warning"><i class="icon_pin"></i></span>  
                                    John location.
                                    <span class="small italic pull-right">50 mins</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-danger"><i class="icon_book_alt"></i></span> 
                                    Project 3 Completed.
                                    <span class="small italic pull-right">1 hr</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-success"><i class="icon_like"></i></span> 
                                    Mick appreciated your work.
                                    <span class="small italic pull-right"> Today</span>
                                </a>
                            </li>                            
                            <li>
                                <a href="#">Ver todas las Notificaciones</a>
                            </li>
                        </ul>
                    </li>
                    <!-- alert notification end-->

                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                @if(Auth::user()->foto != null)
                                    <img alt="" src="{!!URL::asset('/archivos/'.Auth::user()->foto)!!}" style="height: 35px; width: 35px">
                                @else
                                    <img alt="" src="{!!URL::asset('/img/no_usuario.PNG')!!}" style="height: 35px; width: 35px">    
                                @endif    
                            </span>
                            <span class="username">
                                @if(Auth::check())
                                    {!!Auth::user()->nombre_Usuario!!} {!!Auth::user()->apellido_Usuario!!}
                                @else
                                    Inicie Sesion
                                @endif    
                                
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="{!!URL::to('/Usuarios/'.Auth::user()->id.'/edit')!!}"><i class="icon_profile"></i> Perfil</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_mail_alt"></i> Mensajes</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bell-o"></i> Notificaciones</a>
                            </li>
                            <li>
                                <a href="{!!URL::to('Logout')!!}"><i class="fa fa-sign-out"></i> Cerrar Sesion</a>
                            </li>
                            
                            <li>
                                @if(Auth::user()->rol_Usuario == 'administrador')
                                        <a href="{!!URL::to('/Administrador')!!}"><i class="icon_key"></i> Administrador</a>
                                    @elseif(Auth::user()->rol_Usuario == 'supervisor')    
                                        <a href="{!!URL::to('/Supervisor')!!}"><i class="fa fa-eye"></i> Supervisor</a>
                                    @elseif(Auth::user()->rol_Usuario == 'residente')  
                                        <a href="{!!URL::to('/Residente')!!}"><i class="icon_building_alt"></i> Adm. de Contratos</a>
                                    @elseif(Auth::user()->rol_Usuario == 'contador')  
                                        <a href="{!!URL::to('/Contador')!!}"><i class="icon_calulator"></i> Adm. de Finanzas</a>
                                    @endif
                            </li>
                        </ul>
                        
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->
      @show
      
      @section('sidebar')
      <!--sidebar start-->
      <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">                
                <li class="">
                    @if(Auth::user()->rol_Usuario == 'administrador')
                        <a class="" href="{!!URL::to('/Administrador')!!}">
                            <i class="icon_house_alt"></i>
                            <span>Inicio</span>
                        </a>
                    @elseif(Auth::user()->rol_Usuario == 'supervisor')    
                        <a class="" href="{!!URL::to('/Supervisor')!!}">
                            <i class="icon_house_alt"></i>
                            <span>Inicio</span>
                        </a>
                    @elseif(Auth::user()->rol_Usuario == 'residente')  
                        <a class="" href="{!!URL::to('/Residente')!!}">
                            <i class="icon_house_alt"></i>
                            <span>Inicio</span>
                        </a>
                    @elseif(Auth::user()->rol_Usuario == 'contador')  
                        <a class="" href="{!!URL::to('/Contador')!!}">
                            <i class="icon_house_alt"></i>
                            <span>Inicio</span>
                        </a>
                    @endif
                    
                </li>
                </li>       
                <li class="sub-menu">
                    <a href="{!!URL::to('ProyectosUsuario/'.Auth::user()->id)!!}" class="">
                        <img alt="" src="{!!URL::asset('/img/icon_project.png')!!}" style="height: 25px">
                        <span>Proyectos</span>
                    </a>
                </li>

                <li class="sub-menu">                     
                    <a href="javascript:;" class="">
                        <i class="fa fa-credit-card"></i>
                        <span>Pagos</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="#GenerarPago">Crear Pago</a></li>
                        <li><a class="" href="#ConsultarPago">Consultar Pagos</a></li>
                        <li><a class="" href="#FacturarValuacion">Facturar Valuacion</a></li>
                    </ul>
                                       
                </li>
                <li class="sub-menu ">
                    <a href="javascript:;" class="">
                        <i class="fa fa-database"></i>
                        <span>Datos</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
                    <ul class="sub">                          
                        <li><a class="" href="{!!URL::to('/Empresas')!!}"><i class=" icon_building"></i> Empresas</a></li>
                        <li><a class="" href="{!!URL::to('/DatosBancarios')!!}"><i class="fa fa-credit-card"></i> Datos Bancarios</a></li>
                        <li><a class="" href="{!!URL::to('/Capitulos')!!}"><i class="fa fa-book"></i> Capitulos</a></li>
                        <li><a class="" href="{!!URL::to('/CentrosCosto')!!}"><i class="icon_documents"></i> Centros de Costo</a></li>
                        <li><a class="" href="{!!URL::to('/Retenciones')!!}"><i class="icon_tags_alt"></i>Retenciones</a></li>
                        <li><a class="" href="{!!URL::to('/Firmantes')!!}"><i class="fa fa-pencil"></i>Firmantes</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="{!!URL::to('Usuarios')!!}" class="">
                        <i class=" icon_group"></i>
                        <span>Usuarios</span>
                    </a>
                
                
                
            </ul>
            <!-- sidebar menu end-->
        </div>
      </aside>
      <!--sidebar end-->
      @show
      <section id="main-content">
          <section class="wrapper">
            @section('navigate')
              <div class="row">
                  <div class="col-lg-12">
                      @section('titulo')  
                        <h3 class="page-header"><i class="fa fa fa-bars"></i>Titulo</h3>
                      @show
                      <ol class="breadcrumb">
                            @if(Auth::user()->rol_Usuario == 'administrador')
                                <li><i class="fa fa-home"></i><a href="{!!URL::to('/Administrador')!!}">Home</a></li>
                            @elseif(Auth::user()->rol_Usuario == 'supervisor')  
                                <li><i class="fa fa-home"></i><a href="{!!URL::to('/Supervisor')!!}">Home</a></li>
                            @elseif(Auth::user()->rol_Usuario == 'residente')
                                <li><i class="fa fa-home"></i><a href="{!!URL::to('/Residente')!!}">Home</a></li>
                            @elseif(Auth::user()->rol_Usuario == 'contador')  
                                <li><i class="fa fa-home"></i><a href="{!!URL::to('/Contador')!!}">Home</a></li>
                            @endif

                            @section('lugar')
                                <li><i class="fa fa-bars"></i> Titulo</li>
                            @show
                            @section('accion')
                                
                            @show    
                      </ol>
                  </div>
              </div>
            @show  

      <!--main content start-->
      @yield('content')
      <!--main content end-->
           </section>
      </section>
    
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    {!!Html::script('js/jquery.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}

    <!-- DataTable -->
    {!!Html::script('DataTables/js/jquery.dataTables.min.js')!!}
    {!!Html::script('DataTables/js/dataTables.bootstrap.js')!!}
    {!!Html::script('DataTables/js/dataTables.buttons.min.js')!!}
    {!!Html::script('DataTables/js/buttons.bootstrap.js')!!}
    {!!Html::script('DataTables/js/buttons.flash.min.js')!!}
    {!!Html::script('DataTables/js/jszip.min.js')!!}
    {!!Html::script('DataTables/js/pdfmake.min.js')!!}
    {!!Html::script('DataTables/js/vfs_fonts.js')!!}
    {!!Html::script('DataTables/js/buttons.html5.min.js')!!}
    {!!Html::script('DataTables/js/buttons.colVis.min.js')!!}

    

    <!-- nice scroll -->
    {!!Html::script('js/jquery.scrollTo.min.js')!!}
    {!!Html::script('js/jquery.nicescroll.js')!!}
    {!!Html::script('js/scripts.js')!!}

    @section('scripts')

    @show

    



  </body>
</html>
