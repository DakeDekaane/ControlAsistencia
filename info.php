<?php

    require 'database.php';

    // guardar valores post
    $nickname = $_POST['nickname'];
         
    // insert data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT name,status FROM Becarios WHERE nickname = '".$nickname."'";
    $q = $pdo->prepare($sql);
    $q->execute();
    $data = $q->fetch(PDO::FETCH_ASSOC);
    if (!$data['name']) {
        echo '<span class="red-text">Error. Nickname no registrado</span>';
    }
    else {
        $name = $data['name'];
        $status = $data['status'];

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT hora_entrada,hora_salida FROM HorarioBecario WHERE becario = '".$nickname."'";
?>
<div class="col l10 offset-l1 m10 offset-m1 s12 center">
<table class="highlight centered bordered">
<caption>
    <ul>
    <li><b>Becario: </b><?php echo $name;?></li>
    <li><b>Estado: </b><?php echo $status;?></li>
</ul>
</caption>
    <thead class="blue lighten-2 white-text">
        <tr>
            <th>Entrada</th>
            <th>Salida</th>
        </tr>
    </thead>
<?php
    foreach ($pdo->query($sql) as $row) {
        echo '<tr>';
        echo '<td>'.$row['hora_entrada'].'</td>';
        echo '<td>'.$row['hora_salida'].'</td>';
        echo '</tr>';
    }
?>
</table>
</div>
<?php
    }
    Database::disconnect();
    exit();

?>

