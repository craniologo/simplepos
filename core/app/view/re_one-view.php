<section class="content">
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-refresh"></i> Resumen de Reabastecimiento</h2>
			<a href="index.php?view=res" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
			<br><br>
			<?php $currency = ConfigurationData::getByPreffix("currency")->val;
			if(isset($_GET["id"]) && $_GET["id"]!=""):?>
			<?php $sell = SellData::getById($_GET["id"]);
			$operations = OperationData::getAllProductsBySellId($_GET["id"]);
			$total = 0; ?>
			<?php
			if(isset($_COOKIE["selled"])){
				foreach ($operations as $operation) {
			//		print_r($operation);
					$qx = OperationData::getQYesF($operation->product_id);
					// print "qx=$qx";
						$p = $operation->getProduct();
					if($qx==0){
						echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->barcode</b> no tiene existencias en inventario.</p>";			
					}else if($qx<=$p->inventary_min/2){
						echo "<p class='alert alert-danger'>El producto <b style='text-transform:uppercase;'> $p->barcode</b> tiene muy pocas existencias en inventario.</p>";
					}else if($qx<=$p->inventary_min){
						echo "<p class='alert alert-warning'>El producto <b style='text-transform:uppercase;'> $p->barcode</b> tiene pocas existencias en inventario.</p>";
					}
				}
				setcookie("selled","",time()-18600);
			} ?>
			<div class="box" style="width: 300px;">
	  			<div class="box-body no-padding">
	  				<div class="box-body">
						<div class="box-body table-responsive" >
							<table class="table table-bordered">
								<?php if($sell->person_id!=""):
								$client = $sell->getPerson();
								?>
								<tr>
									<td style="width:120px";>Operación N°</td>
									<td style="width:160px;"><?php echo $sell->ref_id; ?></td>
								</tr>
								<tr>
									<td>Proveedor</td>
									<td><?php echo $client->name." ".$client->lastname;?></td>
								</tr>

								<?php endif; ?>
								<?php if($sell->user_id!=""):
								$user = $sell->getUser();
								?>
								<tr>
									<td>Usuario</td>
									<td><?php echo $user->name." ".$user->lastname;?></td>
								</tr>
								<?php endif; ?>
								<tr>
									<td>Fecha</td>
									<td><?php echo $sell->created_at;?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
	  			<div class="box-body no-padding">
	  				<div class="box-body">
						<div class="box-body table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<th style="text-align: center; width: 30px;">N°</th>
									<th style="text-align: center; width: 100px;">Codigo</th>
									<th style="text-align: center; width: 80px;">Bono</th>
									<th style="text-align: center; width: 80px;">Cantidad</th>
									<th style="text-align: center;">Producto</th>
									<th style="text-align: center;">Costo&nbsp;<?php echo $currency; ?></th>
									<th style="text-align: center;">Total&nbsp;<?php echo $currency; ?></th>
								</thead>
								<?php for($number=0; $number<1; $number++); //variable incremental
								foreach($operations as $operation){
								$product  = $operation->getProduct(); ?>
								<tr>
									<td style="text-align: center;"><?php echo $number; ?></td> <?php $number++; ?><!--var incremen-->
									<td style="text-align: right;"><?php echo $product->barcode; ?></td>
									<td style="text-align: right;"><?php echo $operation->bono; ?></td>
									<td style="text-align: right;"><?php $cant=$operation->q-$operation->bono; echo $cant; ?></td>
									<td><?php echo $product->name ;?></td>
									<td style="text-align: right;"><b><?php echo number_format($product->price_in,2,".",",") ;?></b></td>
									<td style="text-align: right;"><b><?php echo number_format($cant*$product->price_in,1)."0";$total+=$cant*$product->price_in;?></b></td>
								</tr>
								<?php } ?>
							</table>
							<h4>Total: <?php echo $currency.' '.number_format($total,2,'.',','); ?></h4>
						</div>
					</div>
				</div>
			</div>
			<?php ?>	
			<?php else:?>
			501 Internal Error
			<?php endif; ?>
		</div>
	</div>
</section>