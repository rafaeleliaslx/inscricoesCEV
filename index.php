<?
#exit();#
include '/var/www/inscricoes/admin/confs.php';
$url = explode("/", $_SERVER['REQUEST_URI']);
#print_r($url);
define('site', 'http://localhost/inscricoes/admin/');
define('site1', 'http://localhost/inscricoes/');
@session_start();
?>
<!DOCTYPE html>
<!-- saved from url=(0050)http://getbootstrap.com/examples/jumbotron-narrow/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="http://www.grupocev.com/favicon.png" />

        <title>Grupo Educacional CEV - Central de Inscrições </title>

        <!-- Bootstrap core CSS -->
        <link href="<?= site1 ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= site1 ?>css/summernote.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?= site1 ?>css/jumbotron-narrow.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="<?= site1 ?>js/ie-emulation-modes-warning.js"></script>

 <script src="http://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript"></script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
               <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
                    <script src="<?= site1 ?>js/gmaps.js" type="text/javascript"></script>
                    <script src="<?= site1 ?>js/cep.js" type="text/javascript"></script>
                    <script src="<?= site1 ?>js/mask.js" type="text/javascript"></script>
                    <script language="javascript">
                $(function () {
                    wscep({map: 'map1', auto: true});
                });
                function ValidarCPF(Objcpf) {
                    var cpf = Objcpf.value;
                    exp = /\.|\-/g
                    cpf = cpf.toString().replace(exp, "");
                    var digitoDigitado = eval(cpf.charAt(9) + cpf.charAt(10));
                    var soma1 = 0, soma2 = 0;
                    var vlr = 11;

                    for (i = 0; i < 9; i++) {
                        soma1 += eval(cpf.charAt(i) * (vlr - 1));
                        soma2 += eval(cpf.charAt(i) * vlr);
                        vlr--;
                    }
                    soma1 = (((soma1 * 10) % 11) == 10 ? 0 : ((soma1 * 10) % 11));
                    soma2 = (((soma2 + (2 * soma1)) * 10) % 11);

                    var digitoGerado = (soma1 * 10) + soma2;
                    if (digitoGerado != digitoDigitado) {
                            var cpfNome = Objcpf.name;
                            var texto = " Invalido !!!";
                        alert(cpfNome+texto);

                        document.form1.Objcpf.cpfNome.focus();
//                        document.getElementById(Objcpf.name).focus();
//                        $("#cpf").focus();
                    }
                }
                    </script>            
                    <style type="text/css">
                        .invalid{
                            border:1px solid red !important;
                        }
                    </style>
        <style type="text/css">
            .table {font-size: 14px}
        </style>
    </head>

    <body cz-shortcut-listen="true">

        <div class="container">

            <div class="header">
                <? if (!empty($_SESSION['id']) and ! empty($_SESSION['usuario'])) { ?>
                    <ul class="nav nav-pills pull-right">
                        <li <?if (empty($url[2])){echo "class='active'";}?>><a href="<?= site1; ?>">Inicio</a></li>
                        <li <?if ($url[2]== 'dadospessoais'){echo "class='active'";}?>><a href="<?= site1; ?>dadospessoais">Dados Pessoais</a></li>
                        <li><a href="<?= site1; ?>meuscursos">Minhas Inscrições</a></li>
                        <li><a href="<?= site1; ?>logon">Sair</a></li>
                    </ul>
                <? } else { ?>
                    <ul class="nav nav-pills pull-right">
                        <li ><a href="<?= site1; ?>">Inicio</a></li>
                        <li ><a href="<?= site1; ?>identificacao">Logar</a></li>
                    </ul>
                <? } ?>
                <img src="http://grupocev.com/inscricoes/img/marcas-02.png" width="80px" style="padding: 3px;">
                 <b style="color: #757989">Central de Inscrições</b>  
            </div>
            <? if (!empty($_SESSION['id']) and ! empty($_SESSION['usuario'])) { ?>
            <p style="margin-top:  -20px; margin-bottom: -20px; text-align: right">Ol? Sr(a). <?=$_SESSION["usuario"];?>!!!</p>
            <?}?>
            <div class="row marketing">

                <?php
                if ($url[2] == "up") {
                  $caminho = ($_SERVER["DOCUMENT_ROOT"] . "/inscricoes/home.php");
                } elseif ($url[2] != "") {
                    $caminho = ($_SERVER["DOCUMENT_ROOT"] . "/inscricoes/" . $url[2] . ".php");
                } else
                {
                    $caminho = ($_SERVER["DOCUMENT_ROOT"] . "/inscricoes/home.php");
                }
                @include($caminho);
                ?>
            </div>    

            <div class="footer">
                <p>Núcleo de Tecnologia Grupo Educacional CEV<br/>® Company 2014</p>
            </div>

        </div> <!-- /container -->


        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="./Narrow Jumbotron Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>


    </body> </html>