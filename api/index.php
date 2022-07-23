<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/AutoloaderSourceCode.php';

$app = AppFactory::create();
$app->setBasePath('/api');

// Analysis
require_once('../api/src/routes/routeContact.php');
require_once('../api/src/routes/routeSubscribe.php');

/* Admin */
// Login
require_once('../api/src/routes/admin/login/routeLogin.php');

$app->run();
