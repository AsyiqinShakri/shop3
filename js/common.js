const apiUrl = "http://localhost/shop3/api.php";

const qs = s => {
	return document.querySelector(s);
};

const generateAlert = (msg, type = "success") => {
	let icon = "lnr lnr-warning";
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
};
