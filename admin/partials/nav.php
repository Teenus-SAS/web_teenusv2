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
                    <a href="/admin/app" id="dashboard">
                        <div class="parent-icon"><i class='bx bx-line-chart bx-burst-hover'></i></div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
            <?php } ?>
            <li>
                <a href="/admin/blogs-detalles" id="blog" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                    <div class="menu-title">Blog</div>
                </a>
            </li>
            <?php if ($_SESSION['rol'] == 2) {  ?>
                <li>
                    <a href="/admin/usuarios" id="user">
                        <div class="parent-icon"><i class='bx bx-line-chart bx-burst-hover'></i></div>
                        <div class="menu-title">Usuarios</div>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </nav>
</div>