<section class="content"> <!-- Main content -->
	<?php $u=null;
    if(isset($_SESSION["user_id"]) &&$_SESSION["user_id"]!=""):
    $u = UserData::getById($_SESSION["user_id"]);
  	$currency = ConfigurationData::getByPreffix("currency")->val; ?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-apple"></i> Lista de Productos</h2>
			<?php if($u->is_admin==1): ?><a href='index.php?view=product_new' class='btn btn-primary'><i class='fa fa-apple'></i> Nuevo Producto</a><?php endif; ?>
			<br>
			<div class="card">
				<div class="card-header">PRODUCTOS</div>
				<div class="card-body">
					<?php $page = 1;
					if(isset($_GET["page"])){
						$page=$_GET["page"];
					}
					$limit=10;
					if(isset($_GET["limit"]) && $_GET["limit"]!="" && $_GET["limit"]!=$limit){
						$limit=$_GET["limit"];
					}
					$products = ProductData::getAll();
					if(count($products)>0){
					if($page==1){
						$curr_products = ProductData::getAllByPage($products[0]->id,$limit);
					}else{
						$curr_products = ProductData::getAllByPage($products[($page-1)*$limit]->id,$limit);
					}
					$npaginas = floor(count($products)/$limit);
					 $spaginas = count($products)%$limit;
					if($spaginas>0){
						$npaginas++;
					} ?>
					<h3>Pagina <?php echo $page." de ".$npaginas; ?></h3>
					<div class="btn-group pull-right">
						<?php $px=$page-1;
						if($px>0): ?>
						<a class="btn btn-sm btn-primary" href="<?php echo "index.php?view=products&limit=$limit&page=".($px); ?>"><i class="glyphicon glyphicon-chevron-left"></i> Atras </a>
						<?php endif; ?>
						<?php $px=$page+1;
						if($px<=$npaginas): ?>
						<a class="btn btn-sm btn-primary" href="<?php echo "index.php?view=products&limit=$limit&page=".($px); ?>">Adelante <i class="glyphicon glyphicon-chevron-right"></i></a>
						<?php endif; ?>
					</div>
					<div class="clearfix"></div>
					<br>
					<div class="box">
			  			<div class="box-body no-padding">
			  				<div class="box-body">
				  				<div class="box-body table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
											<th style="text-align: center; width: 30px;">Codigo</th>
											<th style="text-align: center;">Foto</th>
											<th style="text-align: center;">Nombre</th>
											<th style="text-align: center;">Compra&nbsp;<?php echo $currency; ?></th>
											<th style="text-align: center;">Venta&nbsp;<?php echo $currency; ?></th>
											<th style="text-align: center;">Categoría</th>
											<th style="text-align: center;">Minima</th>
											<th style="text-align: center;">Activo</th>
											<?php if($u->is_admin==1): ?><th style="text-align: center; width: 150px;">Acción</th><?php endif; ?>
										</thead>
										<?php foreach($curr_products as $product):?>
										<tr>
											<td style="text-align: right;"><?php echo $product->barcode; ?></td>
						                  	<td style="text-align: center;"><?php if($product->image!=""){ ?>
						                    	<img src="storage/products/<?php echo $product->image;?>" style="width:50px; height: 50px;" >
						                    <?php }else{ ?>
						                    <img src="storage/products/default.jpg" style="width:50px; height: 50px;" >
						                    <?php } ?></td>
											<td><?php echo $product->name; ?></td>
											<td style="text-align: right;"><b><?php echo number_format($product->price_in,2,'.',','); ?></b></td>
											<td style="text-align: right;"><b><?php echo number_format($product->price_out,2,'.',','); ?></b></td>
											<td><?php if($product->category_id!=null){echo $product->getCategory()->name;}else{ echo "<center>----</center>"; }  ?></td>
											<td><?php echo $product->inventary_min; ?></td>
											<td><?php if($product->is_active): ?><i class="fa fa-check"></i><?php endif;?></td>
											<?php if($u->is_admin==1): ?><td style="text-align: center;">
												<a href="index.php?view=product_edit&id=<?php echo $product->id; ?>" class="btn btn-xs btn-warning" ><i class="fa fa-pencil" ></i> Editar</a>
												<a href="index.php?view=delproduct&id=<?php echo $product->id; ?>" class="btn btn-xs btn-danger" onclick="return confirm('¿Está seguro de eliminar?')" ><i class="fa fa-trash" ></i> Eliminar</a>
											</td><?php endif; ?>
										</tr>
										<?php endforeach;?>
									</table>
								</div>
							</div>
						</div>
					<div class="btn-group pull-right">
						<?php for($i=0;$i<$npaginas;$i++){
							echo "<a href='index.php?view=products&limit=$limit&page=".($i+1)."' class='btn btn-primary btn-sm'>".($i+1)."</a> ";
						} ?>
					</div>
					<form class="form-inline">
						<label for="limit">Limite</label>
						<input type="hidden" name="view" value="products">
						<input type="number" value=<?php echo $limit?> name="limit" style="width:60px;" class="form-control">
					</form>
					<div class="clearfix"></div>
					<?php }else{ ?>
					<div class="jumbotron">
						<h2>No hay productos</h2>
						<p>No se han agregado productos a la base de datos, puedes agregar uno dando click en el boton <b>"Agregar Producto"</b>.</p>
					</div><?php } ?>
				</div>
			</div>
			<br><br><br><br><br><br><br><br><br><br>
		</div>
	</div>
	<?php endif; ?>
</div>