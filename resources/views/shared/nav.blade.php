<nav class="blue-grey darken-4">
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Logo</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            @if (Auth::check())
                <li><a class="dropdown-button" data-activates='dropdown1'><i class="material-icons">view_module</i></a></li>
                <li><a class="dropdown-button" data-activates='dropdown2'><i class="material-icons">account_circle</i></a></li>

                <ul id='dropdown1' class='dropdown-content'>
                    <li><a href="#!">Clientes</a></li>
                    <li><a href="#!">Funcionários</a></li>
                    @if (Auth::check())
                        <li><a href="#!">Usários</a></li>
                    @endif
                </ul>
                <ul id='dropdown2' class='dropdown-content'>
                    <li><a href="#!"><i class="material-icons">settings</i>Settings</a></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">exit_to_app</i>Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>
            @endif
        </ul>
        <ul class="side-nav" id="mobile-demo">
            @if (Auth::check())
                <li><div class="user-view">
                        <div class="background">
                            <img src="{{URL::asset('images/blue_background.jpg')}}">
                        </div>
                        <a href="#!user"><img class="circle" src="{{URL::asset('images/user.png')}}"></a>
                        <a href="#!name"><span class="white-text name">Admin</span></a>
                    </div></li>
                <li><a href="#" id="toggle-search"><i class="material-icons">search</i></a></li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li>
                            <a class="collapsible-header">Account<i class="mdi-navigation-arrow-drop-down material-icons">account_circle</i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#!"><i class="material-icons">settings</i>Settings</a></li>
                                    <li>                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li><a href="#!">First Sidebar Link</a></li>
                <li><a href="#!">Second Sidebar Link</a></li>
            @else
            @endif
        </ul>
    </div>
</nav>