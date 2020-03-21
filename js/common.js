const siteUrl = "http://localhost/shop3";
const apiUrl = siteUrl + "/api.php";

const qs = s => {
	return document.querySelector(s);
};

const go = s => {
	window.location.href = s;
};

const generateAlert = (msg, type = "") => {
	let icon = "lnr lnr-warning";
	type = type == "" ? "success" : type;
	if (type == "success") {
		icon = "lnr lnr-checkmark-circle";
	}
	$.notify(
		{
			icon,
			message: msg
		},
		{
			type,
			timer: 4000,
			placement: {
				from: "top",
				align: "right"
			},
			newest_on_top: true,
			animate: {
				enter: "animated fadeInDown",
				exit: "animated fadeOutUp"
			}
		}
	);
	$("#ftco-loader").removeClass("show");
};
