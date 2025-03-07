<section class="content">
  <?php $pro = ProductData::getById($_GET["product_id"]); ?>
  <div class="row">
  	<div class="col-md-12">
    	<h2><?php echo $pro->name; ?> [Quitar]</h2>
      <a href="index.php?view=inventary" class="btn btn-default"><i class="fa fa-arrow-left"></i> Regresar</a>
    	<br>
  		<form class="form-horizontal" method="post" id="processsub" action="./?action=processsub" role="form">
        <div class="form-group">
          <label for="inputEmail1" class="col-lg-2 control-label">Cantidad*</label>
          <div class="col-md-2">
            <input type="text" name="q" required class="form-control" id="q" required placeholder="Cantidad">
          </div>
          <label for="inputEmail1" class="col-lg-1 control-label">Justificación*</label>
          <div class="col-md-4">
            <textarea type="text" name="justify" required class="form-control" id="justify" required placeholder="Justificación para quitar"></textarea>
          </div>
        </div>
          <input type="hidden" name="product_id" value="<?php echo $pro->id; ?>">
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-primary">Proceder</button>
          </div>
        </div>
      </form>
  	</div>
  </div>
</section>