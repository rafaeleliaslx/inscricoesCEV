<?php

//AntiInject
function anti_injection($sql) {
    $sql = preg_replace(sql_regcase("/(http|www|wget|from|select|insert|delete|where|.dat|.txt|.gif|drop table|show tables|#|\*|--|\\\\)/"),"",$sql);
    $sql = trim($sql);
    $sql = strip_tags($sql);
    $sql = addslashes($sql);
    return $sql;
}


function remove_acentos($str, $enc = 'UTF-8') {

    $acentos = array(
            'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
            'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
            'C' => '/&Ccedil;/',
            'c' => '/&ccedil;/',
            'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
            'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
            'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
            'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
            'N' => '/&Ntilde;/',
            'n' => '/&ntilde;/',
            'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
            'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
            'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
            'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
            'Y' => '/&Yacute;/',
            'y' => '/&yacute;|&yuml;/',
            'a.' => '/&ordf;/',
            'o.' => '/&ordm;/'
    );

    return preg_replace($acentos, array_keys($acentos), htmlentities($str,ENT_NOQUOTES, $enc));
}


function nome_url($id, $titulo) {

    //remove qualquer ocorrencia
    $titulo = str_replace("%", "", $titulo);
    $titulo = remove_acentos($titulo);
    $new_url = str_replace(' ', '+', $titulo);
    $new_url = "$id+".$new_url;
    return $new_url;

}

//concatena com dois id's
function url_dual_cod($curso,$aula, $titulo) {

    //remove qualquer ocorrencia
    $titulo = str_replace("%", "", $titulo);
    $titulo = remove_acentos($titulo);
    $new_url = str_replace(' ', '+', $titulo);
    $new_url = "$curso+"."$aula+".$new_url;
    return $new_url;
}


//essa função, trata com ante_injection, remove acentos e retorno um ID
function tratar_titulo($valor) {

    $valor = anti_injection($valor);
    $valor = remove_acentos($valor);
    $valor = explode('+', $valor);
    $id = $valor[0];
    return $id;

}

//essa função, trata com ante_injection, remove acentos e retorno um ID
function return_dual_id($valor) {

    $valor = anti_injection($valor);
    $valor = remove_acentos($valor);
    $valor = explode('+', $valor);
    $id = $valor[1];
    return $id;

}





//funçoes para recupera dados
function noticia($valor) {

    $result = @mysql_query("SELECT * FROM news_concursos WHERE id = '$valor' LIMIT 1");
    //pega o total de registros da consulta
    $totalRow = @mysql_num_rows($result);

    $row = @mysql_fetch_assoc($result);

    $dia = $row['dia']; //0
    $mes = $row['mes']; //1
    $ano = $row['ano']; //2
    $titulo = $row['titulo']; //3
    $subtitulo = $row['subtitulo']; //4
    $texto = $row['texto']; //5
    $fonte = $row['fonte']; //6

    return array ( $totalRow, $dia, $mes, $ano, $titulo, $subtitulo, $texto, $fonte);

}


//funçoes para recupera dados
function curso($valor) {

    $result = @mysql_query("SELECT * FROM cursos_concursos WHERE id = '$valor' LIMIT 1");
    //pega o total de registros da consulta
    $totalRow = @mysql_num_rows($result);

    $row = @mysql_fetch_assoc($result);

    //0 é a qtd de linhas
    $nome = $row['nome']; //1
    $texto = $row['texto']; //2

    return array ( $totalRow, $nome, $texto);

}

function cursos_ead($valor) {

    $result = @mysql_query("SELECT * FROM cursos_ead WHERE id = '$valor' LIMIT 1");
    //pega o total de registros da consulta
    $totalRow = @mysql_num_rows($result);

    $row = @mysql_fetch_assoc($result);

    //0 é a qtd de linhas
    $nome = $row['nome']; //1
    $texto = $row['texto']; //2

    return array ( $totalRow, $nome, $texto);

}



//funçoes para recupera dados
function forum_acesso($valor) {

    $result = @mysql_query("SELECT * FROM forum_acesso WHERE id = '$valor' LIMIT 1");
    //pega o total de registros da consulta
    $totalRow = @mysql_num_rows($result);

    $row = @mysql_fetch_assoc($result);

    //0 é a qtd de linhas
    $nome = $row['nome']; //1
    $email = $row['email']; //2
    $cpf   = $row['cpf']; //3
    $senha = $row['senha']; //4
    return array ( $totalRow, $nome, $email, $cpf, $senha);

}

