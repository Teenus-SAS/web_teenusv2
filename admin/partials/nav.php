<div class="nav-container">
    <div class="mobile-topbar-header">
        <div>
            <img src="/admin/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Teenus</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <nav class="topbar-nav">
        <ul class="metismenu" id="menu">
            <li>
                <a href="javascript:;" onclick="loadContent('page-content','../views/template.php')">
                    <div class="parent-icon"><i class='bx bx-line-chart bx-burst-hover'></i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li>
                <a href="javascript:;" onclick="loadContent('page-content','../../blog/index.php')" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                    <div class="menu-title">Blog</div>
                </a>
                <ul>
                    <li> <a href="javascript:;" onclick="loadContent('page-content','../../blog/views/details.php')"><i class="bx bx-right-arrow-alt"></i>Detalles</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" onclick="loadContent('page-content','../views/users.php')">
                    <div class="parent-icon"><i class='bx bx-line-chart bx-burst-hover'></i></div>
                    <div class="menu-title">Usuarios</div>
                </a>
            </li>
        </ul>
    </nav>
</div>