<?php

declare(strict_types=1);

namespace App\Account\Controller;

use Framework\Http\Response;
use Framework\Session\Session;
use Framework\Template\Renderer;

class LogoutController
{
	public function __construct(
		private Renderer $renderer,
		private Session $session,
	) {
	}

	public function __invoke(array $args): Response
	{
		$this->session->set('account_id', null);

		$response = new Response(302);
		$response->addHeader('Location', '/');

		return $response;
	}
}