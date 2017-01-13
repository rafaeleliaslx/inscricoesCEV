<?
include './confs.php';
session_start();




if(empty($_SESSION[emaillg])){
    include 'logar.php';
exit();
    exit();
}


$url = explode ("/", $_SERVER['REQUEST_URI']);
#print_r($url);
define(site, 'http://localhost/inscricoes/admin/');
define(site1, 'http://localhost/inscricoes/');
?><!DOCTYPE html>
<!-- saved from url=(0051)http://getbootstrap.com/examples/navbar-static-top/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="http://www.grupocev.com/favicon.png" />

        <title>-</title>

        <!-- Bootstrap core CSS -->
        <link href="<?=site1;?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= site1 ?>css/summernote.css" rel="stylesheet">
          <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />

        <!-- Custom styles for this template -->
        <link href="<?=site1;?>css/navbar-static-top.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->  
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="<?=site1;?>js/jquery.min.js"></script>
         <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> 
        <script src="<?=site1;?>js/ie-emulation-modes-warning.js"></script>
        <script src="<?=site1;?>js/summernote.js"></script>
        

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body cz-shortcut-listen="true">

        <!-- Static navbar -->
        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=site;?>">Grupo Educacional CEV</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li  ><a href="<?=site;?>testes">Testes</a></li>
                        <?if ($_SESSION[emaillg]<> 'cev@grupocev.com'){?>
                        <!--<li class="active"><a href="<?=site;?>testes">Testes</a></li>-->
                        <li><a href="<?=site;?>cursos">Cursos</a></li>
                        <li><a href="<?=site;?>salas">Salas</a></li>
                        <li><a href="<?=site;?>enderecos">Endereços</a></li>
                        <li><a href="<?=site;?>infor">Informações</a></li>
                        <li><a href="<?=site;?>relatorio">Relatório</a></li>
<!--                        <li class="dropdown">
                            <a href="http://getbootstrap.com/examples/navbar-static-top/#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="http://getbootstrap.com/examples/navbar-static-top/#">Action</a></li>
                                <li><a href="http://getbootstrap.com/examples/navbar-static-top/#">Another action</a></li>
                                <li><a href="http://getbootstrap.com/examples/navbar-static-top/#">Something else here</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="http://getbootstrap.com/examples/navbar-static-top/#">Separated link</a></li>
                                <li><a href="http://getbootstrap.com/examples/navbar-static-top/#">One more separated link</a></li>
                            </ul>
                        </li>-->
                        <?}?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Bem Vindo: Admin</a></li>
                        <!--<li class="active"><a href="./Static Top Navbar Example for Bootstrap_files/Static Top Navbar Example for Bootstrap.html">Static top</a></li>-->
                        <li><a href="<?=site;?>logon">Sair</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        <p class="text-right">
        <input type="button" value="Voltar" class="btn btn-warning" />
</p>

        <div class="container">
	<?php
			if($url[3]!=""){
				$caminho = ($_SERVER["DOCUMENT_ROOT"]."/inscricoes/admin/".$url[3].".php");
			}else{
				$caminho = ($_SERVER["DOCUMENT_ROOT"]."/inscricoes/admin/home.php");	
			}
				include($caminho);
		?>	
            <!-- Main component for a primary marketing message or call to action -->
           

        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        
        <script src="<?=site1;?>js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="<?=site1;?>js/ie10-viewport-bug-workaround.js"></script>


    </body>
    <!--<object id="5b8b6898-fbb8-96a1-ba08-c88a38ba8fac" width="0" height="0" type="application/gas-events-uni">

    </object>-->
</html>