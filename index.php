<?php
  // desligar todos os erros e notices nessa pagina
  error_reporting(0);
  header('Content-Type: text/html; charset=iso-8859-1');
  include("classes/conexao_bd.php");
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Consulta Tuss</title>
    <!--bootstrap-->
    <link rel="stylesheet" type="text/css" href="/tuss/css/bootstrap.css" media="screen" />
    <!--css do site-->
    <link rel="stylesheet" type="text/css" href="/tuss/css/tuss.css" media="screen" />
    <script type="text/javascript" src="/tuss/js/bootstrap.js"></script>
  </head>
  <body>
    <div class="col">
      <div class="row" id="cabecalho">
        <div id="imagens">
          
          <img src="/tuss/imagens/unimedtc_logo.png" alt="" height="50" class="direita margin_direita20">
          <h1 id="titulo" class="esquerda margin_esquerda10" >CONSULTA TUSS</h1>
          <!--<img src="/tuss/imagens/consulta_tuss.png" alt="" height="70">-->

        </div>

        
      </div>
      <div class="mobile">
          
          
      </div>
      <div class="mobileText"><p>Esse Aplicativo <br>ainda não funciona <br>em dispositivos moveis.<br><br>A Unimed Agradece.</p><br><br><img src="/tuss/imagens/unimedtc_logo.png" alt="" height="50" class="direita margin_direita20"></div>
      <div class="row" id="corpo">
          
        

  


    <!-- botao de pesquisar e seu form-->
    <div id="botao_pesquisa">
      <!-- o $PHP_SELF serve para enviar o post para a mesma pagina em questao, fazendo assim passar por post algo e receber na propria pagina -->
      <form method="POST" action=<?php echo $PHP_SELF;?> >    
        <?php 
          //variavel que vai receber o valor da busca para retornar no sql query
          $pesquisa = $_POST['pesquisa'];
        ?>
        <div class="input-group mb-3">
          <input type="text" name="pesquisa" id="input" class="form-control" value="" placeholder="Pesquisar Código TUSS ou Descrição" aria-label="Pesquisa" aria-describedby="basic-addon2">
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
          <tr >
            <!-- <th id="id">ID</th>-->
            <th id="tuss">TUSS</th>
            <th id="descricao">DESCRIÇÃO</th> 
            <th id="classificacao">CLASSIFICAÇÃO</th> 
            <th id="DocRacionalizacao">DOC. RACIONALIZ.</th> 
            <th id="prazo_executora">PRAZO EXECUTORA</th> 
            <th id="prazo_origem">PRAZO ORIGEM</th> 
            <th id="prazo_total">PRAZO TOTAL</th> 

            <!-- <th id="vigencia">VIGENCIA</th>RETIRAR A VIGENCIA -->
          </tr>
        </thead>
        <?php
          $sql = "SELECT * FROM servicos";
          $consulta = $pdo->query($sql);
          $iTotal = 0;
          while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $iTotal +=1;
          }
          $n = $_GET['n'];
          //n sera o fator de porcentagem da query que dera exibido (0 - 100)
          $limiteQuery = (($n * $iTotal) / 100);
          // id like '%" . $pesquisa . "%' or  vigencia like '%" . $pesquisa . "%'
          if(!$pesquisa){
            $sql = "SELECT * FROM servicos WHERE Descricao LIKE '%$pesquisa%' OR tuss like '%$pesquisa%' ORDER BY Descricao LIMIT 100";
          }
          else{
            $sql = "SELECT * FROM servicos WHERE Descricao LIKE '%$pesquisa%' OR tuss like '%$pesquisa%' ORDER BY Descricao";
          }
          
          $consulta = $pdo->query($sql);
          $i = 0;
          while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $i += 1;
          // $id = $linha['id'];
          $descricao = $linha['Descricao'];
          $tuss = $linha['TUSS'];
          $classificacao = $linha['Classificacao'];
          $docracionalizacao = $linha['DocRacionalizacao'];
          $prazo_executora = $linha['Prazo_Executora'];
          $prazo_origem = $linha['Prazo_Origem'];
          $prazo_total = $linha['Prazo_Total'];

          
          // $vigencia = $linha['vigencia'];
        ?>
        <tr>
        
          <td id="linha_tuss"><?php echo $tuss ?></td>
          <td id="linha_descricao"><?php echo $descricao ?></td>
          <td id="linha_classificacao"><?php echo $classificacao ?></td>
          <td id="linha_docracionalizacao"><?php echo $docracionalizacao ?></td>
          <td id="linha_prazo_executora"><?php echo $prazo_executora ?></td>
          <td id="linha_prazo_origem"><?php echo $prazo_origem ?></td>
          <td id="linha_prazo_total"><?php echo $prazo_total ?></td>
        </tr>
        <?php 
          }
        ?>
      </table>
      
     
    </div>
     <div id="res_query">
  

   
    <?php          
    
        //verificacao caso haja mais de um resultado sera exibido uma string no plural para informar os resultados da pesquisa
        if($i == 1 && $pesquisa){
        echo "<p><i>Exibindo <b>$i</b> resultado de <b>$iTotal</b>. Procurando por: <b>$pesquisa.</b></i></p> ";
        }
        elseif($i == 1 && !$pesquisa){
        echo "<p><i>Exibindo <b> $i </b> resultado de <b>$iTotal</b>. Procurando por: <b>Tudo.</b></i></p> ";
        }
        elseif($i > 1 && $pesquisa){
        echo "<p><i>Exibindo <b> $i </b> resultados de <b>$iTotal</b>. Procurando por: <b>$pesquisa.</b></i></p> ";
        }
        elseif($i > 1 && !$pesquisa){
        echo "<p><i>Exibindo <b> $i </b> resultados de <b>$iTotal</b>. Procurando por: <b>Tudo.</b></i></p> ";
        }
        else{
        echo "<p><i><red>Nenhum resultado foi encontrado! </red>Procurando por: <b>$pesquisa. </b></i></p> ";
        }
        // else{
        //   echo "<p><i>Exibindo <b> $i </b> resultados. Buscando por: <b></b></i></p> ";
        // } 
      ?>
    
     </div>

      </div><!-- fim div row do corpo -->
     
      <div id="rodape" class="row">
        <div class="col"></div>
        <div class="col-6">Desenvolvido por Unimed Três Corações</div>
        <div class="col"></div>
      </div>
    </div>
  </body>
</html>
