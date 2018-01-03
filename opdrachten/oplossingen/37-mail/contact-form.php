<?php

	session_start();

	if(isset($_SESSION['fieldNames'])){
		$email		=	$_SESSION['fieldNames']['email'];
		$body		=	$_SESSION['fieldNames']['message'];
		$copy		=	$_SESSION['fieldNames']['send-copy'];
	}

	if(isset($_SESSION['message'])){
		$message['type']	=	$_SESSION['message']['type'];
		$message['body']	=	$_SESSION['message']['body'];
		
		unset($_SESSION['message']);
	}

?>
	
<!DOCTYPE html>
<html>
<head>

	<style>
		
			.modal
			{
				margin:5px 0px;
				padding:5px;
				border-radius:5px;
			}
			
			.success
			{
				color:#468847;
				background-color:#dff0d8;
				border:1px solid #d6e9c6;
			}
			
			.error
			{
				color:#b94a48;
				background-color:#f2dede;
				border:1px solid #eed3d7;
			}
			
			.error p
			{
				font-style:italic;
			}
			
			.warning
			{
				color:#3a87ad;
				background-color:#d9edf7;
				border:1px solid #bce8f1;
			}

			ul
			{
				margin-bottom:20px;

			}

			.deactivated
			{

				background-color:lightgrey;
			}

		</style>

</head>
	<body>

		<h1>Contacteer ons</h1>
	
		<?php if (isset($message)): ?>
			<div class="modal <?php echo $message['type'] ?>">
				<?php echo $message['body'] ?>
			</div>
		<?php endif ?>
	
		<div id="form-holder">
			<form action="form-process.php" method="post" id="mail-form">
				
				<ul>
					
					<li>
						<label for="email">Emailadres</label>
						<input type="text" id="email" name="email" value="<?php echo (isset($email)) ? $email : '' ?>">
					</li>
					<li>
						<label for="message">Bericht</label>
						<textarea id="message" name="message"><?php echo (isset($body)) ? $body : '' ?></textarea>
					</li>
					<li>
						<label for="send-copy">Stuur kopie naar mezelf</label>
						<input type="checkbox" id="send-copy" name="send-copy" <?php echo (isset($copy)) ? 'checked' : '' ?>>
					</li>
					
				</ul>
				
				<input type="submit" id="submit" name="submit">
			</form>
		</form>		

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script>
			$(function(){

				$('#mail-form').submit(function(){

					var formData	=	$('#mail-form').serialize();

					$.ajax({

						type: 'POST',
						url: 'form-process-ajax.php',
						data: formData,
						success: function(data) {
								
										data = JSON.parse(data);

										if (data['type'] == "success"){
											$('#form-holder form').fadeOut('slow', function(){

												$('#form-holder').append('<p id="modal">Bedankt! Uw bericht is goed verzonden!</p>').hide().fadeIn('slow');
											});
											
										}else if (data['type'] == "error"){
											$('#form-holder').prepend('<p id="modal">Oeps, er ging iets mis. Probeer opnieuw!</p>')
											$('#modal').hide().fadeIn('slow');
											
										}
									}
						})
					return false;
				})
			})
		</script>

	</body>
</html>