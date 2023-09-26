<?php

declare(strict_types=1);

namespace App\Account\Controller;

use Api\Account\Repository\Repository;
use Framework\Http\Request;
use Framework\Http\Response;
use Framework\Session\Session;
use Framework\Template\Renderer;

class RegisterController
{
	public function __construct(
		private Renderer $renderer,
		private Repository $repository,
		private Request $request,
		private Session $session,
	) {
	}

	public function __invoke(array $args): Response
	{
		$username = $this->request->get('username');
		$password = $this->request->get('password');
		$errors = [];

		if ($this->request->isPost()) {
			$account = $this->repository->save([
				'username' => $username,
				'password' => password_hash($password, null),
			]);

			$this->session->set('account_id', $account);
			$response = new Response(302);
			$response->addHeader('Location', '/account');

			return $response;
		}

		$body = $this->renderer->render('Account/Register.php', [
			'username' => $username,
			'password' => $password,
			'errors' => $errors,
		]);

		return new Response(200, $body);
	}
}