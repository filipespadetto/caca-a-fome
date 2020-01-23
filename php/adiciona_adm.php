<?php
include_once("conectar.php");

$p_nome = $_POST['admNome'];
$u_nome = $_POST['admSnome'];
$email = $_POST['admMail'];
$senha = $_POST['admSenha'];
$cargo = $_POST['admCargo'];

$sql = "INSERT INTO usuario (p_nome, u_nome, email, usuario, senha, tipo_usuario_id_tipo)
VALUES ('$p_nome', '$u_nome', '$email', CONCAT('@adm_', '$p_nome'), '$senha', '$cargo')";

if($conn->query($sql) === TRUE){
    echo "<script>
    alert('Cadastrado com sucesso!');
    </script>";
}else{
    echo "<script>
    alert('Erro ao cadastrar, tente novamente!');
    </script>";
    echo "Erro: " . $sql . "<br>" . $conn->error . "<br>" . "<a href='../paineladm_add_adm.php'>Clique aqui para tentar novamente</a>";
}

$conn->close();

?>