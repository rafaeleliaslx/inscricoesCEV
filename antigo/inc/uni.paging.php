<style type="text/css">
.paginacao{color: #444; font-size: 11px; height: 30px;}
.paginacao a:link, a:visited{color: #444; text-decoration: none; }
.paginacao a{padding: 5px 7px; background: #eaeaea; width: 11px; height: 15px; margin: 0 3px 0 0; text-decoration: none; border: 1px solid #CCC; }
.paginacao span{padding: 5px 7px; background: #838383; width: 11px; height: 15px; margin: 0 3px 0 0; color: #FFF !important; border: 1px solid #CCC;}
</style>

<?php

  /*---------------------------------------------------
  **
  **  Funcao para paginação usando a class-paginator
  **  Autor: fernandovaller@gmail.com
  **  Data: 23-03-2010 15:31 pt-BR
  **  Distribuição: livre/Free
  **
  **-------------------------------------------------*/

  /*--------------- COMO USAR -------------------------

    1 - incluir o arquivo "uni.paging.php"
      Ex: include("uni.paging.php");

    2 - criar uma variavel para receber os dados
      Ex: $rowDados = paginar(10,"SELECT * FROM nome_tabela");

    3 - chamar o array
      WHILE ( $row = mysql_fetch_array( $rowDados[0] ) { ... }
      <div class="paginacao"> $rowDados[1] </div>

  ---------------------------------------------------*/

  //função a ser chamada
  function paginar($qtd,$sql,$tipo,$n_pagina){

     // tipo
     // para indicar se é uma pagina do vestibular, colegio, concurso ou ead
    //principais
    $_pagi_sql = $sql;
    $_pagi_cuantos = $qtd;

    //nome da class para formatar com CSS
    $_pagi_nav_estilo_mod = 'paginacao';

    //navengacao
    $_pagi_separador = "";
    $_pagi_nav_anterior = "...";
    $_pagi_nav_siguiente = "...";
    $_pagi_nav_primera = "&laquo;&laquo;";
    $_pagi_nav_ultima = "&raquo;&raquo;";
    $_pagi_nav_num_enlaces = 10;

    //estilo
    $_pagi_nav_estilo = 'paginacao';


    //----------  INCLUSAO DA CLASS PAGINATOR COMPACTADA --------------
     if(empty($_pagi_sql)){
    	die("      <h1>Esta PÃ¡gina n&atilde;o existe</h1>
      <p>Caso tenha parado aqui por engano, <a href=".SITE_URL.">clique aqui para voltar a p&aacute;gina.</a></p>");
     }
     if(empty($_pagi_cuantos)){
    	$_pagi_cuantos = 20;
     }
     if(!isset($_pagi_mostrar_errores)){
    	$_pagi_mostrar_errores = true;
     }
     if(!isset($_pagi_conteo_alternativo)){
    	$_pagi_conteo_alternativo = false;
     }
     if(!isset($_pagi_separador)){
    	$_pagi_separador = " | ";
     }
      if(isset($_pagi_nav_estilo)){
    	$_pagi_nav_estilo_mod = "class=\"$_pagi_nav_estilo\"";
     }else{
     	$_pagi_nav_estilo_mod = "";
     }
     if(!isset($_pagi_nav_anterior)){
    	$_pagi_nav_anterior = "&laquo; Anterior";
     }
     if(!isset($_pagi_nav_siguiente)){
    	$_pagi_nav_siguiente = "Siguiente &raquo;";
     }
     if(!isset($_pagi_nav_primera)){
    	$_pagi_nav_primera = "&laquo;&laquo; Primera";
     }
     if(!isset($_pagi_nav_ultima)){
    	$_pagi_nav_ultima = "&Uacute;ltima &raquo;&raquo;";
     }
     if (empty($n_pagina)){
    	$_pagi_actual = 1;
     }else{
        	$_pagi_actual = $n_pagina;
     }
     if($_pagi_conteo_alternativo == false){
     	$_pagi_sqlConta = eregi_replace("select[[:space:]](.*)[[:space:]]from", "SELECT COUNT(*) FROM", $_pagi_sql);
     	$_pagi_result2 = mysql_query($_pagi_sqlConta);
     	if($_pagi_result2 == false && $_pagi_mostrar_errores == true){
    	die("      <h1>Esta PÃ¡gina n&atilde;o existe</h1>
      <p>Caso tenha parado aqui por engano, <a href=".SITE_URL.">clique aqui para voltar a p&aacute;gina.</a></p>");
     	}
     	$_pagi_totalReg = mysql_result($_pagi_result2,0,0);//total de registros
     }else{
    	$_pagi_result3 = mysql_query($_pagi_sql);
     	if($_pagi_result3 == false && $_pagi_mostrar_errores == true){
    	die("      <h1>Esta PÃ¡gina n&atilde;o existe</h1>
      <p>Caso tenha parado aqui por engano, <a href=".SITE_URL.">clique aqui para voltar a p&aacute;gina.</a></p>");
     	}
    	$_pagi_totalReg = mysql_num_rows($_pagi_result3);
     }
     $_pagi_totalPags = ceil($_pagi_totalReg / $_pagi_cuantos);
     $_pagi_enlace = SITE_URL."/".$tipo;
     $_pagi_query_string = "/noticias";
     if(!isset($_pagi_propagar)){
    	if (isset($n_pagina)) unset($n_pagina); // Eliminamos esa variable del $_GET
    	$_pagi_propagar = array_keys($_GET);
     }elseif(!is_array($_pagi_propagar)){
    	die("      <h1>Esta PÃ¡gina n&atilde;o existe</h1>
      <p>Caso tenha parado aqui por engano, <a href=".SITE_URL.">clique aqui para voltar a p&aacute;gina.</a></p>");
     }
     foreach($_pagi_propagar as $var){
     	if(isset($GLOBALS[$var])){
    		$_pagi_query_string.= $var."=".$GLOBALS[$var]."&";
    	}elseif(isset($_REQUEST[$var])){
    		$_pagi_query_string.= $var."=".$_REQUEST[$var]."&";
    	}
     }
     $_pagi_enlace .= $_pagi_query_string;
     $_pagi_navegacion_temporal = array();
     if ($_pagi_actual != 1){
    	$_pagi_url = 1; //será el número de página al que enlazamos
    	$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."/".$_pagi_url."'>$_pagi_nav_primera</a>";
    	$_pagi_url = $_pagi_actual - 1; //será el número de página al que enlazamos
    	$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."/".$_pagi_url."'>$_pagi_nav_anterior</a>";
     }
     if(!isset($_pagi_nav_num_enlaces)){
    	$_pagi_nav_desde = 1;//Desde la primera
    	$_pagi_nav_hasta = $_pagi_totalPags;//hasta la última
     }else{
    	$_pagi_nav_intervalo = ceil($_pagi_nav_num_enlaces/2) - 1;
    	$_pagi_nav_desde = $_pagi_actual - $_pagi_nav_intervalo;
    	$_pagi_nav_hasta = $_pagi_actual + $_pagi_nav_intervalo;
    	if($_pagi_nav_desde < 1){
    		$_pagi_nav_hasta -= ($_pagi_nav_desde - 1);
    		$_pagi_nav_desde = 1;
    	}
    	if($_pagi_nav_hasta > $_pagi_totalPags){
    		$_pagi_nav_desde -= ($_pagi_nav_hasta - $_pagi_totalPags);
    		$_pagi_nav_hasta = $_pagi_totalPags;
    		if($_pagi_nav_desde < 1){
    			$_pagi_nav_desde = 1;
    		}
    	}
     }
     for ($_pagi_i = $_pagi_nav_desde; $_pagi_i<=$_pagi_nav_hasta; $_pagi_i++){//Desde página 1 hasta última página ($_pagi_totalPags)
    	if ($_pagi_i == $_pagi_actual) {
    		$_pagi_navegacion_temporal[] = "<span ".$_pagi_nav_estilo_mod.">$_pagi_i</span>";
    	}else{
    		$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."/".$_pagi_i."'>".$_pagi_i."</a>";
    	}
     }
     if ($_pagi_actual < $_pagi_totalPags){
    	$_pagi_url = $_pagi_actual + 1; //será el número de página al que enlazamos
    	$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."/".$_pagi_url."'>$_pagi_nav_siguiente</a>";
    	$_pagi_url = $_pagi_totalPags; //será el número de página al que enlazamos
    	$_pagi_navegacion_temporal[] = "<a ".$_pagi_nav_estilo_mod." href='".$_pagi_enlace."/".$_pagi_url."'>$_pagi_nav_ultima</a>";
     }
     $_pagi_navegacion = implode($_pagi_separador, $_pagi_navegacion_temporal);
     $_pagi_inicial = ($_pagi_actual-1) * $_pagi_cuantos;
     $_pagi_sqlLim = $_pagi_sql." LIMIT $_pagi_inicial,$_pagi_cuantos";
     $_pagi_result = mysql_query($_pagi_sqlLim);
     if($_pagi_result == false && $_pagi_mostrar_errores == true){
    	die("      <h1>Esta PÃ¡gina n&atilde;o existe</h1>
      <p>Caso tenha parado aqui por engano, <a href=".SITE_URL.">clique aqui para voltar a p&aacute;gina inicial.</a></p>");
     }
     $_pagi_desde = $_pagi_inicial + 1;
     $_pagi_hasta = $_pagi_inicial + $_pagi_cuantos;
     if($_pagi_hasta > $_pagi_totalReg){
     	$_pagi_hasta = $_pagi_totalReg;
     }
     $_pagi_info = "Resultados $_pagi_desde - $_pagi_hasta de $_pagi_totalReg";
    //------ FIM DA INCLUSAO DA CLASS PAGINATOR


    //a variavel de retorno é um array
    return array($_pagi_result, $_pagi_navegacion, $_pagi_info);

  }


?>