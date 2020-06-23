<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="" type="image/png" />
    {{-- <title> {!! MetaTag::tag('title') !!}</title> --}}
	<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Для select связанные товары в админук добавить товар -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/select2/dist/css/select2.css')}}">
    <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/my.css')}}">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<style>
    .wrapper{
        overflow:hidden;
    }
</style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b> Panel</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ucfirst (Auth::user()->name) }} </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                                <p>
                                    {{ ucfirst(Auth::user()->name) }}
                                </p>

                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                     <a href="#" class="btn btn-default btn-flat">Профиль</a>

                                    {{-- <a href="{{route('blog.admin.users.edit',Auth::user()->id)}}" class="btn btn-default btn-flat">Профиль</a> --}}
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                       class="btn btn-default btn-flat">Выход</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ ucfirst (Auth::user()->last_name) }} </p>
                <a href="#"><i class="fa fa-circle text-success"></i>{{ ucfirst (Auth::user()->roles[0]->name) }}</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Меню</li>
                {{-- <li><a href="/"><i class="fa fa-home"></i> <span>В магазин</span></a></li> --}}
                @can('incidents')
                {{-- <li><a href="#"><i class="fa fa-user"></i> <span>Главная админки тест</span></a></li> --}}
                
            <li><a href="{{ route('system.admin.incidents') }}"><i class="fa fa-cogs"></i> <span>Управления инцидентами</span></a></li>
                @endcan
            <li><a href="{{ route('system.admin.logs') }}"><i class="fa fa-list"></i> <span>Инциденты(Лог)</span></a></li>

            @can('roles','permissions')
            <li class="treeview">
                <a href="#"><i class="fa fa-cogs"></i> <span>Администрирование</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('permissions')
                <li><a href="{{ route('system.admin.permissions')}}"><i class="fa fa-cog" aria-hidden="true"></i><span>Права доступа</a></span></li>
                <li><a href="{{ route('system.admin.permissions.create')}}"><i class="fa fa-cog" aria-hidden="true"></i><span>Создать разрешение</a></span></li>
                    @endcan
                    @can('roles')
                    <li><a href="{{ route('system.admin.roles')}}"><i class="fa fa-cog" aria-hidden="true"></i><span>Роли</span></a></li>
                    <li><a href="{{ route('system.admin.roles.create')}}"><i class="fa fa-cog" aria-hidden="true"></i><span>Создать Роль</span></a></li>
                    @endcan
                </ul>
            </li> 
            @endcan
            
            @can('users')
            <li class="treeview">
                    <a href="#"><i class="fa fa-users"></i> <span>Пользователи</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('system.admin.users')}}"> <i class="fa fa-users"></i><span>Список пользователей</span></a>
                    </li>
                        <li><a href="{{ route('system.admin.users.create') }}"><i class="fa fa-user-plus" aria-hidden="true"></i><span>Добавить пользователя</span></a></li>
                    </ul>
                </li>
                @endcan

                @can('specialists')
                <li class="treeview">
                    <a href="#"><i class="fa fa-users"></i> <span>Специалисты</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                    <li><a href="{{ route('system.admin.specialists')}}">  <i class="fa fa-users"></i><span>Список специалистов</span></a></li>
                    <li><a href="{{ route('system.admin.specialists.create')}}"> <i class="fa fa-user-plus"></i><span>Добавить специалиста</span></a></li>
                    </ul>
                </li>
                @endcan

                @can('add_incident')
                    <li><a href="{{ route('system.user.incidents.create')}}"><i class="fa fa-file-text-o"></i> <span>Сообщить об инциденте</span></a></li>
                @endcan

                @can('view_incident')
                    <li><a href="{{ route('system.user.incidents.index')}}"><i class="fa fa-file-text"></i> <span>Инциденты создано мной</span></a></li>
                @endcan

                @can('incident_in_work')
                    <li><a href="{{ route('system.specialist.incidents.inWork')}}"><i class="fa fa-file-text-o"></i> <span>Инциденты в работе</span></a></li>
                @endcan

                @can('incident_done')
                    <li><a href="{{ route('system.specialist.incidents.done')}}"><i class="fa fa-check-square-o"></i> <span>Выполнено</span></a></li>
                @endcan
                <li><a href="{{ route('system.admin.incidents.chart')}}"><i class="fa fa fa-line-chart"></i> <span>Графика</span></a></li>

            </ul>


        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <main id="app">
            {{-- @include('blog.admin.components.result_messages') --}}
            @yield('content')
        </main>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>System &copy; 2020.</strong>
    </footer>

    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

{{-- <script>
    var pathd = '{{PATH}}';
</script> --}}
<!-- jQuery 3 -->
<script src="{{asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- AjaxUpload -->
<script src="{{asset('js/ajaxupload.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Validator -->
<script src="{{asset('js/validator.js')}}"></script>
<script src="{{ asset('/node_modules/zingchart/zingchart.min.js')}}"></script>


<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>


{{-- <script src="{{asset('adminlte/bower_components/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('adminlte/bower_components/ckeditor/adapters/jquery.js')}}"></script>
<script src="{{asset('adminlte/bower_components/select2/dist/js/select2.full.js')}}"></script> --}}


<script src="{{asset('js/my.js')}}"></script>
{{-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>
<script>
  CKEDITOR.replace( 'summary-ckeditor', {
      filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
      filebrowserUploadMethod: 'form'
  });
  </script> --}}
@yield('scripts')
</body>
</html>