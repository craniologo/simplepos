<section class="content">
	<?php $currency = ConfigurationData::getByPreffix("currency")->val;
		$imp_val = ConfigurationData::getByPreffix("imp_val")->val;
		$imp_name = ConfigurationData::getByPreffix("imp_name")->val; ?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class='fa fa-dollar'></i> Resumen de Venta</h2>
			<a href="index.php?view=sells" class="btn btn-default"><i class="fa fa-arrow-left"></i> Ventas</a>
			<br><br>
			<?php if(isset($_GET["id"]) && $_GET["id"]!=""):?>
			<?php $sell = SellData::getById($_GET["id"]);
			$operations = OperationData::getAllProductsBySellId($_GET["id"]);
			$total = 0; ?>

			<?php if(isset($_COOKIE["selled"])){
				foreach ($operations as $operation) {
			//		print_r($operation);
					$qx = OperationData::getQYesF($operation->product_id);
					// print "qx=$qx";
						$p = $operation->getProduct();
					if($qx==0){
						echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->name</b> no tiene existencias en inventario.</p>";			
					}else if($qx<=$p->inventary_min/2){
						echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->name</b> tiene muy pocas existencias en inventario.</p>";
					}else if($qx<=$p->inventary_min){
						echo "<p class='alert alert-warning'>El producto <b style='text-transform:uppercase;'> $p->name</b> tiene pocas existencias en inventario.</p>";
					}
				}
				setcookie("selled","",time()-18600);
			} ?>
			<div class="col-md-3">
				<div class="box">
		  			<div class="box-body no-padding">
		  				<div class="box-body">
							<div class="box-body table-responsive">
								<table class="table table-bordered">
								<?php if($sell->person_id!=""):
								$client = $sell->getPerson(); ?>
								<tr>
									<td style="width:100px";>Operación N°</td>
									<td><?php echo $sell->ref_id; ?></td>
								</tr>
								<tr>
									<td style="width:100px;">Cliente:</td>
									<td><?php echo $client->name."&nbsp;".$client->lastname;?></td>
								</tr>
								<tr>
									<td style="width:100px;">RUC/DNI:</td>
									<td><?php echo $client->ruc;?></td>
								</tr>
								<?php endif; ?>
								<?php if($sell->user_id!=""):
								$user = $sell->getUser();
								?>
								<tr>
									<td>Cajero:</td>
									<td><?php echo $user->name." ".$user->lastname;?></td>
								</tr>
								<?php endif; ?>
								<tr>
									<td style="width:100px;">Fecha: </td>
									<td><?php echo $sell->created_at;?></td>
								</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box">
		  			<div class="box-body no-padding">
		  				<div class="box-body">
							<div class="box-body table-responsive">
								<table class="table table-bordered table-hover">
									<thead>
										<th style="text-align: center; width: 30px;">N°</th>
										<th style="text-align: center;">Cant</th>
										<th style="text-align: center;">Productos</th>
										<th style="text-align: center;">Precio&nbsp;<?php echo $currency; ?></th>
										<th style="text-align: center;">Total&nbsp;<?php echo $currency; ?></th>
									</thead>
									<?php for($number=0; $number<1; $number++); //variable incremental
									foreach($operations as $operation){ $product  = $operation->getProduct();?>
									<tr>
										<td style="text-align: center;"><?php echo $number; ?></td> <?php $number++; ?><!--var incremen-->
										<td style="text-align: center;"><?php echo $operation->q ;?></td>
										<td><?php echo $product->name; ?></td>
										<td style="text-align: right;"><b><?php echo number_format($product->price_out, 2, '.', '') ;?></b></td>
										<td style="text-align: right;"><b><?php echo number_format($operation->q*$product->price_out, 2, '.', '');$total+=$operation->q*$product->price_out;?></b></td>
									</tr>
									<?php }?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $f = $imp_val*0.01;
		  	$e = 1-$f;
		    $d = 1+ $f;
		    $total = $sell->total;
		    $subt = $total*$e;
		    $igv = $total*$f; ?>
			<div class="col-md-3">
				<div class="box">
		  			<div class="box-body no-padding">
		  				<div class="box-body">
							<div class="box-body table-responsive">
								<table class="table table-bordered">
									<tr>
										<td>Descuento:</td>
										<td style="text-align: right;"><b><?php echo number_format($sell->discount,2,".",","); ?></b></td>
									</tr>
									<tr>
										<td>Subtotal(<?php echo $currency; ?>):</td>
										<td style="text-align: right;"><b><?php echo number_format($subt,2,".",","); ?></b></td>
									</tr>
									<tr>
										<td><?php echo $imp_name.'('.$imp_val.'%)('.$currency; ?>):</td>
										<td style="text-align: right;"><b><?php echo number_format($igv,2,".",","); ?></b></td>
									</tr>
									<tr>
										<td>Total(<?php echo $currency; ?>):</td>
										<td style="text-align: right;"><b><?php echo number_format($total-$sell->discount,2,".",","); ?></b></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
			    <div class="col-lg-offset-0 col-lg-10">
				    <div class="1checkbox">
				        <label>
							<form method="post" name="Aceptar" action="index.php?view=sells">
								<a name="nueva" id="nueva" href="index.php?view=sell"><input type="button" name="nueva" id="nueva" " value="Nueva"></a>
								<input type="submit" name="cancelar" id="cancelar" value="Ventas">
								<a target="_blank" href="ticket.php?id=<?php echo $sell->id; ?>"><input type="button" name="nueva" id="nueva" " value="Imp Usb"></a>
								<input type="button" name="ticket" id="ticket" value="Ticket Blth" onClick="sendToQuickPrinterChrome();">
							</form>
				        </label>
				    </div>
			    </div>
		  	</div>
			<?php else:?>
				501 Internal Error
			<?php endif; ?>
			<script>
			function sendToQuickPrinterChrome(){
			    var text = "<big>SERGESTEC<br>Av. Los Libertadores 124<br>Dist. Santiago de Surco<br>Cel: 987985339<br>Cliente: <?php echo $client->name." ".$client->lastname;?><br>RUC/DNI: <?php echo $client->ruc;?><br>Dir: <?php echo $client->address1;?><br>Fecha: <?php echo $sell->created_at;?><br>Cajero: <?php echo $user->name." ".$user->lastname;?><br><DLINE>Can Productos PUni(S/) PTot(S/)<br><?php foreach($operations as $operation){ $product  = $operation->getProduct();?><?php echo $operation->q ;?> <?php echo substr($product->name,0,10);?>   <?php echo number_format($product->price_out,2,".",",") ;?>   <?php echo number_format($operation->q*$product->price_out,2,".",",");$total+=$operation->q*$product->price_out;?><br><?php }?><DLINE>Descuento: S/ <?php echo number_format($sell->discount,2,'.',','); ?><br>Subtotal : S/ <?php echo number_format($total1*.82,2,".",","); ?><br>IGV(18%) : S/ <?php echo number_format($total1*.18,2,".",","); ?><br>Total    : S/ <?php echo $total1; ?><br><big>Vuelva Pronto!<br>";

			    var textEncoded = encodeURI(text);
			    window.location.href="intent://"+textEncoded+"#Intent;scheme=quickprinter;package=pe.diegoveloper.printerserverapp;end;";
			    var text = "<br><br><br>";
			    
			}
			</script>
		</div>
	</div>
</section>