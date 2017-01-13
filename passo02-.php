<div class="col-lg-4" style="text-align: center">
    <b>1º Dados Pessoais</b> <span style="color: green">ok</span>
</div>
<div class="col-lg-4" style="text-align: center">
    <b >2º Evento</b> 
</div>
<div class="col-lg-4" style="text-align: center">
    <b style="color: #cccccc">3º Série/Curso </b> 
</div>
<p class="clearfix"><p>
<div class="progress">
    <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 33%">
        <span class="sr-only">33% Complete (success)</span>
    </div>
    <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 34%">
        <span class="sr-only">33% Complete (success)</span>
    </div>
</div> 
 <div class="panel panel-primary">
        <div class="panel-heading">Evento</div>
        <div class="panel-body">
<div class="col-lg-6 ">
    <h4 style="background-color:  #5cb85c; padding: 5px; color: #ffffff;">Colégio</h4>
    <table class="table table-striped">
        <?
        $id = 1;
        $stmte = $pdo->prepare("SELECT * FROM testeseletivo WHERE segmento = :idEvento");
        $stmte->bindParam(':idEvento', $id, PDO::PARAM_INT);
        $stmte->execute();
        while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td>
                    <a href="<?= site1; ?>passo03/<?= $linha[id] ?>"><?= $linha[titulo]; ?></a>
                    <strong style="color: #d9534f">(Aprovados para a Fase de Entrevistas)</strong>
                </td>
            </tr>
            <?
        }
        ?>
<!--<tr><td>1Âº Teste Seletivo CEV ColÃ©gio 2015   <strong style="color: #5cb85c">(Aprovados para a Fase de Entrevistas)</strong> </td></tr>-->
    </table>
</div>

<div class="col-lg-6">

    <h4 style="background-color:  #d9534f; padding: 5px; color: #ffffff;">Vestibulares</h4>
    <table class="table table-striped">
        <?
        $id = 2;
        $stmte->bindParam(':idEvento', $id, PDO::PARAM_INT);
        $stmte->execute();
        while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td>
                    <a href="<?= site1; ?>passo03/<?= $linha[id] ?>"><?= $linha[titulo]; ?></a>
                    <strong style="color: #5cb85c">(Inscrições Abertas)</strong>
                </td>
            </tr>
            <?
        }
        ?>
    </table>
</div>
</div>