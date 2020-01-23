<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../lib/node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet"  href="../lib/node_modules/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/display_painel.css"/>
</head>
<body>

<?php
include_once("conectar.php");

$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$ambiente = $_POST['ambiente'];
$comida = $_POST['comida'];

$sql = "SELECT * FROM restaurante
INNER JOIN especialidade ON restaurante.esp_restaurante = especialidade.id_especialidade
INNER JOIN localidade ON restaurante.localidade_id_local = localidade.id_local
INNER JOIN cidade ON localidade.cidade_id_cidade = cidade.id_cidade
INNER JOIN bairro ON localidade.bairro_id_bairro = bairro.id_bairro
INNER JOIN res_ambiente ON restaurante.id_restaurante = res_ambiente.res_id_restaurante
INNER JOIN ambiente ON res_ambiente.amb_id_ambiente = ambiente.id_ambiente
INNER JOIN res_comida ON restaurante.id_restaurante = res_comida.res_id_restaurante_fk
INNER JOIN tipo_comida ON res_comida.com_id_tipo_comida = tipo_comida.id_comida
WHERE localidade.cidade_id_cidade = $cidade AND localidade.bairro_id_bairro = $bairro
AND res_ambiente.amb_id_ambiente = $ambiente AND res_comida.com_id_tipo_comida = $comida;";
// echo $sql;
// exit();

$result = $conn->query($sql);

if($result->num_rows > 0){
    // $retorno = array();
    while($row = $result->fetch_assoc()){
        // $retorno[] = $row;
        echo "<ul class='list-group minhaLista' style='text-align: center;'>
                <li class='list-group-item list-group-item-action' style='background-color: #333333; color: #fff;'><h5>".utf8_encode($row["nome_restaurante"])."</h5></li>
                <li class='list-group-item list-group-item-action'><h6>".utf8_encode($row["descricao_restaurante"])."<h6/></li>
                <li class='list-group-item list-group-item-action'><h5>Especialidade</h5><h6>".utf8_encode($row["desc_especialidade"])."<h6/></li>
                <li class='list-group-item list-group-item-action'><h5>Serve</h5><h6>".utf8_encode($row["desc_comida"])."<h6/></li>
                <li class='list-group-item list-group-item-action'><h5>Tipo de ambiente</h5><h6>".utf8_encode($row["desc_ambiente"])."<h6/></li>
                
                <li class='list-group-item list-group-item-action'><h5>Abre de </h5><h6>".utf8_encode($row["hora_inicio"])."<h6/>
                <h5>até </h5><h6>".utf8_encode($row["hora_fim"])."<h6/></li>

                <li class='list-group-item list-group-item-action'><h5>Funciona de</h5><h6>".utf8_encode($row["dia_inicio"])."<h6/>
                <h5>a </h5><h6>".utf8_encode($row["dia_fim"])."<h6/></li>

                <li class='list-group-item list-group-item-action' style='background-color: #333333; color: #fff;'><b>Mais informações</b></li>

                <li class='list-group-item list-group-item-action'><h5>Telefone</h5><h6>".utf8_encode($row["telefone_restaurante"])."<h6/></li>
                <li class='list-group-item list-group-item-action'><h5>Celular</h5><h6>".utf8_encode($row["celular_restaurante"])."<h6/></li>
                <li class='list-group-item list-group-item-action'><h5>E-mail</h5><h6>".utf8_encode($row["email_restaurante"])."<h6/></li>
            </ul>";

        echo "<br><br>";

        echo "<a href='javascript:history.back()' class='btn btn-primary'>Voltar</a>";
    }
    // echo json_encode($retorno);
}
else{
    echo "<div class='alert alert-info' role='alert'>
            <h4 class='alert-heading'>Info</h4>
            <p>Lamentamos, não encontramos nenhum restaurante!</p>
            <hr>
            <p class='mb-0'>Em breve ele poderá estar por aqui!</p>
        </div>";
}
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../lib/node_modules/jquery/dist/jquery.js"></script>
    <script src="../lib/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="../lib/node_modules/bootstrap/dist/js/bootstrap.js"></script>

</body>
</html>