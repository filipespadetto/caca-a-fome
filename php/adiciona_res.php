<?php
include_once("conectar.php");

// CAPTURANDO DADOS SEQUENCIALMENTE
// INÍCIO PARTE 1
$nome = $_POST['inputNome'];
// echo $nome;
$especialidade = $_POST['inputEsp'];
// echo $especialidade;

$comida1 = $_POST['inputComida1'];
// echo $comida1;
$comida2 = $_POST['inputComida3'];
// echo $comida2;
$comida3 = $_POST['inputComida3'];
// echo $comida3;

$desc = $_POST['inputDes'];
// echo $desc;


$ambiente1 = $_POST['inputAmbiente1'];
// echo $ambiente1;
$ambiente2 = $_POST['inputAmbiente2'];
// echo $ambiente2;
$ambiente3 = $_POST['inputAmbiente3'];
// echo $ambiente3;

$preco1 = $_POST['inputPreco1'];
// echo $preco1;
$preco2 = $_POST['inputPreco2'];
// echo $preco2;

// FIM PARTE 1

// INÍCIO PARTE 2
$logadouro = $_POST['inputLog'];
// echo $logadouro;
$numero = $_POST['inputNum'];
// echo $numero;
$bairro = $_POST['inputBairro'];
// echo $bairro;
$cidade = $_POST['inputCidade'];
// echo $cidade;
$cep = $_POST['inputCep'];
// echo $cep;
// FIM PARTE 2

// INÍCIO PARTE 1
$horai = $_POST['inputHoraIni'];
// echo $horai;
$horaf = $_POST['inputHoraFim'];
// echo $horaf;
$semana1 = $_POST['semana1'];
// echo $semana1;
$semana2 = $_POST['semana2'];
// echo $semana2;

$telefone = $_POST['inputTel'];
// echo $telefone;
// exit;
$celular = $_POST['inputCel'];
$email = $_POST['inputMail'];

// FIM PARTE 1

// INSERE DADOS DO LOCAL DO RESTAURANTE
$sql = "INSERT INTO localidade
(logadouro, numero_local, cep_local, cidade_id_cidade, bairro_id_bairro)
VALUES ('$logadouro', '$numero', '$cep', $cidade, $bairro);";

// INSERE DADOS DO RESTAURANTE
$sql .= "INSERT INTO restaurante
(nome_restaurante, descricao_restaurante, hora_inicio, hora_fim, dia_inicio, dia_fim, 
telefone_restaurante, celular_restaurante, email_restaurante, esp_restaurante, localidade_id_local)
VALUES ('$nome', '$desc', '$horai', '$horaf', '$semana1', '$semana2',
'$telefone', '$celular', '$email', $especialidade, (SELECT LAST_INSERT_ID()));";

// INSERE TIPO DE AMBIENTE 1
$sql .= "INSERT INTO res_ambiente
(res_id_restaurante, amb_id_ambiente) VALUES ((SELECT id_restaurante FROM restaurante ORDER BY id_restaurante DESC LIMIT 1), $ambiente1);";

// INSERE TIPO DE AMBIENTE 2
if($ambiente2 == NULL){

}else{
    $sql .= "INSERT INTO res_ambiente
    (res_id_restaurante, amb_id_ambiente) VALUES ((SELECT id_restaurante FROM restaurante ORDER BY id_restaurante DESC LIMIT 1), $ambiente2);";
}

// INSERE TIPO DE AMBIENTE 3
if($ambiente3 == NULL){

}else{
    $sql .= "INSERT INTO res_ambiente
    (res_id_restaurante, amb_id_ambiente) VALUES ((SELECT id_restaurante FROM restaurante ORDER BY id_restaurante DESC LIMIT 1), $ambiente3);";
}

// INSERE TIPO DE COMIDA 1
$sql .= "INSERT INTO res_comida 
(res_id_restaurante_fk, com_id_tipo_comida) VALUES ((SELECT id_restaurante FROM restaurante ORDER BY id_restaurante DESC LIMIT 1), $comida1);";

// INSERE TIPO DE COMIDA 2
if($comida2 == NULL){

}else{
    $sql .= "INSERT INTO res_comida 
    (res_id_restaurante_fk, com_id_tipo_comida) VALUES ((SELECT id_restaurante FROM restaurante ORDER BY id_restaurante DESC LIMIT 1), $comida2);";
}

// INSERE TIPO DE COMIDA 3
if($comida3 == NULL){

}else{
    $sql .= "INSERT INTO res_comida 
    (res_id_restaurante_fk, com_id_tipo_comida) VALUES ((SELECT id_restaurante FROM restaurante ORDER BY id_restaurante DESC LIMIT 1), $comida3);";
}

// INSERE PREÇO MÉDIO 1
$sql .= "INSERT INTO res_preco (id_res, id_preco)
VALUES ((SELECT id_restaurante FROM restaurante ORDER BY id_restaurante DESC LIMIT 1), $preco1);";
// INSERE PREÇO MÉDIO 2
$sql .= "INSERT INTO res_preco (id_res, id_preco)
VALUES ((SELECT id_restaurante FROM restaurante ORDER BY id_restaurante DESC LIMIT 1), $preco2);";

// echo $sql;

if ($conn->multi_query($sql) === TRUE) {
    mysqli_commit($conn);
    echo "<script>
    alert('Cadastrado com sucesso!');
    </script>";
    header('Location: ../paineladm_add_res.php');
} else {
    echo "<script>
    alert('Erro ao cadastrar, tente novamente!');
    </script>";
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>