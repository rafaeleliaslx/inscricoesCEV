<?php
@session_start();
//pegar url

$url = explode ("/", $_SERVER['REQUEST_URI']);
//print_r($url);
//definir url para usar nos caminhos de chamadas de css , img
define('SITE_URL', 'http://www.grupocev.com');

//fazer o css funciona
if ( dirname( $_SERVER["PHP_SELF"] ) == DIRECTORY_SEPARATOR ) {
    $root = "";
} else {
    $root = dirname( $_SERVER["PHP_SELF"] );
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Grupo CEV</title>

        <link rel="shortcut icon" href="<?=SITE_URL;?>/favicon.png" />

        <link rel="stylesheet" type="text/css" href="<?=SITE_URL; ?>/css/estilo.css" />
		<script language="JavaScript" src="<?=SITE_URL; ?>/js/cpf_cnpj.js" type="text/javascript"></script>
		<script language="JavaScript" src="<?=SITE_URL; ?>/js/formulario.js" type="text/javascript"></script>
        <script language="JavaScript" src="<?=SITE_URL; ?>/js/jquery-1.4.2.min.js" type="text/javascript"></script>

        <link rel="stylesheet" type="text/css" href="<?=SITE_URL; ?>/css/jquery.lightbox-0.5.css" media="screen" />
        <script language="JavaScript" src="<?=SITE_URL; ?>/js/jquery.lightbox-0.5.min.js" type="text/javascript"></script>

        <script type="text/javascript" language="javascript">
            function inclickcheck(field,def,val){
                if(field.value == def){
                    field.value = val;
                }
            }
        </script>

        <script language="JavaScript" src="<?=SITE_URL; ?>/js/jquery.cycle.all.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.destaque #banner').cycle({
                    fx: 'scrollRight',
                    speed:   500,
                    timeout: 6000,
                    pager:  '#nav'
                });
            });
        </script>
        <script language="JavaScript" type="text/javascript">
            var tagAlvo = new Array('p'); //pega todas as tags p//
            // Especificando os possíveis tamanhos de fontes, poderia ser: x-small, small...
            var tamanhos = new Array( '11px','12px','13px','14px','15px','16px','17px' );
            var tamanhoInicial = 3;
            function mudaTamanho( idAlvo,acao ){
                if (!document.getElementById) return
                var selecionados = null,tamanho = tamanhoInicial,i,j,tagsAlvo;
                tamanho += acao;
                if ( tamanho < 0 ) tamanho = 0;
                if ( tamanho > 6 ) tamanho = 6;
                tamanhoInicial = tamanho;
                if ( !( selecionados = document.getElementById( idAlvo ) ) ) selecionados = document.getElementsByTagName( idAlvo )[ 0 ];
                selecionados.style.fontSize = tamanhos[ tamanho ];
                for ( i = 0; i < tagAlvo.length; i++ ){
                    tagsAlvo = selecionados.getElementsByTagName( tagAlvo[ i ] );
                    for ( j = 0; j < tagsAlvo.length; j++ ) tagsAlvo[ j ].style.fontSize = tamanhos[ tamanho ];
                }
            }
        </script>
		
		<script language="JavaScript" src="<?=SITE_URL; ?>/js/select.js" type="text/javascript"></script>
		<!--Abaixo o Script que juntamente com o arquivo select.js tratam o select da logomarca-->
		<script>
			function mudaSite(){
				if(document.getElementById('select_site').value == "0")
					location.href="http://grupocev.com";
				if(document.getElementById('select_site').value == "1")
					location.href="http://grupocev.com/vestibulares";
				if(document.getElementById('select_site').value == "2")
					location.href="http://grupocev.com/colegio";
				if(document.getElementById('select_site').value == "3")
					location.href="http://grupocev.com/concursos";
				if(document.getElementById('select_site').value == "4")
					location.href="http://grupocev.com/ead";
			}
		</script>


		
    </head>
    <?php @require_once("inc/conexao.php"); ?>
    <?php @require_once("inc/funcoes.php"); ?>

    <?php
    //EVITAR CODIGOS MALICIOSOS NO NOME DA PAGINA
    $pagina=anti_injection($url[1]);
    //ARRAY COM TODAS AS PAGINAS LIBERADAS PARA O SISTEMA
    $paginas_liberadas=array('home', 'vestibulares', 'colegio', 'concursos', 'ead', 'profissionalizante','concursos-noticias', 'concursos-noticias-all','inscricoes');
    ?>

    <body>





        <?php
        //definição do estilo para cada pagina
        $pag_inicial='pagina-inicial';

        switch($pagina) {

            case 'home' :
                $pag_inicial='pagina-inicial';
                $pag_class='';
                $menu='home';
                break;

            case 'vestibulares' :
                $pag_inicial='';
                $pag_class='vestibulares';
                $menu='vestibulares';
                $dir='vestibulares'; //$dir utilizada para
                break;

            case 'colegio' :
                $pag_inicial='';
                $pag_class='colegio';
                $menu='colegio';
                $dir='colegio';
                break;

            case 'concursos' :
                $pag_inicial='';
                $pag_class='concursos';
                $menu='concursos';
                $dir='concursos';
                break;

            case 'ead' :
                $pag_inicial='';
                $pag_class='ead';
                $menu='ead';
                $dir='ead';
                break;
      
        }

        ?>

		
	
        <!-- container -->
        <div id="<?php echo $pag_inicial;  ?>" class="container <?php echo $pag_class;  ?>">


            <!-- topo -->
            <div id="topo">
                <div id="logo">
                    <a href="<?=SITE_URL?>" title="CEV">Cev</a>
					<form name="site" method="POST" action="">
						<select id="select_site" onChange="mudaSite()">
							<option value="0" <?php if($pagina == 'home')echo 'selected="selected"' ?> >Grupo Educacional</option>
							<option value="1" <?php if($pagina == 'vestibulares')echo 'selected="selected"' ?> >vestibulares</option>
							<option value="2" <?php if($pagina == 'colegio')echo 'selected="selected"' ?> >colegio</option>
							<option value="3"  <?php if($pagina == 'concursos')echo 'selected="selected"' ?> >concursos</option>
							<option value="4" <?php if($pagina == 'ead')echo 'selected="selected"' ?> >ead</option>
						</select>
				   </form>
                </div>
                <div class="right">
                    <div id="navegacao">
                        <ul>
                            <li class="inicial"><a href="<?=SITE_URL?>" title="Home" class="w-142">INICIAL</a></li>
                            <li class="vestibulares"><a href="<?=SITE_URL?>/vestibulares" title="Vestibulares" class="w-142">VESTIBULARES</a></li>
                            <li class="colegio"><a href="<?=SITE_URL?>/colegio" title="Col&eacute;gio" class="w-142">COL&Eacute;GIO</a></li>
                            <li class="concursos"><a href="<?=SITE_URL?>/concursos" title="Concursos" class="w-142">CONCURSOS</a></li>
                            <li class="ead"><a href="<?=SITE_URL?>/ead" title="EaD" class="w-142">EaD</a></li>
							
                        </ul>
                    </div>


          
                    










                    <div id="busca">
                        <form>
                            <label for="search">Busca</label>
                            <input id="search" type="text" size="50" value="digite o que procura" onfocus="inclickcheck(this,'digite o que procura','');" onblur="inclickcheck(this,'','digite o que procura');" />
                            <select>
                                <option value="0" selected="selected">todo o site</option>
                                <option value="0">vestibulares</option>
                                <option value="0">colegio</option>
                                <option value="0">concursos</option>
                                <option value="0">ead</option>
                            </select>
                            <input type="submit" value="buscar" class="botao" />

                            <?
                            $msg; session_start();
                            if(!isset($_SESSION["id_id"]) || !isset($_SESSION["login_login"]) or isset($_SESSION["id_forum"]) ) {
                                $msg = '';
                            }else {
                                //echo " <input type='button' value='Sair' class='sair' onClick='location.href='http://www.grupocev.com/concursos/logon'";
                                ?>
                            <input type="button" value="Sair" class="sair" onClick="location.href='<?=SITE_URL?>/<?=$url[1];?>/logon'">
                                    <?
                                    //$msg = "<br>Seja bem vindo ".$usuario."  |  <a href='".SITE_URL."/concursos/logon'>Sair</a>";
                                }?>
                                <?php
                                if(!isset($_SESSION["id_prof"]) || !isset($_SESSION["login_prof"])) {
                                    $msg = '';
                                }else {

                                    ?>
                                <input type="button" value="Sair" class="sair" onClick="location.href='<?=SITE_URL?>/<?=$url[1];?>/logoff'">
                                        <?php

                                    }

                                    // INICIO SAIR FORUM
                                if(!isset($_SESSION["id-forum"]) || !isset($_SESSION["nome-forum"])) {
                                    $msg = '';
                                }else {
                                    ?>
                                <input type="button" value="Sair" class="sair" onClick="location.href='<?=SITE_URL?>/<?=$url[1];?>/logon'">
                                  <?php  } // FIM SAIR FORUM?>
                        <?=$msg;?>
                        <?=$msg;?>

                       
                        </form>
						<div id="twitter" ><a href="http://twitter.com/grupocev" target="_blank"><img src="<?=SITE_URL?>/imagens/twitter.png" height="40"></a></div>
                        <br class="clear" />
                    </div>
                    <div id="breadcrumbs">
            	voc&ecirc; est&aacute; no <a href="<?=SITE_URL?>/home" title="p&aacute;gina inicial">Grupo CEV</a><?php echo breadcrumbs($url);?>
				<?
					if(!isset($_SESSION["login"]) || !isset($_SESSION["senha"])) {
                                    $msg = '';
                                }else {
				?>
				<input type="button" value="Sair" class="sair" onClick="location.href='<?=SITE_URL?>/vestibulares/destroy_sessao'"><?}?>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <!-- /topo -->