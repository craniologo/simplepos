<?php

	$box = BoxData::getById($_GET["id"]);
	$sells = SellData::getByBoxId($_GET["id"]);
		foreach ($sells as $sell) {
		$sell->update_box_null();
	}
	$box->del();
	Core::redir("./index.php?view=box_history");

?>