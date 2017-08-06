<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Style Test - CL</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">  
        <link rel="stylesheet" href="{{ URL::asset('css/default.css') }}">
    </head>
    <body>

    <header>

    <div class="navbar-fixed">
        <nav class="teal lighten-2">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo"><i class="material-icons">help_outline</i>Quad-KB</a>
              
                <div class="header-search-wrapper hide-on-med-and-down">
                    <i class="mdi-action-search material-icons">search</i>
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
                        <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                    </div>
                    <div class="col col s8 m8 l8">
                        
                        <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">John Doe<i class="mdi-navigation-arrow-drop-down right"></i></a><ul id="profile-dropdown" class="dropdown-content">
                            <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                            </li>
                            <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                            </li>
                            <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                            </li>
                            <li><a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                            </li>
                        </ul>
                        <p class="user-roal">Administrator</p>
                    </div>
                </div>
                </li>
                <li class="bold active"><a href="index.html" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-carousel"></i> Layouts</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="layout-fullscreen.html">Full Screen</a>
                                    </li>
                                    <li><a href="layout-horizontal-menu.html">Horizontal Menu</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="bold"><a href="app-email.html" class="waves-effect waves-cyan"><i class="mdi-communication-email"></i> Mailbox <span class="new badge">4</span></a>
                </li>
                <li class="bold"><a href="app-calendar.html" class="waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Calender</a>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-invert-colors"></i> CSS</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="css-typography.html">Typography</a>
                                    </li>
                                    <li><a href="css-icons.html">Icons</a>
                                    </li>
                                    <li><a href="css-animations.html">Animations</a>
                                    </li>
                                    <li><a href="css-shadow.html">Shadow</a>
                                    </li>
                                    <li><a href="css-media.html">Media</a>
                                    </li>
                                    <li><a href="css-sass.html">Sass</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-image-palette"></i> UI Elements</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="ui-alerts.html">Alerts</a>
                                    </li>
                                    <li><a href="ui-buttons.html">Buttons</a>
                                    </li>
                                    <li><a href="ui-badges.html">Badges</a>
                                    </li>
                                    <li><a href="ui-breadcrumbs.html">Breadcrumbs</a>
                                    </li>
                                    <li><a href="ui-collections.html">Collections</a>
                                    </li>
                                    <li><a href="ui-collapsibles.html">Collapsibles</a>
                                    </li>
                                    <li><a href="ui-tabs.html">Tabs</a>
                                    </li>
                                    <li><a href="ui-navbar.html">Navbar</a>
                                    </li>
                                    <li><a href="ui-pagination.html">Pagination</a>
                                    </li>
                                    <li><a href="ui-preloader.html">Preloader</a>
                                    </li>
                                    <li><a href="ui-toasts.html">Toasts</a>
                                    </li>
                                    <li><a href="ui-tooltip.html">Tooltip</a>
                                    </li>
                                    <li><a href="ui-waves.html">Waves</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>

        </aside>

        <section>
            <div id="mainbody" class="container grey lighten-3">
            Testr
            </div>
            <div id="d">

                <div class="card-panel teal lighten-2">This is a card panel with a teal lighten-2 class</div>
            </div>

        </section>

    </div>        
    </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    </body>
</html>
