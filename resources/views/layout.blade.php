<!DOCTYPE html>
<html>
    <head>
        <title>Laravel Test</title>
        <link href="{{ asset('assets/css/app.css')}}" rel="stylesheet" type="text/css" />
        <meta name="csrf-token" content="{!! csrf_token() !!}">
    </head>
    <body>
        <div class="container app-container">
            @widget('breadCrumbs')
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">@yield('title')</h3>
                </div>
                <div class="panel-body">
                    @yield('content')
                </div>
            </div>
        </div>

        <script src="{{ asset ('assets/js/vendor.js') }}" type="text/javascript"></script>
        <script src="{{ asset ('assets/js/app.js') }}" type="text/javascript"></script>
    </body>
</html>
