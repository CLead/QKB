    <div class="navbar-fixed">
        <nav class="teal lighten-2 TitleNav">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo"><i style="font-size: 48px;" class="material-icons large">help_outline</i> Quad-KB</a>
                <a id="button-collapse" href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only menu-button teal"><i class="material-icons">menu</i></a>
                <div class="hide-on-med-and-down ilb">
                    <form method="post" action="{{ route('ArticlePerformSearch')}}">
                        <div class="header-search-wrapper ">
                            {{ csrf_field() }}
                            <i class="large material-icons">search</i>
                            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Search Knowledge Base">
                        </div>
                    <input type="submit" id="NavSearchButton" class="btn" value="Search">
                    </form>
                </div>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>
            </div>
        </nav>
    </div>