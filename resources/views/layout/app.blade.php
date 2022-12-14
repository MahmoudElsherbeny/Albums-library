<!DOCTYPE html>
<html class="app-ui">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

        <title>Albums Library</title>

        <meta name="description" content="Album Library - for saving and sorting your images" />
        <meta name="author" content="rustheme" />

        <!-- Google fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400" />

        <!-- AppUI CSS stylesheets -->
        <link rel="stylesheet" id="css-font-awesome" href="{{ url('assets/css/font-awesome.css') }}" />
        <link rel="stylesheet" id="css-bootstrap" href="{{ url('assets/css/bootstrap.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
        <link rel="stylesheet" id="css-app" href="{{ url('assets/css/app.css') }}" />
        <link rel="stylesheet" id="css-app-custom" href="{{ url('assets/css/app-custom.css') }}" />
        <!-- End Stylesheets -->
    </head>

    <body class="app-ui layout-has-drawer layout-has-fixed-header">

        <div class="app-layout-canvas">
            <div class="app-layout-container">
                <!--   header   -->
                @include('layout/header')

                <main class="app-layout-content">
                    <!-- Page Content -->
                    <div class="container-fluid p-y">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>

        <!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="{{ url('assets/js/core/bootstrap.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
        <script src="{{ url('assets/js/app.js') }}"></script>
        <script src="{{ url('assets/js/app-custom.js') }}"></script>

        <!-- Page JS Code -->
        <script src="{{ url('assets/js/pages/index.js') }}"></script>

        @yield('js_code')
    </body>
</html>