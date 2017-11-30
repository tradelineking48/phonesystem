<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Mel SoftPhone</title>
    <link rel="stylesheet" href=" {{ asset('css/bootstrap.min.css') }}">
    
    <script src="//static.twilio.com/libs/twiliojs/1.2/twilio.min.js"></script>
    <meta id="token" name="token" content="{!! csrf_token() !!}">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    
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
</body>
</html>