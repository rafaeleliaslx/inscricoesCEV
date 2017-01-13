<?
$dados = testeSeletivo($url[4], $pdo);
#print_r($dados);
if (!empty($_REQUEST[acao])) {
    $valQuantidade = "qt-" . $url[6];
    $valEndereco = "endereco-" . $url[6];
    $quantidade = $_REQUEST[$valQuantidade];
    $endereco = $_REQUEST[$valEndereco];
    try {
        $sql = "UPDATE testecursossala SET qt = :qt , endereco = :endereco  
            WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':qt', $quantidade, PDO::PARAM_STR);
        $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
        $stmt->bindParam(':id', $url[6], PDO::PARAM_INT);
        $executa = $stmt->execute();



        if ($executa) {
            echo '<p class="bg-success">Dados inseridos com sucesso</p>';
        } else {
            echo '<p class="bg-danger">Erro ao inserir os dados</p>';
        }
    } catch (PDOException $e) {
        #echo $e->getMessage();
    }
}
?>

<h3>Evento</h3>
<p><?= $dados[titulo]; ?></p>
<h3>Cursos</h3>
<?
$dadosCurso = cursos($url[5], $pdo);
echo $dadosCurso[descricao];
?>
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
        $rs = $pdo->query("SELECT * FROM testecursossala where id = $url[6]")->fetchAll();

        foreach ($rs as $reg) {
            $dadosSala = sala($reg['idSala'], $pdo);
            ?>
            <tr>
                <td><?= $dadosSala['descricao']; ?></td>
                <td>         <?= $dadosSala[lotacao]; ?>            </td>
                <td>                <input type="text" name="qt-<?= $reg['id']; ?>" value="<?= $reg['qt']; ?>"/>            </td>
                <td>
                    <?
                    $rsE = $pdo->query("SELECT * FROM ins_endereco")->fetchAll();

                    foreach ($rsE as $regE) {
                        ?><input type="radio" name="endereco-<?= $reg['id']; ?>" value="<?= $regE['id']; ?>" <?
                        if ($reg['endereco'] == $regE['id']) {
                            echo "checked";
                        }
                        ?>/>
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