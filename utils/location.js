function runLocation() {
	var lat, lon, acc;
	if ("geolocation" in navigator) {
    	navigator.geolocation.getCurrentPosition(function(position) {
      		lat = position.coords.latitude;
      		lon = position.coords.longitude;
      		acc = position.coords.accuracy;
      		alert('lat: ' + lat + ', lon: ' + lon + ', acc: ' + acc);
    	});
  	}
}