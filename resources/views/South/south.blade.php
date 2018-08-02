@extends('master')

@section('content')
<div id="fh5co-destination">
			<div class="tour-fluid">
				<div class="row">
					<div class="col-md-12">
						<ul id="fh5co-destination-list" class="animate-box">
						 @foreach($touristSpots as $touristSpot)
							<li class="one-forth text-center" style="background-image: url({{ $touristSpot->image_url }});">
								<a href="{{$spot}}/{{$touristSpot->id}}">
									<div class="case-studies-summary">
										<h2>{{$touristSpot->name}}</h2>
									</div>
								</a>
							</li>
						@endforeach
						@if(1 == \Auth::user()->role)
							<li class="one-forth text-center" style="background-image: url(images/place-10.jpg); ">
								<a href="{{$spot}}/addtouristspot">
									<div class="case-studies-summary">
										<h2>Add tourist spot</h2>
									</div>
								</a>
							</li>
						@endif	
						</ul>		
					</div>
				</div>
			</div>
		</div>


@section('content')