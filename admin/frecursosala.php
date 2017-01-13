<center>
<p><img src="http://www.grupocev.com/imagens/logo-cev.jpg"/><br/>
 
<?
$dados = testeSeletivo($url[4], $pdo);
echo "<b>".$dados[titulo]; ?></b><br/>
    
 
<?
$dadosCurso = cursos($url[5],$pdo);
echo "<b>".$dadosCurso[descricao];?></b><br/>

<?
$dadosSala = sala($url[6],$pdo);
echo "<b>".$dadosSala[descricao];?></b>
<?
if ($url[7]== 1){
echo "<b>FREI</b>";
}elseif($url[7]== 2){
echo "<b>KENNEDY</b>";
}


?>

</p>
</center>
<table class="table table-striped">

    <tr>
        <th> Nome</th>
        <th> Assinatura</th>

        
        
    </tr>

    <?

    #print_r($url);
    $stmte = $pdo->prepare("SELECT * FROM usuarioteste as ut, usuario as u WHERE ut.idEvento = :idEvento and ut.idCurso = :idCurso and ut.idSala = :idSala and ut.unidade = :idUnidade and ut.idAluno <> '' and ut.idAluno=u.id order by u.nome ");
    $stmte->bindParam(':idEvento', $url[4], PDO::PARAM_INT);
    $stmte->bindParam(':idCurso', $url[5], PDO::PARAM_INT);
    $stmte->bindParam(':idSala', $url[6], PDO::PARAM_INT);
    $stmte->bindParam(':idUnidade', $url[7], PDO::PARAM_INT);
     
    $stmte->execute();
    while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {
        $dadosCurso = cursos($linha['idCurso'],$pdo);
        $dadosAluno = usuario($linha['idAluno'],$pdo);
        ?>
        <tr>
            <td><?= strtoupper($dadosAluno['nome']); ?></td>
         
            <td> &nbsp;</td>
            
 
            <?
        }
 
        ?>
</table>