@extends('master')
<div class="tabulation animate-box">

								  <!-- Nav tabs -->
								   <ul class="nav nav-tabs" role="tablist">
								      <li role="presentation" class="active">
								      	<a href="#placetab" aria-controls="placetab" role="tab" data-toggle="tab" onclick="tabClicked('place')">Nearby Hotels and Restaurants</a>
								      </li>
								      <li role="presentation">
								    	   <a href="#z" aria-controls="z" role="tab" data-toggle="tab" onclick="tabClicked('activity')">Fun and other Activities</a>
								      </li>
								   </ul>

								   <!-- Tab panes -->
									<div class="tab-content">
									 <div role="tabpanel" class="tab-pane active" id="placetab">
										<div class="row">
											
											@include('places')
										</div>
									 </div>

									 <div role="tabpanel" class="tab-pane" id="z">
									 	<div class="row">
									 		<input type="text" value="activity" hidden>
									 		@include('funAndActivities')
										</div>
									 </div>
									</div> 
									

</div>
<input type="text" id="tourist_spot_id" hidden value="{{$tourist_spot_id}}">
<input type="text" id="placeType" hidden value="place">
<script type="text/javascript">

	function clicked(){
		console.log('pist');
		var type = document.getElementById('placeType').value;
		var id = document.getElementById('tourist_spot_id').value;
		window.location.href = id+"/addPlace";
		
	}
	function tabClicked(type){
		if(type == 'place'){
			
			document.getElementById('placeType').value = 'place';
		}else{
			
			document.getElementById('placeType').value = 'activity';
		}
	}

	var url = document.getElementById('url').value;
		var count = 0;
	  $(document).ready(function(){	
		$('#setButton').click(function(){
			$.ajax({
				async: false,
			    url: "{{asset('asset/js/jquery.min.js')}}",
			    dataType: 'script',
			    success: function(response){
			    	console.log('script loaded '+response);
			    	var minimum = document.getElementById('minimum').value;
			var maximum = document.getElementById('maximum').value;
			var touristSpotid = document.getElementById('id').value;
			console.log(minimum+maximum+url+$('meta[name="csrf-token"]').attr('content'));
			$.ajax({
				async: false,
				url: url,
				data: {minimum:minimum,maximum:maximum,_token:$('meta[name="csrf-token"]').attr('content'),id:touristSpotid},
				type:'POST',
				success: function(response){
					if(response == 'error'){
						$('#foaError').text('Minimum budget must not have a greater value than the maximum budget');
						console.log('ni sud sa 78');
					}else{
					  $('#activities').html(response);
					}
					
				},error: function(response){
					
				}
			})
			    },
			    error: function(response){
			    	
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
				 	count = 0;
				 }
				});
			}

			 e.preventDefault();
		});

   	  }); 

</script>