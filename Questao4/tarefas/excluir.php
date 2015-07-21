<?php
    if( !empty( $_GET ) ){
        // Atribui a URL para uma variável
        $url_target = $_SERVER["SERVER_NAME"].'/ProvaBDR/Questao4/tarefas/excluir/'.$_GET['id'];
        // Inicializa o cURL
        $ch = curl_init($url_target);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
        curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $result = curl_exec($ch);

        $getInfo = curl_getinfo($ch);

	    curl_close($ch);
	
        if ($result == "1") {
            echo "<script>alert('Tarefa excluída com sucesso.');</script>";
            echo "<script>window.location = 'listagem.php';</script>";
        } else {
            echo "<script>alert('Ocorreu um erro ao excluir a tarefa.');</script>";
	    } 
	}   