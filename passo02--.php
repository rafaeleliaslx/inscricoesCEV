<?
#echo "<H2>INSCRIÇÕES ENCERRADAS</H2>";
#exit();
if (empty($_SESSION[id])){
echo("<script language='javascript'>location.href='" . site1 . "logon</script>");    
}
$dadosEvento = testeSeletivo($url[3],$pdo);
#echo $dadosEvento[segmento];
#print_r($_SESSION);
#print_r($_SESSION);
#print_r($url);
#print_r($_REQUEST);

if (!empty($_REQUEST[acao])){

$saberInscrito = usuarioTesteCadastradoEvento($_SESSION['id'],$url[3],$pdo);
#print_r($saberInscrito);

    if(($saberInscrito[idCurso]==$_REQUEST['curso']) and !empty($saberInscrito[idCurso]) and ($saberInscrito[unidade]==$_REQUEST['unidade'])){
        echo("<script language='javascript'>location.href='" . site1 . "comprovante/".$_REQUEST['curso']."/".$_REQUEST['evento']."'</script>");
    }else{
        if(!empty($saberInscrito[id])){
            $sql = 'DELETE from usuarioteste where id=:id';
            $stmt = $pdo->prepare($sql);
            $executa = $stmt->execute(array(':id' => $saberInscrito[id]));
            echo "eee";
        }

    $hora = date("h") - 4;
    $cadastro = date("Y-m-d $hora:i:s");
$stmte = $pdo->prepare("SELECT * FROM `testecursossala` as t WHERE t.idEvento = :idEvento and t.idCurso = :idCurso and t.qt > 
    (SELECT count(u.idSala) as sala FROM usuarioteste as u WHERE u.idCurso = :idCurso and u.idSala = t.idSala) order by t.id asc limit 1");
$stmte->bindParam(':idEvento', $_REQUEST['evento'], PDO::PARAM_INT);
$stmte->bindParam(':idCurso', $_REQUEST['curso'], PDO::PARAM_INT);
$stmte->execute();

while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {
#echo "fjsdfksjf";
    $dadosCurso = cursos($linha['idCurso'], $pdo);
   $dadosSala = testeCursoSala($linha['idSala'],$_REQUEST['curso'],$_REQUEST['evento'],$pdo);


 $rs = $pdo->query("INSERT INTO  `usuarioteste` (`id`, `idEvento`, `idAluno`, `idCurso`, `IdSala`, `idEndereco`, `cadastro`,`unidade`) 
VALUES (NULL, '".$url[3]."', '".$_SESSION['id']."', '".$_REQUEST['curso']."', '".$linha['idSala']."', '".$dadosSala['endereco']."', '".$cadastro."','".$_REQUEST['unidade']."');");


echo("<script language='javascript'>location.href='" . site1 . "comprovante/".$_REQUEST['curso']."/".$_REQUEST['evento']."'</script>");
}
}

}

?>
<form action="" method="POST" role="form" name="form1">

<div class="col-lg-6" style="text-align: center">
   <b> 1º Evento / Dados Pessoais</b> <img src="<?=site1;?>img/ok.png" />
</div>
<div class="col-lg-6" style="text-align: center">
    <b style="color: #cccccc">2º Série/Curso </b> 

</div>
<p class="clearfix"><p>
<div class="progress">
    <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 50%">
        <span class="sr-only">50% Complete (success)</span>
    </div>     <div class="progress-bar progress-bar-info progress-bar-striped active" style="width: 40%">
        <span class="sr-only">40% Complete (success)</span>
    </div> 
</div>

<div class="panel panel-primary">
        <div class="panel-heading">Série / Curso Pretendido</div>
        <div class="panel-body">
<!--<div class="jumbotron " style="text-align: justify">
    <div style="text-align: center; font-size: 16px; font-weight: bold">Série/Curso Pretendido</div>
</div>-->
<div class="col-lg-10">
<b>Evento</b><br/>
<?=$dadosEvento[titulo]?><br/>
<p>&nbsp;</p>

<?php if($dadosEvento[segmento] !=2): ?>

<b>Em qual unidade pretende estudar:</b><br/>
<?
$alunoCurso = usuarioTeste($_SESSION['id'],$url[5],$url[3] ,$pdo);
?>
<INPUT TYPE="RADIO" NAME="unidade" VALUE="1" <? if (1 == $alunoCurso['unidade']){echo "checked";}?> required/> Frei Serafim<br/>
<INPUT TYPE="RADIO" NAME="unidade" VALUE="2" <? if (2 == $alunoCurso['unidade']){echo "checked";}?> required/> Kennedy<br/>
<p>&nbsp;</p>
 
 <?php endif ?>

<b>Série / Curso</b><br/> 
<?
$stmte = $pdo->prepare("SELECT * FROM testeseletivocursos WHERE idEvento = :idEvento ");
$stmte->bindParam(':idEvento', $url[3], PDO::PARAM_INT);
$stmte->execute();
while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {
    $dadosCurso = cursos($linha['idCurso'], $pdo);
    $alunoCurso = usuarioTeste($_SESSION['id'],$linha['idCurso'],$url[3] ,$pdo);
    ?>
    <input type="radio" name="curso" value="<?= $linha['idCurso']; ?>" <? if ($linha['idCurso'] == $alunoCurso['idCurso']){echo "checked";}?>/>
    <?#= #$linha['idCurso']; ?>  
     - 
    <?= $dadosCurso['descricao']; ?> <br/>
              
                
    <?
}
?>
</div>
</div>
    <p style="text-align: center"> 
        <input type="hidden" value="<?=$url[3];?>" name="evento" />
        <input type="submit" value="Próximo >>" class="btn btn-lg btn-success" role="button"/>
    </p>
    <input type="hidden" value="1" name="acao"/>

    <? 
    ?>
    </form>

