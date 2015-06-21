<?php
error_reporting(E_ALL);
ini_set('display_errors','On');

require_once(__DIR__.'/vendor/autoload.php');

function request_handler ($request, $response) {
  $response->writeHead(200, array('Content-Type'=>'text/plain'));
  $response->end('Nothing to see here');
}
$request_handler = 'request_handler';

$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server($loop);
$http = new React\Http\Server($socket, $loop);

$http->on('request', $request_handler);
$socket->listen(7355);
$loop->run();
