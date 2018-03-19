@extends('layouts.master')
@section('content')
@include('includes.top')
 <div class="dashboard-wrapper">
	<ul class="rating-list">
		<?php if(!empty($count)) { ?>
			<?php foreach($reviews as $key=>$val) { ?>
			<li>
				<?php //print_r($val); die; ?>
				<p><b><?php echo ucwords($val->first_name.' '.$val->last_name); ?></b><br/>
					<span class="grey-rating-small">
						<span class="gold-rating-small" style="width:<?php echo ($val->rating_points*10); ?>px;"></span>
					</span>
				</p>
				<p> <?php echo nl2br($val->comment); ?> </p>
			</li>
			<?php } ?>
			<?php } else { ?>
				<div class="empty">Sorry, No reviews.</div>
			<?php } ?>
	</ul>
	<nav>
			@include('includes.pagination', ['paginator' => $reviews->appends(request()->query())])
		</nav>
</div>
@endsection