//funçoes para recupera dados
function vestibular_curso($valor) {

    $result = @mysql_query("SELECT * FROM pag WHERE id = '$valor' LIMIT 1");
    //pega o total de registros da consulta
    $totalRow = @mysql_num_rows($result);

    $row = @mysql_fetch_assoc($result);

    //0 é a qtd de linhas
    $nome = $row['nome']; //1
    $texto = $row['texto']; //2

    return array ( $totalRow, $nome, $texto);

}
function conv($term, $tp) {
    if ($tp == "1") $palavra = strtr(strtoupper($term),"àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ","ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß");
    elseif ($tp == "0") $palavra = strtr(strtolower($term),"ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß","àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ");
    return $palavra;
}

function mostra_Datas ($data) {
if ($data!='') {
   return (substr($data,8,2).'/'.substr($data,5,2).'/'.substr($data,0,4));
}
else { return ''; }
}

function breadcrumbs($url) {
    /*exibe ate 4 niveis
      if($url[1] != ''){
        $url_aux = ' &raquo; '.$url[1];
      }
      if($url[2] != ''){
        $url_aux .= ' &raquo; '. $url[2];
      }
      if($url[3] != ''){
        $url_aux .= ' &raquo; '. $url[3];
      }
      if($url[4] != ''){
        $url_aux .= ' &raquo; '. $url[4];
      }*/


    $link = SITE_URL;
    foreach($url as $url_atu) {
        if($url_atu != '') {
            if(strlen($url_atu) > 50)
                $url_atu = substr($url_atu,0,50)." ...";
            if($url_atu == "noticia")
                $url_atu = "noticias";
            if($url_atu == "curso")
                $url_atu = "cursos";
            $link .= '/'.$url_atu;
            $url_aux .= ' &raquo;<a href='.$link.'> '.$url_atu.'</a>';
        }
    }

    return $url_aux;

}
//função para gerar senha forum concurso
function gera_senha(){
      $CaracteresAceitos = 'abcdefghijklmnopqrstuvxywz0123456789';

      $max = strlen($CaracteresAceitos)-1;

      $cod_twitter = null;

      for($i=0; $i < 5; $i++) {

        $cod_twitter .= $CaracteresAceitos{mt_rand(0, $max)};

      }

      return $cod_twitter;
  }
function limpar_cpf($sql) {
    $sql = preg_replace(sql_regcase(".-"),"",$sql);
    $sql = trim($sql);
    $sql = strip_tags($sql);
    $sql = addslashes($sql);
    return $sql;
}

function verficar_aluno($email,$cpf) {
$host_serv_xaos = 'mysql.sistemacev.com.br';
$user_serv_xaos = 'sistemacev';
$senha_serv_xaos = '391239';
$db_serv_xaos = 'sistemacev';

$conect_servs = @mysql_connect( $host_serv_xaos, $user_serv_xaos, $senha_serv_xaos) or die ("<br><center> Internet com problemas 001 </center>");
@mysql_select_db($db_serv_xaos, $conect_servs)or die ("<br><center> Internet com problemas 002 </center>");

    $result = mysql_query("SELECT * FROM cevon_aluno WHERE email = '$email' and cpfaluno = '$cpf'");
    //pega o total de registros da consulta
    $totalRow = mysql_num_rows($result);

    if(empty ($totalRow)){
        return 'nao';
    }else{
    return 'sim';
    }
    
    mysql_close($conect_servs);
   // return $totalRow;
    


}
function formatarCPF_CNPJ($campo, $formatado = true){
	    //retira formato
	    $codigoLimpo = ereg_replace("[' '-./ t]",'',$campo);
	    // pega o tamanho da string menos os digitos verificadores
	    $tamanho = (strlen($codigoLimpo) -2);
	    //verifica se o tamanho do código informado é válido
	    if ($tamanho != 9 && $tamanho != 12){
	        return false;
	    }

	    if ($formatado){
	        // seleciona a máscara para cpf ou cnpj
	        $mascara = ($tamanho == 9) ? '###.###.###-##' : '##.###.###/####-##';

	        $indice = -1;
	        for ($i=0; $i < strlen($mascara); $i++) {
	            if ($mascara[$i]=='#') $mascara[$i] = $codigoLimpo[++$indice];
	        }
	        //retorna o campo formatado
	        $retorno = $mascara;

	    }else{
	        //se não quer formatado, retorna o campo limpo
	        $retorno = $codigoLimpo;
	    }

	    return $retorno;

	}
?>
