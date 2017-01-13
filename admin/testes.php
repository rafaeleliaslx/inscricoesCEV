
<?if ($_SESSION[emaillg] <> 'cev@grupocev.com'){?>
<p>
<a href="<?=site;?>testesadd" class="btn btn-primary" role="button">Adicionar Novo Teste</a>
</p>
<?}

?>

<table class="table table-striped">
    
    <tr>
        <th>Evento</th>
        <th>Cursos</th>
        <?if ($_SESSION[emaillg]<> 'cev@grupocev.com'){?>
        <th>Editar</th>
        <?}?>
        <th>ver</th>
    </tr>

<?
 $rs = $pdo->query("SELECT * FROM testeseletivo order by id desc")->fetchAll();
   if(!$rs){
      #print_r($pdo->errorInfo());
   }
 
   foreach ($rs as $reg){
       ?>
        <tr>
            <td><?=$reg['titulo'];?></td>
            <!--<td><?=$reg['conteudo'];?></td>-->
            <td><a href="<?=site?>testesCursos/<?=$reg['id'];?>">Cursos</a></td>
            <?if ($_SESSION[emaillg]<> 'cev@grupocev.com'){?>
            <td><a href="<?=site?>testesedit/<?=$reg['id'];?>">Editar</a></td>
            <?}?>
            <td><a href="<?=site?>informacoes/<?=$reg['id'];?>">Ver</a></td>
   <?}
?>
</table>
