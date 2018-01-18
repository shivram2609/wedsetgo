@extends('layouts.admin')
@section('content')

<div class="categories index">
	<h2><?php echo 'Slider Images'; ?></h2>
	
	<div class="srch">
		<form action="" method="GET" role="search">
			
			<div class="input-group" >
				<input type="text" class="form-control categories-search" name="search_slider" placeholder="Search Slider Image"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default categories-submit"><span class="glyphicon glyphicon-search"></span>Search</button>
					<a href="{{ url('sliders') }}" class="btn btn-submit add-btn clear-category"> Clear</a>
				</span>
			</div>
		</form>
		<div class="rhs_actions right">
			<a href="{{ url('slider_images') }}" class="btn btn-submit add-btn"> Add</a>
		</div>
	</div>
		{!! Form::open() !!}
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
				<th>Heading</th>
				<th>Description</th>
				<th>Image</th>
				<th>Status</th>
				<th>Created</th>
				<th>Modified</th>
				<th class="actions"><?php echo 'Actions'; ?></th>
		</tr>
	</thead>
	<tbody>
	 @foreach ($sliders as $slider)
		<tr>
			<td>{{$slider->heading}}&nbsp;</td>
			<td>{{$slider->description}}&nbsp;</td>
			<?php if(isset($slider->image)) { ?>
				<td><b>{{$slider->image}}</b></br><img class="admin_category" src="<?php echo asset("/slider/$slider->image")?>"></td>
		   <?php } else { ?>
				<td> No Image</td>
			<?php } ?>
			<td><?php echo (empty($slider->is_active)?'Inactive':'Active'); ?>&nbsp;</td>
			<td>{{$slider->created_at}}&nbsp;</td>
			<td>{{$slider->updated_at}}&nbsp;</td>
			<td class="actions">
				<a href="slider_images/{{$slider->id}}" class="btn btn-submit add-btn"> Edit</a>
				<a href="delete_sliderimage/{{$slider->id}}" onclick=" return confirm('do you really want to delete it?')" class="btn btn-submit add-btn"> Delete</a>
			</td>
		</tr>
	@endforeach
	</tbody>
	</table>
	{!! Form::close() !!}
	
	<p></p>
	<div class="paging">
		{!! $sliders->render() !!}  		
	</div>
</div>
@endsection
