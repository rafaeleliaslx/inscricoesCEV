<?if ($_SESSION[emaillg] <> 'cev@grupocev.com'){?>
<p>
<a href="<?=site;?>relatorionovo" class="btn btn-primary" role="button">Gerar Novo Relatório</a>
</p>
<?}
?>

<table class="table table-striped">
    
    <tr>
        <th>Evento</th
>        <?if ($_SESSION[emaillg]<> 'cev@grupocev.com'){?>
        <th>Relatório</th>
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
            <?if ($_SESSION[emaillg]<> 'cev@grupocev.com'){?>
            <td><a href="<?=site?>testesedit/<?=$reg['id'];?>">Relatório</a></td>
            <?}?>
            <td><a href="<?=site?>informacoes/<?=$reg['id'];?>">Ver</a></td>
   <?}
?>
</table>
