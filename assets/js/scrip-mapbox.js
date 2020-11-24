
/// Nuestro Token de acceso
mapboxgl.accessToken = 'pk.eyJ1IjoiZXNtZXJhbGRhbGFtYXMiLCJhIjoiY2tobWo4aDZxMGJtOTMzbWsxb2Exb2dqYSJ9.sDNOaLeiLPlb55zfk_qtlw';
/* Longitud y latitud */
var loglat = [-63.2474294, -17.3454335];
let map = new mapboxgl.Map({
    container: 'map',// id del contenedor
    style: 'mapbox://styles/mapbox/streets-v11',// localización del mapa de estilo 
    center: loglat,// starting position [lng, lat]
    zoom: 15 // Zoom inicial
});

/* Controles */
map.addControl(new mapboxgl.NavigationControl());//zoom y rotación 
map.addControl(new mapboxgl.FullscreenControl()); //visualiza pantallacompleta
map.addControl(new mapboxgl.GeolocateControl({
    positionOptions: {
        enableHighAccuracy: true
    },
    trackUserLocation: true
}));//posicion actual

/*****Tipos de visualizacion del mapa** */
var layerList = document.getElementById('menu-mapa');
var inputs = layerList.getElementsByTagName('input');

function switchLayer(layer) {
    var layerId = layer.target.id;
    map.setStyle('mapbox://styles/mapbox/' + layerId);
}

for (var i = 0; i < inputs.length; i++) {
    inputs[i].onclick = switchLayer;
}

 // create the popup
var popup = new mapboxgl.Popup({ offset: 25 })
.setHTML('Longitud y Latitud: <br/>' +loglat
);

// create the marker
new mapboxgl.Marker()
    .setLngLat(loglat)
    .setPopup(popup) // sets a popup on this marker
    .addTo(map); 
 

/* map.on('style.load', function() {
    map.on('click', function(e) {
      var coordinates = e.lngLat;
      new mapboxgl.Popup()
        .setLngLat(loglat)
        .setHTML('you clicked here: <br/>' + coordinates)
        .addTo(map);
    });
  }); */





