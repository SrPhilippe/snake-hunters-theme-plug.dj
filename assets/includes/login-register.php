<!-- 	<div class="info">
		<h1>Olá você :)</h1>
		<p>Cadastrando no nosso website você poderá substituir seu emblema no plug.dj por uma foto escolhida. Mais recursos serão adicionados em breve.</p>
	</div> -->

	<div id="box-form">
		<form method="POST">
			<p class="info-input">Login</p>
			<input type="text" name="username">

			<p class="info-input">Senha</p>
			<input type="password" name="password" class="password">

			<div class="login-config">
				<span>
					<input type="checkbox" class="show-pass">
					<p class="info-input">Mostrar senha</p>
				</span>
				<span>
					<input type="checkbox" disabled class="keep-in" name="keep">
					<p class="info-input">Manter logado</p>
				</span>
			</div>

			<input type="submit" value="Logar" name="login">
			<button type="button" class="button-toggle">Registrar</button>
		</form> <!-- Form Login -->

		<form method="POST">
			<p class="info-input">Id do plug.dj</p>
			<input type="text" name="plugID" placeholder="Verifique antes de prosseguir">

			<p class="info-input">Login</p>
			<input type="text" name="username">

			<p class="info-input">E-mail</p>
			<input type="email" name="email">

			<p class="info-input">Senha</p>
			<input type="password" name="password" class="password">
			<span>
				<input type="checkbox" class="show-pass">
				<p class="info-input">mostrar senha</p>
			</span>

			<input type="submit" value="Registrar" name="register">
			<button type="button" class="button-toggle">Já tenho uma conta</button>
		</form> <!-- Form Register -->
	</div>