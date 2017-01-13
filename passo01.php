<?
$dadosEvento = testeSeletivo($url[3], $pdo);
$dadosUsuario = usuario($_SESSION[id], $pdo);
$_REQUEST['amigo'] = 1;

if (!empty($_REQUEST[acao])){
#echo "post";

 try {
 $sql = "UPDATE `usuario` SET `nome` = :nome, `email` = :email, `nascimento` = :nascimento, `rg` = :rg, `cpf` = :cpf, `naturalidade` = :naturalidade, `cep` = :cep, `rua` = :rua, `bairro` = :bairro, `numero` = :numero, `cidade` = :cidade, `estado` = :estado, `complemento` = :complemento , `telefone` = :telefone , colegio = :colegio, nomeresp = :nomeresp, rgresp = :rgresp, cpfresp = :cpfresp, telefoneresp = :telefoneresp , amigo = :amigo  WHERE `id` = :id ";
      /*  WHERE `id` = :id ";   
 /*  $sql = "UPDATE `usuario` SET `nome` = :nome, `email` = :email, `status` = :status,
 `tipo` = :tipo, `nascimento` = :nascimento, `rg` = :rg, `cpf` = :cpf, `naturalidade` = :naturalidade, `cep` = :cep, `rua` = :rua, 
 `bairro` = :bairro, `numero` = :numero, `cidade` = :cidade, `estado` = :estado, `complemento` = :complemento , `telefone` = :telefone 
 WHERE `id` = :id ";*/
#var_dump($sql);
 $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $_REQUEST['nome']);
        $stmt->bindParam(':email', $_REQUEST['email']);
       # $stmt->bindParam(':status', $_REQUEST['status']);
       # $stmt->bindParam(':tipo', $_REQUEST['tipo']);
        $stmt->bindParam(':nascimento', gravaData($_REQUEST['nascimento']));
        $stmt->bindParam(':rg', $_REQUEST['rg']);
        $stmt->bindParam(':cpf', $_REQUEST['cpf']);
        $stmt->bindParam(':naturalidade', $_REQUEST['naturalidade']);
        $stmt->bindParam(':cep', $_REQUEST['cep']);
        $stmt->bindParam(':rua', $_REQUEST['rua']);
        $stmt->bindParam(':bairro', $_REQUEST['bairro']);
        $stmt->bindParam(':numero', $_REQUEST['numero']);
        $stmt->bindParam(':cidade', $_REQUEST['cidade']);
        $stmt->bindParam(':estado', $_REQUEST['uf']);
        $stmt->bindParam(':complemento', $_REQUEST['complemento']);
        $stmt->bindParam(':telefone', $_REQUEST['telefone']);
        $stmt->bindParam(':colegio', $_REQUEST['colegio']);
        $stmt->bindParam(':nomeresp', $_REQUEST['nomeresp']);
        $stmt->bindParam(':rgresp', $_REQUEST['rgresp']);
        $stmt->bindParam(':cpfresp', $_REQUEST['cpfresp']);
        $stmt->bindParam(':telefoneresp', $_REQUEST['telefoneresp']);
        $stmt->bindParam(':amigo', $_REQUEST['amigo']);
        $stmt->bindParam(':id', $_SESSION[id], PDO::PARAM_INT);
        $executa = $stmt->execute();

#http://localhost/inscricoes/passo02/1

        if ($executa) {
            echo("<script language='javascript'>location.href='" . site1 . "passo02/".$url[3]."'</script>");
            echo '<p class="bg-success">Dados inseridos com sucesso</p>';
        } else {
            echo '<p class="bg-danger">Erro ao inserir os dados</p>';
        }
    } catch (PDOException $e) {
        #echo $e->getMessage();
    }
}
?>      

<div class="col-lg-6" style="text-align: center">
    1º Evento / Dados Pessoais
</div>
<div class="col-lg-6" style="text-align: center">
    <b style="color: #cccccc">2º Série/Curso </b> 
</div>
<p class="clearfix"><p>
<div class="progress">
    <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 50%">
        <span class="sr-only">50% Complete (success)</span>
    </div>
</div>
<!-- -->
<form action="" method="POST" role="form" name="form1">
    <div class="panel panel-primary">
        <div class="panel-heading">Evento</div>
        <div class="panel-body">
              
