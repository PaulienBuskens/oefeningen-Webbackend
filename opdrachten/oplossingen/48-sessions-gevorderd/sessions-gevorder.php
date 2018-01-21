<?php

session_start();
//ophalen huidige pagina
$currentPage = basename($_SERVER['PHP_SELF']);

//sessie verwijderen
if(isset($_GET['session'])){
    if($_GET['session']=='destroy'){
        session_destroy();
        header('Location: ' . $currentPage);
    }
}

$leegWinkelmandje = true;
$producten = array();

if(isset($_POST['add'])){
    $product = $_POST['add'];

    //nakijken of product al in mandje
    if(isset($_SESSION['producten'][$product])){
        ++$_SESSION['producten'][$product];
    }else{
        $_SESSION['producten'][$product] =1;
    }
}

if(isset($_POST['substract'])){
    $product = $_POST['substract'];

    //als product bestaat
    if( $_SESSION['producten'][$product] >1){
        --$_SESSION['producten'][$product];
    } else {
        unset($_SESSION['producten'][$prduct]);
    }
}

if(isset($_POST['remove'])){

    $product = $_POST['remove'];

    unset($_SESSION['producten'][$product]);
}

if(isset($_SESSION['producten'])){
    $producten = $_SESSION['producten'];
}

//check ofdat mandje leeg is
if(count($producten)>0){
    $leegWinkelmandje = false;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>winkelmandje</title>

    <style>
    .winkelrek{
        float:left;
        width: 48%;
        padding: 0 1%;
    }

    .winkelmandje{
        float: right;
        width:48%;
		padding: 0 1%;
		background-color:lightgrey;
		border-radius:3px;
    }

    .winkelmandje h1, h2, h3{
        border-bottom: 1px solid whitesmoke;
    }
    
    </style>

</head>
<body>

<h1>winkelen</h1>
<section class="cf">
				<section class="winkelrek">
					<h2>Winkelrek</h2>
					<p>Klik op een product om het aan het winkelmandje toe te voegen</p>
					<form action="<?= $currentPage?>" method="POST">
						<ul>
							<li><button value="tros-bananen" name="add">Tros bananen</button></li>
							<li><button value="appelsienen" name="add">Appelsienen</button></li>
							<li><button value="koffie" name="add">Koffie</button></li>
							<li><button value="melk" name="add">Melk</button></li>
						</ul>
					</form>
				</section>
				
				<section class="winkelmandje">
					
					<h2>Winkelmandje</h2>
				
						<h3>producten</h3>

						<?php if (!$leegWinkelmandje): ?>
							<form action="<?= $currentPage?>" method="POST">
								<ul>
									<?php foreach($producten as $product => $aantal): ?>
										<li><button name="remove" value="<?= $product ?>">x</button> <?= $product ?> <button name="subtract" value="<?= $product ?>">-</button> (<?=  $aantal ?>) <button name="add" value="<?= $product ?>">+</button></li>
									<?php endforeach ?>
								</ul>
							</form>
						<?php else: ?>
							<p>Nog geen producten in het mandje!</p>
						<?php endif ?>

				</section>
			</section>
		
			<hr>	
				<a href="<?= $currentPage ?>?session=destroy">Verlaat de winkel</a>
			<hr>
</body>
</html>