<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Sistema de Tarefas
        </title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    
    <body>
        <script src="js/jquery.min.js">
        </script>
        <script src="js/script.js">
        </script>
        <script src="js/bootstrap.min.js">
        </script>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">
                            Toggle navigation
                        </span>
                        <span class="icon-bar">
                        </span>
                        <span class="icon-bar">
                        </span>
                        <span class="icon-bar">
                        </span>
                    </button>
                    <a class="navbar-brand">Sistemas de Tarefas</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.php">In&iacute;cio</a>
                        </li>
                        <li>
                            <a href="listagem.php">Listar</a>
                        </li>
                        <li>
                            <a href="add.php">Cadastrar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="main" class="container-fluid">
            <br/>
            <h3 class="page-header">
                Lista de Tarefas
            </h3>
            <div class="row">
                <div class="col-md-1">
                    <p>
                        <strong>
                            Id
                        </strong>
                    </p>
                </div>
                <div class="col-md-4">
                    <p>
                        <strong>
                            T&iacute;tulo
                        </strong>
                    </p>
                </div>
                <div class="col-md-1">
                    <p>
                        <strong>
                            Prioridade
                        </strong>
                    </p>
                </div>
                <div class="col-md-1">
                    <p>
                        <strong>
                            Visualizar
                        </strong>
                    </p>
                </div>
                <div class="col-md-1">
                    <p>
                        <strong>
                            Excluir
                        </strong>
                    </p>
                </div>
            </div>
            <?php 
                include( "funcoes.php"); 
                $url=$_SERVER[ "SERVER_NAME"].'/ProvaBDR/Questao4/tarefas/listar'; 
                $tarefass=( array) json_decode(curl_get_call($url), true);
                foreach ($tarefass as $key=> $tarefas ) { 
                    echo "<div class='row'>"; 
                    echo "<div class='col-md-1'>".$tarefas['id']."</div>"; 
                    echo "<div class='col-md-4'>".$tarefas['deTitulo']."</div>"; 
                    if ($tarefas['nuPrioridade'] == 1) { 
                        echo "<div class='col-md-1'><img src='alta.png' width=25px /></div>"; 
                    } elseif ($tarefas['nuPrioridade'] == 2) { 
                        echo "<div class='col-md-1'><img src='media.png' width=25px /></div>"; 
                    } else { 
                        echo "<div class='col-md-1'><img src='baixa.png' width=25px /></div>"; 
					} 
                    echo "<div class='col-md-1'><a href='view.php?id=".$tarefas['id']."'><img src='visualizar.png' width=25px height=25px /> </a></div>"; 
                    echo "<div class='col-md-1'><a href='excluir.php?id=".$tarefas['id']."'><img src='excluir.png' width=20px height=20px /> </a></div>"; 
                    echo "</div>"; 
                } 
            ?>
            <hr />
            <div id="actions" class="row">
                <div class="col-md-12">
                    <a href="index.php" class="btn btn-default">Fechar</a>
                </div>
            </div>
        </div>
    </body>

</html>