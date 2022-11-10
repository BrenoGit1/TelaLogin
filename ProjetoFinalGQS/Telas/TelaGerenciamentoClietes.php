<?php

    include('../Protect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Você conseguil, <?php echo $_SESSION['email']; ?>.

    <p>
        <a href="../Logout.php">Sair</a>
    </p>
</body>
</html>