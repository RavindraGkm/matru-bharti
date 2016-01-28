/*------------------------------
 * Copyright 2014 Pixelized
 * http://www.pixelized.cz
 *
 * Sitename theme v1.0
------------------------------*/



$(document).ready(function() {	
	


<!--Vegas background start -->
	$.vegas({
	  src:'http://localhost/dilipshaadi/assets/img/headers/home/background.jpg'
	});
	
	$.vegas('overlay', {
	  src:'http://localhost/dilipshaadi/assets/img/headers/home/05.png'
	});	
<!--Vegas background end -->

<!-- Time circle countdown start -->	
//	$("#DateCountdown").TimeCircles({
//    "animation": "ticks",
//    "bg_width": 0.2,
//    "fg_width": 0.016666666666666666,
//    "circle_bg_color": "#F5F5F5",
//    "time": {
//        "Days": {
//            "text": "Days",
//            "color": "#FFF",
//            "show": true
//        },
//        "Hours": {
//            "text": "Hours",
//            "color": "#FFF",
//            "show": true
//        },
//        "Minutes": {
//            "text": "Minutes",
//            "color": "#FFF",
//            "show": true
//        },
//        "Seconds": {
//            "text": "Seconds",
//            "color": "#FFF",
//            "show": true
//        }
//    }
//});

<!-- Time circle countdown end -->



<!-- GOOGLE map initialization star-->
	//var myLatlng = new google.maps.LatLng(43.651071, -79.378764);
	//var mapOptions = {
	//  zoom: 17,
	//  center: myLatlng,
	//  navigationControl: false,
	//  mapTypeControl: false,
	//  scaleControl: false,
	//  draggable: true,
	//  scrollwheel: false
	//}

	//var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

	//var marker = new google.maps.Marker({
	//	position: myLatlng,
	//	map: map,
	//	title:"Your Marker!"
	//});

		
<!-- GOOGLE map initialization end-->

<!-- GOOGLE map modal fix start-->
	
	$("#contact").on("shown.bs.modal", function () {
		google.maps.event.trigger(map, "resize");
		map.setCenter(myLatlng);
	});
<!-- GOOGLE map modal fix end-->
	
});

//$(window).resize(function() {
//	$("#DateCountdown").TimeCircles().rebuild();
//});


