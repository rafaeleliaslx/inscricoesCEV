 <div class="col-lg-12">
 
    <h4 style="background-color:  #d9534f; padding: 5px; color: #ffffff;">Minhas Inscrições</h4>
      
    <table class="table table-striped">
        <thead>
        <tr>
            <td><b>Editar</b></td>
            <td  style="text-align:center"><b>2º Via</b></td>
            <td  style="text-align:center"><b>Resultado</b></td>
        </tr>
    </thead>


        <?
        $id = 1;
        $stmte = $pdo->prepare("SELECT * FROM  `testeseletivo` AS t, usuarioteste AS u WHERE t.id = u.idEvento AND u.idAluno =  :idAluno and segmento = :idSegmento");
        $stmte->bindParam(':idSegmento', $id, PDO::PARAM_INT);
        $stmte->bindParam(':idAluno', $_SESSION['id'], PDO::PARAM_INT);
        $stmte->execute();
        while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {
            $saberInscrito = usuarioTesteCadastrado($_SESSION['id'],$pdo);
            ?>
            <tr>
                <td>
                    <p><a href="<?= site1; ?>passo02/<?= $linha[idEvento] ?>/<?= $linha[id] ?>/<?= $linha[idCurso] ?>"><?= $linha[titulo]; ?></a></p> 
                
                
            </td>
            <td style="text-align:center"> <a href="<?= site1; ?>comprovante/<?= $saberInscrito[idCurso] ?>" target="_black"><img src="<?=site1;?>img/print.png" /></a></td>
            <td  style="text-align:center"> <a href="<?= site1; ?>resultado/<?= $saberInscrito[idEvento] ?>" target="_black"><img src="<?=site1;?>img/resultado.png" /></a></td>

        </tr>
            <?
        }
        
        ?>
        </div>
<div class="col-lg-12">
 
    
      <!--
    <table class="table table-striped">
        <thead>
        <tr>
            <td><b>Editar</b></td>
            <td  style="text-align:center"><b>2º Via</b></td>
            <td  style="text-align:center"><b>Resultado</b></td>
        </tr>
    </thead>-->
        <?
        $id = 2;
        $stmte->bindParam(':idSegmento', $id, PDO::PARAM_INT);
        $stmte->execute();
        while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {
            $saberInscrito = usuarioTesteCadastrado($_SESSION['id'],$pdo);
            ?>
            <tr>
                <td>
                    <p><a href="<?= site1; ?>passo02/<?= $linha[idEvento] ?>/<?= $linha[id] ?>/<?= $linha[idCurso] ?>"><?= $linha[titulo]; ?></a></p> 
                
                
            </td>
            <td style="text-align:center"> <a href="<?= site1; ?>comprovante/<?= $saberInscrito[idCurso] ?>" target="_black"><img src="<?=site1;?>img/print.png" /></a></td>
            <td  style="text-align:center"> <a href="<?= site1; ?>resultado/<?= $saberInscrito[idEvento] ?>" target="_black"><img src="<?=site1;?>img/resultado.png" /></a></td>

        </tr>
            <?
        }
        ?>
    </table>
</div>

