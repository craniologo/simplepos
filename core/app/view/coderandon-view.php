<section class="content"> <!-- Main content -->
	<div class="row">
		<div class="col-md-12">
			<script>
			function imprimir()
			{
			  var Obj = document.getElementById("desaparece");
			  Obj.style.visibility = 'hidden';
			  window.print();
			}
			</script>
			<span id="desaparece">
				<input type="submit" value="Volver" onclick = "location='index.php?view=gencodebar'"/>
				<input type="button"  onClick="imprimir()" value="Imprimir">
			</span>
			<br/>
			<?php
				$valor=$_POST['numero'];
				$galletas = 1;
				while ($galletas <= $valor) {
					$aleatorio = mt_rand(000000000, 999999999);
				echo "$galletas, ";
				$galletas++;
			?>
			<br/>
			<img src="barcode.php?text=<?php echo $aleatorio ?>&size=50&orientation=horizontal&codetype=code128&print=true" />
			<br/>
			<?php } ?>
		</div>
	</div>
</section>