<h3>Informações</h3>
<p>
<a href="<?=site;?>inforadd" class="btn btn-primary" role="button">Adicionar Nova Informação</a>
</p>
<table class="table table-striped">
    
    <tr>
        <th>Nome</th>
        <th>Editar</th>
        <th>Remover</th>
    </tr>

<?
 $rs = $pdo->query("SELECT * FROM ins_informacoes")->fetchAll();
 
   if(!$rs){
      #print_r($pdo->errorInfo());
   }
 
   foreach ($rs as $reg){
       ?>
        <tr>
            <td><?=$reg['descricao'];?></td>
            <td><a href="<?echo site."inforedit/".$reg['id'];?>">Editar</a></td>
            <td><a href="<?echo site."infordel/".$reg['id'];?>" onClick="return confirm('Deseja realmente DELETAR  : <?=$reg['descricao'];?> ?')">Delete</a></td>
   <?}
?>
</table>
