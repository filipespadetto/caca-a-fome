<?php
include_once("conectar.php");

$id = $_POST['idNome'];

$sql = "DELETE FROM restaurante WHERE id_restaurante = $id;";

$sql .= "DELETE localidade
FROM localidade
INNER JOIN restaurante ON localidade.id_local = restaurante.localidade_id_local
WHERE restaurante.localidade_id_local = $id;";

$sql .= "DELETE FROM res_ambiente WHERE res_id_restaurante = $id;";

$sql .= "DELETE FROM res_comida WHERE res_id_restaurante_fk = $id;";

$sql .= "DELETE FROM res_preco WHERE id_res = $id;";

if ($conn->multi_query($sql) === TRUE) {
    mysqli_commit($conn);
    echo "<script>
    alert('Dados deletados com sucesso!');
    </script>";
} else {
    echo "<script>
    alert('Erro ao deletar, tente novamente!');
    </script>";
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>