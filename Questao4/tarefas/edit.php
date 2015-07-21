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
        <?php include( "funcoes.php"); 
		    $url=$_SERVER[ "SERVER_NAME"].'/ProvaBDR/Questao4/tarefas/ver/'.$_GET[ "id"]; 
		    $tarefass=json_decode(curl_get_call($url)); 
		?>
            <div id="main" class="container-fluid">
                <br/>
                <h3 class="page-header">
                    Editar tarefa
                    <?php echo $tarefass->{'id'}; ?>
                </h3>
                <form action="salvar.php" method="POST">
                    <div class="form-group col-md-12">
                        <label for="detitulo">
                            T&iacute;tulo:
                        </label>
                        <input id="detitulo" name="detitulo" type="text" class="form-control"
                            required="" value="<?php echo $tarefass->{'deTitulo'}; ?>">
                        <input id="id" name="id" type="hidden" required="" value="<?php echo $tarefass->{'id'}; ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="detarefa">
                            Descri&ccedil;&atilde;o da tarefa:
                        </label>
                        <textarea name="detarefa" class="form-control"><?php echo $tarefass->{'deTarefa'}; ?></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="nuprioridade">
                            Prioridade:
                        </label>
                        <select name="nuprioridade" id="nuPrioridade">
                            <option value="1" <?php if ($tarefass->{'nuPrioridade'} == 1) { ?> selected="selected" <?php } ?>>Alta</option>
                            <option value="2" <?php if ($tarefass->{'nuPrioridade'} == 2) { ?> selected="selected" <?php } ?>>M&eacute;dia</option>   
							<option value="3" <?php if ($tarefass->{'nuPrioridade'} == 3) { ?> selected="selected" <?php } ?>>Baixa</option>
                        </select>
                    </div>
                    <hr />
                    <div id="actions" class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                Salvar
                            </button>
                            <a href="listagem.php" class="btn btn-default">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
    </body>

</html>