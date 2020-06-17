const $ = require('jquery');
require('./bootstrap');

// importiamo TomTom
import tt from '@tomtom-international/web-sdk-maps';

$(document).ready(function () {


  var ClassicEditor = require('@ckeditor/ckeditor5-build-classic');
  
  ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .then( editor => {
          console.log( editor );
      } )
      .catch( error => {
          console.error( error );
      } );


//----------------------Script Algolia---------------------//
    var places = require('places.js');
    
    (function () {
      var placesAutocomplete = places({
        appId: 'plLTIEYNEOEF',
        apiKey: '19f3c1d9025f3efccfabfb4d93ec67aa',
        container: document.querySelector('#form-address'),
        templates: {
          value: function(suggestion) {
            return suggestion.name;
          }
        }
      }).configure({
        type: 'address'
      });
      placesAutocomplete.on('change', function resultSelected(e) {
        document.querySelector('#form-address2').value = e.suggestion.name || '';
        document.querySelector('#form-city').value = e.suggestion.city || '';
        document.querySelector('#form-zip').value = e.suggestion.postcode || '';
        document.querySelector('#form-lat').value = e.suggestion.latlng.lat || '';
        document.querySelector('#form-lng').value = e.suggestion.latlng.lng || '';
    
        document.querySelector('#full-address').value = e.suggestion.name + ', ' + document.querySelector('#numero-civico').value + ', ' + e.suggestion.city + ', ' + e.suggestion.postcode;
          console.log(document.querySelector('#form-address2').value);
      });
    
        var lan = document.getElementById('#latitudine').innerHTML;
        var lng = document.getElementById('#longitudine').innerHTML;
    })();

    // TomTom

    // ↓ creiamo mappa utilizzando TomTom, se esiste un elemento con id=“map”
    if ($('#map').length > 0) {
        var coordinates = [$('#map').attr('data-long'), $('#map').attr('data-lat')];
        var map = tt.map({
            container: 'map',
            key: 'NtUp4DmwT1bPEtVLQLvvgSS5bm6eO9uA',
            style: 'tomtom://vector/1/basic-main',
            center: coordinates,
            zoom: 15,
            pitch: 45
        });
        map.addControl(new tt.NavigationControl());
        // Puntature
        var element = document.createElement('div');
        element.id = 'marker';
        var marker = new tt.Marker({
            element: element,
        });
        marker.setLngLat(coordinates).addTo(map);
    };
    // ↑ creiamo mappa utilizzando TomTom, se esiste un elemento con id=“map”

});
