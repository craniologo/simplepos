<?php

	if($_POST["q"]!="" || $_POST["q"]!="0"){

		$admin = UserData::getById($_SESSION["user_id"]);
		$op = new OperationData();
		$op->product_id = $_POST["product_id"] ;
		$op->operation_type_id=1; // 1 - Entrada
		$op->q= $_POST["q"];
		$op->price_in = ProductData::getById($_POST["product_id"])->price_in;
  		$op->price_out = ProductData::getById($_POST["product_id"])->price_out;
		$op->sell_id="NULL";
		$o=$op->add();

		$ra = new ReadjustData();
		$ra->operation_id=$o[1];
		$ra->justify=$_POST["justify"];
		$ra->user_id=$admin->id;
		$ra->add();

	Core::redir("./?view=inventary");
	}

?>