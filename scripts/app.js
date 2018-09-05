(function() {
  'use strict';
  if('serviceWorker' in navigator){
    navigator.serviceWorker
      .register('./service-worker.js')
      .then(function(){
      });
  }
})();
