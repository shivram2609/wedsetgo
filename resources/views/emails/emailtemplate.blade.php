<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="description" content="">
        <title><?php echo "WedSetGo"; ?></title>
	</head>
    <body>
        <div style="width:700px; margin:auto; font-family:arial; font-size:15px; color:#333333; line-height:18px;">
			<!--a href="<?php // echo SITE_LINK; ?>" ><img src="<?php //echo SITE_LINK; ?>img/logo.png" alt="<?php // echo "SwankCook"; ?>" title="<?php //echo "SwankCook"; ?>" border="0" style="margin:10px;"></a-->
			<a href="<?php echo $staticLink; ?>" ><img src="<?php echo $staticLink.'img/logo.png'; ?>" alt="wed-set-go logo" border="0" style="margin:10px;"></a>
			 <div style="margin:auto; border:1px solid #761b31; height:auto; border-bottom:none; padding:15px; margin:0px; font-family:arial; font-size:15px; color:#333333; line-height:18px;" >
				<?php echo $email_content; ?>
			</div>
			<div style="margin:auto; padding:15px; border:1px solid #761b31; border-top:none;"><br>
				<p style="font-family:arial; font-size:15px; color:#761b31; line-height:18px; margin:0px;"><b>Many thanks</b><br>
				<a href="javascript:void(0);" style="color:#761b31; text-decoration:none;" >The Wed·Set·Go Family</a>.</p><br>
			</div>
			<div style="margin:auto; padding:10px; margin:0px; text-align:center; font-family:arial; font-size:12px; color:#761b31; line-height:18px;" >
				All content &copy; <?php echo date("Y"); ?> by <?php echo "WedSetGo"; ?>. All rights reserved.
			</div>
		</div>
	</body>
</html>
