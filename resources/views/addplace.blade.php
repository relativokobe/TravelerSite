@extends('master')

@section('head')
@parent
	
@endsection


@section('content')
<div class="sticky-wrapper">
 @include('navbar')
</div>
	<div class="fh5co-cover" data-stellar-background-ratio="0.5">
	<div id="mainDiv" class="col-sm-5 col-md-5">
								<div class="tabulation animate-box">
									<div class="tab-content">
									 <div role="tabpanel" class="tab-pane active" id="hotels">
									 <form id="registerForm" method="POST" action="submitPlace" enctype="multipart/form-data">
									 @if($error != null)
									 <strong><p style="color: red;">{{$error}}</p></strong>
									 @endif
									 {{ csrf_field() }}
									 	<div class="row">
									 	<h1>{{$touristSpot->name}}</h1>
									 	 <div id="signUp" class="col-xxs-12 col-xs-12 mt"> <h1></h1></div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from"> Name</label>
													<input type="text"  class="form-control" name="name" required/>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Address</label>
													<input type="text" class="form-control" name="address" required/>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Description</label>
													<textarea  class="form-control" name="description" required></textarea>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Owner</label>
													<input type="text" id="passwords" class="form-control" name="owner"/>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Contact no.</label>
													<input type="number" id="passwords" class="form-control" name="contactNo"/>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Email address</label>
													<input type="text" id="passwords" class="form-control" name="emailAdd"/>
													
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Website Url</label>
													<input type="text" class="form-control" name="webUrl"/>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Distance from {{$touristSpot->name}} (km)</label>
													<input type="text" class="form-control" name="distance"/>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Kind</label>
													<select name="kind">
														<option value="place">
													    Restaurant
														</option>
														<option value="place">
														Hotel	
														</option>
														<option value="activity">Fun and other activities</option>
													</select>
												</div>
											</div>

											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">price</label>
													<input type="text" id="passwords" name="price" required/>

													<label for="from">per</label>
													<input type="text" id="passwords"  name="per"required/>
													
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Add a photo</label>
													    <input type="file" class="form-control" name="image" required/>
												</div>
												
											</div>
										
											<div class="col-xs-12">
												<input type="submit" class="btn btn-primary btn-block" value="Add">
											</div>
										</div>
										</form>
									 </div>
									
									</div>

			</div>
		</div>
</div>

@endsection


