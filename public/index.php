<?php

declare(strict_types=1);

use Framework\DependencyInjection\Container;
use Framework\Http\Exception\HttpNotFoundException;
use Framework\Http\Request;
use Framework\Router\Router;
use Framework\Session\Session;

require_once dirname(__DIR__) . '/src/bootstrap.php';

$container = new Container();

$dependencies = require_once dirname(__DIR__) . '/src/dependencies.php';
$dependencies($container);

$router = $container->get(Router::class);
$request = $container->get(Request::class);

$routes = require_once dirname(__DIR__) . '/src/routes.php';
$routes($router);

$match = $router->match($request->get('REQUEST_METHOD'), $request->get('REQUEST_URI'));

$session = $container->get(Session::class);
$session->start();

try {
	if (!isset($match['handler'])) {
		throw new HttpNotFoundException();
	}
	$handler = $container->get($match['handler']);
	$response = $handler($match['params']);
	$response->emit();
} catch (HttpNotFoundException $e) {
	http_response_code(404);
	echo 'Page not found';
} catch (Exception $e) {
	throw $e;
}

exit(0);