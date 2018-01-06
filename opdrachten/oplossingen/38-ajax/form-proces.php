<?php

	session_start();

	if (isset($_POST['submit']))
	{
	
		$admin			=		'g917817@rmqkr.net';
	
		$sender			=		$_POST['email'];
		$message		=		$_POST['message'];
		$copy				=		(isset($_POST['send-copy'])) ? true : false; 

        $db = new PDO('mysql:host=localhost;dbname=bieren','root','');
		
		if($db->connect_errno > 0)
		{
			die('Kan geen connectie maken: ' . $db->connect_error . '.');
		}
		else
		{
			$result = $db->query('INSERT INTO contact_messages (email,
														body,
														time_sent)
														
												VALUES ("' . $sender . '",
														"' . $message . '",
														NOW())');

			if ($db->affected_rows > 0)
			{

				
				$to      		= 	$admin;
				$subject 		= 	'Vraag van ' . $sender;

				$body 			= 	'<p>Beste, </p>';
				$body 			.=	'<p>iemand heeft je via de website proberen te contacteren. Dit is zijn bericht:<p>';
				$body 			.=	'<p style="font-style:italic;">'.$message.'</p>';
											
				$headers 		= 	'From: ' . $sender . "\r\n";
				$headers 		.=	'Reply-To: ' . $sender  . "\r\n";
				$headers		.= 	'MIME-Version: 1.0'. "\r\n";
				$headers		.= 	'Content-Type: text/html; charset=ISO-8859-1'. "\r\n";

				$messageSent = mail($to, $subject, $body, $headers);	


				$copySent	=	true; 
				if ($copy)
				{
					$to      		= 	$sender;
					$subject 		= 	'Kopie van vraag aan ' . $admin;

					$body 			=	'<p>Beste, </p>';
					$body 			.=	'<p>Bij deze een kopie van je vraag aan ' . $admin . '<p>';
					$body 			.=	'<p style="font-style:italic;">'.$message.'</p>';
					$body 			.=	'<p>Wij nemen zodra we kunnen contact met je op!</p>';
												
					$headers 		= 	'From: ' . $admin . "\r\n";
					$headers 		.=	'Reply-To: ' . $admin  . "\r\n";
					$headers		.= 	'MIME-Version: 1.0'. "\r\n";
					$headers		.= 	'Content-Type: text/html; charset=ISO-8859-1'. "\r\n";
					
					$copySent 	=	mail($to, $subject, $body, $headers);
				}

				if ($messageSent && $copySent)
				{
					
					$_SESSION['message']['type'] 	=	'success';
					$_SESSION['message']['body']	=	'Bedankt voor je bericht! We nemen zo snel mogelijk contact met je op.';

					unset($_SESSION['fieldNames']);
				}
				else
				{

					$_SESSION['fieldNames']['email']		=	isset($_POST['email']) ? $_POST['email'] : '';
					$_SESSION['fieldNames']['message']		=	isset($_POST['message']) ? $_POST['message'] : '';
					$_SESSION['fieldNames']['send-copy']	=	isset($_POST['send-copy']) ? $_POST['send-copy'] : '';

					$_SESSION['message']['type'] 	=	'error';
					$_SESSION['message']['body']	=	'Er ging iets mis bij het versturen van je bericht. Probeer opnieuw';
				}

				header('location: contact-form.php');
			}
		}
	}

?>