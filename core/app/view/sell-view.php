<section class="content">
	<?php $currency = ConfigurationData::getByPreffix("currency")->val;
		$imp_val = ConfigurationData::getByPreffix("imp_val")->val;
		$imp_name = ConfigurationData::getByPreffix("imp_name")->val; ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-shopping-cart"></i> Vender</h2>
			<p><b>Buscar producto por nombre o por codigo:</b></p>
			<form id="searchp">
			<div class="row">
				<div class="col-md-6">
					<input type="hidden" name="view" value="sell">
					<input type="text"  name="product" class="form-control">
				</div>
				<div class="col-md-1">
				<button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-search"></i> Buscar</button>
				</div>
			</div>
			</form>
		</div>
		<div id="show_search_results"></div>
		<script>
		//jQuery.noConflict();
		$(document).ready(function(){
			$("#searchp").on("submit",function(e){
				e.preventDefault();

				$.get("./?action=searchproduct",$("#searchp").serialize(),function(data){
					$("#show_search_results").html(data);
				});
				$("#product_code").val("");

			});
			});

		$(document).ready(function(){
		    $("#product_code").keydown(function(e){
		        if(e.which==17 || e.which==74){
		            e.preventDefault();
		        }else{
		            console.log(e.which);
		        }
		    })
		});
		</script>

		<?php if(isset($_SESSION["errors"])):?>
		<h2>Errores</h2>
		<p></p>
		<div class="box-body table-responsive">
			<table class="table table-bordered table-hover">
				<tr class="danger">
					<th style="text-align: center; width: 80px;">Codigo</th>
					<th style="text-align: center;">Producto</th>
					<th style="text-align: center;">Mensaje</th>
				</tr>
				<?php foreach ($_SESSION["errors"]  as $error):
				$product = ProductData::getById($error["product_id"]);
				?>
				<tr class="danger">
					<td style="text-align: center;"><?php echo $product->barcode; ?></td>
					<td><?php echo $product->name; ?></td>
					<td><b><?php echo $error["message"]; ?></b></td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
		<?php
		unset($_SESSION["errors"]);
		 endif; ?>

	<section class="content">
		<!--- Carrito de compras :) -->
		<?php if(isset($_SESSION["cart"])):
		$total = 0; ?>
		<h2>Lista de venta</h2>
		<div class="box">
			<div class="box-body table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<th style="text-align: center; width: 30px;">N°</th>
						<th style="text-align: center;">Cant.</th>
						<th style="text-align: center;">Producto</th>
						<th style="text-align: center;">Precio&nbsp;<?php echo $currency; ?></th>
						<th style="text-align: center;">Total&nbsp;<?php echo $currency; ?></th>
						<th style="text-align: center; width: 30px;">Acción</th>
					</thead>
					<?php for($number=0; $number<1; $number++); //variable incremental
					foreach($_SESSION["cart"] as $p):
					$product = ProductData::getById($p["product_id"]); ?>
					<tr >
						<td style="text-align: center;"><?php echo $number; ?></td> <?php $number++; ?><!--var incremen-->
						<td style="text-align: center;"><?php echo $p["q"]; ?></td>
						<td><?php echo $product->name; ?></td>
						<td style="text-align: right;"><b><?php echo number_format($product->price_out,2,".",","); ?></b></td>
						<td style="text-align: right;"><b><?php  $pt = $product->price_out*$p["q"]; $total +=$pt; echo number_format($pt,2,".",","); ?></b></td>
						<td style="text-align: center;"><a href="index.php?action=cart_clear&product_id=<?php echo $product->id; ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></a></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</section>
		<form method="post" class="form-horizontal" id="sell_process" action="index.php?action=sell_process" name="sell_process">
			<div class="form-group col-md-12">
				<table class="table-bordered">
					<tr>
						<td style="text-align: center; width: 130px;"><h3>Resumen</h3></td>
						<td style="text-align: center; width: 180px;"><h3>Total: <?php echo $currency.' '.number_format($total,1)."0"; ?></h3></td>
					</tr>
				</table>
			</div>
			<div class="col-xs-8 col-md-6">
				<div class="form-group">
			    <label for="inputEmail1" class="col-lg-3 control-label">Buscar Cliente</label>
			    <div class="col-lg-4">
			    	<?php $clients = PersonData::getClients(); ?>
					<select name="client_id" class="form-control">
				    <!--<option value="">-- NINGUNO --</option>-->
				    <?php foreach($clients as $client):?>
			    	<option value="<?php echo $client->id;?>"><?php echo $client->name." ".$client->lastname;?></option>
			    	<?php endforeach;?>
			    	</select>
					</div>
			    <div class="col-lg-2">
			      	<a href="#client_new" class="btn btn-primary" data-toggle="modal"><i class='fa fa-smile-o'></i> Agregar</a>
			    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail1" class="col-lg-3 control-label">Descuento</label>
				    <div class="col-lg-6">
				      <input type="text" name="discount" class="form-control" value="0" id="discount" onkeyup="Restar()">
				    </div>
				</div>
				<div class="form-group">
				    <label for="inputEmail1" class="col-lg-3 control-label">Efectivo</label>
				    <div class="col-lg-6">
				      <input type="text" name="cash" required class="form-control" id="cash" onkeyup="Restar()" value="<?php echo $total; ?>">
				    </div>
				</div>
					<input type="hidden" name="total" value="<?php echo $total; ?>" class="form-control" placeholder="Total" onkeyup="Restar()">
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="box">
					<table class="table table-bordered">
						<tr>
							<td><p>Subtotal&nbsp;(<?php echo $currency; ?>):</td>
							<td><p><b><input type="text" name="subtotal" readonly="" style="border: transparent; font-weight: bold;"></b></td>
						</tr>
						<tr>
							<td><p><?php echo $imp_name.' ('.$imp_val.'%)('.$currency; ?>):</td>
							<td><p><b><input type="text" name="igv" readonly="" style="border: transparent; font-weight: bold;"></b></td>
						</tr>
							<input type="hidden" name="saldo" readonly="" style="border: transparent; font-weight: bold;">
						<tr>
							<td><p>Total&nbsp;(<?php echo $currency; ?>):</td>
							<td><p><b><input type="text" name="t_total" readonly="" style="border: transparent; font-weight: bold;"></b></td>
						</tr>
					</table>
				</div>
				<div class="form-group">
				    <div class="col-lg-offset-2 col-lg-10">
				      <div class="checkbox">
				        <label>
				          <input name="is_oficial" type="hidden" value="1">
				        </label>
				      </div>
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-lg-offset-2 col-lg-10">
				      <div class="checkbox">
				        <label>
								<a href="index.php?action=cart_clear" class="btn btn-danger" onclick="return confirm('¿Está seguro de cancelar?')"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
				        <button class="btn btn-primary"><i class="glyphicon glyphicon-usd"></i><i class="glyphicon glyphicon-usd"></i> Confirmar Venta</button>
				        </label>
				      </div>
				    </div>
				</div>
			</div>
		</form>
		<script>

			$("#sell_process").submit(function(e){
				discount = $("#discount").val();
				cash = $("#cash").val();

				if(cash<(<?php echo $total;?>-discount)){
					alert("Ingrese monto TOTAL DE VENTA o marque VENTA A CRÉDITO");
					e.preventDefault();
				}else{
					if(discount==""){ discount=0;}
					go = confirm("Cambio: <?php echo $currency; ?> "+(cash-(<?php echo $total;?>-discount ) ) );
					if(go){}
					else{e.preventDefault();}
				}
			});
		</script>	
		<?php
			$f = $imp_val*0.01;
			$e = 1-$f;
		 	$d = 1+ $f; ?>
		<script type="text/javascript">
			function Restar() {
				var d=<?php echo $d; ?>, e=<?php echo $e; ?>, f=<?php echo $f; ?>;
				tot=document.sell_process.total.value;
				disc=document.sell_process.discount.value;
				t_disc=parseFloat(tot)-parseFloat(disc);
				document.sell_process.t_total.value=t_disc.toFixed(2);

				ig=parseFloat(t_disc)*parseFloat(f);
				document.sell_process.igv.value=ig.toFixed(2);

				s_tot=parseFloat(t_disc)*parseFloat(e);
				document.sell_process.subtotal.value=s_tot.toFixed(2);
			}
			window.onload = Restar;
		</script>
		<?php endif; ?>
	</div>
</section>

<div class="modal fade" id="client_new"><!--Inicio de ventana modal 2-->
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <center><h4 class="modal-title">Ingrese el Nuevo Cliente</h4></center>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="post" id="addproduct" action="index.php?action=client_add_sell" role="form">
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
          <div class="col-md-9">
            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" required="">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Apellidos*</label>
          <div class="col-md-9">
            <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellidos">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">RUC/DNI*</label>
          <div class="col-md-9">
            <input type="text" name="ruc" required class="form-control" id="ruc" placeholder="RUC/DNI">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
          <div class="col-md-9">
            <input type="text" name="address" class="form-control" required id="address" placeholder="Direccion">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Coreo Electrónico*</label>
          <div class="col-md-9">
            <input type="email" name="email" class="form-control" id="email" placeholder="Coreo electrónico">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Telefono*</label>
          <div class="col-md-9">
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Número de teléfono">
          </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-9">
		        <p class="alert alert-info">* Campos obligatorios</p>
		    </div>
		</div>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-9">
            <button type="submit" class="btn btn-primary">Agregar Cliente</button>
          </div>
        </div>
      </form>
        </div>
      </div>
    </div>
</div><!--Fin de ventana modal 2-->