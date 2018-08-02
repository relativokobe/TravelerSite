@extends('master')
@section('content')
<div class="sticky-wrapper">
 @include('navbar')
</div>
<input id="lat" type="text" name="lat" value="{{$touristSpot->lat}}" hidden="hidden"/>
<input id="long" type="text" name="long" value="{{$touristSpot->long}}" hidden="hidden"/>
<div id="fh5co-contact" class="fh5co-section-gray" style="    background: linear-gradient(to right, rgba(255, 62, 28, 0.5) 0%, rgba(255, 140, 0, 0.5) 100%);
    background-image: linear-gradient(to right, rgba(255, 62, 28, 0.5) 0%, rgba(255, 140, 0, 0.5) 100%);">
  <div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h1 style="color: #fff; font-size: 60px;">{{$touristSpot->name}}</h1>
						<h2 "><p style="color: #fff;">{{$touristSpot->description}}</p><h2>
					</div>
				</div>
				<form action="#">
					<div class="row animate-box">
					 <div class="tabulation animate-box">
					  <div class="tab-content">
						<div class="col-md-6">
						  <div>
							<h4 class="section-title">Rating:</h4>
							<div id="ratingDiv">
							<p id="rating">
							   @if($rating== null)
                                 No one has rated this tourist spot yet
                               @else                
                                 <p id="rating" style="color: #F78536">{{$rating}}</p>
                               @endif    
							</p>
							</div>
							<button id="rate" style="background-color: #F78536; color: #ffffff;" class="btn">Rate</button>

							</div>
							<hr style="background-color: #F78536; height: 1px;">
							<ul class="contact-info">
								<li style="color: #F78536"><i class="icon-price-tag2"></i> 
								@if($touristSpot->price != null)
								 {{$touristSpot->price}} 
								 @if($touristSpot->per != null)
								  per {{$touristSpot->per}}
								 @endif
								@else
								 not avaiable  
								}	
								@endif
								</li>
								<li style="color: #F78536"><i class="icon-location-pin"></i>
								@if($touristSpot->address != null)
								{{$touristSpot->address}}
								@else
								Not Available
								@endif</li>
								<li style="color: #F78536"><i class="icon-phone2"></i>
								@if($touristSpot->contact_no != null)
								{{$touristSpot->contact_no}}
								@else
								Not Available
								@endif
								</li>
								<li style="color: #F78536"><i class="icon-mail"></i>
								@if($touristSpot->email_address != null)
								{{$touristSpot->email_address}}
								@else
								Not Available
								@endif</li>
								<li style="color: #F78536"><i class="icon-globe2"></i>
								@if($touristSpot->web_url != null)
								{{$touristSpot->web_url}}
								@else
								Not Available
								@endif	
								</li>
							</ul>
						</div>
						<div class="col-md-6" style="background:url({{ $touristSpot->image_url }}); height: 400px; margin-bottom: 20px;">
							
						</div>
					   </div>
					 </div>

					 <div class="tabulation animate-box" style="margin-top: 30px;">
					  <div class="tab-content">
										
							<div style="height: 400px;">
								<div id="map" style="height: 100%;">
									
								</div>
							</div>	
						
					   </div>
					 </div>

					</div>
				</form>

			</div>	

   </div>
</div>
<div class="animate-box" style="margin-top: 20px">
<h2 style="margin-left: 40%;">Places near {{$touristSpot->name}}</h2>
   <div>
        <p style="margin-left: 47%">Set budget range <p>
        
		<input type="number" id="minimum" name="minimum" style="margin-left: 40%" placeholder="minimum budget"> to
		<input type="number" id="maximum" name="maximum"  placeholder="maximum budget">
		<input type="text" id="url" value="{{$touristSpot->id}}/pisti" hidden="">
		<button id="subitpo" style="background-color: #F78536; color: #ffffff;" class="btn">Set</button>
		<!-- <input id="subitpo">Go</button> -->
		
	</div>
</div>
<input type="text" id="id" value="{{$touristSpot->id}}" hidden="true">
<div id="places" class="container" style="margin-top: 10px;">
@include('places')

</div>
</div>
<div id="scripts">
@include('scripts')
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>

<script type="text/javascript">

		
		var url = document.getElementById('url').value;
		var count = 0;
	  $(document).ready(function(){	
		$('#subitpo').click(function(){
			$.ajax({
				async: false,
			    url: "{{asset('asset/js/jquery.min.js')}}",
			    dataType: 'script',
			    success: function(response){
			    	var minimum = document.getElementById('minimum').value;
			var maximum = document.getElementById('maximum').value;
			var touristSpotid = document.getElementById('id').value;
			console.log(minimum+maximum+url+$('meta[name="csrf-token"]').attr('content'));
			$.ajax({
				async: false,
				url: url,
				data: {minimum:minimum,maximum:maximum,_token:$('meta[name="csrf-token"]').attr('content')},
				type:'POST',
				success: function(response){
					$('#places').html(response);
				},error: function(){
					console.log('fuck');
				}
			})
			    },
			    error: function(response){
			    	console.log(response+'success');
			    }
			});

   	    });

		

		$('#rate').click(function(e){
			if(count == 0){
				$.ajax({
				type:'GET',
				url: "{{$touristSpot->id}}/hiddenRating",
				success: function(data){
					$('#ratingDiv').html(data);
					count = count + 1;
					console.log(count);
				}
			});

			}else{
				var rating = document.getElementById('inputrating').value;
				console.log($('meta[name="csrf-token"]').attr('content'));
				console.log(rating);
				$.ajax({
				 url:"{{$touristSpot->id}}/rate",
				 data:{rating:rating,_token:$('meta[name="csrf-token"]').attr('content')},
				 type: 'POST',
				 success: function(response){
				 	console.log(response);
				 	$('#ratingDiv').html(response);
				 	$('#rate').hide();
				 }
				});
			}
			
			// console.log($('#hiddenrating').html());
			// $('#ratingDiv').html($('#hiddenrating').html());
			 e.preventDefault();
		});

   	  }); 

      function initAutocomplete() {
      	  var vlat = parseFloat(document.getElementById('lat').value);
          var vlong = parseFloat(document.getElementById('long').value);
	
    	  console.log(vlat);
    	  console.log(vlong);

         map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: vlat, lng: vlong},
          zoom: 12,
          minZoom: 1,
          mapTypeId: 'roadmap'
        });

        var marker = new google.maps.Marker({
        	position: new google.maps.LatLng(vlat,vlong)
        });

        marker.setMap(map);
        console.log(marker);
        
      }
  </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCabVcBC6lLazhFds7JQGU9hPJt2ii77Ps&libraries=places&callback=initAutocomplete"
    async defer></script>

@endsection