<?=$dadosEvento[titulo]?> <a href="" class="btn btn-warning"> Trocar Evento </a>
            <!--<div class="col-lg-10">
                <div class="form-group">
                    <label >Nome do Amigo</label>
                    <input type="text" class="form-control" id="exampleInputNome" placeholder="Digite o nome do seu amigo" value="<?=$dadosUsuario['amigo']?>" name="amigo" >
                </div>
            </div>-->
        </div>

    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Dados Pessoais</div>
        <div class="panel-body">
            <div class="col-lg-10">
                <div class="form-group">
                    <label >Nome</label>
                    <input type="text" class="form-control" id="exampleInputNome" placeholder="Digite seu Nome" value="<?=$dadosUsuario['nome']?>" name="nome" required>
                </div>
            </div>
            <div class="col-lg-4">
                <b>Data de Nascimento</b><br/>
                <input type="text"   class="form-control"  value="<?=implode("/",array_reverse(explode("-",$dadosUsuario['nascimento'])));?>" name="nascimento"/>
            </div>
            <div class="col-lg-4">
                <b>RG</b><br/><input type="text"   class="form-control"  value="<?=$dadosUsuario['rg']?>" name="rg"/>
            </div>
            <div class="col-lg-4">
                <b>CPF</b><br/><input type="text"   class="form-control"  value="<?=$dadosUsuario['cpf']?>" id="cpf" name="cpf" onBlur="ValidarCPF(form1.cpf);" required/>
            </div>
            <div class="col-lg-4">
                <b>Naturalidade</b><br/><input type="text" class="form-control"  value="<?=$dadosUsuario['naturalidade']?>" name="naturalidade"/>
            </div>
            <div class="col-lg-4">
                <b>Email</b><br/><input type="email" class="form-control"  value="<?=$dadosUsuario['email']?>" name="email" required/>
            </div>
            <div class="col-lg-4">
                <b>Telefone</b><br/><input type="text" class="form-control"  value="<?=$dadosUsuario['telefone']?>" name="telefone" required/>
            </div>
            <div class="col-lg-4">
                <b>Escola onde estuda</b><br/><input type="text" class="form-control"  value="<?=$dadosUsuario['colegio']?>" name="colegio" required/>
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Endereço</div>
        <div class="panel-body">
            <div class="col-lg-4">
                <b>CEP</b><br/><input type="text" class="form-control" value="<?=$dadosUsuario['cep']?>" name="cep" id="cep"/>
            </div>
            <div class="col-lg-4">
                <b>Rua</b><br/><input type="text" class="form-control" value="<?=$dadosUsuario['rua']?>" name="rua" id="rua"/>
            </div>
            <div class="col-lg-4">
                <b>Bairro</b><br/><input type="text" class="form-control" value="<?=$dadosUsuario['bairro']?>" name="bairro" id="bairro"/>
            </div>
            <div class="col-lg-4">
                <b>Numero</b><br/><input type="text" class="form-control" value="<?=$dadosUsuario['numero']?>" name="numero" id="numero" />
            </div>
            <div class="col-lg-4">
                <b>Cidade</b><br/><input type="text" class="form-control" value="<?=$dadosUsuario['cidade']?>" name="cidade" id="cidade"/>
            </div>
            <div class="col-lg-4">
                <b>Estado</b><br/><input type="text" class="form-control"value="<?=$dadosUsuario['estado']?>" name="uf" id="uf"/>
            </div>
            <div class="col-lg-4">
                <b>Complemento</b><br/><input type="text" class="form-control" value="<?=$dadosUsuario['complemento']?>" name="complemento"/>
            </div>
        </div>
    </div>
        <div class="panel panel-primary">
        <div class="panel-heading">Dados Responsavel</div>
        <div class="panel-body">
        <div class="col-lg-12">
                <div class="form-group">
                    <label >Nome</label>
                    <input type="text" class="form-control" id="exampleInputNome" placeholder="Digite seu Nome" value="<?=$dadosUsuario['nomeresp']?>" name="nomeresp" required/>
                </div>
            </div>
              <div class="col-lg-6">
                <b>RG</b><br/><input type="text"   class="form-control"  value="<?=$dadosUsuario['rgresp']?>" name="rgresp"/>
            </div>
            <div class="col-lg-6">
                <b>CPF</b><br/><input type="text"   class="form-control"  value="<?=$dadosUsuario['cpfresp']?>"   name="cpfresp"/>
            </div>
                        <div class="col-lg-12">
                <b>Telefone</b><br/><input type="text" class="form-control"  value="<?=$dadosUsuario['telefoneresp']?>" name="telefoneresp" required/>
            </div>
        </div>
        </div>     
    <p class="clearfix">&nbsp;</p>
    <p style="text-align: center"> 
        <input type="hidden" value="<?=$url[3];?>" name"evento" />
        <input type="submit" value="Próximo >>" class="btn btn-lg btn-success" role="button"/>
    </p>
    <input type="hidden" value="1" name="acao">
</form>
    <!--<div class="jumbotron " style="text-align: justify">
        <div style="text-align: center; font-size: 16px; font-weight: bold">Curso Pretendido</div>
    </div>
    <div class="col-lg-4">
    <b>Curso</b><br/> 
    <?
    $stmte = $pdo->prepare("SELECT * FROM testeseletivocursos WHERE idEvento = :idEvento");
    $stmte->bindParam(':idEvento', $url[3], PDO::PARAM_INT);
    $stmte->execute();
    while ($linha = $stmte->fetch(PDO::FETCH_ASSOC)) {
        $dadosCurso = cursos($linha['idCurso'], $pdo);
        ?>
                <input type="radio" name="curso" value="<?= $linha['idCurso']; ?>" />
        <?= $dadosCurso['descricao']; ?> <br/>
                          
                            
        <?
    }
    ?>
    </div>-->