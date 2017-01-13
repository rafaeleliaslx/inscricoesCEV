<?
$dados = testeSeletivo($url[4], $pdo);
#print_r($url);
if (!empty($_REQUEST[acao])) {


//    xprint_r($_REQUEST);
#echo $dados;
    $idSalas = $_REQUEST[idSala];
    foreach ($idSalas as $value) {
        $valQuantidade = "qt-" . $value;
        $valEndereco = "endereco-" . $value;
 #       echo $valEndereco."-";
        $quantidade = $_REQUEST[$valQuantidade];
        $endereco = $_REQUEST[$valEndereco];
#echo    "INSERT INTO  `testecursossala` (`id`, `idEvento`, `idCurso`, `idSala`, `qt`, `endereco`) VALUES (NULL, '$url[4]', '$url[5]', '$value', '$quantidade', '$endereco');";
        $stmte = $pdo->prepare("INSERT INTO testecursossala( idEvento, idCurso, idSala, qt, endereco) VALUES (?,?,?,?,?)");
        $stmte->bindParam(1, $url[4], PDO::PARAM_INT);
        $stmte->bindParam(2, $url[5], PDO::PARAM_INT);
        $stmte->bindParam(3, $value, PDO::PARAM_INT);
        $stmte->bindParam(4, $quantidade, PDO::PARAM_INT);
        $stmte->bindParam(5, $endereco, PDO::PARAM_INT);
        $executa = $stmte->execute();
    }
}
?>

<h3>Evento</h3>
<p>
<a href="<?=site;?>testesCursos/<?= $url[4]; ?>"><?= $dados[titulo]; ?></a>
    </p>
<h3>Cursos</h3>
<?
$dadosCurso = cursos($url[5], $pdo);
#echo $dadosCurso[descricao];
?> 
<a href="<?=site;?>testesCursoSalas/<?= $url[4]; ?>/<?= $url[5]; ?>/<?= $linha['id']; ?>"><?=$dadosCurso[descricao];?></a>
<h3>Salas</h3>
<form action="" method="POST">
    <table class="table table-striped">
        <tr>
            <th>Sala</th>
            <th>Lotação</th>
            <th>Quantidade</th>
            <th>Endereço</th>

        </tr>
        <?
        $rs = $pdo->query("SELECT * FROM ins_sala")->fetchAll();

        foreach ($rs as $reg) {
            $dadosCursoSala = testeCursoSala($reg['id'],$url[5],$url[4], $pdo);
            ?>
            <tr>
                <td>
                    <?
                    
                    #if ($dadosCursoSala['idSala'] <> $reg['id']) {

                        ?>
                        <input type="checkbox" name="idSala[]" value="<?= $reg['id']; ?>"/>
                        <?
                    #}
                    ?>

                    <?= $reg['descricao']; ?>
                </td>
                <!--<td><?= $reg['conteudo']; ?></td>-->
                <td>         <?= $reg[lotacao] ?>            </td>
                <td>                <input type="text" name="qt-<?= $reg['id']; ?>"/>            </td>
                <td>
                    <?
                    $rsE = $pdo->query("SELECT * FROM ins_endereco")->fetchAll();

                    foreach ($rsE as $regE) {
                        ?><input type="radio" name="endereco-<?= $reg['id']; ?>" value="<?= $regE['id']; ?>"/>
                        <?
                        echo $regE[descricao] . "<br/>";
                    }
                    ?>         
                </td>
            <? }
            ?>
        </tr></table>

    <input type="hidden" value="1" name="acao" />
    <input type="submit" value="Enviar" class="btn btn-primary" />
</form>