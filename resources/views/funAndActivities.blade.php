@extends('master')
<div id="placesdiv" class="row row-bottom-padded-md">
@if($activities != null)
@foreach($activities as $activity)
<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="fh5co-blog animate-box">
							<a href="#"><img class="img-responsive" 
							src="{{ $activity->image_url }}" alt=""></a>
							<div class="blog-text">
								<div class="prod-title">
									<div class="col-md-12 text-center animate-box">
										<h3><a href="#">{{$activity->name}}</a></h3>
										<span style="font-style: bold;">₱{{$activity->estimated_Budget}} per {{$activity->per}}
										</span>
										<p>{{$activity->description}}</p>
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
										<p><a onclick="clicked()" class="btn btn-primary btn-outline btn-lg" >Add an activity<i class="icon-arrow-right22"></i></a></p>
									</div>
								</div>
							</div> 
						
</div>
@endif

</div>

@include('scripts')