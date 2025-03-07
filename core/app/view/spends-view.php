<section class="content">
	<?php $u=null;
  if(isset($_SESSION["user_id"]) &&$_SESSION["user_id"]!=""):
  $u = UserData::getById($_SESSION["user_id"]);
	$currency = ConfigurationData::getByPreffix("currency")->val; ?>
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-coffee"></i> Lista de Gastos</h2>
			<a href='#spend_new' data-toggle='modal' class='btn btn-primary'><i class='fa fa-th-coffee'></i> Nuevo Gasto</a>
			<div class="clearfix"></div>
			<br>
			<?php if($u->is_admin==1){
				$spends = SpendData::getAllUnBoxed();
			}else{
				$spends = SpendData::getAllByUser($u->id);
			}
			$total = 0;
			if(count($spends)>0){ ?>
			<br><br>
			<div class="box">
			    <div class="box-body no-padding">
			        <div class="box-body table-responsive">
						<table class="table table-bordered datatable table-hover">
							<thead>
								<th style="text-align: center; width: 30px;">N°</th>
								<th style="text-align: center;">Concepto</th>
								<th style="text-align: center;">Monto&nbsp;<?php echo $currency; ?></th>
								<?php if($u->is_admin==1): ?><th style="text-align: center;">Usuario</th><?php endif; ?>
								<th style="text-align: center;">Fecha</th>
								<th style="text-align: center; width: 150px;">Acción</th>
							</thead>
							<?php for($number=0; $number<1; $number++); //variable incremental
							foreach($spends as $spend){
								$user = $spend->getUser(); ?>
							<tr>
								<td style="text-align: center;"><?php echo $number; ?></td> <?php $number++; ?><!--var incremen-->
								<td><?php echo $spend->name; ?></td>
								<td style="text-align: right;S"><b><?php echo number_format($spend->price,2,".",","); ?></b></td>
								<?php if ($u->is_admin==1): ?><td><?php echo $user->name." ".$user->lastname; ?></td><?php endif; ?>
								<td style="text-align: right;"><?php echo $spend->created_at; ?></td>
								<td style=" text-align: center;">
									<a href="index.php?view=spend_edit&id=<?php echo $spend->id; ?>" class="btn btn-xs btn-warning" ><i class="fa fa-pencil" ></i> Editar</a>
									<?php if($u->is_admin==1): ?><a href="index.php?action=spend_del&id=<?php echo $spend->id;?>" onclick="return confirm('¿Está seguro de eliminar?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar</a><?php endif; ?>
								</td>
							</tr>
							<?php $total+=$spend->price; } ?>
						</table>
						<h4>Gasto Total: <?php echo $currency.' '.number_format($total,2,".",",")?></h4>
					</div>
				</div>
			</div>
			<?php }else{
			echo "<p class='alert alert-danger'>No hay Gastos</p>";
			} ?>
		</div>
	</div>
	<?php endif; ?>
</section>

<div class="modal fade" id="spend_new"><!--Inicio de ventana modal 2-->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align: center;">Nuevo Gasto</h4>
      </div>
      <div class="modal-body">
        <table class="table">
          	<tr><td>
	  			<form class="form-horizontal" method="post" id="addcategory" action="index.php?action=spend_add" role="form">
			        <div class="form-group">
			          <label for="inputEmail1" class="col-lg-2 control-label">Concepto*</label>
			          <div class="col-md-9">
			            <textarea type="text" name="name" required class="form-control" id="name" placeholder="Concepto"></textarea>
			          </div>
			         </div>
			         <div class="form-group">
			          <label for="inputEmail1" class="col-lg-2 control-label">Costo*</label>
			          <div class="col-md-9">
			            <input type="text" name="price" required class="form-control" id="name" placeholder="Costo">
			          </div>
			        </div>
			        <div class="form-group">
			          <div class="col-lg-offset-2 col-lg-10">
			            <button type="submit" class="btn btn-primary">Agregar Gasto</button>
			          </div>
			        </div>
		      	</form>
          	</td></tr>
        </table>
      </div>
    </div>
  </div>
</div><!--Fin de ventana modal 2-->