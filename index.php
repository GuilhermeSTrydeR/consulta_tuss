<!DOCTYPE html>
<html lang="en">
  <head>

  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      max-width: 60%;
      margin-left: auto;
      margin-right: auto;
      margin-top: 10%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      /* laranja unimed com transparencia */
      background-color: rgba(244, 121, 32, 0.15);
    
    }

    tr th{
      text-align: center;
      /* verde unimed com transparencia */
      background-color: rgba(0, 153, 93, 1);
      color: white;
    }
/* 
    #busca{
      margin-left: auto;
      margin-right: auto;
    } */

      
  </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Tuss</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" media="screen" />
    <script type="text/javascript" src="/js/bootstrap.js"></script>
  </head>
  <body>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>EXAME</th>
          <th>TUSS</th>
        </tr>
      </thead>
      <?php
        //variavel que vai receber o valor da busca para retornar no sql query
        $busca = '';
        include("classes/conexao_bd.php");
        $sql = "select * from tuss_procedimentos where exame like '%" . $busca . "%' or tuss like '%" . $busca . "%'";
        $consulta = $pdo->query($sql);
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $id = $linha['id'];
          $exame = $linha['exame'];
          $tuss = $linha['tuss'];
      ?>
      <tr >
        <td><?php echo $id ?></td>
        <td><?php echo $exame ?></td>
        <td><?php echo $tuss ?></td>
      </tr>
      <?php 
        }
      ?>
    </table>
  </body>
</html>
