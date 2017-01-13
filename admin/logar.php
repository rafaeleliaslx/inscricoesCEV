<?
define(site, 'http://localhost/inscricoes/admin/');
define(site1, 'http://localhost/inscricoes/');


if(!empty($_REQUEST[acao])){


if (($_REQUEST[lg] == 'brunololiveira@yahoo.com.br') and ($_REQUEST[pw] == 'bru78lo')){
  session_start();
$_SESSION[emaillg] = 'brunololiveira@yahoo.com.br';
echo("<script language='javascript'>location.href='" . site  . "'</script>");

}elseif  (($_REQUEST[lg] == 'gr') and ($_REQUEST[pw] == 'cev45')){
  session_start();
$_SESSION[emaillg] = 'cev@grupocev.com';
echo("<script language='javascript'>location.href='" . site  . "'</script>");
  # code...

}elseif  (($_REQUEST[lg] == 'admin@grupocev.com') and ($_REQUEST[pw] == 'cev45')){
  session_start();
$_SESSION[emaillg] = 'admin@grupocev.com';
echo("<script language='javascript'>location.href='" . site  . "'</script>");
  # code...

}elseif(($_REQUEST[lg] == 'alexromerolima@gmail.com') and ($_REQUEST[pw] == 'alexcev2015')){
  session_start();
  $_SESSION[emaillg] = 'alexromerolima@gmail.com';
  echo("<script language='javascript'>location.href='" . site  . "'</script>");

}elseif(($_REQUEST[lg] == 'regispmendes@gmail.com') and ($_REQUEST[pw] == 'regiscev16')){
   session_start();
  $_SESSION[emaillg] = 'regispmendes@gmail.com';
  echo("<script language='javascript'>location.href='" . site  . "'</script>");


}
/*
elseif(($_REQUEST[lg]=='fabricio_arjo@globomail.com') and ($_REQUEST[pw]=='fab456')){
  session_start();
  $_SESSION[emaillg]='fabricio_arjo@globomail.com';
  echo("<script language='javascript'>location.href='" . site  . "'</script>");

}*/

else{
  $erro =  "Login ou senha errado(a).";
}
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://www.grupocev.com/favicon.png" />

    <title>-</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=site1;?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=site1;?>css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?=site1;?>js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" action="" method="POST">

        <!-- <h2 class="form-signin-heading">Login</h2> -->
        <?=$erro;?>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus  name="lg">
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required name="pw">
        <input type="hidden" name="acao" value="1">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Salvar
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?=site1;?>js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>