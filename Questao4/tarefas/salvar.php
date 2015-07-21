<?php

    if( !empty( $_POST ) ){
        $json = json_encode( $_POST );
        if (!isset($_POST['id'])) {
            $url_target = $_SERVER["SERVER_NAME"].'/ProvaBDR/Questao4/tarefas/incluir';
        } else {
            $url_target = $_SERVER["SERVER_NAME"].'/ProvaBDR/Questao4/tarefas/alterar/'.$_POST['id'];
        }
        $ch = curl_init($url_target);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
        curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $result = curl_exec($ch);
        $getInfo = curl_getinfo($ch);
        curl_close($ch);
	
        if ($result == "1") {
            echo "<script>alert('Tarefa salva com sucesso.');</script>";
            echo "<script>window.location = 'listagem.php';</script>";
        } else {
            echo "<script>alert('Ocorreu um erro ao salvar a tarefa.');</script>";
        } 
    }   