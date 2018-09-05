@extends('master')
<div class="sticky-wrapper">
 @include('navbar')
</div>
<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 50%;
    max-width: 400px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    padding: 6px 12px;
    cursor: pointer;
    margin-left: 50%; 
    margin-right: 50%; 
    margin-top: 10px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.closeButton {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #ffffff;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.closeButton:hover,
.closeButton:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}


/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
@section('content')
		<div class="row" style="margin-top: 10px;">
			 @if($images != null)
			  @foreach($images as $image)
				<div class="col-md-4 animate-box" data-animate-effect="fadeIn">
						<div href="#">
                            <img src="{{$image->image_url}}" onclick="imageClicked(this)"class="myImg" style="height: 300px; margin: 10px; width: 800px; object-fit: cover">
						</div>	
				</div>		
			 @endforeach	
			@endif			
	   </div>

<label class="btn btn-primary btn-outline btn-lg" style="  margin-left: 45%; 
    margin-right: 50%; 
    margin-top: 10px;
    background: #F78536;
    font: white;">
    <form style="display: none;" action="upload" method="POST" id="form" enctype="multipart/form-data">
        {{ csrf_field() }}
    <input id="preUpload" name="images[]" type="file" onchange="fileSelected()" style="display: none;" multiple>
    </form>
    <i class="fa fa-cloud-upload"></i> <p style="color: white;">Add new photos</p>
</label>
	
				
@endsection

<div id="myModal" class="modal">
  <span class="closeButton">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>



<input type="text" hidden name="touristSpotId" value="{{$touristSpotId}}" id="touristSpotId">
<script type="text/javascript">
	
// Get the modal
		var modal = document.getElementById('myModal');

		// Get the image and insert it inside the modal - use its "alt" text as a caption
		var img = document.getElementsByClassName('myImg');
		var modalImg = document.getElementById("img01");
		var captionText = document.getElementById("caption");

		/*img.onclick = function(){
			console.log('fcing');
		    modal.style.display = "block";
		    modalImg.src = this.src;
		    captionText.innerHTML = this.alt;
		}*/

        function fileSelected(){

            
            document.getElementById('form').submit();
        
        }

		function imageClicked(img){

			modal.style.display = "block";
		    modalImg.src = img.src;
		    captionText.innerHTML = img.alt;
		}

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("closeButton")[0];

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() { 
		    modal.style.display = "none";
		}

</script>
