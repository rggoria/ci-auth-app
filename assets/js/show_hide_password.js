$(document).ready(function () {
	$("#toggleLoginPassword").click(function () {
		var loginPasswordInput = $("#login_password");
		var type =
			loginPasswordInput.attr("type") === "password" ? "text" : "password";
		loginPasswordInput.attr("type", type);
		$(this).find("i").toggleClass("bi-eye bi-eye-slash");
	});

	$("#toggleSignupPassword").click(function () {
		var signupPasswordInput = $("#signup_password");
		var type =
			signupPasswordInput.attr("type") === "password" ? "text" : "password";
		signupPasswordInput.attr("type", type);
		$(this).find("i").toggleClass("bi-eye bi-eye-slash");
	});
});
