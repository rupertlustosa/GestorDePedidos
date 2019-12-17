<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestor de Pedidos</title>

    {{--<link href="/assets/panel/css/bootstrap.min.css" rel="stylesheet">--}}
    <link href="/css/app.css" rel="stylesheet">
    <link href="/assets/panel/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/assets/panel/css/animate.css" rel="stylesheet">
    <link href="/assets/panel/css/style.css" rel="stylesheet">
    <style>
        .loading-screen-inspinia {
            z-index: 3000 !important;
        }
    </style>
</head>

<body>

<div v-html="customHTML">
    <v-app id="app">

    </v-app>

</div>

{{--<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">Example user</span>
                            <span class="text-muted text-xs block">menu <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li class="active">
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Main view</span></a>
                </li>
                <li>
                    <a href="minor.html"><i class="fa fa-th-large"></i> <span class="nav-label">Minor view</span> </a>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                    </a>
                    <form role="search" class="navbar-form-custom" method="post" action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control"
                                   name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="#">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center m-t-lg">
                        <h1>
                            INSPINIA Static Seed Project for BS4
                        </h1>
                        <small>
                            It is an application skeleton for a typical web app. You can use it to quickly bootstrap
                            your webapp projects and dev environment for these projects.
                        </small>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2019
            </div>
        </div>

    </div>
</div>--}}

<!-- Mainly scripts -->
{{--<script src="/assets/panel/js/jquery-3.1.1.min.js"></script>
<script src="/assets/panel/js/popper.min.js"></script>
<script src="/assets/panel/js/bootstrap.min.js"></script>--}}
<script src="/js/app.js"></script>
<script src="/assets/panel/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/assets/panel/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="/assets/panel/js/inspinia.js"></script>
<script src="/assets/panel/js/plugins/pace/pace.min.js"></script>


</body>

</html>
