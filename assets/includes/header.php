<?php
session_start();

if (isset($_GET["action"]) AND $_GET["action"] == "logout") {
	session_unset();
	session_destroy();
	header("location: index.php");
}
include "assets/includes/level.php";
?>

<div id="box-msg">
	<p class="action-msg"></p>
</div>

<div id="loading-container">
	<div class="animate-avatar-300-150 avatar-loading"></div>
	<div class="object-load"></div>
	<p>carregando</p>
</div>

<div class="modal-login-register">
	<i class="fas fa-times"></i>
	<?php if (isset($_SESSION["id"])) : ?>
		<?php include_once "assets/includes/painel-user.php" ?>
	<?php else : ?>
		<?php include_once "assets/includes/login-register.php" ?>
	<?php endif; ?>
</div> <!-- Modal -->

<header id="cabecalho">
	<div class="background">
	<nav id="menu">
		<div class="menu-item">
			<div></div>
			<div></div>
			<div></div>
		</div> <!-- Button menu mobile -->
		<ul>
			<li><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
			<li><a href="regras.php">Regras</a></li>
			<li><a href="equipe.php">Equipe</a></li>
			<li style="display: none"><a href="#">Submenu<i class="fa fa-caret-right"></i></a>
				<ul>
					<li><a href="#">submenu 1</a></li>
					<li><a href="#">submenu 2</a></li>
					<li><a href="#">submenu 3</a></li>
					<li><a href="#">submenu 4</a></li>
					<li><a href="#">submenu 5</a></li>
				</ul>
			</li>
			<li><a href="sobre.php">Sobre</a></li>
			<li><a href="contato.php">Contato</a></li>
		</ul>

		<ul class="menu-right">
			<li>
				<a href="" class="link-login-register">
					<?php if (isset($_SESSION["id"])) : ?>
						<i class="fas fa-user-circle"></i>
						<?php echo ucfirst($_SESSION["user"]) ?>
					<?php else : ?>
						<i class="fas fa-sign-in-alt"></i>
						<?php echo "Painel" ?>
					<?php endif; ?>
				</a>
			</li>
			<?php if (isset($_SESSION["id"])) : ?>
			<?php echo "<li><a href='?action=logout'><i class='fas fa-sign-out-alt'></i>Sair</a></li>" ?>
			<?php endif; ?>
		</ul>
	</nav>

	<div class="content">

		<a href="index.php">
			<div class="logo-container">
				<img src="assets/images/snake-icon.png">
				<span>
					<h1>Snake</h1>
					<h1>Hunters</h1>
				</span>
			</div>
		</a> <!-- Logo -->
		
		<div class="header-info-container">
			<span>
				<p>Venha se divertir e curtir na mais animada comunidade do plug.dj!</p>
				<a href="https://plug.dj/snakehunters" target="_BLANK" class="button s1">Entrar na comunidade</a>
			</span>
			<div class="animate-avatar avatar-header"></div>
		</div>
	</div>
	</div>
</header>