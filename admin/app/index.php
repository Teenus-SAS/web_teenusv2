<?php
session_start();

require_once '../controller/templateController.php';
$template = new templateController();

// if (!empty($_SESSION['rol'])) {
//     $rol = $_SESSION['rol'];
$rol = 1;

if ($rol == 1 || $rol == 2)
    $template->ctrTemplate();
//}
