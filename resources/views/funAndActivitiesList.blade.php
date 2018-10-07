@if($activities != null)
<div class="row row-bottom-padded-md">
@foreach($activities as $activity)
<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="fh5co-blog animate-box">
							<a href="#"><img class="img-responsive" 
							src="{{ $activity->image_url }}" alt=""></a>
							<div class="blog-text">
								<div class="prod-title">
									<div class="col-md-12 text-center animate-box">
										<h3><a href="#">{{$activity->name}}</a></h3>
										<span style="font-style: bold;"><u>₱{{$activity->estimated_Budget}} per {{$activity->per}}</u>
										</span>
										<p>{{$activity->description}}</p>
									</div>
								</div>
							</div> 
						</div>
</div>
		
@endforeach
</div>
@else
@for($d = 0; $d< count($activitiesC); $d++)
<div class="row row-bottom-padded-md">
<h1>Combo {{$d+1}}</h1>
 @for($i = 0; $i< count($activitiesC[$d]); $i++)
 <div class="col-lg-4 col-md-4 col-sm-6">
						<div class="fh5co-blog animate-box">
							<a href="#"><img class="img-responsive" 
							src="{{ $activitiesC[$d][$i]->image_url }}" alt=""></a>
							<div class="blog-text">
								<div class="prod-title">
									<div class="col-md-12 text-center animate-box">
										<h3><a href="#">{{$activitiesC[$d][$i]->name}}</a></h3>
										<span style="font-style: bold;"><u>₱{{$activitiesC[$d][$i]->estimated_Budget}} per {{$activitiesC[$d][$i]->per}}</u>
										</span>
										<p>{{$activitiesC[$d][$i]->description}}</p>
										<p>Combo {{$d+1}}</p>
									</div>
								</div>
							</div> 
						</div>
</div>
@endfor

</div>
<hr style="background-color: #F78536; height: 2px;">
@endfor
	
@endif

@if(1 == \Auth::user()->role)
<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="blog-text">
								<div class="prod-title">
									<div class="col-md-12 text-center">
										<p><a onclick="clicked()" class="btn btn-primary btn-outline btn-lg">Add an activity<i class="icon-arrow-right22"></i></a></p>
									</div>
								</div>
							</div> 
						
</div>
@endif

@include('scripts')