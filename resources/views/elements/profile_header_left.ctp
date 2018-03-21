<?php //pr($userInfo); ?>            	
<div class="col-sm-3">
    <div class="row">
        <div class="col-md-12 text-center border-rt">
            <div class="user-pic">
                <?php $tmpdata = unserialize(base64_decode($this->Session->read("AuthUser.UserDetail.details")));?>
                    <span>
                    <?php if (!empty($tmpdata['image']) && file_exists(WWW_ROOT."/img/profileimg/".$tmpdata['image']) ) { $img = "/img/profileimg/".$tmpdata['image']; } else { $img = "/img/profileimg/cook.jpg"; }  echo $this->Html->image($img,array("alt"=>$userInfo['UserDetail']['first_name'],"width"=>"130","height"=>"130")); ?>
                    </span>
            </div>
            <div class="user-name">
                <?php //echo $this->Session->read("AuthUser.UserDetail.first_name"); ?>
                <?php echo $userInfo['UserDetail']['title'] .' '. $userInfo['UserDetail']['first_name']; ?>
                <span class="user-location"><?php if(isset($userInfo['Location']['name'])) { ?> <i class="fa fa-map-marker" aria-hidden="true"></i> <?php } ?><?php echo $userInfo['Location']['name']; ?></span>
            </div>
            <div class="form-group border-btm">&nbsp;</div>
        </div>
    </div>
    <div class="row">
            <div class="col-md-12">
                <ul class="user-lt-link">
                    <li><a href="<?php echo SITE_LINK.'edit-profile'; ?>" title="Manage your profile" <?php if ($this->params['controller'] == 'userDetails' && $this->params['action'] == 'edit') { ?> class="active" <?php } ?>>  Manage your profile</a></li>
<!--                    <li><a href="javascript:void(0);" title="Manage your purchase">Manage your purchase</a></li>-->
                    <li><a href="<?php echo SITE_LINK ?>my-orders" title="View your purchase">View your purchase</a></li>
                    <li><a href="<?php echo SITE_LINK ?>new-orders" title="View my orders">View my orders</a></li>
					<li><a href="<?php echo SITE_LINK ?>my-addresses" title="Manage address">Manage address</a></li>
                    <li><a href="<?php echo SITE_LINK.'add-dishes'; ?>" title="Sell your food" <?php if ($this->params['controller'] == 'dishes' && $this->params['action'] == 'add') { ?> class="active" <?php } ?>>  Sell your food</a></li>
                    <li><a href="<?php echo SITE_LINK.'mydishes'; ?>" title="Manage your food listing" <?php if ($this->params['controller'] == 'dishes' && $this->params['action'] == 'listDish') { ?> class="active" <?php } ?>>Manage your food listing</a></li>
                    <li><a href="<?php echo SITE_LINK.'change-password'; ?>" title="Change Password" <?php if ($this->params['controller'] == 'users' && $this->params['action'] == 'changepassword') { ?> class="active" <?php } ?>> Change password</a></li>
<!--                    <li><a href="javascript:void(0);" title="Track your sales">Track your sales</a></li>-->
                </ul>
            </div>
    </div>
</div>
