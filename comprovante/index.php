<style type="text/css">body{background:#fff; font-family: arial; font-size: 12pt;}#topo{display:none;}.menu{display:none;} #rodape{display:none;} h1{margin:7px 0;padding:0;}#imprimir{font:14px/15pt Arial,Helvetica,sans-serif;margin-left:auto;margin-right:auto;width:750px;}#logo{padding-top:10px;width:220px;}
td {padding: 5px; font-size: 12pt;}
table{font-size: 12pt;}

</style>

<?php
@session_start();
$url = explode("/", $_SERVER['REQUEST_URI']);
#print_r($url);
//Conexão com o database db98296_cevpro
#@require_once("inc/conecta_pro.php");
include('../admin/confs.php');
$idAluno = $_SESSION['id'];
if(!empty($url[5])){
$idAluno = $url[5];
}

$idCurso = $url[3];
#print_r($_SESSION);
$dadosUsuario = usuario($idAluno,$pdo);
$dadosUsarioEvento = usuarioTeste($idAluno,$idCurso,$url[4],$pdo);
#print_r($dadosUsarioEvento);
$dadosEvento = testeSeletivo($dadosUsarioEvento[idEvento],$pdo);
$dadosCurso = cursos($dadosUsarioEvento[idCurso],$pdo);
$dadosSala = sala($dadosUsarioEvento[IdSala],$pdo);
$dadosInformacao = informacao($dadosEvento[informacao],$pdo);
#print_r($dadosSala);
$dadosEndereco = endereco($dadosUsarioEvento[idEndereco],$pdo);
#print_r($dadosUsuario);
#$md5 = tratar_titulo(urldecode($url[3]));

if(isset($_REQUEST['comprovante'])) {
    echo "<title>CEV - Comprovante de Inscri&ccedil;&atilde;o </title>";
}

?>

<div style="text-align: center"><img src="http://grupocev.com/inscricoes/img/marcas-02.png" width="240px"   style="margin-top: 0px;" alt="" /></div>

<div id="post">


    <h2 align="center"><?echo $dadosEvento[titulo]?></h2>
    <h3 align="center">Comprovante de Inscri��o</h3>
    <center>
    <!--<center><align="center"><font color="#ff0000"><b>Data: 15/01/2010<b/></font></center>-->
    <table border="0" width="800px">
        <tbody>
            <tr >
                <td colspan="4"><b>Nome</b></td>
            </tr>


            <tr>
                <td colspan="4"><font size="3"><?echo $dadosUsuario[nome]?></font></td>
            </tr>
            <tr>
                <td><b>CPF</b></td>

                <td colspan="2"><b>Data Nascimento</b></td>
            </tr>
            <tr>
                <td><?echo $dadosUsuario[cpf]?></td>

                <td colspan="2"><?echo mostraData($dadosUsuario[nascimento]);?></td>
            </tr>
            <tr>
                <td><b>Endere�o</b></td>
                <td><b>Numero</b></td>
                <td><b>Bairro</b></td>
                <td><b>Complemento</b></td>
            </tr>
            <tr>
                <td><?echo $dadosUsuario[rua]?></td>
                <td><?echo $dadosUsuario[numero]?></td>
                <td><?echo $dadosUsuario[bairro]?></td>
                <td><?echo $dadosUsuario[complemento]?></td>
            </tr>
            <tr>
                <td><b>CEP</b></td>
                <td><b>Cidade</b></td>
                <td><b>Estado</b></td>
                <td><b>Telefones</b></td>
            </tr>
            <tr>
                <td><?echo $dadosUsuario[cep]?></td>
                <td><?echo $dadosUsuario[cidade]?></td>
                <td><?echo $dadosUsuario[estado]?></td>
                <td><?echo $dadosUsuario[telefone]?></td>
            </tr>
            <tr>
                <td colspan="4"><b>Email</b>:</td>

            </tr>
            <tr>
                <td colspan="4"><?echo $dadosUsuario[email]?></td>

            </tr>


            <tr>
                <td colspan="4"><b>Curso Pretendido</b></td>

            </tr>
            <tr>
                <td colspan="4"><font size="3" color="#ff0000"><b><?echo $dadosCurso[descricao]?></b></font></td>
            </tr>
<? if($dadosUsarioEvento[unidade] <> 0){?>
            <tr>
                <td colspan="4"><b>Unidade escolhida para estudar:</b></td>

            </tr>
            <tr>
                <td colspan="4"><font size="3" color="#ff0000"><b><?
                if($dadosUsarioEvento[unidade] == 1){
                    echo "FREI SERAFIM";
                } elseif ($dadosUsarioEvento[unidade] == 2) {
                    echo "KENNEDY";
                }
                ?></b></font></td>
            </tr>

             <?}?>



            <!--<tr>
                <td colspan="4"><b>COMO TOMOU CONHECIMENTO DO NOSSO COLÉGIO?</b></td>

            </tr>
            <tr>
                <td colspan="4"><?//echo $cev?></td>

            </tr>-->

   <!--          <tr>
                <td colspan="4">2<? #echo mostraData($data)?></td>

            </tr> -->
            </tr>
            </tr>
            <tr>
                <td colspan="4" align="center" height="50"><h2><font color="#ff0000">Aten��o</h2></td></font>

            </tr>
            <tr>
                <td colspan="2"><b>Data do Evento </b> </td>
                <td colspan="2"><b>Hor�rio </b></td>


            </tr>
            <tr>
                <td colspan="2"><?echo mostraData($dadosEvento[aplicacao]);?></td>
                <td colspan="2"><b><font size='6' color='#ff0000'><?echo $dadosEvento[horario];?></font></b></td>
                          <?
//                         if ($serie_pretendida == '3� ano - M�dio'){
//                             $saber3 = 1;
//                         }

//                         $saber = explode(" ",$serie_pretendida);

//                         if (($saber[0] == '3') ){
//                             echo "<td colspan='2'>Na sede do <font size='3' color='#ff0000'><b>CEV Eurobusiness</b></font></td>";
//                         }else{
//                             echo "<td colspan='2'>Na sede do <font size='3' color='#ff0000'><b>CEV $local </b></font>";
// //                            print_r($saber);
// //                            echo "----".$saber3;
//                             echo"</td>";
//                         }
                        ?>

            </tr>

            <tr>

<td colspan="2"><b>Local</b>
<td colspan="2"><b>Sala</b>
                </td>
            </tr>
            <tr>
                <!--<td colspan="2"><b><font size='3' color='#ff0000'><?=$dadosEndereco[descricao]?></font></b></td>-->
                <?
    if($dadosUsarioEvento[unidade] == 1){
                    echo "<td colspan='2'><b><font size='6' color='#ff0000'>Av. Frei Serafim 3125 - CEV Col�gio </font></b></td>";
                } elseif ($dadosUsarioEvento[unidade] == 2) {
                    echo "<td colspan='2'><b><font size='6' color='#ff0000'>Rua Dr. Jos� Auto de Abreu, 2929. S�o Crist�v�o. - CEV Col�gio Kennedy</b></td>";
                }else{
                    echo "<td colspan='2'><b><font size='6' color='#ff0000'>Av. Frei Serafim 3125 - CEV Col�gio </font></b></td>";
                }
                ?>
                
                <td colspan="2"><b><font size='3' color='#ff0000'><?=$dadosSala[descricao]?></font></b></td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: justify;"><br/><br/><b>
                    <?=$dadosInformacao[descricao];?>
                    </b></td>

            </tr>
             <tr>
                <td colspan="4">
<p><div style="text-align: justify; ">   N�s do <span style="font-weight: bold;">GRUPO EDUCACIONAL CEV</span> estamos � frente de uma campanha de arrecada��o de  alimentos n�o perec�veis, para doa��es aos abrigos de Teresina. Para isso, gostar�amos de contar com a colabora��o de <span style="font-weight: bold;">1kg de alimento</span> de cada aluno inscrito no nosso teste seletivo. Sua colabora��o poder� ser entregue no dia da prova, n�o � obrigat�ria</span>, mas colocaria um sorriso no rosto de muitas crian�as.</div></p>

                </td>
            </tr> 
        </tbody>
    </table>
<div>
  <a href="javascript:window.print()" style="padding: 10px; background-color: #EC971F; color: #ffffff; font-weight: bold; text-decoration: none"> <img src="http://grupocev.com/inscricoes/img/print.png" /> Imprimir Comprovante</a>
  <p>&nbsp</p>

</center>

</div><!-- /post -->

