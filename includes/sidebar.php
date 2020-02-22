<?php $pageName = basename($_SERVER['PHP_SELF']); ?>
<div class="leftSide collapse" id="themeTabs">
  <div class="col-xs-12">
	<ul class="nav nav-pills nav-stacked shadow-1" role="tablist">
		<li class="<?php echo ($pageName == "index.php" ? "active": ""); ?>">
			<a href="./"><i class="fa fa-home fa-lg"></i>Welcome</a>
		</li>
		<li class="<?php echo ($pageName == "requirements.php" ? "active": ""); ?>">
			<a href="./requirements.php"><i class="fa fa-server fa-lg"></i>Server Requirments</a>
		</li>
		<li class="<?php echo ($pageName == "database_details.php" ? "active": ""); ?>">
			<a href="./database_details.php"><i class="fa fa-clipboard fa-lg"></i>Database Details</a>
		</li>
		<li class="<?php echo ($pageName == "website_details_settings.php" ? "active": ""); ?>">
			<a href="./website_details_settings.php"><i class="fa fa-list-alt fa-lg"></i>Website Details and Settings</a>
		</li>
		<li class="<?php echo ($pageName == "finish.php" ? "active": ""); ?>">
			<a href="./finish.php"><i class="fa fa-thumbs-o-up fa-lg"></i>Finish</a>
		</li>
	</ul>
  </div>
</div>