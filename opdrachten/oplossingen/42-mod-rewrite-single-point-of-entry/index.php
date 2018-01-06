<?php echo $_SERVER['HTTP_HOST'] . preg_replace('/artikels.#$/', '', $_SERVER['REQUEST_URI'])?>

<pre><?php print_r($_GET)?></pre>

<?php

    function __autoload($classname){
        include_once 'classes/' . $classname . '.php';

    }

    $controller = (isset($_GET['controller'])) ? $_GET['controller'] : 'overview';
    $tabel = (isset($_GET['tabel'])) ? $_GET['tabel'] : 'bieren';
    $id = (isset($_GET['thirdGet'])) ? $_GET['id'] : 1;

    switch($controller){

        case 'insert':
            $insert = new Insert($tabel);
            break;
        case 'delete':
            $delete = new Delete($tabel, $id);
            break;
        case 'update':
            $update = new Update($tabel, $id);
            break;
        default:
            $overview = new Overview($tabel, $id);
        
    }

?>