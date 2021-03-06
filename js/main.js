$(document).ready(function() {
	"use strict";

	if ($("#ftco-loader").length > 0) {
		$("#ftco-loader").removeClass("show");
	}

	var window_width = $(window).width(),
		window_height = window.innerHeight,
		header_height = $(".default-header").height(),
		header_height_static = $(".site-header.static").outerHeight(),
		fitscreen = window_height - header_height;

	$(".fullscreen").css("height", window_height);
	$(".fitscreen").css("height", fitscreen);

	//------- Active Nice Select --------//

	// $("select").niceSelect();
	if ($("select").length) {
		$("select").select2();
	}

	$(".navbar-nav li.dropdown").hover(
		function() {
			$(this)
				.find(".dropdown-menu")
				.stop(true, true)
				.delay(200)
				.fadeIn(500);
		},
		function() {
			$(this)
				.find(".dropdown-menu")
				.stop(true, true)
				.delay(200)
				.fadeOut(500);
		}
	);

	$(".img-pop-up").magnificPopup({
		type: "image",
		gallery: {
			enabled: true
		}
	});

	// Search Toggle
	$("#search_input_box").hide();
	$("#search").on("click", function() {
		$("#search_input_box").slideToggle();
		$("#search_input").focus();
	});
	$("#close_search").on("click", function() {
		$("#search_input_box").slideUp(500);
	});

	/*==========================
		javaScript for sticky header
		============================*/
	$(".sticky-header").sticky();

	/*=================================
    Options for carousel
	==================================*/
	let opt = {
		slidesToShow: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		infinite: true,
		dots: false,
		prevArrow: "<img class='slick-prev' src='img/product/prev.png'>",
		nextArrow: "<img class='slick-next' src='img/product/next.png'>"
	};

	/*=================================
    Javascript for banner area carousel
	==================================*/
	if ($(".active-banner-slider").length) {
		$(".active-banner-slider").slick({
			...opt,
			responsive: [
				{
					breakpoint: 425,
					settings: {
						arrows: false
					}
				}
			]
		});
	}

	/*=================================
    Javascript for product area carousel
	==================================*/
	if ($(".active-product-area").length) {
		$(".active-product-area").slick({
			...opt
		});
	}

	/*=================================
    Javascript for single product area carousel
	==================================*/
	$(".s_Product_carousel").slick({
		...opt,
		arrows: false,
		dots: true
	});

	/*=================================
    Javascript for exclusive area carousel
	==================================*/
	$(".active-exclusive-product-slider").slick({
		...opt
	});

	// Select all links with hashes
	$('.main-menubar a[href*="#"]')
		// Remove links that don't actually link to anything
		.not('[href="#"]')
		.not('[href="#0"]')
		.click(function(event) {
			// On-page links
			if (
				location.pathname.replace(/^\//, "") ==
					this.pathname.replace(/^\//, "") &&
				location.hostname == this.hostname
			) {
				// Figure out element to scroll to
				var target = $(this.hash);
				target = target.length
					? target
					: $("[name=" + this.hash.slice(1) + "]");
				// Does a scroll target exist?
				if (target.length) {
					// Only prevent default if animation is actually gonna happen
					event.preventDefault();
					$("html, body").animate(
						{
							scrollTop: target.offset().top - 70
						},
						1000,
						function() {
							// Callback after animation
							// Must change focus!
							var $target = $(target);
							$target.focus();
							if ($target.is(":focus")) {
								// Checking if the target was focused
								return false;
							} else {
								$target.attr("tabindex", "-1"); // Adding tabindex for elements not focusable
								$target.focus(); // Set focus again
							}
						}
					);
				}
			}
		});

	if (document.getElementById("js-countdown")) {
		var countdown = new Date("October 17, 2020");

		function getRemainingTime(endtime) {
			var milliseconds = Date.parse(endtime) - Date.parse(new Date());
			var seconds = Math.floor((milliseconds / 1000) % 60);
			var minutes = Math.floor((milliseconds / 1000 / 60) % 60);
			var hours = Math.floor((milliseconds / (1000 * 60 * 60)) % 24);
			var days = Math.floor(milliseconds / (1000 * 60 * 60 * 24));

			return {
				total: milliseconds,
				seconds: seconds,
				minutes: minutes,
				hours: hours,
				days: days
			};
		}

		function initClock(id, endtime) {
			var counter = document.getElementById(id);
			var daysItem = counter.querySelector(".js-countdown-days");
			var hoursItem = counter.querySelector(".js-countdown-hours");
			var minutesItem = counter.querySelector(".js-countdown-minutes");
			var secondsItem = counter.querySelector(".js-countdown-seconds");

			function updateClock() {
				var time = getRemainingTime(endtime);

				daysItem.innerHTML = time.days;
				hoursItem.innerHTML = ("0" + time.hours).slice(-2);
				minutesItem.innerHTML = ("0" + time.minutes).slice(-2);
				secondsItem.innerHTML = ("0" + time.seconds).slice(-2);

				if (time.total <= 0) {
					clearInterval(timeinterval);
				}
			}

			updateClock();
			var timeinterval = setInterval(updateClock, 1000);
		}

		initClock("js-countdown", countdown);
	}

	// google map
	if ($("#mapBox").length) {
		var $lat = $("#mapBox").data("lat");
		var $lon = $("#mapBox").data("lon");
		var $zoom = $("#mapBox").data("zoom");
		var $marker = $("#mapBox").data("marker");
		var $info = $("#mapBox").data("info");
		var $markerLat = $("#mapBox").data("mlat");
		var $markerLon = $("#mapBox").data("mlon");
		var map = new GMaps({
			el: "#mapBox",
			lat: $lat,
			lng: $lon,
			scrollwheel: false,
			scaleControl: true,
			streetViewControl: false,
			panControl: true,
			disableDoubleClickZoom: true,
			mapTypeControl: false,
			zoom: $zoom,
			styles: [
				{
					featureType: "water",
					elementType: "geometry.fill",
					stylers: [
						{
							color: "#dcdfe6"
						}
					]
				},
				{
					featureType: "transit",
					stylers: [
						{
							color: "#808080"
						},
						{
							visibility: "off"
						}
					]
				},
				{
					featureType: "road.highway",
					elementType: "geometry.stroke",
					stylers: [
						{
							visibility: "on"
						},
						{
							color: "#dcdfe6"
						}
					]
				},
				{
					featureType: "road.highway",
					elementType: "geometry.fill",
					stylers: [
						{
							color: "#ffffff"
						}
					]
				},
				{
					featureType: "road.local",
					elementType: "geometry.fill",
					stylers: [
						{
							visibility: "on"
						},
						{
							color: "#ffffff"
						},
						{
							weight: 1.8
						}
					]
				},
				{
					featureType: "road.local",
					elementType: "geometry.stroke",
					stylers: [
						{
							color: "#d7d7d7"
						}
					]
				},
				{
					featureType: "poi",
					elementType: "geometry.fill",
					stylers: [
						{
							visibility: "on"
						},
						{
							color: "#ebebeb"
						}
					]
				},
				{
					featureType: "administrative",
					elementType: "geometry",
					stylers: [
						{
							color: "#a7a7a7"
						}
					]
				},
				{
					featureType: "road.arterial",
					elementType: "geometry.fill",
					stylers: [
						{
							color: "#ffffff"
						}
					]
				},
				{
					featureType: "road.arterial",
					elementType: "geometry.fill",
					stylers: [
						{
							color: "#ffffff"
						}
					]
				},
				{
					featureType: "landscape",
					elementType: "geometry.fill",
					stylers: [
						{
							visibility: "on"
						},
						{
							color: "#efefef"
						}
					]
				},
				{
					featureType: "road",
					elementType: "labels.text.fill",
					stylers: [
						{
							color: "#696969"
						}
					]
				},
				{
					featureType: "administrative",
					elementType: "labels.text.fill",
					stylers: [
						{
							visibility: "on"
						},
						{
							color: "#737373"
						}
					]
				},
				{
					featureType: "poi",
					elementType: "labels.icon",
					stylers: [
						{
							visibility: "off"
						}
					]
				},
				{
					featureType: "poi",
					elementType: "labels",
					stylers: [
						{
							visibility: "off"
						}
					]
				},
				{
					featureType: "road.arterial",
					elementType: "geometry.stroke",
					stylers: [
						{
							color: "#d6d6d6"
						}
					]
				},
				{
					featureType: "road",
					elementType: "labels.icon",
					stylers: [
						{
							visibility: "off"
						}
					]
				},
				{},
				{
					featureType: "poi",
					elementType: "geometry.fill",
					stylers: [
						{
							color: "#dadada"
						}
					]
				}
			]
		});
	}
});
