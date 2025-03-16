<section class="content">
	<div class="row">
		<div class="col-md-12">
			<h2><i class='fa fa-refresh'></i> Lista de Reabastecimientos</h2>
			<ol class="breadcrumb">
			   <li><a href="index.php?view=home"><i class="fa fa-home"></i> Inicio</a></li><li><i class="fa fa-cubes"></i> Inventario</li><li class="active"><i class="fa fa-th-list"></i> Reabastecimientos</li>
			</ol>
			<a href="index.php?view=re" class="btn btn-primary"><i class="fa fa-refresh"></i> Nuevo Reabastecimiento</a>
			<div class="clearfix"></div><br>
			<?php $currency = ConfigurationData::getByPreffix("currency")->val;
			$products = SellData::getRes();
			if(count($products)>0){ ?>
			<div class="box">
	  			<div class="box-body no-padding">
	  				<div class="box-body">
		  				<div class="box-body table-responsive">
							<table class="table table-bordered datatable table-hover">
								<thead>
									<th style="text-align: center; width: 30px;">N°</th>
									<th style="text-align: center;">Operación</th>
									<th style="text-align: center;">Cantidad</th>
									<th style="text-align: center;">Total&nbsp;<?php echo $currency; ?></th>
									<th style="text-align: center;">Fecha</th>
									<th style="text-align: center;">Acción</th>
								</thead>
								<?php for($number=0; $number<1; $number++); //variable incremental
								foreach($products as $sell):?>
								<tr>
									<td style="text-align: center;"><?php echo $number; ?></td> <?php $number++; ?><!--var incremen-->
									<td style="text-align: right;"><a href="index.php?view=re_one&id=<?php echo $sell->id; ?>" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i><?php echo "# ".$sell->ref_id; ?></a></td>
									<td style="text-align: right;"><?php $operations = OperationData::getAllProductsBySellId($sell->id); echo count($operations); ?></td>
									<td style="text-align: right;"><?php $total=0;
									foreach($operations as $operation){
									$product  = $operation->getProduct();
									$total += $operation->q*$product->price_in; } echo "<b>".number_format($total,2,".",",")."</b>"; ?></td>
									<td style="text-align: right;"><?php echo $sell->created_at; ?></td>
									<td style="text-align: center; width: 80px;">
										<a href="index.php?action=re_del&id=<?php echo $sell->id; ?>" onclick="return confirm('¿Está seguro de eliminar?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Eliminar</a></td>
								</tr>
								<?php endforeach; ?>
							</table>
						</div>
					</div>
				</div>
			<?php }else{ ?>
			<div class="jumbotron"><h2>No hay datos</h2><p>No se ha realizado ninguna operacion.</p></div>
			<?php } ?>
		</div>
	</div>
</section>