<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    {!!Html::style('css/admin.css')!!}

</head>

<body>

<div id="wrapper">


    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">CRUD</a>
        </div>


        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">@if(Auth::User()){!! Auth::user()->nombres !!}@endif
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{route('auth.logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>


        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    @if(Auth::User())
                        @if(Auth::user()->id == 1136883231)
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i>Usuario<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! URL::to('/usuario/create') !!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{!! URL::to('/usuario') !!}"><i class='fa fa-list-ol fa-fw'></i> Usuarios</a>
                                </li>
                            </ul>
                        </li>
                    <li>
                        <a href="#"><i class="fa fa-film fa-fw"></i>Paises<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! URL::to('/pais/create') !!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                            </li>
                            <li>
                                <a href="{!! URL::to('/pais') !!}"><i class='fa fa-list-ol fa-fw'></i> Paises</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-child fa-fw"></i>Departamentos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! URL::to('/departamento/create') !!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                            </li>
                            <li>
                                <a href="{!! URL::to('/departamento') !!}"><i class='fa fa-list-ol fa-fw'></i> Departamentos</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-child fa-fw"></i>Municipios<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!! URL::to('/municipio/create') !!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                            </li>
                            <li>
                                <a href="{!! URL::to('/municipio') !!}"><i class='fa fa-list-ol fa-fw'></i> Municipios</a>
                            </li>
                        </ul>
                    </li>
                        @endif
                            <li>
                                <a href="#"><i class="fa fa-child fa-fw"></i>Correos<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!! URL::to('/correo/create') !!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                    </li>
                                    <li>
                                        <a href="{!! URL::to('/correo') !!}"><i class='fa fa-list-ol fa-fw'></i> Correos</a>
                                    </li>
                                </ul>
                            </li>
                @endif
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-wrapper">
        @yield('content')
    </div>

</div>

{!!Html::script('js/jquery.min.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}
{!!Html::script('js/metisMenu.min.js')!!}
{!!Html::script('js/sb-admin-2.js')!!}

@section('scripts')

@show



</body>

</html>