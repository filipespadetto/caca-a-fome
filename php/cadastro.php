<?php
include_once("conectar.php");

$p_nome = $_POST['p_nome'];
$u_nome = $_POST['u_nome'];
$usuario = $_POST['usuario'];
$email1 = $_POST['email1'];
$email2 = $_POST['email2'];
$senha = $_POST['senha'];

$sql = "INSERT INTO usuario (p_nome, u_nome, email, usuario, senha, tipo_usuario_id_tipo) 
VALUES ('$p_nome', '$u_nome', '$email1', '$usuario', '$senha', 0)";

if ($conn->query($sql) === TRUE) {
  echo "<script>
  alert('Cadastrado com sucesso!');
  </script>";
  header('Location: ../principal.php');
} else {
  echo "<script>
  alert('Erro no cadastro, tente novamente!');
  </script>";
  echo "Erro: " . $sql . "<br>" . $conn->error . "<br>" . "<a href='../index.html'>Clique aqui para realizar um novo cadastro</a>";
}

$conn->close();
?>