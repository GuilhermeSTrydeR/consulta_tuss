<?php
  // desligar todos os erros e notices nessa pagina
  error_reporting(0);
  include("classes/conexao_bd.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 120%;
        max-width: 60%;
        margin-left: auto;
        margin-right: auto;
        /* margin-top: 12%; */
        table-layout: fixed;
      }
      #div_table{
        overflow: auto; width: 1300px; height: 615px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 10%; 
      }
      thead{
        overflow-y: auto;
      }
      thead th{
      position: sticky;
        top: 0;
      }
      #id{
        width: 80px;
      }
      #exame{
        width: 1100px;
      }
      #tuss{
        width: 180px;
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
        background-color: rgba(244, 121, 32, 0.08);
      }
      tr:nth-last-child(even) {
        /* cinza transparencia */
        background-color: rgba(128, 128, 128, 0.2);
      }
      tr th{
        text-align: center;
        /* verde unimed com transparencia */
        background-color: #00995d;
        color: white;
      }
      /* 
      #busca{
        margin-left: auto;
        margin-right: auto;
      } */
      #botao_pesquisa{
        margin-top: -3%;
        margin-left: 63%;
        display: block;
        position: absolute;
      }
      p{
        text-align: center;
      }
      #res_query p{
        margin: 25px;
      }
      #paginas{
        padding-top: 15px;
        font-size: 20px;
        text-align: center;
      }
      #paginas a{
        color: #00995d;
      }
      red{
        color: red !important;
      }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Tuss</title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" media="screen" />
    <script type="text/javascript" src="/js/bootstrap.js"></script>
  </head>
  <body>
    <!-- botao de pesquisar e seu form-->
    <div id="botao_pesquisa">
      <!-- o $PHP_SELF serve para enviar o post para a mesma pagina em questao, fazendo assim passar por post algo e receber na propria pagina -->
      <form method="POST" action=<?php echo $PHP_SELF;?> >    
        <?php 
          //variavel que vai receber o valor da busca para retornar no sql query
          $pesquisa = $_POST['pesquisa'];
        ?>
        <div class="input-group mb-3">
          <input type="text" name="pesquisa" class="form-control" placeholder="<?php echo $pesquisa; ?>" aria-label="Pesquisa" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
          </div>
        </div>
      </form>
    </div>
    <!-- fim div do botao de pesquisar e do form tambem -->
    <div id="div_table">
      <table>
        <thead>
          <tr>
            <!-- <th id="id">ID</th>RETIRAR O ID -->
            <th id="exame">NOME</th> <!--NOME-->
            <th id="tuss">CÓDIGO</th><!--CODIGO-->
            <!-- <th id="vigencia">VIGÊNCIA</th>RETIRAR A VIGENCIA -->
          </tr>
        </thead>
        <?php
          $sql = "SELECT * FROM tuss_procedimentos";
          $consulta = $pdo->query($sql);
          $iTotal = 0;
          while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $iTotal +=1;
          }
          $n = $_GET['n'];
          //n sera o fator de porcentagem da query que dera exibido (0 - 100)
          $limiteQuery = (($n * $iTotal) / 100);
          // id like '%" . $pesquisa . "%' or  vigencia like '%" . $pesquisa . "%'
          $sql = "SELECT * FROM tuss_procedimentos WHERE  exame LIKE '%$pesquisa%' OR tuss  like '%$pesquisa%' ORDER BY exame";
          $consulta = $pdo->query($sql);
          $i = 0;
          while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $i += 1;
          // $id = $linha['id'];
          $exame = $linha['exame'];
          $tuss = $linha['tuss'];
          // $vigencia = $linha['vigencia'];
        ?>
        <tr>
          <td><?php echo $exame ?></td>
          <td><?php echo $tuss ?></td>
        </tr>
        <?php 
          }
        ?>
      </table>
    </div>
    <div id="res_query">
      <!-- <div id="paginas">
        Paginas:
        <a href='/index.php?n=10'>1</a>
        <a href='/index.php?n=20'>2</a>
        <a href='/index.php?n=30'>3</a>
        <a href='/index.php?n=40'>4</a>
        <a href='/index.php?n=50'>5</a>
        <a href='/index.php?n=60'>6</a>
        <a href='/index.php?n=70'>7</a>
        <a href='/index.php?n=80'>8</a>
        <a href='/index.php?n=90'>9</a>
        <a href='/index.php?n=100'>10</a>
      </div> -->
      <?php          
        //verificacao caso haja mais de um resultado sera exibido uma string no plural para informar os resultados da pesquisa
        if($i == 1 && $pesquisa){
        echo "<p><i>Exibindo <b> $i </b> resultado. Procurando por: <b>$pesquisa.</b></i></p> ";
        }
        elseif($i == 1 && !$pesquisa){
        echo "<p><i>Exibindo <b> $i </b> resultado. Procurando por: <b>Tudo.</b></i></p> ";
        }
        elseif($i > 1 && $pesquisa){
        echo "<p><i>Exibindo <b> $i </b> resultados. Procurando por: <b>$pesquisa.</b></i></p> ";
        }
        elseif($i > 1 && !$pesquisa){
        echo "<p><i>Exibindo <b> $i </b> resultados. Procurando por: <b>Tudo.</b></i></p> ";
        }
        else{
        echo "<p><i><red>Nenhum resultado foi encontrado! </red>Procurando por: <b>$pesquisa. </b></i></p> ";
        }
        // else{
        //   echo "<p><i>Exibindo <b> $i </b> resultados. Buscando por: <b></b></i></p> ";
        // } 
      ?>
    </div>
  </body>
</html>
