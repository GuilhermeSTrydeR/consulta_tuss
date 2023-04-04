<?php

    // definir o fuso fuso horario local em horas
    $gmt = -3;

    // multiplicador para definir em horas o fuso horario(o mesmo eh recebido em segundos)
    $fusoHorario = ($gmt * 3600);

    $local_server_bd = 'http://192.168.0.213';
    $local_server_web = 'http://192.168.0.214';

    //versão do sistema operacional
    $os = PHP_OS;

    //endereco do script (MYSQLDUMP) nativo do mysql que realiza o backup do banco de dados
    $mySqlDump = '/opt/lampp/bin/mysqldump';

    //endereco onde sera salvo o arquivo de banco de dados(.sql)
    $backupBanco = 'database/backup_interno/';

?>