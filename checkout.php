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

    else if ($data['status'] == 'INACTIVO') {
        echo '<span class="blue-text">¡Ya has registrado tu salida antes!</span>';
    }
    
    else if($data['password'] == $password ){
        $sql = "UPDATE Becarios SET status = 'INACTIVO' WHERE nickname = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nickname));
        
        $sql = "SELECT id_horariobecario FROM HorarioBecario WHERE becario = ? ORDER BY id_horariobecario DESC LIMIT 1";
        $q = $pdo->prepare($sql);
        $q->execute(array($nickname));
        $aux = $q->fetch(PDO::FETCH_ASSOC);
        $last_row = $aux['id_horariobecario'];

        $sql = "UPDATE HorarioBecario SET hora_salida = NOW() WHERE id_horariobecario = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($last_row));

        echo '<span class="green-text">¡Listo!</span>';
    }
    else {
        echo '<span class="red-text">Contraseña errónea. Intente de nuevo.</span>';
    }

    Database::disconnect();
    exit();

?>
