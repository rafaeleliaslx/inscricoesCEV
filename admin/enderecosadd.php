<?
if (!empty($_REQUEST[acao])) {

    try {
        $stmte = $pdo->prepare("INSERT INTO ins_endereco(descricao) VALUES (?)");
        $stmte->bindParam(1, $_REQUEST['descricao'], PDO::PARAM_INT);
        $executa = $stmte->execute();

        if ($executa) {
            echo 'Dados inseridos com sucesso';
        } else {
            echo 'Erro ao inserir os dados';
        }
    } catch (PDOException $e) {
        #echo $e->getMessage();
    }
}
?>
<h2>Cadastrar Endereço</h2>
<form action="" method="POST" class="form-horizontal" role="form">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">descricao</label>
        <div class="col-sm-5">
            <input type="text"  name="descricao" class="form-control" id="inputEmail3" placeholder="descricao" required>
        </div>
    </div>
    <input type="hidden" name="acao" value="1"/>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Cadastrar</button>
        </div>
    </div>

</form>