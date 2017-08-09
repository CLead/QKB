<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Style Test - CL</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">  
        <link rel="stylesheet" href="{{ URL::asset('css/default.css') }}?t=51">

        

    </head>
    <body>

    <header>

    <div class="navbar-fixed">
        <nav class="teal lighten-2">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo"><i style="font-size: 48px;" class="material-icons large">help_outline</i> Quad-KB</a>
                <a id="button-collapse" href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only menu-button teal"><i class="material-icons">menu</i></a>
                <div class="header-search-wrapper hide-on-med-and-down">
                    <i class="mdi-action-search large material-icons">search</i>
                    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Search Knowledgebase">
                 </div>
              
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>
            </div>
        </nav>
    </div>
    </header>

    <div id="main">
    <div class="wrapper">

        <aside id="left-sidebar">

        <ul id="slide-out" class="side-nav fixed leftside-navigation ps-container ps-active-y" style="width: 240px;">
                <li class="user-details cyan darken-2">
                <div class="row">
                    <div class="col col s4 m4 l4">
                        Hello
                    </div>
                </div>
                </li>
                <li class="bold active"><a href="#" class="waves-effect">
                    <i class="material-icons">dashboard</i>Dashboard</a>
                </li>
                <li class="bold"><a href="index.html" class="waves-effect">
                    <i class="material-icons">help</i>Knowledge Base</a>
                </li>
                <li class="bold"><a href="index.html" class="waves-effect">
                    <i class="material-icons">language</i>Domain Info</a>
                </li>
                <li class="bold"><a href="index.html" class="waves-effect">
                    <i class="material-icons">email</i>Mail Status</a>
                </li>
                <li class="">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect"><i class="material-icons">speaker_notes</i>Logs</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="css-typography.html" class="subItem  indigo lighten-5">Quad Log</a>
                                    </li>
                                    <li><a href="css-icons.html" class="subItem indigo lighten-5">Aldi Log</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        
                    </ul>
                </li>
            </ul>

        </aside>


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

