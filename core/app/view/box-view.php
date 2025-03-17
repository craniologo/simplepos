<section class="content">
	<?php $u=null;
    if(isset($_SESSION["user_id"]) &&$_SESSION["user_id"]!=""):
    $u = UserData::getById($_SESSION["user_id"]);
  	$currency = ConfigurationData::getByPreffix("currency")->val; ?>
	<div class="row">
		<div class="col-md-12">
			<div class="btn-group pull-right">
			<a href="./index.php?view=box_history" class="btn btn-primary"><i class="fa fa-clock-o"></i> Historial</a>
			<a href="./index.php?action=box_process" class="btn btn-success">Procesar Ventas <i class="fa fa-arrow-right"></i></a>
			</div>
			<h2><i class='fa fa-archive'></i> Caja</h2>
			<div class="form-group">
			<div class="clearfix"></div>
			<?php $products = SellData::getSellsUnBoxed();
			if(count($products)>0){
			$total_total = 0; ?>
			<br>
			<div class="box">
	  			<div class="box-body no-padding">
	  				<div class="box-body">
						<div class="box-body table-responsive">
							<table class="table table-bordered datatable table-hover	">
								<thead>
									<th style="text-align: center; width: 30px;">N°</th>
									<th style="text-align: center; width: 30px;">Ventas</th>
									<th style="text-align: center;">Productos</th>
									<th style="text-align: center;">Total&nbsp;<?php echo $currency; ?></th>
									<th style="text-align: center;">Fecha</th>
									<th style="text-align: center;">Usuario</th>
								</thead>
								<?php for($number=0; $number<1; $number++); //variable incremental
								foreach($products as $sell): 
								$user = $sell->getUser(); ?>
								<tr>
									<td style="text-align: center; width:30px;"><?php echo $number; ?></td> <?php $number++; ?><!--var incremen-->
									<td style="text-align: right;"><?php echo "#".$sell->ref_id; ?></td>
									<td style="text-align: right;"><?php $operations = OperationData::getAllProductsBySellId($sell->id);
										echo count($operations); ?></td>
									<td style="text-align: right;"><b><?php $total_total += $sell->total;
										echo number_format($sell->total,2,".",",");
										?></b></td>
									<td style="text-align: right;"><?php echo $sell->created_at; ?></td>
									<td><?php echo $user->name.' '.$user->lastname; ?></td>
								</tr>
								<?php endforeach; ?>
							</table>
							<h4>Total: <?php echo $currency." ".number_format($total_total,2,".",","); ?></h4>
						</div>
					</div>
				</div>
			</div>
			<?php
			}else { ?>
			<div class="jumbotron">
				<h2>No hay ventas</h2>
				<p>No se ha realizado ninguna venta.</p>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php endif; ?>
</section>