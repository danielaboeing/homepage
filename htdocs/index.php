<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require 'vendor/autoload.php';



$twig = Twig::create('res/', ['cache' => false]);

$app = AppFactory::create();
$app->add(TwigMiddleware::create($app, $twig));

$app->get('/', function (Request $request, Response $response){
    $view = Twig::fromRequest($request);
    $response = $view->render($response, 'index.html', []);
    return $response;
})->setName('home');



$app->run();

