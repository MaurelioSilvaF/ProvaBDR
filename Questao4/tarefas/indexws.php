<?php
    require '../tarefasws/Slim/Slim.php';
    \Slim\Slim::registerAutoloader();
    $app = new \Slim\Slim();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $app->get('/', function () {
        echo "Lista";
    });

    $app->get('/listar','getTarefas');
    $app->post('/incluir','addTarefa');
    $app->get('/ver/:id','getTarefa');
    $app->post('/alterar/:id','saveTarefa');
    $app->delete('/excluir/:id','deleteTarefa');
    $app->run();

    function getConn() {
        return new PDO('mysql:host=localhost;dbname=provabdr', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }	

    function getTarefas() {
        $stmt = getConn()->query("SELECT * FROM tarefas order by nuPrioridade, deTitulo");
        $tarefas = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($tarefas);
    }

    function addTarefa(){
        $request = \Slim\Slim::getInstance()->request();
        $tarefa = json_decode($request->getBody());
        $sql = "INSERT INTO tarefas (deTitulo,deTarefa,nuPrioridade) values (:detitulo,:detarefa,:nuprioridade) ";
        $conn = getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("detitulo",$tarefa->detitulo);
        $stmt->bindParam("detarefa",$tarefa->detarefa);
        $stmt->bindParam("nuprioridade",$tarefa->nuprioridade);
        $stmt->execute();
        $tarefa->id = $conn->lastInsertId();
        if ($tarefa->id != 0) {
            echo "1";
        } else {
            echo "0";
        }
    }

    function getTarefa($id) {
        $conn = getConn();
        $sql = "SELECT * FROM tarefas WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("id",$id);
        $stmt->execute();
        $tarefa = $stmt->fetchObject();
        echo json_encode($tarefa);
    }

    function saveTarefa($id) {
        $request = \Slim\Slim::getInstance()->request();
        $tarefa = json_decode($request->getBody());
        $sql = "UPDATE tarefas SET detitulo=:detitulo,detarefa=:detarefa,nuprioridade=:nuprioridade WHERE   id=:id";
        $conn = getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("detitulo",$tarefa->detitulo);
        $stmt->bindParam("detarefa",$tarefa->detarefa);
        $stmt->bindParam("nuprioridade",$tarefa->nuprioridade);
        $stmt->bindParam("id",$id);
        $stmt->execute();
        echo "1";
    }

    function deleteTarefa($id) {
        $sql = "DELETE FROM tarefas WHERE id=:id";
        $conn = getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("id",$id);
        $stmt->execute();
        echo "1";
    }