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
    <div class="container-fluid">
        <div class="row">
            <!-- MENU ADM -->
            <nav class="navbar navbar-expand-lg navbar-light bg-warning" style="width: 100%">
                <a class="navbar-brand" href="#">Painel do Administrador</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#Modal2">Consultar restaurantes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="paineladm_add_res.php">Cadastrar restaurantes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="paineladm_add_adm.php">Incluir administrador<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>  
                    <form class="form-inline my-2 my-lg-0" name="frmBusca" method="POST" action="principal.php">
                        <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Search" name="palavra">
                        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit" value="buscar">Buscar</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>
   
    <div id="carouselSite" class="carousel slide" data-ride="carousel">         
        <ol class="carousel-indicators">
            <li data-target="#carouselSite" data-slide-to="0" class="active"></li>                   
            <li data-target="#carouselSite" data-slide-to="1"></li>
            <li data-target="#carouselSite" data-slide-to="2"></li>
        </ol>   

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/comida2.jpeg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Sinta-se a vontade</h5>
                    <h6>"Não existe amor mais sincero do que aquele pela comida."</h6>
                </div>
            </div>

            <div class="carousel-item">
                <img src="img/comida3.jpeg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>O mundo é recheado de novidades</h5>
                    <h6>"O melhor tempero da comida é a fome."</h6>
                </div>
            </div>

            <div class="carousel-item">
                <img src="img/comida4.jpeg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Coisas grandes estão por vir</h5>
                    <h6>"A comida sem tempero é como a vida sem paixão: não tem sabor e desconhece-se o prazer."</h6>
                </div>                    
            </div>

            <a class="carousel-control-prev" href="#carouselSite" role="button"data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="sr-only">Anterior</span>
            </a>

            <a class="carousel-control-next" href="#carouselSite" role="button"data-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="sr-only">Próximo</span>
            </a>
        </div>
    </div>

    
    <div class="row">      
        <div class="col-sm-2"></div>

        <div class="col-sm-8">
            <div class="panel panel-primary" id="result_panel">
            <div class="panel-heading" style="text-align: center;"><h3 class="panel-title">Lista de Restaurantes</h3>
            <br>
            <div class="panel-body">
                <ul class="list-group minhaLista" style="text-align: center;">
                <?php
                    include_once('php/conectar.php');
                    if(isset($_POST['palavra'])){
                        $palavra = $_POST['palavra'];
                        $sql = "SELECT * FROM restaurante where restaurante.nome_restaurante like '%$palavra%'";
                        $buscar = mysqli_query($conn,$sql);
                        if($buscar === FALSE){
                            // Consulta falhou, parar aqui 
                            die(mysqli_error());
                        }
                        while($restaurante = mysqli_fetch_assoc($buscar)){
                            echo "<button type='button' class='btn btn-warning' onclick='getDados(".$restaurante['id_restaurante'].")' value=".$restaurante['id_restaurante'].">".$restaurante['nome_restaurante']."</button>";
                            echo "<br>";
                        }
                    }    
                ?>     
                </ul>
            </div>
        </div>

        <div class="col-sm-2"></div>
    </div>

    <!-- MODAL 1 | RESULTADO -->
    <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php                         
                        $query = $conn->query("SELECT * FROM restaurante WHERE id_restaurante = ''");
                        while($row = $query->fetch_assoc()){
                            echo "<h5>".utf8_encode($row["nome_restaurante"])."</h5>";
                        }
                    ?>
                    <div id="nome"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <p id="descricao"></p>
                        
                        <div class="row">
                            <h6>Especiazado em</h6> &nbsp;
                            <p id="espc"></p>
                        </div>
                        
                        <div class="row">
                            <h6>Serve</h6> &nbsp;
                            <p id="comida"></p>
                        </div>

                        <div class="row">
                            <h6>Tipo de ambiente</h6> &nbsp;
                            <p id="ambiente"></p>
                        </div>

                        <div class="row">
                            <h6>Abre de: </h6> &nbsp;
                            <p id="hora1"></p> &nbsp;
                            <h6>às</h6> &nbsp;
                            <p id="hora2"></p> &nbsp;
                        </div>

                        <div class="row">
                            <h6>Funciona de:</h6> &nbsp;
                            <p id="dia1"></p> &nbsp;
                            <h6>a</h6> &nbsp;
                            <p id="dia2"></p> &nbsp;
                        </div>

                        <br>
                        
                        <h6>Mais informações:</h6>
                        <div class="row">
                            <h6>Telefone:</h6> &nbsp;
                            <p id="tel"></p> &nbsp;
                            <br>
                            <h6>Celular:</h6> &nbsp;
                            <p id="cel"></p> &nbsp;
                            <br>
                            <h6>E-mail:</h6> &nbsp;
                            <p id="mail"></p> &nbsp;
                        </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 2 | QUESTIONÁRIO -->
    <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Questionário</h5>
                    <div id="nome"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="questionario" method="post" action="php/questionario.php">
                            <div class="row">
                                <h5>Por qual local deseja encontrar?</h5>
                                <select class="custom-select" style="width: 100%" name="cidade">
                                    <option value="<?php NULL ?>" selected>Selecione cidade...</option>
                                    <?php
                                        $query = $conn->query("SELECT * FROM cidade");
                                        while($row1 = $query->fetch_assoc()){
                                            echo "<option value=".$row1["id_cidade"].">".utf8_encode($row1["nome_cidade"])."</option>";
                                        }
                                    ?>
                                </select>
                                <br><br>
                                <select class="custom-select" style="width: 100%" name="bairro">
                                    <option value="<?php NULL ?>" selected>Selecione bairro...</option>
                                    <?php
                                        $query = $conn->query("SELECT * FROM bairro");
                                        while($row2 = $query->fetch_assoc()){
                                            echo "<option value=".$row2["id_bairro"].">".utf8_encode($row2["nome_bairro"])."</option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <br>

                            <div class="row">
                                <h5>Que tipo de ambiente te agrada?</h5>
                                <select class="custom-select" style="width: 100%" name="ambiente">
                                    <option value="<?php NULL ?>" selected>Selecione...</option>
                                    <?php
                                    $query = $conn->query("SELECT * FROM ambiente");
                                    while($row3 = $query->fetch_assoc()){
                                        echo "<option value=".$row3["id_ambiente"].">".utf8_encode($row3["desc_ambiente"])."</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <br>

                            <div class="row">
                                <h5>Você procura por qual tipo de comida?</h5>
                                <select class="custom-select" style="width: 100%" name="comida">
                                    <option value="<?php NULL ?>" selected>Selecione...</option>
                                    <?php
                                        $query = $conn->query("SELECT * FROM tipo_comida");
                                        while($row4 = $query->fetch_assoc()){
                                            echo "<option value=".$row4["id_comida"].">".utf8_encode($row4["desc_comida"])."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Buscar" class="btn btn-success btn_carrega_conteudo" id="btn-buscar">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="lib/node_modules/jquery/dist/jquery.js"></script>
    <script src="lib/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="lib/node_modules/bootstrap/dist/js/bootstrap.js"></script>

    <script>
        function getDados(id_restaurante) {
            $.ajax({
                type: 'post',
                url: 'busca_dados.php',
                data: {id:id_restaurante},
                success:function(data){
                    var obj = JSON.parse(data);
                    // console.log(obj[0]);
            document.getElementById("nome").innerHTML = obj[0]['nome_restaurante'];
            document.getElementById("descricao").innerHTML = obj[0]['descricao_restaurante'];
            document.getElementById("espc").innerHTML = obj[0]['desc_especialidade'];
            document.getElementById("comida").innerHTML = obj[0]['desc_comida'];
            document.getElementById("ambiente").innerHTML = obj[0]['desc_ambiente'];
            document.getElementById("hora1").innerHTML = obj[0]['hora_inicio'];
            document.getElementById("hora2").innerHTML = obj[0]['hora_fim'];
            document.getElementById("dia1").innerHTML = obj[0]['dia_inicio'];
            document.getElementById("dia2").innerHTML = obj[0]['dia_fim'];
            document.getElementById("tel").innerHTML = obj[0]['telefone_restaurante'];
            document.getElementById("cel").innerHTML = obj[0]['celular_restaurante'];
            document.getElementById("mail").innerHTML = obj[0]['email_restaurante'];
            $("#Modal1").modal("show");

                }
            });
        }

        
        // $(document).ready(function(){
        //     $(".btn_carrega_conteudo").click(function(){               
        //         $.ajax({
        //             url: "php/questionario.php",
        //             method: "post",
        //             data: $('#questionario').serialize(),
        //             success:function(data){
        //                 var obj = JSON.stringify(data);
        //                 console.log(obj[0]);
        //             }
        //         });
        //         // }).done(function(data){
        //             // $("#Modal2").modal("hide");
        //             // $("#btn-questionario").html(data);
        //         // });
        //         return false;
        //     });
        // });           
    </script>
</body>
</html>