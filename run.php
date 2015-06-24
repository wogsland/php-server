<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
date_default_timezone_set('America/Chicago');

require_once(__DIR__.'/vendor/autoload.php');
require_once(__DIR__.'/functions.php');

$request_handler = 'request_handler';

// lean on React library
$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server($loop);
$http = new React\Http\Server($socket, $loop);

// get things going...
$http->on('request', $request_handler);
$socket->listen(1337);
$loop->run();
