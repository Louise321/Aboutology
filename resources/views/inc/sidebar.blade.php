<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="home">
    <img src="/img/logo.png" alt="aboutology" style="width: 70%; position: relative; left: 30px;">  
        </a>

        <ul class="sidebar-nav">
            
            <li class="sidebar-item active">
                <a class="sidebar-link" href={{ route('dashboard') }}>
                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            
            <li class="sidebar-item">
                <a href="#knowledgebase" data-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Knowledgebase</span>
                </a>
                <ul id="knowledgebase" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="knowledge">Knowledgebase</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('article') }}">Articles</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="forums">Forums</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="{{ route('news.usernews')}}">News</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="calendar"> 
                <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Calendar</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="profile"> 
                <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="helpcenter">
                <i class="align-middle" data-feather="help-circle"></i> <span class="align-middle">Help Center</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="setting">
                <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
                </a>
            </li>

        </ul>
        
    </div>
</nav>