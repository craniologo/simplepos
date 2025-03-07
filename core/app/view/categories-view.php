<section class="content"><!-- Main content -->
	<div class="row">
		<div class="col-md-12">
			<h2><i class="fa fa-th-list"></i> Lista de Categorías</h2>
			<ol class="breadcrumb">
			   <li><a href="index.php?view=home"><i class="fa fa-home"></i> Inicio</a></li><li><i class="fa fa-th-list"></i> Catálogos</li><li class="active"><i class="fa fa-th-list"></i> Categorías</li>
			</ol>
			<a href='#category_new' data-toggle='modal' class='btn btn-primary'><i class='fa fa-th-list'></i> Nueva Categoría</a>
			<div class="clearfix"></div>
			<br>
			<?php $users = CategoryData::getAll();
			if(count($users)>0){ // si hay usuarios ?>
			<div class="box box-primary">
				<div class="box-body no-padding">
			  		<div class="box-body">
			  			<div class="box-body table-responsive">
							<table class="table table-bordered datatable table-hover">
								<thead>
									<th style="text-align: center; width: 30px;">N°</th>
									<th style="text-align: center;">Nombre</th>
									<th style="text-align: center;">Descripción</th>
									<th style="text-align: center; width:150px;">Acción</th>
								</thead>
								<?php for ($number=0; $number<1; $number++);
								foreach($users as $user){ ?>
								<tr>
									<td style="text-align: center;"><?php echo $number; ?></td><?php $number++;?>
									<td><a href="index.php?view=category_products&id=<?php echo $user->id;?>" class="btn btn-info btn-xs"><i class="fa fa-apple"></i> <?php echo $user->name; ?></a></td>
									<td><?php echo $user->description; ?></td>
									<td style="text-align: center;">
										<a href="index.php?view=category_edit&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Editar</a>
										<a href="index.php?action=category_del&id=<?php echo $user->id;?>" onclick="return confirm('¿Está seguro de eliminar?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</a></td>
								</tr>
								<?php } ?>
							</table>
						</div>
					</div>
				</div>
		  	</div><!-- /.box-body -->
		</div><!-- /.box -->
		<?php }else{
		echo "<p class='alert alert-danger'>No hay Categorias</p>";
		} ?>
	</div>
</section><!-- /.content -->

<div class="modal fade" id="category_new"><!--Inicio de ventana modal 2-->
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align: center;">Nueva Categoría</h4>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr><td>
            <form class="form-horizontal" method="post" id="category_add" action="index.php?action=category_add" role="form">
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
              <div class="col-md-9">
                <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre de la categoría">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Descripción*</label>
              <div class="col-md-9">
                <textarea type="text" name="description" required class="form-control" id="description" placeholder="Descripción de la categoría"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-10">
                <button type="submit" class="btn btn-primary">Agregar Categoria</button>
              </div>
            </div>
          </form>
          </td></tr>
        </table>
      </div>
    </div>
  </div>
</div><!--Fin de ventana modal 2-->