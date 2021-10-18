<?php
session_start();
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
  <title>Planium Test</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand mb-3" href="#">
          <img src="../img/logo_header.png" alt="" width="130" height="40">
        </a>
      </div>
    </nav>
  </header>
  <main class="container-fluid mt-5">

    <?php

    $jsonPrices = file_get_contents("../json/prices.json");
    $price = json_decode($jsonPrices);




    ?>
    <div class="card text-center shadow-lg mt-5">
      <h5 class="card-header">Proposta</h5>
      <div class="card-body">
        <?php

        echo "Tipo de plano: " . $_SESSION['tipoPlano'];
        echo '<br>';
        echo "Quantidade de beneficiarios: " . $_SESSION['qBeneficiario'];
        echo '<br>';
        echo ("<hr>");



        foreach ($_SESSION['beneficiarios'] as $value) {

          foreach ($value as $key => $v) {

            echo ($key . " : " . $v . "<br>");
          };

          //condicional que define os preços dos planos
          switch ($_SESSION['tipoPlano']) {
            case '1':
              if ($value['Idade'] < 18) {
                $_SESSION['precoUnitario'] = $price[1]->faixa1;
              } elseif ($value['Idade'] > 39) {
                $_SESSION['precoUnitario'] = $price[1]->faixa3;
              } elseif ($value['Idade'] > 18) {
                $_SESSION['precoUnitario'] = $price[1]->faixa2;
              }
              break;
            case '6':
              if ($value['Idade'] < 18) {
                $_SESSION['precoUnitario'] = $price[7]->faixa1;
              } elseif ($value['Idade'] > 39) {
                $_SESSION['precoUnitario'] = $price[7]->faixa3;
              } elseif ($value['Idade'] > 18) {
                $_SESSION['precoUnitario'] = $price[7]->faixa2;
              }
              break;
          }
          $_SESSION['precoTotal'] += $_SESSION['precoUnitario'];
          echo ("Preço unitário: " . $_SESSION['precoUnitario']);
          echo ("<hr>");
        }

        ?>
        <h5 class="card-title">Total <?php
                                      echo ($_SESSION['precoTotal']);
                                      ?></h5>
        <button type="submit" class="btn btn-primary">Finalizar proposta</button>
      </div>

    </div>
  </main>
  <footer class="bg-light text-center text-lg-start mt-1 fixed-bottom">
    <!-- Copyright -->
    <div class="text-center p-3">
      © 2021 Copyright:
      <a class="text-dark" href="https://github.com/renanjansen">Renan Jansen</a>
    </div>
    <!-- Copyright -->
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

</body>

</html>