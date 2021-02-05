<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <img src="/img/logo.png" alt="aboutology" style="width: 70%; position: relative; left: 30px; height:auto; margin:0">  
        </a>

        <ul class="sidebar-nav">
            
            <li class="sidebar-item active">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            
            
            <li class="sidebar-item">
                <a href="#ui" data-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Knowledgebase</span>
                </a>
                <ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('articles.index') }}">Articles</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="forum">Forums</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="news">News</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="setting">
                <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="banners">
                <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Banners</span>
                </a>
            </li>
        </ul>
        
    </div>
</nav>