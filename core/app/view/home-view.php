<?php $user = UserData::getById($_SESSION["user_id"]);
  if($user->is_admin==0){ Core::redir("./?view=sell"); }
  $currency = ConfigurationData::getByPreffix("currency")->val; ?>
<?php
  $dateB = new DateTime(date('Y-m-d'));
  $dateA = $dateB->sub(DateInterval::createFromDateString('30 days'));
  $sd= strtotime(date_format($dateA,"Y-m-d"));
  $ed = strtotime(date("Y-m-d"));

  $ntot = 0;
  $nsells = 0;
  for($i=$sd;$i<=$ed;$i+=(60*60*24)){
    $operations = SellData::getGroupByDateOp(date("Y-m-d",$i),date("Y-m-d",$i),2);
    $res = SellData::getGroupByDateOp(date("Y-m-d",$i),date("Y-m-d",$i),1);
    $spends = SpendData::getGroupByDateOp(date("Y-m-d",$i),date("Y-m-d",$i));
   //  echo $operations[0]->t;
    $sl = $operations[0]->t!=null?$operations[0]->t:0;
    $sr = $res[0]->tot!=null?$res[0]->tot:0;
    $sp = $spends[0]->t!=null?$spends[0]->t:0;
    $ntot+=($sl-($sr+$sp));
    $nsells += $operations[0]->c;
  } ?>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <h1 style="text-align: center;">SISTEMA DE VENTAS E INVENTARIO</h1>
      <h2>Empresa: <?php echo $name = ConfigurationData::getByPreffix("company_name")->val;  ?></h2>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-lg-3 col-xs-6"><!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo count(PersonData::getClients());?></h3>
          <p>Clientes</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="./?view=clients" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6"><!-- ./col -->
      <div class="small-box bg-green"><!-- small box -->
        <div class="inner">
          <h3><?php echo count(ProductData::getAll()); ?></h3>
          <p>Productos</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="./?view=products" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6"><!-- ./col -->
      <div class="small-box bg-yellow"><!-- small box -->
        <div class="inner">
          <h3><?php $d= SellData::countByStatusId(2); echo $d->c; ?></h3>
          <p>Ventas</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="./?view=sells" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6"><!-- ./col -->
      <div class="small-box bg-purple"><!-- small box -->
        <div class="inner">
          <h3><?php echo $currency.' '.number_format($ntot,2,".",",");?></h3>
          <p>Ingresos del Mes</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="./?view=box_history" class="small-box-footer">Ver caja <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <center><div class="box-title">Ventas finalizadas en los ultimos 30 dias</div></center>
        </div>
        <div class="box-body">
          <div id="graph" class="animate" data-animate="fadeInUp" ></div>
        </div>
      </div>
        <script>

          <?php
          echo "var c=0;";
          echo "var dates=Array();";
          echo "var data=Array();";
          echo "var total=Array();";
          for($i=$sd;$i<=$ed;$i+=(60*60*24)){
            $operations = SellData::getGroupByDateOp(date("Y-m-d",$i),date("Y-m-d",$i),2);
            $res = SellData::getGroupByDateOp(date("Y-m-d",$i),date("Y-m-d",$i),1);
            $spends = SpendData::getGroupByDateOp(date("Y-m-d",$i),date("Y-m-d",$i));
            //  echo $operations[0]->t;
            $sl = $operations[0]->t!=null?$operations[0]->t:0;
            $sr = $res[0]->tot!=null?$res[0]->tot:0;
            $sp = $spends[0]->t!=null?$spends[0]->t:0;
            echo "dates[c]=\"".date("Y-m-d",$i)."\";";
            echo "data[c]=".($sl-($sr+$sp)).";";
            echo "total[c]={x: dates[c],y: data[c]};";
            echo "c++;";
          }
          ?>
          // Use Morris.Area instead of Morris.Line
          Morris.Area({
            element: 'graph',
            data: total,
            xkey: 'x',
            ykeys: ['y',],
            labels: ['<?php echo $currency; ?> ']
          }).on('click', function(i, row){
            console.log(i, row);
          });
        </script>
    </div>
  </div>
</div>