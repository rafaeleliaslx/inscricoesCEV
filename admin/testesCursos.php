<?
$dados = testeSeletivo($url[4], $pdo);
#print_r($dados);
#echo $dados;
?>

<h3>Evento</h3>
<p><?= $dados[titulo]; ?>- <a href="<?=site?>usuariocurso/<?echo  $url[4];?>" class="btn btn-primary">Lista de Inscritos</a></p>
<a href="<?=site;?>testesCursos2/<?=$url[4]?>" class="btn btn-primary">Relatorio</a>
<h3>Cursos</h3>
<?if ($_SESSION[emaillg]<> 'cev@grupocev.com'){?>
<p>
    <a href="<?= site; ?>testescursosadd/<?= $dados[id]; ?>" class="btn btn-primary" role="button">Adicionar Curso</a>
</p>
<?}?>
<table class="table table-striped">

    <tr>
        <th>Curso</th>
        <th>Inscritos</th>
        <th>Salas</th>
        <?if ($_SESSION[emaillg]<> 'cev@grupocev.com'){?>
        <th>Deletar</th>
        <?}?>
    </tr>

    <?
    $stmte = $pdo->prepare("SELECT * FROM testeseletivocursos WHERE idEvento = :idEvento");
    $stmte->bindParam(':idEvento', $url[4], PDO::PARAM_INT);
    $stmte->execute();
    while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {
        $dadosCurso = cursos($linha['idCurso'],$pdo);
        ?>
        <tr>
            <td><?= $dadosCurso['descricao']; ?></td>
            <td><?
 $qnt =  usuarioTesteCurso($url[4],$linha['idCurso'],$pdo);
               #print_r($qnt);
               echo $qnt[id];
            ?></td>
            <td><a href="<?=site?>testesCursoSalas/<?echo  $url[4]."/".$linha['idCurso']; ?>">Salas</a></td>
            <?if ($_SESSION[emaillg]<> 'cev@grupocev.com'){?>
            <td><a href="#<?= $reg['id']; ?>">Deletar</a></td>
            <?}?>
            <?
        }
 
        ?>
</table>
