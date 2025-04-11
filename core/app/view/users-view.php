<section class="content">
	<div class="row">
		<div class="col-md-12">
		<h2><i class="fa fa-users"></i> Lista de Usuarios</h2>
		<a href='#user_new' data-toggle='modal' class='btn btn-primary'><i class='glyphicon glyphicon-user'></i> Nuevo Usuario</a>
		<div class="clearfix"></div>
		<br>
		<?php $users = UserData::getAll();
		if(count($users)>0){ ?>
		<div class="box box-primary">
			<div class="box-body no-padding">
		  		<div class="box-body">
		  			<div class="box-body table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<th style="text-align: center; width: 30px;">N°</th>
								<th style="text-align: center; width: 50px;">Foto</th>
								<th style="text-align: center;">Nombre&nbsp;Completo</th>
								<th style="text-align: center;">Dirección</th>
								<th style="text-align: center;">Usuario/Correo&nbsp;Electrónico</th>
								<th style="text-align: center;">Activo</th>
								<th style="text-align: center;">Rol</th>
								<th style="text-align: center; width: 150px;">Acción</th>
							</thead>
							<?php for ($number=0; $number<1; $number++);
							foreach($users as $user){ ?>
							<tr>
								<td style="text-align: center;"><?php echo $number; ?></td><?php $number++;?>
								<td style="text-align: center;">
                  <?php if($user->image!=""){ ?>
                    <img src="storage/profiles/<?php echo $user->image;?>" style="width:50px; height: 50px; ">
                  <?php }else{ ?>
                  	<img src="storage/profiles/default.jpg" style="width:50px; height: 50px; ">
                  <?php } ?></td>
								<td><?php echo $user->name." ".$user->lastname; ?></td>
								<td><?php echo $user->address; ?></td>
								<td><?php echo $user->email; ?></td>
								<td style="text-align: center;"><?php if($user->is_active):?>
										<i class="glyphicon glyphicon-ok"></i>
									<?php endif; ?></td>
								<td><?php switch ($user->kind) {
										case '1': echo "Administrador"; break;
										case '2': echo "Cajero"; break;
										case '3': echo "Vendedor"; break;
										default:
											# code...
											break;
										} ?></td>
								<td style="text-align: center;"><?php if($user->id!=1){ ?>
									<a href="index.php?view=user_edit&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Editar</a>
									<a href="index.php?action=user_del&id=<?php echo $user->id;?>" onclick="return confirm('¿Está seguro de eliminar?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</a><?php }else{ echo "Denegado"; } ?>
								</td>
							</tr>
							<?php
							}
				 			echo "</table></div>";
						}else{
							// no hay usuarios
						} ?>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="user_new"><!--Inicio de ventana modal 2-->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align: center;">Nuevo Usuario</h4>
      </div>
      <div class="modal-body">
        <table class="table">
          	<tr><td>
		    <form class="form-horizontal" method="post" id="user_add" action="index.php?action=user_add" role="form">
		        <div class="form-group">
		          <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
		          <div class="col-md-9">
		            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="inputEmail1" class="col-lg-2 control-label">Apellidos*</label>
		          <div class="col-md-9">
		            <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellidos">
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="inputEmail1" class="col-lg-2 control-label">Dirección*</label>
		          <div class="col-md-9">
		            <input type="text" name="address" class="form-control" required id="address" placeholder="Dirección">
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="inputEmail1" class="col-lg-2 control-label">Usuario/Correo Electrónico</label>
		          <div class="col-md-9">
		            <input type="email" name="email" class="form-control" id="email" placeholder="Usuario/Correo electrónico">
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="inputEmail1" class="col-lg-2 control-label">Contraseña</label>
		          <div class="col-md-9">
		            <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contraseña">
		          </div>
		        </div>
		        <div class="form-group">
		          <label for="inputEmail1" class="col-lg-2 control-label">Rol*</label>
		          <div class="col-md-9">
		          	<select name="kind" class="form-control" required>
		          		<option value="">-- SELECCIONAR --</option>
		          		<option value="1">Administrador</option>
		          		<option value="2">Cajero</option>
		          		<option value="3">Vendedor</option>
		          	</select>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-lg-offset-2 col-lg-9">
		            <p class="alert alert-info">* Campos obligatorios</p>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-lg-offset-2 col-lg-10">
		            <button type="submit" class="btn btn-primary">Agregar Usuario</button>
		          </div>
		        </div>
	      	</form>
          	</td></tr>
        </table>
      </div>
    </div>
  </div>
</div><!--Fin de ventana modal 2-->