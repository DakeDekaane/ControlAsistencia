<?php

    require 'database.php';

    // guardar valores post
    $nickname = $_POST['nickname'];
    $name = $_POST['name'];
    $password = $_POST['password'];
     
    // insert data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO Becarios (nickname,name,password,status) values(?, ?, ?, 'INACTIVO')";
    $q = $pdo->prepare($sql);
    try {
          $q->execute(array($nickname,$name,$password));
          echo '<span class="green-text">Registro exitoso.</span>';
    }
    catch(PDOException $e) {
        echo '<span class="red-text">Error. Nickname ya registrado</span>';
    }
    Database::disconnect();
    exit();

?>
