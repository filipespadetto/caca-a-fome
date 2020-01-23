<?php
include_once("conectar.php");

$id = $_POST['idNome'];
$nome = $_POST['inputNome'];
$especialidade = $_POST['inputEsp'];

$comida1 = $_POST['inputComida1'];
$comida2 = $_POST['inputComida3'];
$comida3 = $_POST['inputComida3'];

$desc = $_POST['inputDes'];

$ambiente1 = $_POST['inputAmbiente1'];
$ambiente2 = $_POST['inputAmbiente2'];
$ambiente3 = $_POST['inputAmbiente3'];

$preco1 = $_POST['inputPreco1'];
$preco2 = $_POST['inputPreco2'];

$logadouro = $_POST['inputLog'];
$numero = $_POST['inputNum'];
$bairro = $_POST['inputBairro'];
$cidade = $_POST['inputCidade'];
$cep = $_POST['inputCep'];

$horai = $_POST['inputHoraIni'];
$horaf = $_POST['inputHoraFim'];
$semana1 = $_POST['semana1'];
$semana2 = $_POST['semana2'];

$telefone = $_POST['inputTel'];
$celular = $_POST['inputCel'];
$email = $_POST['inputMail'];


$sql = "UPDATE localidade
INNER JOIN restaurante ON localidade.id_local = restaurante.localidade_id_local
SET logadouro = '$logadouro', numero_local = '$numero', cep_local = '$cep',
cidade_id_cidade = $cidade, bairro_id_bairro = $bairro
WHERE restaurante.localidade_id_local = $id;";

$sql .= "UPDATE restaurante 
SET nome_restaurante='$nome', descricao_restaurante='$desc', hora_inicio='$horai', hora_fim='$horaf', dia_inicio='$semana1', dia_fim='$semana2',
telefone_restaurante='$telefone', celular_restaurante='$celular', email_restaurante='$email', esp_restaurante=$especialidade
WHERE restaurante.localidade_id_local = $id;";

// ALTERA TIPO DE AMBIENTE 1
$sql .= "UPDATE res_ambiente
SET amb_id_ambiente=$ambiente1
WHERE res_id_restaurante = $id;";

// ALTERA TIPO DE AMBIENTE 2
if($ambiente2 == NULL){

}else{
    $sql .= "UPDATE res_ambiente
    SET amb_id_ambiente=$ambiente2
    WHERE res_id_restaurante = $id;";
}

// ALTERA TIPO DE AMBIENTE 3
if($ambiente3 == NULL){

}else{
    $sql .= "UPDATE res_ambiente
    SET amb_id_ambiente=$ambiente3
    WHERE res_id_restaurante = $id;";
}

// INSERE TIPO DE COMIDA 1
$sql .= "UPDATE res_comida
SET com_id_tipo_comida = $comida1
WHERE res_id_restaurante_fk = $id;";

// INSERE TIPO DE COMIDA 2
if($comida2 == NULL){

}else{
    $sql .= "UPDATE res_comida
    SET com_id_tipo_comida = $comida2
    WHERE res_id_restaurante_fk = $id;";
}

// INSERE TIPO DE COMIDA 3
if($comida3 == NULL){

}else{
    $sql .= "UPDATE res_comida
    SET com_id_tipo_comida = $comida3
    WHERE res_id_restaurante_fk = $id;";
}

// ALTERA PREÇO MÉDIO 1
$sql .= "UPDATE res_preco
SET id_preco = 5
WHERE id_res = 5;";

// ALTERA PREÇO MÉDIO 2
$sql .= "UPDATE res_comida
SET id_preco = 13
WHERE id_res = 5;";

if ($conn->multi_query($sql) === TRUE) {
    mysqli_commit($conn);
    echo "<script>
    alert('Alterado com sucesso!');
    </script>";
    header('Location: ../painel_sp_adm_edita_res.php');
} else {
    echo "<script>
    alert('Erro ao cadastrar, tente novamente!');
    </script>";
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>