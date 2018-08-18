@extends('master')
<!-- <div class="animate-box" style="margin-top: 20px">
<h2 style="margin-left: 30%;">Places near {{$touristSpot->name}}</h2>
   <div>
        <p style="margin-left: 37%">Set budget range <p>
        
		<input type="number" id="minimum" name="minimum" style="margin-left: 40%" placeholder="minimum budget"> to
		<input type="number" id="maximum" name="maximum"  placeholder="maximum budget">
		<input type="text" id="url" value="{{$touristSpot->id}}/pisti" hidden="">
		<button id="subitpo" style="background-color: #F78536; color: #ffffff;" class="btn">Set</button>		
	</div>
</div> -->

<div id="placesdiv" class="row row-bottom-padded-md">
@if($places != null)
@foreach($places as $place)
<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="fh5co-blog animate-box">
							<a href="#"><img class="img-responsive" 
							src="{{ $place->image_url }}" alt=""></a>
							<div class="blog-text">
								<div class="prod-title">
									<div class="col-md-12 text-center animate-box">
										<h3><a href="#">{{$place->name}}</a></h3>
										<span style="font-style: bold;">₱{{$place->estimated_Budget}} per {{$place->per}}
										</span>
										<p>{{$place->description}}</p>
										<p><a href="#">Learn More...</a></p>
									</div>
								</div>
							</div> 
						</div>
</div>
@endforeach
@endif

@if(1 == \Auth::user()->role)
<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="blog-text">
								<div class="prod-title">
									<div class="col-md-12 text-center">
										<p><a onclick="clicked()" class="btn btn-primary btn-outline btn-lg">Add a place<i class="icon-arrow-right22"></i></a></p>
									</div>
								</div>
							</div> 
						
</div>
@endif

</div>
@include('scripts')





