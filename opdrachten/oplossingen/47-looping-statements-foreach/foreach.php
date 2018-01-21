<?php
    $text = file_get_contents('text-file.txt');

    $characterArray = str_split($text);

    rsort($characterArray);

    $characterSortedReversed = array_reverse($characterArray);

    $tellerArray = array();

    foreach($characterSortedReversed as $value){
        if(isset($tellerArray[$value])){
            ++$tellerArray[$value];
        }else{
            $tellerArray[$value]=1;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Array van z naar A</h1>
    <pre><?php// var_dump($characterArray) ?></pre>

    <h1>Array reversed</h1>
    <pre><?php// var_dump($characterSortedReversed) ?></pre>

    <h1>Array resersed</h1>
    <pre><?php //var_dump($tellerArray) ?></pre>
</body>
</html>