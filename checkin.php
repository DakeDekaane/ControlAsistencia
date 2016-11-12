<?php

    require 'database.php';

    // guardar valores post
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];
     
    // insert data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM Becarios where nickname='".$nickname."'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $data = $q->fetch(PDO::FETCH_ASSOC);
    
    if (!$data['nickname']) {
        echo '<span class="red-text">Error. Nickname no registrado</span>';
    }

    else if ($data['status'] == 'ACTIVO') {
        echo '<span class="blue-text">¡Ya has registrado tu entrada antes!</span>';
    }
    
    else if($data['password'] == $password ){
        $sql = "UPDATE Becarios SET status = 'ACTIVO' WHERE nickname = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nickname));
        $sql = "INSERT INTO HorarioBecario (becario,hora_entrada) values(?, NOW())";
        $q = $pdo->prepare($sql);
        $q->execute(array($nickname));
        echo '<span class="green-text">¡Listo!</span>';
    }
    else {
        echo '<span class="red-text">Contraseña errónea. Intente de nuevo.</span>';
    }

    Database::disconnect();
    exit();

?>
