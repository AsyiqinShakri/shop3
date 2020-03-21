$("#loginForm").on("submit", function(e) {
	e.preventDefault();
	login();
});

$("#registerForm").on("submit", function(e) {
	e.preventDefault();
	register();
});

const register = async () => {
	$("#ftco-loader").addClass("show");

	const usr = qs("#registerForm #remail").value;
	const pwd = qs("#registerForm #rpassword").value;
	const pwd2 = qs("#registerForm #rcpassword").value;

	if (usr == "") {
		generateAlert("Email cannot be empty!", "danger");
	} else if (pwd == "" || pwd.length < 6) {
		generateAlert(
			"Password cannot be empty or less than 6 characters!",
			"danger"
		);
	} else if (pwd2 == "" || pwd2.length < 6) {
		generateAlert(
			"Confirm Password cannot be empty or less than 6 characters!",
			"danger"
		);
	} else if (pwd != pwd2) {
		generateAlert(
			"Password must be the same as Confirm Password!",
			"danger"
		);
	} else {
		const data = {
			req: "register",
			usr,
			pwd
		};
		await fetch(apiUrl, {
			method: "POST",
			headers: {
				"Content-Type": "application/json;charset=utf-8"
			},
			body: btoa(JSON.stringify(data))
		})
			.then(res => res.json())
			.then(res => {
				$("#ftco-loader").removeClass("show");
				if (res.status) {
					go(siteUrl + "/login.php?resiger=1");
				} else {
					generateAlert(res.message, "danger");
				}
			});
	}
};

const login = async () => {
	$("#ftco-loader").addClass("show");

	const usr = qs("#loginForm #email").value;
	const pwd = qs("#loginForm #password").value;
	const remember = qs("#loginForm #rememberMe").checked ? 1 : 0;

	if (usr == "") {
		generateAlert("Email cannot be empty!", "danger");
	} else if (pwd == "" || pwd.length < 6) {
		generateAlert(
			"Password cannot be empty or less than 6 characters!",
			"danger"
		);
	} else {
		const data = {
			req: "login",
			usr,
			pwd,
			remember
		};
		await fetch(apiUrl, {
			method: "POST",
			headers: {
				"Content-Type": "application/json;charset=utf-8"
			},
			body: btoa(JSON.stringify(data))
		})
			.then(res => res.json())
			.then(res => {
				$("#ftco-loader").removeClass("show");
				if (res.status) {
					go(siteUrl + "/category.php?welcome=1");
				} else {
					generateAlert(res.message, "danger");
				}
			});
	}
};
