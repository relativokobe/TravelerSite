@extends('master')
<div id="placesdiv" class="row row-bottom-padded-md">
@if($places != null)
@foreach($nearbyTouristSpots as $place)
<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="fh5co-blog animate-box">
							<a href="#"><img class="img-responsive" 
							src="{{ $place->image_url }}" alt="" style="height: 300px;"></a>
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
										<p><a onclick="clicked('nearby')" class="btn btn-primary btn-outline btn-lg">Add a place<i class="icon-arrow-right22"></i></a></p>
									</div>
								</div>
							</div> 
						
</div>
@endif

</div>
@include('scripts')