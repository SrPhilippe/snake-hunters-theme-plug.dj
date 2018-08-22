// Após os documentos serem carregados
$(document).ready(() => {
    // Inicia objeto wow
    new WOW().init();

    // Evento disparado ao rolar a página
    $(window).scroll(() => {
        var menuH = $("#menu").height();
        var bodyH = $("body").height();
        var sTop = $(window).scrollTop();
        var widthW = $(window).width();
        var heightW = $(window).height();

        // Menu fixo ao rolar página
        if ($(this).scrollTop() > menuH) {
            $("#cabecalho").css("padding-top", menuH);
            $("#menu").addClass("fixed");
        } else {
            $("#menu").removeClass("fixed");
            $("#cabecalho").css("padding-top", "0");
        }
        // Aparecer e ocultar (Voltar ao topo)
        if ($(this).scrollTop() > (bodyH - heightW) * 0.5) {
            $("#back-to-top").fadeIn(500);
        } else {
            $("#back-to-top").fadeOut(500);
        }

        // Efeito parallax
        if (widthW > 768) {
            $("#cabecalho").css({
                "backgroundPosition": "center " + (sTop * .8) + "px"
            });
        }
    });

    // login things
    $(".link-login-register").click((e) => {
        e.preventDefault();
        $(".modal-login-register").addClass("showFlex");
        $("body").css("overflow-y", "hidden");
        $("#box-form form").find("input:first").focus();
    });

    $(".modal-login-register .fa-times").click((e) => {
        e.preventDefault();
        $(".modal-login-register").removeClass("showFlex");
        $("body").css("overflow-y", "auto");
    });


    // Botão alterar formulário login / register
    $("#box-form .button-toggle").click((e) => {
        $("#box-form form").slideToggle(500);
        $("#box-form form").find("input:first").focus();
    });

    // Menu mobile click
    $(".menu-item").click((e) => {
        e.preventDefault();
        $("#menu > ul").slideToggle();
    })

    // Script para ocultar marca d'agua 000webhost
    $("div[style='text-align: right;position: fixed;z-index:9999999;bottom: 0; width: 100%;cursor: pointer;line-height: 0;display:block !important;']").css("display", "none");

    $(".scroll").click(function(event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: $(this.hash).offset().top
        }, 1000);
    });

}); /*Fim document ready*/

// Após todos os arquivos do site serem carregados
window.onload = function() {
    $("#loading-container").fadeOut(500);
    $("body").css("overflow-y", "auto");
};