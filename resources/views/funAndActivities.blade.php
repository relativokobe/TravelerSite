@extends('master')
<div class="animate-box" style="margin-top: 20px">
<h2 style="margin-left: 27%;">Fun and other activities in {{$touristSpot->name}}</h2>
   <div style="margin-left: 30%;">
   	  <p id="foaError" style="color: red;"></p>
		<input type="number" id="minimum" name="minimum"  placeholder="minimum budget"> to
		<input type="number" id="maximum" name="maximum"  placeholder="maximum budget">
		<input type="text" id="url" value="{{$touristSpot->id}}/pisti" hidden="">
		<button id="setButton" style="background-color: #F78536; color: #ffffff;" class="btn">Set</button>		
	</div>
</div>
<div id="activities" class="row row-bottom-padded-md">
@include('funAndActivitiesList')

</div>

@include('scripts')