<section class="content">
  <div class="row">
    <div class="col-md-12">
      <h2><i class="fa fa-apple"></i> Nuevo Producto</h2>
      <a href="index.php?view=products" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
      <br><br>
      <form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct" action="index.php?action=product_add" role="form">
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Foto JPG(400x400px)</label>
          <div class="col-md-6">
            <input type="file" name="image" id="image" onchange="ValidarImagen(this);" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Codigo de Barras*</label>
          <div class="col-md-2">
            <input type="text" name="barcode" id="barcode" class="form-control" id="barcode" placeholder="Codigo de Barras del Producto">
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Nombre*</label>
          <div class="col-md-4">
            <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre del Producto">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
          <div class="col-md-7">
            <textarea name="description" class="form-control" id="description" placeholder="Descripcion del Producto"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Categoría</label>
          <div class="col-md-3">
            <select name="category_id" class="form-control" id="category_id">
              <option value="">-- SELECCIONAR --</option>
                <?php foreach(CategoryData::getAll() as $cat):?>
                <option name="category_id" id="category_id" value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
              <?php endforeach;?>
            </select>
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Presentacion</label>
          <div class="col-md-3">
            <input type="text" name="presentation" class="form-control" id="inputEmail1" placeholder="Presentacion del Producto">
          </div>
        </div>
        
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Precio de Entrada*</label>
          <div class="col-md-2">
            <input type="text" name="price_in" required class="form-control" id="price_in" placeholder="Precio de entrada">
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Precio de Salida*</label>
          <div class="col-md-2">
            <input type="text" name="price_out" required class="form-control" id="price_out" placeholder="Precio de salida">
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Unidad*</label>
          <div class="col-md-1">
            <input type="text" name="unit" required class="form-control" id="unit" placeholder="Unidad del Producto">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Minima en inventario:</label>
          <div class="col-md-3">
            <input type="text" name="inventary_min" class="form-control" id="inputEmail1" placeholder="Minima en Inventario">
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Inventario inicial:</label>
          <div class="col-md-3">
            <input type="text" name="q" class="form-control" id="inputEmail1" placeholder="Inventario inicial">
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-primary">Agregar Producto</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
    $(document).ready(function(){
      $("#barcode").keydown(function(e){
          if(e.which==17 || e.which==74 ){
              e.preventDefault();
          }else{
              console.log(e.which);
          }
      })
  });
</script>

<script>
function ValidarImagen(obj){
  var uploadFile = obj.files[0];

  if (!(/\.(jpg|png|gif)$/i).test(uploadFile.name)) {
      alert('El archivo cagrado no es una imagen');
      location.reload();
  }else{
          alert('Imagen correcta :)')                
      img.src = URL.createObjectURL(uploadFile);
    }
  }              
</script>