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
<div id="southnorthdiv">
  <div class="innerdiv">
	<div id="north" class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
			<div href="#"><img src="{{asset('asset/images/south.jpg')}}" alt="Free HTML5 Website Template by FreeHTML5.co" id="southpic" class="img-responsive">
				<div class="desc">
										<span></span>
										<h3 class="price">South of Cebu</h3>
										<a class="btn btn-primary btn-outline" href="south">Visit <i class="icon-arrow-right22"></i></a>
				</div>
			</div>
		</div>	
	</div>

	<div class="innerdiv">
		<div id="south" class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
			<div href="#"><img src="{{asset('asset/images/north.jpg')}}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive" id="northpic">
				<div class="desc">
										<span></span>
										<h3 class="price">North of Cebu</h3>
										<a class="btn btn-primary btn-outline" href="north">Visit <i class="icon-arrow-right22"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection