@extends('master')

@section('head')
@parent
	
@endsection


@section('content')

	<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url('{{asset('asset/images/north.jpg')}}');">
	<div id="mainDiv" class="col-sm-5 col-md-5">
								<div class="tabulation animate-box">
									<div class="tab-content">
									 <div role="tabpanel" class="tab-pane active" id="hotels">
									 <form id="registerForm" method="POST" action="submitTouristSpot" enctype="multipart/form-data">
									 {{ csrf_field() }}
									 	<div class="row">
									 	<h1>Add a new tourist spot in {{$spot}} of Cebu</h1>
									 	 <div id="signUp" class="col-xxs-12 col-xs-12 mt"> <h1></h1></div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from"> Name</label>
													<input type="text"  class="form-control" name="name"/>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Address</label>
													<input type="text" class="form-control" name="address"/>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Description</label>
													<textarea  class="form-control" name="description">
													</textarea>
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
													<input type="text" id="passwords" class="form-control" name="contactNo"/>
													
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
													<label for="from">price</label>
													<input type="text" id="passwords" name="price"/>

													<label for="from">per</label>
													<input type="text" id="passwords"  name="per"/>
													
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Choose Image</label>

													
												</div>
												<input type="file" class="form-control" name="image"/>
											</div>
										
											 <div class="col-xs-12">

									 			

									 		</div>
											<div class="col-xs-12">
												<input type="submit" class="btn btn-primary btn-block" value="Register">
											</div>
										</div>
										</form>
									 </div>
									

									</div>

								</div>
				</div>
</div>

@endsection


