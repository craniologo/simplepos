<section class="content">
	<?php $currency = ConfigurationData::getByPreffix("currency")->val; ?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class='fa fa-archive'></i> Historial de Cortes de Caja</h2>
			<ol class="breadcrumb">
			   <li><a href="index.php?view=home"><i class="fa fa-home"></i> Inicio</a></li><li><i class="fa fa-money"></i> Finanzas</li><li class="active"><i class="fa fa-archive"></i> Corte/Caja</li>
			</ol>
			<div class="clearfix"></div>
			<?php $boxes = BoxData::getAll();
			$products = SellData::getSellsUnBoxed();
			if(count($boxes)>0){
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
								foreach($boxes as $box):
								$sells = SellData::getByBoxId($box->id); ?>
								<tr>
									<td style="text-align: center;"><?php echo $number; ?></td> <?php $number++; ?><!--var incremen-->
									<td style="text-align: center;"><a href="./index.php?view=b&id=<?php echo $box->id; ?>" class="btn btn-primary btn-xs"><i class="fa fa-arrow-right"></i></a></td>
									<td style="text-align: right;"><b><?php $total=0;
										foreach($sells as $sell){
										$operations = OperationData::getAllProductsBySellId($sell->id);
											foreach($operations as $operation){
												$product  = $operation->getProduct();
												$total += $operation->q*$product->price_out;
											}
										}
									$total_total += $total;
									echo number_format($total,2,".",","); ?></b></td>
									<td style="text-align: right;"><?php echo $box->created_at; ?></td>
								</tr>
							<?php endforeach; ?>
							</table>
							<h4>Total: <?php echo $currency." ".number_format($total_total,2,".",","); ?></h4>
						</div>
					</div>
				</div>
			</div>
			<?php }else { ?>
			<div class="jumbotron">
				<h2>No hay ventas</h2>
				<p>No se ha realizado ninguna venta.</p>
			</div>
			<?php } ?>
		</div>
	</div>
</section>