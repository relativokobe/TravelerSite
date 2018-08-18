@extends('master')


@section ('content')

<div class="fh5co-hero">
			<div class="fh5co-overlay"></div>
			<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url('{{asset('asset/images/loginBackground.png')}}');">
				<div class="desc">
					<div class="container">
						<div class="row">
							<div class="col-sm-5 col-md-5">
								<div class="tabulation animate-box">

								  <!-- Nav tabs -->

								   <!-- Tab panes -->
									<div class="tab-content">
									 <div role="tabpanel" class="tab-pane active" id="hotels">
									 <form id="registerForm" method="POST" action="login">
									 	 {{ csrf_field() }}
									
									 	<div class="row">
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Email</label>
													<input type="text" class="form-control" id="from-place" name="email"/>
												</div>
											</div>
											<div class="col-xxs-12 col-xs-12 mt">
												<div class="input-field">
													<label for="from">Password</label>
													<input type="password" class="form-control" id="from-place" name="password"/>
												</div>
											</div>
											<div class="col-xs-12">
												<input type="submit" class="btn btn-primary btn-block" value="Login">
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
							<div class="desc2 animate-box">
								<div class="col-sm-7 col-sm-push-1 col-md-7 col-md-push-1">
									
									<h2>CEBUROUTE PROJECT</h2>
									<hr>
									<h4>We are here to help all users specially tourists to give specific 
									directions of all the Tourist spots in the province of Cebu.</h4>

									<p id="register"> <a href="register" class="fh5co-site-name">Join us now!</a></p>
									<!-- <p><a class="btn btn-primary btn-lg" href="#">Get Started</a></p> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>


 @endsection