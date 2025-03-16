<section class="content">
	<div class="row">
		<div class="col-md-12">
			<h2><i class='fa fa-archive'></i> Corte de Caja #<?php echo $_GET["id"]; ?></h2>
			<a href="index.php?view=box_history" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
			<div class="clearfix"></div>
			<br>
			<?php $currency = ConfigurationData::getByPreffix("currency")->val;
			$products = SellData::getByBoxId($_GET["id"]);
			if(count($products)>0){
			$total_total = 0; ?>
			<div class="box">
	  			<div class="box-body no-padding">
	  				<div class="box-body">
						<div class="box-body table-responsive">
							<table class="table table-bordered datatable table-hover	">
								<thead>
									<th style="text-align: center; width: 30px;">N°</th>
									<th style="text-align: center; width: 30px;">Detalle</th>
									<th style="text-align: center;">Total&nbsp;<?php echo $currency; ?></th>
									<th style="text-align: center;">Fecha</th>
								</thead>
								<?php for($number=0; $number<1; $number++); //variable incremental
								foreach($products as $sell):?>
								<tr>
									<td style="text-align: center;"><?php echo $number; ?></td> <?php $number++; ?><!--var incremen-->
									<td style="text-align: center;"><a href="./index.php?view=sell_one&id=<?php echo $sell->id; ?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-right"></i></a><?php $operations = OperationData::getAllProductsBySellId($sell->id); ?></td>
									<td style="text-align: right;"><b><?php $total_total += $sell->total-$sell->discount;
									echo "<b>".number_format($sell->total-$sell->discount,2,".",",")."</b>"; ?></b></td>
									<td style="text-align: right;"><?php echo $sell->created_at; ?></td>
								</tr>
								<?php endforeach; ?>
							</table>
							<h4>Total: <?php echo $currency." ".number_format($total_total,2,".",","); ?></h4>
						</div>
					</div>
				</div>
			</div>
			<?php }else { ?>
			<div class="jumbotron"><h2>No hay ventas</h2><p>No se ha realizado ninguna venta.</p></div>
			<?php } ?>
			<br><br><br><br>
		</div>
	</div>
</section>