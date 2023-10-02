<?php

include_once __DIR__ . "/../vendor/autoload.php";

use App\SystemServices\MonologFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;

MonologFactory::getInstance()->debug("main executando...");

// Create a Slim application instance
$app = AppFactory::create();

// Middleware
$app->addRoutingMiddleware();
$app->add(new BasePathMiddleware($app));
$app->addErrorMiddleware(true, true, true);

// Routes
$app->get('/', function (Request $request, Response $response) {
   $response->getBody()->write('Olá, Mundo!');
   return $response;
});

$app->get('/inserirusuario', function (Request $request, Response $response) {
    // Execute your application logic here
    $response->getBody()->write('Olá, Mundo!');
    return $response;
});

$app->run();

// Create a log channel
$log = MonologFactory::getInstance();

$log->debug("Arquivo main.php Rodando...");
$log->error("Exemplo de Erro");
$log->info("Informação importante!");
