<section class="content">
	<div class="row">
		<div class="col-md-12">
			<h2><i class="glyphicon glyphicon-stats"></i> Inventario de Productos</h2>
			<ol class="breadcrumb">
			   <li><a href="index.php?view=home"><i class="fa fa-home"></i> Inicio</a></li><li><i class="fa fa-cubes"></i> Inventario</li><li class="active"><i class="fa fa-area-chart"></i> Stock</li>
			</ol>
			<div class="clearfix"></div>
			<?php $curr_products = ProductData::getAll(); ?>
		</div>
	</div>
	<?php if(count($curr_products)>0){ ;?>
	<div class="box">
		<div class="box-body no-padding">
			<div class="box-body">
				<div class="box-body table-responsive">
					<table class="table table-bordered datatable table-hover">
						<thead>
							<th style="text-align: center;width: 30px;">N°</th>
							<th style="text-align: center;">Codigo</th>
							<th style="text-align: center;">Nombre</th>
							<th style="text-align: center;">Disponible</th>
							<th style="text-align: center; width: 200px;">Detalles</th>
						</thead>
						<?php for($number=0; $number<1; $number++); //variable incremental
						foreach($curr_products as $product):
						$q=OperationData::getQYesF($product->id); ?>
						<tr class="<?php if($q<=$product->inventary_min/2){ echo "danger";}else if($q<=$product->inventary_min){ echo "warning";}?>">
							<td style="text-align: center;"><?php echo $number; ?></td> <?php $number++; ?><!--var incremen-->
							<td style="text-align: right;"><?php echo $product->barcode; ?></td>
							<td><?php echo $product->name; ?></td>
							<td style="text-align: right;"><?php echo $q; ?></td>
							<td style="text-align: center;">
								<!--<a href="index.php?view=input&product_id=<?php echo $product->id; ?>" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-circle-arrow-up"></i> Alta</a>-->
								<a href="index.php?view=inventaryadd&product_id=<?php echo $product->id; ?>" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i> Agregar</a>
								<a href="index.php?view=inventarysub&product_id=<?php echo $product->id; ?>" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-minus"></i> Quitar</a>
								<a href="index.php?view=history&product_id=<?php echo $product->id; ?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-time"></i> Historial</a>
							</td>
						</tr>
						<?php endforeach;?>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php
	}else{
		echo "<p class='alert alert-danger'>Aún no hay productos, ¡agrégalos ya!</p>";
	} ?>
</section>