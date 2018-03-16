@extends('layouts.master')
@section('content')
@include('includes.top')

<div class="dashboard-wrapper">
		<h1 class="form-group heading">Vision Book List <a href="javascript:void(0)" title="Edit" class="btn btn-white"></i> 
			</a> </h1>
			<h2 class="heading-sub"><span><i class="fa fa-home" aria-hidden="true"></i> Add new photo's in vision book</h2>
				<div class="file-loading">
					<a href="/photostream"><span class="add-icon"></span></a>
					<br>
					 Add new photo's in vision book
				</div>
			@foreach($album as $albums)
			<div class="added-thumb">
				<div class="img-boxes">
					<?php if(!empty($albums->images)) { ?>
					<img src="/visionbook_images/{{$albums->images }}" alt="img001" class="img-reponsive" width="512" height="375">
					<?php } else { ?>
					<img src="" alt="" class="img-reponsive" width="512" height="375">
					<?php } ?>
				</div>
				<div class="text-box">
				<div class="">
				<b>	{{$albums->old_title}}</b>
					<div>{{$albums->comments}}</div>
					<a href="/v_delete/{{$albums->vbc}}" onclick=" return confirm('do you really want to delete it?')" class="btn btn-bdrSml">Delete</a>
				</div>
			</div>
				
			</div>
			@endforeach
	</div>
@endsection
