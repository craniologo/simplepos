<section class="content">
<?php $currency = ConfigurationData::getByPreffix("currency")->val;
if(isset($_GET["product"]) && $_GET["product"]!=""):?>
<?php $products = ProductData::getLike($_GET["product"]);
if(count($products)>0){ ?>
<h3>Resultados de la Busqueda</h3>
<div class="box">
	<div class="box-body table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<th style="text-align: center; width:30px;">N°</th>
				<th style="text-align: center;">Código</th>
				<th style="text-align: center;">Nombre</th>
				<th style="text-align: center;">uds/kg</th>
				<th style="text-align: center;">Precio&nbsp;<?php echo $currency; ?></th>
				<th style="text-align: center;">Stock&nbsp;uds/kg</th>
				<th style="text-align: center; width: 100px;">Agregar</th>
			</thead>
			<?php $products_in_cero=0;
			for($number=0; $number<1; $number++); //variable incremental
			foreach($products as $product):
			$q= OperationData::getQYesF($product->id); ?>
			<?php 
			if($q>0):?>
			<tr class="<?php if($q<=$product->inventary_min){ echo "danger"; }?>">
				<td style="text-align: center;"><?php echo $number; ?></td> <?php $number++; ?><!--var incremen-->
				<td style="text-align: right;"><?php echo $product->barcode; ?></td>
				<td><?php echo $product->name; ?></td>
				<td style="text-align: right;"><?php echo $product->unit; ?></td>
				<td style="text-align: right;"><b><?php echo number_format($product->price_out,2,".",","); ?></b></td>
				<td style="text-align: right;"><?php echo $q; ?></td>
				<td style="text-align: center;"><form method="post" action="index.php?view=addtocart"><input type="hidden" name="product_id" value="<?php echo $product->id; ?>"><div class="input-group" style="width: 90px;"><input type="" class="form-control" required name="q" placeholder="Cantidad ..." size="4"><span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i></button></span></div>
				</form></td>
			</tr>
			<?php else:$products_in_cero++; ?>
			<?php  endif; ?>
			<?php endforeach;?>
		</table>
	</div>
</div>
<?php if($products_in_cero>0){ echo "<p class='alert alert-warning'>Se omitieron <b>$products_in_cero productos</b> que no tienen existencias en el inventario. <a href='index.php?view=inventary'>Ir al Inventario</a></p>"; }?>
<?php
	}else{
	echo "<br><p class='alert alert-danger'>No se encontro el producto</p>";
} ?>
<hr><br>
<?php else: ?>
<?php endif; ?>
</section>