<?
$id = $url[4];
if (!empty($_REQUEST[acao])) {

    try {
        $sql = "UPDATE ins_endereco SET descricao = :descricao  
            WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':descricao', $_REQUEST['descricao'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
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

$stmte = $pdo->prepare("SELECT * FROM ins_endereco WHERE id = :id");
$stmte->bindParam(':id', $id, PDO::PARAM_INT);
$stmte->execute();
$linha = $stmte->fetch(PDO::FETCH_ASSOC);
?>
<h2>Editar Endereço</h2>
<form action="" method="POST" class="form-horizontal" role="form">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Descricao</label>
        <div class="col-sm-5">
            <input type="text"  name="descricao" class="form-control" id="inputEmail3" placeholder="descricao" value="<?=$linha[descricao]?>" required>
        </div>
    </div>
    <input type="hidden" name="acao" value="1"/>
    <input type="hidden" name="id" value="<?=$id?>"/>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Editar</button>
        </div>
    </div>

</form>