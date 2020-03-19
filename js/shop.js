const addToCart = async id => {
	$("#ftco-loader").addClass("show");
	const qty = qs("#qty").value;
	const data = {
		req: "addToCart",
		id,
		qty
	};
	await fetch(apiUrl, {
		method: "POST",
		headers: {
			"Content-Type": "application/json;charset=utf-8"
		},
		body: JSON.stringify(data)
	})
		.then(res => res.json())
		.then(res => {
			$("#ftco-loader").removeClass("show");
			if (res.status) {
				generateAlert(res.message);
			} else {
				generateAlert(res.message, "danger");
			}
		});
};
