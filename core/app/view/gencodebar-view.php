<section class="content"> <!-- Main content -->
	<h2>Generador de Código de Barras</h2>
	<p>Desde aquí se puede generar los códigos de barras para sus productos.</p>
	<div class="row">
		<div class="col-md-12">
			<form action="index.php?view=coderandon" method="post">
				<p><input type="submit" value="Generador Aleatorio" /></p>
				<p>Cantidad: <input type="text" name="numero" maxlength="3" size="3"/ required="yes"></p>
			</form>

			<form action="index.php?view=codefixed" method="post">
				<p><input type="submit" value="Generador Repetitivo"></p>
				<p>Código: <input type="text" name="fijo" maxlength="10" size="10" required="yes"></p>
				<p>Descripción: <input type="text" name="detalles" maxlength="23" size="23" required="yes"></p>
				<p>Cantidad: <input type="text" name="numero" maxlength="3" size="3" required="yes"></p>
			</form>
		</div>
	</div>
</section>