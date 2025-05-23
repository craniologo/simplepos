<section class="content">
  <?php $user = UserData::getById($_SESSION["user_id"]);?>
  <div class="row">
    <div class="col-md-12">
      <h2><i class="fa fa-user"></i> Mi Perfil</h2>
      <br>
      <form class="form-horizontal" method="post" id="addproduct" enctype="multipart/form-data" action="index.php?action=profile_update" role="form">
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
          <label for="inputEmail1" class="col-lg-1 control-label">Apellidos*</label>
          <div class="col-md-3">
            <input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellidos">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Dirección</label>
          <div class="col-md-3">
            <input type="text" name="address" value="<?php echo $user->address;?>" class="form-control" required id="address" placeholder="Dirección del usuario">
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Usuario/Correo Elctrónico*</label>
          <div class="col-md-3">
            <input type="email" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Usuario/Correo Electrónico">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Contraseña</label>
          <div class="col-md-3">
            <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contraseña">
            <p class="help-block">La contraseña solo se modificara si escribes algo, en caso contrario no se modifica.</p>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-7">
            <p class="alert alert-info">* Campos obligatorios</p>
          </div>
        </div>
        <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-7">
            <button type="submit" class="btn btn-success">Actualizar Perfil</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>