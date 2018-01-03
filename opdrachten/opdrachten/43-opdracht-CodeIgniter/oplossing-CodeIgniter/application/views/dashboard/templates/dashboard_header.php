<!DOCTYPE html>
	<html>
	<head>
	
		<title><?php echo $title ?></title>

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

			.input-error,
			.input-error p
			{

				color:#b94a48;
			}

			.input-error input
			{
				border:1px solid #eed3d7;
			}


		</style>

		<link rel="stylesheet" type="text/css" href="./public/css/global.css">
	</head>
	<body class="dashboard">

		<header>
			<span>Welkom terug <?php echo $user ?></span> | <a href="logout">uitloggen</a>
		</header>
		<?php if (isset($message)): ?>
			<div class="modal <?php echo $message['type'] ?>">
				<?php echo $message['body'] ?>
			</div>
		<?php endif ?>