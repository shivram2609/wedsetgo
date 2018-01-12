@section('title', $title)
@section('content')
	<div class="top-space container user-container">
        	@extends('elements.profile_header')
			<div class="form-group border-btm">&nbsp;</div>
			
			<div class="row">
            	@extends('elements.profile_left')
               @extends('elements.profile_middle')
			</div>
			
        </div>
@endsection
