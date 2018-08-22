<?php include "assets/includes/config.php" ?>
<!DOCTYPE html>
<html lang="<?php echo $lang ?>">

<?php $titlePage = "Home" ?>
<?php include "assets/includes/head.php" ?> <!-- Head -->
<body>
<?php include "assets/includes/header.php" ?> <!-- Header -->
<div id="main">
	<section id="discord" class="default-section">
		<div class="content">
			<span class="top">
				<h1 class="wow animated lightSpeedIn">Discord</h1>
				<p class="gg-online"></p>
			</span>
			<div class="gg-users">
			</div>
			<img class="discord-logo wow animated lightSpeedIn" src="assets/images/discord.png" alt="">
			<h2 class="wow animated slideInUp">Junte-se ao nosso servidor!</h2>
			<p class="wow animated slideInDown">Canais de voz para se comunicar com outros membros da comunidade; bate-papo; informações relacionadas sobre a sala como: regras, calendário de eventos, equipe etc...</p>
			<a href="https://discord.me/snakehunters" target="_BLANK" class="button btn-discord wow animated zoomIn" data-wow-delay=".3s">Entrar no discord</a>
			<script>
				$(document).ready(() => {
					$.get({
						url: "https://ptb.discordapp.com/api/guilds/391386686250156033/widget.json",
						success: (ggD) => {
							var Mcount = ggD.members.length;
							$(".gg-online").text(ggD.members.length + " " + "Membros online");

							var wait = 50;
							for (var i = 0; i < Mcount; i++) {
								$(".gg-users").append("<img class='gg-avatar wow animated bounceIn' data-wow-delay='" + wait + "ms" + "' src='" + ggD.members[i].avatar_url + "'>");
								wait = wait + 50;
							}
						}
					});
				});
			</script>
		</div>
	</section>
</div>
<?php include "assets/includes/footer.php" ?> <!-- Footer -->
</body>
</html>