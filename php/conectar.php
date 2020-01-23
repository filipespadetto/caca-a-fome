<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'caca_fome_db';

//CRIA CONEXÃO
$conn = new mysqli($servername, $username, $password, $dbname);
//VERIFICA CONEXÃO
if($conn->connect_error){
  die("Falha na conexão: " . $conn->connect_error);
}
?>