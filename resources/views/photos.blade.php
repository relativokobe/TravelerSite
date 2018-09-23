@extends('master')
<div class="sticky-wrapper">
<header id="fh5co-header-section" class="sticky-banner">
            <div class="container">
                <div class="nav-header">
                    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
                    <h1 id="fh5co-logo"><a href="index.html"><i class="icon-airplane"></i>Cebu Route Project</a></h1>
                    <!-- START #fh5co-menu-wrap -->
                    <nav id="fh5co-menu-wrap" role="navigation">
                        <input id="path" type="text" hidden value="{{$path}}">
                        <ul class="sf-menu" id="fh5co-primary-menu">
                            <li class="active"><a onclick="back()">Back</a></li>
                            <li><a href="{{ url('/logoutofceburoute') }}">Logout</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
</header>
</div>
<style>

</style>

@section('content')

<div id="photosSection">
@include('photosSection')
</div>

<label class="btn btn-primary btn-outline btn-lg" style="  margin-left: 45%; 
    margin-right: 50%; 
    margin-top: 10px;
    background: #F78536;
    font: white;">
    <form style="display: none;" action="upload" method="POST" id="form" enctype="multipart/form-data">
        {{ csrf_field() }}
    <input id="preUpload" name="images[]" type="file" onchange="fileSelected()" style="display: none;" multiple>
    <input type="text" hidden name="touristSpotId" value="{{$touristSpotId}}" id="touristSpotId">
    </form>

    <i class="fa fa-cloud-upload"></i> <p style="color: white;">Add new photos</p>
</label>
	
				
@endsection

<div id="myModal" class="modal">
  <span class="closeButton">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<input type="text" id="url" value="{{$touristSpotId}}/upload" hidden="">
<script type="text/javascript">
	
// Get the modal
		var modal = document.getElementById('myModal');

		// Get the image and insert it inside the modal - use its "alt" text as a caption
		var img = document.getElementsByClassName('myImg');
		var modalImg = document.getElementById("img01");
		var captionText = document.getElementById("caption");
        var url = document.getElementById('url').value;

        function fileSelected(){
            
            document.getElementById('form').submit();
        }

        function back(){
            var path = document.getElementById('path').value;
            window.location.href="http://localhost/CebuRouteProject/public/"+path;
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
