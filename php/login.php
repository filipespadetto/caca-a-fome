<?php
include_once("conectar.php");

$usr = $_POST['usr'];
$pswd1 = $_POST['pswd1'];

if(empty($_POST['usr']) || empty($_POST['pswd1'])) {
	header('Location: ../index.html');
	exit();
}

$sql = "SELECT * FROM usuario 
WHERE (email = '$usr' AND senha = '$pswd1') OR (usuario = '$usr' AND senha = '$pswd1')";

$result = $conn->query($sql);

if($result->num_rows > 0){
    if($row = $result->fetch_assoc()){
        if($row['tipo_usuario_id_tipo'] == 0){
            header('Location: ../principal.php');
        }
        elseif($row['tipo_usuario_id_tipo'] == 1){
            header('Location: ../paineladm.php');
        }
        else{
            header('Location: ../painel_sp_adm.php');
        }
    }
}
else{
    header('Location: ../index.html');
}
?>