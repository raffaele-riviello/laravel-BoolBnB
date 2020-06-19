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