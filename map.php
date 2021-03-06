<script>
	var lat = 46.606111; // latitude par défaut
	var lng = 1.875278; // longitude par défaut
	var homeLatlng = new google.maps.LatLng(lat, lng); // coordonnée par défaut
	var infowindow;
	var marker;
	var markers;
	var map;

	function initialize(){
		/*var styles=[];
		var styledMap = new google.maps.StyledMapType(styles, {name: "Gmap Style"});*/
		var myOptions={
			center: homeLatlng, // centre de la carte
			zoom: 6, //zoom level à 6
			mapTypeId: google.maps.MapTypeId.ROADMAP //type de map
		};
		map = new google.maps.Map(document.getElementById('map-canvas'),myOptions); // initialisation de la map
		
		/*map.mapTypes.set('map_style', styledMap);
		map.setMaptypeId('map_style');*/

		downloadUrl("xml/point.xml", function(data) {
		      markers = data.documentElement.getElementsByTagName("marker");
		      for (var i = 0; i < markers.length; i++) {
			  var latlng = new google.maps.LatLng(parseFloat(markers[i].getAttribute("lat")),
				                    parseFloat(markers[i].getAttribute("lng")));
			  marker = createMarker(markers[i].getAttribute("id"), markers[i].getAttribute("date"), markers[i].getAttribute("siecle"), markers[i].getAttribute("region"),  markers[i].getAttribute("typologie"),markers[i].getAttribute("info"), latlng);
		    }
		  });
		
		
		//
		//
	}
	google.maps.event.addDomListener(window, 'resize', initialize);
	google.maps.event.addDomListener(window, 'load', initialize);
	
	function createMarker(id, date, siecle, region, typologie, info, latlng) { // CREATION MARKER
	    var marker = new google.maps.Marker({
			position: latlng, 
			map: map,
			icon: 'img/marker_grey.png',
			visible: true // POUR TOUT CACHER
		});
		
	    google.maps.event.addListener(marker, "click", function() { // FONCTION POUR LA POP UP
	      if (infowindow) infowindow.close();
	      infowindow = new google.maps.InfoWindow({content: info});
	      infowindow.open(map, marker);
	    });
	    return marker;
	}
	
	function checkCheckedMarkers(){
		for(var i = 0; i < markers.length; i++) {
		
		}
	
	}
	  
	
	google.maps.event.addDomListener(window, 'load',initialize);

	</script>

