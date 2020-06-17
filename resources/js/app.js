require('./bootstrap');


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
        console.log(lng);
        maps(lan, lng);

      // function maps(lan, lng) {
      //       // openstreetmaps
      //       // // Where you want to render the map.
      //       var element = document.getElementById('osm-map');
      //
      //       // Height has to be set. You can do this in CSS too.
      //       element.style = 'height:300px;';
      //
      //       // Create Leaflet map on map element.
      //       var map = L.map(element);
      //
      //       // Add OSM tile leayer to the Leaflet map.
      //       L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
      //           attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
      //       }).addTo(map);
      //
      //       // Target's GPS coordinates.
      //       var target = L.latLng(lan, lng);
      //
      //       // Set map's center to target with zoom 14.
      //       map.setView(target, 20);
      //
      //       // Place a marker on the same location.
      //       L.marker(target).addTo(map);
      //   }



    })();

});
