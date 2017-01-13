<h3>Endereços</h3>
<p>
<a href="<?=site;?>enderecosadd" class="btn btn-primary" role="button">Adicionar Novo Endereço</a>
</p>
<table class="table table-striped">
    
    <tr>
        <th>Nome</th>
        <th>Editar</th>
        <th>Remover</th>
    </tr>

<?
 $rs = $pdo->query("SELECT * FROM ins_endereco")->fetchAll();
 
   if(!$rs){
      #print_r($pdo->errorInfo());
   }
 
   foreach ($rs as $reg){
       ?>
        <tr>
            <td><?=$reg['descricao'];?></td>
            <td><a href="<?echo site."enderecoedit/".$reg['id'];?>">Editar</a></td>
            <td><a href="<?echo site."enderecosdel/".$reg['id'];?>" onClick="return confirm('Deseja realmente DELETAR  : <?=$reg['descricao'];?> ?')">Delete</a></td>
   <?}
?>
</table>
