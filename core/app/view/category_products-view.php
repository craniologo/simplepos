<section class="content"><!-- Main content -->
	<?php $products = ProductData::getAllByCategoryId($_GET["id"]); ?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-apple"></i> Productos de la categoría <?php echo $cat = CategoryData::getById($_GET["id"])->name; ?></h2>
			<a href="index.php?view=categories" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
			<br><br>
			<?php if(count($products)>0){ ?>
			<div class="box box-primary">
				<div class="box-body no-padding">
			  		<div class="box-body">
			  			<div class="box-body table-responsive">
							<table class="table table-bordered datatable table-hover">
								<thead>
									<th style="text-align: center; width: 30px;">N°</th>
									<th style="text-align: center; width: 100px;">Codigo</th>
									<th style="text-align: center; width: 100px;">Imagen</th>
									<th style="text-align: center;">Nombre</th>
									<th style="text-align: center;">Compra</th>
									<th style="text-align: center;">Venta</th>
									<th style="text-align: center;">Minima</th>
									<th style="text-align: center;">Activo</th>
								</thead>
								<?php for ($number=0; $number<1; $number++);
								foreach($products as $product):?>
								<tr>
									<td style="text-align: center;"><?php echo $number; ?></td><?php $number++;?>
									<td style="text-align: right;"><?php echo $product->barcode; ?></td>
									<td><?php if($product->image!=""):?>
											<img src="storage/products/<?php echo $product->image;?>" style="width:64px;">
										<?php endif;?></td>
									<td><?php echo $product->name; ?></td>
									<td style="text-align: right;">S/ <?php echo number_format($product->price_in,2,'.',','); ?></td>
									<td style="text-align: right;">S/ <?php echo number_format($product->price_out,2,'.',','); ?></td>
									<td style="text-align: right;"><?php echo $product->inventary_min; ?></td>
									<td style="text-align: center;"><?php if($product->is_active): ?><i class="fa fa-check"></i><?php endif;?></td>
								</tr>
								<?php endforeach;?>
							</table>
						</div>
					</div>
			  	</div><!-- /.box-body -->
			</div><!-- /.box -->
			<?php }else{ ?>
			<div class="jumbotron">
				<h2>No hay productos</h2>
				<p>No se han agregado productos a esta categoría.</p>
			</div>
			<?php } ?>
			<br>
		</div>
	</div>
</section>