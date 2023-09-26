<header>
	<div class="container">
		<h1><a href="/"><?= isset($title) ? sprintf('%s | %s', $brand, $title) : $brand ?></a></h1>
		<nav>
			<ul>
				<?php if ($security->getAccount()): ?>
					<li><a href="/account">Account</a></li>
					<li><a href="/account/logout">Logout</a></li>
				<?php else: ?>
					<li><a href="/account/login">Login</a></li>
					<li><a href="/account/register">Register</a></li>
				<?php endif; ?>
			</ul>
		</nav>
	</div>
</header>