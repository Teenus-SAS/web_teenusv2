<div class="nav-container">
    <div class="mobile-topbar-header">
        <div>
            <img src="/assets/images/teenus/logo.png" class="logo-icon" alt="logo icon">
        </div>
        <!-- <div>
            <h4 class="logo-text">Teenus</h4>
        </div> -->
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <nav class="topbar-nav">
        <ul class="metismenu" id="menu">
            <?php if ($_SESSION['rol'] == 2) {  ?>
                <li>
                    <a href="javascript:history.go(0)" id="dashboard">
                        <div class="parent-icon"><i class='bx bx-line-chart bx-burst-hover'></i></div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
            <?php } ?>
            <li>
                <a href="javascript:;" id="blog" onclick="loadContent('page-content','/admin/blogs-detalles')" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                    <div class="menu-title">Blog</div>
                </a>
            </li>
            <?php if ($_SESSION['rol'] == 2) {  ?>
                <li>
                    <a href="javascript:;" id="user" onclick="loadContent('page-content','/admin/usuarios')">
                        <div class="parent-icon"><i class='bx bx-line-chart bx-burst-hover'></i></div>
                        <div class="menu-title">Usuarios</div>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </nav>
</div>