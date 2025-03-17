<section class="content"><!-- Main content -->
	<?php $u=null;
    if(isset($_SESSION["user_id"]) &&$_SESSION["user_id"]!=""):
    $u = UserData::getById($_SESSION["user_id"]);
    $products = ProductData::getAllByCategoryId($_GET["id"]);
	$currency = ConfigurationData::getByPreffix("currency")->val;
	if($u->is_admin==1){
		$return = 'categories';
	}else{
		$return = 'products';
	} ?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-apple"></i> Productos de la categoría <?php echo $cat = CategoryData::getById($_GET["id"])->name; ?></h2>
			<a href="index.php?view=<?php echo $return; ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
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
									<th style="text-align: center;">Nombre</th>
									<th style="text-align: center;">Compra&nbsp;<?php echo $currency; ?></th>
									<th style="text-align: center;">Venta&nbsp;<?php echo $currency; ?></th>
									<th style="text-align: center;">Minima</th>
									<th style="text-align: center;">Activo</th>
								</thead>
								<?php for ($number=0; $number<1; $number++);
								foreach($products as $product):?>
								<tr>
									<td style="text-align: center;"><?php echo $number; ?></td><?php $number++;?>
									<td style="text-align: right;"><?php echo $product->barcode; ?></td>
									<td><a title="<?php echo $product->description; ?>"><?php echo substr($product->name, 0, 50); ?></a></td>
									<td style="text-align: right;"><b><?php echo number_format($product->price_in,2,'.',','); ?></b></td>
									<td style="text-align: right;"><b><?php echo number_format($product->price_out,2,'.',','); ?></b></td>
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
	<?php endif; ?>
</section>