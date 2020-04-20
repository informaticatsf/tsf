

<html lang="es">
<?php use App\Models\Periodo ?>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')Textiles San Francisco</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <!-- JS file -->
    <script src="{{ asset('js/jquery.easy-autocomplete.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easy-autocomplete.js') }}"></script>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('js/easy-autocomplete.css') }}">
    <link rel="stylesheet" href="{{ asset('js/easy-autocomplete.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/easy-autocomplete.themes.css') }}">
    <link rel="stylesheet" href="{{ asset('js/easy-autocomplete.themes.min.css') }}">

    <link rel="stylesheet" href="{{ asset('js/maps/easy-autocomplete.css.map') }}">
    <link rel="stylesheet" href="{{ asset('js/maps/easy-autocomplete.min.css.map') }}">
    <link rel="stylesheet" href="{{ asset('js/maps/easy-autocomplete.themes.css.map') }}">
    <link rel="stylesheet" href="{{ asset('js/maps/easy-autocomplete.themes.min.css.map') }}">




    <link rel="shortcut icon" href="{{ asset('images/ico.png') }} ">
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atlantis.css') }}">
    <link href="{{ asset('vendor/bootstrap-daterangepicker/bootstrap-datepicker.css') }}" rel="stylesheet">
    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset('assets/css/fonts.min.css') }}']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark2">

                <a href="{{ route('home')}}" class="logo">
                    <img src="{{ asset('assets/img/logo.png') }}" width="150px" alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg" data-background-color="white">
            <div class="container-fluid">
                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="avatar-sm">
                                <img src="{{ asset('assets/img/user_icon.png') }}" alt="..."
                                     class="avatar-img rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img src="{{ asset('assets/img/user_icon.png') }}"
                                                                    alt="image profile" class="avatar-img rounded">
                                        </div>
                                        @if(!Auth::guest())
                                        <div class="u-text">
                                            <h4>{{ Auth::user()->name }}</h4>
                                            <p class="text-muted">{{ Auth::user()->email }}</p><a href="#"
                                        class="btn btn-xs btn-primary btn-sm">Perfil</a>
                                        </div>
                                         @endif   
                                    </div>
                                </li>
                                <li>
                                @if(!Auth::guest())
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    @endif
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2" data-background-color="dark">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="{{ asset('assets/img/user_icon.png') }}" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                @if(!Auth::guest())
                                    <span>
                                    {{ Auth::user()->name }}
                                    </span>
                                @endif
                            </a>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                    @if(session()->get('inicio')[0]==null)
                        <li class="nav-item">
                            <a href="{{ route('periodo.show','0312') }}">
                                <i class="far fa-calendar-minus"></i>                        
                                <p><FONT SIZE=2>Seleccione periodo</FONT></p>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('periodo.show','0312') }}">
                                <i class="far fa-calendar-minus"></i>                        
                                <p><FONT SIZE=1>Del {{session()->get('inicio')[0]}} Al {{session()->get('fin')[0]}}</FONT></p>
                            </a>
                        </li>
                    @endif

                    @if(session()->get('nombreconta')[0][0]==null)
                        <li class="nav-item">
                            <a href="{{ route('lconta.show','0312') }}">
                                <i class="fas fa-columns"></i>
                                <p><FONT SIZE=2>Seleccione sucursal</FONT></p>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('lconta.show','0312') }}">
                                <i class="fas fa-columns"></i>
                                <p><FONT SIZE=2>{{session()->get('nombreconta')[0][0]}}/{{session()->get('nombreconta')[0][1]}}/{{session()->get('nombreconta')[0][2]}}</FONT></p>
                            </a>
                        </li>
                    @endif
                    @if(session()->get('nombreconta')[0][0]!=null)
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#listaventas">
                                <i class="fas fa-coins"></i>
                                <p>Ventas</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="listaventas">
                                <ul class="nav nav-collapse">
                        
                                    @if(session()->get('namecuentaconta')[0]!=null)
                                        <li class="nav-item">
                                            <a href="{{ route('cuentacontable.show','0312') }}">
                                                <i class="fas fa-file-contract"></i>
                                                <p><FONT SIZE=2>{{session()->get('namecuentaconta')[0]}}</FONT></p>
                                            </a>
                                        </li>                        
                                    @else
                                        <li class="nav-item">
                                            <a href="{{ route('cuentacontable.show','0312') }}">
                                                <i class="fas fa-file-contract"></i>
                                                <p><FONT SIZE=2>Selecciona cuenta contable</FONT></p>
                                            </a>
                                        </li>
                                    @endif

                                    @if(session()->get('namecuentaconta')[0] != null && session()->get('nombreconta')[0][0]!=null && session()->get('inicio')[0]!=null)
                                        <li class="nav-item">
                                            <p hidden="hidden">{{$d= session()->get('contabilidad')[0]}}</p>
                                                <a href="{{route('venta.create',$d)}}">
                                                    <i class="fas fa-hand-holding-usd"></i>
                                                    <p>Ventas</p>
                                                </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                        
                    @if(session()->get('nombreconta')[0][0]!=null)
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#listainventarios">
                                <i class="fas fa-warehouse"></i>
                                <p>Inventarios</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="listainventarios">
                                <ul class="nav nav-collapse">
                                    @if(session()->get('nombreconta')[0][0]!=null)
                                        @if(session()->get('inventario')[0][0]!=null)
                                            <li class="nav-item">
                                                <p hidden="hidden">{{$d= session()->get('contabilidad')[0]}}</p>
                                                    <a href="{{ route('inventariofiscal.show',[$d,'0312'])}}">
                                                        <i class="fas fa-boxes"></i>                     
                                                        <p><FONT SIZE=2>{{session()->get('inventario')[0][0]}} - {{session()->get('inventario')[0][1]}} - {{session()->get('inventario')[0][2]}}</FONT></p>
                                                    </a>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <p hidden="hidden">{{$d= session()->get('contabilidad')[0]}}</p>
                                                    <a href="{{ route('inventariofiscal.show',[$d,'0312'])}}">
                                                        <i class="fas fa-boxes"></i>                     
                                                        <p><FONT SIZE=2>Seleccione inventario</FONT></p>
                                                    </a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item">
                                            <a href="{{ route('lconta.show','0312') }}">
                                                <i class="fas fa-columns"></i>
                                                <p><FONT SIZE=2>Seleccione sucursal</FONT></p>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif

                        <li class="nav-item">
                            <a href="">
                                <i class="fas fa-user-circle"></i>
                                <p></p>
                            </a>
                        </li>

                        @canany (['permiso-progra','crear-sup-conta'])
                            <li class="nav-item">
                                <a data-toggle="collapse" href="#sistema">
                                    <i class="fas fa-cogs"></i>
                                    <p>Sistema</p>
                                    <span class="caret"></span>
                                </a>
                                    <div class="collapse" id="sistema">
                                        <ul class="nav nav-collapse">
                                           <li>
                                               <a href="{{route('cuentacontable.show','0312')}}">
                                                    <span class="sub-item">Cuentas Contables</span>
                                               </a>
                                            </li>

                                            <li>
                                                <a href="{{route('contribuyente.show','0312')}}">
                                                    <span class="sub-item">Contribuyentes</span>
                                                </a>
                                            </li>
                                
                                            <li>
                                                <a href="{{route('periodo.show','0312')}}">
                                                    <span class="sub-item">Periodos</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{route('proveedor.show','0312')}}">
                                                    <span class="sub-item">Proveedores</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{route('regimen.show','0312')}}">
                                                    <span class="sub-item">Regímenes</span>
                                                </a>
                                            </li>

                                            <li>    
                                                <a href="{{route('tipodoc.show','0312')}}">
                                                    <span class="sub-item">Tipos de Documentos</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{route('tipocuentacontable.show','0312')}}">
                                                    <span class="sub-item">Tipos de Cuentas</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{route('tipoentrada.show','0312')}}">
                                                    <span class="sub-item">Tipos de Ventas</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                            </li>
                        @endcanany

                        @canany (['permiso-progra','roles.index'])
                            <li class="nav-item">
                                <a data-toggle="collapse" href="#usuarios">
                                    <i class="fas fa-users"></i>
                                    <p>Usuarios</p>
                                    <span class="caret"></span>
                                </a>
                                    <div class="collapse" id="usuarios">
                                        <ul class="nav nav-collapse">
                                            @can('permiso-progra')
                                                <li>
                                                    <a href="{{ route('users.index', '0312') }}">
                                                        <span class="sub-item">Usuarios</span>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can ('roles.index')
                                                <li>
                                                    <a href="{{ route('roles.index') }}">
                                                        <span class="sub-item">Roles</span>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                            </li>
                        @endcanany
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                @if(session('info'))
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="alert alert-success">
                                    {{ session('info') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @yield('contenido')
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="copyright ml-auto">
                            Textiles San Francisco <i class="far fa-copyright"></i> {{date('Y')}}
                        </div>
                    </div>
                </footer>
                
            </div>
        </div>
    </div>
    

    <!--   Core JS Files   -->

    
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Atlantis JS -->
    <script src="{{ asset('assets/js/atlantis.min.js') }}"></script>

    
    <script src="{{ asset('vendor/bootstrap-daterangepicker/bootstrap-datepicker.js') }}"></script>
    @yield('js')
</body>
</html>
