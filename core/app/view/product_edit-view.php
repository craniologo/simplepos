<section class="content">
  <div class="row">
    <?php $product = ProductData::getById($_GET["id"]);
    if($product!=null): ?>
  	<div class="col-md-12">
    	<h2><i class="fa fa-apple"></i> Editar Producto <?php echo $product->name ?></h2>
      <a href="index.php?view=products" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
      <?php if(isset($_COOKIE["prdupd"])):?>
        <p class="alert alert-info">La informacion del producto se ha actualizado exitosamente.</p>
      <?php setcookie("prdupd","",time()-18600); endif; ?>
    	<br><br>
  		<form class="form-horizontal" method="post" id="addproduct" enctype="multipart/form-data" action="index.php?action=product_update" role="form">
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Imagen JPG(400x400px)</label>
          <div class="col-md-8">
            <input type="file" name="image" id="name" placeholder="">
            <?php if($product->image!=""){ ?>
            <br>
              <img src="storage/products/<?php echo $product->image;?>" class="img-responsive" style="width:300px; height:300px;">
            <?php }else{ ?>
            <br>
            <img src="storage/products/default.jpg" class="img-responsive" style="width: 300px; height: 300px;">
            <?php } ?>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Codigo de barras*</label>
          <div class="col-md-2">
            <input type="text" name="barcode" class="form-control" id="barcode" value="<?php echo $product->barcode; ?>" placeholder="Codigo de barras del Producto">
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Nombre*</label>
          <div class="col-md-4">
            <input type="text" name="name" class="form-control" id="name" value="<?php echo $product->name; ?>" placeholder="Nombre del Producto">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
          <div class="col-md-7">
            <textarea name="description" class="form-control" id="description" placeholder="Descripcion del Producto"><?php echo $product->description;?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
          <div class="col-md-3">
            <select name="category_id" class="form-control">
            <option value="">-- SELECCIONAR --</option>
              <?php $categories = CategoryData::getAll();
              foreach($categories as $category):?>
              <option value="<?php echo $category->id;?>" <?php if($product->category_id!=null&& $product->category_id==$category->id){ echo "selected";}?>><?php echo $category->name;?></option>
            <?php endforeach;?>
            </select>
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Presentacion</label>
          <div class="col-md-3">
            <input type="text" name="presentation" class="form-control" id="inputEmail1" value="<?php echo $product->presentation; ?>" placeholder="Presentacion del Producto">
          </div>
        </div>
        
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Precio de Entrada*</label>
          <div class="col-md-2">
            <input type="text" name="price_in" class="form-control" value="<?php echo $product->price_in; ?>" id="price_in" placeholder="Precio de entrada">
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Precio de Salida*</label>
          <div class="col-md-2">
            <input type="text" name="price_out" class="form-control" id="price_out" value="<?php echo $product->price_out; ?>" placeholder="Precio de salida">
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Unidad*</label>
          <div class="col-md-1">
            <input type="text" name="unit" class="form-control" id="unit" value="<?php echo $product->unit; ?>" placeholder="Unidad del Producto">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Minima en inventario:</label>
          <div class="col-md-2">
            <input type="text" name="inventary_min" class="form-control" value="<?php echo $product->inventary_min;?>" id="inputEmail1" placeholder="Minima en Inventario">
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label" >Esta activo</label>
          <div class="col-md-3">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="is_active" <?php if($product->is_active){ echo "checked";}?>> 
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-8">
          <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
            <button type="submit" class="btn btn-success">Actualizar Producto</button>
          </div>
        </div>
      </form>
  	</div>
  </div>
  <?php endif; ?>
</section>

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