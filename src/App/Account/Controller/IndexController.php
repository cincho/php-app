<?php

declare(strict_types=1);

namespace App\Account\Controller;

use Framework\Http\Response;
use Framework\Security\Security;
use Framework\Template\Renderer;

class IndexController
{
	public function __construct(
		private Renderer $renderer,
		private Security $security,
	) {
	}

	public function __invoke(array $args): Response
	{
		if (!$this->security->getAccount()) {
			$response = new Response(200);
			$response->addHeader('Location', '/account/login');

			return $response;
		}

		$body = $this->renderer->render('Account/Index.php');

		return new Response(200, $body);
	}
}