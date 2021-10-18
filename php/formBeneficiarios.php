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

    <div class="card text-center shadow-lg mt-5">
      <div class="card-body">
        <h5 class="card-title">Planium</h5>
        <form method="post" action="#" id="form">
          <div class="mb-3">
            <label from="name">Digite a idade do beneficiário</label>
            <input class="form-control" type="number" name="idadeBeneficiario" oninput="escrever(this.value)" required>
          </div>
          <div class="mb-3">
            <label from="name">Digite o nome do beneficiário</label>
            <input class="form-control" type="text" name="nomeBeneficiario" required>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php


        $jsonPrices = file_get_contents("../json/prices.json");
        $price = json_decode($jsonPrices);

        ?>
      </div>
    </div>
    <div class="card text-center shadow-lg mt-5">
      <h5 class="card-header">Lista de beneficiários</h5>
      <div class="card-body">
        <?php

        echo ("Você escolheu " . $_SESSION['qBeneficiario'] . " beneficiários no plano " . $_SESSION['tipoPlano']);
        echo ("<br>");

        $size = count($_SESSION['beneficiarios']) + 1;

        echo (($size) . " / " . $_SESSION['qBeneficiario'] . " beneficiarios cadastrados.");
        echo ("<br>");
        echo ("<hr>");




        //casso o $_POST preenchido joga os dados para o array de beneficiários
        if (isset($_POST['idadeBeneficiario'])) {

          array_push(
            $_SESSION['beneficiarios'],
            ['Idade' => $_POST['idadeBeneficiario'], 'Nome' => $_POST['nomeBeneficiario']]
          );
        }

        if (isset($_SESSION['beneficiarios'])) {
          foreach ($_SESSION['beneficiarios'] as $value) {

            foreach ($value as $key => $v) {

              echo ($key . " : " . $v . "<br>");
            }

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


            echo ("Preço unitário: " . $_SESSION['precoUnitario']);
            echo ("<hr>");
          }
        }
        if (($size) == $_SESSION['qBeneficiario']) {

          echo ("<h5 class='mb-1 bg-danger rounded-3 bg-gradiente'>Beneficiários cadastrados com sucesso !</h5>" . "<br>");
        }


        ?>

        <a href="parcialColetivo.php" class="btn btn-primary">Seguir para finalizar proposta</a>

      </div>

    </div>
  </main>
  <footer class="bg-light text-center text-lg-start mt-1 ">
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