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

const updateQty = async (id, qty) => {
	$("#ftco-loader").addClass("show");
	const data = {
		req: "updateQty",
		id,
		qty
	}
	await fetch(apiUrl, {
		method: "POST",
		headers: {
			"Content-Type": "application/json;charset=utf-8"
		},
		body: btoa(JSON.stringify(data))
	})
		.then(res => res.json())
		.then(res => {
			if (res.status) {
				if (res.cart != '') {
					const cart = JSON.parse(res.cart);
					refreshCart(cart);
					// generateAlert(res.message);
				} else {
					generateAlert(res.message, "danger");
				}
			}
			$("#ftco-loader").removeClass("show");
		});
}

const deleteCartItem = async (id) => {
	$("#ftco-loader").addClass("show");
	const data = {
		req: "deleteCartItem",
		id
	}
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
				if (res.cart != '') {
					const cart = JSON.parse(res.cart);
					refreshCart(cart);
				}
			} else {
				generateAlert(res.message, "danger");
			}
		})
}

const refreshCart = (cart) => {
	let total = 0;
	qs(".cart_inner tbody").innerHTML = '';
	Object.keys(cart).forEach((val, i) => {
		const { id, img, name, qty, maxQty, price, currency } = cart[val];
		total += (qty * price);
		fetch(siteUrl + `/components/cart-item.php?ajax=1&id=${id}&img=${img}&name=${name}&qty=${qty}&maxQty=${maxQty}&price=${price}&currency=${currency}`)
			.then(res => res.text())
			.then(res => {
				qs(".cart_inner tbody").innerHTML += res;
			})
	});
	total = parseFloat(total);
	qs(".cart-total").innerHTML = total.toFixed(2);
}