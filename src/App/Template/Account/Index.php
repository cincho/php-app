<!DOCTYPE html>
<html lang="en">
	<head>
		<?= $this->render('Component/Head.php', ['title' => 'Account']) ?>
	</head>
	<body>
		<?= $this->render('Component/Header.php', ['title' => 'Account']) ?>
		<div class="container">
			<p><?= $say_hello($security->getAccount()['username']) ?></p>
		</div>
		<?= $this->render('Component/Footer.php') ?>
	</body>
</html>