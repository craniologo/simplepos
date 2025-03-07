<?php
	if(count($_POST)>0){
		$spend = new SpendData();
		$spend->name = $_POST["name"];
		$spend->price = $_POST["price"];
		$spend->user_id = $_SESSION['user_id'];
		$spend->add();
		print "<script>window.location='index.php?view=spends';</script>";
	}
?>