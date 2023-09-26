<?php

declare(strict_types=1);

namespace App\Document\Controller;

use Api\Comment\Repository\Repository as CommentRepository;
use Api\Document\Repository\Repository as DocumentRepository;
use Framework\Http\Exception\HttpNotFoundException;
use Framework\Http\Response;
use Framework\Template\Renderer;

class IndexController
{
	public function __construct(
		private CommentRepository $comment_repository,
		private DocumentRepository $document_repository,
		private Renderer $renderer,
	) {
	}

	public function __invoke(array $args): Response
	{
		$document = $this->document_repository->findByUri($args['slug']);

		if (!$document) {
			throw new HttpNotFoundException();
		}

		$comments = $this->comment_repository->findByDocumentId($document['id']);

		$body = $this->renderer->render('Document/Index.php', [
			'comments' => $comments,
		]);

		return new Response(200, $body);
	}
}