<?php

declare(strict_types=1);

namespace Api\Document\Repository;

use PDO;

class Repository
{
	public function __construct(
		private PDO $pdo
	) {
	}

	public function findByUri(string $uri): ?array
	{
		$stmt = $this->pdo->prepare('SELECT * FROM Documents WHERE uri = :uri');
		$stmt->bindParam(':uri', $uri, PDO::PARAM_STR);
		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result ? $result : null;
	}
}