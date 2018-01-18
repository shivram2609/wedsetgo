@extends('layouts.admin')
@section('content')

<div class="categories index">
	<h2><?php echo 'Cmsemails'; ?></h2>
	
	<div class="srch">
		<form action="" method="GET" role="search">
			
			<div class="input-group" >
				<input type="text" class="form-control categories-search" name="search_emails" placeholder="Search Email Subject"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default categories-submit"><span class="glyphicon glyphicon-search"></span>Search</button>
					<a href="{{ url('cmsemails') }}" class="btn btn-submit add-btn clear-category"> Clear</a>
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
				<th>Subject</th>
				<th>Email From</th>
				<th>Created</th>
				<th>Modified</th>
				<th class="actions"><?php echo 'Actions'; ?></th>
		</tr>
	</thead>
	<tbody>
	 @foreach ($cmsemails as $cmsemail)
		<tr>
			<td>{{$cmsemail->subject}}</td>
			<td>{{$cmsemail->emailfrom}}</td>
			<td>{{$cmsemail->created_at}}&nbsp;</td>
			<td>{{$cmsemail->updated_at}}&nbsp;</td>
			<td class="actions">
				<a href="cmsemail/{{$cmsemail->id}}" class="btn btn-submit add-btn"> Edit</a>
			</td>
		</tr>
	@endforeach
	</tbody>
	</table>
	{!! Form::close() !!}
	
	<p></p>
	<div class="paging">
		{!! $cmsemails->render() !!}  		
	</div>
</div>
@endsection
