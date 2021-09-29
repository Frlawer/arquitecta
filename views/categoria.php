<?php
require_once('clases/Categoria.php'); 

$cat = new Categoria();

$todas = $cat->select();
?>
<!-- Four -->
<section class="wrapper style4" id="categoria">
	<div class="content">
		<h2>Proyectos</h2>
		<p>Todos los proyectos.</p>
		<ul class="actions stacked">
			<li><a href="#" class="button">Learn More</a></li>
		</ul>
	</div>
	<div>
		<?php
		foreach ($todas as $key => $value) {
			echo "<p>" . $value . "</p>";
		}
		?>
	</div>
</section>