<?php

	if(count($_POST)>0){
		$user = UserData::getById($_POST["user_id"]);
		$user->name = $_POST["name"];
		$user->lastname = $_POST["lastname"];
		$user->username = $_POST["email"];
		$user->address = $_POST["address"];
		$user->email = $_POST["email"];
			if(isset($_FILES["image"])){
			    $image = new Upload($_FILES["image"]);
			    if($image->uploaded){
			      $image->Process("storage/profiles/");
			      if($image->processed){
			        $user->image = $image->file_dst_name;
			      }
			    }
		  	}
		if($user->id!=1){
			$user->update();
			
			if($_POST["password"]!=""){
				$user->password = sha1(md5($_POST["password"]));
				$user->update_passwd();
				print "<script>alert('Se ha actualizado el password');</script>";
			}
		}
		
		print "<script>window.location='index.php?view=profile';</script>";
	}

?>