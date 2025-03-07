<section class="content">
  <div class="row">
    <?php $person = PersonData::getById($_GET["id"]);?>
  	<div class="col-md-12">
    	<h2><i class="fa fa-male"></i> Editar Cliente</h2>
    	<a href="index.php?view=clients" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
      <br><br>
      <form class="form-horizontal" method="post" id="addproduct" action="index.php?action=client_update" role="form">
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
          <div class="col-md-3">
            <input type="text" name="name" value="<?php echo $person->name;?>" class="form-control" id="name" placeholder="Nombre" required>
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Apellido*</label>
          <div class="col-md-3">
            <input type="text" name="lastname" value="<?php echo $person->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">RUC/DNI</label>
          <div class="col-md-3">
            <input type="text" name="ruc" value="<?php echo $person->ruc;?>" class="form-control" id="ruc" placeholder="RUC/DNI">
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Dirección*</label>
          <div class="col-md-3">
            <input type="text" name="address" value="<?php echo $person->address;?>" class="form-control" required id="username" placeholder="Dirección">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Correo Electrónico</label>
          <div class="col-md-3">
            <input type="email" name="email" value="<?php echo $person->email;?>" class="form-control" id="email" placeholder="Correo electrónico">
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Teléfono</label>
          <div class="col-md-3">
            <input type="text" name="phone"  value="<?php echo $person->phone;?>"  class="form-control" id="inputEmail1" placeholder="Número de teléfono">
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-7">
            <p class="alert alert-info">* Campos obligatorios</p>
          </div>
        </div>
          <input type="hidden" name="id" value="<?php echo $person->id;?>">
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
          </div>
        </div>
      </form>
  	</div>
  </div>
</section>