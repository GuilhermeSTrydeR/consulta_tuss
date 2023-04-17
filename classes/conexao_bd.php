<?php
	
  /* online
    $db="64.237.32.5";
    $usuario="unimedtc_sa";
    $password="utc1993.";
    $banco="unimedtc_consultatuss"; */
	
	/* local */
    $db="127.0.0.1";
    $usuario="root";
    $password="";
    $banco="unimedtc_consultatuss";

    global $pdo;

    try{
        $pdo = new PDO("mysql:dbname=".$banco."; host".$db, $usuario, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->query("SELECT * FROM servicos");
        $sql->execute();

        // verificar o numero de registro cadastrados no banco
        // echo $sql->rowCount();

    }catch(PDOException $e){
        // echo "<h4>ERRO: NÃO FOI POSSIVEL SE CONECTAR AO BANCO DE DADOS: ".$e->getMessage()."</h4>";
        //em vez da mensagem de erro, será exibido essa tela de erro
        echo "ERRO NO BANCO DE DADOS OU NA CONEXÃO COM O MESMO";
        exit;

    }

?>