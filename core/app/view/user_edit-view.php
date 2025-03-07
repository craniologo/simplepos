<section class="content">
  <?php $user = UserData::getById($_GET["id"]);?>
  <div class="row">
  	<div class="col-md-12">
    	<h2><i class="fa fa-user"></i> Editar Usuario</h2>
    	<a href="index.php?view=users" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
      <br><br>
  		<form class="form-horizontal" method="post" id="user_update" action="index.php?action=user_update" enctype="multipart/form-data" role="form">
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Foto JPG (400x400px)</label>
          <div class="col-md-6">
              <?php if($user->image!=""){ ?>
              <br>
              <img src="storage/profiles/<?php echo $user->image; ?>" class="img-responsive" style="width: 300px; height: 300px; ">
              <?php }else{
                echo "<img src='storage/profiles/default.jpg' class='img-responsive' style='width: 300px; height: 300px;' >";
              } ?>
              <input type="file" name="image" id="image" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
          <div class="col-md-3">
            <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Apellido*</label>
          <div class="col-md-3">
            <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Nombre de usuario*</label>
          <div class="col-md-3">
            <input type="text" name="username" value="<?php echo $user->username;?>" class="form-control" required id="username" placeholder="Nombre de usuario">
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Email*</label>
          <div class="col-md-3">
            <input type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Contraseña</label>
          <div class="col-md-3">
            <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contraseña">
            <p class="help-block">La contraseña solo se modificara si escribes algo, en caso contrario no se modifica.</p>
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label" >Esta activo</label>
          <div class="col-md-3">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="is_active" <?php if($user->is_active){ echo "checked";}?>> 
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label" >Admin</label>
          <div class="col-md-3">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="is_admin" <?php if($user->is_admin){ echo "checked";}?>> 
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-7">
            <p class="alert alert-info">* Campos obligatorios</p>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
          <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
          </div>
        </div>
      </form>
  	</div>
  </div>
</section>