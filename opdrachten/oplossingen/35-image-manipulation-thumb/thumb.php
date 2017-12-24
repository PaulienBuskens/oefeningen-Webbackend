<?php

    function __autoload($classname){
        require_once($classname . '.php');
    }

    var_dump($_POST);
    var_dump($_FILES);

    if(isset($_POST['submit'])){

        $image = new Image ( $_FILES['image']['name'],
                            $_FILES['image']['type'],
                            $_FILES['image']['tmp_name'],
                            $_FILES['image']['error'],
                            $_FILES['image']['size']);
        
        $isType = $image->validateType( array("image/jpeg", "image/png", "image/gif"));
        $isSize = $image->validateSize(5000000);
        $hasError = $image->validateError( );

        if($isType && $isSize && !$hasError){
            $isuploaded = $image->upload( 'img/' );

            if($isuploaded){
                $hasThumbnail = $image->createthumbnail(100,100);

                if($hasThumbnail){
                    $data['src'] = $image->getThumbnailFilename();
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../_assets/css/global.css">
</head>
<body>
    <h1>Voorbeeld van image manipulation: resizing + cropping</h1>

        <img src="img/thumbnails/<?=$data['src']?>" alt="verkleinde afbeelding">
</body>
</html>