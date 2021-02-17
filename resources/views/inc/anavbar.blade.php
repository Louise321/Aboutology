<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle d-flex">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">

            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                    <img src="/img/avatar.jpg" class="avatar img-fluid rounded mr-1" alt="Scarlet Johnson" /> <span
                        class="text-dark">{{ Auth::check() ? Auth::user()->name : '' }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">

                    <!-- Authentication -->
                    <form method="GET" action="{{ route('admin.logout') }}" style="margin:0">
                        @csrf

                        <x-dropdown-link :href="route('admin.logout')" style="text-decoration: none" onclick="event.preventDefault();
                                                    this.closest('form').submit();">

                            <span class="dropdown-item"><i class="align-middle mr-1" data-feather="log-out"></i>
                                {{ __('Logout') }}</span>
                        </x-dropdown-link>
                    </form>
                    
                </div>
            </li>
        </ul>
    </div>
</nav>
