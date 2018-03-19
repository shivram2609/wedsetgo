<?php
if($listflag){
?>

<!-- bulk action code below -->

<?php 
if (isset($selflag) && !$selflag) {
} else {
	?>
	<div id="checkstatus">
	<?php
if(isset($delete) && $delete == 'no') {
	echo $this->Form->input("options",array("options"=>array(""=>'Select Action',"Active"=>'Active',"Inactive"=>'Inactive'),"div"=>false,"label"=>false,"class"=>'options',"style"=>""));
} elseif(isset($post) && $post == '1') {
	echo $this->Form->input("options",array("options"=>array(""=>'Select Action',"Enable"=>'Approve',"Disable"=>'Disapprove',"Delete"=>'Delete'),"div"=>false,"label"=>false,"class"=>'options',"style"=>""));
} elseif(isset($message)) {
	if ($message == 1) {
		echo $this->Form->input("options",array("options"=>array(""=>'Select Action',"Trash"=>"Move to Trash"),"div"=>false,"label"=>false,"class"=>'options',"style"=>""));
	} elseif($message == 3) {
		echo $this->Form->input("options",array("options"=>array(""=>'Select Action',"Read"=>"Restore","Delete"=>"Delete"),"div"=>false,"label"=>false,"class"=>'options',"style"=>""));
	}
	else {
	}
} else {
	if(isset($database)){
		echo $this->Form->input("options",array("options"=>array(""=>'Select Action',"Delete"=>'Delete'),"div"=>false,"label"=>false,"class"=>'options',"style"=>""));
	} else{
		echo $this->Form->input("options",array("options"=>array(""=>'Select Action',"Active"=>'Active',"Delete"=>'Delete',"Inactive"=>'Inactive'),"div"=>false,"label"=>false,"class"=>'options',"style"=>""));
	}
}
if (isset($message) && $message != 1 && $message != 3){
	
} else {
	echo $this->Form->submit("Submit",array("div"=>false,"label"=>false,"id"=>'submitbtn',"class"=>'submit',"style"=>'float: left;margin: 0 0 0 13px;position: absolute;'));
}
?>
<label class="error" id="checkerr" style="float: left; margin: -10px 0 0;"></label>
<div class="clear"></div>
</div>
<?php
}

?>



<!-- search code below -->
<div class="search-box">
	<?php echo $this->Form->input("searchval",array("type"=>'text',"placeholder"=>$place,"div"=>false,"label"=>false,"value"=>isset($searchval)?$searchval:'',"class"=>"searchvalue common_search","autocomplete"=>"off")); ?>
	
	<?php echo $this->Form->submit("Search",array("label"=>false,"div"=>false,"class"=>'invite-button nomargin submitsearch searchcommon',"id"=>'submitbtn',"attr"=>'search')); ?>&nbsp;
	<?php echo $this->Form->submit("Clear Search",array("label"=>false,"div"=>false,"class"=>'invite-button nomargin submitsearch',"id"=>'resetbtn',"attr"=>'search')); ?>
	<?php echo '<span id="search_err" style="display:none;">Please enter keyword</span>'; ?>
	
	<?php
	
	if($flag){
	?>
	<br/><span style="font-size:11px;"><i>date format : yyyy-mm-dd</i><span>
	<?php } ?>
</div>
<!-- search code ends here -->

<!-- page heading and add button below -->
<!--<h2><?php echo __($pageheader);?></h2>-->
<?php //echo $this->Session->flash(); ?>
<?php if($buttontitle){
	if($buttontitle != 'no') {
	?>
<div class="rhs_actions right">
	<?php 
	if (!isset($message)) {
		if(isset($frontend) && $frontend) { 
			echo $this->Html->link(__($buttontitle, true), array('action' => $action)); 
		} else {
			echo $this->Html->link(__($buttontitle, true), array('action' => $action)); 
		}
	}
	?> 
</div>
<?php } ?>

<!-- end here -->


<!-- end here -->
<?php } ?>
<?php
} else {
	?>
	<h2><?php echo __($pageheader);?></h2>
	<div class="clear"></div>
	<?php echo $this->Session->flash(); ?>
	<?php
}
?>
