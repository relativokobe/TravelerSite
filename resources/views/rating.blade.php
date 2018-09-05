<div id="ratingDiv">
  <p id="rating">
   @if($rating== null)
   No one has rated this tourist spot yet
   @else
      @if($error == null)                
      <p id="rating" style="color: #F78536; font-style: bold;">{{$rating}}<span style="color: black">/10</span></p>
      @else
      <p id="rating" style="color: #F78536">{{$rating}}<span style="color: black">/10</span></p>
      <p style="color: red;">{{$error}}</p>
      @endif
   @endif
 </p>
</div>
@if($rated == false)
<button id="rate" style="background-color: #F78536; color: #ffffff;" class="btn">Rate</button>
@endif