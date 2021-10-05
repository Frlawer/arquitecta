<?php 
use PHPMailer\PHPMailer;
use PHPMailer\SMTP;
use PHPMailer\Exception;

if(!isset($_POST['datos'])):?>

<!-- Seven -->
<section class="wrapper style1 align-center" id="contacto">
		<div class="inner medium">
			<h2>Contactanos</h2>
			<form method="post" action="#">
				<div class="fields">
					<div class="field half">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" id="nombre" value="" />
					</div>
					<div class="field half">
						<label for="tel">Teléfono</label>
						<input type="text" name="tel" id="tel" value="" />
					</div>
					<div class="field half">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" value="" />
					</div>
					<div class="field">
						<label for="msj">Mensaje</label>
						<textarea name="msj" id="msj" rows="6"></textarea>
					</div>
				</div>
				<ul class="actions special">
					<li><input type="submit" name="datos" id="submit" value="Enviar Mensaje" /></li>
				</ul>
			</form>

		</div>
	</section>
<?php 
else:
	if(isset($_POST['datos'])):
		$mail = new PHPMailer(true);

		try {
			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Contacto desde BorgoArquitectura.com.ar';
			$mail->Body    = '<h1>'.$_POST['datos']['nombre'].'</h1>';
			$mail->AltBody = '';
		
			$mail->send();
			echo 'Mensaje Enviado.!';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

	endif;
endif;
?>