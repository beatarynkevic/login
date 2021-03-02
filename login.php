<?php //i si puslapi ateinam su get metodu
require __DIR__.'/bootstrap.php'; //kodas bendras visiems

//logout scenarijus
if(isset($_GET['logout'])) {
    //keli budai. Pirma, paprastesnis
    // $_SESSION['login'] = 0;
    // unset($_SESSION['user']);

    //kitas
    session_destroy();
    header('Location:' .URL. 'login.php');
    die;
}

//jau prisijungusio vartotojo scenarijus
if(isset($_SESSION['login']) && 1 == $_SESSION['login']){
    header('Location:'. URL.'private.php');
    die;
}


//POST metodo scenarijus. Kas ivyksta jeigu spaudziam login?
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $users = file_get_contents(__DIR__.'/users.json');      //nuksaitom users
    $users = json_decode($users, 1);    //json stringa verciam i masyva
    $postName = $_POST['name'] ?? '';   //is post gauti duomenis
    $postPass = $_POST['pass'] ?? ''; //pasitikrinti ar pass atitinka hash

    foreach($users as $user) {
        if($postName == $user['name']) {
            if(password_verify($postPass, $user['pass'])) { //tikrinam slaptazodi
                $_SESSION['login'] = 1; //sesijos login 1 yra tiem users kas prisilogina
                //o 0 reiks neprisijungusi
                $_SESSION['user'] = $user;
                header('Location: '.URL. 'private.php');
                die;
            }
        }
    }

    $_SESSION['error_msg'] = 'Password or Name is invalid';
    header('Location: '.URL. 'login.php'); //grazinam logintis
    die;
}
//prisijungimo formos rodymo scenarijus
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login page</h1>
    <?php
    // pranesimu rodymo skyreli!!!
    // jeigu egzistuoja pranesimas kuri mes norime rodyti(sesijoje irasytas)
    if(isset($_SESSION['error_msg'])): ?>
    <!-- pranesimas yra,atvaizduojam -->
        <h3 style='color:red'><?= $_SESSION['error_msg'] ?></h3>
        <!-- atvaizduojame.nebereikalinga istrinam, kad nerodytu sekanti karta -->
        <?php unset($_SESSION['error_msg']) ?>

    <?php endif?>
    <form action="<?= URL ?>login.php" method="post">
        NAME:<input type="text" name="name">
        PASSWORD:<input type="password" name="pass">
        <button type="submit">login</button>
    </form>
</body>
</html>