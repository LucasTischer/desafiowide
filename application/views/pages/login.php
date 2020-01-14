<?php error_reporting(E_ALL); ini_set('display_errors', 'On'); ?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">

    <title>Interwebs | Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="<?=base_url('assets/css/signin.css');?>" rel="stylesheet">
    
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </head>
  <body>

    <p class="text-center " id="toggle" style="padding-top:5%">
        <button class="btn btn-sm btn-outline-primary" type="submit" style="min-width:150px">Login</button>
        <button class="btn btn-sm btn-outline-primary" type="submit" style="min-width:150px">Cadastre-se</button>
    </p>
    <div class="text-center" id="login">
      <form class="form-signin" method="POST" action="<?php echo base_url(); ?>Users/login_validation">
        <img class="mb-4" src="../Assets/Images/cam.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Acesso ao sistema</h1>

        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmailLogin" name="email" class="form-control" placeholder="Digite seu email" required autofocus>

        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPasswordLogin" name="senha" class="form-control" placeholder="Digite sua senha" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit" value="login">ENTRAR</button>
        <?php echo $this->session->flashdata("error"); ?>

      </form>
    </div>

    <div class="text-center" id="cadastro">
      <form class="form-signin" method="POST" action="cadastrar.php">
        <img class="mb-4" src="../Assets/Images/cam.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Cadastro</h1>

        <label for="inputUsername" class="sr-only">Email</label>
        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Digite seu username" required autofocus>

        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmailCadastro" name="email" class="form-control" placeholder="Digite seu email" required autofocus>

        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPasswordCadastro" name="senha" class="form-control" placeholder="Digite sua senha" required>

        <label for="inputPassword2" class="sr-only">Repita a senha</label>
        <input type="password" id="inputPassword2" name="senha2" class="form-control" placeholder="Repita sua senha" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">CADASTRAR</button>
        
      </form>
    </div>

    <script type="text/javascript" src="<?=base_url('assets/js/scripts.js');?>"></script>
  </body>
</html>
