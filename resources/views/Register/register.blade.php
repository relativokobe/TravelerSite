@extends('master')


@section('content')

 <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url('{{asset('asset/images/loginBackground.png')}}');">
	<div id="mainDiv" class="col-sm-5 col-md-5">
								<div class="tabulation animate-box">
									<div class="tab-content">
									 <div role="tabpanel" class="tab-pane active" id="hotels">
									 <form id="registerForm" method="POST" action="submitRegistration">
									 {{ csrf_field() }}
									 	<div class="row">
									 	 <div id="signUp" class="col-xxs-12 col-xs-12 mt"> <h1>Sign Up</h1></div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">First Name</label>
													<input type="text"  class="form-control" name="firstName"/>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Last Name</label>
													<input type="text" class="form-control" name="lastName"/>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Email</label>
													<input type="text" class="form-control" name="email"/>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Password</label>
													<input id="passwords" type="Password" class="form-control" name="password"/>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-6 mt alternate">
												<div class="input-field">
													<label for="date-start">Birthday</label>
													<input type="text" class="form-control" id="date-start" name="birthday" placeholder="mm/dd/yyyy"/>
												</div>
											</div>
		
											<div class="col-xs-12">
												<input type="submit" class="btn btn-primary btn-block" value="Register">
											</div>
										</div>
										</form>
									 </div>

									 <div role="tabpanel" class="tab-pane" id="packages">
									 	<div class="row">
											<div class="col-xs-12">
												<input type="submit" class="btn btn-primary btn-block" value="Search Packages">
											</div>
										</div>
									 </div>
									</div>

								</div>
	</div>
</div>

@endsection