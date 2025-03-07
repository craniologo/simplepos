<?php
include "core/controller/Core.php";
include "core/controller/Database.php";
include "core/controller/Executor.php";
include "core/controller/Model.php";
include "core/app/model/UserData.php";
include "core/app/model/SellData.php";
include "core/app/model/PersonData.php";
include "core/app/model/OperationData.php";
include "core/app/model/ProductData.php";
/*include "core/app/model/StockData.php";*/
include "core/app/model/ConfigurationData.php";
include "fpdf/fpdf.php";
session_start();
if(isset($_SESSION["user_id"])){ Core::$user = UserData::getById($_SESSION["user_id"]); }
$title = ConfigurationData::getByPreffix("company_name")->val;
$address = ConfigurationData::getByPreffix("address")->val;
$phone = ConfigurationData::getByPreffix("phone")->val;
$report_image = ConfigurationData::getByPreffix("report_image")->val;
$currency = ConfigurationData::getByPreffix("currency")->val;
$imp_name = ConfigurationData::getByPreffix("imp_name")->val;
$imp_val = ConfigurationData::getByPreffix("imp_val")->val;

$sell = SellData::getById($_GET["id"]);
$operations = OperationData::getAllProductsBySellId($_GET["id"]);
$user = $sell->getUser();
$client = $sell->getPerson();

if($report_image!=''){
	$image = $report_image;
}else{
	$image = 'logo.jpg';
}

$pdf = new FPDF($orientation='P',$unit='mm', array(80,350));
$pdf->AddPage();
$pdf->SetFont('Arial','B',17);    //Letra Arial, negrita (Bold), tam. 20
//$pdf->setXY(5,0);
$pdf->setY(3);
$pdf->setX(2);
$pdf->Image('storage/configuration/'.$image,3,5,74,30,);
$pdf->Ln(33);
$pdf->setX(2);
$pdf->Cell(76,8,strtoupper(utf8_decode($title)),0,1,"C");
$pdf->SetFont('Arial','B',8);    //Letra Arial, negrita (Bold), tam. 20
$pdf->setX(2);
$pdf->Cell(76,4,strtoupper(utf8_decode($address)),0,1,"C");
$pdf->setX(2);
$pdf->Cell(76,4,"TELEFONO: ".strtoupper($phone),0,1,"C");
$pdf->setX(2);
$pdf->Cell(76,4,"BOLETA #: ".$sell->ref_id,0,1,"L");
$pdf->setX(2);
$pdf->Cell(76,4,"FECHA: ".$sell->created_at,0,1,"L");
$pdf->setX(2);
$pdf->Cell(76,4,"CLIENTE: ".strtoupper(utf8_decode($client->name." ".$client->lastname)),0,1,"L");
$pdf->setX(2);
$pdf->Cell(76,4,"TEL: ".strtoupper($client->phone),0,1,"L");
$pdf->setX(2);
$pdf->Cell(76,6,'------------------------------------------------------------------------------',0,1,"C");
$pdf->setX(2);
$pdf->Cell(8,4,'C  ARTICULO       		                        PRECIO           TOTAL');

$total =0;
$off = 12;
foreach($operations as $op){
	$product = $op->getProduct();
	$pdf->setX(2);
	$pdf->Cell(5,$off,"$op->q");
	$pdf->setX(6);
	$pdf->Cell(35,$off,strtoupper(substr(utf8_decode($product->name), 0,16)) );
	$pdf->setX(30);
	$pdf->Cell(29,$off,number_format(($product->price_out/$product->unit),2,".",",") ,0,0,"R");
	$pdf->setX(42);
	$pdf->Cell(35,$off,number_format($op->q*($product->price_out/$product->unit),2,".",",") ,0,0,"R");

	//    ".."  ".number_format($op->q*$product->price_out,2,".",","));
	$total += $op->q*($product->price_out/$product->unit);
	$off+=6;
}

	$f = $imp_val*0.01;
  	$e = 1-$f;
    $d = 1+ $f;
    $total = $sell->total;
    $subt = $total*$e;
    $igv = $total*$f;

$pdf->setX(2);
$pdf->Cell(5,$off+3,"DESCUENTO: " );
$pdf->setX(72);
$pdf->Cell(5,$off+3,$currency." ".number_format($total*$sell->discount/100,2,".",","),0,0,"R");
$pdf->setX(2);
$pdf->Cell(5,$off+9,"SUBTOTAL:" );
$pdf->setX(72);
$pdf->Cell(5,$off+9,$currency." ".number_format($subt,2,".",","),0,0,"R");
$pdf->setX(2);
$pdf->Cell(5,$off+15,$imp_name." (".$imp_val."%):" );
$pdf->setX(72);
$pdf->Cell(5,$off+15,$currency." ".number_format($igv,2,".",","),0,0,"R");
$pdf->setX(2);
$pdf->Cell(5,$off+21,"TOTAL:" );
$pdf->setX(72);
$pdf->Cell(5,$off+21,$currency." ".number_format($total,2,".",","),0,0,"R");

/*$pdf->setX(2);
$pdf->Cell(5,$off+27,'-------------------------------------------------------------------');
$pdf->setX(2);
$pdf->Cell(5,$off+33,"EFECTIVO: " );
$pdf->setX(62);
$pdf->Cell(5,$off+33,"S/ ".number_format($sell->cash,2,".",","),0,0,"R");

$pdf->setX(2);
$pdf->Cell(5,$off+39,"CAMBIO: " );
$pdf->setX(62);
$pdf->Cell(5,$off+39,"S/ ".number_format($sell->cash-($total - ($total*$sell->discount/100)),2,".",","),0,0,"R");
*/



$pdf->setX(2);
$pdf->Cell(5,$off+30,'------------------------------------------------------------------------------');
$pdf->setX(2);
/*$pdf->Cell(5,$off+51,"Sucursal: ".strtoupper($stock->name));*/
$pdf->setX(18);
$pdf->Cell(5,$off+44,'Atendido por: '.strtoupper($user->name." ".$user->lastname));
$pdf->setX(20);
$pdf->Cell(5,$off+53,"GRACIAS POR SU COMPRA");
$pdf->setX(2);

$pdf->output();
