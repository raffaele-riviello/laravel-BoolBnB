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

});
