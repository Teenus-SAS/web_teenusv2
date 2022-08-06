<?php
$rol = $_SESSION['rol'];
if ($roll == 1) echo "<script>document.getElementById('dashboard').style.display = 'none';
        document.getElementById('user').style.display = 'none';</script>";
?>
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
                <a href="javascript:;" id="dashboard" onclick="loadContent('page-content','../views/template.php')">
                    <div class="parent-icon"><i class='bx bx-line-chart bx-burst-hover'></i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li>
                <a href="javascript:;" id="blog" onclick="loadContent('page-content','../../blog/views/details.php')" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                    <div class="menu-title">Blog</div>
                </a>
            </li>
            <li>
                <a href="javascript:;" id="user" onclick="loadContent('page-content','../views/users.php')">
                    <div class="parent-icon"><i class='bx bx-line-chart bx-burst-hover'></i></div>
                    <div class="menu-title">Usuarios</div>
                </a>
            </li>
        </ul>
    </nav>
</div>