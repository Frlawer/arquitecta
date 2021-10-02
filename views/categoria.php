<?php
require_once('./clases/Img.php'); 
require_once('./clases/Categoria.php'); 
require_once('./clases/Proyecto.php'); 
// si existe el numero de proyecto muestro la galería.
if (isset($_GET['n']) == 'viv01'):

	$proyectoId = $_GET['n'];
	
	$img = new Img();
	$img->select1($proyectoId);
	$datos = $img->rows;

	// solicito datos proyecto
	$proyecto = new Proyecto();
	$proyecto->getProyecto($proyectoId);
	$datosP = $proyecto->rows[0];
	?>
	<!-- Four -->
	<section class="wrapper style1 align-center" id="categoria">
		<div class="inner">
			<h2><?php echo $datosP['nombre'] ?></h2>
			<blockquote><?php echo $datosP['resenia'] ?></blockquote>
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
		<div class="items style1 small onload-fade-in">
			<?php foreach ($datosImg as $key => $value) : ?>
				<section>
					<a href="?view=categoria&id=<?php echo $value['categoria_id'];?>&n=<?php echo $value['subCategoria']; ?>">
						<img src="<?php echo $value['url']?>" width="100%" alt="<?php echo $value['nombre'] ?>" />
					</a>
				<?php
				// Solicito datos de proyecto
				$proyectoG = new Proyecto();
				$proyectoG->getProyectoCat($value['subCategoria']);
				$datosG = $proyectoG->rows[0];
				?>
					<h3>
				<?php echo $datosG['nombre']; ?>
					</h3>
					<p>
						<?php echo mb_substr($datosG['resenia'], 0, 50, 'UTF-8')."..."; ?>
					</p>
				</section>
			<?php endforeach; ?>
		</div>
			
	</section>
<?php else: 
include_once('proyectos.php');

endif; ?>