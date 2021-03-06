<?php

// Environtment
$envMapping = array(
    'apis.inewgen.com' => 'com',
    'inewgen.besaba.com' => 'com',
    'www.inewgen.com' => 'com',

    'apis.inewgen.dev' => 'dev',
    'admins.inewgen.dev' => 'dev',
    'www.inewgen.dev' => 'dev',
);

$env = isset($_SERVER['HTTP_HOST']) && isset($envMapping[$_SERVER['HTTP_HOST']]) ? $envMapping[$_SERVER['HTTP_HOST']] : '';
define('ENV_MODE', $env);

function containsIP($str, $arr)
{
    foreach ($arr as $a) {
        $a = explode('*', $a);
        if (stripos($str, $a[0]) !== false) {
            return true;
        }
    }
    return false;
}

$server_allow = array(
    // '110.168.*',
    // '110.170.*',
    // '171.96.*',
    // '27.55.*',
    // '58.11.*',
    // '58.8.*',
    // '61.90.*',
);

// if ($env == 'com') {
//     if (!containsIP($_SERVER['REMOTE_ADDR'], $server_allow)) {
        // require __DIR__ . '/comingsoon.php';
        // die();
//     }
// }

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylorotwell@gmail.com>
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any our classes "manually". Feels great to relax.
|
 */

require __DIR__ . '/bootstrap/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let's turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight these users.
|
 */

$app = require_once __DIR__ . '/bootstrap/start.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can simply call the run method,
| which will execute the request and send the response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have whipped up for them.
|
 */

$app->run();
