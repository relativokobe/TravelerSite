@extends('master')

@section('head')
@parent
	
@endsection


@section('content')

	<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url('{{asset('asset/images/north.jpg')}}');">
	<div id="mainDiv" class="col-sm-5 col-md-5">

								<div class="tabulation animate-box">
									<div class="tab-content">
									 <div role="tabpanel" class="tab-pane active" id="hotels">
									 <form id="registerForm" method="POST" action="submitTouristSpot" enctype="multipart/form-data">
									 {{ csrf_field() }}
									 <input type="text" id="long" name="long" hidden="hidden">
            						 <input type="text" id="lat" name="lat" hidden="hidden">
									 	<div class="row">
									 	<h1>Add a new tourist spot in {{$spot}} of Cebu</h1>
									 	 <div id="signUp" class="col-xxs-12 col-xs-12 mt"> <h1></h1></div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from"> Name</label>
													<input type="text"  class="form-control" name="name"/>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Address</label>
													<input type="text" class="form-control" name="address" id="pac-input" placeholder="" />
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt" style="height: 350px;">
											 
											  <div id="map" style="height: 100%;">

											  </div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Description</label>
													<textarea  class="form-control" name="description">
													</textarea>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Owner</label>
													<input type="text" id="passwords" class="form-control" name="owner"/>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Contact no.</label>
													<input type="text" id="passwords" class="form-control" name="contactNo"/>
													
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Email address</label>
													<input type="text" id="passwords" class="form-control" name="emailAdd"/>
													
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Website Url</label>
													<input type="text" class="form-control" name="webUrl"/>
												</div>
											</div>

											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">price</label>
													<input type="text" id="passwords" name="price"/>

													<label for="from">per</label>
													<input type="text" id="passwords"  name="per"/>
													
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Choose Image</label>
												</div>
												<input type="file" class="form-control" name="image"/>
											</div>

											<div class="col-xs-12">
												<input type="submit" class="btn btn-primary btn-block" value="Register">
											</div>
										</div>
										</form>
									 </div>
									

									</div>

								</div>
				</div>
</div>
<script type="text/javascript">
    var map;
      function initAutocomplete() {
         map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 46.397, lng: 160.644},
          zoom: 1,
          minZoom: 1,
          mapTypeId: 'roadmap'
        });
        console.log(map.map);
        
        
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };
            

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
        
        
        
        var marker;

        function placeMarker(location) {
          if ( marker ) {
            marker.setPosition(location);
          } else {
            marker = new google.maps.Marker({
              position: location,
              map: map
            });
          }
        }

        google.maps.event.addListener(map, 'click', function(event) {
          placeMarker(event.latLng);
          //input x ang long y ang lat
          $('#long').val(event.latLng.lng());
          $('#lat').val(event.latLng.lat());
          console.log($('#long').val());
          console.log($('#lat').val());
        });
      }
  </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCabVcBC6lLazhFds7JQGU9hPJt2ii77Ps&libraries=places&callback=initAutocomplete"
    async defer></script>

@endsection


