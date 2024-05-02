
var map;
var circle;
var marker;
var currentlatlng = new google.maps.LatLng(-26.8533, 133.2751);
var infowindow;

function loadMap() {
   
    setLatLongValue();

    var mapOptions = {
        zoom: 15,
        center: currentlatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById('map'), mapOptions);

    google.maps.event.addDomListener(map, 'click', function (e) {

        currentlatlng = e.latLng;

        if (currentlatlng) {

            map.panTo(currentlatlng);
            setLatLongValue();
            setMarker();
        }
    });

}

function setMarker() {

    if (marker != undefined)
        marker.setMap(null);

    marker = new google.maps.Marker({
        position: currentlatlng,
        draggable: true,
        map: map
    });

    if (marker) {
        google.maps.event.addDomListener(marker, "dragend", function () {
            currentlatlng = marker.getPosition();
            setLatLongValue();
            drawCircle();
        });
        drawCircle();
    }

    if (infowindow) {
        infowindow.close();
    }

    google.maps.event.addListener(marker, "click", function () {

        var data = '<div>Current LatLong:</div><div>' + currentlatlng + '</div>';

        infowindow = new google.maps.InfoWindow({
            content: data,
            position: currentlatlng
        });

        infowindow.open(map);
    });
}

function drawCircle() {

    if (circle != undefined)
        circle.setMap(null);

    var radius = 200;

    if (jQuery('#txtPointB1').val() != '' && !isNaN(jQuery('#txtPointB1').val()) && parseInt(jQuery('#txtPointB1').val()) > 0) {
        radius = parseInt(jQuery('#txtPointB1').val());
    }
    jQuery('#txtPointB1').val(radius.toString());

    var options = {
        strokeColor: '#800000',
        strokeOpacity: 1.0,
        strokeWeight: 1,
        fillColor: '#C64D45',
        fillOpacity: 0.5,
        map: map,
        center: currentlatlng,
        radius: radius
    };

    circle = new google.maps.Circle(options);
}

function setLatLongValue() {

    // jQuery('#txtPointA1').val(-26.8533);
    // jQuery('#txtPointA2').val(133.2751);

}

function getLatLongValue() {

    if (jQuery('#txtPointA1').val() != '' && !isNaN(jQuery('#txtPointA1').val()) ) {
        if (jQuery('#txtPointA2').val() != '' && !isNaN(jQuery('#txtPointA2').val()) && parseInt(jQuery('#txtPointA2').val()) > 0) {
            currentlatlng = new google.maps.LatLng(jQuery('#txtPointA1').val(), jQuery('#txtPointA2').val());
            map.panTo(currentlatlng);
            setMarker();
        }
    }
}

