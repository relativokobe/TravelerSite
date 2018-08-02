@extends('master')
<div class="sticky-wrapper">
<header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<h1 id="fh5co-logo"><a href="index.html"><i class="icon-airplane"></i>Cebu Route Project </a></h1>
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li class="active"><a href="index.html">Home</a></li>
							<li>
								<a href="vacation.html" class="fh5co-sub-ddown">Vacations</a>
								<ul class="fh5co-sub-menu">
									<li><a href="#">Family</a></li>
									<li><a href="#">CSS3 &amp; HTML5</a></li>
									<li><a href="#">Angular JS</a></li>
									<li><a href="#">Node JS</a></li>
									<li><a href="#">Django &amp; Python</a></li>
								</ul>
							</li>
							<li><a href="flight.html">Flights</a></li>
							<li><a href="hotel.html">Hotel</a></li>
							<li><a href="car.html">Car</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
</header>
</div>
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