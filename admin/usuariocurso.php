<?
$testeSeletivo = testeSeletivo($url[4],$pdo);
?>

<table class="table table-striped">

    <tr>
            <th> id</th>
            <?if ($testeSeletivo[remover]==0){?>
            <th> Remover</th>
            <?}?>
            <th> cadastro</th>
            <th> nome</th>
            <th> amigo</th>
            <th> Curso</th>
            <th> Unidade</th>
            <th>Sala</th>
            <th> email</th>
            <th> nascimento</th>
            <th> rg</th>
            <th> cpf</th>
            <th> naturalidade</th>
            <th> cep</th>
            <th> rua</th> 
            <th> bairro</th>
            <th>numero</th>
            <th>cidade</th>
            <th>estado</th>
            <th>telefone</th>
            <th>colegio</th>
            <th>nome resp</th>
            <th>rg resp</th>
            <th>cpf resp</th>
            <th>telefones resp</th>
            <th>Senha</th>
            <th>Comprovante</th>
        
        
    </tr>

    <?
    $stmte = $pdo->prepare("SELECT * FROM usuarioteste as ut, usuario as u WHERE ut.idEvento = :idEvento  and ut.idAluno <> '' and ut.idAluno=u.id order by u.nome , ut.cadastro");
    $stmte->bindParam(':idEvento', $url[4], PDO::PARAM_INT);
    
    $stmte->execute();
    while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {
        
        $dadosCurso = cursos($linha['idCurso'],$pdo);
        $dadosAluno = usuario($linha['idAluno'],$pdo);
        $dadosSala = sala($linha['IdSala'],$pdo);
        
       


        ?>
        <tr> 
            

            <td><?= $dadosAluno['id']; ?></td>
            <?if ($testeSeletivo[remover]==0){?>
            <td><a href="<?=site;?>usuariodel/<?= $linha['id']; ?>/<?= $url['4']; ?>/<?= $linha['idCurso']; ?>" class="btn btn-danger" onclick="return confirm('Deseja deletar <?= $dadosAluno['nome']; ?> ?')"> Remover</a></td>
              <?}?>

              <?
              $cadastro = explode(" ",$linha['cadastro']);
              ?>
            <td><?= mostraData($cadastro[0]); ?> <?=$cadastro[1]; ?></td>
            <td><?= $dadosAluno['nome']; ?></td>
            <td><?= $dadosAluno['amigo']; ?></td>
            <td><?= $dadosCurso['descricao']; ?></td>
            <td><?

            if ($linha['unidade'] == 1){echo "Frei Serafim";}
            if ($linha['unidade'] == 2){echo "Kennedy";}
             ?></td>
            <td><?= $dadosSala['descricao']; ?></td>            

            <td><?= $dadosAluno['email']; ?></td>
            <!--<td><?= $dadosAluno['email']; ?></td>-->
            <td><?= $dadosAluno['nascimento']; ?></td>
            <td><?= $dadosAluno['rg']; ?></td>
            <td><?= $dadosAluno['cpf']; ?></td>
            <td><?= $dadosAluno['naturalidade']; ?></td>
            <td><?= $dadosAluno['cep']; ?></td>
            <td><?= $dadosAluno['rua']; ?></td>
            <td><?= $dadosAluno['bairro']; ?></td>
            <td><?= $dadosAluno['numero']; ?></td>
            <td><?= $dadosAluno['cidade']; ?></td>
            <td><?= $dadosAluno['estado']; ?></td>
            <td><?= $dadosAluno['telefone']; ?></td>
            <td><?= $dadosAluno['colegio']; ?></td>
            <td><?= $dadosAluno['nomeresp']; ?></td>
            <td><?= $dadosAluno['rgresp']; ?></td>
            <td><?= $dadosAluno['cpfresp']; ?></td>
            <td><?= $dadosAluno['telefoneresp']; ?></td>
            <td><?= $dadosAluno['email']; ?></td>
            <td><?= $dadosAluno['pw']; ?></td>
            <td><a href='http://grupocev.com/inscricoes/comprovante/<?=$linha[idCurso]?>/<?=$linha[idEvento]?>/<?=$linha[idAluno];?>'>Comprovante</a></td>
              

            
 
            <?
        }
 
        ?>
</table>