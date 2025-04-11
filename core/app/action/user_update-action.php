<?php
	if(count($_POST)>0){
		$is_admin=0;
		if(isset($_POST["is_admin"])){$is_admin=1;}
		$is_active=0;
		if(isset($_POST["is_active"])){$is_active=1;}
		$user = UserData::getById($_POST["user_id"]);
		$user->name = $_POST["name"];
		$user->lastname = $_POST["lastname"];
		$user->username = $_POST["email"];
		$user->address = $_POST["address"];
		$user->email = $_POST["email"];
		$user->kind = $_POST["kind"];
		$user->is_active=$is_active;
		if($user->id!=1){
			$user->update();
		}
		if(isset($_FILES["image"])){
			$image = new Upload($_FILES["image"]);
			if($image->uploaded){
				$image->Process("storage/profiles/");
				if($image->processed){
					$user->image = $image->file_dst_name;
					$user->update_image();
				}
			}
		}
		if($_POST["password"]!="" && $user->id!=1){
			$user->password = sha1(md5($_POST["password"]));
			$user->update_passwd();
			print "<script>alert('Se ha actualizado el password');</script>";
		}
		print "<script>window.location='index.php?view=users';</script>";
	}
?>