@extends('master')
<style>
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