<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Mel SoftPhone</title>
    <link rel="stylesheet" href=" {{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/app.css') }}">
    
    <script src="//static.twilio.com/libs/twiliojs/1.2/twilio.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container">
        <div class="header">
            @yield('header')
        </div>
        <div class="content">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[id=token]').attr('content') }
        });
    </script>
    <script src="{{ asset('js/browser-call.js') }}"></script>
    <script src="{{ asset('js/dialpad.js') }}"></script>
</body>
</html>