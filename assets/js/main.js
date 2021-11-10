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
		const submit = $("form button");
		const thanks = $(".dim, .thanks");
		const loader = $(".loading");

		// Reset error individually
		$("input, textarea").on("focus", function () {
			$(this).parent().removeClass();

			if ($(this).attr("type") == "checkbox") {
				$(this).next().removeClass();
			}
		});

		// Handles placeholders
		$("input, textarea").on("focus", function () {
			$(this).prop("placeholder", "");
		});

		$("input[name='name']").on("focusout", function () {
			$(this).prop("placeholder", "Nome");
		});

		$("input[name='email']").on("focusout", function () {
			$(this).prop("placeholder", "E-mail");

			if (!checkEmail($(this).val())) {
				$(this).parent().setClass("error");
			} else {
				$(this).parent().setClass("success");
			}
		});

		$("input[name='phone']").on("focusout", function () {
			$(this).prop("placeholder", "Telefone (opcional)");
		});

		$("textarea").on("focusout", function () {
			$(this).prop("placeholder", "Mensagem");
		});

		submit.on("click", function (e) {
			e.preventDefault();
			$(this).css("pointer-events", "none");

			$("input, textarea").removeClass();

			const name = $("input[name='name']");
			const email = $("input[name='email']");
			const phone = $("input[name='phone']");
			const text = $("textarea");
			const check = $("input[type='checkbox']");

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

			if ($.trim(text.val()).length < 15) {
				text.parent().setClass("error");
			} else {
				text.parent().setClass("success");
			}

			if (!check.is(":checked")) {
				check.next().setClass("error");
			} else {
				check.next().removeClass();
			}

			if ($("label.error").length <= 0) {
				loader.animate({ opacity: 1 }, "fast");

				// SUBMIT FORM
				const submitURL = "";

				const mailData = {
					name: name.val(),
					email: email.val(),
					phone: phone.val(),
					text: text.val(),
					check: check.is(":checked") ? "Autorizo." : "Não autorizo.",
				};

				// jQuery
				// 	.ajax({
				// 		type: "POST",
				// 		url: submitURL,
				// 		data: mailData,
				// 	})
				// 	.done(function (data) {
				// 		if (data == "OK") {
				// 			thanks.fadeIn();
				// 		}
				// 	})

				// 	.fail(function (xhr, textStatus, error) {
				// 		console.log(xhr.statusText);
				// 		console.log(textStatus);
				// 		console.log(error);
				// 	});

				setTimeout(function () {
					thanks.fadeIn();
					loader.animate({ opacity: 0 }, "fast");
				}, 2000);
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
