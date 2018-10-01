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

									 {{ csrf_field() }}
									 	<div class="row">
									 	<h1>Add nearby Tourist spots </h1>
									 	<div id="nearBy">
									 		@include('list')
									 	</div>		
										</div>
										</form>
									 </div>
									
									</div>

			</div>
		</div>
</div> 

<script>
function picked(id){
	var url = document.getElementById('url').value;
	$.ajax({
		url:url,
		data:{_token:$('meta[name="csrf-token"]').attr('content'),id:id},
		type:'POST',
		 success: function(response){
		 	console.log(response);
		 	$('#nearBy').html(response);
		 }
	});

}
</script>