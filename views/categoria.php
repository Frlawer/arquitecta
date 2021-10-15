<?php
require_once('./clases/Img.php'); 
require_once('./clases/Categoria.php'); 
require_once('./clases/Proyecto.php'); 
// si existe el numero de proyecto muestro la galería.
if (isset($_GET['n'])):

	$proyectoId = $_GET['n'];
	$categoriaId = $_GET['id'];
	
	// solicito datos proyecto
	$proyecto = new Proyecto();
	$proyecto->getProyecto($proyectoId, $categoriaId);
	$proyectoData = $proyecto->rows[0];

	$img = new Img();
	$img->getImgs( $categoriaId, $proyectoId);
	$imgData = $img->rows;

	?>
	<section class="wrapper style1 align-center" id="categoria">
		<div class="inner">
			<h2><?php echo $proyectoData['nombre'] ?></h2>
			<blockquote><?php echo $proyectoData['resenia'] ?></blockquote>
		</div>
		<div id="image-slider" class="splide inner" data-splide='{"heightRatio":"0.3","perPage":5,"cover": "true"}'>
			<div class="splide__track">
				<ul class="splide__list">
					<?php foreach ($imgData as $key => $value): ?>
					<li class="splide__slide">
						<a href="<?php echo $value['url']?>" data-lightbox="roadtrip">
							<img src="<?php echo $value['url']?>" data-lightbox="roadtrip" />
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<style>.splide__slide img {width: 100%;height: 10rem;}</style>
	</section>
	
<?php
// Sino muestro la lista de proyectos
elseif(isset($_GET['id'])): 
	$idCategoria = $_GET['id'];

	$proyecto = new Proyecto();
    $proyecto->getProyectos($idCategoria);
    $proyectoData = $proyecto->rows;

	$categoria = new Categoria();
    $categoria->nombreCat($idCategoria);

	?>
	<!-- Four -->
	<section class="wrapper style1 align-center" id="categoria">
		<div class="inner">
			<h2><?php echo ucfirst($categoria->rows[0]['nombre']) ?></h2>
			<p>Selecciona para ver más fotos</p>
		</div>
		<div class="items style1 small onload-fade-in">
			<?php foreach ($proyectoData as $key => $value) : ?>
                <?php 
                // creo otro objeto con 1 solo llamado a la imagen principal
                $img = new Img();
                $img->getImg($value['categoria_id'], $value['subCategoria']);
                    ?>
				<section>
					<a href="?view=categoria&id=<?php echo $value['categoria_id'];?>&n=<?php echo $value['subCategoria']; ?>">
						<img src="<?php echo $img->rows[0]['url']?>" width="100%" alt="<?php echo $value['nombre'] ?>" />
					</a>
					<h3>
				<?php echo $value['nombre']; ?>
					</h3>
					<p>
						<?php echo mb_substr($value['resenia'], 0, 50, 'UTF-8')."..."; ?>
					</p>
				</section>
			<?php endforeach; ?>
		</div>
			
	</section>
<?php else: 
include_once('proyectos.php');

endif; ?>