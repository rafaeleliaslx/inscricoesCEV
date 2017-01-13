<?
$id = $url[6];
$sql = 'DELETE from testecursossala where id=:id';
$stmt = $pdo->prepare($sql);
$executa = $stmt->execute(array(':id' => $id));

     if ($executa) {
            echo '<p class="bg-success">Dados removido   com sucesso</p>';
        } else {
            echo '<p class="bg-danger">Erro ao inserir os dados</p>';
        }
?>
<META http-equiv="refresh" content="0;URL=<?=site?>testesCursoSalas/<?=$url[4];?>/<?=$url[5];?>">
