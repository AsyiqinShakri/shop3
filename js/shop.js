const addToCart = async (id, qty = 0) => {
	$("#ftco-loader").addClass("show");
	if (qty == 0) {
		qty = qs("#qty").value;
	}
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
		body: btoa(JSON.stringify(data))
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
