<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ .'/../bootstrap/app.php';



/*require '../vendor/autoload.php';

$app = new \Slim\App;
require_once('../app/api/books.php');
require_once('../app/api/users.php');*/
/*$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});*/
$app->run();