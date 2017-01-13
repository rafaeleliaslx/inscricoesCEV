<?
if (!empty($_REQUEST[acao])) {

    $idEvento = $_REQUEST[evento];
    $idCurso = $_REQUEST[cursoadd];

    foreach ($idCurso as $value) {
        # if ($idCursoBd == $value) {#
        echo $idCursoBd . "-" . $value . "<br/>";
        $stmte = $pdo->prepare("INSERT INTO testeseletivocursos(idEvento,idCurso) VALUES (:idEvento,:idCurso)");
        $stmte->bindParam(':idEvento', $idEvento, PDO::PARAM_INT);
        $stmte->bindParam(':idCurso', $value, PDO::PARAM_INT);
        $executa = $stmte->execute();
        # }#
    }
    ?>
    <META http-equiv="refresh" content="1;URL=<?= site ?>testesCursos/<?= $url[4] ?>">
    <p class="bg-success">Dados inseridos com sucesso</p>
    <?
}
$dados = testeSeletivo($url[4], $pdo);
$eventoCursos = testeSeletivocursos($url[4], $pdo);
if (!empty($eventoCursos)) {
    foreach ($eventoCursos as $value) {
        $cursoCadastrados[] = $value[idCurso];
    }
}
?>
<h3>Evento</h3>
<p><?= $dados[titulo]; ?></p>
<form action="" method="POST">
    <table class="table table-striped">
        <tr>
            <th>Cursos</th>
        </tr>
        <?
        $rs = $pdo->query("SELECT * FROM ins_curso")->fetchAll();
        foreach ($rs as $key => $reg) {
            ?>
            <tr>
                <td>
                    <? if (@!in_array($reg[id], $cursoCadastrados)) { ?>
                        <input type="checkbox" name="cursoadd[]" value="<?= $reg[id]; ?>"/>
                        <?
                    } echo $reg['descricao'];
                    ?> 

                </td>
            <? }
            ?>
    </table>
    <input type="submit" value="Enviar" class="btn btn-primary">
    <input type="hidden" name="acao" value="1"/>
    <input type="hidden" name="evento" value="<?= $url[4] ?>"/>
</form>