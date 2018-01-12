@extends('layouts.admin')
@section('content')

<div class="categories index">
	<h2><?php echo $title; ?></h2>
	
	<div class="srch">
		<form action="" method="GET" role="search">
			
			<div class="input-group" >
				<input type="text" class="form-control categories-search" name="search_locations" placeholder="Search Locations"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default categories-submit"><span class="glyphicon glyphicon-search"></span>Search</button>
					<a href="{{ url('locations') }}" class="btn btn-submit add-btn clear-category"> Clear</a>
				</span>
			</div>
		</form>
		<div class="rhs_actions right">
			<a href="{{ url('location') }}" class="btn btn-submit add-btn"> Add</a>
		</div>
	</div>
		{!! Form::open() !!}
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
				<th>Name</th>
				<th>Created</th>
				<th>Modified</th>
				<th class="actions"><?php echo 'Actions'; ?></th>
		</tr>
	</thead>
	<tbody>
	 @foreach ($locations as $location)
		<tr>
			<td>{{$location->location_name}}</td>
			<td>{{$location->created_at}}&nbsp;</td>
			<td>{{$location->updated_at}}&nbsp;</td>
			<td class="actions">
				<a href="location/{{$location->id}}" class="btn btn-submit add-btn"> Edit</a>
				<a href="delete_location/{{$location->id}}" onclick=" return confirm('do you really want to delete it?')" class="btn btn-submit add-btn"> Delete</a>
			</td>
		</tr>
	@endforeach
	</tbody>
	</table>
	{!! Form::close() !!}
	
	<p></p>
	<div class="paging">
		{!! $locations->render() !!}  		
	</div>
</div>
@endsection
