@extends('layouts.admin')
@section('content')

<div class="categories index">
	<h2><?php echo 'Professional Work List'; ?></h2>
	
	<div class="srch">
		<form action="" method="GET" role="search">
			
			<div class="input-group" >
				<input type="text" class="form-control categories-search" name="search_professional" placeholder="Search professional work"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default categories-submit"><span class="glyphicon glyphicon-search"></span>Search</button>
					<a href="{{ url('professional_work_list') }}" class="btn btn-submit add-btn clear-category"> Clear</a>
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
				<th>Image</th>
				<th>Category</th>
				<th>Title</th>
				<th>Professional Name</th>
				<th>status</th>
				<th>Create</th>
				<th class="actions"><?php echo 'Actions'; ?></th>
		</tr>
	</thead>
	<tbody>
		 @foreach ($professionalWorkList as $professionalWorkLists)
		<tr>
			<?php if(isset($professionalWorkLists->images)) { ?>
				<td><img class="admin_professional" style="height:50 " src="<?php echo asset("/work_image/$professionalWorkLists->images")?>"></td>
		   <?php } else { ?>
				<td> No Image</td>
			<?php } ?>
			<td>{{$professionalWorkLists->name}}</td>
			<td>{{$professionalWorkLists->title}}</td>
			<td>{{$professionalWorkLists->first_name}} {{$professionalWorkLists->last_name}}</td>
			<td><?php echo (empty($professionalWorkLists->status)?'Inactive':'Active'); ?>&nbsp;</td>
			<td>{{$professionalWorkLists->created_at}}</td>
			<td class="actions">
				<a href="view_professional_work_list/{{$professionalWorkLists->id}}" class="btn btn-submit add-btn"> view</a>
			</td>
		</tr>
		@endforeach
	</tbody>
	</table>
	{!! Form::close() !!}
	
	<p></p>
	<div class="paging">
		{!! $professionalWorkList->render() !!}		
	</div>
</div>
@endsection
