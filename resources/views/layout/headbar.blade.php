    <div class="navbar-fixed">
        <nav class="blue-grey TitleNav">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo"><i style="font-size: 48px;" class="material-icons large">help_outline</i> Quad-KB</a>
                <a id="button-collapse" href="#" data-activates="slide-out" class="button-collapse sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only menu-button teal"><i class="material-icons">menu</i></a>
                <div class="hide-on-med-and-down ilb">
                    <form method="post" action="{{ route('ArticlePerformSearch')}}">
                        <div class="header-search-wrapper ">
                            {{ csrf_field() }}
                            <i class=" large material-icons">search</i>
                            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Search Knowledge Base">
                        </div>
                    <input type="submit" id="NavSearchButton" class="btn green lighten-2" value="Search">
                    </form>
                </div>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="http://www.quad.co.uk">Quad</a></li>
                    <li><a href="http://intranet.quad.co.uk">Intranet</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <script>
    $("#button-collapse").sideNav();
    </script>

