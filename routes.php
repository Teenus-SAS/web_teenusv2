<?php

require_once("{$_SERVER['DOCUMENT_ROOT']}/router.php");

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Index
/* Admin */
// Login
get('/admin', '/admin/index.php');
get('/admin/olvido-contrasena', '/admin/views/password/auth-forgot-password.php');
get('/admin/restablecer-contrasena', '/admin/views/password/auth-reset-password.php');

// App
get('/admin/app', '/admin/views/template.php');
get('/admin/blogs-detalles', '/admin/views/blog/details.php');
get('/admin/editar-blog', '/admin/views/blog/edit.php');
get('/admin/usuarios', '/admin/views/users/users.php');


// Teenus
get('/', '/teenus/index.php');
get('/desarrollo-de-software', '/develop/index.php');
get('/tezlik', '/tezlik/index.php');
get('/blogs', '/blog/index.php');
get('/articulo', '/blog-single/index.php');

// Dynamic GET. Example with 1 variable
// The $id will be available in user.php
//get('/user/$id', 'user.php');

// Dynamic GET. Example with 2 variables
// The $name will be available in user.php
// The $last_name will be available in user.php
//get('/user/$name/$last_name', 'user.php');

// Dynamic GET. Example with 2 variables with static
// In the URL -> http://localhost/product/shoes/color/blue
// The $type will be available in product.php
// The $color will be available in product.php
//get('/product/$type/color/:color', 'product.php');

// Dynamic GET. Example with 1 variable and 1 query string
// In the URL -> http://localhost/item/car?price=10
// The $name will be available in items.php which is inside the views folder
//get('/item/$name', 'views/items.php');


// ##################################################
// ##################################################
// ##################################################
// any can be used for GETs or POSTs

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
//any('/404','views/404.php');
