@extends('master')
<div class="sticky-wrapper">
 @include('navbar')
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