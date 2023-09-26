<!DOCTYPE html>
<html lang="en">
	<head>
		<?= $this->render('Component/Head.php', ['title' => 'Login']) ?>
	</head>
	<body>
		<?= $this->render('Component/Header.php', ['title' => 'Login']) ?>
		<div class="container">
			<form method="POST">
				<?php if (!empty($errors)): ?>
					<?= implode('', $errors) ?>
				<?php endif; ?>
				<div class="field">
					<label for="name">Username</label>
					<input name="username" type="text" autocomplete="off" value="<?= $username ?>">
				</div>
				<div class="field">
					<label for="password">Password</label>
					<input name="password" type="password" autocomplete="off">
				</div>
				<a href="/" class="button">Cancel</a>
				<button type="submit" class="button primary">Login</button>
			</form>
		</div>
		<?= $this->render('Component/Footer.php') ?>
	</body>
</html>