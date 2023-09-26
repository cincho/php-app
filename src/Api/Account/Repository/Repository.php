<?php

declare(strict_types=1);

namespace Api\Account\Repository;

use PDO;

class Repository
{
	public function __construct(
		private PDO $pdo
	) {
	}

	public function save(array $account): array
	{
		$stmt = $this->pdo->prepare('INSERT INTO accounts (username, password) VALUES (:username, :password)');
		$stmt->bindParam(':username', $account['username'], PDO::PARAM_STR);
		$stmt->bindParam(':password', $account['password'], PDO::PARAM_STR);
		$stmt->execute();

		return $this->findByUsername($account['username']);
	}

	public function findByUsername(string $username): ?array
	{
		$stmt = $this->pdo->prepare('SELECT * FROM Accounts WHERE username = :username');
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result ? $result : null;
	}
}