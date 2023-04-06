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
      table-layout: fixed
    }

    #id{
      width: 35px;
    }

    #exame{
      width: 600px;
    }

    #tuss{
      width: 100px;
    }

    #vigencia{
      width: 100px;
    }



    td{
       word-wrap: break-word;
    }


 

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
      max-width: 100%;
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
    <!--<link rel="stylesheet" type="text/css" href="/css/bootstrap.css" media="screen" />-->
    <script type="text/javascript" src="/js/bootstrap.js"></script>
  </head>
  <body>
    <table>
      <thead>
        <tr>
          <th id="id">ID</th>
          <th id="exame">EXAME</th>
          <th id="tuss">TUSS</th>
          <th id="vigencia">VIGÊNCIA</th>
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
          $vigencia = $linha['vigencia'];
      ?>
      <tr >
        <td><?php echo $id ?></td>
        <td><?php echo $exame ?></td>
        <td><?php echo $tuss ?></td>
        <td><?php echo $vigencia ?></td>
      </tr>
      <?php 
        }
      ?>
    </table>
  </body>
</html>
