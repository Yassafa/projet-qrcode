<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8"/>
		<title><?= e($title) ?></title>
		<link rel="stylesheet" href="Content/CSS/qrcode.css"/>
	</head>
	
    <body>
		<header>
			<a href="?controller=accueil"><img id="logo-iutv" src="Content/img/logo-iutv.png" alt="logo iut"/></a>
			<?php if(isset($_SESSION["connecte"])): ?>
				<div class="loggedin">
					<div class="login">
						<img class="icon" id="avatar" src="Content/img/avatar.png"/>
						<p><?= $_SESSION["role"] ?></p>
					</div>
					<a class="logout" href="?controller=login&redirect=<?php if(isset($redirect)): ?><?= e(redirect($redirect)) ?><?php else: ?><?= e(redirect()) ?><?php endif ?>&logout="><p>Déconnexion</p></a>
				</div>
			<?php else: ?>
				<a class="login" href="?controller=login&redirect=<?= e(redirect()) ?>"><img class="icon" id="person" src="Content/img/person.png"/><p>Connexion</p></a>
			<?php endif ?>
		</header>

		<main>