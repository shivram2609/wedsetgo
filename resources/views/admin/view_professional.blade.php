@extends('layouts.admin')
@section('content')
<div class="categories index">
	<h2><?php echo 'Porfessional Detail'; ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td>First Name</td>
			<td><?php echo ucfirst($viewProfessionals->first_name);?></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><?php echo ucfirst($viewProfessionals->last_name);?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{$viewProfessionals->email}}</td>
		</tr>
		<tr>
			<td>Phone No</td>
			<td>{{$viewProfessionals->phone_no}}</td>
		</tr>
		<tr>
			<td>Website</td>
			<td>{{$viewProfessionals->website}}</td>
		</tr>
		<tr>
			<td>Gender</td>
			<td><?php echo (!empty($viewProfessionals->gender=='m')?'Male':'Female	'); ?>&nbsp;</td>
		</tr>
		<tr>
			<td>Business Category</td>
			<td>{{$viewProfessionals->name}}</td>
		</tr>
		<?php if (!empty($viewProfessionals->other_category)) { ?>
		<tr>
			<td>Other Category</td>
			<td>{{$viewProfessionals->other_category}} <a href="/catagory" >Add in category</a></td>
			
		</tr>
		<?php }?>
		<tr>
			<td>Location</td>
			<td>{{$viewProfessionals->location_name}}</td>
		</tr>
		<?php if (!empty($viewProfessionals->other_location)) { ?>
		<tr>
			<td>Other Location</td>
			<td>{{$viewProfessionals->other_location}} <a href="/location" >Add in locations</a></td>
		</tr>
		<?php }?>
		<tr>
			<td>Dob</td>
			<td>{{$viewProfessionals->dob}}</td>
		</tr>
		<tr>
			<td>Address</td>
			<td>{{$viewProfessionals->address}}</td>
		</tr>
		<tr>
			<td>Trade Description</td>
			<td>{{$viewProfessionals->trade_description}}</td>
		</tr>
		<tr>
			<td>Detail</td>
			<td>{{$viewProfessionals->detail}}</td>
		</tr>
		<tr>
			<td>Social Media</td>
			<td><?php echo isset($socialVal['fb'])?$socialVal['fb']:''?>, <?php echo isset($socialVal['google'])?$socialVal['google']:''?>, <?php echo isset($socialVal['twitter'])?$socialVal['twitter']:''?></td>
		</tr>
		
	</tbody>
	</table>
	{!! Form::open() !!}
		<a href="/approve_professional_request/{{$viewProfessionals->id}}/1" onclick="return confirm('are you sure to approve this request?');" class="btn btn-submit add-btn clear-category"> Request Approve</a>
		<a href="/approve_professional_request/{{$viewProfessionals->id}}/0" onclick="return confirm('are you sure to reject this request?');" class="btn btn-submit add-btn clear-category"> Reject Request</a>
		<a href="/more_info/{{$viewProfessionals->id}}" onclick="return confirm('are you sure to want more information?');" class="btn btn-submit add-btn clear-category"> Request More information</a>
	{!! Form::close() !!}
</div>
@endsection
