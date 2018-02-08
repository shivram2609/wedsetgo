@extends('layouts.admin')
@section('content')
<div class="categories index">
	<h2><?php echo 'View Porfessional Work Detail'; ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td>Professional Name</td>
			<td><?php echo ucfirst($viewprofessionalWorkList->first_name); ?> <?php echo ucfirst($viewprofessionalWorkList->last_name); ?></td>
		</tr>
		<tr>
			<td>Image</td>
			<?php if(isset($viewprofessionalWorkList->images)) { ?>
				<td><img class="admin_professional" style="" src="<?php echo asset("/work_image/$viewprofessionalWorkList->images")?>"></td>
		   <?php } else { ?>
				<td> No Image</td>
			<?php } ?>
		</tr>
		<tr>
			<td>Category</td>
			<td>{{$viewprofessionalWorkList->name}}</td>
		</tr>
		<tr>
			<td>Title</td>
			<td>{{$viewprofessionalWorkList->title}}</td>
		</tr>

		<tr>
			<td>Description</td>
			<td>{{$viewprofessionalWorkList->description}}</td>
		</tr>
	</tbody>
	</table>
		<a href="/professional_status/{{$viewprofessionalWorkList->id}}/{{$viewprofessionalWorkList->status}}/" onclick="return confirm('are you sure to <?php echo (empty($viewprofessionalWorkList->status)?"Make in active":"Make in inactive"); ?> request?');" class="btn btn-submit add-btn clear-category" id="professional_view"> <?php echo (empty($viewprofessionalWorkList->status)?'Make in active':'Make in Inactive'); ?>&nbsp;</a>
</div>
@endsection
