<!DOCTYPE html>
<html lang="en">
	<head>
		<?= $this->render('Component/Head.php') ?>
	</head>
	<body>
		<?= $this->render('Component/Header.php') ?>
		<div class="container">
			<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>

			<div class="card">
				<div>
				<?php foreach ($comments as $comment): ?>
					<p><?= $comment['content'] ?></p>
				<?php endforeach; ?>
				</div>
				<?php if ($security->getAccount()): ?>
					<form action="" method="POST">
						<div class="field">
							<label>Add a new comment</label>
							<textarea name="comment"></textarea>
						</div>
						<button type="submit" class="button primary">Send</button>
					</form>
				<?php endif; ?>
			</div>
		</div>
		<?= $this->render('Component/Footer.php') ?>
	</body>
</html>