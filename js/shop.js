let disc_type = 0;
let discountRate = 0;
let discount = 0;
let shipping = 0;

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
				const cart = JSON.parse(res.cart);
				generateAlert(res.message);
				qs(".cart-count").innerHTML = Object.keys(cart).length;
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
		});
}

const refreshCart = (cart) => {
	let total = 0;

	if ($(".cart_inner tbody").length) {
		qs(".cart_inner tbody").innerHTML = '';
	}
	Object.keys(cart).forEach((val, i) => {
		const { id, img, name, qty, maxQty, price, currency } = cart[val];
		total += (qty * price);
		if ($(".cart_inner tbody").length) {
			fetch(siteUrl + `/components/cart-item.php?ajax=1&id=${id}&img=${img}&name=${name}&qty=${qty}&maxQty=${maxQty}&price=${price}&currency=${currency}`)
				.then(res => res.text())
				.then(res => {
					qs(".cart_inner tbody").innerHTML += res;
				})
		}
	});
	if (disc_type == 0) {
		discount = 0;
	} else if (disc_type == 1) {
		discount = discountRate;
	} else if (disc_type == 2) {
		discount = total * (discountRate / 100);
	}
	discount = parseFloat(discount);
	total = parseFloat(total);
	if ($(".cart-total").length) {
		qs(".cart-total").innerHTML = total.toFixed(2);
	}
	if ($(".cart-discount").length) {
		qs(".cart-discount").innerHTML = discount.toFixed(2);
	}
	if ($(".cart-shipping-fee").length) {
		qs(".cart-shipping-fee").innerHTML = shipping.toFixed(2);
	}
}

const applyCoupon = async () => {
	const code = qs("#coupon").value;
	$("#ftco-loader").addClass("show");
	const data = {
		req: "applyCoupon",
		code
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
				const cart = JSON.parse(res.cart);
				disc_type = res.disc_type;
				discountRate = res.discount;
				refreshCart(cart);
			} else {
				generateAlert(res.message, "danger");
			}
		});
}

const updateShipping = async () => {
	const location = qs("#shippingLocation").value;
	$("#ftco-loader").addClass("show");
	const data = {
		req: "updateShipping",
		location
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
				const cart = JSON.parse(res.cart);
				shipping = res.shipping;
				refreshCart(cart);
			} else {
				generateAlert(res.message, "danger");
			}
		})

}