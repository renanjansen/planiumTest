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
        <form method="post" action="./qbeneficiarios.php" id="form">
          <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="tipoPlano" required>

            <option selected>Selecione o tipo de plano</option>

            <?php
            //recebi o jason com os planos de decodifiquei
            $jsonPlans = file_get_contents("../json/plans.json");
            $plans = json_decode($jsonPlans);

            ?>

            <!--com o arquivo json decodificado e trasformado em array atribuí o índice código como value do select e o nome como nome do select-->
            <option value="<?php
                            echo $plans[0]->codigo;
                            ?>">

              <?php
              echo $plans[0]->nome;
              ?>
            </option>
            <option value=" <?php
                            echo $plans[1]->codigo;
                            ?>"> <?php
      echo $plans[1]->nome;
      ?>
            </option>
            <option value="<?php
                            echo $plans[2]->codigo;
                            ?>"> <?php
      echo $plans[2]->nome;
      ?>
            </option>
            <option value=" <?php
                            echo $plans[3]->codigo;
                            ?>"> <?php
      echo $plans[3]->nome;
      ?>
            </option>
            <option value="<?php
                            echo $plans[4]->codigo;
                            ?>"> <?php
      echo $plans[4]->nome;
      ?>
            </option>
            <option value="<?php
                            echo $plans[5]->codigo;
                            ?>"> <?php
      echo $plans[5]->nome;
      ?>
            </option>
          </select>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php



        ?>
      </div>
    </div>
    <div class="card text-center shadow-lg mt-5">
      <h5 class="card-header">Proposta Parcial</h5>
      <div class="card-body">

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
  <script>
    function seguirFormulario() {
      let text = document.getElementById('form');
      text.innerHTML = "<label from='name'>Digite a quantidade de beneficiários</label><input class='form-control' type='number' name='Beneficiario' required>";

    }
  </script>
</body>

</html>