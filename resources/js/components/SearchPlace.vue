<template>
  <div class="col-md-12">
    <div class="form-group">
        <strong> Client Direction</strong>
        <input type="text" id="client_direction" class="form-control" name="client_direction" placeholder="Enter Client Direction">
    </div>
  </div>
</template>
<script type="text/javascript">
  google.maps.event.addDomListener(window, 'load', function () {
      var places = new google.maps.places.Autocomplete(document.getElementById('client_direction'));
      google.maps.event.addListener(places, 'place_changed', function () {

      });
  });
</script>
