<aside class="main-sidebar sidebar-primary elevation-3">

    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="https://upload.wikimedia.org/wikipedia/commons/1/12/White_background.png" alt="Logo"
            class="brand-image img-circle" style="opacity: .8">
        <span class="brand-text font-weight">SPP Ku</span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ $title == 'Dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if (Auth::user()->level == 'admin')
                <li class="nav-item">
                    <a href="{{ route('kelas') }}" class="nav-link {{ $title == 'Kelas' ? 'active' : '' }}">
                        <i class="nav-icon fas fas fa-school"></i>
                        <p>Kelas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('spp') }}" class="nav-link {{ $title == 'SPP' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-invoice"></i>
                        <p>SPP</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('siswa') }}" class="nav-link {{ $title == 'Siswa' ? 'active' : '' }}">
                        <i class="nav-icon fas fas fa-chalkboard-teacher"></i>
                        <p>Siswa</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('petugas') }}" class="nav-link {{ $title == 'Petugas' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-user-tie"></i>
                        <p>Petugas</p>
                    </a>
                </li>
                @endif

            </ul>
        </nav>

    </div>

</aside>
