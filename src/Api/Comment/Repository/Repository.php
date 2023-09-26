<?php

declare(strict_types=1);

namespace Api\Comment\Repository;

use PDO;

class Repository
{
	public function __construct(
		private PDO $pdo
	) {
	}

	public function findByDocumentId(int $document_id): array
	{
		$stmt = $this->pdo->prepare(<<<SQL
		WITH RECURSIVE CommentTree (comment_id, document_id, parent_id, content, depth)
		AS (
			SELECT c1.id, c1.document_id, c1.parent_id, c1.content, 0 AS depth
			FROM Comments c1
			WHERE c1.parent_id IS NULL
				UNION ALL
			SELECT c2.id, c2.document_id, c2.parent_id, c2.content, ct.depth + 1 AS depth
			FROM CommentTree ct
			JOIN Comments c2 ON c2.parent_id = ct.comment_id
		)
		SELECT * FROM CommentTree WHERE document_id = :document_id;
		SQL);
		$stmt->bindParam(':document_id', $document_id, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetchAll();
	}
}