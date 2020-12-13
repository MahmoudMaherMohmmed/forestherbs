<?php

session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'forestherbs'
    ),
    'remember' => array(
        'ccokie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    ),
    'uploadDestinationDirectory' => '../Resourses/uploads/',
    'downloadDestination' => '/Resourses/uploads/'
);


require_once '../classes/Config.php';
require_once '../classes/Cookie.php';
require_once '../classes/DB.php';
require_once '../classes/Hash.php';
require_once '../classes/Input.php';
require_once '../classes/Redirect.php';
require_once '../classes/Session.php';
require_once '../classes/Token.php';
require_once '../classes/User.php';
require_once '../classes/Validate.php';
require_once '../classes/Product.php';

require_once '../functions/sanitize.php';
