<?
$id = $url[4];
$idEvento = $url[5];
$idCurso = $url[6];

		$sql = 'DELETE from usuarioteste where idAluno=:id  and idEvento = :idEvento and idCurso = :idCurso';
		$stmte = $pdo->prepare($sql);
        $stmte->bindParam(':id', $id, PDO::PARAM_INT);
        $stmte->bindParam(':idEvento', $idEvento, PDO::PARAM_INT);
        $stmte->bindParam(':idCurso', $idCurso, PDO::PARAM_INT);
        $executa = $stmte->execute();

     if ($executa) {
            echo '<p class="bg-success">Dados Removido com sucesso</p>';
        } else {
            echo '<p class="bg-danger">Erro ao Removido os dados</p>';
        }
?>
<META http-equiv="refresh" content="0;URL=<?=site?>usuariocurso/<?=$idEvento;?>">
