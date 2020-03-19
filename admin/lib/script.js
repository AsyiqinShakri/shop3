const gebi = id => {
	return document.getElementById(id);
};
const qs = e => {
	return document.querySelector(e);
};
const qsa = e => {
	return document.querySelectorAll(e);
};

const delRec = () => {
	let del_id = qs("#del_id").value;
	del_id = del_id.substring(0, del_id.length - 1);
	if (del_id === "") {
		alert("No records selected.");
	} else if (confirm("Confirm delete selected rows?")) {
		qs("#del_id").value = del_id;
		document.fs.submit();
	}
};

const updateDel = () => {
	let elms = qsa(
		"table[data-toggle=table] .bs-checkbox input[type='checkbox']:checked:not([name='bSelectAll'])"
	);
	let txt = "";
	elms.forEach(e => {
		let id = e.parentNode.parentNode.parentNode.getAttribute("data-id");
		if (id !== "" && id !== null) {
			txt += id + ",";
		}
	});
	qs("#del_id").value = txt;
};

$(document).ready(function() {
	let checks = qsa(
		"table[data-toggle=table] .bs-checkbox input[type='checkbox']"
	);
	for (let i = 0; i < checks.length; i++) {
		checks[i].addEventListener("change", updateDel);
	}
});
