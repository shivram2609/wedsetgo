@extends('layouts.admin')
@section('content')

<div class="categories index">
	<h2><?php echo 'Static Pages'; ?></h2>
	
	<div class="srch">
		<form action="" method="GET" role="search">
			
			<div class="input-group" >
				<input type="text" class="form-control categories-search" name="search_pages" placeholder="Search Static Pages"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default categories-submit"><span class="glyphicon glyphicon-search"></span>Search</button>
					<a href="{{ url('staticpages') }}" class="btn btn-submit add-btn clear-category"> Clear</a>
				</span>
			</div>
		</form>
		<div class="rhs_actions right">
			<a href="{{ url('static_pages') }}" class="btn btn-submit add-btn"> Add</a>
		</div>
	</div>
		{!! Form::open() !!}
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Meta Title</th>
				<th>Seo Url</th>
				<th>Meta Description</th>
				<th>Meta Keyword</th>
				<th>Status</th>
				<th>Created</th>
				<th>Modified</th>
				<th class="actions"><?php echo 'Actions'; ?></th>
		</tr>
	</thead>
	<tbody>
	 @foreach ($pages as $page)
		<tr>
			<td>{{$page->id}}</td>
			<td>{{$page->name}}</td>
			<td>{{$page->metatitle}}</td>
			<td>{{$page->seourl}}</td>
			<td>{{$page->metadesc}}</td>
			<td>{{$page->metakeyword}}</td>
			<td><?php echo (empty($page->status)?'Inactive':'Active'); ?>&nbsp;</td>
			<td>{{$page->created_at}}&nbsp;</td>
			<td>{{$page->updated_at}}&nbsp;</td>
			<td class="actions">
				<a href="static_pages/{{$page->id}}" class="btn btn-submit add-btn"> Edit</a>
				<a href="delete_page/{{$page->id}}" onclick=" return confirm('do you really want to delete it?')" class="btn btn-submit add-btn"> Delete</a>
			</td>
		</tr>
	@endforeach
	</tbody>
	</table>
	{!! Form::close() !!}
	
	<p></p>
	<div class="paging">
		{!! $pages->render() !!}  		
	</div>
</div>
@endsection
