<p>
<a href="<?=site;?>cursosadd" class="btn btn-primary" role="button">Adicionar Novo Curso</a>
</p>
<table class="table table-striped">
    
    <tr>
        <th>Nome</th>
        <th>Editar</th>
        <th>Remover</th>
    </tr>

<?
 $rs = $pdo->query("SELECT * FROM ins_curso")->fetchAll();
 
   if(!$rs){
      #print_r($pdo->errorInfo());
   }
 
   foreach ($rs as $reg){
       ?>
        <tr>
            <td><?=$reg['descricao'];?></td>
            <td><a href="<?echo site."cursosedit/".$reg['id'];?>">Editar</a></td>
            <td><a href="<?echo site."cursosdel/".$reg['id'];?>" onClick="return confirm('Deseja realmente DELETAR  : <?=$reg['descricao'];?> ?')">Delete</a></td>
   <?}
?>
</table>
