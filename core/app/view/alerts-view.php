<section class="content">
	<div class="row">
		<div class="col-md-12">
			<h2><i class="glyphicon glyphicon-alert"></i> Alertas de Stock<h2>
			<?php
			$found=false;
			$products = ProductData::getAll();
			foreach($products as $product){
			$q=OperationData::getQYesF($product->id);	
				if($q<$product->inventary_min){
					$found=true;
					break;
					} } ?>
				<?php if($found):?>
			<?php endif;?>
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
							<th style="text-align: center; width: 30px;">N°</th>
							<th style="text-align: center;">Código</th>
							<th style="text-align: center;">Producto</th>
							<th style="text-align: center;">Stock</th>
							<th style="text-align: center;">Alerta</th>
						</thead>
						<?php for ($number=0; $number<1; $number++);
						foreach($curr_products as $product):
						$q=OperationData::getQYesF($product->id); ?>
						<?php if($q<$product->inventary_min):?>
						<tr class="<?php if($q==0){ echo "danger"; }else if($q<=$product->inventary_min/2){ echo "danger"; } else if($q<=$product->inventary_min){ echo "warning"; } ?>">
							<td style="text-align: center;"><?php echo $number; ?></td><?php $number++;?>
							<td style="text-align: right;"><?php echo $product->barcode; ?></td>
							<td><?php echo $product->name; ?></td>
							<td style="text-align: right;"><?php echo $q; ?></td>
							<td><?php if($q==0){ echo "<span class='label label-danger'>No hay existencias.</span>";}else if($q<=$product->inventary_min/2){ echo "<span class='label label-danger'>Quedan muy pocas existencias.</span>";} else if($q<=$product->inventary_min){ echo "<span class='label label-warning'>Quedan pocas existencias.</span>";} ?></td>
						</tr>
						<?php endif;?>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
		<div class="btn-group pull-right">
			<?php }else{ ?>
			<div class="jumbotron">
				<h2>No hay alertas.</h2>
				<p>Por el momento no hay alertas de inventario, estas se muestran cuando el inventario ha alcanzado el nivel minimo.</p>
			</div>
			<?php } ?>
		</div>
	</div>
</section>