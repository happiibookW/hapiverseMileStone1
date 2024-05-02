// google.maps.event.addDomListener(window, 'load', initialize);
$("#address").keyup(function(){
  const center = { lat: -31.953512, lng: 115.857048 };
// Create a bounding box with sides ~10km away from the center point
const defaultBounds = {
  north: center.lat + 0.05,
  south: center.lat - 0.05,
  east: center.lng + 0.05,
  west: center.lng - 0.05,
};
const options = {
  bounds: defaultBounds,
  //componentRestrictions: { country: "ALL" },
  strictBounds: true,
  types: ["geocode"],
};
var input = document.getElementById("address");
var autocomplete = new google.maps.places.Autocomplete(input,options);
autocomplete.addListener('place_changed', function() {
var place = autocomplete.getPlace();
var address = place.formatted_address;
var latitude = place.geometry.location.lat();
var longitude = place.geometry.location.lng();
var latlng = new google.maps.LatLng(latitude, longitude);
var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        var address = results[0].formatted_address;
                        var pin = results[0].address_components[results[0].address_components.length - 1].long_name;
                        // var country = results[0].address_components[results[0].address_components.length - 2].long_name;
                        // var state = results[0].address_components[results[0].address_components.length - 3].long_name;
                        var city = results[0].address_components[results[0].address_components.length - 4].long_name;
                        // document.getElementById('txtCountry').value = country;
                        // document.getElementById('txtState').value = state;
                        document.getElementById('city').value = city;
                        document.getElementById('postalCode').value = pin;
                    }
                }
            });
$('#latitude').val(place.geometry['location'].lat());
$('#longitude').val(place.geometry['location'].lng());
});
});

