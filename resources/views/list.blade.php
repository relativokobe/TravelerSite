									 	<ul class="list-group">
									 	@if($nearbyTouristSpots != null)
										  @foreach($nearbyTouristSpots as $touristSpot)
										 <div class="col-xxs-12 col-xs-12 mt"> <li class="list-group-item" onclick="picked('{{$touristSpot->id}}')"> {{$touristSpot->name}}</div></li>
										  @endforeach
									 	@endif
									 	</ul>
									 	<input type="text" id="url" value="submitNearBy" hidden="">