<?php
include_once('php/conectar.php');
// SELECT *
// FROM restaurante
// INNER JOIN res_comida ON restaurante.id_restaurante = res_comida.res_id_restaurante_fk
// INNER JOIN res_ambiente ON restaurante.id_restaurante = res_ambiente.res_id_restaurante
// INNER JOIN res_preco ON restaurante.id_restaurante = res_preco.id_res;

?>
<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<form class="form-inline my-2 my-lg-0" name="frmBusca" method="POST" action="testepesquisa.php">
                        <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Search" name="palavra">
                        <button class="btn btn-outline-info-light my-2 my-sm-0" type="submit" value="buscar">Buscar</button>
</form>
<?php
if(isset($_POST['palavra'])){
    $palavra = $_POST['palavra'];
    $sql = "SELECT * FROM restaurante where restaurante.nome_restaurante like '%$palavra%'";
    $buscar = mysqli_query($conn,$sql);
    if($buscar === FALSE) {
        // Consulta falhou, parar aqui 
        die(mysqli_error());
    }
    while($restaurante = mysqli_fetch_assoc($buscar)){
        echo "<li class='list-group-item list-group-item-action'>".$restaurante['nome_restaurante']."</li>";
    }
}    
?>     
</body>
</html>