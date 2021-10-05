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
	<div><h2><?php echo $proyectoData['nombre'] ?></h2></div>
	<div class="splide2">
		<div class="splide__track">
			<ul class="splide__list">

				<?php foreach($imgData as $key => $value): ?>

				<li class="splide__slide">
					<img src="<?php echo $value['url']?>" alt="<?php echo $value['nombre']?>">
				</li>

				<?php endforeach;?>

			</ul>
		</div>
	</div>

	
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

<script>
	import Splide from '@splidejs/splide';
	import Grid from '@splidejs/splide-extension-grid';

	new Splide( '#splide2', {
		type       : 'loop',
		height     : '4rem',
		perPage    : 2,
		perMove    : 1,
		grid       : {
			// You can define rows/cols instead of dimensions.
			dimensions: [ [ 1, 1 ], [ 2, 2 ], [ 2, 1 ] ],
			gap: [
				row: '6px',
				col: '6px',
			],
		},
		breakpoints: {
			600: {
				height : '8rem',
				perPage: 1,
				grid   : {
					dimensions: [ [ 2, 2 ], [ 1, 1 ], [ 2, 1 ] ],
				}
			}
		}
	} ).mount( { Grid } );
</script>