<?php

	if(count($_POST)>0){
		$is_admin=0;
		if(isset($_POST["is_admin"])){$is_admin=1;}
		$user = new UserData();
		$user->name = $_POST["name"];
		$user->lastname = $_POST["lastname"];
		$user->username = $_POST["email"];
		$user->address = $_POST["address"];
		$user->email = $_POST["email"];
		$user->kind=$_POST['kind'];
		$user->password = sha1(md5($_POST["password"]));
		$user->image = "NULL";
		$user->add();

	print "<script>window.location='index.php?view=users';</script>";

	}

?>