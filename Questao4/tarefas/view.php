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
        <?php 
		    include( "funcoes.php"); 
			$url=$_SERVER[ "SERVER_NAME"].'/ProvaBDR/Questao4/tarefas/ver/'.$_GET[ "id"]; 
			$tarefass=json_decode(curl_get_call($url)); 
		?>
        <div id="main" class="container-fluid">
            <br/>
            <h3 class="page-header">
                Visualizar tarefa
                <?php echo $tarefass->{'id'}; ?>
            </h3>
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <strong>
                            T&iacute;tulo
                        </strong>
                    </p>
                    <p>
                        <?php echo $tarefass->{'deTitulo'}; ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <strong>
                            Descri&ccedil;&atilde;o da tarefa
                        </strong>
                    </p>
                    <p>
                        <?php echo $tarefass->{'deTarefa'}; ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <strong>
                            Prioridade:
                        </strong>
                    </p>
                    <p>
                        <?php 
                            if ($tarefass->{'nuPrioridade'} == 1) { 
                                echo "Alta"; 
                            } elseif ($tarefass->{'nuPrioridade'} == 2) { 
                                echo "M&eacute;dia"; 
                            } else { 
                                echo "Baixa"; 
                            } 
                        ?>
                    </p>
                </div>
            </div>
            <hr />
            <div id="actions" class="row">
                <div class="col-md-12">
                    <a href="edit.php?id=<?php echo $tarefass->{'id'} ?>" class='btn btn-primary'>Editar</a>
                    <a href="listagem.php" class="btn btn-default">Fechar</a>
                </div>
            </div>
        </div>
    </body>

</html>