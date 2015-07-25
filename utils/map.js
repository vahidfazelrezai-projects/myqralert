function runMap() {

	var map;
	function initialize(lat, lon) {
  var myLatlng = new google.maps.LatLng(lat,lon);
  var mapOptions = {
    zoom: 14,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Patient here!'
  });
	}

	var lat, lon, acc;
	if ("geolocation" in navigator) {
    	navigator.geolocation.getCurrentPosition(function(position) {
      		lat = position.coords.latitude;
      		lon = position.coords.longitude;
      		acc = position.coords.accuracy;
      		initialize(lat, lon);
    	});
  	}

	
}