<?
$id = $url[4];
$sql = 'DELETE from ins_sala where id=:id';
$stmt = $pdo->prepare($sql);
$executa = $stmt->execute(array(':id' => $id));

     if ($executa) {
            echo '<p class="bg-success">Dados inseridos com sucesso</p>';
        } else {
            echo '<p class="bg-danger">Erro ao inserir os dados</p>';
        }
?>
<META http-equiv="refresh" content="0;URL=<?=site?>salas">
