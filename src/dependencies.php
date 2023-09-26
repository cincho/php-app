<?php

declare(strict_types=1);

use Framework\DependencyInjection\Container;
use Framework\Http\Request;
use Framework\Router\Router;
use Framework\Security\Security;
use Framework\Session\Session;
use Framework\Template\Renderer;

return function (Container $container) {
	$container->set(PDO::class, new PDO('sqlite:' . __DIR__ . '/../data.db'));
	$container->set(Renderer::class, function ($container) {
		$renderer = new Renderer([__DIR__ . '/App/Template']);
		$renderer->addData('brand', 'Website');
		$renderer->addData('say_hello', fn ($name) => sprintf('Hello %s', $name));
		$renderer->addData('security', $container->get(Security::class));
		return $renderer;
	});
	$container->set(Request::class, Request::fromGlobals());
	$container->set(Router::class, new Router());
	$container->set(Session::class, new Session());
};