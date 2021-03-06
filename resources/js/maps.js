// This sample uses the Place Autocomplete widget to allow the user to search
// for and select a place. The sample then displays an info window containing
// the place ID and other information about the place that the user has
// selected.

// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">




/* 
We used this code on code pen to help speed up our proccess building the map  
We modified the code to save place id and submit it. We are saving it with cookies.

*/
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
			
		//sets a form submit on the map mark and stores it in cookies
		infowindow.setContent('<div ><strong>' + place.name + '</strong><br>' +
			'Save your pub/restraunt Location: <br>'  +
                         "<tr><td><form id = 'myForm' method='get'action='placeIdSubmitDb.php'><input id = 'hiddenField' type='hidden' name='place' value='@'><input type='submit'></form></form></td></tr>"
			+
			place.formatted_address);
		infowindow.open(map, marker);
		
		document.getElementById('hiddenField').value = place.place_id;


	}); // end autocomplete addListener


  
	
}