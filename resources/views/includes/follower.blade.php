
<div class="dashboard-left">
					<a href="javascript:void(0);" title="Invite Friends" class="btn btn-gray btn-block form-group"><i class="fa fa-user-plus" aria-hidden="true"></i></i> Invite Friends</a>
					 <div class="btn-group">
					<?php if(!empty($followerList)){ ?>
						<a href="javascript:void(0);" title="Invite Friends" class="btn btn-gray form-group">Followers<br>({{$followerList}})</a>
					 <?php } else { ?>
						<a href="javascript:void(0);" title="Invite Friends" class="btn btn-gray form-group">Followers<br>(0)</a>

					 <?php } if(!empty($followingList)){ ?>
						<a href="javascript:void(0);" title="Invite Friends" class="btn btn-gray form-group">Following<br>({{$followingList}})</a></a>
					   <?php } else { ?>
						<a href="javascript:void(0);" title="Invite Friends" class="btn btn-gray form-group">Following<br>(0)</a>
					 <?php } ?>
					  </div> 
</div>
