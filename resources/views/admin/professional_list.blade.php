@extends('layouts.admin')
@section('content')

<div class="categories index">
	<h2><?php echo 'Professional Request'; ?></h2>
	
	<div class="srch">
		<form action="" method="GET" role="search">
			
			<div class="input-group" >
				<input type="text" class="form-control categories-search" name="search_professional" placeholder="Search professional"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default categories-submit"><span class="glyphicon glyphicon-search"></span>Search</button>
					<a href="{{ url('professional_list') }}" class="btn btn-submit add-btn clear-category"> Clear</a>
				</span>
			</div>
		</form>
		<div class="rhs_actions right">
		
		</div>
	</div>
		{!! Form::open() !!}
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Status</th>
				<th>Created</th>
				<th class="actions"><?php echo 'Actions'; ?></th>
		</tr>
	</thead>
	<tbody>
	 @foreach ($professionals as $professional)
		<tr>
			<td>{{$professional->first_name}}</td>
			<td>{{$professional->last_name}}</td>
			<td>{{$professional->email}}</td>
			<td><?php echo (empty($professional->is_active)?'Inactive':'Active'); ?>&nbsp;</td>
			<td>{{$professional->created_at}}&nbsp;</td>
			<td class="actions">
				<a href="view_professional/{{$professional->id}}" class="btn btn-submit add-btn"> view</a>
			</td>
		</tr>
	@endforeach
	</tbody>
	</table>
	{!! Form::close() !!}
	
	<p></p>
	<div class="paging">
		{!! $professionals->render() !!}  		
	</div>
</div>
@endsection
