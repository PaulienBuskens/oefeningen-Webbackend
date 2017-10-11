<?php

	function __autoload( $className ) {
	    include 'classes/' . $className . '-class.php';
	}

	$new	=	150;
	$unit	=	100;

	$percent = new Percent( $new, $unit );

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style>
	
	table
	{
		border-collapse:collapse;

	}

	td
	{
		padding:6px;
		border:1px solid #666666;
	}

	td:last-child
	{
		text-align:right;
	}

	</style>

</head>
<body>

<table>
	<caption>Hoe staat <?= $new ?> in verhouding tot <?= $unit ?>?</caption>
	<tr>
		<td>Relatief</td>
		<td><?= $percent->relative ?></td>
	</tr>
	<tr>
		<td>Procentueel</td>
		<td><?= $percent->hundred ?>%</td>
	</tr>
	<tr>
		<td>Nominaal</td>
		<td><?= $percent->nominal ?></td>
	</tr>
	
</table>

</body>
</html>
