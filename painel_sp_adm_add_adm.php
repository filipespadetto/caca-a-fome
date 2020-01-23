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
        <!-- MENU ADM -->
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-warning" style="width: 100%">
                <a class="navbar-brand" href="paineladm.php">Painel do Super Administrador</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="painel_sp_adm.php">Consultar restaurantes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="painel_sp_adm_add_res.php">Cadastrar restaurantes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="painel_sp_adm_add_adm.php">Incluir administrador<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="painel_sp_adm_edita_res.php">Alterar restaurante</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Search">
                        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Ok</button>
                    </form>
                </div>
            </nav>
        </div>

        <!-- COMPONENTES PARA INCLUSÃO DE ADMINISTRADOR -->
        <div id="cadastraAdministrador">
            <h4>Incluir administrador</h4>
            <form method="POST" action="php/adiciona_adm.php">
                <br>
                <h5>Dados do administrador</h5>
                <div class-"form-group row">
                    <!-- NOME -->
                    <label for="admNome" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="admNome" placeholder="Nome do administrador..." required>
                    </div>

                    <!-- SOBRENOME -->
                    <label for="admSnome" class="col-sm-2 col-form-label">Sobrenome</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="admSnome" placeholder="Sobrenome do administrador..." required>
                    </div>
                </div>

                <!-- E-MAIL -->
                <div class-"form-group row">
                    <label for="admMail" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="admMail" placeholder="usuario@provedor.com" required>
                    </div>
                </div>

                <!-- USUÁRIO -->
                <div class-"form-group row">
                    <label for="admMail" class="col-sm-2 col-form-label">Nome de usuário</label><br>
                    <label class="col-sm-4 col-form-label">O seu nome de usuário será @adm_<b>seu nome</b></label>
                </div>

                <!-- SENHA -->
                <div class-"form-group row">
                    <label for="admMail" class="col-sm-2 col-form-label">Senha</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="admSenha" placeholder="Senha do administrador..." required>
                    </div>
                </div>

                <br>
                <!-- CARGO -->
                <div class-"form-group row">
                    <label for="admMail" class="col-sm-2 col-form-label">Cargo</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="admCargo" class="form-check-input" value="1" checked>
                        <label class="custom-control-label" for="admCargo">
                            Administrador do sistema
                        </label>   
                    </div>
                </div>

                <br>
                <!-- BOTÃO DE CADASTRAR -->
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="cadastraAdm">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="lib/node_modules/jquery/dist/jquery.js"></script>
    <script src="lib/node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="lib/node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>