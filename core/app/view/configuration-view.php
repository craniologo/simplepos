<section class="content">
  <?php $settings = ConfigurationData::getAll(); ?>
  <div class="row">
    <div class="col-md-12">
      <h2><i class="fa fa-wrench"></i> Ajustes Generales</h2>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <form method="post" action="./?action=settings_update" enctype="multipart/form-data">
          <div class="box-body table-responsive">
          <table class="table table-bordered">
            <tbody>
              <?php
              if(count($settings)>0):?>
              <?php foreach($settings as $cat):?>
              <tr>
                <td><?php echo $cat->name; ?></td>
                <td><?php if($cat->kind==2):?>
                  <input type="text" name="<?php echo $cat->short; ?>" class="form-control" value="<?php echo $cat->val;?>">
                  <?php elseif($cat->kind==4):?>
                  <?php if($cat->val!=""){ ?>
                  <img src="storage/configuration/<?php echo $cat->val;?>" style="width:180px;"><br><br>
                  <?php }else{ ?>
                  <img src="storage/configuration/logo.jpg" style="width:180px;"><br><br>
                  <?php } ?>
                  <input type="file" name="<?php echo $cat->short; ?>" >
                <?php endif;?></td>
              </tr>
              <?php endforeach; ?>
              <?php endif; ?>
              <tr>
                <td> </td>
                <td><input type="submit"  class="btn btn-success" value="Actualizar Ajustes"></td>
              </tr>
            </tbody>
          </table>
        </div>
        </form>
      </div>
    </div>
  </div>
</section>