<?
$dadosEvento = testeSeletivo($url[3],$pdo);
?>      
<div class="jumbotron " style="text-align: justify">
    <div style="text-align: center; font-size: 16px; font-weight: bold"><?=$dadosEvento[titulo]?></div>
</div>
<div class="col-lg-10">
<b>Nome</b><br/>
<input type="text" name="nome" class="col-lg-10"/>
</div>
<div class="col-lg-4">
<b>Data de Nascimento</b><br/>
<input type="text" class="col-lg-10" />
</div>
<div class="col-lg-4">
<b>RG</b><br/><input type="text" class="col-lg-10" />
</div>
<div class="col-lg-4">
<b>CPF</b><br/><input type="text" class="col-lg-10" />
</div>
<div class="col-lg-4">
<b>Naturalidade</b><br/><input type="text" class="col-lg-10" />
</div>
<div class="col-lg-4">
<b>Email</b><br/><input type="text" class="col-lg-10" />
</div>
<p class="clearfix">&nbsp;</p>
<div class="jumbotron " style="text-align: justify">
    <div style="text-align: center; font-size: 16px; font-weight: bold">Endereço</div>
</div>
<div class="col-lg-4">
<b>CEP</b><br/><input type="text" class="col-lg-10" />
</div>
<div class="col-lg-4">
<b>Rua</b><br/><input type="text" class="col-lg-10" />
</div>
<div class="col-lg-4">
<b>Bairro</b><br/><input type="text" class="col-lg-10" />
</div>
<div class="col-lg-4">
<b>Numero</b><br/><input type="text" class="col-lg-10" />
</div>
<div class="col-lg-4">
<b>Cidade</b><br/><input type="text" class="col-lg-10" />
</div>
<div class="col-lg-4">
<b>Estado</b><br/><input type="text" class="col-lg-10" />
</div>
<div class="col-lg-4">
<b>Complemento</b><br/><input type="text" class="col-lg-10" />
</div>
<p class="clearfix">&nbsp;</p>
<div class="jumbotron " style="text-align: justify">
    <div style="text-align: center; font-size: 16px; font-weight: bold">Curso Pretendido</div>
</div>
<div class="col-lg-4">
<b>Curso</b><br/> 
  <?
    $stmte = $pdo->prepare("SELECT * FROM testeseletivocursos WHERE idEvento = :idEvento");
    $stmte->bindParam(':idEvento', $url[3], PDO::PARAM_INT);
    $stmte->execute();
    while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {
        $dadosCurso = cursos($linha['idCurso'],$pdo);
        ?>
<input type="radio" name="curso" value="<?=$linha['idCurso'];?>" />
         <?= $dadosCurso['descricao']; ?> <br/>
          
            
            <?
        }
 
        ?>
</div>