<?php
include_once('php/conectar.php');
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM restaurante
            INNER JOIN especialidade ON restaurante.esp_restaurante = especialidade.id_especialidade
            INNER JOIN localidade ON restaurante.localidade_id_local = localidade.id_local
            INNER JOIN cidade ON localidade.cidade_id_cidade = cidade.id_cidade
            INNER JOIN bairro ON localidade.bairro_id_bairro = bairro.id_bairro
            INNER JOIN res_ambiente ON restaurante.id_restaurante = res_ambiente.res_id_restaurante
            INNER JOIN ambiente ON res_ambiente.amb_id_ambiente = ambiente.id_ambiente
            INNER JOIN res_comida ON restaurante.id_restaurante = res_comida.res_id_restaurante_fk
            INNER JOIN tipo_comida ON res_comida.com_id_tipo_comida = tipo_comida.id_comida
            WHERE restaurante.id_restaurante = $id;";
   
    $buscar = mysqli_query($conn,$sql);
  //  print_r($buscar);
    if($buscar === FALSE){
        // Consulta falhou, parar aqui 
        die(mysqli_error());
    }else{
        $retorno = array();
        while($row = $buscar->fetch_assoc()){
            $retorno[] = $row;
            //echo "<h5>".utf8_encode($row["nome_restaurante"])."</h5>";
        }
        //print_r($retorno);
        echo json_encode($retorno);
    }

  
} 

?>