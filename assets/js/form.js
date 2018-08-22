$(window).ready(() => {
	var msg = $(".action-msg");
	var boxMsg = $("#box-msg");

	// Mostrar e ocultar senha de cada elemento
	$("#box-form form").each((index, el) => {
		var toggle = true;
		$(el).find("input.show-pass").click(() => {
			var $pass = $(el).find("input[name='password']");
			var type = $pass.attr("type");
			// Shorthand If and Else
			(type == "password") ? $pass.attr("type", "text") : $pass.attr("type", "password");
		});
	});

	jQuery.validator.addMethod("noSpace", function(value, element) { 
	  return value.indexOf(" ") < 0 && value != ""; 
	}, "Não é permitido o uso de espaço");

	$("#box-form form").each((index, el) => {
		$(el).validate({
			rules: {
				username: {
					required: true,
					minlength: 3,
					maxlength: 15,
					noSpace: true
				},
				password: {
					required: true,
					minlength: 6,
					maxlength: 20
				},
				email: {
					required: true,
					email: true
				},
				plugID: {
					required: true,
					maxlength: 11,
					noSpace: true
				}
			},
			messages: {
				username: {
					required: "Insira seu usuário!",
					minlength: jQuery.validator.format("Mínimo de {0} caracteres"),
					maxlength: jQuery.validator.format("Máximo de {0} caracteres")
				},
				password: {
					required: "Insira sua senha!",
					minlength: jQuery.validator.format("Mínimo de {0} caracteres"),
					maxlength: jQuery.validator.format("Máximo de {0} caracteres")
				},
				email: {
					required: "Insira seu E-mail!",
					email: "Por favor insira um e-mail válido!"
				},
				plugID: {
					required: "Insira seu ID no plug.dj",
					maxlength: jQuery.validator.format("Máximo de {0} caracteres")
				}
			},
			submitHandler: subForm
		});

		function subForm() {
			var data = $(el).serialize();
				$.ajax({
					method: "POST",
					url: "assets/data.php",
					data: data,
					beforeSend: () => {
						msg.html("Verificando <i class='fas fa-spinner'>");
						boxMsg.slideDown();
					},
					success: (resp) => {
						console.log(resp);
						if (resp == "1") {
							msg.text("Logado com sucesso!");
							boxMsg.slideDown(500, () => {
								window.location.reload();
							});
						} else if (resp == "2" || resp == "3") {
							msg.text("Dados incorretos ou inexistentes!");
							boxMsg.slideDown();
						}else if (resp == "4") {
							msg.text("Usuário ou e-mail já cadastrado!");
							boxMsg.slideDown();
						} else if (resp == "5") {
							$("#box-form form").slideToggle(500);
							msg.text("Registrado com sucesso! Você já pode realizar login!");
							boxMsg.slideDown();
						} else {
							msg.text(resp);
							boxMsg.slideDown();
						}
					},
					complete: () => {
						boxMsg.delay(3000).slideUp();
					}
				});
		}
	});


	$(".form-avatar input[type='file']").change((e) => {
		var valueFile = $(".form-avatar input[type='file']").val().replace("C:\\fakepath\\", "");
		$(".form-avatar p.value").text(valueFile);
	});

		$(".row form").each((index, el) => {
			$(el).on("submit", (e) => {
				e.preventDefault();
				// AVATAR
				if ($(el).hasClass("form-avatar")) {
					var formData = new FormData($(".form-avatar")[0]);
					$.ajax({
						method: "POST",
						url: "assets/profile-ajax.php",
						data: formData,
						contentType: false,
						processData: false,
						beforeSend: mostraProc("Enviando"),
						success: (resp) => {
							var obResp = $.parseJSON(resp);
							console.log(obResp);
							if (obResp.status == "OK") {
								msg.text("Imagem Enviada com sucesso!");
								boxMsg.slideDown();
								window.location.reload();
							} else if (obResp.status == "sizeOut") {
								msg.text("Tamanho do arquivo muito grande");
								boxMsg.slideDown();
							} else if (obResp.status == "fileError") {
								msg.text("Erro ao enviar o arquivo");
								boxMsg.slideDown();
							} else if (obResp.status == "extFalse") {
								msg.text("Formato da imagem não suportado");
								boxMsg.slideDown();
							} else if (obResp.status == "fatal") {
								msg.text("Erro fatal");
								boxMsg.slideDown();
							}
						},
						complete: processoComp
					});

				// BIOGRAFIA
				} else if ($(el).hasClass('form-bio')) {
					var data = $(el).serialize();
					console.log(data);
					$.ajax({
						method: "POST",
						url: "assets/profile-ajax.php",
						data: data,
						beforeSend: mostraProc("Alterando"),
						success: (resp) => {
							if (resp == "bio_ok") {
								msg.text("Biografia alterada!");
								boxMsg.slideDown();
								window.location.reload();
							}
						},
						complete: processoComp
					});
				}
			});
		});

// Função para mostrar o processo de envio
function mostraProc(tipoProc) {
	msg.html(tipoProc + " " + "<i class='fas fa-circle-notch'>");
	boxMsg.slideDown();
};

// Função genérica para fechar box ao terminar envio
function processComplete() {
	
};


});