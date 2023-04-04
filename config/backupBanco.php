<?php

    //inclui o arquivo de configuracoes, nesse casso ele vai servir para retornar a variavel $os que contem o sistema operacional do servido onde a intranet esta instalada, pois ha diferencas entre windows e linux para realizar a exportacao do banco pois ambos usam o utilitario MYSQLDUMP que se encontra na raiz do sistema
    include('config.php');

    

    //aqui setamos o fuso-horario correto, fuso horario do proprio PHP
    date_default_timezone_set('America/Sao_Paulo');

    //requer as classes de conexao ao banco e de configuracoes
    require ('../classes/conexao_bd.php');
    require ('config.php');
    
    //div para centralizar os elementos da pagina
    echo "<center style='margin-top: 100px;'>";


    //gif para representar o loading do backup do banco
    //echo "<img src='../imagens/backup_banco/backup_banco.gif' height='500' style='margin-top: 75px;' alt='logo_unimed'>";
    
    
    echo "<h2>O backup está sendo realizado e será dalvo em: /" . $backupBanco . "</h2>";
    
    //a funcao shell_exec executa um script no shell, no caso esse script vai ate a pasta do servidor local(nesse caso o XAMPP) e ateh a pasta onde tem o executavel mysqldump.exe e executa passando alguns parametros basicos para gerar o DUMP do banco e salva em um arquivo contendo data e hora atual e a extensao .sql
    shell_exec($mySqlDump.' -u root ' . $banco . ' > ../'.$backupBanco . date('YmdHis') .'.sql');

    echo "<br>";

    echo "Caso o backup não funcione, verificar as configurações da variavel 'mySqlDump' no arquivo '/config/config.php' a mesma deve conter o endereço do script nativo do mysql 'MYSQLDUMP'";
   

    // echo "<img src='../imagens/backup_banco/4.png' height='500' style='margin-top: 75px;' alt='logo_unimed'>";
    
    echo "</center>";

?>