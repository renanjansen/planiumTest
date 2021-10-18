<?php
session_start();
//condicional que leva para o cadastro de dependentes
if (
  $_POST['qBeneficiario'] > 1 &&
  $_SESSION['tipoPlano'] == 1 ||
  $_POST['qBeneficiario'] > 1 &&
  $_SESSION['tipoPlano'] == 6
) {
  header('location: formBeneficiarios.php');
} elseif (
  $_POST['qBeneficiario'] > 1 && $_SESSION['tipoPlano'] == 2 || $_SESSION['tipoPlano'] == 3 || $_SESSION['tipoPlano'] == 4  ||
  $_SESSION['tipoPlano'] == 5
) {
  echo "<script>alert('Plano selecionado não contempla mais de um beneficiários ,por favor escolha o plano 1 ou 6 para adicionar mais pessoas.');</script>";
  require('planos.php');
  die();
};

$_SESSION['qBeneficiario'] = $_POST['qBeneficiario'];

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
        <form method="post" action="./parcial.php" id="form">
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

        ?>
      </div>
    </div>
    <div class="card text-center shadow-lg mt-5">
      <h5 class="card-header">Proposta Parcial</h5>
      <div class="card-body">
        <?php


        echo "Tipo de plano: " . $_SESSION['tipoPlano'];
        echo '<br>';
        echo "Quantidade de beneficiarios: " . $_SESSION['qBeneficiario'];

        ?>

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