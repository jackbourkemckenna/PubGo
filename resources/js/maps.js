// This sample uses the Place Autocomplete widget to allow the user to search
// for and select a place. The sample then displays an info window containing
// the place ID and other information about the place that the user has
// selected.

// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

function initMap() {
	var map = new google.maps.Map(document.getElementById('map'), {
		center: {
			lat: 53.3498,
			lng: -6.2603
		},
		zoom: 13
	});

	var input = document.getElementById('pac-input');

	var autocomplete = new google.maps.places.Autocomplete(input);
	autocomplete.bindTo('bounds', map);

	map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

	var infowindow = new google.maps.InfoWindow();
	var marker = new google.maps.Marker({
		map: map
	});
	marker.addListener('click', function() {
		infowindow.open(map, marker);
	});

	autocomplete.addListener('place_changed', function() {
		infowindow.close();
		var place = autocomplete.getPlace();
		if (!place.geometry) {
			return;
		}

		if (place.geometry.viewport) {
			map.fitBounds(place.geometry.viewport);
		} else {
			map.setCenter(place.geometry.location);
			map.setZoom(17);
		}

		// Set the position of the marker using the place ID and location.
		marker.setPlace({
			placeId: place.place_id,
			location: place.geometry.location
		});
		marker.setVisible(true);

		infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
			'Place ID: ' + place.place_id + '<br>' +
			place.formatted_address);
		infowindow.open(map, marker);

		var service = new google.maps.places.PlacesService(map);
		
		var details_container = document.getElementById('details');
		
		service.getDetails({
			placeId: place.place_id
		}, function(place, status) {
			details_container.innerHTML = '<p><strong>Status:</strong> <code>' + status + '</code></p>' +
				'<p><strong>Place ID:</strong> <code>' + place.place_id + '</code></p>' +
				'<p><strong>Location:</strong> <code>' + place.geometry.location.lat() + ', ' + place.geometry.location.lng() + '</code></p>' +

				'<p><strong>Formatted address:</strong> <code>' + place.formatted_address + '</code></p>' +
				'<p><strong>GMap Url:</strong> <code>' + place.url + '</code></p>' +
				'<p><strong>Place details:</strong></p>' +
				'<pre>' + JSON.stringify(place, null, " ") + '</pre>';

		});

	}); // end autocomplete addListener
}