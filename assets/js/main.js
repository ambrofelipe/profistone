$ = jQuery;

(function ($) {
	// Resets classes and sets new one. Used in form field validation.
	$.fn.setClass = function (classes) {
		this.attr("class", classes);
		return this;
	};

	function cookieBar() {
		var cookieName = "profistone_cookies_accept";
		if ($("#cookies").length > 0 && !Cookies.get(cookieName)) {
			$("#cookies").fadeIn();
		}

		$("#cookies-accept").on("click", function () {
			Cookies.set(cookieName, 1);
			$("#cookies").fadeOut("fast");
		});

		$("#cookies-decline").on("click", function () {
			$("#cookies").fadeOut("fast");
		});
	}

	function submitForm() {
		const form = $(".contact form");
		const submit = $(".contact form button");
		const thanks = $(".dim, .thanks");
		const loader = $(".loading");

		// Reset error individually
		$("input, textarea").on("focus", function () {
			$(this).parent().removeClass();
		});

		$("input[type='checkbox']").on("change", function () {
			$(this).next().removeClass();
		});

		// Handles placeholders
		$("input, textarea").on("focus", function () {
			$(this).prop("placeholder", "");
		});

		$("input#name").on("focusout", function () {
			$(this).prop("placeholder", "Nome");
		});

		$("input#email").on("focusout", function () {
			$(this).prop("placeholder", "E-mail");

			if (!checkEmail($(this).val())) {
				$(this).parent().setClass("error");
			} else {
				$(this).parent().setClass("success");
			}
		});

		$("input#phone").on("focusout", function () {
			$(this).prop("placeholder", "Telefone (opcional)");
		});

		$("textarea").on("focusout", function () {
			$(this).prop("placeholder", "Mensagem");
		});

		submit.on("click", function (e) {
			e.preventDefault();
			$(this).css("pointer-events", "none");

			$("input, textarea").removeClass();

			const name = $("input#name");
			const email = $("input#email");
			const phone = $("input#phone");
			const message = $("textarea");
			const check = $("input#terms");

			if ($.trim(name.val()).length < 3) {
				name.parent().setClass("error");
			} else {
				name.parent().setClass("success");
			}

			if (!checkEmail(email.val())) {
				email.parent().setClass("error");
			} else {
				email.parent().setClass("success");
			}

			if ($.trim(message.val()).length < 15) {
				message.parent().setClass("error");
			} else {
				message.parent().setClass("success");
			}

			if (!check.is(":checked")) {
				check.next().setClass("error");
			} else {
				check.next().removeClass();
			}

			if ($("label.error").length <= 0) {
				loader.animate({ opacity: 1 }, "fast");

				// SUBMIT FORM
				const mail = {
					action: 'profistone_mail',
					post_id: submit.data("post"),
					nonce: submit.data("nonce"),
					url: window.location.href,
					name: name.val(),
					email: email.val(),
					phone: phone.val(),
					message: message.val(),
					check: check.is(":checked") ? "Autorizo." : "Não autorizo.",
				};

				jQuery
					.ajax({
						type: "POST",
						url: settings.ajaxurl,
						data: mail,
					})
					.done(function (response) {
						if (response.success === true) {
							thanks.fadeIn();
							loader.animate({ opacity: 0 }, "fast");
							$("input, textarea").parent().removeClass();
							$("input#terms").prop("checked", false);
							$("input#terms").next().removeClass();
							$("input, textarea").val("");
							console.log(response.data);
						}
					})
					.fail(function (xhr, textStatus, error) {
						thanks.find("h1").text(settings.error);
						console.log(xhr.statusText);
						console.log(textStatus);
						console.log(error);
					});

				// setTimeout(function () {
				// 	thanks.fadeIn();
				// 	loader.animate({ opacity: 0 }, "fast");
				// 	$("input, textarea").parent().removeClass();
				// 	$("input#terms").prop("checked", false);
				// 	$("input#terms").next().removeClass();
				// 	$("input, textarea").val("");
				// }, 2000);
			}

			$(this).trigger("focusout");
			$(this).css("pointer-events", "auto");
		});
	}

	function handlePopup() {
		const thanks = $(".dim, .thanks");
		const closeBtn = $(".thanks button");
		const loader = $(".loading");

		closeBtn.on("click", function () {
			thanks.fadeOut();
			loader.animate({ opacity: 0 }, "fast");
		});
	}

	function checkEmail(email) {
		const reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
		return reg.test(email);
	}

	function init() {
		cookieBar();
		submitForm();
		handlePopup();
	}

	init();
})(jQuery);
