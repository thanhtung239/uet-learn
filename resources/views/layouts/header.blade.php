<!-- HEADER -->
<header id="header" class="container-fluid position-relative p-0 header">
    <nav class="navbar container-fluid navbar-expand-sm h-100 p-0 navbar-light bg-light sticky-top navbar-element">
        <div class="container-fluid navbar-cover p-0 w-100 h-100">
            <a class="navbar-branch navbar-branch-element col-sm-12" href="{{ route('home') }}">
                <img src="{{ asset('img/hapo_learn_header.png') }}" alt="Logo">
            </a>
            <button class="navbar-toggler navbar-toggler-element" type="button" data-toggle="collapse"
                data-target="#navbarReponsive">
                <i class="fas fa-bars"></i>
                <i class="fas fa-times d-none"></i>
            </button>
            <div class="collapse navbar-collapse col-xs-12 col-sm-12 navbar-collapse-element" id="navbarReponsive">
                <ul id="navbarNav" class="navbar-nav w-100 d-flex justify-content-end">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link navbar-link-element {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">HOME</a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('courses.index') }}" class="nav-link navbar-link-element {{ Route::currentRouteName() == 'courses.index' ? 'active' : '' }}">COURSES</a>
                    </li>

                    @guest
                        @if (Route::has('home'))
                            <li class="nav-item login-register" id="headerLoginRegister">
                                <a href="#" class="nav-link navbar-link-element" data-toggle="modal"
                                data-target="#loginRegisterModal">LOGIN/REGISTER</a>
                            </li>
                        @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link navbar-link-element  dropdown-toggle name-of-user {{ Route::currentRouteName() == 'users.show' ? 'active' : '' }}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <i class="far fa-bell"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown" id="dropdownMenuUser">
                                    <a href="{{ route('users.show', [Auth::id()]) }}" class="dropdown-item text-center">Profile</a>
                                    <a id="logoutButton" class="dropdown-item m-0 text-center" href="{{ route('logout') }}">Logout</a>

                                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                </ul>
            </div>
        </div>           
    </nav>
</header>
@include('auth.login_register')
