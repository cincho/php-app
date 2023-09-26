<?php

declare(strict_types=1);

use Framework\Router\Router;

return function (Router $router) {
	$router->add('GET', '/account', \App\Account\Controller\IndexController::class, 'account.index');
	$router->add(['GET', 'POST'], '/account/login', \App\Account\Controller\LoginController::class, 'account.login');
	$router->add(['GET', 'POST'], '/account/register', \App\Account\Controller\RegisterController::class, 'account.register');
	$router->add('GET', '/account/logout', \App\Account\Controller\LogoutController::class, 'account.logout');
	$router->add('GET', '/api/comments', \Api\Comment\Controller\IndexController::class, 'api.comment.index');
	$router->add('GET', '(?<slug>\/.*)', \App\Document\Controller\IndexController::class, 'default');
};