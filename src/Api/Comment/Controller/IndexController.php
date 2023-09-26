<?php

declare(strict_types=1);

namespace Api\Comment\Controller;

use Api\Comment\Repository\Repository;
use Framework\Http\Response;

class IndexController
{
	public function __construct(
		private Repository $repository
	) {
	}

	public function __invoke(): Response
	{
		$comments = $this->repository->findAll();
		$response = new Response(200, json_encode($comments));
		$response->addHeader('Content-Type', 'application/json; charset=utf-8');

		return $response;
	}
}