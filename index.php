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
      background-color: rgba(128, 128, 128, 0.05);
    
    }


    tr th{
      text-align: center;
      /* verde unimed com transparencia */
      background-color: #28A745;
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
                     <input name='pesquisa' placeholder="Tudo">
             <button type="submit" class="btn btn-success" data-toggle="button" aria-pressed="false" autocomplete="off" >Pesquisar</button>
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
     

        
        $sql = "select * from tuss_procedimentos where id like '%" . $pesquisa . "%' or exame like '%" . $pesquisa . "%' or tuss like '%" . $pesquisa . "%' or vigencia like '%" . $pesquisa . "%'";
        $consulta = $pdo->query($sql);

        

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
          
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



    </div>
    
  </body>
</html>
