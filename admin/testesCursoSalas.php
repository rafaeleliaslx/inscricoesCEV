<?
$dados = testeSeletivo($url[4], $pdo);
#print_r($dados);
#echo $dados;
?>

<h3>Evento</h3>

<p>
<a href="<?=site;?>testesCursos/<?= $url[4]; ?>"><?= $dados[titulo]; ?></a>
    </p>
<h3>Cursos</h3>
<?
$dadosCurso = cursos($url[5],$pdo);
echo $dadosCurso[descricao];
?>
<h3>Salas</h3>
<?if ($_SESSION[emaillg]<> 'cev@grupocev.com'){?>
<p>
    <a href="<?= site; ?>testesCursoSalasadd/<?= $url[4]; ?>/<?= $url[5]; ?>" class="btn btn-primary" role="button">Adicionar Sala</a>
</p>
<?}?>
<table class="table table-striped">

    <tr>
        <th>Sala</th>
        <th>Frequencia</th>
        <th>Presença</th>
        <th>Inscritos</th>
        <th>Quantidade</th>
        <th>Endereço</th>
        <?if ($_SESSION[emaillg]<> 'cev@grupocev.com'){?>
        <th>Editar</th>
        
        <th>Deletar</th>
        <?}?>
    </tr>

    <?
    $stmte = $pdo->prepare("SELECT * FROM testecursossala WHERE idEvento = :idEvento and idCurso = :idCurso");
    $stmte->bindParam(':idEvento', $url[4], PDO::PARAM_INT);
    $stmte->bindParam(':idCurso', $url[5], PDO::PARAM_INT);
    $stmte->execute();
    while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {
        #$dadosCurso = cursos($linha['idCurso'],$pdo);
        $dadosEndereco = endereco($linha['endereco'],$pdo);
        $dadosSala = sala($linha['idSala'],$pdo);
        ?>
        <tr>
            <td><?= $dadosSala['descricao']; ?></td>
            <td>
                <a href="<?=site;?>frecursosala/<?= $url[4]; ?>/<?= $url[5]; ?>/<?= $linha['idSala']; ?>/1">Frequencia Frei</a> <br>
                <a href="<?=site;?>frecursosala/<?= $url[4]; ?>/<?= $url[5]; ?>/<?= $linha['idSala']; ?>/2">Frequencia Kennedy</a>
            </td>
            <td>
                <a href="<?=site;?>presencaCursoSala/<?= $url[4]; ?>/<?= $url[5]; ?>/<?= $linha['idSala']; ?>/1">Frequencia Frei</a> <br>
                <a href="<?=site;?>presencaCursoSala/<?= $url[4]; ?>/<?= $url[5]; ?>/<?= $linha['idSala']; ?>/2">Frequencia Kennedy</a>

            </td>
            <td>
                <?
               $qnt =  usuarioTesteCursosala($url[4],$url[5],$linha[idSala],$pdo);
               #print_r($qnt);
               echo  $qnt[id];
                ?>

            </td>
            <td><?= $linha['qt']; ?></td>
            <td><?= $dadosEndereco['descricao']; ?></td>
            <?if ($_SESSION[emaillg]<> 'cev@grupocev.com'){?>
            <td><a href="<?=site;?>testesCursoSalasedit/<?= $url[4]; ?>/<?= $url[5]; ?>/<?= $linha['id']; ?>">Editar</a></td>
            
            <td><a href="<?=site;?>testesCursoSalasDel/<?= $url[4]; ?>/<?= $url[5]; ?>/<?= $linha['id']; ?>" onClick="return confirm('Deseja realmente DELETAR  : <?= $dadosSala['descricao']; ?>')">Deletar</a></td>
            <?}?>
                        
            <?
        }
 
        ?>
</table>
