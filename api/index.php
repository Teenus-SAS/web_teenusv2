<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/AutoloaderSourceCode.php';

$app = AppFactory::create();
$app->setBasePath('/api');

// Analysis
require_once('../api/src/routes/global/routeContact.php');
require_once('../api/src/routes/global/routeSubscribe.php');

/* Admin */
// Login
require_once('../api/src/routes/admin/login/routeLogin.php');
require_once('../api/src/routes/admin/login/routepassUser.php');
// Users
require_once('../api/src/routes/admin/users/routeUsers.php');
// Articles
require_once('../api/src/routes/admin/articles/routeArticles.php');
// Publications
require_once('../api/src/routes/admin/publications/routePublications.php');

$app->run();
