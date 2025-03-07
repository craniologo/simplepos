<?php

	$stock_id = $_GET['stock_id'];
	$op_id = OperationData::getById($_GET['operation_id']);
	$operations = OperationData::getAllProductIdAndSellId($op_id->product_id,$op_id->sell_id);

	foreach ($operations as $op) {
		$op->del();
		}

	$product_id = $op_id->product_id;
	Core::redir("./index.php?view=history&product_id=$product_id&stock=$stock_id");

?>