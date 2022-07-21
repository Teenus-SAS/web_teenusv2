<?php
session_start();

require_once 'controller/templateController.php';
$template = new templateController();

if (!empty($_SESSION['rol'])) {
    $rol = $_SESSION['rol'];

    if ($rol == 1 || $rol == 2)
        $template->ctrTemplate();
   
}
