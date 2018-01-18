@extends('layouts.admin')
@section('content')

<div class="categories index">
	<h2><?php echo 'Categories'; ?></h2>
	
	<div class="srch">
		<form action="" method="GET" role="search">
			
			<div class="input-group" >
				<input type="text" class="form-control categories-search" name="search_categories" placeholder="Search Catageories"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default categories-submit"><span class="glyphicon glyphicon-search"></span>Search</button>
					<a href="{{ url('catagories') }}" class="btn btn-submit add-btn clear-category"> Clear</a>
				</span>
			</div>
		</form>
		<div class="rhs_actions right">
			<a href="{{ url('catagory') }}" class="btn btn-submit add-btn"> Add</a>
		</div>
	</div>
		{!! Form::open() !!}
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
				<th>Name</th>
				<th>Image</th>
				<th>Status</th>
				<th>Created</th>
				<th>Modified</th>
				<th class="actions"><?php echo 'Actions'; ?></th>
		</tr>
	</thead>
	<tbody>
	 @foreach ($categories as $category)
		<tr>
			<td>{{$category->name}}</td>
			<?php if(isset($category->image)) { ?>
				<td><img class="admin_category" src="<?php echo asset("/categories/$category->image")?>"></td>
		   <?php } else { ?>
				<td> No Image</td>
			<?php } ?>
			<td><?php echo (empty($category->is_active)?'Inactive':'Active'); ?>&nbsp;</td>
			<td>{{$category->created_at}}&nbsp;</td>
			<td>{{$category->updated_at}}&nbsp;</td>
			<td class="actions">
				<a href="catagory/{{$category->id}}" class="btn btn-submit add-btn"> Edit</a>
				<a href="delete_category/{{$category->id}}" onclick=" return confirm('do you really want to delete it?')" class="btn btn-submit add-btn"> Delete</a>
			</td>
		</tr>
	@endforeach
	</tbody>
	</table>
	{!! Form::close() !!}
	
	<p></p>
	<div class="paging">
		{!! $categories->render() !!}  		
	</div>
</div>
@endsection
