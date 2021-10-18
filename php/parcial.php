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
        $_SESSION['idadeBeneficiario'] = $_POST['idadeBeneficiario'];
        $_SESSION['nomeBeneficiario'] = $_POST['nomeBeneficiario'];
        $jsonPrices = file_get_contents("../json/prices.json");
        $price = json_decode($jsonPrices);

        //condicional que atua caso haja apenas um beneficiário
        if ($_SESSION['qBeneficiario'] == 1) {
          switch ($_SESSION['tipoPlano']) {
            case '1':
              if ($_SESSION['idadeBeneficiario'] < 18) {
                $_SESSION['precoParcial'] = $price[0]->faixa1;
              } elseif ($_SESSION['idadeBeneficiario'] > 40) {
                $_SESSION['precoParcial'] = $price[0]->faixa3;
              } elseif ($_SESSION['idadeBeneficiario'] > 17 || $_SESSION['idadeBeneficiario'] <= 40) {
                $_SESSION['precoParcial'] = $price[0]->faixa2;
              }

              break;
            case '2':
              if ($_SESSION['idadeBeneficiario'] < 18) {
                $_SESSION['precoParcial'] = $price[2]->faixa1;
              } elseif ($_SESSION['idadeBeneficiario'] > 40) {
                $_SESSION['precoParcial'] = $price[2]->faixa3;
              } elseif ($_SESSION['idadeBeneficiario'] > 17 || $_SESSION['idadeBeneficiario'] <= 40) {
                $_SESSION['precoParcial'] = $price[2]->faixa2;
              }

              break;
            case '3':
              if ($_SESSION['idadeBeneficiario'] < 18) {
                $_SESSION['precoParcial'] = $price[3]->faixa1;
              } elseif ($_SESSION['idadeBeneficiario'] > 40) {
                $_SESSION['precoParcial'] = $price[3]->faixa3;
              } elseif ($_SESSION['idadeBeneficiario'] > 17 || $_SESSION['idadeBeneficiario'] <= 40) {
                $_SESSION['precoParcial'] = $price[3]->faixa2;
              }

              break;
            case '4':
              if ($_SESSION['idadeBeneficiario'] < 18) {
                $_SESSION['precoParcial'] = $price[4]->faixa1;
              } elseif ($_SESSION['idadeBeneficiario'] > 40) {
                $_SESSION['precoParcial'] = $price[4]->faixa3;
              } elseif ($_SESSION['idadeBeneficiario'] > 17 || $_SESSION['idadeBeneficiario'] <= 40) {
                $_SESSION['precoParcial'] = $price[4]->faixa2;
              }

              break;
            case '5':
              if ($_SESSION['idadeBeneficiario'] < 18) {
                $_SESSION['precoParcial'] = $price[5]->faixa1;
              } elseif ($_SESSION['idadeBeneficiario'] > 40) {
                $_SESSION['precoParcial'] = $price[5]->faixa3;
              } elseif ($_SESSION['idadeBeneficiario'] > 17 || $_SESSION['idadeBeneficiario'] <= 40) {
                $_SESSION['precoParcial'] = $price[5]->faixa2;
              }

              break;
            case '6':
              if ($_SESSION['idadeBeneficiario'] < 18) {
                $_SESSION['precoParcial'] = $price[6]->faixa1;
              } elseif ($_SESSION['idadeBeneficiario'] > 40) {
                $_SESSION['precoParcial'] = $price[6]->faixa3;
              } elseif ($_SESSION['idadeBeneficiario'] > 17 || $_SESSION['idadeBeneficiario'] <= 40) {
                $_SESSION['precoParcial'] = $price[6]->faixa2;
              }

              break;
          }
        }




        ?>
      </div>
    </div>
    <div class="card text-center shadow-lg mt-5">
      <h5 class="card-header">Proposta</h5>
      <div class="card-body">
        <?php

        echo "Tipo de plano: " . $_SESSION['tipoPlano'];
        echo '<br>';
        echo "Quantidade de beneficiarios: " . $_SESSION['qBeneficiario'];
        echo '<br>';
        echo "Idade de beneficiario: " . $_SESSION['idadeBeneficiario'];
        echo '<br>';
        echo "Nome de beneficiarios: " . $_SESSION['nomeBeneficiario'];
        echo '<br>';
        echo $_SESSION['beneficiario'];

        ?>
        <h5 class="card-title">Total <?php
                                      echo ($_SESSION['precoParcial']);
                                      ?></h5>
        <button type="submit" class="btn btn-primary">Finalizar proposta</button>
      </div>
      <?php
      $file = '../json/proposta.json';
      //Para garantir que o nome do arquivo seja sempre o mesmo

      $values = [];
      foreach ($_SESSION as $key => $value) {
        $values[$key] = strip_tags($value);
      }
      //Por questão de segurança, é importante filtrar os dados recebidos do formulário

      $toJson = json_encode($values);
      //Converte os dados para JSON

      file_put_contents($file, $toJson);
      //Adiciona as informações json ao arquivo
      ?>

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