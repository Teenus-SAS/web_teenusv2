<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/AutoloaderSourceCode.php';

$app = AppFactory::create();
$app->setBasePath('/api');

// Analysis
require_once('../api/src/routes/admin/global/routeContact.php');
require_once('../api/src/routes/admin/global/routeSubscribe.php');

/* Admin */
// Login
require_once('../api/src/routes/admin/login/routeLogin.php');
// Users
require_once('../api/src/routes/admin/users/routeUsers.php');

$app->run();
