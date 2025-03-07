<section class="content">
	<div class="row">
		<div class="col-md-12"><a href="index.php?view=collection" class="btn btn-default">Regresar</a>
			<?php $clients = PersonData::getById($_GET["id"]); ?>
			<h2><i class='glyphicon glyphicon-shopping-cart'></i> Total vendido a <?php echo $clients->name." ".$clients->lastname." deve S/ ".number_format($clients->must,2,".",","); ?></h2>
			<div class="clearfix"></div>
			<?php $products = SellData::getSellsClientId($_GET["id"]);
			if(count($products)>0){ ?>
			<br>
			<div class="box">
	  			<div class="box-body no-padding">
	  				<div class="box-body">
						<div class="box-body table-responsive">
							<table class="table table-bordered datatable table-hover	">
								<thead>
									<th style="text-align: center; width: 30px;">N°</th>
									<th style="text-align: center;">Ver</th>
									<th style="text-align: center;">Cant. prod.</th>
									<th style="text-align: center;">Total</th>
									<th style="text-align: center;">Fecha</th>
								</thead>
								<?php for($number=0; $number<1; $number++); //variable incremental
								foreach($products as $sell):?>
								<tr>
									<td style="text-align: center;"><?php echo $number; ?></td> <?php $number++; ?><!--var incremen-->
									<td style="width:30px;"><a href="index.php?view=onesell&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i></a></td>
									<td style="text-align: center;"><?php $operations = OperationData::getAllProductsBySellId($sell->id);
										echo count($operations); ?></td>
									<td style="text-align: right;"><?php $total= $sell->total;
										echo "<b>S/. ".number_format($total,2,".",",")."</b>"; ?></td>
									<td><?php echo $sell->created_at; ?></td>
								</tr>
								<?php endforeach; ?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>

			<?php
			}else{
			?>
			<div class="jumbotron">
				<h2>No hay ventas</h2>
				<p>No se ha realizado ninguna venta.</p>
			</div>
			<?php
			} ?>
			<br><br><br><br><br><br><br><br><br><br>
		</div>
	</div>
</section>