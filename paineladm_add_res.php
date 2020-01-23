<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="lib/node_modules/bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet"  href="lib/node_modules/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/display_painel.css"/>
</head>
<body>
    <!-- CONEXÃO COM O BANCO -->
    <?php
    include_once("php/conectar.php");
    ?>

    <div class="container-fluid">
        <!-- MENU ADM -->
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-warning" style="width: 100%">
                <a class="navbar-brand" href="paineladm.php">Painel do Administrador</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="paineladm.php">Consultar restaurantes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="paineladm_add_res.php">Cadastrar restaurantes<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="paineladm_add_adm.php">Incluir administrador</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Search">
                        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Ok</button>
                    </form>
                </div>
            </nav>
        </div>

        <!-- COMPONENTES PARA CADASTRO DE RESTAURANTE -->
        <div id="cadastraRestaurante">
            <h4>Cadastrar restaurante</h4>
            <form method="POST" action="php/adiciona_res.php">
                <br>
                <h5>Dados do restaurante</h5>
                <h6>* item obrigatório</h6>
                <br>
                <!-- NOME -->
                <div class="form-group row">
                    <label for="inputNome" class="col-sm-2 col-form-label">Nome *</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="inputNome" placeholder="Nome do restaurante..." required>
                    </div>
                </div>

                <!-- ESPECIALIDADE -->
                <div class="form-group row">
                    <label for="inputEsp" class="col-sm-2 col-form-label">Especialidade *</label>
                    <div class="col-sm-4">
                        <select class="custom-select" style="width: 100%" name="inputEsp">
                            <option value="<?php NULL ?>" selected>Selecione...</option>
                            <?php
                                
                                $query = $conn->query("SELECT * FROM especialidade");
                                while($row = $query->fetch_assoc()){
                                    echo "<option value=".$row["id_especialidade"].">".utf8_encode($row["desc_especialidade"])."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- TIPOS DE COMIDA -->
                <div class="form-group row">
                    <label for="inputCom" class="col-sm-2 col-form-label">Tipos de comida *</label>
                    <div class="col-sm-3">
                        <select class="custom-select" style="width: 100%" name="inputComida1">
                            <option value="<?php NULL ?>" selected>Selecione...</option>
                            <?php
                                $query = $conn->query("SELECT * FROM tipo_comida");
                                while($row = $query->fetch_assoc()){
                                    echo "<option value=".$row["id_comida"].">".utf8_encode($row["desc_comida"])."</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <select class="custom-select" style="width: 100%" name="inputComida2">
                            <option value="<?php NULL ?>" selected>Selecione...</option>
                            <?php
                                $query = $conn->query("SELECT * FROM tipo_comida");
                                while($row = $query->fetch_assoc()){
                                    echo "<option value=".$row["id_comida"].">".utf8_encode($row["desc_comida"])."</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <select class="custom-select" style="width: 100%" name="inputComida3">
                            <option value="<?php NULL ?>" selected>Selecione...</option>
                            <?php
                                $query = $conn->query("SELECT * FROM tipo_comida");
                                while($row = $query->fetch_assoc()){
                                    echo "<option value=".$row["id_comida"].">".utf8_encode($row["desc_comida"])."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- DESCRIÇÃO BREVE -->
                <div class="form-group row">
                    <label for="inputDes" class="col-sm-2 col-form-label">Breve descrição sobre o estabelecimento *</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="inputDes" maxlength="255" max required></textarea>
                    </div>
                </div>

                <!-- TIPO DE AMBIENTE -->
                <div class="form-group row">
                    <label for="inputAmb" class="col-sm-2 col-form-label">Tipo de ambiente *</label>
                    <div class="col-sm-3">
                        <select class="custom-select" style="width: 100%" name="inputAmbiente1">
                            <option value="<?php NULL ?>" selected>Selecione...</option>
                            <?php
                            $query = $conn->query("SELECT * FROM ambiente");
                            while($row = $query->fetch_assoc()){
                                echo "<option value=".$row["id_ambiente"].">".utf8_encode($row["desc_ambiente"])."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <select class="custom-select" style="width: 100%" name="inputAmbiente2">
                            <option value="<?php NULL ?>" selected>Selecione...</option>
                            <?php
                            $query = $conn->query("SELECT * FROM ambiente");
                            while($row = $query->fetch_assoc()){
                                echo "<option value=".$row["id_ambiente"].">".utf8_encode($row["desc_ambiente"])."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <select class="custom-select" style="width: 100%" name="inputAmbiente3">
                            <option value="<?php NULL ?>" selected>Selecione...</option>
                            <?php
                            $query = $conn->query("SELECT * FROM ambiente");
                            while($row = $query->fetch_assoc()){
                                echo "<option value=".$row["id_ambiente"].">".utf8_encode($row["desc_ambiente"])."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- PREÇO MÉDIO -->
                <div class="form-group row">
                    <label for="inputPreco1" class="col-sm-2 col-form-label">Preço médio *</label>
                    <div class="col-sm-4">
                        <select class="custom-select" style="width: 100%" name="inputPreco1">
                            <option value="<?php NULL ?>" selected>Selecione...</option>
                            <?php
                                $query = $conn->query("SELECT * FROM preco_medio");
                                while($row = $query->fetch_assoc()){
                                    echo "<option value=".$row["id_preco"].">".$row["desc_preco"]."</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <label for="inputPreco2" class="col-sm-2 col-form-label">a *</label>
                    <div class="col-sm-4">
                        <select class="custom-select" style="width: 100%" name="inputPreco2">
                            <option value="<?php NULL ?>" selected>Selecione...</option>
                            <?php
                                $query = $conn->query("SELECT * FROM preco_medio");
                                while($row = $query->fetch_assoc()){
                                    echo "<option value=".$row["id_preco"].">".$row["desc_preco"]."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <br>
                <h5>Localização</h5>
                <!-- ENDEREÇO 1 -->
                <div class="form-group row">
                    <label for="inputLog" class="col-sm-2 col-form-label">Logadouro *</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="inputLog" placeholder="Rua ou avenida..." required>
                    </div>

                    <label for="inputNum" class="col-sm-2 col-form-label">Número *</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="inputNum" placeholder="Número..." required>
                    </div>
                </div>

                <!-- ENDEREÇO 2 -->
                <div class="form-group row">
                    <label for="inputBairro" class="col-sm-2 col-form-label">Bairro *</label>
                    <div class="col-sm-2">
                        <select class="custom-select" style="width: 100%" name="inputBairro">
                                <option value="<?php NULL ?>" selected>Selecione...</option>
                                <?php
                                    $query = $conn->query("SELECT * FROM bairro");
                                    while($row = $query->fetch_assoc()){
                                        echo "<option value=".$row["id_bairro"].">".utf8_encode($row["nome_bairro"])."</option>";
                                    }
                                ?>
                        </select>
                    </div>

                    <label for="inputCidade" class="col-sm-2 col-form-label">Cidade *</label>
                    <div class="col-sm-2">
                        <select class="custom-select" style="width: 100%" name="inputCidade">
                                <option value="<?php NULL ?>" selected>Selecione...</option>
                                <?php
                                    $query = $conn->query("SELECT * FROM cidade");
                                    while($row = $query->fetch_assoc()){
                                        echo "<option value=".$row["id_cidade"].">".utf8_encode($row["nome_cidade"])."</option>";
                                    }
                                ?>
                        </select>
                    </div>

                    <label for="inputCep" class="col-sm-2 col-form-label">CEP *</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="inputCep" placeholder="CEP..." required>
                    </div>
                </div>

                <br>
                <h5>Funcionamento</h5>
                <!-- HORÁRIOS -->
                <div class="form-group row">
                    <label for="inputHoraIni" class="col-sm-2 col-form-label">Horário de abertura *</label>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="inputHoraIni" required>
                    </div>
                    <label for="inputHoraFim" class="col-sm-2 col-form-label">Horário de encerramento *</label>
                    <div class="col-sm-4">
                        <input type="time" class="form-control" name="inputHoraFim" required>
                    </div>
                </div>

                <!-- DIAS -->
                <div class="form-group row">
                    <!-- DATA INICIAL -->
                    <label for="inputDataIni" class="col-sm-2 col-form-label">Funciona de *</label>
                    <div class="col-sm-4">
                        <select class="custom-select" style="width: 100%" name="semana1">
                            <option selected>Selecione...</option>
                            <option value="Segunda-feira">Segunda-feira</option>
                            <option value="Terça-feira">Terça-feira</option>
                            <option value="Quarta-feira">Quarta-feira</option>
                            <option value="Quinta-feira">Quinta-feira</option>
                            <option value="Sexta-feira">Sexta-feira</option>
                            <option value="Sábado">Sábado</option>
                            <option value="Domingo">Domingo</option>
                        </select>
                    </div>

                    <!-- DATA FINAL -->
                    <label for="inputDataFim" class="col-sm-2 col-form-label">à *</label>
                    <div class="col-sm-4">
                        <select class="custom-select" style="width: 100%" name="semana2">
                            <option selected>Selecione...</option>
                            <option value="Segunda-feira">Segunda-feira</option>
                            <option value="Terça-feira">Terça-feira</option>
                            <option value="Quarta-feira">Quarta-feira</option>
                            <option value="Quinta-feira">Quinta-feira</option>
                            <option value="Sexta-feira">Sexta-feira</option>
                            <option value="Sábado">Sábado</option>
                            <option value="Domingo">Domingo</option>
                        </select>
                    </div>
                </div>

                <br>
                <h5>Contato do restaurante</h5>
                <!-- CONTATO DO RESTAURANTE -->
                <div class="form-group row">
                    <label for="inputTel" class="col-sm-1 col-form-label">Telefone *</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="inputTel" placeholder="(xx)xxxx-xxxx" required/>
                    </div>

                    <label for="inputCel" class="col-sm-1 col-form-label">Celular</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="inputCel" placeholder="(xx)xxxxx-xxxx"/>
                    </div>

                    <label for="inputMail" class="col-sm-1 col-form-label">E-mail</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="inputMail" placeholder="usuario@provedor.com"/>
                    </div>
                </div>

                <br>
                <!-- BOTÃO DE CADASTRAR -->
                <div class="form-group row">
                    <div class="col-sm-10">
                    <input type="submit" value="Cadastrar" name="enviar" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="lib/node_modules/jquery/dist/jquery.js"></script>
    <script src="lib/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="lib/node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>