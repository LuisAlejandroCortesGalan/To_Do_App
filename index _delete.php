<?php

include_once "connection.php";
include_once "colores.php";



// $colores = ["darkblue"=>"azul", "darkgreen"=>"verde", "darkred" =>"rojo", "black" => "negro", "darkorange" => "naranja" ];


$select = "SELECT * FROM app
WHERE estado = 'white'
ORDER BY 
--   CASE 
--       WHEN estado = 'darkred' THEN 1
--       WHEN estado = 'darkorange' THEN 2
--       WHEN estado = 'darkblue' THEN 3
--       WHEN estado = 'darkgreen' THEN 4
--       ELSE 5 END,
      fecha DESC";


$select_prepare = $conn->prepare($select);
$select_prepare->execute();

$resultado_select = $select_prepare->fetchAll(); //aqui se guarda la informacion de la tabla

//var_dump($resultado_select);

/*  foreach($reultado_select as $key => $value) {
    echo $value['color']. "<br>";
} */

if ($_POST) {

    var_dump($_POST);
    $descripcion = $_POST["descripcion"];
    $titulo = $_POST["titulo"];
    $estado = $_POST["estado"];
    $colorines = $colores[$estado];
    $fecha_user = $_POST["fecha_user"];

    echo "Colorines :".$colorines;


    $insert = "INSERT INTO app (estado, titulo, estado_user, descripcion, fecha_user) values (?,?,?,?,?)";
    $insert_prepare = $conn->prepare($insert);
    $insert_prepare->execute([$estado, $titulo, $colorines, $descripcion, $fecha_user]);

    $insert_prepare = null;
    $conn = null;

    header("location:index.php");
}



// if ($_GET) {
//     echo $_GET['id'],"<br>";
//     echo $_GET['titulo'],"<br>";
//     echo $_GET['estado'],"<br>";
// }
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizacion de tareas</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h1 class="text-center m-5">Elementos Borrados</h1>
        <a href="index.php">
            <div>
                <img src="img/Go-back.png" alt="papelera de reciclaje">
                <p>Volver al Inicio</p>
            </div>
        </a>

</nav>
    </header>

    <main class="container">
            <section class=" section1">

                <?php foreach ($resultado_select as $row) : ?>
                    <div style="border: black solid 2px; color: black; background-color: <?= $row["estado"] ?>" class="row alert" role="alert">
                        <div class="col-sm-9">
                          <h2><?= $row["titulo"]?></h2><p><?=$row["descripcion"]?></p>
                        </div>

                        <div class="col-sm-3 text-end">
                            <span><?= $row["fecha_user"] ?></span><br>
                            <a href="update_to_index.php?id=<?= $row["id"] ?>&titulo=<?= $row["titulo"] ?>&estado=<?= $row["estado"] ?>&descripcion=<?= $row["descripcion"] ?>&fecha_user=<?= $row["fecha_user"] ?>">Reparar tarea🛠️</a><br>
                            <a href="delete_real.php?id=<?= $row["id"] ?>">Eliminar definitivamente❌</a>
                        </div>
                    </div>
                <?php endforeach ?>
            </section>
        </div>
    </main>
</body>
</html>