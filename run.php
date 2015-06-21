<?php
error_reporting(E_ALL);
ini_set('display_errors','On');

require_once(__DIR__.'/vendor/autoload.php');

// log requests
function logger ($request) {
  $log = fopen('access.log', 'a');
  fwrite($log, "{$request->getMethod()}: {$request->getPath()}\n");
  fclose($log);
}

// form responses
function responder ($request, $response) {
  $response->writeHead(200, array('Content-Type'=>'text/html'));
  //$response->end('Nothing to see here');
  $filename = ltrim($request->getPath(), '/');
  if (strpos($filename,'.php') === false) {
    $response->end('Nothing but php yet.');
  } else {
    if (file_exists(__DIR__.'/public/'.$filename)) {
      $file = fopen(__DIR__.'/public/'.$filename, 'r');
      ob_start();
      while ($line = fgets($file)) {
        eval($line);
      }
      $response->end(ob_get_contents());
      ob_end_clean();
    } else {
      $response->end('File '.$filename.' does not exist.');
    }
  }
}

// handle requests
function request_handler ($request, $response) {
  logger($request);
  responder($request, $response);
}
$request_handler = 'request_handler';

$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server($loop);
$http = new React\Http\Server($socket, $loop);

$http->on('request', $request_handler);
$socket->listen(7355);
$loop->run();
