<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                {{ Auth::user()->nama_petugas }} <i class="fas fa-caret-down"> </i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <form action="{{ route('logout') }}" id="logout-form" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-2"></i> Log Out
                    </button>
                </form>


            </div>
        </li>
    </ul>
</nav>
