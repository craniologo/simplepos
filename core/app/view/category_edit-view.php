<section class="content">
<?php $user = CategoryData::getById($_GET["id"]);?>
  <div class="row">
    <div class="col-md-12">
      <h2><i class="fa fa-th-list"></i> Editar Categoría</h2>
      <a href="index.php?view=categories" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
      <br><br>
      <div class="box box-primary">
        <table class="table">
          <tr><td>
            <form class="form-horizontal" method="post" id="addproduct" action="index.php?action=category_update" role="form">
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
                <div class="col-md-2">
                  <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre de la categoría">
                </div>
                <label for="inputEmail1" class="col-lg-1 control-label">Descripción</label>
                <div class="col-md-5">
                  <textarea type="text" name="description" value="" class="form-control" id="description" placeholder="Descripción de la categoría"><?php echo $user->description;?></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
                  <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
                </div>
              </div>
            </form>
          </td></tr>
        </table>
      </div>
    </div>
  </div>
</section>