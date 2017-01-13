<?
$dadosEvento = testeSeletivo($url[3],$pdo);
?>
<div class="col-lg-4" style="text-align: center">
    <b>1º Dados Pessoais</b> <span class="glyphicon glyphicon-ok"></span>
</div>
<div class="col-lg-4" style="text-align: center">
    <b style="color: #cccccc">2º Evento</b> 
</div>
<div class="col-lg-4" style="text-align: center">
    <b style="color: #cccccc">3º Série/Curso </b> 
</div>
<p class="clearfix"><p>
<div class="progress">
    <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 33%">
        <span class="sr-only">33% Complete (success)</span>
    </div>
    <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 34%">
        <span class="sr-only">33% Complete (success)</span>
    </div>
    <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 33%">
        <span class="sr-only">33% Complete (success)</span>
    </div>
</div> 
<div class="jumbotron " style="text-align: justify">
    <div style="text-align: center; font-size: 16px; font-weight: bold">Série/Curso Pretendido</div>
</div>
<div class="col-lg-10">
<b>Evento</b><br/>
<?=$dadosEvento[titulo]?><br/>
<p>&nbsp;</p>
<b>Curso</b><br/> 
<?
$stmte = $pdo->prepare("SELECT * FROM testeseletivocursos WHERE idEvento = :idEvento");
$stmte->bindParam(':idEvento', $url[3], PDO::PARAM_INT);
$stmte->execute();
while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {
    $dadosCurso = cursos($linha['idCurso'], $pdo);
    ?>
    <input type="radio" name="curso" value="<?= $linha['idCurso']; ?>" />
    <?= $dadosCurso['descricao']; ?> <br/>
              
                
    <?
}
?>
</div>