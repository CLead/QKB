<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Quad Knowledge Base</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">  
        <link rel="stylesheet" href="{{ URL::asset('css/default.css') }}?t=51">

        

    </head>
    <body>

    <header>
    @include('layout.headbar')
    </header>

    <div id="main">
    <div class="wrapper">

    @include('layout.sidebar')

        @yield('content')
        <div class="row">
            <div class="col s12 m6 l3">
                <div class="card cyan">
                Hello
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card orange">
                Hello
                </div>
            </div>
        </div>

    </div>        
    </div>

<script>

  $(function() {
    $(".button-collapse").sideNav();
  });


</script>

    </body>
</html>

