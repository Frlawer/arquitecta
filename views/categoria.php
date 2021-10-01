<?php
require_once('./clases/Img.php'); 
require_once('./clases/Categoria.php'); 
// si existe el numero de proyecto muestro la galería.
if (isset($_GET['n']) == 'viv01'):

	$proyecto = $_GET['n'];
	
	$img = new Img();
	$img->select1($proyecto);
	$datos = $img->rows;
	?>
	<!-- Four -->
	<section class="wrapper style1 align-center" id="categoria">
		<div class="inner">
			<h2>Nombre proyecto</h2>
			<p>Todas las fotos.</p>
		</div>
		<div class="gallery style1 lightbox onload-fade-in">
			<?php
			foreach ($datos as $key => $value) { ?>
			<article>
				<a href="<?php echo $value['url']?>" class="image">
					<img src="<?php echo $value['url']?>" alt="Alternate text" />
				</a>
				
			</article>
			<?php } ?>
		</div>
			
	</section>
	
<?php
// Sino muestro la lista de proyectos
elseif(isset($_GET['id']) == 1): 
	$lista = $_GET['id'];
	$datos = new Img();
	$datos->selectCategoria($lista);
	$datosImg = $datos->rows;

	$imgLista = new Img();
	$imgLista->select1($lista);
	$datos = $imgLista->rows;

?>
	<!-- Four -->
	<section class="wrapper style1 align-center" id="categoria">
		<div class="inner">
			<h2>Viviendas Unifamiliares</h2>
			<p>Selecciona para ver más fotos</p>
		</div>
		<div class="items style1 small onscroll-fade-in">
			<?php foreach ($datosImg as $key => $value) : 

			$datos = $value['url'];
			list($images, $cat, $proyecto, $img) = explode("/", $datos);
			?>
				<section>
					<a href="?view=categoria&id=<?php echo $value['categoria_id'];?>&n=<?php echo $img; ?>">
						<img src="<?php echo $value['url']?>" width="100%" alt="Alternate text" />
					</a>
					
					<h3>One</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dui turpis, cursus eget orci amet aliquam congue semper. Etiam eget ultrices risus nec tempor elit.</p>

				</section>
			<?php endforeach; ?>
		</div>
			
	</section>
<?php else: 
include_once('proyectos.php');

endif; ?>