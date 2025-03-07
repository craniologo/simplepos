<?php
	if(isset($_SESSION["reabastecer"])){
		$cart = $_SESSION["reabastecer"];
		if(count($cart)>0){

	$process = true;

	//////////////////////////////////
			if($process==true){
				$l_re = SellData::getLastRe();
				if(isset($l_re->ref_id)){
					$last = $l_re->ref_id+1;
				}else{
					$last = 1;
				}
				
				$sell = new SellData();
				$sell->ref_id = $last;
				$sell->user_id = $_SESSION["user_id"];
				 if(isset($_POST["client_id"]) && $_POST["client_id"]!=""){
				 	$sell->person_id=$_POST["client_id"];
				 	$sell->total = $_POST["money1"];
	 				$s = $sell->add_re_with_client();
				 }else{
	 				$s = $sell->add_re();
				 }


			foreach($cart as  $c){
				$op = new OperationData();
			 	$op->product_id = $c["product_id"] ;
			 	$op->q= $c["q"];
			 	$op->bono=$c["bono"];
				$op->price_in = ProductData::getById($c["product_id"])->price_in;
		  		$op->price_out = ProductData::getById($c["product_id"])->price_out;
			 	$op->operation_type_id=1; // 1 - entrada
			 	$op->sell_id=$s[1];
					if(isset($_POST["is_oficial"])){
						$op->is_oficial = 1;
					}
				$op->add();			 		
			}
				unset($_SESSION["reabastecer"]);
				setcookie("selled","selled");
	////////////////////
	print "<script>window.location='index.php?view=re_one&id=$s[1]';</script>";
			}
		}
	}

?>