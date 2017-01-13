<h3>Salas</h3>
<p>
<a href="<?=site;?>salasadd" class="btn btn-primary" role="button">Adicionar Novo Sala</a>
</p>
<table class="table table-striped">
    
    <tr>
        <th>Nome</th>
        <th>Maximo</th>
        <th>Editar</th>
        <th>Remover</th>
    </tr>

<?
 $rs = $pdo->query("SELECT * FROM ins_sala")->fetchAll();
 #$rs = $pdo->query("SELECT * FROM testecursossala WHERE  idEvento = '1' and idCurso = '2'")->fetchAll();
 
   if(!$rs){
      #print_r($pdo->errorInfo());
   }
 
   foreach ($rs as $reg){
       ?>
        <tr>
            <td><?=$reg['descricao'];?></td>
            <td><?=$reg['lotacao'];?></td>
            <td><a href="<?echo site."salasedit/".$reg['id'];?>">Editar</a></td>
            <td><a href="<?echo site."salasdel/".$reg['id'];?>" onClick="return confirm('Deseja realmente DELETAR  : <?=$reg['descricao'];?> ?')">Delete</a></td>
   <?}
?>
</table>
