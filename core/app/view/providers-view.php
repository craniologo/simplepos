<section class="content">
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-truck"></i> Lista de Proveedores</h2>
			<ol class="breadcrumb">
			   <li><a href="index.php?view=home"><i class="fa fa-home"></i> Inicio</a></li><li><i class="fa fa-th-list"></i> Catálogos</li><li class="active"><i class="fa fa-truck"></i> Proveedores</li>
			</ol>
			<a href='#provider_new' data-toggle='modal' class='btn btn-primary'><i class='fa fa-th-truck'></i> Nuevo Proveedor</a>
			<div class="clearfix"></div>
			<br>
			<?php $users = PersonData::getProviders();
			if(count($users)>0){ ?>
			<div class="box">
				<div class="box-header">
					<div class="box-body no-padding">
						<div class="box-body">
							<div class="box-body table-responsive">
								<table class="table table-bordered datatable table-hover">
									<thead>
										<th style="text-align: center; width: 30px;">N°</th>
										<th style="text-align: center;">Nombre</th>
										<th style="text-align: center;">RUC/DNI</th>
										<th style="text-align: center;">Dirección</th>
										<th style="text-align: center;">Correo&nbsp;Electrónico</th>
										<th style="text-align: center;">Teléfono</th>
										<th style="text-align: center; width:150px;">Acción</th>
									</thead>
									<?php for($number=0; $number<1; $number++); //variable incremental
									foreach($users as $user){
									?>
									<tr>
										<td><?php echo $number; ?></td> <?php $number++; ?><!--var incremen-->
										<td><?php echo $user->name." ".$user->lastname; ?></td>
										<td style="text-align: right;"><?php echo $user->ruc; ?></td>
										<td><?php echo $user->address; ?></td>
										<td><?php echo $user->email; ?></td>
										<td style="text-align: right;"><?php echo $user->phone; ?></td>
										<td style="text-align: center;">
											<a href="index.php?view=provider_edit&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Editar</a>&nbsp;&nbsp;
											<a href="index.php?action=provider_del&id=<?php echo $user->id;?>" onclick="return confirm('¿Está seguro de eliminar?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</a>
										</td>
									</tr>
									<?php }
										}else{
										echo "<p class='alert alert-danger'>No hay proveedores</p>";
									} ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="provider_new"><!--Inicio de ventana modal 2-->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align: center;">Nuevo Proveedor</h4>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr><td>
			  		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=provider_add" role="form">
			        <div class="form-group">
			          <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
			          <div class="col-md-9">
			            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" required>
			          </div>
			        </div>
			        <div class="form-group">
			          <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
			          <div class="col-md-9">
			            <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
			          </div>
			        </div>
			        <div class="form-group">
			          <label for="inputEmail1" class="col-lg-2 control-label">RUC/DNI*</label>
			          <div class="col-md-9">
			            <input type="text" name="ruc" class="form-control" required id="ruc" placeholder="RUC/DNI">
			          </div>
			        </div>
			        <div class="form-group">
			          <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
			          <div class="col-md-9">
			            <input type="text" name="address" class="form-control" required id="address" placeholder="Direccion">
			          </div>
			        </div>
			        <div class="form-group">
			          <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
			          <div class="col-md-9">
			            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
			          </div>
			        </div>
			        <div class="form-group">
			          <label for="inputEmail1" class="col-lg-2 control-label">Telefono*</label>
			          <div class="col-md-9">
			            <input type="text" name="phone" class="form-control" id="phone" placeholder="Telefono">
			          </div>
			        </div>
			        <div class="form-group">
			          <div class="col-lg-offset-2 col-lg-9">
			            <p class="alert alert-info">* Campos obligatorios</p>
			          </div>
			        </div>
			        <div class="form-group">
			          <div class="col-lg-offset-2 col-lg-10">
			            <button type="submit" class="btn btn-primary">Agregar Proveedor</button>
			          </div>
			        </div>
			      </form>
          </td></tr>
        </table>
      </div>
    </div>
  </div>
</div><!--Fin de ventana modal 2-->