<?php

$username = 'Paulien';
$password = 'Buskens';
$message  = 'Please log in';

if(isset($_POST['submit'])){

    if($_POST['username'] == $username && $_POST['password']== $password){

        $message = 'Welkom';
    } else {
        $message = 'Er ging iets mis. Probeer het nog eens';
    }
}

?>

<!doctype html>
<html>
    <head>
        <title>Opdracht post</title>
    </head>
    <body class="php-inleiding">
        
            <h1>Opdracht post: deel 1</h1>
            <h2>Log in</h2>
            
           <p><?php echo $message ?></p>

           <form action="17-post.php" methode="POST">
           
           <ul>
                <li>
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" value= "Paulien">
                </li>
                <li>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" value= "Buskens">
                </li>
           </ul>

            <input type="submit" name="submit" value="Send">
           
           </form>
    </body>
</html>
