@extends('layouts.admin')
@section('content')

<div class="categories index">
	<h2><?php echo 'Users List'; ?></h2>
	
	<div class="srch">
		<form action="" method="GET" role="search">
			
			<div class="input-group" >
				<input type="text" class="form-control categories-search" name="search_user" placeholder="Search User"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default categories-submit"><span class="glyphicon glyphicon-search"></span>Search</button>
					<a href="{{ url('users') }}" class="btn btn-submit add-btn clear-category"> Clear</a>
				</span>
					<div class="rhs_actions right ">
						<a href="{{ url('add_user') }}" class="btn btn-submit add-btn "> Add</a>
					</div>
			</div>
		</form>
		
	</div>
		{!! Form::open() !!}
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>User Type</th>
				<th>Status</th>
				<th>Created</th>
				<th class="actions"><?php echo 'Actions'; ?></th>
		</tr>
	</thead>
	<tbody>
	 @foreach ($users as $user)
		<tr>
			<td>{{$user->first_name}}</td>
			<td>{{$user->last_name}}</td>
			<td>{{$user->email}}</td>
			<td><?php echo (!empty($user->user_type_id==2)?'Professional':'Buyer'); ?>&nbsp;</td>
			<td><?php echo (empty($user->is_active)?'Inactive':'Active'); ?>&nbsp;</td>
			<td>{{$user->created_at}}&nbsp;</td>
			<td class="actions">
				<a href="user/{{$user->id}}" class="btn btn-submit add-btn"> Edit</a>
				<a href="delete_user/{{$user->id}}" onclick=" return confirm('do you really want to delete it?')" class="btn btn-submit add-btn"> Delete</a>
			</td>
		</tr>
	@endforeach
	</tbody>
	</table>
	{!! Form::close() !!}
	
	<p></p>
	<div class="paging">
		{!! $users->render() !!}  		
	</div>
</div>
@endsection
