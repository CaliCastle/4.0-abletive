<?php

$resetPage = new MikadoBurstAdminPage("21", "Reset", "icon_refresh");
$mkd_burst_Framework->mkdOptions->addAdminPage("Reset",$resetPage);

//Reset

$panel1 = new MikadoBurstPanel("Reset to Defaults","reset_panel");
$resetPage->addChild("panel1",$panel1);

	$reset_to_defaults = new MikadoBurstField("yesno","reset_to_defaults","no","Reset to Defaults","This option will reset all Mikado Settings values to defaults");
	$panel1->addChild("reset_to_defaults",$reset_to_defaults);