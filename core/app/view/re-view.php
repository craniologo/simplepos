<section class="content">
	<?php $currency = ConfigurationData::getByPreffix("currency")->val; ?>
	<div class="row">
		<div class="col-md-12">
		<h2><i class="fa fa-refresh"></i> Reabastecer Inventario</h2>
		<p><b>Buscar producto nombre o por codigo de barras:</b></p>
			<form>
			<div class="row">
				<div class="col-md-6">
					<input type="hidden" name="view" value="re">
					<input type="text" name="product" class="form-control">
				</div>
				<div class="col-md-1">
				<button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-search"></i> Buscar</button>
				</div>
			</div>
			</form>
		</div>
		<?php if(isset($_GET["product"])):?>
		<?php $products = ProductData::getLike($_GET["product"]);
		if(count($products)>0){ ?>
		<div class="col-md-12">
			<h3>Resultados de la Busqueda</h3>
			<div class="box">
	  			<div class="box-body no-padding">
	  				<div class="box-body">
		  				<div class="box-body table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<th style="text-align: center; width: 80px;">Codigo</th>
									<th style="text-align: center;">Nombre</th>
									<th style="text-align: center;">Unidad</th>
									<th style="text-align: center;">Precio&nbsp;<?php echo $currency; ?></th>
									<th style="text-align: center;">Stock</th>
									<th style="text-align: center;">Cantidad</th>
									<th style="text-align: center;">Bono</th>
									<th style="text-align: center; width:100px;">Acción</th>
								</thead>
								<?php
								$products_in_cero=0;
								foreach($products as $product):
								$q= OperationData::getQYesF($product->id); ?>
							<form method="post" action="index.php?view=addtore">
								<tr class="<?php if($q<=$product->inventary_min){ echo "danger"; }?>">
									<td style="text-align: center;"><?php echo $product->barcode; ?></td>
									<td><?php echo $product->name; ?></td>
									<td style="text-align: right;"><?php echo $product->unit; ?></td>
									<td style="text-align: right;"><b><?php echo number_format($product->price_in,2,".",","); ?></b></td>
									<td style="text-align: right;"><?php echo $q; ?></td>
									<td style="text-align: center; width: 80px;"><input type="hidden" name="product_id" value="<?php echo $product->id; ?>"><input type="" class="form-control" required name="q" placeholder="Cant..."></td>
									<td style="text-align: center; width: 80px;"><input type="" class="form-control" required name="bono" placeholder="Bon..."></td>
									<td style="width:100px;"><button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-refresh"></i> Agregar</button></td>
								</tr>
								</form>
								<?php endforeach;?>
							</table>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
		<br><hr>
		<hr><br>
		<?php else: ?>
		<?php endif; ?>
		<?php if(isset($_SESSION["errors"])):?>
		<h2>Errores</h2>
		<p></p>
		<table class="table table-bordered table-hover">
			<tr class="danger">
				<th>Codigo</th>
				<th>Producto</th>
				<th>Mensaje</th>
			</tr>
			<?php foreach ($_SESSION["errors"]  as $error):
			$product = ProductData::getById($error["product_id"]); ?>
			<tr class="danger">
				<td><?php echo $product->id; ?></td>
				<td><?php echo $product->name; ?></td>
				<td><b><?php echo $error["message"]; ?></b></td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php unset($_SESSION["errors"]); endif; ?>

		<!--- Carrito de compras :) -->
		<?php if(isset($_SESSION["reabastecer"])):
		$total = 0; ?>
		<div class="col-md-12">
			<h2>Lista de Reabastecimiento</h2>
			<div class="box">
	  			<div class="box-body no-padding">
	  				<div class="box-body">
						<div class="box-body table-responsive">
							<table class="table table-bordered table-hover" style="border: 1px solid;">
								<thead>
									<th style="text-align: center; width: 30px;">N°</th>
									<th style="text-align: center; width:80px;">Código</th>
									<th style="text-align: center; width:30px;">Cantidad</th>
									<th style="text-align: center; width:30px;">Unidad</th>
									<th>Producto</th>
									<th style="text-align: center; width:30px;">Costo&nbsp;<?php echo $currency; ?></th>
									<th style="text-align: center; width:60px;">Bono</th>
									<th style="text-align: center; width:30px;">Total&nbsp;<?php echo $currency; ?></th>
									<th style="text-align: center; width:30px;">Acción</th>
								</thead>
								<?php for($number=0; $number<1; $number++); //variable incremental
								foreach($_SESSION["reabastecer"] as $p):
								$product = ProductData::getById($p["product_id"]);
								?>
								<tr>
									<td style="text-align: center;"><?php echo $number; ?></td> <?php $number++; ?><!--var incremen-->
									<td style="text-align: center;"><?php echo $product->barcode; ?></td>
									<td style="text-align: center;"><?php $cant=$p["q"]-$p["bono"]; echo $cant; ?></td>
									<td style="text-align: center;"><?php echo $product->unit; ?></td>
									<td><?php echo $product->name; ?></td>
									<td style="text-align: right;"><b><?php echo number_format($product->price_in,2,".",","); ?></b></td>
									<td style="text-align: center;"><?php echo $p["bono"]; ?></td>
									<td><b><?php  $pt1 = $product->price_in*$p["bono"]; 
										$pt = $product->price_in*$p["q"]; 
										$pt2=$pt-$pt1;
										$total +=$pt2; echo number_format($pt2,2,".",","); ?></b></td>
									<td style="text-align: center;"><a href="index.php?action=re_clear&product_id=<?php echo $product->id; ?>" onclick="return confirm('¿Está seguro de cancelar?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></a></td>
								</tr>
								<?php endforeach; ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<form method="post" class="form-horizontal" id="re_process" action="index.php?action=re_process">
				<h2>Resumen</h2>
				<div class="col-md-6">
					<div class="form-group">
					    <label for="inputEmail1" class="col-lg-2 control-label">Proveedor</label>
					    <div class="col-lg-10">
						    <?php $clients = PersonData::getProviders(); ?>
						    <select name="client_id" class="form-control">
							    <!--<option value="">-- NINGUNO --</option>-->
							    <?php foreach($clients as $client):?>
							    	<option value="<?php echo $client->id;?>"><?php echo $client->name." ".$client->lastname;?></option>
							    <?php endforeach;?>
					    	</select>
					    </div>
					</div>
					<div class="form-group">
					    <label for="inputEmail1" class="col-lg-2 control-label">Efectivo</label>
					    <div class="col-lg-10">
					      <input type="text" name="money" required class="form-control" id="money" placeholder="Efectivo">
					    </div>
					</div>
				</div>
			    <div class="col-md-6">
					<div class="row">
						<div class="col-md-6 col-md-offset-6">
				    		<div class="box">
								<table class="table table-bordered">
									<tr>
										<td><p>Subtotal</p></td>
										<td><p><b><?php echo $currency.' '.number_format($total*.82,2,".",","); ?></b></p></td>
									</tr>
									<tr>
										<td><p>IGV</p></td>
										<td><p><b><?php echo $currency.' '.number_format($total*.18,2,".",","); ?></b></p></td>
									</tr>
									<tr>
										<td><p>Total</p></td>
										<td><p><b><?php echo $currency.' '.number_format($total,1,".",","); ?></b></p></td>
									</tr>
								</table>
							</div>
				          	<input name="is_oficial" type="hidden" value="1">
						</div>
						<div class="form-group">
						    <div class="col-lg-offset-2 col-lg-10">
						      <div class="checkbox">
						        <label>
						        <input type="hidden" name="money1" value="<?php echo $total;?>">
								
						        <button class="btn btn-primary"><i class="fa fa-refresh"></i> Procesar Reabastecimiento</button>
						        <a href="index.php?action=re_clear" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
						        </label>
						      </div>
						    </div>
						</div>
					</div>
				</div>
			</form>
			<script>
				$("#re_process").submit(function(e){
					money = $("#money").val();
					if(money<<?php echo $total;?>){
						alert("No se puede efectuar la operacion");
						e.preventDefault();
					}else{
						go = confirm("Cambio: <?php echo $currency; ?> "+(money-<?php echo $total;?>));
						if(go){}
							else{e.preventDefault();}
					}
				});
			</script>
		</div>
		<br><br><br><br><br>
		<?php endif; ?>
	</div>
</section>