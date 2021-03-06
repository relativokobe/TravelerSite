@extends('master')
@section('content')
<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 50%;
    max-width: 400px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.closeButton {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #ffffff;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.closeButton:hover,
.closeButton:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
<div class="sticky-wrapper">
<header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<h1 id="fh5co-logo"><a href=""><i class="icon-airplane"></i>Cebu Route Project</a></h1>
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li class="active"><a onclick="back()">Back</a></li>
							<li><a href="{{ url('/logoutofceburoute') }}">Logout</a></li>
						</ul>
					</nav>
				</div>
			</div>
</header>
</div>
<input id="spot" type="text"  value="{{$spot}}" hidden/>
<input id="lat" type="text" name="lat" value="{{$touristSpot->lat}}" hidden="hidden"/>
<input id="long" type="text" name="long" value="{{$touristSpot->long}}" hidden="hidden"/>
<div style="background: -webkit-linear-gradient(left, rgba(255, 62, 28, 0.5) 0%, rgba(255, 140, 0, 0.5) 100%);>
<div id="fh5co-contact" class="fh5co-section-gray">
  <div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h1 style="color: #fff; font-size: 60px;">{{$touristSpot->name}}</h1>
						<h2><p style="color: #fff;">{{$touristSpot->description}}</p></h2>
					</div>
				</div>
				<form action="#">
					<div class="row animate-box">
					 <div class="tabulation animate-box">
					  <div class="tab-content">
						<div class="col-md-6">
							 <div>
							<h4 class="section-title">Rating:</h4>
							@include('rating')	

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
						<img src="{{ $touristSpot->image_url }}" class="col-md-6" style="object-fit: cover; height: 400px; margin-bottom: 20px;">

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

					 <div class="tabulation animate-box" style="margin-top: 30px;">
					  <div class="tab-content">				
						<div style="column-count: 3; column-gap: 10px; margin-left: 30px;">
						 @if(!$images->isEmpty())
						  @foreach($images as $image)
						  	<div class="animate-box" data-animate-effect="fadeIn" >
								<img src="{{$image->image_url}}" class="myImg" onclick="imageClicked(this)" alt="Free HTML5 Website Template by FreeHTML5.co" style="height: 300px; width: 300px; object-fit: cover">
							</div>
						  @endforeach
						@endif	
						</div>

						@if(count($images) > 3)

							 <p style="margin-left: 40%; margin-right: 50%; margin-top: 10px;"><a class="btn btn-primary btn-outline btn-lg" href="{{$tourist_spot_id}}/photos">View more photos<i class="icon-arrow-right22"></i></a></p>
						
						@else 
						  @if(1 == \Auth::user()->role)
						  <p style="margin-left: 40%; margin-right: 50%; margin-top: 10px;"><a class="btn btn-primary btn-outline btn-lg" href="{{$tourist_spot_id}}/photos">Add more photos<i class="icon-arrow-right22"></i></a></p>
						  @endif
						@endif	 
					 </div>			
				    </div>
				</div>
				</form>
			</div>	

			<div id="places" class="container" style="margin-top: 150px;">
					    @include('placeAndActivitiesTab')
			</div>	

   </div>



</div>
<input type="text" id="id" value="{{$touristSpot->id}}" hidden="true">
<div id="myModal" class="modal">
  <span class="closeButton">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>

<script type="text/javascript">

	  function back(spot){
	  	var spot = document.getElementById('spot').value;
	  	window.location.href="http://localhost/CebuRouteProject/public/"+spot;
	  }

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

      // Get the modal
		var modal = document.getElementById('myModal');

		// Get the image and insert it inside the modal - use its "alt" text as a caption
		var img = document.getElementsByClassName('myImg');
		var modalImg = document.getElementById("img01");
		var captionText = document.getElementById("caption");

		/*img.onclick = function(){
			console.log('fcing');
		    modal.style.display = "block";
		    modalImg.src = this.src;
		    captionText.innerHTML = this.alt;
		}*/

		function imageClicked(img){

			modal.style.display = "block";
		    modalImg.src = img.src;
		    captionText.innerHTML = img.alt;
		}

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("closeButton")[0];

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() { 
		    modal.style.display = "none";
		}

  </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAh9Zof4j3ivJSWjB_YEnAvDsCjwr8h978&libraries=places&callback=initAutocomplete"
         async defer></script>

@endsection