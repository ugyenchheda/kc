<div id="map"></div>
<script>
	<?php $cristiano_gm_zoom = cs_get_option( 'fieldset_address' )[ 'google_map_zoom' ]; ?>	
	cristianoGZoom = 12; //Default Google Map Zoom value
	<?php if($cristiano_gm_zoom) : ?>
		cristianoGZoom = '<?php echo $cristiano_gm_zoom; ?>';
	<?php endif; ?>
	
	
	<?php $cristiano_gm_geolocation = cs_get_option( 'fieldset_address' )[ 'google_map_location' ]; ?>
	cristianoGeolocation = '40.715028, -74.017775'.split(','); //New Yourk By Default
	
	<?php if($cristiano_gm_geolocation): ?>
		cristianoGeolocationString = '<?php echo $cristiano_gm_geolocation; ?>';
		cristianoGeolocation = cristianoGeolocationString.split(',');
	<?php endif; ?>
</script>
	
<?php 

	$map_api = '';
	if(isset(cs_get_option( 'fieldset_address' )[ 'google_map_api' ])) {
		$map_api = '&key=' . cs_get_option( 'fieldset_address' )[ 'google_map_api' ];
	}	
?>	
<script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap<?php echo $map_api; ?>"></script>