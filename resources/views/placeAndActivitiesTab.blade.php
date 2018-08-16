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
		window.location.href = id+"/addPlace?type="+type;
		
	}
	function tabClicked(type){
		if(type == 'place'){
			
			document.getElementById('placeType').value = 'place';
		}else{
			
			document.getElementById('placeType').value = 'activity';
		}
	}

</script>